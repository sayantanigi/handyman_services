<?php
if (!function_exists('blockwp_menu_section_start')) {
    /**
     * Add start div to menu secction below main header.
     *
     * @since 1.0.0
     */
    function blockwp_menu_section_start()
    {
?>
        <div class="menu-wrapper">
            <div class="container">
                <div class="container-inner" id="ct-menu-container">
                <?php
            }
        }
        add_action('blockwp_menu_section', 'blockwp_menu_section_start', 10);

        if (!function_exists('blockwp_mobile_top_menu_block_start')) {
            /**
             * Add div start for mobile menu top block wrapper
             *
             * @since 1.0.0
             */
            function blockwp_mobile_top_menu_block_start()
            {
                ?>
                    <div class="ct-mobile-top-menu-wrapper">
                        <?php
                    }
                }
                add_action('blockwp_menu_section', 'blockwp_mobile_top_menu_block_start', 15);

                if (!function_exists('blockwp_offcanvas_menu')) {
                    /**
                     * Add offcanvas menu on main menu
                     *
                     * @since 1.0.0
                     */
                    function blockwp_offcanvas_menu()
                    {
                        if (1 == get_theme_mod('blockwp_enable_offcanvas', 0)) {
                        ?>
                            <div class="offcanvas-menu-wrapper">
                                <a href="#" class="offcanvas-toggle"><span></span> </a>
                            </div>
                        <?php
                        }
                    }
                }
                add_action('blockwp_menu_section', 'blockwp_offcanvas_menu', 15);

                if (!function_exists('blockwp_menu_search_mobile')) {
                    /**
                     * Add search on main menu section for mobile
                     *
                     * @since 1.0.0
                     */
                    function blockwp_menu_search_mobile()
                    {
                        if (1 == get_theme_mod('blockwp_enable_search', 0)) {
                        ?>
                            <div class="overlay-search-wrapper text-center mbl-show">
                                <a href="#" class="search-toggle"> <i class="fas fa-search"></i> </a>
                            </div>
                        <?php
                        }
                    }
                }
                add_action('blockwp_menu_section', 'blockwp_menu_search_mobile', 20);

                if (!function_exists('blockwp_toggle_menu')) {
                    /**
                     * Add toggle menu for mobile
                     *
                     * @since 1.0.0
                     */
                    function blockwp_toggle_menu()
                    {
                        ?>
                        <div class="menu-toggle-wrapper text-right">

                            <button class="menu-toggle" id="ct-menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                    <?php
                    }
                }
                add_action('blockwp_menu_section', 'blockwp_toggle_menu', 20);

                if (!function_exists('blockwp_mobile_top_menu_block_end')) {
                    /**
                     * Add div end for mobile menu top block wrapper
                     *
                     * @since 1.0.0
                     */
                    function blockwp_mobile_top_menu_block_end()
                    {
                    ?>
                    </div>
                <?php
                    }
                }
                add_action('blockwp_menu_section', 'blockwp_mobile_top_menu_block_end', 20);

                if (!function_exists('blockwp_main_menu')) {
                    /**
                     * Add main menu
                     *
                     * @since 1.0.0
                     */
                    function blockwp_main_menu()
                    {
                ?>
                    <nav id="site-navigation" class="main-navigation">
                        <?php wp_nav_menu([
                            'theme_location' => 'menu-1',
                            'container'         => 'ul',
                            'menu_id' => 'primary-menu',
                            'fallback_cb'          => 'ct_page_menu',
                        ]); ?>
                    </nav><!-- #site-navigation -->
                    <?php
                    }
                }
                add_action('blockwp_menu_section', 'blockwp_main_menu', 20);

                if (!function_exists('blockwp_menu_search')) {
                    /**
                     * Add search on main menu section
                     *
                     * @since 1.0.0
                     */
                    function blockwp_menu_search()
                    {
                        if (1 == get_theme_mod('blockwp_enable_search', 0)) {
                    ?>
                        <div class="overlay-search-wrapper text-right mbl-hide">
                            <a href="#" class="search-toggle"> <i class="fas fa-search"></i> </a>

                        </div>
                        <section class="search-section">
                            <div class="container">
                                <button class="close-btn"><i class="fa fa-times"></i></button>
                                <?php get_search_form(); ?>
                            </div>
                        </section>
                    <?php
                        }
                    }
                }
                add_action('blockwp_menu_section', 'blockwp_menu_search', 25);


                if (!function_exists('blockwp_menu_section_end')) {
                    /**
                     * Add end div to menu secction below main header.
                     *
                     * @since 1.0.0
                     */
                    function blockwp_menu_section_end()
                    {
                    ?>

                </div>
            </div>
        </div> <!-- .menu-wrapper -->
    <?php
                    }
                }
                add_action('blockwp_menu_section', 'blockwp_menu_section_end', 30);

                if (!function_exists('blockwp_main_header_wrapper_end')) {
                    /**
                     * Add end div to menu secction below main header.
                     *
                     * @since 1.0.0
                     */
                    function blockwp_main_header_wrapper_end()
                    {
    ?>
        </div> <!-- .site-main-header-wrapper -->
<?php
                    }
                }
                add_action('blockwp_after_main_header_navigation', 'blockwp_main_header_wrapper_end', 10);

                add_filter('wp_nav_menu_items', 'blockwp_add_extra_item_to_nav_menu', 10, 2);
                if (!function_exists('blockwp_add_extra_item_to_nav_menu')) {
                    function blockwp_add_extra_item_to_nav_menu($items, $args)
                    {
                        $menu_location = 'menu-1';

                        if (!empty($menu_location) && $args->theme_location == $menu_location) {
                            $items .= '<li class="nav-item ct-nav-item">';
                            $items .= '<a class="nav-link close_nav" href="#"><i class="fa fa-times"></i></a>';
                            $items .= '</li>';
                        }

                        return $items;
                    }
                }


                if (!function_exists('ct_page_menu')) {
                    function ct_page_menu($args = array())
                    {
                        $defaults = array(
                            'sort_column'  => 'menu_order, post_title',
                            'menu_id'      => '',
                            'menu_class'   => 'menu',
                            'container'    => 'div',
                            'echo'         => true,
                            'link_before'  => '',
                            'link_after'   => '',
                            'before'       => '<ul>',
                            'after'        => '</ul>',
                            'item_spacing' => 'discard',
                            'walker'       => '',
                        );
                        $args     = wp_parse_args($args, $defaults);

                        if (!in_array($args['item_spacing'], array('preserve', 'discard'), true)) {
                            // Invalid value, fall back to default.
                            $args['item_spacing'] = $defaults['item_spacing'];
                        }

                        if ('preserve' === $args['item_spacing']) {
                            $t = "\t";
                            $n = "\n";
                        } else {
                            $t = '';
                            $n = '';
                        }

                        /**
                         * Filters the arguments used to generate a page-based menu.
                         *
                         * @since 2.7.0
                         *
                         * @see wp_page_menu()
                         *
                         * @param array $args An array of page menu arguments. See wp_page_menu()
                         *                    for information on accepted arguments.
                         */
                        $args = apply_filters('wp_page_menu_args', $args);

                        $menu = '';

                        $list_args = $args;

                        // Show Home in the menu.
                        if (!empty($args['show_home'])) {
                            if (true === $args['show_home'] || '1' === $args['show_home'] || 1 === $args['show_home']) {
                                $text = __('Home', 'blockwp');
                            } else {
                                $text = $args['show_home'];
                            }
                            $class = '';
                            if (is_front_page() && !is_paged()) {
                                $class = 'class="current_page_item"';
                            }
                            $menu .= '<li ' . $class . '><a href="' . home_url('/') . '">' . $args['link_before'] . $text . $args['link_after'] . '</a></li>';
                            // If the front page is a page, add it to the exclude list.
                            if ('page' === get_option('show_on_front')) {
                                if (!empty($list_args['exclude'])) {
                                    $list_args['exclude'] .= ',';
                                } else {
                                    $list_args['exclude'] = '';
                                }
                                $list_args['exclude'] .= get_option('page_on_front');
                            }
                        }

                        $list_args['echo']     = false;
                        $list_args['title_li'] = '';
                        $menu                 .= wp_list_pages($list_args);

                        $container = sanitize_text_field($args['container']);

                        // Fallback in case `wp_nav_menu()` was called without a container.
                        if (empty($container)) {
                            $container = 'div';
                        }
                        $items = "";
                        if ($menu) {
                            $items .= '<li class="nav-item ct-nav-item">';
                            $items .= '<a class="nav-link close_nav" href="#"><i class="fa fa-times"></i></a>';
                            $items .= '</li>';

                            // wp_nav_menu() doesn't set before and after.
                            if (
                                isset($args['fallback_cb']) &&
                                'wp_page_menu' === $args['fallback_cb'] &&
                                'ul' !== $container
                            ) {
                                $args['before'] = "<ul>{$n}";
                                $args['after']  = '</ul>';
                            }

                            $menu = $args['before'] . $menu . $items . $args['after'];
                        }

                        $attrs = '';
                        if (!empty($args['menu_id'])) {
                            $attrs .= ' id="' . esc_attr($args['menu_id']) . '"';
                        }

                        if (!empty($args['menu_class'])) {
                            $attrs .= ' class="' . esc_attr($args['menu_class']) . '"';
                        }

                        $menu = "<{$container}{$attrs}>" . $menu . "</{$container}>{$n}";

                        /**
                         * Filters the HTML output of a page-based menu.
                         *
                         * @since 2.7.0
                         *
                         * @see wp_page_menu()
                         *
                         * @param string $menu The HTML output.
                         * @param array  $args An array of arguments. See wp_page_menu()
                         *                     for information on accepted arguments.
                         */
                        $menu = apply_filters('wp_page_menu', $menu, $args);

                        if ($args['echo']) {
                            echo $menu;
                        } else {
                            return $menu;
                        }
                    }
                }
