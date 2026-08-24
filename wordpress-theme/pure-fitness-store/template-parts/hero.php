<?php
/**
 * Front page hero section.
 *
 * @package Pure_Fitness_Store
 */

$pfs_hero_image = get_theme_mod( 'pfs_hero_image' );
$pfs_hero_style = $pfs_hero_image ? 'background-image: url(' . esc_url( $pfs_hero_image ) . ');' : '';
?>
<section class="hero" <?php echo $pfs_hero_style ? 'style="' . esc_attr( $pfs_hero_style ) . '"' : ''; ?>>
	<div class="hero__overlay"></div>
	<div class="container hero__content">
		<p class="hero__eyebrow"><?php echo esc_html( get_theme_mod( 'pfs_hero_eyebrow', __( 'Pure Fitness Official Store', 'pure-fitness-store' ) ) ); ?></p>
		<h1 class="hero__title"><?php echo esc_html( get_theme_mod( 'pfs_hero_title', __( 'Train Harder. Shop Smarter.', 'pure-fitness-store' ) ) ); ?></h1>
		<p class="hero__subtitle"><?php echo esc_html( get_theme_mod( 'pfs_hero_subtitle', __( 'Premium gym gear, apparel and supplements — everything you need to hit your goals.', 'pure-fitness-store' ) ) ); ?></p>
		<div class="hero__actions">
			<?php if ( class_exists( 'WooCommerce' ) ) : ?>
				<a class="button button--primary" href="<?php echo esc_url( get_theme_mod( 'pfs_hero_button_url', wc_get_page_permalink( 'shop' ) ) ); ?>">
					<?php echo esc_html( get_theme_mod( 'pfs_hero_button_text', __( 'Shop Now', 'pure-fitness-store' ) ) ); ?>
				</a>
			<?php endif; ?>
		</div>
	</div>
</section>
