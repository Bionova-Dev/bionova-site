<?php 
/**
 * BIONOVA — WooCommerce Template
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

if ( is_product() || is_shop() || is_product_category() || is_product_taxonomy() ) {
    get_header(); ?>
    <div id="root"></div>

    <!-- Injection forcée des images produits pour préchargement et présence dans le code -->
    <div style="display:none;" aria-hidden="true">
      <img loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/products/nmn.webp" alt="NMN" />
      <img loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/products/ashwagandha.webp" alt="Ashwagandha" />
      <img loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/products/collagene-marin.webp" alt="Collagène" />
      <img loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/products/neem.webp" alt="Neem" />
      <img loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/products/acide-alpha-lipoique.webp" alt="Acide Alpha Lipoïque" />
      <img loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/products/astaxanthine.webp" alt="Astaxanthine" />
      <img loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/products/biotine.webp" alt="Biotine" />
      <img loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/products/curcumine-boswellia.webp" alt="Curcumine Boswellia" />
      <img loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/products/lcarnosine.webp" alt="L-Carnosine" />
      <img loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/products/lion-mane.webp" alt="Lion Mane" />
    </div>

    <?php bionova_render_react_bundle(); ?>
    <?php get_footer();
} else {
    get_header(); ?>
    <div id="customer_details" class="pt-[142px] pb-16 bg-white min-h-screen">
        <div class="max-w-[1100px] mx-auto px-6">
            <div class="woocommerce">
                <?php woocommerce_content(); ?>
            </div>
        </div>
    </div>
    <?php get_footer();
}
?>
