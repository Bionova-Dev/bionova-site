<?php 
/**
 * BIONOVA — Search Results
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header(); ?>

<main class="site-main pt-[142px] pb-16 bg-white min-h-screen">
    <div class="max-w-7xl mx-auto px-6">
        <h1 class="font-display text-4xl font-extrabold text-gray-900 mb-12">
            Résultats pour : <span class="text-[#be123c]"><?php echo get_search_query(); ?></span>
        </h1>
        <?php if (have_posts()) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="bg-gray-50 rounded-3xl p-8 border border-gray-100 hover:shadow-xl transition-all">
                        <h2 class="font-display text-xl font-bold text-gray-900 mb-3">
                            <a href="<?php the_permalink(); ?>" class="hover:text-[#be123c] transition-colors"><?php the_title(); ?></a>
                        </h2>
                        <p class="text-gray-500 text-sm line-clamp-3"><?php the_excerpt(); ?></p>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <div class="text-center py-20">
                <p class="text-2xl font-bold text-gray-300 mb-4">Aucun résultat trouvé</p>
                <p class="text-gray-400">Essayez avec des termes différents.</p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
