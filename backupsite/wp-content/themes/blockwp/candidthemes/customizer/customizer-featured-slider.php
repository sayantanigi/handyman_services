<?php
/*
 * Customizer Slider section
 */
/*Slider Section Options*/
$wp_customize->add_section('blockwp_slider_section', array(
    'priority'       => 5,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Featured Section Options', 'blockwp'),
    'panel'       => 'blockwp_panel',
));

/*Enable featured section*/
$wp_customize->add_setting(
    'blockwp_enable_featured',
    array(
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'default'           => 0,
        'sanitize_callback' => 'blockwp_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'blockwp_enable_featured',
    array(
        'label'       => __('Enable Featured Section', 'blockwp'),
        'description' => __('Featured Section will appear when we enabled it.', 'blockwp'),
        'section'     => 'blockwp_slider_section',
        'type'        => 'checkbox',
    )
);


/*callback functions top header*/
if (!function_exists('blockwp_featured_callback')) :
    function blockwp_featured_callback()
    {
        $featured = absint(get_theme_mod('blockwp_enable_featured', 0));
        if (1 == $featured) {
            return true;
        } else {
            return false;
        }
    }
endif;

/*Select the category for slider*/
$wp_customize->add_setting(
    'blockwp_featured_category_selection',
    array(
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'default'           => 0,
        'sanitize_callback' => 'absint',
    )
);

$wp_customize->add_control(
    new Blockwp_Customize_Category_Dropdown_Control(
        $wp_customize,
        'blockwp_featured_category_selection',
        array(
            'label'       => __('Select Post Category', 'blockwp'),
            'description' => __('Posts from the selected category will appear here. More options are available in premium version.', 'blockwp'),
            'section'     => 'blockwp_slider_section',
            'active_callback' => 'blockwp_featured_callback',
            'type'        => 'category_dropdown',
        )
    )
);
