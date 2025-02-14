<?php
/*
 * Customizer menu section
 */
/*Menu Section Options*/
$wp_customize->add_section('blockwp_menu_section', array(
    'priority'       => 5,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Menu Section Options', 'blockwp'),
    'panel'       => 'blockwp_panel',
));


/*Enable Offcanvas Sidebar*/
$wp_customize->add_setting(
    'blockwp_enable_offcanvas',
    array(
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'default'           => 0,
        'sanitize_callback' => 'blockwp_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'blockwp_enable_offcanvas',
    array(
        'label'       => __('Enable Offcanvas Sidebar', 'blockwp'),
        'description' => sprintf(
            '%1$s <a href="%2$s">%3$s</a> %4$s',
            __('Enable Offcanvas sidebar from here. Go to', 'blockwp'),
            esc_url(admin_url('/customize.php?')),
            __('Customize > Widgets', 'blockwp'),
            __('and add the required widgets or blocks here.', 'blockwp')
        ),
        'section'     => 'blockwp_menu_section',
        'type'        => 'checkbox',
    )
);
/*Enable search Icons in Menu*/
$wp_customize->add_setting(
    'blockwp_enable_search',
    array(
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'default'           => 0,
        'sanitize_callback' => 'blockwp_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'blockwp_enable_search',
    array(
        'label'       => __('Enable Search Icon', 'blockwp'),
        'description' => __('Click to show the search icon in the header of menu section.', 'blockwp'),
        'section'     => 'blockwp_menu_section',
        'type'        => 'checkbox',
    )
);
