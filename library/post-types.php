<?php

add_action( 'init', 'cptui_register_my_cpts' );
function cptui_register_my_cpts() {
	$labels = array(
		"name" => __( 'Classes', '' ),
		"singular_name" => __( 'Class', '' ),
		);

	$args = array(
		"label" => __( 'Classes', '' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "pilates_class", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-groups",
		"supports" => array( "title", "editor", "thumbnail" ),					);
	register_post_type( "pilates_class", $args );

	$labels = array(
		"name" => __( 'Widgets', '' ),
		"singular_name" => __( 'Widget', '' ),
		"menu_name" => __( 'CSP HC Widgets', '' ),
		"all_items" => __( 'All Widgets', '' ),
		);

	$args = array(
		"label" => __( 'Widgets', '' ),
		"labels" => $labels,
		"description" => "",
		"public" => false,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
				"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "csp_hc_widget", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-text",
		"supports" => array( "title" ),					);
	register_post_type( "csp_hc_widget", $args );

	$labels = array(
		"name" => __( 'Promotions', '' ),
		"singular_name" => __( 'Promotion', '' ),
		);

	$args = array(
		"label" => __( 'Promotions', '' ),
		"labels" => $labels,
		"description" => "Special Promotions for the home page",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "promotion", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-awards",
		"supports" => array( "title" ),					);
	register_post_type( "promotion", $args );

// End of cptui_register_my_cpts()
}
