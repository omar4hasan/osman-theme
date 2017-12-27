<?php
/**
 * The Template for displaying all single posts.
 *
 * Please note that this is the WordPress construct of posts
 * and that other 'posts' on your WordPress site will use a
 * different template.
 *
 * @package osman
 * @since osman 1.0
 *
 */

get_header(); 

$blog_sidebar = osman_get_option('osman-single-blog-sidebar'); 

$page_layout_content = 'col-md-12';
if ( $blog_sidebar == '1' ) {
// Right Sidebar by default
$page_layout_content = 'col-md-9';
$page_layout_sidebar = 'col-md-3';
}
elseif ( $blog_sidebar == '2' ) {
	// Left Sidebar Layout
	$page_layout_content = 'col-md-9 push-md-3';
	$page_layout_sidebar = 'col-md-3 pull-md-9';
}
?>   
<div id="primary" class="content-area <?php echo $page_layout_content; ?>">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'loop/content', 'single', get_post_format() ); ?>
		<?php if (osman_get_option('post_navigation')) { ?>
		<?php osman_content_nav( 'nav-below' ); ?>
		<?php } ?>
		<?php
			// If comments are open or we have at least one comment, load up the comment template
		if ( comments_open() || '0' != get_comments_number() )
			comments_template();
		?>
	<?php endwhile; // end of the loop. ?>
</div> <!-- #primary -->
<?php
$page_layout    = get_post_meta( $post->ID, 'osman_sidebar', true );

 if ( $blog_sidebar != '0' ) : 		
	if ( is_active_sidebar( 'sidebar-blog' ) )  { ?>
		<div id="sidebar" class="<?php echo $page_layout_sidebar; ?> widget-wrapper" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
<?php get_sidebar('blog'); ?>
		</div>	
    <?php } ?>
<?php endif; ?>
<?php get_footer(); ?>