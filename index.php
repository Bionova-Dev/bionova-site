<?php
/**
 * Bionova Pro Max — Atomic Shell
 * VERSION: 20260511
 */
?>
<?php get_header(); ?>
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
<?php get_footer(); ?>
