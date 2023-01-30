<?php


/**
* Custom template parts for this theme.
*
* Eventually, some of the functionality here could be replaced by core features.
*
* @package digilab
*/


add_action( 'digilab_footer_action', 'digilab_footer', 10 );
add_action( 'elementor/page_templates/canvas/after_content',function(){
    if ( '1' == digilab_settings( 'canvas_template_footer_visibility','0' ) ) {
        digilab_footer();
    }
}, 10 );

if ( ! function_exists( 'digilab_footer' ) ) {
    function digilab_footer()
    {

        $footer_visibility = digilab_settings( 'footer_visibility', '1' );
        $page_footer_visibility = digilab_page_settings( 'digilab_elementor_hide_page_footer', '1' );
        $footer_visibility = '0' != $footer_visibility && is_page() ? $page_footer_visibility : $footer_visibility;

        $type = digilab_settings( 'footer_type', 'default' );

        if ( '0' != $footer_visibility  ) { 

            if ( 'elementor' == $type ) {
                
                if ( class_exists( '\Elementor\Frontend' ) ) {

                    if ( !empty( digilab_settings( 'footer_elementor_templates' ) ) ) {

                        $template_id = digilab_settings( 'footer_elementor_templates' );
                        $frontend = new \Elementor\Frontend;

                        printf( '%1$s', $frontend->get_builder_content( (int)$template_id, false ) );

                    } else {
                        printf( '<p class="info text-center ptb-40"><i class="fa fa-info"></i> %s <a class="btn btn-primary btn-solid btn-radius" href="%s">%s</a></p>',
                            esc_html__( 'No template exist for the footer.', 'digilab' ),
                            admin_url( 'edit.php?post_type=elementor_library&tabs_group=library&elementor_library_type=section' ),
                            esc_html__( 'Add new section template.', 'digilab' )
                        );
                    }
                }

            } else {

                digilab_copyright();

            }
        }
    }
}



/*************************************************
##  FOOTER COPYRIGHT
*************************************************/

if ( ! function_exists( 'digilab_copyright' ) ) {
    function digilab_copyright()
    {
        $footer_design = digilab_settings( 'footer_type', 'default' );
        $footer_links_visibility = digilab_settings( 'footer_links_visibility', '0' );
        $footer_copy_column = $footer_links_visibility == 1 ? "col-md-6" : "col-md-12 text-center";

        ?>
        <footer class="theme-dark text-light">

            <?php if( $footer_design == 'shape' ) { ?>
                <div class="svg-shape">
                    <svg xmlns="http://www.w3.org/2000/svg" class="light" preserveAspectRatio="none" viewBox="0 0 1070 52">
                        <path d="M0,0S247,91,505,32c261.17-59.72,565-13,565-13V0Z"></path>
                    </svg>
                </div>
            <?php } ?>

            <!-- Start Footer Bottom -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="<?php echo esc_attr( $footer_copy_column ) ?>">
                            <?php
                                if ( '0' != digilab_settings( 'footer_copyright_visibility', '1' ) ) {

                                    if ( '' != digilab_settings( 'footer_copyright' ) ) {

                                        echo wp_kses( digilab_settings( 'footer_copyright' ), digilab_allowed_html() );

                                    } else {

                                        printf( '<p>&copy; %1$s, <a href="%2$s">%3$s</a> Theme. %4$s <a class="dev" href="https://themefora.com/contact/">%5$s</a></p>',
                                            date( 'Y' ),
                                            esc_url( home_url( '/' ) ),
                                            get_bloginfo( 'name' ),
                                            esc_html__( 'Made with passion by', 'digilab' ),
                                            esc_html__( 'Themefora.', 'digilab' )
                                        );

                                    }
                                }
                            ?>
                        </div>
                        <?php if( $footer_links_visibility == '1' ) { ?>
                            <div class="col-md-6 text-right link">
                            <?php
                                wp_nav_menu(
                                    array(
                                        'menu' => '',
                                        'theme_location' => 'footer_menu',
                                        'container' => '',
                                        'container_class' => '',
                                        'container_id' => '',
                                        'menu_class' => '',
                                        'menu_id' => '',
                                        'items_wrap' => '%3$s',
                                        'before' => '',
                                        'after' => '',
                                        'link_before' => '',
                                        'link_after' => '',
                                        'depth' => 4,
                                        'echo' => true,
                                        'fallback_cb' => 'Digilab_Menu::fallback',
                                        'walker' => new Digilab_Menu()
                                    )
                                );
                            ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- End Footer Bottom -->
        </footer>

        <?php
    }
}
