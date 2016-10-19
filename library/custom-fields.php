<?php

/*
 * Add a setting box for the featured image metabox
 * this is exactly where we want to think about whether the image is too light
 * for the heading to overlay it.
 *
 * https://generatewp.com/add-custom-fields-to-featured-image-meta-box/
 */
function add_featured_image_display_settings( $content, $post_id ) {

	$field_id    = 'featured_image_is_light';
	$field_value = esc_attr( get_post_meta( $post_id, $field_id, true ) );
	$field_text  = esc_html__( 'Make Heading dark—the featured image is light!', 'generatewp' );
	$field_state = checked( $field_value, 1, false);

	$field_label = sprintf(
	    '<p><label for="%1$s"><input type="checkbox" name="%1$s" id="%1$s" value="%2$s" %3$s> %4$s</label></p>',
	    $field_id, $field_value, $field_state, $field_text
	);

	return $content .= $field_label;
}

add_filter( 'admin_post_thumbnail_html', 'add_featured_image_display_settings', 10, 2 );

/*
 * Make sure we save our metabox value
 */
function save_featured_image_display_settings( $post_ID, $post, $update ) {

	$field_id    = 'featured_image_is_light';
	$field_value = isset( $_REQUEST[ $field_id ] ) ? 1 : 0;

	update_post_meta( $post_ID, $field_id, $field_value );
}
add_action( 'save_post', 'save_featured_image_display_settings', 10, 3 );

/*
 * Add a class name to post_class to account for the featured image setting
 */
function featured_image_is_light( $classes ) {
	global $post;
	
	if( 1 == get_post_meta( $post->ID, 'featured_image_is_light', true) ) {

	  $classes[] = 'light-featured-image';

	}
	return $classes;
}
add_filter( 'post_class', 'featured_image_is_light' );