<?php

/**
 * Dynamic CSS
 */
function shop_hub_dynamic_css() {

	$site_title_font       = get_theme_mod( 'shop_hub_site_title_font', 'Amarante' );
	$site_description_font = get_theme_mod( 'shop_hub_site_description_font', 'Crimson Text' );
	$header_font           = get_theme_mod( 'shop_hub_header_font', 'Amarante' );
	$body_font             = get_theme_mod( 'shop_hub_body_font', 'Lora' );

	$custom_css  = '';
	
	$custom_css .= '
    /* Typograhpy */
    :root {
        --font-heading: "' . esc_attr( $header_font ) . '", serif;
        --font-main: -apple-system, BlinkMacSystemFont,"' . esc_attr( $body_font ) . '", "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
    }

    body,
	button, input, select, optgroup, textarea {
        font-family: "' . esc_attr( $body_font ) . '", serif;
	}

	.site-title a {
        font-family: "' . esc_attr( $site_title_font ) . '", serif;
	}
    
	.site-description {
        font-family: "' . esc_attr( $site_description_font ) . '", serif;
	}
    ';

	wp_add_inline_style( 'shop-hub-style', $custom_css );

}
add_action( 'wp_enqueue_scripts', 'shop_hub_dynamic_css', 99 );
