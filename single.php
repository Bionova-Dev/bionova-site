<?php 
/**
 * BIONOVA — Single Template
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header(); ?>

<main class="site-main pt-[142px] pb-16 bg-white min-h-screen">
    <div class="max-w-[900px] mx-auto px-6">
        <?php while (have_posts()) : the_post(); ?>
            <article class="prose max-w-none">
                <h1 class="font-display text-4xl font-extrabold text-gray-900 mb-8"><?php the_title(); ?></h1>
                <div class="text-gray-600 leading-relaxed">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>
