<?php

    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if (! class_exists('Redux' )) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $digilab_pre = "digilab";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $digilab_theme = wp_get_theme(); // For use with some settings. Not necessary.

    $digilab_options_args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name' => $digilab_pre,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name' => $digilab_theme->get('Name' ),
        // Name that appears at the top of your panel
        'display_version' => $digilab_theme->get('Version' ),
        // Version that appears at the top of your panel
        'menu_type' => 'submenu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu' => false,
        // Show the sections below the admin menu item or not
        'menu_title' => esc_html__( 'Theme Options', 'digilab' ),
        'page_title' => esc_html__( 'Theme Options', 'digilab' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key' => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography' => false,
        // Use a asynchronous font on the front end or font string
        'admin_bar' => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon' => 'dashicons-admin-generic',
        // Choose an icon for the admin bar menu
        'admin_bar_priority' => 50,
        // Choose an priority for the admin bar menu
        'global_variable' => 'digilab',
        // Set a different name for your global variable other than the digilab_pre
        'dev_mode' => false,
        // Show the time the page took to load, etc
        'update_notice' => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer' => true,
        // Enable basic customizer support

        // OPTIONAL -> Give you extra features
        'page_priority' => 99,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent' => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions' => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon' => '',
        // Specify a custom URL to an icon
        'last_tab' => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon' => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug' => '',
        // Page slug used to denote the panel, will be based off page title then menu title then digilab_pre if not provided
        'save_defaults' => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show' => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark' => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export' => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time' => 60 * MINUTE_IN_SECONDS,
        'output' => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag' => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database' => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn' => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints' => array(
            'icon' => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color' => 'lightgray',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'dark',
                'shadow' => true,
                'rounded' => false,
                'style' => '',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'effect' => 'slide',
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'effect' => 'slide',
                    'duration' => '500',
                    'event' => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $digilab_options_args['admin_bar_links'][] = array(
        'id' => 'themefora-digilab-docs',
        'href' => 'http://themefora.com/',
        'title' => esc_html__( 'digilab Documentation', 'digilab' ),
    );
    $digilab_options_args['admin_bar_links'][] = array(
        'id' => 'themefora-support',
        'href' => 'https://9theme.ticksy.com/',
        'title' => esc_html__( 'Support', 'digilab' ),
    );
    $digilab_options_args['admin_bar_links'][] = array(
        'id' => 'themefora-portfolio',
        'href' => 'https://themeforest.net/user/themefora/portfolio',
        'title' => esc_html__( 'Themefora Portfolio', 'digilab' ),
    );

    // Add content after the form.
    $digilab_options_args['footer_text'] = esc_html__( 'If you need help please read docs and open a ticket on our support center.', 'digilab' );

    Redux::setArgs($digilab_pre, $digilab_options_args);

    /* END ARGUMENTS */

    /* START SECTIONS */


    /*************************************************
    ## MAIN SETTING SECTION
    *************************************************/
    Redux::setSection($digilab_pre, array(
        'title' => esc_html__( 'Main Setting', 'digilab' ),
        'id' => 'basic',
        'desc' => esc_html__( 'These are main settings for general theme!', 'digilab' ),
        'customizer_width' => '400px',
        'icon' => 'el el-cog',
    ));
    //BREADCRUMBS SETTINGS SUBSECTION
    Redux::setSection($digilab_pre, array(
        'title' => esc_html__( 'Theme Color', 'digilab' ),
        'id' => 'themebreadcrumbssubsection',
        'icon' => 'el el-brush',
        'subsection' => true,
        'customizer_width' => '450px',
        'fields' => array(
            array(
                'title' => esc_html__( 'Change Theme General Root for Color', 'digilab' ),
                'id' => 'theme_root',
                'type' => 'switch',
                'default' => true
            ),
            array(
                'title' => esc_html__( 'Theme Primary Color', 'digilab' ),
                'subtitle' => esc_html__( 'Change theme main color.', 'digilab' ),
                'id' => 'theme_main_color',
                'type' => 'color',
                'default' => '#F84E77',
                'required' => array( 'theme_root', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Theme Primary Color ( Hover )', 'digilab' ),
                'subtitle' => esc_html__( 'Change theme main hover color.', 'digilab' ),
                'id' => 'theme_main_hvrcolor',
                'type' => 'color',
                'default' => '#F84E77',
                'required' => array( 'theme_root', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Theme Secondary Color', 'digilab' ),
                'subtitle' => esc_html__( 'Change theme secondary color.', 'digilab' ),
                'id' => 'theme_secondary_color',
                'type' => 'color',
                'default' => '#1BAAA0',
                'required' => array( 'theme_root', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Theme Secondary Color ( Hover )', 'digilab' ),
                'subtitle' => esc_html__( 'Change theme secondary color.', 'digilab' ),
                'id' => 'theme_secondary_hvrcolor',
                'type' => 'color',
                'default' => '#1BAAA0',
                'required' => array( 'theme_root', '=', '1' )
            )
        )
    ));
    //BREADCRUMBS SETTINGS SUBSECTION
    Redux::setSection($digilab_pre, array(
        'title' => esc_html__( 'Breadcrumbs', 'digilab' ),
        'id' => 'thememaincolorsubsection',
        'icon' => 'el el-brush',
        'subsection' => true,
        'customizer_width' => '450px',
        'fields' => array(
            array(
                'title' => esc_html__( 'Breadcrumbs', 'digilab' ),
                'subtitle' => esc_html__( 'If enabled, adds breadcrumbs navigation to bottom of page title.', 'digilab' ),
                'id' => 'breadcrumbs_visibility',
                'type' => 'switch',
                'default' => true
            ),
            array(
                'title' => esc_html__( 'Breadcrumbs Typography', 'digilab' ),
                'id' => 'breadcrumbs_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '.tf-breadcrumbs, .tf-breadcrumbs .tf-breadcrumbs-list' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'breadcrumbs_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Breadcrumbs Current Color', 'digilab' ),
                'id' => 'breadcrumbs_current',
                'type' => 'color',
                'default' => '#fff',
                'output' => array( '.tf-breadcrumbs .tf-breadcrumbs-list li.active' ),
                'required' => array( 'breadcrumbs_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Breadcrumbs Icon Color', 'digilab' ),
                'id' => 'breadcrumbs_icon',
                'type' => 'color',
                'default' => '#fff',
                'output' => array( '.tf-breadcrumbs .tf-breadcrumbs-list i' ),
                'required' => array( 'breadcrumbs_visibility', '=', '1' )
            )
        )
    ));
    //PRELOADER SETTINGS SUBSECTION
    Redux::setSection($digilab_pre, array(
        'title' => esc_html__( 'Preloader', 'digilab' ),
        'id' => 'themepreloadersubsection',
        'icon' => 'el el-brush',
        'subsection' => true,
        'fields' => array(
            array(
                'title' => esc_html__( 'Preloader', 'digilab' ),
                'subtitle' => esc_html__( 'If enabled, adds preloader.', 'digilab' ),
                'id' => 'preloader_visibility',
                'type' => 'switch',
                'default' => true
            ),
            array(
                'title' => esc_html__( 'Preloader Text', 'digilab' ),
                'desc' => esc_html__( 'Add preloader text here', 'digilab' ),
                'id' => 'preloader_loader_text',
                'type' => 'text',
                'default' => 'Digilab',
                'required' => array(
                    array( 'preloader_visibility', '=', '1' )
                ),
            ),
            array(
                'title' => esc_html__( 'Preloader Background Color', 'digilab' ),
                'subtitle' => esc_html__( 'Add preloader background color.', 'digilab' ),
                'id' => 'pre_bg',
                'type' => 'color',
                'default' => '#FFFFFF',
                'required' => array(
                    array( 'preloader_visibility', '=', '1' )
                ),
            ),
            array(
                'title' => esc_html__( 'Preloader Spin Color', 'digilab' ),
                'subtitle' => esc_html__( 'Add preloader spin color.', 'digilab' ),
                'id' => 'pre_spin',
                'type' => 'color',
                'default' => '#4154f1',
                'required' => array(
                    array( 'preloader_visibility', '=', '1' ),
                )
            ),
            array(
                'title' => esc_html__( 'Preloader Text Color', 'digilab' ),
                'subtitle' => esc_html__( 'Add preloader text color.', 'digilab' ),
                'id' => 'pre_txt_color',
                'type' => 'color',
                'default' => '#4154f1',
                'required' => array(
                    array( 'preloader_visibility', '=', '1' ),
                )
            )
    )));
    //MAIN THEME TYPOGRAPHY SUBSECTION
    Redux::setSection($digilab_pre, array(
    'title' => esc_html__( 'Typograhy General', 'digilab' ),
    'id' => 'themetypographysection',
    'icon' => 'el el-fontsize',
    'subsection' => true,
    'fields' => array(
        array(
            'title' => esc_html__( 'Use Elementor Style Kit', 'digilab' ),
            'subtitle' => esc_html__( 'This option applies styles created with Elementor to pages not created with Elementor.', 'digilab' ),
            'id' => 'use_elementor_style_kit',
            'type' => 'switch',
            'default' => false
        ),
        array(
            'title' => esc_html__( 'H1 Headings', 'digilab' ),
            'subtitle' => esc_html__("Choose Size and Style for h1", 'digilab' ),
            'id' => 'font_h1',
            'type' => 'typography',
            'font-backup' => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'all_styles' => true,
            'output' => array( 'h1' ),
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => ''
            ),
            'required' => array( 'use_elementor_style_kit', '!=', '1' )
        ),
        array(
            'title' => esc_html__( 'H2 Headings', 'digilab' ),
            'subtitle' => esc_html__("Choose Size and Style for h2", 'digilab' ),
            'id' => 'font_h2',
            'type' => 'typography',
            'font-backup' => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'all_styles' => true,
            'output' => array( 'h2' ),
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => ''
            ),
            'required' => array( 'use_elementor_style_kit', '!=', '1' )
        ),
        array(
            'title' => esc_html__( 'H3 Headings', 'digilab' ),
            'subtitle' => esc_html__("Choose Size and Style for h3", 'digilab' ),
            'id' => 'font_h3',
            'type' => 'typography',
            'font-backup' => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'all_styles' => true,
            'output' => array( 'h3' ),
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => ''
            ),
            'required' => array( 'use_elementor_style_kit', '!=', '1' )
        ),
        array(
            'title' => esc_html__( 'H4 Headings', 'digilab' ),
            'subtitle' => esc_html__("Choose Size and Style for h4", 'digilab' ),
            'id' => 'font_h4',
            'type' => 'typography',
            'font-backup' => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'all_styles' => true,
            'output' => array( 'h4' ),
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => ''
            ),
            'required' => array( 'use_elementor_style_kit', '!=', '1' )
        ),
        array(
            'title' => esc_html__( 'H5 Headings', 'digilab' ),
            'subtitle' => esc_html__("Choose Size and Style for h5", 'digilab' ),
            'id' => 'font_h5',
            'type' => 'typography',
            'font-backup' => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'all_styles' => true,
            'output' => array( 'h5' ),
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => ''
            ),
            'required' => array( 'use_elementor_style_kit', '!=', '1' )
        ),
        array(
            'title' => esc_html__( 'H6 Headings', 'digilab' ),
            'subtitle' => esc_html__("Choose Size and Style for h6", 'digilab' ),
            'id' => 'font_h6',
            'type' => 'typography',
            'font-backup' => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'all_styles' => true,
            'output' => array( 'h6' ),
            'units' => 'px',
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => ''
            ),
            'required' => array( 'use_elementor_style_kit', '!=', '1' )
        ),
        array(
            'id' =>'info_body_font',
            'type' => 'info',
            'customizer' => false,
            'desc' => esc_html__( 'Body Font Options', 'digilab' )
        ),
        array(
            'title' => esc_html__( 'Body', 'digilab' ),
            'subtitle' => esc_html__("Choose Size and Style for Body", 'digilab' ),
            'id' => 'font_body',
            'type' => 'typography',
            'font-backup' => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'all_styles' => true,
            'output' => array( 'body' ),
            'default' => array(
                'font-family' =>'',
                'color' =>"",
                'font-style' =>'',
                'font-size' =>'',
                'line-height' =>''
            ),
            'required' => array( 'use_elementor_style_kit', '!=', '1' )
        ),
        array(
            'title' => esc_html__( 'Paragraph', 'digilab' ),
            'subtitle' => esc_html__("Choose Size and Style for paragraph", 'digilab' ),
            'id' => 'font_p',
            'type' => 'typography',
            'font-backup' => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'all_styles' => true,
            'output' => array( 'p, body.has-paragraph-style p' ),
            'default' => array(
                'font-family' =>'',
                'color' =>"",
                'font-style' =>'',
                'font-size' =>'',
                'line-height' =>''
            ),
            'required' => array( 'use_elementor_style_kit', '!=', '1' )
        ),
        array(
            'title' => esc_html__( 'Make paragraph settings priority', 'digilab' ),
            'subtitle' => esc_html__( 'Use this option if you want these settings to take priority for the paragraph', 'digilab' ),
            'id' => 'font_p_important',
            'type' => 'switch',
            'default' => false,
            'required' => array( 'use_elementor_style_kit', '!=', '1' )
        )
    )));

    // THEME PAGINATION SUBSECTION
    Redux::setSection($digilab_pre, array(
    'title' => esc_html__( 'Pagination', 'digilab' ),
    'desc' => esc_html__( 'These are main settings for general theme!', 'digilab' ),
    'id' => 'pagination',
    'subsection' => true,
    'icon' => 'el el-link',
    'fields' => array(
        array(
            'title' => esc_html__( 'Pagination', 'digilab' ),
            'subtitle' => esc_html__( 'Switch On-off', 'digilab' ),
            'desc' => esc_html__( 'If enabled, adds pagination.', 'digilab' ),
            'id' => 'pagination_visibility',
            'type' => 'switch',
            'default' => true
        ),
        array(
            'title' => esc_html__( 'Pagination Type', 'digilab' ),
            'subtitle' => esc_html__( 'Select type.', 'digilab' ),
            'id' => 'pag_type',
            'type' => 'select',
            'customizer' => true,
            'options' => array(
                'default' => esc_html__( 'Default', 'digilab' ),
                'outline' => esc_html__( 'Outline', 'digilab' )
            ),
            'default' => 'default',
            'required' => array( 'pagination_visibility', '=', '1' )
        ),
        array(
            'title' => esc_html__( 'Pagination size', 'digilab' ),
            'subtitle' => esc_html__( 'Select size.', 'digilab' ),
            'id' => 'pag_size',
            'type' => 'select',
            'customizer' => true,
            'options' => array(
                'small' => esc_html__( 'small', 'digilab' ),
                'medium' => esc_html__( 'medium', 'digilab' ),
                'large' => esc_html__( 'large', 'digilab' )
            ),
            'default' => 'medium',
            'required' => array( 'pagination_visibility', '=', '1' )
        ),
        array(
            'title' => esc_html__( 'Pagination group', 'digilab' ),
            'subtitle' => esc_html__( 'Select group.', 'digilab' ),
            'id' => 'pag_group',
            'type' => 'select',
            'customizer' => true,
            'options' => array(
                'yes' => esc_html__( 'Yes', 'digilab' ),
                'no' => esc_html__( 'No', 'digilab' )
            ),
            'default' => 'no',
            'required' => array( 'pagination_visibility', '=', '1' )
        ),
        array(
            'title' => esc_html__( 'Pagination corner', 'digilab' ),
            'subtitle' => esc_html__( 'Select corner type.', 'digilab' ),
            'id' => 'pag_corner',
            'type' => 'select',
            'customizer' => true,
            'options' => array(
                'square' => esc_html__( 'square', 'digilab' ),
                'rounded' => esc_html__( 'rounded', 'digilab' ),
                'circle' => esc_html__( 'circle', 'digilab' )
            ),
            'default' => 'square',
            'required' => array( 'pagination_visibility', '=', '1' )
        ),
        array(
            'title' => esc_html__( 'Pagination align', 'digilab' ),
            'subtitle' => esc_html__( 'Select align.', 'digilab' ),
            'id' => 'pag_align',
            'type' => 'select',
            'customizer' => true,
            'options' => array(
                'left' => esc_html__( 'left', 'digilab' ),
                'right' => esc_html__( 'right', 'digilab' ),
                'center' => esc_html__( 'center', 'digilab' )
            ),
            'default' => 'center',
            'required' => array( 'pagination_visibility', '=', '1' )
        ),
        array(
            'title' => esc_html__( 'Pagination default/outline color', 'digilab' ),
            'id' => 'pag_clr',
            'type' => 'color',
            'mode' => 'color',
            'required' => array( 'pagination_visibility', '=', '1' )
        ),
        array(
            'title' => esc_html__( 'Active and Hover pagination color', 'digilab' ),
            'id' => 'pag_hvrclr',
            'type' => 'color',
            'mode' => 'color',
            'required' => array( 'pagination_visibility', '=', '1' )
        ),
        array(
            'title' => esc_html__( 'Pagination number color', 'digilab' ),
            'id' => 'pag_nclr',
            'type' => 'color',
            'mode' => 'color',
            'required' => array( 'pagination_visibility', '=', '1' )
        ),
        array(
            'title' => esc_html__( 'Active and Hover pagination number color', 'digilab' ),
            'id' => 'pag_hvrnclr',
            'type' => 'color',
            'mode' => 'color',
            'required' => array( 'pagination_visibility', '=', '1' )
        )
    )));

    /*************************************************
    ## LOGO SECTION
    *************************************************/
    Redux::setSection($digilab_pre, array(
        'title' => esc_html__( 'Logo', 'digilab' ),
        'desc' => esc_html__( 'These are main settings for general theme!', 'digilab' ),
        'id' => 'logosection',
        'customizer_width' => '400px',
        'icon' => 'el el-star-empty',
        'fields' => array(
            array(
                'title' => esc_html__( 'Logo Switch', 'digilab' ),
                'subtitle' => esc_html__( 'You can select logo on or off.', 'digilab' ),
                'id' => 'logo_visibility',
                'type' => 'switch',
                'default' => true
            ),
            array(
                'title' => esc_html__( 'Logo Type', 'digilab' ),
                'subtitle' => esc_html__( 'Select your logo type.', 'digilab' ),
                'id' => 'logo_type',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    'img' => esc_html__( 'Image Logo', 'digilab' ),
                    'sitename' => esc_html__( 'Site Name', 'digilab' ),
                    'customtext' => esc_html__( 'Custom HTML', 'digilab' )
                ),
                'default' => 'sitename',
                'required' => array( 'logo_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Custom text for logo', 'digilab' ),
                'desc' => esc_html__( 'Text entered here will be used as logo', 'digilab' ),
                'id' => 'text_logo',
                'type' => 'text',
                'required' => array(
                    array( 'logo_visibility', '=', '1' ),
                    array( 'logo_type', '=', 'customtext' )
                ),
            ),
            array(
                'title' => esc_html__( 'Sitename or Custom Text Logo Font', 'digilab' ),
                'desc' => esc_html__("Choose size and style your sitename, if you don't use an image logo.", 'digilab' ),
                'id' =>'logo_style',
                'type' => 'typography',
                'font-family' => true,
                'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false, // Select a backup non-google font in addition to a google font
                'font-style' => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'subsets' => true, // Only appears if google is true and subsets not set to false
                'font-size' => true,
                'line-height' => true,
                'text-transform' => true,
                'text-align' => false,
                'customizer' => true,
                'color' => true,
                'preview' => true, // Disable the previewer
                'output' => array('#tf-logo.logo-type-customtext, #tf-logo.logo-type-sitename' ),
                'default' => array(
                    'font-family' =>'',
                    'color' =>"",
                    'font-style' =>'',
                    'font-size' =>'',
                    'line-height' =>''
                ),
                'required' => array(
                    array( 'logo_visibility', '=', '1' ),
                    array( 'logo_type', '!=', 'img' )
                )
            ),
            array(
                'title' => esc_html__( 'Hover Text Logo Color', 'digilab' ),
                'desc' => esc_html__( 'Set your own hover color for the text logo.', 'digilab' ),
                'id' => 'text_logo_hvr',
                'type' => 'color',
                'output' => array( '#tf-logo.logo-type-customtext:hover, #tf-logo.logo-type-sitename:hover' ),
                'required' => array(
                    array( 'logo_visibility', '=', '1' ),
                    array( 'logo_type', '!=', 'img' )
                )
            ),
            array(
                'title' => esc_html__( 'Logo image', 'digilab' ),
                'subtitle' => esc_html__( 'Upload your Logo. If left blank theme will use site default logo.', 'digilab' ),
                'id' => 'img_logo',
                'type' => 'media',
                'url' => true,
                'customizer' => true,
                'required' => array(
                    array( 'logo_visibility', '=', '1' ),
                    array( 'logo_type', '=', 'img' ),
                    array( 'logo_type', '!=', '' )
                )
            ),
            array(
                'title' => esc_html__( 'Logo Dimensions', 'digilab' ),
                'subtitle' => esc_html__( 'Set the logo width and height of the image.', 'digilab' ),
                'id' => 'img_logo_dimensions',
                'type' => 'dimensions',
                'customizer' => true,
                'output' => array('.navbar-brand .logo' ),
                'required' => array(
                    array( 'logo_visibility', '=', '1' ),
                    array( 'logo_type', '!=', '' )
                )
            )
    )));

    /*************************************************
    ## HEADER & NAV SECTION
    *************************************************/
    Redux::setSection($digilab_pre, array(
        'title' => esc_html__( 'Header', 'digilab' ),
        'id' => 'headersection',
        'icon' => 'fa fa-bars',
    ));
    //HEADER MENU
    Redux::setSection($digilab_pre, array(
        'title' => esc_html__( 'General', 'digilab' ),
        'id' => 'headernavgeneralsection',
        'subsection' => true,
        'icon' => 'fa fa-cog',
        'fields' => array(
            array(
                'title' => esc_html__( 'Header Display', 'digilab' ),
                'subtitle' => esc_html__( 'You can enable or disable the site navigation.', 'digilab' ),
                'id' => 'header_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Header Template', 'digilab' ),
                'subtitle' => esc_html__( 'Select your header template.', 'digilab' ),
                'id' => 'header_template',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    'default' => esc_html__( 'Default Site Header', 'digilab' ),
                    'elementor' => esc_html__( 'Elementor Templates', 'digilab' ),
                ),
                'default' => 'default',
                'required' => array( 'header_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Elementor Templates', 'digilab' ),
                'subtitle' => esc_html__( 'Select a template from elementor templates.', 'digilab' ),
                'id' => 'header_elementor_templates',
                'type' => 'select',
                'customizer' => true,
                'options' => digilab_get_elementorTemplates(),
                'required' => array(
                    array( 'header_visibility', '=', '1' ),
                    array( 'header_template', '=', 'elementor' )
                )
            ),
            array(
                'title' => esc_html__( 'Header Background Color', 'digilab' ),
                'id' => 'nav_top_bg',
                'type' => 'color_rgba',
                'mode' => 'background',
                'options' => array(
                    'show_input' => true,
                    'show_initial' => true,
                    'show_alpha' => true,
                    'show_palette' => true,
                    'show_palette_only' => false,
                    'show_selection_palette' => true,
                    'max_palette_size' => 10,
                    'allow_empty' => true,
                    'clickout_fires_change' => false,
                    'show_buttons' => true,
                    'use_extended_classes' => true,
                    'palette' => null,
                ),
                'output' => array( 'nav .navbar' ),
                'required' => array( 'header_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Header Border Bottom Color', 'digilab' ),
                'id' => 'nav_top_bg',
                'type' => 'color',
                'mode' => 'border-color',
                'output' => array( 'nav .navbar' ),
                'required' => array( 'header_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Menu Item Font and Color', 'digilab' ),
                'subtitle' => esc_html__('Choose Size and Style for primary menu', 'digilab' ),
                'id' => 'nav_a_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '.navbar .navbar-menu > li > a' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'header_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Menu Item Color ( Hover and Active )', 'digilab' ),
                'desc' => esc_html__( 'Set your own hover color for the navigation menu item.', 'digilab' ),
                'id' => 'nav_hvr_a',
                'type' => 'color',
                'output' => array( 'nav.navbar.bootsnav ul.nav > li > a:hover' ),
                'required' => array( 'header_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Menu Item Point Color ( Hover and Active )', 'digilab' ),
                'desc' => esc_html__( 'Set your own hover color for the navigation menu item point.', 'digilab' ),
                'id' => 'nav_hvr_a_point',
                'type' => 'color',
                'mode' => 'background-color',
                'output' => array( 'nav.navbar .navbar-menu > li:hover::before, nav.navbar .navbar-menu > li .sub-menu li.menu-item-has-children::before' ),
                'required' => array( 'header_visibility', '=', '1' )
            ),
            //information on-off
            array(
                'id' =>'info_nav0',
                'type' => 'info',
                'style' => 'success',
                'title' => esc_html__( 'Success!', 'digilab' ),
                'icon' => 'el el-info-circle',
                'customizer' => false,
                'desc' => sprintf(esc_html__( '%s is disabled on the site. Please activate to view options.', 'digilab' ), '<b>Navigation</b>' ),
                'required' => array( 'header_visibility', '=', '0' )
            ),
            array(
                'title' => esc_html__( 'Search Button Display', 'digilab' ),
                'subtitle' => esc_html__( 'You can enable or disable the site header search button.', 'digilab' ),
                'id' => 'search_button_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Side Bar Button Display', 'digilab' ),
                'subtitle' => esc_html__( 'You can enable or disable the site header side bar button.', 'digilab' ),
                'id' => 'side_bar_button_visibility',
                'type' => 'switch',
                'default' => 0,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Elementor Templates for Side Bar', 'digilab' ),
                'subtitle' => esc_html__( 'Select a template from elementor templates.', 'digilab' ),
                'id' => 'header_elementor_sidebar_templates',
                'type' => 'select',
                'customizer' => true,
                'options' => digilab_get_elementorTemplates(),
                'required' => array( 'side_bar_button_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Language Button Display', 'digilab' ),
                'subtitle' => esc_html__( 'You can enable or disable the site header language button.', 'digilab' ),
                'id' => 'language_button_visibility',
                'type' => 'switch',
                'default' => 0,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Languages Select', 'digilab' ),
                'subtitle' => esc_html__( 'You can add language items..', 'digilab' ),
                'id' => 'languages',
                'type' => 'slides',
                'required' => array( 'language_button_visibility', '=', '1' )
            ),
    )));
    //HEADER MENU
    Redux::setSection($digilab_pre, array(
        'title' => esc_html__( 'Top Bar Menu', 'digilab' ),
        'id' => 'headerbuttonssubsection',
        'subsection' => true,
        'icon' => 'el el-brush',
        'fields' => array(
            array(
                'title' => esc_html__( 'Header Top Bar Display', 'digilab' ),
                'id' => 'header_top_bar_visibility',
                'type' => 'switch',
                'default' => 0,
                'on' => 'On',
                'off' => 'Off',
                'required' => array( 'header_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Header Top Bar Template', 'digilab' ),
                'subtitle' => esc_html__( 'Select your header template.', 'digilab' ),
                'id' => 'header_topbar_template',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    'default' => esc_html__( 'Default Site Header', 'digilab' ),
                    'elementor' => esc_html__( 'Elementor Templates', 'digilab' ),
                ),
                'default' => 'default',
                'required' => array( 'header_top_bar_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Elementor Templates for Top Bar', 'digilab' ),
                'subtitle' => esc_html__( 'Select a template from elementor templates.', 'digilab' ),
                'id' => 'header_elementor_topbar_templates',
                'type' => 'select',
                'customizer' => true,
                'options' => digilab_get_elementorTemplates(),
                'required' => array( 
                    array( 'header_top_bar_visibility', '=', '1' ),
                    array( 'header_topbar_template', '=', 'elementor' )
                )
            ),
            array(
                'title' => esc_html__( 'Header Top Bar Left Area', 'digilab' ),
                'desc' => esc_html__( 'Add your contact details here', 'digilab' ),
                'id' => 'header_topbar_left',
                'type' => 'textarea',
                'validate' => 'html',
                'default' => '<div class="info box">
<ul>
<li>
<i class="fas fa-map-marker-alt"></i> California, TX 70240 </li>
<li>
<i class="fas fa-envelope-open"></i> info@gmail.com </li>
<li>
<i class="fas fa-phone"></i> +123 456 7890 </li>
</ul>
</div>',
                'required' => array(
                    array( 'header_visibility', '=', '1' ),
                    array( 'header_top_bar_visibility', '=', '1' ),
                    array( 'header_topbar_template', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Top Bar Background Color', 'digilab' ),
                'id' => 'header_topbar_bgclr',
                'type' => 'color',
                'mode' => 'background-color',
                'output' => array( '.top-bar-area.thm-dark' ),
                'required' => array(
                    array( 'header_visibility', '=', '1' ),
                    array( 'header_top_bar_visibility', '=', '1' ),
                    array( 'header_topbar_template', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Top Bar Left Area Item Color', 'digilab' ),
                'id' => 'header_topbar_left_clr',
                'type' => 'color',
                'output' => array( '.top-bar-area .address-info *, .top-bar-area .address-info li' ),
                'required' => array(
                    array( 'header_visibility', '=', '1' ),
                    array( 'header_top_bar_visibility', '=', '1' ),
                    array( 'header_topbar_template', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Header Buttons Display', 'digilab' ),
                'id' => 'header_buttons_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
                'required' => array( 
                    array( 'header_top_bar_visibility', '=', '1' ),
                    array( 'header_topbar_template', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Use Custom HTML instead of Buttons?', 'digilab' ),
                'id' => 'header_buttons_custom_visibility',
                'type' => 'switch',
                'default' => 0,
                'on' => 'On',
                'off' => 'Off',
                'required' => array(
                    array( 'header_visibility', '=', '1' ),
                    array( 'header_buttons_visibility', '=', '1' ),
                    array( 'header_top_bar_visibility', '=', '1' ),
                    array( 'header_topbar_template', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Custom HTML', 'digilab' ),
                'desc' => esc_html__( 'Add your custom html here instead of buttons.', 'digilab' ),
                'id' => 'header_buttons_custom',
                'type' => 'editor',
                'default' => '',
                'args'   => array(
                    'teeny' => false,
                    'textarea_rows' => 10
                ),
                'required' => array(
                    array( 'header_visibility', '=', '1' ),
                    array( 'header_buttons_visibility', '=', '1' ),
                    array( 'header_top_bar_visibility', '=', '1' ),
                    array( 'header_buttons_custom_visibility', '=', '1' ),
                    array( 'header_topbar_template', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Header Button', 'digilab' ),
                'desc' => esc_html__( 'Add button title here', 'digilab' ),
                'id' => 'header_buttons1',
                'type' => 'text',
                'default' => 'Get Started',
                'required' => array(
                    array( 'header_visibility', '=', '1' ),
                    array( 'header_buttons_visibility', '=', '1' ),
                    array( 'header_top_bar_visibility', '=', '1' ),
                    array( 'header_buttons_custom_visibility', '=', '0' )
                )
            ),
            array(
                'title' => esc_html__( 'Header Button Link', 'digilab' ),
                'desc' => esc_html__( 'Add button link here', 'digilab' ),
                'id' => 'header_buttons1_url',
                'type' => 'text',
                'default' => '#0',
                'required' => array(
                    array( 'header_visibility', '=', '1' ),
                    array( 'header_buttons_visibility', '=', '1' ),
                    array( 'header_top_bar_visibility', '=', '1' ),
                    array( 'header_buttons_custom_visibility', '=', '0' )
                )
            ),
            array(
                'title' => esc_html__( 'Header Button Target', 'digilab' ),
                'subtitle' => esc_html__( 'Select target type for button link.', 'digilab' ),
                'id' => 'header_buttons1_target',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    '_blank' => esc_html__( 'Blank', 'digilab' ),
                    '_self' => esc_html__( 'Self', 'digilab' ),
                ),
                'default' => '_self',
                'required' => array(
                    array( 'header_visibility', '=', '1' ),
                    array( 'header_buttons_visibility', '=', '1' ),
                    array( 'header_top_bar_visibility', '=', '1' ),
                    array( 'header_buttons_custom_visibility', '=', '0' )
                )
            ),
            array(
                'title' => esc_html__( 'Button Background Color', 'digilab' ),
                'id' => 'header_btn1_bg',
                'type' => 'color_rgba',
                'mode' => 'background-color',
                'options' => array(
                    'show_input' => true,
                    'show_initial' => true,
                    'show_alpha' => true,
                    'show_palette' => true,
                    'show_palette_only' => false,
                    'show_selection_palette' => true,
                    'max_palette_size' => 10,
                    'allow_empty' => true,
                    'clickout_fires_change' => false,
                    'show_buttons' => true,
                    'use_extended_classes' => true,
                    'palette' => null,
                ),
                'output' => array( '.top-bar-area a' ),
                'required' => array(
                    array( 'header_visibility', '=', '1' ),
                    array( 'header_buttons_visibility', '=', '1' ),
                    array( 'header_top_bar_visibility', '=', '1' ),
                    array( 'header_buttons_custom_visibility', '=', '0' )
                )
            ),
            array(
                'title' => esc_html__( 'Button Background Color ( Hover )', 'digilab' ),
                'id' => 'header_btn1_hvrbg',
                'type' => 'color_rgba',
                'mode' => 'background-color',
                'options' => array(
                    'show_input' => true,
                    'show_initial' => true,
                    'show_alpha' => true,
                    'show_palette' => true,
                    'show_palette_only' => false,
                    'show_selection_palette' => true,
                    'max_palette_size' => 10,
                    'allow_empty' => true,
                    'clickout_fires_change' => false,
                    'show_buttons' => true,
                    'use_extended_classes' => true,
                    'palette' => null,
                ),
                'output' => array( '.top-bar-area a:hover' ),
                'required' => array(
                    array( 'header_visibility', '=', '1' ),
                    array( 'header_buttons_visibility', '=', '1' ),
                    array( 'header_top_bar_visibility', '=', '1' ),
                    array( 'header_buttons_custom_visibility', '=', '0' )
                )
            ),
            array(
                'title' => esc_html__( 'Button Title Color', 'digilab' ),
                'id' => 'header_btn1_clr',
                'type' => 'color',
                'output' => array( '.top-bar-area a' ),
                'required' => array(
                    array( 'header_visibility', '=', '1' ),
                    array( 'header_buttons_visibility', '=', '1' ),
                    array( 'header_top_bar_visibility', '=', '1' ),
                    array( 'header_buttons_custom_visibility', '=', '0' )
                )
            ),
            array(
                'title' => esc_html__( 'Button Title Color ( Hover )', 'digilab' ),
                'id' => 'header_btn1_hvrclr',
                'type' => 'color',
                'output' => array( '.top-bar-area a:hover' ),
                'required' => array(
                    array( 'header_visibility', '=', '1' ),
                    array( 'header_buttons_visibility', '=', '1' ),
                    array( 'header_top_bar_visibility', '=', '1' ),
                    array( 'header_buttons_custom_visibility', '=', '0' )
                )
            ),
            array(
                'title' => esc_html__( 'Button Border Color', 'digilab' ),
                'id' => 'header_btn1_brdclr',
                'type' => 'color',
                'mode' => 'border-color',
                'output' => array( '.top-bar-area a' ),
                'required' => array(
                    array( 'header_visibility', '=', '1' ),
                    array( 'header_buttons_visibility', '=', '1' ),
                    array( 'header_top_bar_visibility', '=', '1' ),
                    array( 'header_buttons_custom_visibility', '=', '0' )
                )
            ),
            array(
                'title' => esc_html__( 'Button Border Color ( Hover )', 'digilab' ),
                'id' => 'header_btn1_hvrbrdclr',
                'type' => 'color',
                'mode' => 'border-color',
                'output' => array( '.top-bar-area a:hover' ),
                'required' => array(
                    array( 'header_visibility', '=', '1' ),
                    array( 'header_buttons_visibility', '=', '1' ),
                    array( 'header_top_bar_visibility', '=', '1' ),
                    array( 'header_buttons_custom_visibility', '=', '0' )
                )
            ),
    )));
    //HEADER MENU
    Redux::setSection($digilab_pre, array(
        'title' => esc_html__( 'Dropdown SubMenu', 'digilab' ),
        'id' => 'headerdropdownnavsubsection',
        'subsection' => true,
        'icon' => 'el el-brush',
        'fields' => array(
            array(
                'title' => esc_html__( 'Background Color', 'digilab' ),
                'id' => 'dropdown_nav_bg',
                'type' => 'color_rgba',
                'mode' => 'background-color',
                'options' => array(
                    'show_input' => true,
                    'show_initial' => true,
                    'show_alpha' => true,
                    'show_palette' => true,
                    'show_palette_only' => false,
                    'show_selection_palette' => true,
                    'max_palette_size' => 10,
                    'allow_empty' => true,
                    'clickout_fires_change' => false,
                    'show_buttons' => true,
                    'use_extended_classes' => true,
                    'palette' => null,
                ),
                'output' => array( '.navbar .navbar-nav ul.dropdown-menu > li' ),
                'required' => array(
                    array( 'header_visibility', '=', '1' ),
                )
            ),
            array(
                'title' => esc_html__('Border', 'digilab'),
                'id' => 'dropdown_nav_border',
                'type' => 'border',
                'all' => false,
                'output' => array( '.navbar .navbar-nav ul.dropdown-menu > li' ),
                'default' => array(
                    'border-color' => '',
                    'border-style' => '',
                    'border-top' => '',
                    'border-right' => '',
                    'border-bottom' => '',
                    'border-left'=> ''
                )
            ),
            array(
                'title' => esc_html__( 'Border Radius ( px )', 'digilab' ),
                'id' => 'dropdown_nav_border_rad',
                'type' => 'slider',
                'default' => 8,
                'min' => 0,
                'step' => 1,
                'max' => 100,
                'display_value' => 'text',
                'required' => array( 'header_visibility', '=', '1' ),
            ),
            array(
                'title' => esc_html__( 'Min Width ( rem )', 'digilab' ),
                'id' => 'dropdown_nav_minwidth',
                'type' => 'slider',
                'default' => 12,
                'min' => 0,
                'step' => 1,
                'max' => 100,
                'display_value' => 'text',
                'required' => array( 'header_visibility', '=', '1' ),
            ),
            array(
                'title' => esc_html__( 'Menu Item Font and Color', 'digilab' ),
                'subtitle' => esc_html__('Choose Size and Style for primary menu', 'digilab' ),
                'id' => 'dropdown_nav_a_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '.navbar .navbar-nav ul.dropdown-menu > li a' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'header_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Menu Item Color ( Hover and Active )', 'digilab' ),
                'desc' => esc_html__( 'Set your own hover color for the navigation menu item.', 'digilab' ),
                'id' => 'dropdown_nav_hvr_a',
                'type' => 'color',
                'output' => array( '.navbar .navbar-menu > li .sub-menu li:hover > a, .navbar .navbar-menu > li .sub-menu li.active > a' ),
                'required' => array( 'header_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Menu Item Background Color', 'digilab' ),
                'id' => 'dropdown_nav_a_bg',
                'type' => 'color_rgba',
                'mode' => 'background-color',
                'options' => array(
                    'show_input' => true,
                    'show_initial' => true,
                    'show_alpha' => true,
                    'show_palette' => true,
                    'show_palette_only' => false,
                    'show_selection_palette' => true,
                    'max_palette_size' => 10,
                    'allow_empty' => true,
                    'clickout_fires_change' => false,
                    'show_buttons' => true,
                    'use_extended_classes' => true,
                    'palette' => null,
                ),
                'output' => array( '.navbar .navbar-menu > li .sub-menu li' ),
                'required' => array(
                    array( 'header_visibility', '=', '1' ),
                )
            ),
            array(
                'title' => esc_html__( 'Menu Item Background Color ( Hover and Active )', 'digilab' ),
                'id' => 'dropdown_nav_a_hvrbg',
                'type' => 'color_rgba',
                'mode' => 'background-color',
                'options' => array(
                    'show_input' => true,
                    'show_initial' => true,
                    'show_alpha' => true,
                    'show_palette' => true,
                    'show_palette_only' => false,
                    'show_selection_palette' => true,
                    'max_palette_size' => 10,
                    'allow_empty' => true,
                    'clickout_fires_change' => false,
                    'show_buttons' => true,
                    'use_extended_classes' => true,
                    'palette' => null,
                ),
                'output' => array( '.navbar .navbar-menu > li .sub-menu li:hover, .navbar .navbar-menu > li .sub-menu li.active' ),
                'required' => array(
                    array( 'header_visibility', '=', '1' ),
                )
            ),
    )));
    //HEADER MENU
    Redux::setSection($digilab_pre, array(
        'title' => esc_html__( 'Sticky Navigation', 'digilab' ),
        'id' => 'headerstickynavsubsection',
        'subsection' => true,
        'icon' => 'el el-brush',
        'fields' => array(
            array(
                'title' => esc_html__( 'Sticky Header Display', 'digilab' ),
                'subtitle' => esc_html__( 'You can enable or disable the sticky site navigation.', 'digilab' ),
                'id' => 'sticky_header_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Sticky Header Display ( for Widget )', 'digilab' ),
                'subtitle' => esc_html__( 'You can enable or disable the sticky option for the digilab Elementor Header Widget or you can enable sticky option from the widget settings.', 'digilab' ),
                'id' => 'widget_sticky_header_visibility',
                'type' => 'switch',
                'default' => 0,
                'on' => 'On',
                'off' => 'Off',
                'required' => array(
                    array( 'header_visibility', '=', '1' ),
                    array( 'sticky_header_visibility', '=', '1' )
                )
            ),
            array(
                'title' => esc_html__( 'Sticky Header Background Color', 'digilab' ),
                'id' => 'sticky_nav_bg',
                'type' => 'color_rgba',
                'mode' => 'background-color',
                'options' => array(
                    'show_input' => true,
                    'show_initial' => true,
                    'show_alpha' => true,
                    'show_palette' => true,
                    'show_palette_only' => false,
                    'show_selection_palette' => true,
                    'max_palette_size' => 10,
                    'allow_empty' => true,
                    'clickout_fires_change' => false,
                    'show_buttons' => true,
                    'use_extended_classes' => true,
                    'palette' => null,
                ),
                'output' => array( 'nav.navbar.bootsnav.sticked' ),
                'required' => array(
                    array( 'header_visibility', '=', '1' ),
                    array( 'sticky_header_visibility', '=', '1' )
                )
            ),
            array(
                'title' => esc_html__( 'Menu Item Font and Color', 'digilab' ),
                'subtitle' => esc_html__('Choose Size and Style for primary menu', 'digilab' ),
                'id' => 'sticky_nav_a_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( 'nav.navbar.bootsnav.sticked #navbar-menu ul > li > a' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array(
                    array( 'header_visibility', '=', '1' ),
                    array( 'sticky_header_visibility', '=', '1' )
                )
            ),
            array(
                'title' => esc_html__( 'Menu Item Color ( Hover and Active )', 'digilab' ),
                'desc' => esc_html__( 'Set your own hover color for the navigation menu item.', 'digilab' ),
                'id' => 'sticky_nav_hvr_a',
                'type' => 'color',
                'output' => array( '.header.sticky-header.sticked .navbar .navbar-menu > li > a:hover, .widget-sticky-header.sticked .header .navbar .navbar-menu > li > a:hover, .widget-sticky-header-enabled.sticked .header .navbar .navbar-menu > li > a:hover,nav.navbar.bootsnav.sticked #navbar-menu ul > li > a:hover' ),
                'required' => array(
                    array( 'header_visibility', '=', '1' ),
                    array( 'sticky_header_visibility', '=', '1' )
                )
            ),
           array(
                'title' => esc_html__( 'Search Icon Color', 'digilab' ),
                'desc' => esc_html__( 'Set your own color for the navigation menu search icon.', 'digilab' ),
                'id' => 'sticky_nav_search_icon',
                'type' => 'color',
                'output' => array( '.sticked .attr-nav > ul > li.search > a' ),
                'required' => array(
                    array( 'header_visibility', '=', '1' ),
                    array( 'sticky_header_visibility', '=', '1' )
                )
            ),
    )));

    /*************************************************
    ## SIDEBARS SECTION
    *************************************************/
    Redux::setSection($digilab_pre, array(
        'title' => esc_html__( 'Sidebars', 'digilab' ),
        'id' => 'sidebarssection',
        'customizer_width' => '400px',
        'icon' => 'fa fa-th-list',
    ));
    // SIDEBAR LAYOUT SUBSECTION
    Redux::setSection($digilab_pre, array(
        'title' => esc_html__( 'Sidebars Layout', 'digilab' ),
        'desc' => esc_html__( 'You can change the below default layout type.', 'digilab' ),
        'id' => 'sidebarslayoutsection',
        'subsection' => true,
        'icon' => 'el el-cogs',
        'fields' => array(
            array(
                'title' => esc_html__( 'Blog Page Layout', 'digilab' ),
                'subtitle' => esc_html__( 'Choose the blog index page layout.', 'digilab' ),
                'id' => 'index_layout',
                'type' => 'image_select',
                'options' => array(
                    'left-sidebar' => array(
                        'alt' => 'Left Sidebar',
                        'img' => get_template_directory_uri() . '/inc/core/theme-options/img/2cl.png'
                    ),
                    'full-width' => array(
                        'alt' => 'Full Width',
                        'img' => get_template_directory_uri() . '/inc/core/theme-options/img/1col.png'
                    ),
                    'right-sidebar' => array(
                        'alt' => 'Right Sidebar',
                        'img' => get_template_directory_uri() . '/inc/core/theme-options/img/2cr.png'
                    )
                ),
                'default' => 'right-sidebar'
            ),
            array(
                'title' => esc_html__( 'Single Page Layout', 'digilab' ),
                'subtitle' => esc_html__( 'Choose the single post page layout.', 'digilab' ),
                'id' => 'single_layout',
                'type' => 'image_select',
                'options' => array(
                    'left-sidebar' => array(
                        'alt' => 'Left Sidebar',
                        'img' => get_template_directory_uri() . '/inc/core/theme-options/img/2cl.png'
                    ),
                    'full-width' => array(
                        'alt' => 'Full Width',
                        'img' => get_template_directory_uri() . '/inc/core/theme-options/img/1col.png'
                    ),
                    'right-sidebar' => array(
                        'alt' => 'Right Sidebar',
                        'img' => get_template_directory_uri() . '/inc/core/theme-options/img/2cr.png'
                    )
                ),
                'default' => 'full-width'
            ),
            array(
                'title' => esc_html__( 'Search Page Layout', 'digilab' ),
                'subtitle' => esc_html__( 'Choose the search page layout.', 'digilab' ),
                'id' => 'search_layout',
                'type' => 'image_select',
                'options' => array(
                    'left-sidebar' => array(
                        'alt' => 'Left Sidebar',
                        'img' => get_template_directory_uri() . '/inc/core/theme-options/img/2cl.png'
                    ),
                    'full-width' => array(
                        'alt' => 'Full Width',
                        'img' => get_template_directory_uri() . '/inc/core/theme-options/img/1col.png'
                    ),
                    'right-sidebar' => array(
                        'alt' => 'Right Sidebar',
                        'img' => get_template_directory_uri() . '/inc/core/theme-options/img/2cr.png'
                    )
                ),
                'default' => 'full-width'
            ),
            array(
                'title' => esc_html__( 'Archive Page Layout', 'digilab' ),
                'subtitle' => esc_html__( 'Choose the archive page layout.', 'digilab' ),
                'id' => 'archive_layout',
                'type' => 'image_select',
                'options' => array(
                    'left-sidebar' => array(
                        'alt' => 'Left Sidebar',
                        'img' => get_template_directory_uri() . '/inc/core/theme-options/img/2cl.png'
                    ),
                    'full-width' => array(
                        'alt' => 'Full Width',
                        'img' => get_template_directory_uri() . '/inc/core/theme-options/img/1col.png'
                    ),
                    'right-sidebar' => array(
                        'alt' => 'Right Sidebar',
                        'img' => get_template_directory_uri() . '/inc/core/theme-options/img/2cr.png'
                    )
                ),
                'default' => 'full-width'
            )
    )));
    // SIDEBAR COLORS SUBSECTION
    Redux::setSection($digilab_pre, array(
        'title' => esc_html__( 'Sidebar Customize', 'digilab' ),
        'desc' => esc_html__( 'These are main settings for general theme!', 'digilab' ),
        'id' => 'sidebarsgenaralsection',
        'subsection' => true,
        'icon' => 'el el-brush',
        'fields' => array(
            array(
                'title' => esc_html__( 'Sidebar Background', 'digilab' ),
                'id' => 'sdbr_bg',
                'type' => 'color',
                'mode' => 'background',
                'output' => array( '.tf-sidebar' )
            ),
            array(
                'id' => 'sdbr_brd',
                'type' => 'border',
                'title' => esc_html__( 'Sidebar Border', 'digilab' ),
                'output' => array( '.tf-sidebar' ),
                'all' => false
            ),
            array(
                'title' => esc_html__( 'Sidebar Padding', 'digilab' ),
                'id' => 'sdbr_pad',
                'type' => 'spacing',
                'mode' => 'padding',
                'all' => false,
                'units' => array( 'em', 'px', '%' ),
                'units_extended' => 'true',
                'output' => array( '.tf-sidebar' ),
                'default' => array(
                    'margin-top' => '',
                    'margin-right' => '',
                    'margin-bottom' => '',
                    'margin-left' => ''
                )
            ),
            array(
                'title' => esc_html__( 'Sidebar Margin', 'digilab' ),
                'id' => 'sdbr_mar',
                'type' => 'spacing',
                'mode' => 'margin',
                'all' => false,
                'units' => array( 'em', 'px', '%' ),
                'units_extended' => 'true',
                'output' => array( '.tf-sidebar' ),
                'default' => array(
                    'margin-top' => '',
                    'margin-right' => '',
                    'margin-bottom' => '',
                    'margin-left' => ''
                )
            ),
    )));
    // SIDEBAR WIDGET COLORS SUBSECTION
    Redux::setSection($digilab_pre, array(
        'title' => esc_html__( 'Widget Customize', 'digilab' ),
        'desc' => esc_html__( 'These are main settings for general theme!', 'digilab' ),
        'id' => 'sidebarwidgetsection',
        'subsection' => true,
        'icon' => 'el el-brush',
        'fields' => array(
            array(
                'title' => esc_html__( 'Sidebar Widgets Background Color', 'digilab' ),
                'id' => 'sdbr_w_bg',
                'type' => 'color',
                'mode' => 'background',
                'output' => array( '.tf-sidebar .tf-sidebar-inner-widget' )
            ),
            array(
                'title' => esc_html__( 'Widgets Border', 'digilab' ),
                'id' => 'sdbr_w_brd',
                'type' => 'border',
                'output' => array( '.tf-sidebar .tf-sidebar-inner-widget' ),
                'all' => false
            ),
            array(
                'title' => esc_html__( 'Widget Title Color', 'digilab' ),
                'desc' => esc_html__( 'Set your own colors for the widgets.', 'digilab' ),
                'id' => 'sdbr_wt',
                'type' => 'color',
                'output' => array( '#tf-sidebar .widget-title' )
            ),
            array(
                'title' => esc_html__( 'Widget Title Point Color', 'digilab' ),
                'desc' => esc_html__( 'Set your own colors for the widgets.', 'digilab' ),
                'id' => 'sdbr_wt_point',
                'type' => 'color',
                'mode' => 'background-color',
                'output' => array( '#tf-sidebar .widget-title:before' )
            ),
            array(
                'title' => esc_html__( 'Widget Text Color', 'digilab' ),
                'desc' => esc_html__( 'Set your own colors for the widgets.', 'digilab' ),
                'id' => 'sdbr_wp',
                'type' => 'color',
                'output' => array( '.tf-sidebar .tf-sidebar-inner-widget, .tf-sidebar .tf-sidebar-inner-widget p' )
            ),
            array(
                'title' => esc_html__( 'Widget Link Color', 'digilab' ),
                'desc' => esc_html__( 'Set your own colors for the widgets.', 'digilab' ),
                'id' => 'sdbr_a',
                'type' => 'color',
                'output' => array( '.tf-sidebar .tf-sidebar-inner-widget a' )
            ),
            array(
                'title' => esc_html__( 'Widget Hover Link Color', 'digilab' ),
                'desc' => esc_html__( 'Set your own hover colors for the widgets.', 'digilab' ),
                'id' => 'sdbr_hvr_a',
                'type' => 'color',
                'output' => array( '.tf-sidebar .tf-sidebar-inner-widget a:hover' )
            ),
            array(
                'title' => esc_html__( 'Widget Padding', 'digilab' ),
                'id' => 'sdbr_w_pad',
                'type' => 'spacing',
                'mode' => 'padding',
                'all' => false,
                'units' => array( 'em', 'px', '%' ),
                'units_extended' => 'true',
                'output' => array( '.tf-sidebar .tf-sidebar-inner-widget' ),
                'default' => array(
                    'margin-top' => '',
                    'margin-right' => '',
                    'margin-bottom' => '',
                    'margin-left' => ''
                )
            ),
            array(
                'title' => esc_html__( 'Widget Margin', 'digilab' ),
                'id' => 'sdbr_w_mar',
                'type' => 'spacing',
                'mode' => 'margin',
                'all' => false,
                'units' => array( 'em', 'px', '%' ),
                'units_extended' => 'true',
                'output' => array( '.tf-sidebar .tf-sidebar-inner-widget' ),
                'default' => array(
                    'margin-top' => '',
                    'margin-right' => '',
                    'margin-bottom' => '',
                    'margin-left' => ''
                )
            )
    )));

    /*************************************************
    ## BLOG PAGE SECTION
    *************************************************/
    Redux::setSection($digilab_pre, array(
        'title' => esc_html__( 'Blog Page', 'digilab' ),
        'id' => 'blogsection',
        'icon' => 'el el-home',
    ));
    // BLOG HERO SUBSECTION
    Redux::setSection($digilab_pre, array(
        'title' => esc_html__( 'Blog Hero', 'digilab' ),
        'desc' => esc_html__( 'These are blog index page hero text settings!', 'digilab' ),
        'id' => 'blogherosubsection',
        'subsection' => true,
        'icon' => 'el el-brush',
        'fields' => array(
            array(
                'title' => esc_html__( 'Blog Hero Display', 'digilab' ),
                'subtitle' => esc_html__( 'You can enable or disable the site blog index page hero section with switch option.', 'digilab' ),
                'id' => 'blog_hero_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Blog Hero Background', 'digilab' ),
                'id' => 'blog_hero_bg',
                'type' => 'background',
                'preview' => true,
                'preview_media' => true,
                'output' => array( '.bg-gradient' ),                
                'required' => array( 'blog_hero_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Blog Title', 'digilab' ),
                'subtitle' => esc_html__( 'Add your blog index page title here.', 'digilab' ),
                'id' => 'blog_title',
                'type' => 'text',
                'default' => 'BLOG',
                'required' => array( 'blog_hero_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Blog Title Typography', 'digilab' ),
                'id' => 'blog_title_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#tf-index .breadcrumb-area h1' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'blog_hero_visibility', '=', '1' ),
            ),
            array(
                'title' => esc_html__( 'Blog Site Description', 'digilab' ),
                'subtitle' => esc_html__( 'Add your blog index page site title here.', 'digilab' ),
                'id' => 'blog_site_title',
                'type' => 'textarea',
                'default' => get_bloginfo('name' ),
                'required' => array( 'blog_hero_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Blog Site Description Typography', 'digilab' ),
                'id' => 'blog_site_title_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#tf-index .tf-hero-desc' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'blog_hero_visibility', '=', '1' )
            )
    )));
    // BLOG LAYOUT AND POST COLUMN STYLE
    Redux::setSection($digilab_pre, array(
        'title' => esc_html__( 'Blog Content', 'digilab' ),
        'id' => 'blogcontentsubsection',
        'subsection' => true,
        'icon' => 'el el-brush',
        'fields' => array(
            array(
                'title' => esc_html__( 'Blog page type', 'digilab' ),
                'subtitle' => esc_html__( 'Select blog page layout type.', 'digilab' ),
                'id' => 'index_type',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    '' => esc_html__( 'Select type', 'digilab' ),
                    'default' => esc_html__( 'default', 'digilab' ),
                    'grid' => esc_html__( 'grid', 'digilab' ),
                    'masonry' => esc_html__( 'masonry', 'digilab' ),
                ),
                'default' => 'default'
            ),
            array(
                'title' => esc_html__( 'Blog page container width type', 'digilab' ),
                'subtitle' => esc_html__( 'Select blog page container width type.', 'digilab' ),
                'id' => 'index_container_type',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    '' => esc_html__( 'Select type', 'digilab' ),
                    'boxed' => esc_html__( 'Default Boxed', 'digilab' ),
                    'fluid' => esc_html__( 'Fluid', 'digilab' ),
                ),
                'default' => 'boxed'
            ),
            array(
                'title' => esc_html__( 'Blog page post column width', 'digilab' ),
                'subtitle' => esc_html__( 'Select a column number.', 'digilab' ),
                'id' => 'index_post_column',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    '' => esc_html__( 'Select type', 'digilab' ),
                    'col-lg-6' => esc_html__( '2 column', 'digilab' ),
                    'col-lg-4' => esc_html__( '3 column', 'digilab' ),
                    'col-lg-3' => esc_html__( '4 column', 'digilab' )
                ),
                'default' => 'col-lg-6',
                'required' => array(
                    array( 'index_type', '!=', '' ),
                    array( 'index_type', '!=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Blog Post Title Display', 'digilab' ),
                'subtitle' => esc_html__( 'You can enable or disable the site blog index page post title with switch option.', 'digilab' ),
                'id' => 'post_title_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Blog Post Tags Display', 'digilab' ),
                'subtitle' => esc_html__( 'You can enable or disable the site blog index page post meta with switch option.', 'digilab' ),
                'id' => 'post_tags_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Blog Post Author Display', 'digilab' ),
                'subtitle' => esc_html__( 'You can enable or disable the site blog index page post author with switch option.', 'digilab' ),
                'id' => 'post_author_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Blog Post Date Display', 'digilab' ),
                'subtitle' => esc_html__( 'You can enable or disable the site blog index page post date with switch option.', 'digilab' ),
                'id' => 'post_date_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
                'required' => array( 'post_meta', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Blog Post Excerpt Display', 'digilab' ),
                'subtitle' => esc_html__( 'You can enable or disable the site blog index page post meta with switch option.', 'digilab' ),
                'id' => 'post_excerpt_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Post Excerpt Size (max word count)', 'digilab' ),
                'subtitle' => esc_html__( 'You can control blog post excerpt size with this option.', 'digilab' ),
                'id' => 'excerptsz',
                'type' => 'slider',
                'default' => 40,
                'min' => 0,
                'step' => 1,
                'max' => 100,
                'display_value' => 'text',
                'required' => array( 'post_excerpt_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Blog Post Button Display', 'digilab' ),
                'subtitle' => esc_html__( 'You can enable or disable the site blog index page post read more button wityh switch option.', 'digilab' ),
                'id' => 'post_button_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Blog Post Button Title', 'digilab' ),
                'subtitle' => esc_html__( 'Add your blog post read more button title here.', 'digilab' ),
                'id' => 'post_button_title',
                'type' => 'text',
                'default' => esc_html__( 'Read More', 'digilab' ),
                'required' => array( 'post_button_visibility', '=', '1' )
            )
    )));
    // BLOG LAYOUT AND POST COLUMN STYLE
    Redux::setSection($digilab_pre, array(
        'title' => esc_html__( 'Blog Before/After Content', 'digilab' ),
        'id' => 'blogbeforeaftercontentsubsection',
        'subsection' => true,
        'icon' => 'el el-brush',
        'fields' => array(
            array(
                'title' => esc_html__( 'Use Elementor Templates Before Content', 'digilab' ),
                'id' => 'use_blog_before_content_templates',
                'type' => 'switch',
                'default' => 0,
                'customizer' => true,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Before Content Elementor Templates', 'digilab' ),
                'subtitle' => esc_html__( 'You can use this option to add any elementor template before the blog content. Select a template from elementor templates.', 'digilab' ),
                'id' => 'blog_before_content_templates',
                'type' => 'select',
                'customizer' => true,
                'options' => digilab_get_elementorTemplates(),
                'required' => array( 'use_blog_before_content_templates', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Use Elementor Templates After Content', 'digilab' ),
                'id' => 'use_blog_after_content_templates',
                'type' => 'switch',
                'default' => 0,
                'customizer' => true,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'After Content Elementor Templates', 'digilab' ),
                'subtitle' => esc_html__( 'You can use this option to add any elementor template after the blog content. Select a template from elementor templates.', 'digilab' ),
                'id' => 'blog_after_content_templates',
                'type' => 'select',
                'customizer' => true,
                'options' => digilab_get_elementorTemplates(),
                'required' => array( 'use_blog_after_content_templates', '=', '1' )
            )
    )));
    /*************************************************
    ## SINGLE PAGE SECTION
    *************************************************/
    Redux::setSection($digilab_pre, array(
        'title' => esc_html__( 'Single Page', 'digilab' ),
        'id' => 'singlesection',
        'icon' => 'el el-home-alt',
    ));
    // SINGLE HERO SUBSECTION
    Redux::setSection($digilab_pre, array(
        'title' => esc_html__( 'Single Hero', 'digilab' ),
        'desc' => esc_html__( 'These are single page hero section settings!', 'digilab' ),
        'id' => 'singleherosubsection',
        'subsection' => true,
        'icon' => 'el el-brush',
        'fields' => array(
            array(
                'title' => esc_html__( 'Single Hero display', 'digilab' ),
                'subtitle' => esc_html__( 'You can enable or disable the site single page hero section with switch option.', 'digilab' ),
                'id' => 'single_hero_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
            ),
            array(
                'title' => esc_html__( 'Single Hero Background', 'digilab' ),
                'id' => 'single_hero_bg',
                'type' => 'background',
                'preview' => true,
                'preview_media' => true,
                'output' => array( '#tf-single .bg-pattern::before' ),
                'required' => array( 'single_hero_visibility', '=', '1' ),
            ),
            array(
                'title' => esc_html__( 'Single Title Typography', 'digilab' ),
                'id' => 'single_title_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#tf-single .tf-hero-title' ),
                'units' => 'px',
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'single_hero_visibility', '=', '1' ),
            ),
            array(
                'title' => esc_html__( 'Single Site Title', 'digilab' ),
                'subtitle' => esc_html__( 'Add your single page site title here.', 'digilab' ),
                'id' => 'single_site_title',
                'type' => 'textarea',
                'default' => get_bloginfo('name' ),
                'required' => array( 'single_hero_visibility', '=', '1' ),
            ),
            array(
                'title' => esc_html__( 'Single Site Title Typography', 'digilab' ),
                'id' => 'single_site_title_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#tf-single .tf-hero-subtitle' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'single_hero_visibility', '=', '1' ),
            )
    )));
    // SINGLE CONTENT SUBSECTION
    Redux::setSection($digilab_pre, array(
        'title' => esc_html__( 'Single Content', 'digilab' ),
        'id' => 'singlecontentsubsection',
        'subsection' => true,
        'icon' => 'el el-brush',
        'fields' => array(
            array(
                'title' => esc_html__( 'Single Post Tags Display', 'digilab' ),
                'subtitle' => esc_html__( 'You can enable or disable the site single page post meta tags with switch option.', 'digilab' ),
                'id' => 'single_postmeta_tags_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Single Post Authorbox', 'digilab' ),
                'subtitle' => esc_html__( 'You can enable or disable the site single page post authorbox with switch option.', 'digilab' ),
                'id' => 'single_post_author_box_visibility',
                'type' => 'switch',
                'default' => 0,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Single Post Pagination Display', 'digilab' ),
                'subtitle' => esc_html__( 'You can enable or disable the site single page post next and prev pagination with switch option.', 'digilab' ),
                'id' => 'single_navigation_visibility',
                'type' => 'switch',
                'default' => 0,
                'on' => 'On',
                'off' => 'Off'
            ),
    )));
    // SINGLE CONTENT SUBSECTION
    Redux::setSection($digilab_pre, array(
        'title' => esc_html__( 'Single Related Posts', 'digilab' ),
        'id' => 'singlerelatedsubsection',
        'subsection' => true,
        'icon' => 'el el-brush',
        'fields' => array(
            array(
                'title' => esc_html__( 'Single Related Post Display', 'digilab' ),
                'subtitle' => esc_html__( 'You can enable or disable the site single page related post with switch option.', 'digilab' ),
                'id' => 'single_related_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Related Type', 'digilab' ),
                'id' => 'related_type',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    'grid' => esc_html__( 'Grid', 'digilab' ),
                    'slider' => esc_html__( 'Carousel Slider', 'digilab' ),
                ),
                'default' => 'grid',
                'required' => array( 'single_related_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Container Type', 'digilab' ),
                'id' => 'container_type',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    'container' => esc_html__( 'Default', 'digilab' ),
                    'container-fluid' => esc_html__( 'Container-fluid', 'digilab' ),
                    'container-off' => esc_html__( 'Container-off ( no-padding )', 'digilab' ),
                ),
                'default' => 'container',
                'required' => array( 'single_related_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Column Width', 'digilab' ),
                'id' => 'column_width',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    '6' => esc_html__( '2 Column', 'digilab' ),
                    '4' => esc_html__( '3 Column', 'digilab' ),
                    '3' => esc_html__( '4 Column', 'digilab' ),
                ),
                'default' => '4',
                'required' => array(
                    array( 'single_related_visibility', '=', '1' ),
                    array( 'related_type', '!=', 'slider' ),
                    array( 'container_type', '!=', 'container' ),
                )
            ),
            array(
                'title' => esc_html__( 'Show Items', 'digilab' ),
                'id' => 'show_items',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    '2' => esc_html__( '2 Items', 'digilab' ),
                    '3' => esc_html__( '3 Items', 'digilab' ),
                    '4' => esc_html__( '4 Items', 'digilab' ),
                    '5' => esc_html__( '5 Items', 'digilab' ),
                    '6' => esc_html__( '6 Items', 'digilab' ),
                ),
                'default' => '4',
                'required' => array(
                    array( 'single_related_visibility', '=', '1' ),
                    array( 'related_type', '!=', 'grid' )
                )
            ),
            array(
                'title' => esc_html__( 'Single Related Post Count', 'digilab' ),
                'subtitle' => esc_html__( 'You can control related post count with this option.', 'digilab' ),
                'id' => 'related_perpage',
                'type' => 'slider',
                'default' => 3,
                'min' => 1,
                'step' => 1,
                'max' => 24,
                'display_value' => 'text',
                'required' => array( 'single_related_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Related Section Title', 'digilab' ),
                'subtitle' => esc_html__( 'Add your single page related post section title here.', 'digilab' ),
                'id' => 'related_title',
                'type' => 'text',
                'default' => esc_html__( 'You May Also Like', 'digilab' ),
                'required' => array( 'single_related_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Title Tag', 'digilab' ),
                'id' => 'related_title_tag',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    'h1' => esc_html__( 'H1', 'digilab' ),
                    'h2' => esc_html__( 'H2', 'digilab' ),
                    'h3' => esc_html__( 'H3', 'digilab' ),
                    'h4' => esc_html__( 'H4', 'digilab' ),
                    'h5' => esc_html__( 'H5', 'digilab' ),
                    'h6' => esc_html__( 'H6', 'digilab' ),
                    'div' => esc_html__( 'div', 'digilab' ),
                    'p' => esc_html__( 'p', 'digilab' ),
                    'span' => esc_html__( 'span', 'digilab' ),
                ),
                'default' => 'h2',
                'required' => array( 'single_related_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Title Typography', 'digilab' ),
                'id' => 'single_site_title_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '.section-related .section-title' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'single_related_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Post Excerpt Display', 'digilab' ),
                'subtitle' => esc_html__( 'You can enable or disable the site single page related post excerpt with switch option.', 'digilab' ),
                'id' => 'single_related_excerpt_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
    )));

    /*************************************************
    ## ARCHIVE PAGE SECTION
    *************************************************/
    Redux::setSection($digilab_pre, array(
        'title' => esc_html__( 'Archive Page', 'digilab' ),
        'id' => 'archivesection',
        'icon' => 'el el-folder-open',
    ));
    // ARCHIVE PAGE SECTION
    Redux::setSection($digilab_pre, array(
        'title' => esc_html__( 'Archive Hero', 'digilab' ),
        'desc' => esc_html__( 'These are archive page hero settings!', 'digilab' ),
        'id' => 'archiveherosubsection',
        'subsection' => true,
        'icon' => 'el el-brush',
        'fields' => array(
            array(
                'title' => esc_html__( 'Archive Hero display', 'digilab' ),
                'subtitle' => esc_html__( 'You can enable or disable the site archive page hero section with switch option.', 'digilab' ),
                'id' => 'archive_hero_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
            ),
            array(
                'title' => esc_html__( 'Archive Hero Background', 'digilab' ),
                'id' => 'archive_hero_bg',
                'type' => 'background',
                'preview' => true,
                'preview_media' => true,
                'output' => array( '#tf-archive .bg-pattern::before' ),
                'required' => array( 'archive_hero_visibility', '=', '1' ),
            ),
            array(
                'title' => esc_html__( 'Custom Archive Title', 'digilab' ),
                'subtitle' => esc_html__( 'Add your custom archive page title here.', 'digilab' ),
                'id' => 'archive_title',
                'type' => 'text',
                'default' => esc_html__( 'ARCHIVE', 'digilab' ),
                'required' => array( 'archive_hero_visibility', '=', '1' ),
            ),
            array(
                'title' => esc_html__( 'Archive Title Typography', 'digilab' ),
                'id' => 'archive_title_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#tf-archive .tf-hero-title' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'archive_hero_visibility', '=', '1' ),
            ),
            array(
                'title' => esc_html__( 'Archive Site Title', 'digilab' ),
                'subtitle' => esc_html__( 'Add your archive page site title here.', 'digilab' ),
                'id' => 'archive_site_title',
                'type' => 'textarea',
                'default' => get_bloginfo('name' ),
                'required' => array( 'archive_hero_visibility', '=', '1' ),
            ),
            array(
                'title' => esc_html__( 'Archive Site Title Typography', 'digilab' ),
                'id' => 'archive_site_title_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#tf-archive .tf-hero-subtitle' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'archive_hero_visibility', '=', '1' ),
            )
    )));
    /*************************************************
    ## 404 PAGE SECTION
    *************************************************/
    Redux::setSection($digilab_pre, array(
        'title' => esc_html__( '404 Page', 'digilab' ),
        'id' => 'errorsection',
        'icon' => 'el el-error',
        'fields' => array(
            array(
                'title' => esc_html__( 'Error Page Type', 'digilab' ),
                'subtitle' => esc_html__( 'Select your footer type.', 'digilab' ),
                'id' => 'error_type',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    'default' => esc_html__( 'Default Error Page', 'digilab' ),
                    'elementor' => esc_html__( 'Elementor Templates', 'digilab' ),
                ),
                'default' => 'default',
            ),
            array(
                'title' => esc_html__( 'Elementor Templates', 'digilab' ),
                'subtitle' => esc_html__( 'Select a template from elementor templates.', 'digilab' ),
                'id' => 'error_elementor_templates',
                'type' => 'select',
                'customizer' => true,
                'options' => digilab_get_elementorTemplates(),
                'required' => array( 'error_type', '=', 'elementor' )
            ),
            array(
                'title' => esc_html__( 'Page Image Display', 'digilab' ),
                'subtitle' => esc_html__( 'You can enable or disable the site 404 page content title with switch option.', 'digilab' ),
                'id' => 'image_404_visibility',
                'type' => 'switch',
                'default' => 0,
                'on' => 'On',
                'off' => 'Off',
                'required' => array( 'error_type', '=', 'default' )
            ),
            array(
                'title' => esc_html__( 'Page image', 'digilab' ),
                'subtitle' => esc_html__( 'Upload your Logo. If left blank theme will use site default image.', 'digilab' ),
                'id' => '404_image',
                'type' => 'media',
                'url' => true,
                'customizer' => true,
                'required' => array(
                    array( 'image_404_visibility', '=', '1' ),
                    array( 'error_type', '=', 'default' )
                )
            ),            
            array(
                'title' => esc_html__( 'Content Title Display', 'digilab' ),
                'subtitle' => esc_html__( 'You can enable or disable the site 404 page content title with switch option.', 'digilab' ),
                'id' => 'error_content_title_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
                'required' => array( 'error_type', '=', 'default' )
            ),
            array(
                'title' => esc_html__( 'Content Title', 'digilab' ),
                'subtitle' => esc_html__( 'Add your 404 page content title here.', 'digilab' ),
                'id' => 'error_content_title',
                'type' => 'textarea',
                'default' => '<h2 class="fortyfor">404</h2>',
                'required' => array(
                    array( 'error_content_title_visibility', '=', '1' ),
                    array( 'error_type', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Title Typography', 'digilab' ),
                'id' => 'error_content_title_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#tf-404 .error-box h2' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array(
                    array( 'error_content_title_visibility', '=', '1' ),
                    array( 'error_type', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Subtitle Title Display', 'digilab' ),
                'subtitle' => esc_html__( 'You can enable or disable the site 404 page content title with switch option.', 'digilab' ),
                'id' => 'error_content_subtitle_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
                'required' => array( 'error_type', '=', 'default' )
            ),
            array(
                'title' => esc_html__( 'Content Subtitle', 'digilab' ),
                'subtitle' => esc_html__( 'Add your 404 page content subtitle here.', 'digilab' ),
                'id' => 'error_content_subtitle',
                'type' => 'textarea',
                'default' => '<p>Page not found</p>',
                'required' => array(
                    array( 'error_content_subtitle_visibility', '=', '1' ),
                    array( 'error_type', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Subtitle Typography', 'digilab' ),
                'id' => 'error_content_subtitle_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#tf-404 .content h6' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array(
                    array( 'error_content_subtitle_visibility', '=', '1' ),
                    array( 'error_type', '=', 'default' )
                )
            ),            
            array(
                'title' => esc_html__( 'Button Display', 'digilab' ),
                'subtitle' => esc_html__( 'You can enable or disable the site 404 page content back to home button with switch option.', 'digilab' ),
                'id' => 'error_content_btn_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
                'required' => array( 'error_type', '=', 'default' )
            ),
            array(
                'title' => esc_html__( 'Button Title', 'digilab' ),
                'subtitle' => esc_html__( 'Add your 404 page content back to home button title here.', 'digilab' ),
                'id' => 'error_content_btn_title',
                'type' => 'text',
                'default' => 'Go to home page',
                'required' => array(
                    array( 'error_content_btn_visibility', '=', '1' ),
                    array( 'error_type', '=', 'default' )
                )
            ),
    )));
    /*************************************************
    ## SEARCH PAGE SECTION
    *************************************************/
    Redux::setSection($digilab_pre, array(
        'title' => esc_html__( 'Search Page', 'digilab' ),
        'id' => 'searchsection',
        'icon' => 'el el-search',
    ));
    //SEARCH PAGE SECTION
    Redux::setSection($digilab_pre, array(
        'title' => esc_html__( 'Search Hero', 'digilab' ),
        'id' => 'searchherosubsection',
        'desc' => esc_html__( 'These are main settings for general theme!', 'digilab' ),
        'icon' => 'el el-search',
        'subsection' => true,
        'fields' => array(
            array(
                'title' => esc_html__( 'Search Hero display', 'digilab' ),
                'subtitle' => esc_html__( 'You can enable or disable the site search page hero section with switch option.', 'digilab' ),
                'id' => 'search_hero_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Search Hero Background', 'digilab' ),
                'id' =>'search_hero_bg',
                'type' => 'background',
                'output' => array( '#tf-search .bg-pattern::before' ),
                'required' => array( 'search_hero_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Search Title', 'digilab' ),
                'subtitle' => esc_html__( 'Add your search page title here.', 'digilab' ),
                'id' => 'search_title',
                'type' => 'text',
                'default' => esc_html__( 'Search results for :', 'digilab' ),
                'required' => array( 'search_hero_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Search Title Typography', 'digilab' ),
                'id' => 'search_title_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#tf-search .breadcrumb-area h1' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'search_hero_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Search Site Title', 'digilab' ),
                'subtitle' => esc_html__( 'Add your search page site title here.', 'digilab' ),
                'id' => 'search_site_title',
                'type' => 'textarea',
                'default' => get_bloginfo('name' ),
                'required' => array( 'search_hero_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Search Site Title Typography', 'digilab' ),
                'id' => 'search_site_title_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#tf-search .tf-hero-subtitle' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'search_hero_visibility', '=', '1' )
            )
    )));
    //FOOTER SECTION
    Redux::setSection($digilab_pre, array(
        'title' => esc_html__( 'Footer', 'digilab' ),
        'desc' => esc_html__( 'These are main settings for general theme!', 'digilab' ),
        'id' => 'footersection',
        'icon' => 'el el-photo',
        'fields' => array(
            array(
                'title' => esc_html__( 'Footer Section Display', 'digilab' ),
                'subtitle' => esc_html__( 'You can enable or disable the site footer copyright and footer widget area on the site with switch option.', 'digilab' ),
                'id' => 'footer_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Footer Type', 'digilab' ),
                'subtitle' => esc_html__( 'Select your footer type.', 'digilab' ),
                'id' => 'footer_type',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    'default' => esc_html__( 'Default 1 Site Footer', 'digilab' ),
                    'shape' => esc_html__( 'Default 2 Site Footer', 'digilab' ),
                    'elementor' => esc_html__( 'Elementor Templates', 'digilab' ),
                ),
                'default' => 'default',
                'required' => array( 'footer_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__( 'Elementor Templates', 'digilab' ),
                'subtitle' => esc_html__( 'Select a template from elementor templates.', 'digilab' ),
                'id' => 'footer_elementor_templates',
                'type' => 'select',
                'customizer' => true,
                'options' => digilab_get_elementorTemplates(),
                'required' => array(
                    array( 'footer_visibility', '=', '1' ),
                    array( 'footer_type', '=', 'elementor' )
                )
            ),
            array(
                'title' => esc_html__( 'Use this template for Elementor Canvas Template?', 'digilab' ),
                'subtitle' => esc_html__( 'You can enable or disable the site custom footer template for the elementor canvas page template.', 'digilab' ),
                'id' => 'canvas_template_footer_visibility',
                'type' => 'switch',
                'default' => 0,
                'on' => 'On',
                'off' => 'Off',
                'required' => array(
                    array( 'footer_visibility', '=', '1' ),
                    array( 'footer_type', '=', 'elementor' )
                )
            ),
            array(
                'title' => esc_html__( 'Copyright Display', 'digilab' ),
                'subtitle' => esc_html__( 'You can enable or disable the site footer left section on the site with switch option.', 'digilab' ),
                'id' => 'footer_copyright_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
                'required' => array(
                    array( 'footer_visibility', '=', '1' ),
                    array( 'footer_type', 'not_empty_and', 'default' && 'shape' ),
                )
            ),
            array(
                'title' => esc_html__( 'Copyright Text', 'digilab' ),
                'subtitle' => esc_html__( 'HTML allowed (wp_kses)', 'digilab' ),
                'desc' => esc_html__( 'Enter your site copyright left text here.', 'digilab' ),
                'id' => 'footer_copyright',
                'type' => 'textarea',
                'validate' => 'html',
                'default' => sprintf( '<p>&copy; %1$s, <a class="theme" href="%2$s">%3$s</a> Theme. %4$s <a href="https://themefora.com/contact/">%5$s</a></p>',
                    date( 'Y' ),
                    esc_url( home_url( '/' ) ),
                    get_bloginfo( 'name' ),
                    esc_html__( 'Made with passion by', 'digilab' ),
                    esc_html__( 'Themefora.', 'digilab' )
                ),
                'required' => array(
                    array( 'footer_visibility', '=', '1' ),
                    array( 'footer_copyright_visibility', '=', '1' ),
                    array( 'footer_type', 'not_empty_and', 'default' && 'shape' ),
                )
            ),
            array(
                'title' => esc_html__( 'Copyright Links Display', 'digilab' ),
                'subtitle' => esc_html__( 'You can enable or disable the site footer right section on the site with switch option.', 'digilab' ),
                'id' => 'footer_links_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
                'required' => array(
                    array( 'footer_visibility', '=', '1' ),
                    array( 'footer_type', 'not_empty_and', 'default' && 'shape' ),
                )
            ),
            //information on-off
            array(
                'id' =>'info_f0',
                'type' => 'info',
                'style' => 'success',
                'title' => esc_html__( 'Success!', 'digilab' ),
                'icon' => 'el el-info-circle',
                'customizer' => false,
                'desc' => sprintf(esc_html__( '%s section is disabled on the site.Please activate to view subsection options.', 'digilab' ), '<b>Site Main Footer</b>' ),
                'required' => array( 'footer_visibility', '=', '0' )
            )
    )));
    //FOOTER SECTION
    Redux::setSection($digilab_pre, array(
        'title' => esc_html__( 'Footer Style', 'digilab' ),
        'desc' => esc_html__( 'These are main settings for general theme!', 'digilab' ),
        'id' => 'footerstylesubsection',
        'icon' => 'el el-photo',
        'subsection' => true,
        'fields' => array(
            array(
                'id' =>'footer_color_customize',
                'type' => 'info',
                'icon' => 'el el-brush',
                'customizer' => false,
                'desc' => sprintf(esc_html__( '%s', 'digilab' ), '<h2>Footer Color Customize</h2>' ),
                'required' => array(
                    array( 'footer_visibility', '=', '1' ),
                    array( 'footer_type', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Footer Padding', 'digilab' ),
                'subtitle' => esc_html__( 'You can set the top spacing of the site main footer.', 'digilab' ),
                'id' => 'footer_pad',
                'type' => 'spacing',
                'output' => array('#tf-footer .footer-body' ),
                'mode' => 'padding',
                'units' => array('em', 'px' ),
                'units_extended' => 'false',
                'default' => array(
                    'padding-top' => '',
                    'padding-right' => '',
                    'padding-bottom' => '',
                    'padding-left' => '',
                    'units' => 'px'
                ),
                'required' => array(
                    array( 'footer_visibility', '=', '1' ),
                    array( 'footer_type', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Footer Background Color', 'digilab' ),
                'desc' => esc_html__( 'Set your own colors for the footer.', 'digilab' ),
                'id' => 'footer_bg_clr',
                'type' => 'color',
                'mode' => 'background-color',
                'output' => array( '#tf-footer .footer-body' ),
                'required' => array(
                    array( 'footer_visibility', '=', '1' ),
                    array( 'footer_type', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Copyright Text Color', 'digilab' ),
                'desc' => esc_html__( 'Set your own colors for the copyright.', 'digilab' ),
                'id' => 'footer_copy_clr',
                'type' => 'color',
                'transparent' => false,
                'output' => array( '#tf-footer, #tf-footer p' ),
                'required' => array(
                    array( 'footer_visibility', '=', '1' ),
                    array( 'footer_type', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Link Color', 'digilab' ),
                'desc' => esc_html__( 'Set your own colors for the copyright.', 'digilab' ),
                'id' => 'footer_link_clr',
                'type' => 'color',
                'transparent' => false,
                'output' => array( '#tf-footer a' ),
                'required' => array(
                    array( 'footer_visibility', '=', '1' ),
                    array( 'footer_type', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__( 'Link Color ( Hover )', 'digilab' ),
                'desc' => esc_html__( 'Set your own colors for the copyright.', 'digilab' ),
                'id' => 'footer_link_hvr_clr',
                'type' => 'color',
                'transparent' => false,
                'output' => array( '#tf-footer a:hover' ),
                'required' => array(
                    array( 'footer_visibility', '=', '1' ),
                    array( 'footer_type', '=', 'default' )
                )
            ),
            //information on-off
            array(
                'id' =>'info_fc0',
                'type' => 'info',
                'style' => 'success',
                'title' => esc_html__( 'Success!', 'digilab' ),
                'icon' => 'el el-info-circle',
                'customizer' => false,
                'desc' => sprintf(esc_html__( '%s section is disabled on the site.Please activate to view subsection options.', 'digilab' ), '<b>Site Main Footer</b>' ),
                'required' => array( 'footer_visibility', '=', '0' )
            )
    )));
    Redux::setSection($digilab_pre, array(
        'id' => 'inportexport_settings',
        'title' => esc_html__( 'Import / Export', 'digilab' ),
        'desc' => esc_html__( 'Import and Export your Theme Options from text or URL.', 'digilab' ),
        'icon' => 'fa fa-download',
        'fields' => array(
            array(
                'id' => 'opt-import-export',
                'type' => 'import_export',
                'title' => '',
                'customizer' => false,
                'subtitle' => '',
                'full_width' => true
            )
    )));
    Redux::setSection($digilab_pre, array(
    'id' => 'nt_support_settings',
    'title' => esc_html__( 'Support', 'digilab' ),
    'icon' => 'el el-idea',
    'fields' => array(
        array(
            'id' => 'doc',
            'type' => 'raw',
            'markdown' => true,
            'class' => 'theme_support',
            'content' => '<div class="support-section">
            <h5>'.esc_html__( 'WE RECOMMEND YOU READ IT BEFORE YOU START', 'digilab' ).'</h5>
            <h2><i class="el el-website"></i> '.esc_html__( 'DOCUMENTATION', 'digilab' ).'</h2>
            <a target="_blank" class="button" href="https://themefora.com/documentation/">'.esc_html__( 'READ MORE', 'digilab' ).'</a>
            </div>'
        ),
        array(
            'id' => 'support',
            'type' => 'raw',
            'markdown' => true,
            'class' => 'theme_support',
            'content' => '<div class="support-section">
            <h5>'.esc_html__( 'DO YOU NEED HELP?', 'digilab' ).'</h5>
            <h2><i class="el el-adult"></i> '.esc_html__( 'SUPPORT CENTER', 'digilab' ).'</h2>
            <a target="_blank" class="button" href="https://themefora.com/contact/">'.esc_html__( 'GET SUPPORT', 'digilab' ).'</a>
            </div>'
        ),
        array(
            'id' => 'portfolio',
            'type' => 'raw',
            'markdown' => true,
            'class' => 'theme_support',
            'content' => '<div class="support-section">
            <h5>'.esc_html__( 'SEE MORE THE THEMEFORA WORDPRESS THEMES', 'digilab' ).'</h5>
            <h2><i class="el el-picture"></i> '.esc_html__( 'THEMEFORA PORTFOLIO', 'digilab' ).'</h2>
            <a target="_blank" class="button" href="https://themefora.com/themes/">'.esc_html__( 'SEE MORE', 'digilab' ).'</a>
            </div>'
        ),
        array(
            'id' => 'like',
            'type' => 'raw',
            'markdown' => true,
            'class' => 'theme_support',
            'content' => '<div class="support-section">
            <h5>'.esc_html__( 'WOULD YOU LIKE TO REWARD OUR EFFORT?', 'digilab' ).'</h5>
            <h2><i class="el el-thumbs-up"></i> '.esc_html__( 'PLEASE RATE US!', 'digilab' ).'</h2>
            <a target="_blank" class="button" href="https://themeforest.net/downloads/">'.esc_html__( 'GET STARS', 'digilab' ).'</a>
            </div>'
        )
    )));

    // Redux::setSection($digilab_pre, array(
    //     'title' => esc_html__( 'Theme Activation', 'digilab' ),
    //     'desc' => esc_html__( 'Use your license code to use the theme and get updates.', 'digilab' ),
    //     'id' => 'theme_activation',
    //     'icon' => 'el el-lock',
    //     'customizer_width' => '450px',
    //     'fields' => array(
    //         array(
    //             'title' => esc_html__( 'Purchase Code', 'digilab' ),
    //             'id' => 'theme_activation_placeholder',
    //             'type' => 'info',
    //             'style' => 'success',
    //             'desc' => get_option('envato_purchase_code_26854995'),
    //             'required' => !get_option('envato_purchase_code_26854995')
    //         ),
    //         array(
    //             'id'       => 'connection',
    //             'type'     => 'raw',
    //             'title'    => __('Activate License', 'digilab'),
    //             'desc'     => __('Please click to activate your license and enter your purchase code.', 'digilab'),
    //             'content'  => '<a class="button" href="'.admin_url('themes.php?page=merlin&step=license').'">'.esc_html__( 'CONNECT', 'digilab' ).'</a>',
    //             'required' => get_option('envato_purchase_code_26854995')
    //         ),
    //         array(
    //             'id'       => 'disconnection',
    //             'type'     => 'checkbox',
    //             'title'    => __('Disconnect License', 'digilab'),
    //             'subtitle' => __('You can change the license status.', 'digilab'),
    //             'desc'     => __('To move your license, select the checkbox and hit save.', 'digilab'),
    //             'default'  => '0', // 1 = select | 0 = deselect
    //             'validate_callback' => 'digilab_connection_callback',
    //             'required' => !get_option('envato_purchase_code_26854995')
    //         )
    // )));
/*
 * <--- END SECTIONS
 */


/** Action hook examples **/

function digilab_remove_demo()
{
    // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
    if (class_exists('ReduxFrameworkPlugin' )) {
        // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
        remove_action('admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ));
    }
}
include get_template_directory() . '/inc/core/theme-options/redux-extensions/loader.php';
function digilab_newIconFont() {
    // Uncomment this to remove elusive icon from the panel completely
    // wp_deregister_style( 'redux-elusive-icon' );
    // wp_deregister_style( 'redux-elusive-icon-ie7' );
    wp_register_style(
        'redux-font-awesome',
        '//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
        array(),
        time(),
        'all'
    );
    wp_enqueue_style( 'redux-font-awesome' );
}
add_action( 'redux/page/digilab/enqueue', 'digilab_newIconFont' );
