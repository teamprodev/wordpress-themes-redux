<?php

/*************************************************
## HERO FUNCTION
*************************************************/

if ( ! function_exists( 'digilab_hero_section' ) ) {
    function digilab_hero_section()
    {
        $h_s = get_bloginfo( 'description' );
        $h_t = get_bloginfo( 'name' ) . ' ' .esc_html__( 'Blog', 'digilab' );
        $page_id = '';

        if ( is_404() ) { // error page
            $name = 'error';
            $h_t = esc_html__( '404 - Not Found', 'digilab' );
        } elseif( is_archive() ) { // blog and cpt archive page
            $name = 'archive';
            $h_t = get_the_archive_title();
        } elseif( is_search() ) { // search page
            $name = 'search';
            $h_t = esc_html__( 'Search results for :', 'digilab' );
        } elseif( is_home() || is_front_page() ) { // blog post loop page index.php or your choise on settings
            $name = 'blog';
            $h_t = esc_html( digilab_settings( 'blog_title', $h_t ) );
        } elseif( is_single() && !is_singular('portfolio') ) { // blog post single/singular page
            $name = 'single';
            $h_t = esc_html( digilab_settings( 'blog_title', $h_t ) );
        } elseif( is_singular('portfolio') ) { // it is cpt and if you want use another clone this condition and add your cpt name as portfolio
            $name = 'single_portfolio';
            $h_t = get_the_title();
        } elseif( is_page() ) {	// default or custom page
            $name = 'page';
        }

        $h_v = digilab_settings( $name.'_hero_visibility', '1' );
        // site title
        $h_s = digilab_settings( $name.'_site_title', $h_s );
        // page title
        $h_t = digilab_settings( $name.'_title', $h_t ) ? digilab_settings( $name.'_title', $h_t ) : $h_t;
        // page breadcrumbs
        $h_b = digilab_settings('breadcrumbs_visibility', '1');

        if ( is_page() ) {
            // site title
            $h_s = $h_s;
            // page title
            $h_t = get_the_title();

            $h_v = $h_t ? '1' : '0';
        }

        do_action( 'digilab_before_hero_action' );

        if ( '0' != $h_v ) { ?>
            <!-- Start Breadcrumb 
            ============================================= -->
            <div class="breadcrumb-area bg-gradient text-center">
                <!-- Fixed BG -->                
                <div class="fixed-bg" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/shape/bg-4.png);"></div>
                <!-- Fixed BG -->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <?php 
                                if ( $h_t ) {

                                    printf( '<h1>%s %s</h1>',
                                        wp_kses($h_t, digilab_allowed_html()),
                                        strlen(get_search_query() ) > 16 ? substr( get_search_query(), 0, 16 ).'...' : get_search_query()
                                    );

                                }else {

                                    the_title('<h1>', '</h1>');

                                }

                                do_action( 'digilab_after_page_title' );

                                if ( $h_s ) {

                                    printf( '<p class="tf-hero-desc header-desc">%s</p>', wp_kses( $h_s, digilab_allowed_html() ) );

                                }

                                if ( '1' == $h_b ) {

                                    digilab_breadcrumbs();
                                    
                                }
                            ?>                                
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb -->
        <?php
        } // hide hero area
        do_action( 'digilab_after_hero_action' );
    }
}
