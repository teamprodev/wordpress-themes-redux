<?php

if ( ! function_exists( 'digilab_post_style_one' ) ) {

    function digilab_post_style_one()
    {
        $index_type = digilab_settings( 'index_type', 'default' );
        $index_post_column = digilab_settings( 'index_post_column', 'col-lg-6' );
        $index_post_column = 'grid' == $index_type || 'masonry' == $index_type ? $index_post_column : '';
        $masonry = 'masonry' == $index_type ? ' masonry-item' : '';
        ?>
        <div id="post-<?php echo get_the_ID(); ?>" <?php post_class(); ?>>
            <div class="single-item">
                <div class="item wow fadeInUp">
                    <?php digilab_blog_post_thumbnail(); ?>

                    <div class="info">
                        <div class="meta">
                            <ul>
                                <?php
                                    if ( '0' != digilab_settings( 'post_author_visibility', '1' ) ) {
                                        printf( '<li><i class="fas fa-user"></i> By <a href="%1$s" title="%1$s">%2$s</a></li>',
                                            get_author_posts_url( get_the_author_meta( 'ID' ) ),
                                            esc_html( get_the_author() )
                                        );
                                    }
                                    
                                    if ( '0' != digilab_settings( 'post_date_visibility', '1' ) ) {
                                        $archive_year  = get_the_time( 'Y' );
                                        $archive_month = get_the_time( 'm' );
                                        $archive_day   = get_the_time( 'd' );
                                        printf( '<li><i class="fas fa-calendar-alt"></i> %s</li>',
                                            get_the_date()
                                        );
                                    }
                                ?>
                            </ul>
                        </div>

                        <?php
                            if ( '0' != digilab_settings( 'post_title_visibility', '1' ) ) {
                                printf( '<h4><a href="%s" title="%s">%s</a></h4>',
                                    get_permalink(),
                                    the_title_attribute( 'echo=0' ),
                                    get_the_title()
                                );
                            }

                            digilab_blog_post_content();

                            digilab_blog_post_button();                            
                        ?>                        
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}



if ( ! function_exists('digilab_sticky_post')) {

    function digilab_sticky_post()
    {
        if ( is_sticky() ) { ?>
            <div class="tf-sticky-label"><span class="label is-green-light"><?php echo esc_html__( 'Sticky', 'digilab' ); ?></span></div>
        <?php }
    }
}

if ( ! function_exists( 'digilab_blog_post_thumbnail' ) ) {

    function digilab_blog_post_thumbnail()
    {
        if ( has_post_thumbnail() ) {

            printf( '<div class="thumb"><a href="%s" title="%s">%s</a></div>',
                esc_url( get_permalink() ),
                the_title_attribute( 'echo=0' ),
                get_the_post_thumbnail( get_the_ID(), 'large' )
            );

        }
    }
}


if ( ! function_exists( 'digilab_blog_post_title' ) ) {

    function digilab_blog_post_title()
    {
        if ( '0' != digilab_settings( 'post_title_visibility', '1' ) ) {

            the_title( sprintf( '<h4 class="title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );

        }
    }
}


if ( ! function_exists( 'digilab_blog_post_date' ) ) {

    function digilab_blog_post_date()
    {
        if ( '0' != digilab_settings( 'post_date_visibility', '1' ) ) {

            $archive_year  = get_the_time( 'Y' );
            $archive_month = get_the_time( 'm' );
            $archive_day   = get_the_time( 'd' );

            ?>

            <div class="col-3 valign">
                <div class="date">
                    <a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) ); ?>">
                        <span class="num"><?php the_time('d'); ?></span>
                        <span><?php the_time('F'); ?></span>
                    </a>
                </div>
            </div>

        <?php
        }
    }
}


if ( ! function_exists( 'digilab_blog_post_meta' ) ) {

    function digilab_blog_post_meta()
    {
        if ( '0' != digilab_settings('post_meta_visibility', '1' ) ) {

            if( get_the_author_meta( 'url' ) ) {

                echo sprintf( '<p class="blog-post_meta">%1$s %2$s %3$s</p>',
                    apply_filters( 'digilab_post_date', get_the_date(), true ),
                    esc_html__( 'By', 'digilab' ),
                    get_the_author_link()
                );

            } else {

                echo sprintf( '<p class="blog-post_meta">%1$s %2$s <a href="%3$s" title="%4$s">%4$s</a></p>',
                    apply_filters( 'digilab_post_date', get_the_date(), true ),
                    esc_html__( 'By', 'digilab' ),
                    esc_url( get_permalink() ),
                    esc_html( get_the_author() )
                );

            }
            
        }
    }
}


if ( ! function_exists( 'digilab_blog_post_category' ) ) {
    function digilab_blog_post_category()
    {

        if ( has_category() && '0' != digilab_settings( 'post_category_visibility', '1' ) ) { ?>

            <div class="blog-post_category"><?php the_category( ', ' ); ?></div>
        
        <?php }

    }
}


if ( ! function_exists( 'digilab_blog_post_tags' ) ) {
    function digilab_blog_post_tags()
    {

        if ( has_tag() && '0' != digilab_settings( 'post_tags_visibility', '1' ) ) {

            the_tags('<div class="tags">',' ','</div>');

        }

    }
}


if ( ! function_exists( 'digilab_blog_post_content' ) ) {

    function digilab_blog_post_content()
    {
        if ( '0' != digilab_settings( 'post_excerpt_visibility', '1' ) ) {

            if ( has_excerpt() ) {

                echo wpautop( wp_trim_words( strip_tags( trim( get_the_excerpt() ) ), digilab_settings( 'excerptsz', '50' ) ) );

            } else {

                echo wpautop( wp_trim_words( strip_tags( trim( get_the_content() ) ), digilab_settings( 'excerptsz', '50' ) ) );

            }

            digilab_wp_link_pages();
        }
    }
}

if (!function_exists( 'digilab_blog_post_button')) {

    function digilab_blog_post_button()
    {
        if ('0' != digilab_settings( 'post_button_visibility', '1')) {

            $button_title = digilab_settings('post_button_title') ? esc_html(digilab_settings('post_button_title')) : esc_html__('Read More', 'digilab');

            printf('<a class="btn circle btn-theme border btn-sm" href="%s" title="%s">%s <i class="fas fa-long-arrow-alt-right"></i></a>',
                get_permalink(),
                the_title_attribute( 'echo=0' ),
                $button_title
            );

        }
    }
}
