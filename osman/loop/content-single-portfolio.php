<?php
/**
 * Template part for displaying Portfolio single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Osman
 */

$author = get_post_meta($post->ID, 'osman_author', true);
$client = get_post_meta($post->ID, 'osman_client', true);
$tools  = get_post_meta($post->ID, 'osman_tools', true);
$url    = get_post_meta($post->ID, 'osman_project_url', true);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="row">
		<div class="col-md-8">
			<?php if(has_post_thumbnail()) { ?>
			<figure class="portfolio-single-thumbnail">
				<?php the_post_thumbnail('osman_portfolio-thumbnail'); ?>
			</figure>
			<?php } ?>
		</div>
		<div class="col-md-4">
			<?php the_title( '<div class="title-bordered border__solid"><h4>', '</h4></div>' ); ?>
			<?php the_content(); ?>

			<ul class="portfolio-list-info">
				<?php
					if ( $author !== "") {
						echo '<li><span class="info-label">' . esc_html__( 'Author:', 'osman' ) . '</span> ' . esc_html( $author ) . '</li>';
					}

					if ( $client !== "") {
						echo '<li><span class="info-label">' . esc_html__( 'Client:', 'osman' ) . '</span> ' . esc_html( $client ) . '</li>';
					}

					if ( $tools !== "") {
						echo '<li><span class="info-label">' . esc_html__( 'Tools:', 'osman' ) . '</span> ' . esc_html( $tools ) . '</li>';
					}

					if ( $url !== "") {
						echo '<li><span class="info-label">' . esc_html__( 'URL:', 'osman' ) . '</span> <a href="' . esc_url( $url ) . '">' . esc_html( $url ) . '</a></li>';
					}
				?>
			</ul>
		</div>
	</div>

</article><!-- #post-## -->
