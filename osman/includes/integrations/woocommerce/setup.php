<?php
/**
 * Setup
 */
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! is_admin() ) {
	add_action( 'wp_enqueue_scripts', 						'osman_wc_css', 20 );
}

add_action( 'wp', 											'osman_wc_disable_css' );
add_action( 'after_setup_theme', 							'woocommerce_support' );

// Layout
remove_action( 'woocommerce_before_main_content', 			'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 			'woocommerce_output_content_wrapper_end', 10 );
add_action( 'woocommerce_before_main_content', 				'osman_wc_before_content', 10 );
add_action( 'woocommerce_after_main_content', 				'osman_wc_after_content', 20 );

// Upsells
remove_action( 'woocommerce_after_single_product_summary', 	'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product_summary', 	'osman_wc_upsell_display', 15 );

// Related Products
add_filter( 'woocommerce_output_related_products_args', 	'osman_wc_related_products' );

// Custom place holder
add_filter( 'woocommerce_placeholder_img_src', 				'osman_wc_placeholder_img_src' );

// Products per page
add_filter( 'loop_shop_per_page', 							'osman_wc_loop_products', 20 );

//Products layout
add_action( 'wp',  											 'osman_wc_columns'  );

// Breadcrumb
remove_action( 'woocommerce_before_main_content', 			'woocommerce_breadcrumb', 20, 0 );

// Sidebar
remove_action( 'woocommerce_sidebar', 						'woocommerce_get_sidebar', 10 );

// Pagination / Search
remove_action( 'woocommerce_after_shop_loop', 				'woocommerce_pagination', 10 );
add_action( 'woocommerce_after_shop_loop', 					'osman_wc_pagination', 10 );

// Cart Fragments
if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '2.3', '>=' ) ) {
	add_filter( 'woocommerce_add_to_cart_fragments', 'osman_wc_header_add_to_cart_fragment' );
} else {
	add_filter( 'add_to_cart_fragments', 'osman_wc_header_add_to_cart_fragment' );
}

// Breadcrumbs
//add_filter( 'osman_breadcrumbs_trail', 						'osman_custom_breadcrumbs_trail_add_product_categories', 20 );

// Add stuff
add_action( 'woocommerce_before_shop_loop_item_title',		'osman_wc_product_loop_content_wrap_open', 5 );
add_action( 'woocommerce_after_shop_loop_item_title',		'osman_wc_product_loop_content_wrap_close', 25 );
add_action( 'woocommerce_before_shop_loop',					'osman_wc_product_loop_wrap_open', 40 );
add_action( 'woocommerce_after_shop_loop',					'osman_wc_product_loop_wrap_close', 5 );
add_action( 'woocommerce_archive_description',				'osman_wc_page_title', 1 );
add_action( 'woocommerce_archive_description',				'osman_wc_archive_description_wrap_open', 5 );
add_action( 'woocommerce_archive_description',				'osman_wc_archive_description_wrap_close', 15 );
add_action( 'woocommerce_before_shop_loop',					'osman_wc_archive_sorting_wrap_open', 10 );
add_action( 'woocommerce_before_shop_loop',					'osman_wc_archive_sorting_wrap_close', 35 );
add_action( 'woocommerce_before_shop_loop_item_title', 		'woocommerce_show_product_loop_sale_flash', 2 );
add_action( 'woocommerce_before_subcategory_title',			'osman_wc_subcat_title_wrap' );
add_action( 'woocommerce_after_subcategory_title',			'osman_wc_subcat_title_wrap_close' );

// Remove stuff
remove_action( 'woocommerce_before_shop_loop_item_title',	'woocommerce_template_loop_product_thumbnail', 10 );
add_filter( 'woocommerce_show_page_title', 					'__return_false' );
remove_action( 'woocommerce_before_shop_loop_item_title', 	'woocommerce_show_product_loop_sale_flash', 10 );

// Re-add stuff
add_action( 'woocommerce_before_shop_loop_item_title',		'woocommerce_template_loop_product_thumbnail', 1 );

// Customise stuff
add_filter( 'body_class',									'osman_wc_body_class' );

add_filter( 'body_class',									'osman_related_product_woocommerce_columns' );