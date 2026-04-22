<?php get_header(); ?>

<div id="customer_details" class="py-32 bg-[#FDF9F6] min-h-screen">
    <div class="max-w-[1100px] mx-auto px-6">
        <div class="woocommerce">
            <?php woocommerce_content(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
