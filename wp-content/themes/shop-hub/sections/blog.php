<?php

if ( ! get_theme_mod( 'shop_hub_enable_blog_section', false ) ) {
	return;
}

$content_type = get_theme_mod( 'shop_hub_blog_content_type', 'post' );

$content_ids = $section_content = array();

if ( $content_type === 'post' ) {

	for ( $i = 1; $i <= 3; $i++ ) {
		$content_ids[] = get_theme_mod( 'shop_hub_blog_content_post_' . $i );
	}

	$args = array(
		'post_type'      => 'post',
		'post__in'       => array_filter( $content_ids ),
		'orderby'        => 'post__in',
		'posts_per_page' => absint( 3 ),
	);

} else {

	$cat_content_id = get_theme_mod( 'shop_hub_blog_content_category' );
	$args           = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 3 ),
	);
}

$query = new WP_Query( $args );
if ( $query->have_posts() ) :
	while ( $query->have_posts() ) :
		$query->the_post();
		$section_content[] = array(
			'id'            => get_the_ID(),
			'title'         => get_the_title(),
			'permalink'     => get_the_permalink(),
			'date'          => get_the_date(),
			'thumbnail_url' => get_the_post_thumbnail_url( get_the_ID(), 'full' ),
		);
	endwhile;
	wp_reset_postdata();

	$section_content = apply_filters( 'shop_hub_blog_section_content', $section_content );

	shop_hub_render_blog_section( $section_content );
endif;

/**
 * Render blog section
 */
function shop_hub_render_blog_section( $section_content ) {
	if ( empty( $section_content ) ) {
		return;
	}
	$blog_title        = get_theme_mod( 'shop_hub_blog_title', __( 'Blogs', 'shop-hub' ) );
	$blog_text         = get_theme_mod( 'shop_hub_blog_text' );
	$blog_button_label = get_theme_mod( 'shop_hub_blog_button_label', __( 'View All', 'shop-hub' ) );
	$blog_button_link  = get_theme_mod( 'shop_hub_blog_button_link' );
	$blog_button_link  = ! empty( $blog_button_link ) ? $blog_button_link : '#';
	?>
	<section id="shop_hub_blog_section" class="shop-hub-frontpage-section shop-hub-blog-section blog-style-2">
		<?php
		if ( is_customize_preview() ) :
			shop_hub_section_link( 'shop_hub_blog_section' );
		endif;
		?>
		<div class="ascendoor-wrapper">
			<?php if ( ! empty( $blog_title || $blog_text ) ) : ?>
				<div class="section-header-subtitle">
					<h3 class="section-title"><?php echo esc_html( $blog_title ); ?></h3>
					<p class="section-subtitle"><?php echo esc_html( $blog_text ); ?></p>
				</div>
			<?php endif; ?>
			<div class="shop-hub-section-body">
				<div class="shop-hub-blog-section-wrapper">
					<?php foreach ( $section_content as $content ) { ?>
						<div class="shop-hub-blog-single">
							<div class="shop-hub-blog-img">
								<a href="<?php echo esc_url( $content['permalink'] ); ?>">
									<img src="<?php echo esc_url( $content['thumbnail_url'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
								</a>
							</div>
							<div class="shop-hub-detail">
								<div class="shop-blog-category">
									<?php echo get_the_category_list( ', ', '', $content['id'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
								</div>
								<h3 class="shop-hub-blog-title">
									<a href="<?php echo esc_url( $content['permalink'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a>
								</h3>
								<div class="shop-hub-meta">
									<?php echo esc_html( $content['date'] ); ?>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
				<?php if ( ! empty( $blog_button_label ) ) : ?>
					<div class="shop-hub-blog-view-all ">
						<a class="shop-hub-button" href="<?php echo esc_url( $blog_button_link ); ?>"><?php echo esc_html( $blog_button_label ); ?></a>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<?php
}
