<?php
if (!function_exists('blockwp_footer_start')) {
    /**
     * Open footer tag
     *
     * @since 1.0.0
     */
    function blockwp_footer_start()
    {
?>
        <footer id="colophon" class="site-footer">
        <?php
    }
}
add_action('blockwp_before_footer', 'blockwp_footer_start', 10);

if (!function_exists('blockwp_footer_end')) {
    /**
     * Close footer tag
     *
     * @since 1.0.0
     */
    function blockwp_footer_end()
    {
        ?>
        </footer><!-- #colophon -->
        <?php
    }
}
add_action('blockwp_after_footer', 'blockwp_footer_end', 10);

if (!function_exists('blockwp_construct_gototop')) {
    /**
     * Add Go to Top Button on Site.
     *
     * @since 1.0.0
     *
     * @param none
     * @return void
     *
     */
    function blockwp_construct_gototop()
    {
        if (1 == get_theme_mod('blockwp_footer_to_top_option', 1)) :
        ?>
            <a href="javascript:void(0);" class="footer-go-to-top go-to-top"><i class="fas fa-long-arrow-alt-up"></i></a>
<?php
        endif;
    }
}
add_action('blockwp_gototop', 'blockwp_construct_gototop', 10);
