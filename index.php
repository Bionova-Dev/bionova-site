<?php
if ( ! defined('BIONOVA_IS_SPA') ) { define('BIONOVA_IS_SPA', true); }
get_header(); ?>
    <div id="root"></div>

    <!-- Product images loaded dynamically by React -->

    <?php bionova_render_react_bundle(); ?>
<?php get_footer(); ?>
