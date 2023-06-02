<?php
/**
 * Archive Layout
 *
 * @package Shop_Hub
 */

$wp_customize->add_section(
	'shop_hub_archive_layout',
	array(
		'title' => esc_html__( 'Archive Layout', 'shop-hub' ),
		'panel' => 'shop_hub_theme_options',
	)
);

// Archive Layout - Column Layout.
$wp_customize->add_setting(
	'shop_hub_archive_column_layout',
	array(
		'default'           => 'column-3',
		'sanitize_callback' => 'shop_hub_sanitize_select',
	)
);

$wp_customize->add_control(
	'shop_hub_archive_column_layout',
	array(
		'label'   => esc_html__( 'Select Column Layout', 'shop-hub' ),
		'section' => 'shop_hub_archive_layout',
		'type'    => 'select',
		'choices' => array(
			'column-2' => __( 'Column 2', 'shop-hub' ),
			'column-3' => __( 'Column 3', 'shop-hub' ),
			'column-4' => __( 'Column 4', 'shop-hub' ),
		),
	)
);
