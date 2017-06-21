<?php
/**
 * extend Walker to add pure css dropdown magic...
 * PROPS: http://www.cssscript.com/pure-css-mobile-compatible-responsive-dropdown-menu/
 * Actually, this was rewritten for menus rather than wp_page_list. So you may also want
 * to check out http://stackoverflow.com/questions/20474079/wp-nav-menu-custom-walker
 * @author Jeremy Carlson
 *
 * To use, add 'walker' => new toggle_Walker_Menu to your array of arguments for wp_nav_menu()
 * Also may need to add .toggles to your nav menu class
 */

class toggle_Walker_Menu extends Walker {

	public static $count = 0;

	private $curItem;

  var $tree_type = array( 'post_type', 'taxonomy', 'custom' );
  var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

  public function update_count() {
    return self::$count++;
  }

  function start_lvl(&$output, $depth = 0, $args = Array()) {
    $page = $this->curItem;
    // Show current ancestor menu if needed
    // Checking specially created object
    $checked = ( in_array( 'current_page_ancestor', $page->classes ) ) ? 'checked' : '';

    $title = $page->post_title;
    $menu_count = self::update_count();

    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent";
    $output .= "<input type='checkbox' name='menu' $checked class='cb' id='menu_$menu_count'><label for='menu_$menu_count' class='toggle' aria-label=''><span></span></label>\n$indent<ul class='children'>\n";
  }

  function end_lvl(&$output, $depth = 0, $args=Array()) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul>\n";
  }

  function start_el(&$output, $object, $depth = 0, $args = Array(), $current_object_id = 0) {
    $classes = empty( $object->classes ) ? array() : (array) $object->classes;
    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object, $args ) );
    $class_names = strlen( trim( $class_names ) ) > 0 ? ' class="' . esc_attr( $class_names ) . '"' : '';
    $id = apply_filters( 'nav_menu_item_id', '', $object, $args );
    $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
    $attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
    $attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
    $attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';
    $attributes .= ! empty( $object->url )        ? ' href="'   . esc_attr( $object->url        ) .'"' : '';
    $item_output = $args->before;
    $item_output .= '<li' . $id . $class_names . '>';
    $item_output .= '<a'. $attributes . '>';
    $item_output .= $args->link_before . apply_filters( 'the_title', $object->title, $object->ID ) . $args->link_after;
    $item_output .= "</a>";
    $item_output .= $args->after;
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $object, $depth, $args );

    $this->curItem = $object; // Copy data about this page so we can use for start_lvl
  }

	public function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= "</li>\n";
	}
}

class toggle_Walker_Page extends Walker_Page {

	public static $count = 0;

	private $curItem;

	public function update_count() {
		return self::$count++;
	}

	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$page = $this->curItem;

		// Show current ancestor menu if needed
		// Checking specially created object
		$checked = ( $page->is_current_ancestor ) ? 'checked' : '';
		
		$title = $page->post_title;
		$menu_count = self::update_count();

		$indent = str_repeat("\t", $depth);
		$output .= "<label for='menu_$menu_count' class='toggle' aria-label=''><span>$title</span></label><input type='checkbox' name='menu' $checked class='secretsauce' id='menu_$menu_count'>\n$indent<ul class='children'>\n";
	}

	public function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0 ) {

		if ( $depth ) {
			$indent = str_repeat( "\t", $depth );
		} else {
			$indent = '';
		}

		$css_class = array( 'page_item', 'page-item-' . $page->ID, 'page-' . $page->post_name );

		if ( isset( $args['pages_with_children'][ $page->ID ] ) ) {
			$css_class[] = 'page_item_has_children';
		}

		if ( ! empty( $current_page ) ) {
			$_current_page = get_post( $current_page );
			if ( $_current_page && in_array( $page->ID, $_current_page->ancestors ) ) {
				$css_class[] = 'current_page_ancestor';
				
				$page->is_current_ancestor = TRUE;
			}
			if ( $page->ID == $current_page ) {
				$css_class[] = 'current_page_item';
			} elseif ( $_current_page && $page->ID == $_current_page->post_parent ) {
				$css_class[] = 'current_page_parent';
			}
		} elseif ( $page->ID == get_option('page_for_posts') ) {
			$css_class[] = 'current_page_parent';
		}

		/**
		 * Filter the list of CSS classes to include with each page item in the list.
		 *
		 * @since 2.8.0
		 *
		 * @see wp_list_pages()
		 *
		 * @param array   $css_class    An array of CSS classes to be applied
		 *                             to each list item.
		 * @param WP_Post $page         Page data object.
		 * @param int     $depth        Depth of page, used for padding.
		 * @param array   $args         An array of arguments.
		 * @param int     $current_page ID of the current page.
		 */
		$css_classes = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );

		if ( '' === $page->post_title ) {
			$page->post_title = sprintf( __( '#%d (no title)' ), $page->ID );
		}

		$args['link_before'] = empty( $args['link_before'] ) ? '' : $args['link_before'];
		$args['link_after'] = empty( $args['link_after'] ) ? '' : $args['link_after'];

		/** This filter is documented in wp-includes/post-template.php */
		$output .= $indent . sprintf(
			'<li class="%s"><a href="%s">%s%s%s</a>',
			$css_classes,
			get_permalink( $page->ID ),
			$args['link_before'],
			apply_filters( 'the_title', $page->post_title, $page->ID ),
			$args['link_after']
		);

		if ( ! empty( $args['show_date'] ) ) {
			if ( 'modified' == $args['show_date'] ) {
				$time = $page->post_modified;
			} else {
				$time = $page->post_date;
			}

			$date_format = empty( $args['date_format'] ) ? '' : $args['date_format'];
			$output .= " " . mysql2date( $date_format, $time );
		}

		$this->curItem = $page; // Copy data about this page so we can use for start_lvl
	}

}
