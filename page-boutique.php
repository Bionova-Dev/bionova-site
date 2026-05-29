<?php
if ( ! defined('BIONOVA_IS_SPA') ) { define('BIONOVA_IS_SPA', true); }
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
<?php get_footer(); ?>
