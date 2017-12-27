<?php
/**
 * The template for displaying image attachments.
 *
 * @package osman
 * @since osman 1.0
 */

get_header(); ?>
	<div class="col-md-12">
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemtype="http://schema.org/BlogPosting" itemscope="itemscope">
				<header class="entry-header">
					<h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1>
					<div class="entry-meta">
						<?php osman_posted_on(); ?>
						<?php 
							$metadata = wp_get_attachment_metadata();
							$size_link = sprintf ( 
								'<span class="attachment-meta full-size-link"><a href="%1$s" title="%2$s">' . _e( '%3$s (%4$s &times; %5$s)', 'osman' ) . '</a></span>',
								esc_url( wp_get_attachment_url() ),
								esc_attr__( 'Link to full-size image', 'osman' ),
								__( 'Full resolution', 'osman' ),
								$metadata['width'],
								$metadata['height']
								); 
						?>
						<?php echo $size_link; ?>
					</div><!-- .entry-meta -->
					<nav role="navigation" id="image-navigation" class="image-navigation">
						<ul class="pager">
							<li><?php previous_image_link( false, esc_html__( '<i class="fa fa-chevron-left" aria-hidden="true"></i> Previous', 'osman' ) ); ?></li>
							<li><?php next_image_link( false, __( 'Next <i class="fa fa-chevron-right" aria-hidden="true"></i>', 'osman' ) ); ?></li>
						</ul>
					</nav> <!-- #image-navigation -->
				</header><!-- .entry-header -->
				<div class="entry-content">
						<div class="entry-attachment">
							<?php osman_the_attached_image(); ?>
							<?php if ( ! empty( $post->post_excerpt ) ) : ?>
								<div class="entry-caption">
									<?php the_excerpt(); ?>
								</div><!-- .entry-caption -->
							<?php endif; ?>
						</div><!-- .entry-attachment -->
						<?php the_content(); ?>
						<?php
							wp_link_pages( array(
								'before'      	 => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'osman' ) . '</span>',
								'after'       	 => '</div>',
								'link_before' 	 => '<span>',
								'link_after'  	 => '</span>',
								'current_before' => '',
								'current_after'  => '',
								'pagelink'    	 => '%',
								) );
						?>
				</div><!-- .entry-content -->
			</article><!-- article -->
		<?php comments_template(); ?>
		<?php endwhile; // end of the loop. ?>
	</div>
<?php get_footer(); ?>