<?php

/**
* The template for displaying all single posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package WordPress
* @subpackage Digilab
* @since 1.0.0
*/

    // you can use this action to add any content before single page
    do_action( 'digilab_before_post_single' );

    $digilab_layout = digilab_settings( 'single_layout', 'full-width' );

    if ( digilab_check_is_elementor() && digilab_check_is_post() ) {

        while ( have_posts() ) {

            the_post();

            the_content();

        }

    } else {

        if ( 'full-width' != $digilab_layout ) {

            digilab_single_layout_sidebar();

        } else {

            digilab_single_layout_fullwidth();

        }
    }

    // you can use this action to add any content after single content
    do_action( 'digilab_after_post_single' );
