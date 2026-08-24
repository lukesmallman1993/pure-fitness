<?php
/**
 * Pure Fitness Store theme functions.
 *
 * @package Pure_Fitness_Store
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'PFS_VERSION', '1.0.0' );

/**
 * Theme setup.
 */
function pfs_setup() {
	load_theme_textdomain( 'pure-fitness-store', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );

	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 80,
			'width'       => 240,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	// WooCommerce.
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 600,
			'single_image_width'    => 900,
			'product_grid'          => array(
				'default_rows'    => 3,
				'default_columns' => 4,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'pure-fitness-store' ),
			'footer'  => __( 'Footer Menu', 'pure-fitness-store' ),
		)
	);
}
add_action( 'after_setup_theme', 'pfs_setup' );

/**
 * Register widget areas.
 */
function pfs_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Shop Sidebar', 'pure-fitness-store' ),
			'id'            => 'shop-sidebar',
			'description'   => __( 'Widgets shown alongside the shop (filters, price slider, etc.).', 'pure-fitness-store' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	for ( $i = 1; $i <= 4; $i++ ) {
		register_sidebar(
			array(
				'name'          => sprintf( /* translators: %d: footer column number. */ __( 'Footer Column %d', 'pure-fitness-store' ), $i ),
				'id'            => 'footer-' . $i,
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}
}
add_action( 'widgets_init', 'pfs_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pfs_scripts() {
	wp_enqueue_style(
		'pfs-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Oswald:wght@500;600;700&display=swap',
		array(),
		null
	);
	wp_enqueue_style( 'pfs-main', get_template_directory_uri() . '/assets/css/main.css', array(), PFS_VERSION );

	if ( class_exists( 'WooCommerce' ) ) {
		wp_enqueue_style( 'pfs-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css', array( 'pfs-main' ), PFS_VERSION );
	}

	wp_enqueue_script( 'pfs-main', get_template_directory_uri() . '/assets/js/main.js', array(), PFS_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pfs_scripts' );

require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';

if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
