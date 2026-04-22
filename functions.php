<?php
// Forçage système Bionova Online
update_option( 'woocommerce_status_options', array( 'is_store_online' => 'yes' ) );
flush_rewrite_rules();

// Bionova Theme Functions
function bionova_setup() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'bionova_setup' );

// --- OPTIMISATION DRASTIQUE DE LA VITESSE (V3) ---

// 1. Désactivation agressive des scripts WooCommerce sur les pages non-essentielles
add_action( 'wp_enqueue_scripts', 'bionova_super_optimize_scripts', 999 );
function bionova_super_optimize_scripts() {
    if ( function_exists( 'is_woocommerce' ) ) {
        if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() && ! is_account_page() ) {
            wp_dequeue_script( 'woocommerce' );
            wp_dequeue_script( 'wc-add-to-cart' );
            wp_dequeue_script( 'wc-cart-fragments' );
            wp_dequeue_script( 'wc-checkout' );
            wp_dequeue_script( 'wc-cart' );
            wp_dequeue_script( 'wc-add-to-cart-variation' );
            wp_dequeue_script( 'wc-single-product' );
            wp_dequeue_script( 'wc-chosen' );
            wp_dequeue_script( 'jquery-blockui' );
            wp_dequeue_script( 'jquery-placeholder' );
            wp_dequeue_script( 'jquery-cookie' );
            
            wp_dequeue_style( 'woocommerce-general' );
            wp_dequeue_style( 'woocommerce-layout' );
            wp_dequeue_style( 'woocommerce-smallscreen' );
            wp_dequeue_style( 'woocommerce_frontend_styles' );
            wp_dequeue_style( 'woocommerce-inline' );
        }
    }
    
    if ( ! is_user_logged_in() ) {
        wp_dequeue_style( 'dashicons' );
    }
}

// 2. Désactivation de l'API Heartbeat
add_action( 'init', 'bionova_stop_heartbeat', 1 );
function bionova_stop_heartbeat() {
    wp_deregister_script( 'heartbeat' );
}

// 3. Suppression des Query Strings
add_filter( 'script_loader_src', 'bionova_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', 'bionova_remove_script_version', 15, 1 );
function bionova_remove_script_version( $src ) {
    if ( strpos( $src, 'ver=' ) ) {
        $src = remove_query_arg( 'ver', $src );
    }
    return $src;
}

// 4. Nettoyage complet du Header
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rest_output_link_wp_head' );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
add_filter( 'emoji_svg_url', '__return_false' );

// 5. Configuration 100% Tunisie
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
    $fields['billing']['billing_country']['default'] = 'TN';
    return $fields;
}
add_filter( 'woocommerce_countries', 'restrict_to_tunisia' );
function restrict_to_tunisia( $countries ) {
    return array( 'TN' => 'Tunisie' );
}

add_filter( 'woocommerce_is_purchasable', '__return_true' );
update_option('aios_maintenance_mode', '0');
update_option('wp_maintenance_mode', '0');
?>
