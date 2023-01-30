<?php
/**
* The main template file
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package WordPress 
* @subpackage Digilab 
* @since 1.0.0
*/

    get_header();

    do_action('digilab_before_index');

    $index_type       = digilab_settings('index_type', 'default');
    $index_container  = 'fluid' == digilab_settings('index_container_type', 'boxed' ) ? 'container-fluid' : 'container';

    $digilab_layout   = digilab_settings('index_layout', 'right-sidebar');
    $digilab_column   = !is_active_sidebar('sidebar-1') || 'full-width' == $digilab_layout ? 'blog-content col-lg-10 offset-lg-1 col-md-12' : 'blog-content col-lg-8 col-md-12';        
?>
    <!-- container -->
    <div id="tf-index" class="tf-index">
        <!-- Hero section - this function using on all inner pages -->
        <?php digilab_hero_section(); ?>

        <?php
            if ( class_exists('\Elementor\Frontend' ) && '1' == digilab_settings( 'use_blog_before_content_templates' ) ) {
                if ( ! empty( digilab_settings( 'blog_before_content_templates' ) ) ) {
                    $template_id = digilab_settings('blog_before_content_templates');
                    $frontend = new \Elementor\Frontend;
                    printf('%1$s', $frontend->get_builder_content($template_id, false) );
                }else {
                    printf('<p class="info text-center ptb-40"><i class="fa fa-info"></i> %s <a class="btn btn-primary btn-solid btn-radius" href="%s">%s</a></p>',
                        esc_html__('No template exist for before blog content.', 'digilab' ),
                        admin_url('edit.php?post_type=elementor_library&tabs_group=library&elementor_library_type=section' ),
                        esc_html__('Add new section template.', 'digilab' )
                    );
                }
            }
        ?>

        <div class="tf-theme-inner-container blog-area full-blog right-sidebar default-padding">
            <div class="<?php echo esc_attr( $index_container ); ?>">            
                <div class="blog-items">
                    <div class="row">
                    
                        <?php
                            if( is_active_sidebar( 'sidebar-1' ) && 'left-sidebar' == $digilab_layout ) {
                                get_sidebar();                                
                            }
                        ?>                                                                

                        <div class="<?php echo esc_attr( $digilab_column ); ?>">
                            <div class="blog-item-box">
                                <?php
                                    if ( have_posts() ) {
                                        if( 'grid' == $index_type ) {
                                            echo '<div class="row">';
                                        }
                                        
                                        if( 'masonry' == $index_type ) {
                                            wp_enqueue_script('imagesloaded');
                                            wp_enqueue_script('isotope-pkgd');
                                            echo '<div class="row">';
                                            echo '<div id="masonry-container">';
                                        }

                                        while ( have_posts() ) : the_post();
                                            // if there are posts, run digilab_post_style_one function
                                            // contain supported post formats from theme
                                            digilab_post_style_one();

                                        endwhile;

                                        if('grid' == $index_type ) {
                                            echo '</div>';
                                        }
                                        if('masonry' == $index_type ) {
                                            echo '</div>';
                                            echo '</div>';
                                        }

                                        // this function working with wp reading settins + posts
                                        digilab_index_loop_pagination();
                                    } else {
                                        // if there are no posts, read content none function
                                        digilab_content_none();
                                    }
                                ?>
                            </div>
                        </div>                        
                        
                        <?php
                            if( is_active_sidebar( 'sidebar-1' ) && 'right-sidebar' == $digilab_layout ) {                                
                                get_sidebar();                                
                            }
                        ?>                        
                    </div> <!-- end row -->
                </div><!--End blog-items -->
            </div><!--End container -->
        </div><!--End #blog -->
    </div><!--End index general div -->

    <?php
        if ( class_exists( '\Elementor\Frontend' ) && '1' == digilab_settings( 'use_blog_after_content_templates' ) ) {
            if ( !empty( digilab_settings('blog_after_content_templates' ) ) ) {
                $template_id = digilab_settings('blog_after_content_templates');
                $frontend = new \Elementor\Frontend;
                printf( '%1$s', $frontend->get_builder_content( $template_id, false ) );
            } else {
                printf('<p class="info text-center ptb-40"><i class="fa fa-info"></i> %s <a class="btn btn-primary btn-solid btn-radius" href="%s">%s</a></p>',
                    esc_html__('No template exist for after blog content.', 'digilab' ),
                    admin_url('edit.php?post_type=elementor_library&tabs_group=library&elementor_library_type=section' ),
                    esc_html__('Add new section template.', 'digilab' )
                );
            }
        }
    ?>
<?php

    // you can use this action to add any content after index page
    do_action('digilab_after_index');

    get_footer();

?>
