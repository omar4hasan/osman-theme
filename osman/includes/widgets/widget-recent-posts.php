<?php

class Posts_Widget extends WP_Widget {

  function __construct() {

    $widget_ops = array(
      'classname' => 'widget_posts_carousel',
      'description' => esc_html__('The most recent posts on your site.', 'osman')
    );

    $control_ops = array('id_base' => 'latest-posts');

    parent::__construct('latest-posts', 'Osman - Recent Posts (Slider)', $widget_ops, $control_ops);

    //enqueue CSS and JS on frontend only if widget is active.
    if(is_active_widget(false, false, $this->id_base)) {
      add_action('wp_enqueue_scripts', 'osman_carousel_widget_load');
    }
  }

  function widget($args, $instance) {

    extract($args);
    $title = apply_filters('widget_title', $instance['title']);
    $postscount = $instance['postscount'];

    echo wp_kses( $before_widget, array(
      'aside' => array(
        'class' => array(),
        'id'    => array()
      ),
    ));

    if($title) {
      echo wp_kses( $before_title, array('div' => array( 'class' => array() ), 'h3' => array())) . esc_html( $title ) . wp_kses( $after_title, array('div' => array(), 'h3' => array()));
    }
    ?>

    <?php

    $args = array(
      'orderby' => 'date',
      'posts_per_page' => $postscount
    );

    $wp_query = new WP_Query( $args );
    if ( $wp_query->have_posts() ) : ?>

      <div class="owl-carousel owl-theme widget-carousel js_widget-carousel">
        <?php while ($wp_query->have_posts()) : $wp_query->the_post();?>

        <div class="widget-carousel-item">

          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="widget-carousel-thumb-holder">
            <?php if( has_post_thumbnail() ) { ?><?php the_post_thumbnail('osman_post-thumbnail-widget', array('class' => 'alignnone')); ?>
            <?php } else { ?>
              <img src="<?php echo get_template_directory_uri(); ?>/images/placeholder-270x184.jpg" alt="">
            <?php } ?>
          </a>

          <h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>

        </div>

        <?php endwhile; ?>
      </div>

      <?php // Navigation Text
      $prev_text = esc_html__('Prev', 'osman');
      $next_text = esc_html__('Next', 'osman');
      ?>

      <script>
        jQuery(document).ready(function() {
          // Widget Carousel
          jQuery(".js_widget-carousel").owlCarousel({
            loop:true,
            margin:0,
            nav:true,
            responsive:{
              0:{
                items:1
              }
            },
            navText : ["<i class='fa fa-chevron-left'></i> <span><?php echo esc_js( $prev_text ); ?></span>","<span><?php echo esc_js( $next_text ); ?><i class='fa fa-chevron-right'></i></span>"]
          });
        });
      </script>

    <?php endif; ?>

    <?php
    echo wp_kses( $after_widget, array( 'aside' => array() ) );
  }

  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;

    $instance['title'] = strip_tags($new_instance['title']);
    $instance['postscount'] = $new_instance['postscount'];

    return $instance;
  }

  function form($instance)
  {
    $defaults = array(
      'title'      => __( 'Recent Posts', 'osman' ),
      'postscount' => 4
    );
    $instance = wp_parse_args((array) $instance, $defaults); ?>

    <p>
      <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php __('Title:', 'osman') ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
    </p>

    </p>
      <label for="<?php echo esc_attr( $this->get_field_id('postscount') ); ?>"><?php __('Number of posts:', 'osman') ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('postscount') ); ?>" name="<?php echo esc_attr( $this->get_field_name('postscount') ); ?>" value="<?php echo esc_attr( $instance['postscount'] ); ?>" />
    </p>

  <?php
  }
}

register_widget('Posts_Widget');
