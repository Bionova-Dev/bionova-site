<?php
/**
 * Bionova Performance & Security Optimization
 * VERSION: 20260514
 * Target: Lighthouse 100
 */

// Remove maintenance file if it exists
function bionova_clear_maintenance() {
    $maintenance_file = ABSPATH . '.maintenance';
    if ( file_exists( $maintenance_file ) ) {
        @unlink( $maintenance_file );
    }
}
add_action( 'init', 'bionova_clear_maintenance' );

// ── Performance: Defer scripts ──
function bionova_defer_scripts( $tag, $handle, $src ) {
    // Ne pas différer jQuery core car certains plugins en ont besoin immédiatement
    if ( 'jquery-core' === $handle || 'jquery' === $handle ) {
        return $tag;
    }
    
    // Si la balise contient déjà defer ou async, on ne touche à rien
    if ( strpos( $tag, 'defer' ) !== false || strpos( $tag, 'async' ) !== false ) {
        return $tag;
    }

    // Ajouter defer
    return str_replace( ' src', ' defer="defer" src', $tag );
}
add_filter( 'script_loader_tag', 'bionova_defer_scripts', 10, 3 );

// ── Remove unnecessary WordPress features for speed ──
function bionova_cleanup_head() {
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wp_shortlink_wp_head' );
    remove_action( 'wp_head', 'rest_output_link_wp_head' );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
}
add_action( 'init', 'bionova_cleanup_head' );

// ── Disable WP Embed script ──
function bionova_deregister_scripts() {
    wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'bionova_deregister_scripts' );

// ── Disable jQuery Migrate ──
function bionova_remove_jquery_migrate( $scripts ) {
    if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
        $script = $scripts->registered['jquery'];
        if ( $script->deps ) {
            $script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
        }
    }
}
add_action( 'wp_default_scripts', 'bionova_remove_jquery_migrate' );

// ── Add resource hints for third-party origins ──
function bionova_resource_hints( $urls, $relation_type ) {
    if ( 'dns-prefetch' === $relation_type ) {
        $urls[] = '//fonts.googleapis.com';
        $urls[] = '//fonts.gstatic.com';
        $urls[] = '//cdn.tailwindcss.com';
        $urls[] = '//unpkg.com';
    }
    return $urls;
}
add_filter( 'wp_resource_hints', 'bionova_resource_hints', 10, 2 );

// ── Remove global styles (Gutenberg) ──
function bionova_remove_global_styles() {
    wp_dequeue_style( 'global-styles' );
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'classic-theme-styles' );
}
add_action( 'wp_enqueue_scripts', 'bionova_remove_global_styles', 100 );

// ── Dequeue Dashicons for Guests ──
function bionova_dequeue_dashicons() {
    if ( ! is_user_logged_in() ) {
        wp_deregister_style( 'dashicons' );
    }
}
add_action( 'wp_enqueue_scripts', 'bionova_dequeue_dashicons' );

// ── Disable Heartbeats on frontend ──
function bionova_stop_heartbeat() {
    if ( ! is_admin() ) {
        wp_deregister_script('heartbeat');
    }
}
add_action( 'init', 'bionova_stop_heartbeat', 1 );

/* Query string removal disabled — was breaking WordPress cache busting */

// ── Disable WooCommerce bloat on non-shop pages ──
function bionova_optimize_woocommerce_scripts() {
    if ( function_exists( 'is_woocommerce' ) ) {
        // Only load on WooCommerce pages, cart, checkout, or account
        if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() && ! is_account_page() ) {
            
            // Dequeue scripts
            wp_dequeue_script( 'wc-add-to-cart' );
            wp_dequeue_script( 'wc-cart-fragments' );
            wp_dequeue_script( 'woocommerce' );
            wp_dequeue_script( 'jquery-blockui' );
            wp_dequeue_script( 'jquery-placeholder' );
            wp_dequeue_script( 'jquery-cookie' );
            wp_dequeue_script( 'selectWoo' );
            
            // Dequeue styles
            wp_dequeue_style( 'woocommerce-layout' );
            wp_dequeue_style( 'woocommerce-general' );
            wp_dequeue_style( 'woocommerce-smallscreen' );
            wp_dequeue_style( 'woocommerce_frontend_styles' );
            wp_dequeue_style( 'woocommerce_fancybox_styles' );
            wp_dequeue_style( 'woocommerce_chosen_styles' );
            wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
            wp_dequeue_style( 'select2' );
        }
    }
}
add_action( 'wp_enqueue_scripts', 'bionova_optimize_woocommerce_scripts', 99 );
