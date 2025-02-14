<?php

/**
 *  Blockwp Blog Page Option
 *
 * @since Blockwp 1.0.0
 *
 */
/*Blog Page Options*/
$wp_customize->add_section('blockwp_blog_page', array(
   'priority'       => 5,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __('Blog Section Options', 'blockwp'),
   'panel'        => 'blockwp_panel',
));

/*Blog Page Layout Masonry*/
$wp_customize->add_setting(
   'blockwp_blog_page_masonry_normal',
   array(
      'capability'        => 'edit_theme_options',
      'transport' => 'refresh',
      'default'           => 'normal',
      'sanitize_callback' => 'blockwp_sanitize_select'
   )
);
$wp_customize->add_control(
   'blockwp_blog_page_masonry_normal',
   array(
      'choices' => array(
         'normal'    => __('Normal Layout', 'blockwp'),
         'masonry'   => __('Masonry Layout', 'blockwp'),
         'full-image'   => __('Full Image Layout', 'blockwp'),
      ),
      'label'     => __('Masonry or Normal Layout', 'blockwp'),
      'description' => __('Some image layout option will not work in masonry.', 'blockwp'),
      'section'   => 'blockwp_blog_page',
      'settings'  => 'blockwp_blog_page_masonry_normal',
      'type'      => 'select',
   )
);

/*Blog Page Show content from*/
$wp_customize->add_setting(
   'blockwp_content_show_from',
   array(
      'capability'        => 'edit_theme_options',
      'transport' => 'refresh',
      'default'           => 'excerpt',
      'sanitize_callback' => 'blockwp_sanitize_select'
   )
);
$wp_customize->add_control(
   'blockwp_content_show_from',
   array(
      'choices' => array(
         'excerpt'    => __('Excerpt', 'blockwp'),
         'content'    => __('Content', 'blockwp'),
         'hide'    => __('Hide Content', 'blockwp'),
      ),
      'label'     => __('Select Content Display Option', 'blockwp'),
      'description' => __('You can enable excerpt from Screen Options inside post section of dashboard', 'blockwp'),
      'section'   => 'blockwp_blog_page',
      'settings'  => 'blockwp_content_show_from',
      'type'      => 'select',
   )
);

/*Blog image size*/
$wp_customize->add_setting(
   'blockwp_image_size_blog_page',
   array(
      'capability'        => 'edit_theme_options',
      'transport' => 'refresh',
      'default'           => 'cropped-image',
      'sanitize_callback' => 'blockwp_sanitize_select'
   )
);
$wp_customize->add_control(
   'blockwp_image_size_blog_page',
   array(
      'choices' => array(
         'cropped-image'    => __('Cropped Image', 'blockwp'),
         'original-image'   => __('Original Image', 'blockwp'),
      ),
      'label'     => __('Size of the image, either cropped or original', 'blockwp'),
      'description' => __('The image will be either cropped or original size based on the image. Recommended image size is 800*600 px.', 'blockwp'),
      'section'   => 'blockwp_blog_page',
      'settings'  => 'blockwp_image_size_blog_page',
      'type'      => 'select',
   )
);

/*Blog Page excerpt length*/
$wp_customize->add_setting(
   'blockwp_excerpt_length',
   array(
      'capability'        => 'edit_theme_options',
      'transport' => 'refresh',
      'default'           => 25,
      'sanitize_callback' => 'absint'
   )
);
$wp_customize->add_control(
   'blockwp_excerpt_length',
   array(
      'label'     => __('Size of Excerpt Content', 'blockwp'),
      'description' => __('Enter the number per Words to show the content in blog page.', 'blockwp'),
      'section'   => 'blockwp_blog_page',
      'settings'  => 'blockwp_excerpt_length',
      'type'      => 'number',
   )
);
/*Blog Page Pagination Options*/
$wp_customize->add_setting(
   'blockwp_pagination_options',
   array(
      'capability'        => 'edit_theme_options',
      'transport' => 'refresh',
      'default'           => 'numeric',
      'sanitize_callback' => 'blockwp_sanitize_select'
   )
);
$wp_customize->add_control(
   'blockwp_pagination_options',
   array(
      'choices' => array(
         'default'    => __('Default', 'blockwp'),
         'numeric'    => __('Numeric', 'blockwp'),
      ),
      'label'     => __('Pagination Types', 'blockwp'),
      'description' => __('Select the Required Pagination Type', 'blockwp'),
      'section'   => 'blockwp_blog_page',
      'settings'  => 'blockwp_pagination_options',
      'type'      => 'select',
   )
);
/*Blog Page read more text*/
$wp_customize->add_setting(
   'blockwp_read_more_text',
   array(
      'capability'        => 'edit_theme_options',
      'transport' => 'refresh',
      'default'           => __('Read More', 'blockwp'),
      'sanitize_callback' => 'sanitize_text_field'
   )
);
$wp_customize->add_control(
   'blockwp_read_more_text',
   array(
      'label'     => __('Enter Read More Text', 'blockwp'),
      'description' => __('Read more text for blog and archive page.', 'blockwp'),
      'section'   => 'blockwp_blog_page',
      'settings'  => 'blockwp_read_more_text',
      'type'      => 'text',
   )
);
