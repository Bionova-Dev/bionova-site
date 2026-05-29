<?php 
/**
 * BIONOVA — Archive Template
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header(); ?>

<main class="site-main pt-[142px] pb-16 bg-white min-h-screen">
    <div class="max-w-7xl mx-auto px-6">
        <h1 class="font-display text-4xl font-extrabold text-gray-900 mb-12"><?php the_archive_title(); ?></h1>
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
    </div>
</main>

<?php get_footer(); ?>
