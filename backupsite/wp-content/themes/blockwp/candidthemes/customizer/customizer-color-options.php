<?php
/* Primary Color Options */
$wp_customize->add_setting( 
    'blockwp_primary_color',
    array(
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'  => '#e5a812',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'blockwp_primary_color',
        array(
            'label'       => esc_html__( 'Site Primary Color', 'blockwp' ),
            'description' => esc_html__( 'It will change the color of site whole site.', 'blockwp' ),
            'section'     => 'colors',
            'settings'  => 'blockwp_primary_color',
        )
    )
);