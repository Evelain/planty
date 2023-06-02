<?php
if ( ! get_theme_mod( 'shop_hub_enable_categories_section', false ) ) {
	return;
}
$section_content = array();

$section_content['title']    = get_theme_mod( 'shop_hub_categories_title', __( 'Product Categories', 'shop-hub' ) );
$section_content['text']     = get_theme_mod( 'shop_hub_categories_text', '' );
$section_content['taxonomy'] = get_theme_mod( 'shop_hub_taxonomy_name', 'product_cat' );

$section_content = apply_filters( 'shop_hub_categories_section_content', $section_content );

shop_hub_render_categories_section( $section_content );

/**
 * Render categories section.
 */
function shop_hub_render_categories_section( $section_content ) {

	for ( $i = 1; $i <= 4; $i++ ) {
		$item_id      = get_theme_mod( 'shop_hub_categories_content_' . $section_content['taxonomy'] . '_' . $i );
		$content_id[] = $item_id;
		if ( 'product_cat' !== $section_content['taxonomy'] ) {
			$cat_image[ $item_id ] = get_theme_mod( 'shop_hub_categories_image_' . $i );
		}
	}

	$args = array(
		'taxonomy'   => $section_content['taxonomy'],
		'include'    => (array) $content_id,
		'orderby'    => 'include',
		'order'      => 'asc',
		'hide_empty' => false,
		'number'     => 4,
	);

	$terms = get_terms( $args );
	?>
	<section id="shop_hub_categories_section" class="shop-hub-frontpage-section shop-hub-categories-section categories-style-1 categories-column-4">
		<?php
		if ( is_customize_preview() ) :
			shop_hub_section_link( 'shop_hub_categories_section' );
		endif;
		?>
		<div class="ascendoor-wrapper">
			<?php if ( ! empty( $section_content['title'] || $section_content['text'] ) ) { ?>
				<div class="section-header-subtitle">
					<h3 class="section-title"><?php echo esc_html( $section_content['title'] ); ?></h3>
					<p class="section-subtitle"><?php echo esc_html( $section_content['text'] ); ?></p>
				</div>
				<?php
			}

			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
				?>
				<div class="shop-hub-section-body">
					<div class="shop-hub-categories-section-wrapper ascendoor-carousel-navigation">
						<?php
						$i = 0;
						foreach ( $terms as $value ) {
							$term_link   = get_term_link( $value, $section_content['taxonomy'] );
							$posts_count = $value->count;
							$items       = ( $posts_count <= 1 ) ? 'item' : 'items';
							$item_count  = implode( ' ', array( $posts_count, $items ) );
							?>
							<div class="carousel-item">
								<div class="shop-hub-categories-single">
									<div class="shop-hub-categories-img">
										<?php if ( 'product_cat' === $section_content['taxonomy'] && ! empty( wp_get_attachment_url( get_term_meta( $value->term_id, 'thumbnail_id', true ) ) ) ) { ?>
											<img src="<?php echo esc_url( wp_get_attachment_url( get_term_meta( $value->term_id, 'thumbnail_id', true ) ) ); ?>" alt="<?php echo esc_attr( $value->name ); ?>">
										<?php } elseif ( ! empty( $cat_image[ $value->term_id ] ) ) { ?>
											<img src="<?php echo esc_url( $cat_image[ $value->term_id ] ); ?>" alt="<?php echo esc_attr( $value->name ); ?>">
										<?php } ?>
									</div>
									<div class="shop-hub-categories-detail">
										<h3 class="shop-hub-categories-title">
											<a href="<?php echo esc_url( $term_link ); ?>">
												<?php echo esc_html( $value->name ); ?>
											</a>
										</h3>
										<span class="shop-hub-categories-items"><?php echo esc_html( $item_count ); ?></span>
									</div>
								</div>
							</div>
							<?php
							$i++;
						}
						?>
					</div>
				</div>
			<?php } ?>
		</div>
	</section>
	<?php
}
