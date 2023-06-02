<?php
/**
 * Pagination
 *
 * @package Shop_Hub
 */

$wp_customize->add_section(
	'shop_hub_pagination',
	array(
		'panel' => 'shop_hub_theme_options',
		'title' => esc_html__( 'Pagination', 'shop-hub' ),
	)
);

// Pagination - Enable Pagination.
$wp_customize->add_setting(
	'shop_hub_enable_pagination',
	array(
		'default'           => true,
		'sanitize_callback' => 'shop_hub_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Shop_Hub_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shop_hub_enable_pagination',
		array(
			'label'    => esc_html__( 'Enable Pagination', 'shop-hub' ),
			'section'  => 'shop_hub_pagination',
			'settings' => 'shop_hub_enable_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Type.
$wp_customize->add_setting(
	'shop_hub_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'shop_hub_sanitize_select',
	)
);

$wp_customize->add_control(
	'shop_hub_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'shop-hub' ),
		'section'         => 'shop_hub_pagination',
		'settings'        => 'shop_hub_pagination_type',
		'active_callback' => 'shop_hub_is_pagination_enabled',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'shop-hub' ),
			'numeric' => __( 'Numeric', 'shop-hub' ),
		),
	)
);
