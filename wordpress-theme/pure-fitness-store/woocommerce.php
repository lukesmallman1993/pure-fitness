<?php
/**
 * WooCommerce wrapper template.
 *
 * @package Pure_Fitness_Store
 */

get_header();
?>

<main id="primary" class="site-main container woocommerce-main<?php echo ( is_shop() || is_product_taxonomy() ) ? ' has-sidebar' : ''; ?>">
	<div class="woocommerce-content">
		<?php woocommerce_content(); ?>
	</div>

	<?php if ( ( is_shop() || is_product_taxonomy() ) && is_active_sidebar( 'shop-sidebar' ) ) : ?>
		<aside class="shop-sidebar" aria-label="<?php esc_attr_e( 'Shop filters', 'pure-fitness-store' ); ?>">
			<?php dynamic_sidebar( 'shop-sidebar' ); ?>
		</aside>
	<?php endif; ?>
</main>

<?php
get_footer();
