/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens and enables tab
 * support for dropdown menus.
 *
 * Modified from underscores theme
 */
( function() {
	var container, menu, links, subMenus;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

    // Apply toggle only to elements with # href
		if( '#' === self.getAttribute('href') ) {

      // Move up through the ancestors of the current link until we hit .nav-menu.
      while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

        // On li elements toggle the class .focus.
        if ( 'li' === self.tagName.toLowerCase() ) {
          if ( -1 !== self.className.indexOf( 'focus' ) ) {
            self.className = self.className.replace( ' focus', '' );
          } else {
            self.className += ' focus';
          }
        }

        self = self.parentElement;
      }
		}
	}
	menu = container.getElementsByTagName( 'ul' )[0];

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	// Get all the link elements within the menu.
	links    = menu.getElementsByTagName( 'a' );
	subMenus = menu.getElementsByTagName( 'ul' );

	// Iterate through submenus
	for ( var i = 0, len = subMenus.length; i < len; i++ ) {
		var li = subMenus[i].parentNode,
			liChildren = li.childNodes;
			
		// Set menu items with submenus to aria-haspopup="true".
		li.setAttribute( 'aria-haspopup', 'true' );
		
		// set links before menus to not be active.
		liChildren[0].setAttribute( 'href', '#' );
	}

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
	
		links[i].setAttribute('tabindex', '0'); // fix for Safari / Opera
		
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}

} )();
