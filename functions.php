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
            // FORCE: Écraser le contenu avec le bon shortcode WooCommerce
            wp_update_post(array(
                'ID'           => $page->ID,
                'post_content' => $data['content'],
                'post_status'  => 'publish',
            ));
            update_option($data['option'], $page->ID);
        }
    }

    // 6. Flush des permaliens
    flush_rewrite_rules();
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
        return '[woocommerce_cart]';
    }
    if (is_page($checkout_page_id) || is_page('commande') || is_page('checkout')) {
        return '[woocommerce_checkout]';
    }
    
    return $content;
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

// ============================================================
// AJUSTEMENTS CIBLÉS PANIER & COMMANDE (LOGOS ET RÉASSURANCE)
// ============================================================

// 1. Modification ciblée des logos (CSS injecté inline)
add_action('wp_head', 'custom_cart_checkout_logos');
function custom_cart_checkout_logos() {
    if ( is_cart() || is_checkout() || is_account_page() ) {
        echo '<style id="cart-checkout-custom-logos">
            /* Logo Bionova Uniquement (Via classes Tailwind) */
            header img.h-\[120px\], header img.md\:h-\[160px\], header img[alt*="Logo"] { max-width: 150px !important; height: auto !important; transform: none !important; }
            /* Logo Gris (Footer) */
            footer img { display: none !important; }
        </style>';
    }
}

// 2. Injection des éléments de Réassurance
add_action('woocommerce_after_cart', 'ajouter_reassurance_bionova');
add_action('woocommerce_after_checkout_form', 'ajouter_reassurance_bionova');
add_action('woocommerce_after_my_account', 'ajouter_reassurance_bionova');

function ajouter_reassurance_bionova() {
    ?>
    <div class="bg-white border-b border-gray-100 relative z-20 mb-10 rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 py-8 sm:py-10">
                <!-- Paiement -->
                <div class="flex flex-col sm:flex-row items-center text-center sm:text-left group cursor-pointer transition-transform duration-300 hover:-translate-y-[2px]">
                    <div class="mb-4 sm:mb-0 sm:mr-5 p-3 rounded-xl bg-[#f0fdf4] text-[#075985] group-hover:bg-[#075985] group-hover:text-white transition-colors duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-display font-bold text-sm text-gray-900 leading-tight">Paiement à la livraison</h4>
                        <p class="text-[11px] text-gray-400 font-medium uppercase tracking-tight mt-1">Simple et sécurisé</p>
                    </div>
                </div>
                <!-- Support -->
                <div class="flex flex-col sm:flex-row items-center text-center sm:text-left group cursor-pointer transition-transform duration-300 hover:-translate-y-[2px]">
                    <div class="mb-4 sm:mb-0 sm:mr-5 p-3 rounded-xl bg-[#f0fdf4] text-[#075985] group-hover:bg-[#075985] group-hover:text-white transition-colors duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-display font-bold text-sm text-gray-900 leading-tight">Support 7j/7</h4>
                        <p class="text-[11px] text-gray-400 font-medium uppercase tracking-tight mt-1">Service client à l'écoute</p>
                    </div>
                </div>
                <!-- Livraison -->
                <div class="flex flex-col sm:flex-row items-center text-center sm:text-left group cursor-pointer transition-transform duration-300 hover:-translate-y-[2px]">
                    <div class="mb-4 sm:mb-0 sm:mr-5 p-3 rounded-xl bg-[#f0fdf4] text-[#075985] group-hover:bg-[#075985] group-hover:text-white transition-colors duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3m-1 4a2 2 0 100-4 2 2 0 000 4zm-8 0a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-display font-bold text-sm text-gray-900 leading-tight">Livraison gratuite</h4>
                        <p class="text-[11px] text-gray-400 font-medium uppercase tracking-tight mt-1">Dès 150 DT d'achat</p>
                    </div>
                </div>
                <!-- Prix -->
                <div class="flex flex-col sm:flex-row items-center text-center sm:text-left group cursor-pointer transition-transform duration-300 hover:-translate-y-[2px]">
                    <div class="mb-4 sm:mb-0 sm:mr-5 p-3 rounded-xl bg-[#f0fdf4] text-[#075985] group-hover:bg-[#075985] group-hover:text-white transition-colors duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-display font-bold text-sm text-gray-900 leading-tight">Meilleur prix garanti</h4>
                        <p class="text-[11px] text-gray-400 font-medium uppercase tracking-tight mt-1">Direct laboratoire</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
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
// STICKY HEADER — Effet Premium (Transparent -> Blanc)
// ============================================================
// STICKY HEADER — Script d'activation (Classe au scroll)
// ============================================================
add_action('wp_footer', 'bionova_sticky_header_script');
function bionova_sticky_header_script() {
    // BOUCLIER PHP : On bloque l'exécution sur la page Astuces et les articles
    if ( is_page('astuce') || is_page('astuces') || is_singular('post') || is_archive() || (!is_front_page() && !is_shop()) ) {
        return;
    }
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
// HEADER — Style Épuré Biocyte (Design Final)
// ============================================================
add_action('wp_head', 'bionova_header_refined_style');
function bionova_header_refined_style() {
    // BOUCLIER PHP : Isolation totale pour restaurer le header d'origine
    if ( is_page('astuce') || is_page('astuces') || is_singular('post') || is_archive() || (!is_front_page() && !is_shop()) ) {
        return;
    }
    ?>
    <style id="header-refined-style">
        /* 1. Structure & Cadrage (Flexbox) */
        header {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            width: 100% !important;
            z-index: 9999 !important;
            height: 85px !important; /* Unification de la hauteur */
            background-color: transparent !important;
            background: none !important; /* Transparence Cristalline 100% */
            border: none !important;
            border-bottom: none !important;
            box-shadow: none !important;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1) !important;
            display: flex !important;
            align-items: center !important;
        }

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

        /* État au Scroll : Fond blanc net */
        header.header-scrolled {
            background-color: #ffffff !important;
            height: 85px !important;
            border-bottom: none !important;
            box-shadow: none !important;
        }

        /* 2. Typographie & Couleurs Fixes (Noir/Anthracite) */
        header nav > div > div.hidden.xl\:flex button,
        header nav > div > div.flex.items-center.space-x-2 button,
        header nav > div > div.flex.items-center.space-x-2 a {
            font-family: 'Montserrat', sans-serif !important;
            color: #1a1a1a !important;
            background: transparent !important;
            border: none !important;
            text-transform: uppercase !important;
            letter-spacing: 0.15em !important;
            transition: all 0.3s ease !important;
            box-shadow: none !important;
            padding: 10px 0 !important;
            text-decoration: none !important;
            cursor: pointer !important;
        }

        /* Taille du Menu : 20px et Bold */
        header nav > div > div.hidden.xl\:flex button {
            font-size: 20px !important;
            font-weight: bold !important;
        }

        header nav > div > div.hidden.xl\:flex {
            gap: 35px !important;
        }

        /* Icônes outils */
        header nav > div > div.flex.items-center.space-x-2 svg {
            color: #1a1a1a !important;
            transition: color 0.3s ease !important;
            width: 28px !important;
            height: 28px !important;
        }

        /* 3. Interactions : Hover (Marron/Nude) */
        header nav > div > div.hidden.xl\:flex button:hover,
        header nav > div > div.flex.items-center.space-x-2 button:hover,
        header nav > div > div.flex.items-center.space-x-2 a:hover {
            color: #6d4c41 !important;
        }
        header nav > div > div.flex.items-center.space-x-2 button:hover svg,
        header nav > div > div.flex.items-center.space-x-2 a:hover svg {
            color: #6d4c41 !important;
        }

        /* 4. Page Active : Rouge & Souligné */
        header nav > div > div.hidden.xl\:flex button.text-medical-blue {
            color: #be123c !important;
            border-bottom: 3px solid #be123c !important;
            font-weight: 800 !important;
        }

        /* LOGO : Ciblage par classe Tailwind unique pour isolation totale */
        header img.h-\[120px\], 
        header img.md\:h-\[160px\] {
            max-height: 85px !important;
            width: auto !important;
            transform: scale(2) !important; /* Agrandissement x2 */
            transform-origin: left center !important;
            transition: all 0.4s ease !important;
            object-fit: contain !important;
        }
        header.header-scrolled img.h-\[120px\],
        header.header-scrolled img.md\:h-\[160px\] {
            transform: scale(1.5) !important;
        }


        @media (max-width: 1280px) {
            header nav > div { padding: 0 3% !important; }
            header nav > div > div.hidden.xl\:flex { gap: 15px !important; }
            header img.h-\[120px\], 
            header img.md\:h-\[160px\] { transform: scale(1.2) !important; } /* Réduction mobile ciblée */
        }
    </style>
    <?php
}
?>
