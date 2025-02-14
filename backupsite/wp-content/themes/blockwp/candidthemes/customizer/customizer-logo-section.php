<?php
/*
 * Customizer Logo section
 */
/*Logo Section Options*/
$wp_customize->add_section('blockwp_logo_section', array(
    'priority'       => 5,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Logo Section Options', 'blockwp'),
    'panel'       => 'blockwp_panel',
));


/*Enable Social Icons in Menu*/
$wp_customize->add_setting(
    'blockwp_enable_social_menu',
    array(
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'default'           => 0,
        'sanitize_callback' => 'blockwp_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'blockwp_enable_social_menu',
    array(
        'label'       => __('Enable Social Icons', 'blockwp'),
        'description' => sprintf(
            '%1$s <a href="%2$s">%3$s</a> %4$s',
            __('Top menu will enabled from here. Go to', 'blockwp'),
            esc_url(admin_url('/customize.php?')),
            __('Customize > Menus', 'blockwp'),
            __('and make a new menu for social icons using custom links.', 'blockwp')
        ),
        'section'     => 'blockwp_logo_section',
        'type'        => 'checkbox',
    )
);
/*Button Text*/
$wp_customize->add_setting(
    'blockwp_menu_button_text',
    array(
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'default'           => __('Subscribe', 'blockwp'),
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'blockwp_menu_button_text',
    array(
        'label'       => __('Enter the text for button', 'blockwp'),
        'description' => __('You can enter your text for the button as well as link below.', 'blockwp'),
        'section'     => 'blockwp_logo_section',
        'type'        => 'text',
    )
);

/*Button Link*/
$wp_customize->add_setting(
    'blockwp_menu_button_link',
    array(
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'default'           => __('#', 'blockwp'),
        'sanitize_callback' => 'esc_url_raw',
    )
);

$wp_customize->add_control(
    'blockwp_menu_button_link',
    array(
        'label'       => __('Enter valid URL', 'blockwp'),
        'description' => __('Add the link of YouTube channel or subscribe button link.', 'blockwp'),
        'section'     => 'blockwp_logo_section',
        'type'        => 'text',
    )
);
