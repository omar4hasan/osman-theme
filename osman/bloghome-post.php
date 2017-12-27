<?php
/*
Template Name: Blog-home Posts
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
	$page_layout_content = 'col-md-9 col-md-push-3';
	$page_layout_sidebar = 'col-md-3 col-md-pull-9';
}
 ?>
 <?php query_posts('post_type=post&post_status=publish&posts_per_page=10&paged='. get_query_var('paged')); ?>
<div id="primary" class="content-area <?php echo $page_layout_content; ?>">
	
	<?php if ( have_posts() ) : ?>
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php
			/* Include the Post-Format-specific template for the content.
			* If you want to overload this in a child theme then include a file
			* called content-___.php (where ___ is the Post Format name) and that will be used instead.
			*/
			get_template_part( 'loop/content-bloghome', get_post_format() );
			?>
		<?php endwhile; ?>
		<?php echo osman_pagination(); ?>
	<?php else : ?>
		<?php get_template_part( 'loop/content', 'none' ); ?>
	<?php endif; ?>

</div><!-- #primary -->
<?php
 if ( $page_layout != 'none' ) : 
 if ( is_active_sidebar( 'sidebar-page' ) )  { ?>
		<div id="sidebar" class="<?php echo $page_layout_sidebar; ?>" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
<?php get_sidebar(); ?>
		</div>
 <?php } ?>
<?php endif; ?>
<?php get_footer(); ?>
</div><!-- .page-wrapper -->
  <?php //osman_footer_socials(); ?>