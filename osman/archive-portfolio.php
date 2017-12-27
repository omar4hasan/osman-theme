<?php
/**
 * The template for displaying archive pages.
 *
 * @package osman
 * @since osman 1.0
 */

get_header('cpt'); 

$portfoolio_sidebar = osman_get_option('osman-cpt-sidebar'); 
$page_layout_content = 'col-md-12';
if ( $portfoolio_sidebar == '1' ) {
// Right Sidebar by default
$page_layout_content = 'col-md-9';
$page_layout_sidebar = 'col-md-3';
}
elseif ( $portfoolio_sidebar == '2' ) {
	// Left Sidebar Layout
	$page_layout_content = 'col-md-9 push-md-3';
	$page_layout_sidebar = 'col-md-3 pull-md-9';
}
 ?>
    
<div id="primary" class="content-area <?php echo $page_layout_content; ?>" role="main">				
		    <ul class="list-inline clearfix" id="filters">
			<?php
			$portfolio_cat_label = 'cat-portfolio';			
			$terms2 = get_terms($portfolio_cat_label);
			$count = count($terms2);
			echo '<li class="list-inline-item"><span class="filter active" data-filter=".all">All</span></li>';
			if ( $count > 0 ){
			    foreach ( $terms2 as $term ) { $termname = strtolower($term->name);
			    $termname = str_replace(' ', '-', $termname);
			echo '<li class="list-inline-item"><span class="filter" data-filter=".'.$termname.'">'.$term->name.'</span></li>';
			}
			} ?>
		    </ul>
		<div id="portfoliolist">        
	    <div id="projects" class="row">
			<?php  /* Query the post   */
		while ( have_posts() ) : the_post(); 
		/* Pull category for each unique post using the ID */
		$terms = get_the_terms( $post->ID, 'cat-portfolio' );	
		if ( $terms && ! is_wp_error( $terms ) ) : 
			$links = array();
				foreach ( $terms as $term ) {
					$links[] = $term->name;
				}
	       $tax_links = join( " ", str_replace(' ', '-', $links));          
	       $tax = strtolower($tax_links);
			else :	
			$tax = '';					
		endif;
		?>
		
		<div class="portfolio col-sm-6 col-md-4 all <?php echo $tax; ?>" data-cat="<?php  echo $tax; ?>">
				<div class="portfolio-wrapper">				
					<a href="<?php print get_permalink($post->ID) ?>">
						<?php echo the_post_thumbnail(); ?></a>
					<div class="label">
						<div class="label-text">
							<h4><?php print get_the_title(); ?></h4>
							  <?php print get_the_excerpt(); ?><br />
							  <a class="btn btn-default" href="<?php print get_permalink($post->ID) ?>">Details</a>
										<?php echo	'<span class="text-category">'. $tax .'</span>'; ?>
						</div>
						<div class="label-bg"></div>
					</div>
				</div>
			</div>	
			 <?php endwhile; ?> 
		<!-- Start projects Loop -->
		
			</div><!-- End Projects Row -->
		</div><!-- End Container --> 
		</div> <!--/#content -->

<?php
 if ( $portfoolio_sidebar != '0' ) : 		
	if ( is_active_sidebar( 'osman-sidebar' ) )  { ?>
		<div id="sidebar" class="<?php echo $page_layout_sidebar; ?>" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
<?php get_sidebar(); ?>
		</div>
 <?php } ?>
<?php endif; ?>
<?php get_footer();

