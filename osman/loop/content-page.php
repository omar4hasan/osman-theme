<?php
/**
 * @package osman
 * @since osman 1.0
 * 
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemtype="http://schema.org/BlogPosting" itemscope="itemscope">

	<?php osman_post_thumbnail(); ?>
<?php $page_title     = get_post_meta( $post->ID, 'osman_page_title', true ); 
 if ( $page_title != 'no' ) {
?>
	<header class="entry-header">
		<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->
 <?php } ?>
	<div class="entry-content clearfix">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s', 'osman' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
				) );

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

	<?php edit_post_link( __( 'Edit', 'osman' ), '<footer class="entry-footer"><span class="edit-link">', ' <i class="fa fa-pencil"></i></span></footer>' ); ?>

</article><!-- #post-## -->