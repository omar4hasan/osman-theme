<?php
/**
 * Template functions
 */
if ( ! defined( 'ABSPATH' ) ) exit;

/*-----------------------------------------------------------------------------------*/
/* Products
/* Functions affecting WooCommerce products
/*-----------------------------------------------------------------------------------*/

/**
 * Archive description wrap open
 * Checks if the shop page has content, or the term (category, tag etc) has content before displaying a wrap opener.
 * Hooked into: woocommerce_archive_description()
 */
function osman_wc_archive_description_wrap_open() {
	$page_id 		= get_option( 'woocommerce_shop_page_id' );
	$page_object 	= get_page( $page_id );

	if ( is_shop() && isset($page_object->post_content) != '' ) {
		$description = true;
	} elseif ( ! is_shop() ) {
		$term_obj = get_queried_object();
		$description = term_description( $term_obj->term_id, $term_obj->taxonomy );
	} else {
		$description = '';
	}
	if ( $description != '' ) {
	?>
		<div class="archive-description content-container-fullwidth">
	<?php
	}
}

/**
 * Archive description wrap open
 * Checks if the shop page has content, or the term (category, tag etc) has content before displaying a wrap opener.
 * Hooked into: woocommerce_archive_description()
 */
function osman_wc_archive_description_wrap_close() {
	$page_id 		= get_option( 'woocommerce_shop_page_id' );
	$page_object 	= get_page( $page_id );

	if ( is_shop() && isset($page_object->post_content) != '' ) {
		$description = true;
	} elseif ( ! is_shop() ) {
		$term_obj = get_queried_object();
		$description = term_description( $term_obj->term_id, $term_obj->taxonomy );
	} else {
		$description = '';
	}
	if ( $description != '' ) {
	?>
		</div>
	<?php
	}
}

/**
 * Archive sorting wrap open
 * Wraps the product sorter and totals
 */
function osman_wc_archive_sorting_wrap_open() {
	?>
		<div class="archive-description product-sorting content-container-fullwidth">
	<?php
}

/**
 * Archive sorting wrap close
 * Wraps the product sorter and totals
 */
function osman_wc_archive_sorting_wrap_close() {
	?>
		</div>
	<?php
}

/**
 * Opens the product details wrap (loop)
 */
function osman_wc_product_loop_content_wrap_open() {
	?>
		<div class="details">
	<?php
}


/**
 * Closes the product details wrap (loop)
 */
function osman_wc_product_loop_content_wrap_close() {
	?>
		</div><!-- /.details -->
	<?php
}

/**
 * Opens the product loop wrap
 */
function osman_wc_product_loop_wrap_open() {
	?>
		<div class="content-container-fullwidth-nopadding">
	<?php
}


/**
 * Closes the product loop wrap
 */
function osman_wc_product_loop_wrap_close() {
	?>
		</div><!-- /.content-container-fullwidth-nopadding -->
	<?php
}


/**
 * Opens the sub category title wrap
 */
function osman_wc_subcat_title_wrap() {
	?>
		<div class="sub-category-title">
	<?php
}


/**
 * Closes the sub category title wrap
 */
function osman_wc_subcat_title_wrap_close() {
	?>
		</div>
	<?php
}


/**
 * Archive title
 */
function osman_wc_page_title() {
	?>
	<div class="archive-header content-container-fullwidth">
		<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
		<?php the_widget( 'WC_Widget_Product_Search', 'title=' ); ?>
	</div>
	<?php
}
/**
*Defined shop page
*/
add_filter( 'woocommerce_page_title', 'osman_shop_page_title');
function osman_shop_page_title( $shop_name ) {
$shop_name=osman_get_option('osman_shop-name');
                if( !empty($shop_name)) {
                                return $shop_name;
                }
}
/**
 * Upsells
 * Replace the default upsell function with our own which displays the correct number product columns
 */
if ( ! function_exists( 'osman_wc_upsell_display' ) ) {
	function osman_wc_upsell_display() {
	$posts_per_page=osman_get_option('osman_shop-related-per-page');
	$columns=osman_get_option('osman__shop-related-columns');
	    woocommerce_upsell_display( $posts_per_page, $columns );
	}
}

/**
 * Related Products
 * Replace the default related products function with our own which displays the correct number of product columns
 * @return array indicates number of products to display and in how many columns
 */
function osman_wc_related_products() {
	$posts_per_page=osman_get_option('osman_shop-related-per-page');
	$columns=osman_get_option('osman__shop-related-columns');
	//print_r($columns);
	$args = array(
		'posts_per_page' => $posts_per_page,
		'columns'        => $columns,
	);
	
	return $args;
	
}

if ( ! function_exists('woocommerce_output_related_products') && version_compare( WOOCOMMERCE_VERSION, "2.1" ) < 0 ) {
	function woocommerce_output_related_products() {
		    woocommerce_related_products( 3,3 );
	}
}


if ( ! function_exists( 'osman_wc_placeholder_img_src' ) ) {
	/**
	 * Custom Placeholder
	 * Checks the theme option. If a custom placeholder is specified display it, otherwise display our Osman themed placeholder.
	 * @param  string $src Placeholder URL
	 * @return string      Sanitized placeholder URL
	 */
	function osman_wc_placeholder_img_src( $src ) {
	$src = osman_get_option('osman_wc_placeholder_img');
		if ( isset( $src ) && '' != $src ) {
			return esc_url( $src['url'] );
		}
	} // End osman_wc_placeholder_img_src()
}


/*-----------------------------------------------------------------------------------*/
/* Layout
/* Functions affecting the WooCommerce layout
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'osman_wc_before_content' ) ) {
	/**
	 * Woo Wrapper Open
	 * Wraps WooCommerce pages in WooTheme Markup
	 */
	function osman_wc_before_content() {
		global $post;
		$page_layout='';
		if( is_shop() || is_product_category() ) {
		  $post_id = get_option( 'woocommerce_shop_page_id' );
		} else {
		  $post_id = $post->ID;
		}
		if(is_shop()){
		$page_layout    = get_post_meta( $post_id, 'osman_sidebar', true );}
		elseif(is_product_category()){$page_layout    = osman_get_option('osman-shoparchive-sidebar');}
		elseif (is_product()) {$page_layout    = osman_get_option('osman-shopsingle-sidebar');}
		// Right Sidebar by default
		$page_layout_content = 'col-md-9';		
		if ( $page_layout == 'none' ) {
		// Full width Layout
		$page_layout_content = 'col-md-12';
		} elseif ( $page_layout == 'left' ) {
			// Left Sidebar Layout
			$page_layout_content = 'col-md-9 push-md-3';
		}
		?>
		<!-- #content Starts -->
		<?php //osman_content_before(); ?>
	    <div id="primary" class="content-area <?php echo $page_layout_content; ?>">

	        <!-- #main Starts -->
	        <?php //osman_main_before(); ?>
	        <div id="main">

	    <?php
	} // End osman_wc_before_content()
}

if ( ! function_exists( 'osman_wc_after_content' ) ) {
	/**
	 * Woo Wrapper Close
	 * Wraps WooCommerce pages in WooTheme Markup
	 */
	function osman_wc_after_content() {
		?>
			</div><!-- /#main -->
	        <?php //osman_main_after(); ?>

	    </div><!-- /#content -->
		<?php 
		global $post;
		$page_layout='';
		if( is_shop() || is_product_category() ) {$post_id = get_option( 'woocommerce_shop_page_id' );
		} else {$post_id = $post->ID;}
		if(is_shop()){$page_layout    = get_post_meta( $post_id, 'osman_sidebar', true );}
		elseif(is_product_category()){$page_layout    = osman_get_option('osman-shoparchive-sidebar');}
		elseif (is_product()) {$page_layout    = osman_get_option('osman-shopsingle-sidebar');}
		$page_layout_sidebar = 'col-md-3';
		if ( $page_layout == 'none' ) {$page_layout_sidebar ='';}
		elseif ( $page_layout == 'left' ) {
			// Left Sidebar Layout
			$page_layout_sidebar = 'col-md-3 pull-md-9';
		}
		 if ( $page_layout != 'none' ) : 
		 
		 if ( is_active_sidebar( 'sidebar-woocommerce' ) )  {?>
				<aside id="sidebar" class="panel panel-warning <?php echo $page_layout_sidebar; ?>" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
		<?php get_sidebar('shop'); ?>
		</aside>
		<?php } ?>
		<?php endif; ?>
		<?php //osman_content_after(); ?>
	    <?php
	} // End osman_wc_after_content()
}

/*products per page*/
if ( ! function_exists( 'osman_wc_loop_products' ) ) {
	/**
	 * Products per page
	 * @return integer number of products per page
	 */
	function osman_wc_loop_products( $products ) {
		$products= osman_get_option('osman_shop-products-per-page');
		return $products;
	}
}

/**
 * Set the product columns
 *
 * @return void
 */
			function osman_wc_columns() {
				// Product columns.
				if ( is_shop() || is_product_taxonomy() || is_product_category() || is_product_tag() ) {
					add_filter( 'body_class',  'osman_woocommerce_columns'  );
					
					add_filter( 'loop_shop_columns',  'osman_woocommerce_products_row' );
				}
			}

						
/**
 * Product columns class
 *
 * @param  array $classes current body classes.
 * @return array          new body classes
 */
			function osman_woocommerce_columns( $classes ) {
				$columns= osman_get_option('osman_shop-columns');
				$classes[] = 'product-columns-' . $columns;
				
				return $classes;
			}
/**
 * Related Product columns class
 *
 * @param  array $classes current body classes.
 * @return array          new body classes
 */
			function osman_related_product_woocommerce_columns( $classes ) {			
				$rel_product_columns= osman_get_option('osman__shop-related-columns');
				$classes[] = 'related-product-columns-' . $rel_product_columns;
				if( is_singular( 'product' ) ){return $classes;}else{return array('no-related');}
			}


/**
 * Return the desired products per row
 *
 * @return int product columns
 */
			function osman_woocommerce_products_row() {
				$columns= osman_get_option('osman_shop-columns');
				return $columns;
			}
/*-----------------------------------------------------------------------------------*/
/* Pagination / Search */
/* Functions affecting WooCommerce / WooFramework pagination & search */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'osman_wc_pagination' ) ) {
	/**
	 * WooCommerce Pagination
	 * Replaces WooCommerce pagination with the function in the WooFramework
	 * @uses  osman_wc_add_search_fragment()
	 * @uses  osman_wc_pagination_defaults()
	 * @uses  osman_pagination()
	 */
	function osman_wc_pagination() {
		if ( is_search() && is_post_type_archive() ) {
			add_filter( 'osman_pagination_args', 			'osman_wc_add_search_fragment', 10 );
			add_filter( 'osman_pagination_args_defaults', 'osman_wc_pagination_defaults', 10 );
		}
		osman_pagination();
	} // End osman_wc_pagination()
}

if ( ! function_exists( 'osman_wc_add_search_fragment' ) ) {
	/**
	 * Search Fragment
	 * @param  array $settings Fragments
	 * @return array           Fragments
	 */
	function osman_wc_add_search_fragment ( $settings ) {
		$settings['add_fragment'] = '&post_type=product';
		return $settings;
	} // End osman_wc_add_search_fragment()
}

if ( ! function_exists( 'osman_wc_pagination_defaults' ) ) {
	function osman_wc_pagination_defaults ( $settings ) {
		/**
		 * Pagination Defaults
		 * @param  array $settings Settings
	 	 * @return array           Settings
		 */
		$settings['use_search_permastruct'] = false;
		return $settings;
	} // End osman_wc_pagination_defaults()
}

/*Cart Nav link*/
function osman_add_osman_cart() {


	wp_register_script( 'osman-menucart', get_template_directory_uri() . '/includes/js/woocommerce-osman.min.js', array() , '', 'all');

	wp_localize_script(
		'osman-menucart',
		'osman_menucart_ajax',array('nonce' => wp_create_nonce('osman-menucart'))
	);

	wp_enqueue_script( 'osman-menucart' );

}

add_action('wp_enqueue_scripts', 'osman_add_osman_cart');
/*test*/

function osman_get_cart_items() {
	global $woocommerce;

	$articles = sizeof( $woocommerce->cart->get_cart() );


	$cart = $tot_articles = '';

	if (  $articles > 0 ) {
		$tot_articles = $woocommerce->cart->cart_contents_count;
		foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

				$product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
				$thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
				$product_price = apply_filters( 'woocommerce_cart_item_price', $woocommerce->cart->get_product_price( $_product ), $cart_item, $cart_item_key );

				$cart .= '<li class="cart-item-list clearfix">';
				if ( ! $_product->is_visible() ) {
					$cart .= str_replace( array( 'http:', 'https:' ), '', $thumbnail );
				} else {
					$cart .= '<a class="cart-thumb" href="'.esc_url(get_permalink( $product_id )).'">
								'.str_replace( array( 'http:', 'https:' ), '', $thumbnail ) . '
							</a>';
				}

				$cart .= '<div class="cart-desc"><span class="cart-item">' . $product_name . '</span>';

				$cart .= '<span class="product-quantity">'. apply_filters( 'woocommerce_widget_cart_item_quantity',  '<span class="quantity-container">' . sprintf( '%s &times; %s',$cart_item['quantity'] , '</span>' . $product_price ) , $cart_item, $cart_item_key ) . '</span>';
				$cart .= '</div>';
				$cart .= '</li>';
			}
		}

		$cart .= '<li class="subtotal"><span><strong>' . esc_html__('Subtotal:', 'woocommerce') . '</strong> ' . $woocommerce->cart->get_cart_total() . '</span></li>';

		$cart .= '<li class="buttons clearfix">
								<a href="'.$woocommerce->cart->get_cart_url().'" class="wc-forward btn btn-link btn-sm"><i class="fa fa-shopping-bag"></i>'.esc_html__( 'View Cart', 'woocommerce' ).'</a>
								<a href="'.$woocommerce->cart->get_checkout_url().'" class="checkout wc-forward btn btn-link btn-sm"><i class="fa fa-check-square-o"></i>'.esc_html__( 'Checkout', 'woocommerce' ).'</a>
							</li>';

	}

	return array('cart' => $cart, 'articles' => $tot_articles);
}

function osman_woomenucart_ajax() {
	if ( !wp_verify_nonce( $_REQUEST['nonce'], "osman-menucart")) {
     		exit("No naughty business please");
  	}

	$cart = osman_get_cart_items();

	echo json_encode($cart);

	die();
}

add_action( 'wp_ajax_woomenucart_ajax', 'osman_woomenucart_ajax');
add_action( 'wp_ajax_nopriv_woomenucart_ajax', 'osman_woomenucart_ajax' );


function osman_wc_cart_link($woo_icon) {
	global $woocommerce;
	if(empty($woo_icon)){$woo_icon='fa fa-shopping-bag';}else{$woo_icon='fa '.$woo_icon.'';}
	$tot_articles = $woocommerce->cart->cart_contents_count;
	$get_cart_items = osman_get_cart_items();

	$cart_container = '<ul role="menu" class="osman-cart dropdown-menu drop-menu osman-drop-menu sm-nowrap cart_list product_list_widget osman-cart-dropdown">'.((isset($get_cart_items['cart']) && $get_cart_items['cart'] !=='') ? $get_cart_items['cart'] : '<li><span>' . esc_html__('Your cart is currently empty','osman') . '</span></li>').'</ul>';
	$items ='<li class="osman-menu menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown nav-item open">
				<a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-labelledby="dropdownCart" data-type="title" title="cart">
					<span class="cart-icon-container">';
	$items .= '<i class="'.$woo_icon.'"></i><span class="hidden-lg-up">'. esc_html__('Cart','osman') . '</span>';
	$items .= (( $tot_articles !== 0 ) ? '<span class="badge">'.$tot_articles.'</span>' : '<span class="badge" style="display: none;"></span>').'<i class="fa fa-angle-down fa-dropdown hidden-lg-up"></i>
								</span></a>'.$cart_container.'</li>';

    return $items;
}
//add_filter( 'wp_nav_menu_items', 'osman_wc_cart_link', 10, 2 );
