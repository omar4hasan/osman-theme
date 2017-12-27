jQuery(document).ready(function($){

   function checkField(){
	   $('.osman_meta_subfield').parents('tr').addClass('subfield_master');
	   if ($('.osman_meta_checker').is(':checked')) {
			$('tr.subfield_master').addClass('showed');
	   } else {
	   		$('tr.subfield_master').addClass('hided');
	   }
   }

   $('.osman_meta_checker').on('change', function(){
   		if ($(this).is(':checked')) {
   			$('tr.subfield_master').removeClass('hided').addClass('showed');
	  	} else {
	  		$('tr.subfield_master').removeClass('showed').addClass('hided');
	  	}
	});
	
	$('#post-formats-select input').change(checkFormat);

	$('#mymetabox_revslider_0').hide();

	function checkFormat(){
		var format = $('#post-formats-select input:checked').attr('value');
		
		if(typeof format != 'undefined'){
			
			if(format == 'gallery'){
				$('#poststuff div[id$=slide][id^=post]').stop(true,true).fadeIn(500);
			}
			
			else {
				$('#poststuff div[id$=slide][id^=post]').stop(true,true).fadeOut(500);
			}
			
			$('#post-body div[id^=osman-metabox-post-]').hide();
			$('#post-body div[id^=osman-metabox-post-header]').show();
			$('#post-body #osman-metabox-post-'+format+'').stop(true,true).fadeIn(500);
					
		}
	
	}

	function toggleSectionComposer(){
		$('body').delegate('.hide_row', 'click', function(){
			$(this).toggleClass('view');
			$(this).parents('.wpb_vc_row').find('.wpb_vc_column').eq(0).fadeToggle(150);
			return false;
		});
	}
	
	toggleSectionComposer();
	
	$(window).load(function(){
		checkFormat();
		checkField();
	})
	
	$('#poststuff div[id$=slide][id^=post]').hide();
});


