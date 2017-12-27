;(function($){
  "use strict";

  $(window).load(function() {
    // Page loader
    $(".preloader-wrapper div").delay(0).fadeOut();
    $(".page-loader").delay(200).fadeOut("slow");
	
      // Social
      $('.entry-social-trigger').on('click', function () {
        $(this).next("ul").toggleClass('animated bounceIn');
      });
	  $('#push-menu-trigger').click(function() {
                $(this).toggleClass('open');
                $('#header').toggleClass('open-menu');
                
                $('#primary-menu > ul > li > a').on('click', function(){
                    if(!$(this).next().is('ul')) {
                        $('#push-menu-trigger').removeClass('open');
                        $('#header').removeClass('open-menu');
                    }
                }); 
            });
  });
  
  var filterList = {
		
			init: function () {
			
				// MixItUp plugin
				// http://mixitup.io
				$('#portfoliolist').mixItUp({
  				selectors: {
    			  target: '.portfolio',
    			  filter: '.filter'	
    		  },
    		  load: {
      		  filter: '.all'  
      		}     
				});								
			
			}

		};
		
		// Run the show!
		filterList.init();
		
		//bootstrap parent link clickable
		$("a.nav-link").click(function(e){
             e.preventDefault();
			var href = $(this).attr('href')
  window.location=href;
});
  
	$('[data-toggle="popover"]').popover()
	$('[data-toggle="tooltip"]').tooltip();
	$('.nav-tabs a:first').tab('show'); 
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
		var actives = $(this).closest('ul').find('a.active');
		actives.not($(this)).removeClass('active');		
       // $(this).tab('show');
    });
});

$(".carousel-indicators-generic.carousel-shortcode").first().addClass("active");
$(".carousel-item.carousel-shortcode").first().addClass("active");
//pagination
$("#mdb-navigation > ul > li").addClass("page-item");
$("#mdb-navigation > ul > li > a").addClass("page-link");
 $('.carousel-item-testimonial').eq(1).addClass('active');
 
})(jQuery);