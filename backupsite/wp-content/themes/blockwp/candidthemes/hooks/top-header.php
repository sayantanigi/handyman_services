<?php
if (!function_exists('blockwp_do_skip_to_content_link')) {
    /**
     * Add skip to content link before the header.
     *
     * @since 1.0.0
     */

    function blockwp_do_skip_to_content_link()
    {
?>
        <a class='skip-link screen-reader-text' href='#ct-content-area'>
            <?php esc_html_e('Skip to content', 'blockwp'); ?>
        </a>
        <?php
    }
}
add_action('blockwp_before_header', 'blockwp_do_skip_to_content_link', 10);

if (!function_exists('blockwp_offcanvas_sidebar_block')) {
    /**
     * Show offcanvas sidebar if enabled from customizer
     *
     * @since 1.0.0
     */

    function blockwp_offcanvas_sidebar_block()
    {
        if (1 == get_theme_mod('blockwp_enable_offcanvas', 1)) {
        ?>

            <div id='offcanvas-sidebar' class='offcanvas-sidenav'>
                <button class='close-btn'><i class='fa fa-times'></i></button>
                <?php if (is_active_sidebar('offcanvas-sidebar')) { ?>
                    <?php dynamic_sidebar('offcanvas-sidebar'); ?>
                <?php
                } else { ?>
                    <div class="default-widgets">
                        <?php the_widget('WP_Widget_Recent_Posts'); ?>
                        <div class="widget widget_categories">
                            <h2 class="widget-title"><?php esc_html_e('Most Used Categories', 'blockwp'); ?></h2>
                            <ul>
                                <?php
                                wp_list_categories(array(
                                    'orderby'    => 'count',
                                    'order'      => 'DESC',
                                    'show_count' => 1,
                                    'title_li'   => '',
                                    'number'     => 10,
                                ));
                                ?>
                            </ul>
                        </div>
                    </div>
                <?php }
                ?>
            </div>
        <?php
        }
    }
}
add_action(
    'blockwp_offcanvas_sidebar_enable',
    'blockwp_offcanvas_sidebar_block',
    10
);

if (!function_exists('blockwp_page_wrapper_block')) {
    /**
     * Page wrapper div open
     *
     * @since 1.0.0
     */

    function blockwp_page_wrapper_block()
    {
        ?>
        <div id='page' class='site'>
        <?php
    }
}
add_action('blockwp_page_wrapper', 'blockwp_page_wrapper_block', 10);

if (!function_exists('blockwp_header_start')) {
    /**
     * Header open
     *
     * @since 1.0.0
     */

    function blockwp_header_start()
    {
        ?>
            <header id='masthead' class='site-header'>
            <?php
        }
    }
    add_action('blockwp_before_header', 'blockwp_header_start', 10);

    if (!function_exists('blockwp_header_end')) {
        /**
         * Header end
         *
         * @since 1.0.0
         */

        function blockwp_header_end()
        {
            ?>
            </header><!-- #masthead -->
        <?php
        }
    }
    add_action('blockwp_after_header', 'blockwp_header_end', 10);

    if (!function_exists('blockwp_top_header_enable')) {
        /**
         * Enable/Disable Top Header
         *
         * @since 1.0.0
         */

        function blockwp_top_header_enable()
        {
            if (1 != get_theme_mod('blockwp_enable_top_header', 0)) {
                return false;
            }

            /**
             * blockwp_top_header_block hook.
             *
             * @since 1.0.0
             *
             * @hooked blockwp_top_header_start  - 10
             * @hooked blockwp_top_header_mobile_toggle  - 15
             * @hooked blockwp_top_header_row_start  - 20
             * @hooked blockwp_top_header_menu  - 25
             * @hooked blockwp_top_header_contact  - 30       *
             * @hooked blockwp_top_header_social  - 35
             * @hooked blockwp_top_header_button  - 40
             * @hooked blockwp_top_header_row_end  - 45
             * @hooked blockwp_top_header_end  - 50
             *
             */
            do_action('blockwp_top_header_block');
        }
    }
    add_action('blockwp_top_header', 'blockwp_top_header_enable', 10);

    if (!function_exists('blockwp_top_header_start')) {
        /**
         * Top header start
         *
         * @since 1.0.0
         */

        function blockwp_top_header_start()
        {
        ?>
            <div class='site-header-topbar'>
                <div class='container'>
                <?php
            }
        }
        add_action('blockwp_top_header_block', 'blockwp_top_header_start', 10);

        if (!function_exists('blockwp_top_header_mobile_toggle')) {
            /**
             * Mobile Toggle Section
             *
             * @since 1.0.0
             */

            function blockwp_top_header_mobile_toggle()
            {
                ?>
                    <div class='header-top-toggle mbl-show text-center'>
                        <a href='#'> <i class='fas fa-chevron-down'></i> </a>
                    </div>
                <?php
            }
        }
        add_action('blockwp_top_header_block', 'blockwp_top_header_mobile_toggle', 15);

        if (!function_exists('blockwp_top_header_row_start')) {
            /**
             * Top header row start
             *
             * @since 1.0.0
             */

            function blockwp_top_header_row_start()
            {
                ?>
                    <div class='row mbl-hide'>
                    <?php
                }
            }
            add_action('blockwp_top_header_block', 'blockwp_top_header_row_start', 20);

            if (!function_exists('blockwp_top_header_menu')) {
                /**
                 * Top header Menu
                 *
                 * @since 1.0.0
                 */

                function blockwp_top_header_menu()
                {
                    ?>
                        <div class='col-sm-1-2'>
                            <?php if (
                                1 == get_theme_mod('blockwp_enable_top_menu', 1)
                            ) { ?>
                                <nav class='site-header-top-nav'>

                                    <?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'top-menu',
                                        'container' => 'ul',
                                        'menu_class' => 'menu site-header-top-menu',
                                        'menu_id' => 'menu-top-menu',
                                        'depth' => 1
                                    ));
                                    ?>
                                </nav>
                            <?php } ?>
                        </div>
                    <?php
                }
            }
            add_action('blockwp_top_header_block', 'blockwp_top_header_menu', 25);

            if (!function_exists('blockwp_top_header_contact')) {
                /**
                 * Top header Contact
                 *
                 * @since 1.0.0
                 */

                function blockwp_top_header_contact()
                {
                    ?>
                        <div class='col-sm-1-2 header-contact'>
                            <?php
                            if (
                                1 == get_theme_mod('blockwp_enable_top_phone', 1) && !empty(get_theme_mod('blockwp_add_top_phone_number', __('+0123456789', 'blockwp')))
                            ) {
                                $phone = get_theme_mod('blockwp_add_top_phone_number', __('+0123456789', 'blockwp'));
                            ?>
                                <span class='mbl-block header-contact-item'>
                                    <a href='tel:<?php echo esc_attr($phone); ?>'> <i class='fas fa-phone-alt'></i> <?php echo esc_html($phone); ?></a>
                                </span>
                            <?php }
                            if (
                                1 == get_theme_mod('blockwp_enable_top_email', 1) && !empty(get_theme_mod('blockwp_add_email_address', __('hello@candidthemes.com', 'blockwp')))
                            ) {
                                $email = get_theme_mod('blockwp_add_email_address', __('hello@candidthemes.com', 'blockwp'));
                            ?>
                                <span class='mbl-block header-contact-item'>
                                    <a href='mailto:<?php echo esc_attr($email); ?>'> <i class='fas fa-envelope'></i> <?php echo esc_html($email); ?></a>
                                </span>
                            <?php } ?>
                        </div>
                        <?php
                    }
                }
                add_action('blockwp_top_header_block', 'blockwp_top_header_contact', 30);

                if (!function_exists('blockwp_top_header_social')) {
                    /**
                     * Top header Social for Mobile
                     *
                     * @since 1.0.0
                     */

                    function blockwp_top_header_social()
                    {
                        if (
                            1 == get_theme_mod('blockwp_enable_social_menu', 0)
                        ) {
                        ?>
                            <div class='col mbl-show'>
                                <?php
                                blockwp_social_menu();
                                ?>
                            </div>
                        <?php
                        }
                    }
                }
                add_action('blockwp_top_header_block', 'blockwp_top_header_social', 35);

                if (!function_exists('blockwp_top_header_button')) {
                    /**
                     * Top header Button
                     *
                     * @since 1.0.0
                     */

                    function blockwp_top_header_button()
                    {
                        if (
                            !empty(get_theme_mod('blockwp_menu_button_link', __('#', 'blockwp'))) && !empty(get_theme_mod('blockwp_menu_button_text', __('Subscribe', 'blockwp')))
                        ) {
                        ?>
                            <div class='col mbl-show'>
                                <?php
                                blockwp_show_menu_button();
                                ?>
                            </div>
                        <?php
                        }
                    }
                }
                add_action('blockwp_top_header_block', 'blockwp_top_header_button', 40);

                if (!function_exists('blockwp_top_header_row_end')) {
                    /**
                     * Top header row start
                     *
                     * @since 1.0.0
                     */

                    function blockwp_top_header_row_end()
                    {
                        ?>
                    </div> <!-- .row.mbl-hide -->
                <?php
                    }
                }
                add_action('blockwp_top_header_block', 'blockwp_top_header_row_end', 45);

                if (!function_exists('blockwp_top_header_end')) {
                    /**
                     * Top header end
                     *
                     * @since 1.0.0
                     */

                    function blockwp_top_header_end()
                    {
                ?>
                </div>
            </div> <!-- .site-header-topbbar -->
    <?php
                    }
                }
                add_action('blockwp_top_header_block', 'blockwp_top_header_end', 50);
