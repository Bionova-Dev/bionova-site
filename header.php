<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
  <script src="https://cdn.tailwindcss.com"></script>
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
  </style>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/woocommerce-custom.css">
</head>
<body <?php body_class(); ?>>
  <?php if (!is_front_page()) : ?>
  <header class="fixed w-full z-50 h-[140px] md:h-[180px] bg-white/95 backdrop-blur-md shadow-sm border-b border-gray-100 flex items-center">
    <div class="max-w-[1800px] mx-auto px-6 lg:px-12 w-full flex justify-between items-center gap-8">
      <a href="<?php echo home_url(); ?>" class="flex items-center group shrink-0">
        <img src="<?php echo get_template_directory_uri(); ?>/logo-bionova.png" alt="Bionova" class="transition-all duration-500 object-contain h-[120px] md:h-[160px] group-hover:scale-[1.05]" />
      </a>
      
      <div class="flex items-center space-x-2 sm:space-x-5">
        <!-- Menu Dynamique WordPress -->
        <?php 
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'container'      => 'nav',
            'container_class'=> 'hidden xl:flex items-center space-x-10',
            'menu_class'     => 'menu flex items-center space-x-10 list-none m-0 p-0',
            'fallback_cb'    => false
        ) ); 
        ?>

        <!-- Icône Mon Compte -->
        <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" class="p-3.5 rounded-2xl text-gray-900 hover:text-medical-blue hover:bg-medical-light transition-all group" title="Mon compte">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
        </a>

        <!-- Icône Panier -->
        <a href="<?php echo function_exists('wc_get_cart_url') ? esc_url( wc_get_cart_url() ) : '/panier/'; ?>" class="relative p-4 rounded-2xl bg-gray-900 text-white hover:bg-medical-blue transition-all shadow-lg group" title="Voir le panier">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
          <?php if ( function_exists('WC') && WC()->cart && WC()->cart->get_cart_contents_count() > 0 ) : ?>
            <span class="absolute -top-2 -right-2 bg-bionova-red text-white text-[11px] font-black w-6 h-6 rounded-full flex items-center justify-center shadow-lg">
              <?php echo WC()->cart->get_cart_contents_count(); ?>
            </span>
          <?php endif; ?>
        </a>
      </div>
    </div>
  </header>
  <div class="pt-[180px] md:pt-[220px] pb-20 max-w-7xl mx-auto px-6">
  <?php endif; ?>

