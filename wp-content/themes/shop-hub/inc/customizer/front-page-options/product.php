<?php
/**
 * Product Section
 *
 * @package Shop_Hub
 */

if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}

// Product Section.
$wp_customize->add_section(
	'shop_hub_product_section',
	array(
		'panel' => 'shop_hub_front_page_options',
		'title' => esc_html__( 'Product Section', 'shop-hub' ),
	)
);

// Product Section - Enable Section.
$wp_customize->add_setting(
	'shop_hub_enable_product_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'shop_hub_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Shop_Hub_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shop_hub_enable_product_section',
		array(
			'label'    => esc_html__( 'Enable Product Section', 'shop-hub' ),
			'section'  => 'shop_hub_product_section',
			'settings' => 'shop_hub_enable_product_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'shop_hub_enable_product_section',
		array(
			'selector' => '#shop_hub_product_section .section-link',
			'settings' => 'shop_hub_enable_product_section',
		)
	);
}

// Product Section - Section Title.
$wp_customize->add_setting(
	'shop_hub_product_title',
	array(
		'default'           => __( 'Our Products', 'shop-hub' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shop_hub_product_title',
	array(
		'label'           => esc_html__( 'Section Title', 'shop-hub' ),
		'section'         => 'shop_hub_product_section',
		'settings'        => 'shop_hub_product_title',
		'type'            => 'text',
		'active_callback' => 'shop_hub_is_product_section_enabled',
	)
);

// Product Section - Section Text.
$wp_customize->add_setting(
	'shop_hub_product_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shop_hub_product_text',
	array(
		'label'           => esc_html__( 'Section Text', 'shop-hub' ),
		'section'         => 'shop_hub_product_section',
		'settings'        => 'shop_hub_product_text',
		'type'            => 'text',
		'active_callback' => 'shop_hub_is_product_section_enabled',
	)
);

// Product - Content Type.
$wp_customize->add_setting(
	'shop_hub_product_content_type',
	array(
		'default'           => 'product',
		'sanitize_callback' => 'shop_hub_sanitize_select',
	)
);

$wp_customize->add_control(
	'shop_hub_product_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'shop-hub' ),
		'section'         => 'shop_hub_product_section',
		'settings'        => 'shop_hub_product_content_type',
		'type'            => 'select',
		'active_callback' => 'shop_hub_is_product_section_enabled',
		'choices'         => array(
			'product'     => esc_html__( 'Product', 'shop-hub' ),
			'product_cat' => esc_html__( 'Product Category', 'shop-hub' ),
		),
	)
);

for ( $i = 1; $i <= 8; $i++ ) {

	// Product Section - Select Product.
	$wp_customize->add_setting(
		'shop_hub_product_content_product_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'shop_hub_product_content_product_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Product %d', 'shop-hub' ), $i ),
			'section'         => 'shop_hub_product_section',
			'settings'        => 'shop_hub_product_content_product_' . $i,
			'active_callback' => 'shop_hub_is_product_section_and_content_type_product_enabled',
			'type'            => 'select',
			'choices'         => shop_hub_get_product_choices(),
		)
	);

}

// Product Section - Select Product Category.
$wp_customize->add_setting(
	'shop_hub_product_content_category',
	array(
		'sanitize_callback' => 'shop_hub_sanitize_select',
	)
);

$wp_customize->add_control(
	'shop_hub_product_content_category',
	array(
		'label'           => esc_html__( 'Select Product Category', 'shop-hub' ),
		'section'         => 'shop_hub_product_section',
		'settings'        => 'shop_hub_product_content_category',
		'active_callback' => 'shop_hub_is_product_section_and_content_type_product_category_enabled',
		'type'            => 'select',
		'choices'         => shop_hub_get_product_cat_choices(),
	)
);

// Product Section - Button Label.
$wp_customize->add_setting(
	'shop_hub_product_button_label',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shop_hub_product_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'shop-hub' ),
		'section'         => 'shop_hub_product_section',
		'settings'        => 'shop_hub_product_button_label',
		'type'            => 'text',
		'active_callback' => 'shop_hub_is_product_section_enabled',
	)
);

// Product Section - Button Link.
$wp_customize->add_setting(
	'shop_hub_product_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'shop_hub_product_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'shop-hub' ),
		'section'         => 'shop_hub_product_section',
		'settings'        => 'shop_hub_product_button_link',
		'type'            => 'url',
		'active_callback' => 'shop_hub_is_product_section_enabled',
	)
);
