<?php
    /**
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "osman_settings";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
      'opt_name' => 'osman_settings',
      'dev_mode' => false,
      'use_cdn' => true,
      'display_name' => $theme->get( 'Name' ),
      'display_version' => $theme->get( 'Version' ),
      'page_slug' => 'osman_options',
      'page_title' => esc_html__('Osman Options', 'osman'),
	  'async_typography'     => true,
      'admin_bar' => false,
      'menu_type' => 'menu',
      'menu_title' => esc_html__('Osman Options', 'osman'),
      'admin_bar_icon' => 'dashicons-portfolio',
      'allow_sub_menu' => true,
      'page_parent_post_type' => 'your_post_type',
      'customizer' => true,
      'hints' => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_size'     => 'normal',
        'tip_style'     => array(
          'color' => 'dark',
        ),
        'tip_position' => array(
          'my' => 'top left',
          'at' => 'bottom right',
        ),
        'tip_effect' => array(
          'show' => array(
            'duration' => '500',
            'event'    => 'mouseover',
          ),
          'hide' => array(
            'duration' => '500',
            'event'    => 'mouseleave unfocus',
          ),
        ),
      ),
      'output' => true,
      'output_tag' => true,
      'settings_api' => true,
      'cdn_check_time' => '1440',
      'compiler' => true,
      'page_permissions' => 'manage_options',
      'save_defaults' => true,
      'show_import_export' => true,
	  'show_options_object' => false,
	  'templates_path'       => dirname( __FILE__ ) . '/panel_templates/',
      'transient_time' => '3600',
      'network_sites' => true,
      'disable_tracking' => true,
	  'forced_dev_mode_off'  => true,
	  'footer_credit'        => ' ',
    );

    Redux::setArgs( $opt_name, $args );

    /*** ---> END ARGUMENTS <--- ***/


    /*** ---> START SECTIONS <--- ***/

// General Settings
Redux::setSection( $opt_name, array(
	'icon'      => 'el el-icon-cog',
    'title'     => esc_html__('General', 'osman'),
    'fields'    => array(
	   
        array(
            'id' => 'favicon',
            'type' => 'media',
            'url' => true,
            'title' => __('Favicon', 'osman'), 
            'subtitle' => __('Upload your favicon here', 'osman'),
            'desc' => __('Should be 16 x 16px Supported formats: .ico .gif .png', 'osman'),
            'default'   => ''
            ),
        array(
            'id' => 'apple_touch_icon',
            'type' => 'media',
            'url' => true,
            'title' => __('Apple Touch Icon', 'osman'), 
            'subtitle' => __('Upload icon for the Apple touch', 'osman'),
            'desc' => __('Size: 57 x 57px Supported formats: .ico .gif .png', 'osman'),
            'default'   => ''
            ),

		array(
			'id'        => 'scroll_to_top',
			'type'      => 'switch',
			'title'     => __('Scroll to top button', 'osman'),
			'subtitle'  => __('Check if you want to disable scroll to top button', 'osman'),
			'default'   => true
			),
		array(
			'id'        => 'osman_push_navbar',
			'type'      => 'switch',
			'title'     => __('Enable Push Menu', 'osman'),
			'subtitle'  => __('Check if you want to Enable push menubar.', 'osman'),
			
			'default'   => false
			),
			array(
            'id'        => 'push_menu_right_side',
            'icon'      => true,
            'type'      => 'info',
            'style'     => 'info',
            'raw'       => '<h4 style="margin: 3px;">'. __('Pushmenu','osman').' </h4>',
			'required'  => array('osman_push_navbar', '=', true),
            ),
			array(
            'id'        => 'osman_pushmenu_logo',
            'type'      => 'media',
            'url'       => true,
            'title'     => __('Pushmenu Logo', 'osman'),
            'subtitle'  => __('Upload your logo image here, or leave empty to show website title instead', 'osman'),
            'desc'      => __('Note: Allowed extensions are .jpg, .png and .gif', 'osman'),
			'required'  => array('osman_push_navbar', '=', true),
            'default'   => ''
            ),
		array(
			'id'        => 'osman_push_logo_custom',
			'type'      => 'switch',
			'title'     => __('Enable Customize logo Height/Width', 'osman'),
			'subtitle'  => __('Check if you want to Customize logo Height/Width.', 'osman'),	
			'required'  => array('osman_push_navbar', '=', true),
			'default'   => false
			),
        array(
            'id'        =>'osman_pushmenu_logo_width',
            'type'      => 'slider',       
            'title'     => __('Pushmenu Logo Width', 'osman'), 
            'subtitle'  => __('Specify Pushmenu logo width.', 'osman'),
			'required'  => array('osman_push_logo_custom', '=', true),
            'validate'  => 'numeric',
            "min"       => "50",
            "step"      => "1",
            "max"       => "300",
            'default'   => "91"          
            ),
		 
        array(
            'id'        =>'osman_pushmenu_logo_height',
            'type'      => 'slider',       
            'title'     => __('Push Logo Height', 'osman'), 
            'subtitle'  => __('Specify Pushmenu logo height.', 'osman'),
			'required'  => array('osman_push_logo_custom', '=', true),
            'validate'  => 'numeric',
            "min"       => "10",
            "step"      => "1",
            "max"       => "300",
            'default'   => "24"          
            ),  
		
		array(
            'id'        => 'osman_pushmenu_trigger_color',
            'type'      => 'color',
            'title'     => __('Menu Trigger color', 'osman'),
            'subtitle'  => __('Specify pushmenu trigger color', 'osman'),
			'required'  => array('osman_push_navbar', '=', true),
            'transparent' => false,
            'default'   => '#9b9b9b'
            ),
		array(
            'id'        => 'osman_pushmenu_trigger_color_hover',
            'type'      => 'color',
            'title'     => __('Menu Trigger color hover', 'osman'),
            'subtitle'  => __('Specify pushmenu trigger color hover', 'osman'),
			'required'  => array('osman_push_navbar', '=', true),
            'transparent' => false,
            'default'   => '#4e4e4e'
            ),
		array(
            'id'        => 'osman_pushmenu_bg_color',
            'type'      => 'color',
            'title'     => __('Background color', 'osman'),
            'subtitle'  => __('Specify push menu background color', 'osman'),
			'required'  => array('osman_push_navbar', '=', true),
            'transparent' => true,
            'default'   => '#fff'
            ),
		array(
            'id'        => 'osman_pushmenu_menu_bg',
            'type'      => 'color',
            'title'     => __('Background color', 'osman'),
            'subtitle'  => __('Pushmenu Menu background color', 'osman'),
			'required'  => array('osman_push_navbar', '=', true),
            'transparent' => true,
            'default'   => '#fff'
            ),
		array(
            'id'        => 'osman_pushmenu_menu_bg_hovercolor',
            'type'      => 'color',
            'title'     => __('Background color', 'osman'),
            'subtitle'  => __('Pushmenu Menu hover background color', 'osman'),
			'required'  => array('osman_push_navbar', '=', true),
            'transparent' => true,
            'default'   => '#fff'
            ),
		
		array(
            'id'        => 'osman_pushmenu_dropdown_bgcolor',
            'type'      => 'color',
            'title'     => __('Background color', 'osman'),
            'subtitle'  => __('Specify pushmenu dropdown background color', 'osman'),
			'required'  => array('osman_push_navbar', '=', true),
            'transparent' => true,
            'default'   => '#fff'
            ),
		array(
            'id'        => 'osman_pushmenu_current_color',
            'type'      => 'color',
            'title'     => __('Pushmenu Active color', 'osman'),
            'subtitle'  => __('Specify pushmenu Active color', 'osman'),
			'required'  => array('osman_push_navbar', '=', true),
            'transparent' => true,
            'default'   => '#f1f1f1'
            ),
		array(
            'id'        => 'osman_pushmenu_top_color',
            'type'      => 'color',
            'title'     => __('Menu Top Border color', 'osman'),
            'subtitle'  => __('Specify pushmenu top Border color', 'osman'),
			'required'  => array('osman_push_navbar', '=', true),
            'transparent' => true,
            'default'   => '#f1f1f1'
            ),
		array(
            'id'        =>'osman_google_map_api',
            'type'      => 'text',      
            'title'     => __('Google Map Api', 'osman'), 
            'subtitle'  => __('You Google Map Api.', 'osman'),
			'desc'      => __('Google Map Api Use In Shortcodes', 'osman'),
            'default'   => "AIzaSyChV5aYSK01VvcNv7Pw6tHx4P5XXwmZSKk"          
            ),
    )
    ) );
	
/* Header */
Redux::setSection( $opt_name,array(
    'icon'      => 'el el-icon-user',
    'title'     => __('Header', 'osman'),
    'desc'      => __('These are options to modify and style your header area', 'osman'),
    'fields'    => array(
        array(
            'id'        => 'logo',
            'type'      => 'media',
            'url'       => true,
            'title'     => __('Logo', 'osman'),
            'subtitle'  => __('Upload your logo image here, or leave empty to show website title instead', 'osman'),
            'desc'      => __('Note: Allowed extensions are .jpg, .png and .gif', 'osman'),
            'default'   => ''
            ),
        array(
            'id'        =>'logo_width',
            'type'      => 'slider',       
            'title'     => __('Logo Width', 'osman'), 
            'subtitle'  => __('Specify your logo width.', 'osman'),
            'validate'  => 'numeric',
            "min"       => "50",
            "step"      => "1",
            "max"       => "300",
            'default'   => "91"          
            ),
        array(
            'id'        =>'logo_height',
            'type'      => 'slider',       
            'title'     => __('Logo Height', 'osman'), 
            'subtitle'  => __('Specify your logo height.', 'osman'),
            'validate'  => 'numeric',
            "min"       => "10",
            "step"      => "1",
            "max"       => "300",
            'default'   => "24"          
            ),    
        array(
            'id'        => 'header_description',
            'type'      => 'switch',
            'title'     => __('Display site description', 'osman'),
            'subtitle'  => __('Check if you want to display site description.', 'osman'),
            'desc'      => sprintf( esc_html__( 'Note: It will apply only if You remove logo image. You can change your site description inside  %s.', 'osman' ), '<a href="'.admin_url('options-general.php').'">'.esc_html__('Settings / General','osman').'</a>' ),
			

            'default'   => false,
            ),
		array(
			'id'       => 'top-layout',
			'type'     => 'radio',
			'title'    => __('Header Layout', 'osman'), 
			'subtitle' => __('Controls the site page haeder layout.', 'osman'),
			'desc'     => __('Controls the site page haeder layout.', 'osman'),
			'options'  => array(
				'Boxed' => __( 'Boxed', 'osman' ), 
				'Wide' => __( 'Wide', 'osman' ),
				'Full_Width' => __( 'Full Width', 'osman' ),
			),
			'default'     => 'Wide',
			), 
		array(
			'id'        => 'osman_color_masthead_bg',
			'type'      => 'color',
			'title'     => __('Background color', 'osman'),
			'subtitle'  => __('Specify menu background color', 'osman'),
			'transparent' => true,
			'default'   => '#fff'
			),
                                       
        )
) );

/*SubSection Top Header*/
Redux::setSection( $opt_name, array(
      'title'  => __( 'Top Bar', 'osman' ),
      'id'     => 'osman__subsection-header',
      'icon'   => '',
	  'subsection' => true,
      'fields' => array(
	   array(
            'id'        => 'top_header_style_section',
            'icon'      => true,
            'type'      => 'info',
            'style'     => 'info',
            'raw'       => '<h4 style="margin: 3px;">'. __('Top Header','osman').' </h4>',
            ),
        array(
            'id'        => 'hide_top_header',
            'type'      => 'switch',
            'title'     => __('Show Top Header Area', 'osman'),
            'subtitle'  => __('Check if you want to remove top bar.', 'osman'),
            'default'   => true,
            ),	
		array(
			'id'        => 'osman_color_top_bg',
			'type'      => 'color',
			'title'     => __('Background color', 'osman'),
			'subtitle'  => __('Specify Topbar background color', 'osman'),
			'required'  => array('hide_top_header', '=', true),
			'transparent' => true,
			'default'   => '#fff'
			),
		array(
            'id'        => 'contact_header_section',
            'icon'      => true,
            'type'      => 'info',
            'style'     => 'info',
            'required'  => array('hide_top_header', '=', true),
            'raw'       => '<h4 style="margin: 3px;">'.__('Contact Header','osman').'</h4>',
            ),
        array(
            'id'        => 'header_contacts',
            'type'      => 'switch',
            'title'     => __('Show Contact Header', 'osman'),
            'subtitle'  => __('Check if you want to remove top bar content area.', 'osman'),
            'required'  => array('hide_top_header', '=', true),
            'default'   => true,
            ),             
        array(
            'id'        =>'phone_text',
            'type'      => 'text',      
            'title'     => __('Phone Number', 'osman'), 
            'subtitle'  => __('Insert phone number here.', 'osman'),
            'desc'      => __('Leave it empty to hide it.', 'osman'),
            'required'  => array('header_contacts', '=', true),
            'default'   => "1-800-987-654"          
            ),
        array(
            'id'        =>'email_text',
            'type'      => 'text',      
            'title'     => __('Email Address', 'osman'), 
            'subtitle'  => __('Insert email address here.', 'osman'),
            'desc'      => __('Leave it empty to hide it.', 'osman'),
            'default'   => "info@osman.com",
            'required' => array('header_contacts', '=', true),
            'validate'  => 'email'
            ),
        array(
            'id'        =>'custom_url',
            'type'      => 'text',      
            'title'     => __('Custom Header Link', 'osman'), 
            'subtitle'  => __('Insert your custom link here.', 'osman'),
            'desc'      => __('Leave it empty to hide it.', 'osman'),
            'required'  => array('header_contacts', '=', true),
            'default'   => '#'
            ),
        array(
            'id'        =>'custom_url_text',
            'type'      => 'text',      
            'title'     => __('Custom Header Link text', 'osman'), 
            'subtitle'  => __('Insert your custom link text here.', 'osman'),
            'required'  => array('header_contacts', '=', true),
            'default'   => 'custom link'
            ),			
			array(
            'id'        => 'login_text_section',
            'icon'      => true,
            'type'      => 'info',
            'style'     => 'info',
            'required'  => array('header_login', '=', true),
            'raw'       => '<h4 style="margin: 3px;">'.__('Header Login','osman').'</h4>',
            ),
        array(
            'id'        => 'header_login',
            'type'      => 'switch',
            'title'     => __('Show Header Login', 'osman'),
            'subtitle'  => __('Check if you want to remove header Login.', 'osman'),
            'required'  => array('hide_top_header', '=', true),
            'default'   => true,
            ),	
		array(
            'id'        => 'osman_top_login',
            'type'      => 'color',
            'title'     => __('Top Login Background color', 'osman'),
            'subtitle'  => __('Specify top login button background color', 'osman'),
			'required'  => array('header_login', '=', true),
            'transparent' => true,
            'default'   => 'transparent'
            ),
		array(
            'id'        => 'osman_top_login_hover',
            'type'      => 'color',
            'title'     => __('Top Login Background color Hover', 'osman'),
            'subtitle'  => __('Specify top login background color Hover', 'osman'),
			'required'  => array('header_login', '=', true),
            'transparent' => true,
            'default'   => '#31b0d5'
            ),
	  )
	  ));
	 
/*SubSection Navigation Header*/
Redux::setSection( $opt_name, array(
      'title'  => __( 'Navigation Bar', 'osman' ),
      'id'     => 'osman__nav-header',
      'icon'   => '',
	  'subsection' => true,
      'fields' => array(
	  array(
            'id'        => 'nav_text_section',
            'icon'      => true,
            'type'      => 'info',
            'style'     => 'info',
            'raw'       => '<h4 style="margin: 3px;">'.__('Navigation Menu','osman').'</h4>',
            ),
        array(
            'id'        => 'sticky_header',
            'type'      => 'switch',
            'title'     => __('Sticky Menu', 'osman'),
            'subtitle'  => __('Check if you want to disable sticky navigation.', 'osman'),
            'default'   => true,
            ),
		array(
            'id'        => 'osman_color_navbar_bg',
            'type'      => 'color',
            'title'     => __('Background color', 'osman'),
            'subtitle'  => __('Specify Navbar background color', 'osman'),
            'transparent' => true,
            'default'   => 'transparent'
            ),
		array(
            'id'        => 'osman_color_navbar_floating_bg',
            'type'      => 'color',
            'title'     => __('Background color', 'osman'),
            'subtitle'  => __('Specify Navbar floating background color', 'osman'),
            'transparent' => true,
            'default'   => 'transparent'
            ),
		array(
            'id'        => 'osman_color_nav_hover',
            'type'      => 'color',
            'title'     => __('Background color', 'osman'),
            'subtitle'  => __('Specify menu nav hover background color', 'osman'),
            'transparent' => true,
            'default'   => 'transparent'
            ),	
		array(
            'id'        => 'osman_color_nav_bg',
            'type'      => 'color',
            'title'     => __('Background color', 'osman'),
            'subtitle'  => __('Specify menu dropdown hover background color', 'osman'),
            'transparent' => true,
            'default'   => '#fff'
            ),				
		array(
            'id'        => 'osman_color_dropdown_bg',
            'type'      => 'color',
            'title'     => __('Background color', 'osman'),
            'subtitle'  => __('Specify Navbar dropdown child background color', 'osman'),
            'transparent' => true,
            'default'   => 'transparent'
            ),	
        array(
            'id'        => 'navbar_search',
            'type'      => 'switch',
            'title'     => __('Show Menu Search', 'osman'),
            'subtitle'  => __('Check if you want to disable search from nav menu.', 'osman'),
            'default'   => true,
            ),  
	  )));
	 
/*Content Area*/
Redux::setSection( $opt_name, array(
	'icon'      => 'el el-icon-screen',
    'title'     => __('Content', 'osman'),
    'desc'      => __('These are options to modify and style your content area', 'osman'),
	'id'     => 'osman__section-content',
    'fields'    => array(       
        array(
            'id'        => 'body_style_section',
            'icon'      => true,
            'type'      => 'info',
            'style'     => 'info',
            'raw'       => '<h4 style="margin: 3px;">'.__('Content Area','osman').'</h4>',
            ), 
        array(
            'id'        => 'comments_on_pages',
            'type'      => 'switch',
            'title'     => __('Comments on pages', 'osman'),
            'subtitle'  => __('turn off comments on pages', 'osman'),
            'default'   => true
            ),                    
        array(
            'id'        => 'body_bg_img',
            'type'      => 'media',
            'url'       => true,
            'title'     => __('Body background Image', 'osman'),
            'subtitle'  => __('Choose body background pattern or image.', 'osman'),
            'default'   => array('url' => ''),
            ),
        array(
            'id'        => 'body_bg_style',
            'type'      => 'background',
            'background-image' => false,
            'title'     => __( 'Background Style', 'osman' ), 
            'subtitle'  => __( 'Select your body background style.', 'osman' ),
            'transparent' => false,
            'preview' => false,
            'default'  => array(
                'background-color' => '#f9f9f9')
            ),   
		array(
            'id'        => 'osman_page_color_content_bg',
            'type'      => 'color',
            'title'     => __('Background color', 'osman'),
            'subtitle'  => __('Specify page content background color', 'osman'),
            'transparent' => true,
            'default'   => '#fff'
            ),

    )
    ) );
	
/*Page Title bar*/
Redux::setSection( $opt_name, array(
      'title'  => __( 'Page Title Bar', 'osman' ),
      'id'     => 'osman__subsection-page-title',
      'icon'   => '',
	  'subsection' => true,
      'fields' => array(
	   array(
            'id'        => 'sub_header_style_section',
            'icon'      => true,
            'type'      => 'info',
            'style'     => 'info',
            'raw'       => '<h4 style="margin: 3px;">'.__('Page Title Area','osman').'</h4>',
            ),
        array(
            'id'        => 'hide_sub_header',
            'type'      => 'switch',
            'title'     => __('Show page title Area', 'osman'),
            'subtitle'  => __('Check if you want to remove the page title area including breadcrumbs.', 'osman'),
            'desc'      => __('Note: You can hide breadcrumbs separately.', 'osman'),
            'default'   => true,
            ),                         
		array(         
			'id'       => 'sub_header_bg_color',
			'type'     => 'background',
			'title'    => __('Title bar Background', 'osman'),
			'subtitle' => __('Title bar background with image, color, etc.', 'osman'),
			'output'    => array('#sub-header'), 
			'required'  => array('hide_sub_header', '=', true),
			'default'  => array(
				'background-color' => '#1e73be',
			)),
        array(
            'id'        => 'breadcrumb_section',
            'icon'      => true,
            'type'      => 'info',
            'style'     => 'info',
            'raw'       => '<h4 style="margin: 3px;">'.__('Breadcrumbs','osman').'</h4>',
			'required'  => array('hide_sub_header', '=', true),
            ),
        array(
            'id'        => 'hide_page_title',
            'type'      => 'switch',
            'title'     => __('Show Page title ', 'osman'),
            'subtitle'  => __('Check if you want to page title from the sup header', 'osman'),
            'required'  => array('hide_sub_header', '=', true),
            'default'   => true
            ),  
        array(
            'id'        => 'hide_breadcrumb',
            'type'      => 'switch',
            'title'     => __('Show Breadcrumb ', 'osman'),
            'subtitle'  => __('Check if you want to remove breadcrumb from pages', 'osman'),
            'required'  => array('hide_sub_header', '=', true),
            'default'   => true
            ),   
			array(
			'id'       => 'breadcrum_position',
			'type'     => 'button_set',
			'title'    => __('Breadcrum and Title Position', 'osman'),
			'subtitle' => __('Change Title and Breadcrum Position ', 'osman'),
			'desc'     => __('Change Breadcrum Position, also change Title position opposite every page.', 'osman'),
			'required'  => array('hide_sub_header', '=', true),
			'options' => array(
				'1' => __('Breadcrumb Right', 'osman'), 
				'2' => __('Both in Center', 'osman'), 
				'3' => __('Breadcrumb Left', 'osman'), 
			 ), 
			'default' => '1'
			),
	  )));
	
/*Blog*/
Redux::setSection( $opt_name, array(
	'icon'      => 'el el-icon-blogger',
    'title'     => __('Blog', 'osman'),
    'desc'     => __('These are options to modify and style your main content area only', 'osman'),
    'fields'    => array(
	   array(
          'id'        => 'osman-blog-title',
          'type'      => 'text',
          'title'     => __('Blog Page Title', 'osman'),
          'subtitle'  => __('This title used on Blog Page', 'osman'),
          'desc'      => __('Enter Your Blog Title used on Blog page.', 'osman'),
          'default'   => __('Blog', 'osman'),
        ),
		array(
			'id'       => 'top-layout',
			'type'     => 'radio',
			'title'    => __('Blog Header Layout', 'osman'), 
			'subtitle' => __('Controls the site blog header layout.', 'osman'),
			'desc'     => __('Controls the site blog header layout.', 'osman'),
			//Must provide key => value pairs for radio options
			'options'  => array(
				'boxed' => __( 'Boxed', 'osman' ), 
				'wide' => __( 'Wide', 'osman' ),
				'full_width' => __( 'Full Width', 'osman' ),
			),
			'default'     => 'Wide',
		),
		array(
				'id'       => 'blog-layout',
				'type'     => 'radio',
				'title'    => __('Layout', 'osman'), 
				'subtitle' => __('Controls the site Front layout/ Home Blog.', 'osman'),
				'desc'     => __('Controls the site Front layout/ Home Blog.', 'osman'),
				//Must provide key => value pairs for radio options
				'options'  => array(
					'Boxed' => __( 'Boxed', 'osman' ), 
					'Wide' => __( 'Wide', 'osman' ),
					'Full_Width' => __( 'Full Width', 'osman' ),
				),
				'default'     => 'Wide',
			),
		array(
            'id'        => 'show_top_header_in_blog',
            'type'      => 'switch',
            'title'     => __('On/Off top bar from blogs', 'osman'),
            'subtitle'  => __('On/Off top bar from multiple posts', 'osman'),
            'default'   => false,
            ),
        array(
          'id'        => 'osman-blog-sidebar',
          'type'      => 'image_select',
          'compiler'  => true,
          'title'     => __('Sidebar Position', 'osman'),
          'subtitle'  => __('Blog Sidebar Position.', 'osman'),
          'desc'      => __('Select sidebar alignment for classic Blog.', 'osman'),
          'options'   => array(
			  '0' => array(
					'alt' => 'No Sidebar',
					'img' => ReduxFramework::$_url . 'assets/img/1c.png'),
              '1' => array(
                'alt' => 'Right Sidebar',
                'img' => ReduxFramework::$_url . 'assets/img/2cr.png'),
              '2' => array(
                'alt' => 'Left Sidebar',
                'img' => ReduxFramework::$_url . 'assets/img/2cl.png')
          ),
          'default'   => '1'
        ),
		array(
            'id'        => 'osman_entry_date_bg',
            'type'      => 'color',
            'title'     => __('Background color', 'osman'),
            'subtitle'  => __('Specify Blog date background color', 'osman'),
            'transparent' => true,
            'default'   => '#226d96'
            ),		
        array(
          'id'        => 'osman-blog-more-txt',
          'type'      => 'text',
          'title'     => __('Read More Text', 'osman'),
          'desc'      => __('Enter text for the \'Read More\' post. Example <em>\'Read More\'</em>', 'osman'),
          'validate'  => 'not_empty',
          'msg'       => __('Fill Read More button text', 'osman'),
          'default'   => __('Read More', 'osman'),
        ),
		array(
            'id'        => 'osman_entry_excerpt_bg',
            'type'      => 'color',
            'title'     => __('Background color', 'osman'),
            'subtitle'  => __('Specify Blog excerpt Button background color', 'osman'),
            'transparent' => true,
            'default'   => '#226d96'
            ),
        array(
            'id'        =>'osman_excerpt_length_count',
            'type'      => 'slider',       
            'title'     => __('Excerpt Length Limits', 'osman'), 
            'subtitle'  => __('Enter the number of excerpt length limit to display.', 'osman'),
            'validate'  => 'numeric',
            "min"       => "5",
            "step"      => "5",
            "max"       => "5000",
            'default'   => "55"          
            ), 
           
    )
    ) );
	
/*Single Post*/
Redux::setSection( $opt_name, array(
      'title'  => __( 'Single Post', 'osman' ),
      'id'     => 'osman__subsection-single',
      'icon'   => '',
	  'subsection' => true,
      'fields' => array(
	 
	   array(
            'id'        => 'post_content_style_section',
            'icon'      => true,
            'type'      => 'info',
            'style'     => 'info',
            'raw'       => '<h4 style="margin: 3px;">'.esc_html__('Single Post style','osman').'</h4>',
            ),  
		 array(
          'id'        => 'osman-single-blog-sidebar',
          'type'      => 'image_select',
          'compiler'  => true,
          'title'     => __('Sidebar Position', 'osman'),
          'subtitle'  => __('Blog Sidebar Position.', 'osman'),
          'desc'      => __('Select sidebar alignment for classic Blog.', 'osman'),
          'options'   => array(
			  '0' => array(
					'alt' => 'No Sidebar',
					'img' => ReduxFramework::$_url . 'assets/img/1c.png'),
              '1' => array(
                'alt' => 'Right Sidebar',
                'img' => ReduxFramework::$_url . 'assets/img/2cr.png'),
              '2' => array(
                'alt' => 'Left Sidebar',
                'img' => ReduxFramework::$_url . 'assets/img/2cl.png')
          ),
          'default'   => '0'
        ),
		array(
            'id'        => 'post_navigation',
            'type'      => 'switch',
            'title'     => __('Show post navigation', 'osman'),
            'subtitle'  => __('Check if you want to remove post navigation on single post', 'osman'),
            'default'   => true,
            ), 	
		
        array(
          'id'        => 'osman_single-post-social',
          'type'      => 'switch',
          'title'     => __('Show Social Sharing?', 'osman'),
          'subtitle'  => __('Turn on to show social sharing buttons.', 'osman'),
          'desc'      => __('Social sharing buttons displayed by default.', 'osman'),
          'default'   => 1,
          'on'        => __( 'Yes', 'osman' ),
          'off'       => __( 'No', 'osman' ),
        ),
        array(
          'id'        => 'osman_single-post-date',
          'type'      => 'switch',
          'title'     => __('Show Date?', 'osman'),
          'subtitle'  => __('Turn on to show single post date.', 'osman'),
          'desc'      => __('Single Post date displayed by default.', 'osman'),
          'default'   => 1,
          'on'        => __( 'Yes', 'osman' ),
          'off'       => __( 'No', 'osman' ),
        ),
        array(
          'id'        => 'osman_single-post-footer',
          'type'      => 'switch',
          'title'     => __('Show Single Post Footer?', 'osman'),
          'subtitle'  => __('Turn on to show single post footer.', 'osman'),
          'desc'      => __('Single Post Footer displayed by default.', 'osman'),
          'default'   => 1,
          'on'        => __( 'Yes', 'osman' ),
          'off'       => __( 'No', 'osman' ),
        ),
        array(
          'id'        => 'osman_single-post-tags',
          'type'      => 'switch',
          'title'     => __('Show Single Post Tags?', 'osman'),
          'subtitle'  => __('Turn on to show single post tags.', 'osman'),
          'desc'      => __('Single Post Tags displayed by default.', 'osman'),
          'default'   => 1,
          'on'        => __( 'Yes', 'osman' ),
          'off'       => __( 'No', 'osman' ),
        ),
        array(
            'id' => 'osman_color_single_blog_content_bg',
            'type' => 'color',
            'title' => __('Background color', 'osman'),
            'subtitle' => __('Specify content area background color', 'osman'),
            'transparent' => false,
            'default' => '#fff',
            ),
	   
	  )));
	  
/*Author Box*/
Redux::setSection( $opt_name, array(
      'title'  => __( 'Author Box', 'osman' ),
      'id'     => 'osman__subsection-author',
      'icon'   => '',
	  'subsection' => true,
      'fields' => array(
	  array(
            'id'        => 'author_content_style_section',
            'icon'      => true,
            'type'      => 'info',
            'style'     => 'info',
            'raw'       => '<h4 style="margin: 3px;">'.__('Author Box','osman').'</h4>',
            ),
        array(
            'id'        => 'blog_author_bio',
            'type'      => 'switch',
            'title'     => __('Enable author Bio', 'osman'),
            'subtitle'  => __('Enable / Disable author box', 'osman'),
            'default'   => true,
            ),  
        array(
            'id' => 'author_bg_color',
            'type' => 'color',
            'title' => __('Background color', 'osman'),
            'subtitle' => __('Specify content area background color', 'osman'),
            'transparent' => false,
            'required'  => array('blog_author_bio', '=', true),
            'default' => '#48365c',
            ),   
        array(
            'id'        => 'author_socials',
            'type'      => 'switch',
            'title'     => __('Author Social Share', 'osman'),
            'subtitle'  => __('Check to remove social share from author box', 'osman'),
			'desc'      => sprintf( esc_html__( 'Add from %s.', 'osman' ), '<a href="'.admin_url('profile.php').'">profile</a>' . esc_html__( 'and also add biographical info for show into authorbox', 'osman' ) ),
            
			'required'  => array('blog_author_bio', '=', true),
            'default'   => true,
            ),
        array(
            'id'        =>'author_socials_text',
            'type'      => 'text',      
            'title'     => __('Author Social Text.', 'osman'), 
            'subtitle'  => sprintf( esc_html__( 'Change social text get social url input %s.', 'osman' ), '<a href="'.admin_url('profile.php').'">'.esc_html__('profile','osman').'</a>' ),
			
            'required'  => array('author_socials', '=', true),
            'desc'      => 'Leave it empty to hide it.',
            'default'   => ""          
            ),   	   
	  )));
	
// WooCommerce Options
Redux::setSection( $opt_name, array(
      'title'  => __( 'WooCommerce', 'osman' ),
      'id'     => 'osman__section-woocommerce',
      'icon'   => 'el el-shopping-cart',
      'fields' => array(
	  array(
			'title'       => __( 'Enable Cart Link', 'osman' ),
			'subtitle'  => __('Enable / Disable cart link', 'osman'),
			'id'        => 'wc_header_cart_link',
			'default'     => true,
			'type'        => 'switch',		
		),
		 array(
          'id'       => 'osman_woocommerce_cart_icon',
          'type'     => 'select',
          'title'    => __( 'Cart icon', 'osman' ),
          'subtitle' => __( 'Specify the cart icon.', 'osman' ),
		  'options'  => array(
			'fa-shopping-bag' => 'Bag',
			'fa-shopping-cart' => 'Cart',
			'fa-cart-plus' => 'Cart plus',
			'fa-cart-arrow-down' => 'Cart Arrow Down',
			'fa-shopping-basket' => 'Basket'
			),
          'default'  => 'fa-bag'
        ),
		array(
          'id'       => 'osman_shop-name',
          'type'     => 'text',
          'title'    => __( 'Osman Shop Name', 'osman' ),
          'subtitle' => __( 'Change Shop name.', 'osman' ),
          'default'  => ''
        ),
        array(
          'id'        => 'osman_shop-columns',
          'type'      => 'select',
          'title'     => __('Shop page layout', 'osman'),
          'subtitle'  => __('Select the number of columns for the shop page', 'osman'),
          'options'   => array('2' => '2', '3' => '3', '4' => '4', '5' =>'5'), 'default'=> '4'),
        array(
          'id'       => 'osman_shop-products-per-page',
          'type'     => 'text',
          'title'    => __( 'Products per page', 'osman' ),
          'subtitle' => __( 'Number of products on Shop page.', 'osman' ),
          'default'  => '12'
        ),
        array(
          'id'        => 'osman__shop-related-columns',
          'type'      => 'select',
          'title'     => __('Related products layout', 'osman'),
          'subtitle'  => __('Select the number of columns for the related products', 'osman'),
          'options'   => array(
            '2' => '2',
            '3' => '3',
            '4' => '4'
          ),
          'default'   => '4'
		),
        array(
          'id'       => 'osman_shop-related-per-page',
          'type'     => 'text',
          'title'    => __( 'Related products per page', 'osman' ),
          'subtitle' => __( 'Number of products of Related Products.', 'osman' ),
          'desc'     => __( 'Change the number of products for Related Products.', 'osman' ),
          'default'  => '4'
		),
		array(
            'id'        => 'osman_wc_placeholder_img',
            'type'      => 'media',
            'url'       => true,
            'title'     => __('Shop placeholder Image', 'osman'),
            'subtitle'  => __('Choose placeholder image.', 'osman'),
            'default'   => array('url' => get_template_directory_uri() . '/images/placeholder.png'),
         ),
		 array(
          'id'        => 'osman-shoparchive-sidebar',
          'type'      => 'image_select',
          'compiler'  => true,
          'title'     => __('Shop Archive Sidebar Position', 'osman'),
          'subtitle'  => __('Can change Shop, cart, account page sidebar from page.', 'osman'),
          'desc'      => __('Select Shop Archive sidebar alignment for shop.', 'osman'),
          'options'   => array(
			  'none' => array(
					'alt' => 'No Sidebar',
					'img' => ReduxFramework::$_url . 'assets/img/1c.png'),
              'right' => array(
                'alt' => 'Right Sidebar',
                'img' => ReduxFramework::$_url . 'assets/img/2cr.png'),
              'left' => array(
                'alt' => 'Left Sidebar',
                'img' => ReduxFramework::$_url . 'assets/img/2cl.png')
          ),
          'default'   => 'none'
        ),
		array(
          'id'        => 'osman-shopsingle-sidebar',
          'type'      => 'image_select',
          'compiler'  => true,
          'title'     => __('Shop Single Sidebar Position', 'osman'),
          'subtitle'  => __('Shop Single Sidebar Position.', 'osman'),
          'desc'      => __('Select Shop Single sidebar alignment for shop.', 'osman'),
          'options'   => array(
			  'none' => array(
					'alt' => 'No Sidebar',
					'img' => ReduxFramework::$_url . 'assets/img/1c.png'),
              'right' => array(
                'alt' => 'Right Sidebar',
                'img' => ReduxFramework::$_url . 'assets/img/2cr.png'),
              'left' => array(
                'alt' => 'Left Sidebar',
                'img' => ReduxFramework::$_url . 'assets/img/2cl.png')
          ),
          'default'   => 'none'
        ),
      )
    ) );
	  
/*Sidebar*/
Redux::setSection( $opt_name, array(
	'icon'      => 'el el-icon-lines',
    'title'     => __('Sidebar', 'osman'),
    'desc'      => __('Global styling settings for the sidebar area', 'osman'),
    'fields'    => array(
		array(
		'id'             => 'sidebar-padding',
		'type'           => 'spacing',
		'mode'           => 'padding',
		'units'          => array('em', 'px','%'),
		'units_extended' => 'false',
		'title'          => __('Sidebar Padding', 'osman'),
		'subtitle'       => __('Main Sidebar Padding.', 'osman'),
		'desc'           => __('Enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'osman'),
		'default'            => array(
			'padding-top'     => '10px', 
			'padding-right'   => '10px', 
			'padding-bottom'  => '10px', 
			'padding-left'    => '10px',
			'units'          => 'px', 
		)
		),
		array(
		'id'          => 'sidebar_bottom_margin',
		'type'        => 'spacing',
		'mode'           => 'margin',
		'units'          => array('em', 'px','%'),
		'units_extended' => 'false',
		'title'       =>  __( 'Sidebar Margins', 'osman' ),
		'subtitle'       => __('Change Sidebar All side margin.', 'osman'),
		'desc' => __( 'Controls the margins for all sidebar.', 'osman' ),
		'default'     => array(
			'margin-top'     => '0',
			'margin-right'  => '0',
			'margin-bottom'  => '10px',
			'margin-left'  => '0',
			'units'          => 'px', 
		),
		),
		
        array(
            'id' => 'color_sidebar_bg',
            'type' => 'color',
            'title' => __('Background color', 'osman'),
            'subtitle' => __('Specify sidebar background color', 'osman'),
            'transparent' => false,
            'default' => '#fff',
            ),       
        array(
            'id' => 'color_sidebar_txt_hov',
            'type' => 'color',
            'title' => __('a links color hover', 'osman'),
            'subtitle' => __('This color will apply to sidebar links hover.', 'osman'),
            'transparent' => false,
            'default' => '#8877a3'
            ),
    )
    ) );
	
/*Floating Sidebar*/	
	Redux::setSection( $opt_name, array(
      'title'  => __( 'Floating Sidebar', 'osman' ),
      'id'     => 'osman__floating-sidebar',
      'icon'   => '',
	  'subsection' => true,
      'fields' => array(
		array(
            'id'        => 'sidebar_scroll_section',
            'icon'      => true,
            'type'      => 'info',
            'style'     => 'info',
            'raw'       => '<h4 style="margin: 3px;">'.__('Sidebar Scroll With page scroll','osman').'</h4>',
            ),
		array(
			'title'       => __( 'Sidebar Scroll', 'osman' ),
			'description' => __( 'Turn on to autoscroll sidebars.', 'osman' ),
			'id'          => 'sidebar_autoscroll',
			'default'     => false,
			'type'        => 'switch',		
		),
		array(
			'title'       => __( 'Sidebar wait after page load', 'osman' ),
			'description' => __( 'Wait Milliseconds Before Activation, after page has loaded, ex: 1000 = 1 second.', 'osman' ),
			'id'          => 'sidebar_wait_load',
			'default'     => '3000',
			'type'        => 'slider',
			"default"   => 3000,
			"min"       => 1000,
			"step"      => 1000,
			"max"       => 5000,
			"display_value" => "text"
		),
		array(
			'title'       => __( 'Milliseconds Of Inactivity Before Every Reposition', 'osman' ),
			'description' => __( 'Sidebar will start moving only after this time from when the user has stopped scrolling up or down', 'osman' ),
			'id'          => 'sidebar_moving_time',
			'default'     => '500',
			'type'        => 'slider',
			"default"   => 500,
			"min"       => 100,
			"step"      => 100,
			"max"       => 1000,
			"display_value" => "text"
		),
		array(
			'title'       => __( 'Animate Speed in Milliseconds', 'osman' ),
			'description' => __( 'How much time will the sidebar take to go to align itself with the content', 'osman' ),
			'id'          => 'sidebar_animation_speed',
			'default'     => '500',
			'type'        => 'slider',
			"default"   => 500,
			"min"       => 100,
			"step"      => 100,
			"max"       => 1000,
			"display_value" => "text"
		),
		array(
			'title'       => __( 'Offset Top', 'osman' ),
			'description' => __( 'Lets you adjust settings for a pixel perfect result; accepts positive and negative valuesOffset Bottom', 'osman' ),
			'id'          => 'sidebar_offsettop',
			'default'     => '0',
			'type'        => 'slider',
			"default"   => 0,
			"min"       => 0,
			"step"      => 1,
			"max"       => 500,
			"display_value" => "text"
		),
		array(
			'title'       => __( 'Offset Bottom', 'osman' ),
			'description' => __( 'Lets you adjust settings for a pixel perfect result', 'osman' ),
			'id'          => 'sidebar_offsetbottom',
			'default'     => '0',
			'type'        => 'slider',
			"default"   => 0,
			"min"       => 0,
			"step"      => 1,
			"max"       => 500,
			"display_value" => "text"
		),
		array(
			'title'       => __( 'Minimum Height Difference', 'osman' ),
			'description' => __( 'if (container height - sidebar height < minHDiff) then the plugin is not activated', 'osman' ),
			'id'          => 'sidebar_mindiff',
			'default'     => '0',
			'type'        => 'slider',
			"default"   => 0,
			"min"       => 0,
			"step"      => 1,
			"max"       => 500,
			"display_value" => "text"
		),
	  )
    ) );
	
/*Footer*/
Redux::setSection( $opt_name, array(
	'icon'      => 'el el-icon-bookmark',
    'title'     => __('Footer', 'osman'),
    'desc'      => __('Manage settings for footer area', 'osman'),
    'fields'    => array(
         array(
            'id'        => 'osman_footer_display',
            'type'      => 'switch',
            'switch'    => true,
            'title'     => __('Enable Footer Widgets', 'osman'),
            'subtitle'  => __('Check if you want to disable footer widgets area.', 'osman'),
            'default'   => true
            ),
        array(
            'id'        => 'osman_footer_col',
            'type'      => 'image_select',
            'compiler'  => true,
            'title'     => __('Footer Widget Columns', 'osman'),
            'subtitle'  => __('Choose columns you want for your footer widgets.', 'osman'),
            'desc'      => sprintf( esc_html__( 'You can manage footer area content in %s.', 'osman' ), '<a href="'.admin_url('widgets.php').'">'.esc_html__('Apperance / Widgets settings.','osman').'</a>' ),
			
            'options'   => array(
                '1' => array('alt' => '1 Column ', 'img' => get_template_directory_uri() . '/images/1column.png'),
                '2' => array('alt' => '2 Column ', 'img' => get_template_directory_uri() . '/images/2columns.png'),
                '3' => array('alt' => '3 Column ', 'img' => get_template_directory_uri() . '/images/3columns.png'),
                '4' => array('alt' => '4 Column ', 'img' => get_template_directory_uri() . '/images/4columns.png')
                ),
            'required'  => array('osman_footer_display', '=', true),
            'default'   => '4',            
            ),
        array(
            'id'        => 'osman_color_footer_bg',
            'type'      => 'color',
            'title'     => __('Background color', 'osman'),
            'subtitle'  => __('Specify the footer background color', 'osman'),
            'transparent' => true,
            'required' => array('osman_footer_display', '=', true),
            'default'   => 'background:#222',
            ),
        
		array(
            'id'        => 'osman_enable_footer_social_info',
            'icon'      => true,
            'type'      => 'info',
            'style'     => 'info',
            'raw'       => '<h4 style="margin: 3px;">'.__('Footer Social','osman').'</h4>',
            ),
		 array(
            'id'        => 'osman_enable_footer_social',
            'type'      => 'switch',
            'title'     => __('Enable Footer Socials', 'osman'),
            'subtitle'  => __('Check if you want to hide footer socials bar','osman'),
            'default'   => true
            ),
		 array(
            'id'        => 'osman_color_footer_social_bg',
            'type'      => 'color',
            'title'     => __('Background color', 'osman'),
            'subtitle'  => __('Specify the footer Social background color', 'osman'),
            'transparent' => true,
            'required' => array('osman_enable_footer_social', '=', true),
            'default'   => 'background:transparent',
            ),
		array(
            'id'        =>'osman_footer_socials_text',
            'type'      => 'text',      
            'title'     => __('Footer Social Text', 'osman'), 
            'subtitle'  => __('Change post social text here.', 'osman'),
            'required'  => array('osman_enable_footer_social', '=', true),
            'default'   => "Follow us: "          
            ),
		array(
            'id'        => 'osman_enable_footer_menu_bar',
            'icon'      => true,
            'type'      => 'info',
            'style'     => 'info',
            'raw'       => '<h4 style="margin: 3px;">'.__('Footer Menu','osman').'</h4>',
            ),   
         array(
            'id'        => 'osman_enable_footer_menu',
            'type'      => 'switch',
            'title'     => __('Enable Footer Menu', 'osman'),
            'subtitle'  => __('Check if you want to show footer menu inside copyright area', 'osman'),
            'desc'  => sprintf( esc_html__( 'Note: you need to set footer menu inside %s.', 'osman' ), '<a href="'.admin_url('nav-menus.php').'">'.__('Apperance / Menu.','osman').'</a>'),		
            'default'   => true,
            ),
		array(
            'id'        => 'osman_footer_navbar_color',
            'type'      => 'color',
            'title'     => __('Background color', 'osman'),
            'subtitle'  => __('Specify footer menu nav background color', 'osman'),
            'transparent' => true,
			'required' => array('osman_enable_footer_menu', '=', true),
            'default'   => '#777'
            ),
		array(
            'id'        => 'osman_footer_navbar_hover_color',
            'type'      => 'color',
            'title'     => __('Background color', 'osman'),
            'subtitle'  => __('Specify footer menu nav hover background color', 'osman'),
            'transparent' => true,
			'required' => array('osman_enable_footer_menu', '=', true),
            'default'   => 'transparent'
            ),
		array(
            'id'        => 'osman_footer_navbar_line',
            'type'      => 'color',
            'title'     => __('Background color', 'osman'),
            'subtitle'  => __('Specify footer menu nav line color', 'osman'),
            'transparent' => true,
			'required' => array('osman_enable_footer_menu', '=', true),
            'default'   => '#777'
            ),
		array(
            'id'        => 'osman_enable_footer_copyright_bar',
            'icon'      => true,
            'type'      => 'info',
            'style'     => 'info',
            'raw'       => '<h4 style="margin: 3px;">'.__('Footer Copyright','osman').'</h4>',
            ),  
		array(
            'id'        => 'osman_enable_copyright',
            'type'      => 'switch',
            'title'     => __('Enable Footer Copyright', 'osman'),
            'subtitle'  => __('Check if you want to hide footer Copyright','osman'),
            'default'   => true
            ),
		array(
            'id'      => 'osman_change_copyright_text',
            'type'    => 'textarea',
            'title'   => esc_html__( 'Copyright Text', 'osman' ),
            'default' => 'Designed by <a href="http://okoutsourcing.com/">OsmanTheme</a> <i class="fa fa-paint-brush"></i>',
            'required'  => array('osman_enable_copyright', '=', '1'),
          ),
    )
    ) );

/*Page cpt Title bar*/
Redux::setSection( $opt_name, array(
      'title'  => __( 'Custom Post Types', 'osman' ),
      'id'     => 'osman__cpt-title-bar',
      'icon'   => 'el el-photo-alt',	  
      'fields' => array(
	  array(
			'id'       => 'osman-cpt-toplayout',
			'type'     => 'radio',
			'title'    => __('Cpt Header Layout', 'osman'), 
			'subtitle' => __('Controls the site cpt header layout.', 'osman'),
			'desc'     => __('Controls the site cpr header layout.', 'osman'),
			//Must provide key => value pairs for radio options
			'options'  => array(
				'boxed' => __( 'Boxed', 'osman' ), 
				'wide' => __( 'Wide', 'osman' ),
				'full_width' => __( 'Full Width', 'osman' ),
			),
			'default'     => 'wide',
		),
	  array(
			'id'       => 'osman-cpt-layout',
			'type'     => 'radio',
			'title'    => __('Page Layout', 'osman'), 
			'subtitle' => __('Controls the site layout.', 'osman'),
			'desc'     => __('Controls the site layout.', 'osman'),
			'options'  => array(
				'boxed' => __( 'Boxed', 'osman' ), 
				'wide' => __( 'Wide', 'osman' ),
				'full_width' => __( 'Full Width', 'osman' ),
			),
			'default'     => 'wide',
			),
	  array(
          'id'        => 'osman-cpt-sidebar',
          'type'      => 'image_select',
          'compiler'  => true,
          'title'     => __('Archive Sidebar Position', 'osman'),
          'subtitle'  => __('cpt Archive Sidebar Position.', 'osman'),
          'desc'      => __('Select sidebar alignment for cpt Archive.', 'osman'),
          'options'   => array(
			  '0' => array(
					'alt' => 'No Sidebar',
					'img' => ReduxFramework::$_url . 'assets/img/1c.png'),
              '1' => array(
					'alt' => 'Right Sidebar',
					'img' => ReduxFramework::$_url . 'assets/img/2cr.png'),
              '2' => array(
					'alt' => 'Left Sidebar',
					'img' => ReduxFramework::$_url . 'assets/img/2cl.png')
          ),
          'default'   => '1'
        ),
	   array(
          'id'        => 'osman-cpt-single-sidebar',
          'type'      => 'image_select',
          'compiler'  => true,
          'title'     => __('Single Sidebar Position', 'osman'),
          'subtitle'  => __('cpt Single Sidebar Position.', 'osman'),
          'desc'      => __('Select sidebar alignment for single cpt.', 'osman'),
          'options'   => array(
			  '0' => array(
					'alt' => 'No Sidebar',
					'img' => ReduxFramework::$_url . 'assets/img/1c.png'),
              '1' => array(
					'alt' => 'Right Sidebar',
					'img' => ReduxFramework::$_url . 'assets/img/2cr.png'),
              '2' => array(
					'alt' => 'Left Sidebar',
					'img' => ReduxFramework::$_url . 'assets/img/2cl.png')
          ),
          'default'   => '1'
        ),
	   array(
            'id'        => 'sub_header_cpt_style_section',
            'icon'      => true,
            'type'      => 'info',
            'style'     => 'info',
            'raw'       => '<h4 style="margin: 3px;">'.__('Page Cpt Title Area.','osman').'</h4>',
            ),
			 array(
            'id'        => 'hide_cpt_top_header',
            'type'      => 'switch',
            'title'     => __('Show Top Header Area', 'osman'),
            'subtitle'  => __('Check if you want to remove top bar.', 'osman'),
            'default'   => true,
            ),
        array(
            'id'        => 'hide_cpt_sub_header',
            'type'      => 'switch',
            'title'     => __('Show page cpt title Area', 'osman'),
            'subtitle'  => __('Check if you want to remove the page cpt title area including breadcrumbs.', 'osman'),
            'desc'      => __('Note: You can hide cpt breadcrumbs separately.', 'osman'),
            'default'   => true,
            ),                         
        array(
            'id'        => 'breadcrumb_cpt_section',
            'icon'      => true,
            'type'      => 'info',
            'style'     => 'info',
			'required'  => array('hide_cpt_sub_header', '=', true),
            'raw'       => '<h4 style="margin: 3px;">'.esc_html__('Breadcrumbs','osman').'</h4>',
            ),
        array(
            'id'        => 'hide_cpt_page_title',
            'type'      => 'switch',
            'title'     => __('Show Page title ', 'osman'),
            'subtitle'  => __('Check if you want to page title from the sup header', 'osman'),
            'required'  => array('hide_cpt_sub_header', '=', true),
            'default'   => true
            ),  
        array(
            'id'        => 'hide_cpt_breadcrumb',
            'type'      => 'switch',
            'title'     => __('Show cpt Breadcrumb ', 'osman'),
            'subtitle'  => __('Check if you want to remove cpt breadcrumb from pages', 'osman'),
            'required'  => array('hide_cpt_sub_header', '=', true),
            'default'   => true
            ),   
			array(
			'id'       => 'breadcrum_cpt_position',
			'type'     => 'button_set',
			'title'    => __('Breadcrum cpt Position', 'osman'),
			'subtitle' => __('Change cpt Title and Breadcrum Position ', 'osman'),
			'desc'     => __('Change cpt Title and Breadcrum Position for every page.', 'osman'),
			'required'  => array('hide_cpt_sub_header', '=', true),
			'options' => array(
				'1' => __('Breadcrum Right', 'osman'), 
				'2' => __('Both in Center', 'osman'), 
			 ), 
			'default' => '1'
			),
	  )));	
	  
/*custom post type slider setting*/ 
Redux::setSection( $opt_name, array(
      'title'  => esc_html__( 'Slider', 'osman' ),
      'id'     => 'osman__cpt_slider-setting',
      'icon'   => '',
	  'subsection' => true,
      'fields' => array(
	   array(
            'id'        => 'osman-enable-slider-setting',
            'icon'      => true,
            'type'      => 'info',
            'style'     => 'info',
            'raw'       => '<h4 style="margin: 3px;">'.__('Carousel Setting','osman').'</h4>',
            ),
		array(
            'id'        => 'osman-enable_slider',
            'type'      => 'switch',
            'title'     => __('Show Slider post types', 'osman'),
            'subtitle'  => __('Enable or disable','osman'),
            'default'   => true
            ),
	)
	 
	 ));
	 
/*custom post type Portfolio setting*/ 
Redux::setSection( $opt_name, array(
      'title'  => __( 'Portfolio', 'osman' ),
      'id'     => 'osman-portfolio-setting',
      'icon'   => '',
	  'subsection' => true,
      'fields' => array(	 
		array(
            'id'        => 'portfolio_section',
            'icon'      => true,
            'type'      => 'info',
            'style'     => 'info',
            'raw'       => '<h4 style="margin: 3px;">'.esc_html__('Portfolio Setting','osman').'</h4>',
            ),
		array(
            'id'        => 'osman-enable_portfolio',
            'type'      => 'switch',
            'title'     => __('Show Portfolio post types?', 'osman'),
            'subtitle'  => __('Enable or disable','osman'),
            'default'   => true
            ),		
        array(
          'id'        => 'osman-portfolio-slug',
          'type'      => 'text',
          'title'     => __('Portfolio Slug', 'osman'),
          'subtitle'  => __('Change this option if you want to change default portfolio slug.', 'osman'),
          'desc'      => __('After changing this slug go to <em>Settings > Permalinks</em> and resave it.', 'osman'),
          'default'   => __('project', 'osman'),
		  'required'  => array('osman-enable_portfolio', '=', true),
        ),	
	
		array(
            'id'        => 'portfolio_single_section',
            'icon'      => true,
            'type'      => 'info',
            'style'     => 'info',
            'raw'       => '<h4 style="margin: 3px;">'.__('Portfolio Single Setting','osman').'</h4>',
			'required'  => array('osman-enable_portfolio', '=', true),
            ),
		array(
          'id'        => 'osman-single-project-nav',
          'type'      => 'switch',
          'title'     => __('Show Single Project Navigation?', 'osman'),
          'subtitle'  => __('Turn on to show project navigation.', 'osman'),
          'desc'      => __('Project navigation displayed by default.', 'osman'),
          'default'   => 1,
          'on'        => __( 'Yes', 'osman' ),
          'off'       => __( 'No', 'osman' ),
		  'required'  => array('osman-enable_portfolio', '=', true),
        ),
        array(
          'id'        => 'osman-single-project-related',
          'type'      => 'switch',
          'title'     => __('Show Related Projects?', 'osman'),
          'subtitle'  => __('Turn on to show related projects.', 'osman'),
          'desc'      => __('Related projects displayed by default.', 'osman'),
          'default'   => 1,
          'on'        => __( 'Yes', 'osman' ),
          'off'       => __( 'No', 'osman' ),
		  'required'  => array('osman-enable_portfolio', '=', true),
        ),
        array(
          'id'        => 'osman-single-project-related-title',
          'type'      => 'text',
          'title'     => __('Related Projects Title', 'osman'),
          'subtitle'  => __('Enter title for Related Projects.', 'osman'),
          'desc'      => __('Depends on your work type, e.g. Related Projects, More Photos etc.', 'osman'),
          'validate'  => 'not_empty',
          'msg'       => __('Fill Related Projects Title', 'osman'),
          'default'   => __('View More Projects', 'osman'),
          'required'  => array('osman-enable_portfolio', '=', true),
		  ),
 )));
 
 /*custom post type Team setting*/ 
 Redux::setSection( $opt_name, array(
      'title'  => __( 'Team', 'osman' ),
      'id'     => 'osman__cpt_team-setting',
      'icon'   => '',
	  'subsection' => true,
      'fields' => array(	
		array(
            'id'        => 'team_section',
            'icon'      => true,
            'type'      => 'info',
            'style'     => 'info',
            'raw'       => '<h4 style="margin: 3px;">'.__('Team Setting','osman').'</h4>',
            ),
		array(
            'id'        => 'osman-enable_team',
            'type'      => 'switch',
            'title'     => __('Show Team post types?', 'osman'),
            'subtitle'  => __('Enable or disable','osman'),
            'default'   => true
            ),     
        array(
          'id'        => 'osman-team-slug',
          'type'      => 'text',
          'title'     => __('Team Slug', 'osman'),
          'subtitle'  => __('Change this option if you want to change default team slug.', 'osman'),
          'desc'      => esc_attr__('After changing this slug go to <em>Settings > Permalinks</em> and resave it.', 'osman'),
          'default'   => __('member', 'osman'),
		  'required'  => array('osman-enable_team', '=', true),
        ),
		
 )));
 
  /*custom post type Partner setting*/ 
  Redux::setSection( $opt_name, array(
      'title'  => esc_html__( 'Partner', 'osman' ),
      'id'     => 'osman__cpt_partner-setting',
      'icon'   => '',
	  'subsection' => true,
      'fields' => array(
		array(
            'id'        => 'partner_section',
            'icon'      => true,
            'type'      => 'info',
            'style'     => 'info',
            'raw'       => '<h4 style="margin: 3px;">'.__('Partner Setting','osman').'</h4>',
            ),
		array(
            'id'        => 'osman-enable_partner',
            'type'      => 'switch',
            'title'     => __('Show Partner post types?', 'osman'),
            'subtitle'  => __('Enable or disable','osman'),
            'default'   => true
            ),			
        array(
          'id'        => 'osman-partner-slug',
          'type'      => 'text',
          'title'     => __('Partner Slug', 'osman'),
          'subtitle'  => __('Change this option if you want to change default Partner slug.', 'osman'),
          'desc'      => __('After changing this slug go to Settings > Permalinks and resave it.', 'osman'),
          'default'   => __('Partners', 'osman'),
		  'required'  => array('osman-enable_partner', '=', true),
        ),		
	 )
	 
	 ));	
  
/*Typography*/
Redux::setSection( $opt_name, array(
	'icon'      => 'el el-icon-font',
    'title'     => __('Typography', 'osman'),
    'desc'     => __('Manage fonts and typography settings', 'osman'),
    'fields'    => array(
		
        array(
            'id'        => 'Heading_section',
            'icon'      => true,
            'type'      => 'info',
            'style'     => 'info',
            'raw'       => '<h4 style="margin: 3px;">'.__('Heading Style','osman').'</h4>',
            ),
        array(
            'id'          => 'h1_font',
            'type'        => 'typography', 
            'title'       => __('H1 font', 'osman'),
            'google'      => true, 
            'font-backup' => false,
            'font-size'   => true,
            'color'       => false,
            'line-height' => false,
            'text-align'  => false,
            'subsets'     => false,
            'units'       =>'px',
            'subtitle'    => __('Specify the H1 tag font properties.', 'osman'),
            'default'     => array(
                'google'      => true,
                'font-weight'  => '300',
                'font-family' => 'Open Sans',
                'font-size' => '',
                ),
            'preview' => array(
                'always_display' => true,
                'font-size' => '36px',
                'text' => 'There is no good blog without great readability'
                )
            ),
        array(
            'id'          => 'h2_font',
            'type'        => 'typography', 
            'title'       => __('H2 font', 'osman'),
            'google'      => true, 
            'font-backup' => false,
            'font-size'   => true,
            'color'       => false,
            'line-height' => false,
            'text-align'  => false,
            'subsets'     => false,
            'units'       =>'px',
            'subtitle'    => __('Specify the H2 tag font properties.', 'osman'),
            'default'     => array(
                'google'      => true,
                'font-weight'  => '300',
                'font-family' => 'Open Sans',
                'font-size' => '',
                ),
            'preview' => array(
                'always_display' => true,
                'font-size' => '30px',
                'text' => __('There is no good blog without great readability','osman')
                )
            ),
        array(
            'id'          => 'h3_font',
            'type'        => 'typography', 
            'title'       => __('H3 font', 'osman'),
            'google'      => true, 
            'font-backup' => false,
            'font-size'   => true,
            'color'       => false,
            'line-height' => false,
            'text-align'  => false,
            'subsets'     => false,
            'units'       =>'px',
            'subtitle'    => __('Specify the H3 tag font properties.', 'osman'),
            'default'     => array(
                'google'      => true,
                'font-weight'  => '300',
                'font-family' => 'Open Sans',
                'font-size' => '',
                ),
            'preview' => array(
                'always_display' => true,
                'font-size' => '24px',
                'text' => __('There is no good blog without great readability','osman')
                )
            ),
        array(
            'id'          => 'h4_font',
            'type'        => 'typography', 
            'title'       => __('H4 font', 'osman'),
            'google'      => true, 
            'font-backup' => false,
            'font-size'   => true,
            'color'       => false,
            'line-height' => false,
            'text-align'  => false,
            'subsets'     => false,
            'units'       =>'px',
            'subtitle'    => __('Specify the H4 tag font properties.', 'osman'),
            'default'     => array(
                'google'      => true,
                'font-weight'  => '300',
                'font-family' => 'Open Sans',
                'font-size' => '',
                ),
            'preview' => array(
                'always_display' => true,
                'font-size' => '18px',
                'text' => __('There is no good blog without great readability','osman')
                )
            ),
        array(
            'id'          => 'h5_font',
            'type'        => 'typography', 
            'title'       => __('H5 font', 'osman'),
            'google'      => true, 
            'font-backup' => false,
            'font-size'   => true,
            'color'       => false,
            'line-height' => false,
            'text-align'  => false,
            'subsets'     => false,
            'units'       =>'px',
            'subtitle'    => __('Specify the H5 tag font properties.', 'osman'),
            'default'     => array(
                'google'      => true,
                'font-weight'  => '300',
                'font-family' => 'Open Sans',
                'font-size' => '',
                ),
            'preview' => array(
                'always_display' => true,
                'font-size' => '14px',
                'text' => __('There is no good blog without great readability','osman')
                )
            ),
        array(
            'id'          => 'h6_font',
            'type'        => 'typography', 
            'title'       => __('H6 font', 'osman'),
            'google'      => true, 
            'font-backup' => false,
            'font-size'   => true,
            'color'       => false,
            'line-height' => false,
            'text-align'  => false,
            'subsets'     => false,
            'units'       =>'px',
            'subtitle'    => __('Specify the H6 tag font properties.', 'osman'),
            'default'     => array(
                'google'      => true,
                'font-weight'  => '300',
                'font-family' => 'Open Sans',
                'font-size' => '',
                ),
            'preview' => array(
                'always_display' => true,
                'font-size' => '12px',
                'text' => __('There is no good blog without great readability','osman')
                )
            ),
                       
    )
    ) );
	
/*Pushmenu bar*/
Redux::setSection( $opt_name, array(
      'title'  => __( 'Pushmenu', 'osman' ),
      'id'     => 'osman-pushmenu-bar',
      'icon'   => '',
	  'subsection' => true,
      'fields' => array(
			array(
			  'id'          => 'osman_pushmenu_top_bar',
			  'type'        => 'switch',
			  'title'       => __('Customize pushmenu?', 'osman'),
			  'subtitle'    => __('Turn on to use custom font, color, padding for the theme pushmenu.', 'osman'),
			  'default'     => false,
			),
			array(
            'id'            => 'osman_pushmenu_top_link_style',
            'type'          => 'typography', 
            'title'         => __('Menu style', 'osman'),
            'google'        => true, 
            'compiler'      => true,
            'font-backup'   => false,
            'font-size'     => true,
            'color'         => true,
            'line-height'   => true,
            'text-align'    => true,
			'letter-spacing'=>true,
            'subsets'       => true,
            'units'         =>'px',
            'subtitle'      => __('Typography option with each property can be called individually.', 'osman'),
			'output'                => array('#header.side-header #push-menu ul li a'),
			'required'    => array('osman_pushmenu_top_bar', '=', '1'),
            'default'       => array(
                'google'        => true,
                'font-weight'   => '', 
                'font-family'   => 'Open Sans',
                'font-size' => '',
                ),
            'preview' => array(
                'always_display' => true,
                'font-size'      => '14px',
                'text'           => esc_attr__('Email &nbsp;&nbsp;Contact','osman')
                )
            ),
			array(
            'id'            => 'osman_pushmenu_top_link_style_hover',
            'type'          => 'typography', 
            'title'         => __('Menu style hover', 'osman'),
            'google'        => true, 
            'compiler'      => true,
            'font-backup'   => false,
            'font-size'     => true,
            'color'         => true,
            'line-height'   => true,
            'text-align'    => true,
			'letter-spacing'=>true,
            'subsets'       => true,
            'units'         =>'px',
            'subtitle'      => __('Typography option with each property can be called individually.', 'osman'),
			'output'                => array('#header.side-header #push-menu ul li:hover a'),
			'required'    => array('osman_pushmenu_top_bar', '=', '1'),
            'default'       => array(
                'google'        => true,
                'font-weight'   => '', 
                'font-family'   => 'Open Sans',
                'font-size' => '',
                ),
            'preview' => array(
                'always_display' => true,
                'font-size'      => '14px',
                'text'           => esc_attr__('Email &nbsp;&nbsp;Contact','osman')
                )
            ),

	  )));
	  
/*Top bar*/
Redux::setSection( $opt_name, array(
      'title'  => __( 'Top Bar', 'osman' ),
      'id'     => 'osman__top-bar',
      'icon'   => '',
	  'subsection' => true,
      'fields' => array(
			array(
			  'id'          => 'osman__custom_top_link',
			  'type'        => 'switch',
			  'title'       => __('Customize top bar?', 'osman'),
			  'subtitle'    => __('Turn on to use custom font, color, padding for the theme top bar.', 'osman'),
			  'default'     => false,
			),
			array(
            'id'            => 'top_bar_left_link_style',
            'type'          => 'typography', 
            'title'         => __('Top Left Link', 'osman'),
            'google'        => true, 
            'compiler'      => true,
            'font-backup'   => false,
            'font-size'     => true,
            'color'         => true,
            'line-height'   => true,
            'text-align'    => true,
			'letter-spacing'=>true,
            'subsets'       => true,
            'units'         =>'px',
            'subtitle'      => __('Typography option with each property can be called individually.', 'osman'),
			'output'                => array('ul.header-contact li.header-phone > a, ul.header-contact li.header-email > a'),
			'required'    => array('osman__custom_top_link', '=', '1'),
            'default'       => array(
                'google'        => true,
                'font-weight'   => '', 
                'font-family'   => 'Open Sans',
                'font-size' => '',
                ),
            'preview' => array(
                'always_display' => true,
                'font-size'      => '14px',
                'text'           => esc_attr__('Email &nbsp;&nbsp;Contact','osman')
                )
            ),
			array(
            'id'            => 'top_bar_left_link_hover_style',
            'type'          => 'typography', 
            'title'         => __('Top Left Link Hover', 'osman'),
            'google'        => true, 
            'compiler'      => true,
            'font-backup'   => false,
            'font-size'     => true,
            'color'         => true,
            'line-height'   => true,
			'letter-spacing'=>true,
            'text-align'    => true,
            'subsets'       => true,
            'units'         =>'px',
            'subtitle'      => __('Typography option with each property can be called individually.', 'osman'),
			'output'                => array('ul.header-contact li > a:hover'),
			'required'    => array('osman__custom_top_link', '=', '1'),
            'default'       => array(
                'google'        => true,
                'font-weight'   => '', 
                'font-family'   => 'Open Sans',
                'font-size' => '',
                ),
            'preview' => array(
                'always_display' => true,
                'font-size'      => '14px',
                'text'           => esc_attr__('Email &nbsp;&nbsp;Contact','osman')
                )
            ), 
			array(
            'id'            => 'topbar_right_button_style',
            'type'          => 'typography', 
            'title'         => __('Top Right Button', 'osman'),
            'google'        => true, 
            'compiler'      => true,
            'font-backup'   => false,
            'font-size'     => true,
            'color'         => true,
            'line-height'   => true,
			'letter-spacing'=>true,
            'text-align'    => true,
            'subsets'       => true,
            'units'         =>'px',
            'subtitle'      => __('Typography option with each property can be called individually.', 'osman'),
			'output'                => array('a.top-bar-login.btn.btn-sm'),
			'required'    => array('osman__custom_top_link', '=', '1'),
            'default'       => array(
                'google'        => true,
                'font-weight'   => '', 
                'font-family'   => 'Open Sans',
                'font-size' => '',
                ),
            'preview' => array(
                'always_display' => true,
                'font-size'      => '14px',
                'text'           => 'Login',
                )
            ), 
		  array(
            'id'            => 'topbar_right_button_hover_style',
            'type'          => 'typography', 
            'title'         => __('Top Right Button Hover', 'osman'),
            'google'        => true, 
            'compiler'      => true,
            'font-backup'   => false,
            'font-size'     => true,
            'color'         => true,
            'line-height'   => true,
			'letter-spacing'=>true,
            'text-align'    => true,
            'subsets'       => true,
            'units'         =>'px',
            'subtitle'      => __('Typography option with each property can be called individually.', 'osman'),
			'output'                => array('a.top-bar-login:hover'),
			'required'    => array('osman__custom_top_link', '=', '1'),
            'default'       => array(
                'google'        => true,
                'font-weight'   => '', 
                'font-family'   => 'Open Sans',
                'font-size' => '',
                ),
            'preview' => array(
                'always_display' => true,
                'font-size'      => '14px',
                'text'           => __('Login Hover','osman')
                )
            ), 
	  
	  )));
	
/*Page title bar*/
Redux::setSection( $opt_name, array(
      'title'  => __( 'Page Title Bar', 'osman' ),
      'id'     => 'osman__page-title-bar',
      'icon'   => '',
	  'subsection' => true,
      'fields' => array(
			array(
			  'id'          => 'osman__custom_breadcrumbs_link',
			  'type'        => 'switch',
			  'title'       => __('Customize font for page title bar?', 'osman'),
			  'subtitle'    => __('Turn on to use custom font for the theme page title.', 'osman'),
			  'default'     => false,
			),
			array(
            'id'            => 'page_title_style',
            'type'          => 'typography', 
            'title'         => __('Page Title Bar', 'osman'),
            'google'        => true, 
            'compiler'      => true,
            'font-backup'   => false,
            'font-size'     => true,
            'color'         => true,
            'line-height'   => true,
            'text-align'    => true,
			'letter-spacing'=>true,
            'subsets'       => true,
            'units'         =>'px',
            'subtitle'      => __('Typography option with each property can be called individually.', 'osman'),
			'output'                => array('#sub-header .sub-header-title'),
			'required'    => array('osman__custom_breadcrumbs_link', '=', '1'),
            'default'       => array(
                'google'        => true,
                'font-weight'   => '', 
                'font-family'   => 'Open Sans',
                'font-size' => '',
                ),
            'preview' => array(
                'always_display' => true,
                'font-size'      => '14px',
                'text'           => __('Home','osman')
                )
            ),
			array(
            'id'            => 'breadcrumbs_link_style',
            'type'          => 'typography', 
            'title'         => __('Breadcrumbs Link Color', 'osman'),
            'google'        => true, 
            'compiler'      => true,
            'font-backup'   => false,
            'font-size'     => true,
            'color'         => true,
            'line-height'   => true,
			'letter-spacing'=>true,
            'text-align'    => true,
            'subsets'       => true,
            'units'         =>'px',
            'subtitle'      => __('Typography option with each property can be called individually.', 'osman'),
			'output'                => array('#sub-header span,#sub-header span a,.titlecrum-position,.breadcrumbs a,.breadcrumbs,.titlecrum-position span'),
			'required'    => array('osman__custom_breadcrumbs_link', '=', '1'),
            'default'       => array(
                'google'        => true,
                'font-weight'   => '', 
                'font-family'   => 'Open Sans',
                'font-size' => '',
                ),
            'preview' => array(
                'always_display' => true,
                'font-size'      => '14px',
                'color'      => '#373a3c',
                'text'           => esc_attr__('Home &nbsp;&nbsp;About &nbsp;&nbsp;Blog &nbsp;&nbsp;Contact','osman')
                )
            ), 
			array(
            'id'            => 'breadcrumbs_link_hover_style',
            'type'          => 'typography', 
            'title'         => __('Breadcrumbs Link Hover Color', 'osman'),
            'google'        => true, 
            'compiler'      => true,
            'font-backup'   => false,
            'font-size'     => true,
            'color'         => true,
            'line-height'   => true,
			'letter-spacing'=>true,
            'text-align'    => true,
            'subsets'       => true,
            'units'         =>'px',
            'subtitle'      => __('Typography option with each property can be called individually.', 'osman'),
			'output'                => array('#sub-header span:hover, #sub-header span:hover a,.breadcrumbs:hover a, .titlecrum-position span:hover'),
			'required'    => array('osman__custom_breadcrumbs_link', '=', '1'),
            'default'       => array(
                'google'        => true,
                'font-weight'   => '', 
                'font-family'   => 'Open Sans',
                'font-size' => '',
                ),
            'preview' => array(
                'always_display' => true,
                'font-size'      => '14px',
                'text'           => esc_attr__('Home &nbsp;&nbsp;About &nbsp;&nbsp;Blog &nbsp;&nbsp;Contact','osman')
                )
            ), 
	  
	  )));
	
	/*Main Navigation Typography Style*/
Redux::setSection( $opt_name, array(
      'title'  => __( 'Main Navigation', 'osman' ),
      'id'     => 'osman__nav-typography',
      'icon'   => '',
	  'subsection' => true,
      'fields' => array(
			array(
			  'id'          => 'osman__custom_navigation_font',
			  'type'        => 'switch',
			  'title'       => __('Customize font for navigation?', 'osman'),
			  'subtitle'    => __('Turn on to use custom font for the theme navigation.', 'osman'),
			  'default'     => false,
			),
			array(
            'id'            => 'nav_menu_style',
            'type'          => 'typography', 
            'title'         => __('Navigation Menu', 'osman'),
            'google'        => true, 
            'compiler'      => true,
            'font-backup'   => false,
            'font-size'     => true,
            'color'         => true,
            'line-height'   => true,
            'text-align'    => true,
			'letter-spacing'=>true,
            'subsets'       => true,
            'units'         =>'px',
            'subtitle'      => __('Typography option with each property can be called individually.', 'osman'),
			'output'                => array('.navbar-default .navbar-nav > li > a,.navbar .navbar-nav .nav-item a'),
			'required'    => array('osman__custom_navigation_font', '=', '1'),
            'default'       => array(
                'google'        => true,
                'font-weight'   => '', 
                'font-family'   => 'Open Sans',
                'font-size' => '',
                ),
            'preview' => array(
                'always_display' => true,
                'font-size'      => '14px',
                'text'           => esc_attr__('Home &nbsp;&nbsp;About &nbsp;&nbsp;Blog &nbsp;&nbsp;Contact','osman')
                )
            ),
			array(
            'id'            => 'nav_menu_hover_style',
            'type'          => 'typography', 
            'title'         => __('Navigation Menu hover', 'osman'),
            'google'        => true, 
            'compiler'      => true,
            'font-backup'   => false,
            'font-size'     => true,
            'color'         => true,
            'line-height'   => true,
			'letter-spacing'=>true,
            'text-align'    => true,
            'subsets'       => true,
            'units'         =>'px',
            'subtitle'      => __('Typography option with each property can be called individually.', 'osman'),
			'output'                => array('.navbar-default .navbar-nav > li > a:hover,.navbar .navbar-nav .nav-item a:hover'),
			'required'    => array('osman__custom_navigation_font', '=', '1'),
            'default'       => array(
                'google'        => true,
                'font-weight'   => '', 
                'font-family'   => 'Open Sans',
                'font-size' => '',
                ),
            'preview' => array(
                'always_display' => true,
                'font-size'      => '14px',
                'text'           => esc_attr__('Home &nbsp;&nbsp;About &nbsp;&nbsp;Blog &nbsp;&nbsp;Contact','osman')
                )
            ), 
			array(
            'id'            => 'nav_menu_active_style',
            'type'          => 'typography', 
            'title'         => __('Navigation Menu active page', 'osman'),
            'google'        => true, 
            'compiler'      => true,
            'font-backup'   => false,
            'font-size'     => true,
            'color'         => true,
            'line-height'   => true,
			'letter-spacing'=>true,
            'text-align'    => true,
            'subsets'       => true,
            'units'         =>'px',
            'subtitle'      => __('Typography option with each property can be called individually.', 'osman'),
			'output'                => array('.navbar-default .navbar-nav > li.current-menu-item.current_page_item.active >a '),
			'required'    => array('osman__custom_navigation_font', '=', '1'),
            'default'       => array(
                'google'        => true,
                'font-weight'   => '', 
                'font-family'   => 'Open Sans',
                'font-size' => '',
                ),
            'preview' => array(
                'always_display' => true,
                'font-size'      => '14px',
                'text'           => esc_attr__('Home &nbsp;&nbsp;About &nbsp;&nbsp;Blog &nbsp;&nbsp;Contact','osman')
                )
            ),
			array(
            'id'            => 'nav_submenu_active_parent_style',
            'type'          => 'typography', 
            'title'         => __('Navigation Sub-menu active color on parent ', 'osman'),
            'google'        => true, 
            'compiler'      => true,
            'font-backup'   => false,
            'font-size'     => true,
            'color'         => true,
            'line-height'   => true,
			'letter-spacing'=>true,
            'text-align'    => true,
            'subsets'       => true,
            'units'         =>'px',
            'subtitle'      => __('Typography option with each property can be called individually.', 'osman'),
			'output'                => array('.navbar-default .navbar-nav > li.current-menu-ancestor.current-menu-parent.current_page_parent.current_page_ancestor.menu-item-has-children > a '),
			'required'    => array('osman__custom_navigation_font', '=', '1'),
            'default'       => array(
                'google'        => true,
                'font-weight'   => '', 
                'font-family'   => 'Open Sans',
                'font-size' => '',
                ),
            'preview' => array(
                'always_display' => true,
                'font-size'      => '14px',
                'text'           => esc_attr__('Home &nbsp;&nbsp;About &nbsp;&nbsp;Blog &nbsp;&nbsp;Contact','osman')
                )
            ), 
			array(
            'id'            => 'nav_logo_subtitle_style',
            'type'          => 'typography', 
            'title'         => __('Navigation Logo Subtitle', 'osman'),
            'google'        => true, 
            'compiler'      => true,
            'font-backup'   => false,
            'font-size'     => true,
            'color'         => true,
            'line-height'   => true,
			'letter-spacing'=>true,
            'text-align'    => true,
            'subsets'       => true,
            'units'         =>'px',
            'subtitle'      => __('Typography option with each property can be called individually.', 'osman'),
			'output'                => array('.navbar-default .site-desc'),
			'required'    => array('osman__custom_navigation_font', '=', '1'),
            'default'       => array(
                'google'        => true,
                'font-weight'   => '', 
                'font-family'   => 'Open Sans',
                'font-size' => '',
                ),
            'preview' => array(
                'always_display' => true,
                'font-size'      => '14px',
                'text'           => __('Build CMS with Osman Theme','osman')
                )
            ), 
	  
	  )));
	  
/*Main Content Typography Style*/
Redux::setSection( $opt_name, array(
      'title'  => __( 'Main Content', 'osman' ),
      'id'     => 'osman__content-typography',
      'icon'   => '',
	  'subsection' => true,
      'fields' => array(
		  array(
			  'id'          => 'osman__custom_content_font',
			  'type'        => 'switch',
			  'title'       => __('Customize font for content?', 'osman'),
			  'subtitle'    => __('Turn on to use custom font for the theme content.', 'osman'),
			  'default'     => false,
			),
			array(
            'id'            => 'main_content_body_style',
            'type'          => 'typography', 
            'title'         => __('Main content Body', 'osman'),
            'google'        => true, 
            'compiler'      => true,
            'font-backup'   => false,
            'font-size'     => true,
            'color'         => true,
            'line-height'   => true,
			'letter-spacing'=>true,
            'text-align'    => true,
            'subsets'       => true,
            'units'         =>'px',
            'subtitle'      => __('Typography option with each property can be called individually.', 'osman'),
			'output'                => array('body'),
			'required'    => array('osman__custom_content_font', '=', '1'),
            'default'       => array(
                'google'        => true,
                'font-weight'   => '', 
                'font-family'   => 'Open Sans',
                'font-size' => '',
                ),
            'preview' => array(
                'always_display' => true,
                'font-size'      => '14px',
                'text'           => esc_attr__('Home &nbsp;&nbsp;About &nbsp;&nbsp;Blog &nbsp;&nbsp;Contact','osman')
                )
            ),
			array(
            'id'            => 'nav_body_anchor',
            'type'          => 'typography', 
            'title'         => __('Main Body Anchor', 'osman'),
            'google'        => true, 
            'compiler'      => true,
            'font-backup'   => false,
            'font-size'     => true,
            'color'         => true,
            'line-height'   => true,
			'letter-spacing'=>true,
            'text-align'    => true,
            'subsets'       => true,
            'units'         =>'px',
            'subtitle'      => __('Typography option with each property can be called individually.', 'osman'),
			'output'                => array('a'),
			'required'    => array('osman__custom_content_font', '=', '1'),
            'default'       => array(
                'google'        => true,
                'font-weight'   => '', 
                'font-family'   => 'Open Sans',
                'font-size' => '',
                ),
            'preview' => array(
                'always_display' => true,
                'font-size'      => '14px',
                'text'           => esc_attr__('Home &nbsp;&nbsp;About &nbsp;&nbsp;Blog &nbsp;&nbsp;Contact','osman')
                )
            ), 
			array(
            'id'            => 'nav_body_anchor_hover',
            'type'          => 'typography', 
            'title'         => __('Main Body Anchor hover', 'osman'),
            'google'        => true, 
            'compiler'      => true,
            'font-backup'   => false,
            'font-size'     => true,
            'color'         => true,
            'line-height'   => true,
            'text-align'    => true,
			'letter-spacing'=>true,
            'subsets'       => true,
            'units'         =>'px',
            'subtitle'      => __('Typography option with each property can be called individually.', 'osman'),
			'output'                => array('a:hover, a:active, a:focus'),
			'required'    => array('osman__custom_content_font', '=', '1'),
            'default'       => array(
                'google'        => true,
                'font-weight'   => '', 
                'font-family'   => 'Open Sans',
                'font-size' => '',
                ),
            'preview' => array(
                'always_display' => true,
                'font-size'      => '14px',
                'text'           => __('Build CMS with Osman Theme','osman')
                )
            ), 
	  
	  )));
	
/*Sidebar Typography Style*/
Redux::setSection( $opt_name, array(
      'title'  => __( 'Sidebar', 'osman' ),
      'id'     => 'osman__sidebar-typography',
      'icon'   => '',
	  'subsection' => true,
      'fields' => array(
	  array(
          'id'          => 'osman__custom_sidebar_font',
          'type'        => 'switch',
          'title'       => __('Customize font for sidebar?', 'osman'),
          'subtitle'    => __('Turn on to use custom font for the theme sidebar.', 'osman'),
          'default'     => false, 
        ),
	  array(
            'id'        => 'sidebar_typography_section',
            'icon'      => true,
            'type'      => 'info',
            'style'     => 'info',
            'raw'       => '<h4 style="margin: 3px;">'.__('Sidebar Style','osman').'</h4>',
			'required'    => array('osman__custom_sidebar_font', '=', '1'),
            ),	
			array(
            'id'          => 'sidebar_title_font',
            'type'        => 'typography', 
            'title'       => __('Widget Title Typography', 'osman'),
            'google'      => true, 
            'compiler'    => true,
            'font-backup' => false,
            'font-size'   => true,
            'color'       => true,
            'subsets'     => true,
            'line-height' => true,
			'letter-spacing'=>true,
            'text-align'  => true,
            'units'       =>'px',
            'subtitle'    => __('Change Widget Title font, color, line height etc', 'osman'),
			'output'                => array('.widget-title > h3'),
			'required'    => array('osman__custom_sidebar_font', '=', '1'),
            'default'     => array(
                'google'        => true,
                'font-weight'   => '400', 
                'font-family'   => 'Open Sans',
                'font-size'     => '',
                'color'     => '',
                ),
            'preview' => array(
                'always_display'=> true,
                'font-size'     => '24px',
                'text'          => __('Widget Default Title','osman')
                )
            ),	  
			array(
            'id'          => 'color_sidebar_txt_h',
            'type'        => 'typography', 
            'title'       => __('Widget Anchor Typography', 'osman'),
            'google'      => true, 
            'compiler'    => true,
            'font-backup' => false,
            'font-size'   => true,
            'color'       => true,
            'subsets'     => true,
            'line-height' => true,
			'letter-spacing'=>true,
            'text-align'  => true,
            'units'       =>'px',
            'subtitle'    => __('Change Widget Anchor font, color, line height etc', 'osman'),
			'output'                => array('#sidebar a'),
			'required'    => array('osman__custom_sidebar_font', '=', '1'),
            'default'     => array(
                'google'        => true,
                'font-weight'   => '400', 
                'font-family'   => 'Open Sans',
                'font-size'     => '',
                'color'     => '',
                ),
            'preview' => array(
                'always_display'=> true,
                'font-size'     => '14px',
                'text'          => __('Widget Default Anchor','osman')
                )
            ),
			array(
            'id'          => 'color_sidebar_txt_hov',
            'type'        => 'typography', 
            'title'       => __('Widget Anchor Typography hover', 'osman'),
            'google'      => true, 
            'compiler'    => true,
            'font-backup' => false,
            'font-size'   => true,
            'color'       => true,
            'subsets'     => true,
            'line-height' => true,
			'letter-spacing'=>true,
            'text-align'  => true,
            'units'       =>'px',
            'subtitle'    => __('Change Widget Anchor font, color, line height etc', 'osman'),
			'output'                => array('#sidebar a:hover, #sidebar a:active, #sidebar a:focus'),
			'required'    => array('osman__custom_sidebar_font', '=', '1'),
            'default'     => array(
                'google'        => true,
                'font-weight'   => '400', 
                'font-family'   => 'Open Sans',
                'font-size'     => '',
                'color'     => '',
                ),
            'preview' => array(
                'always_display'=> true,
                'font-size'     => '14px',
                'text'          => __('Widget Default Anchor hover over text','osman')
                )
            ),		
	  )
	  ) );
	  
/*Blog Typography*/ 
Redux::setSection( $opt_name, array(
      'title'  => __( 'Blog', 'osman' ),
      'id'     => 'osman__blog-typography',
      'icon'   => '',
	  'subsection' => true,
      'fields' => array(
	  array(
          'id'          => 'osman__custom_blog_font',
          'type'        => 'switch',
          'title'       => __('Customize font for blog?', 'osman'),
          'subtitle'    => __('Turn on to use custom font for the theme blog.', 'osman'),
          'default'     => false,
        ),
	   array(
            'id'        => 'blog_typography_section',
            'icon'      => true,
            'type'      => 'info',
            'style'     => 'info',
            'raw'       => '<h4 style="margin: 3px;">'.__('Blog Style','osman').'</h4>',
			'required'    => array('osman__custom_blog_font', '=', '1'),
            ),	
			array(
            'id'          => 'blog_title_font',
            'type'        => 'typography', 
            'title'       => __('Blog Title Typography', 'osman'),
            'google'      => true, 
            'compiler'    => true,
            'font-backup' => false,
            'font-size'   => true,
            'color'       => true,
            'subsets'     => true,
            'line-height' => true,
			'letter-spacing'=>true,
            'text-align'  => true,
            'units'       =>'px',
            'subtitle'    => __('Change Blog Title font, color, line height etc', 'osman'),
			'output'                => array('.blog .entry-title > a'),
			'required'    => array('osman__custom_blog_font', '=', '1'),
            'default'     => array(
                'google'        => true,
                'font-weight'   => '400', 
                'font-family'   => 'Open Sans',
                'font-size'     => '',
                'color'     => '',
                ),
            'preview' => array(
                'always_display'=> true,
                'font-size'     => '24px',
                'text'          => __('Blog Default Title','osman')
                )
            ),
			array(
            'id'          => 'blog_body_font',
            'type'        => 'typography', 
            'title'       => __('Blog Body content Typography', 'osman'),
            'google'      => true, 
            'compiler'    => true,
            'font-backup' => false,
            'font-size'   => true,
            'color'       => true,
            'subsets'     => true,
            'line-height' => true,
			'letter-spacing'=>true,
            'text-align'  => true,
            'units'       =>'px',
            'subtitle'    => __('Change Blog body content font, color, line height etc', 'osman'),
			'output'                => array('.blog .entry-content'),
			'required'    => array('osman__custom_blog_font', '=', '1'),
            'default'     => array(
                'google'        => true,
                'font-weight'   => '400', 
                'font-family'   => 'Open Sans',
                'font-size'     => '',
                'color'     => '',
                ),
            'preview' => array(
                'always_display'=> true,
                'font-size'     => '14px',
                'text'          => __('Blog Default Body Content','osman')
                )
            ),
		 array(
            'id'        => 'blog_Single_typography_section',
            'icon'      => true,
            'type'      => 'info',
            'style'     => 'info',
            'raw'       => '<h4 style="margin: 3px;">'.__('Blog Single Style','osman').'</h4>',
			'required'    => array('osman__custom_blog_font', '=', '1'),
            ),	
			array(
            'id'          => 'blog_single_title_font',
            'type'        => 'typography', 
            'title'       => __('Blog Single Title Typography', 'osman'),
            'google'      => true, 
            'compiler'    => true,
            'font-backup' => false,
            'font-size'   => true,
            'color'       => true,
            'subsets'     => true,
            'line-height' => true,
			'letter-spacing'=>true,
            'text-align'  => true,
            'units'       =>'px',
            'subtitle'    => __('Change Single Blog Title font, color, line height etc', 'osman'),
			'output'                => array('.single h1.entry-title'),
			'required'    => array('osman__custom_blog_font', '=', '1'),
            'default'     => array(
                'google'        => true,
                'font-weight'   => '400', 
                'font-family'   => 'Open Sans',
                'font-size'     => '',
                'color'     => '',
                ),
            'preview' => array(
                'always_display'=> true,
                'font-size'     => '36px',
                'text'          => __('Blog Single Default Title','osman')
                )
            ),
			array(
            'id'          => 'blog_single_body_font',
            'type'        => 'typography', 
            'title'       => __('Blog Single Body Typography', 'osman'),
            'google'      => true, 
            'compiler'    => true,
            'font-backup' => false,
            'font-size'   => true,
            'color'       => true,
            'subsets'     => true,
            'line-height' => true,
			'letter-spacing'=>true,
            'text-align'  => true,
            'units'       =>'px',
            'subtitle'    => __('Change Single Blog Body Title font, color, line height etc', 'osman'),
			'output'                => array('.single .entry-content'),
			'required'    => array('osman__custom_blog_font', '=', '1'),
            'default'     => array(
                'google'        => true,
                'font-weight'   => '400', 
                'font-family'   => 'Open Sans',
                'font-size'     => '',
                'color'     => '',
                ),
            'preview' => array(
                'always_display'=> true,
                'font-size'     => '14px',
                'text'          => __('Blog Single Default Body Content','osman')
                )
            ),
			 array(
            'id'        => 'blog_authorbox_typography_section',
            'icon'      => true,
            'type'      => 'info',
            'style'     => 'info',
            'raw'       => '<h4 style="margin: 3px;">'.__('Blog Authorbox Style','osman').'</h4>',
			'required'    => array('osman__custom_blog_font', '=', '1'),
            ),
			
			array(
            'id'          => 'blog_authorbox_content_font',
            'type'        => 'typography', 
            'title'       => __('Blog Authorbox BioName Typography', 'osman'),
            'google'      => true, 
            'compiler'    => true,
            'font-backup' => false,
            'font-size'   => true,
            'color'       => true,
            'subsets'     => true,
            'line-height' => true,
			'letter-spacing'=>true,
            'text-align'  => true,
            'units'       =>'px',
            'subtitle'    => __('Change Authorbox BioName font, color, line height etc', 'osman'),
			'output'                => array('.author-bio .bio-name a'),
			'required'    => array('osman__custom_blog_font', '=', '1'),
            'default'     => array(
                'google'        => true,
                'font-weight'   => '400', 
                'font-family'   => 'Open Sans',
                'font-size'     => '',
                'color'     => '',
                ),
            'preview' => array(
                'always_display'=> true,
                'font-size'     => '36px',
                'text'          => __('Blog Authorbox Default Title','osman')
                )
            ),
			array(
            'id'          => 'blog_authorbox_content_hover',
            'type'        => 'typography', 
            'title'       => __('Blog Authorbox BioName Hover Typography', 'osman'),
            'google'      => true, 
            'compiler'    => true,
            'font-backup' => false,
            'font-size'   => true,
            'color'       => true,
            'subsets'     => true,
            'line-height' => true,
			'letter-spacing'=>true,
            'text-align'  => true,
            'units'       =>'px',
            'subtitle'    => __('Change Authorbox Blog BioName font, color, line height etc', 'osman'),
			'output'                => array('.author-bio .bio-name a:hover'),
			'required'    => array('osman__custom_blog_font', '=', '1'),
            'default'     => array(
                'google'        => true,
                'font-weight'   => '400', 
                'font-family'   => 'Open Sans',
                'font-size'     => '',
                'color'     => '',
                ),
            'preview' => array(
                'always_display'=> true,
                'font-size'     => '36px',
                'text'          => __('Blog Authorbox Default Title','osman')
                )
            ),
			array(
            'id'          => 'blog_authorbox_desc_font',
            'type'        => 'typography', 
            'title'       => __('Blog Authorbox BioDescription Typography', 'osman'),
            'google'      => true, 
            'compiler'    => true,
            'font-backup' => false,
            'font-size'   => true,
            'color'       => true,
            'subsets'     => true,
            'line-height' => true,
			'letter-spacing'=>true,
            'text-align'  => true,
            'units'       =>'px',
            'subtitle'    => __('Change Authorbox BioDescription font, color, line height etc', 'osman'),
			'output'                => array('.author-bio .bio-desc'),
			'required'    => array('osman__custom_blog_font', '=', '1'),
            'default'     => array(
                'google'        => true,
                'font-weight'   => '400', 
                'font-family'   => 'Open Sans',
                'font-size'     => '',
                'color'     => '',
                ),
            'preview' => array(
                'always_display'=> true,
                'font-size'     => '36px',
                'text'          => __('Blog Authorbox Default Title','osman')
                )
            ),
			array(
            'id'          => 'blog_authorbox_social_text',
            'type'        => 'typography', 
            'title'       => __('Author Social Text', 'osman'),
            'google'      => true, 
            'compiler'    => true,
            'font-backup' => false,
            'font-size'   => true,
            'color'       => true,
            'subsets'     => true,
            'line-height' => true,
			'letter-spacing'=>true,
            'text-align'  => true,
            'units'       =>'px',
            'subtitle'    => __('Change Authorbox Blog Social font, color, line height etc', 'osman'),
			'output'                => array('.author-social-bar-text'),
			'required'    => array('osman__custom_blog_font', '=', '1'),
            'default'     => array(
                'google'        => true,
                'font-weight'   => '400', 
                'font-family'   => 'Open Sans',
                'font-size'     => '',
                'color'     => '',
                ),
            'preview' => array(
                'always_display'=> true,
                'font-size'     => '36px',
                'text'          => __('Author Social Text','osman')
                )
            ),
	  
	  )));
	  
	  
/*Footer Typography*/ 
Redux::setSection( $opt_name, array(
      'title'  => __( 'Footer', 'osman' ),
      'id'     => 'osman__footer-typography',
      'icon'   => '',
	  'subsection' => true,
      'fields' => array(
	  array(
          'id'          => 'osman__custom_footer_font',
          'type'        => 'switch',
          'title'       => __('Customize font for footer?', 'osman'),
          'subtitle'    => __('Turn on to use custom font for the theme footer.', 'osman'),
          'default'     => false,
        ),
	  array(
            'id'        => 'footer_typography_section',
            'icon'      => true,
            'type'      => 'info',
            'style'     => 'info',
            'raw'       => '<h4 style="margin: 3px;">'.__('Footer Style','osman').'</h4>',
			'required'    => array('osman__custom_footer_font', '=', '1'),
            ),	
			array(
            'id'          => 'footer_title_font',
            'type'        => 'typography', 
            'title'       => __('Footer Widget Title Typography', 'osman'),
            'google'      => true, 
            'compiler'    => true,
            'font-backup' => false,
            'font-size'   => true,
            'color'       => true,
            'subsets'     => true,
            'line-height' => true,
			'letter-spacing'=>true,
            'text-align'  => true,
            'units'       =>'px',
            'subtitle'    => __('Change Footer Widget Title font, color, line height etc', 'osman'),
			'output'                => array('.footer-widget-title'),
			'required'    => array('osman__custom_footer_font', '=', '1'),
            'default'     => array(
                'google'        => true,
                'font-weight'   => '400', 
                'font-family'   => 'Open Sans',
                'font-size'     => '',
                'color'     => '',
                ),
            'preview' => array(
                'always_display'=> true,
                'font-size'     => '24px',
                'text'          => __('Blog Default Title','osman')
                )
            ),
			array(
            'id'          => 'footer_content_font',
            'type'        => 'typography', 
            'title'       => __('Footer Content Typography', 'osman'),
            'google'      => true, 
            'compiler'    => true,
            'font-backup' => false,
            'font-size'   => true,
            'color'       => true,
            'subsets'     => true,
            'line-height' => true,
			'letter-spacing'=>true,
            'text-align'  => true,
            'units'       =>'px',
            'subtitle'    => __('Change Footer Content font, color, line height etc', 'osman'),
			'output'                => array('footer.page-footer p'),
			'required'    => array('osman__custom_footer_font', '=', '1'),
            'default'     => array(
                'google'        => true,
                'font-weight'   => '400', 
                'font-family'   => 'Open Sans',
                'font-size'     => '',
                'color'     => '',
                ),
            'preview' => array(
                'always_display'=> true,
                'font-size'     => '13px',
                'text'          => __('Footer Main Content Text','osman')
                )
            ),
			array(
            'id'          => 'footer_anchor_font',
            'type'        => 'typography', 
            'title'       => __('Footer Anchor Typography', 'osman'),
            'google'      => true, 
            'compiler'    => true,
            'font-backup' => false,
            'font-size'   => true,
            'color'       => true,
            'subsets'     => true,
            'line-height' => true,
			'letter-spacing'=>true,
            'text-align'  => true,
            'units'       =>'px',
            'subtitle'    => __('Change Footer Anchor font, color, line height etc', 'osman'),
			'output'                => array('footer.page-footer a'),
			'required'    => array('osman__custom_footer_font', '=', '1'),
            'default'     => array(
                'google'        => true,
                'font-weight'   => '400', 
                'font-family'   => 'Open Sans',
                'font-size'     => '',
                'color'     => '',
                ),
            'preview' => array(
                'always_display'=> true,
                'font-size'     => '13px',
                'text'          => __('Footer Anchor Text','osman')
                )
            ),
			array(
            'id'          => 'footer_anchor_hover_font',
            'type'        => 'typography', 
            'title'       => __('Footer Anchor Hover Typography', 'osman'),
            'google'      => true, 
            'compiler'    => true,
            'font-backup' => false,
            'font-size'   => true,
            'color'       => true,
            'subsets'     => true,
            'line-height' => true,
			'letter-spacing'=>true,
            'text-align'  => true,
            'units'       =>'px',
            'subtitle'    => __('Change Footer Anchor hover font, color, line height etc', 'osman'),
			'output'                => array('footer.page-footer a:hover'),
			'required'    => array('osman__custom_footer_font', '=', '1'),
            'default'     => array(
                'google'        => true,
                'font-weight'   => '400', 
                'font-family'   => 'Open Sans',
                'font-size'     => '',
                'color'     => '',
                ),
            'preview' => array(
                'always_display'=> true,
                'font-size'     => '13px',
                'text'          => __('Footer Anchor Hover Text','osman')
                )
            ),
		array(
            'id'        => 'footer_navbar_section',
            'icon'      => true,
            'type'      => 'info',
            'style'     => 'info',
            'raw'       => '<h4 style="margin: 3px;">'.__('Footer Navbar','osman').'</h4>',
			'required'    => array('osman__custom_footer_font', '=', '1'),
            ),
		array(
            'id'          => 'footer_navbar_font',
            'type'        => 'typography', 
            'title'       => __('Footer Navbar Typography', 'osman'),
            'google'      => true, 
            'compiler'    => true,
            'font-backup' => false,
            'font-size'   => true,
            'color'       => true,
            'subsets'     => true,
            'line-height' => true,
			'letter-spacing'=>true,
            'text-align'  => true,
            'units'       =>'px',
            'subtitle'    => __('Change Footer Navbar font, color, line height etc', 'osman'),
			'output'                => array('footer.page-footer .footer-copyright .nav-link'),
			'required'    => array('osman__custom_footer_font', '=', '1'),
            'default'     => array(
                'google'        => true,
                'font-weight'   => '400', 
                'font-family'   => 'Open Sans',
                'font-size'     => '',
                'color'     => '',
                ),
            'preview' => array(
                'always_display'=> true,
                'font-size'     => '13px',
                'text'          => __('Home | Contact','osman')
                )
            ),
			array(
            'id'          => 'footer_navbar_hover_font',
            'type'        => 'typography', 
            'title'       => __('Footer Navbar Hover Typography', 'osman'),
            'google'      => true, 
            'compiler'    => true,
            'font-backup' => false,
            'font-size'   => true,
            'color'       => true,
            'subsets'     => true,
            'line-height' => true,
			'letter-spacing'=>true,
            'text-align'  => true,
            'units'       =>'px',
            'subtitle'    => __('Change Footer Navbar hover font, color, line height etc', 'osman'),
			'output'                => array('footer.page-footer .footer-copyright .menu-item.menu-item-type-post_type.menu-item-object-page.nav-item:hover .nav-link'),
			'required'    => array('osman__custom_footer_font', '=', '1'),
            'default'     => array(
                'google'        => true,
                'font-weight'   => '400', 
                'font-family'   => 'Open Sans',
                'font-size'     => '',
                'color'     => '',
                ),
            'preview' => array(
                'always_display'=> true,
                'font-size'     => '13px',
                'text'          => __('Home | Contact','osman')
                )
            ),
			array(
            'id'        => 'footer_copyright_section',
            'icon'      => true,
            'type'      => 'info',
            'style'     => 'info',
            'raw'       => '<h4 style="margin: 3px;">'.esc_html__('Footer Copyright','osman').'</h4>',
			'required'    => array('osman__custom_footer_font', '=', '1'),
            ),
			array(
            'id'          => 'footer_copyright_font',
            'type'        => 'typography', 
            'title'       => __('Footer Copyright Typography', 'osman'),
            'google'      => true, 
            'compiler'    => true,
            'font-backup' => false,
            'font-size'   => true,
            'color'       => true,
            'subsets'     => true,
            'line-height' => true,
			'letter-spacing'=>true,
            'text-align'  => true,
            'units'       =>'px',
            'subtitle'    => __('Change Footer Copyright font, color, line height etc', 'osman'),
			'output'                => array('footer.page-footer .footer-copyright'),
			'required'    => array('osman__custom_footer_font', '=', '1'),
            'default'     => array(
                'google'        => true,
                'font-weight'   => '400', 
                'font-family'   => 'Open Sans',
                'font-size'     => '',
                'color'     => '',
                ),
            'preview' => array(
                'always_display'=> true,
                'font-size'     => '13px',
                'text'          => __('Footer Copyright Text','osman')
                )
            ),
			array(
            'id'          => 'footer_copyright_hover_font',
            'type'        => 'typography', 
            'title'       => __('Footer Copyright Hover Typography', 'osman'),
            'google'      => true, 
            'compiler'    => true,
            'font-backup' => false,
            'font-size'   => true,
            'color'       => true,
            'subsets'     => true,
            'line-height' => true,
			'letter-spacing'=>true,
            'text-align'  => true,
            'units'       =>'px',
            'subtitle'    => __('Change Footer Copyright hover font, color, line height etc', 'osman'),
			'output'                => array('footer.page-footer .footer-copyright .copyright-text:hover'),
			'required'    => array('osman__custom_footer_font', '=', '1'),
            'default'     => array(
                'google'        => true,
                'font-weight'   => '400', 
                'font-family'   => 'Open Sans',
                'font-size'     => '',
                'color'     => '',
                ),
            'preview' => array(
                'always_display'=> true,
                'font-size'     => '13px',
                'text'          => __('Footer Copyright Hover Text','osman')
                )
            ),
			
	  )));


// Page Pre-Loader Options
    Redux::setSection( $opt_name, array(
      'title'  => __( 'Page Pre-Loader', 'osman' ),
      'id'     => 'osman-section-pageloader',
      'icon'   => 'el el-repeat',
      'fields' => array(
        array(
          'id'        => 'osman-pre-loader',
          'type'      => 'switch',
          'title'     => __('Use Pager Pre-Loader?', 'osman'),
          'subtitle'  => __('Turn on to use page pre-loader.', 'osman'),
          'desc'      => __('If turned on you will see spinner before content will be shown.', 'osman'),
          'default'   => 0,
          'on'        => __( 'Yes', 'osman' ),
          'off'       => __( 'No', 'osman' ),
        ),
        array(
          'id'        => 'osman-custom_pageloader',
          'type'      => 'switch',
          'title'     => __('Enable styling for Pre-Loader?', 'osman'),
          'subtitle'  => __('Turn on to change colors for the pre-loader.', 'osman'),
          'default'   => false,
          'on'        => __( 'Yes', 'osman' ),
          'off'       => __( 'No', 'osman' ),
          'required'  => array('osman-pre-loader', '=', '1'),
        ),
        array(
          'id'                    => 'osman-pageloader-bg',
          'type'                  => 'background',
          'output'                => array('.page-loader'),
          'title'                 => __('Page Pre-Loader Background', 'osman'),
          'subtitle'              => __('Choose background color your pre-loader screen.', 'osman'),
          'preview'               => false,
          'background-size'       => false,
          'background-repeat'     => false,
          'background-attachment' => false,
          'background-position'   => false,
          'background-image'      => false,
          'transparent'           => false,
          'default'               => array(
            'background-color' => '#fefefe',
          ),
          'required'              => array(
            array('osman-pre-loader', '=', '1'),
            array('osman-custom_pageloader', '=', '1'),
          ),
        ),
        array(
          'id'          => 'osman-pageloader-bar-color-before',
          'type'        => 'color',
          'title'       => __( 'Spinning Bar Color Primary', 'osman' ),
          'subtitle'    => __( 'Choose color for spinning bar before.', 'osman' ),
          'default'     => '#0275d8',
          'transparent' => false,
          'required'    => array(
            array('osman-pre-loader', '=', '1'),
            array('osman-custom_pageloader', '=', '1'),
          ),
		 
        ),
		 array(
          'id'          => 'osman-pageloader-bar-color-after',
          'type'        => 'color',
          'title'       => __( 'Spinning Bar Color Primary', 'osman' ),
          'subtitle'    => __( 'Choose color for spinning bar after.', 'osman' ),
          'default'     => '#fff',
          'transparent' => false,
          'required'    => array(
            array('osman-pre-loader', '=', '1'),
            array('osman-custom_pageloader', '=', '1'),
          ),
		  
        ),
        array(
          'id'             => 'osman-pageloader-spinner-size',
          'type'           => 'dimensions',
          'units'          => array( 'px' ),
          'units_extended' => 'false',
          'title'          => __( 'Spinner Size', 'osman' ),
          'subtitle'       => __( 'Set up the spinner size.', 'osman' ),
          'desc'           => __( 'Spinner size can be set in px.', 'osman' ),
          'height'         => false,
          'default'        => array(
            'width'   => 60
          ),
          'required'  => array(
            array('osman-pre-loader', '=', '1'),
            array('osman-custom_pageloader', '=', '1'),
          ),
        ),
      )
    ) );
	
/*Maintenance*/
Redux::setSection( $opt_name, array(
	 'icon'      => 'el el-icon-warning-sign',
    'title'     => __('Maintenance Mode', 'osman'),
    'desc'      => __('Basic maintenance mode', 'osman'),
    'fields'    => array(
        array(
            'id'        => 'maintenance_mode',
            'type'      => 'switch',
            'title'     => __('Maintenance mode', 'osman'),
            'subtitle'  => __('Enable maintenance mode.', 'osman'),
             'desc'  => __('Enable wordpress maintenance mode(for users only, not for admin).', 'osman'),
            'default'   => false,
            ),
		 array(
          'id'        => 'osman__custom_coming_soon',
          'type'      => 'switch',
          'title'     => __('Enable advanced styling?', 'osman'),
          'subtitle'  => __('Turn on to change colors, borders, link etc. for the Coming Soon Page.', 'osman'),
          'default'   => false,
          'on'        => __( 'Yes', 'osman' ),
          'off'       => __( 'No', 'osman' ),
        ),
        array(
          'id'       => 'osman-coming-bg',
          'type'     => 'background',
          'title'    => __( 'Page Background', 'osman' ),
          'subtitle' => __( 'Page background options for Coming Soon Page.', 'osman' ),
          'preview'               => false,
          'background-size'       => false,
          'background-repeat'     => false,
          'background-attachment' => false,
          'background-position'   => false,
          'background-image'      => false,
          'default'               => array(
            'background-color' => '#fff',
          ),
        ),
		 array(
          'id'       => 'osman-coming-days-notice-txt',
          'type'     => 'text',
          'title'    => __( 'Text for Notice', 'osman' ),
          'subtitle' => __( 'Used for the Annoucement.', 'osman' ),
          'default'  => 'Maintenance, please come back soon'
        ),
      
        array(
          'id'       => 'osman-coming-datepicker',
          'type'     => 'text',
          'title'    => __( 'Date', 'osman' ),
          'subtitle' => __( 'Date used in Counter.', 'osman' ),
          'desc'     => __( 'Release date(Format MM/DD/YY (e.g. 1x/2x/20xx)).', 'osman' ),
          'default'  => '05/25/2020',
        ),
        array(
          'id'       => 'osman-coming-days-txt',
          'type'     => 'text',
          'title'    => __( 'Text for Days', 'osman' ),
          'subtitle' => __( 'Used for the Days counter.', 'osman' ),
          'default'  => 'days'
        ),
        array(
          'id'                    => 'osman-coming-days-bg',
          'type'                  => 'background',
          'title'                 => __('Days Counter Background Color', 'osman'),
          'subtitle'              => __( 'Background Color for Days Counter.', 'osman' ),
          'preview'               => false,
          'background-size'       => false,
          'background-repeat'     => false,
          'background-attachment' => false,
          'background-position'   => false,
          'background-image'      => false,
          'default'               => array(
            'background-color' => '#ffa76c',
          ),
          'required'              => array('osman__custom_coming_soon', '=', '1'),
        ),
        array(
          'id'          => 'osman-coming-days-border-color',
          'type'        => 'color',
          'title'       => __( 'Days Counter Border Color', 'osman' ),
          'subtitle'    => __( 'Border Color for Days Counter.', 'osman' ),
          'default'     => '#fff',
          'required'    => array('osman__custom_coming_soon', '=', '1'),
        ),
        array(
          'id'       => 'osman-coming-hours-txt',
          'type'     => 'text',
          'title'    => __( 'Text for Hours', 'osman' ),
          'subtitle' => __( 'Used for the Hours counter.', 'osman' ),
          'default'  => 'hours'
        ),
        array(
          'id'                    => 'osman-coming-hours-bg',
          'type'                  => 'background',
          'title'                 => __('Hours Counter Background Color', 'osman'),
          'subtitle'              => __( 'Background Color for Hours Counter.', 'osman' ),
          'preview'               => false,
          'background-size'       => false,
          'background-repeat'     => false,
          'background-attachment' => false,
          'background-position'   => false,
          'background-image'      => false,
          'default'               => array(
            'background-color' => '#ff7149',
          ),
          'required'              => array('osman__custom_coming_soon', '=', '1'),
        ),
        array(
          'id'          => 'osman-coming-hours-border-color',
          'type'        => 'color',
          'title'       => __( 'Hours Counter Border Color', 'osman' ),
          'subtitle'    => __( 'Border Color for Hours Counter.', 'osman' ),
          'default'     => '#fff',
          'required'    => array('osman__custom_coming_soon', '=', '1'),
        ),
        array(
          'id'       => 'osman-coming-mins-txt',
          'type'     => 'text',
          'title'    => __( 'Text for Minutes', 'osman' ),
          'subtitle' => __( 'Used for the Minutes counter.', 'osman' ),
          'default'  => 'minutes'
        ),
        array(
          'id'                    => 'osman-coming-mins-bg',
          'type'                  => 'background',
          'title'                 => __('Hours Counter Background Color', 'osman'),
          'subtitle'              => __( 'Background Color for Hours Counter.', 'osman' ),
          'preview'               => false,
          'background-size'       => false,
          'background-repeat'     => false,
          'background-attachment' => false,
          'background-position'   => false,
          'background-image'      => false,
          'default'               => array(
            'background-color' => '#ea582f',
          ),
          'required'              => array('osman__custom_coming_soon', '=', '1'),
        ),
        array(
          'id'          => 'osman-coming-mins-border-color',
          'type'        => 'color',
          'title'       => __( 'Minutes Counter Border Color', 'osman' ),
          'subtitle'    => __( 'Border Color for Minutes Counter.', 'osman' ),
          'default'     => '#fff',
          'required'    => array('osman__custom_coming_soon', '=', '1'),
        ),

        array(
          'id'       => 'osman-coming-secs-txt',
          'type'     => 'text',
          'title'    => __( 'Text for Seconds', 'osman' ),
          'subtitle' => __( 'Used for the Seconds counter.', 'osman' ),
          'default'  => 'seconds'
        ),
        array(
          'id'                    => 'osman-coming-secs-bg',
          'type'                  => 'background',
          'output'                => array('.secs-count'),
          'title'                 => __('Seconds Counter Background Color', 'osman'),
          'subtitle'              => __( 'Background Color for Seconds Counter.', 'osman' ),
          'preview'               => false,
          'background-size'       => false,
          'background-repeat'     => false,
          'background-attachment' => false,
          'background-position'   => false,
          'background-image'      => false,
          'default'               => array(
            'background-color' => '#d44546',
          ),
          'required'              => array('osman__custom_coming_soon', '=', '1'),
        ),
        array(
          'id'          => 'osman-coming-secs-border-color',
          'type'        => 'color',
          'title'       => __( 'Seconds Counter Border Color', 'osman' ),
          'subtitle'    => __( 'Border Color for Seconds Counter.', 'osman' ),
          'default'     => '#fff',
		  'output'                => array('.secs-count:before'),
          'required'    => array('osman__custom_coming_soon', '=', '1'),
        ),
        
        array(
          'id'        => 'osman-social-coming-soon',
          'type'      => 'switch',
          'title'     => __('Show Social Media Links?', 'osman'),
          'subtitle'  => __('Toggle whether or not to show the social links.', 'osman'),
          'default'   => 1,
          'on'        => __( 'Yes', 'osman' ),
          'off'       => __( 'No', 'osman' ),
        ),
        )
    ) );
	
	 // Social Media
	 Redux::setSection( $opt_name, array(
    'title'     => __( 'Social Media', 'osman' ),
    'desc'      => __('Social Media management', 'osman'),
	'icon'      => 'el el-globe',
    'fields'    => array(
        array(
          'id'       => 'osman-social-media',
          'type'     => 'sortable',
          'title'    => __( 'Social Media Links', 'osman' ),
          'subtitle' => __( 'Define and reorder these links however you want.', 'osman' ),
          'desc'     => __( 'Leave empty a field if you don\'t want to display particular social media link.', 'osman' ),
          'label'    => true,
          'mode'     => 'text',
          'options'  => array(
            __( 'Facebook URL', 'osman' ) => '',
            __( 'Twitter URL', 'osman' )   => '',
            __( 'LinkedIn URL', 'osman' ) => '',
            __( 'Google+ URL', 'osman' ) => '',
            __( 'Instagram URL', 'osman' ) => '',
            __( 'Github URL', 'osman' ) => '',
            __( 'VK URL', 'osman' ) => '',
            __( 'YouTube URL', 'osman' ) => '',
            __( 'Pinterest URL', 'osman' ) => '',
            __( 'Tumblr URL', 'osman' ) => '',
            __( 'Dribbble URL', 'osman' ) => '',
            __( 'Vimeo URL', 'osman' ) => '',
            __( 'Flickr URL', 'osman' ) => '',
            __( 'Yelp URL', 'osman' ) => '',
          ),
          'default'  => array(
            __( 'Facebook URL', 'osman' )   => '#',
            __( 'Twitter URL', 'osman' )   => '#',
            __( 'LinkedIn URL', 'osman' ) => '#',
            __( 'Google+ URL', 'osman' ) => '#',
            __( 'Instagram URL', 'osman' ) => '#',
            __( 'Github URL', 'osman' ) => '#',
            __( 'VK URL', 'osman' ) => '',
            __( 'YouTube URL', 'osman' ) => '',
            __( 'Pinterest URL', 'osman' ) => '',
            __( 'Tumblr URL', 'osman' ) => '',
            __( 'Dribbble URL', 'osman' ) => '',
            __( 'Vimeo URL', 'osman' ) => '',
            __( 'Flickr URL', 'osman' ) => '',
            __( 'Yelp URL', 'osman' ) => '',
          ),
        ),
        array(
          'id'        => 'osman__notice-social-styling',
          'type'      => 'info',
          'style'     => 'warning',
          'icon'      => 'el el-brush',
          'title'     => __('Styling', 'osman'),
          'desc'      => __('The following styles affect on Social Links in Footer except 404 page.', 'osman')
        ),
        array(
          'id'        => 'osman__custom_social-media',
          'type'      => 'switch',
          'title'     => __('Enable advanced styling?', 'osman'),
          'subtitle'  => __('Add additional styling options.', 'osman'),
          'desc'      => __('Turn on to change colors, borders, link etc. for the Social Media Links.', 'osman'),
          'default'   => false,
          'on'        => __( 'Yes', 'osman' ),
          'off'       => __( 'No', 'osman' ),
        ),
        array(
          'id'        => 'osman-social-media-style',
          'type'      => 'select',
          'title'     => __('Footer Social Media Icons Style', 'osman'),
          'subtitle'  => __('Select the Social Media Icons style.', 'osman'),
          'options'   => array(
            'rounded'  => 'Rounded Icons',
            'squared' => 'Squared Icons',
          ),
          'default'   => 'rounded',
          'required'  => array('osman__custom_social-media', '=', '1'),
        ),
        array(
          'id'       => 'osman-footer-link-icon-color',
          'type'     => 'link_color',
          'title'    => __( 'Footer Social Icon Color', 'osman' ),
          'subtitle' => __( 'Color for Social Icons in Footer.', 'osman' ),
          'active'    => false,
          'output'   => array( '.footer-social-links > li > a' ),
          'default'  => array(
            'regular' => '#fff',
            'hover'   => '#fff',
          ),
          'required'  => array('osman__custom_social-media', '=', '1'),
        ),
        array(
          'id'                    => 'osman-footer-social-bg',
          'type'                  => 'background',
          'output'                => array('.footer-social-links > li > a'),
          'title'                 => __('Footer Social Icons Background Color', 'osman'),
          'subtitle'              => __('Background color for Social Icons in Footer.', 'osman'),
          'preview'               => false,
          'background-size'       => false,
          'background-repeat'     => false,
          'background-attachment' => false,
          'background-position'   => false,
          'background-image'      => false,
          'default'               => array(
            'background-color' => 'transparent',
          ),
          'required'              => array('osman__custom_social-media', '=', '1'),
        ),

        array(
          'id'                    => 'osman-footer-social-bg-hover',
          'type'                  => 'background',
          'output'                => array('.footer-social-links > li > a:hover'),
          'title'                 => __('Footer Social Icons Background on hover ', 'osman'),
          'subtitle'              => __('Background color for Social Icons in Footer.', 'osman'),
          'preview'               => false,
          'background-size'       => false,
          'background-repeat'     => false,
          'background-attachment' => false,
          'background-position'   => false,
          'background-image'      => false,
          'default'               => array(
            'background-color' => '#ff7149',
          ),
          'required'              => array('osman__custom_social-media', '=', '1'),
        ),

        array(
          'id'       => 'osman-footer-social-links-border',
          'type'     => 'border',
          'title'    => __( 'Footer Social Icons Border', 'osman' ),
          'subtitle' => __( 'Border options for Social Icons in Footer.', 'osman' ),
          'output'   => array( '.footer-social-links > li > a' ),
          'default'  => array(
            'border-color'  => '#b59ecf',
            'border-style'  => 'solid',
            'border-top'    => '2px',
            'border-right'  => '2px',
            'border-bottom' => '2px',
            'border-left'   => '2px'
          ),
          'required' => array('osman__custom_social-media', '=', '1'),
        ),

        array(
          'id'       => 'osman-footer-social-links-border-hover',
          'type'     => 'border',
          'title'    => __( 'Footer Social Icons Border on hover', 'osman' ),
          'subtitle' => __( 'Border options for Social Icons on hover in Footer.', 'osman' ),
          'output'   => array( '.footer-social-links > li > a:hover' ),
          'default'  => array(
            'border-color'  => '#ff7149',
            'border-style'  => 'solid',
            'border-top'    => '2px',
            'border-right'  => '2px',
            'border-bottom' => '2px',
            'border-left'   => '2px'
          ),
          'required' => array('osman__custom_social-media', '=', '1'),
        ),
      )
    ) );
	/*Advance Options*/
Redux::setSection( $opt_name, array(
	 'icon' => 'el el-icon-cogs',
    'icon_class' => 'el el-icon-large',
    'title' => __('Advanced Options', 'osman'),
    'desc'     => __('Advanced options for avanced users here', 'osman'),
    'fields' => array(
        array(
            'id'        => 'additional_codes',
            'icon'      => true,
            'type'      => 'info',
            'style'     => 'info',
            'raw'       => '<h4 style="margin: 3px;">'.__('Custom Codes','osman').'</h4>',
            ),
        array(
            'id'       => 'custom_css',
            'type'     => 'ace_editor',
            'title'    => __('Additional CSS', 'osman'),
            'subtitle' => __('Use this field to write or paste CSS code and modify default theme styling', 'osman'),
            'mode'     => 'css',
            'theme'    => 'monokai',
            'default' => ".example {\nmargin: 0 auto;\n}"
            ),
        array(
            'id'       => 'custom_js',
            'type'     => 'ace_editor',
            'title'    => __('Additional JavaScript', 'osman'),
            'subtitle' => __('Use this field to write or paste additional JavaScript code to this theme', 'osman'),
            'mode'     => 'javascript',
            'theme'    => 'chrome',
            'default' => "(function($){\n/* standard on load code goes here with $ prefix */\n})(jQuery);"
            ),
    )
    ) );
    /*
     * <--- END SECTIONS
     */
