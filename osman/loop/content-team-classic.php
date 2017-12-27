<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package osman
 */

$position        = get_post_meta($post->ID, 'osman_team_position', true);
$description     = get_post_meta($post->ID, 'osman_team_excerpt', true);
$email           = get_post_meta($post->ID, 'osman_team_email', true);
$facebook        = get_post_meta($post->ID, 'osman_team_facebook', true);
$twitter         = get_post_meta($post->ID, 'osman_team_twitter', true);
$linkedin        = get_post_meta($post->ID, 'osman_team_linkedin', true);
$gplus           = get_post_meta($post->ID, 'osman_team_gplus', true);
?>		
        <!--First column-->
        <div class="col-lg-3 col-md-6 mb-r">
            <div class="avatar">
                <?php if(has_post_thumbnail()) { ?>
						<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'osman_portfolio-thumbnail-n' );
						$url = $thumb['0']; ?>
                       <a href="<?php the_permalink(); ?>"> <img class="activator rounded-circle" src="<?php echo $url;?>" ></a>
              
					<?php } else { ?>
					 <img class="activator rounded-circle" src="<?php echo get_template_directory_uri() . '/images/placeholder-264x314.jpg'?>" >
					<?php } ?>
            </div>
            <h4><?php the_title(); ?></h4>
            <h5><?php echo esc_html( $position ); ?></h5>
            <p><?php echo esc_html( $description ); ?></p>

           <p>
			<?php if ( $facebook ) : ?>
				<a class="blue-text text-lighten-2" href="<?php echo esc_url( $facebook ); ?>">
					<i class="fa fa-facebook-square"></i>
				</a>
				<?php endif; ?>
				<?php if ( $twitter ) : ?>
				<a class="blue-text text-lighten-2" href="<?php echo esc_url( $twitter ); ?>">
					<i class="fa fa-twitter-square"></i>
				</a>
				<?php endif; ?>
				<?php if ( $gplus ) : ?>
				<a class="blue-text text-lighten-2" href="<?php echo esc_url( $gplus ); ?>">
					<i class="fa fa-google-plus-square"></i>
				</a>
				<?php endif; ?>
				<?php if ( $linkedin ) : ?>
				<a class="blue-text text-lighten-2" href="<?php echo esc_url( $linkedin ); ?>">
					<i class="fa fa-linkedin-square"></i>
				</a>
				<?php endif; ?>
			</p>

        </div>
        <!--/First column-->