<?php

/**
 * The template for displaying archive pages
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
				if (have_posts()) :
				?>
					<header class="page-header">
						<?php
						/**
						 * blockwp_breadcrumb hook.
						 *
						 * @since 1.0.0
						 *
						 * @hooked blockwp_breadcrumb_construct - 10
						 *
						 */
						do_action('blockwp_breadcrumb');
						the_archive_title('<h1 class="page-title">', '</h1>');
						the_archive_description('<div class="archive-description">', '</div>');
						?>
					</header><!-- .page-header -->
					<?php
					$wrapper_class = 'ct-post-wrapper';
					if (!empty(get_theme_mod('blockwp_blog_page_masonry_normal', 'normal'))) {
						$wrapper_class .= ' ct-' . esc_html(get_theme_mod('blockwp_blog_page_masonry_normal', 'normal'));
					}
					?>

					<div class="<?php echo $wrapper_class; ?>">
						<?php
						/* Start the Loop */
						while (have_posts()) :
							the_post();


							/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
							get_template_part('template-parts/content', get_post_type());


						endwhile;
						?>
					</div>
				<?php

					/**
					 * blockwp_action_navigation hook
					 * @since 1.0.0
					 *
					 * @hooked blockwp_posts_navigation -  10
					 */
					do_action('blockwp_action_navigation');

				else :

					get_template_part('template-parts/content', 'none');

				endif;
				?>

			</main><!-- #main -->

			<?php
			if ((!empty(get_theme_mod('blockwp_sidebar_blog_page', 'right-sidebar'))) && ('right-sidebar' == get_theme_mod('blockwp_sidebar_blog_page', 'right-sidebar') || 'left-sidebar' == get_theme_mod('blockwp_sidebar_blog_page', 'right-sidebar'))) {
				get_sidebar();
			}
			?>
		</div>
	</div>
</div> <!-- .main-content-area -->
<?php
get_footer();
