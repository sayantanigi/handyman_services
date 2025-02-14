<?php

/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockwp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="card-item card-media-aside">
		<?php blockwp_post_thumbnail(); ?>
		<div class="card-body">
			<header class="entry-header">
				<?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>

				<?php
				if ('post' === get_post_type()) :
					$meta_class = 'entry-meta';
					if ('post-updated' == get_theme_mod('blockwp_post_published_updated_date', 'post-published')) {
						$meta_class .= ' ct-updated-date';
					}
				?>
					<div class="<?php echo $meta_class; ?>">
						<?php
						blockwp_posted_on();
						blockwp_posted_by();
						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
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
				?>
			</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->