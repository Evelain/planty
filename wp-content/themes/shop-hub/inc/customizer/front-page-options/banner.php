<?php
/**
 * Banner Section
 *
 * @package Shop_Hub
 */

$wp_customize->add_section(
	'shop_hub_banner_section',
	array(
		'panel' => 'shop_hub_front_page_options',
		'title' => esc_html__( 'Banner Slider Section', 'shop-hub' ),
	)
);

// Banner Section - Enable Section.
$wp_customize->add_setting(
	'shop_hub_enable_banner_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'shop_hub_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Shop_Hub_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shop_hub_enable_banner_section',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'shop-hub' ),
			'section'  => 'shop_hub_banner_section',
			'settings' => 'shop_hub_enable_banner_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'shop_hub_enable_banner_section',
		array(
			'selector' => '#shop_hub_banner_section .section-link',
			'settings' => 'shop_hub_enable_banner_section',
		)
	);
}

// Banner Section - Enable Overlay.
$wp_customize->add_setting(
	'shop_hub_enable_banner_overlay',
	array(
		'default'           => true,
		'sanitize_callback' => 'shop_hub_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Shop_Hub_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shop_hub_enable_banner_overlay',
		array(
			'label'           => esc_html__( 'Enable Banner Overlay', 'shop-hub' ),
			'section'         => 'shop_hub_banner_section',
			'settings'        => 'shop_hub_enable_banner_overlay',
			'active_callback' => 'shop_hub_is_banner_section_enabled',
		)
	)
);

// Banner Section - Enable Dark Content.
$wp_customize->add_setting(
	'shop_hub_enable_dark_content',
	array(
		'default'           => false,
		'sanitize_callback' => 'shop_hub_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Shop_Hub_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shop_hub_enable_dark_content',
		array(
			'label'           => esc_html__( 'Enable Dark Content', 'shop-hub' ),
			'section'         => 'shop_hub_banner_section',
			'settings'        => 'shop_hub_enable_dark_content',
			'active_callback' => 'shop_hub_is_banner_section_enabled',
		)
	)
);

// Banner Section - Content Type.
$wp_customize->add_setting(
	'shop_hub_banner_content',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'shop_hub_sanitize_select',
	)
);

$wp_customize->add_control(
	'shop_hub_banner_content',
	array(
		'label'           => esc_html__( 'Select Content Type', 'shop-hub' ),
		'section'         => 'shop_hub_banner_section',
		'settings'        => 'shop_hub_banner_content',
		'type'            => 'select',
		'active_callback' => 'shop_hub_is_banner_section_enabled',
		'choices'         => shop_hub_get_banner_choices(),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {

	// Banner Section - Content Type Post.
	$wp_customize->add_setting(
		'shop_hub_banner_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'shop_hub_banner_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'shop-hub' ), $i ),
			'section'         => 'shop_hub_banner_section',
			'settings'        => 'shop_hub_banner_content_post_' . $i,
			'active_callback' => 'shop_hub_is_banner_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => shop_hub_get_post_choices(),
		)
	);

	// Banner Section - Content Type Product.
	$wp_customize->add_setting(
		'shop_hub_banner_content_product_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'shop_hub_banner_content_product_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Product %d', 'shop-hub' ), $i ),
			'section'         => 'shop_hub_banner_section',
			'settings'        => 'shop_hub_banner_content_product_' . $i,
			'active_callback' => 'shop_hub_is_banner_section_and_content_type_product_enabled',
			'type'            => 'select',
			'choices'         => shop_hub_get_product_choices(),
		)
	);

	// Banner Section - Button Label.
	$wp_customize->add_setting(
		'shop_hub_banner_button_label' . $i,
		array(
			'default'           => __( 'Shop Now', 'shop-hub' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'shop_hub_banner_button_label' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Button Label %d', 'shop-hub' ), $i ),
			'section'         => 'shop_hub_banner_section',
			'settings'        => 'shop_hub_banner_button_label' . $i,
			'type'            => 'text',
			'active_callback' => 'shop_hub_is_banner_section_enabled',
		)
	);

	// Banner Section - Button Link.
	$wp_customize->add_setting(
		'shop_hub_banner_button_link' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'shop_hub_banner_button_link' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Button Link %d', 'shop-hub' ), $i ),
			'section'         => 'shop_hub_banner_section',
			'settings'        => 'shop_hub_banner_button_link' . $i,
			'type'            => 'url',
			'active_callback' => 'shop_hub_is_banner_section_enabled',
		)
	);

	// Banner Section - Video Link.
	$wp_customize->add_setting(
		'shop_hub_banner_video_link' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'shop_hub_banner_video_link' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Video Link %d', 'shop-hub' ), $i ),
			'section'         => 'shop_hub_banner_section',
			'settings'        => 'shop_hub_banner_video_link' . $i,
			'type'            => 'url',
			'active_callback' => 'shop_hub_is_banner_section_enabled',
		)
	);

	// Banner Section - Horizontal Line.
	$wp_customize->add_setting(
		'shop_hub_banner_horizontal_line' . $i,
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Shop_Hub_Customize_Horizontal_Line(
			$wp_customize,
			'shop_hub_banner_horizontal_line' . $i,
			array(
				'section'         => 'shop_hub_banner_section',
				'settings'        => 'shop_hub_banner_horizontal_line' . $i,
				'active_callback' => 'shop_hub_is_banner_section_enabled',
				'type'            => 'hr',
			)
		)
	);

}
