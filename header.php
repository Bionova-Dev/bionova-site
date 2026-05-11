<?php
/**
 * The header for our theme — Bionova Pro Max
 * VERSION: 20260507.1420
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <!-- Tailwind CSS CDN — IDENTIQUE à index.php -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'medical-blue': '#be123c',
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

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Montserrat:wght@400;700;800;900&family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
  <?php if ( ! is_front_page() ) : ?>
    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu" class="fixed inset-0 bg-white z-[80] transition-all duration-500 transform translate-x-full opacity-0 pointer-events-none flex flex-col p-8 lg:hidden">
      <div class="flex justify-between items-center mb-16">
        <img src="<?php echo get_template_directory_uri(); ?>/logo-bionova.png" alt="Bionova" class="h-12 object-contain" />
        <button onclick="var mm = document.getElementById('mobile-menu'); mm.classList.add('translate-x-full', 'opacity-0', 'pointer-events-none'); mm.classList.remove('translate-x-0', 'opacity-100');" class="p-2 text-gray-900">
          <svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
      </div>
      <div class="flex flex-col space-y-6">
        <a href="<?php echo home_url('/'); ?>" class="text-2xl font-black uppercase tracking-widest text-black py-4 border-b-2 border-transparent hover:text-[#be123c] transition-all" style="font-family:'Montserrat',sans-serif">Accueil</a>
        <a href="<?php echo home_url('/boutique/'); ?>" class="text-2xl font-black uppercase tracking-widest text-black py-4 border-b-2 border-transparent hover:text-[#be123c] transition-all" style="font-family:'Montserrat',sans-serif">Boutique</a>
        <a href="<?php echo home_url('/astuces/'); ?>" class="text-2xl font-black uppercase tracking-widest text-black py-4 border-b-2 border-transparent hover:text-[#be123c] transition-all" style="font-family:'Montserrat',sans-serif">Astuces</a>
        <a href="<?php echo home_url('/expertise/'); ?>" class="text-2xl font-black uppercase tracking-widest text-black py-4 border-b-2 border-transparent hover:text-[#be123c] transition-all" style="font-family:'Montserrat',sans-serif">Expertise</a>
        <a href="<?php echo home_url('/contact/'); ?>" class="text-2xl font-black uppercase tracking-widest text-black py-4 border-b-2 border-transparent hover:text-[#be123c] transition-all" style="font-family:'Montserrat',sans-serif">Contact</a>
      </div>
    </div>

    <header class="fixed w-full z-50 h-[60px] lg:h-[90px] bg-white/95 backdrop-blur-md shadow-sm border-b border-gray-100 flex items-center">
      <nav class="max-w-[1800px] mx-auto px-4 lg:px-12 w-full h-full" aria-label="Navigation principale">
        <div class="flex justify-between items-center h-full gap-4 lg:gap-8">
          
          <!-- Logo — Identique à l'accueil -->
          <a href="<?php echo home_url(); ?>" class="flex items-center cursor-pointer px-2 group shrink-0">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/brand/logo-bionova.png" alt="Logo Bionova" class="transition-all duration-500 object-contain h-[50px] lg:h-[80px] transform lg:scale-[2.0] origin-left group-hover:scale-[2.1]" />
          </a>
          
          <!-- Menu Centré — Identique à l'accueil -->
          <div class="hidden lg:flex flex-grow justify-center items-center space-x-12">
            <a href="<?php echo home_url('/'); ?>" class="text-[20px] font-black uppercase tracking-[0.15em] transition-all duration-300 cursor-pointer py-2 px-1 border-b-4 text-black border-transparent hover:text-[#be123c] hover:border-[#be123c]" style="font-family:'Montserrat',sans-serif">Accueil</a>
            <a href="<?php echo home_url('/boutique/'); ?>" class="text-[20px] font-black uppercase tracking-[0.15em] transition-all duration-300 cursor-pointer py-2 px-1 border-b-4 text-black border-transparent hover:text-[#be123c] hover:border-[#be123c]" style="font-family:'Montserrat',sans-serif">Boutique</a>
            <a href="<?php echo home_url('/astuces/'); ?>" class="text-[20px] font-black uppercase tracking-[0.15em] transition-all duration-300 cursor-pointer py-2 px-1 border-b-4 text-black border-transparent hover:text-[#be123c] hover:border-[#be123c]" style="font-family:'Montserrat',sans-serif">Astuces</a>
            <a href="<?php echo home_url('/expertise/'); ?>" class="text-[20px] font-black uppercase tracking-[0.15em] transition-all duration-300 cursor-pointer py-2 px-1 border-b-4 text-black border-transparent hover:text-[#be123c] hover:border-[#be123c]" style="font-family:'Montserrat',sans-serif">Expertise</a>
            <a href="<?php echo home_url('/contact/'); ?>" class="text-[20px] font-black uppercase tracking-[0.15em] transition-all duration-300 cursor-pointer py-2 px-1 border-b-4 text-black border-transparent hover:text-[#be123c] hover:border-[#be123c]" style="font-family:'Montserrat',sans-serif">Contact</a>
          </div>

          <!-- Icônes — Identiques à l'accueil -->
          <div class="flex items-center space-x-2 sm:space-x-6 shrink-0">
            <!-- Mon Compte -->
            <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" class="hidden sm:flex p-3 rounded-2xl text-black hover:bg-gray-100 transition-all group" title="Mon compte">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
            </a>

            <!-- Panier -->
            <a href="<?php echo function_exists('wc_get_cart_url') ? esc_url( wc_get_cart_url() ) : '/panier/'; ?>" class="relative p-3 sm:p-4 rounded-2xl text-black hover:text-[#be123c] hover:bg-gray-50 transition-all group" title="Voir le panier">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:h-7 lg:w-7 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
              <?php if ( function_exists('WC') && WC()->cart && WC()->cart->get_cart_contents_count() > 0 ) : ?>
                <span class="absolute -top-1 -right-1 bg-[#be123c] text-white text-[10px] lg:text-[11px] font-black w-5 h-5 lg:w-6 lg:h-6 rounded-full flex items-center justify-center shadow-lg">
                  <?php echo WC()->cart->get_cart_contents_count(); ?>
                </span>
              <?php endif; ?>
            </a>

            <!-- Hamburger Mobile -->
            <button onclick="var mm = document.getElementById('mobile-menu'); mm.classList.remove('translate-x-full', 'opacity-0', 'pointer-events-none'); mm.classList.add('translate-x-0', 'opacity-100');" class="flex lg:hidden items-center justify-center p-2 text-gray-900 hover:bg-gray-100 rounded-xl transition-colors min-w-[48px] min-h-[48px]" aria-label="Ouvrir le menu">
              <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16" /></svg>
            </button>
          </div>
        </div>
      </nav>
    </header>
  <?php endif; ?>
