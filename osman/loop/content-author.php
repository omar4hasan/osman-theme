<?php
/**
 * @package osman
 * @since osman 1.0
 * 
 */
?>

<div class="author-bio clearfix">
	<div class="bio-avatar">
		<?php echo get_avatar(get_the_author_meta('ID') , '58'); ?>
	</div>
	<h2 class="bio-name">
		<?php the_author_posts_link(); ?>
	</h2>
	<p class="bio-desc"><?php echo get_the_author_meta('description'); ?></p>
	<?php if (osman_get_option('author_socials')) { ?>
	<div class="author-socials">
		<?php osman_author_socials(); ?>
	</div>
	<?php } ?>
</div>