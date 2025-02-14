<?php
if (!function_exists('blockwp_top_footer_start')) {
    /**
     * Start top footer div
     *
     * @since 1.0.0
     */
    function blockwp_top_footer_start()
    {
?>
        <div class="footer-top">
            <?php
        }
    }
    add_action('blockwp_top_footer', 'blockwp_top_footer_start', 10);


    if (!function_exists('blockwp_top_footer_logo')) {
        /**
         * Add logo on footer
         *
         * @since 1.0.0
         */
        function blockwp_top_footer_logo()
        {
            if (1 == get_theme_mod('blockwp_footer_logo_option', 0) && !empty(get_theme_mod('blockwp_footer_logo_image'))) {
                $logo_url = esc_url(get_theme_mod('blockwp_footer_logo_image'));
                $logo_id = attachment_url_to_postid($logo_url);
            ?>
                <div class="footer-logo text-center">
                    <div class="container">
                        <a href="<?php echo esc_url(home_url()); ?>">
                            <?php echo wp_get_attachment_image($logo_id, 'full'); ?> </a>
                    </div>
                </div> <!-- .footer-top -->
            <?php
            }
        }
    }
    add_action('blockwp_top_footer', 'blockwp_top_footer_logo', 15);


    if (!function_exists('blockwp_top_footer_social')) {
        /**
         * Start social media links on footer
         *
         * @since 1.0.0
         */
        function blockwp_top_footer_social()
        {
            if (1 == get_theme_mod('blockwp_enable_social_menu_footer', 0)) {
            ?>
                <div class="footer-social-wrapper center-align">
                    <?php blockwp_social_menu(); ?>
                </div> <!-- .footer-social-wrapper -->
            <?php
            }
        }
    }
    add_action('blockwp_top_footer', 'blockwp_top_footer_social', 20);




    if (!function_exists('blockwp_top_footer_menu')) {
        /**
         * Start menu on footer
         *
         * @since 1.0.0
         */
        function blockwp_top_footer_menu()
        {
            if (1 == get_theme_mod('blockwp_enable_footer_menu', 0)) {
            ?>
                <div class="footer-menu-wrapper center-align">
                    <div class="container">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'footer-menu',
                                'menu_id'        => 'primary-menu',
                                'depth'             => 1
                            )
                        );
                        ?>
                    </div>
                </div> <!-- .footer-menu-wrapper -->
            <?php
            }
        }
    }
    add_action('blockwp_top_footer', 'blockwp_top_footer_menu', 25);

    if (!function_exists('blockwp_top_footer_end')) {
        /**
         * Close top footer div
         *
         * @since 1.0.0
         */
        function blockwp_top_footer_end()
        {
            ?>
        </div>
<?php
        }
    }
    add_action('blockwp_top_footer', 'blockwp_top_footer_end', 30);
