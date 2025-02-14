<?php
if (!function_exists('blockwp_main_header_wrapper_start')) {
    /**
     * Add wrapper div to main header and navigation.
     *
     * @since 1.0.0
     */
    function blockwp_main_header_wrapper_start()
    {
?>
        <div class="site-main-header-wrapper">

        <?php
    }
}
add_action('blockwp_before_main_header_navigation', 'blockwp_main_header_wrapper_start', 10);

if (!function_exists('blockwp_main_header_start')) {
    /**
     * Add start div to main header.
     *
     * @since 1.0.0
     */
    function blockwp_main_header_start()
    {
        ?>
            <div class="site-main-header">
                <div class="container">
                    <div class="row">
                    <?php
                }
            }
            add_action('blockwp_before_main_header', 'blockwp_main_header_start', 10);

            if (!function_exists('blockwp_main_header_offcanvas_menu')) {
                /**
                 * Add Offcanvas menu on main header.
                 *
                 * @since 1.0.0
                 */
                function blockwp_main_header_offcanvas_menu()
                {
                    ?>
                        <div class="col-sm-1-4 mbl-hide">
                            <?php
                            if (
                                1 == get_theme_mod('blockwp_enable_social_menu', 0)
                            ) {
                                blockwp_social_menu();
                            }
                            ?>
                        </div>
                    <?php
                }
            }
            add_action('blockwp_main_header', 'blockwp_main_header_offcanvas_menu', 10);

            if (!function_exists('blockwp_main_header_branding')) {
                /**
                 * Add Logo section on main header.
                 *
                 * @since 1.0.0
                 */
                function blockwp_main_header_branding()
                {
                    ?>
                        <div class="col-sm-1-2">
                            <div class="site-branding">
                                <?php
                                the_custom_logo();
                                if (is_front_page() && is_home()) : ?>
                                    <h1 class="site-title">
                                        <a href="<?php echo esc_url(
                                                        home_url('/')
                                                    ); ?>" rel="home"><?php bloginfo('name'); ?>
                                        </a>
                                    </h1>
                                <?php else : ?>
                                    <p class="site-title"><a href="<?php echo esc_url(
                                                                        home_url('/')
                                                                    ); ?>" rel="home"><?php bloginfo(
                                                                                            'name'
                                                                                        ); ?></a></p>
                                <?php endif;
                                $blockwp_description = get_bloginfo(
                                    'description',
                                    'display'
                                );
                                if (
                                    $blockwp_description ||
                                    is_customize_preview()
                                ) : ?>
                                    <p class="site-description"><?php echo $blockwp_description;
                                                                // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                                                ?></p>
                                <?php endif; ?>
                            </div><!-- .site-branding -->
                        </div>
                    <?php
                }
            }
            add_action('blockwp_main_header', 'blockwp_main_header_branding', 15);

            if (!function_exists('blockwp_main_header_button')) {
                /**
                 * Add Button  to main header.
                 *
                 * @since 1.0.0
                 */
                function blockwp_main_header_button()
                {
                    ?>
                        <div class="col-sm-1-4 text-right mbl-hide">
                            <?php
                            if (
                                !empty(get_theme_mod('blockwp_menu_button_link', __('#', 'blockwp'))) && !empty(get_theme_mod('blockwp_menu_button_text', __('Subscribe', 'blockwp')))
                            ) {
                                blockwp_show_menu_button();
                            }
                            ?>
                        </div>
                    <?php
                }
            }
            add_action('blockwp_main_header', 'blockwp_main_header_button', 20);

            if (!function_exists('blockwp_main_header_end')) {
                /**
                 * Add end div to main header.
                 *
                 * @since 1.0.0
                 */
                function blockwp_main_header_end()
                {
                    ?>
                    </div>
                </div>
            </div> <!-- .main-header -->
    <?php
                }
            }
            add_action('blockwp_after_main_header', 'blockwp_main_header_end', 10);
