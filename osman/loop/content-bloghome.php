<?php
/**
 * @package osman
 * @since osman 1.0
 * 
 */
?>
 <!--First row-->
            <div class="row <?php post_class(); ?>" id="post-<?php the_ID(); ?>" itemtype="http://schema.org/Blog" itemscope="itemscope">
                <!--First column-->
				<?php if ( is_sticky() && is_home() && ! is_paged() ) {
							printf( '<span class="sticky-pin"></span>' );
						} ?>
               <!--Post-->
                    <div class="post-wrapper">
                        <!--Post data-->
						 <!--Title-->
							<header class="entry-header entry-header__has-date">
							<?php the_title( sprintf( '<div class="title-bordered border__solid"><h1 class="h1-responsive"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1></div>' ); ?>
							</header><!-- .entry-header -->
							<div class="entry-date">
							<span class="entry-day"><?php the_time(__('j','osman')); ?></span>
							<span class="entry-month"><?php the_time(__('M','osman')); ?></span>
						</div><!-- .entry-date -->
                        <br>
                        <!--Featured image -->
                        <div class="view overlay hm-white-light z-depth-1-half">
                             <?php osman_post_thumbnail(); ?>
                            <div class="mask">
                            </div>
                        </div>

                        <br>

                        <!--Post excerpt-->
                        <!--Title-->
							<header class="entry-header entry-header__has-date">
							<?php the_title( sprintf( '<div class="title-bordered border__solid"><h4 class="card-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4></div>' ); ?>
							</header><!-- .entry-header -->
										   
                            <!--Text-->
                            <p class="card-text"><?php osmant_cats_GetTheExcerpt(); ?></p>
							<footer class="entry-footer">
								<?php osman_entry_footer(); ?>
							</footer> <!-- entry-footer -->	
                    </div>
                    <!--/.Post-->

                    <hr>
						
                    
               
			</div>

