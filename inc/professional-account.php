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

        // Generate Promo Code
        if ( $last_name ) {
            $base_code = 'DR-' . strtoupper( sanitize_title( $last_name ) );
            $coupon_code = $base_code;
            $counter = 1;
            
            // Check if coupon exists
            while ( wc_get_coupon_id_by_code( $coupon_code ) ) {
                $coupon_code = $base_code . '-' . $counter;
                $counter++;
            }
            
            // Create coupon programmatically
            $coupon = new WC_Coupon();
            $coupon->set_code( $coupon_code );
            $coupon->set_discount_type( 'percent' ); // Percentage discount
            $coupon->set_amount( 10 ); // 10% off for the client
            $coupon->set_individual_use( false );
            $coupon->set_usage_limit( 0 );
            $coupon->set_usage_limit_per_user( 0 );
            $coupon->set_description( 'Code généré automatiquement pour le professionnel ID ' . $customer_id );
            
            // Add custom meta to track the professional
            $coupon->add_meta_data( 'professional_user_id', $customer_id, true );
            $coupon->save();

            // Save coupon code to professional profile
            update_user_meta( $customer_id, 'bionova_pro_coupon', $coupon_code );
        }
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

// 6. Custom REST API Endpoint for Professional Registration (Bypasses write limits of WooCommerce read-only key)
add_action( 'rest_api_init', 'bionova_register_pro_registration_route' );
function bionova_register_pro_registration_route() {
    register_rest_route( 'bionova/v1', '/create-pro-customer', array(
        'methods'             => 'POST',
        'callback'            => 'bionova_create_pro_customer_callback',
        'permission_callback' => '__return_true', // Accessible publically for delegate registration
    ) );
}

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

    $customer_id = wc_create_new_customer( $email, $username, $password );

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

    // Auto-generate physician's personalized promo code (DR-NOM)
    $generated_coupon = '';
    if ( $last_name ) {
        $base_code = 'DR-' . strtoupper( sanitize_title( $last_name ) );
        $coupon_code = $base_code;
        $counter = 1;

        while ( wc_get_coupon_id_by_code( $coupon_code ) ) {
            $coupon_code = $base_code . '-' . $counter;
            $counter++;
        }

        $coupon = new WC_Coupon();
        $coupon->set_code( $coupon_code );
        $coupon->set_discount_type( 'percent' );
        $coupon->set_amount( 10 ); // 10% discount for doctor's patients
        $coupon->set_individual_use( false );
        $coupon->set_usage_limit( 0 );
        $coupon->set_usage_limit_per_user( 0 );
        $coupon->set_description( 'Code généré automatiquement pour le professionnel ID ' . $customer_id );
        $coupon->add_meta_data( 'professional_user_id', $customer_id, true );
        $coupon->save();

        update_user_meta( $customer_id, 'bionova_pro_coupon', $coupon_code );
        $generated_coupon = $coupon_code;
    }

    return new WP_REST_Response( array(
        'success'    => true,
        'id'         => $customer_id,
        'username'   => $username,
        'email'      => $email,
        'coupon'     => $generated_coupon,
    ), 200 );
}

