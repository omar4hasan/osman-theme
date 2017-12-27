<?php
/**
 * The top header area including text, phone, link and socials
 *
 * @package osman
 * @since osman 1.0
 */
?>

<div id="top-bar" class="header-top-bar"> 
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="col-md-6">
                <?php if (osman_get_option('header_contacts')) { ?>
                <ul class="header-contact unstyled">
                    <?php $phone_text = osman_get_option('phone_text');
                    if (!empty ($phone_text) && osman_get_option('phone_text')) { ?>
                    <li class="header-phone" itemprop="telephone">
                        <a href="tel:<?php echo osman_get_option('phone_text'); ?>"><?php echo osman_get_option('phone_text'); ?></a>
                    </li> 
                    <?php } ?>
                    <?php $email_text = osman_get_option('email_text');
                    if (!empty ($email_text) && osman_get_option('email_text')) { ?>
                    <li class="header-email" itemprop="email">
                        <a href="mailto:<?php echo osman_get_option('email_text'); ?>"><?php echo osman_get_option('email_text'); ?></a> 
                    </li>
                    <?php } ?>
                    <?php $url_text = osman_get_option('custom_url_text');
                    if (!empty ($url_text) && osman_get_option('custom_url_text')) { ?>         
                    <li class="header-link">
                        <a itemprop="url" href="<?php echo esc_url( osman_get_option('custom_url') ); ?>"><span itemprop="name"><?php echo osman_get_option('custom_url_text'); ?></span></a>
                    </li>
                    <?php } ?>
                </ul><!-- header-contact -->
                <?php } ?>
            </div>
            
            <div class="col-md-6">
                <?php //osman_header_socials(); ?>
				<?php if (osman_get_option('header_login')) { ?>
				<!-- Trigger the modal with a button -->

							<?php if (is_user_logged_in()) : ?>
				<a type="button" class="btn btn-info btn-sm top-bar-login pull-right" href="<?php echo wp_logout_url(get_permalink()); ?>">Logout</a>
			<?php else : ?>
				<a type="button" class="btn btn-info btn-sm top-bar-login pull-right" data-toggle="modal" data-target="#myModal">Login</a>
			<?php endif;?>
               <?php } ?>
			 
            </div>
            
        </div> <!-- row-fouid -->
    </div> <!-- .container -->
</div> <!-- top-bar -->
