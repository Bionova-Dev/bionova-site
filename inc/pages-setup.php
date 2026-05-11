<?php
/**
 * Bionova Automatic Pages Setup
 * VERSION: 20260511
 */

function bionova_create_mandatory_pages() {
    $pages = array(
        'boutique' => array(
            'title'    => 'Boutique',
            'template' => 'page-boutique.php'
        ),
        'astuces' => array(
            'title'    => 'Astuces',
            'template' => 'page-astuces.php'
        ),
        'expertise' => array(
            'title'    => 'Expertise',
            'template' => 'page-expertise.php'
        ),
        'contact' => array(
            'title'    => 'Contact',
            'template' => 'page-contact.php'
        ),
    );

    foreach ( $pages as $slug => $data ) {
        $page_check = get_page_by_path( $slug );
        
        if ( ! isset( $page_check->ID ) ) {
            $page_id = wp_insert_post( array(
                'post_type'   => 'page',
                'post_title'  => $data['title'],
                'post_name'   => $slug,
                'post_status' => 'publish',
            ) );
            
            if ( $page_id ) {
                update_post_meta( $page_id, '_wp_page_template', $data['template'] );
                flush_rewrite_rules(); // Flush rules when a page is created
            }
        } else {
            // Ensure template is correct even if page exists
            update_post_meta( $page_check->ID, '_wp_page_template', $data['template'] );
        }
    }
}
add_action( 'after_switch_theme', 'bionova_create_mandatory_pages' );
// Also run on init once for existing themes
add_action( 'init', 'bionova_create_mandatory_pages' );
