<?php
    /**
     * The template for the header sticky bar.
     * Override this template by specifying the path where it is stored (templates_path) in your Redux config.
     *
     * @author        Redux Framework
     * @package       ReduxFramework/Templates
     * @version:      3.5.7.8
     */
?>
<div id="redux-sticky">
    <div id="info_bar">

        <a href="javascript:void(0);" class="expand_options<?php echo esc_attr(( $this->parent->args['open_expanded'] ) ? ' expanded' : ''); ?>"<?php echo $this->parent->args['hide_expand'] ? ' style="display: none;"' : '' ?>>
            <?php __( 'Expand', 'osman' ); ?>
        </a>
		<div class="osman-support-links">
			<a href="http://support.okoutsourcing.com/" target="_blank"><span class="dashicons dashicons-thumbs-up"></span><?php __( 'Support Center', 'osman' ); ?></a>
		</div>
        <div class="redux-action_bar">
            <span class="spinner"></span>
            <?php if ( false === $this->parent->args['hide_save'] ) { ?>
                <?php submit_button( __( 'Save Changes', 'osman' ), 'primary', 'redux_save', false ); ?>
            <?php } ?>
            
            <?php if ( false === $this->parent->args['hide_reset'] ) { ?>
                <?php submit_button( __( 'Reset Section', 'osman' ), 'secondary', $this->parent->args['opt_name'] . '[defaults-section]', false, array( 'id' => 'redux-defaults-section' ) ); ?>
                <?php submit_button( __( 'Reset All', 'osman' ), 'secondary', $this->parent->args['opt_name'] . '[defaults]', false, array( 'id' => 'redux-defaults' ) ); ?>
            <?php } ?>
        </div>
        <div class="redux-ajax-loading" alt="<?php __( 'Working...', 'osman' ) ?>">&nbsp;</div>
        <div class="clear"></div>
    </div>

    <!-- Notification bar -->
    <div id="redux_notification_bar">
        <?php $this->notification_bar(); ?>
    </div>


</div>