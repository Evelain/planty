<?php
/**
 * CTA Section
 *
 * @package Shop_Hub
 */

$wp_customize->add_section(
	'shop_hub_cta_section',
	array(
		'panel' => 'shop_hub_front_page_options',
		'title' => esc_html__( 'CTA Section', 'shop-hub' ),
	)
);

// CTA Section - Enable Section.
$wp_customize->add_setting(
	'shop_hub_enable_cta_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'shop_hub_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Shop_Hub_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shop_hub_enable_cta_section',
		array(
			'label'    => esc_html__( 'Enable CTA Section', 'shop-hub' ),
			'section'  => 'shop_hub_cta_section',
			'settings' => 'shop_hub_enable_cta_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'shop_hub_enable_cta_section',
		array(
			'selector' => '#shop_hub_cta_section .section-link',
			'settings' => 'shop_hub_enable_cta_section',
		)
	);
}

// CTA Section - Section Overlay.
$wp_customize->add_setting(
	'shop_hub_enable_cta_section_overlay',
	array(
		'default'           => true,
		'sanitize_callback' => 'shop_hub_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Shop_Hub_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shop_hub_enable_cta_section_overlay',
		array(
			'label'           => esc_html__( 'Enable Section Overlay', 'shop-hub' ),
			'section'         => 'shop_hub_cta_section',
			'settings'        => 'shop_hub_enable_cta_section_overlay',
			'active_callback' => 'shop_hub_is_cta_section_enabled',
		)
	)
);

// CTA Section - Text Dark.
$wp_customize->add_setting(
	'shop_hub_enable_cta_section_text_dark',
	array(
		'default'           => false,
		'sanitize_callback' => 'shop_hub_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Shop_Hub_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shop_hub_enable_cta_section_text_dark',
		array(
			'label'           => esc_html__( 'Enable Dark Content', 'shop-hub' ),
			'section'         => 'shop_hub_cta_section',
			'settings'        => 'shop_hub_enable_cta_section_text_dark',
			'active_callback' => 'shop_hub_is_cta_section_enabled',
		)
	)
);

// CTA Section - Background Image.
$wp_customize->add_setting(
	'shop_hub_cta_background_image',
	array(
		'sanitize_callback' => 'shop_hub_sanitize_image',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'shop_hub_cta_background_image',
		array(
			'label'           => esc_html__( 'Background Image', 'shop-hub' ),
			'section'         => 'shop_hub_cta_section',
			'settings'        => 'shop_hub_cta_background_image',
			'active_callback' => 'shop_hub_is_cta_section_enabled',
		)
	)
);

// CTA Section - Section Subtitle.
$wp_customize->add_setting(
	'shop_hub_cta_subtitle',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shop_hub_cta_subtitle',
	array(
		'label'           => esc_html__( 'Section Subtitle', 'shop-hub' ),
		'section'         => 'shop_hub_cta_section',
		'settings'        => 'shop_hub_cta_subtitle',
		'type'            => 'text',
		'active_callback' => 'shop_hub_is_cta_section_enabled',
	)
);

// CTA Section - Section Title.
$wp_customize->add_setting(
	'shop_hub_cta_title',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shop_hub_cta_title',
	array(
		'label'           => esc_html__( 'Section Title', 'shop-hub' ),
		'section'         => 'shop_hub_cta_section',
		'settings'        => 'shop_hub_cta_title',
		'type'            => 'text',
		'active_callback' => 'shop_hub_is_cta_section_enabled',
	)
);

// CTA Section - Section Content.
$wp_customize->add_setting(
	'shop_hub_cta_content',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shop_hub_cta_content',
	array(
		'label'           => esc_html__( 'Content', 'shop-hub' ),
		'section'         => 'shop_hub_cta_section',
		'settings'        => 'shop_hub_cta_content',
		'type'            => 'text',
		'active_callback' => 'shop_hub_is_cta_section_enabled',
	)
);

// CTA Section - Button Label.
$wp_customize->add_setting(
	'shop_hub_cta_button_label',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shop_hub_cta_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'shop-hub' ),
		'section'         => 'shop_hub_cta_section',
		'settings'        => 'shop_hub_cta_button_label',
		'type'            => 'text',
		'active_callback' => 'shop_hub_is_cta_section_enabled',
	)
);

// CTA Section - Button Link.
$wp_customize->add_setting(
	'shop_hub_cta_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'shop_hub_cta_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'shop-hub' ),
		'section'         => 'shop_hub_cta_section',
		'settings'        => 'shop_hub_cta_button_link',
		'type'            => 'url',
		'active_callback' => 'shop_hub_is_cta_section_enabled',
	)
);
