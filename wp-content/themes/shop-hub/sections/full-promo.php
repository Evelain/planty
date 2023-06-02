<?php
if ( ! get_theme_mod( 'shop_hub_enable_full_promo_section', false ) ) {
	return;
}
?>
<section id="shop_hub_full_promo_section" class="shop-hub-frontpage-section shop-hub-deals-section section-has-background no-section-padding">
	<?php
	if ( is_customize_preview() ) :
		shop_hub_section_link( 'shop_hub_full_promo_section' );
	endif;
	?>
	<div class="shop-hub-section-body">
		<div class="shop-hub-deals-section-wrapper">
			<?php
			for ( $i = 1; $i <= 2; $i++ ) {
				$full_promo_title     = get_theme_mod( 'shop_hub_full_promo_title_' . $i, '' );
				$full_promo_content   = get_theme_mod( 'shop_hub_full_promo_content_' . $i, '' );
				$full_promo_bg_url    = get_theme_mod( 'shop_hub_full_promo_background_image_' . $i, '' );
				$full_promo_btn_label = get_theme_mod( 'shop_hub_full_promo_button_label_' . $i, '' );
				$full_promo_btn_link  = get_theme_mod( 'shop_hub_full_promo_link_' . $i, '' );
				$full_promo_overlay   = get_theme_mod( 'shop_hub_enable_full_promo_overlay_' . $i, true ) === true ? 'has-overlay' : '';
				$text_dark            = get_theme_mod( 'shop_hub_enable_full_promo_dark_content_' . $i, false ) === true ? 'text-dark' : 'text-light';
				$classes              = implode( ' ', array( $full_promo_overlay, $text_dark ) );

				if ( ! empty( $full_promo_title || $full_promo_content || $full_promo_bg_url || $full_promo_btn_label || $full_promo_btn_link ) ) {

					?>
					<div class="shop-hub-deals-single <?php echo esc_attr( $classes ); ?>">
						<?php if ( ! empty( $full_promo_bg_url ) ) { ?>
							<div class="shop-hub-deals-img">
								<img src="<?php echo esc_url( $full_promo_bg_url ); ?>" alt="<?php echo esc_attr( $full_promo_title ); ?>">
								<a class="promo-link" href="<?php echo esc_url( $full_promo_btn_link ); ?>"><?php echo esc_html( $full_promo_btn_label ); ?></a>
							</div>
						<?php } ?>
						<div class="shop-hub-deals-detail">
							<h3 class="shop-hub-deals-title"><?php echo esc_html( $full_promo_title ); ?></h3>
							<h4 class="shop-hub-deals-sub-title"><?php echo esc_html( $full_promo_content ); ?></h4>
							<?php if ( ! empty( $full_promo_btn_label ) ) { ?>
								<div class="promo-button">
									<a class="shop-hub-button" href="<?php echo esc_url( $full_promo_btn_link ); ?>"><?php echo esc_html( $full_promo_btn_label ); ?></a>
								</div>
							<?php } ?>
						</div>
					</div>
					<?php
				}
			}
			?>
		</div>
	</div>
</section>
