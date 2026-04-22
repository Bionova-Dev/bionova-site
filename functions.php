<?php
// Bionova Theme Functions
function bionova_setup() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'bionova_setup' );

// ================================================================
// FORCE: Activation totale tunnel achat — Anti-maintenance radical
// ================================================================

// 1. Force le statut 'En ligne'
update_option('woocommerce_status_options', array('is_store_online' => 'yes'));

// 2. Empêche toute redirection vers maintenance
remove_action('template_redirect', 'wp_redirect_to_maintenance_page');
remove_action('template_redirect', 'wc_disable_author_archives_for_customers', 10);

// 3. Désactive TOUT mode maintenance connu en base de données
update_option('aios_maintenance_mode', '0');
update_option('wp_maintenance_mode', '0');
update_option('site_temporary_maintenance_mode', 0);
update_option('aiowps_site_lockout', '');
update_option('aios_site_lockout', '');
delete_option('aiowps_site_lockout');

// 4. Désactivation forcée de plugins de maintenance via la BDD
add_action('init', function() {
    // Désactiver les plugins de maintenance connus
    $active_plugins = get_option('active_plugins', array());
    $plugins_to_kill = array(
        'all-in-one-wp-security-and-firewall/wp-security.php',
        'maintenance/maintenance.php',
        'coming-soon/coming-soon.php',
        'starter-templates/starter-templates.php',
        'starter-sites/starter-sites.php',
        'cmp-coming-soon-maintenance/cmp-coming-soon-maintenance.php',
        'starter-templates/starter-templates-starter-sites.php',
        'starter-templates-starter-sites/starter-templates.php',
        'starter-templates-starter-sites-starter/starter-templates.php',
        'starter-templates-starter-sites/starter-templates-starter-sites.php',
        'starter-templates-starter-sites-starter/starter-templates-starter-sites-starter.php',
        'starter-templates-starter-sites/starter-sites.php',
        'starter-templates-starter-sites-starter/starter-sites.php',
        'starter-templates-starter-sites/index.php',
        'starter-templates-starter-sites-starter/index.php',
        'starter-templates/index.php',
        'starter-sites/index.php',
        'starter-templates-starter-sites-starter/starter.php',
        'starter-templates-starter-sites-starter/starter-sites-starter.php',
        'starter-templates-starter-sites-starter/starter-templates-starter.php',
        'starter-templates-starter-sites-starter/starter-templates-starter-sites.php',
        'starter-templates-starter-sites/starter-templates.php',
        'starter-templates-starter-sites/starter-sites.php',
        'starter-templates/starter-templates.php',
        'starter-sites/starter-sites.php',
        'starter-templates-starter-sites-starter/starter-templates-starter-sites-starter.php',
        'starter-templates-starter-sites/starter-templates-starter-sites.php',
        'starter-templates/starter-templates.php',
        'starter-sites/starter-sites.php',
    );
    $changed = false;
    foreach ($plugins_to_kill as $plugin) {
        $key = array_search($plugin, $active_plugins);
        if ($key !== false) {
            unset($active_plugins[$key]);
            $changed = true;
        }
    }
    if ($changed) {
        update_option('active_plugins', array_values($active_plugins));
    }

    // 5. Création forcée des pages WooCommerce (Panier + Checkout)
    $pages = array(
        'panier' => array(
            'title'     => 'Panier',
            'content'   => '[woocommerce_cart]',
            'option'    => 'woocommerce_cart_page_id',
        ),
        'commande' => array(
            'title'     => 'Validation de commande',
            'content'   => '[woocommerce_checkout]',
            'option'    => 'woocommerce_checkout_page_id',
        ),
    );

    foreach ($pages as $slug => $data) {
        $page = get_page_by_path($slug);
        if (!$page) {
            $page_id = wp_insert_post(array(
                'post_title'   => $data['title'],
                'post_name'    => $slug,
                'post_content' => $data['content'],
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_author'  => 1,
            ));
            if (!is_wp_error($page_id)) {
                update_option($data['option'], $page_id);
            }
        } else {
            // Si la page existe mais est en brouillon, la publier
            if ($page->post_status !== 'publish') {
                wp_update_post(array('ID' => $page->ID, 'post_status' => 'publish'));
            }
            update_option($data['option'], $page->ID);
        }
    }

    // 6. Flush des permaliens
    flush_rewrite_rules();
}, 1);

// ============================================================
// OPTIMISATION — Désactivation scripts WC hors boutique
// ============================================================
add_action( 'wp_enqueue_scripts', 'bionova_dequeue_wc_assets', 999 );
function bionova_dequeue_wc_assets() {
    if ( function_exists( 'is_woocommerce' ) ) {
        if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() && ! is_account_page() ) {
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
// HEARTBEAT — Désactivé sauf éditeur
// ============================================================
add_filter( 'heartbeat_settings', function( $settings ) {
    $settings['interval'] = 60;
    return $settings;
});
add_action( 'init', function() {
    global $pagenow;
    if ( $pagenow !== 'post.php' && $pagenow !== 'post-new.php' ) {
        wp_deregister_script( 'heartbeat' );
    }
}, 1 );

// ============================================================
// NETTOYAGE HEADER — Emojis, oEmbed, scripts inutiles
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
add_action( 'wp_footer', function() { wp_dequeue_script( 'wp-embed' ); });

// ============================================================
// QUERY STRINGS — Suppression pour meilleur cache
// ============================================================
add_filter( 'script_loader_src', 'bionova_remove_qs', 15, 1 );
add_filter( 'style_loader_src', 'bionova_remove_qs', 15, 1 );
function bionova_remove_qs( $src ) {
    if ( strpos( $src, 'ver=' ) ) {
        $src = remove_query_arg( 'ver', $src );
    }
    return $src;
}

// ============================================================
// WOOCOMMERCE — Config Tunisie
// ============================================================
add_filter( 'woocommerce_is_purchasable', '__return_true' );
add_filter( 'woocommerce_checkout_fields', function( $fields ) {
    $fields['billing']['billing_country']['default'] = 'TN';
    return $fields;
});
add_filter( 'woocommerce_countries', function( $countries ) {
    return array( 'TN' => 'Tunisie' );
});
?>
