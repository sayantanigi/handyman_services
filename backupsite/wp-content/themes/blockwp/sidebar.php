<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blockwp
 */

if (!is_active_sidebar('sidebar-1')) {
	return;
}
?>

<aside id="secondary" class="ct-sidebar widget-area col-sm-1-3 col-lg-1-4">
	<?php dynamic_sidebar('sidebar-1'); ?>
</aside><!-- #secondary -->