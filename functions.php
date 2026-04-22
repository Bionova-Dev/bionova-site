<?php
// Bionova Theme Functions
function bionova_setup() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'bionova_setup' );

// --- OPTIMISATION DE LA VITESSE ---

// 1. Désactivation des scripts WooCommerce sur les pages non-boutique
add_action( 'wp_enqueue_scripts', 'bionova_optimize_woocommerce_scripts', 99 );
function bionova_optimize_woocommerce_scripts() {
    if ( function_exists( 'is_woocommerce' ) ) {
        // On ne charge WC que sur les pages nécessaires
        if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() && ! is_account_page() ) {
            wp_dequeue_script( 'woocommerce' );
            wp_dequeue_script( 'wc-add-to-cart' );
            wp_dequeue_script( 'wc-cart-fragments' );
            wp_dequeue_script( 'wc-checkout' );
            wp_dequeue_script( 'wc-add-to-cart-variation' );
            wp_dequeue_script( 'wc-single-product' );
            wp_dequeue_script( 'wc-cart' );
            wp_dequeue_script( 'wc-chosen' );
            
            wp_dequeue_style( 'woocommerce-general' );
            wp_dequeue_style( 'woocommerce-layout' );
            wp_dequeue_style( 'woocommerce-smallscreen' );
        }
    }
}

// 2. Nettoyage du Header (Emoji, oEmbed, etc.)
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rest_output_link_wp_head' );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );

// 3. Configuration 100% Tunisie
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
    $fields['billing']['billing_country']['default'] = 'TN';
    return $fields;
}

add_filter( 'woocommerce_countries', 'restrict_to_tunisia' );
function restrict_to_tunisia( $countries ) {
    return array( 'TN' => 'Tunisie' );
}
// 4. Force Public Access (Maintenance Check)
add_filter( 'woocommerce_is_purchasable', '__return_true' );
// Site verified as public - No .maintenance or .htaccess found at root.
?>
