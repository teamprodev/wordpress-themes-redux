<?php


/**
 * Custom template parts for this theme.
 *
 * preloader, backtotop, conten-none
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package digilab
*/


/*************************************************
## START PRELOADER
*************************************************/
if ( ! function_exists( 'digilab_preloader' ) ) {
    function digilab_preloader()
    {
        $loader = digilab_settings( 'pre_type', '1' );
        $preloader_loader_text = digilab_settings( 'preloader_loader_text', 'Digilab' );

        if ( '0' != digilab_settings( 'preloader_visibility', '0' ) ) {
            if ( 'custom' == $loader ) { ?>
                <div id="tf-preloader" class="justify-content-center align-items-center d-flex">
                    <img src="<?php esc_url( digilab_settings( 'pre_custom_img')['url'] ); ?>" class="tf-custom-preloader">
                </div>                
            <?php } elseif ( '1' == $loader ) { ?>
                <div id="site-preloader" class="site-preloader">
                    <div class="loader-wrap">
                        <div class="ring">
                            <span></span>
                        </div>
                        <h2><?php echo esc_html($preloader_loader_text); ?></h2>
                    </div>
                </div>
            <?php } else { ?>
                <div id="tf-preloader" class="preloader">
                    <div class="loader<?php echo digilab_settings( 'pre_type' );?>"></div>
                </div>
            <?php
            }
        }
    }
}
add_action( 'digilab_preloader_action', 'digilab_preloader', 10 );
add_action( 'elementor/page_templates/canvas/before_content', 'digilab_preloader', 10 );



/*************************************************
##  BACKTOP
*************************************************/

if ( ! function_exists( 'digilab_backtop' ) ) {
    function digilab_backtop() {
        if ( '1' == digilab_settings('backtotop_visibility', '1') ) { ?>
            <div class="progress-wrap">
                <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                    <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
                </svg>
            </div>
            <?php
        }
    }
}


/*************************************************
##  CONTENT NONE
*************************************************/

if ( ! function_exists( 'digilab_content_none' ) ) {
    function digilab_content_none() {
        $digilab_centered = is_search() && 'full-width' == digilab_settings( 'search_layout' ) ? ' text-center' : '';
    ?>
        <div class="content-none-container<?php echo esc_attr( $digilab_centered ); ?>">
            <h3 class="__title mb-20 fw-900"><?php esc_html_e( 'Nothing', 'digilab' ); ?> <span class="stroke-text"><?php esc_html_e( 'Found', 'digilab' ); ?></span></h3>
            <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
                <p><?php printf( '<a href="%1$s" class="btn circle btn-md btn-gradient">%2$s</a>', esc_url( home_url('/') ), esc_html__( 'Go to home page', 'digilab' ) ); ?></p>
            <?php elseif ( is_search() ) : ?>
                <div class="mb-20"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'digilab' ); ?></div>
                <div class="search-form">
                    <?php echo digilab_sidebar_search_form(); ?>
                </div>
            <?php else : ?>
                <p class="mb-20"><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'digilab' ); ?></div>
                <?php echo digilab_sidebar_search_form(); ?>
            <?php endif; ?>
        </div>
    <?php
    }
}
