<?php
/**
 * Shop Hub Theme Customizer
 *
 * @package Shop_Hub
 */

// Sanitize callback.
require get_template_directory() . '/inc/customizer/sanitize-callback.php';

// Active Callback.
require get_template_directory() . '/inc/customizer/active-callback.php';

// Custom Controls.
require get_template_directory() . '/inc/customizer/custom-controls/custom-controls.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function shop_hub_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'shop_hub_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'shop_hub_customize_partial_blogdescription',
			)
		);
	}

	// Upsell Section.
	$wp_customize->add_section(
		new Shop_Hub_Upsell_Section(
			$wp_customize,
			'upsell_section',
			array(
				'title'            => __( 'Shop Hub Pro', 'shop-hub' ),
				'button_text'      => __( 'Buy Pro', 'shop-hub' ),
				'url'              => 'https://ascendoor.com/themes/shop-hub-pro/',
				'background_color' => '#f46f46',
				'text_color'       => '#fff',
				'priority'         => 0,
			)
		)
	);

	// Homepage Settings - Enable Homepage Content.
	$wp_customize->add_setting(
		'shop_hub_enable_frontpage_content',
		array(
			'default'           => false,
			'sanitize_callback' => 'shop_hub_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'shop_hub_enable_frontpage_content',
		array(
			'label'           => esc_html__( 'Enable Homepage Content', 'shop-hub' ),
			'description'     => esc_html__( 'Check to enable content on static homepage.', 'shop-hub' ),
			'section'         => 'static_front_page',
			'type'            => 'checkbox',
			'active_callback' => 'shop_hub_is_static_homepage_enabled',
		)
	);

	// Theme Options.
	require get_template_directory() . '/inc/customizer/theme-options.php';

	// Front Page Options.
	require get_template_directory() . '/inc/customizer/front-page-options.php';
}
add_action( 'customize_register', 'shop_hub_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function shop_hub_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function shop_hub_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function shop_hub_customize_preview_js() {
	wp_enqueue_script( 'shop-hub-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), SHOP_HUB_VERSION, true );
}
add_action( 'customize_preview_init', 'shop_hub_customize_preview_js' );

/**
 * Enqueue script for custom customize control.
 */
function shop_hub_custom_control_scripts() {

	wp_enqueue_style( 'shop-hub-custom-controls-css', get_template_directory_uri() . '/assets/css/custom-controls.css', array(), '1.0', 'all' );
	wp_enqueue_script( 'shop-hub-custom-controls-js', get_template_directory_uri() . '/assets/js/custom-controls.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'shop_hub_custom_control_scripts' );
