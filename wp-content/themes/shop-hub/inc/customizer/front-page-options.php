<?php
/**
 * Front Page Options
 *
 * @package Shop_Hub
 */

$wp_customize->add_panel(
	'shop_hub_front_page_options',
	array(
		'title'    => esc_html__( 'Front Page Options', 'shop-hub' ),
		'priority' => 130,
	)
);

// Banner Section.
require get_template_directory() . '/inc/customizer/front-page-options/banner.php';

// Service Section.
require get_template_directory() . '/inc/customizer/front-page-options/services.php';

// Categories Section.
require get_template_directory() . '/inc/customizer/front-page-options/categories.php';

// Products Section.
require get_template_directory() . '/inc/customizer/front-page-options/product.php';

// Full Promo Section.
require get_template_directory() . '/inc/customizer/front-page-options/full-promo.php';

// Featured Product Section.
require get_template_directory() . '/inc/customizer/front-page-options/featured-product.php';

// Blog Section.
require get_template_directory() . '/inc/customizer/front-page-options/blog.php';

// CTA Section.
require get_template_directory() . '/inc/customizer/front-page-options/cta.php';
