<?php
/*
 * Customizer top header section
 */
/*Top Header Options*/
$wp_customize->add_section('blockwp_footer_section', array(
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Footer Options', 'blockwp'),
    'panel'       => 'blockwp_panel',
));

/*Enable Logo Option*/
$wp_customize->add_setting(
    'blockwp_footer_logo_option',
    array(
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'default'           => 0,
        'sanitize_callback' => 'blockwp_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'blockwp_footer_logo_option',
    array(
        'label'       => __('Enable Logo in Footer', 'blockwp'),
        'description' => __('Checked to show the logo in footer. More options available in pro version.', 'blockwp'),
        'section'     => 'blockwp_footer_section',
        'type'        => 'checkbox',
    )
);


/*callback functions top header*/
if (!function_exists('blockwp_footer_logo_callback')) :
    function blockwp_footer_logo_callback()
    {
        $featured = absint(get_theme_mod('blockwp_footer_logo_option', 0));
        if (1 == $featured) {
            return true;
        } else {
            return false;
        }
    }
endif;

/*Add Logo in Footer*/
$wp_customize->add_setting(
    'blockwp_footer_logo_image',
    array(
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'default'           => '',
        'sanitize_callback' => 'blockwp_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
    $wp_customize,
    'blockwp_footer_logo_image',
    array(
        'label'       => __('Upload Logo for Footer', 'blockwp'),
        'description' => __('You can add the logo here in footer as well.', 'blockwp'),
        'section'     => 'blockwp_footer_section',
        'type'        => 'image',
        'active_callback'=> 'blockwp_footer_logo_callback',
    )
 )
);

/*Enable Social Icons in Footer*/
$wp_customize->add_setting(
    'blockwp_enable_social_menu_footer',
    array(
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'default'           => 0,
        'sanitize_callback' => 'blockwp_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'blockwp_enable_social_menu_footer',
    array(
        'label'       => __('Enable Social Icons', 'blockwp'),
        'description' => sprintf(
            '%1$s <a href="%2$s">%3$s</a> %4$s',
            __('Top menu will enabled from here. Go to', 'blockwp'),
            esc_url(admin_url('/customize.php?')),
            __('Customize > Menus', 'blockwp'),
            __('and make a new menu for social icons using custom links.', 'blockwp')
        ),
        'section'     => 'blockwp_footer_section',
        'type'        => 'checkbox',
    )
);

/*Enable Menu at the footer*/
$wp_customize->add_setting(
    'blockwp_enable_footer_menu',
    array(
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'default'           => 1,
        'sanitize_callback' => 'blockwp_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'blockwp_enable_footer_menu',
    array(
        'label'       => __('Enable Footer Menu', 'blockwp'),
        'description' => sprintf(
            '%1$s <a href="%2$s">%3$s</a> %4$s',
            __('Top menu will enabled from here. Go to', 'blockwp'),
            esc_url(admin_url('/customize.php?')),
            __('Customize > Menus', 'blockwp'),
            __('and make a new menu for footer section.', 'blockwp')
        ),
        'section'     => 'blockwp_footer_section',
        'type'        => 'checkbox',
    )
);

/*Footer Copyright*/
$wp_customize->add_setting(
    'blockwp_footer_copyright_text',
    array(
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'default'           => __('Copyright All Rights Reserved', 'blockwp'),
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'blockwp_footer_copyright_text',
    array(
        'label'       => __('Copyright Text', 'blockwp'),
        'description' => __('Your own footer copyright text goes here.', 'blockwp'),
        'section'     => 'blockwp_footer_section',
        'type'        => 'text',
    )
);

/*Enable Go to the top Option*/
$wp_customize->add_setting(
    'blockwp_footer_to_top_option',
    array(
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'default'           => 1,
        'sanitize_callback' => 'blockwp_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'blockwp_footer_to_top_option',
    array(
        'label'       => __('Enable Go to the Top', 'blockwp'),
        'description' => __('Checked to enable the icon go to the top in the footer.', 'blockwp'),
        'section'     => 'blockwp_footer_section',
        'type'        => 'checkbox',
    )
);
/*Enable Search Form in footer*/
$wp_customize->add_setting(
    'blockwp_footer_search_option',
    array(
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'default'           => 1,
        'sanitize_callback' => 'blockwp_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'blockwp_footer_search_option',
    array(
        'label'       => __('Enable Search Form', 'blockwp'),
        'description' => __('Checked to enable the search form in the footer.', 'blockwp'),
        'section'     => 'blockwp_footer_section',
        'type'        => 'checkbox',
    )
);