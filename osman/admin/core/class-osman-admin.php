<?php
/**
 * A class to manage various stuff in the WordPress admin area.
 *
 * @package Osman
 * @subpackage Includes
 * @since 3.8.0
 */
class Osman_Admin {
	
	/**
	*Singleton class itself has been created and stored in a private class variable.
	**/
	private static $_instance = null;
	
	/**
	 * Construct the admin object.
	 *
	 * @since 3.9.0
	 *
	 */
	public function __construct() {
		add_action( 'wp_before_admin_bar_render', array( $this, 'add_wp_toolbar_menu' ) );
	}

	

	/**
	 * Create the admin toolbar menu items.
	 *
	 * @since 3.8.0
	 */
	public function add_wp_toolbar_menu() {
		global $wp_admin_bar;
		if ( current_user_can( 'edit_theme_options' ) ) {
			$osman_parent_menu_title = '<span class="wo-icon"></span><span class="wo-label">Osman</span>';
			$this->add_wp_toolbar_menu_item( $osman_parent_menu_title, false, admin_url( 'admin.php?page=osman_options' ), array( 'class' => 'osman-menu' ), OSMAN_THEME_NAME );
		}
		}

	/**
	 * Add the top-level menu item to the adminbar.
	 *
	 * @since 3.8.0
	 */
	public function add_wp_toolbar_menu_item( $title, $parent = false, $href = '', $custom_meta = array(), $custom_id = '' ) {

		global $wp_admin_bar;

		if ( current_user_can( 'edit_theme_options' ) ) {
			if ( ! is_super_admin() || ! is_admin_bar_showing() ) {
				return;
			}

			// Set custom ID
			if ( $custom_id ) {
				$id = $custom_id;
			} else { // Generate ID based on $title
				$id = strtolower( str_replace( ' ', '-', $title ) );
			}

			// links from the current host will open in the current window
			$meta = strpos( $href, site_url() ) !== false ? array() : array( 'target' => '_blank' ); // external links open in new tab/window
			$meta = array_merge( $meta, $custom_meta );

			$wp_admin_bar->add_node( array(
				'parent' => $parent,
				'id'     => $id,
				'title'  => $title,
				'href'   => $href,
				'meta'   => $meta,
			) );
		}

	}
	/**
	*Singleton static function (static functions are essentially globally accessible methods) with public scope which can be called from any scope as a result. 
	**/
	public static function getInstance() {
    if(! (self::$_instance instanceof Osman_Admin)) {
        self::$_instance = new Osman_Admin();
    }   
 
    return self:: $_instance;
	}


}
function add_theme_option(){
	return Osman_Admin::getInstance();
}
// Omit closing PHP tag to avoid "Headers already sent" issues.
