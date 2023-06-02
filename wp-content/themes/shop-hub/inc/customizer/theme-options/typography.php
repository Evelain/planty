<?php
/**
 * Typography
 *
 * @package Shop_Hub
 */

$wp_customize->add_section(
	'shop_hub_typography',
	array(
		'panel' => 'shop_hub_theme_options',
		'title' => esc_html__( 'Typography', 'shop-hub' ),
	)
);

// Typography - Site Title Font.
$wp_customize->add_setting(
	'shop_hub_site_title_font',
	array(
		'default'           => 'Amarante',
		'sanitize_callback' => 'shop_hub_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'shop_hub_site_title_font',
	array(
		'label'    => esc_html__( 'Site Title Font Family', 'shop-hub' ),
		'section'  => 'shop_hub_typography',
		'settings' => 'shop_hub_site_title_font',
		'type'     => 'select',
		'choices'  => shop_hub_get_all_google_font_families(),
	)
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'shop_hub_site_description_font',
	array(
		'default'           => 'Crimson Text',
		'sanitize_callback' => 'shop_hub_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'shop_hub_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'shop-hub' ),
		'section'  => 'shop_hub_typography',
		'settings' => 'shop_hub_site_description_font',
		'type'     => 'select',
		'choices'  => shop_hub_get_all_google_font_families(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'shop_hub_header_font',
	array(
		'default'           => 'Amarante',
		'sanitize_callback' => 'shop_hub_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'shop_hub_header_font',
	array(
		'label'    => esc_html__( 'Header Font Family', 'shop-hub' ),
		'section'  => 'shop_hub_typography',
		'settings' => 'shop_hub_header_font',
		'type'     => 'select',
		'choices'  => shop_hub_get_all_google_font_families(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'shop_hub_body_font',
	array(
		'default'           => 'Lora',
		'sanitize_callback' => 'shop_hub_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'shop_hub_body_font',
	array(
		'label'    => esc_html__( 'Body Font Family', 'shop-hub' ),
		'section'  => 'shop_hub_typography',
		'settings' => 'shop_hub_body_font',
		'type'     => 'select',
		'choices'  => shop_hub_get_all_google_font_families(),
	)
);
