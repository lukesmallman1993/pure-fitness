<?php
/**
 * Theme footer.
 *
 * @package Pure_Fitness_Store
 */

?>
	<footer id="colophon" class="site-footer">
		<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) : ?>
			<div class="container site-footer__widgets">
				<?php for ( $i = 1; $i <= 4; $i++ ) : ?>
					<?php if ( is_active_sidebar( 'footer-' . $i ) ) : ?>
						<div class="footer-column">
							<?php dynamic_sidebar( 'footer-' . $i ); ?>
						</div>
					<?php endif; ?>
				<?php endfor; ?>
			</div>
		<?php endif; ?>

		<div class="site-footer__bottom">
			<div class="container site-footer__bottom-inner">
				<p class="site-info">
					&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>.
					<?php esc_html_e( 'All rights reserved.', 'pure-fitness-store' ); ?>
				</p>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'menu_class'     => 'footer-menu',
						'container'      => false,
						'depth'          => 1,
						'fallback_cb'    => false,
					)
				);
				?>
			</div>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
