<?php

if ( ! function_exists( 'digilab_single_layout_fullwidth' ) ) {

    function digilab_single_layout_fullwidth()
    {
        $thumb_none = !has_post_thumbnail() ? " thumb-none" : "";
    ?>
        <!-- Single page general div -->
        <div id="tf-single" class="tf-single">

            <?php digilab_single_post_header(); ?>

            <div class="blog-area single full-blog default-padding pb-60">
                <div class="container">
                    <div class="blog-items">
                        <div class="row">
                            <div class="blog-content wow fadeInUp col-lg-10 offset-lg-1 col-md-12<?php echo esc_attr( $thumb_none ) ?>">
                                <div class="item wow fadeInUp">
                                    <div class="blog-item-box">

                                        <?php digilab_post_format(); ?>

                                        <div class="info">
                                            <?php
                                                if ( '0' != digilab_settings( 'single_post_author_box_visibility', '1' ) ) { ?>
                                                    <div class="meta">
                                                        <ul>
                                                            <li><i class="fas fa-user"></i> <?php echo digilab_post_meta_author(); ?></li>
                                                            <li><i class="fas fa-calendar-alt"></i> <?php echo digilab_post_meta_date(); ?></li>
                                                        </ul>
                                                    </div>
                                                <?php }
                                            ?>

                                            <div class="tf-theme-content tf-clearfix">
                                                <?php
                                                    while ( have_posts() ) :

                                                        the_post();

                                                        the_content();

                                                        digilab_wp_link_pages();

                                                    endwhile;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                

                                <?php digilab_single_post_categories(); ?>

                                <?php digilab_single_post_tags(); ?>

                                <?php digilab_single_navigation(); ?>

                                <?php digilab_single_post_comment_template(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php digilab_single_post_related(); ?>

        </div>
        <!--End single page general div -->
    <?php
    }
}

if ( ! function_exists( 'digilab_single_layout_sidebar' ) ) {

    function digilab_single_layout_sidebar()
    {
        $digilab_layout  = digilab_settings( 'single_layout', 'right-sidebar' );
        $digilab_sidebar = digilab_sidebar( 'digilab-single-sidebar' );
        $digilab_column  = 'full-width' == $digilab_layout ? 'blog-content col-lg-10 offset-lg-1 col-md-12' : 'blog-content col-lg-8 col-md-8';        

        ?>        

        <!-- Single page general div -->
        <div id="tf-single" class="tf-single">

            <?php digilab_single_post_header(); ?>

            <div class="tf-theme-inner-container blog-area single full-blog right-sidebar full-blog default-padding">
                <div class="container">
                    <div class="blog-items">
                        <div class="row">

                            <?php if ( $digilab_sidebar && 'left-sidebar' == $digilab_layout ) {  ?>
                                <div id="tf-sidebar" class="sidebar wow fadeInLeft col-lg-4 col-md-4">  
                                    <?php dynamic_sidebar( $digilab_sidebar ); ?>
                                </div>                            
                            <?php } ?>

                            <div class="<?php echo esc_attr( $digilab_column ); ?>">
                                <div class="item wow fadeInUp">
                                    <div class="blog-item-box">

                                        <?php digilab_post_format(); ?>

                                        <div class="info">
                                            <div class="tags">
                                                <?php the_tags('', ' ', ''); ?>
                                            </div>
                                            <div class="meta">
                                                <ul>
                                                    <li><i class="fas fa-user"></i> <?php echo digilab_post_meta_author(); ?></li>
                                                    <li><i class="fas fa-calendar-alt"></i> <?php echo digilab_post_meta_date(); ?></li>
                                                </ul>
                                            </div>
                                            <div class="tf-theme-content tf-clearfix">
                                                <?php
                                                    while ( have_posts() ) :

                                                        the_post();

                                                        the_content();

                                                        digilab_wp_link_pages();

                                                    endwhile;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php digilab_single_post_categories(); ?>

                                <?php digilab_single_post_tags(); ?>

                                <?php digilab_single_navigation(); ?>

                                <?php digilab_single_post_comment_template(); ?>

                            </div>

                            <?php if ( $digilab_sidebar && 'right-sidebar' == $digilab_layout ) {  ?>
                                <div id="tf-sidebar" class="sidebar wow fadeInLeft col-lg-4 col-md-4">  
                                    <?php dynamic_sidebar( $digilab_sidebar ); ?>
                                </div>                            
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>

            <?php digilab_single_post_related(); ?>

        </div>
        <!--End single page general div -->

        <?php
    }
}


if ( ! function_exists( 'digilab_single_post_header_content' ) ) {

    function digilab_single_post_header()
    {
        $breadcrumbs_visibility = digilab_settings('breadcrumbs_visibility', '1');
        $separator = '/';

        ?>

        <div class="breadcrumb-area bg-gradient text-center">
            <!-- Fixed BG -->
            <div class="fixed-bg" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/shape/bg-4.png);"></div>
            <!-- Fixed BG -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <?php the_title( '<h1 class="tf-hero-title header-title">', '</h1>' ); ?>
                        <?php
                            if ( $breadcrumbs_visibility == '1' ) {
                                digilab_breadcrumbs();
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
}



if ( ! function_exists( 'digilab_single_post_formats_content' ) ) {

    function digilab_single_post_formats_content()
    {
        if ( has_post_thumbnail() ) {

            digilab_post_format();
        }
    }
}


if ( ! function_exists( 'digilab_single_post_tags' ) ) {

    function digilab_single_post_tags()
    {
        if ( '0' != digilab_settings( 'single_postmeta_tags_visibility', '1' ) && has_tag() ) {
        ?>           
            
            <div class="post-tags share">
                <div class="tags">
                    <div class="tags-title"><?php esc_html_e('Tags', 'digilab'); ?></div>
                    <div class="tag"><?php the_tags('', ' ', ''); ?></div>
                </div>               
            </div>

        <?php
        }
    }
}


if ( ! function_exists( 'digilab_single_post_comment_template' ) ) {

    function digilab_single_post_comment_template()
    {

        if ( comments_open() || '0' != get_comments_number() ) {

            comments_template();

        }
    }
}


if ( ! function_exists( 'digilab_single_post_categories' ) ) {

    function digilab_single_post_categories()
    {
        if ( '0' != digilab_settings( 'post_category_visibility', '1' ) && has_category() ) {
        ?> 
            <div class="post-categories">
                <div class="categories">
                    <div class="category-title"><?php esc_html_e('Categories', 'digilab'); ?></div>
                    <div class="categories"><?php the_category( ' ' ); ?></div>
                </div>               
            </div>
        <?php
        }
    }
}


if ( ! function_exists( 'digilab_post_meta_date' ) ) {

    function digilab_post_meta_date()
    {
        $archive_year = get_the_time( 'Y' );
        $archive_month = get_the_time( 'm' );
        $archive_day = get_the_time( 'd' );
        ?><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
        <?php
    }
}

if ( ! function_exists( 'digilab_post_meta_author' ) ) {

    function digilab_post_meta_author()
    {
        global $post;
        $author_id = $post->post_author;
        $author_link = get_author_posts_url( $author_id );
        ?><a href="<?php echo esc_url( $author_link ); ?>"><?php the_author_meta( 'display_name', $post->post_author ); ?></a>
        <?php
    }
}


if ( ! function_exists( 'digilab_post_meta_comment_number' ) ) {

    function digilab_post_meta_comment_number()
    {
        ?>
        <a href="<?php echo get_comments_link( get_the_ID() ); ?>">
            <?php printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'digilab' ), number_format_i18n( get_comments_number() ) ); ?>
        </a>
        <?php
    }
}


/*************************************************
##  POST FORMAT
*************************************************/

if ( ! function_exists( 'digilab_post_format' ) ) {

    function digilab_post_format()
    {
        // post format
        $format = get_post_format();
        $format = $format ? $format : 'standard';

        // post format: video or audio embed
        if ( 'video' == $format || 'audio' == $format ) {

            digilab_single_post_format_embed();

        // post format: gallery
        } elseif ( 'gallery' == $format ) {

            digilab_single_post_format_gallery();

        // post format: standart
        } else {

            if ( has_post_thumbnail() ) { ?>

                <div class="thumb">

                    <?php the_post_thumbnail( 'full', array( 'class' => 'digilab-post-image' ) ); ?>
                    
                </div>

            <?php }

        } // end post format
    }
}


/*************************************************
## POST FORMAT : VIDEO OR AUDIO EMBED
*************************************************/
if ( ! function_exists( 'digilab_single_post_format_embed' ) ) {

    function digilab_single_post_format_embed()
    {
        $post    = get_post( get_the_ID() );
        $content = apply_filters( 'the_content', $post->post_content );
        $embed   = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe', 'audio'  ) );

        if ( has_post_thumbnail() ) {
            
            the_post_thumbnail( 'full', array( 'class'=>'digilab-post-image' ) );

        } else {

            if ( false === strpos( $content, 'wp-playlist-script') ) {
                // If not a single post, highlight the video file.
                if (! empty( $embed ) ) {
                    foreach ( $embed as $embed_html ) { ?>
                        <div class="blog-single_media_video text-center"><?php echo wp_kses( $embed_html, digilab_allowed_html() ); ?></div>
                        <?php
                    }
                }
            }
        }
    }
}


/*************************************************
## POST FORMAT : GALLERY
*************************************************/
if ( ! function_exists( 'digilab_single_post_format_gallery' ) ) {

    function digilab_single_post_format_gallery()
    {
        $images = get_post_meta( get_the_ID(), 'digilab_post_gallery' );

        if ( $images ) { ?>

            <div class="blog-single_media_gallery">
                <div class="slick-slider text-center">

                    <?php foreach ( $images as $image ) { ?>

                        <div class="slick-slide">
                            <span class="aspect-ratio is-2x1">

                                <?php
                                if ( $image ) {

                                    printf( '<img class="aspect-ratio_object lazyload" src="%1$s" data-srcset="%2$s 1x, %2$s 2x" alt="%3$s">',
                                        get_template_directory_uri().'/images/blank.gif',
                                        wp_get_attachment_url( $image, 'full' ),
                                        esc_attr( get_post_meta( $image, '_wp_attachment_image_alt', true ) )
                                    );
                                }
                                ?>

                            </span>
                        </div>

                    <?php } ?>

                </div>
            </div>
        <?php
        }
    }
}



/*************************************************
## SINGLE POST RELATED POSTS
*************************************************/

if ( ! function_exists( 'digilab_single_post_related' ) ) {

    function digilab_single_post_related()
    {
        global $post;

        $digilab_post_type = get_post_type( $post->ID );

        if ( '0' != digilab_settings( 'single_related_visibility', '0' ) && 'post' == $digilab_post_type ) {        

            $cats = get_the_category( $post->ID );
            $args = array(
                'post__not_in' => array( $post->ID ),
                'posts_per_page' => digilab_settings( 'related_perpage', 2 )
            );
            $layout = digilab_settings( 'related_type', 'grid' );
            $container = digilab_settings( 'container_type', 'container' );
            $column = digilab_settings( 'column_width', '4' );
            $show_items = digilab_settings( 'show_items', '4' );
            $row = 'slider' == $layout ? 'row-off' : 'row';            
            $column = 'slider' == $layout ? 4 : $column;
            $title = digilab_settings( 'related_title' );            
            $tag = digilab_settings( 'related_title_tag', 'h2' );

            if( 'slider' == $layout ) {
                wp_enqueue_style( 'owl-carousel' );
                wp_enqueue_style( 'owl-theme' );
                wp_enqueue_script( 'owl-carousel' );
            }

            $related_query = new WP_Query( $args );

            if( $related_query->have_posts() ) { ?>

                <div class="blog-area related-posts default-padding pt-0">
                    <div class="blog-items content-less">
                        <div class="<?php echo esc_attr( $container ); ?>">
                            <div class="<?php echo esc_attr( $row ); ?>">
                            
                            <?php if ( 'slider' != $layout ) { ?>
                                <div class="col-lg-10 offset-lg-1 col-md-12">
                                    <div class="row">
                            <?php } ?>
                            
                                    <?php if ( $title ) { ?>
                                        <div class="col-12">
                                            <div class="site-heading text-center">
                                                <<?php echo esc_attr( $tag ); ?> class="section-title is-center"><?php echo esc_html( $title ); ?>
                                                </<?php echo esc_attr( $tag ); ?>>
                                                <div class="heading-divider"></div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    
                                        <?php if ( 'slider' == $layout ) { ?>                                    
                                            <div class="related-slider owl-carousel owl-theme" data-item-settings='{"items": <?php echo esc_attr( $show_items ); ?>}'>
                                        <?php } ?>
                                        
                                        <?php
                                        while( $related_query->have_posts() ) {
        
                                            $related_query->the_post();
                                            ?>
                                                <?php if ( 'slider' != $layout ) { ?>
                                                <div class="col-lg-<?php echo esc_attr( $column ); ?>">
                                                <?php } ?>                                        
                                                    <div class="single-item">
                                                        <div class="item">
                                                            <?php
                                                                if ( has_post_thumbnail() ) {
                                                                    
                                                                    printf( '<div class="thumb"><a href="%s" title="%s"><div class="thumb-bg" data-digilab-bg="%s"></div></a></div>',
                                                                        get_permalink(),
                                                                        the_title_attribute( 'echo=0' ),
                                                                        get_the_post_thumbnail_url( get_the_ID(), array(800, 600) )
                                                                    );
                                                                }
                                                            ?>
                                                            <div class="info">
                                                                <div class="meta">
                                                                    <ul>
                                                                        <li><i class="fas fa-user"></i> <?php echo digilab_post_meta_author(); ?></li>
                                                                        <li><i class="fas fa-calendar-alt"></i> <?php echo digilab_post_meta_date(); ?></li>
                                                                    </ul>
                                                                </div>
                                                                <?php
                                                                    printf( '<a href="%s" title="%s"><h5 class="title-blog mb-0">%s</h5></a>',
                                                                        get_permalink(),
                                                                        the_title_attribute( 'echo=0' ),
                                                                        get_the_title()
                                                                    );
                                                                    if ( '0' != digilab_settings( 'single_related_excerpt_visibility', '1' ) ) {
                                                                        digilab_blog_post_content();
                                                                    }
                                                                ?>                                                    
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php if ( 'slider' != $layout ) { ?>
                                                    </div>
                                                <?php } ?>
                                        <?php } ?>
                                        
                                        <?php if ( 'slider' == $layout ) { ?>
                                            </div>
                                        <?php } ?>
                                
                            <?php if ( 'slider' != $layout ) { ?>
                                </div>
                            </div>
                            <?php } ?>
                            
                        </div>
                    </div>
                </div>
                <?php
                wp_reset_postdata();
            }
        }
    }
}

