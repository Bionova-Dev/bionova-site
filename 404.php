<?php 
/**
 * BIONOVA — 404 Error Page
 * Intercepts virtual category/product routes and serves the SPA instead of a 404.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Virtual route interception: catch /categorie/*, /product-category/*, /produit/*, /product/*
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
    // Serve the React SPA instead of a 404
    status_header(200); // Override 404 status code
    if ( ! defined('BIONOVA_IS_SPA') ) { define('BIONOVA_IS_SPA', true); }
    get_header();
    ?>
    <div id="root"></div>
    <?php bionova_render_react_bundle(); ?>
    <?php get_footer();
    exit; // Stop WordPress from rendering anything else
}

// Normal 404 page for truly non-existent pages
get_header(); ?>

<main class="site-main pt-[142px] pb-16 bg-white min-h-screen">
    <div class="max-w-3xl mx-auto px-6 text-center py-20">
        <p class="text-9xl font-black text-[#be123c]/10 font-display mb-8">404</p>
        <h1 class="font-display text-4xl font-extrabold text-gray-900 mb-6">Page introuvable</h1>
        <p class="text-xl text-gray-500 mb-12">La page que vous cherchez n'existe pas ou a été déplacée.</p>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-block px-10 py-5 bg-[#be123c] text-white font-bold rounded-2xl shadow-xl hover:bg-gray-900 transition-all hover:-translate-y-1">
            Retour à l'accueil &rarr;
        </a>
    </div>
</main>

<?php get_footer(); ?>
