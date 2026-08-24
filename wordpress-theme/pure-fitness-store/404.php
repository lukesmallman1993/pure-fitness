<?php
/**
 * 404 template.
 *
 * @package Pure_Fitness_Store
 */

get_header();
?>

<main id="primary" class="site-main container">
	<section class="error-404 not-found">
		<header class="page-header">
			<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'pure-fitness-store' ); ?></h1>
		</header>

		<div class="page-content">
			<p><?php esc_html_e( 'It looks like nothing was found at this location. Try a search, or head back to the shop.', 'pure-fitness-store' ); ?></p>
			<?php get_search_form(); ?>
			<?php if ( class_exists( 'WooCommerce' ) ) : ?>
				<p><a class="button" href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"><?php esc_html_e( 'Back to Shop', 'pure-fitness-store' ); ?></a></p>
			<?php endif; ?>
		</div>
	</section>
</main>

<?php
get_footer();
