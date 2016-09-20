			<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

				<div id="inner-footer" class="wrap cf">

          <a href="<?php echo home_url(); ?>" class="logo" rel="nofollow">
          <img 
            src="<?php bloginfo('template_directory'); ?>/library/images/centerstream-white.png" 
            srcset="<?php bloginfo('template_directory'); ?>/library/images/centerstream-white.png 1x, 
                    <?php bloginfo('template_directory'); ?>/library/images/centerstream-white@2x.png 2x" 
            alt="Center Stream Pilates & Bodywork" border="0">
          </a>

          <div class="contact-info widget vcard">

            <h4>Our Information</h4>

            <p><?php echo do_shortcode('[phone]'); ?></p>
            <p><?php echo do_shortcode('[email]'); ?></p>
            <p><?php echo do_shortcode('[address]'); ?></p>

          </div>

<?php /*
					<nav role="navigation">
						<?php wp_nav_menu(array(
    					'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
    					'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
    					'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
    					'menu_class' => 'nav footer-nav cf',            // adding custom nav class
    					'theme_location' => 'footer-links',             // where it's located in the theme
    					'before' => '',                                 // before the menu
    					'after' => '',                                  // after the menu
    					'link_before' => '',                            // before each link
    					'link_after' => '',                             // after each link
    					'depth' => 0,                                   // limit the depth of the nav
    					'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
						)); ?>
					</nav>
*/ ?>

					<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>

				</div>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->
