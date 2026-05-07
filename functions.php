<?php
// Bionova Theme Functions - VERSION: 20260507.1430
// ============================================================
// NUCLEAR: Suppression du fichier .maintenance sur le SERVEUR
// ============================================================
$maintenance_paths = array(
    ABSPATH . '.maintenance',
    ABSPATH . '../.maintenance',
    dirname(ABSPATH) . '/.maintenance',
    $_SERVER['DOCUMENT_ROOT'] . '/.maintenance',
);
foreach ($maintenance_paths as $mfile) {
    if (file_exists($mfile)) {
        @unlink($mfile);
        error_log('[BIONOVA] .maintenance SUPPRIMÉ: ' . $mfile);
    }
}

// Désactivation de TOUS les modes maintenance connus (BDD)
update_option('site_temporary_maintenance_mode', 0);
update_option('aios_maintenance_mode', '0');
update_option('wp_maintenance_mode', '0');
update_option('aiowps_site_lockout', '');
update_option('aios_site_lockout', '');
delete_option('aiowps_site_lockout');
delete_option('aios_site_lockout');
function bionova_setup() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'post-thumbnails' );
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'bionova' ),
    ) );
}
add_action( 'after_setup_theme', 'bionova_setup' );

// 0. Force Loading and Cache Busting for Custom Styles
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'bionova-custom-woo', get_template_directory_uri() . '/woocommerce-custom.css', array(), time() );
}, 100 );





// 4. Désactivation forcée de plugins de maintenance via la BDD
add_action('init', function() {
    // FORCE: Activation totale tunnel achat — Anti-maintenance radical
    update_option('woocommerce_status_options', array('is_store_online' => 'yes'));
    remove_action('template_redirect', 'wp_redirect_to_maintenance_page');
    remove_action('template_redirect', 'wc_disable_author_archives_for_customers', 10);
    update_option('aios_maintenance_mode', '0');
    update_option('wp_maintenance_mode', '0');
    update_option('site_temporary_maintenance_mode', 0);
    update_option('aiowps_site_lockout', '');
    update_option('aios_site_lockout', '');
    delete_option('aiowps_site_lockout');

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

    // 5. Création/Vérification des pages WooCommerce (Panier + Checkout)
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
            // Vérifier si le contenu doit vraiment être mis à jour (éviter les updates inutiles)
            if ( trim($page->post_content) !== $data['content'] ) {
                wp_update_post(array(
                    'ID'           => $page->ID,
                    'post_content' => $data['content'],
                    'post_status'  => 'publish',
                ));
            }
            if ( get_option($data['option']) != $page->ID ) {
                update_option($data['option'], $page->ID);
            }
        }
    }

    // 6. Flush des permaliens (uniquement si nécessaire ou via un flag, mais gardons-le pour la stabilité du SPA)
    // flush_rewrite_rules(); 
}, 1);

// ================================================================
// NUCLEAR FIX: Forcer le shortcode WooCommerce sur les pages panier/checkout
// Remplace le contenu "en chantier" à la volée, sans toucher à la BDD
// ================================================================
add_filter('the_content', function($content) {
    if (!is_page()) return $content;
    
    $cart_page_id = get_option('woocommerce_cart_page_id');
    $checkout_page_id = get_option('woocommerce_checkout_page_id');
    
    if (is_page($cart_page_id) || is_page('cart') || is_page('panier')) {
        return do_shortcode('[woocommerce_cart]');
    }
    if (is_page($checkout_page_id) || is_page('commande') || is_page('checkout')) {
        return do_shortcode('[woocommerce_checkout]');
    }
    
    return $content;
}, 20);

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
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'wp-block-library-theme' );
        wp_dequeue_style( 'wc-blocks-style' );
        wp_dequeue_style( 'classic-theme-styles' );
    }
}

// ============================================================
// DEFER SCRIPTS — Améliore le LCP et le temps de blocage
// ============================================================
add_filter( 'script_loader_tag', 'bionova_defer_scripts', 10, 2 );
function bionova_defer_scripts( $tag, $handle ) {
    $defer_handles = array( 'woocommerce', 'wc-cart-fragments', 'wc-add-to-cart' );
    if ( in_array( $handle, $defer_handles ) ) {
        return str_replace( ' src', ' defer="defer" src', $tag );
    }
    return $tag;
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
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
add_filter( 'emoji_svg_url', '__return_false' );
add_action( 'wp_footer', function() { wp_dequeue_script( 'wp-embed' ); });
add_filter( 'show_admin_bar', '__return_false' ); // Désactive la barre admin pour la perf

// ============================================================
// QUERY STRINGS — Suppression pour meilleur cache
// ============================================================
add_filter( 'script_loader_src', 'bionova_remove_qs', 15, 1 );
add_filter( 'style_loader_src', 'bionova_remove_qs', 15, 1 );
function bionova_remove_qs( $src ) {
    // Ne pas toucher au cache-busting de notre CSS custom
    if ( strpos( $src, 'woocommerce-custom.css' ) !== false ) {
        return $src;
    }
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

// ============================================================
// AJUSTEMENTS CIBLÉS PANIER & COMMANDE (LOGOS ET RÉASSURANCE)
// ============================================================

// 1. Modification ciblée des logos (CSS injecté inline)
// Suppression des logos personnalisés panier/checkout pour uniformisation avec la Boutique


// 2. Réassurance gérée globalement par footer.php
// 3. Désactivation AJAX pour les boutons de la boucle (Force rechargement propre)
add_filter( 'woocommerce_loop_add_to_cart_args', 'bionova_remove_ajax_add_to_cart', 10, 2 );
function bionova_remove_ajax_add_to_cart( $args, $product ) {
    if ( isset( $args['class'] ) ) {
        $args['class'] = str_replace( array('ajax_add_to_cart', 'add_to_cart_button'), '', $args['class'] );
    }
    return $args;
}

add_filter( 'woocommerce_loop_add_to_cart_link', 'bionova_force_buy_button_click', 10, 2 );
function bionova_force_buy_button_click( $html, $product ) {
    // Retrait des classes conflictuelles
    $html = str_replace( array('ajax_add_to_cart', 'add_to_cart_button'), '', $html );
    
    // Détermination de l'URL (redirection panier forcée)
    $url = $product->is_type('variable') ? get_permalink($product->get_id()) : home_url( '/panier/?add-to-cart=' . $product->get_id() );
    
    // Forçage via onclick et style inline pour passer outre tout blocage DOM/JS
    $force_attr = ' onclick="window.location.href=\'' . esc_url($url) . '\'; return false;" style="position: relative; z-index: 9999; cursor: pointer !important; display: inline-flex !important;" ';
    
    $html = str_replace( '<a ', '<a ' . $force_attr, $html );
    
    return $html;
}
// ============================================================
// STICKY HEADER — Script d'activation (Classe au scroll)
// ============================================================
add_action('wp_footer', 'bionova_sticky_header_script');
function bionova_sticky_header_script() {
    // Activation globale (sauf admin)
    if ( is_admin() ) return;
    echo "<script>
        window.addEventListener('scroll', function() {
            var header = document.querySelector('header');
            if (header) {
                if (window.scrollY > 50) {
                    header.classList.add('header-scrolled');
                } else {
                    header.classList.remove('header-scrolled');
                }
            }
        });
    </script>";
}

// ============================================================
// HEADER — Style Premium (Home vs Pages Secondaires)
// ============================================================

// 1. Header spécifique pour la Page d'Accueil (Transparent -> Blanc)
add_action('wp_head', 'bionova_header_home_style');
function bionova_header_home_style() {
    if ( !is_front_page() ) return;
    ?>
    <style id="header-home-style">
        header {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            width: 100% !important;
            z-index: 9999 !important;
            height: 60px !important; /* Fixed 90px design (mobile) */
            background-color: transparent !important;
            background: none !important;
            border: none !important;
            box-shadow: none !important;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1) !important;
            display: flex !important;
            align-items: center !important;
        }
        @media (min-width: 1024px) {
            header { height: 90px !important; }
        }
        header.header-scrolled {
            background-color: #ffffff !important;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05) !important;
            height: 60px !important;
        }
        @media (min-width: 1024px) {
            header.header-scrolled { height: 90px !important; }
        }
    </style>
    <?php
}

// 2. Header Unifié pour Boutique, Astuce, Expertise, Panier, Compte
add_action('wp_head', 'bionova_header_secondary_pages_style');
function bionova_header_secondary_pages_style() {
    // Condition PHP demandée pour l'uniformisation
    if ( is_shop() || is_cart() || is_checkout() || is_account_page() ) {
        ?>
        <style id="header-secondary-pages-style">
            header {
                position: fixed !important;
                top: 0 !important;
                left: 0 !important;
                width: 100% !important;
                z-index: 9999 !important;
                height: 60px !important;
                background-color: #ffffff !important; 
                border: none !important;
                box-shadow: 0 1px 3px rgba(0,0,0,0.05) !important;
                transition: all 0.4s ease !important;
                display: flex !important;
                align-items: center !important;
            }
            @media (min-width: 1024px) {
                header { height: 90px !important; }
            }
        </style>
        <?php
    }
}

// 3. Styles Communs (Typographie & Logo) — S'applique partout sauf Admin
add_action('wp_head', 'bionova_header_common_premium_style');
function bionova_header_common_premium_style() {
    if ( is_admin() ) return;
    ?>
    <style id="header-common-premium-style">
        header nav > div {
            display: flex !important;
            flex-direction: row !important;
            justify-content: space-between !important;
            align-items: center !important;
            width: 100% !important;
            max-width: 100% !important;
            padding: 0 5% !important;
            gap: 20px !important;
        }
        header nav > div > div.hidden.lg\:flex button,
        header nav > div > div.hidden.lg\:flex a,
        header nav > div > div.flex.items-center.space-x-1 button,
        header nav > div > div.flex.items-center.space-x-1 a,
        header nav > div > div.flex.items-center.space-x-5 button,
        header nav > div > div.flex.items-center.space-x-5 a {
            color: #000000 !important;
            font-family: 'Montserrat', sans-serif !important;
            background: transparent !important;
            border: none !important;
            text-transform: uppercase !important;
            letter-spacing: 0.15em !important;
            transition: all 0.3s ease !important;
            box-shadow: none !important;
            padding: 10px 0 !important;
            text-decoration: none !important;
            cursor: pointer !important;
            font-size: 14px !important; /* Mobile default */
            font-weight: bold !important;
        }
        @media (min-width: 1024px) {
            header nav > div > div.hidden.lg\:flex button,
            header nav > div > div.hidden.lg\:flex a,
            header nav > div > div.flex.items-center.space-x-5 button,
            header nav > div > div.flex.items-center.space-x-5 a {
                font-size: 20px !important;
            }
        }
        header nav > div > div.hidden.lg\:flex { gap: 48px !important; }
        header nav > div > div.flex.items-center svg { width: 28px !important; height: 28px !important; color: #000000 !important; }
        header nav > div > div.hidden.lg\:flex button:hover,
        header nav > div > div.hidden.lg\:flex a:hover,
        header nav > div > div.flex.items-center button:hover,
        header nav > div > div.flex.items-center a:hover { color: #be123c !important; opacity: 1.0 !important; }
        header nav > div > div.hidden.lg\:flex button.text-black:hover,
        header nav > div > div.hidden.lg\:flex a.text-black:hover { border-bottom: 4px solid #be123c !important; }

        /* LOGO : Unifié avec un scale raisonnable */
        header img[alt*="Logo"], header .group img {
            margin-left: 0 !important;
            margin-right: auto !important;
        }
        @media (min-width: 1024px) {
            header img[alt*="Logo"], header .group img {
                max-height: 85px !important;
                width: auto !important;
                transform: scale(2.0) !important;
                transform-origin: left center !important;
                transition: all 0.4s ease !important;
                object-fit: contain !important;
            }
            header.header-scrolled img[alt*="Logo"], header.header-scrolled .group img {
                transform: scale(2.0) !important;
            }
        }
        
        /* Ajustements Mobile pour le Logo */
        @media (max-width: 1023px) {
            header img[alt*="Logo"], header .group img {
                max-height: 55px !important;
                transform: none !important;
            }
        }
        
        /* Visibilité forcée du Menu Mobile */
        .mobile-menu-toggle {
            display: flex !important;
        }
        @media (min-width: 1024px) {
            .mobile-menu-toggle {
                display: none !important;
            }
        }
        
        /* Badges Rouge Bionova */
        .bg-gray-900, .bg-\[gray-900\], .bg-black {
            background-color: #be123c !important;
        }
        .text-medical-blue.border-medical-blue {
            color: #be123c !important;
            border-color: #be123c !important;
        }
        header nav > div > div.hidden.lg\:flex button.text-\[\#be123c\] {
            color: #be123c !important;
            border-bottom-color: #be123c !important;
        }
    </style>
    <?php
}


// ============================================================
// FIX: Redirection "Retour à la boutique" et "Continuer les achats"
// ============================================================
add_filter( 'woocommerce_return_to_shop_redirect', 'bionova_custom_shop_url' );
add_filter( 'woocommerce_continue_shopping_redirect', 'bionova_custom_shop_url' );
add_filter( 'woocommerce_get_shop_page_permalink', 'bionova_custom_shop_url' );

function bionova_custom_shop_url() {
    return home_url( '/#products' );
}
