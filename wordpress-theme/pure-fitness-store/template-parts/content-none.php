<?php
/**
 * Empty results template part.
 *
 * @package Pure_Fitness_Store
 */

?>
<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'pure-fitness-store' ); ?></h1>
	</header>

	<div class="page-content">
		<p><?php esc_html_e( 'Sorry, nothing matched your search. Please try again with different keywords.', 'pure-fitness-store' ); ?></p>
		<?php get_search_form(); ?>
	</div>
</section>
