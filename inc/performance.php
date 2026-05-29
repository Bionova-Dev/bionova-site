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

// ── Performance: Defer non-critical scripts ──
function bionova_defer_scripts( $tag, $handle, $src ) {
    $defer_handles = array( 'wp-embed', 'jquery-migrate', 'wp-polyfill' );
    if ( in_array( $handle, $defer_handles ) ) {
        return '<script src="' . $src . '" defer></script>' . "\n";
    }
    return $tag;
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

// ── Remove query strings from static resources ──
function bionova_remove_script_version( $src ){
    $parts = explode( '?ver', $src );
    return $parts[0];
}
add_filter( 'script_loader_src', 'bionova_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', 'bionova_remove_script_version', 15, 1 );
