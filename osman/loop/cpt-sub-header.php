<?php
/**
 * @package osman
 * @since osman 1.0
 */
?>

<?php 

if (osman_get_option('hide_cpt_sub_header')) {
	
$page_title     = osman_get_option('hide_cpt_page_title');
//print_r($page_title);
$content_title_bar='col-md-6';
if(osman_get_option('breadcrum_cpt_position')=='2'): $content_title_bar='col-md-12 titlecrum-position'; endif;
 ?>
<div id="sub-header" itemtype="http://schema.org/WPHeader" itemscope="itemscope" role="banner">
    <div class="container clearfix">
        <div class="row">            
            <div class="<?php echo $content_title_bar; ?>">
			<?php if ( $page_title != 0 ) {osman_page_title();} ?>
            </div>

            <?php if (osman_get_option('hide_cpt_breadcrumb')) { ?>
			
            <div class="<?php echo $content_title_bar; ?>">
			 <?php if(function_exists('bcn_display')){ bcn_display();  }else{ ?>
					<?php osman_breadcrumb(); } ?>
            </div>
		
            <?php } ?>
        </div>
    </div>
</div>
<?php 
 }
?>
