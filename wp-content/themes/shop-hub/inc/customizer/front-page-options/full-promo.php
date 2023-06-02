<?php
/**
 * Full Promo
 *
 * @package Shop_Hub
 */

$wp_customize->add_section(
	'shop_hub_full_promo_section',
	array(
		'panel' => 'shop_hub_front_page_options',
		'title' => esc_html__( 'Full Promo Section', 'shop-hub' ),
	)
);

// Full Promo - Enable Section.
$wp_customize->add_setting(
	'shop_hub_enable_full_promo_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'shop_hub_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Shop_Hub_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shop_hub_enable_full_promo_section',
		array(
			'label'    => esc_html__( 'Enable Full Promo Section', 'shop-hub' ),
			'section'  => 'shop_hub_full_promo_section',
			'settings' => 'shop_hub_enable_full_promo_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'shop_hub_enable_full_promo_section',
		array(
			'selector' => '#shop_hub_full_promo_section .section-link',
			'settings' => 'shop_hub_enable_full_promo_section',
		)
	);
}

for ( $i = 1; $i <= 2; $i++ ) {

	// Full Promo - Section Title.
	$wp_customize->add_setting(
		'shop_hub_full_promo_title_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'shop_hub_full_promo_title_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Title %d', 'shop-hub' ), $i ),
			'section'         => 'shop_hub_full_promo_section',
			'settings'        => 'shop_hub_full_promo_title_' . $i,
			'type'            => 'text',
			'active_callback' => 'shop_hub_is_full_promo_section_enabled',
		)
	);

	// Full Promo - Section Content.
	$wp_customize->add_setting(
		'shop_hub_full_promo_content_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'shop_hub_full_promo_content_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Content %d', 'shop-hub' ), $i ),
			'section'         => 'shop_hub_full_promo_section',
			'settings'        => 'shop_hub_full_promo_content_' . $i,
			'type'            => 'text',
			'active_callback' => 'shop_hub_is_full_promo_section_enabled',
		)
	);

	// Full Promo - Background Image.
	$wp_customize->add_setting(
		'shop_hub_full_promo_background_image_' . $i,
		array(
			'sanitize_callback' => 'shop_hub_sanitize_image',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'shop_hub_full_promo_background_image_' . $i,
			array(
				'label'           => sprintf( esc_html__( 'Background Image %d', 'shop-hub' ), $i ),
				'section'         => 'shop_hub_full_promo_section',
				'settings'        => 'shop_hub_full_promo_background_image_' . $i,
				'active_callback' => 'shop_hub_is_full_promo_section_enabled',
			)
		)
	);

		// Full Promo Section - Enable Overlay.
	$wp_customize->add_setting(
		'shop_hub_enable_full_promo_overlay_' . $i,
		array(
			'default'           => true,
			'sanitize_callback' => 'shop_hub_sanitize_switch',
		)
	);

	$wp_customize->add_control(
		new Shop_Hub_Toggle_Switch_Custom_Control(
			$wp_customize,
			'shop_hub_enable_full_promo_overlay_' . $i,
			array(
				'label'           => sprintf( esc_html__( 'Enable Overlay %d', 'shop-hub' ), $i ),
				'section'         => 'shop_hub_full_promo_section',
				'settings'        => 'shop_hub_enable_full_promo_overlay_' . $i,
				'active_callback' => 'shop_hub_is_full_promo_section_enabled',
			)
		)
	);

	// Full Promo Section - Enable Dark Content.
	$wp_customize->add_setting(
		'shop_hub_enable_full_promo_dark_content_' . $i,
		array(
			'default'           => false,
			'sanitize_callback' => 'shop_hub_sanitize_switch',
		)
	);

	$wp_customize->add_control(
		new Shop_Hub_Toggle_Switch_Custom_Control(
			$wp_customize,
			'shop_hub_enable_full_promo_dark_content_' . $i,
			array(
				'label'           => sprintf( esc_html__( 'Enable Dark Content %d', 'shop-hub' ), $i ),
				'section'         => 'shop_hub_full_promo_section',
				'settings'        => 'shop_hub_enable_full_promo_dark_content_' . $i,
				'active_callback' => 'shop_hub_is_full_promo_section_enabled',
			)
		)
	);

	// Full Promo - Button Label.
	$wp_customize->add_setting(
		'shop_hub_full_promo_button_label_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'shop_hub_full_promo_button_label_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Button Label %d', 'shop-hub' ), $i ),
			'section'         => 'shop_hub_full_promo_section',
			'settings'        => 'shop_hub_full_promo_button_label_' . $i,
			'type'            => 'text',
			'active_callback' => 'shop_hub_is_full_promo_section_enabled',
		)
	);

	// Full Promo - Link.
	$wp_customize->add_setting(
		'shop_hub_full_promo_link_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'shop_hub_full_promo_link_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Link %d', 'shop-hub' ), $i ),
			'section'         => 'shop_hub_full_promo_section',
			'settings'        => 'shop_hub_full_promo_link_' . $i,
			'type'            => 'url',
			'active_callback' => 'shop_hub_is_full_promo_section_enabled',
		)
	);

	// Full Promo Section - Horizontal Line.
	$wp_customize->add_setting(
		'shop_hub_full_promo_horizontal_line' . $i,
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Shop_Hub_Customize_Horizontal_Line(
			$wp_customize,
			'shop_hub_full_promo_horizontal_line' . $i,
			array(
				'section'         => 'shop_hub_full_promo_section',
				'settings'        => 'shop_hub_full_promo_horizontal_line' . $i,
				'active_callback' => 'shop_hub_is_full_promo_section_enabled',
				'type'            => 'hr',
			)
		)
	);

}
