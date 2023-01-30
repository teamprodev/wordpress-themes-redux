<?php

/**
* default page template
*/

get_header();

do_action( 'digilab_before_page' );

if ( digilab_check_is_elementor() ) {

    while ( have_posts() ) {

        the_post();

        the_content();

        /* theme page link pagination */
        digilab_wp_link_pages();

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) {
            comments_template();
        }
    }

} else {
    ?>

    <div id="tf-page-container" class="tf-page-layout">

        <!-- Hero section - this function using on all inner pages -->
        <?php digilab_hero_section(); ?>

        <div id="tf-page" class="tf-theme-inner-container tf-default-page-container">
            <div class="blog-area full-blog full-blog">
                <div class="container">
                    <div class="row justify-content-center">
                        <!-- Sidebar control column -->
                        <div class="blog-content wow fadeInUp col-lg-10 col-md-12">
                            <div class="item wow fadeInUp">
                                <div class="blog-item-box">
                                    <?php while ( have_posts() ) : the_post(); ?>
                                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                            <div class="content-post tf-theme-content tf-clearfix">
                                                <?php

                                                /* translators: %s: Name of current post */
                                                the_content( sprintf(
                                                    esc_html__( 'Continue reading %s', 'digilab' ),
                                                    the_title( '<span class="screen-reader-text">', '</span>', false )
                                                ) );

                                                /* theme page link pagination */
                                                digilab_wp_link_pages();

                                                ?>
                                            </div>

                                            <?php if ( comments_open() || '0' != get_comments_number() ) { ?>
                                                <div class=" mb-6">
                                                    <?php digilab_single_post_comment_template(); ?>
                                                </div>
                                            <?php } ?>
                                        </div><!--End article -->
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    </div><!--End row -->
                </div>
            </div><!--End container -->
        </div><!--End #tf-page -->

    </div><!--End page general div -->
    <?php
}

// you can use this action for add any content after container element
do_action( 'digilab_after_page' );

get_footer();

?>
