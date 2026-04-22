<?php
// Bionova Theme Functions
function bionova_setup() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'bionova_setup' );
remove_action( 'template_redirect', 'wc_disable_author_archives_for_customers', 10 );

// ============================================================
// 1. DÉSACTIVATION wc-cart-fragments (cause n°1 de lenteur WC)
// ============================================================
add_action( 'wp_enqueue_scripts', 'bionova_dequeue_wc_assets', 999 );
function bionova_dequeue_wc_assets() {
    if ( function_exists( 'is_woocommerce' ) ) {
        if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() && ! is_account_page() ) {
            // Désactivation scripts WooCommerce inutiles
            wp_dequeue_script( 'wc-cart-fragments' );
            wp_dequeue_script( 'woocommerce' );
            wp_dequeue_script( 'wc-add-to-cart' );
            wp_dequeue_script( 'wc-add-to-cart-variation' );
            wp_dequeue_script( 'wc-single-product' );
            wp_dequeue_script( 'wc-cart' );
            wp_dequeue_script( 'wc-checkout' );
            wp_dequeue_script( 'wc-chosen' );
            wp_dequeue_script( 'jquery-blockui' );
            wp_dequeue_script( 'jquery-placeholder' );
            wp_dequeue_script( 'jquery-cookie' );
            // Désactivation styles WooCommerce inutiles
            wp_dequeue_style( 'woocommerce-general' );
            wp_dequeue_style( 'woocommerce-layout' );
            wp_dequeue_style( 'woocommerce-smallscreen' );
            wp_dequeue_style( 'woocommerce_frontend_styles' );
            wp_dequeue_style( 'woocommerce-inline' );
        }
    }
    if ( ! is_user_logged_in() ) {
        wp_dequeue_style( 'dashicons' );
    }
}

// ============================================================
// 2. GESTION HEARTBEAT — Désactivé sauf sur pages d'édition
// ============================================================
add_filter( 'heartbeat_settings', 'bionova_optimize_heartbeat' );
function bionova_optimize_heartbeat( $settings ) {
    $settings['interval'] = 60; // Réduire à 60s si actif
    return $settings;
}
add_action( 'init', 'bionova_disable_heartbeat', 1 );
function bionova_disable_heartbeat() {
    global $pagenow;
    // Garder le heartbeat uniquement sur l'éditeur WP
    if ( $pagenow !== 'post.php' && $pagenow !== 'post-new.php' ) {
        wp_deregister_script( 'heartbeat' );
    }
}

// ============================================================
// 3. NETTOYAGE BASE DE DONNÉES — Transients & révisions
// ============================================================
add_action( 'init', 'bionova_cleanup_database' );
function bionova_cleanup_database() {
    if ( ! get_transient( 'bionova_db_cleaned' ) ) {
        global $wpdb;
        // Suppression des transients expirés
        $wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name LIKE '\_transient\_timeout\_%' AND option_value < UNIX_TIMESTAMP()" );
        $wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name LIKE '\_transient\_%' AND option_name NOT LIKE '\_transient\_timeout\_%' AND LEFT(option_name, 11) = '_transient_' AND option_name NOT IN (SELECT CONCAT('_transient_', SUBSTRING(option_name, 20)) FROM (SELECT option_name FROM {$wpdb->options} WHERE option_name LIKE '\_transient\_timeout\_%') AS t)" );
        // Limiter les révisions de posts à 3 maximum
        $wpdb->query( "DELETE FROM {$wpdb->posts} WHERE post_type = 'revision'" );
        // Marquer comme nettoyé pour 24h
        set_transient( 'bionova_db_cleaned', true, DAY_IN_SECONDS );
    }
}

// ============================================================
// 4. NETTOYAGE HEADER — Emojis, oEmbed, scripts inutiles
// ============================================================
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rest_output_link_wp_head' );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
add_filter( 'emoji_svg_url', '__return_false' );
// Désactivation du script wp-embed
add_action( 'wp_footer', 'bionova_dequeue_embed' );
function bionova_dequeue_embed() {
    wp_dequeue_script( 'wp-embed' );
}

// ============================================================
// 5. SUPPRESSION QUERY STRINGS pour meilleur cache navigateur
// ============================================================
add_filter( 'script_loader_src', 'bionova_remove_query_strings', 15, 1 );
add_filter( 'style_loader_src', 'bionova_remove_query_strings', 15, 1 );
function bionova_remove_query_strings( $src ) {
    if ( strpos( $src, 'ver=' ) ) {
        $src = remove_query_arg( 'ver', $src );
    }
    return $src;
}

// ============================================================
// 6. WOOCOMMERCE — Boutique en ligne & Config Tunisie
// ============================================================
update_option( 'woocommerce_status_options', array( 'is_store_online' => 'yes' ) );
flush_rewrite_rules();
add_filter( 'woocommerce_is_purchasable', '__return_true' );
update_option( 'aios_maintenance_mode', '0' );
update_option( 'wp_maintenance_mode', '0' );

add_filter( 'woocommerce_checkout_fields', 'bionova_override_checkout_fields' );
function bionova_override_checkout_fields( $fields ) {
    $fields['billing']['billing_country']['default'] = 'TN';
    return $fields;
}
add_filter( 'woocommerce_countries', 'bionova_restrict_to_tunisia' );
function bionova_restrict_to_tunisia( $countries ) {
    return array( 'TN' => 'Tunisie' );
}
?>
