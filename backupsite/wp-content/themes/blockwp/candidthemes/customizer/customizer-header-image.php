<?php
/*Header Image for mobile device*/
$wp_customize->add_setting(
    'blockwp-header-image-mobile',
    array(
        'capability'    => 'edit_theme_options',
        'default'     => '',
        'sanitize_callback' => 'blockwp_sanitize_image'
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'blockwp-header-image-mobile',
        array(
            'label'   => __('Select the image for header for mobile device.', 'blockwp'),
            'section'   => 'header_image',
            'settings'  => 'blockwp-header-image-mobile',
            'type'      => 'image',
            'priority'  => 10,
            'description' => __('Recommended image size is 600*400', 'blockwp')
        )
    )
);

/*Enable Overlay on the Header Image Part*/
$wp_customize->add_setting(
    'blockwp_enable_header_image_overlay',
    array(
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => 0,
        'sanitize_callback' => 'blockwp_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'blockwp_enable_header_image_overlay',
    array(
        'label'     => __('Enable Header Image Overlay Color Height', 'blockwp'),
        'description' => __('This option will add colors over the header image.', 'blockwp'),
        'section'   => 'header_image',
        'settings'  => 'blockwp_enable_header_image_overlay',
        'type'      => 'checkbox',
        'priority'  => 15,
    )
);


/*callback functions top header*/
if (!function_exists('blockwp_header_image_callback')) :
    function blockwp_header_image_callback()
    {
        $top_header = absint(get_theme_mod('blockwp_enable_header_image_overlay', 0));
        if (1 == $top_header) {
            return true;
        } else {
            return false;
        }
    }
endif;

/*Header Image Height*/
$wp_customize->add_setting(
    'blockwp_header_image_height',
    array(
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => 160,
        'sanitize_callback' => 'absint'
    )
);
$wp_customize->add_control(
    'blockwp_header_image_height',
    array(
        'label'     => __('Header Image Min Height', 'blockwp'),
        'description' => __('You can adjust the header image height based on your need.', 'blockwp'),
        'section'   => 'header_image',
        'settings'  => 'blockwp_header_image_height',
        'type'      => 'range',
        'priority'  => 15,
        'input_attrs' => array(
            'min' => 50,
            'max' => 500,
        ),
        'active_callback' => 'blockwp_header_image_callback',
    )
);

//Color option for slider hex color
$wp_customize->add_setting(
    'blockwp-header-overlay-color',
    array(
        'default'           => 'rgba(52,99,42,0.36)', // Use any HEX or RGBA value.
        'transport'         => 'refresh',
        'sanitize_callback' => 'blockwp_alpha_color_sanitization_callback'
    )
);
include_once get_theme_file_path('candidthemes/alpha-color/src/ColorAlpha.php');

$wp_customize->add_control(new ColorAlpha(
    $wp_customize,
    'blockwp-header-overlay-color',
    [
        'label'      => __('Header Image Overlay Color', 'blockwp'),
        'section'    => 'header_image',
        'settings'   => 'blockwp-header-overlay-color',
        'priority'  => 15,
        'active_callback' => 'blockwp_header_image_callback',
    ]
));
