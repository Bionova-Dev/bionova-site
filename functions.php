<?php
/**
 * Bionova Theme Functions - EMERGENCY BAREBONES VERSION
 * All complex logic has been removed to restore site accessibility.
 */

add_action( 'after_setup_theme', function() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'post-thumbnails' );
} );

// Basic WooCommerce support
add_filter( 'woocommerce_is_purchasable', '__return_true' );
