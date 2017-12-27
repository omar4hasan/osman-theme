<?php
/**
 * The template for displaying archive pages.
 *
 * @package osman
 * @since osman 1.0
 */

get_header(); 

$blog_sidebar = osman_get_option('osman-blog-sidebar'); 

$page_layout_content = 'col-md-12';
if ( $blog_sidebar == '1' ) {
// Right Sidebar by default
$page_layout_content = 'col-md-9';
$page_layout_sidebar = 'col-md-3';
}
elseif ( $blog_sidebar == '2' ) {
	// Left Sidebar Layout
	$page_layout_content = 'col-md-9 col-md-push-3';
	$page_layout_sidebar = 'col-md-3 col-md-pull-9';
}
 ?>
    
<div id="primary" class="content-area <?php echo $page_layout_content; ?>" role="main">	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'loop/content', get_post_format()); ?>
	<?php endwhile; ?>
	<?php echo osman_pagination(); ?>
	<?php else : ?>
	<?php get_template_part( 'loop/content', 'none' ); ?>
	<?php endif; ?>
</div> <!--/#content -->
<?php
 if ( $blog_sidebar != '0' ) : 		
	if ( is_active_sidebar( 'sidebar-blog' ) )  { ?>
		<div id="sidebar" class="<?php echo $page_layout_sidebar; ?>" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
<?php get_sidebar('blog'); ?>
		</div>
 <?php } ?>
<?php endif; ?>
<?php get_footer();

