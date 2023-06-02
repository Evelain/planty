<?php
/**
 * Footer Options
 *
 * @package Shop_Hub
 */

$wp_customize->add_section(
	'shop_hub_footer_options',
	array(
		'panel' => 'shop_hub_theme_options',
		'title' => esc_html__( 'Footer Options', 'shop-hub' ),
	)
);

// Footer Options - Copyright Text.
/* translators: 1: Year, 2: Site Title with home URL. */
$copyright_default = sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'shop-hub' ), '[the-year]', '[site-link]' );
$wp_customize->add_setting(
	'shop_hub_footer_copyright_text',
	array(
		'default'           => $copyright_default,
		'sanitize_callback' => 'wp_kses_post',
	)
);

$wp_customize->add_control(
	'shop_hub_footer_copyright_text',
	array(
		'label'    => esc_html__( 'Copyright Text', 'shop-hub' ),
		'section'  => 'shop_hub_footer_options',
		'settings' => 'shop_hub_footer_copyright_text',
		'type'     => 'textarea',
	)
);

// Footer Options - Scroll Top.
$wp_customize->add_setting(
	'shop_hub_scroll_top',
	array(
		'sanitize_callback' => 'shop_hub_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Shop_Hub_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shop_hub_scroll_top',
		array(
			'label'   => esc_html__( 'Enable Scroll Top Button', 'shop-hub' ),
			'section' => 'shop_hub_footer_options',
		)
	)
);
