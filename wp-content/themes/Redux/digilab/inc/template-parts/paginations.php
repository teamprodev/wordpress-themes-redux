<?php


/**
 * Custom paginations for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package digilab
*/


/*************************************************
##  next post css class
*************************************************/

if ( ! function_exists( 'digilab_posts_next_pag_attrs' ) ) {
    function digilab_posts_next_pag_attrs()
    {
        return 'class="tf-pagination-link -next"';
    }
    add_filter( 'next_posts_link_attributes', 'digilab_posts_next_pag_attrs' );
}


/*************************************************
##  prev post css class
*************************************************/

if ( ! function_exists( 'digilab_posts_prev_pag_attrs' ) ) {
    function digilab_posts_prev_pag_attrs()
    {
        return 'class="tf-pagination-link -previous"';
    }
    add_filter( 'previous_posts_link_attributes', 'digilab_posts_prev_pag_attrs' );
}


/*************************************************
##  SINLGE POST/CPT NAVIGATION - Display navigation to next/previous post when applicable.
*************************************************/

if ( ! function_exists( 'digilab_single_navigation' ) ) {
    function digilab_single_navigation()
    {
        if ( '0' != digilab_settings( 'single_navigation_visibility', '1' ) ) {

            // Don't print empty markup if there's nowhere to navigate.
            $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
            $next  = get_adjacent_post( false, '', false );

            if ( ! $next && ! $previous ) {
                return;
            }            
            ?>
            <div class="post-pagi-area">     
                <?php if ($previous) { ?>
                <span class="prev-post btn circle btn-theme btn-sm"><?php previous_post_link( '%link', _x('Previous Post', 'Previous post link', 'digilab' ) ); ?></span>     
                <?php } ?>  
                <?php if ($next) { ?>
                <span class="next-post btn circle btn-theme btn-sm"><?php next_post_link( '%link', _x('Next Post', 'Next post link', 'digilab' ) ); ?></span>
                <?php } ?>
            </div>
        <?php
        }
    }
}


/*************************************************
##  SINLGE POST/CPT NAVIGATION 2 - Display navigation to next/previous post when applicable.
*************************************************/

if ( ! function_exists( 'digilab_single_navigation_two' ) ) {
    function digilab_single_navigation_two()
    {
        if ( '1' == digilab_settings( 'single_navigation_visibility', '0' ) ) {

        // Don't print empty markup if there's nowhere to navigate.

        $prevPost = get_previous_post( true );
        $prevthumbnail = $prevPost ? get_the_post_thumbnail( $prevPost->ID, array( 100, 100 ) ) : '';
        $prevclass = $prevPost ? '' : '12';
        $nextPost = get_next_post( true );
        $nextthumbnail = $nextPost ? get_the_post_thumbnail( $nextPost->ID, array( 100, 100 ) ) : '';
        $nextclass = $nextPost ? '6' : '12';
        ?>

            <div class="single-post-nav mt-60">

                <div class="row align-items-sm-center justify-content-sm-between">

                    <?php if ( $prevPost ) : ?>
                        <div class="col-6 col-sm-<?php echo esc_attr( $nextclass ); ?> mb-4 text-left">
                            <div class="__thumb circled">
                                <?php previous_post_link( '%link', $prevthumbnail, TRUE ); ?>
                            </div>
                            <div class="mt-3">
                                <h6 class="__title __prev"><?php previous_post_link( '%link' ,"<< Prev Post", TRUE ); ?></h6>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ( $nextPost ) : ?>
                        <div class="col-6 col-sm-<?php echo esc_attr( $prevclass ); ?> mb-4 text-right">

                            <div class="__thumb circled">
                                <?php next_post_link( '%link', $nextthumbnail, TRUE ); ?>
                            </div>
                            <div class="mt-3">
                                <h6 class="__title __next"><?php next_post_link( '%link',"Next Post >>", TRUE ); ?></h6>
                            </div>
                        </div>
                    <?php endif; ?>

                </div><!--row -->

            </div>

	<?php
        }
    }
}


/*************************************************
## POST PAGINATION - Display post navigation to next/previous post when applicable.
*************************************************/

if ( ! function_exists( 'digilab_index_loop_pagination' ) ) {
    function digilab_index_loop_pagination()
    {
        if ( '0' !=  digilab_settings( 'pagination_visibility', '1' ) ) {
            $pag_class= array();
            $pag_class[] = ('yes' == digilab_settings( 'pag_group') ) ? '-group' : '';
            $pag_class[] = '-style-'.digilab_settings( 'pag_type', 'default' );
            $pag_class[] = '-size-'.digilab_settings( 'pag_size', 'medium' );
            $pag_class[] = '-corner-'.digilab_settings( 'pag_corner', 'square' );
            $pag_class[] = '-align-'.digilab_settings( 'pag_align', 'center' );
            $pag_class = implode( ' ', $pag_class );

            $prev = get_previous_posts_link( '<i class="tf-pagination-icon fas fa-angle-double-left" aria-hidden="true"></i>' );
            $next = get_next_posts_link( '<i class="tf-pagination-icon fas fa-angle-double-right" aria-hidden="true"></i>' );

            if ( is_singular() ) {
                return;
            }

            global $wp_query;

            /** Stop execution if there's only 1 page */
            if ( $wp_query->max_num_pages <= 1 ) {
                return;
            }

            $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
            $max = intval( $wp_query->max_num_pages );

            /** Add current page to the array */
            if ($paged >= 1) {
                $links[] = $paged;
            }

            /** Add the pages around the current page to the array */
            if ($paged >= 3) {
                $links[] = $paged - 1;
                $links[] = $paged - 2;
            }

            if (($paged + 2) <= $max) {
                $links[] = $paged + 2;
                $links[] = $paged + 1;
            }

            echo "<div class='col-12 tf-pagination mt-60".esc_attr( $pag_class )." '>
            <ul class='tf-pagination-inner'>" . "\n";

            /** Previous Post Link */
            if ( get_previous_posts_link() ) {
                echo '<li class="tf-pagination-item">' . wp_kses( $prev, digilab_allowed_html() ) . '</li>';
            }

            /** Link to first page, plus ellipses if necessary */
            if ( ! in_array( 1, $links ) ) {
                $class = 1 == $paged ? ' active' : '';

                printf('<li class="tf-pagination-item%s" ><a class="tf-pagination-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link(1) ), '1' );

                if ( ! in_array( 2, $links ) ) {
                    echo '<li class="tf-pagination-item">…</li>';
                }
            }

            /** Link to current page, plus 2 pages in either direction if necessary */
            sort( $links );
            foreach ( (array) $links as $link ) {
                $class = $paged == $link ? ' active' : '';
                printf('<li class="tf-pagination-item%s" ><a class="tf-pagination-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
            }

            /** Link to last page, plus ellipses if necessary */
            if ( ! in_array( $max, $links ) ) {
                if ( ! in_array( $max - 1, $links ) ) {
                    echo '<li class="tf-pagination-item">…</li>' . "\n";
                }

                $class = $paged == $max ? ' active' : '';
                printf('<li class="tf-pagination-item%s" ><a class="tf-pagination-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
            }

            /** Next Post Link */
            if ( get_next_posts_link() ) {
                echo '<li class="tf-pagination-item">' . wp_kses( $next, digilab_allowed_html() ) . '</li>';
            }

            echo '</ul></div>' . "\n";
        }
    }
}


/*************************************************
##  LINK PAGES CURRENT CLASS
*************************************************/

if ( ! function_exists( 'digilab_current_link_pages' ) ) {
    function digilab_current_link_pages( $link )
    {
        if ( ctype_digit( $link ) ) {
            return '<div class="current">' . $link . '</div>';
        }

        return $link;
    }
    add_filter( 'wp_link_pages_link', 'digilab_current_link_pages' );
}


/*************************************************
##  LINK PAGES
*************************************************/

if ( ! function_exists( 'digilab_wp_link_pages' ) ) {
    function digilab_wp_link_pages()
    {
        // pagination for page links
        wp_link_pages( array(
            'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages', 'digilab' ) . '</span>',
            'after' => '</div>',
            'link_before' => '',
            'link_after' => '',
            'next_or_number' => 'number',
            'separator' => ' ',
            'nextpagelink' => esc_html__( 'Next page', 'digilab' ),
            'previouspagelink' => esc_html__( 'Previous page', 'digilab' ),
            'pagelink' => '%',
            'echo' => 1
        ));
    }
}
