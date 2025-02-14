<?php
/**
 * Recommended plugins
 *
 * @package BlockWP
 */

if ( ! function_exists( 'blockwp_recommended_plugins' ) ) :

    /**
     * Recommend plugins.
     *
     * @since 1.0.0
     */
    function blockwp_recommended_plugins() {

        $plugins = array(
            array(
                'name'     => esc_html__( 'PostX Gutenberg Blocks for Post Grid', 'blockwp' ),
                'slug'     => 'ultimate-post',
                'required' => false,
            ),
        );

        tgmpa( $plugins );

    }

endif;

add_action( 'tgmpa_register', 'blockwp_recommended_plugins' );
