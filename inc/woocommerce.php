<?php
/**
 * Bionova WooCommerce Configuration
 * VERSION: 20260511
 */

// Force status online
update_option('woocommerce_status_options', array('is_store_online' => 'yes'));

// Specific styling for WooCommerce pages
function bionova_wc_custom_styles() {
    if ( is_checkout() || is_cart() || is_account_page() ) {
        wp_enqueue_style( 'bionova-wc-custom', get_template_directory_uri() . '/woocommerce-custom.css', array(), '1.0.1' );
    }
}
add_action( 'wp_enqueue_scripts', 'bionova_wc_custom_styles' );

// Remove sidebar from WooCommerce
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

// Ensure correct redirect after purchase or cart actions if needed
add_filter( 'woocommerce_add_to_cart_redirect', 'bionova_add_to_cart_redirect' );
function bionova_add_to_cart_redirect( $url ) {
    return wc_get_cart_url();
}
