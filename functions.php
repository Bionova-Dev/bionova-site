<?php
// Bionova Theme Functions - CLEAN VERSION
function bionova_setup() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'post-thumbnails' );
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'bionova' ),
    ) );
}
add_action( 'after_setup_theme', 'bionova_setup' );

// ============================================================
// WOOCOMMERCE — Config Tunisie
// ============================================================
add_filter( 'woocommerce_is_purchasable', '__return_true' );
add_filter( 'woocommerce_checkout_fields', function( $fields ) {
    $fields['billing']['billing_country']['default'] = 'TN';
    return $fields;
});
add_filter( 'woocommerce_countries', function( $countries ) {
    return array( 'TN' => 'Tunisie' );
});

// ============================================================
// FIX: Redirection "Retour à la boutique" et "Continuer les achats"
// ============================================================
add_filter( 'woocommerce_return_to_shop_redirect', 'bionova_custom_shop_url' );
add_filter( 'woocommerce_continue_shopping_redirect', 'bionova_custom_shop_url' );
add_filter( 'woocommerce_get_shop_page_permalink', 'bionova_custom_shop_url' );

function bionova_custom_shop_url() {
    return home_url( '/#products' );
}

// ============================================================
// OPTIMISATION — Désactivation scripts WC hors boutique (Optionnel mais sûr)
// ============================================================
add_action( 'wp_enqueue_scripts', 'bionova_dequeue_wc_assets', 999 );
function bionova_dequeue_wc_assets() {
    if ( function_exists( 'is_woocommerce' ) ) {
        if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() && ! is_account_page() ) {
            wp_dequeue_script( 'wc-cart-fragments' );
            wp_dequeue_script( 'woocommerce' );
            wp_dequeue_script( 'wc-add-to-cart' );
        }
    }
}
