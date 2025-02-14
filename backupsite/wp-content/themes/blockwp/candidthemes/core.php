<?php

/**
 * File to load the custom function files
 * @package Blockwp
 *
 * Load files
 */

/**
 * Sanitize functions
 */
require get_template_directory() . '/candidthemes/functions/sanitize-functions.php';

/**
 * Category dropdown
 */
require get_template_directory() . '/candidthemes/functions/customizer-category-control.php';

/*Load about Class*/
require get_template_directory() . '/candidthemes/functions/customizer-about-control.php';

/**
 * Load custom theme functions
 */
require get_template_directory() . '/candidthemes/functions/custom-functions.php';
/**
 * Load files containing hook functions for header
 */
require get_template_directory() . '/candidthemes/hooks/top-header.php';
require get_template_directory() . '/candidthemes/hooks/main-header.php';
require get_template_directory() . '/candidthemes/hooks/menu-header.php';

/**
 * Load files containing hook functions for footer
 */
require get_template_directory() . '/candidthemes/hooks/footer.php';
require get_template_directory() . '/candidthemes/hooks/top-footer.php';
require get_template_directory() . '/candidthemes/hooks/bottom-footer.php';
/**
 * Load files containing hook functions for content
 */
require get_template_directory() . '/candidthemes/hooks/content-hook.php';

/**
 * Plugin Recommendation
 */
require get_template_directory() . '/candidthemes/assets/library/tgm-plugin-activation.php';
require get_template_directory() . '/candidthemes/assets/library/plugin-recommendation.php';

/**
 * Breadrcumb
 */
require get_template_directory() . '/candidthemes/assets/library/breadcrumbs.php';


/**
 * Load Dynamic CSS from Customizer
 */
require get_template_directory() . '/candidthemes/assets/css/dynamic-css.php';

/**
 * Load customizer pro section
 */
require get_template_directory() . '/candidthemes/customizer-pro/class-customize.php';


/**
 * For Admin Page
 */
if (is_admin()) {
	require get_template_directory() . '/candidthemes/notice/admin-notice.php';
	require get_template_directory() . '/candidthemes/about/about.php';
}