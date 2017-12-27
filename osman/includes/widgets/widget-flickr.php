<?php

class Flickr_Widget extends WP_Widget {
  
  function __construct() {

    $widget_ops = array(
      'classname' => 'widget_flickr',
      'description' => esc_html__('The most recent images from your Flickr account.', 'osman')
    );

    $control_ops = array('id_base' => 'flickr-widget');

    parent::__construct( 'flickr-widget', 'Osman - Flickr', $widget_ops, $control_ops );

  }
  
  function widget($args, $instance) {

    wp_enqueue_script('flickr-feed');

    extract($args);

    $title     = apply_filters('widget_title', $instance['title']);
    $flickr_id = apply_filters('flickr_id', $instance['flickr_id']);
    $count     = $instance['count'];
    $suf       = rand(100000,999999);

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
    
    <script>
      jQuery(document).ready(function() {
        jQuery('#flickr-<?php echo esc_js( $suf ); ?>').jflickrfeed({
          limit: <?php echo esc_js($count); ?>,
          qstrings: {
            id: '<?php echo esc_js($flickr_id); ?>'
          },
          itemTemplate: '<li><a href="{{link}}" target="_blank"><img src="{{image_s}}" alt="{{title}}" /></a></li>'
        });
      });
    </script>
    <ul id="flickr-<?php echo esc_attr( $suf ); ?>" class="flickr-feed"></ul>
    
    <?php
    
    echo wp_kses( $after_widget, array( 'aside' => array() ) );
  }
  
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;

    $instance['title'] = strip_tags($new_instance['title']);
    $instance['flickr_id'] = $new_instance['flickr_id'];
    $instance['count'] = $new_instance['count'];
    
    return $instance;
  }

  function form($instance)
  {
    $defaults = array(
      'title' => esc_html__( 'Flickr', 'osman' ),
      'flickr_id' => '52617155@N08',
      'count' => 9
    );
    $instance = wp_parse_args((array) $instance, $defaults); ?>
    
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php __('Title:', 'osman') ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
    </p>

    </p>
      <label for="<?php echo esc_attr($this->get_field_id('flickr_id') ); ?>"><?php __('ID:', 'osman') ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('flickr_id') ); ?>" name="<?php echo esc_attr( $this->get_field_name('flickr_id') ); ?>" value="<?php echo esc_attr( $instance['flickr_id'] ); ?>" />
    </p>
    
    </p>
      <label for="<?php echo esc_attr($this->get_field_id('count') ); ?>"><?php __('Number of images:', 'osman') ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('count') ); ?>" name="<?php echo esc_attr( $this->get_field_name('count') ); ?>" value="<?php echo esc_attr( $instance['count'] ); ?>" />
    </p>

  <?php
  }
}

register_widget('Flickr_Widget');
