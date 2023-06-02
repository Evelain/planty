<?php
/**
 * Featured Products
 *
 * @package Shop_Hub
 */

if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}

// Featured Products.
$wp_customize->add_section(
	'shop_hub_featured_product_section',
	array(
		'panel'       => 'shop_hub_front_page_options',
		'title'       => esc_html__( 'Featured Products', 'shop-hub' ),
		'description' => __( 'Displays featured products.', 'shop-hub' ),
	)
);

// Featured Products - Enable Section.
$wp_customize->add_setting(
	'shop_hub_enable_featured_product_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'shop_hub_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Shop_Hub_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shop_hub_enable_featured_product_section',
		array(
			'label'    => esc_html__( 'Enable Featured Products', 'shop-hub' ),
			'section'  => 'shop_hub_featured_product_section',
			'settings' => 'shop_hub_enable_featured_product_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'shop_hub_enable_featured_product_section',
		array(
			'selector' => '#shop_hub_featured_product_section .section-link',
			'settings' => 'shop_hub_enable_featured_product_section',
		)
	);
}

// Featured Products - Section Title.
$wp_customize->add_setting(
	'shop_hub_featured_product_title',
	array(
		'default'           => __( 'Featured Products', 'shop-hub' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shop_hub_featured_product_title',
	array(
		'label'           => esc_html__( 'Section Title', 'shop-hub' ),
		'section'         => 'shop_hub_featured_product_section',
		'settings'        => 'shop_hub_featured_product_title',
		'type'            => 'text',
		'active_callback' => 'shop_hub_is_featured_product_section_enabled',
	)
);

// Featured Products - Section Text.
$wp_customize->add_setting(
	'shop_hub_featured_product_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shop_hub_featured_product_text',
	array(
		'label'           => esc_html__( 'Section Text', 'shop-hub' ),
		'section'         => 'shop_hub_featured_product_section',
		'settings'        => 'shop_hub_featured_product_text',
		'type'            => 'text',
		'active_callback' => 'shop_hub_is_featured_product_section_enabled',
	)
);

// Featured Products - Content Type.
$wp_customize->add_setting(
	'shop_hub_featured_product_content_type',
	array(
		'default'           => 'product',
		'sanitize_callback' => 'shop_hub_sanitize_select',
	)
);

$wp_customize->add_control(
	'shop_hub_featured_product_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'shop-hub' ),
		'section'         => 'shop_hub_featured_product_section',
		'settings'        => 'shop_hub_featured_product_content_type',
		'type'            => 'select',
		'active_callback' => 'shop_hub_is_featured_product_section_enabled',
		'choices'         => array(
			'product'     => esc_html__( 'Product', 'shop-hub' ),
			'product_cat' => esc_html__( 'Product Category', 'shop-hub' ),
		),
	)
);

for ( $i = 1; $i <= 6; $i++ ) {

	// Featured Products - Select Product.
	$wp_customize->add_setting(
		'shop_hub_featured_product_content_product_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'shop_hub_featured_product_content_product_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Product %d', 'shop-hub' ), $i ),
			'section'         => 'shop_hub_featured_product_section',
			'settings'        => 'shop_hub_featured_product_content_product_' . $i,
			'type'            => 'select',
			'choices'         => shop_hub_get_product_choices(),
			'active_callback' => 'shop_hub_is_featured_product_section_and_content_type_product_enabled',
		)
	);

}

// Featured Products - Select Product Category.
$wp_customize->add_setting(
	'shop_hub_featured_product_content_category',
	array(
		'sanitize_callback' => 'shop_hub_sanitize_select',
	)
);

$wp_customize->add_control(
	'shop_hub_featured_product_content_category',
	array(
		'label'           => esc_html__( 'Select Product Category', 'shop-hub' ),
		'section'         => 'shop_hub_featured_product_section',
		'settings'        => 'shop_hub_featured_product_content_category',
		'active_callback' => 'shop_hub_is_featured_product_section_and_content_type_product_category_enabled',
		'type'            => 'select',
		'choices'         => shop_hub_get_product_cat_choices(),
	)
);

// Featured Products - Button Label.
$wp_customize->add_setting(
	'shop_hub_featured_product_button_label',
	array(
		'default'           => __( 'View All', 'shop-hub' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shop_hub_featured_product_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'shop-hub' ),
		'section'         => 'shop_hub_featured_product_section',
		'settings'        => 'shop_hub_featured_product_button_label',
		'type'            => 'text',
		'active_callback' => 'shop_hub_is_featured_product_section_enabled',
	)
);

// Featured Products - Button Link.
$wp_customize->add_setting(
	'shop_hub_featured_product_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'shop_hub_featured_product_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'shop-hub' ),
		'section'         => 'shop_hub_featured_product_section',
		'settings'        => 'shop_hub_featured_product_button_link',
		'type'            => 'url',
		'active_callback' => 'shop_hub_is_featured_product_section_enabled',
	)
);

// Post Carousel Section - Horizontal Line.
$wp_customize->add_setting(
	'shop_hub_featured_product_horizontal_line',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Shop_Hub_Customize_Horizontal_Line(
		$wp_customize,
		'shop_hub_featured_product_horizontal_line',
		array(
			'section'         => 'shop_hub_featured_product_section',
			'settings'        => 'shop_hub_featured_product_horizontal_line',
			'active_callback' => 'shop_hub_is_featured_product_section_enabled',
			'type'            => 'hr',
		)
	)
);

// Featured Product Section - Enable Section.
$wp_customize->add_setting(
	'shop_hub_enable_featured_product_ads_section',
	array(
		'default'           => true,
		'sanitize_callback' => 'shop_hub_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Shop_Hub_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shop_hub_enable_featured_product_ads_section',
		array(
			'label'           => esc_html__( 'Enable Advertisement Section', 'shop-hub' ),
			'section'         => 'shop_hub_featured_product_section',
			'settings'        => 'shop_hub_enable_featured_product_ads_section',
			'active_callback' => 'shop_hub_is_featured_product_section_enabled',
		)
	)
);

for ( $i = 1; $i <= 2; $i++ ) {

	// Featured Product Section - Advertisement Image.
	$wp_customize->add_setting(
		'shop_hub_featured_products_advertisement_image_' . $i,
		array(
			'sanitize_callback' => 'shop_hub_sanitize_image',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'shop_hub_featured_products_advertisement_image_' . $i,
			array(
				'label'           => sprintf( esc_html__( 'Advertisement Image %d', 'shop-hub' ), $i ),
				'section'         => 'shop_hub_featured_product_section',
				'settings'        => 'shop_hub_featured_products_advertisement_image_' . $i,
				'active_callback' => 'shop_hub_is_featured_product_advertisement_enabled',
			)
		)
	);

	// Featured Product Section - Advertisement Link.
	$wp_customize->add_setting(
		'shop_hub_featured_products_advertisement_link_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'shop_hub_featured_products_advertisement_link_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Advertisement Url %d', 'shop-hub' ), $i ),
			'section'         => 'shop_hub_featured_product_section',
			'settings'        => 'shop_hub_featured_products_advertisement_link_' . $i,
			'type'            => 'url',
			'active_callback' => 'shop_hub_is_featured_product_advertisement_enabled',
		)
	);

}
