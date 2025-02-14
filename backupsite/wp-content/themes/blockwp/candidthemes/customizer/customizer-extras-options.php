<?php

/**
 *  Blockwp Extra Option
 *
 * @since Blockwp 1.0.0
 *
 */
/*Extra Options*/
$wp_customize->add_section('blockwp_extra_section', array(
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __('Extra Options', 'blockwp'),
   'panel'        => 'blockwp_panel',
));

/*post published or updated date*/
$wp_customize->add_setting(
   'blockwp_post_published_updated_date',
   array(
      'capability'        => 'edit_theme_options',
      'transport' => 'refresh',
      'default'           => 'post-published',
      'sanitize_callback' => 'blockwp_sanitize_select'
   )
);
$wp_customize->add_control('blockwp_post_published_updated_date', array(
   'choices' => array(
      'post-published'    => __('Show Post Published Date', 'blockwp'),
      'post-updated'   => __('Show Post Updated Date', 'blockwp'),
   ),
   'label'     => __('Show Post Publish or Updated Date', 'blockwp'),
   'description' => __('Show either post published or updated date.', 'blockwp'),
   'section'   => 'blockwp_extra_section',
   'settings'  => 'blockwp_post_published_updated_date',
   'type'      => 'select',
));

/*Breadcrumb settings*/
$wp_customize->add_setting(
   'blockwp_breadcrumb_options',
   array(
      'capability'        => 'edit_theme_options',
      'transport' => 'refresh',
      'default'           => 'theme-default',
      'sanitize_callback' => 'blockwp_sanitize_select'
   )
);
$wp_customize->add_control('blockwp_breadcrumb_options', array(
   'choices' => array(
      'theme-default' => __('Theme Default Breadcrumb', 'blockwp'),
      'disable'   => __('Disable Breadcrumb', 'blockwp'),
      'rank-math'   => __('Rank Math Breadcrumb', 'blockwp'),
      'yoast-seo'   => __('Yoast SEO Breadcrumb', 'blockwp'),
   ),
   'label'     => __('Breadcrumb Option in Single and Blog Page', 'blockwp'),
   'description' => __('You can use any of the breadcrumb from the option. You need to install and activate Yoast or Rank Math plugin. ', 'blockwp'),
   'section'   => 'blockwp_extra_section',
   'settings'  => 'blockwp_breadcrumb_options',
   'type'      => 'select',
));
