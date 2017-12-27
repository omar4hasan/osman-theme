<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Osman
 */

$position        = get_post_meta($post->ID, 'osman_team_position', true);
$description     = get_post_meta($post->ID, 'osman_team_excerpt', true);
$email           = get_post_meta($post->ID, 'osman_team_email', true);
$facebook        = get_post_meta($post->ID, 'osman_team_facebook', true);
$twitter         = get_post_meta($post->ID, 'osman_team_twitter', true);
$linkedin        = get_post_meta($post->ID, 'osman_team_linkedin', true);
$gplus           = get_post_meta($post->ID, 'osman_team_gplus', true);
?>

<div class="person-info">
	<figure class="person-info-thumb">
		<a href="<?php the_permalink(); ?>" class="thumbnail thumbnail-circle person-info-link">
			<?php if(has_post_thumbnail()) { ?>
			<?php the_post_thumbnail( 'osman_thumbnail-md', array('class' => "person-info-img img-responsive img-circle")); ?>
			<?php } else { ?>
				<img src="<?php echo get_template_directory_uri() . '/images/placeholder-170x170.jpg'?>" alt="">
			<?php } ?>
			<span class="thumbnail-overlay thumbnail-single-link"><i class="fa fa-plus"></i></span>
		</a>
		<figcaption>
			<h3 class="person-info-title"><?php the_title(); ?></h3>
			<h5 class="person-info-desc"><?php echo esc_html( $position ); ?></h5>
		</figcaption>
	</figure>
	<div class="person-info-content">
		<p><?php echo esc_html( $description ); ?></p>
		<a href="mailto:<?php echo esc_attr( $email ); ?>" class="btn btn-default btn-block btn-has-icon"><i class="fa fa-envelope"></i> <?php _e( 'Send Message', 'osman' ); ?></a>
	</div>
	<footer class="person-info-footer">
		<ul class="social-icons">
			<?php if ( $facebook ) : ?>
			<li><a href="<?php echo esc_url( $facebook ); ?>"><i class="fa fa-facebook"></i></a></li>
			<?php endif; ?>

			<?php if ( $linkedin ) : ?>
			<li><a href="<?php echo esc_url( $linkedin ); ?>"><i class="fa fa-linkedin"></i></a></li>
			<?php endif; ?>

			<?php if ( $twitter ) : ?>
			<li><a href="<?php echo esc_url( $twitter ); ?>"><i class="fa fa-twitter"></i></a></li>
			<?php endif; ?>

			<?php if ( $gplus ) : ?>
			<li><a href="<?php echo esc_url( $gplus ); ?>"><i class="fa fa-google-plus"></i></a></li>
			<?php endif; ?>
		</ul>
	</footer>
</div>
