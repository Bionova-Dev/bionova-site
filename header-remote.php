<?php 
/**
 * BIONOVA — Header Loader
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Dynamically determine if this is an SPA page where React renders the CategoryBar
$is_spa = false;
if ( is_front_page() || is_home() || is_shop() || is_product() || is_product_category() || is_product_taxonomy() || is_page('boutique') || is_page('astuces') || is_page('expertise') || is_page('contact') || is_page_template('page-boutique.php') || is_page_template('page-astuces.php') || is_page_template('page-expertise.php') || is_page_template('page-contact.php') ) {
    $is_spa = true;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Bionova — Laboratoire tunisien de micronutrition premium. Compléments alimentaires naturels haute biodisponibilité : NMN, Ashwagandha, Collagène Marin, Astaxanthine. Livraison gratuite dès 150 DT.">
  <meta name="keywords" content="compléments alimentaires, micronutrition, Tunisie, NMN, Ashwagandha, Collagène Marin, anti-âge, bien-être, santé naturelle, Bionova">
  <meta name="author" content="Bionova Laboratoire">
  <meta name="robots" content="index, follow">
  <meta property="og:title" content="Bionova — Micronutrition Premium en Tunisie">
  <meta property="og:description" content="Des formules scientifiques et naturelles conçues par des experts pour votre vitalité. Livraison partout en Tunisie.">
  <meta property="og:type" content="website">
  <meta property="og:locale" content="fr_TN">
  <meta name="theme-color" content="#be123c">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <!-- DNS Prefetch & Preconnect for third-party resources -->
  <link rel="dns-prefetch" href="//fonts.googleapis.com">
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link rel="dns-prefetch" href="//cdn.tailwindcss.com">
  <link rel="dns-prefetch" href="//unpkg.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <!-- Preload critical fonts -->
  <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Montserrat:wght@700;800;900&family=Outfit:wght@300;400;600;700&display=swap" as="style">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Montserrat:wght@700;800;900&family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">

  <!-- Preload hero image for LCP -->
  <link rel="preload" as="image" href="<?php echo get_template_directory_uri(); ?>/assets/hero/hero-banner-new.webp" fetchpriority="high">
  <!-- Preload logo -->
  <link rel="preload" as="image" href="<?php echo get_template_directory_uri(); ?>/assets/brand/logo-bionova.webp">

  <!-- Critical CSS inline for above-the-fold speed -->
  <style>
    /* Critical inline styles — render navbar + hero without layout shift */
    *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
    html{scroll-behavior:smooth;-webkit-text-size-adjust:100%}
    body{font-family:'Inter',sans-serif;background:#fff;color:#1e293b;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}
    .font-display{font-family:'Montserrat',sans-serif}
    ::selection{background:#be123c;color:#fff}
    img{max-width:100%;height:auto}
    #page{min-height:100vh;display:flex;flex-direction:column}
    .perspective-1000{perspective:1000px}
  </style>

  <!-- Tailwind CSS compiled -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/tailwind.css?v=<?php echo filemtime(get_template_directory() . '/dist/tailwind.css'); ?>">

  <!-- React CDNs -->
  <script defer src="https://unpkg.com/react@18/umd/react.production.min.js"></script>
  <script defer src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js"></script>
    
  <!-- Framer Motion CDN (UMD Browser Build) -->
  <script defer src="https://unpkg.com/framer-motion@10.16.4/dist/framer-motion.js"></script>

  <!-- JS Bridge -->
  <script>
    window.WC_INITIAL_COUNT = <?php echo ( function_exists('WC') && WC()->cart ) ? WC()->cart->get_cart_contents_count() : 0; ?>;
    window.WC_CART_URL = "<?php echo function_exists('wc_get_cart_url') ? esc_url( wc_get_cart_url() ) : bionova_get_slug_url( 'panier' ); ?>";
    window.WC_CHECKOUT_URL = "<?php echo function_exists('wc_get_checkout_url') ? esc_url( wc_get_checkout_url() ) : bionova_get_slug_url( 'commande' ); ?>";
    window.BIONOVA_HOME_URL = "https://bionova.tn/";
    window.BIONOVA_ACCOUNT_URL = "<?php echo function_exists('wc_get_account_endpoint_url') ? esc_url( wc_get_account_endpoint_url( 'dashboard' ) ) : bionova_get_slug_url( 'mon-compte' ); ?>";
    
    <?php
    if (!isset($initial_page)) {
        if (is_front_page()) $initial_page = 'home';
        elseif (is_page('boutique') || (function_exists('is_shop') && is_shop()) || (function_exists('is_product_category') && is_product_category()) || (function_exists('is_product_taxonomy') && is_product_taxonomy())) $initial_page = 'products';
        elseif (is_page('astuces')) $initial_page = 'blog';
        elseif (is_page('expertise')) $initial_page = 'about';
        elseif (is_page('contact')) $initial_page = 'contact';
        elseif (function_exists('is_product') && is_product()) $initial_page = 'products';
        else $initial_page = 'home';
    }
    ?>
    window.BIONOVA_INITIAL_PAGE = "<?php echo $initial_page; ?>";
    window.THEME_URI = "<?php echo get_template_directory_uri(); ?>";
    
    // Dynamic Routes Mapping
    window.BIONOVA_ROUTES = {
      'products': "<?php echo bionova_get_slug_url( 'boutique' ); ?>",
      'blog': "<?php echo bionova_get_slug_url( 'astuces' ); ?>",
      'about': "<?php echo bionova_get_slug_url( 'expertise' ); ?>",
      'contact': "<?php echo bionova_get_slug_url( 'contact' ); ?>"
    };
  </script>

  <meta name="theme-uri" content="<?php echo get_template_directory_uri(); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu" class="fixed inset-0 bg-white z-[80] transition-all duration-500 transform translate-x-full opacity-0 pointer-events-none flex flex-col p-8 lg:hidden">
      <div class="flex justify-between items-center mb-8">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/brand/logo-bionova.webp" alt="Bionova" class="h-20 object-contain" />
        <button onclick="var mm = document.getElementById('mobile-menu'); mm.classList.add('translate-x-full', 'opacity-0', 'pointer-events-none'); mm.classList.remove('translate-x-0', 'opacity-100');" class="p-2 text-gray-900 hover:text-[#be123c] transition-colors rounded-xl hover:bg-gray-50" aria-label="Fermer le menu">
          <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
      </div>

      <!-- Barre de recherche Mobile -->
      <form role="search" method="get" class="relative flex items-center mb-8" action="<?php echo bionova_get_slug_url( 'boutique' ); ?>">
        <input 
          type="search" 
          class="w-full bg-gray-50 border border-gray-200 focus:border-[#be123c] focus:ring-4 focus:ring-[#be123c]/10 px-5 py-4 rounded-2xl text-base font-bold text-gray-800 placeholder-gray-400 focus:outline-none transition-all duration-300 shadow-sm" 
          placeholder="Rechercher un produit..." 
          value="<?php echo get_search_query(); ?>" 
          name="s" 
          required
        />
        <button type="submit" class="absolute right-3 p-2 text-gray-400 hover:text-[#be123c] transition-colors bg-white rounded-xl shadow-sm border border-gray-100" aria-label="Rechercher">
          <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        </button>
      </form>
      <div class="flex flex-col space-y-2">
        <a href="https://bionova.tn/" class="text-xl font-black uppercase tracking-widest <?php echo ($initial_page === 'home') ? 'text-[#be123c] bg-gray-50' : 'text-black'; ?> py-4 px-4 rounded-2xl hover:bg-gray-50 hover:text-[#be123c] transition-all" style="font-family:'Montserrat',sans-serif">Accueil</a>
        <a href="https://bionova.tn/boutique/" class="text-xl font-black uppercase tracking-widest <?php echo ($initial_page === 'products') ? 'text-[#be123c] bg-gray-50' : 'text-black'; ?> py-4 px-4 rounded-2xl hover:bg-gray-50 hover:text-[#be123c] transition-all" style="font-family:'Montserrat',sans-serif">Boutique</a>
        <a href="https://bionova.tn/astuces/" class="text-xl font-black uppercase tracking-widest <?php echo ($initial_page === 'blog') ? 'text-[#be123c] bg-gray-50' : 'text-black'; ?> py-4 px-4 rounded-2xl hover:bg-gray-50 hover:text-[#be123c] transition-all" style="font-family:'Montserrat',sans-serif">Astuces</a>
        <a href="https://bionova.tn/expertise/" class="text-xl font-black uppercase tracking-widest <?php echo ($initial_page === 'about') ? 'text-[#be123c] bg-gray-50' : 'text-black'; ?> py-4 px-4 rounded-2xl hover:bg-gray-50 hover:text-[#be123c] transition-all" style="font-family:'Montserrat',sans-serif">Expertise</a>
        <a href="https://bionova.tn/contact/" class="text-xl font-black uppercase tracking-widest <?php echo ($initial_page === 'contact') ? 'text-[#be123c] bg-gray-50' : 'text-black'; ?> py-4 px-4 rounded-2xl hover:bg-gray-50 hover:text-[#be123c] transition-all" style="font-family:'Montserrat',sans-serif">Contact</a>
      </div>
      <!-- Mobile CTA -->
      <div class="mt-auto space-y-4">
        <a href="<?php echo function_exists('wc_get_account_endpoint_url') ? esc_url( wc_get_account_endpoint_url( 'dashboard' ) ) : bionova_get_slug_url( 'mon-compte' ); ?>" class="flex items-center justify-center w-full py-4 bg-gray-100 text-gray-900 font-bold rounded-2xl shadow-sm hover:bg-gray-200 transition-all">
          <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
          Mon Compte
        </a>
        <a href="<?php echo wc_get_cart_url(); ?>" class="flex items-center justify-center w-full py-4 bg-[#be123c] text-white font-bold rounded-2xl shadow-lg hover:bg-gray-900 transition-all">
          <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
          Mon Panier
        </a>
        <a href="https://wa.me/21671000000?text=Bonjour%20Bionova%2C%20je%20souhaite%20un%20conseil" target="_blank" rel="noopener noreferrer" class="flex items-center justify-center w-full py-4 bg-[#25D366] text-white font-bold rounded-2xl shadow-lg hover:bg-[#128C7E] transition-all">
          <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
          WhatsApp Conseil
        </a>
      </div>
    </div>

    <header class="fixed w-full z-50 h-[30px] bg-white/95 backdrop-blur-md shadow-sm border-b border-gray-100 flex items-center transition-all duration-300" id="main-header">
      <nav class="max-w-[1800px] mx-auto px-4 lg:px-12 w-full h-full" aria-label="Navigation principale">
        <div class="flex items-center h-full gap-4 lg:gap-8 relative w-full">
          
          <div class="flex-1 flex justify-start h-full">
            <a href="https://bionova.tn/" class="flex items-start self-start cursor-pointer px-2 group pt-1" aria-label="Accueil Bionova">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/brand/logo-bionova.webp" alt="Logo Bionova" class="transition-all duration-500 object-contain h-[60px] lg:h-[85px] relative z-50" width="240" height="96" />
            </a>
          </div>
          
          <!-- Menu Aligné à Droite (près des icônes) -->
          <div class="hidden lg:flex items-center gap-4 xl:gap-8 flex-nowrap whitespace-nowrap mt-1">
            <?php
            $active_class = "text-[#be123c] border-[#be123c]";
            $inactive_class = "text-black border-transparent";
            ?>
            <a href="https://bionova.tn/" class="nav-item text-[18px] font-black uppercase tracking-[0.12em] transition-all duration-300 cursor-pointer py-0.5 px-1 border-b-2 <?php echo ($initial_page === 'home') ? $active_class : $inactive_class; ?> hover:text-[#be123c] hover:border-[#be123c]" style="font-family:'Montserrat',sans-serif">Accueil</a>
            <a href="https://bionova.tn/boutique/" class="nav-item text-[18px] font-black uppercase tracking-[0.12em] transition-all duration-300 cursor-pointer py-0.5 px-1 border-b-2 <?php echo ($initial_page === 'products') ? $active_class : $inactive_class; ?> hover:text-[#be123c] hover:border-[#be123c]" style="font-family:'Montserrat',sans-serif">Boutique</a>
            <a href="https://bionova.tn/astuces/" class="nav-item text-[18px] font-black uppercase tracking-[0.12em] transition-all duration-300 cursor-pointer py-0.5 px-1 border-b-2 <?php echo ($initial_page === 'blog') ? $active_class : $inactive_class; ?> hover:text-[#be123c] hover:border-[#be123c]" style="font-family:'Montserrat',sans-serif">Astuces</a>
            <a href="https://bionova.tn/expertise/" class="nav-item text-[18px] font-black uppercase tracking-[0.12em] transition-all duration-300 cursor-pointer py-0.5 px-1 border-b-2 <?php echo ($initial_page === 'about') ? $active_class : $inactive_class; ?> hover:text-[#be123c] hover:border-[#be123c]" style="font-family:'Montserrat',sans-serif">Expertise</a>
            <a href="https://bionova.tn/contact/" class="nav-item text-[18px] font-black uppercase tracking-[0.12em] transition-all duration-300 cursor-pointer py-0.5 px-1 border-b-2 <?php echo ($initial_page === 'contact') ? $active_class : $inactive_class; ?> hover:text-[#be123c] hover:border-[#be123c]" style="font-family:'Montserrat',sans-serif">Contact</a>
          </div>

          <!-- Icônes -->
          <div class="flex justify-end items-center space-x-2 sm:space-x-4 shrink-0">
            <!-- Barre de Recherche Épurée -->
            <form role="search" method="get" class="relative hidden sm:flex items-center space-x-2.5" action="<?php echo bionova_get_slug_url( 'boutique' ); ?>">
              <button type="submit" class="p-1.5 text-gray-400 hover:text-[#be123c] transition-all duration-300 hover:scale-110 flex items-center justify-center cursor-pointer" aria-label="Rechercher">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
              </button>
              <input 
                type="search" 
                class="w-36 lg:w-44 focus:w-56 bg-gray-50 border border-gray-200 focus:border-[#be123c] focus:ring-4 focus:ring-[#be123c]/5 px-4 py-2.5 rounded-full text-xs font-semibold text-gray-800 placeholder-gray-450 focus:outline-none transition-all duration-300 shadow-sm" 
                placeholder="Rechercher..." 
                value="<?php echo get_search_query(); ?>" 
                name="s" 
                required
              />
            </form>

            <!-- Mon Compte -->
            <a href="<?php echo function_exists('wc_get_account_endpoint_url') ? esc_url( wc_get_account_endpoint_url( 'dashboard' ) ) : bionova_get_slug_url( 'mon-compte' ); ?>" class="hidden sm:flex flex-col items-center justify-center p-2 rounded-2xl text-black hover:bg-gray-100 hover:text-[#be123c] transition-all group" title="Mon compte" aria-label="Mon compte">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:scale-110 transition-transform mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
              <?php if ( is_user_logged_in() ) : 
                  $current_user = wp_get_current_user();
                  $display_name = $current_user->first_name ? $current_user->first_name : $current_user->user_email;
                  if(strlen($display_name) > 12) $display_name = substr($display_name, 0, 10).'...';
              ?>
                  <span class="text-[10px] font-bold text-gray-500 uppercase tracking-wider group-hover:text-[#be123c] transition-colors"><?php echo esc_html($display_name); ?></span>
              <?php else: ?>
                  <span class="text-[10px] font-bold text-gray-500 uppercase tracking-wider group-hover:text-[#be123c] transition-colors">Connexion</span>
              <?php endif; ?>
            </a>

            <!-- Panier -->
            <a href="<?php echo wc_get_cart_url(); ?>" class="relative p-3 rounded-2xl text-black hover:text-[#be123c] hover:bg-gray-50 transition-all group" title="Voir le panier" aria-label="Panier">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
              <?php if ( function_exists('WC') && WC()->cart && WC()->cart->get_cart_contents_count() > 0 ) : ?>
                <span class="cart-count-badge absolute -top-1 -right-1 bg-[#be123c] text-white text-[10px] font-black w-5 h-5 rounded-full flex items-center justify-center shadow-lg animate-pulse">
                  <?php echo WC()->cart->get_cart_contents_count(); ?>
                </span>
              <?php endif; ?>
            </a>

            <!-- Hamburger Mobile -->
            <button onclick="var mm = document.getElementById('mobile-menu'); mm.classList.remove('translate-x-full', 'opacity-0', 'pointer-events-none'); mm.classList.add('translate-x-0', 'opacity-100');" class="flex lg:hidden items-center justify-center p-2 text-gray-900 hover:bg-gray-100 rounded-xl transition-colors min-w-[48px] min-h-[48px]" aria-label="Ouvrir le menu">
              <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16" /></svg>
            </button>
          </div>
        </div>
      </nav>
    </header>

    <!-- End Header -->
    <style>
      .no-scrollbar::-webkit-scrollbar { display: none; }
      .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
      
      /* FORCE HEADER VISIBILITY — ANTI-CACHE FIX */
      #main-header {
        display: flex !important;
        visibility: visible !important;
        opacity: 1 !important;
        z-index: 9999 !important;
        background-color: rgba(255, 255, 255, 0.95) !important;
      }
      
      header {
        display: block !important;
      }
    </style>

    <!-- Ensure Header Stability -->
    <script>
      document.addEventListener('DOMContentLoaded', function() {
          // Force header visibility regardless of SPA state
          var header = document.getElementById('main-header');
          if (header) {
              header.style.display = 'flex';
              header.style.opacity = '1';
              header.style.zIndex = '9999';
          }
      });
    </script>
