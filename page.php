<?php get_header(); ?>

<main id="customer_details" class="site-main pt-32 pb-16 bg-white min-h-screen">
    <div class="max-w-[1100px] mx-auto px-6">
        <div class="woocommerce">
            <?php while (have_posts()) : the_post(); the_content(); endwhile; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
