<?php
/**
 * Post card used in archives and the blog index.
 *
 * @package Pure_Fitness_Store
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<a class="post-card__thumb" href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'medium_large' ); ?>
		</a>
	<?php endif; ?>

	<div class="post-card__body">
		<?php the_title( '<h2 class="post-card__title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>
		<div class="post-card__meta"><?php echo esc_html( get_the_date() ); ?></div>
		<div class="post-card__excerpt"><?php the_excerpt(); ?></div>
		<a class="post-card__more" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more', 'pure-fitness-store' ); ?></a>
	</div>
</article>
