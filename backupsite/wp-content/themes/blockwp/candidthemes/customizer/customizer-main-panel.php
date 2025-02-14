<?php
/*
     * Customizer default value loaded here.
     */

/*
    * Theme Options Panel
    */
$wp_customize->add_panel('blockwp_panel', array(
    'priority' => 25,
    'capability' => 'edit_theme_options',
    'title' => __('BlockWP Theme Options', 'blockwp'),
));

/**
 * Load Top Header
 *
 * Settings for header at the top
 */
require get_template_directory() . '/candidthemes/customizer/customizer-top-header.php';
/**
 * Load logo Section
 *
 * Settings for logo section
 */
require get_template_directory() . '/candidthemes/customizer/customizer-logo-section.php';

/**
 * Load Menu Section
 *
 * Settings for menu section
 */
require get_template_directory() . '/candidthemes/customizer/customizer-menu-section.php';

/**
 * Load Featured Section
 *
 * Settings for featured section
 */
require get_template_directory() . '/candidthemes/customizer/customizer-featured-slider.php';

/**
 * Load blog
 *
 * Settings for blog
 */
require get_template_directory() . '/candidthemes/customizer/customizer-blog-page.php';

/**
 * Load single
 *
 * Settings for single
 */
require get_template_directory() . '/candidthemes/customizer/customizer-single-page.php';

/**
 * Load sidebar
 *
 * Settings for sidebar
 */
require get_template_directory() . '/candidthemes/customizer/customizer-sidebar-options.php';

/**
 * Load footer
 *
 * Settings for footer
 */
require get_template_directory() . '/candidthemes/customizer/customizer-footer-section.php';

/**
 * Load extras
 *
 * Settings for extras
 */
require get_template_directory() . '/candidthemes/customizer/customizer-extras-options.php';

/**
 * Load header image
 *
 * Settings for Header image
 */
require get_template_directory() . '/candidthemes/customizer/customizer-header-image.php';

/**
 * Color Options
 *
 * Color Options for primary
 */
require get_template_directory() . '/candidthemes/customizer/customizer-color-options.php';
