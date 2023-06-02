<?php
/**
 * Sidebar Option
 *
 * @package Shop_Hub
 */

$wp_customize->add_section(
	'shop_hub_sidebar_option',
	array(
		'title' => esc_html__( 'Layout', 'shop-hub' ),
		'panel' => 'shop_hub_theme_options',
	)
);

// Sidebar Option - Global Sidebar Position.
$wp_customize->add_setting(
	'shop_hub_sidebar_position',
	array(
		'sanitize_callback' => 'shop_hub_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'shop_hub_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'shop-hub' ),
		'section' => 'shop_hub_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'shop-hub' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'shop-hub' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'shop-hub' ),
		),
	)
);

// Sidebar Option - Post Sidebar Position.
$wp_customize->add_setting(
	'shop_hub_post_sidebar_position',
	array(
		'sanitize_callback' => 'shop_hub_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'shop_hub_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'shop-hub' ),
		'section' => 'shop_hub_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'shop-hub' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'shop-hub' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'shop-hub' ),
		),
	)
);

// Sidebar Option - Page Sidebar Position.
$wp_customize->add_setting(
	'shop_hub_page_sidebar_position',
	array(
		'sanitize_callback' => 'shop_hub_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'shop_hub_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'shop-hub' ),
		'section' => 'shop_hub_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'shop-hub' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'shop-hub' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'shop-hub' ),
		),
	)
);
