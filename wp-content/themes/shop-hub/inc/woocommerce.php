<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Shop_Hub
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function shop_hub_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			'product_grid' => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'shop_hub_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function shop_hub_woocommerce_scripts() {
	wp_enqueue_style( 'shop-hub-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), SHOP_HUB_VERSION );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
		font-family: "star";
		src: url("' . $font_path . 'star.eot");
		src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
		url("' . $font_path . 'star.woff") format("woff"),
		url("' . $font_path . 'star.ttf") format("truetype"),
		url("' . $font_path . 'star.svg#star") format("svg");
		font-weight: normal;
		font-style: normal;
	}';

	wp_add_inline_style( 'shop-hub-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'shop_hub_woocommerce_scripts' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function shop_hub_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'shop_hub_woocommerce_active_body_class' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function shop_hub_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'shop_hub_woocommerce_related_products_args' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'shop_hub_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function shop_hub_woocommerce_wrapper_before() {
		?>
		<main id="primary" class="site-main">
			<?php
	}
}
	add_action( 'woocommerce_before_main_content', 'shop_hub_woocommerce_wrapper_before' );

if ( ! function_exists( 'woocommerce_breadcrumb' ) ) {
	function woocommerce_breadcrumb() {
		do_action( 'shop_hub_breadcrumb' );
	}
}

if ( ! function_exists( 'shop_hub_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function shop_hub_woocommerce_wrapper_after() {
		?>
	</main><!-- #main -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'shop_hub_woocommerce_wrapper_after' );

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

if ( ! function_exists( 'shop_hub_woocommerce_sidebar' ) ) {

	function shop_hub_woocommerce_sidebar() {
		if ( shop_hub_is_sidebar_enabled() ) {
			get_sidebar();
		}
	}
}
add_action( 'woocommerce_sidebar', 'shop_hub_woocommerce_sidebar' );

if ( ! function_exists( 'shop_hub_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function shop_hub_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		shop_hub_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'shop_hub_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'shop_hub_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function shop_hub_woocommerce_cart_link() {
		?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'shop-hub' ); ?>">
			<?php
			$item_count_text = WC()->cart->get_cart_contents_count();
			?>
			<span class="cart-icon"><i class="fas fa-shopping-cart"></i><span class="count"><?php echo esc_html( $item_count_text ); ?></span></span> 
		</a>
		<?php
	}
}

if ( ! function_exists( 'shop_hub_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function shop_hub_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php shop_hub_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}

if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {

	/**
	 * Get the product thumbnail, or the placeholder if not set.
	 *
	 * @param string $size (default: 'woocommerce_thumbnail').
	 * @param  array  $attr Image attributes.
	 * @param  bool   $placeholder True to return $placeholder if no image is found, or false to return an empty string.
	 * @return string
	 */
	function woocommerce_get_product_thumbnail( $size = 'posts-thumbnail', $attr = array(), $placeholder = true ) {
		global $product;

		if ( ! is_array( $attr ) ) {
			$attr = array();
		}

		if ( ! is_bool( $placeholder ) ) {
			$placeholder = true;
		}

		$image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );

		return $product ? $product->get_image( $image_size, $attr, $placeholder ) : '';
	}
}

function shop_hubducts_gallery_thumbnail() {
	global $product;
	$attachment_ids = $product->get_gallery_image_ids();
	if ( $attachment_ids ) {
		$i = 1;
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $i == 1 ) {
				$image_link = wp_get_attachment_image_src( $attachment_id, 'posts-thumbnail' );
				?>
				<div class="product-gallery-image">
					<img src="<?php echo esc_url( $image_link[0] ); ?>">
				</div>
				<?php
			}
			$i++; }
	}
}
	add_action( 'woocommerce_before_shop_loop_item_title', 'shop_hubducts_gallery_thumbnail', 10 );

	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

	add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 5 );
	add_action( 'woocommerce_shop_loop_item_title', 'shop_hub_woocommerce_template_loop_product_link_open_after', 9 );
	add_action( 'woocommerce_shop_loop_item_title', 'shop_hub_woocommerce_template_loop_product_title_before', 9 );
	// add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_rating', 9 );

function shop_hub_get_star_rating() {
	global $product;
	$average = $product->get_average_rating();

	echo '<div class="star-rating"><span style="width:' . ( ( $average / 5 ) * 100 ) . '%"><strong class="rating">' . $average . '</strong></span></div>';
}
	add_action( 'woocommerce_shop_loop_item_title', 'shop_hub_get_star_rating', 9 );

	add_action( 'woocommerce_before_shop_loop_item', 'shop_hub_woocommerce_template_loop_product_link_open_before', 9 );
	add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
	add_action( 'woocommerce_shop_loop_item_title', 'shop_hub_woocommerce_template_loop_add_to_cart_before', 11 );
	add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 11 );
if ( class_exists( 'YITH_WCWL' ) ) {
	// Wishlist.
	$yith_wcwl_frontend = YITH_WCWL_Frontend();
	remove_action( 'woocommerce_after_shop_loop_item', array( $yith_wcwl_frontend, 'print_button' ), 15 );
	add_action( 'woocommerce_shop_loop_item_title', array( $yith_wcwl_frontend, 'print_button' ), 11 );

}
	add_action( 'woocommerce_shop_loop_item_title', 'shop_hub_woocommerce_template_loop_add_to_cart_after', 11 );

function shop_hub_woocommerce_template_loop_product_link_open_before() {
	?>
		<div class="shop-hubduct-image">
		<?php
}

function shop_hub_woocommerce_template_loop_add_to_cart_before() {
	?>
			<div class="shop-hub-add-to-cart-wrapper">
		<?php
}
function shop_hub_woocommerce_template_loop_add_to_cart_after() {
	?>
			</div><!-- .shop-hub-add-to-cart-wrapper -->
	<?php
}
function shop_hub_woocommerce_template_loop_product_link_open_after() {
	?>
		</div><!-- .shop-hubduct-image -->
	<?php
}
function shop_hub_woocommerce_template_loop_product_title_before() {
	?>
		<div class="shop-hubduct-description">
		<?php
}

function shop_hub_woocommerce_template_loop_product_title_after() {
	?>
		</div><!-- .shop-hubduct-description -->
	<?php
}

function shop_hub_yith_quick_view_hooks() {
	add_action( 'woocommerce_shop_loop_item_title', 'shop_hub_woocommerce_template_loop_additional_button_before', 8 );

	if ( class_exists( 'YITH_WCQV' ) ) {
		// Quick View.
		$yith_wcqv_frontend = YITH_WCQV_Frontend();
		remove_action( 'woocommerce_after_shop_loop_item', array( $yith_wcqv_frontend, 'yith_add_quick_view_button' ), 15 );
		add_action( 'woocommerce_shop_loop_item_title', array( $yith_wcqv_frontend, 'yith_add_quick_view_button' ), 8 );
	}

	add_action( 'woocommerce_shop_loop_item_title', 'shop_hub_woocommerce_template_loop_additional_button_after', 8 );
}
	add_action( 'init', 'shop_hub_yith_quick_view_hooks', 15 );

function shop_hub_woocommerce_template_loop_additional_button_before() {
	?>
		<div class="additional-button-wrapper">
		<?php
}
function shop_hub_woocommerce_template_loop_additional_button_after() {
	?>
		</div><!-- .additional-button-wrapper -->
	<?php
}
