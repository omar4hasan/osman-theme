<?php
/*
Plugin Name: Strx Magic Floating Sidebar Maker
Plugin URI: http://www.strx.it
Description: Makes your blog sidebar floatable
Version: 1.4.1
Author: Strx
Author URI: http://www.strx.it
License: GPL2
*/


function strx_floating_sidebar_defaults(){
	$sidebar_wait_load=osman_get_option('sidebar_wait_load');
	$sidebar_moving_time=osman_get_option('sidebar_moving_time');
	$sidebar_animation_speed=osman_get_option('sidebar_animation_speed');
	$sidebar_offsettop=osman_get_option('sidebar_offsettop');
	$sidebar_offsetbottom=osman_get_option('sidebar_offsetbottom');
	$sidebar_mindiff=osman_get_option('sidebar_mindiff');
	
    return array(
        'content'=>'#primary',
        'sidebar'=>'#sidebar',
        'wait'=>$sidebar_wait_load,
        'debounce'=>$sidebar_moving_time,
        'animate'=>$sidebar_animation_speed,
        'offsetTop'=>$sidebar_offsettop,
        'offsetBottom'=>$sidebar_offsetbottom,
        'outline'=>'on',
		'dynamicTop'=>false,
        'minHDiff'=>$sidebar_mindiff,
    );
}

function strx_floating_sidebar_start(){
    $sidebar_autoscroll=osman_get_option('sidebar_autoscroll');
	if($sidebar_autoscroll==1):
    $opts=strx_floating_sidebar_defaults();
    echo '<script type="text/javascript">jQuery(document).ready(function($){strx.start('.json_encode($opts).');});</script>';
	endif;
}

//Registering scripts and plugin hooks
if ( !is_admin() ) {
	
	function sidebar_scroll(){
	$sidebar_autoscroll=osman_get_option('sidebar_autoscroll');
	if($sidebar_autoscroll==1):
    wp_register_script('debounce', OSMAN_PLUGIN_URI . '/strx-magic-floating-sidebar-maker/js/debounce.js');
    wp_register_script('strx-magic-floating-sidebar-maker', OSMAN_PLUGIN_URI . '/strx-magic-floating-sidebar-maker/js/strx-magic-floating-sidebar-maker.js', array('jquery','debounce'));
    wp_enqueue_script('debounce');
    wp_enqueue_script('strx-magic-floating-sidebar-maker');
	endif;
	}	
	add_action( 'wp_footer' , 'sidebar_scroll');
    add_action( 'wp_footer' , 'strx_floating_sidebar_start');
}