			<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

				<div id="inner-footer" class="wrap cf">

				<div id="sidebar-footer" class="sidebar m-all t-all d-all cf" role="complementary">

					<?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar-footer' ); ?>

					<?php elseif ( current_user_can('edit_theme_options') ) : ?>

						<?php
							/*
							 * This content shows up for admins if there are no widgets defined in the backend.
							*/
						?>

						<div class="no-widgets">
							<p><?php _e( 'This is a widget ready area. Add some and they will appear here.', 'bonestheme' );  ?></p>
						</div>

					<?php endif; ?>

				</div>

          <?php // if you'd like the navigation always visible, just comment out the following toggle code
          // <input type="checkbox" id="menu_toggle" name="menu_toggle" class="cb toggle"></input><label class="menu_toggle" for="menu_toggle"><span>Menu</span><i class="menu_icon"></i></label>
          ?>

					<nav role="navigation">
						<?php wp_nav_menu(array(
              'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
              'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
              'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
              'menu_class' => 'nav footer-nav cf',               // adding custom nav class. Add 'toggles' if using walker below
              'theme_location' => 'footer-links',             // where it's located in the theme
              'before' => '',                                 // before the menu
              'after' => '',                                  // after the menu
              'link_before' => '',                            // before each link
              'link_after' => '',                             // after each link
              'depth' => 0,                                   // limit the depth of the nav
               // 'walker' => new toggle_Walker_Menu,             // Show checkboxes to toggle submenus
              'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
						)); ?>
					</nav>

					<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>

				</div>

			</footer>

		</div>

    <?php
    // Allow us to inspect queries.
    if ( current_user_can('manage_options') && isset( $_GET['showqueries'] ) ) {
      echo "<pre>";
      print_r($wpdb->queries);
      echo "</pre>";
    }
    ?>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->
