<?php
/**
 * The template for displaying archive pages.
 *
 * @package osman
 * @since osman 1.0
 */

get_header('cpt'); 

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
<!--carousel-->
<article>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" role="listbox">
  <?php 
  $feat_image_count=0;
  if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	$feat_image_count++;
	?>
    <div class="carousel-item carousel-partner <?php if($feat_image_count==1): echo 'active'; endif; ?> ">
     <a href="<?php echo esc_url( get_permalink() ); ?>"> <img data-holder-rendered="true" src="<?php echo "$feat_image"; ?>" style="width: 300px; height: 200px;" alt="7 [300x200]" data-src="holder.js/300x200?text=7"></a>
    </div>
	<?php 	
	endwhile;
	endif;
	 ?>     
  </div>
   <ol class="carousel-indicators">
   <?php for($i=0; $i<$feat_image_count; $i++) { ?>
    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" class="<?php if($i==1): echo 'active'; endif; ?>"></li>
   <?php } ?>
  </ol>
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="icon-prev" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="icon-next" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>  
</article>
<!--carousel-->


	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<?php get_template_part( 'loop/content-partners', get_post_format()); ?>
	<?php endwhile; ?>
	<?php echo osman_pagination(); ?>
	<?php else : ?>
	<?php get_template_part( 'loop/content', 'none' ); ?>
	<?php endif; ?>
</div> <!--/#content -->
<?php
 if ( $blog_sidebar != '0' ) : 		
	if ( is_active_sidebar( 'osman-sidebar' ) )  { ?>
		<div id="sidebar" class="<?php echo $page_layout_sidebar; ?>" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
<?php get_sidebar(); ?>
		</div>
 <?php } ?>
<?php endif; ?>
<?php get_footer();

