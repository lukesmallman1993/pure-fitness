<?php
/**
 * Theme Customizer options.
 *
 * @package Pure_Fitness_Store
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register customizer settings and controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 */
function pfs_customize_register( $wp_customize ) {

	// Top bar.
	$wp_customize->add_section(
		'pfs_topbar',
		array(
			'title'    => __( 'Top Bar', 'pure-fitness-store' ),
			'priority' => 20,
		)
	);
	$wp_customize->add_setting(
		'pfs_topbar_text',
		array(
			'default'           => __( 'Free UK delivery on orders over £50', 'pure-fitness-store' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'pfs_topbar_text',
		array(
			'label'   => __( 'Announcement text', 'pure-fitness-store' ),
			'section' => 'pfs_topbar',
			'type'    => 'text',
		)
	);

	// Hero.
	$wp_customize->add_section(
		'pfs_hero',
		array(
			'title'    => __( 'Front Page Hero', 'pure-fitness-store' ),
			'priority' => 25,
		)
	);

	$hero_text_settings = array(
		'pfs_hero_eyebrow'     => __( 'Eyebrow text', 'pure-fitness-store' ),
		'pfs_hero_title'       => __( 'Title', 'pure-fitness-store' ),
		'pfs_hero_subtitle'    => __( 'Subtitle', 'pure-fitness-store' ),
		'pfs_hero_button_text' => __( 'Button text', 'pure-fitness-store' ),
	);
	foreach ( $hero_text_settings as $setting_id => $label ) {
		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			$setting_id,
			array(
				'label'   => $label,
				'section' => 'pfs_hero',
				'type'    => 'text',
			)
		);
	}

	$wp_customize->add_setting(
		'pfs_hero_button_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'pfs_hero_button_url',
		array(
			'label'   => __( 'Button link', 'pure-fitness-store' ),
			'section' => 'pfs_hero',
			'type'    => 'url',
		)
	);

	$wp_customize->add_setting(
		'pfs_hero_image',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'pfs_hero_image',
			array(
				'label'   => __( 'Hero background image', 'pure-fitness-store' ),
				'section' => 'pfs_hero',
			)
		)
	);

	// Homepage sections.
	$wp_customize->add_section(
		'pfs_homepage',
		array(
			'title'    => __( 'Homepage Sections', 'pure-fitness-store' ),
			'priority' => 30,
		)
	);

	$home_sections = array(
		'pfs_show_categories' => __( 'Show "Shop by Category"', 'pure-fitness-store' ),
		'pfs_show_featured'   => __( 'Show "Featured Products"', 'pure-fitness-store' ),
		'pfs_show_sale'       => __( 'Show "On Sale Now"', 'pure-fitness-store' ),
		'pfs_show_new'        => __( 'Show "New Arrivals"', 'pure-fitness-store' ),
	);
	foreach ( $home_sections as $setting_id => $label ) {
		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => true,
				'sanitize_callback' => 'wp_validate_boolean',
			)
		);
		$wp_customize->add_control(
			$setting_id,
			array(
				'label'   => $label,
				'section' => 'pfs_homepage',
				'type'    => 'checkbox',
			)
		);
	}
}
add_action( 'customize_register', 'pfs_customize_register' );
