<?php
if (!function_exists('blockwp_social_menu')) {
    /**
     * Add social icons menu
     *
     * @since 1.0.0
     *
     */
    function blockwp_social_menu()
    {
        if (has_nav_menu('social-menu')) :
            wp_nav_menu(array(
                'theme_location' => 'social-menu',
                'container' => 'ul',
                'menu_class' => 'social-menu menu',
                'menu_id'  => 'menu-social',
            ));
        endif;
    }
}

if (!function_exists('blockwp_show_menu_button')) {
    /**
     * Add button on logo Section
     *
     * @since 1.0.0
     *
     */
    function blockwp_show_menu_button()
    {
        if (
            !empty(get_theme_mod('blockwp_menu_button_link', __('#', 'blockwp'))) && !empty(get_theme_mod('blockwp_menu_button_text', __('Subscribe', 'blockwp')))
        ) {
?>
            <a href='<?php echo esc_url(get_theme_mod('blockwp_menu_button_link', __('#', 'blockwp'))); ?>' class='btn btn-dark text-uppercase'> <?php echo esc_html(get_theme_mod('blockwp_menu_button_text', __('Subscribe', 'blockwp'))); ?> </a>
<?php
        }
    }
}


if (!function_exists('blockwp_excerpt_more')) :
    /**
     * Remove ... From Excerpt
     *
     * @since 1.0.0
     */
    function blockwp_excerpt_more($more)
    {
        if (!is_admin()) {
            return '';
        }
    }
endif;
add_filter('excerpt_more', 'blockwp_excerpt_more');


if (!function_exists('blockwp_alter_excerpt')) :
    /**
     * Filter to change excerpt length size
     *
     * @since 1.0.0
     */
    function blockwp_alter_excerpt($length)
    {
        if (is_admin()) {
            return $length;
        }
        if (!empty(get_theme_mod('blockwp_excerpt_length', 25))) {
            return absint(get_theme_mod('blockwp_excerpt_length', 25));
        }
        return 25;
    }
endif;
add_filter('excerpt_length', 'blockwp_alter_excerpt');

/**
 * List down the get category
 *
 * @param int $post_id
 * @return string list of category
 *
 * @since 1.0.0
 *
 */
if (!function_exists('blockwp_get_category')) :
    function blockwp_get_category($post_id = 0)
    {

        if (0 == $post_id) {
            global $post;
            $post_id = $post->ID;
        }
        $categories = get_the_category($post_id);
        $output = '';
        $separator = ' ';
        if ($categories) {
            $output .= '<div class="category-list">';
            foreach ($categories as $category) {
                $output .= '<span> <a class="ct-cat-item-' . esc_attr($category->term_id) . '" href="' . esc_url(get_category_link($category->term_id)) . '"  rel="category tag">' . esc_html($category->cat_name) . '</a> </span>' . $separator;
            }
            $output .= '</div>';
            return $output;
        }
    }
endif;

/**
 * List down the category of a post
 *
 * @param int $post_id
 * @return string list of category
 *
 * @since 1.0.0
 *
 */
if (!function_exists('blockwp_posted_category')) :
    function blockwp_posted_category($post_id = 0)
    {

        if (0 == $post_id) {
            global $post;
            $post_id = $post->ID;
        }
        $categories = get_the_category($post_id);
        $output = '';
        $separator = ' ';
        if ($categories) {
            $output .= '<div class="category-list">';
            foreach ($categories as $category) {
                $output .= '<span> <a class="ct-cat-item-' . esc_attr($category->term_id) . '" href="' . esc_url(get_category_link($category->term_id)) . '"  rel="category tag">' . esc_html($category->cat_name) . '</a> </span>' . $separator;
            }
            $output .= '</div>';
            echo $output;
        }
    }
endif;



/**
 * Show/hide tags on single post
 *
 * @param null
 * @return string list of tags of a post
 *
 * @since 1.0.0
 *
 */
if (!function_exists('blockwp_entry_tags')) :
    function blockwp_entry_tags()
    {

        // Hide tag text for pages.
        if ('post' === get_post_type()) {

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'blockwp'));
            if ($tags_list) {
                /* translators: 1: list of tags. */
                printf('<span class="tags-links"><i class="fa fa-folder-open"></i> ' . esc_html__('%1$s', 'blockwp') . '</span>', $tags_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            }
        }
    }
endif;



/**
 * BreadCrumb Settings
 */
if (!function_exists('blockwp_breadcrumbs')) :
    function blockwp_breadcrumbs()
    {
        $breadcrumb_args = array(
            'container' => 'div',
            'show_browse' => false
        );

        echo "<div class='breadcrumbs init-animate clearfix'><div id='blockwp-breadcrumbs' class='clearfix'>";
        breadcrumb_trail($breadcrumb_args);
        echo "</div></div>";
    }
endif;
