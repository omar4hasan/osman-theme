<?php

/**
 * TGM Init Class
 */

include_once get_template_directory() . '/admin/tgm/class-tgm-plugin-activation.php';

function osman_register_required_plugins() {

	$plugins = array(
		
		array(
			'name'      => 'Price Tables',
			'slug'      => 'pricetable',
			'source'    => get_template_directory() . '/includes/plugins/pricetable.zip',
			'required'  => true,
			'version'   => '0.2.4'
		),
		array(
			'name' 		  => 'Contact Form 7',
			'slug' 		  => 'contact-form-7',
			'required' 	=> true,
		),
		array(
			'name' 		  => 'WooCommerce',
			'slug' 		  => 'woocommerce',
			'required' 	=> false,
		),
		array(
			'name' 		  => 'Breadcrumb NavXT',
			'slug' 		  => 'breadcrumb-navxt',
			'required' 	=> false,
		),
	);

	$config = array(
		'domain'         => OSMAN_THEME_NAME,         	        // Text domain - likely want to be the same as your theme.
		'default_path'   => '',                         // Default absolute path to pre-packaged plugins
    'parent_slug'    => 'plugins.php',
    'capability'     => 'manage_options',
		'menu'           => 'install-required-plugins', // Menu slug
		'has_notices'    => true,                       // Show admin notices or not
		'is_automatic'   => true,					   	          // Automatically activate plugins after installation or not
	);

	tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'osman_register_required_plugins' );
