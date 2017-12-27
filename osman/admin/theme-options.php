<?php
/**
 *
 * Redux framework functions
 *
 * @package admin panel functions
 * @author omar http://www.okoutsourcing.com
 * @copyright Copyright (c) 2015, osman
 * @since osman 1.0
 */

/**
	Change customizer link
*/
/* Change customize link to theme options instead of live customizer */
function osman_change_customize_link($themes) {
	if(array_key_exists('osman', $themes)) {
		$themes['osman']['actions']['customize'] = admin_url('admin.php?page=osman_options');
	}
	return $themes;
}
add_filter('wp_prepare_themes_for_js', 'osman_change_customize_link');

/**
	Theme option function
*/

/* Generate theme option compressed CSS */
function osman_generate_option_css(){
	ob_start();
	get_template_part('admin/options-css');
	$output = ob_get_contents();
	ob_end_clean();
	return osman_compress_css_code($output);
}

/* add to head including favicons and custom css */
function osman_generate_option_to_head(){
	// Add favicons
	$favicon = osman_get_option_media('favicon');
	if(!empty($favicon)) { 
		echo '<link rel="shortcut icon" href="' . esc_url( $favicon ) . '" type="image/x-icon" />';
	}

	// Add apple touch icon
	$apple_touch_icon = osman_get_option_media('apple_touch_icon');
	if(!empty($apple_touch_icon)) { 
		echo '<link href="' . esc_url( $apple_touch_icon ) . '" rel="apple-touch-icon" />';
	}

	// Theme option CSS output
	$option_css = trim(preg_replace( '/\s+/', ' ', osman_generate_option_css()));
	if(!empty($option_css)) {
		echo '<style media="all" type="text/css">' . $option_css . '</style>';
	}
	// Custom CSS
	$custom_css = trim(preg_replace( '/\s+/', ' ', osman_get_option('custom_css')));
	if(!empty($custom_css)) {
		echo '<style media="all" type="text/css">' . $custom_css . '</style>';
	}
}
add_action('wp_head', 'osman_generate_option_to_head', 99);

/* Compress CSS output */
function osman_compress_css_code($code) {
	// Remove Comments
	$code = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $code);

	// Remove tabs, spaces, newlines, etc.
	$code = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $code);
	return $code;
}

/* Get theme option function */ 
function osman_get_option($option){
	global $osman_settings;
	if(isset($osman_settings[$option])){
		return $osman_settings[$option];
	} else {
		return false;
	}
}

/* Update theme option function */ 
function osman_update_option($key = false, $value = false){
	global $Redux_Options;
	if(!empty($key)){
		$Redux_Options->set($key, $value);
	} 
}

/* Additional JS output into theme footer if specified in theme options */
function osman_wp_footer(){
	
	//Additional JS
	$custom_js = trim(preg_replace( '/\s+/', ' ', osman_get_option('custom_js')));
	if(!empty($custom_js)) {
		echo '<script type="text/javascript">
			/* <![CDATA[ */
				' . $custom_js . '
			/* ]]> */
			</script>';
	}
}
add_action('wp_footer', 'osman_wp_footer', 99);

/* Convert hexdec color string to rgba */
function osman_hex2rgba($color, $opacity = false) {
	$default = 'rgb(0,0,0)';

	//Return default if no color provided
	if(empty($color))
		return $default;

	//Sanitize $color if "#" is provided
	if ($color[0] == '#' ) {
		$color = substr( $color, 1 );
	}

  //Check if color has 6 or 3 characters and get values
	if (strlen($color) == 6) {
		$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
	} elseif ( strlen( $color ) == 3 ) {
		$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
	} else {
		return $default;
	}

  //Convert hexadec to rgb
	$rgb = array_map('hexdec', $hex);

  //Check if opacity is set(rgba or rgb)
	if($opacity){
		if(abs($opacity) > 1){ $opacity = 1.0; }
		$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
	} else {
		$output = 'rgb('.implode(",",$rgb).')';
	}

  //Return rgb(a) color string
	return $output;
}

/* Get image option url */
function osman_get_option_media($option){
	$media = osman_get_option($option);
	if(isset($media['url']) && !empty($media['url'])){
		return $media['url'];
	}
	return false;
}

/* Maintenance mode.*/
function osman_maintenance_mode(){  
  if( osman_get_option ('maintenance_mode') && !is_user_logged_in() ) {  
  $osman_comming_socials  = osman_get_option("osman-social-coming-soon");
  $announce=osman_get_option("osman-coming-days-notice-txt"); 
  $backgroundcolor  = osman_get_option("osman-coming-bg");
  
  $optdaybg  = osman_get_option("osman-coming-days-bg");
  $optdaytborder  = osman_get_option("osman-coming-days-border-color");
  $opthoursbg  = osman_get_option("osman-coming-hours-bg");
  $opthourstborder  = osman_get_option("osman-coming-hours-border-color");
  $optminbg  = osman_get_option("osman-coming-mins-bg");
  $optmintborder  = osman_get_option("osman-coming-mins-border-color");
  $optsecbg  = osman_get_option("osman-coming-secs-bg");
  $optsectborder  = osman_get_option("osman-coming-secs-border-color");

  $date  = osman_get_option("osman-coming-datepicker");
  $days  = osman_get_option("osman-coming-days-txt");
  $hours = osman_get_option("osman-coming-hours-txt");
  $mins  = osman_get_option("osman-coming-mins-txt");
  $secs  = osman_get_option("osman-coming-secs-txt");
  
   ?>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
 <link media="all" type="text/css" href="<?php echo OSMAN_CSS_URI ?>/bootstrap.min.css?ver=4.5.3" id="osman-bootstrap-css" rel="stylesheet">
 <link media="all" type="text/css" href="<?php echo OSMAN_CSS_URI ?>/all.min.css?ver=4.5.3" id="osman-all-css-css" rel="stylesheet">
 <style>
 body#error-page, html{background-color:<?php echo $backgroundcolor['background-color'];  ?>!important}body#error-page{max-width:100%; }
 .countdown .desc,.countdown .number{font-family:"Exo 2",sans-serif;text-align:center}
 .timeline>div>a,.timeline>div>a h5{transition:all .2s ease 0s;position:relative}
 .countdown{overflow:hidden;padding:80px 0}
 .countdown .number{border-radius:50%;color:#fff;font-size:24px;font-weight:700;height:80px;line-height:80px;margin:0 auto 10px;position:relative;width:80px}
 @media (min-width:768px){.countdown .number{font-size:48px;height:120px;line-height:120px;margin-bottom:20px;width:120px}}
 @media (min-width:992px){.countdown .number{font-size:64px;height:186px;line-height:186px;margin-bottom:50px;width:186px}}
 @media (min-width:480px) and (max-width:767px){.countdown .number{font-size:24px!important}}
 .countdown .number:before{border:1px solid #836aa0;border-radius:50%;bottom:-3px;content:"";display:block;left:-3px;position:absolute;right:-3px;top:-3px}
 .countdown .desc{display:block;font-size:18px;margin-bottom:30px;text-transform:uppercase}
 @media (min-width:768px){.countdown .number::before{border:3px solid #836aa0;bottom:-10px;left:-10px;right:-10px;top:-10px}.countdown .desc{margin-bottom:10px}}
 @media (min-width:992px){.countdown .desc{margin-bottom:10px}}
 .countdown.countdown__color-circles .number:before{border:1px solid #fff}
 .countdown.countdown__color-circles .days-count{background:#ffa76c}
 .countdown.countdown__color-circles .hours-count{background:#ff7149}
 .countdown.countdown__color-circles .mins-count{background:#ea582f}
 .countdown.countdown__color-circles .secs-count{background:#d44546}
 .countdown.countdown__sm{padding:8px 0}@media (min-width:768px){.countdown.countdown__color-circles .number::before{border-width:3px}.countdown.countdown__sm .number{font-size:32px;height:90px;line-height:90px;margin-bottom:20px;width:90px}.countdown.countdown__sm .number::before{border-width:2px;bottom:-6px;left:-6px;right:-6px;top:-6px}}
 .timeline{position:relative}.timeline li:before{display:none}.timeline>div{padding-bottom:40px;text-align:center}
 @media (min-width:992px){.countdown.countdown__sm .number{font-size:52px;height:130px;line-height:124px;margin-bottom:20px;width:130px}.timeline::after{background-image:linear-gradient(to right,#7648a3 0,#836aa0 100%);background-repeat:repeat-x;content:"";display:block!important;height:2px;left:0;position:absolute;right:0;top:54px;z-index:1}.timeline>div{margin-bottom:0}}
 .timeline>div>a{color:#fff;display:block}.timeline>div>a h5{color:#b59ecf;font-family:"Open Sans",sans-serif;font-size:14px;font-weight:700;margin-bottom:10px;text-transform:uppercase}
 .timeline>div>a .desc-holder{display:block;padding-top:14px;position:relative}@media (min-width:992px){.timeline>div>a h5{margin-bottom:36px}.timeline>div>a .desc-holder{padding-top:39px}}
 .timeline>div>a .desc-holder:before{background:#413458;border:2px solid #836aa0;border-radius:50%;content:"";display:block;height:12px;left:50%;margin:-3px 0 0 -6px;position:absolute;top:0;width:12px;z-index:2}
 @media (min-width:992px){.timeline>div>a .desc-holder:after{color:#ff7149;content: "\f00c";display:block;font-family:FontAwesome;font-size:14px;font-style:normal;font-weight:400;left:50%;line-height:1;margin:-3px 0 0 -6px;opacity:0;position:absolute;top:0;transition:all .2s ease 0s;z-index:2}.timeline>div>a.timeline-step__active h5,.timeline>div>a:hover h5{color:#f9f6f3;transform:translate(0,-14px)}}.timeline>div>a .desc-holder .desc{display:block;font-family:"Exo 2",sans-serif;font-weight:300;opacity:.4;transition:all .2s ease 0s}.timeline>div>a.timeline-step__active,.timeline>div>a:hover{text-decoration:none}@media (min-width:992px){.timeline>div>a.timeline-step__active .desc-holder::before,.timeline>div>a:hover .desc-holder::before{background:rgba(131,106,160,.5);border-width:0;transform:scale(4,4)}.timeline>div>a.timeline-step__active .desc-holder::after,.timeline>div>a:hover .desc-holder::after{opacity:1;transition-delay:50ms}.timeline>div>a.timeline-step__active .desc-holder .desc,.timeline>div>a:hover .desc-holder .desc{opacity:1;transform:translate(0,30px)}.timeline>div>a.item-checkmark__active .desc-holder::before{background:rgba(131,106,160,.5);border-width:0;transform:scale(4,4)}.timeline>div>a.item-checkmark__active .desc-holder::after{opacity:1;transition-delay:50ms}}.timeline>div>a.timeline-step__non-active{cursor:default}h1.maintain{color:#fff}
 .screen-reader-text {clip: rect(1px, 1px, 1px, 1px);height: 1px;overflow: hidden;position: absolute !important;width: 1px;}#header-social {text-align: right;}#header-social > ul > li {display: inline-block;}
#header-social > ul > li > a { display: block;font-size: 1em;height: 33px;line-height: 33px;text-align: center;width: 34px;}a {color: #337ab7;text-decoration: none;}ol, ul {text-align: center;}
.countdown.countdown__color-circles .days-count{background:<?php echo $optdaybg['background-color'];  ?>}
.countdown.countdown__color-circles .hours-count{background:<?php echo $opthoursbg['background-color'];  ?>}
.countdown.countdown__color-circles .mins-count{background:<?php echo $optminbg['background-color'];  ?>}
.countdown.countdown__color-circles .secs-count{background:<?php echo $optsecbg['background-color'];  ?>}

.countdown .number.days-count:before{border-color:<?php echo $optdaytborder;  ?>!important }
.countdown .number.hours-count:before{border-color:<?php echo $opthourstborder;  ?>!important}
.countdown .number.mins-count:before{border-color:<?php echo $optmintborder;  ?>!important}
.countdown .number.secs-count:before{border-color:<?php echo $optsectborder;  ?>!important}

 </style>
<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php //the_title( '<h1 class="maintain">', '</h1>' ); ?>
				<div class="page-coming-soon-desc">
					<!-- Countdown -->
					<div class="row">
						<div id="countdown" class="countdown countdown__color-circles"></div>
					</div>
					<!-- Countdown / End -->
				</div>
			</div>
		</div>

		<script>
			jQuery(function($){
				$("#countdown").countdown({
        date: "<?php echo esc_js($date); ?>",
        dayText: '',
        daySingularText: '',
        hourText: '',
        hourSingularText: '',
        minText: '',
        minSingularText: '',
        secText: '',
        secSingularText: '',
        template: "<div id='days' class='holder col-sm-3'><div class='days-count number'>%d</div><div class='days-label desc'><?php echo esc_js($days); ?></div></div><div id='hours' class='holder col-sm-3'><div class='hours-count number'>%h</div><div class='hours-label desc'><?php echo esc_js($hours); ?></div></div><div id='mins' class='holder col-sm-3'><div class='mins-count number'>%i</div><div class='mins-label desc'><?php echo esc_js($mins); ?></div></div><div id='secs' class='holder col-sm-3'><div class='secs-count number'>%s</div><div class='secs-label desc'><?php echo esc_js($secs); ?></div></div>"
      });
			});
	</script>

<script src="<?php echo OSMAN_JS_URI ?>/jquery.jcountdown.js?ver=1.1.0" type="text/javascript"></script>
 

</div>
<?php 
if($osman_comming_socials==1){
osman_header_socials(); }
?>
  <?php

    wp_die('<div style="text-align:center"><h1>'.$announce.'</h1></div>', __('Maintenance - please come back soon.', 'osman'), array('response' => '503'));  
  }  
}
add_action('get_header', 'osman_maintenance_mode');