<?php
/**
 * Categories Section
 *
 * @package Shop_Hub
 */

$wp_customize->add_section(
	'shop_hub_categories_section',
	array(
		'panel' => 'shop_hub_front_page_options',
		'title' => esc_html__( 'Categories Section', 'shop-hub' ),
	)
);

// Categories Section - Enable Section.
$wp_customize->add_setting(
	'shop_hub_enable_categories_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'shop_hub_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Shop_Hub_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shop_hub_enable_categories_section',
		array(
			'label'    => esc_html__( 'Enable Categories Section', 'shop-hub' ),
			'section'  => 'shop_hub_categories_section',
			'settings' => 'shop_hub_enable_categories_section',
			'type'     => 'checkbox',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'shop_hub_enable_categories_section',
		array(
			'selector' => '#shop_hub_categories_section .section-link',
			'settings' => 'shop_hub_enable_categories_section',
		)
	);
}

// Categories Section - Section Title.
$wp_customize->add_setting(
	'shop_hub_categories_title',
	array(
		'default'           => __( 'Product Categories', 'shop-hub' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shop_hub_categories_title',
	array(
		'label'           => esc_html__( 'Section Title', 'shop-hub' ),
		'section'         => 'shop_hub_categories_section',
		'settings'        => 'shop_hub_categories_title',
		'type'            => 'text',
		'active_callback' => 'shop_hub_is_categories_section_enabled',
	)
);

// Categories Section - Section Text.
$wp_customize->add_setting(
	'shop_hub_categories_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shop_hub_categories_text',
	array(
		'label'           => esc_html__( 'Section Text', 'shop-hub' ),
		'section'         => 'shop_hub_categories_section',
		'settings'        => 'shop_hub_categories_text',
		'type'            => 'text',
		'active_callback' => 'shop_hub_is_categories_section_enabled',
	)
);

// Categories Section - Select Taxonomy.
$wp_customize->add_setting(
	'shop_hub_taxonomy_name',
	array(
		'default'           => 'product_cat',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shop_hub_taxonomy_name',
	array(
		'label'           => esc_html__( 'Select Taxonomy', 'shop-hub' ),
		'section'         => 'shop_hub_categories_section',
		'settings'        => 'shop_hub_taxonomy_name',
		'active_callback' => 'shop_hub_is_categories_section_enabled',
		'type'            => 'select',
		'choices'         => shop_hub_get_taxonomy_choices(),
	)
);

for ( $i = 1; $i <= 4; $i++ ) {

	// Categories Section - Select Category.
	$wp_customize->add_setting(
		'shop_hub_categories_content_category_' . $i,
		array(
			'sanitize_callback' => 'shop_hub_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'shop_hub_categories_content_category_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Category %d', 'shop-hub' ), $i ),
			'section'         => 'shop_hub_categories_section',
			'settings'        => 'shop_hub_categories_content_category_' . $i,
			'active_callback' => 'shop_hub_is_categories_section_and_content_type_category_enabled',
			'type'            => 'select',
			'choices'         => shop_hub_get_post_cat_choices(),
		)
	);

	// Categories Section - Select Product Category.
	$wp_customize->add_setting(
		'shop_hub_categories_content_product_cat_' . $i,
		array(
			'sanitize_callback' => 'shop_hub_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'shop_hub_categories_content_product_cat_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Category %d', 'shop-hub' ), $i ),
			'section'         => 'shop_hub_categories_section',
			'settings'        => 'shop_hub_categories_content_product_cat_' . $i,
			'active_callback' => 'shop_hub_is_categories_section_and_content_type_product_cat_enabled',
			'type'            => 'select',
			'choices'         => shop_hub_get_product_cat_choices(),
		)
	);

	// Categories Section - Category Image.
	$wp_customize->add_setting(
		'shop_hub_categories_image_' . $i,
		array(
			'sanitize_callback' => 'shop_hub_sanitize_image',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'shop_hub_categories_image_' . $i,
			array(
				'label'           => sprintf( esc_html__( 'Category Image %d', 'shop-hub' ), $i ),
				'section'         => 'shop_hub_categories_section',
				'settings'        => 'shop_hub_categories_image_' . $i,
				'active_callback' => 'shop_hub_is_categories_section_and_content_type_category_enabled',
			)
		)
	);
}
