<?php
/**
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package osman
 * @since osman 1.0
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
<?php do_action('osman_before_body_content'); ?>
	<div class="wrapper">
	<?php if ( ! is_404() ) : ?>
		<div class="top-wrapper" id="top">
			<?php
			$url = '#content';
			$link = sprintf( __( '<a class="skip-link screen-reader-text" href="%s"> Skip to content </a>', 'osman' ), $url );
			echo $link;
			?>
			<?php if (osman_get_option('sticky_header')) { ?>
			<header id="masthead" class="site-header clearfix" itemscope="itemscope" itemtype="http://schema.org/Organization" role="banner">
				<?php } ?>
				<?php if (osman_get_option('hide_top_header')) { ?>
				<?php get_template_part( 'loop/top-header'); ?>
				<?php } ?>
				<nav id="site-nav" class="navbar navbar-nav navbar-default navbar-top">
				<?php $layout = get_post_meta($post->ID, 'osman_pageheader_layout', true);
				
					 if ( $layout=="wide" ){ $container = 'container-fluid';} elseif( $layout=="boxed" ){ $container = 'container'; }else{$container = 'osman-full-width';}
					?>
					<div class="<?php echo $container; ?>">
					<div class="col-md-4">
						<div class="navbar-header">
							 
							<?php $logo = osman_get_option('logo'); ?>
							<?php $logo_width = osman_get_option( 'logo_width', '91' ); $logo_height = osman_get_option( 'logo_height', '24' ); ?>        
							<?php if(!empty($logo['url'])) : ?>
								<a class="navbar-brand" itemprop="url" href="<?php echo esc_url( home_url( '/' )); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" >
									<img itemprop="logo" width="<?php echo esc_attr( $logo_width ); ?>" height="<?php echo esc_attr( $logo_height ); ?>" src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
								</a>                 
							<?php else: ?>
								<h1 class="site-title" itemprop="headline">
									<a href="<?php echo esc_url( home_url( '/' )); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
								</h1>
								<?php if (osman_get_option('header_description')) { ?>                              
								<p class="site-desc" itemprop="description"><?php echo get_bloginfo('description'); ?></p>
								<?php } ?>
							<?php endif; ?>
							</div>
						</div> <!-- navbar-header -->
						<?php if ( has_nav_menu( 'primary' ) ) : ?>
						<div class="col-md-8">
							<button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsingNavbar" aria-controls="exCollapsingNavbar" aria-expanded="false" aria-label="Toggle navigation">
								&#9776;
							  </button>
							  <div class="collapse navbar-toggleable-xs pull-xs-right hidden-md-down" id="collapsingNavbar">
								<?php osman_main_nav(); ?>
								</div>							
								</div>							
						<?php endif; ?>
					</div>  <!-- container -->
				</nav> <!-- site-nav -->
			</header>  <!-- masthead -->	
			
		<!--menupush start-->
		<?php if (osman_get_option('osman_push_navbar')==1): ?>
		<div id="push-menu-trigger" class="osman-pushmenu"> <span></span> <span></span> <span></span> </div>
		<header id="header" class="side-header side-header-right-push">
			<div id="header-wrap">
                <div class="container clearfix">
				<?php $logo_customize=$logo=$logo_width=$logo_height=''; ?>
				<?php $logo = osman_get_option('osman_pushmenu_logo'); ?>
				<?php $logo_customize = osman_get_option('osman_push_logo_custom');  ?>
				<?php if($logo_customize!=false): ?>
					<?php $logo_width = osman_get_option( 'osman_pushmenu_logo_width', '91' ); $logo_height = osman_get_option( 'osman_pushmenu_logo_height', '24' ); ?>        
				<?php endif; ?>
							<?php if(!empty($logo['url'])) : ?>
							<div class="logo-wrapper waves-light waves-effect waves-light">
								<a class="navbar-brand img-fluid flex-center" itemprop="url" href="<?php echo esc_url( home_url( '/' )); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" >
									<img itemprop="logo" width="<?php echo esc_attr( $logo_width ); ?>" height="<?php echo esc_attr( $logo_height ); ?>" src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
								</a>    
								 </div>
							<?php else: ?><?php endif; ?>
		
                    <div id="mobile-menu-trigger"><span></span><span></span><span></span></div>     
					<?php if ( is_active_sidebar( 'sidebar-pushmenu-top' ) ) : ?>
							<?php dynamic_sidebar( 'sidebar-pushmenu-top' ); ?>
					<?php endif; ?>
					<?php osman_push_nav(); ?>			
    
					<?php if ( is_active_sidebar( 'sidebar-pushmenu-bottom' ) ) : ?>
							<?php dynamic_sidebar( 'sidebar-pushmenu-bottom' ); ?>
					<?php endif; ?>					
				</div>
            </div>
        </header>
		<?php endif; ?>
		<!--menupush end-->
	</div><!-- .top-wrapper -->
	
	<main id="content" class="site-content"> 
	<?php get_template_part( 'loop/sub-header'); ?>
	<?php if( ! is_search() ) { // search page excluded
							global $post;
							// woocommerce shop ID
							if( function_exists('is_shop') ) {
								if( is_shop() ) {
									$post->ID = get_option('woocommerce_shop_page_id');
								}
							}
							$slider           = get_post_meta($post->ID, 'osman_slider_type', true);
							$revslider_select = get_post_meta($post->ID, 'osman_revslider_slider', true);
							$bootstrap_select = get_post_meta($post->ID, 'osman_bootstrap_carousel_slider', true);

							// Slider
							if( $slider == 'Revolution' && function_exists('putRevSlider') ) { ?>

								<?php
								if ( empty( $revslider_select ) || $revslider_select == '' ) { ?>

									<div class="container">
										<div class="alert alert-warning alert-no-slider"><?php echo wp_kses_post( __('You have not chosen any slider in <strong>Page > Page Options > Select Revolution Slider</strong>. To create slider go to <strong>Slider Revolution > New Slider</strong> or if you want to import predefined <strong>Slider Revolution > Import Slider</strong>.', 'osman') ); ?></div>
									</div>
								<?php } else { ?>
									<div class="tp-banner-holder container">
										<div class="tp-banner-container">
											<div class="tp-banner">
												<?php	echo do_shortcode('[rev_slider alias="' . $revslider_select . '"]') ?>
											</div>
										</div>
									</div>
								<?php } ?>
							<?php }
							//print_r($slider); exit;
							if( $slider == 'Carousel' ) {
								echo do_shortcode( '[osman_slider osman_id="'.$bootstrap_select.'"]' );
								}	
						} ?>
						<?php endif; ?>
	<div class="main-content-area">
	<?php 
	$layout_main = get_post_meta($post->ID, 'osman_container_layout', true);	
	 if ( $layout_main=="Wide" ){ $container_main = 'container-fluid';} elseif( $layout_main=="boxed" ){ $container_main = 'container'; }else{$container_main = 'osman-full-width';}?>
		<div class="<?php echo $container_main; ?> clearfix">
			<div class="row-fluid">			