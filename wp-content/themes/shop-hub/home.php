<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Shop_Hub
 */

get_header();

$column = get_theme_mod( 'shop_hub_archive_column_layout', 'column-3' );
?>
	<main id="primary" class="site-main">

		<?php
		do_action( 'shop_hub_breadcrumb' );

		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;
			?>
			<div class="shop-hub-archive-layout grid-layout <?php echo esc_attr( $column ); ?>">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				* Include the Post-Type-specific template for the content.
				* If you want to override this in a child theme, then include a file
				* called content-___.php (where ___ is the Post Type name) and that will be used instead.
				*/
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			?>
			</div>
			<?php

			do_action( 'shop_hub_posts_pagination' );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

	<?php
	if ( shop_hub_is_sidebar_enabled() ) {
		get_sidebar();
	}
	?>

<?php
get_footer();
