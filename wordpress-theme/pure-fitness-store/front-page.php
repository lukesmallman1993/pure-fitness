<?php
/**
 * Front page template with hero and WooCommerce sections.
 *
 * @package Pure_Fitness_Store
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php get_template_part( 'template-parts/hero' ); ?>

	<?php if ( class_exists( 'WooCommerce' ) ) : ?>

		<?php if ( get_theme_mod( 'pfs_show_categories', true ) ) : ?>
			<section class="home-section home-categories">
				<div class="container">
					<h2 class="home-section__title"><?php esc_html_e( 'Shop by Category', 'pure-fitness-store' ); ?></h2>
					<?php echo do_shortcode( '[product_categories limit="4" columns="4" hide_empty="0"]' ); ?>
				</div>
			</section>
		<?php endif; ?>

		<?php if ( get_theme_mod( 'pfs_show_featured', true ) ) : ?>
			<section class="home-section home-featured">
				<div class="container">
					<h2 class="home-section__title"><?php esc_html_e( 'Featured Products', 'pure-fitness-store' ); ?></h2>
					<?php echo do_shortcode( '[featured_products limit="8" columns="4"]' ); ?>
					<p class="home-section__cta">
						<a class="button" href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"><?php esc_html_e( 'View All Products', 'pure-fitness-store' ); ?></a>
					</p>
				</div>
			</section>
		<?php endif; ?>

		<?php if ( get_theme_mod( 'pfs_show_sale', true ) ) : ?>
			<section class="home-section home-sale">
				<div class="container">
					<h2 class="home-section__title"><?php esc_html_e( 'On Sale Now', 'pure-fitness-store' ); ?></h2>
					<?php echo do_shortcode( '[sale_products limit="4" columns="4"]' ); ?>
				</div>
			</section>
		<?php endif; ?>

		<?php if ( get_theme_mod( 'pfs_show_new', true ) ) : ?>
			<section class="home-section home-new">
				<div class="container">
					<h2 class="home-section__title"><?php esc_html_e( 'New Arrivals', 'pure-fitness-store' ); ?></h2>
					<?php echo do_shortcode( '[products limit="4" columns="4" orderby="date" order="DESC"]' ); ?>
				</div>
			</section>
		<?php endif; ?>

	<?php endif; ?>

	<section class="home-section home-benefits">
		<div class="container benefits-grid">
			<div class="benefit">
				<h3><?php esc_html_e( 'Free Delivery', 'pure-fitness-store' ); ?></h3>
				<p><?php esc_html_e( 'Free shipping on all orders over £50.', 'pure-fitness-store' ); ?></p>
			</div>
			<div class="benefit">
				<h3><?php esc_html_e( 'Easy Returns', 'pure-fitness-store' ); ?></h3>
				<p><?php esc_html_e( '30-day hassle-free returns policy.', 'pure-fitness-store' ); ?></p>
			</div>
			<div class="benefit">
				<h3><?php esc_html_e( 'Secure Checkout', 'pure-fitness-store' ); ?></h3>
				<p><?php esc_html_e( '100% secure payment processing.', 'pure-fitness-store' ); ?></p>
			</div>
			<div class="benefit">
				<h3><?php esc_html_e( 'Expert Support', 'pure-fitness-store' ); ?></h3>
				<p><?php esc_html_e( 'Our fitness team is here to help.', 'pure-fitness-store' ); ?></p>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
