<?php
/**
 * Breadcrumb
 *
 * @package Shop_Hub
 */

$wp_customize->add_section(
	'shop_hub_breadcrumb',
	array(
		'title' => esc_html__( 'Breadcrumb', 'shop-hub' ),
		'panel' => 'shop_hub_theme_options',
	)
);

// Breadcrumb - Enable Breadcrumb.
$wp_customize->add_setting(
	'shop_hub_enable_breadcrumb',
	array(
		'sanitize_callback' => 'shop_hub_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Shop_Hub_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shop_hub_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'shop-hub' ),
			'section' => 'shop_hub_breadcrumb',
		)
	)
);

// Breadcrumb - Breadcrumb Separator.
$wp_customize->add_setting(
	'shop_hub_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'shop_hub_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'shop-hub' ),
		'active_callback' => 'shop_hub_is_breadcrumb_enabled',
		'section'         => 'shop_hub_breadcrumb',
	)
);
