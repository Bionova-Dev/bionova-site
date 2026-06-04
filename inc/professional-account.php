<?php
/**
 * Bionova Professional Account Logic
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// 1. Handle Professional Registration Fields
add_action( 'woocommerce_created_customer', 'bionova_handle_professional_registration', 10, 3 );
function bionova_handle_professional_registration( $customer_id, $new_customer_data, $password_generated ) {
    if ( isset( $_POST['is_professional'] ) && $_POST['is_professional'] === '1' ) {
        // Save user meta
        update_user_meta( $customer_id, 'is_professional', '1' );
        
        $first_name = isset( $_POST['billing_first_name'] ) ? sanitize_text_field( $_POST['billing_first_name'] ) : '';
        $last_name = isset( $_POST['billing_last_name'] ) ? sanitize_text_field( $_POST['billing_last_name'] ) : '';
        
        if ( $first_name ) {
            update_user_meta( $customer_id, 'billing_first_name', $first_name );
            update_user_meta( $customer_id, 'first_name', $first_name );
        }
        if ( $last_name ) {
            update_user_meta( $customer_id, 'billing_last_name', $last_name );
            update_user_meta( $customer_id, 'last_name', $last_name );
        }

        if ( isset($_POST['pro_speciality']) ) {
            update_user_meta( $customer_id, 'pro_speciality', sanitize_text_field($_POST['pro_speciality']) );
        }
        
        // Init points
        update_user_meta( $customer_id, 'bionova_pro_points', 0 );
        update_user_meta( $customer_id, 'bionova_pro_orders', array() );

        // The coupon is no longer auto-generated here.
        // It is assigned in the REST API endpoint based on the scanned code.
    }
}

// 2. Track orders and assign points
add_action( 'woocommerce_order_status_completed', 'bionova_track_pro_points_on_order', 10, 1 );
function bionova_track_pro_points_on_order( $order_id ) {
    $order = wc_get_order( $order_id );
    if ( ! $order ) return;

    // Check if points were already assigned for this order to prevent duplicates
    if ( $order->get_meta( '_pro_points_assigned' ) ) {
        return;
    }

    $coupons = $order->get_coupon_codes();
    
    foreach ( $coupons as $code ) {
        $coupon = new WC_Coupon( $code );
        $pro_id = $coupon->get_meta( 'professional_user_id' );
        
        if ( $pro_id ) {
            // Assign 10 points
            $current_points = (int) get_user_meta( $pro_id, 'bionova_pro_points', true );
            update_user_meta( $pro_id, 'bionova_pro_points', $current_points + 10 );
            
            // Log order in pro profile
            $orders_history = get_user_meta( $pro_id, 'bionova_pro_orders', true );
            if ( ! is_array( $orders_history ) ) {
                $orders_history = array();
            }
            
            $client_name = $order->get_billing_first_name() . ' ' . $order->get_billing_last_name();
            
            $orders_history[] = array(
                'order_id'    => $order_id,
                'date'        => current_time('mysql'),
                'client_name' => $client_name,
                'total'       => $order->get_total(),
                'points'      => 10
            );
            
            update_user_meta( $pro_id, 'bionova_pro_orders', $orders_history );
            
            // Mark order as processed
            $order->update_meta_data( '_pro_points_assigned', 'yes' );
            $order->save();
        }
    }
}

// 3. Register Custom Dashboard Endpoint
add_action( 'init', 'bionova_add_pro_endpoint' );
function bionova_add_pro_endpoint() {
    add_rewrite_endpoint( 'tableau-pro', EP_ROOT | EP_PAGES );
}

// 4. Add menu item to My Account
add_filter( 'woocommerce_account_menu_items', 'bionova_add_pro_menu_item', 10, 1 );
function bionova_add_pro_menu_item( $items ) {
    if ( is_user_logged_in() ) {
        $user_id = get_current_user_id();
        $is_pro = get_user_meta( $user_id, 'is_professional', true );
        
        if ( $is_pro === '1' ) {
            // Insert after dashboard
            $new_items = array();
            foreach ( $items as $key => $item ) {
                $new_items[$key] = $item;
                if ( 'dashboard' === $key ) {
                    $new_items['tableau-pro'] = 'Espace Pro';
                }
            }
            return $new_items;
        }
    }
    return $items;
}

// 5. Display content for the endpoint
add_action( 'woocommerce_account_tableau-pro_endpoint', 'bionova_pro_endpoint_content' );
function bionova_pro_endpoint_content() {
    // Look for a custom template
    wc_get_template( 'myaccount/dashboard-pro.php', array(), '', get_template_directory() . '/woocommerce/' );
}

// 6. Custom REST API Endpoints
add_action( 'rest_api_init', 'bionova_register_pro_registration_route' );
function bionova_register_pro_registration_route() {
    // Create professional customer
    register_rest_route( 'bionova/v1', '/create-pro-customer', array(
        'methods'             => 'POST',
        'callback'            => 'bionova_create_pro_customer_callback',
        'permission_callback' => '__return_true',
    ) );

    // List all WooCommerce coupons
    register_rest_route( 'bionova/v1', '/list-coupons', array(
        'methods'             => 'GET',
        'callback'            => 'bionova_list_coupons_callback',
        'permission_callback' => '__return_true',
    ) );

    // Create a new WooCommerce coupon
    register_rest_route( 'bionova/v1', '/create-coupon', array(
        'methods'             => 'POST',
        'callback'            => 'bionova_create_coupon_callback',
        'permission_callback' => '__return_true',
    ) );
}

/**
 * List all WooCommerce coupons
 */
function bionova_list_coupons_callback( WP_REST_Request $request ) {
    $args = array(
        'post_type'      => 'shop_coupon',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
    );
    $coupons_query = new WP_Query( $args );
    $coupons = array();

    foreach ( $coupons_query->posts as $coupon_post ) {
        $coupon = new WC_Coupon( $coupon_post->ID );
        $pro_user_id = $coupon->get_meta( 'professional_user_id' );
        $assigned_to = '';
        if ( $pro_user_id ) {
            $user = get_userdata( $pro_user_id );
            if ( $user ) {
                $assigned_to = $user->first_name . ' ' . $user->last_name . ' (' . $user->user_email . ')';
            }
        }
        $coupons[] = array(
            'id'          => $coupon_post->ID,
            'code'        => $coupon->get_code(),
            'discount'    => $coupon->get_amount(),
            'type'        => $coupon->get_discount_type(),
            'assigned_to' => $assigned_to,
            'date'        => $coupon_post->post_date,
        );
    }

    return new WP_REST_Response( $coupons, 200 );
}

/**
 * Create a new WooCommerce coupon
 */
function bionova_create_coupon_callback( WP_REST_Request $request ) {
    $params = $request->get_json_params();
    if ( empty( $params ) ) {
        $params = $request->get_params();
    }

    $code     = isset( $params['code'] ) ? sanitize_text_field( $params['code'] ) : '';
    $discount = isset( $params['discount'] ) ? floatval( $params['discount'] ) : 10;
    $type     = isset( $params['type'] ) ? sanitize_text_field( $params['type'] ) : 'percent';

    if ( empty( $code ) ) {
        return new WP_Error( 'missing_code', 'Le code promo est obligatoire.', array( 'status' => 400 ) );
    }

    // Check if coupon already exists
    if ( wc_get_coupon_id_by_code( $code ) ) {
        return new WP_Error( 'coupon_exists', 'Ce code promo existe déjà.', array( 'status' => 400 ) );
    }

    $coupon = new WC_Coupon();
    $coupon->set_code( $code );
    $coupon->set_discount_type( $type );
    $coupon->set_amount( $discount );
    $coupon->set_individual_use( false );
    $coupon->save();

    return new WP_REST_Response( array(
        'success' => true,
        'id'      => $coupon->get_id(),
        'code'    => $coupon->get_code(),
    ), 200 );
}

/**
 * Create a professional customer + return password reset link
 */
function bionova_create_pro_customer_callback( WP_REST_Request $request ) {
    $params = $request->get_json_params();
    if ( empty( $params ) ) {
        $params = $request->get_params();
    }

    $email      = isset( $params['email'] ) ? sanitize_email( $params['email'] ) : '';
    $username   = isset( $params['username'] ) ? sanitize_user( $params['username'] ) : '';
    $password   = isset( $params['password'] ) ? $params['password'] : '';
    $first_name = isset( $params['first_name'] ) ? sanitize_text_field( $params['first_name'] ) : '';
    $last_name  = isset( $params['last_name'] ) ? sanitize_text_field( $params['last_name'] ) : '';
    $phone      = isset( $params['phone'] ) ? sanitize_text_field( $params['phone'] ) : '';
    $speciality = isset( $params['speciality'] ) ? sanitize_text_field( $params['speciality'] ) : '';
    $code_promo = isset( $params['code_promo'] ) ? sanitize_text_field( $params['code_promo'] ) : '';

    if ( empty( $email ) || empty( $username ) || empty( $password ) ) {
        return new WP_Error( 'missing_fields', 'Champs obligatoires manquants.', array( 'status' => 400 ) );
    }

    if ( email_exists( $email ) ) {
        return new WP_Error( 'registration-error-email-exists', 'Cette adresse email est déjà utilisée.', array( 'status' => 400 ) );
    }

    if ( username_exists( $username ) ) {
        return new WP_Error( 'registration-error-username-exists', 'Ce nom d\'utilisateur est déjà pris.', array( 'status' => 400 ) );
    }

    // Create WooCommerce Customer using standard WC function
    if ( ! function_exists( 'wc_create_new_customer' ) ) {
        return new WP_Error( 'woocommerce_missing', 'WooCommerce n\'est pas activé.', array( 'status' => 500 ) );
    }

    // Disable WooCommerce automatic emails (new customer + reset password)
    // The reset link is sent manually via WhatsApp/SMS/Email
    add_filter( 'woocommerce_email_enabled_customer_new_account', '__return_false' );
    add_filter( 'woocommerce_email_enabled_customer_reset_password', '__return_false' );

    $customer_id = wc_create_new_customer( $email, $username, $password );

    // Re-enable emails for normal site usage
    remove_filter( 'woocommerce_email_enabled_customer_new_account', '__return_false' );
    remove_filter( 'woocommerce_email_enabled_customer_reset_password', '__return_false' );

    if ( is_wp_error( $customer_id ) ) {
        return new WP_Error( 'creation_failed', $customer_id->get_error_message(), array( 'status' => 500 ) );
    }

    // Save billing and profile details
    update_user_meta( $customer_id, 'first_name', $first_name );
    update_user_meta( $customer_id, 'last_name', $last_name );
    update_user_meta( $customer_id, 'billing_first_name', $first_name );
    update_user_meta( $customer_id, 'billing_last_name', $last_name );
    update_user_meta( $customer_id, 'billing_email', $email );
    update_user_meta( $customer_id, 'billing_phone', $phone );

    // Save doctor specialty and professional metadata
    update_user_meta( $customer_id, 'is_professional', '1' );
    update_user_meta( $customer_id, 'pro_speciality', $speciality );
    update_user_meta( $customer_id, 'code_promo_inscription', $code_promo );
    update_user_meta( $customer_id, 'bionova_pro_points', 0 );
    update_user_meta( $customer_id, 'bionova_pro_orders', array() );

    // Link the scanned promo code to the professional
    $generated_coupon = $code_promo;
    if ( $code_promo ) {
        update_user_meta( $customer_id, 'bionova_pro_coupon', $code_promo );
        
        // Find the coupon and update its meta to track the professional
        $coupon_id = wc_get_coupon_id_by_code( $code_promo );
        if ( $coupon_id ) {
            $coupon = new WC_Coupon( $coupon_id );
            $coupon->update_meta_data( 'professional_user_id', $customer_id );
            $coupon->save();
        }
    }

    // Generate password reset link with single token (SMS apps truncate URLs at & characters)
    $reset_key = get_password_reset_key( get_userdata( $customer_id ) );
    $reset_url = '';
    if ( ! is_wp_error( $reset_key ) ) {
        // Encode key and login into a single base64 token to avoid & in URL
        $token = base64_encode( $reset_key . '|' . $username );
        $reset_url = 'https://bionova.tn/definir-mdp/?t=' . urlencode( $token );
    } else {
        $reset_url = 'https://bionova.tn/mon-compte/lost-password/';
    }

    return new WP_REST_Response( array(
        'success'    => true,
        'id'         => $customer_id,
        'username'   => $username,
        'email'      => $email,
        'coupon'     => $generated_coupon,
        'reset_url'  => $reset_url,
    ), 200 );
}

// 7. Règles personnalisées pour les mots de passe (6 caractères, 1 majuscule min)
add_filter( 'woocommerce_min_password_strength', '__return_zero' );

add_action( 'wp_enqueue_scripts', function() {
    wp_dequeue_script( 'wc-password-strength-meter' );
}, 99 );

add_action( 'validate_password_reset', 'bionova_enforce_password_rules', 10, 2 );
function bionova_enforce_password_rules( $errors, $user ) {
    if ( isset( $_POST['password_1'] ) && ! empty( $_POST['password_1'] ) ) {
        $password = $_POST['password_1'];
        if ( strlen( $password ) < 6 ) {
            $errors->add( 'password_error', 'Le mot de passe doit contenir au moins 6 caractères.' );
        }
        if ( ! preg_match( '/[A-Z]/', $password ) ) {
            $errors->add( 'password_error', 'Le mot de passe doit contenir au moins une lettre majuscule.' );
        }
    }
}

// 8. Routage silencieux pour l'URL propre du formulaire d'inscription
add_action( 'parse_request', 'bionova_pro_form_route', 1 );
function bionova_pro_form_route( $wp ) {
    if ( isset( $wp->request ) && ( $wp->request === 'inscription-pro' || $wp->request === 'inscription-pro/' ) ) {
        status_header( 200 );
        include get_template_directory() . '/bionova-admin/form.html';
        exit;
    }
}

// 9. After password reset, give 10 bonus points, set popup flag, and redirect directly to account page
add_action( 'woocommerce_customer_reset_password', 'bionova_redirect_after_password_reset' );
function bionova_redirect_after_password_reset( $user ) {
    $user_id = $user->ID;
    
    // Check if bonus already given
    $bonus_given = get_user_meta( $user_id, '_bionova_welcome_bonus_given', true );
    if ( ! $bonus_given ) {
        $current_points = get_user_meta( $user_id, 'bionova_pro_points', true );
        $current_points = $current_points ? (int) $current_points : 0;
        
        // Add 10 points
        update_user_meta( $user_id, 'bionova_pro_points', $current_points + 10 );
        update_user_meta( $user_id, '_bionova_welcome_bonus_given', true );
        
        // Set flag to show popup on next page load
        update_user_meta( $user_id, '_bionova_show_welcome_popup', true );
    }

    wp_redirect( wc_get_page_permalink( 'myaccount' ) );
    exit;
}

// 10. Custom route /definir-mdp/ — decodes token and redirects to WooCommerce reset form
add_action( 'parse_request', 'bionova_definir_mdp_route', 1 );
function bionova_definir_mdp_route( $wp ) {
    if ( ! isset( $wp->request ) ) return;
    if ( $wp->request !== 'definir-mdp' && $wp->request !== 'definir-mdp/' ) return;

    $token = isset( $_GET['t'] ) ? $_GET['t'] : '';
    if ( empty( $token ) ) {
        wp_redirect( 'https://bionova.tn/mon-compte/' );
        exit;
    }

    // Decode token: base64(key|login)
    $decoded = base64_decode( $token );
    $parts = explode( '|', $decoded, 2 );

    if ( count( $parts ) !== 2 || empty( $parts[0] ) || empty( $parts[1] ) ) {
        wp_redirect( 'https://bionova.tn/mon-compte/' );
        exit;
    }

    $key   = $parts[0];
    $login = $parts[1];

    // Redirect to WooCommerce reset form with proper parameters
    $redirect = add_query_arg( array(
        'show-reset-form' => 'true',
        'key'             => $key,
        'login'           => rawurlencode( $login ),
    ), wc_get_endpoint_url( 'lost-password', '', wc_get_page_permalink( 'myaccount' ) ) );

    wp_redirect( $redirect );
    exit;
}

// 11. Global Welcome Popup on My Account (Any tab)
add_action('wp_footer', 'bionova_welcome_popup_footer');
function bionova_welcome_popup_footer() {
    if ( ! is_account_page() || ! is_user_logged_in() ) return;

    $user_id = get_current_user_id();
    $show_popup = get_user_meta( $user_id, '_bionova_show_welcome_popup', true );

    if ( $show_popup ) {
        delete_user_meta( $user_id, '_bionova_show_welcome_popup' );
        ?>
        
        <!-- Welcome Popup Overlay -->
        <div id="welcome-popup" class="welcome-popup-overlay">
            <div class="welcome-popup-card">
                <div class="welcome-popup-icon">🎉</div>
                <h3 class="welcome-popup-title">Félicitations !</h3>
                <p class="welcome-popup-text">Vous avez gagné <strong>10 points</strong> de bienvenue pour votre première connexion sur votre compte Pro Bionova.</p>
                <button onclick="closeWelcomePopup()" class="welcome-popup-btn">Génial, merci !</button>
            </div>
        </div>
        
        <script>
        function closeWelcomePopup() {
            var popup = document.getElementById('welcome-popup');
            if (popup) {
                popup.style.opacity = '0';
                setTimeout(function() {
                    popup.style.display = 'none';
                }, 300); // Wait for transition
            }
        }
        </script>
        <?php
    }
}
