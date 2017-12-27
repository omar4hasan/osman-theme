<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package osman
 * @since osman 1.0
 *
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
	$page_layout_content = 'col-md-9 push-md-3';
	$page_layout_sidebar = 'col-md-3 pull-md-9';
}
 ?>
 
<div id="primary" class="content-area <?php echo $page_layout_content; ?>">
	<?php if ( have_posts() ) : ?>
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php
			/* Include the Post-Format-specific template for the content.
			* If you want to overload this in a child theme then include a file
			* called content-___.php (where ___ is the Post Format name) and that will be used instead.
			*/
			get_template_part( 'loop/content', get_post_format() );
			?>
		<?php endwhile; ?>
		<?php echo osman_pagination(); ?>
	<?php else : ?>
		<?php get_template_part( 'loop/content', 'none' ); ?>
	<?php endif; ?>
</div><!-- #primary -->
<?php


 if ( $blog_sidebar != '0' ) : 		
	if ( is_active_sidebar( 'sidebar-blog' ) )  { ?>
		<aside id="sidebar" class="<?php echo $page_layout_sidebar; ?> widget-wrapper panel panel-warning" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
<?php get_sidebar('blog'); ?>
		</aside>
 <?php } ?>
<?php endif; ?>
<?php get_footer('blog'); ?>
</div><!-- .page-wrapper -->
  <?php //osman_footer_socials(); ?>