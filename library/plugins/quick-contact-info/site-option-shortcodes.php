<?php

/*
 * Site option shortcodes
 * Tie it all together, make it more modular
 * Note: Requires addressifier
 */


/*
 * [phone_number]
 */
function qcinfo_phone_number( $atts ) {

	$options = get_option( 'qcinfo_settings' );
	return $options['phone_number'];
}
add_shortcode( 'phone_number', 'qcinfo_phone_number' );


/*
 * [phone]
 * Right now only works for U.S. phone numbers
 */
function qcinfo_phone( $atts ) {

	$options = get_option( 'qcinfo_settings' );
	
	$phone_number = $options['phone_number'];
	
	// remove all non-numeric characters from phone number
	$phone_num_condensed = preg_replace('/[^\d]/', '', $phone_number);

	$output = '<a class="tel" href="tel://+1' . $phone_num_condensed . '">' . $phone_number . '</a>';
	return $output;
}
add_shortcode( 'phone', 'qcinfo_phone' );


/*
 * [address]
 */
function qcinfo_address( $atts ) {

	$options = get_option( 'qcinfo_settings' );
  $text = apply_filters( 'the_content', $options['address'] );
  return $text;
}
add_shortcode( 'address', 'qcinfo_address' );


/*
 * [address_link]
 * [address_link text="Ad hoc address text"]
 * Right now only works for U.S. addresses
 */
function qcinfo_address_link( $atts ) {

	$options = get_option( 'qcinfo_settings' );
	
	$address = $options['address'];
	
	// Use text attribute if we have it.
  $a = shortcode_atts( array(
    'text' => $address
  ), $atts );
  
  // addressify the text, and apply content filters to it.
  $text = apply_filters( 'the_content', addressify( $a['text'] ) );
  
	$output = '<a class="map" href="' . addressify_map_url( $address ) . '">' . $text . '</a>';
	return $output;
}
add_shortcode( 'address_link', 'qcinfo_address_link' );

/*
 * [get_email]
 */
function qcinfo_get_email( $atts ) {

	$options = get_option( 'qcinfo_settings' );
	return $options['email'];
}
add_shortcode( 'get_email', 'qcinfo_email' );


/*
 * [email]
 * [email text="Ad hoc address text"]
 * Right now only works for U.S. addresses
 */
function qcinfo_email( $atts ) {

	$options = get_option( 'qcinfo_settings' );
	
	$email = $options['email'];
	
	// Use text attribute if we have it.
  $a = shortcode_atts( array(
    'text' => $email
  ), $atts );
  
	$output = '<a class="email" href="mailto:' . $email . '">' . $a['text'] . '</a>';
	return $output;
}
add_shortcode( 'email', 'qcinfo_email' );

