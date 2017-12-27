<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package osman
 * @since osman 1.0
 */
get_header('page'); 

$page_layout    = get_post_meta( $post->ID, 'osman_sidebar', true );

// Right Sidebar by default
$page_layout_content = 'col-md-9';
$page_layout_sidebar = 'col-md-3';
if ( $page_layout == 'none' ) {
	// Full width Layout
	$page_layout_content = 'col-md-12';
} elseif ( $page_layout == 'left' ) {
	// Left Sidebar Layout
	$page_layout_content = 'col-md-9 push-md-3';
	$page_layout_sidebar = 'col-md-3 pull-md-9';
}
 ?>     

<div id="primary" class="content-area <?php echo $page_layout_content; ?>">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'loop/content', 'page' ); ?>
		<?php if (osman_get_option('comments_on_pages')) { ?>
		<?php if ( comments_open() || '0' != get_comments_number() )
		comments_template(); ?>
		<?php } ?> 
	<?php endwhile; // end of the loop. ?>
</div> <!--/#primary -->
<?php
 if ( $page_layout != 'none' ) : 
 if ( is_active_sidebar( 'sidebar-page' ) )  { ?>
		<aside id="sidebar" class="panel panel-warning <?php echo $page_layout_sidebar; ?>" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
<?php get_sidebar('page'); ?>
		</aside>
 <?php } ?>
<?php endif; ?>
<?php get_footer(); ?>
</div><!-- .page-wrapper -->