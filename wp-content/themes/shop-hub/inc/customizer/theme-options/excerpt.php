<?php
/**
 * Excerpt
 *
 * @package Shop_Hub
 */

$wp_customize->add_section(
	'shop_hub_excerpt_options',
	array(
		'panel' => 'shop_hub_theme_options',
		'title' => esc_html__( 'Excerpt', 'shop-hub' ),
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'shop_hub_excerpt_length',
	array(
		'default'           => 20,
		'sanitize_callback' => 'shop_hub_sanitize_number_range',
		'validate_callback' => 'shop_hub_validate_excerpt_length',
	)
);

$wp_customize->add_control(
	'shop_hub_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'shop-hub' ),
		'description' => esc_html__( 'Note: Min 1 & Max 100. Please input the valid number and save. Then refresh the page to see the change.', 'shop-hub' ),
		'section'     => 'shop_hub_excerpt_options',
		'settings'    => 'shop_hub_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
		),
	)
);
