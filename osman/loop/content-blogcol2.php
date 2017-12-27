<?php
/**
 * @package osman
 * @since osman 1.0
 * 
 */
?>
 <!--First row-->
            
                <!--First column-->
               <div class="col-md-6">
                    <!--Card-->
                    <div class="card <?php post_class(); ?>" id="post-<?php the_ID(); ?>" itemtype="http://schema.org/Blog" itemscope="itemscope">
						<?php if ( is_sticky() && is_home() && ! is_paged() ) {
							printf( '<span class="sticky-pin"></span>' );
						} ?>
                        <!--Card image-->
                        <div class="view overlay hm-white-slight">
                            <?php osman_post_thumbnail(); ?>
                           <div class="entry-date">
							<span class="entry-day"><?php the_time(__('j','osman')); ?></span>
							<span class="entry-month"><?php the_time(__('M','osman')); ?></span>
						</div><!-- .entry-date -->
                        </div>
                        <!--/.Card image-->

                        <!--Card content-->
                        <div class="card-block">
                            <!--Title-->
							<header class="entry-header entry-header__has-date">
							<?php the_title( sprintf( '<div class="title-bordered border__solid"><h4 class="card-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4></div>' ); ?>
							</header><!-- .entry-header -->
										   
                            <!--Text-->
                            <p class="card-text"><?php osmant_cats_GetTheExcerpt(); ?></p>
                            <div class="entry-excerpt">
							<div class="entry-content clearfix">
								<?php

									wp_link_pages( array(
										'before'      	 => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'osman' ) . '</span>',
										'after'       	 => '</div>',
										'link_before' 	 => '<span>',
										'link_after'  	 => '</span>',
										'current_before' => '',
										'current_after'  => '',
										'pagelink'    	 => '%',
									) );
								?>
							</div>
							</div><!-- .entry-excerpt -->
						</div><!-- .entry-body -->
							<footer class="entry-footer">
								<?php osman_entry_footer(); ?>
							</footer> <!-- entry-footer -->		
												</div>
                        <!--/.Card content-->
					</div>
                    <!--/.Card-->
               
			

