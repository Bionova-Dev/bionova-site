<?php
/**
 * Bionova Theme Setup
 * VERSION: 20260511
 */

if ( ! function_exists( 'bionova_setup' ) ) :
    function bionova_setup() {
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'woocommerce' );
        add_theme_support( 'menus' );
        
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary Menu', 'bionova' ),
        ) );
    }
endif;
add_action( 'after_setup_theme', 'bionova_setup' );
