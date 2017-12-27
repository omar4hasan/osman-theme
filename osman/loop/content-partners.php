<?php
/**
 * @package osman
 * @since osman 1.0
 * 
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemtype="http://schema.org/Blog" itemscope="itemscope">
	
	<?php if ( is_sticky() && is_home() && ! is_paged() ) {
		printf( '<span class="sticky-pin"></span>' );
	} ?>
<div class="entry-body">
	<?php osman_post_thumbnail(); ?>

	
		<!--<div class="entry-date">
			<span class="entry-day"><?php the_time(__('j','osman')); ?></span>
			<span class="entry-month"><?php the_time(__('M','osman')); ?></span>
		</div>--><!-- .entry-date -->
		

		<header class="entry-header entry-header__has-date">
			<?php the_title( sprintf( '<div class="title-bordered"><h4 class="entry-title h1-responsive"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4></div>' ); ?>
		</header><!-- .entry-header -->

<div class="entry-excerpt">
	<div class="entry-content clearfix">
		<?php
			/* translators: %s: Name of current post */
			osmant_cats_GetTheExcerpt();
			/*the_content( sprintf( 
				__( 'Continue reading %s', 'osman' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
				) );*/

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
	</div>
	</div><!-- .entry-excerpt -->
</div><!-- .entry-body -->
	<footer class="entry-footer">
		<?php osman_entry_footer(); ?>
	</footer> <!-- entry-footer -->			

</article>
