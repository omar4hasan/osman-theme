<?php
/*
Template Name: backfull white page
*/

get_header('fullback'); 

$page_layout    = get_post_meta( $post->ID, 'osman_sidebar', true );

// Right Sidebar by default
$page_layout_content = 'col-md-9';
$page_layout_sidebar = 'col-md-3';
if ( $page_layout == 'none' ) {
	// Full width Layout
	$page_layout_content = 'col-md-12';
} elseif ( $page_layout == 'left' ) {
	// Left Sidebar Layout
	$page_layout_content = 'col-md-9 col-md-push-3';
	$page_layout_sidebar = 'col-md-3 col-md-pull-9';
}
 ?>     

<main id="primary" class="content-area <?php echo $page_layout_content; ?>">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'loop/content', 'page' ); ?>
		<?php if (osman_get_option('comments_on_pages')) { ?>
		<?php if ( comments_open() || '0' != get_comments_number() )
		comments_template(); ?>
		<?php } ?> 
	<?php endwhile; // end of the loop. ?>
</main> <!--/#primary -->
<?php
$page_layout    = get_post_meta( $post->ID, 'osman_sidebar', true );

 if ( $page_layout != 'none' ) : 		
	if ( is_active_sidebar( 'sidebar-page' ) )  { ?>
		<div id="sidebar" class="<?php echo $page_layout_sidebar; ?> widget-wrapper" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
<?php get_sidebar('page'); ?>
		</div>
 <?php } ?>
<?php endif; ?>
<?php get_footer('fullback'); ?>