<?php
				// Footer Social Links
				$osman=osman_get_option('osman-social-media');
				//print_r($osman); exit;
				$social_media_toggle = osman_get_option('osman-social-in-footer');
				$social_media        = osman_get_option('osman-social-media');
				$social_media_style  = osman_get_option('osman-social-media-style');

				if ( $social_media_style == 'rounded' ) {
					$social_media_style = 'footer-social-links__rounded';
				} else {
					$social_media_style = 'footer-social-links__squared';
				}

				if ($social_media_toggle == 1):

					echo '<ul class="footer-social-links '. esc_attr( $social_media_style ) .' list-inline text-center">';

					foreach (array_filter($social_media) as $key=>$value) {

					switch($key) {

						case __( 'Facebook URL', 'osman') :
							echo '<li><a href="' . esc_url( $social_media[ __( 'Facebook URL', 'osman') ] ) . '" title="Facebook"><i class="fa fa-facebook"></i></a></li>';
						break;

						case __( 'Twitter URL', 'osman'):
							echo '<li><a href="' . esc_url( $social_media[ __( 'Twitter URL', 'osman') ] ) . '" title="Twitter"><i class="fa fa-twitter"></i></a></li>';
						break;

						case __( 'LinkedIn URL', 'osman'):
							echo '<li><a href="' . esc_url( $social_media[ __( 'LinkedIn URL', 'osman') ] ) . '" title="LinkedIn"><i class="fa fa-linkedin"></i></a></li>';
						break;

						case __( 'Google+ URL', 'osman'):
							echo '<li><a href="' . esc_url( $social_media[ __( 'Google+ URL', 'osman') ] ) . '" title="Google+"><i class="fa fa-google-plus"></i></a></li>';
						break;

						case __( 'Instagram URL', 'osman'):
							echo '<li><a href="' . esc_url( $social_media[ __( 'Instagram URL', 'osman') ] ) . '" title="Instagram"><i class="fa fa-instagram"></i></a></li>';
						break;

						case __( 'Github URL', 'osman'):
							echo '<li><a href="' . esc_url( $social_media[ __( 'Github URL', 'osman') ] ) . '" title="Github"><i class="fa fa-github"></i></a></li>';
						break;

						case __( 'VK URL', 'osman'):
							echo '<li><a href="' . esc_url( $social_media[ __( 'VK URL', 'osman') ] ) . '" title="VKontakte"><i class="fa fa-vk"></i></a></li>';
						break;

						case __( 'YouTube URL', 'osman'):
							echo '<li><a href="' . esc_url( $social_media[ __( 'YouTube URL', 'osman') ] ) . '" title="YouTube"><i class="fa fa-youtube"></i></a></li>';
						break;

						case __( 'Pinterest URL', 'osman'):
							echo '<li><a href="' . esc_url( $social_media[ __( 'Pinterest URL', 'osman') ] ) . '" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>';
						break;

						case esc_html__( 'Tumblr URL', 'osman'):
							echo '<li><a href="' . esc_url( $social_media[ esc_html__( 'Tumblr URL', 'osman') ] ) . '" title="Tumblr"><i class="fa fa-tumblr"></i></a></li>';
						break;

						case __( 'Dribbble URL', 'osman'):
							echo '<li><a href="' . esc_url( $social_media[ __( 'Dribbble URL', 'osman') ] ) . '" title="Dribbble"><i class="fa fa-dribbble"></i></a></li>';
						break;

						case __( 'Vimeo URL', 'osman'):
							echo '<li><a href="' . esc_url( $social_media[ __( 'Vimeo URL', 'osman') ] ) . '" title="Vimeo"><i class="fa fa-vimeo"></i></a></li>';
						break;

						case __( 'Flickr URL', 'osman'):
							echo '<li><a href="' . esc_url( $social_media[ __( 'Flickr URL', 'osman') ] ) . '" title="Flickr"><i class="fa fa-flickr"></i></a></li>';
						break;

						case __( 'Yelp URL', 'osman'):
							echo '<li><a href="' . esc_url( $social_media[ __( 'Yelp URL', 'osman') ] ) . '" title="Yelp"><i class="fa fa-yelp"></i></a></li>';
						break;

			    }

				}

				echo '</ul>';
				endif; ?>