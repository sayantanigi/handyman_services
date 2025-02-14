<?php

/**
 * blockwp Theme Customizer
 *
 * @package blockwp
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function blockwp_customize_register($wp_customize)
{
	$wp_customize->get_setting('blogname')->transport         = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'blockwp_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'blockwp_customize_partial_blogdescription',
			)
		);
	}
	 /*About Theme Section */
	 $wp_customize->add_section( 'blockwp_about_theme_section', array(
        'priority'       => 5,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'About BlockWP', 'blockwp' ),
        'panel'          => 'blockwp_panel',
    ) );
    $wp_customize->add_setting( 'upgrade_text', array(
        'default' => '',
        'sanitize_callback' => '__return_false'
    ) );

    $wp_customize->add_control( new Blockwp_Customize_Static_Text_Control( $wp_customize, 'upgrade_text', array(
        'section'     => 'blockwp_about_theme_section',
        'description' => array('')
    ) ) );

	/**
	 * Customizer Panel
	*/
	require get_template_directory() . '/candidthemes/customizer/customizer-main-panel.php';

	 /**
     * Load customizer custom-controls
     */
    require get_template_directory() . '/candidthemes/customizer-pro/customize-controls.php';
}
add_action('customize_register', 'blockwp_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function blockwp_customize_partial_blogname()
{
	bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function blockwp_customize_partial_blogdescription()
{
	bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blockwp_customize_preview_js()
{
	wp_enqueue_script('blockwp-customizer', get_template_directory_uri() . '/candidthemes/assets/js/customizer.js', array('customize-preview'), BLOCKWP_VERSION, true);
}
add_action('customize_preview_init', 'blockwp_customize_preview_js');

/**
 * Customizer Styles
 */
function blockwp_customizer_css()
{
	wp_enqueue_style('blockwp-customizer-css', get_template_directory_uri() . '/candidthemes/assets/css/customizer-style.css', array(), '1.0.0');
}
add_action('customize_controls_enqueue_scripts', 'blockwp_customizer_css');
