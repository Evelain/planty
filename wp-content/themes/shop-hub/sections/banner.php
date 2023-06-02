<?php

if ( ! get_theme_mod( 'shop_hub_enable_banner_section', false ) ) {
	return;
}

$content_ids = $btn_label = $btn_link = $section_content = array();

$content_type = get_theme_mod( 'shop_hub_banner_content', 'post' );

if ( ! in_array( $content_type, array( 'post', 'product' ) ) ) {
	return;
}

for ( $i = 1; $i <= 3; $i++ ) {
	$content_ids[] = get_theme_mod( 'shop_hub_banner_content_' . $content_type . '_' . $i );
}

$args = array(
	'post_type'           => $content_type,
	'post__in'            => array_filter( $content_ids ),
	'orderby'             => 'post__in',
	'posts_per_page'      => absint( 3 ),
	'ignore_sticky_posts' => true,
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) :
	while ( $query->have_posts() ) :
		$query->the_post();
		$section_content[] = array(
			'id'            => get_the_ID(),
			'title'         => get_the_title(),
			'content'       => wp_trim_words( get_the_content(), 20 ),
			'permalink'     => get_the_permalink(),
			'thumbnail_url' => get_the_post_thumbnail_url( get_the_ID(), 'full' ),
		);
	endwhile;
	wp_reset_postdata();

	$section_content = apply_filters( 'shop_hub_banner_section_content', $section_content );

	shop_hub_render_banner_section( $section_content );
endif;

/**
 * Render Banner Section
 */
function shop_hub_render_banner_section( $section_content ) {
	if ( empty( $section_content ) ) {
		return;
	}

	$banner_overlay = get_theme_mod( 'shop_hub_enable_banner_overlay', true ) === true ? 'banner-overlay' : '';
	$text_dark      = get_theme_mod( 'shop_hub_enable_dark_content', false ) === true ? 'text-dark' : 'text-light';
	$classes        = implode( ' ', array( $banner_overlay, $text_dark ) );

	?>

	<section id="shop_hub_banner_section" class="shop-hub-main-banner-section banner-style-1 section-left <?php echo esc_attr( $classes ); ?>">
		<?php
		if ( is_customize_preview() ) :
			shop_hub_section_link( 'shop_hub_banner_section' );
		endif;
		?>
		<div class="main-slider ascendoor-carousel-navigation" data-slick='{"autoplay": false }'>
			<?php
			$i = 1;
			foreach ( $section_content as $content ) {
				$button_label = get_theme_mod( 'shop_hub_banner_button_label' . $i, __( 'Shop Now', 'shop-hub' ) );
				$button_url   = get_theme_mod( 'shop_hub_banner_button_link' . $i, '' );
				$button_url   = $button_url ? $button_url : $content['permalink'];
				$video_url    = get_theme_mod( 'shop_hub_banner_video_link' . $i, '' );
				?>
				<div class="shop-hub-banner-slider-single">
					<div class="shop-hub-banner-slider-img">
						<?php if ( ! empty( $content['thumbnail_url'] ) ) { ?>
							<img src="<?php echo esc_url( $content['thumbnail_url'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
						<?php } ?>
					</div>
					<div class="shop-hub-banner-slider-detail">
						<div class="ascendoor-wrapper">
							<div class="shop-hub-banner-slider-detail-inside">
								<h3 class="shop-hub-banner-head-title"><?php echo esc_html( $content['title'] ); ?></h3>
								<p><?php echo wp_kses_post( $content['content'] ); ?></p>
								<div class="banner-slider-btn">
									<?php if ( ! empty( $button_label ) ) { ?>
										<a class="shop-hub-button" href="<?php echo esc_url( $button_url ); ?>"><?php echo esc_html( $button_label ); ?></a>
										<?php
									}
									if ( ! empty( $video_url ) ) {
										?>
										<a href="<?php echo esc_url( $video_url ); ?>" class="shop-hub-button shop-hub-video-popup shop-hub-play-btn"><i class="fas fa-play"></i></a>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
				$i++;
			}
			?>
		</div>
	</section>

	<?php
}
