<?php

/**
 *  Fairy Single Page Option
 *
 * @since Fairy 1.0.0
 *
 */
/*Single Page Options*/
$wp_customize->add_section('blockwp_single_page_section', array(
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Single Post Options', 'blockwp'),
    'panel'          => 'blockwp_panel',
));


/*Featured Image Option*/
$wp_customize->add_setting(
    'blockwp_single_page_featured_image',
    array(
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => 1,
        'sanitize_callback' => 'blockwp_sanitize_checkbox'
    )
);
$wp_customize->add_control(
    'blockwp_single_page_featured_image',
    array(
        'label'     => __('Enable Featured Image', 'blockwp'),
        'description' => __('You can hide or show featured image on single page.', 'blockwp'),
        'section'   => 'blockwp_single_page_section',
        'settings'  => 'blockwp_single_page_featured_image',
        'type'      => 'checkbox',
    )
);

/*Hide Tags in Single Page*/
$wp_customize->add_setting(
    'blockwp_single_page_tags',
    array(
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => 1,
        'sanitize_callback' => 'blockwp_sanitize_checkbox'
    )
);
$wp_customize->add_control(
    'blockwp_single_page_tags',
    array(
        'label'     => __('Enable Posts Tags', 'blockwp'),
        'description' => __('You can enable the post tags in single page.', 'blockwp'),
        'section'   => 'blockwp_single_page_section',
        'settings'  => 'blockwp_single_page_tags',
        'type'      => 'checkbox',
    )
);
/*Enable Underline in single post link place */
$wp_customize->add_setting(
    'blockwp_enable_underline_link',
    array(
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => 1,
        'sanitize_callback' => 'blockwp_sanitize_checkbox'
    )
);
$wp_customize->add_control(
    'blockwp_enable_underline_link',
    array(
        'label'     => __('Enable Underline on Link', 'blockwp'),
        'description' => __('If you enabled this, you will see the underline in the links. You can change it color from the general section of colors.', 'blockwp'),
        'section'   => 'blockwp_single_page_section',
        'settings'  => 'blockwp_enable_underline_link',
        'type'      => 'checkbox',
    )
);

/*Related Post Options*/
$wp_customize->add_setting(
    'blockwp_single_page_related_posts',
    array(
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => 1,
        'sanitize_callback' => 'blockwp_sanitize_checkbox'
    )
);
$wp_customize->add_control(
    'blockwp_single_page_related_posts',
    array(
        'label'     => __('Enable Related Posts', 'blockwp'),
        'description' => __('3 Post from similar category will display at the end of the page.', 'blockwp'),
        'section'   => 'blockwp_single_page_section',
        'settings'  => 'blockwp_single_page_related_posts',
        'type'      => 'checkbox',
    )
);
/*callback functions related posts*/
if (!function_exists('blockwp_related_post_callback')) :
    function blockwp_related_post_callback()
    {
        $related_posts = get_theme_mod('blockwp_single_page_related_posts', 0);
        if (1 == $related_posts) {
            return true;
        } else {
            return false;
        }
    }
endif;
/*Related Post Title*/
$wp_customize->add_setting('blockwp_single_page_related_posts_title', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => __('Related Posts', 'blockwp'),
    'sanitize_callback' => 'sanitize_text_field'
));
$wp_customize->add_control('blockwp_single_page_related_posts_title', array(
    'label'     => __('Related Posts Title', 'blockwp'),
    'description' => __('Give the appropriate title for related posts', 'blockwp'),
    'section'   => 'blockwp_single_page_section',
    'settings'  => 'blockwp_single_page_related_posts_title',
    'type'      => 'text',
    'active_callback' => 'blockwp_related_post_callback'
));
