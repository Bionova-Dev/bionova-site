<?php
/**
 * Bionova Performance & Security
 * VERSION: 20260511
 */

// Remove maintenance file if it exists
function bionova_clear_maintenance() {
    $maintenance_file = ABSPATH . '.maintenance';
    if ( file_exists( $maintenance_file ) ) {
        @unlink( $maintenance_file );
    }
}
add_action( 'init', 'bionova_clear_maintenance' );

// Optimization: Defer non-critical scripts
function bionova_defer_scripts( $tag, $handle, $src ) {
    $defer_handles = array( 'wp-embed', 'jquery-migrate' );
    if ( in_array( $handle, $defer_handles ) ) {
        return '<script src="' . $src . '" defer></script>' . "\n";
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'bionova_defer_scripts', 10, 3 );
