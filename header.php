<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
  <script src="https://cdn.tailwindcss.com" defer></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'medical-blue': '#075985',
            'medical-light': '#f0fdf4',
            'bionova-red': '#be123c',
            'silver': '#f1f5f9',
          },
          fontFamily: {
            sans: ['Inter', 'sans-serif'],
            display: ['Montserrat', 'sans-serif'],
          }
        }
      }
    }
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Montserrat:wght@500;600;700;800;900&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Inter', sans-serif; background-color: #ffffff; color: #1e293b; }
    .glassmorphism { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); border-bottom: 1px solid rgba(255, 255, 255, 0.5); }
    
    /* Sécurité Cart/Checkout : Forcer la visibilité du menu */
    .woocommerce-cart header, .woocommerce-checkout header {
      display: flex !important;
      background-color: white !important;
      border-bottom: 1px solid #f1f5f9 !important;
    }
    .woocommerce-cart header a, .woocommerce-checkout header a,
    .woocommerce-cart header button, .woocommerce-checkout header button {
      opacity: 1 !important;
      visibility: visible !important;
    }

    /* Logo spécifique Panier/Checkout */
    body.woocommerce-cart header img, 
    body.woocommerce-checkout header img {
      transform: none !important;
      max-width: 150px !important;
      height: auto !important;
      max-height: 80px !important;
      filter: none !important;
    }

    @media (max-width: 768px) {
      body.woocommerce-cart header img, 
      body.woocommerce-checkout header img {
        max-width: 120px !important;
      }
    }
  </style>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/woocommerce-custom.css">
</head>
<body <?php body_class(); ?>>
  <?php if (!is_front_page()) : ?>
  <header class="fixed w-full z-50 h-[100px] lg:h-[180px] bg-white/95 backdrop-blur-md shadow-sm border-b border-gray-100 flex items-center">
    
    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu" class="fixed inset-0 bg-white z-[70] transition-all duration-500 transform translate-x-full opacity-0 pointer-events-none flex flex-col p-8 lg:hidden">
      <div class="flex justify-between items-center mb-16">
        <img src="<?php echo get_template_directory_uri(); ?>/logo-bionova.png" alt="Bionova" class="h-12 object-contain" loading="lazy" decoding="async" width="120" height="48" />
        <button onclick="document.getElementById('mobile-menu').classList.add('translate-x-full'); document.getElementById('mobile-menu').classList.add('opacity-0'); document.getElementById('mobile-menu').classList.add('pointer-events-none');" class="p-2 text-gray-900">
          <svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
      </div>
      <div class="flex flex-col space-y-6">
        <a href="<?php echo home_url('/'); ?>" class="text-2xl font-black uppercase tracking-widest text-gray-800 py-4 border-b-2 border-transparent hover:text-medical-blue transition-colors">Accueil</a>
        <a href="<?php echo home_url('/#products'); ?>" class="text-2xl font-black uppercase tracking-widest text-gray-800 py-4 border-b-2 border-transparent hover:text-medical-blue transition-colors">Boutique</a>
        <a href="<?php echo home_url('/#blog'); ?>" class="text-2xl font-black uppercase tracking-widest text-gray-800 py-4 border-b-2 border-transparent hover:text-medical-blue transition-colors">Astuces</a>
        <a href="<?php echo home_url('/#about'); ?>" class="text-2xl font-black uppercase tracking-widest text-gray-800 py-4 border-b-2 border-transparent hover:text-medical-blue transition-colors">Expertise</a>
        <a href="<?php echo home_url('/#contact'); ?>" class="text-2xl font-black uppercase tracking-widest text-gray-800 py-4 border-b-2 border-transparent hover:text-medical-blue transition-colors">Contact</a>
      </div>
    </div>

    <nav class="max-w-[1800px] mx-auto px-4 lg:px-12 w-full h-full" aria-label="Navigation principale">
      <div class="flex justify-between items-center h-full gap-4 lg:gap-8">
        
        <a href="<?php echo home_url(); ?>" class="flex items-center cursor-pointer px-2 group shrink-0">
          <img src="<?php echo get_template_directory_uri(); ?>/logo-bionova.png" alt="Bionova" class="transition-all duration-500 object-contain h-[70px] lg:h-[160px] transform lg:scale-[1.5] origin-left group-hover:scale-[1.1] lg:group-hover:scale-[1.6]" />
        </a>
        
        <div class="hidden lg:flex items-center space-x-6 xl:space-x-10">
          <a href="<?php echo home_url('/'); ?>" class="text-sm lg:text-[20px] font-black uppercase tracking-[0.15em] transition-all duration-300 cursor-pointer py-2 px-1 border-b-4 text-gray-900 border-transparent hover:text-medical-blue" style="font-family: 'Montserrat', sans-serif;">Accueil</a>
          <a href="<?php echo home_url('/#products'); ?>" class="text-sm lg:text-[20px] font-black uppercase tracking-[0.15em] transition-all duration-300 cursor-pointer py-2 px-1 border-b-4 text-gray-900 border-transparent hover:text-medical-blue" style="font-family: 'Montserrat', sans-serif;">Boutique</a>
          <a href="<?php echo home_url('/#blog'); ?>" class="text-sm lg:text-[20px] font-black uppercase tracking-[0.15em] transition-all duration-300 cursor-pointer py-2 px-1 border-b-4 text-gray-900 border-transparent hover:text-medical-blue" style="font-family: 'Montserrat', sans-serif;">Astuces</a>
          <a href="<?php echo home_url('/#about'); ?>" class="text-sm lg:text-[20px] font-black uppercase tracking-[0.15em] transition-all duration-300 cursor-pointer py-2 px-1 border-b-4 text-gray-900 border-transparent hover:text-medical-blue" style="font-family: 'Montserrat', sans-serif;">Expertise</a>
          <a href="<?php echo home_url('/#contact'); ?>" class="text-sm lg:text-[20px] font-black uppercase tracking-[0.15em] transition-all duration-300 cursor-pointer py-2 px-1 border-b-4 text-gray-900 border-transparent hover:text-medical-blue" style="font-family: 'Montserrat', sans-serif;">Contact</a>
        </div>

        <div class="flex items-center space-x-1 sm:space-x-5">
          <!-- Icône Mon Compte -->
          <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" class="hidden sm:flex p-3.5 rounded-2xl text-gray-900 hover:text-medical-blue hover:bg-medical-light transition-all group" title="Mon compte">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
          </a>

          <!-- Icône Panier -->
          <a href="<?php echo function_exists('wc_get_cart_url') ? esc_url( wc_get_cart_url() ) : '/panier/'; ?>" class="relative p-3 sm:p-4 rounded-2xl bg-gray-900 text-white hover:bg-medical-blue transition-all shadow-lg group" title="Voir le panier">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:h-7 lg:w-7 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <?php if ( function_exists('WC') && WC()->cart && WC()->cart->get_cart_contents_count() > 0 ) : ?>
              <span class="absolute -top-2 -right-2 bg-bionova-red text-white text-[10px] lg:text-[11px] font-black w-5 h-5 lg:w-6 lg:h-6 rounded-full flex items-center justify-center shadow-lg">
                <?php echo WC()->cart->get_cart_contents_count(); ?>
              </span>
            <?php endif; ?>
          </a>

          <!-- Hamburger Menu -->
          <button onclick="document.getElementById('mobile-menu').classList.remove('translate-x-full'); document.getElementById('mobile-menu').classList.remove('opacity-0'); document.getElementById('mobile-menu').classList.remove('pointer-events-none');" class="lg:hidden p-2 text-gray-900">
            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
          </button>
        </div>
      </div>
    </nav>
  </header>
  <div class="pt-[130px] lg:pt-[220px] pb-20 max-w-7xl mx-auto px-4 lg:px-6">
  <?php endif; ?>

