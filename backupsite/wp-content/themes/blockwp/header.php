<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blockwp
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php
  wp_body_open();

  /**
   * blockwp_before_header hook.
   *
   * @since 1.0.0
   *
   * @hooked blockwp_do_skip_to_content_link - 10
   *
   */
  do_action('blockwp_before_header');

  /**
   * blockwp_offcanvas_sidebar_enable hook.
   *
   * @since 1.0.0
   *
   * @hooked blockwp_offcanvas_sidebar_block - 10
   *
   */
  do_action('blockwp_offcanvas_sidebar_enable');

  /**
   * blockwp_page_wrapper hook.
   *
   * @since 1.0.0
   *
   * @hooked blockwp_page_wrapper_block - 10
   *
   */
  do_action('blockwp_page_wrapper');

  /**
   * blockwp_before_header hook.
   *
   * @since 1.0.0
   *
   * @hooked blockwp_header_start - 10
   *
   */
  do_action('blockwp_before_header');

  /**
   * blockwp_top_header hook.
   *
   * @since 1.0.0
   *
   * @hooked blockwp_top_header_enable - 10
   *
   */
  do_action('blockwp_top_header');
  /**
   * blockwp_before_main_header_navigation hook.
   *
   * @since 1.0.0
   *
   * @hooked blockwp_main_header_wrapper_start - 10
   *
   */
  do_action('blockwp_before_main_header_navigation');
  /**
   * blockwp_before_main_header hook.
   *
   * @since 1.0.0
   *
   * @hooked blockwp_main_header_start - 10
   *
   */
  do_action('blockwp_before_main_header');

  /**
   * blockwp_main_header hook.
   *
   * @since 1.0.0
   *
   * @hooked blockwp_main_header_offcanvas_menu - 10
   * @hooked blockwp_main_header_branding - 15
   *  @hooked blockwp_main_header_button - 20
   *
   */
  do_action('blockwp_main_header');

  /**
   * blockwp_after_main_header hook.
   *
   * @since 1.0.0
   *
   * @hooked blockwp_main_header_end - 10
   *
   */
  do_action('blockwp_after_main_header');

  /**
   * blockwp_menu_section hook.
   *
   * @since 1.0.0
   *
   * @hooked blockwp_menu_section_start - 10
   * @hooked blockwp_offcanvas_menu - 15
   * @hooked blockwp_main_menu - 20
   * @hooked blockwp_menu_search - 25
   * @hooked blockwp_menu_section_end - 30   
   */
  do_action('blockwp_menu_section');

  /**
   * blockwp_after_main_header_navigation hook.
   *
   * @since 1.0.0
   *
   * @hooked blockwp_main_header_wrapper_end - 10
   *
   */
  do_action('blockwp_after_main_header_navigation');

  /**
   * blockwp_after_header hook.
   *
   * @since 1.0.0
   *
   * @hooked blockwp_header_end - 10
   *
   */
  do_action('blockwp_after_header');
  $content_wrapper_class = 'ct-site-content-wrapper';
  if (is_singular() && !empty(get_theme_mod('blockwp_sidebar_single_page', 'right-sidebar'))) {
    $content_wrapper_class .= ' ct-' . esc_attr(get_theme_mod('blockwp_sidebar_single_page', 'right-sidebar'));
  } elseif (!is_singular() && !empty(get_theme_mod('blockwp_sidebar_blog_page', 'right-sidebar'))) {
    $content_wrapper_class .= ' ct-' . esc_attr(get_theme_mod('blockwp_sidebar_blog_page', 'right-sidebar'));
  }
  if (1 == get_theme_mod('blockwp_enable_underline_link', 1)) {
    $content_wrapper_class .= ' ct-enable-underline';
  }

  ?>

  <div id="ct-content-area" class="<?php echo $content_wrapper_class; ?>">