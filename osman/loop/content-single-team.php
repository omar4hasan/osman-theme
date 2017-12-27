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

$skill_1_label   = get_post_meta($post->ID, 'osman_team_skill1', true);
$skill_1_value   = get_post_meta($post->ID, 'osman_team_value1', true);
$skill_1_color   = get_post_meta($post->ID, 'osman_team_color1', true);
$skill_1_icon   = get_post_meta($post->ID, 'osman_team_icon1', true);

$skill_2_label   = get_post_meta($post->ID, 'osman_team_skill2', true);
$skill_2_value   = get_post_meta($post->ID, 'osman_team_value2', true);
$skill_2_color   = get_post_meta($post->ID, 'osman_team_color2', true);
$skill_2_icon   = get_post_meta($post->ID, 'osman_team_icon2', true);

$skill_3_label   = get_post_meta($post->ID, 'osman_team_skill3', true);
$skill_3_value   = get_post_meta($post->ID, 'osman_team_value3', true);
$skill_3_color   = get_post_meta($post->ID, 'osman_team_color3', true);
$skill_3_icon   = get_post_meta($post->ID, 'osman_team_icon3', true);

$skill_4_label   = get_post_meta($post->ID, 'osman_team_skill4', true);
$skill_4_value   = get_post_meta($post->ID, 'osman_team_value4', true);
$skill_4_color   = get_post_meta($post->ID, 'osman_team_color4', true);
$skill_4_icon   = get_post_meta($post->ID, 'osman_team_icon4', true);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="row">
		<div class="col-md-6">
			<?php if(has_post_thumbnail()) { ?>
			<figure class="entry-thumbnail">
				<?php the_post_thumbnail('osman_portfolio-thumbnail'); ?>
			</figure>
			<?php } ?>

			<div class="gap-30"></div>

			<?php if ( $skill_1_value != '' ) { ?>
			<i class="fa <?php echo esc_attr( $skill_1_icon ); ?>"></i> <?php echo esc_attr( $skill_1_label ); ?> <?php echo esc_attr( $skill_1_value ); ?>%
			<progress class="progress progress-<?php echo esc_attr( $skill_1_color ); ?>" value="<?php echo esc_attr( $skill_1_value ); ?>" max="100"><i class="fa <?php echo esc_attr( $skill_1_icon ); ?>"></i><?php echo esc_attr( $skill_1_value ); ?>%</progress>		
			<?php } ?>
			<?php if ( $skill_2_value != '' ) { ?>
			<i class="fa <?php echo esc_attr( $skill_2_icon ); ?>"></i> <?php echo esc_attr( $skill_2_label ); ?> <?php echo esc_attr( $skill_2_value ); ?>%
			<progress class="progress progress-<?php echo esc_attr( $skill_2_color ); ?>" value="<?php echo esc_attr( $skill_2_value ); ?>" max="100"><i class="fa <?php echo esc_attr( $skill_2_icon ); ?>"></i><?php echo esc_attr( $skill_2_value ); ?>%</progress>		
			<?php } ?>
			<?php if ( $skill_3_value != '' ) { ?>
			<i class="fa <?php echo esc_attr( $skill_3_icon ); ?>"></i> <?php echo esc_attr( $skill_3_label ); ?> <?php echo esc_attr( $skill_3_value ); ?>%
			<progress class="progress progress-<?php echo esc_attr( $skill_3_color ); ?>" value="<?php echo esc_attr( $skill_3_value ); ?>" max="100"><i class="fa <?php echo esc_attr( $skill_3_icon ); ?>"></i><?php echo esc_attr( $skill_3_value ); ?>%</progress>		
			<?php } ?>
			<?php if ( $skill_4_value != '' ) { ?>
			<i class="fa <?php echo esc_attr( $skill_4_icon ); ?>"></i> <?php echo esc_attr( $skill_4_label ); ?> <?php echo esc_attr( $skill_4_value ); ?>%
			<progress class="progress progress-<?php echo esc_attr( $skill_4_color ); ?>" value="<?php echo esc_attr( $skill_4_value ); ?>" max="100"><i class="fa <?php echo esc_attr( $skill_4_icon ); ?>"></i><?php echo esc_attr( $skill_4_value ); ?>%</progress>		
			<?php } ?>

			
		</div>
		<div class="col-md-6">
			<div class="entry-body">
				<header class="entry-header">
					<div class="title-team">
						<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
						<?php echo '<h6 class="team-position">'.esc_html( 'Position:'. $position ).'</h6>'; ?>
					</div>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->

				<hr>
				 <!--Google +-->
				 <?php if ( $gplus ) : ?>
            <a href="<?php echo esc_url( $gplus ); ?>" type="button" class="btn-floating btn-small btn-gplus"><i class="fa fa-google-plus"></i></a>
			<?php endif; ?>
            <!--Facebook-->
			<?php if ( $facebook ) : ?>
            <a type="button" href="<?php echo esc_url( $facebook ); ?>" class="btn-floating btn-small btn-fb"><i class="fa fa-facebook"></i></a>
			<?php endif; ?>
				<!--Linkedin-->
				<?php if ( $linkedin ) : ?>
            <a href="<?php echo esc_url( $linkedin ); ?>" type="button" class="btn-floating btn-small btn-li"><i class="fa fa-linkedin"></i></a>
			<?php endif; ?>
            <!--Twitter-->
			<?php if ( $twitter ) : ?>
            <a href="<?php echo esc_url( $twitter ); ?>" type="button" class="btn-floating btn-small btn-tw"><i class="fa fa-twitter"></i></a>
			<?php endif; ?>

				<hr class="mb-50">

				<?php if ( $email != '' ) : ?>
				<a href="mailto:<?php echo esc_attr($email); ?>" class="btn btn-has-icon btn-lg btn-primary"><i class="fa fa-envelope"></i> <?php esc_html_e( 'Get in Touch', 'osman' ); ?></a>
				<?php endif; ?>

			</div><!-- .entry-body -->
		</div>
	</div>

	<hr class="hr__dashed hr__lg">

	<?php echo do_shortcode('[osman_team_posts posts_per_page="3" cols="3cols" type="classic" orderby="rand"]'); ?>


</article><!-- #post-## -->
