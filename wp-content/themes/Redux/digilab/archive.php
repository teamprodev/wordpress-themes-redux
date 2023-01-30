<?php
/**
* The template for displaying archive pages
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package WordPress
* @subpackage Digilab
* @since 1.0.0
*/

    get_header();

    // Elementor `archive` location
    if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'archive' ) ) {
        get_template_part( 'template-parts/archive' );
    }

    get_footer();
?>
