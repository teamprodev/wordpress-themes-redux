<?php
/**
 * Functions which enhance the theme by hooking into WordPress
*/


/*************************************************
## ADMIN NOTICES
*************************************************/

function digilab_theme_activation_notice()
{
    global $current_user;

    $user_id = $current_user->ID;

    if (!get_user_meta($user_id, 'digilab_theme_activation_notice')) {
        ?>
        <div class="updated notice">
            <p>
                <?php
                    echo sprintf(
                    esc_html__( 'If you need help about demodata installation, please read docs and %s', 'digilab' ),
                    '<a target="_blank" href="' . esc_url( 'https://support.themefora.com' ) . '">' . esc_html__( 'Open a ticket', 'digilab' ) . '</a>
                    ' . esc_html__('or', 'digilab') . ' <a href="' . esc_url( wp_nonce_url( add_query_arg( 'digilab-ignore-notice', 'dismiss_admin_notices' ), 'digilab-dismiss-' . get_current_user_id() ) ) . '">' . esc_html__( 'Dismiss this notice', 'digilab' ) . '</a>');
                ?>
            </p>
        </div>
        <?php
    }
}
add_action( 'admin_notices', 'digilab_theme_activation_notice' );

function digilab_theme_activation_notice_ignore()
{
    global $current_user;

    $user_id = $current_user->ID;

    if ( isset($_GET[ 'digilab-ignore-notice' ] ) ) {
        add_user_meta($user_id, 'digilab_theme_activation_notice', 'true', true);
    }
}
add_action( 'admin_init', 'digilab_theme_activation_notice_ignore' );


/*************************************************
## DATA CONTROL FROM THEME-OPTIONS PANEL
*************************************************/
if ( !function_exists( 'digilab_settings' ) ) {
    function digilab_settings( $opt_id, $def_value='' )
    {
        global $digilab;

        $defval = '' != $def_value ? $def_value : false;
        $opt_id = trim( $opt_id );
        $opt    = isset( $digilab[ $opt_id ] ) ? $digilab[ $opt_id ] : $defval;

        if ( !class_exists( 'Redux' ) ) {
            return $defval;
        } else {
            return $opt;
        }
    }
}


/*************************************************
## Sidebar function
*************************************************/
if ( ! function_exists( 'digilab_sidebar' ) ) {
    function digilab_sidebar( $sidebar='', $default='' )
    {
        $sidebar = trim( $sidebar );
        $default = is_active_sidebar( $default ) ? $default : false;
        $sidebar = is_active_sidebar( $sidebar ) ? $sidebar : $default;
        if ( $sidebar ) {
            return $sidebar;
        }
        return false;
    }
}


/************************************************************
## DATA CONTROL FROM PAGE METABOX OR ELEMENTOR PAGE SETTINGS
*************************************************************/
if ( !function_exists( 'digilab_page_settings' ) ) {
    function digilab_page_settings( $opt_id, $def_value='' )
    {
        $defval = '' != $def_value ? $def_value : false;
        $page_settings = $defval;

        if( !$opt_id ) {

            return false;
        }

        $template = get_post_meta( get_the_ID(), '_wp_page_template', true );

        if ( class_exists( '\Elementor\Core\Settings\Manager' ) && $template == 'digilab-elementor-page.php' || $template == 'elementor_header_footer' ) {

            // Get the page settings manager
            $page_settings = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' )->get_model( get_the_ID() );
            $page_settings = $page_settings->get_settings( trim( $opt_id ) );

            if ( 'yes' == $page_settings || 'no' == $page_settings ) {

                $page_settings = 'yes' == $page_settings ? '0' : '1';

            } else {

                $page_settings = $page_settings;

            }
        }

        return $page_settings;

    }
}


/*************************************************
## GET ELEMENTOR PAGE CUSTOM CSS
*************************************************/
if ( !function_exists( 'digilab_elementor_page_custom_css' ) ) {
    function digilab_elementor_page_custom_css()
    {
        $theCSS = get_option( '_digilab_elementor_page_custom_css' );
        if ( $theCSS ) {
            wp_register_style( 'digilab-custom-page-style', false );
            wp_enqueue_style( 'digilab-custom-page-style' );
            wp_add_inline_style( 'digilab-custom-page-style', $theCSS );
        }
    }
}
add_action( 'wp_enqueue_scripts', 'digilab_elementor_page_custom_css' );


/*************************************************
## CHECK ELEMENTOR STYLE KIT
*************************************************/
if ( !function_exists( 'digilab_get_elementor_style_kit' ) ) {
    add_action ( 'wp_head', 'digilab_get_elementor_style_kit' );
    function digilab_get_elementor_style_kit()
    {
        if ( class_exists( '\Elementor\Core\Kits\Manager' ) ) {
            if ( '1' == digilab_settings( 'use_elementor_style_kit', '0' ) ) {
                $kit = new \Elementor\Core\Kits\Manager;
                $kit->preview_enqueue_styles();                
            }
        }
    }
}


/*************************************************
## GET ALL ELEMENTOR PAGE TEMPLATES
# @return array
*************************************************/
if ( !function_exists( 'digilab_get_elementorTemplates' ) ) {
    function digilab_get_elementorTemplates( $type = null )
    {
        if ( class_exists( '\Elementor\Frontend' ) ) {
            $args = [
                'post_type' => 'elementor_library',
                'posts_per_page' => -1,
            ];
            if ( $type ) {
                $args[ 'tax_query' ] = [
                    [
                        'taxonomy' => 'elementor_library_type',
                        'field' => 'slug',
                        'terms' => $type
                    ]
                ];
            }
            $page_templates = get_posts( $args );
            $options = array();
            if ( !empty( $page_templates ) && !is_wp_error( $page_templates ) ) {
                foreach ( $page_templates as $post ) {
                    $options[ $post->ID ] = $post->post_title;
                }
            } else {
                $options = array(
                    '' => esc_html__( 'No template exist.', 'digilab' )
                );
            }
            return $options;
        }
    }
}


/*************************************************
## CHECK IS ELEMENTOR
*************************************************/
if ( !function_exists( 'digilab_check_is_elementor' ) ) {
    function digilab_check_is_elementor()
    {
        global $post;
        if ( class_exists( '\Elementor\Plugin' ) ) {
            return \Elementor\Plugin::$instance->db->is_built_with_elementor( $post->ID );
        }
        return false;
    }
}

/*************************************************
## CHECK IS POST
*************************************************/
if ( !function_exists( 'digilab_check_is_post' ) ) {
    function digilab_check_is_post()
    {
        if ( class_exists( '\Elementor\Plugin' ) ) {
            $selected_post = get_option( 'elementor_cpt_support' );
            if ( is_array( $selected_post ) ) {
                if ( in_array( 'post', $selected_post ) ) {
                    return true;
                }
            }
            return false;
        }
    }
}

/*************************************************
## SANITIZE MODIFIED VC-ELEMENTS OUTPUT
*************************************************/

if ( !function_exists( 'digilab_sanitize_data' ) ) {
    function digilab_sanitize_data( $html_data )
    {
        return $html_data;
    }
}

/*************************************************
## SANITIZE MODIFIED VC-ELEMENTS OUTPUT
*************************************************/

if ( !function_exists( 'digilab_check_page_hero' ) ) {
    function digilab_check_page_hero()
    {
        if ( is_404() ) {

            $name = 'error';

        } elseif ( is_archive() ) {

            $name = 'archive';

        } elseif ( is_search() ) {

            $name = 'search';

        } elseif ( is_home() || is_front_page() ) {

            $name = 'blog';

        } elseif ( is_single() ) {

            $name = 'single';

        } elseif ( is_page() ) {

            $name = 'page';

        }
        $h_v = digilab_settings( $name.'_hero_visibility', '1' );
        $h_v = '0' == $h_v ? 'page-hero-off' : '';
        return $h_v;
    }
}

/*************************************************
## CUSTOM BODY CLASSES
*************************************************/
if ( !function_exists( 'digilab_body_theme_classes' ) ) {
    function digilab_body_theme_classes( $classes )
    {
        global $post;

        $classes[] = wp_get_theme();
        $classes[] = 'tf-version-' . wp_get_theme()->get( 'Version' );
        $classes[] = '0' == digilab_settings( 'nav_visibility', '1' ) ? 'header-off' : '';
        $classes[] = digilab_check_page_hero();
        $classes[] = is_singular( 'post' ) && has_blocks() ? 'tf-single-has-block' : '';
        $classes[] = is_singular() && ( comments_open() || '0' != get_comments_number() ) ? 'tf-has-comment-template' : 'tf-no-comment-template';
        $classes[] = class_exists( 'WooCommerce' ) && ! is_cart() && ! is_account_page() ? 'tf-page-default' : '';
        $classes[] = class_exists( 'WooCommerce' ) && is_woocommerce() ? 'tf-shop-page' : '';
        $classes[] = '1' == digilab_settings( 'sticky_header_visibility', '0' ) ? 'has-sticky-header' : '';
        $classes[] = '1' == digilab_settings( 'widget_sticky_header_visibility', '0' ) ? 'digilab-widget-has-sticky-header' : '';
        $classes[] = is_page() ? digilab_page_settings( 'digilab_elementor_home_color', '' ) : '';

        return $classes;

    }
    add_filter( 'body_class', 'digilab_body_theme_classes' );
}


/*************************************************
## CUSTOM POST CLASS
*************************************************/
if ( !function_exists( 'digilab_post_theme_class' ) ) {
    function digilab_post_theme_class( $classes )
    {
        if ( ! is_single() AND ! is_page() ) {
            $classes[] = 'tf-post-class';
            $classes[] = is_sticky() ? '-has-sticky ' : '';
            $classes[] = !has_post_thumbnail() ? 'thumb-none' : '';
            $classes[] = !get_the_title() ? 'title-none' : '';
            $classes[] = !has_excerpt() ? 'excerpt-none' : '';
            $classes[] = wp_link_pages('echo=0') ? 'tf-is-wp-link-pages' : '';
        }
        return $classes;
    }
    add_filter( 'post_class', 'digilab_post_theme_class' );
}


/*************************************************
## THEME SEARCH FORM
*************************************************/
if ( !function_exists( 'digilab_content_custom_search_form' ) ) {
    function digilab_content_custom_search_form()
    {
        $form = '<form class="digilab_search" role="search" method="get" id="content-widget-searchform" action="' . esc_url( home_url( '/' ) ) . '" >
        <input class="search_input form-control" type="text" value="' . get_search_query() . '" placeholder="'. esc_attr__( 'Search...', 'digilab' ) .'" name="s" id="cws">
        <button class="error_search_button" id="contentsearchsubmit" type="submit"><i aria-hidden="true" class="ion-ios-search-strong"></i></button>
        </form>';
        return $form;
    }
    add_filter( 'get_search_form', 'digilab_content_custom_search_form' );
}


/*************************************************
## THEME SIDEBARS SEARCH FORM
*************************************************/
if ( !function_exists( 'digilab_sidebar_search_form' ) ) {
    function digilab_sidebar_search_form()
    {
        $form = '<form class="sidebar_search" role="search" method="get" id="widget-searchform" action="' . esc_url( home_url( '/' ) ) . '" >
                    <input class="form-control" type="text" value="' . get_search_query() . '" placeholder="'. esc_attr__( 'Search for...', 'digilab' ) .'" name="s" id="ws">
                    <button id="searchsubmit" type="submit"><i class="fas fa-search"></i></button>
                </form>';
        return $form;
    }
    add_filter( 'get_product_search_form', 'digilab_sidebar_search_form' );
    add_filter( 'get_search_form', 'digilab_sidebar_search_form' );
}


/*************************************************
## THEME PASSWORD FORM
*************************************************/
if ( !function_exists( 'digilab_custom_password_form' ) ) {
    function digilab_custom_password_form()
    {
        global $post;

        $form = '<form class="form_password" role="password" method="get" id="password-form" action="' . get_option( 'siteurl' ) . '/wp-login.php?action=postpass"><input class="form_password_input" type="password" placeholder="'. esc_attr__( 'Enter Password', 'digilab' ) .'" name="post_password" id="ws"><button class="form_password_button btn-curve" id="submit" type="submit"><span class="fa fa-arrow-right"></span></button></form>';

        return $form;
    }
    add_filter( 'the_password_form', 'digilab_custom_password_form' );
}


/*************************************************
## EXCERPT FILTER
*************************************************/
if ( !function_exists( 'digilab_custom_excerpt_more' ) ) {
    function digilab_custom_excerpt_more( $more )
    {
        return '...';
    }
    add_filter( 'excerpt_more', 'digilab_custom_excerpt_more' );
}


/*************************************************
## EXCERPT LIMIT
*************************************************/
if ( !function_exists( 'digilab_excerpt_limit' ) ) {
    function digilab_excerpt_limit( $limit )
    {
        $excerpt = explode( ' ', get_the_excerpt(), $limit );
        if ( count( $excerpt ) >= $limit ) {
            array_pop( $excerpt );
            $excerpt = implode( " ", $excerpt ) . '...';
        } else {
            $excerpt = implode( " ", $excerpt );
        }
        $excerpt = preg_replace( '`\[[^\]]*\]`', '', $excerpt );
        return $excerpt;
    }
}


/*************************************************
## DEFAULT CATEGORIES WIDGET
*************************************************/
if ( !function_exists( 'digilab_add_span_cat_count' ) ) {
    function digilab_add_span_cat_count( $links )
    {

        $links = str_replace( '</a> (', '</a> <span class="widget-list-span">', $links );
        $links = str_replace( '</a> <span class="count">(', '</a> <span class="widget-list-span">', $links );
        $links = str_replace( ')', '</span>', $links );

        return $links;

    }
    add_filter( 'wp_list_categories', 'digilab_add_span_cat_count' );
}


/*************************************************
## woocommerce_layered_nav_term_html WIDGET
*************************************************/
if ( !function_exists( 'digilab_add_span_woocommerce_layered_nav_term_html' ) ) {
    function digilab_add_span_woocommerce_layered_nav_term_html( $links )
    {

        $links = str_replace( '</a> (', '</a> <span class="widget-list-span">', $links );
        $links = str_replace( '</a> <span class="count">(', '</a> <span class="widget-list-span">', $links );
        $links = str_replace( ')', '</span>', $links );

        return $links;

    }
    add_filter( 'woocommerce_layered_nav_term_html', 'digilab_add_span_woocommerce_layered_nav_term_html' );
}


/*************************************************
## DEFAULT ARCHIVES WIDGET
*************************************************/
if ( !function_exists( 'digilab_add_span_arc_count' ) ) {
    function digilab_add_span_arc_count( $links )
    {
        $links = str_replace( '</a>&nbsp;(', '</a> <span class="widget-list-span">', $links );

        $links = str_replace( ')', '</span>', $links );

        // dropdown selectbox
        $links = str_replace( '&nbsp;(', ' - ', $links );

        return $links;

    }
    add_filter( 'get_archives_link', 'digilab_add_span_arc_count' );
}


/*************************************************
## PAGINATION CUSTOMIZATION
*************************************************/
if ( !function_exists( 'digilab_sanitize_pagination' ) ) {
    function digilab_sanitize_pagination( $content )
    {
        // remove role attribute
        $content = str_replace( 'role="navigation"', '', $content );

        // remove h2 tag
        $content = preg_replace( '#<h2.*?>(.*?)<\/h2>#si', '', $content );

        return $content;

    }
    add_action( 'navigation_markup_template', 'digilab_sanitize_pagination' );
}


/*************************************************
## CUSTOM ARCHIVE TITLES
*************************************************/
if ( !function_exists( 'digilab_archive_title' ) ) {
    function digilab_archive_title()
    {
        $title = '';
        if ( is_category() ) {
            $title = single_cat_title( '', false );
        } elseif ( is_tag()) {
            $title = single_tag_title( '', false );
        } elseif ( is_author() ) {
            $title = esc_html( get_the_author() );
        } elseif ( is_year() ) {
            $title = get_the_date( _x( 'Y', 'yearly archives date format', 'digilab' ) );
        } elseif ( is_month() ) {
            $title = get_the_date( _x( 'F Y', 'monthly archives date format', 'digilab' ) );
        } elseif ( is_day() ) {
            $title = get_the_date( _x( 'F j, Y', 'daily archives date format', 'digilab' ) );
        } elseif ( is_post_type_archive() ) {
            $title = post_type_archive_title( '', false );
        } elseif ( is_tax() ) {
            $title = single_term_title( '', false );
        } else {
            $title = get_the_archive_title();
        }

        return $title;
    }
    add_filter( 'get_the_archive_title', 'digilab_archive_title' );
}


/*************************************************
## CHECKS TO SEE IF CPT EXISTS.
*************************************************/
/*
* By setting '_builtin' to false,
* we exclude the WordPress built-in public post types
* (post, page, attachment, revision, and nav_menu_item)
* and retrieve only registered custom public post types.
* return boolean
*/
if ( !function_exists( 'digilab_cpt_exists' ) ) {
    function digilab_cpt_exists()
    {

        $args = array(
           'public'   => true,
           '_builtin' => false
        );

        $output = 'names'; // 'names' or 'objects' (default: 'names')
        $operator = 'and'; // 'and' or 'or' (default: 'and')

        $post_types = get_post_types( $args, $output, $operator ); // get simple cpt if exists
        $classes = get_body_class();
        $cpt_exsits = array();

        if ( $post_types ) {
            foreach ( $post_types as $cpt ) {
                if ( is_single() ) {
                    array_push( $cpt_exsits, 'single-'.$cpt );
                }
                if ( is_archive() ) {
                    array_push( $cpt_exsits, 'post-type-archive-'.$cpt );
                }
            }
        }

        $sameclass = array_intersect( $cpt_exsits, $classes );

        if ( $sameclass ) {
            return true;
        }
        return false;
    }
}


/*************************************************
## CONVERT HEX TO RGB
*************************************************/

if ( !function_exists( 'digilab_hex2rgb' ) ) {
 function digilab_hex2rgb( $hex )
 {
     $hex = str_replace( "#", "", $hex );

     if ( strlen( $hex ) == 3 ) {
         $r = hexdec( substr( $hex, 0, 1 ).substr( $hex, 0, 1 ) );
         $g = hexdec( substr( $hex, 1, 1 ).substr( $hex, 1, 1 ) );
         $b = hexdec(substr( $hex, 2, 1 ).substr( $hex, 2, 1 ) );
     } else {
         $r = hexdec( substr( $hex, 0, 2 ) );
         $g = hexdec( substr( $hex, 2, 2 ) );
         $b = hexdec( substr( $hex, 4, 2 ) );
     }
     $rgb = array( $r, $g, $b );

     return $rgb; // returns an array with the rgb values
 }
}


/**********************************
## THEME ALLOWED HTML TAG
/**********************************/

if (!function_exists('digilab_allowed_html')) {
    function digilab_allowed_html()
    {
        $allowed_tags = array(
            'a' => array(
                'class' => array(),
                'href'  => array(),
                'rel'   => array(),
                'title' => array(),
                'target' => array()
            ),
            'abbr' => array(
                'title' => array()
            ),
            'address' => array(),
            'iframe' => array(
                'src' => array(),
                'frameborder' => array(),
                'allowfullscreen' => array(),
                'allow' => array(),
                'width' => array(),
                'height' => array(),
            ),
            'b' => array(),
            'br' => array(),
            'blockquote' => array(
                'cite'  => array()
            ),
            'cite' => array(
                'title' => array()
            ),
            'code' => array(),
            'del' => array(
                'datetime' => array(),
                'title' => array()
            ),
            'dd' => array(),
            'div' => array(
                'class' => array(),
                'id'    => array(),
                'title' => array(),
                'style' => array()
            ),
            'dl' => array(),
            'dt' => array(),
            'em' => array(),
            'h1' => array(
                'class' => array()
            ),
            'h2' => array(
                'class' => array()
            ),
            'h3' => array(
                'class' => array()
            ),
            'h4' => array(
                'class' => array()
            ),
            'h5' => array(
                'class' => array()
            ),
            'h6' => array(
                'class' => array()
            ),
            'i' => array(
                'class'  => array()
            ),
            'img' => array(
                'alt'    => array(),
                'class'  => array(),
                'width'  => array(),
                'height' => array(),
                'src'    => array(),
                'srcset' => array(),
                'sizes' => array()
            ),
            'li' => array(
                'class' => array()
            ),
            'ol' => array(
                'class' => array()
            ),
            'p' => array(
                'class' => array()
            ),
            'q' => array(
                'cite' => array(),
                'title' => array()
            ),
            'span' => array(
                'class' => array(),
                'title' => array(),
                'style' => array()
            ),
            'strike' => array(),
            'strong' => array(),
            'ul' => array(
                'class' => array()
            )
        );
        return $allowed_tags;
    }
}

if (!function_exists( 'digilab_navmenu_choices')) {
    function digilab_navmenu_choices()
    {
        $menus = wp_get_nav_menus();
        $options = array();

        if (!empty($menus) && !is_wp_error($menus)) {
            foreach ($menus as $menu) {
                $options[$menu->slug] = $menu->name;
            }
        }
        
        return $options;
    }
}



/**
 * Adding custom icon to icon control in Elementor
 */

if ( !function_exists( 'digilab_add_custom_icons_tab' ) ) {
add_filter( 'elementor/icons_manager/additional_tabs', 'digilab_add_custom_icons_tab' );
function digilab_add_custom_icons_tab( $tabs = array() ) {
        // Append new icons
        $new_icons = array(
            'ion-alert',
            'ion-alert-circled',
            'ion-android-add',
            'ion-android-add-circle',
            'ion-android-alarm-clock',
            'ion-android-alert',
            'ion-android-apps',
            'ion-android-archive',
            'ion-android-arrow-back',
            'ion-android-arrow-down',
            'ion-android-arrow-dropdown',
            'ion-android-arrow-dropdown-circle',
            'ion-android-arrow-dropleft',
            'ion-android-arrow-dropleft-circle',
            'ion-android-arrow-dropright',
            'ion-android-arrow-dropright-circle',
            'ion-android-arrow-dropup',
            'ion-android-arrow-dropup-circle',
            'ion-android-arrow-forward',
            'ion-android-arrow-up',
            'ion-android-attach',
            'ion-android-bar',
            'ion-android-bicycle',
            'ion-android-boat',
            'ion-android-bookmark',
            'ion-android-bulb',
            'ion-android-bus',
            'ion-android-calendar',
            'ion-android-call',
            'ion-android-camera',
            'ion-android-cancel',
            'ion-android-car',
            'ion-android-cart',
            'ion-android-chat',
            'ion-android-checkbox',
            'ion-android-checkbox-blank',
            'ion-android-checkbox-outline',
            'ion-android-checkbox-outline-blank',
            'ion-android-checkmark-circle',
            'ion-android-clipboard',
            'ion-android-close',
            'ion-android-cloud',
            'ion-android-cloud-circle',
            'ion-android-cloud-done',
            'ion-android-cloud-outline',
            'ion-android-color-palette',
            'ion-android-compass',
            'ion-android-contact',
            'ion-android-contacts',
            'ion-android-contract',
            'ion-android-create',
            'ion-android-delete',
            'ion-android-desktop',
            'ion-android-document',
            'ion-android-done',
            'ion-android-done-all',
            'ion-android-download',
            'ion-android-drafts',
            'ion-android-exit',
            'ion-android-expand',
            'ion-android-favorite',
            'ion-android-favorite-outline',
            'ion-android-film',
            'ion-android-folder',
            'ion-android-folder-open',
            'ion-android-funnel',
            'ion-android-globe',
            'ion-android-hand',
            'ion-android-hangout',
            'ion-android-happy',
            'ion-android-home',
            'ion-android-image',
            'ion-android-laptop',
            'ion-android-list',
            'ion-android-locate',
            'ion-android-lock',
            'ion-android-mail',
            'ion-android-map',
            'ion-android-menu',
            'ion-android-microphone',
            'ion-android-microphone-off',
            'ion-android-more-horizontal',
            'ion-android-more-vertical',
            'ion-android-navigate',
            'ion-android-notifications',
            'ion-android-notifications-none',
            'ion-android-notifications-off',
            'ion-android-open',
            'ion-android-options',
            'ion-android-people',
            'ion-android-person',
            'ion-android-person-add',
            'ion-android-phone-landscape',
            'ion-android-phone-portrait',
            'ion-android-pin',
            'ion-android-plane',
            'ion-android-playstore',
            'ion-android-print',
            'ion-android-radio-button-off',
            'ion-android-radio-button-on',
            'ion-android-refresh',
            'ion-android-remove',
            'ion-android-remove-circle',
            'ion-android-restaurant',
            'ion-android-sad',
            'ion-android-search',
            'ion-android-send',
            'ion-android-settings',
            'ion-android-share',
            'ion-android-share-alt',
            'ion-android-star',
            'ion-android-star-half',
            'ion-android-star-outline',
            'ion-android-stopwatch',
            'ion-android-subway',
            'ion-android-sunny',
            'ion-android-sync',
            'ion-android-textsms',
            'ion-android-time',
            'ion-android-train',
            'ion-android-unlock',
            'ion-android-upload',
            'ion-android-volume-down',
            'ion-android-volume-mute',
            'ion-android-volume-off',
            'ion-android-volume-up',
            'ion-android-walk',
            'ion-android-warning',
            'ion-android-watch',
            'ion-android-wifi',
            'ion-aperture',
            'ion-archive',
            'ion-arrow-down-a',
            'ion-arrow-down-b',
            'ion-arrow-down-c',
            'ion-arrow-expand',
            'ion-arrow-graph-down-left',
            'ion-arrow-graph-down-right',
            'ion-arrow-graph-up-left',
            'ion-arrow-graph-up-right',
            'ion-arrow-left-a',
            'ion-arrow-left-b',
            'ion-arrow-left-c',
            'ion-arrow-move',
            'ion-arrow-resize',
            'ion-arrow-return-left',
            'ion-arrow-return-right',
            'ion-arrow-right-a',
            'ion-arrow-right-b',
            'ion-arrow-right-c',
            'ion-arrow-shrink',
            'ion-arrow-swap',
            'ion-arrow-up-a',
            'ion-arrow-up-b',
            'ion-arrow-up-c',
            'ion-asterisk',
            'ion-at',
            'ion-backspace',
            'ion-backspace-outline',
            'ion-bag',
            'ion-battery-charging',
            'ion-battery-empty',
            'ion-battery-full',
            'ion-battery-half',
            'ion-battery-low',
            'ion-beaker',
            'ion-beer',
            'ion-bluetooth',
            'ion-bonfire',
            'ion-bookmark',
            'ion-bowtie',
            'ion-briefcase',
            'ion-bug',
            'ion-calculator',
            'ion-calendar',
            'ion-camera',
            'ion-card',
            'ion-cash',
            'ion-chatbox',
            'ion-chatbox-working',
            'ion-chatboxes',
            'ion-chatbubble',
            'ion-chatbubble-working',
            'ion-chatbubbles',
            'ion-checkmark',
            'ion-checkmark-circled',
            'ion-checkmark-round',
            'ion-chevron-down',
            'ion-chevron-left',
            'ion-chevron-right',
            'ion-chevron-up',
            'ion-clipboard',
            'ion-clock',
            'ion-close',
            'ion-close-circled',
            'ion-close-round',
            'ion-closed-captioning',
            'ion-cloud',
            'ion-code',
            'ion-code-download',
            'ion-code-working',
            'ion-coffee',
            'ion-compass',
            'ion-compose',
            'ion-connection-bars',
            'ion-contrast',
            'ion-crop',
            'ion-cube',
            'ion-disc',
            'ion-document',
            'ion-document-text',
            'ion-drag',
            'ion-earth',
            'ion-easel',
            'ion-edit',
            'ion-egg',
            'ion-eject',
            'ion-email',
            'ion-email-unread',
            'ion-erlenmeyer-flask',
            'ion-erlenmeyer-flask-bubbles',
            'ion-eye',
            'ion-eye-disabled',
            'ion-female',
            'ion-filing',
            'ion-film-marker',
            'ion-fireball',
            'ion-flag',
            'ion-flame',
            'ion-flash',
            'ion-flash-off',
            'ion-folder',
            'ion-fork',
            'ion-fork-repo',
            'ion-forward',
            'ion-funnel',
            'ion-gear-a',
            'ion-gear-b',
            'ion-grid',
            'ion-hammer',
            'ion-happy',
            'ion-happy-outline',
            'ion-headphone',
            'ion-heart',
            'ion-heart-broken',
            'ion-help',
            'ion-help-buoy',
            'ion-help-circled',
            'ion-home',
            'ion-icecream',
            'ion-image',
            'ion-images',
            'ion-information',
            'ion-information-circled',
            'ion-ionic',
            'ion-ios-alarm',
            'ion-ios-alarm-outline',
            'ion-ios-albums',
            'ion-ios-albums-outline',
            'ion-ios-americanfootball',
            'ion-ios-americanfootball-outline',
            'ion-ios-analytics',
            'ion-ios-analytics-outline',
            'ion-ios-arrow-back',
            'ion-ios-arrow-down',
            'ion-ios-arrow-forward',
            'ion-ios-arrow-left',
            'ion-ios-arrow-right',
            'ion-ios-arrow-thin-down',
            'ion-ios-arrow-thin-left',
            'ion-ios-arrow-thin-right',
            'ion-ios-arrow-thin-up',
            'ion-ios-arrow-up',
            'ion-ios-at',
            'ion-ios-at-outline',
            'ion-ios-barcode',
            'ion-ios-barcode-outline',
            'ion-ios-baseball',
            'ion-ios-baseball-outline',
            'ion-ios-basketball',
            'ion-ios-basketball-outline',
            'ion-ios-bell',
            'ion-ios-bell-outline',
            'ion-ios-body',
            'ion-ios-body-outline',
            'ion-ios-bolt',
            'ion-ios-bolt-outline',
            'ion-ios-book',
            'ion-ios-book-outline',
            'ion-ios-bookmarks',
            'ion-ios-bookmarks-outline',
            'ion-ios-box',
            'ion-ios-box-outline',
            'ion-ios-briefcase',
            'ion-ios-briefcase-outline',
            'ion-ios-browsers',
            'ion-ios-browsers-outline',
            'ion-ios-calculator',
            'ion-ios-calculator-outline',
            'ion-ios-calendar',
            'ion-ios-calendar-outline',
            'ion-ios-camera',
            'ion-ios-camera-outline',
            'ion-ios-cart',
            'ion-ios-cart-outline',
            'ion-ios-chatboxes',
            'ion-ios-chatboxes-outline',
            'ion-ios-chatbubble',
            'ion-ios-chatbubble-outline',
            'ion-ios-checkmark',
            'ion-ios-checkmark-empty',
            'ion-ios-checkmark-outline',
            'ion-ios-circle-filled',
            'ion-ios-circle-outline',
            'ion-ios-clock',
            'ion-ios-clock-outline',
            'ion-ios-close',
            'ion-ios-close-empty',
            'ion-ios-close-outline',
            'ion-ios-cloud',
            'ion-ios-cloud-download',
            'ion-ios-cloud-download-outline',
            'ion-ios-cloud-outline',
            'ion-ios-cloud-upload',
            'ion-ios-cloud-upload-outline',
            'ion-ios-cloudy',
            'ion-ios-cloudy-night',
            'ion-ios-cloudy-night-outline',
            'ion-ios-cloudy-outline',
            'ion-ios-cog',
            'ion-ios-cog-outline',
            'ion-ios-color-filter',
            'ion-ios-color-filter-outline',
            'ion-ios-color-wand',
            'ion-ios-color-wand-outline',
            'ion-ios-compose',
            'ion-ios-compose-outline',
            'ion-ios-contact',
            'ion-ios-contact-outline',
            'ion-ios-copy',
            'ion-ios-copy-outline',
            'ion-ios-crop',
            'ion-ios-crop-strong',
            'ion-ios-download',
            'ion-ios-download-outline',
            'ion-ios-drag',
            'ion-ios-email',
            'ion-ios-email-outline',
            'ion-ios-eye',
            'ion-ios-eye-outline',
            'ion-ios-fastforward',
            'ion-ios-fastforward-outline',
            'ion-ios-filing',
            'ion-ios-filing-outline',
            'ion-ios-film',
            'ion-ios-film-outline',
            'ion-ios-flag',
            'ion-ios-flag-outline',
            'ion-ios-flame',
            'ion-ios-flame-outline',
            'ion-ios-flask',
            'ion-ios-flask-outline',
            'ion-ios-flower',
            'ion-ios-flower-outline',
            'ion-ios-folder',
            'ion-ios-folder-outline',
            'ion-ios-football',
            'ion-ios-football-outline',
            'ion-ios-game-controller-a',
            'ion-ios-game-controller-a-outline',
            'ion-ios-game-controller-b',
            'ion-ios-game-controller-b-outline',
            'ion-ios-gear',
            'ion-ios-gear-outline',
            'ion-ios-glasses',
            'ion-ios-glasses-outline',
            'ion-ios-grid-view',
            'ion-ios-grid-view-outline',
            'ion-ios-heart',
            'ion-ios-heart-outline',
            'ion-ios-help',
            'ion-ios-help-empty',
            'ion-ios-help-outline',
            'ion-ios-home',
            'ion-ios-home-outline',
            'ion-ios-infinite',
            'ion-ios-infinite-outline',
            'ion-ios-information',
            'ion-ios-information-empty',
            'ion-ios-information-outline',
            'ion-ios-ionic-outline',
            'ion-ios-keypad',
            'ion-ios-keypad-outline',
            'ion-ios-lightbulb',
            'ion-ios-lightbulb-outline',
            'ion-ios-list',
            'ion-ios-list-outline',
            'ion-ios-location',
            'ion-ios-location-outline',
            'ion-ios-locked',
            'ion-ios-locked-outline',
            'ion-ios-loop',
            'ion-ios-loop-strong',
            'ion-ios-medical',
            'ion-ios-medical-outline',
            'ion-ios-medkit',
            'ion-ios-medkit-outline',
            'ion-ios-mic',
            'ion-ios-mic-off',
            'ion-ios-mic-outline',
            'ion-ios-minus',
            'ion-ios-minus-empty',
            'ion-ios-minus-outline',
            'ion-ios-monitor',
            'ion-ios-monitor-outline',
            'ion-ios-moon',
            'ion-ios-moon-outline',
            'ion-ios-more',
            'ion-ios-more-outline',
            'ion-ios-musical-note',
            'ion-ios-musical-notes',
            'ion-ios-navigate',
            'ion-ios-navigate-outline',
            'ion-ios-nutrition',
            'ion-ios-nutrition-outline',
            'ion-ios-paper',
            'ion-ios-paper-outline',
            'ion-ios-paperplane',
            'ion-ios-paperplane-outline',
            'ion-ios-partlysunny',
            'ion-ios-partlysunny-outline',
            'ion-ios-pause',
            'ion-ios-pause-outline',
            'ion-ios-paw',
            'ion-ios-paw-outline',
            'ion-ios-people',
            'ion-ios-people-outline',
            'ion-ios-person',
            'ion-ios-person-outline',
            'ion-ios-personadd',
            'ion-ios-personadd-outline',
            'ion-ios-photos',
            'ion-ios-photos-outline',
            'ion-ios-pie',
            'ion-ios-pie-outline',
            'ion-ios-pint',
            'ion-ios-pint-outline',
            'ion-ios-play',
            'ion-ios-play-outline',
            'ion-ios-plus',
            'ion-ios-plus-empty',
            'ion-ios-plus-outline',
            'ion-ios-pricetag',
            'ion-ios-pricetag-outline',
            'ion-ios-pricetags',
            'ion-ios-pricetags-outline',
            'ion-ios-printer',
            'ion-ios-printer-outline',
            'ion-ios-pulse',
            'ion-ios-pulse-strong',
            'ion-ios-rainy',
            'ion-ios-rainy-outline',
            'ion-ios-recording',
            'ion-ios-recording-outline',
            'ion-ios-redo',
            'ion-ios-redo-outline',
            'ion-ios-refresh',
            'ion-ios-refresh-empty',
            'ion-ios-refresh-outline',
            'ion-ios-reload',
            'ion-ios-reverse-camera',
            'ion-ios-reverse-camera-outline',
            'ion-ios-rewind',
            'ion-ios-rewind-outline',
            'ion-ios-rose',
            'ion-ios-rose-outline',
            'ion-ios-search',
            'ion-ios-search-strong',
            'ion-ios-settings',
            'ion-ios-settings-strong',
            'ion-ios-shuffle',
            'ion-ios-shuffle-strong',
            'ion-ios-skipbackward',
            'ion-ios-skipbackward-outline',
            'ion-ios-skipforward',
            'ion-ios-skipforward-outline',
            'ion-ios-snowy',
            'ion-ios-speedometer',
            'ion-ios-speedometer-outline',
            'ion-ios-star',
            'ion-ios-star-half',
            'ion-ios-star-outline',
            'ion-ios-stopwatch',
            'ion-ios-stopwatch-outline',
            'ion-ios-sunny',
            'ion-ios-sunny-outline',
            'ion-ios-telephone',
            'ion-ios-telephone-outline',
            'ion-ios-tennisball',
            'ion-ios-tennisball-outline',
            'ion-ios-thunderstorm',
            'ion-ios-thunderstorm-outline',
            'ion-ios-time',
            'ion-ios-time-outline',
            'ion-ios-timer',
            'ion-ios-timer-outline',
            'ion-ios-toggle',
            'ion-ios-toggle-outline',
            'ion-ios-trash',
            'ion-ios-trash-outline',
            'ion-ios-undo',
            'ion-ios-undo-outline',
            'ion-ios-unlocked',
            'ion-ios-unlocked-outline',
            'ion-ios-upload',
            'ion-ios-upload-outline',
            'ion-ios-videocam',
            'ion-ios-videocam-outline',
            'ion-ios-volume-high',
            'ion-ios-volume-low',
            'ion-ios-wineglass',
            'ion-ios-wineglass-outline',
            'ion-ios-world',
            'ion-ios-world-outline',
            'ion-ipad',
            'ion-iphone',
            'ion-ipod',
            'ion-jet',
            'ion-key',
            'ion-knife',
            'ion-laptop',
            'ion-leaf',
            'ion-levels',
            'ion-lightbulb',
            'ion-link',
            'ion-load-a',
            'ion-load-b',
            'ion-load-c',
            'ion-load-d',
            'ion-location',
            'ion-lock-combination',
            'ion-locked',
            'ion-log-in',
            'ion-log-out',
            'ion-loop',
            'ion-magnet',
            'ion-male',
            'ion-man',
            'ion-map',
            'ion-medkit',
            'ion-merge',
            'ion-mic-a',
            'ion-mic-b',
            'ion-mic-c',
            'ion-minus',
            'ion-minus-circled',
            'ion-minus-round',
            'ion-model-s',
            'ion-monitor',
            'ion-more',
            'ion-mouse',
            'ion-music-note',
            'ion-navicon',
            'ion-navicon-round',
            'ion-navigate',
            'ion-network',
            'ion-no-smoking',
            'ion-nuclear',
            'ion-outlet',
            'ion-paintbrush',
            'ion-paintbucket',
            'ion-paper-airplane',
            'ion-paperclip',
            'ion-pause',
            'ion-person',
            'ion-person-add',
            'ion-person-stalker',
            'ion-pie-graph',
            'ion-pin',
            'ion-pinpoint',
            'ion-pizza',
            'ion-plane',
            'ion-planet',
            'ion-play',
            'ion-playstation',
            'ion-plus',
            'ion-plus-circled',
            'ion-plus-round',
            'ion-podium',
            'ion-pound',
            'ion-power',
            'ion-pricetag',
            'ion-pricetags',
            'ion-printer',
            'ion-pull-request',
            'ion-qr-scanner',
            'ion-quote',
            'ion-radio-waves',
            'ion-record',
            'ion-refresh',
            'ion-reply',
            'ion-reply-all',
            'ion-ribbon-a',
            'ion-ribbon-b',
            'ion-sad',
            'ion-sad-outline',
            'ion-scissors',
            'ion-search',
            'ion-settings',
            'ion-share',
            'ion-shuffle',
            'ion-skip-backward',
            'ion-skip-forward',
            'ion-social-android',
            'ion-social-android-outline',
            'ion-social-angular',
            'ion-social-angular-outline',
            'ion-social-apple',
            'ion-social-apple-outline',
            'ion-social-bitcoin',
            'ion-social-bitcoin-outline',
            'ion-social-buffer',
            'ion-social-buffer-outline',
            'ion-social-chrome',
            'ion-social-chrome-outline',
            'ion-social-codepen',
            'ion-social-codepen-outline',
            'ion-social-css3',
            'ion-social-css3-outline',
            'ion-social-designernews',
            'ion-social-designernews-outline',
            'ion-social-dribbble',
            'ion-social-dribbble-outline',
            'ion-social-dropbox',
            'ion-social-dropbox-outline',
            'ion-social-euro',
            'ion-social-euro-outline',
            'ion-social-facebook',
            'ion-social-facebook-outline',
            'ion-social-foursquare',
            'ion-social-foursquare-outline',
            'ion-social-freebsd-devil',
            'ion-social-github',
            'ion-social-github-outline',
            'ion-social-google',
            'ion-social-google-outline',
            'ion-social-googleplus',
            'ion-social-googleplus-outline',
            'ion-social-hackernews',
            'ion-social-hackernews-outline',
            'ion-social-html5',
            'ion-social-html5-outline',
            'ion-social-instagram',
            'ion-social-instagram-outline',
            'ion-social-javascript',
            'ion-social-javascript-outline',
            'ion-social-linkedin',
            'ion-social-linkedin-outline',
            'ion-social-markdown',
            'ion-social-nodejs',
            'ion-social-octocat',
            'ion-social-pinterest',
            'ion-social-pinterest-outline',
            'ion-social-python',
            'ion-social-reddit',
            'ion-social-reddit-outline',
            'ion-social-rss',
            'ion-social-rss-outline',
            'ion-social-sass',
            'ion-social-skype',
            'ion-social-skype-outline',
            'ion-social-snapchat',
            'ion-social-snapchat-outline',
            'ion-social-tumblr',
            'ion-social-tumblr-outline',
            'ion-social-tux',
            'ion-social-twitch',
            'ion-social-twitch-outline',
            'ion-social-twitter',
            'ion-social-twitter-outline',
            'ion-social-usd',
            'ion-social-usd-outline',
            'ion-social-vimeo',
            'ion-social-vimeo-outline',
            'ion-social-whatsapp',
            'ion-social-whatsapp-outline',
            'ion-social-windows',
            'ion-social-windows-outline',
            'ion-social-wordpress',
            'ion-social-wordpress-outline',
            'ion-social-yahoo',
            'ion-social-yahoo-outline',
            'ion-social-yen',
            'ion-social-yen-outline',
            'ion-social-youtube',
            'ion-social-youtube-outline',
            'ion-soup-can',
            'ion-soup-can-outline',
            'ion-speakerphone',
            'ion-speedometer',
            'ion-spoon',
            'ion-star',
            'ion-stats-bars',
            'ion-steam',
            'ion-stop',
            'ion-thermometer',
            'ion-thumbsdown',
            'ion-thumbsup',
            'ion-toggle',
            'ion-toggle-filled',
            'ion-transgender',
            'ion-trash-a',
            'ion-trash-b',
            'ion-trophy',
            'ion-tshirt',
            'ion-tshirt-outline',
            'ion-umbrella',
            'ion-university',
            'ion-unlocked',
            'ion-upload',
            'ion-usb',
            'ion-videocamera',
            'ion-volume-high',
            'ion-volume-low',
            'ion-volume-medium',
            'ion-volume-mute',
            'ion-wand',
            'ion-waterdrop',
            'ion-wifi',
            'ion-wineglass',
            'ion-woman',
            'ion-wrench',
            'ion-xbox'
        );

        $tabs['digilab-custom-icons'] = array(
            'name'          => 'digilab-custom-icons',
            'label'         => esc_html__( 'Digilab IonIcons', 'digilab' ),
            'labelIcon'     => 'ion-xbox',
            'prefix'        => 'digilab-icon ',
            'displayPrefix' => 'ionicon',
            'url'           => get_template_directory_uri() . '/assets/css/ionicons.min.css',
            'icons'         => $new_icons,
            'ver'           => '1.0.0',
        );

        return $tabs;
    }
}




add_action('admin_notices', 'digilab_notice_for_activation');
if (!function_exists('digilab_notice_for_activation')) {
    function digilab_notice_for_activation() {
        global $pagenow;

        if($pagenow === 'themes.php' &&  !get_option('envato_purchase_code_26854995') ) {

            echo '<div class="notice notice-warning">
                <p>' . sprintf(
                esc_html__( 'Enter your Envato Purchase Code to receive Digilab Theme and plugin updates  %s', 'digilab' ),
                '<a href="' . admin_url('themes.php?page=merlin&step=license') . '">' . esc_html__( 'Enter Purchase Code', 'digilab' ) . '</a>') . '</p>
            </div>';
        }

    }
}


if ( !get_option('envato_purchase_code_26854995') ) {
    add_filter('auto_update_theme', '__return_false');
}

add_action('upgrader_process_complete', 'digilab_upgrade_function', 10, 2);
if ( !function_exists('digilab_upgrade_function') ) {
    function digilab_upgrade_function($upgrader_object, $options) {
        $purchase_code =  get_option('envato_purchase_code_26854995');

        if (($options['action'] == 'update' && $options['type'] == 'theme') && !$purchase_code) {
            wp_redirect(admin_url('themes.php?p age=merlin&step=license'));
        }
    }
}

if ( !function_exists( 'digilab_is_theme_registered') ) {
    function digilab_is_theme_registered() {
        $purchase_code =  get_option('envato_purchase_code_26854995');
        $registered_by_purchase_code =  !empty($purchase_code);

        // Purchase code entered correctly.
        if ($registered_by_purchase_code) {
            return true;
        }
    }
}

if (!function_exists('digilab_connection_callback')) {
    /**
     * Custom function for the callback validation referenced above
     *
     * @param array $field          Field array.
     * @param mixed $value          New value.
     * @param mixed $existing_value Existing value.
     *
     * @return mixed
     */
    function digilab_connection_callback($field, $value, $existing_value) {
        // 0 = deselect
        // 1 = select

        if($value == '1') {
            if(!get_option('envato_purchase_code_26854995')) {
                $field['msg']   = esc_html__( 'Your connection has already been disconnected.', 'digilab' );
                $return['warning'] = $field;
                $return['value'] = '0';

                return $return;
            } else {
                $request = wp_remote_get('https://api.themefora.com/deactivate/'.get_option('envato_purchase_code_26854995'));
                $response = wp_remote_retrieve_body($request);
                $output = json_decode($response);

                switch ($output->status) {
                    case 200:
                        delete_option('envato_purchase_code_26854995');
                        $field['msg']   = $output->msg;
                        $return['error'] = $field;
                        $return['value'] = $value;

                        return $return;
                    break;
                    case 400:
                        $field['msg']   = $output->msg;
                        $return['error'] = $field;
                        $return['value'] = $existing_value;

                        return $return;
                    break;
                    case 404:
                        $field['msg']   = $output->msg;
                        $return['error'] = $field;
                        $return['value'] = $existing_value;

                        return $return;
                    break;
                    case 429:
                        $field['msg']   = $output->msg;
                        $return['error'] = $field;
                        $return['value'] = $existing_value;

                        return $return;
                    break;
                    default:
                        $field['msg']   = esc_html__( 'An unknown error has occurred. Please contact the support team.', 'digilab' );
                        $return['error'] = $field;
                        $return['value'] = $existing_value;

                        return $return;
                    break;
                }
            }
        } else {
            if(!get_option('envato_purchase_code_26854995')) {
                $field['msg']      = esc_html__( 'To activate your license, go to the theme setup page.', 'digilab' );
                $return['warning'] = $field;
                $return['value'] = '1';

                return $return;
            }
        }
    }
}

// function digilab_deactivate_envato_plugin() {
//     if ( function_exists( 'envato_market' ) ) {
//         deactivate_plugins('envato-market/envato-market.php');
//     }
// }
// add_action( 'admin_init', 'digilab_deactivate_envato_plugin' );
