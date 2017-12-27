<?php
/**
 * The template for displaying search forms in osman
 *
 * @package osman
 * @since osman 1.0
 */
?>
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<div class="input-group">
		<label for="s" class="screen-reader-text"><?php echo( __('Search', 'osman') ); ?></label>
		<input type="text" value="" name="s" id="s" class="form-control" placeholder="<?php _e('Search', 'osman'); ?>" />
		<span class="input-group-btn">
			<button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
		</span>
	</div>
</form>