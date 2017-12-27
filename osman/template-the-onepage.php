<?php
/**
 * Template Name: One Page Layout
 *
 * @author omar hasan
 * @theme okoutsourcing
*/
  get_header('onepage');
?>

<?php  
  $osman_count = 0; 
  $osman_countPages = wp_count_posts('page')->publish;
  $osman_pages = get_pages( 'sort_order=asc&sort_column=menu_order');
  
//Count published pages
foreach($osman_pages as $osman_pag):

  setup_postdata($osman_pag);
 
  //Anchor point and title
  $osman_newanchorpoint = strtolower(preg_replace('/\s+/', '-', $osman_pag->post_name)); 
  $osman_new_title      = $osman_newanchorpoint;
  $osman_templ_name     = get_post_meta( $osman_pag->ID, '_wp_page_template', true );
  $osman_filename       = preg_replace('"\.php$"', '', $osman_templ_name); 

  //Check wether to include in one page
  $osman_include_onepage =  get_post_meta($osman_pag->ID,'osman_onepage_settings',true);
 // print_r($osman_filename); exit;
 if($osman_include_onepage == 'enabled'):
  ?>
	    <!-- top-banner (variant2 only) : starts -->
		<section>
  		<div id="<?php echo $osman_new_title; ?>"  class="osman-page-section">
  			
  				<?php the_content();?>
  			
  		</div>
  		</section>
     <?php
	endif;	 
endforeach;
?>



<?php
  get_footer();
?>