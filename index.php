<?php
/**
 * Bionova Pro Max — Atomic Shell
 * VERSION: 20260511
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-uri" content="<?php echo get_template_directory_uri(); ?>">
    
    <!-- CDNs -->
    <script src="https://unpkg.com/react@18/umd/react.production.min.js"></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js"></script>
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
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

    <!-- Global JS Bridge -->
    <script>
      window.WC_INITIAL_COUNT = <?php echo ( function_exists('WC') && WC()->cart ) ? WC()->cart->get_cart_contents_count() : 0; ?>;
      window.WC_CART_URL = "<?php echo function_exists('wc_get_cart_url') ? esc_url( wc_get_cart_url() ) : home_url('/panier/'); ?>";
      window.WC_CHECKOUT_URL = "<?php echo function_exists('wc_get_checkout_url') ? esc_url( wc_get_checkout_url() ) : home_url('/commande/'); ?>";
      window.BIONOVA_HOME_URL = "<?php echo trailingslashit(home_url()); ?>";
      window.BIONOVA_ACCOUNT_URL = "<?php echo function_exists('wc_get_account_endpoint_url') ? esc_url( wc_get_account_endpoint_url( 'dashboard' ) ) : home_url('/mon-compte/'); ?>";
      window.BIONOVA_INITIAL_PAGE = "<?php echo isset($initial_page) ? $initial_page : 'home'; ?>";
      window.THEME_URI = "<?php echo trailingslashit(get_template_directory_uri()); ?>";
    </script>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="root"></div>

    <!-- Atomic JS Components Loading -->
    <!-- 1. Data -->
    <script type="text/babel" src="<?php echo get_template_directory_uri(); ?>/js/data/wc-config.js"></script>
    <script type="text/babel" src="<?php echo get_template_directory_uri(); ?>/js/data/products.js"></script>
    <script type="text/babel" src="<?php echo get_template_directory_uri(); ?>/js/data/articles.js"></script>
    
    <!-- 2. Icons -->
    <script type="text/babel" src="<?php echo get_template_directory_uri(); ?>/js/icons/icons.js"></script>
    
    <!-- 3. Atoms -->
    <script type="text/babel" src="<?php echo get_template_directory_uri(); ?>/js/atoms/Accordion.js"></script>
    <script type="text/babel" src="<?php echo get_template_directory_uri(); ?>/js/atoms/InteractiveViewer.js"></script>
    
    <!-- 4. Molecules -->
    <script type="text/babel" src="<?php echo get_template_directory_uri(); ?>/js/molecules/TrustBar.js"></script>
    <script type="text/babel" src="<?php echo get_template_directory_uri(); ?>/js/molecules/ProductCard.js"></script>
    
    <!-- 5. Organisms -->
    <script type="text/babel" src="<?php echo get_template_directory_uri(); ?>/js/organisms/Navbar.js"></script>
    <script type="text/babel" src="<?php echo get_template_directory_uri(); ?>/js/organisms/Footer.js"></script>
    <script type="text/babel" src="<?php echo get_template_directory_uri(); ?>/js/organisms/HeroCarousel.js"></script>
    
    <!-- 6. Pages -->
    <script type="text/babel" src="<?php echo get_template_directory_uri(); ?>/js/pages/HomePage.js"></script>
    <script type="text/babel" src="<?php echo get_template_directory_uri(); ?>/js/pages/ProductsPage.js"></script>
    <script type="text/babel" src="<?php echo get_template_directory_uri(); ?>/js/pages/ProductDetailPage.js"></script>
    <script type="text/babel" src="<?php echo get_template_directory_uri(); ?>/js/pages/BlogPage.js"></script>
    <script type="text/babel" src="<?php echo get_template_directory_uri(); ?>/js/pages/ArticlePage.js"></script>
    <script type="text/babel" src="<?php echo get_template_directory_uri(); ?>/js/pages/AboutPage.js"></script>
    <script type="text/babel" src="<?php echo get_template_directory_uri(); ?>/js/pages/ContactPage.js"></script>
    
    <!-- 7. Main App -->
    <script type="text/babel" src="<?php echo get_template_directory_uri(); ?>/js/app.js"></script>

    <?php wp_footer(); ?>
</body>
</html>
