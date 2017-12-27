<?php 

/*-----------------------------------------------------------------------------------*/
/*	Create Meta Box
/*-----------------------------------------------------------------------------------*/

function osman_create_meta_box( $post, $meta_box )
{
	
    if( !is_array($meta_box) ) return false;
    
    if( isset($meta_box['description']) && $meta_box['description'] != '' ){
    	echo '<p>'. $meta_box['description'] .'</p>';
    }
    
	wp_nonce_field( basename(__FILE__), 'osman_box_nonce' );
	
	echo '<table class="form-table osman-metabox-table '. $meta_box['id'] .'">';
 
	foreach( $meta_box['fields'] as $field ){

		$meta = get_post_meta( $post->ID, $field['id'], true );
		
		echo '<tr><th><label for="'. $field['id'] .'"><strong>'. $field['name'] .'</strong>
			  <span>'. $field['desc'] .'</span></label></th>';
		
		switch( $field['type'] ){	
			case 'text': 
				echo '<td><input type="text" name="osman['. $field['id'] .']" id="'. $field['id'] .'" value="'. ($meta ? $meta : $field['std']) .'" size="30" /></td>';
				break;	
				
			case 'textarea':
				echo '<td><textarea name="osman['. $field['id'] .']" id="'. $field['id'] .'" rows="8" cols="5">'. ($meta ? $meta : $field['std']) .'</textarea></td>';
				break;
			
			case 'editor' :
				$settings = array(
		            'textarea_name' => 'osman['. $field['id'] .']',
		            'editor_class' => '',
		            'wpautop' => true
		        );
		        wp_editor($meta, $field['id'], $settings );
				break;
				
			case 'file':
				 
				echo '<td><input type="hidden" id="' . $field['id'] . '" name="osman[' . $field['id'] . ']" value="' . ($meta ? $meta : $field['std']) . '" />';
		        echo '<img class="redux-opts-screenshot" id="redux-opts-screenshot-' . $field['id'] . '" src="' . ($meta ? $meta : $field['std']) . '" />';
		        if( ($meta ? $meta : $field['std']) == '') {$remove = ' style="display:none;"'; $upload = ''; } else {$remove = ''; $upload = ' style="display:none;"'; }
		        echo ' <a data-update="Select File" data-choose="Choose a File" href="javascript:void(0);" class="redux-opts-upload button-secondary"' . $upload . ' rel-id="' . $field['id'] . '">' . __('Upload', 'osman') . '</a>';
		        echo ' <a href="javascript:void(0);" class="redux-opts-upload-remove"' . $remove . ' rel-id="' . $field['id'] . '">' . __('Remove Upload', 'osman') . '</a></td>';
		        
				break;

			case 'media':
				 
				echo '<td><input type="text" class="file_display_text" id="' . $field['id'] . '" name="osman[' . $field['id'] . ']" value="' . ($meta ? $meta : $field['std']) . '" />';
		        if( ($meta ? $meta : $field['std']) == '') {$remove = ' style="display:none;"'; $upload = ''; } else {$remove = ''; $upload = ' style="display:none;"'; }
		        echo ' <a data-update="Select File" data-choose="Choose a File" href="javascript:void(0);" class="redux-opts-media-upload button-secondary add-media-button"' . $upload . ' rel-id="' . $field['id'] . '">' . __('Add Media', 'osman') . '</a>';
		        echo ' <a href="javascript:void(0);" class="redux-opts-upload-media-remove"' . $remove . ' rel-id="' . $field['id'] . '">' . __('Remove Media','osman') . '</a></td>';
		        
				break;
 
			case 'images':
			    echo '<td><div class="screenshot">';
	            if (!empty($meta)) {
	                $ids = explode(',', $meta);
	                foreach ($ids as $attachment_id) {
	                    $img = wp_get_attachment_image_src($attachment_id, 'thumbnail');
	                    echo '<a class="of-uploaded-image" href="' . $img[0] . '">';
	                    echo '<img class="redux-option-image" id="image_' . $field['id'] .'_'.$attachment_id. '" src="' . $img[0] . '" alt="" />';
	                    echo '</a>';
	                }
	            }
	            echo '</div>';
	            echo '<a href="#" onclick="return false;" id="edit-gallery" class="gallery-attachments button button-primary">' . __('Add/Edit Images Gallery', 'osman') . '</a> ';
	            echo '<a href="#" onclick="return false;" id="clear-gallery" class="gallery-attachments button">' . __('Clear Images Gallery', 'osman') . '</a>';
	            echo '<input type="hidden" class="gallery_values osman[' . $field['id'] . ']" value="' . ($meta ? $meta : $field['std']) . '" name="osman[' . $field['id'] . ']" /></td>';
			    break;
				
			case 'select':
				if( array_key_exists('val', $field) ) $val = ' value="' . $field['val'] . '"';
			    if( $meta ) $val = ' value="' . $meta . '"';
				
				echo'<td><select name="osman['. $field['id'] .']" id="'. $field['id'] .'" class="'.$meta.'">';
				foreach( $field['options'] as $key => $option ){
					echo '<option value="' . $key . '"';
					if( $meta ){ 
						if( $meta == $key ) echo ' selected="selected"'; 
					} else {
						if( $field['std'] == $key ) echo ' selected="selected"'; 
					}
					echo'>'. $option .'</option>';
				}
				echo'</select></td>';
				break;
				
			case 'select_slider':
				echo'<td><select name="osman['. $field['id'] .']" id="'. $field['id'] .'" class="'.$meta.'">';
				echo '<option value="">' . __('None', 'osman') . '</option>';
				foreach( $field['options'] as $key => $option ){
					
					if ( is_numeric($key) && is_string($option) || is_numeric($key) && is_numeric($option)  ) {
                        $key = $option;
                    }elseif(is_string($key) && is_numeric($option)){}
					
					$selected = '';
					if ( $meta == $key ) $selected = ' selected="selected"';
					echo '<option class="'.$option.'" value="'.$option.'"'.$selected.'>'.$key.'</option>';
				}
				echo'</select></td>';
				break;

			case 'select_slider_layer':
				echo'<td><select name="osman['. $field['id'] .']" id="'. $field['id'] .'" class="'.$meta.'">';
				echo '<option value="">' . __('None', 'osman') . '</option>';
				foreach( $field['options'] as $key => $option ){
					if ( is_numeric($option) ) {
                        //$key = $option;
                    }
					
					$selected = '';
					if ( $meta == $option ) $selected = ' selected="selected"';
					echo '<option class="'.$option.'" value="'.$option.'"'.$selected.'>'.$key.'</option>';
				}
				echo'</select></td>';
				break;
				
			case 'radio':
				echo '<td>';
				foreach( $field['options'] as $key => $option ){
					echo '<label class="radio-label"><input type="radio" name="osman['. $field['id'] .']" value="'. $key .'" class="radio"';
					if( $meta ){ 
						if( $meta == $key ) echo ' checked="checked"'; 
					} else {
						if( $field['std'] == $key ) echo ' checked="checked"';
					}
					echo ' /> '. $option .'</label> ';
				}
				echo '</td>';
				break;
			
			case 'checkbox':
			    echo '<td>';
			    $val = '';
                if( $meta ) {
                    if( $meta == 'on' ) $val = ' checked="checked"';
                } else {
                    if( $field['std'] == 'on' ) $val = ' checked="checked"';
                }

                echo '<input type="hidden" name="osman['. $field['id'] .']" value="off" />
                <input type="checkbox" id="'. $field['id'] .'" name="osman['. $field['id'] .']" value="on"'. $val .' /> ';
			    echo '</td>';
			    break;

			case 'checkbox_fade':
			    echo '<td>';
			    $val = '';
                if( $meta ) {
                    if( $meta == 'on' ) $val = ' checked="checked"';
                } else {
                    if( $field['std'] == 'on' ) $val = ' checked="checked"';
                }

                echo '<input type="hidden" name="osman['. $field['id'] .']" value="off" />
                <input type="checkbox" class="osman_checker" id="'. $field['id'] .'" name="osman['. $field['id'] .']" value="on"'. $val .' /> ';
			    echo '</td>';
			    break;

			case 'opacity':
			    case 'text': 
				echo '<td><input type="text" class="osman_subfield" name="osman['. $field['id'] .']" id="'. $field['id'] .'" value="'. ($meta ? $meta : $field['std']) .'" size="30" /></td>';
				break;	

			case 'color':
				echo '<td>';
				echo '<input data-id="'.$field['id'].'" name="osman['. $field['id'] .']" id="' . $field['id'] . '-color" class="osman_subfield redux-color redux-color-init"  type="text" value="' . ($meta ? $meta : $field['std']) . '"  data-default-color="' . $field['std'] . '" />';
				echo '</td>';
				break;

			case 'color_text':
				echo '<td>';
				echo '<input data-id="'.$field['id'].'" name="osman['. $field['id'] .']" id="' . $field['id'] . '-color" class="redux-color redux-color-init"  type="text" value="' . ($meta ? $meta : $field['std']) . '"  data-default-color="' . $field['std'] . '" />';
				echo '</td>';
				break;

			case 'color_single_portfolio':
				echo '<td>';
				echo '<input data-id="'.$field['id'].'" name="osman['. $field['id'] .']" id="' . $field['id'] . '-color" class="redux-color redux-color-init"  type="text" value="' . ($meta ? $meta : $field['std']) . '"  data-default-color="' . $field['std'] . '" />';
				echo '</td>';
				break;

			case 'opacity_color_single_portfolio':
			    case 'text': 
				echo '<td><input type="text" class="osman_subfield" name="osman['. $field['id'] .']" id="'. $field['id'] .'" value="'. ($meta ? $meta : $field['std']) .'" size="30" /></td>';
				break;
			    
		}
		
		echo '</tr>';
	}
 
	echo '</table>';
}


/*-----------------------------------------------------------------------------------*/
/*	Save Meta Box
/*-----------------------------------------------------------------------------------*/

function osman_save_meta_box( $post_id ) {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
		return;
	
	if ( !isset($_POST['osman']) || !isset($_POST['osman_box_nonce']) || !wp_verify_nonce( $_POST['osman_box_nonce'], basename( __FILE__ ) ) )
		return;
	
	if ( 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) ) return;
	} 
	else {
		if ( !current_user_can( 'edit_post', $post_id ) ) return;
	}
 
	foreach( $_POST['osman'] as $key=>$val ){

		update_post_meta( $post_id, $key, $val );
	}

}

add_action( 'save_post', 'osman_save_meta_box' );

?>