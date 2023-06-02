<?php
if ( ! get_theme_mod( 'shop_hub_enable_cta_section', false ) ) {
	return;
}

$section_content                     = array();
$section_content['subtitle']         = get_theme_mod( 'shop_hub_cta_subtitle' );
$section_content['title']            = get_theme_mod( 'shop_hub_cta_title' );
$section_content['content']          = get_theme_mod( 'shop_hub_cta_content' );
$section_content['background_image'] = get_theme_mod( 'shop_hub_cta_background_image' );
$section_content['background_color'] = get_theme_mod( 'shop_hub_cta_background_color', '#000000' );
$section_content['button_label']     = get_theme_mod( 'shop_hub_cta_button_label' );
$section_content['button_link']      = get_theme_mod( 'shop_hub_cta_button_link' );
$section_content['button_link']      = ! empty( $section_content['button_link'] ) ? $section_content['button_link'] : '#';

$section_content = apply_filters( 'shop_hub_cta_section_content', $section_content );

shop_hub_render_cta_section( $section_content );

/**
 * Render cta section
 */
function shop_hub_render_cta_section( $section_content ) {
	$cta_image       = ! empty( $section_content['background_image'] ) ? 'has-cta-image' : '';
	$section_overlay = get_theme_mod( 'shop_hub_enable_cta_section_overlay', true ) === true ? 'section-overlay' : 'section-no-overlay';
	$text_dark       = get_theme_mod( 'shop_hub_enable_cta_section_text_dark', false ) === true ? 'text-dark' : 'text-light';
	$classes         = implode( ' ', array( $cta_image, $section_overlay, $text_dark ) );

	$style_attr = '';
	if ( ! empty( $section_content['background_image'] ) ) {
		$style_attr = 'background-image: url(' . $section_content['background_image'] . ');';
	}

	?>
	<section id="shop_hub_cta_section" class="shop-hub-frontpage-section shop-hub-cta-section section-has-background default-style cta-section-medium fixed-background <?php echo esc_attr( $classes ); ?>" style="<?php echo esc_attr( $style_attr ); ?>;">
		<?php
		if ( is_customize_preview() ) :
			shop_hub_section_link( 'shop_hub_cta_section' );
		endif;
		?>
		<div class="ascendoor-wrapper" >
			<div class="shop-hub-cta-wrapper">
				<div class="shop-hub-cta-text">
					<h4 class="shop-hub-cta-subhead"><?php echo esc_html( $section_content['subtitle'] ); ?></h4>
					<h3 class="shop-hub-cta-head"><?php echo esc_html( $section_content['title'] ); ?></h3>
					<p><?php echo wp_kses_post( $section_content['content'] ); ?></p>
				</div>
				<div class="shop-hub-cta-details">
					<?php if ( ! empty( $section_content['button_label'] ) ) { ?>
						<div class="shop-hub-cta-button">
							<a class="shop-hub-button shop-hub-button-alternate" href="<?php echo esc_url( $section_content['button_link'] ); ?>"><?php echo esc_html( $section_content['button_label'] ); ?></a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
	<?php
}
