<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blockwp
 */

?>
</div> <!-- #ct-content-area -->
<?php
/**
 * blockwp_before_footer hook.
 *
 * @since 1.0.0
 *
 * @hooked blockwp_footer_start - 10
 *
 */
do_action('blockwp_before_footer');

/**
 * blockwp_top_footer hook.
 *
 * @since 1.0.0
 *
 * @hooked blockwp_top_footer_start - 10
 * @hooked blockwp_top_footer_logo - 15
 * @hooked blockwp_top_footer_social - 20
 * @hooked blockwp_top_footer_menu - 25
 * @hooked blockwp_top_footer_end - 30
 *
 */
do_action('blockwp_top_footer');


/**
 * blockwp_bottom_footer hook.
 *
 * @since 1.0.0
 *
 * @hooked blockwp_bottom_footer_start - 10
 * @hooked blockwp_bottom_footer_info - 15
 * @hooked blockwp_bottom_footer_search - 20
 * @hooked blockwp_bottom_footer_end - 25
 *
 */
do_action('blockwp_bottom_footer');

/**
 * blockwp_after_footer hook.
 *
 * @since 1.0.0
 *
 * @hooked blockwp_footer_end - 10
 *
 */
do_action('blockwp_after_footer');
?>

</div><!-- #page -->

<?php
/**
 * blockwp_construct_gototop hook
 *
 * @since 1.0.0
 *
 */
do_action('blockwp_gototop');

wp_footer();
?>

</body>

</html>