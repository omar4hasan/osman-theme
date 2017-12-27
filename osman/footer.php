<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content main and all content after
 *
 * @package osman
 * @since osman 1.0
 */
?>
<?php if( !is_page_template( 'page-fullwidth.php' ) ) { ?>
            </div> <!-- row -->
        </div> <!-- container -->
    </div><!--/.main-content-area-->
<?php } ?>
</main><!--/#content-->
<?php if(osman_get_option('osman_footer_display') || osman_get_option('osman_enable_footer_social') || osman_get_option('osman_enable_copyright') || osman_get_option('osman_enable_footer_menu')): ?>
    <!--Footer Start-->
    <footer class="page-footer center-on-small-only">
	<?php if(osman_get_option('osman_footer_display')) : ?>
        <!--Footer Widget-->
        <div class="container-fluid">
            <div class="row">             
                <div class="footer-content">
                    <?php dynamic_sidebar('footer-widget-1'); ?>
                </div>
            </div>
        </div>
        <!--/.Footer Widget-->
        <hr>
	<?php endif; ?>
	
	<?php if(osman_get_option('osman_enable_footer_social')) : ?>
		<!--Call to action-->
		<div class="call-to-action">	  
				<?php osman_footer_socials(); ?>	   
		</div>
		<!--/.Call to action-->
	 <?php endif; ?>
	 
	<!--Copyright-->
	<div class="footer-copyright">
		<div class="container-fluid">
			<div class="row-fluid">      
					<?php if((osman_get_option('osman_enable_copyright')) && osman_get_option('osman_enable_footer_menu')): $footer_copy = 'col-md-6'; else: $footer_copy = 'col-md-12 text-xs-center'; endif;?>				
					<?php if(osman_get_option('osman_enable_copyright')): ?>				
					<div class="copyright-text <?php echo $footer_copy; ?>">
						<span itemprop="copyrightYear">
						<span itemprop="copyrightHolder"><?php if(osman_get_option('osman_change_copyright_text')): echo osman_get_option('osman_change_copyright_text'); endif; ?></span>
						 </span>
					</div> 
					<?php endif; ?>
					<?php if ( has_nav_menu('osman-footer-menu') && osman_get_option('osman_enable_footer_menu')) : ?>
					<div class="<?php echo $footer_copy; ?>">
						<nav class="footer-nav" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation">
							<?php osman_footer_nav(); ?>
						</nav>
					</div>
					<?php endif; ?>
			</div>

		</div>
	</div>
	<!--/.Copyright-->

    </footer>
	<?php endif; ?>
    <!--/.Footer End-->

</div><!-- .page-wrapper -->

<!-- Start Modal -->
<div class="modal-dialog modal-lg osman-modal" style="margin:0">
  <div class="modal fade" id="myModal" role="dialog">
  <div class="vertical-alignment-helper">
    <div class="modal-dialog modal-sm">
    
      <!-- Modal content-->
      <div class="modal-content" style="margin:30px auto 0">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php _e('Login','osman'); ?></h4>
        </div>
        <div class="modal-body">
          
		 <div id="login-register-password">

	<?php global $user_ID, $user_identity; wp_get_current_user(); if (!$user_ID) { ?>
      <div class="tabbable"> <!-- Only required for left/right tabs -->
			<ul class="nav nav-tabs">
				<li class="active"><a href="#tab1" data-toggle="tab"><?php _e('Login','osman'); ?></a></li>
				<li><a href="#tab2" data-toggle="tab"><?php _e('Register','osman'); ?></a></li>
				<li><a href="#tab3" data-toggle="tab"><?php _e('Reset','osman'); ?></a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab1">
					<?php $register = isset($_GET['register']); $reset = isset($_GET['reset']); if ($register == true) { ?>

			<h3><?php _e('Success!','osman'); ?></h3>
			<p><?php _e('Check your email for the password and then return to log in.','osman'); ?></p>

			<?php } elseif ($reset == true) { ?>

			<h3>Success!</h3>
			<p><?php _e('Check your email to reset your password.','osman'); ?></p>

			<?php } else { ?>

			<h3>Have an account?</h3>
			<p><?php esc_html_e('Log in or sign up! It&rsquo;s fast &amp; free!','osman'); ?></p>

			<?php } ?>

			<form method="post" action="<?php echo esc_url( home_url() ); ?>/wp-login.php" class="wp-user-form">
				<div class="username">
					<label for="user_login"><?php _e('Username','osman'); ?>: </label>
					<input type="text" name="log" value="<?php echo esc_attr(stripslashes(isset($user_login))); ?>" size="20" id="user_login" tabindex="11" />
				</div>
				<div class="password">
					<label for="user_pass"><?php _e('Password','osman'); ?>: </label>
					<input type="password" name="pwd" value="" size="20" id="user_pass" tabindex="12" />
				</div>
				<div class="login_fields">
					<div class="rememberme">
						<label for="rememberme">
							<input type="checkbox" name="rememberme" value="forever" checked="checked" id="rememberme" tabindex="13" /><?php _e('Remember me','osman'); ?> 
						</label>
					</div>
					<?php do_action('login_form'); ?>
					<input type="submit" name="user-submit" value="<?php _e('Login','osman'); ?>" tabindex="14" class="user-submit" />
					<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
					<input type="hidden" name="user-cookie" value="1" />
				</div>
			</form>
				</div>
				<div class="tab-pane" id="tab2">
					<h3><?php _e('Register for site Account!','osman'); ?></h3>
			<p>Sign up now</p>
			<form method="post" action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" class="wp-user-form">
				<div class="username">
					<label for="user_login"><?php _e('Username','osman'); ?>: </label>
					<input type="text" name="user_login" value="<?php echo esc_attr(stripslashes(isset($user_login))); ?>" size="20" id="user_login" tabindex="101" />
				</div>
				<div class="password">
					<label for="user_email"><?php _e('Email','osman'); ?>: </label>
					<input type="text" name="user_email" value="<?php echo esc_attr(stripslashes(isset($user_email))); ?>" size="25" id="user_email" tabindex="102" />
				</div>
				<div class="login_fields">
					<?php do_action('register_form'); ?>
					<input type="submit" name="user-submit" value="<?php _e('Sign up!','osman'); ?>" class="user-submit" tabindex="103" />
					<?php $register = isset($_GET['register']); if($register == true) { echo esc_html_e('<p>Check your email for the password!</p>','osman'); } ?>
					<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>?register=true" />
					<input type="hidden" name="user-cookie" value="1" />
				</div>
			</form>
				</div>
				<div class="tab-pane" id="tab3">
			<h3>Lost something?</h3>
			<p>Enter username or email to reset your password.</p>
			<form method="post" action="<?php echo site_url('wp-login.php?action=lostpassword', 'login_post') ?>" class="wp-user-form">
				<div class="username">
					<label for="user_login" class="hide"><?php _e('Username or Email','osman'); ?>: </label>
					<input type="text" name="user_login" value="" size="20" id="user_login" tabindex="1001" />
				</div>
				<div class="login_fields">
					<?php do_action('login_form', 'resetpass'); ?>
					<input type="submit" name="user-submit" value="<?php _e('Reset my password','osman'); ?>" class="user-submit" tabindex="1002" />
					<?php $reset = isset($_GET['reset']); if($reset == true) { echo esc_html_e('<p>A message will be sent to your email address.</p>','osman'); } ?>
					<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>?reset=true" />
					<input type="hidden" name="user-cookie" value="1" />
				</div>
			</form>
				</div>
			</div>
        </div>

	<?php } else { // is logged in ?>

	<div class="sidebox">
		<h3>Welcome, <?php echo $user_identity; ?></h3>
		<div class="usericon">
			<?php global $userdata; wp_get_current_user(); echo get_avatar($userdata->ID, 60); ?>

		</div>
		<div class="userinfo">
			<p>You&rsquo;re logged in as <strong><?php echo $user_identity; ?></strong></p>
			<p>
				<a href="<?php echo wp_logout_url('index.php'); ?>"><?php _e('Log out','osman'); ?></a> | 
				<?php if (current_user_can('manage_options')) { 
					echo '<a href="' . admin_url() . '">' . _e('Admin','osman') . '</a>'; } else { 
					echo '<a href="' . admin_url() . 'profile.php">' . _e('Profile','osman') . '</a>'; } ?>

			</p>
		</div>
	</div>

	<?php } ?>

		</div>
		 
          <button type="button" class="btn btn-default" data-dismiss="modal"><?php _e('Close','osman'); ?></button>
       
        </div>
        
      </div>
      
    </div>
  </div>
  </div>
 </div> 
  <!-- End Modal -->
<?php if(osman_get_option('scroll_to_top')): ?>
    <a href="#" class="to-top"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
<?php endif; ?>
<?php wp_footer(); ?>
           
<div class="hiddendiv common"></div>
</body>
</html>