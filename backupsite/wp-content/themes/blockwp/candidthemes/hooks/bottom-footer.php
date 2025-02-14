<?php
if (!function_exists('blockwp_bottom_footer_start')) {
    /**
     * Start bottom footer div
     *
     * @since 1.0.0
     */
    function blockwp_bottom_footer_start()
    {
?>
        <div class="container footer-bottom">
            <div class="row">
            <?php
        }
    }
    add_action('blockwp_bottom_footer', 'blockwp_bottom_footer_start', 10);


    if (!function_exists('blockwp_bottom_footer_info')) {
        /**
         * Add copyright info on footer
         *
         * @since 1.0.0
         */
        function blockwp_bottom_footer_info()
        {
            ?>
                <div class="site-info col-md-1-2">
                    <?php
                    if (!empty(get_theme_mod('blockwp_footer_copyright_text', __('Copyright All Rights Reserved', 'blockwp')))) {
                        echo esc_html(get_theme_mod('blockwp_footer_copyright_text', __('Copyright All Rights Reserved', 'blockwp')));
                    ?>
                        <span class="sep"> | </span>
                    <?php
                    }
                    ?>
                    <?php
                    /* translators: 1: Theme name, 2: Theme author. */
                    printf(esc_html__('Theme: %1$s by %2$s.', 'blockwp'), 'BlockWP', '<a href="https://www.candidthemes.com/">Candid Themes</a>');
                    ?>
                </div><!-- .site-info -->
                <?php
            }
        }
        add_action('blockwp_bottom_footer', 'blockwp_bottom_footer_info', 15);

        if (!function_exists('blockwp_bottom_footer_search')) {
            /**
             * Add search form on footer
             *
             * @since 1.0.0
             */
            function blockwp_bottom_footer_search()
            {
                if (1 == get_theme_mod('blockwp_footer_search_option', 1)) {
                ?>
                    <div class="footer-bottom-right col-md-1-2">
                        <?php get_search_form(); ?>
                    </div> <!-- .footer-bottom-right -->
                <?php
                }
            }
        }
        add_action('blockwp_bottom_footer', 'blockwp_bottom_footer_search', 20);

        if (!function_exists('blockwp_bottom_footer_end')) {
            /**
             * Close bottom footer div
             *
             * @since 1.0.0
             */
            function blockwp_bottom_footer_end()
            {
                ?>
            </div> <!-- .row -->
        </div> <!-- .container -->
<?php
            }
        }
        add_action('blockwp_bottom_footer', 'blockwp_bottom_footer_end', 25);
