<?php get_header(); ?>

<main id="customer_details" class="site-main container py-24 mx-auto px-6">
    <div class="woocommerce">
        <?php while (have_posts()) : the_post(); the_content(); endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>
