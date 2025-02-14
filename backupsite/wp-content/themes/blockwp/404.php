<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package blockwp
 */

get_header();
?>
<main id="primary" class="site-main">

	<section class="error-404 not-found sec-spacing text-center">
		<div class="container">
			<div class="error-404-content">
				<div class="page-header">
					<h1 class="error-404-title"><?php esc_html_e('404', 'blockwp'); ?></h1>
					<h2 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'blockwp'); ?></h2>
				</div><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'blockwp'); ?></p>

					<?php
					get_search_form();
					?>
				</div><!-- .page-content -->
			</div>
		</div>
	</section><!-- .error-404 -->

</main><!-- #main -->
<?php
get_footer();
