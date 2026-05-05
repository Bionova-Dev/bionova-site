<?php
/**
 * Bionova Theme Functions - RESTORED MINIMAL
 */

function bionova_setup() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'post-thumbnails' );
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'bionova' ),
    ) );
}
add_action( 'after_setup_theme', 'bionova_setup' );

// Basic WooCommerce filters
add_filter( 'woocommerce_is_purchasable', '__return_true' );

// Custom shop URL
add_filter( 'woocommerce_return_to_shop_redirect', function() { return home_url( '/#products' ); } );
add_filter( 'woocommerce_continue_shopping_redirect', function() { return home_url( '/#products' ); } );
add_filter( 'woocommerce_get_shop_page_permalink', function() { return home_url( '/#products' ); } );
