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
        wp_enqueue_style( 'bionova-wc-custom', get_template_directory_uri() . '/woocommerce-custom.css', array(), filemtime(get_template_directory() . '/woocommerce-custom.css') );
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

// Fix missing product images in WooCommerce Cart / Checkout
add_filter( 'woocommerce_product_get_image', 'bionova_wc_fallback_product_image', 10, 5 );
function bionova_wc_fallback_product_image( $html, $product, $size, $attr, $placeholder ) {
    $slug = $product->get_slug();
    
    $mapping = array(
        'acide-alpha-lipoique' => 'acide-alpha-lipoique.webp',
        'ashwagandha' => 'ashwagandha.webp',
        'astaxanthine' => 'astaxanthine.webp',
        'biotine' => 'biotine.webp',
        'collagene-marin-complex' => 'collagene-marin.webp',
        'collagene-marin-complexe' => 'collagene-marin.webp',
        'collagene-marin' => 'collagene-marin.webp',
        'collagene' => 'collagene-marin.webp',
        'curcumine-et-boswellia' => 'curcumine-boswellia.webp',
        'curcumine-boswellia' => 'curcumine-boswellia.webp',
        'curcumine' => 'curcumine-boswellia.webp',
        'curcumin' => 'curcumine-boswellia.webp',
        'curcumin-boswellia' => 'curcumine-boswellia.webp',
        'curcumin-et-boswellia' => 'curcumine-boswellia.webp',
        'l-carnosine' => 'lcarnosine.webp',
        'lions-mane' => 'lion-mane.webp',
        'lion-mane' => 'lion-mane.webp',
        'neem' => 'neem.webp',
        'nmn' => 'nmn.webp',
        'pack-glowy' => 'astaxanthine.webp',
    );

    $image_name = isset($mapping[$slug]) ? $mapping[$slug] : $slug . '.webp';
    $image_url = get_template_directory_uri() . '/assets/products/' . $image_name;
    $class = isset($attr['class']) ? $attr['class'] : 'wp-post-image';
    
    // Check if we are in cart/checkout for smaller sizes, otherwise let it be responsive
    if ( is_cart() || is_checkout() ) {
        return '<img src="' . esc_url( $image_url ) . '" alt="' . esc_attr( $product->get_name() ) . '" class="' . esc_attr( $class ) . '" style="width:80px; height:80px; object-fit:contain;" />';
    }
    
    return '<img src="' . esc_url( $image_url ) . '" alt="' . esc_attr( $product->get_name() ) . '" class="' . esc_attr( $class ) . '" style="width:100%; height:auto; object-fit:contain;" loading="lazy" />';
}
