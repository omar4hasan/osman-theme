;(function($){
  "use strict";
jQuery(document).ready(function($){
	// Products
	jQuery( 'ul.products li.product' ).hover( function() {
		jQuery( this ).find( '.details' ).removeClass( 'bounceOutRight' ).addClass( 'animated bounceInLeft' );
		jQuery( this ).children( '.button' ).removeClass( 'bounceOutRight' ).addClass( 'animated bounceInLeft' );
	}, function() {
		jQuery( this ).find( '.details' ).removeClass( 'bounceInLeft' ).addClass( 'bounceOutRight' );
		jQuery( this ).children( '.button' ).removeClass( 'bounceInLeft' ).addClass( 'bounceOutRight' );
	});

	// sub categories
	jQuery( 'ul.products li.product-category' ).hover( function() {
		jQuery( this ).find( '.sub-category-title' ).removeClass( 'bounceOutRight' ).addClass( 'animated bounceInLeft' );
	}, function() {
		jQuery( this ).find( '.sub-category-title' ).removeClass( 'bounceInLeft' ).addClass( 'bounceOutRight' );
	});

	// WooCommerce message animation
	jQuery( '.woocommerce-message, .woocommerce-error' ).addClass( 'animated bounce' );

	// Products IE8 compatibility
	jQuery( '.ie8 ul.products li.product .details, .ie8 ul.products li.product .button' ).hide();
	jQuery( '.ie8 ul.products li.product' ).hover( function() {
		jQuery( this ).find( '.details, .button' ).fadeToggle();
		jQuery( this ).find( 'img' ).animate( { "opacity" : 0.5 }, 250 );
	}, function() {
		jQuery( this ).find( 'img' ).animate( { "opacity" : 1 }, 250 );
	});

	jQuery( '.ie8 ul.products li.product-category .sub-category-title' ).hide();
	jQuery( '.ie8 ul.products li.product-category' ).hover( function() {
		jQuery( this ).find( '.sub-category-title' ).fadeToggle();
	});
});

})(jQuery);