<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

    <!-- Meta UTF8 charset -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

    <?php

        if ( function_exists( 'wp_body_open' ) ) {
            wp_body_open();
        }

        // theme preloader
        do_action( 'digilab_preloader_action' );

        // Elementor `header` location
        if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) {

            $digilab_post_type = get_post_type( get_the_ID() );
            if ( 'elementor_library' != $digilab_post_type ) {

                // include logo, menu and more contents
                do_action( 'digilab_header_action' );

            }
        }
        
    ?>


