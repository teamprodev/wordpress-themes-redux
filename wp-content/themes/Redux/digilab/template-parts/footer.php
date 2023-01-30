<?php
/**
* The template for displaying the footer.
*
* Contains the closing of the #content div and all content after
*
* @package digilab
*/

    do_action( 'digilab_before_main_footer' );

    $digilab_post_type = get_post_type( get_the_ID() );

    if ( 'elementor_library' != $digilab_post_type ) {

        // main footer
        do_action( 'digilab_footer_action' );

    }

    do_action( 'digilab_after_main_footer' );

    do_action( 'digilab_before_wp_footer' );
