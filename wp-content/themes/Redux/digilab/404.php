<?php

/**
* The template for displaying 404 pages (not found)
*
* @link https://codex.wordpress.org/Creating_an_Error_404_Page
*
* @package WordPress
* @subpackage Digilab
* @since 1.0.0
*/

get_header();

// Elementor `404` location
if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {    
    get_template_part( 'template-parts/404' );
}

get_footer();

?>
