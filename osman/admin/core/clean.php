<?php
/**
* This is the core osman file where most of the
* main functions & features to keep our theme clean.
*
* @copyright Eddie Machado https://github.com/eddiemachado
* @package osman
* @since osman 1.0
*/


// we're firing all out initial functions at the start
add_action( 'after_setup_theme', 'osman_ahoy', 16 );

function osman_ahoy() {

    // remove pesky injected css for recent comments widget
	add_filter( 'wp_head', 'osman_remove_wp_widget_recent_comments_style', 1 );
    // clean up comment styles in the head
	add_action( 'wp_head', 'osman_remove_recent_comments_style', 1 );
    // clean up gallery output in wp
	add_filter( 'gallery_style', 'osman_remove_gallery_style' );
	// deactivate default gallery CSS
	add_filter( 'use_default_gallery_style', '__return_false' );
    // cleaning up excerpt
	add_filter( 'excerpt_length', 'osman_custom_excerpt_length', 999 );

	// Read more link on all excerpts
	add_filter( 'excerpt_more', 'osman_new_excerpt_more' );

} /* end osman ahoy */


// remove injected CSS for recent comments
function osman_remove_wp_widget_recent_comments_style() {
   if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
      remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
   }
}

// remove injected CSS from recent comments widget
function osman_remove_recent_comments_style() {
  global $wp_widget_factory;
  if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
    remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
  }
}

// remove injected CSS from gallery
function osman_remove_gallery_style($css) {
  return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}


// Custom excerpt length
function osman_custom_excerpt_length() {
	$count = osman_get_option( 'osman_excerpt_length_count' );
	return $count;
}

// ==========================================================
// Excerpt Settings
// ==========================================================
if ( !function_exists( 'osman_the_excerpt_max_charlength' ) ) {
function osman_the_excerpt_max_charlength($limit) {
      $content = explode(' ', get_the_content(), $limit);
	  
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
	 
  } else {
    $content = implode(" ",$content);
  
  }	
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  
  return $content;
}
}
/**
* Change the WordPress default excerpt length
*/
function osmant_cats_GetTheExcerpt(){
    // Read from options panel
    if(osman_get_option('osman_excerpt_length_count')) { $length = osman_get_option( 'osman_excerpt_length_count' ); }
    else { $length = 200; }
    echo osman_the_excerpt_max_charlength($length);
	$more=osman_get_option('osman-blog-more-txt');
	if($more==''){$more='ReadMore';}
	echo osman_new_excerpt_more($more);
}

// Read more link on all excerpts
function osman_new_excerpt_more( $more ) {
	
	return ' <a class="btn btn-default btn-sm" href="' . get_permalink( get_the_ID() ) . '">' . $more. '</a>';
}

/*
 * This is a modified the_author_posts_link() which just returns the link.
 * This is necessary to allow usage of the usual l10n process with printf().
 */
function osman_get_the_author_posts_link() {
	global $authordata;
	if ( !is_object( $authordata ) )
		return false;
	$link = sprintf(
		'<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
		get_author_posts_url( $authordata->ID, $authordata->user_nicename ),
		esc_attr( sprintf( __( 'Posts by %s', 'osman' ), get_the_author() ) ), // No further l10n needed, core will take care of this one
		get_the_author()
	);
	return $link;
}


/* Make your WordPress category list valid by removing the “rel” attribute */
function osman_remove_category_rel($string){
  return str_replace('rel="category tag"', '', $string);
}
add_filter('the_category', 'osman_remove_category_rel');


/* Set tag sizes in tag cloud widget */
function osman_set_tag_cloud_sizes($args) {
	$args['smallest'] = 10;
	$args['largest'] = 20;
	return $args;
}
add_filter('widget_tag_cloud_args','osman_set_tag_cloud_sizes');