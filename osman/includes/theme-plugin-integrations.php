<?php
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}
/**
 * Contains checks to see if plugins are active and then loads logic accordingly
 */
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Checks if plugins are activated and loads logic accordingly
 * @uses  class_exists() detect if a class exists
 * @uses  function_exists() detect if a function exists
 * @uses  defined() detect if a constant is defined
 */


/**
 * WooCommerce
 * http://wordpress.org/plugins/woocommerce/
 */
if ( is_woocommerce_activated() ) {
	require_once( get_template_directory() . '/includes/integrations/woocommerce/setup.php' );
	require_once( get_template_directory() . '/includes/integrations/woocommerce/template.php' );
	require_once( get_template_directory() . '/includes/integrations/woocommerce/functions.php' );
}

