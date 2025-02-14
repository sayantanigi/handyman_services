<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

					get_template_part('template-parts/content', get_post_type());

					the_post_navigation(
						array(
							'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'blockwp') . '</span> <span class="nav-title">%title</span>',
							'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'blockwp') . '</span> <span class="nav-title">%title</span>',
						)
					);

					/**
					 * blockwp_related_posts hook
					 * @since 1.0.0
					 *
					 * @hooked blockwp_related_posts -  10
					 */
					do_action('blockwp_related_posts', get_the_ID());
				?>

				<?php
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
