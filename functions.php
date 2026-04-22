<?php
// Bionova Theme Functions
function bionova_setup() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'bionova_setup' );
?>
