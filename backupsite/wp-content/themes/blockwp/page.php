<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockwp
 */

get_header();
?>
<div class="ct-inner-content-area">
	<div class="container">
		<div class="row">

			<main id="primary" class="site-main col-sm-2-3 col-lg-3-4">

				<?php
				while (have_posts()) :
					the_post();

					get_template_part('template-parts/content', 'page');

					// If comments are open or we have at least one comment, load up the comment template.
					if (comments_open() || get_comments_number()) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->

			<?php
			if ((!empty(get_theme_mod('blockwp_sidebar_single_page', 'right-sidebar'))) && ('right-sidebar' == get_theme_mod('blockwp_sidebar_single_page', 'right-sidebar') || 'left-sidebar' == get_theme_mod('blockwp_sidebar_single_page', 'right-sidebar'))) {
				get_sidebar();
			}
			?>
		</div>
	</div>
</div> <!-- .main-content-area -->
<?php
get_footer();
