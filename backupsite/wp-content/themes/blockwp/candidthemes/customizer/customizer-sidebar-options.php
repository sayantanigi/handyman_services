<?php

/**
 *  Finely Sidebar Option
 *
 * @since Finely 1.0.0
 *
 */
/*Sidebar options*/
$wp_customize->add_section('blockwp_sidebar_section', array(
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __('Sidebar Options', 'blockwp'),
   'panel'        => 'blockwp_panel',
));
/*Blog Page Sidebar Layout*/
$wp_customize->add_setting(
   'blockwp_sidebar_blog_page',
   array(
      'capability'        => 'edit_theme_options',
      'transport' => 'refresh',
      'default'           => 'right-sidebar',
      'sanitize_callback' => 'blockwp_sanitize_select'
   )
);
$wp_customize->add_control(
   'blockwp_sidebar_blog_page',
   array(
      'choices' => array(
         'right-sidebar'   => __('Right Sidebar', 'blockwp'),
         'left-sidebar'    => __('Left Sidebar', 'blockwp'),
         'no-sidebar'      => __('No Sidebar', 'blockwp'),
         'middle-column'   => __('Middle Column', 'blockwp')
      ),
      'label'     => __('Blog Page Sidebar Layout', 'blockwp'),
      'description' => __('This sidebar will work for the blog, archive, category, author pages. More options is in pro theme.', 'blockwp'),
      'section'   => 'blockwp_sidebar_section',
      'settings'  => 'blockwp_sidebar_blog_page',
      'type'      => 'select',
   )
);

/*Inner Page Sidebar Layout*/
$wp_customize->add_setting(
   'blockwp_sidebar_single_page',
   array(
      'capability'        => 'edit_theme_options',
      'transport' => 'refresh',
      'default'           => 'right-sidebar',
      'sanitize_callback' => 'blockwp_sanitize_select'
   )
);
$wp_customize->add_control('blockwp_sidebar_single_page', array(
   'choices' => array(
      'right-sidebar'   => __('Right Sidebar', 'blockwp'),
      'left-sidebar'    => __('Left Sidebar', 'blockwp'),
      'no-sidebar'      => __('No Sidebar', 'blockwp'),
      'middle-column'   => __('Middle Column', 'blockwp')
   ),
   'label'     => __('Inner Pages Sidebar Layout', 'blockwp'),
   'description' => __('This sidebar will work for the single page and post. More options is in pro theme.', 'blockwp'),
   'section'   => 'blockwp_sidebar_section',
   'settings'  => 'blockwp_sidebar_single_page',
   'type'      => 'select',
));


/*Sticky Sidebar Setting*/
$wp_customize->add_setting(
   'blockwp_enable_sticky_sidebar',
   array(
      'capability'        => 'edit_theme_options',
      'transport' => 'refresh',
      'default'           => 1,
      'sanitize_callback' => 'blockwp_sanitize_checkbox'
   )
);
$wp_customize->add_control('blockwp_enable_sticky_sidebar', array(
   'label'     => __('Sticky Sidebar Option', 'blockwp'),
   'description' => __('Enable and Disable sticky sidebar from this section.', 'blockwp'),
   'section'   => 'blockwp_sidebar_section',
   'settings'  => 'blockwp_enable_sticky_sidebar',
   'type'      => 'checkbox',
));
