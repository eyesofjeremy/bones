<?php
/*
Plugin Name: Quick Contact Info
Plugin URI: http://jeremycarlson.com/
Description: Set up contact info to be accessible from anywhere in your site.
Author: Jeremy Carlson
Version: 0.2
Author URI: http://www.jeremycarlson.com
*/

add_action( 'admin_menu', 'qcinfo_add_admin_menu' );
add_action( 'admin_init', 'qcinfo_settings_init' );

// Include addressifier, which allows us to make responsive-friendly abbreviations
include('addressifier.php');

// Include shortcodes
include('site-option-shortcodes.php');

function qcinfo_add_admin_menu(  ) { 

	add_options_page( 'Contact Info', 'Contact Info', 'manage_categories', 'contact-info', 'qcinfo_options_page' );

}


function qcinfo_settings_init(  ) { 

	register_setting( 'clientSettings', 'qcinfo_settings' );

	//
	//
	// Contact Info
	//
	add_settings_section(
		'qcinfo_info_section', 
		__( 'Contact Info', 'wordpress' ), 
		'qcinfo_info_section_callback', 
		'clientSettings'
	);

	// Phone Number
	add_settings_field( 
		'phone_number', 
		__( 'Main Contact Number (needs to be U.S. number!)', 'wordpress' ), 
		'qcinfo_phone_number_render', 
		'clientSettings', 
		'qcinfo_info_section' 
	);

	// Address
	add_settings_field( 
		'address', 
		__( 'Main Address', 'wordpress' ), 
		'qcinfo_address_render', 
		'clientSettings', 
		'qcinfo_info_section' 
	);

	// Email Address
	add_settings_field( 
		'email', 
		__( 'Public Email Address', 'wordpress' ), 
		'qcinfo_email_render', 
		'clientSettings', 
		'qcinfo_info_section' 
	);

/*
	in case we want these....

	add_settings_field( 
		'checkbox_field_2', 
		__( 'Settings field description', 'wordpress' ), 
		'checkbox_field_2_render', 
		'clientSettings', 
		'info_section' 
	);

	add_settings_field( 
		'radio_field_3', 
		__( 'Settings field description', 'wordpress' ), 
		'radio_field_3_render', 
		'clientSettings', 
		'info_section' 
	);

	add_settings_field( 
		'select_field_4', 
		__( 'Settings field description', 'wordpress' ), 
		'select_field_4_render', 
		'clientSettings', 
		'info_section' 
	);
*/

}


function qcinfo_phone_number_render(  ) { 

	$options = get_option( 'qcinfo_settings' );
	?>
	<input type='text' name='qcinfo_settings[phone_number]' value='<?php echo $options['phone_number']; ?>'>
	<?php

}


function qcinfo_address_render(  ) { 

	$options = get_option( 'qcinfo_settings' );
	?>
	<textarea cols='40' rows='5' name='qcinfo_settings[address]'><?php
		echo $options['address']; 
	?></textarea>
	<?php

}


function qcinfo_email_render(  ) { 

	$options = get_option( 'qcinfo_settings' );
	?>
	<textarea cols='40' rows='5' name='qcinfo_settings[email]'><?php
		echo $options['email']; 
	?></textarea>
	<?php

}


function qcinfo_info_section_callback(  ) { 

	echo __( 'Basic info about your organization', 'wordpress' );

}


function qcinfo_options_page(  ) { 

	?>
	<form action='options.php' method='post'>
		
		<h2>Contact Info and Site Details</h2>
		
		<?php
		settings_fields( 'clientSettings' );
		do_settings_sections( 'clientSettings' );
		submit_button();
		?>
		
	</form>
	<?php

}
