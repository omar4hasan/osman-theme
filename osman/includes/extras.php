<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package osman
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function osman_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'osman_body_classes' );



// Bootstrap Style Breadcrumbs
require_once OSMAN_THEME_DIR . '/includes/breadcrumbs.php';



/**
 * Random String
 */
function randomStr($length) {
	$key = null;
    $keys = array_merge(range(0,9), range('a', 'z'));
    for($i=0; $i < $length; $i++) {
      $key .= $keys[array_rand($keys)];
    }
  return $key;
}



/**
 * Adds class to the array of body classes to hide Header Topbar.
 */
function osman_hide_topbar( $classes ) {
  global $post;

	if ( is_page() || is_single() ) {
        $header_top_bar = get_post_meta( $post->ID, 'osman_top_bar', true );
        if ( $header_top_bar == 'yes' ){
          $classes[] = 'body-hide-topbar';
        }else{$classes[] = 'body-show-topbar';}
	}

  return $classes;
}
add_filter( 'body_class', 'osman_hide_topbar' );

/**
 * Get all sliders in array
 * @result alias => title
 */

if ( !function_exists( 'all_rev_sliders_in_array' ) ) {
    function all_rev_sliders_in_array(){
      if (class_exists('RevSlider')) {
        $theslider     = new RevSlider();
        $arrSliders = $theslider->getArrSliders();
        $arrA     = array();
        $arrT     = array();
        
        foreach($arrSliders as $slider){
          $arrA[]     = $slider->getAlias();
          $arrT[]     = $slider->getTitle();
        }
        if($arrA && $arrT){
          $result = array_combine($arrA, $arrT);
        }
        else {
          $result = false;
        }
        return $result;
      }
    }
}

/**
 * Sample Data Import function
 */

if ( !function_exists( 'osman_wbc_extended' ) ) {
	function osman_wbc_extended( $demo_active_import , $demo_directory_path ) {

		reset( $demo_active_import );
		$current_key = key( $demo_active_import );

    // Import Revolution Sliders
    if ( class_exists( 'RevSlider' ) ) {
      $wbc_sliders_array = array(
        'default'     => array('text-slider.zip','ipad-slider.zip','infographic-header.zip','iphone-slider.zip'),
        'application' => array('osman-app-slider.zip'),
        'movie'       => array('osman-movie-slider.zip'),
        'shop'        => array('osman-wooshop-slider.zip')
      );

      if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists(    $demo_active_import[$current_key]['directory'], $wbc_sliders_array ) ) {
        $wbc_slider_import = $wbc_sliders_array[$demo_active_import[$current_key]['directory']];

        if( is_array( $wbc_slider_import ) ){
          foreach ($wbc_slider_import as $slider_zip) {
            if ( !empty($slider_zip) && file_exists( $demo_directory_path.$slider_zip ) ) {
              $slider = new RevSlider();
              $slider->importSliderFromPost( true, true, $demo_directory_path.$slider_zip );
            }
          }
        } else{
          if ( file_exists( $demo_directory_path.$wbc_slider_import ) ) {
            $slider = new RevSlider();
            $slider->importSliderFromPost( true, true, $demo_directory_path.$wbc_slider_import );
          }
        }
      }
    }


		// Setting Menus (Demo Default)
		$wbc_menu_array = array( 'default' );

		if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && in_array( $demo_active_import[$current_key]['directory'], $wbc_menu_array ) ) {
			$primary_menu = get_term_by( 'name', esc_html__( 'Primary Menu', 'osman' ), 'nav_menu' );
			$onepage_menu = get_term_by( 'name', esc_html__( 'One Page Menu', 'osman' ), 'nav_menu' );

			if ( isset( $primary_menu->term_id ) ) {
				set_theme_mod( 'nav_menu_locations', array(
						'primary' => $primary_menu->term_id,
						'onepage' => $onepage_menu->term_id
					)
				);
			}

		}

        // Setting Menus (Demo - Application)
        $wbc_menu_array_app = array( 'application' );

        if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && in_array( $demo_active_import[$current_key]['directory'], $wbc_menu_array_app ) ) {
            $primary_menu = get_term_by( 'name', esc_html__( 'Primary Menu', 'osman' ), 'nav_menu' );
            $onepage_menu = get_term_by( 'name', esc_html__( 'One Page Menu', 'osman' ), 'nav_menu' );

            if ( isset( $primary_menu->term_id ) ) {
                set_theme_mod( 'nav_menu_locations', array(
                        'primary' => $primary_menu->term_id,
                        'onepage' => $onepage_menu->term_id
                    )
                );
            }

        }

        // Setting Menus (Demo - Movie)
        $wbc_menu_array_movie = array( 'movie' );

        if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && in_array( $demo_active_import[$current_key]['directory'], $wbc_menu_array_movie ) ) {
            $primary_menu = get_term_by( 'name', esc_html__( 'Primary Menu', 'osman' ), 'nav_menu' );

            if ( isset( $primary_menu->term_id ) ) {
                set_theme_mod( 'nav_menu_locations', array(
                        'primary' => $primary_menu->term_id
                    )
                );
            }

        }

        // Setting Menus (Demo - Shop)
        $wbc_menu_array_shop = array( 'shop' );

        if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && in_array( $demo_active_import[$current_key]['directory'], $wbc_menu_array_shop ) ) {
            $primary_menu = get_term_by( 'name', esc_html__( 'Primary Menu', 'osman' ), 'nav_menu' );

            if ( isset( $primary_menu->term_id ) ) {
                set_theme_mod( 'nav_menu_locations', array(
                        'primary' => $primary_menu->term_id
                    )
                );
            }

        }

		// Set HomePage
		$wbc_home_pages = array(
			'default' => 'Home',
            'application' => 'Home',
            'movie' => 'Home',
            'shop' => 'Home',
		);

		if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_home_pages ) ) {
			$page = get_page_by_title( $wbc_home_pages[$demo_active_import[$current_key]['directory']] );
			if ( isset( $page->ID ) ) {
				update_option( 'page_on_front', $page->ID );
				update_option( 'show_on_front', 'page' );
			}
		}

	}
	add_action( 'wbc_importer_after_content_import', 'osman_wbc_extended', 10, 2 );
}
