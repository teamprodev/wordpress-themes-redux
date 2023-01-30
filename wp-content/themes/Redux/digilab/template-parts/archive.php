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

    // you can use this action for add any content before container element
    do_action( 'digilab_before_archive' );

    $archive_layout = digilab_settings( 'archive_layout', 'full-width' );
    $archive_sidebar = digilab_sidebar( 'digilab-archive-sidebar' );
    $digilab_column = 'full-width' == $archive_layout ? 'blog-content col-lg-10 offset-lg-1 col-md-12' : 'blog-content col-lg-8 col-md-8'; 

?>

    <!-- archive page general div -->
    <div id="tf-archive" class="tf-archive" >

        <?php digilab_hero_section(); ?>

        <div class="tf-theme-inner-container blog-area full-blog blog-standard full-blog default-padding">
            <div class="container">
                <div class="blog-items">                    
                    <!-- Content Column-->
                    <div class="row">
                    
                        <?php if ( $archive_sidebar && 'left-sidebar' == $archive_layout ) {  ?>
                            <div id="tf-sidebar" class="sidebar wow fadeInLeft col-lg-4 col-md-12">  
                                <?php dynamic_sidebar( $archive_sidebar ); ?>
                            </div>                            
                        <?php } ?>

                        <div class="<?php echo esc_attr( $digilab_column ); ?>">
                            <div class="blog-item-box">
                                <?php
                                    if ( have_posts() ) {

                                        while ( have_posts() ) : the_post();

                                            digilab_post_style_one();

                                        endwhile;

                                        // this function working with wp reading settins + posts
                                        digilab_index_loop_pagination();

                                    } else {
                                        // if there are no posts, read content none function
                                        digilab_content_none();
                                    }
                                ?>
                            </div>
                        </div>

                        <?php if ( $archive_sidebar && 'right-sidebar' == $archive_layout ) {  ?>
                            <div id="tf-sidebar" class="sidebar wow fadeInLeft col-lg-4 col-md-12">  
                                <?php dynamic_sidebar( $archive_sidebar ); ?>
                            </div>                            
                        <?php } ?>

                    </div>
                    <!-- End content -->

                    <!-- Right sidebar -->
                    <?php if ( $archive_sidebar && 'right-sidebar' == $archive_layout ) { ?>
                        <div id="tf-sidebar" class="tf-sidebar col-12 col-xl-4">
                            <div class="blog-sidebar tf-sidebar-inner">
                                <?php dynamic_sidebar( $archive_sidebar ); ?>
                            </div>
                        </div>
                    <?php } ?>

                </div><!-- End row -->
            </div><!-- End container -->
        </div><!-- End #blog-post -->
    </div>
    <!-- End archive page general div-->

<?php do_action( 'digilab_after_archive' ); ?>
