<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Shop_Hub
 */

$post_sidebar = 'sidebar-1';
if ( is_page() || is_home() ) {
	$post_sidebar = ! empty( $post_sidebar ) ? $post_sidebar : 'sidebar-1';
} elseif ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
	$post_sidebar = 'woocommerce-sidebar';
}

if ( ! is_active_sidebar( $post_sidebar ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( $post_sidebar ); ?>
</aside><!-- #secondary -->
