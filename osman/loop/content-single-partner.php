<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Osman
 */
$post_social = osman_get_option('osman-single-post-social');
$post_date   = osman_get_option('osman-single-post-date');
$post_footer = osman_get_option('osman-single-post-footer');
$post_tags   = osman_get_option('osman-single-post-tags');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if(has_post_thumbnail()) { ?>
	<figure class="entry-thumbnail">
		<?php osman_post_thumbnail(); ?>
	</figure>
	<?php } ?>

	<div class="entry-body">
		<?php if ( $post_date == 1 ) : ?>
		<div class="entry-date">
			<span class="entry-day"><?php the_time(__('j','osman')); ?></span>
			<span class="entry-month"><?php the_time(__('M','osman')); ?></span>
		</div><!-- .entry-date -->
		<?php endif; ?>

		<?php if ( $post_social == 1 ) : ?>
		<div class="entry-social">
			<button class="btn btn-lg btn-primary btn-single-icon entry-social-trigger">
				<i class="fa fa-share-alt"></i>
			</button>
			<ul>
				<li><a target="_blank" onClick="popup = window.open('http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false" href="#" class="btn btn-lg btn-primary btn-single-icon"><i class="fa fa-facebook"></i></a></li>
				<li><a target="_blank" onClick="popup = window.open('http://linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false" href="#" class="btn btn-lg btn-primary btn-single-icon"><i class="fa fa-linkedin"></i></a></li>
				<li><a target="_blank" onClick="popup = window.open('http://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink(); ?>', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false" href="#" class="btn btn-lg btn-primary btn-single-icon"><i class="fa fa-twitter"></i></a></li>
				<li><a target="_blank" onClick="popup = window.open('http://google.com/bookmarks/mark?op=edit&amp;bkmk=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false" href="#" class="btn btn-lg btn-primary btn-single-icon"><i class="fa fa-google-plus"></i></a></li>
			</ul>
		</div><!-- .entry-social -->
		<?php endif; ?>
		
		<header class="entry-header">
			<div class="title-bordered border__solid">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<?php // osman_meta_comments(); ?>
			</div>
		</header><!-- .entry-header -->

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
	</div><!-- .entry-content -->

	</div><!-- .entry-body -->

	<?php if ( $post_footer == 1 ) : ?>
	<footer class="entry-footer">
		<?php osman_single_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->