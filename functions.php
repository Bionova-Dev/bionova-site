<?php
/**
 * Bionova Pro Max Functions — Atomic Loader
 * VERSION: 20260511
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// 1. Core Modules
require_once get_template_directory() . '/inc/setup.php';
require_once get_template_directory() . '/inc/woocommerce.php';
require_once get_template_directory() . '/inc/performance.php';
require_once get_template_directory() . '/inc/header-styles.php';
require_once get_template_directory() . '/inc/pages-setup.php';

// 2. Custom Scripts & Styles Enqueue
function bionova_atomic_assets() {
    // We only enqueue global CSS here. JS is handled in index.php for the SPA.
    wp_enqueue_style( 'bionova-tokens', get_template_directory_uri() . '/css/design-tokens.css', array(), '1.0.0' );
    wp_enqueue_style( 'bionova-base', get_template_directory_uri() . '/css/base.css', array('bionova-tokens'), '1.0.0' );
    wp_enqueue_style( 'bionova-animations', get_template_directory_uri() . '/css/animations.css', array('bionova-base'), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'bionova_atomic_assets' );
