<?php
/*
Template Name: Blog-col3 Posts
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
 <?php query_posts('post_type=post&post_status=publish&posts_per_page=10&paged='. get_query_var('paged')); ?>
<div id="primary" class="content-area <?php echo $page_layout_content; ?>">
	<div class="card-columns">
	<?php if ( have_posts() ) : ?>
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php
			/* Include the Post-Format-specific template for the content.
			* If you want to overload this in a child theme then include a file
			* called content-___.php (where ___ is the Post Format name) and that will be used instead.
			*/
			get_template_part( 'loop/content-blogcol3', get_post_format() );
			?>
		<?php endwhile; ?>
		<?php echo osman_pagination(); ?>
	<?php else : ?>
		<?php get_template_part( 'loop/content', 'none' ); ?>
	<?php endif; ?>
	</div>
</div><!-- #primary -->
<?php


 if ( $blog_sidebar != '0' ) : 		
	if ( is_active_sidebar( 'osman-sidebar' ) )  { ?>
		<div id="sidebar" class="<?php echo $page_layout_sidebar; ?>" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
<?php get_sidebar(); ?>
		</div>
 <?php } ?>
<?php endif; ?>
<?php get_footer(); ?>
</div><!-- .page-wrapper -->
  <?php //osman_footer_socials(); ?>