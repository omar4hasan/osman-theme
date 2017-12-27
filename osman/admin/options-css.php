<?php
/**
 * @package osman
 * @since osman 1.0
 * 
 */
  // Fonts
  $h1_font = osman_get_option('h1_font');
  $h2_font = osman_get_option('h2_font');
  $h3_font = osman_get_option('h3_font');
  $h4_font = osman_get_option('h4_font');
  $h5_font = osman_get_option('h5_font');
  $h6_font = osman_get_option('h6_font');

  // Header
  $color_header_bg = osman_hex2rgba(osman_get_option('color_header_bg'),osman_get_option('header_bg_opacity'));
  $a_color_header_txt = osman_get_option('a_color_header_txt');
  $a_color_header_hov = osman_get_option('a_color_header_hov');
  $color_nav_bg = osman_get_option('osman_color_nav_bg');
  $color_navbar_bg = osman_get_option('osman_color_navbar_bg');
  $osman_color_navbar_floating_bg = osman_get_option('osman_color_navbar_floating_bg');
  $osman_color_dropdown_bg = osman_get_option('osman_color_dropdown_bg');
  $osman_color_nav_hover = osman_get_option('osman_color_nav_hover');
  $osman_color_masthead_bg = osman_get_option('osman_color_masthead_bg');
  
  //pushmenu
  $osman_pushmenu_bg_color = osman_get_option('osman_pushmenu_bg_color');
  $osman_pushmenu_menu_bg = osman_get_option('osman_pushmenu_menu_bg');
  $osman_pushmenu_menu_bg_hovercolor = osman_get_option('osman_pushmenu_menu_bg_hovercolor');
  $osman_pushmenu_dropdown_bgcolor = osman_get_option('osman_pushmenu_dropdown_bgcolor');
  $osman_pushmenu_top_color = osman_get_option('osman_pushmenu_top_color');
  $osman_pushmenu_trigger_color = osman_get_option('osman_pushmenu_trigger_color');
  $osman_pushmenu_trigger_color_hover = osman_get_option('osman_pushmenu_trigger_color_hover');
  $osman_pushmenu_current_color = osman_get_option('osman_pushmenu_current_color');
  
  // Sub Header
  $color_sub_header_txt = osman_get_option('color_sub_header_txt');
  $osman_top_login = osman_get_option('osman_top_login');
  $osman_top_login_hover = osman_get_option('osman_top_login_hover');
  $color_breadcrumbs_txt_a = osman_get_option('color_breadcrumbs_txt_a');
  $color_breadcrumbs_txt_a_hover = osman_get_option('color_breadcrumbs_txt_a_hover');
  $osman_color_top_bg = osman_get_option('osman_color_top_bg');

  // Body
  $color_body_boxed_bg = osman_get_option('color_body_boxed_bg');
  $body_bg_img = osman_get_option_media('body_bg_img');
  $body_bg_style = osman_get_option('body_bg_style');
  $pageloader_bar_color_after = osman_get_option('osman-pageloader-bar-color-after');
  $pageloader_bar_color_before = osman_get_option('osman-pageloader-bar-color-before');
  $pageloader_spinner_size = osman_get_option('osman-pageloader-spinner-size');

  //Content
  $osman_color_single_blog_content_bg = osman_get_option('osman_color_single_blog_content_bg');
  $osman_page_color_content_bg = osman_get_option('osman_page_color_content_bg');
  $color_entry_title_a = osman_get_option('color_entry_title_a');
  $color_entry_title_a_h = osman_get_option('color_entry_title_a_h');
  $color_content_txt = osman_get_option('color_content_txt');
  $color_content_meta = osman_get_option('color_content_meta');
  $author_bg_color = osman_get_option('author_bg_color');
  $author_txt_color = osman_get_option('author_txt_color');

  //Sidebar
  $color_sidebar_bg = osman_get_option('color_sidebar_bg');
  $color_sidebar_txt_hov = osman_get_option('color_sidebar_txt_hov');
  $sidebar_content_padding = osman_get_option('sidebar-padding');
  $sidebar_content_margin = osman_get_option('sidebar_bottom_margin');
  
  //Blog
  $osman_entry_date_bg = osman_get_option('osman_entry_date_bg');
  $osman_entry_excerpt_bg = osman_get_option('osman_entry_excerpt_bg');
  
 
  //Footer
  $color_footer_bg = osman_get_option('osman_color_footer_bg');
  $osman_color_footer_social_bg = osman_get_option('osman_color_footer_social_bg');
  $color_footer_txt_a = osman_get_option('color_footer_txt_a');
  $color_footer_txt_h = osman_get_option('color_footer_txt_h');
  $color_footer_txt = osman_get_option('color_footer_txt');
  $color_footer_txt_hov = osman_get_option('color_footer_txt_hov');
  $osman_footer_navbar_hover_color = osman_get_option('osman_footer_navbar_hover_color');
  $osman_footer_navbar_color = osman_get_option('osman_footer_navbar_color');
  $osman_footer_navbar_line = osman_get_option('osman_footer_navbar_line');
?>

<?php // Header Area //////////////////////////////////////////// ?>

#top-bar {background: <?php echo esc_attr($color_header_bg); ?>;}
#top-bar {background: <?php echo esc_attr($osman_color_top_bg); ?>;}

#top-bar a {color: <?php echo esc_attr($a_color_header_txt); ?>;}

#top-bar a:hover {color: <?php echo esc_attr($a_color_header_hov); ?>;}

#site-menu .navbar-nav > .open > a, 
#site-menu .navbar-nav > .open > a:focus, 
#site-menu .navbar-nav > .open > a:hover, 

#site-menu .navbar-nav > .active > a, 
#site-menu .navbar-nav > .active > a:focus, 
#site-menu .navbar-nav > .active > a:hover, 

#site-menu .navbar-nav > li > a:focus, 
#site-menu .navbar-nav > li > a:hover, 

.nav .open > a, 
.nav .open > a:focus, 
.nav .open > a:hover, 

.dropdown-menu > li > a:focus, 
.dropdown-menu > li > a:hover, 

.dropdown-menu > .active > a, 
.dropdown-menu > .active > a:focus, 
.dropdown-menu > .active > a:hover {background-color: <?php echo esc_attr($color_nav_bg); ?>;}
#collapsingNavbar{background-color: <?php echo esc_attr($color_navbar_bg); ?>;}
header.sticky-header #collapsingNavbar{background-color: <?php echo esc_attr($osman_color_navbar_floating_bg); ?>;}
#collapsingNavbar .dropdown-menu{background-color: <?php echo esc_attr($osman_color_dropdown_bg); ?>;}
.dropdown-item:focus, .dropdown-item:hover{background-color: <?php echo esc_attr($osman_color_nav_hover); ?>;}
.top-bar-login{background-color: <?php echo esc_attr($osman_top_login); ?>}
.top-bar-login:hover{background-color: <?php echo esc_attr($osman_top_login_hover); ?>}
#breadcrumbs a {color: <?php echo esc_attr($color_breadcrumbs_txt_a); ?>}
#breadcrumbs a:hover {color: <?php echo esc_attr($color_breadcrumbs_txt_a_hover); ?>}
#masthead, #site-nav{background-color: <?php echo esc_attr($osman_color_masthead_bg); ?>;}

<?php // Pushmenu ////////////////////////////////////////////// ?>
#header{background-color: <?php echo esc_attr($osman_pushmenu_bg_color); ?>;}
#push-menu .dropdown-item{background-color: <?php echo esc_attr($osman_pushmenu_menu_bg); ?>;}
#push-menu .dropdown-item:focus, #push-menu .dropdown-item:hover{background-color: <?php echo esc_attr($osman_pushmenu_menu_bg_hovercolor); ?>;}
#push-menu .dropdown-menu a{background-color: <?php echo esc_attr($osman_pushmenu_dropdown_bgcolor); ?>;}
#header.side-header #push-menu ul li{border-top: 1px solid <?php echo esc_attr($osman_pushmenu_top_color); ?> !important;}
#header.side-header-right-push{border-left: 1px solid <?php echo esc_attr($osman_pushmenu_top_color); ?> !important;}
#push-menu-trigger.osman-pushmenu{border-color: <?php echo esc_attr($osman_pushmenu_trigger_color); ?> !important;}
#push-menu-trigger.osman-pushmenu span{background-color: <?php echo esc_attr($osman_pushmenu_trigger_color); ?> !important;}
#push-menu-trigger.osman-pushmenu:hover{border-color: <?php echo esc_attr($osman_pushmenu_trigger_color_hover); ?> !important;}
#push-menu-trigger.osman-pushmenu:hover span{background-color: <?php echo esc_attr($osman_pushmenu_trigger_color_hover); ?> !important;}
#push-menu .current-menu-item.active>a{background-color: <?php echo esc_attr($osman_pushmenu_current_color); ?> !important;}

<?php // Body Area ////////////////////////////////////////////// ?>
body {
  <?php if(!empty($body_bg_img)): ?>
  background-image: url('<?php echo esc_url($body_bg_img); ?>');
  background-repeat: <?php echo esc_attr($body_bg_style['background-repeat']); ?>;
  background-size: <?php echo esc_attr($body_bg_style['background-size']); ?>;
  background-attachment: <?php echo esc_attr($body_bg_style['background-attachment']); ?>;
  background-position: <?php echo esc_attr($body_bg_style['background-position']); ?>;
  <?php else: ?>
  background-color: <?php echo esc_attr($body_bg_style['background-color']); ?>;
  <?php endif; ?>}
.page-loader .loader-inner:after{background:<?php echo $pageloader_bar_color_after; ?>}
.page-loader .loader-inner::before{background:<?php echo $pageloader_bar_color_before; ?>}
.page-loader .loader-inner{
    background: rgba(0, 0, 0, 0) linear-gradient(to right, <?php echo $pageloader_bar_color_before; ?> 10%, rgba(255, 255, 255, 0) 42%) repeat scroll 0 0;
	height:<?php echo $pageloader_spinner_size['width']; ?>;
	width:<?php echo $pageloader_spinner_size['width']; ?>;}


<?php // Content Area ////////////////////////////////////////////// ?>

.hentry {background-color: <?php echo esc_attr($osman_page_color_content_bg); ?>;}
.single .hentry {background-color: <?php echo esc_attr($osman_color_single_blog_content_bg); ?>;}

.entry-title a {color: <?php echo esc_attr($color_entry_title_a); ?>;}

.entry-title a:hover {color: <?php echo esc_attr($color_entry_title_a_h); ?>;}

.entry-footer, .entry-meta {color: <?php echo esc_attr($color_content_meta); ?>;}

.author-bio {background: <?php echo esc_attr($author_bg_color); ?>;color: <?php echo esc_attr($author_txt_color); ?>;}  

<?php // Blog Area ////////////////////////////////////////////// ?>
article.post .entry-date, article.partners .entry-date, .search-results article.type-page .entry-date {
  background: <?php echo esc_attr($osman_entry_date_bg); ?>;} 
.entry-excerpt .entry-content .btn-default {background: <?php echo esc_attr($osman_entry_excerpt_bg); ?>;}  

<?php // Sidebar Area ////////////////////////////////////////////// ?>
#sidebar .widget {
  background-color: <?php echo esc_attr($color_sidebar_bg); ?>;
  padding-top:<?php  echo esc_attr($sidebar_content_padding['padding-top']); ?>;
  padding-right:<?php  echo esc_attr($sidebar_content_padding['padding-right']); ?>;
  padding-bottom:<?php  echo esc_attr($sidebar_content_padding['padding-bottom']); ?>;
  padding-left:<?php  echo esc_attr($sidebar_content_padding['padding-left']); ?>;
  margin-top:<?php  echo esc_attr($sidebar_content_margin['margin-top']); ?>;
  margin-right:<?php  echo esc_attr($sidebar_content_margin['margin-right']); ?>;
  margin-bottom:<?php  echo esc_attr($sidebar_content_margin['margin-bottom']); ?>;
  margin-left:<?php  echo esc_attr($sidebar_content_margin['margin-left']); ?>;
}

<?php // Footer Area ////////////////////////////////////////////// ?>

footer.page-footer {background-color: <?php echo esc_attr($color_footer_bg); ?>;}
#footer-socials {background-color: <?php echo esc_attr($osman_color_footer_social_bg); ?>;}
.footer-wrapper a {color: <?php echo esc_attr($color_footer_txt_a); ?>;}
.footer-wrapper a:hover, 
.footer-wrapper a:active, 
.footer-wrapper a:focus {color: <?php echo esc_attr($color_footer_txt_hov); ?>;}
.footer-nav .dropdown-item:focus, .footer-nav .dropdown-item:hover {background-color: <?php echo esc_attr($osman_footer_navbar_hover_color); ?>;}
.footer-nav .dropdown-item, .footer-nav .dropdown-item  {background-color: <?php echo esc_attr($osman_footer_navbar_color); ?>;}
.footer-nav li {border-left:1px solid <?php echo esc_attr($osman_footer_navbar_line); ?>;}
.footer-widget-title {color: <?php echo esc_attr($color_footer_txt_h); ?>;}

<?php // Typography Area ////////////////////////////////////////////// ?>

h1, .h1 {
  font-size: <?php echo esc_attr($h1_font['font-size']); ?>;
  font-family: <?php echo esc_attr($h1_font['font-family']); ?>;
  font-weight: <?php echo esc_attr($h1_font['font-weight']); ?>;
}

h2, .h2 {
  font-size: <?php echo esc_attr($h2_font['font-size']); ?>;
  font-family: <?php echo esc_attr($h2_font['font-family']); ?>;
  font-weight: <?php echo esc_attr($h2_font['font-weight']); ?>;
}

h3, .h3 {
  font-size: <?php echo esc_attr($h3_font['font-size']); ?>;
  font-family: <?php echo esc_attr($h3_font['font-family']); ?>;
  font-weight: <?php echo esc_attr($h3_font['font-weight']); ?>;
}

h4, .h4 {
  font-size: <?php echo esc_attr($h4_font['font-size']); ?>;
  font-family: <?php echo esc_attr($h4_font['font-family']); ?>;
  font-weight: <?php echo esc_attr($h4_font['font-weight']); ?>;
}

h5, .h5 {
  font-size: <?php echo esc_attr($h5_font['font-size']); ?>;
  font-family: <?php echo esc_attr($h5_font['font-family']); ?>;
  font-weight: <?php echo esc_attr($h5_font['font-weight']); ?>;
}

h6, .h6 {
  font-size: <?php echo esc_attr($h6_font['font-size']); ?>;
  font-family: <?php echo esc_attr($h6_font['font-family']); ?>;
  font-weight: <?php echo esc_attr($h6_font['font-weight']); ?>;
}