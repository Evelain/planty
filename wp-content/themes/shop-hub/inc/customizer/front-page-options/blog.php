<?php
/**
 * Blog Section
 *
 * @package Shop_Hub
 */

$wp_customize->add_section(
	'shop_hub_blog_section',
	array(
		'panel' => 'shop_hub_front_page_options',
		'title' => esc_html__( 'Blog Section', 'shop-hub' ),
	)
);

// Blog Section - Enable Section.
$wp_customize->add_setting(
	'shop_hub_enable_blog_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'shop_hub_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Shop_Hub_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shop_hub_enable_blog_section',
		array(
			'label'    => esc_html__( 'Enable Blog Section', 'shop-hub' ),
			'section'  => 'shop_hub_blog_section',
			'settings' => 'shop_hub_enable_blog_section',
			'type'     => 'checkbox',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'shop_hub_enable_blog_section',
		array(
			'selector' => '#shop_hub_blog_section .section-link',
			'settings' => 'shop_hub_enable_blog_section',
		)
	);
}

// Blog Section - Section Title.
$wp_customize->add_setting(
	'shop_hub_blog_title',
	array(
		'default'           => __( 'Blogs', 'shop-hub' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shop_hub_blog_title',
	array(
		'label'           => esc_html__( 'Section Title', 'shop-hub' ),
		'section'         => 'shop_hub_blog_section',
		'settings'        => 'shop_hub_blog_title',
		'type'            => 'text',
		'active_callback' => 'shop_hub_is_blog_section_enabled',
	)
);

// Blog Section - Section Text.
$wp_customize->add_setting(
	'shop_hub_blog_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shop_hub_blog_text',
	array(
		'label'           => esc_html__( 'Section Text', 'shop-hub' ),
		'section'         => 'shop_hub_blog_section',
		'settings'        => 'shop_hub_blog_text',
		'type'            => 'text',
		'active_callback' => 'shop_hub_is_blog_section_enabled',
	)
);

// Blog Section - Content Type.
$wp_customize->add_setting(
	'shop_hub_blog_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'shop_hub_sanitize_select',
	)
);

$wp_customize->add_control(
	'shop_hub_blog_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'shop-hub' ),
		'section'         => 'shop_hub_blog_section',
		'settings'        => 'shop_hub_blog_content_type',
		'type'            => 'select',
		'active_callback' => 'shop_hub_is_blog_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'shop-hub' ),
			'category' => esc_html__( 'Category', 'shop-hub' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {
	// Blog Section - Select Post.
	$wp_customize->add_setting(
		'shop_hub_blog_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'shop_hub_blog_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'shop-hub' ), $i ),
			'section'         => 'shop_hub_blog_section',
			'settings'        => 'shop_hub_blog_content_post_' . $i,
			'type'            => 'select',
			'active_callback' => 'shop_hub_is_blog_section_and_content_type_post_enabled',
			'choices'         => shop_hub_get_post_choices(),
		)
	);

}

// Blog Section - Select Category.
$wp_customize->add_setting(
	'shop_hub_blog_content_category',
	array(
		'sanitize_callback' => 'shop_hub_sanitize_select',
	)
);

$wp_customize->add_control(
	'shop_hub_blog_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'shop-hub' ),
		'section'         => 'shop_hub_blog_section',
		'settings'        => 'shop_hub_blog_content_category',
		'active_callback' => 'shop_hub_is_blog_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => shop_hub_get_post_cat_choices(),
	)
);

// Blog Section - Button Label.
$wp_customize->add_setting(
	'shop_hub_blog_button_label',
	array(
		'default'           => __( 'View All', 'shop-hub' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shop_hub_blog_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'shop-hub' ),
		'section'         => 'shop_hub_blog_section',
		'settings'        => 'shop_hub_blog_button_label',
		'type'            => 'text',
		'active_callback' => 'shop_hub_is_blog_section_enabled',
	)
);

// Blog Section - Button Link.
$wp_customize->add_setting(
	'shop_hub_blog_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'shop_hub_blog_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'shop-hub' ),
		'section'         => 'shop_hub_blog_section',
		'settings'        => 'shop_hub_blog_button_link',
		'type'            => 'url',
		'active_callback' => 'shop_hub_is_blog_section_enabled',
	)
);
