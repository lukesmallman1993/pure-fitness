<?php
/**
 * WooCommerce integration.
 *
 * @package Pure_Fitness_Store
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Remove default WooCommerce wrappers; woocommerce.php provides its own.
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

/**
 * Refresh the header cart count via AJAX fragments.
 *
 * @param array $fragments Cart fragments.
 * @return array
 */
function pfs_cart_count_fragment( $fragments ) {
	$fragments['.header-cart__count'] = '<span class="header-cart__count">' . esc_html( WC()->cart->get_cart_contents_count() ) . '</span>';
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'pfs_cart_count_fragment' );

/**
 * Show a "Sale" badge with the discount percentage on simple products.
 *
 * @param string     $html    Badge markup.
 * @param WP_Post    $post    Product post object.
 * @param WC_Product $product Product object.
 * @return string
 */
function pfs_sale_badge( $html, $post, $product ) {
	if ( $product->is_type( 'simple' ) && $product->get_regular_price() > 0 ) {
		$percentage = round( ( ( (float) $product->get_regular_price() - (float) $product->get_sale_price() ) / (float) $product->get_regular_price() ) * 100 );
		if ( $percentage > 0 ) {
			/* translators: %d: discount percentage. */
			return '<span class="onsale">' . sprintf( esc_html__( '-%d%%', 'pure-fitness-store' ), $percentage ) . '</span>';
		}
	}
	return $html;
}
add_filter( 'woocommerce_sale_flash', 'pfs_sale_badge', 10, 3 );

/**
 * Products per page.
 *
 * @return int
 */
function pfs_products_per_page() {
	return 12;
}
add_filter( 'loop_shop_per_page', 'pfs_products_per_page' );

/**
 * Related products settings.
 *
 * @param array $args Related products args.
 * @return array
 */
function pfs_related_products_args( $args ) {
	$args['posts_per_page'] = 4;
	$args['columns']        = 4;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'pfs_related_products_args' );

/**
 * Wrap product loop images so cards can style hover effects consistently.
 */
function pfs_loop_image_wrapper_open() {
	echo '<div class="product-card__image">';
}
add_action( 'woocommerce_before_shop_loop_item_title', 'pfs_loop_image_wrapper_open', 5 );

/**
 * Close the product loop image wrapper.
 */
function pfs_loop_image_wrapper_close() {
	echo '</div>';
}
add_action( 'woocommerce_before_shop_loop_item_title', 'pfs_loop_image_wrapper_close', 20 );

// Move the shop result count / ordering into a toolbar.
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

/**
 * Output shop toolbar with result count and ordering dropdown.
 */
function pfs_shop_toolbar() {
	echo '<div class="shop-toolbar">';
	woocommerce_result_count();
	woocommerce_catalog_ordering();
	echo '</div>';
}
add_action( 'woocommerce_before_shop_loop', 'pfs_shop_toolbar', 20 );

/**
 * Add a breadcrumb wrapper class.
 *
 * @param array $defaults Breadcrumb defaults.
 * @return array
 */
function pfs_breadcrumbs( $defaults ) {
	$defaults['wrap_before'] = '<nav class="woocommerce-breadcrumb container" aria-label="' . esc_attr__( 'Breadcrumb', 'pure-fitness-store' ) . '">';
	$defaults['wrap_after']  = '</nav>';
	return $defaults;
}
add_filter( 'woocommerce_breadcrumb_defaults', 'pfs_breadcrumbs' );
