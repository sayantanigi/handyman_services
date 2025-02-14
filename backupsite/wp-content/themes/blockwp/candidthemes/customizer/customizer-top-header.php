<?php
/*
 * Customizer top header section
 */
/*Top Header Options*/
$wp_customize->add_section('blockwp_header_section', array(
    'priority'       => 5,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Top Header Options', 'blockwp'),
    'panel'       => 'blockwp_panel',
));


/*Top header secton enable*/
$wp_customize->add_setting(
    'blockwp_enable_top_header',
    array(
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'default'           => 0,
        'sanitize_callback' => 'blockwp_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'blockwp_enable_top_header',
    array(
        'label'       => __('Enable Top Header', 'blockwp'),
        'description' => __('Checked to show the top header section.', 'blockwp'),
        'section'     => 'blockwp_header_section',
        'type'        => 'checkbox',
    )
);

/*callback functions top header*/
if (!function_exists('blockwp_top_header_callback')) :
    function blockwp_top_header_callback()
    {
        $top_header = absint(get_theme_mod('blockwp_enable_top_header', 0));
        if (1 == $top_header) {
            return true;
        } else {
            return false;
        }
    }
endif;

/*Enable Menu at the top*/
$wp_customize->add_setting(
    'blockwp_enable_top_menu',
    array(
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'default'           => 1,
        'sanitize_callback' => 'blockwp_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'blockwp_enable_top_menu',
    array(
        'label'       => __('Enable Top Menu', 'blockwp'),
        'description' => sprintf(
            '%1$s <a href="%2$s">%3$s</a> %4$s',
            __('Top menu will enabled from here. Go to', 'blockwp'),
            esc_url(admin_url('/customize.php?')),
            __('Customize > Menus', 'blockwp'),
            __('and make a new menu for top section.', 'blockwp')
        ),
        'section'     => 'blockwp_header_section',
        'active_callback' => 'blockwp_top_header_callback',
        'type'        => 'checkbox',
    )
);
/*Enable Phone Section*/
$wp_customize->add_setting(
    'blockwp_enable_top_phone',
    array(
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'default'           => 1,
        'sanitize_callback' => 'blockwp_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'blockwp_enable_top_phone',
    array(
        'label'       => __('Enable Top Phone', 'blockwp'),
        'description' => __('Phone Number section will be enabled.', 'blockwp'),
        'section'     => 'blockwp_header_section',
        'active_callback' => 'blockwp_top_header_callback',
        'type'        => 'checkbox',
    )
);
/*Add Phone number*/
$wp_customize->add_setting(
    'blockwp_add_top_phone_number',
    array(
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'default'           =>  __('+0123456789', 'blockwp'),
        'sanitize_callback' => 'wp_kses_post',
    )
);

$wp_customize->add_control(
    'blockwp_add_top_phone_number',
    array(
        'label'       => __('Enter Phone Number', 'blockwp'),
        'description' => __('Entered number will be displayed.', 'blockwp'),
        'section'     => 'blockwp_header_section',
        'active_callback' => 'blockwp_top_header_callback',
        'type'        => 'text',
    )
);
/*Enable Email Section*/
$wp_customize->add_setting(
    'blockwp_enable_top_email',
    array(
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'default'           => 1,
        'sanitize_callback' => 'blockwp_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'blockwp_enable_top_email',
    array(
        'label'       => __('Enable Top Email', 'blockwp'),
        'description' => __('Email section will be enabled.', 'blockwp'),
        'section'     => 'blockwp_header_section',
        'active_callback' => 'blockwp_top_header_callback',
        'type'        => 'checkbox',
    )
);
/*Add Email Address*/
$wp_customize->add_setting(
    'blockwp_add_email_address',
    array(
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'default'           => __('hello@candidthemes.com', 'blockwp'),
        'sanitize_callback' => 'sanitize_email',
    )
);

$wp_customize->add_control(
    'blockwp_add_email_address',
    array(
        'label'       => __('Add Valid Email Address', 'blockwp'),
        'description' => __('The added email will be displayed.', 'blockwp'),
        'section'     => 'blockwp_header_section',
        'active_callback' => 'blockwp_top_header_callback',
        'type'        => 'text',
    )
);

/* Top header background color */
$wp_customize->add_setting(
    'blockwp_top_header_background_color',
    array(
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => '#fff1ce',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'blockwp_top_header_background_color',
        array(
            'label'       => esc_html__('Top Header Background Color', 'blockwp'),
            'description' => esc_html__('Add your own color for the background. More options are available in premium version.', 'blockwp'),
            'section'     => 'blockwp_header_section',
            'active_callback' => 'blockwp_top_header_callback',
        )
    )
);
