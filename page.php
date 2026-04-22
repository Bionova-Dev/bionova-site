<?php get_header(); ?>

<div class="container py-24 mx-auto px-6">
    <?php 
    if ( have_posts() ) : 
        while ( have_posts() ) : the_post(); 
            the_content(); 
        endwhile; 
    endif; 
    ?>
</div>

<?php get_footer(); ?>
