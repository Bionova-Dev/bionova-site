<?php
/**
 * The header for our theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
  <?php if ( ! is_front_page() ) : ?>
    <!-- Mobile Menu - Logique robuste -->
    <div id="mobile-menu" class="fixed inset-0 bg-white z-[80] transition-all duration-500 transform translate-x-full opacity-0 pointer-events-none flex flex-col p-8 lg:hidden">
      <div class="flex justify-between items-center mb-16">
        <img src="<?php echo get_template_directory_uri(); ?>/logo-bionova.png" alt="Bionova" class="h-12 object-contain" />
        <button onclick="var mm = document.getElementById('mobile-menu'); mm.classList.add('translate-x-full', 'opacity-0', 'pointer-events-none'); mm.classList.remove('translate-x-0', 'opacity-100');" class="p-2 text-gray-900">
          <svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
      </div>
      <div class="flex flex-col space-y-6">
        <a href="<?php echo home_url('/'); ?>" class="text-2xl font-black uppercase tracking-widest text-black py-4 border-b-2 border-transparent hover:opacity-60 transition-all">Accueil</a>
        <a href="<?php echo home_url('/#products'); ?>" class="text-2xl font-black uppercase tracking-widest text-black py-4 border-b-2 border-transparent hover:opacity-60 transition-all">Boutique</a>
        <a href="<?php echo home_url('/#blog'); ?>" class="text-2xl font-black uppercase tracking-widest text-black py-4 border-b-2 border-transparent hover:opacity-60 transition-all">Astuces</a>
        <a href="<?php echo home_url('/#about'); ?>" class="text-2xl font-black uppercase tracking-widest text-black py-4 border-b-2 border-transparent hover:opacity-60 transition-all">Expertise</a>
        <a href="<?php echo home_url('/#contact'); ?>" class="text-2xl font-black uppercase tracking-widest text-black py-4 border-b-2 border-transparent hover:opacity-60 transition-all">Contact</a>
      </div>
    </div>

    <header class="fixed w-full z-50 h-[60px] lg:h-[90px] bg-white/95 backdrop-blur-md shadow-sm border-b border-gray-100 flex items-center">
      <nav class="max-w-[1800px] mx-auto px-4 lg:px-12 w-full h-full" aria-label="Navigation principale">
        <div class="flex justify-between items-center h-full gap-4 lg:gap-8">
          
          <a href="<?php echo home_url(); ?>" class="flex items-center cursor-pointer px-2 group shrink-0">
            <img src="<?php echo get_template_directory_uri(); ?>/logo-bionova.png" alt="Bionova" class="transition-all duration-500 object-contain h-[45px] lg:h-[75px] transform lg:scale-[2.0] origin-left group-hover:scale-[1.1] lg:group-hover:scale-[2.1]" />
          </a>
          
          <div class="hidden lg:flex flex-grow justify-center items-center space-x-6 xl:space-x-10">
            <a href="<?php echo home_url('/'); ?>" class="text-sm lg:text-[20px] font-black uppercase tracking-[0.15em] transition-all duration-300 cursor-pointer py-2 px-1 border-b-4 text-black border-transparent hover:opacity-60" style="font-family: 'Montserrat', sans-serif;">Accueil</a>
            <a href="<?php echo home_url('/#products'); ?>" class="text-sm lg:text-[20px] font-black uppercase tracking-[0.15em] transition-all duration-300 cursor-pointer py-2 px-1 border-b-4 text-black border-transparent hover:opacity-60" style="font-family: 'Montserrat', sans-serif;">Boutique</a>
            <a href="<?php echo home_url('/#blog'); ?>" class="text-sm lg:text-[20px] font-black uppercase tracking-[0.15em] transition-all duration-300 cursor-pointer py-2 px-1 border-b-4 text-black border-transparent hover:opacity-60" style="font-family: 'Montserrat', sans-serif;">Astuces</a>
            <a href="<?php echo home_url('/#about'); ?>" class="text-sm lg:text-[20px] font-black uppercase tracking-[0.15em] transition-all duration-300 cursor-pointer py-2 px-1 border-b-4 text-black border-transparent hover:opacity-60" style="font-family: 'Montserrat', sans-serif;">Expertise</a>
            <a href="<?php echo home_url('/#contact'); ?>" class="text-sm lg:text-[20px] font-black uppercase tracking-[0.15em] transition-all duration-300 cursor-pointer py-2 px-1 border-b-4 text-black border-transparent hover:opacity-60" style="font-family: 'Montserrat', sans-serif;">Contact</a>
          </div>

          <div class="flex items-center space-x-1 sm:space-x-5 shrink-0">
            <!-- Icône Mon Compte -->
            <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" class="hidden sm:flex p-3.5 rounded-2xl text-black hover:bg-gray-100 transition-all group" title="Mon compte">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
            </a>

            <!-- Icône Panier -->
            <a href="<?php echo function_exists('wc_get_cart_url') ? esc_url( wc_get_cart_url() ) : '/panier/'; ?>" class="relative p-3 sm:p-4 rounded-2xl text-black hover:bg-gray-100 transition-all group" title="Voir le panier">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:h-7 lg:w-7 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
              <?php if ( function_exists('WC') && WC()->cart && WC()->cart->get_cart_contents_count() > 0 ) : ?>
                <span class="absolute -top-1 -right-1 bg-[#be123c] text-white text-[10px] lg:text-[11px] font-black w-5 h-5 lg:w-6 lg:h-6 rounded-full flex items-center justify-center shadow-lg">
                  <?php echo WC()->cart->get_cart_contents_count(); ?>
                </span>
              <?php endif; ?>
            </a>

            <!-- Hamburger Menu - Logique simplifiée et robuste -->
            <button onclick="var mm = document.getElementById('mobile-menu'); mm.classList.remove('translate-x-full', 'opacity-0', 'pointer-events-none'); mm.classList.add('translate-x-0', 'opacity-100');" class="mobile-menu-toggle p-2 text-black flex items-center justify-center min-w-[44px] min-h-[44px]" aria-label="Ouvrir le menu">
              <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
            </button>
          </div>
        </div>
      </nav>
    </header>
    <div class="pt-[80px] lg:pt-[110px] pb-20 max-w-7xl mx-auto px-4 lg:px-6">
  <?php endif; ?>
