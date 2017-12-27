<?php
/**
 * @package osman
 * @since osman 1.0
 * 
 */
?>

<article class="no-results not-found">
	<header class="entry-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'osman' ); ?></h1>
	</header><!-- .page-header -->

		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php   sprintf( esc_html__( 'Ready to publish your first post? %s.', 'osman' ), '<a href="'.esc_url( admin_url( 'post-new.php' ) ).'">'.esc_html__('Get started here.','osman').'' ); ?></p>
          

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'osman' ); ?></p>
			
			<div class="margin">
				<?php get_search_form(); ?>
			</div>
		<?php else : ?>

			<p><?php _e( 'It seems we did not find what you are looking for. Perhaps searching can help.', 'osman' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	
</article><!-- .no-results -->
