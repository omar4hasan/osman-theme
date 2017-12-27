<?php
/**
 * osman - setup functions and definitions
 * 
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 * 
 * @package osman
 * @author Omar Hasan http://www.osmantheme.com
 * @copyright Copyright (c) 2016, osman
 * @license http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @since osman 1.0
 *
 */

define('OSMAN_THEME_NAME', 'osman');
define('OSMAN_THEME_SLUG', 'osman');
define('OSMAN_THEME_VERSION', '1.0');
define('OSMAN_THEME_OPTIONS', 'osman_settings');
define('OSMAN_THEME_DIR', get_template_directory());
define('OSMAN_THEME_URI', get_template_directory_uri());
define('OSMAN_JS_URI',  OSMAN_THEME_URI . '/includes/js');
define('OSMAN_CSS_URI', OSMAN_THEME_URI . '/includes/css');
define('OSMAN_IMG_DIR', OSMAN_THEME_DIR . '/images');
define('OSMAN_IMG_URI', OSMAN_THEME_URI . '/images');
define('OSMAN_PLUGIN_DIR', OSMAN_THEME_DIR . '/includes/plugins');
define('OSMAN_PLUGIN_URI', OSMAN_THEME_URI . '/includes/plugins');


if ( ! isset( $content_width )) {$content_width = 669; }

/**
 * Set the content width for full width pages with no sidebar.
 **/
function osman_content_width() {
  if ( is_page_template( 'page-fullwidth.php' ) || is_page_template( 'front-page.php' ) ) {
    global $content_width;
    $content_width = 1170;
  }
}
add_action( 'template_redirect', 'osman_content_width' );

/**
 *Theme setup
 **/

if ( !function_exists( 'osman_setup' ) ) {

  function osman_setup() {
	//add_theme_support( 'woocommerce' );
    add_theme_support( 'automatic-feed-links');
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-formats', array( 'audio', 'gallery', 'image', 'video' ));
    add_theme_support( 'post-thumbnails');
    load_theme_textdomain( 'osman', OSMAN_THEME_DIR . '/languages' );
    add_editor_style( OSMAN_CSS_URI . '/editor-style.css' );

    // Register Menus
    register_nav_menus(
      array(
        'primary' => __( 'Primary', 'osman' ),
        'osman-push-menu'=> __( 'PushMenu', 'osman' ),
        'osman-footer-menu'=> __( 'Footer Menu', 'osman' ),
		'one-page'=>__('One Page','osman')
        ) 
      );

    //add image sizes
    add_image_size('osman-featured_image', 669, 272, true);
    add_image_size('osman-small-thumb',  50, 50, true);
    add_image_size('osman-full-size', 9999, 9999, false);
  }
}

add_action( 'after_setup_theme', 'osman_setup' );

/**
  Title backwards compatibility for old WP versions
*/
if ( ! function_exists( '_wp_render_title_tag' ) ) {
  function theme_slug_render_title() { ?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php }
  add_action( 'wp_head', 'theme_slug_render_title' );
}

/*
*Getting post thumbnail url
*/
function osman_get_thumb_url($pots_ID){
  return wp_get_attachment_url( get_post_thumbnail_id( $pots_ID ) );
}

/*
* Osman Styles and Scripts 
*/ 
require_once OSMAN_THEME_DIR . '/admin/core/scripts.php';

// Custom functions & snippets
require_once OSMAN_THEME_DIR . '/admin/core/clean.php';
require_once OSMAN_THEME_DIR . '/admin/core/snippets.php';
/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/extras.php';
require_once OSMAN_THEME_DIR . '/admin/core/jetpack.php';


// Bootstrap nav walker
require_once OSMAN_THEME_DIR . '/includes/navbar.php';
require_once OSMAN_THEME_DIR . '/includes/onepage-navbar.php';

// osman Sidebars, widgets and menus
require_once OSMAN_THEME_DIR . '/admin/core/register.php';

// Bootstrap Pagination
require_once OSMAN_THEME_DIR . '/includes/bootstrap-pagination.php';

// Bootstrap Style Breadcrumbs
require_once OSMAN_THEME_DIR . '/includes/breadcrumbs.php';

// Custom template tags
require_once OSMAN_THEME_DIR . '/includes/template-tags.php';

// Social share
require_once OSMAN_THEME_DIR . '/includes/social-share.php';
require_once OSMAN_THEME_DIR . '/includes/sharebox.php';

// Required Redux framework functions
require_once OSMAN_THEME_DIR . '/admin/theme-options.php';

/**
 * Must-use Plugins
 */
include_once OSMAN_PLUGIN_DIR . '/strx-magic-floating-sidebar-maker/strx-magic-floating-sidebar-maker.php';

/*Add Theme Option into AdminBar*/

require_once OSMAN_THEME_DIR . '/admin/core/class-osman-admin.php';
add_theme_option();

/**
 * Page Preloader
 */
if ( ! function_exists('osman_page_preloader')) {
	function osman_page_preloader() {
		$osman_data = osman_get_option('osman-pre-loader');

		// Check if Preloader enabled
		if ( $osman_data=='1' ) { ?>
		<div class="page-loader">
			<div class="loader-inner">
				<div class="spinner-layer spinner-blue-only">
				  <div class="circle-clipper left">
					<div class="circle"></div>
				  </div><div class="gap-patch">
					<div class="circle"></div>
				  </div><div class="circle-clipper right">
					<div class="circle"></div>
				  </div>
				</div>
			</div>
		</div>
		<?php }
	}
}
add_action( 'osman_before_body_content', 'osman_page_preloader' );



define('OSMAN_METABOX_DIRECTORY', get_template_directory_uri() . '/admin/metaboxes/');
/*-----------------------------------------------------------------------------------*/
/*	Meta Config
/*-----------------------------------------------------------------------------------*/

function enqueue_media(){
	
	//enqueue the correct media scripts for the media library 
	$wp_version = floatval(get_bloginfo('version'));
	
	if ( $wp_version < "3.5" ) {
	    wp_enqueue_script(
	        'redux-opts-field-upload-js', 
	        OSMAN_METABOX_DIRECTORY . 'assets/upload/field_upload_3_4.js', 
	        array('jquery', 'thickbox', 'media-upload'),
	        time(),
	        true
	    );
	    wp_enqueue_style('thickbox');// thanks to https://github.com/rzepak
	} else {
	    wp_enqueue_script(
	        'redux-opts-field-upload-js', 
	        OSMAN_METABOX_DIRECTORY . 'assets/upload/field_upload.js', 
	        array('jquery'),
	        time(),
	        true
	    );
	    wp_enqueue_script(
	        'redux-field-gallery-js', 
	        OSMAN_METABOX_DIRECTORY . 'assets/gallery/field_gallery.js', 
	        array('jquery'),
	        time(),
	        true
	    );

	 	wp_enqueue_style( 'wp-color-picker' );
	 	
		wp_enqueue_script(
			'redux-field-color-js', 
			OSMAN_METABOX_DIRECTORY . 'assets/color/field_color.js',
			array( 'jquery', 'wp-color-picker' ),
			time(),
			true
		);
		wp_enqueue_style(
			'redux-field-color-css', 
			OSMAN_METABOX_DIRECTORY . 'assets/color/field_color.css', 
			time(),
			true
		);
	    wp_enqueue_media();
	}
	
}

//Meta Styling
function  osman_metabox_styles() {
	wp_enqueue_style('osman_meta_css', OSMAN_METABOX_DIRECTORY .'assets/css/osman_meta.css');
}

//Meta Scripts
function osman_metabox_scripts() {
	wp_register_script('osman-upload', OSMAN_METABOX_DIRECTORY .'assets/js/osman-meta.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('osman-upload');
	wp_localize_script('redux-opts-field-upload-js', 'redux_upload', array('url' => OSMAN_METABOX_DIRECTORY .'assets/upload/blank.png'));
}
add_action('admin_enqueue_scripts', 'osman_metabox_scripts');
add_action('admin_enqueue_scripts', 'osman_metabox_styles');
add_action('admin_enqueue_scripts', 'enqueue_media');

//Meta Core functions
include("admin/metaboxes/meta/meta-config.php");

// Page Meta
include("admin/metaboxes/meta/page-meta.php");

// team Meta
include("admin/metaboxes/meta/team-meta.php");

//partner Meta
include("admin/metaboxes/meta/partner-meta.php");

// slider Header Meta
include("admin/metaboxes/meta/slider-meta.php");

//woocommerce integration
include("includes/theme-plugin-integrations.php");

/**
 * Custom Widgets
 */

// Flickr Widget
include get_template_directory() . '/includes/widgets/widget-flickr.php';

// Recent Post (Slider) Widget
include get_template_directory() . '/includes/widgets/widget-recent-posts.php';

// Load Carousel scripts for Recent Posts Widget (hooked in inc/widgets/widget-recent-posts.php by wp_enqueue_scripts)
if(!function_exists('osman_carousel_widget_load')) {
	function osman_carousel_widget_load () {
		wp_enqueue_style('owl-carousel');
		wp_enqueue_script('owl-carousel');
	}
}

/**
 * Load TGMPA
 */
require_once get_template_directory() . '/admin/tgm/tgm-init.php';
