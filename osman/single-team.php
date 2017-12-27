<?php
/**
 * The template for displaying Team single posts (Member).
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Osman
 */

get_header('cpt');  

$team_sidebar = osman_get_option('osman-cpt-single-sidebar'); 
//print_r($team_sidebar);
$page_layout_content = 'col-md-12';
if ( $team_sidebar == '1' ) {
// Right Sidebar by default
$page_layout_content = 'col-md-9';
$page_layout_sidebar = 'col-md-3';
}
elseif ( $team_sidebar == '2' ) {
	// Left Sidebar Layout
	$page_layout_content = 'col-md-9 push-md-3';
	$page_layout_sidebar = 'col-md-3 pull-md-9';
}
 ?>
    
<div id="primary" class="content-area <?php echo $page_layout_content; ?>" role="main">	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'loop/content-single-team'); ?>
	<?php endwhile; ?>
	<?php echo osman_pagination(); ?>
	<?php else : ?>
	<?php get_template_part( 'loop/content', 'none' ); ?>
	<?php endif; ?>
</div> <!--/#content -->
<?php
 if ( $team_sidebar != '0' ) : 		
	if ( is_active_sidebar( 'osman-sidebar' ) )  { ?>
		<div id="sidebar" class="<?php echo $page_layout_sidebar; ?>" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
<?php get_sidebar(); ?>
		</div>
 <?php } ?>
<?php endif; ?>
<?php get_footer();