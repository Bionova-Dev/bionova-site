<?php get_header(); ?>

<div id="customer_details" class="pt-32 pb-16 bg-white min-h-screen">
    <div class="max-w-[1100px] mx-auto px-6">
        <div class="woocommerce">
            <?php woocommerce_content(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
