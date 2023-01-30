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


    if ( 'default' != digilab_settings( 'error_type', 'default' ) ) {

        if ( class_exists( '\Elementor\Frontend' ) ) {

            if ( !empty( digilab_settings( 'error_elementor_templates' ) ) ) {

                $template_id = digilab_settings( 'error_elementor_templates' );
                $frontend = new \Elementor\Frontend;
                printf( '%1$s', $frontend->get_builder_content( $template_id, false ) );

            } else {

                echo sprintf('<p class="copyright text-center">%1$s <a class="main-color" href="%3$s">%2$s</a></p>',
                    esc_html__('No template exist for footer.', 'digilab'),
                    esc_html__('Add new section template.', 'digilab'),
                    admin_url( 'edit.php?post_type=elementor_library&tabs_group=library&elementor_library_type=section' )
                );
            }
        }


    } else {

        // you can use this action for add any content before container element
        do_action( 'digilab_before_404' );
        $textalign = '0' == digilab_settings( 'image_404_visibility', '1' ) ? ' text-center' : '';
    ?>

    <!-- Start 404 
    ============================================= -->
    <div id="tf-404" class="tf-404 error">
        <div class="error-page-area default-padding">
            <div class="container">
                <div class="row align-center justify-content-center">
                    
                    <?php if ( '0' != digilab_settings( 'image_404_visibility', '1' ) ) { ?>
                        <div class="col-lg-6 thumb">
                            <?php if( ! is_null( digilab_settings( '404_image' ) ) && ! empty( digilab_settings( '404_image' ) ) ) { ?>
                                <img src="<?php echo esc_url( digilab_settings( '404_image' )[ 'url' ] ); ?>" alt="Thumb">                            
                            <?php } else { ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/illustration/404.png" alt="Thumb">
                            <?php } ?>
                        </div>
                    <?php } ?>
                    
                    <div class="col-lg-6<?php echo esc_attr( $textalign ); ?>">
                        <div class="error-box">
                            <?php
                                if ( '0' != digilab_settings( 'error_content_title_visibility', '1' ) ) {                                
                                    if ( '' != digilab_settings( 'error_content_title' ) ) {
                                        echo wp_kses( digilab_settings( 'error_content_title' ), digilab_allowed_html() );
                                    } else {                                    
                                        printf( '<h2>%1$s</h2>', esc_html__( '404','digilab' ) );
                                    }
                                }
                            ?>

                            <?php
                                if ( '0' != digilab_settings( 'error_content_subtitle_visibility', '1' ) ) {
                                    if ( '' != digilab_settings( 'error_content_subtitle' ) ) {
                                        echo wp_kses( digilab_settings( 'error_content_subtitle' ), digilab_allowed_html() );
                                    } else {
                                        printf( '<p>%1$s</p>', esc_html__( 'Sorry! Page not found', 'digilab' ) );
                                    }
                                }
                            ?>

                            <?php
                                if ( '0' != digilab_settings('error_content_btn_visibility', '1' ) ) {
                                    if ( '' != digilab_settings( 'error_content_btn_title' ) ) {
                                        printf( '<a href="%1$s" class="btn circle btn-md btn-gradient">%2$s</a>',
                                            esc_url( home_url('/') ),
                                            esc_html( digilab_settings( 'error_content_btn_title' ) )
                                        );
                                    } else {
                                        printf( '<a href="%1$s" class="btn circle btn-md btn-gradient">%2$s</a>',
                                            esc_url( home_url('/') ),
                                            esc_html__( 'Go to home page', 'digilab' )
                                        );
                                    }
                                }
                            ?>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End 404 -->

    <?php
        // use this action to add any content after 404 page container element
        do_action( 'digilab_after_404' );
    }
