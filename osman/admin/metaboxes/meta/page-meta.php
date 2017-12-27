<?php 
add_action('add_meta_boxes', 'osman_metabox_page');

function osman_metabox_page(){
    
/*-----------------------------------------------------------------------------------*/
/*	Page Header Setting Meta
/*-----------------------------------------------------------------------------------*/

// Revolution Slider
if (is_plugin_active('revslider/revslider.php')) {
	global $wpdb;
	$rs = $wpdb->get_results( 
	"SELECT id, title, alias
	FROM ".$wpdb->prefix."revslider_sliders
	ORDER BY id ASC LIMIT 100");
	$revsliders = array();
	if ($rs) {
	foreach ( $rs as $slider ) {
	  $revsliders[$slider->alias] = $slider->alias;
	}
	} else {
	$revsliders["No sliders found"] = 0;
	}
} else {
	$revsliders["No Plugin Installed"] = null;
}
	$args = array( 'post_type' => 'osmanslider','posts_per_page'=>-1);
	$myposts = get_posts( $args );
	$carousel = array();
	foreach ( $myposts as $post ) : 
	$carousel[$post->ID] = $post->post_title;	
	endforeach;

$post_types = array('page');
$meta_box = array(
	'id' => 'osman-metabox-page-header',
	'title' => __('Page Settings', 'osman'),
	'description' => __('Here you can configure how your page will appear.', 'osman'),
	'post_type' => $post_types,
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
	array( 
			'name' => __('Select header container layout', 'osman'),
			'desc' => __('Choose Header layout.', 'osman'),
			'id' => 'osman_pageheader_layout',
			'type' => 'select',
			'std' => 'container',
			'options' => array(
				'boxed' => __('Boxed', 'osman'),
				'wide'  => __('Wide', 'osman'),
				'full'  => __('Full Width', 'osman')
			)
		),
		array( 
			'name' => __('Select Page container layout', 'osman'),
			'desc' => __('Choose content layout.', 'osman'),
			'id' => 'osman_container_layout',
			'type' => 'select',
			'std' => 'container',
			'options' => array(
				'boxed' => __('Boxed', 'osman'),
				'wide'  => __('Wide', 'osman'),
				'full'  => __('Full Width', 'osman')
			)
		),
	
		array( 
			'name' => __('Select Page Layout', 'osman'),
			'desc' => __('Choose a layout for the page.', 'osman'),
			'id' => 'osman_sidebar',
			'type' => 'select',
			'std' => 'right',
			'options' => array(
				'right' => __('Right Sidebar', 'osman'),
				'left'  => __('Left Sidebar', 'osman'),
				'none'  => __('No Sidebar(Full Width)', 'osman')
			)
		),
		array( 
			'name' => __('Hide Top Bar', 'osman'),
			'desc' => __('Show or hide Header Top Bar on the page.', 'osman'),
			'id' => 'osman_top_bar',
			'type' => 'select',
			'std' => 'no',
			'options' => array(
				"no" => __('No', 'osman'),
				"yes" => __('Yes', 'osman')
			)
		),
		array( 
			'name' => __('Show title/Breadcrumb?', 'osman'),
			'desc' => __('Show Title/Breadcrumb on the page.', 'osman'),
			'id' => 'osman_title',
			'type' => 'select',
			'std' => 'yes',
			'options' => array(
				"yes" => __('Yes', 'osman'),
				"no" => __('No', 'osman')
			)
		),
		array( 
			'name' => __('Show page title?', 'osman'),
			'desc' => __('Show page Title.', 'osman'),
			'id' => 'osman_page_title',
			'type' => 'select',
			'std' => 'yes',
			'options' => array(
				"yes" => __('Yes', 'osman'),
				"no" => __('No', 'osman')
			)
		),
		
		array( 
			'name' => __('Slider Alias', 'osman'),
			'desc' => __('Select your Slider Alias for the slider that you want to show.', 'osman'),
			'id' => 'osman_slider_type',
			'type' => 'select_slider',
			'options' => array(
				1 => __( 'Revolution', 'osman' ),
				2=> __( 'Carousel','osman' ),
			),
			'std' => ''
		),
		array( 
			'name' => __('Revslider Slider Alias', 'osman'),
			'desc' => __('Select your Revslider Slider Alias for the slider that you want to show.', 'osman'),
			'id' => 'osman_revslider_slider',
			'type' => 'select',
			'options' => $revsliders,
			'std' => ''
		),
		array( 
			'name' => __('Bootstrap Carousel Slider Alias', 'osman'),
			'desc' => __('Select your Bootstrap Carousel Slider Alias for the slider that you want to show.', 'osman'),
			'id' => 'osman_bootstrap_carousel_slider',
			'type' => 'select',
			'options' =>$carousel,			
			'std' => ''
		),
		array( 
			'name' => __('One Page Include', 'osman'),
			'desc' => __('Enable or Disable the one Page.', 'osman'),
			'id' => 'osman_onepage_settings',
			'type' => 'select',
			'std' => 'disabled',
			'options' => array(
				"disabled" => "Disabled",
				"enabled" => "Enabled",
				
			)
		),
	)
);
$callback = create_function( '$post,$meta_box', 'osman_create_meta_box( $post, $meta_box["args"] );' );
foreach( $post_types as $post_type) {
    add_meta_box(
        $meta_box['id'],
		$meta_box['title'],
		$callback,
		$post_type,
        $meta_box['context'],
		$meta_box['priority'],
		$meta_box
    );
}

}
?>