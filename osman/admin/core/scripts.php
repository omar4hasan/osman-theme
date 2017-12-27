<?php 
/**
* @package osman enqueued scripts
* @since osman 1.0
*
*/

/**
    Load needed scripts
**/

function osman_scripts() {
	global $post;
	wp_enqueue_script('osman-modernizr',      OSMAN_JS_URI . '/modernizr.min.js', 	array(), '2.8.3', true);
	
	//wp_enqueue_script('osman-jquery',      OSMAN_JS_URI . '/jquery-2.2.3.min.js', 	array(), '2.2.3', true);
	wp_enqueue_script('osman-tether-js',    OSMAN_JS_URI . '/tether.min.js', 	array('jquery'), '3.3.4', true);
	wp_enqueue_script('osman-bootstrap-js',    OSMAN_JS_URI . '/bootstrap.min.js', 	array('jquery'), '3.3.4', true);
	wp_register_script( 'flickr-feed', OSMAN_JS_URI . '/jquery.flickrfeed.js', array('jquery'), '1.0', true );
	// jquery.nicescroll + WOW.js
	wp_enqueue_script('osman-plugins',        OSMAN_JS_URI . '/plugins.min.js', 	array(), '1.1.0', true);
	wp_enqueue_script('osman-scripts',   	  OSMAN_JS_URI . '/scripts.min.js', 	array(), '1.1.0', true);
	
	wp_enqueue_script('osman-mixitup-js',    OSMAN_JS_URI . '/jquery.mixitup.min.js', 	array('jquery'), '2.1.11', true);
	wp_enqueue_script('osman-custom-scripts',   	  OSMAN_JS_URI . '/custom.js', 	array(), '1.1.0', true);
	wp_enqueue_script('osman-custom-scripts',   	  OSMAN_JS_URI . '/custom.js', 	array(), '1.1.0', true);
	wp_register_script( 'owl-carousel',OSMAN_JS_URI . '/owl.carousel.min.js', array(), '2.0.0', true );
	//sticky
	//wp_register_script( 'content-sticky',OSMAN_JS_URI . '/jquery.sticky.js', array(), '2.0.0', true );
	//wp_enqueue_script('content-sticky');

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script('keyboard-image-navigation', OSMAN_JS_URI . '/keyboard-image-navigation.js');
	}

	if ( (!is_admin()) && is_singular() && comments_open() && !is_front_page() && get_option('thread_comments')) { 
		wp_enqueue_script( 'comment-reply' ); 
	}

	// We dont need these in Frontpage
	if (!is_home()) { 
		wp_enqueue_script('osman-prettyphoto',     		OSMAN_JS_URI  . '/jquery.prettyPhoto.min.js',  array('jquery'), '3.1.6', true );
		wp_enqueue_style ('osman-prettyphoto-css',   	OSMAN_CSS_URI . '/prettyPhoto.min.css');
	}
    wp_register_style( 'owl-carousel', OSMAN_CSS_URI. '/owl.carousel.css', array(), false );
    
	//icon
	wp_enqueue_style( 'font-awesome', '//fontawesome.io/assets/font-awesome/css/font-awesome.css' );
   // wp_register_style( 'octicon-css', OSMAN_CSS_URI. '/icon/octicons.min.css', array(), false );
	//wp_enqueue_style('octicon-css',   		OSMAN_CSS_URI 	. '/icon/octicons.min.css');
	
	// Animate.css - font-awesome
	wp_enqueue_style('osman-all-css',   		OSMAN_CSS_URI 	. '/all.min.css');
	// Load Bootstrap
	wp_enqueue_style('osman-bootstrap', 		OSMAN_CSS_URI   . '/bootstrap.min.css');
	//wp_enqueue_style('osman-animation', 		OSMAN_CSS_URI   . '/animate.css');
	// Load main stylesheet
	wp_enqueue_style( 'osman-style', get_stylesheet_uri() );
	
	// Load Carousel styles and scripts if carousel-based shortcodes used
		if ( is_page() && (( preg_match( '#\[ *osman_partners_carousel([^\]])*\]#i', $post->post_content )) || ( preg_match( '#\[ *osman_team_carousel([^\]])*\]#i', $post->post_content )))) {
			wp_enqueue_style('owl-carousel');
			wp_enqueue_script('owl-carousel');
		}
}

add_action('wp_enqueue_scripts', 'osman_scripts');


function osman_IE() {
	global $wp_scripts;
	wp_enqueue_script( 'osman-html5shiv', 		OSMAN_JS_URI 	. '/html5shiv.js', array(), '3.7.2', false );
	$wp_scripts->add_data( 'osman-html5shiv', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'osman_IE' );

/**
	 * Add admin CSS
	 */
function admin_css() {

		$theme_info = wp_get_theme();
		echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/includes/css/admin_css.css?vesion=' . $theme_info->get( 'Version' ) . '">';
		echo '<style type="text/css">.widget input { border-color: #DFDFDF !important; }</style>';

	}
	add_action( 'admin_head',  'admin_css' );
	
	
