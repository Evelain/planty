<?php
if ( ! class_exists( 'WooCommerce' ) || ! get_theme_mod( 'shop_hub_enable_product_section', false ) ) {
	return;
}

$content_type = get_theme_mod( 'shop_hub_product_content_type', 'product' );

switch ( $content_type ) {
	case 'product':
		$product_ids = array();

		for ( $i = 1; $i <= 8; $i++ ) {
			$item_id = get_theme_mod( 'shop_hub_product_content_product_' . $i );
			if ( ! empty( $item_id ) ) {
				$product_ids[] = $item_id;
			}
		}

		$product_shortcode = '[products limit="' . 8 . '" columns="' . 4 . '" ids="' . implode( ',', $product_ids ) . '" visibility="visible"]';
		break;

	case 'product_cat':
		$product_cat_id = get_theme_mod( 'shop_hub_product_content_category' );

		$product_term = get_term_by( 'id', $product_cat_id, 'product_cat' );

		$product_shortcode = '[products limit="' . 8 . '" columns="' . 4 . '" category="' . $product_term->slug . '" visibility="visible"]';
		break;

	default:
		break;
}

shop_hub_render_product_section( $product_shortcode );

/**
 * Render product section
 */
function shop_hub_render_product_section( $product_shortcode ) {
	$section_title = get_theme_mod( 'shop_hub_product_title', __( 'Our Products', 'shop-hub' ) );
	$section_text  = get_theme_mod( 'shop_hub_product_text' );
	$button_label  = get_theme_mod( 'shop_hub_product_button_label', __( 'View all', 'shop-hub' ) );
	$button_link   = get_theme_mod( 'shop_hub_product_button_link' );
	$button_link   = ! empty( $button_link ) ? $button_link : '#';
	?>
	<section id="shop_hub_product_section" class="shop-hub-frontpage-section shop-hubduct-grid-one-section">
		<?php
		if ( is_customize_preview() ) :
			shop_hub_section_link( 'shop_hub_product_section' );
		endif;
		?>
		<div class="ascendoor-wrapper">
			<?php if ( ! empty( $section_title || $section_text ) ) : ?>
				<div class="section-header-subtitle">
					<h3 class="section-title"><?php echo esc_html( $section_title ); ?></h3>
					<p class="section-subtitle"><?php echo esc_html( $section_text ); ?></p>
				</div>
			<?php endif; ?>
			<div class="shop-hub-section-body">
				<div class="shop-hubduct-grid-one-section-wrapper">
					<?php echo do_shortcode( $product_shortcode ); ?> 
				</div>
			</div>
			<?php if ( ! empty( $button_label ) ) { ?>
				<div class="bottom-viewall-button">
					<a class="shop-hub-button" href="<?php echo esc_url( $button_link ); ?>"><?php echo esc_html( $button_label ); ?></a>
				</div>
			<?php } ?>
		</div>
	</section>
	<?php
}
