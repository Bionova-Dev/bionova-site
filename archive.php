<?php 
/**
 * BIONOVA — Archive Template
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
// Virtual route interception: catch /categorie/*, /product-category/*, /categorie-produit/*, /produit/*, /product/*
$request_uri = isset($_SERVER['REQUEST_URI']) ? strtolower($_SERVER['REQUEST_URI']) : '';
$virtual_prefixes = ['/categorie/', '/product-category/', '/categorie-produit/', '/produit/', '/product/'];
$is_virtual_route = false;

foreach ($virtual_prefixes as $prefix) {
    if (strpos($request_uri, $prefix) !== false) {
        $is_virtual_route = true;
        break;
    }
}

if ($is_virtual_route) {
    // Serve the React SPA instead of archive
    if ( ! defined('BIONOVA_IS_SPA') ) { define('BIONOVA_IS_SPA', true); }
    get_header();
    ?>
    <div id="root"></div>
    <?php bionova_render_react_bundle(); ?>
    <?php get_footer();
    exit; // Stop WordPress from rendering anything else
}

get_header(); ?>
    <div class="max-w-7xl mx-auto px-6">
        <h1 class="font-display text-4xl font-extrabold text-gray-900 mb-12"><?php the_archive_title(); ?></h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php while (have_posts()) : the_post(); ?>
                <article class="bg-gray-50 rounded-3xl p-8 border border-gray-100 hover:shadow-xl transition-all">
                    <h2 class="font-display text-xl font-bold text-gray-900 mb-3">
                        <a href="<?php the_permalink(); ?>" class="hover:text-[#e4002b] transition-colors"><?php the_title(); ?></a>
                    </h2>
                    <p class="text-gray-500 text-sm line-clamp-3"><?php the_excerpt(); ?></p>
                </article>
            <?php endwhile; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
