<?php 
/**
 * Bionova Pro Max Functions — Atomic Loader
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// 0. Force Permalinks (Fix 404)
function bionova_force_permalinks() {
    if ( get_option( 'permalink_structure' ) !== '/%postname%/' ) {
        update_option( 'permalink_structure', '/%postname%/' );
        flush_rewrite_rules();
    }
}
add_action( 'admin_init', 'bionova_force_permalinks' );

/**
 * Get dynamic URL by slug
 */
function bionova_get_slug_url($slug) {
    $page = get_page_by_path($slug);
    if ($page) {
        return get_permalink($page->ID);
    }
    return home_url('/' . $slug . '/');
}

// 1. Core Modules
require_once get_template_directory() . '/inc/setup.php';
require_once get_template_directory() . '/inc/woocommerce.php';
require_once get_template_directory() . '/inc/performance.php';
require_once get_template_directory() . '/inc/header-styles.php';
require_once get_template_directory() . '/inc/pages-setup.php';
require_once get_template_directory() . '/inc/professional-account.php';


// 2. Custom Scripts & Styles Enqueue
function bionova_atomic_assets() {
    // We only enqueue global CSS here. JS is handled in index.php for the SPA.
    wp_enqueue_style( 'bionova-tokens',     get_template_directory_uri() . '/css/design-tokens.css', array(),                   filemtime(get_template_directory() . '/css/design-tokens.css') );
    wp_enqueue_style( 'bionova-base',       get_template_directory_uri() . '/css/base.css',           array('bionova-tokens'),   filemtime(get_template_directory() . '/css/base.css') );
    wp_enqueue_style( 'bionova-animations', get_template_directory_uri() . '/css/animations.css',     array('bionova-base'),     filemtime(get_template_directory() . '/css/animations.css') );
    wp_enqueue_style( 'bionova-responsive', get_template_directory_uri() . '/css/responsive.css',     array('bionova-base'),     filemtime(get_template_directory() . '/css/responsive.css') );
}
add_action( 'wp_enqueue_scripts', 'bionova_atomic_assets' );

// --- SCRIPT D'IMPORT AUTOMATIQUE DES IMAGES PRODUITS ---
add_action('init', 'bionova_auto_import_product_images');
function bionova_auto_import_product_images() {
    if ( get_option('bionova_images_imported_v2') ) {
        return; // Exécuté une seule fois
    }

    if ( ! function_exists( 'wp_generate_attachment_metadata' ) ) {
        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        require_once( ABSPATH . 'wp-admin/includes/media.php' );
    }

    $products_dir = get_template_directory() . '/assets/products/';
    if ( ! is_dir( $products_dir ) ) {
        return;
    }

    // Récupérer toutes les images png du dossier products
    $files = glob( $products_dir . '*.png' );
    
    foreach ( $files as $file ) {
        $filename = basename( $file );
        // Nettoyer le nom pour obtenir le slug
        $slug = sanitize_title( pathinfo( $filename, PATHINFO_FILENAME ) );
        
        // 1. Chercher par slug
        $args = array(
            'post_type'      => 'product',
            'post_name__in'  => array( $slug ),
            'post_status'    => 'any',
            'posts_per_page' => 1
        );
        $query = new WP_Query( $args );

        // 2. Si non trouvé, chercher par nom approximatif
        if ( ! $query->have_posts() ) {
            $args = array(
                'post_type'      => 'product',
                's'              => str_replace('-', ' ', $slug),
                'post_status'    => 'any',
                'posts_per_page' => 1
            );
            $query = new WP_Query( $args );
        }

        if ( $query->have_posts() ) {
            $product_id = $query->posts[0]->ID;
            
            // Copier dans le dossier temporaire pour l'upload WordPress
            $tmp_file = wp_tempnam( $filename );
            copy( $file, $tmp_file );
            $file_array = array(
                'name'     => $filename,
                'tmp_name' => $tmp_file
            );
            
            // Sideload et attachement à la librairie média
            $attachment_id = media_handle_sideload( $file_array, $product_id );

            if ( ! is_wp_error( $attachment_id ) ) {
                // Définir l'image comme "Image mise en avant"
                set_post_thumbnail( $product_id, $attachment_id );
            }
        }
    }
    
    // Marquer l'importation comme terminée pour éviter de recommencer
    update_option('bionova_images_imported_v2', true);
}

/**
 * Force Cache Purge for Stability
 */
function bionova_purge_cache_on_load() {
    // LiteSpeed Cache
    if ( class_exists( 'LiteSpeed_Cache_API' ) ) {
        LiteSpeed_Cache_API::purge_all();
    }
    // WP Rocket
    if ( function_exists( 'rocket_clean_domain' ) ) {
        rocket_clean_domain();
    }
}
add_action( 'init', 'bionova_purge_cache_on_load' );

/**
 * Enqueue compiled React bundle with robust filename-based cache busting
 */
function bionova_render_react_bundle() {
    clearstatcache();
    $bundle_files = glob(get_template_directory() . '/dist/bundle.v*.js');
    if (!empty($bundle_files)) {
        // Sort by modification time to get the latest one
        usort($bundle_files, function($a, $b) {
            return filemtime($b) - filemtime($a);
        });
        $bundle_name = basename($bundle_files[0]);
        $bundle_url = get_template_directory_uri() . '/dist/' . $bundle_name;
    } else {
        // Fallback if no hashed bundle is found
        $bundle_url = get_template_directory_uri() . '/dist/bundle.min.js';
    }
    $cache_buster = time();
    echo '<script defer src="' . esc_url($bundle_url) . '?v=' . $cache_buster . '"></script>';
}
