<?php

/*-----------------------------------------------------------------------------------*/
/*	Team Meta
/*-----------------------------------------------------------------------------------*/

add_action('add_meta_boxes', 'osman_metabox_page_team');

function osman_metabox_page_team(){
    
/*-----------------------------------------------------------------------------------*/
/*	Page Team Header Setting Meta
/*-----------------------------------------------------------------------------------*/

$meta_box = array(
	'id' => 'team-metabox-page-header',
	'title' => __('Team Page Header Settings', 'osman'),
	'description' => __('Here you can configure how your page header will appear.', 'osman'),
	'post_type' => 'team',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
					array( 
						'name' => __('Show title?', 'osman'),
						'desc' => __('Select your page title to show', 'osman'),
						'id' => 'osman_team_title',
						'type' => 'select',
						'options' => array(
						'yes' => __( 'Yes', 'osman' ),
						'no'  => __( 'No', 'osman' )
									),
						'std' => 'yes'
						),
					array( 
						'name' => __('position', 'osman'),
						'desc' => __('Select your team member position', 'osman'),
						'id' => 'osman_team_position',
						'type' => 'text',
						'std' => ''
						),
					array( 
						'name' => __('excerpt', 'osman'),
						'desc' => __('write your team member Description', 'osman'),
						'id' => 'osman_team_excerpt',
						'type' => 'textarea',
						'std' => ''
					),
					array( 
						'name' => __('Email Address', 'osman'),
						'desc' => __('write your team member Email', 'osman'),
						'id' => 'osman_team_email',
						'type' => 'text',
						'std' => ''
					),
					array( 
						'name' => __('Facebook Link', 'osman'),
						'desc' => __('Enter your team member facebook', 'osman'),
						'id' => 'osman_team_facebook',
						'type' => 'text',
						'std' => ''
					),
					array( 
						'name' => __('twitter Link', 'osman'),
						'desc' => __('Enter your team member twitter', 'osman'),
						'id' => 'osman_team_twitter',
						'type' => 'text',
						'std' => ''
					),
					array( 
						'name' => __('linkedin Link', 'osman'),
						'desc' => __('Enter your team member linkedin', 'osman'),
						'id' => 'osman_team_linkedin',
						'type' => 'text',
						'std' => ''
					),
					array( 
						'name' => __('Google Link', 'osman'),
						'desc' => __('Enter your team member gplus', 'osman'),
						'id' => 'osman_team_gplus',
						'type' => 'text',
						'std' => ''
					),
					array( 
						'name' => __('First Skill Label', 'osman'),
						'desc' => __('Enter your team member Skill Label', 'osman'),
						'id' => 'osman_team_skill1',
						'type' => 'text',
						'std' => ''
					),
					array( 
						'name' => __('First Skill Value', 'osman'),
						'desc' => __('Enter your team member Skill number from 0 to 100', 'osman'),
						'id' => 'osman_team_value1',
						'type' => 'text',
						'std' => ''
					),
					array( 
						'name' => __('First Skill - Color', 'osman'),
						'desc' => __('Enter your team member Skill color', 'osman'),
						'id' => 'osman_team_color1',
						'type' => 'select',
						'std' => '',
						'options' => array(
							"primary" => __( 'Primary','osman' ),
							"alt" => __('Primary Accent', 'osman'),
							"danger" => __('Danger', 'osman'),
							"warning" => __('Warning', 'osman'),
							"info" => __('Info', 'osman'),
							"success" => __('Success', 'osman')
						)
					),
					array( 
						'name' => __('First Skill Icon', 'osman'),
						'desc' => __('Enter FontAwesome class name, e.g fa-info.', 'osman'),
						'id' => 'osman_team_icon1',
						'type' => 'text',
						'std' => 'fa-info'
					),
					
					array( 
						'name' => __('Second Skill Label', 'osman'),
						'desc' => __('Enter your team member Skill Label', 'osman'),
						'id' => 'osman_team_skill2',
						'type' => 'text',
						'std' => ''
					),
					array( 
						'name' => __('Second Skill Value', 'osman'),
						'desc' => __('Enter your team member Skill number from 0 to 100', 'osman'),
						'id' => 'osman_team_value2',
						'type' => 'text',
						'std' => ''
					),
					array( 
						'name' => __('Second Skill - Color', 'osman'),
						'desc' => __('Enter your team member Skill color', 'osman'),
						'id' => 'osman_team_color2',
						'type' => 'select',
						'std' => '',
						'options' => array(
							"primary" => __( 'Primary','osman' ),
							"alt" => __('Primary Accent', 'osman'),
							"danger" => __('Danger', 'osman'),
							"warning" => __('Warning', 'osman'),
							"info" => __('Info', 'osman'),
							"success" => __('Success', 'osman')
						)
					),
					array( 
						'name' => __('Second Skill Icon', 'osman'),
						'desc' => __('Enter FontAwesome class name, e.g fa-info.', 'osman'),
						'id' => 'osman_team_icon2',
						'type' => 'text',
						'std' => 'fa-info'
					),
					array( 
						'name' => __('Third Skill Label', 'osman'),
						'desc' => __('Enter your team member Skill Label', 'osman'),
						'id' => 'osman_team_skill3',
						'type' => 'text',
						'std' => ''
					),
					array( 
						'name' => __('Third Skill Value', 'osman'),
						'desc' => __('Enter your team member Skill number from 0 to 100', 'osman'),
						'id' => 'osman_team_value3',
						'type' => 'text',
						'std' => ''
					),
					array( 
						'name' => __('Third Skill1 - Color', 'osman'),
						'desc' => __('Enter your team member Skill color', 'osman'),
						'id' => 'osman_team_color3',
						'type' => 'select',
						'std' => '',
						'options' => array(
							"primary" => __( 'Primary','osman' ),
							"alt" => __('Primary Accent', 'osman'),
							"danger" => __('Danger', 'osman'),
							"warning" => __('Warning', 'osman'),
							"info" => __('Info', 'osman'),
							"success" => __('Success', 'osman')
						)
					),
					array( 
						'name' => __('Third Skill Icon', 'osman'),
						'desc' => __('Enter FontAwesome class name, e.g fa-info.', 'osman'),
						'id' => 'osman_team_icon3',
						'type' => 'text',
						'std' => 'fa-info'
					),
					array( 
						'name' => __('Fourth Skill Label', 'osman'),
						'desc' => __('Enter your team member Skill Label', 'osman'),
						'id' => 'osman_team_skill4',
						'type' => 'text',
						'std' => ''
					),
					array( 
						'name' => __('Fourth Skill Value', 'osman'),
						'desc' => __('Enter your team member Skill number from 0 to 100', 'osman'),
						'id' => 'osman_team_value4',
						'type' => 'text',
						'std' => ''
					),
					array( 
						'name' => __('Fourth Skill1 - Color', 'osman'),
						'desc' => __('Enter your team member Skill color', 'osman'),
						'id' => 'osman_team_color4',
						'type' => 'select',
						'std' => '',
						'options' => array(
							"primary" => __( 'Primary','osman' ),
							"alt" => __('Primary Accent', 'osman'),
							"danger" => __('Danger', 'osman'),
							"warning" => __('Warning', 'osman'),
							"info" => __('Info', 'osman'),
							"success" => __('Success', 'osman')
						)
					),
					array( 
						'name' => __('Fourth Skill Icon', 'osman'),
						'desc' => __('Enter FontAwesome class name, e.g fa-info.', 'osman'),
						'id' => 'osman_team_icon4',
						'type' => 'text',
						'std' => 'fa-info'
					),
		
	)
);
$callback = create_function( '$post,$meta_box', 'osman_create_meta_box( $post, $meta_box["args"] );' );
add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box );
	

}
