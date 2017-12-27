<?php

/*-----------------------------------------------------------------------------------*/
/*	Portfolio Meta
/*-----------------------------------------------------------------------------------*/


add_action('add_meta_boxes', 'osman_metabox_partner');
function osman_metabox_partner(){
    
	
/*-----------------------------------------------------------------------------------*/
/*	Thumbnails Setting
/*-----------------------------------------------------------------------------------*/

$meta_box = array(
	'id' => 'az-metabox-portfolio-settings',
	'title' =>  __('Portfolio Item Settings', 'osman'),
	'description' => __('Here you can configure how your partner item appear.', 'osman'),
	'post_type' => 'partners',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
					array( 
						'name' => __('Partner URL', 'osman'),
						'desc' => __('Write your partner url.', 'osman'),
						'id' => 'osman_partner_url',
						'type' => 'text',
						'std' => ''
						),
)		
);

$callback = create_function( '$post,$meta_box', 'osman_create_meta_box( $post, $meta_box["args"] );' );
add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box );
}
