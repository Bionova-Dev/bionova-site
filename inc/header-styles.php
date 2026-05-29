<?php
/**
 * Bionova Header Dynamic Styles
 * VERSION: 20260511
 */

function bionova_header_conditional_styles() {
    // Inject dynamic header behavior based on page type
    ?>
    <style>
        /* Global fixed white header style */
        .fixed-header-secondary {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #f1f5f9;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'bionova_header_conditional_styles' );
