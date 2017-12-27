<?php
/**
 * @package osman
 * @since osman 1.0
 * 
 */
?>         
                <!--First column-->  
				<div class="row <?php post_class(); ?>" id="post-<?php the_ID(); ?>" itemtype="http://schema.org/Blog" itemscope="itemscope" >
				<?php if ( is_sticky() && is_home() && ! is_paged() ) {
							printf( '<span class="sticky-pin"></span>' );
						} ?>
				<!--Featured image-->
                <div class="col-md-7">
                    <div class="view overlay hm-white-light z-depth-1-half ">
                         <?php osman_post_thumbnail(); ?>
                        <div class="mask"></div>
						<div class="entry-date">
							<span class="entry-day"><?php the_time(__('j','osman')); ?></span>
							<span class="entry-month"><?php the_time(__('M','osman')); ?></span>
						</div><!-- .entry-date -->
                    </div>
                </div>
                <!--/.Featured image-->
				  <!--Post excerpt-->
                <div class="col-md-5">
                    <!--Title-->
							<header class="entry-header entry-header__has-date">
							<?php the_title( sprintf( '<div class="title-bordered border__solid"><h2 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2></div>' ); ?>
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
							<footer class="entry-footer navbar-fixed-bottom">
								<?php osman_entry_footer(); ?>
							</footer> <!-- entry-footer -->	
						</div><!-- .entry-body -->
							
                </div>
                <!--/.Post excerpt-->
				 <hr class="extra-margin">
				
              