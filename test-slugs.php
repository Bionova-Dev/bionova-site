<?php
// Bootstrap WordPress
$wp_load = dirname(__FILE__) . '/../../../wp-load.php';
if (file_exists($wp_load)) {
    require_once($wp_load);
} else {
    echo "wp-load not found";
    exit;
}

$terms = get_terms( array(
    'taxonomy' => 'product_cat',
    'hide_empty' => false,
) );

if (is_wp_error($terms)) {
    echo "Error: " . $terms->get_error_message();
} else {
    foreach ($terms as $term) {
        echo $term->name . ' => ' . $term->slug . "\n";
    }
}
