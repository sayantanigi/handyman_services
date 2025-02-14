<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockwp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="card-item card-media-aside">
		<?php
		if (is_singular()) {
			/**
			 * blockwp_breadcrumb hook.
			 *
			 * @since 1.0.0
			 *
			 * @hooked blockwp_breadcrumb_construct - 10
			 *
			 */
			do_action('blockwp_breadcrumb');
		}
		blockwp_post_thumbnail();
		?>
		<div class="card-body">
			<header class="entry-header">
				<?php
				if (is_singular()) :
					the_title('<h1 class="entry-title">', '</h1>');
				else :
					the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
				endif;

				if ('post' === get_post_type()) :
					$meta_class = 'entry-meta';
					if ('post-updated' == get_theme_mod('blockwp_post_published_updated_date', 'post-published')) {
						$meta_class .= ' ct-updated-date';
					}
				?>
					<div class="<?php echo $meta_class; ?>">
						<?php
						blockwp_posted_by();
						blockwp_posted_on();
						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->
			<div class="entry-content">
				<?php
				if (is_singular()) {
					the_content();
				} else {
					if ('content' == get_theme_mod('blockwp_content_show_from', 'excerpt')) {
						the_content();
					} elseif ('hide' == get_theme_mod('blockwp_content_show_from', 'excerpt')) {
						echo '';
					} else {
						the_excerpt();
						if (!empty(get_theme_mod('blockwp_read_more_text', __('Read More', 'blockwp')))) {
				?>
							<a href="<?php the_permalink(); ?>" class="btn text-uppercase"> <?php echo esc_html(get_theme_mod('blockwp_read_more_text', __('Read More', 'blockwp'))); ?> </a>
				<?php
						}
					}
				}

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__('Pages:', 'blockwp'),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .entry-content -->
			<?php
			if (is_singular() && (1 == get_theme_mod('blockwp_single_page_tags', 1))) {
			?>
				<footer class="entry-footer">
					<?php blockwp_entry_tags(); ?>
				</footer><!-- .entry-footer -->
			<?php
			}
			?>
		</div>

	</div> <!-- .card-item -->
</article><!-- #post-<?php the_ID(); ?> -->