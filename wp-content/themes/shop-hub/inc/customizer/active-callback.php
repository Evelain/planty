<?php
/**
 * Active Callbacks
 *
 * @package Shop_Hub
 */

// Theme Options.
function shop_hub_is_pagination_enabled( $control ) {
	return ( $control->manager->get_setting( 'shop_hub_enable_pagination' )->value() );
}
function shop_hub_is_breadcrumb_enabled( $control ) {
	return ( $control->manager->get_setting( 'shop_hub_enable_breadcrumb' )->value() );
}

// Banner section.
function shop_hub_is_banner_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'shop_hub_enable_banner_section' )->value() );
}
function shop_hub_is_banner_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'shop_hub_banner_content' )->value();
	return ( shop_hub_is_banner_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function shop_hub_is_banner_section_and_content_type_product_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'shop_hub_banner_content' )->value();
	return ( shop_hub_is_banner_section_enabled( $control ) && ( 'product' === $content_type ) );
}

// Services section.
function shop_hub_is_services_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'shop_hub_enable_services_section' )->value() );
}

// Blog section.
function shop_hub_is_blog_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'shop_hub_enable_blog_section' )->value() );
}
function shop_hub_is_blog_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'shop_hub_blog_content_type' )->value();
	return ( shop_hub_is_blog_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function shop_hub_is_blog_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'shop_hub_blog_content_type' )->value();
	return ( shop_hub_is_blog_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Full Promo section.
function shop_hub_is_full_promo_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'shop_hub_enable_full_promo_section' )->value() );
}

// Categories Section.
function shop_hub_is_categories_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'shop_hub_enable_categories_section' )->value() );
}
function shop_hub_is_categories_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'shop_hub_taxonomy_name' )->value();
	return ( shop_hub_is_categories_section_enabled( $control ) && ( 'category' === $content_type ) );
}
function shop_hub_is_categories_section_and_content_type_product_cat_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'shop_hub_taxonomy_name' )->value();
	return ( shop_hub_is_categories_section_enabled( $control ) && ( 'product_cat' === $content_type ) );
}

// Product section.
function shop_hub_is_product_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'shop_hub_enable_product_section' )->value() );
}
function shop_hub_is_product_section_and_content_type_product_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'shop_hub_product_content_type' )->value();
	return ( shop_hub_is_product_section_enabled( $control ) && ( 'product' === $content_type ) );
}
function shop_hub_is_product_section_and_content_type_product_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'shop_hub_product_content_type' )->value();
	return ( shop_hub_is_product_section_enabled( $control ) && ( 'product_cat' === $content_type ) );
}

// CTA section.
function shop_hub_is_cta_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'shop_hub_enable_cta_section' )->value() );
}

// Featured Product Section.
function shop_hub_is_featured_product_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'shop_hub_enable_featured_product_section' )->value() );
}
function shop_hub_is_featured_product_section_and_content_type_product_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'shop_hub_featured_product_content_type' )->value();
	return ( shop_hub_is_featured_product_section_enabled( $control ) && ( 'product' === $content_type ) );
}
function shop_hub_is_featured_product_section_and_content_type_product_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'shop_hub_featured_product_content_type' )->value();
	return ( shop_hub_is_featured_product_section_enabled( $control ) && ( 'product_cat' === $content_type ) );
}
function shop_hub_is_featured_product_advertisement_enabled( $control ) {
	$ads_section = $control->manager->get_setting( 'shop_hub_enable_featured_product_ads_section' )->value();
	return ( shop_hub_is_featured_product_section_enabled( $control ) && ( true === $ads_section ) );
}

// Check if static home page is enabled.
function shop_hub_is_static_homepage_enabled( $control ) {
	return ( 'page' === $control->manager->get_setting( 'show_on_front' )->value() );
}
