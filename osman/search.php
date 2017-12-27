<?php
/**
 * The template for displaying search results pages.
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
     
<div id="primary" class="content-area <?php echo $page_layout_content; ?>" itemtype="http://schema.org/SearchResultsPage" itemscope="itemscope">
	<?php if ( have_posts() ) : ?>
		<header class="entry-header">
			<h2 class="search-title"><?php $allsearch = new WP_Query("s=$s&showposts=-1"); $key = esc_html($s, 1); $count = $allsearch->post_count;  echo $count . ' '; wp_reset_query(); ?><?php printf( esc_html__( ' Search Results found for' , 'osman') . '<span class="text-muted"> %s</span>', get_search_query() ); ?></h2>
		</header>
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'loop/content', 'search' ); ?>
		<?php endwhile; ?>
	<?php else : ?>
		<?php get_template_part( 'loop/content', 'none' ); ?>
	<?php endif; ?>
</div> <!--#primary -->
<?php
 if ( $blog_sidebar != '0' ) : 		
	if ( is_active_sidebar( 'osman-sidebar' ) )  { ?>
		<div id="sidebar" class="<?php echo $page_layout_sidebar; ?>" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
<?php get_sidebar(); ?>
		</div>
 <?php } ?>
<?php endif; ?>
<?php get_footer();