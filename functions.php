<?php
// Bionova Theme Functions
function bionova_setup() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'bionova_setup' );

// Configuration 100% Tunisie
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
    $fields['billing']['billing_country']['default'] = 'TN';
    return $fields;
}

// Restriction aux pays autorisés (Tunisie uniquement)
add_filter( 'woocommerce_countries', 'restrict_to_tunisia' );
function restrict_to_tunisia( $countries ) {
    return array( 'TN' => 'Tunisie' );
}
?>
