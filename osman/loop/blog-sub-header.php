<?php
/**
 * @package osman
 * @since osman 1.0
 */
?>

<?php 
if (osman_get_option('hide_sub_header')) {
$content_title_bar='col-md-6 titlecrum-position';
if(osman_get_option('breadcrum_position')=='2'): $content_title_bar='col-md-12 titlecrum-position'; elseif(osman_get_option('breadcrum_position')=='3'):$content_title_bar='col-md-6 pull-xs-right titlecrum-position'; endif;
?>
<div id="sub-header" itemtype="http://schema.org/WPHeader" itemscope="itemscope" role="banner">
    <div class="container clearfix">
        <div class="row">            
            <div class="<?php echo $content_title_bar; ?>">
			<?php 
			if ( osman_get_option('osman-blog-title') != '' && is_home()) {
								echo esc_attr( osman_get_option('osman-blog-title'));
							} else { if(osman_get_option('hide_page_title')==true)osman_page_title();}
							 ?>
            </div>

            <?php if (osman_get_option('hide_breadcrumb')) { ?>
             <div class="<?php echo $content_title_bar; ?>">
			 <?php if(function_exists('bcn_display'))
					{
						bcn_display();
					}else{ ?>
					<?php osman_breadcrumb(); } ?>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php  } ?>
