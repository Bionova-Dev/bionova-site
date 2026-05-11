<?php
/**
 * Bionova Header Dynamic Styles
 * VERSION: 20260511
 */

function bionova_header_conditional_styles() {
    // Inject dynamic header behavior based on page type
    ?>
    <style>
        <?php if ( is_front_page() ) : ?>
            /* Home specific overrides if any */
        <?php else : ?>
            /* Secondary pages: fixed white header */
            .fixed-header-secondary {
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
                border-bottom: 1px solid #f1f5f9;
            }
        <?php endif; ?>
    </style>
    <?php
}
add_action( 'wp_head', 'bionova_header_conditional_styles' );
