<?php
if ( ! get_theme_mod( 'shop_hub_enable_services_section', false ) ) {
	return;
}

$section_content          = array();
$section_content['title'] = get_theme_mod( 'shop_hub_services_title', '' );
$section_content['text']  = get_theme_mod( 'shop_hub_services_text', '' );

$section_content = apply_filters( 'shop_hub_services_section_content', $section_content );

shop_hub_render_services_section( $section_content );

/**
 * Render services section
 */
function shop_hub_render_services_section( $section_content ) {
	?>

	<section id="shop_hub_services_section" class="shop-hub-frontpage-section shop-hub-services-section section-grey-background section-has-background services-style-1">
		<?php
		if ( is_customize_preview() ) :
			shop_hub_section_link( 'shop_hub_services_section' );
		endif;
		?>
		<div class="ascendoor-wrapper">
			<?php if ( ! empty( $section_content['title'] || $section_content['text'] ) ) { ?>
				<div class="section-header-subtitle">
					<h3 class="section-title"><?php echo esc_html( $section_content['title'] ); ?></h3>
					<p class="section-subtitle"><?php echo esc_html( $section_content['text'] ); ?></p>
				</div>
			<?php } ?>
			<div class="shop-hub-section-body">
				<div class="shop-hub-services-section-wrapper">
					<?php
					for ( $i = 1; $i <= 3; $i++ ) {
						$icon        = get_theme_mod( 'shop_hub_services_icon_' . $i );
						$title       = get_theme_mod( 'shop_hub_services_title_' . $i );
						$title_url   = get_theme_mod( 'shop_hub_services_title_custom_link_' . $i, '#' );
						$description = get_theme_mod( 'shop_hub_services_short_description_' . $i );
						?>
						<div class="shop-hub-services-single">
							<?php if ( ! empty( $icon ) ) { ?>
								<div class="services-icon">
									<img src="<?php echo esc_url( $icon ); ?>" alt="<?php echo esc_attr( $title ); ?>">
								</div>
							<?php } ?>
							<div class="services-details">
								<?php if ( ! empty( $title ) ) { ?>
									<h3 class="services-title"><a href="<?php echo esc_url( $title_url ); ?>"><?php echo esc_html( $title ); ?></a></h3>
								<?php } ?>
								<?php if ( ! empty( $description ) ) { ?>
									<p class="services-details"><?php echo esc_html( $description ); ?></p>
								<?php } ?>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</section>

	<?php
}
