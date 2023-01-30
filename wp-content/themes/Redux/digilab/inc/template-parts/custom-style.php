<?php

/*
** theme options panel and metabox settings
** will change some parts of theme via custom style
*/

function digilab_custom_css()
{

    // Redux global
    global $digilab;

    /* CSS to output */
    $theCSS = '';

    /*************************************************
    ## PRELOADER SETTINGS
    *************************************************/

    if ( '0' != digilab_settings( 'preloader_visibility' ) ) {
        $pretype = digilab_settings( 'pre_type', '1' );
        $prebg = digilab_settings( 'pre_bg', '#fff' );
        $prebg = $prebg ? $prebg : '#fff';
        $spinclr = digilab_settings( 'pre_spin', '#4154f1' );
        $spinclr = $spinclr ? $spinclr : '#4154f1';
        $spintxtclr = digilab_settings( 'pre_txt_color', '#4154f1' );
        $spintxtclr = $spintxtclr ? $spintxtclr : '#4154f1';

        if ( $prebg ) {
            $theCSS .= 'body.dark .pace, body.light .pace { background-color: '. esc_attr( $prebg ) .';}';
        }

        $theCSS .= 'div.site-preloader {background-color: '. esc_attr( $prebg ) .';overflow: hidden;background-repeat: no-repeat;background-position: center center;height: 100%;left: 0;position: fixed;top: 0;width: 100%;z-index: 10000;}';
        $theCSS .= '.site-preloader .ring {width: 100px; height: 100px; border: 3px solid rgba(2, 109, 255, 0.2); border-top-color: '.$spinclr.'; border-radius: 50%; text-align: center; line-height: 150px; font-size: 2rem; color: white; letter-spacing: 3px; text-transform: uppercase; text-shadow: 0 0 10px white; -webkit-animation: rotation 1s infinite linear; animation: rotation 1s infinite linear; margin: 0 auto;}';
        $theCSS .= '.site-preloader h2 { color: '.$spintxtclr.'; text-align: center; text-transform: capitalize; text-shadow: 0 0 10px white; font-weight: 700; margin: 30px auto 0; display: block; }';
        
    }
    $body_font = digilab_settings( 'body_font', 'default' );

    if ( class_exists( 'Redux' ) ) {
        if ( empty( $body_font["font-family"] ) ) {
            $theCSS .= '@font-face {font-family: "SpaceGrotesk-Bold";src: url("'.get_template_directory_uri().'/assets/fonts/SpaceGrotesk-Bold.ttf'.'") format("truetype");} @font-face {font-family: "SpaceGrotesk";font-weight: normal;src: url("'.get_template_directory_uri().'/fonts/SpaceGrotesk-Regular.ttf") format("truetype");}';
        }
    } else {
        $theCSS .= '@font-face {font-family: "SpaceGrotesk-Bold";src: url("'.get_template_directory_uri().'/assets/fonts/SpaceGrotesk-Bold.ttf'.'") format("truetype");} @font-face {font-family: "SpaceGrotesk";font-weight: normal;src: url("'.get_template_directory_uri().'/fonts/SpaceGrotesk-Regular.ttf") format("truetype");}';
    }
    $theCSS .= '.lazyloading { background-image: url('.get_template_directory_uri().'/images/loader.gif'.');}';

    $pattern = get_template_directory().'/images/hero.svg';
    $pattern = file_exists( $pattern ) ? get_template_directory_uri().'/images/hero.svg' : '';

    $theCSS .= '.tf-404 .bg-pattern::before {background-image: url('.$pattern.');}';


    /*************************************************
    ## THEME COLORS
    *************************************************/
    $tmclr = digilab_settings( 'theme_main_color' );
    $tmhclr = digilab_settings( 'theme_main_hvrcolor' );
    $tsclr = digilab_settings( 'theme_secondary_color' );
    $tshclr = digilab_settings( 'theme_secondary_hvrcolor' );
    $timportant = digilab_settings( 'theme_root_important' );
    $timportant = '1' == $timportant ? '!important' : '';
    if ( $tmclr || $tmhclr || $tsclr || $tshclr ) {
        $theCSS .= ':root {';
          if( $tmclr ) { $theCSS .= ' --color-primary : '. esc_attr($tmclr) .';';}
          if( $tmhclr ) { $theCSS .= '--hover-primary : '. esc_attr($tmhclr) .';';}
          if( $tsclr ) { $theCSS .= '--color-secondary : '. esc_attr($tsclr) .';';}
          if( $tshclr ) { $theCSS .= '--hover-secondary : '. esc_attr($tshclr) .';';}
        $theCSS .= '}';
    }    

    // use page/post ID for page settings
    $page_id = get_the_ID();

    /*************************************************
    ## THEME PAGINATION
    *************************************************/
    // pagination color
    $pag_clr = digilab_settings('pag_clr');
    // pagination active and hover color
    $pag_hvrclr = digilab_settings( 'pag_hvrclr' );
    // pagination number color
    $pag_nclr = digilab_settings( 'pag_nclr' );
    // pagination active and hover color
    $pag_hvrnclr = digilab_settings( 'pag_hvrnclr' );

    // pagination color
    if ($pag_clr) {
        $theCSS .= '
        .tf-pagination.-style-outline .tf-pagination-item .tf-pagination-link { border-color: '. esc_attr($pag_clr) .'; }
        .tf-pagination.-style-default .tf-pagination-link { background-color: '. esc_attr($pag_clr) .';
        }';
    }

    // pagination active and hover color
    if ($pag_hvrclr) {
        $theCSS .= '
        .tf-pagination.-style-outline .tf-pagination-item.active .tf-pagination-link,
        .tf-pagination.-style-outline .tf-pagination-item .tf-pagination-link:hover { border-color: '. esc_attr($pag_hvrclr) .'; }
        .tf-pagination.-style-default .tf-pagination-item.active .tf-pagination-link,
        .tf-pagination.-style-default .tf-pagination-item .tf-pagination-link:hover { background-color: '. esc_attr($pag_hvrclr) .';
        }';
    }

    // pagination number color
    if ( $pag_nclr ) {
        $theCSS .= '
        .tf-pagination.-style-outline .tf-pagination-item .tf-pagination-link,
        .tf-pagination.-style-default .tf-pagination-link { color: '. esc_attr($pag_nclr) .';
        }';
    }

    // pagination active and hover color
    if ( $pag_hvrnclr ) {
        $theCSS .= '
        .tf-pagination.-style-outline .tf-pagination-item.active .tf-pagination-link,
        .tf-pagination.-style-outline .tf-pagination-item .tf-pagination-link:hover,
        .tf-pagination.-style-default .tf-pagination-item.active .tf-pagination-link,
        .tf-pagination.-style-default .tf-pagination-item .tf-pagination-link:hover { color: '. esc_attr($pag_hvrnclr) .';
        }';
    }
    $related_grad = digilab_settings( 'related_bg_grad' );
    $related_grad_l1 = digilab_settings( 'related_bg_grad_location1' );
    $related_grad_l2 = digilab_settings( 'related_bg_grad_location2' );
    $related_grad_type = digilab_settings( 'related_grad_type' );
    if ( !empty( $related_grad ) ) {
        $color_from = !empty( $related_grad['from'] ) ? $related_grad['from'] : 'rgba(27, 170, 160, 0.2)';
        $color_to = !empty( $related_grad['to'] ) ? $related_grad['to'] : '#fff';
        $l1 = $related_grad_l1 ? $related_grad_l1 : 0;
        $l2 = $related_grad_l2 ? $related_grad_l2 : 50;
        $r_grad_t = $related_grad_type ? $related_grad_type : 'linear';
        $theCSS .= '.top-bg-secondary.section-related {
            background: '.$r_grad_t.'-gradient( '.$color_from.' '.$l1.'%, '.$color_to.' '.$l2.'% );
        }';
    }

    /*************************************************
    ## PAGE METABOX SETTINGS
    *************************************************/

    if ( is_page() && class_exists( 'ACF' ) && function_exists( 'get_field' ) ) {

        $h_all = get_field('digilab_page_hero_customize');
        if ( !empty( $h_all["digilab_page_hero_text_customize"] ) ) {
            $page_title_clr = $h_all["digilab_page_hero_text_customize"]["digilab_page_title_color"];
            if ( $page_title_clr ) { $theCSS .= '.page-'.$page_id.' .headline_title { color: '.$page_title_clr.'; }'; }

            $page_subtitle_clr = $h_all["digilab_page_hero_text_customize"]["digilab_page_subtitle_color"];
            if ( $page_subtitle_clr ) { $theCSS .= '.page-'.$page_id.' .headline_summary { color: '.$page_subtitle_clr.'; }'; }
        }
        if ( !empty( $h_all["digilab_page_hero_background_customize"] ) ) {
            $hero_bg_clr = $h_all["digilab_page_hero_background_customize"]["digilab_page_hero_bg_color"];
            if ( $hero_bg_clr ) { $theCSS .= '.page-'.$page_id.' { background-color: '.$hero_bg_clr.'; }'; }
        }
    } // end if is_page

    /* Add CSS to style.css */
    wp_register_style('digilab-custom-style', false);
    wp_enqueue_style('digilab-custom-style');
    wp_add_inline_style('digilab-custom-style', $theCSS);
}

add_action('wp_enqueue_scripts', 'digilab_custom_css');


// customization on admin pages
function digilab_admin_custom_css()
{
    if (! is_admin()) {
        return false;
    }

    /* CSS to output */
    $theCSS = '';

    $theCSS .= '
    #setting-error-tgmpa, #setting-error-digilab {
        display: block !important;
    }
    .updated.vc_license-activation-notice {
        display:none;
    }
    .redux_field_th {
        color: #191919;
        font-weight: 700;
    }
    .redux-main .description {
        display: block;
        font-weight: normal;
    }
    #redux-header .rAds {
        opacity: 0 !important;
        display: none !important;
        visibility : hidden;
    }
    .redux-main .wp-picker-container .wp-color-result-text {
        line-height: 28px;
    }
    .redux-container .redux-main .input-append .add-on, .redux-container .redux-main .input-prepend .add-on {
        line-height: 22px;
    }
  	#customize-controls img {
  		max-width: 75%;
  	}
    .digilab_gallery_mtb li {
        position: relative;
        display: inline-block;
        width: 80px;
        height: 80px;
        padding: 5px;
        border:1px solid transparent;
    }
    .digilab_gallery_mtb li:hover {
        border-color: #ddd;
    }
    .digilab_gallery_mtb li span{
        height: 80px;
        width: 80px;
        position: relative;
        display: inline-block;
        background-position: center;
        background-size: cover;
    }
    a.digilab_gallery_remove{
        font-size: 14px;
        position: absolute;
        right: 5px;
        top: 5px;
        display: none;
        text-decoration: none;
        width: 15px;
        height: 15px;
        line-height: 15px;
        background: #f00;
        border-radius: 2px;
        color: #fff;
        text-align: center;
    }
    .digilab_gallery_mtb li:hover > a.digilab_gallery_remove{
        display: block;
    }
    ';
    // end $theCSS

    /* Add CSS to style.css */
    wp_register_style('digilab-admin-custom-style', false);
    wp_enqueue_style('digilab-admin-custom-style');
    wp_add_inline_style('digilab-admin-custom-style', $theCSS);
}
add_action('admin_enqueue_scripts', 'digilab_admin_custom_css');
