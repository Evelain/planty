<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Shop_Hub
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'shop-hub' ); ?></a>
		<div id="loader">
			<div class="loader-container">
				<div id="preloader">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/loader/style-2.gif' ); ?>">
				</div>
			</div>
		</div><!-- #loader -->

		<header id="masthead" class="site-header header-style-1">
			<div class="ascendoor-header">
				<div class="ascendoor-wrapper">
					<div class="ascendoor-header-wrapper">
						<div class="header-left-part">
							<div class="site-branding">
								<?php
								the_custom_logo();
								if ( is_front_page() && is_home() ) :
									?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
									<?php
								else :
									?>
									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
									<?php
								endif;
								$shop_hub_description = get_bloginfo( 'description', 'display' );
								if ( $shop_hub_description || is_customize_preview() ) :
									?>
									<p class="site-description"><?php echo $shop_hub_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
								<?php endif; ?>
							</div><!-- .site-branding -->
						</div>
						<div class="header-middle-part">
							<div class="navigation-part">
								<nav id="site-navigation" class="main-navigation">
									<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
										<span></span>
										<span></span>
										<span></span>
									</button>
									<div class="main-navigation-links">
										<?php
										if ( has_nav_menu( 'primary' ) ) {
											wp_nav_menu(
												array(
													'theme_location' => 'primary',
												)
											);
										}
										?>
									</div>
								</nav><!-- #site-navigation -->
							</div>
						</div>	
						<div class="header-right-part">
							<?php if ( class_exists( 'WooCommerce' ) ) { ?>
								<div class="cart-part">
									<div class="header-cart">
										<?php shop_hub_woocommerce_header_cart(); ?>
									</div>
									<div class="header-user">
										<a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>" title="<?php esc_attr_e( 'Account', 'shop-hub' ); ?>"></a>
									</div>
									<?php if ( class_exists( 'YITH_WCWL' ) ) { ?>
										<div class="header-wishlist">
											<a href="<?php echo esc_url( YITH_WCWL()->get_wishlist_url() ); ?>" title="<?php esc_attr_e( 'View your wishlist', 'shop-hub' ); ?>"></a>
										</div>
									<?php } ?>
								</div>
							<?php } ?>
							<div class="header-search">
								<div class="header-search-wrap">
									<a href="#" title="Search" class="header-search-icon">
										<i class="fa fa-search"></i>
									</a>
									<div class="header-search-form">
										<?php
										if ( class_exists( 'WooCommerce' ) ) {
											get_product_search_form();
										} else {
											get_search_form();
										}
										?>
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</header><!-- #masthead -->

	<?php
	if ( ! is_front_page() || is_home() ) {
		?>
		<div id="content" class="site-content ascendoor-wrapper">
			<div class="ascendoor-page">
			<?php } ?>
