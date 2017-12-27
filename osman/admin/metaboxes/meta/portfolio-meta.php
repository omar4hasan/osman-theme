<?php

/*-----------------------------------------------------------------------------------*/
/*	Portfolio Meta
/*-----------------------------------------------------------------------------------*/


add_action('add_meta_boxes', 'osman_metabox_portfolio');
function osman_metabox_portfolio(){
    
	
/*-----------------------------------------------------------------------------------*/
/*	Thumbnails Setting
/*-----------------------------------------------------------------------------------*/

$meta_box = array(
	'id' => 'osman-metabox-portfolio-settings',
	'title' =>  __('Portfolio Item Settings', 'osman'),
	'description' => __('Here you can configure how your portfolio item appear.', 'osman'),
	'post_type' => 'portfolio',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
					array( 
						'name' => __('Show title?', 'osman'),
						'desc' => __('Show your portfolio title url.', 'osman'),
						'id' => 'osman_portfolio_title',
						'type' => 'text',
						'std' => ''
						),
					array( 
						'name' => __('Author name', 'osman'),
						'desc' => __('Write your portfolio Author name.', 'osman'),
						'id' => 'osman_portfolio_author',
						'type' => 'text',
						'std' => ''
						),
					array( 
						'name' => __('Client Name', 'osman'),
						'desc' => __('Write your portfolio Client name.', 'osman'),
						'id' => 'osman_portfolio_client',
						'type' => 'text',
						'std' => ''
						),
					array( 
						'name' => __('Tools', 'osman'),
						'desc' => __('Write your portfolio Tools.', 'osman'),
						'id' => 'osman_portfolio_tools',
						'type' => 'text',
						'std' => ''
						),
					array( 
						'name' => __('Project url', 'osman'),
						'desc' => __('Write your portfolio Project url.', 'osman'),
						'id' => 'osman_portfolio_projecturl',
						'type' => 'text',
						'std' => ''
						),
);

$callback = create_function( '$post,$meta_box', 'osman_create_meta_box( $post, $meta_box["args"] );' );
add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box );
	

}