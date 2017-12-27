<?php
/**
 *
 * Register Menus, Sidebars, Footer widgets
 *
 * @package osman
 * @since osman 1.0
 */

/**
    Menus & Navigation
**/

// Primary menu
function osman_main_nav() {
  wp_nav_menu(array(
    'menu'              => __('Primary', 'osman'),
    'theme_location'    => 'primary',
    'container'         => false,
    'menu_class'        => 'nav navbar-nav',
    'fallback_cb'       => 'b4st_walker_nav_menu::fallback',
	'items_wrap'				=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth' => 0,
    'walker'            => new b4st_walker_nav_menu()
    ) 
  );
}
//
// One Page menu
function osman_onepage_nav() {
  wp_nav_menu(array(
    'menu'              => __('One Page', 'osman'),
    'theme_location'    => 'one-page',
    'container'         => false,
    'menu_class'        => 'nav navbar-nav',
    'fallback_cb'       => 'osman_onepage_walker_nav_menu::fallback',
	'items_wrap'				=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'walker'            => new osman_onepage_walker_nav_menu()
    ) 
  );
}
// Footer menu
function osman_footer_nav() {
  wp_nav_menu(array(
    'menu'              => __('Footer Menu', 'osman'),
    'theme_location'    => 'osman-footer-menu',
    'container'         => false,
    'menu_class'        => 'unstyled',
    'fallback_cb'       => 'b4st_walker_nav_menu::fallback',
	'items_wrap'				=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'walker'            => new b4st_walker_nav_menu()
    ) 
  );
}
// Push menu
function osman_push_nav() {
  wp_nav_menu(array(
    'menu'              => __('Push Menu', 'osman'),
    'theme_location'    => 'osman-push-menu',
    'container'         => false,
    'menu_class'        => 'push-menu',
    'menu_id'        => 'push-menu',
    'fallback_cb'       => 'b4st_walker_nav_menu::fallback',
	'items_wrap'				=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'walker'            => new b4st_walker_nav_menu()
    ) 
  );
}

/**
    Add search box to Navigation menu
**/
function osman_add_search_box($items, $args) {
    if($args->theme_location == 'primary' && osman_get_option('navbar_search') ) {
        $searchlink = '
        <li id="search_dropdown" class="nav-item osman-menu">
            <a href="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown"><i class="fa fa-search" aria-hidden="true"></i></a>                 
            <ul id="dropdown_animation" class="dropdown-menu osman-slide-search">
                <li>
                    <form class="navbar-form navbar-right form-inline" role="search" action="'. esc_url( get_home_url( '/' ) ) . '">     
                        <div class="input-group form-group waves-effect waves-light">
                        <label for="nav-search" class="screen-reader-text">' . sprintf ( __('Search', 'osman') ) . '</label>
                            <input type="text" name="s" id="nav-search" class="search-pop form-control" value="" placeholder="' . sprintf (__('Search', 'osman') ) . '"/>
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default pull-right"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </span>
                        </div>
                    </form>
                </li>
            </ul>
        </li>';
		
        $items .= $searchlink;
		if ( is_woocommerce_activated() && !empty( osman_get_option('wc_header_cart_link') ) && 1 == osman_get_option('wc_header_cart_link') ) {     
	        		 //if ( is_cart() ) { echo 'class="current-menu-item"'; } 
					 $woocommerce_cart_icon = osman_get_option('osman_woocommerce_cart_icon');
					$items .= osman_wc_cart_link($woocommerce_cart_icon); } 
				
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'osman_add_search_box', 10, 2);


/**
    Register widgetized area and update sidebar with default widgets
**/

function osman_widgets_init() {

  // add sidebars
	register_sidebar( array(
	'name'          => esc_html__( 'Default Sidebar', 'osman' ),
	'id'            => 'osman-sidebar',
	'description'   => esc_html__( 'Main Sidebar that appears on posts, pages, archives.', 'osman' ),
	'before_widget' => '<aside id="%1$s" class="widget widget__sidebar %2$s">',
	'after_widget'  => '</aside>',
	'before_title'  => '<div class="widget-title title-bordered border__solid"><h3>',
	'after_title'   => '</h3></div>',
		) );
		
	register_sidebar( array(
	'name'          => __( 'Pages Sidebar', 'osman' ),
	'id'            => 'sidebar-page',
	'description'   => __('The page sidebar, place widgets here will show in all pages','osman'),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="widget-title">',
	'after_title'   => '</h3>',
	) ); 
	
	register_sidebar( array(
	'name'          => __( 'Blog Sidebar', 'osman' ),
	'id'            => 'sidebar-blog',
	'description'   => __('The blog sidebar, place widgets here will show in all Blogs','osman'),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="widget-title">',
	'after_title'   => '</h3>',
	) ); 
	register_sidebar( array(
	'name'          => __( 'Woocommerce Sidebar', 'osman' ),
	'id'            => 'sidebar-woocommerce',
	'description'   => __('The blog sidebar, place widgets here will show in all Blogs','osman'),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="widget-title">',
	'after_title'   => '</h3>',
	) ); 
	register_sidebar( array(
	'name'          => __( 'Pushmenu Top Sidebar', 'osman' ),
	'id'            => 'sidebar-pushmenu-top',
	'description'   => __('The pushmenu sidebar, place widgets top pushmenu','osman'),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="widget-title">',
	'after_title'   => '</h3>',
	) ); 
	register_sidebar( array(
	'name'          => __( 'Pushmenu Bottom Sidebar', 'osman' ),
	'id'            => 'sidebar-pushmenu-bottom',
	'description'   => __('The pushmenu sidebar, place widgets bottom pushmenu ','osman'),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="widget-title">',
	'after_title'   => '</h3>',
	) ); 

  // add footer widgets
  switch (osman_get_option('osman_footer_col')) {
    case '1':
    register_sidebar(array(
     'name'          => __( 'Footer Widget 1', 'osman' ),
     'id'            => 'footer-widget-1',
     'description'   => __('Footer Widget Columns 1,2,3,4 place widgets as per no. , change from theme options.', 'osman'),
     'before_widget' => '<article class="footer-widgets col-md-12 %2$s" id="%1$s">',
     'after_widget'  => '</article>',
     'before_title'  => '<h3 class="footer-widget-title">',
     'after_title'   => '</h3>',
     ) );
    break;

    case '2':
    register_sidebar(array(
     'name'          => __( 'Footer Widget', 'osman' ),
     'id'            => 'footer-widget-1',
     'description'   => __('Footer Widget Columns 1,2,3,4 place widgets as per no. , change from theme options.', 'osman'),
     'before_widget' => '<article class="footer-widgets col-md-6 %2$s" id="%1$s">',
     'after_widget'  => '</article>',
     'before_title'  => '<h3 class="footer-widget-title">',
     'after_title'   => '</h3>',
     ) );
    break;

    case '3':
    register_sidebar(array(
     'name'          => __( 'Footer Widget', 'osman' ),
     'id'            => 'footer-widget-1',
     'description'   => __('Footer Widget Columns 1,2,3,4 place widgets as per no. , change from theme options.', 'osman'),
     'before_widget' => '<article class="footer-widgets col-md-4 %2$s" id="%1$s">',
     'after_widget'  => '</article>',
     'before_title'  => '<h3 class="footer-widget-title">',
     'after_title'   => '</h3>',
     ) );
    break;

    case '4':
    register_sidebar(array(
     'name'          => __( 'Footer Widget', 'osman' ),
     'id'            => 'footer-widget-1',
     'description'   => __('Footer Widget Columns 1,2,3,4 place widgets as per no. , change from theme options.', 'osman'),
     'before_widget' => '<article class="footer-widgets col-md-3 %2$s" id="%1$s">',
     'after_widget'  => '</article>',
     'before_title'  => '<h3 class="footer-widget-title">',
     'after_title'   => '</h3>',
     ) );
    break;
  }
}

add_action( 'widgets_init', 'osman_widgets_init' );