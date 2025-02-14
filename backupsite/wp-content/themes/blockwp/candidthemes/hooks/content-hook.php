<?php
if (!function_exists('blockwp_posts_navigation')) {
    /**
     * Display pagination based on type seclected
     *
     * @since 1.0.0
     *
     */
    function blockwp_posts_navigation()
    {
        if ('numeric' == get_theme_mod('blockwp_pagination_options', 'numeric')) {
            the_posts_pagination();
        } else {
            the_posts_navigation();
        }
    }
}
add_action('blockwp_action_navigation', 'blockwp_posts_navigation', 10);



if (!function_exists('blockwp_constuct_fetured_section')) {
    /**
     * Add featured section on homepage
     *
     * @since 1.0.0
     */
    function blockwp_constuct_fetured_section()
    {

        if (is_front_page()) {
            if (1 != get_theme_mod('blockwp_enable_featured', 1))
                return false;
            $featured_cat = absint(get_theme_mod('blockwp_featured_category_selection', 0));
            $query_args = array(
                'post_type' => 'post',
                'ignore_sticky_posts' => true,
                'posts_per_page' => 3,
                'cat' => $featured_cat
            );

            $query = new WP_Query($query_args);
            $count = $query->post_count;
            if ($query->have_posts()) :
?>
                <section class="featured-section">
                    <div class="container">
                        <div class="row">
                            <?php
                            $i = 1;
                            while ($query->have_posts()) :
                                $query->the_post();
                                if ($i == 1) {
                            ?>
                                    <div class="col-md-2-3 col-lg-2-3">
                                        <div class="featured-slider">
                                            <div class="featured-wrap">
                                                <?php
                                                if (has_post_thumbnail()) {
                                                ?>
                                                    <div class="img-wrapper">
                                                        <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                                                            <?php the_post_thumbnail(); ?>
                                                        </a>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                                <div class="featured-content">
                                                    <header class="entry-header">
                                                        <?php
                                                        blockwp_posted_category();
                                                        ?>
                                                        <h2 class="entry-title">
                                                            <a href="<?php the_permalink(); ?>">
                                                                <?php the_title(); ?>
                                                            </a>
                                                        </h2>
                                                        <div class="entry-meta">
                                                            <?php
                                                            blockwp_posted_by();
                                                            blockwp_posted_on();
                                                            ?>
                                                        </div>
                                                    </header>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <?php
                                } else {
                                    if ($i == 2) {
                                    ?>
                                        <div class="col-md-1-3 col-lg-1-3">
                                            <div class="featured-list">
                                            <?php
                                        }
                                            ?>
                                            <div class="featured-wrap">
                                                <?php
                                                if (has_post_thumbnail()) {
                                                ?>
                                                    <div class="img-wrapper">
                                                        <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                                                            <?php the_post_thumbnail(); ?>
                                                        </a>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                                <div class="featured-content">
                                                    <header class="entry-header">
                                                        <?php
                                                        blockwp_posted_category();
                                                        ?>
                                                        <h2 class="entry-title">
                                                            <a href="<?php the_permalink(); ?>">
                                                                <?php the_title(); ?>
                                                            </a>
                                                        </h2>
                                                        <div class="entry-meta">
                                                            <?php
                                                            blockwp_posted_by();
                                                            blockwp_posted_on();
                                                            ?>
                                                        </div>
                                                    </header>
                                                </div>
                                            </div>
                                            <!-- .featured-wrap -->

                                            <?php
                                            if ($i == $count) {
                                            ?>
                                            </div>
                                        </div>
                            <?php
                                            }
                                        }

                                        $i++;

                                    endwhile;
                            ?>
                        </div>
                    </div>
                </section>
                <!-- .featured-section -->
            <?php
            endif;
            wp_reset_postdata();
        } //is_front_page
    }
}
add_action('blockwp_fetured_section', 'blockwp_constuct_fetured_section', 10);


if (!function_exists('blockwp_related_post')) :
    /**
     * Display related posts from same category
     *
     * @param int $post_id
     * @return void
     *
     * @since 1.0.0
     *
     */
    function blockwp_related_post($post_id)
    {
        if (get_theme_mod('blockwp_single_page_related_posts', 1) == 0) {
            return;
        }
        $categories = get_the_category($post_id);
        if ($categories) {
            $category_ids = array();
            $category = get_category($category_ids);
            $categories = get_the_category($post_id);
            foreach ($categories as $category) {
                $category_ids[] = $category->term_id;
            }
            $count = $category->category_count;
            if ($count > 1) { ?>
                <div class="related-posts">
                    <?php
                    if (!empty(get_theme_mod('blockwp_single_page_related_posts_title', __('Related Posts', 'blockwp')))) :
                    ?>
                        <h2>
                            <?php echo esc_html(get_theme_mod('blockwp_single_page_related_posts_title', __('Related Posts', 'blockwp'))); ?>
                        </h2>
                    <?php
                    endif;

                    $blockwp_cat_post_args = array(
                        'category__in' => $category_ids,
                        'post__not_in' => array($post_id),
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'post_status' => 'publish',
                        'ignore_sticky_posts' => true
                    );
                    $blockwp_featured_query = new WP_Query($blockwp_cat_post_args);
                    ?>

                    <?php
                    if ($blockwp_featured_query->have_posts()) :
                    ?>
                        <div class="rel-post-list">
                            <div class="row">
                                <?php

                                while ($blockwp_featured_query->have_posts()) : $blockwp_featured_query->the_post();
                                ?>
                                    <div class="col-sm-1-3 rel-post-wrap">
                                        <?php
                                        if (has_post_thumbnail()) :
                                        ?>
                                            <div class="img-wrapper">
                                                <a href="<?php the_permalink() ?>">
                                                    <?php the_post_thumbnail('blockwp-medium'); ?>
                                                </a>
                                            </div>
                                        <?php
                                        endif;
                                        ?>
                                        <div class="rel-post-content">
                                            <div class="entry-title">
                                                <h3>
                                                    <a href="<?php the_permalink() ?>">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h3>
                                            </div>
                                            <?php
                                            $meta_class = 'entry-meta';
                                            if ('post-updated' == get_theme_mod('blockwp_post_published_updated_date', 'post-published')) {
                                                $meta_class .= ' ct-updated-date';
                                            }
                                            ?>
                                            <div class="<?php echo $meta_class; ?>">
                                                <?php
                                                blockwp_posted_on();
                                                blockwp_posted_by();
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .rel-post-wrap -->
                                <?php
                                endwhile;
                                ?>
                            </div>
                        </div>

                    <?php
                    endif;
                    wp_reset_postdata();
                    ?>
                </div> <!-- .related-post -->
            <?php
            }
        }
    }
endif;
add_action('blockwp_related_posts', 'blockwp_related_post', 10, 1);



if (!function_exists('blockwp_custom_body_class')) {
    /**
     * Add sidebar class in body
     *
     * @since 1.0.0
     *
     */
    function blockwp_custom_body_class($classes)
    {
        if (!empty(get_theme_mod('blockwp_enable_sticky_sidebar', 1)) &&  1 == get_theme_mod('blockwp_enable_sticky_sidebar', 1)) {
            $classes[] = 'ct-sticky-sidebar';
        }

        return $classes;
    }
}

add_filter('body_class', 'blockwp_custom_body_class');

if (!function_exists('blockwp_breadcrumb_construct')) {
    /**
     * Enable/disable breadcrumb
     *
     * @since 1.0.0
     *
     */
    function blockwp_breadcrumb_construct()
    {

        if (('disable' != get_theme_mod('blockwp_breadcrumb_options', 'theme-default')) && !is_front_page()) {
            $breadcrumb_from = get_theme_mod('blockwp_breadcrumb_options', 'theme-default');

            if ((function_exists('yoast_breadcrumb')) && ($breadcrumb_from == 'yoast-seo')) {
            ?>
                <div class="blockwp-breadcrumb-wrapper">
                    <?php
                    yoast_breadcrumb();
                    ?>
                </div>
            <?php
            } elseif ((function_exists('rank_math_the_breadcrumbs')) && ($breadcrumb_from == 'rank-math')) {
            ?>
                <div class="blockwp-breadcrumb-wrapper">
                    <?php
                    rank_math_the_breadcrumbs();
                    ?>
                </div>
            <?php
            } else {
            ?>
                <div class="blockwp-breadcrumb-wrapper">
                    <?php
                    blockwp_breadcrumbs();
                    ?>
                </div>
<?php
            }
        }
    }
}

add_action('blockwp_breadcrumb', 'blockwp_breadcrumb_construct', 10);
