<?php
/**
 * Single post template.
 *
 * @package Pure_Fitness_Store
 */

get_header();
?>

<main id="primary" class="site-main container">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<div class="entry-meta">
					<span class="posted-on"><?php echo esc_html( get_the_date() ); ?></span>
					<span class="byline"><?php the_author(); ?></span>
				</div>
			</header>

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="entry-thumbnail"><?php the_post_thumbnail( 'large' ); ?></div>
			<?php endif; ?>

			<div class="entry-content">
				<?php
				the_content();
				wp_link_pages();
				?>
			</div>

			<footer class="entry-footer">
				<?php the_tags( '<span class="tags-links">', ', ', '</span>' ); ?>
			</footer>
		</article>

		<?php
		the_post_navigation();

		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	endwhile;
	?>
</main>

<?php
get_footer();
