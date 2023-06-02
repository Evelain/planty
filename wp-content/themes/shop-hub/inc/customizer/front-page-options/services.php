<?php
/**
 * Services Section
 *
 * @package Shop_Hub
 */

$wp_customize->add_section(
	'shop_hub_services_section',
	array(
		'panel' => 'shop_hub_front_page_options',
		'title' => esc_html__( 'Services Section', 'shop-hub' ),
	)
);

// Services Section - Enable Section.
$wp_customize->add_setting(
	'shop_hub_enable_services_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'shop_hub_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Shop_Hub_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shop_hub_enable_services_section',
		array(
			'label'    => esc_html__( 'Enable Services Section', 'shop-hub' ),
			'section'  => 'shop_hub_services_section',
			'settings' => 'shop_hub_enable_services_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'shop_hub_enable_services_section',
		array(
			'selector' => '#shop_hub_services_section .section-link',
			'settings' => 'shop_hub_enable_services_section',
		)
	);
}

// Services Section - Section Title.
$wp_customize->add_setting(
	'shop_hub_services_title',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shop_hub_services_title',
	array(
		'label'           => esc_html__( 'Section Title', 'shop-hub' ),
		'section'         => 'shop_hub_services_section',
		'settings'        => 'shop_hub_services_title',
		'type'            => 'text',
		'active_callback' => 'shop_hub_is_services_section_enabled',
	)
);

// Services Section - Section Text.
$wp_customize->add_setting(
	'shop_hub_services_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shop_hub_services_text',
	array(
		'label'           => esc_html__( 'Section Text', 'shop-hub' ),
		'section'         => 'shop_hub_services_section',
		'settings'        => 'shop_hub_services_text',
		'type'            => 'text',
		'active_callback' => 'shop_hub_is_services_section_enabled',
	)
);

for ( $i = 1; $i <= 3; $i++ ) {

	// Service Section - Service Icon.
	$wp_customize->add_setting(
		'shop_hub_services_icon_' . $i,
		array(
			'sanitize_callback' => 'shop_hub_sanitize_image',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'shop_hub_services_icon_' . $i,
			array(
				'label'           => sprintf( esc_html__( 'Icon %d', 'shop-hub' ), $i ),
				'section'         => 'shop_hub_services_section',
				'settings'        => 'shop_hub_services_icon_' . $i,
				'active_callback' => 'shop_hub_is_services_section_enabled',
			)
		)
	);

	// Service Section - Service Custom Title.
	$wp_customize->add_setting(
		'shop_hub_services_title_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'shop_hub_services_title_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Custom Title %d', 'shop-hub' ), $i ),
			'section'         => 'shop_hub_services_section',
			'settings'        => 'shop_hub_services_title_' . $i,
			'type'            => 'text',
			'active_callback' => 'shop_hub_is_services_section_enabled',
		)
	);

	// Service Section - Custom Title Link.
	$wp_customize->add_setting(
		'shop_hub_services_title_custom_link_' . $i,
		array(
			'default'           => '#',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'shop_hub_services_title_custom_link_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Custom Title Link %d', 'shop-hub' ), $i ),
			'section'         => 'shop_hub_services_section',
			'settings'        => 'shop_hub_services_title_custom_link_' . $i,
			'type'            => 'url',
			'active_callback' => 'shop_hub_is_services_section_enabled',
		)
	);

	// Service Section - Short Description Link.
	$wp_customize->add_setting(
		'shop_hub_services_short_description_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'shop_hub_services_short_description_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Short Description %d', 'shop-hub' ), $i ),
			'section'         => 'shop_hub_services_section',
			'settings'        => 'shop_hub_services_short_description_' . $i,
			'type'            => 'text',
			'active_callback' => 'shop_hub_is_services_section_enabled',
		)
	);

	// Services Section - Horizontal Line.
	$wp_customize->add_setting(
		'shop_hub_services_horizontal_line' . $i,
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Shop_Hub_Customize_Horizontal_Line(
			$wp_customize,
			'shop_hub_services_horizontal_line' . $i,
			array(
				'section'         => 'shop_hub_services_section',
				'settings'        => 'shop_hub_services_horizontal_line' . $i,
				'active_callback' => 'shop_hub_is_services_section_enabled',
				'type'            => 'hr',
			)
		)
	);

}
