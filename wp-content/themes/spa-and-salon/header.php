<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Spa_and_Salon
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head itemscope itemtype="https://schema.org/WebSite">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">
	<?php wp_body_open(); ?>
    
    <div class="mobile-nav">
		<button class="toggle-button" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".close-main-nav-toggle">
			<span class="toggle-bar"></span>
			<span class="toggle-bar"></span>
			<span class="toggle-bar"></span>
		</button>
		<div class="mobile-nav-wrap">
			<nav class="main-navigation" id="mobile-navigation"  role="navigation">
				<div class="primary-menu-list main-menu-modal cover-modal" data-modal-target-string=".main-menu-modal">
		            <button class="close close-main-nav-toggle" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".main-menu-modal"></button>
		            <div class="mobile-menu" aria-label="<?php esc_attr_e( 'Mobile', 'spa-and-salon' ); ?>">
		                <?php
		                    wp_nav_menu( array(
		                        'theme_location' => 'primary',
		                        'menu_id'        => 'mobile-primary-menu',
		                        'menu_class'     => 'nav-menu main-menu-modal',
		                    ) );
		                ?>
		            </div>
		        </div>
			</nav><!-- #site-navigation -->
		</div>
	</div>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#acc-content"><?php esc_html_e( 'Skip to content (Press Enter)', 'spa-and-salon' ); ?></a>
		
		<?php 
		/**
		 * Spa_And_Salon Header
		 * 
		 * @hooked spa_and_salon_header - 20     
		*/
		do_action( 'spa_and_salon_header' );
		
		if( !( is_front_page() || is_page_template( 'template-home.php' ) || is_404() ) ){ ?>
			<div class="breadcrumbs">
				<div class="container">
					<?php do_action( 'spa_and_salon_breadcrumbs' ); ?>
				</div>
			</div>
		<?php } 
		echo '<div id="acc-content"><!-- done for accessiblity purpose -->';
		$enabled_sections = spa_and_salon_get_sections();
		if( is_home() || ! $enabled_sections || ! ( is_front_page()  || is_page_template( 'template-home.php' ) ) ) {
			echo '<div class="wrapper">';
			echo '<div class="container">';
			echo '<div id="content" class="site-content">';

			if( is_search() ){ echo '<div class="row">'; }
		}
