<?php
/**
* The template for displaying the footer.
*
* Contains the closing of the #content div and all content after
*
* @package digilab
*/

    // Elementor `footer` location 
    if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) {
        get_template_part( 'template-parts/footer' );
    }

    wp_footer();

?>
</body>
</html>
