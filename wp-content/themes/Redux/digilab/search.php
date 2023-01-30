<?php
/**
* The template for displaying search results pages
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
*
* @package WordPress
* @subpackage Digilab
* @since 1.0.0
*/

    get_header();

    // you can use this action for add any content before container element
    do_action( 'digilab_before_search' );

    $search_layout  = digilab_settings( 'search_layout', 'full-width' );
    $search_sidebar = digilab_sidebar( 'digilab-search-sidebar' );    
    $digilab_column = 'full-width' == $search_layout ? 'blog-content col-lg-10 offset-lg-1 col-md-12' : 'blog-content col-lg-8 col-md-8'; 

    ?>
    <!-- search page general div -->
    <div id="tf-search" class="tf-search">        

        <?php digilab_hero_section(); ?>

        <div class="tf-theme-inner-container blog-area full-blog right-sidebar full-blog default-padding">
            <div class="container">
                <div class="blog-items">                    
                    <div class="row">

                        <?php if ( $search_sidebar && 'left-sidebar' == $search_layout ) {  ?>
                            <div id="tf-sidebar" class="sidebar wow fadeInLeft col-lg-4 col-md-4">  
                                <?php dynamic_sidebar( $search_sidebar ); ?>
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

                        <?php if ( $search_sidebar && 'right-sidebar' == $search_layout ) {  ?>
                            <div id="tf-sidebar" class="sidebar wow fadeInLeft col-lg-4 col-md-4">                               
                                <?php dynamic_sidebar( $search_sidebar ); ?>                                
                            </div>
                        <?php } ?>

                    </div>
                </div><!-- End row -->
            </div><!-- End container -->
        </div><!-- End #blog-post -->
    </div>
    <!--End search page general div -->

<?php
    // you can use this action to add any content after search page
    do_action( 'digilab_after_search' );

    get_footer();
?>
