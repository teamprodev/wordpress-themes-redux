<?php

/**
 *
 * @package WordPress
 * @subpackage digilab
 * @since Digilab 1.0
 *
**/

/*************************************************
## GOOGLE FONTS
*************************************************/

if (! function_exists( 'digilab_fonts_url' ) ) {
    function digilab_fonts_url()
    {
        $fonts_url = '';

        $nunito = _x( 'on', 'Nunito font: on or off', 'digilab' );
        $ubuntu = _x( 'on', 'Ubuntu font: on or off', 'digilab' );
        $poppins = _x( 'on', 'Poppins font: on or off', 'digilab' );
        $robotomono = _x( 'on', 'Roboto+Mono font: on or off', 'digilab' );

        if ( 'off' !== $nunito || 'off' !== $ubuntu || 'off' !== $poppins || 'off' !== $robotomono ) {
            $font_families = array();

            if ( 'off' !== $nunito ) {
                $font_families[] = 'Nunito:200,300,400,600,700,800,900';
            }
            if ( 'off' !== $ubuntu ) {
                $font_families[] = 'Ubuntu:400,500,700';
            }
            if ( 'off' !== $poppins ) {
                $font_families[] = 'Poppins:200,300,400,500,600,700,800';
            }
            if ( 'off' !== $robotomono ) {
                $font_families[] = 'Roboto+Mono:400,700';
            }

            $query_args = array(
                'family' => urlencode(implode( '|', $font_families) ),
                'subset' => urlencode( 'latin,latin-ext' ),
                'display' => 'wrap'
            );

            $fonts_url = add_query_arg($query_args, "//fonts.googleapis.com/css");
        }

        return esc_url_raw( $fonts_url );
    }
}

/*************************************************
## STYLES AND SCRIPTS
*************************************************/

function digilab_theme_scripts()
{
    //<!-- ========== Start Stylesheet ========== -->
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', false, '1.0');

    if ( is_404() || is_search() || !digilab_check_is_elementor() ) {
        wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', false, '1.0');
    }

    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', false, '1.0');
    wp_register_style('owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', false, '1.0');
    wp_register_style('owl-theme', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css', false, '1.0');
    wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.css', false, '1.0');
    wp_enqueue_style('bootsnav', get_template_directory_uri() . '/assets/css/bootsnav.css', false, '1.0');
    wp_enqueue_style('nice-select', get_template_directory_uri() . '/assets/js/nice-select/nice-select.css', false, '1.0');
    wp_enqueue_style('digilab-style', get_template_directory_uri() . '/assets/css/style.css', false, '1.0');
    wp_enqueue_style('responsive', get_template_directory_uri() . '/assets/css/responsive.css', false, '1.0');
    wp_enqueue_style( 'digilab-framework-style', get_template_directory_uri() . '/assets/css/framework-style.css', false, '1.0' );
    wp_enqueue_style( 'digilab-update-style', get_template_directory_uri() . '/assets/css/update.css', false, '1.0' );

    //<!-- ========== End Stylesheet ========== -->

    //<!-- ========== Start jQuery Frameworks ========== -->
    wp_enqueue_script('nice-select', get_template_directory_uri() . '/assets/js/nice-select/jquery-nice-select.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('jquery-appear', get_template_directory_uri() . '/assets/js/jquery.appear.js', array('jquery'), '1.0', true);
    wp_enqueue_script('jquery-easing', get_template_directory_uri() . '/assets/js/jquery.easing.min.js', array('jquery'), '1.0', true);
    wp_register_script('jquery-magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), '1.0', true);
    wp_register_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('wow', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), '1.0', true);
    wp_register_script('progress-bar', get_template_directory_uri() . '/assets/js/progress-bar.min.js', array('jquery'), '1.0', true);
    wp_register_script('isotope-pkgd', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array('jquery'), '1.0', true);
    wp_register_script('imagesloaded-pkgd', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', array('jquery'), '1.0', true);
    wp_register_script('count-to', get_template_directory_uri() . '/assets/js/count-to.js', array('jquery'), '1.0', true);
    wp_register_script('YTPlayer', get_template_directory_uri() . '/assets/js/YTPlayer.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('bootsnav', get_template_directory_uri() . '/assets/js/bootsnav.js', array('jquery'), '1.0', true);

    // upload Google Webfonts
    wp_enqueue_style( 'digilab-fonts', digilab_fonts_url(), array(), null );
    wp_enqueue_script('digilab-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true);
    wp_enqueue_script( 'framework-settings', get_template_directory_uri() . '/assets/js/framework-settings.js', array( 'jquery' ), '1.0', true );
    //<!-- ========== End jQuery Frameworks ========== -->

    // browser hacks
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.min.js', array( 'jquery' ), '1,0', false );
    wp_script_add_data( 'modernizr', 'conditional', 'lt IE 9' );
    wp_enqueue_script( 'respond', get_template_directory_uri() . '/assets/js/respond.min.js', array( 'jquery' ), '1.0', false );
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
    wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/assets/js/html5shiv.min.js', array( 'jquery' ), '1.0', false );
    wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

    // comment form reply
    if ( is_singular() ) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'digilab_theme_scripts');

/*************************************************
## ADMIN STYLE AND SCRIPTS
*************************************************/

function digilab_admin_scripts()
{
    // Update CSS within in Admin
    wp_enqueue_script( 'digilab-custom-admin', get_template_directory_uri() . '/assets/js/framework-admin.js', array( 'jquery','jquery-ui-sortable' ) );

}
add_action( 'admin_enqueue_scripts', 'digilab_admin_scripts' );



// Template-functions
include get_template_directory() . '/inc/template-functions.php';

// Theme parts
include get_template_directory() . '/inc/template-parts/menu.php';
include get_template_directory() . '/inc/template-parts/post-formats.php';
include get_template_directory() . '/inc/template-parts/single-post-formats.php';
include get_template_directory() . '/inc/template-parts/paginations.php';
include get_template_directory() . '/inc/template-parts/comment-parts.php';
include get_template_directory() . '/inc/template-parts/small-parts.php';
include get_template_directory() . '/inc/template-parts/header-parts.php';
include get_template_directory() . '/inc/template-parts/footer-parts.php';
include get_template_directory() . '/inc/template-parts/page-hero.php';
include get_template_directory() . '/inc/template-parts/breadcrumbs.php';

// Theme dynamic css setting file
include get_template_directory() . '/inc/template-parts/custom-style.php';

// Theme post and page meta plugin for customization and more features
include get_template_directory() . '/inc/core/metaboxes.php';
// TGM plugin activation
include get_template_directory() . '/inc/core/class-tgm-plugin-activation.php';
// Redux theme options panel
include get_template_directory() . '/inc/core/theme-options/options.php';



/*************************************************
## THEME SETUP
*************************************************/


if (! isset($content_width) ) {
    $content_width = 960;
}

function digilab_theme_setup()
{

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
    add_image_size( 'digilab-square', 500, 500, true );
    add_image_size( 'digilab-grid', 750, 750, true );
    add_image_size( 'digilab-single', 2400, 1200, true );
    /*
    * Enable support for Post Thumbnails on posts and pages.
    *
    * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
    */
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'post-formats', array( 'gallery','link','image','quote','video','audio' ) );

    // theme supports
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-background' );
    add_theme_support( 'custom-header' );
    add_theme_support( 'html5', array( 'search-form' ) );


    // Make theme available for translation
    // Translations can be filed in the /languages/ directory
    load_theme_textdomain( 'digilab', get_template_directory() . '/languages' );

    register_nav_menus(array(
        'header_menu' => esc_html__( 'Header Menu', 'digilab' ),
        'footer_menu' => esc_html__( 'Footer Menu', 'digilab' ),
    ) );

}
add_action( 'after_setup_theme', 'digilab_theme_setup' );


/*************************************************
## WIDGET COLUMNS
*************************************************/


function digilab_widgets_init()
{

    register_sidebar(array(
        'name' => esc_html__( 'Blog Sidebar', 'digilab' ),
        'id' => 'sidebar-1',
        'description' => esc_html__( 'These widgets for the Blog page.', 'digilab' ),
        'before_widget' => '<div class="tf-sidebar-inner-widget blog-sidebar_widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="tf-sidebar-inner-widget-title widget-title">',
        'after_title' => '</h4>'
    ) );
    if (function_exists( 'get_field' ) && 'full-width' != get_field( 'digilab_page_layout' ) ) {
        register_sidebar(array(
            'name' => esc_html__( 'Default Page Sidebar', 'digilab' ),
            'id' => 'digilab-page-sidebar',
            'description' => esc_html__( 'These widgets for the Default Page pages.', 'digilab' ),
            'before_widget' => '<div class="tf-sidebar-inner-widget blog-sidebar_widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="tf-sidebar-inner-widget-title widget-title">',
            'after_title' => '</h4>'
        ) );
    }
    if (class_exists( 'Redux' ) ) {
        if ( 'full-width' != digilab_settings( 'archive_layout', 'full-width' ) ) {
            register_sidebar(array(
                'name' => esc_html__( 'Archive Sidebar', 'digilab' ),
                'id' => 'digilab-archive-sidebar',
                'description' => esc_html__( 'These widgets for the Archive pages.', 'digilab' ),
                'before_widget' => '<div class="tf-sidebar-inner-widget blog-sidebar_widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="tf-sidebar-inner-widget-title widget-title">',
                'after_title' => '</h4>'
            ) );
        }
        if ( 'full-width' != digilab_settings( 'search_layout', 'full-width' ) ) {
            register_sidebar(array(
                'name' => esc_html__( 'Search Sidebar', 'digilab' ),
                'id' => 'digilab-search-sidebar',
                'description' => esc_html__( 'These widgets for the Search pages.', 'digilab' ),
                'before_widget' => '<div class="tf-sidebar-inner-widget blog-sidebar_widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="tf-sidebar-inner-widget-title widget-title">',
                'after_title' => '</h4>'
            ) );
        }
        if ( 'full-width' != digilab_settings( 'single_layout', 'full-width' ) ) {
            register_sidebar(array(
                'name' => esc_html__( 'Blog Single Sidebar', 'digilab' ),
                'id' => 'digilab-single-sidebar',
                'description' => esc_html__( 'These widgets for the Blog single page.', 'digilab' ),
                'before_widget' => '<div class="tf-sidebar-inner-widget blog-sidebar_widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="tf-sidebar-inner-widget-title widget-title">',
                'after_title' => '</h4>'
            ) );
        }
        if ( '1' == digilab_settings( 'footer_visibility', '1' ) && '1' == digilab_settings( 'footer_widgetize_visibility', '0' ) ) {
            register_sidebar(array(
                'name' => esc_html__( 'Footer Widget Area', 'digilab' ),
                'id' => 'footer-widget-area',
                'description' => esc_html__( 'These widgets for the footer top section.', 'digilab' ),
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '<h4 class="tf-footer-widget-title tf-sidebar-inner-widget-title">',
                'after_title' => '</h4>'
            ) );
        }

    } // end if redux exists
} // end digilab_widgets_init
add_action( 'widgets_init', 'digilab_widgets_init' );

function digilab_filter_admin_head() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'digilab_filter_admin_head');


/*************************************************
## INCLUDE THE TGM_PLUGIN_ACTIVATION CLASS.
*************************************************/

function digilab_register_required_plugins()
{
    $plugins = array(
        array(
            'name' => esc_html__( 'Custom Post Type UI', 'digilab' ),
            'slug' => 'custom-post-type-ui'
        ),
        array(
            'name' => esc_html__( 'Safe SVG', 'digilab' ),
            'slug' => 'safe-svg'
        ),
        array(
            'name' => esc_html__( 'Contact Form 7', 'digilab' ),
            'slug' => 'contact-form-7'
        ),
        array(
            'name' => esc_html__( 'Theme Options Panel', 'digilab' ),
            'slug' => 'redux-framework',
            'required' => true
        ),
        array(
            'name' => esc_html__( 'Elementor', 'digilab' ),
            'slug' => 'elementor',
            'required' => true
        ),
        array(
            'name' => esc_html__( 'Envato Auto Update Theme', 'digilab' ),
            'slug' => 'envato-market',
            'source' => 'https://assets.themefora.com/files/envato-market.zip',
            'required' => false
        ),
        array(
            'name' => esc_html__( 'Digilab Elementor Addons', 'digilab' ),
            'slug' => 'digilab-elementor-addons',
            'source' => get_template_directory() . '/plugins/digilab-elementor-addons.zip',
            'required' => true,
            'version' => '1.0.0'
        )
        // end plugins list
    );

    $config = array(
        'id' => 'tgmpa',
        'default_path' => '',
        'menu' => 'tgmpa-install-plugins',
        'has_notices' => true,
        'dismissable' => true,
        'dismiss_msg' => '',
        'is_automatic' => true,
        'message' => '',
    );

    tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'digilab_register_required_plugins' );


/*************************************************
## ONE CLICK DEMO IMPORT
*************************************************/


/*************************************************
## THEME SETUP WIZARD
    https://github.com/richtabor/MerlinWP
*************************************************/

require_once get_parent_theme_file_path( '/inc/core/merlin/class-merlin.php' );
require_once get_parent_theme_file_path( '/inc/core/demo-wizard-config.php' );

function digilab_merlin_local_import_files() {
    return array(
        array(
            'import_file_name'         => esc_html__( 'Demo Import','digilab' ),
            // XML data
            'local_import_file'        => get_parent_theme_file_path( 'inc/core/merlin/demodata/data.xml' ),
            // Widget data
            'local_import_widget_file' => get_parent_theme_file_path( 'inc/core/merlin/demodata/widgets.wie' ),
            // Theme options
            'local_import_redux'       => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ). 'inc/core/merlin/demodata/redux.json',
                    'option_name' => 'digilab'
                )
            ),
            // cptui -> custom post types data
            'import_cptui' => array(
                array(
                    'cpt_file_url' => trailingslashit( get_template_directory_uri() ) .  'inc/core/merlin/demodata/cpt.json',
                    'tax_file_url' => trailingslashit( get_template_directory_uri() ) .  'inc/core/merlin/demodata/cpttax.json'
                )
            )
        )
    );
}
add_filter( 'merlin_import_files', 'digilab_merlin_local_import_files' );


/**
 * Execute custom code after the whole import has finished.
 */
function digilab_merlin_after_import_setup() {
    // Assign menus to their locations.
    $primary = get_term_by( 'name', 'Header Menu', 'nav_menu' );
    set_theme_mod(
        'nav_menu_locations', array(
            'header_menu' => $primary->term_id
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

    if ( did_action( 'elementor/loaded' ) ) {
        // disable some default elementor global settings after setup theme
		update_option( 'elementor_active_kit', '4418' );
        update_option( 'elementor_disable_color_schemes', 'yes' );
        update_option( 'elementor_disable_typography_schemes', 'yes' );
        update_option( 'elementor_global_image_lightbox', 'yes' );
    }

}
add_action( 'merlin_after_all_import', 'digilab_merlin_after_import_setup' );
add_action('init', 'do_output_buffer'); function do_output_buffer() { ob_start(); }

add_action( 'admin_init', function() {
    if ( did_action( 'elementor/loaded' ) ) {
        remove_action( 'admin_init', [ \Elementor\Plugin::$instance->admin, 'maybe_redirect_to_getting_started' ] );
    }
}, 1 );

function digilab_register_elementor_locations( $elementor_theme_manager ) {

    $elementor_theme_manager->register_location( 'header' );
    $elementor_theme_manager->register_location( 'footer' );
    $elementor_theme_manager->register_location( 'single' );
    $elementor_theme_manager->register_location( 'archive' );

}
add_action( 'elementor/theme/register_locations', 'digilab_register_elementor_locations' );

?>
