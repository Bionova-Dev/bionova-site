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
  <header class="fixed w-full z-50 h-[100px] bg-white/95 backdrop-blur-md shadow-sm border-b border-gray-100 flex items-center">
    <div class="max-w-7xl mx-auto px-6 w-full flex justify-between items-center">
      <a href="<?php echo home_url(); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/logo-bionova.png" alt="Bionova" class="h-16 object-contain" />
      </a>
      
      <div class="flex items-center space-x-4">
        <a href="<?php echo home_url(); ?>" class="hidden md:block font-bold uppercase tracking-widest text-sm text-gray-900 hover:text-medical-blue transition-colors">Retour à l'accueil</a>
        
        <a href="/panier/" class="relative p-3 rounded-2xl bg-gray-900 text-white hover:bg-medical-blue transition-all shadow-lg" title="Voir le panier">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
          <?php if (WC()->cart->get_cart_contents_count() > 0) : ?>
            <span class="absolute -top-1 -right-1 bg-bionova-red text-white text-[10px] font-bold w-5 h-5 rounded-full flex items-center justify-center">
              <?php echo WC()->cart->get_cart_contents_count(); ?>
            </span>
          <?php endif; ?>
        </a>
      </div>
    </div>
  </header>
  <div class="pt-[140px] pb-20 max-w-7xl mx-auto px-6">
  <?php endif; ?>
