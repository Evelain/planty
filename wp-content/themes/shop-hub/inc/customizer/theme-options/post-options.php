<?php
/**
 * Post Options
 *
 * @package Shop_Hub
 */

$wp_customize->add_section(
	'shop_hub_post_options',
	array(
		'title' => esc_html__( 'Post Options', 'shop-hub' ),
		'panel' => 'shop_hub_theme_options',
	)
);

// Post Options - Hide Date.
$wp_customize->add_setting(
	'shop_hub_post_hide_date',
	array(
		'default'           => false,
		'sanitize_callback' => 'shop_hub_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Shop_Hub_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shop_hub_post_hide_date',
		array(
			'label'   => esc_html__( 'Hide Date', 'shop-hub' ),
			'section' => 'shop_hub_post_options',
		)
	)
);

// Post Options - Hide Author.
$wp_customize->add_setting(
	'shop_hub_post_hide_author',
	array(
		'default'           => false,
		'sanitize_callback' => 'shop_hub_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Shop_Hub_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shop_hub_post_hide_author',
		array(
			'label'   => esc_html__( 'Hide Author', 'shop-hub' ),
			'section' => 'shop_hub_post_options',
		)
	)
);

// Post Options - Hide Category.
$wp_customize->add_setting(
	'shop_hub_post_hide_category',
	array(
		'default'           => false,
		'sanitize_callback' => 'shop_hub_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Shop_Hub_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shop_hub_post_hide_category',
		array(
			'label'   => esc_html__( 'Hide Category', 'shop-hub' ),
			'section' => 'shop_hub_post_options',
		)
	)
);

// Post Options - Hide Tag.
$wp_customize->add_setting(
	'shop_hub_post_hide_tags',
	array(
		'default'           => false,
		'sanitize_callback' => 'shop_hub_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Shop_Hub_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shop_hub_post_hide_tags',
		array(
			'label'   => esc_html__( 'Hide Tag', 'shop-hub' ),
			'section' => 'shop_hub_post_options',
		)
	)
);

// Post Options - Related Post Label.
$wp_customize->add_setting(
	'shop_hub_post_related_post_label',
	array(
		'default'           => __( 'Related Posts', 'shop-hub' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shop_hub_post_related_post_label',
	array(
		'label'    => esc_html__( 'Related Posts Label', 'shop-hub' ),
		'section'  => 'shop_hub_post_options',
		'settings' => 'shop_hub_post_related_post_label',
		'type'     => 'text',
	)
);

// Post Options - Hide Related Posts.
$wp_customize->add_setting(
	'shop_hub_post_hide_related_posts',
	array(
		'default'           => false,
		'sanitize_callback' => 'shop_hub_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Shop_Hub_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shop_hub_post_hide_related_posts',
		array(
			'label'   => esc_html__( 'Hide Related Posts', 'shop-hub' ),
			'section' => 'shop_hub_post_options',
		)
	)
);
