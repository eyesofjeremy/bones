<?php

// Fields developed using Advanced Custom Fields

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_hc-widget-details',
		'title' => 'HC Widget Details',
		'fields' => array (
			array (
				'key' => 'field_57e1dcb906629',
				'label' => 'Widget Code',
				'name' => 'csp_hc_widget_code',
				'type' => 'textarea',
				'instructions' => 'Paste the widget code from your HealCode Widget here. To modify widgets, go to <a target="_blank" href="https://manager.healcode.com/manager/widgets">https://manager.healcode.com/manager/widgets</a>',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'none',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'csp_hc_widget',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_home-page-featured-image',
		'title' => 'Home Page Featured Image',
		'fields' => array (
			array (
				'key' => 'field_57e2b63c0a097',
				'label' => 'Featured Headline',
				'name' => 'featured_headline',
				'type' => 'textarea',
				'instructions' => 'Write a concise headline to show up with your featured slide image',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_57e2b7890a09a',
				'label' => 'Show Call To Action Button',
				'name' => 'featured_cta_show',
				'type' => 'true_false',
				'instructions' => 'Show the Call To Action button? (You almost always will want to leave this checked)',
				'message' => '',
				'default_value' => 1,
			),
			array (
				'key' => 'field_57e2b7210a098',
				'label' => 'Call To Action Text',
				'name' => 'featured_cta_text',
				'type' => 'text',
				'instructions' => 'Write the text for your button link.',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_57e2b7890a09a',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_57e2b74f0a099',
				'label' => 'Call To Action Link Location',
				'name' => 'featured_cta_url',
				'type' => 'page_link',
				'instructions' => 'Where would you like your user to go?',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_57e2b7890a09a',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'post_type' => array (
					0 => 'page',
				),
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'front-page.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_home-page-promotions',
		'title' => 'Home Page Promotions',
		'fields' => array (
			array (
				'key' => 'field_57e409a916220',
				'label' => 'List Promotions',
				'name' => 'promotions_listed',
				'type' => 'relationship',
				'instructions' => 'Choose which promotions to list on the home page. Just click on a promotion to add it to the \'active\' slot. Promotions will be shown in the order listed here. Maximum 2 promotions. If none are chosen, we will pick two for ya!',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'promotion',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => 2,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'front-page.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_pilates-class-details',
		'title' => 'Pilates Class Details',
		'fields' => array (
			array (
				'key' => 'field_57e1a9b96ab2f',
				'label' => 'Subhead',
				'name' => 'subhead',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_57e1a9d66ab30',
				'label' => 'Class Pricing',
				'name' => 'class_pricing',
				'type' => 'wysiwyg',
				'instructions' => 'Write pricing details as a bulleted list here.',
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'no',
			),
			array (
				'key' => 'field_57e1aa536ab31',
				'label' => 'Tips',
				'name' => 'tips',
				'type' => 'wysiwyg',
				'instructions' => 'If you\'d like to add a useful tip for this class, write it in here.',
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'no',
			),
			array (
				'key' => 'field_57e1aab96ab33',
				'label' => 'Class Schedule',
				'name' => 'class_schedule',
				'type' => 'relationship',
				'instructions' => 'Choose the appropriate HealCode Widget to show the schedule for this class.',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'csp_hc_widget',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_title',
				),
				'max' => 1,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'pilates_class',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_promotion-details',
		'title' => 'Promotion Details',
		'fields' => array (
			array (
				'key' => 'field_57e2f2ded1c3a',
				'label' => 'Note',
				'name' => '',
				'type' => 'message',
				'message' => 'Note: The title above won\'t show up on your promotion. Use it for internal organization.',
			),
			array (
				'key' => 'field_57e2f2763daa4',
				'label' => 'Banner Image',
				'name' => 'promo_img',
				'type' => 'image',
				'instructions' => 'Give us a nice image for this promotion!',
				'required' => 1,
				'save_format' => 'url',
				'preview_size' => 'small',
				'library' => 'all',
			),
			array (
				'key' => 'field_57e2f1783daa0',
				'label' => 'Heading',
				'name' => 'promo_heading',
				'type' => 'text',
				'instructions' => 'Keep it super-quick and clear.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_57e2f1b23daa1',
				'label' => 'Text',
				'name' => 'promo_text',
				'type' => 'textarea',
				'instructions' => 'Whatcha got for us today? Sell it, but again, be brief!',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_57e2f1ee3daa2',
				'label' => 'Button Text',
				'name' => 'promo_button_text',
				'type' => 'text',
				'instructions' => '"Book Now" or "Learn More". Be very brief. Avoid "Click here". Make this an actual action the user should take.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_57e2f2433daa3',
				'label' => 'Promo URL',
				'name' => 'promo_url',
				'type' => 'text',
				'instructions' => 'Enter the full URL of the page you want someone to go to. You need to include "http://" at the beginning, or your link probably won\'t work!',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'promotion',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
