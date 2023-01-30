<?php

/**
 * Custom template parts for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package digilab
*/


/*************************************************
##  LOGO
*************************************************/

if ( ! function_exists( 'digilab_logo' ) ) {
    function digilab_logo()
    {
        $logo = digilab_settings( 'logo_type', 'sitename' );

        if ( '0' != digilab_settings( 'logo_visibility', '1' ) ) { ?>
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu" aria-label="<?php esc_attr_e( 'Close', 'digilab' ); ?>">
                    <i class="fa fa-bars"></i>
                </button>
                
                <?php if ( 'img' == $logo && '' != digilab_settings( 'img_logo' ) ) { ?>
                    <!-- Start Header Navigation -->                    
                    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <img src="<?php echo esc_url( digilab_settings( 'img_logo' )[ 'url' ] ); ?>" class="logo" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                    </a>
                    <!-- End Header Navigation -->

                <?php } elseif ( 'sitename' == $logo ) {?>

                    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <span class="headline_title text"><?php bloginfo( 'name' ); ?></span>
                    </a>

                <?php } elseif ( 'customtext' == $logo ) { ?>

                    <span class="headline_title text"><?php echo digilab_settings( 'text_logo' ); ?></span>

                <?php } else { ?>

                    <span class="headline_title text"> <?php bloginfo( 'name' ); ?> </span>

                <?php } ?>
            </div>

            <?php
        }
    }
}


/*************************************************
##  HEADER NAVIGATION
*************************************************/

if ( ! function_exists( 'digilab_main_header' ) ) {
    add_action( 'digilab_header_action', 'digilab_main_header', 10 );
    function digilab_main_header()
    {

        $page_header_visibility = is_page() ? digilab_page_settings( 'digilab_elementor_hide_page_header', '1' ) : '1';
        $nav_visibility      = digilab_settings( 'header_visibility', '1' );        
        $contact_visibility  = digilab_settings( 'header_top_visibility', '0' );
        $sticky_header       = digilab_settings( 'sticky_header_visibility', '1' );
        $header_template     = digilab_settings( 'header_template', 'default' );        
        $sticky_header       = '1' == $sticky_header ? 'navbar-sticky' : '';   

        if ( '0' != $nav_visibility && $page_header_visibility != '0' ) {

            if ( 'elementor' == $header_template ) {

                if ( class_exists( '\Elementor\Frontend' ) ) {

                    if ( !empty( digilab_settings( 'header_elementor_templates' ) ) ) {

                        $template_id = digilab_settings( 'header_elementor_templates' );
                        $frontend = new \Elementor\Frontend;
                        printf( '%1$s', $frontend->get_builder_content( $template_id, false ) );

                    } else {

                        printf( '<p class="info text-center ptb-40"><i class="fa fa-info"></i> %s <a class="btn btn-primary btn-solid btn-radius" href="%s">%s</a></p>',
                            esc_html__( 'No template exist for the header.', 'digilab' ),
                            admin_url( 'edit.php?post_type=elementor_library&tabs_group=library&elementor_library_type=section' ),
                            esc_html__( 'Add new section template.', 'digilab' )
                        );
                    }
                }

            } else { ?>
                
                <?php digilab_top_header(); ?>

                <!-- Header 
                ============================================= -->
                <header id="home">                    
                    <!-- Start Navigation -->
                    <nav class="navbar navbar-default <?php echo esc_attr( $sticky_header ); ?> dark attr-border bootsnav">

                        <!-- Start Top Search -->
                        <div class="container">
                            <div class="row">
                                <div class="top-search">
                                    <div class="input-group">
                                        <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                            <input type="text" name="s" class="form-control" placeholder="<?php esc_attr_e( 'Search...', 'digilab' ); ?>">
                                            <button type="submit">
                                                <i class="ti-search"></i>
                                            </button>  
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Top Search -->

                        <div class="container">
                            <?php if( digilab_settings( 'search_button_visibility' ) == '1' || digilab_settings( 'side_bar_button_visibility' ) == '1' || digilab_settings( 'language_button_visibility' ) == '1' ) { ?>
                            <!-- Start Atribute Navigation -->
                            <div class="attr-nav extra-color">
                                <ul>
                                    <?php
                                        if(digilab_settings( 'search_button_visibility' ) == '1') {                    
                                            echo '<li class="search"><a href="#"><i class="fas fa-search"></i></a></li>';
                                        }
                                    
                                        if(digilab_settings( 'side_bar_button_visibility' ) == '1') {
                                            echo '<li class="side-menu"><a href="#"><i class="fas fa-th-large"></i></a></li>';
                                        }
                                   
                                        if(digilab_settings( 'language_button_visibility' ) == '1') {  ?>                                      
                                            <li class="language-switcher">
                                                <div class="dropdown">
                                                    <button class="dropdown-toggle" type="button" data-toggle="dropdown">
                                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/lan-eng.png" alt="Flag">
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <?php
                                                            foreach(digilab_settings( 'languages' ) as $lang) {                                                                
                                                                echo '<li><a href="'.$lang['url'].'">'.$lang['title'].'</a></li>';
                                                            }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </li>
                                    <?php } ?>                                    
                                </ul>
                            </div>
                            <!-- End Atribute Navigation -->
                            <?php } ?>    
                            
                            <?php digilab_logo(); ?>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="navbar-menu">
                                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                                    <?php
                                        wp_nav_menu(
                                            array(
                                                'menu' => '',
                                                'theme_location' => 'header_menu',
                                                'container' => '',
                                                'container_class' => '',
                                                'container_id' => '',
                                                'menu_class' => '',
                                                'menu_id' => '',
                                                'items_wrap' => '%3$s',
                                                'before' => '',
                                                'after' => '',
                                                'link_before' => '',
                                                'link_after' => '',
                                                'depth' => 4,
                                                'echo' => true,
                                                'fallback_cb' => 'Digilab_Menu::fallback',
                                                'walker' => new Digilab_Menu()
                                            )
                                        );
                                    ?>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div>
						
						<?php if ( !empty( digilab_settings( 'side_bar_button_visibility','0' ) == '1' ) ) { ?>
						<!-- Start Side Menu //TODO* -->
						<div class="side">
							<a href="#" class="close-side"><i class="fa fa-times"></i></a>
							<?php
								if ( !empty( digilab_settings( 'header_elementor_sidebar_templates' ) ) ) {
									
									if(class_exists('\Elementor\Frontend')) { 
										$template_id = digilab_settings( 'header_elementor_sidebar_templates' );
										$frontend = new \Elementor\Frontend;
										printf( '%1$s', $frontend->get_builder_content( $template_id, false ) );
									}
			
								} else {
			
									printf( '<p class="info text-center ptb-40">%s</p>',
										esc_html__( 'No template exist for the side bar.', 'digilab' )
									);
								}
							?>
						</div>
						<!-- End Side Menu -->
						<?php } ?>
                    </nav>
                    <!-- End Navigation -->
                </header>
                <!-- End Header -->
                <?php
            }
        }
    }
}

if ( ! function_exists( 'digilab_top_header' ) ) {
    function digilab_top_header()
    {

        if ( '1' == digilab_settings( 'header_top_bar_visibility', '0' ) ) { 

            if ( 'elementor' == digilab_settings( 'header_topbar_template' ) && !empty( digilab_settings( 'header_elementor_topbar_templates' ) ) ) {
				
				if( class_exists('\Elementor\Frontend') ) {
					$template_id = digilab_settings( 'header_elementor_topbar_templates' );
					$frontend = new \Elementor\Frontend;
					printf( '<div class="digilab-custom-topbar">%1$s</div>', $frontend->get_builder_content( $template_id, false ) );
				}

            } else {
                ?>
                <div class="top-bar-area theme-dark text-light">
                    <div class="container">
                        <div class="row align-center">
                        
                            <?php if ( '' != digilab_settings( 'header_topbar_left', '' ) ) { ?>
                                <div class="col-lg-7 address-info">
                                    <?php echo do_shortcode( digilab_settings( 'header_topbar_left' ) ); ?>
                                </div>
                            <?php } ?>
                        
                            <?php if ( '0' != digilab_settings( 'header_buttons_visibility' ) ) { ?>
                                <div class="col-lg-5 text-right button">
                                    <div class="item-flex"> 
                                    
                                        <?php 
                                        if ( '1' == digilab_settings( 'header_buttons_custom_visibility', '0' ) && '' != digilab_settings( 'header_buttons_custom', '' ) ) {
                                            echo do_shortcode( digilab_settings( 'header_buttons_custom' ) );
                                        } else {
                                            
                                            printf( '<a href="%1$s" target="%2$s" class="button btn-primary mr-1"> %3$s </a>',
                                                digilab_settings( 'header_buttons1_url' ),
                                                digilab_settings( 'header_buttons1_target' ),
                                                digilab_settings( 'header_buttons1' )
                                            );                            
                                        }
                                        ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
    }
}
