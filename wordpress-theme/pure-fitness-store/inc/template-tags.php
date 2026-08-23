<?php
/**
 * Custom template tags.
 *
 * @package Pure_Fitness_Store
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'pfs_header_cart' ) ) {
	/**
	 * Output the header cart link with a live item count badge.
	 */
	function pfs_header_cart() {
		if ( ! function_exists( 'WC' ) || null === WC()->cart ) {
			return;
		}
		?>
		<a class="header-cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>" aria-label="<?php esc_attr_e( 'View your shopping cart', 'pure-fitness-store' ); ?>">
			<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
			<span class="header-cart__count"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
		</a>
		<?php
	}
}
