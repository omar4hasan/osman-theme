<?php
/**
 * Template Name: Full width
 * The template for displaying full-width pages with no sidebar.
 *
 * @package osman
 * @since osman 1.0
 */

get_header('page'); ?>
<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
	<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>
