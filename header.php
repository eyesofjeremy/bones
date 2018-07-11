<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title( '~', true, 'right' ); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
            <meta name="theme-color" content="#121212">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

		<div id="container" class="site"><!-- add .columnar for page w/ defined boundaries -->

			<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">

				<div id="inner-header" class="wrap cf">

					<p id="logo" itemscope itemtype="http://schema.org/Organization"><?php bones_custom_logo(); ?></p>

					<?php // if you'd like to use the site description you can un-comment it below ?>
					<?php // bloginfo('description'); ?>

          <?php // if you'd like the navigation always visible, just comment out the following toggle code ?>
          <input type="checkbox" id="menu_toggle" name="menu_toggle" class="cb toggle"></input><label class="menu_toggle" for="menu_toggle"><span>Menu</span><i class="menu_icon"></i></label>

					<nav id="site-navigation" role="navigation" class="nav-bleed" itemscope itemtype="http://schema.org/SiteNavigationElement">
            <?php wp_nav_menu(array(
               'container' => false,                           // remove nav container
               'container_class' => 'menu cf',                 // class of container (should you choose to use it)
               'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
               'menu_class' => 'nav top-nav cf',               // adding custom nav class. Add 'toggles' if using walker below
               'theme_location' => 'main-nav',                 // where it's located in the theme
               'before' => '',                                 // before the menu
               'after' => '',                                  // after the menu
               'link_before' => '',                            // before each link
               'link_after' => '',                             // after each link
               'depth' => 0,                                   // limit the depth of the nav
               // 'walker' => new toggle_Walker_Menu,             // Show checkboxes to toggle submenus
               'fallback_cb' => ''                             // fallback function (if there is one)
						)); ?>

					</nav>

				<div id="sidebar-header" class="sidebar cf" role="complementary">

					<?php if ( is_active_sidebar( 'sidebar-header' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar-header' ); ?>

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

				</div>

			</header>
