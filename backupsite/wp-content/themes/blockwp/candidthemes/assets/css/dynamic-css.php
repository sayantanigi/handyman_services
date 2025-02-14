<?php

/**
 * Dynamic CSS elements.
 *
 * @package BlockWP
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


if (!function_exists('blockwp_dynamic_css')) :
    /**
     * Dynamic CSS
     *
     * @param null
     * @return null
     *
     * @since 1.0.0
     *
     */
    function blockwp_dynamic_css()
    {

        $blockwp_custom_css = '';
        //has header image
        $has_header_image = has_header_image();
        if (!empty($has_header_image)) {
            $header_image_url = get_header_image();
            $blockwp_custom_css .= ".site-main-header-wrapper { 
               background-image: url($header_image_url); 
            }";
        }

        if (!empty(get_theme_mod('blockwp-header-image-mobile'))) {
            $header_image_mobile_url = esc_url(get_theme_mod('blockwp-header-image-mobile'));
            $blockwp_custom_css .= "@media screen and (max-width: 767px) { 
                .site-main-header-wrapper { 
                    background-image: url($header_image_mobile_url); 
                }
            }";
        }

        if (1 == get_theme_mod('blockwp_enable_header_image_overlay', 0)) {
            $header_image_bg = get_theme_mod('blockwp-header-overlay-color', 'rgba(52,99,42,0.36)');
            if (!empty($header_image_bg)) {
                $blockwp_custom_css .= ".site-main-header-wrapper::before  { 
                background-color: {$header_image_bg}; 
            }";
            }
            if (!empty(get_theme_mod('blockwp_header_image_height', 160))) {
                $header_image_height = get_theme_mod('blockwp_header_image_height', 160);
                $main_header_height = $header_image_height - 50;
                $blockwp_custom_css .= "@media screen and (min-width: 768px) { 
                    .site-main-header>.container>.row { 
                        min-height: {$main_header_height}px; 
                    }
                }";
            }
        }


        /*Color Options */
        $blockwp_primary_color = esc_attr(get_theme_mod('blockwp_primary_color', '#e5a812'));
        $blockwp_top_header_color = esc_attr(get_theme_mod('blockwp_top_header_background_color', '#fff1ce'));

        if (!empty($blockwp_primary_color)) {
            $blockwp_custom_css .= ":root { 
               --primary-color: {$blockwp_primary_color}; 
            }";
        }

        if (!empty($blockwp_top_header_color)) {

            $blockwp_custom_css .= ".site-header-topbar  { 
                background-color: {$blockwp_top_header_color}; 
            }";
        }

        wp_add_inline_style('blockwp-style', $blockwp_custom_css);
    }
endif;
add_action('wp_enqueue_scripts', 'blockwp_dynamic_css', 99);
