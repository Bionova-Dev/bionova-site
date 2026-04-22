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
      <div class="hidden md:flex space-x-8 font-bold uppercase tracking-widest text-sm text-gray-900">
        <a href="<?php echo home_url(); ?>" class="hover:text-medical-blue">Retour à l'accueil</a>
      </div>
    </div>
  </header>
  <div class="pt-[140px] pb-20 max-w-7xl mx-auto px-6">
  <?php endif; ?>
