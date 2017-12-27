<?php
/**
 * The template for displaying Portfolio single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package osman
 */

get_header('cpt');

global $post,$wp_query;

$page_title        = get_post_meta( $post->ID, 'osman_title', true );
$home              = esc_html__('Home', 'osman'); // text for the 'Home' link
$project_nav       = osman_get_option('osman-single-project-nav');
$related_post      = osman_get_option('osman-single-project-related');
$related_title     = osman_get_option('osman-single-project-related-title');
$portfolio_page    = osman_get_option('osman-portfolio-page');


?>
			
			<!-- Project -->
			<main id="primary" class="site-main col-md-12">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php if ( $project_nav == 1 ) : ?>
					<!-- Post Nav -->
					<nav class="post-nav">
						<ul class="pager-custom">
							<li class="previous">
								<!-- For mobile device -->
								<a href="<?php if ( $portfolio_page ) { echo esc_url( get_permalink( $portfolio_page ) ); } ?>" class="btn btn-default btn-single-icon visible-xs-inline-block"><i class="fa fa-long-arrow-left"></i></a>
								<!-- For desktop -->
								<a href="<?php if ( $portfolio_page ) { echo esc_url( get_permalink( $portfolio_page ) ); } ?>" class="btn btn-default btn-has-icon hidden-xs"><i class="fa fa-long-arrow-left"></i> <?php esc_html__( 'Turn Back', 'osman' ); ?></a>
							</li>
							<li class="next">
								<?php 
								$prev = get_permalink(get_adjacent_post(false,'',false)); 
								if ($prev != get_permalink()) { ?>
								<a href="<?php echo esc_url( $prev ); ?>" class="btn btn-primary btn-has-icon icon-right"><i class="fa fa-chevron-right"></i><span><?php esc_html__( 'Next', 'osman' ); ?></span></a>
								<?php } ?>

								<?php 
								$next = get_permalink(get_adjacent_post(false,'',true)); 
								if ($next != get_permalink()) { ?>
								<a href="<?php echo esc_url( $next ); ?>" class="btn btn-primary btn-has-icon"><i class="fa fa-chevron-left"></i><span><?php esc_html__( 'Prev', 'osman' ); ?></span></a>
								<?php } ?>
							</li>
						</ul>
					</nav>
					<!-- Post Nav / End -->
					<?php endif; ?>

					<?php get_template_part( 'loop/content-single-portfolio'); ?>

				<?php endwhile; // End of the loop. ?>
			</main>
			<!-- Project / End -->

<?php if ( $related_post == 1 && ( is_array( get_the_terms( $post->ID , 'catportfolio') ) ) ) : ?>
<section class="page-section page-section__no-top-padding">
	<div class="container">
		<div class="section-title-wrapper mb-60">
			<div class="section-title-inner">
				<h2 class="section-title"><?php echo esc_html( $related_title ); ?></h2>
			</div>
		</div>

		<!-- Gallery Feed -->
		<div class="portfolio-feed">

			<?php
			//Get array of terms
			$portfolio_cat_label = strtolower(str_replace(" ",'',osman_get_option('osman-cat-name')));
			$terms = get_the_terms( $post->ID , $portfolio_cat_label);
			//Pluck out the IDs to get an array of IDS
			$term_ids = array_values(wp_list_pluck($terms,'term_id'));

			//Query posts with tax_query. Choose in 'IN' if want to query posts with any of the terms
			//Choose 'AND' if you want to query for posts with all terms
			$second_query = new WP_Query( array(
				'post_type'           => 'portfolio',
				'tax_query'           => array(
					array(
						'taxonomy'  => $portfolio_cat_label,
						'field'     => 'id',
						'terms'     => $term_ids,
						'operator'  => 'IN' //Or 'AND' or 'NOT IN'
					)),
				'posts_per_page'      => 3,
				'ignore_sticky_posts' => 1,
				'orderby'             => 'rand',
				'post__not_in'        => array($post->ID),
			));

			//Loop through posts and display...
			if($second_query->have_posts()) {
			while ($second_query->have_posts() ) : $second_query->the_post();
			$thumb   = get_post_thumbnail_id();
			$img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
			$image   = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'osman_portfolio-thumbnail-n');
			?>

			<div class="portfolio-item col-xs-4 col-md-4">
				<div class="portfolio-item-holder">
					<?php if(has_post_thumbnail()): ?>
					<figure class="portfolio-img">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo esc_url( $image[0] ); ?>" alt=""></a>
					</figure>
					<?php endif; ?>

					<div class="portfolio-details">
						<h5 class="portfolio-title"><?php the_title(); ?></h5>
						<a href="<?php echo esc_url( $img_url ); ?>" class="btn btn-primary btn-single-icon btn-portfolio-plus magnific-popup__custom-title" data-desc="<?php esc_attr(the_title()); ?> <a href='<?php the_permalink(); ?>' class='btn btn-primary btn-has-icon icon-right'><i class='fa fa-link'></i> <?php __('View more', 'osman'); ?></a>">
							<i class="fa fa-plus"></i>
						</a>
						<a href="<?php the_permalink(); ?>" class="btn btn-primary btn-single-icon btn-portfolio-link"><i class="fa fa-link"></i></a>
					</div>					
				</div>
			</div>

			<?php endwhile; wp_reset_query(); } ?>
			
		</div>
		<!-- Gallery Feed / End -->

	</div>
</section>
<?php endif; ?>

<?php get_footer(); ?>
