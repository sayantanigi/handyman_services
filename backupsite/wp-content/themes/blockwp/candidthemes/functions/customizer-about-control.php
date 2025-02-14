<?php 
// Doing this customizer thang!
if ( ! class_exists( 'Blockwp_Customize_Static_Text_Control' ) ){
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;
class Blockwp_Customize_Static_Text_Control extends WP_Customize_Control {
	/**
	 * Control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'static-text';

	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
	}

	protected function render_content() {
			?>
		<div class="description customize-control-description">
			
			<h2><?php esc_html_e('About BlockWP', 'blockwp')?></h2>
			<p><?php esc_html_e('BlockWP is clean and minimal WordPress theme for blog website.', 'blockwp')?> </p>
			<p>
				<a href="<?php echo esc_url('https://blockwp.candidthemes.com/'); ?>" target="_blank"><?php esc_html_e( 'BlockWP Demos', 'blockwp' ); ?></a>
			</p>
			<h3><?php esc_html_e('Documentation', 'blockwp')?></h3>
			<p><?php esc_html_e('Read documentation to learn more about theme.', 'blockwp')?> </p>
			<p>
				<a href="<?php echo esc_url('http://docs.candidthemes.com/blockwp/'); ?>" target="_blank"><?php esc_html_e( 'BlockWP Documentation', 'blockwp' ); ?></a>
			</p>
			
			<h3><?php esc_html_e('Support', 'blockwp')?></h3>
			<p><?php esc_html_e('For support, Kindly contact us and we would be happy to assist!', 'blockwp')?> </p>
			
			<p>
				<a href="<?php echo esc_url('https://www.candidthemes.com/support-tickets/'); ?>" target="_blank"><?php esc_html_e( 'BlockWP Support', 'blockwp' ); ?></a>
			</p>
			<h3><?php esc_html_e( 'Rate This Theme', 'blockwp' ); ?></h3>
			<p><?php esc_html_e('If you like blockwp Kindly Rate this Theme', 'blockwp')?> </p>
			<p>
				<a href="<?php echo esc_url('https://wordpress.org/support/theme/blockwp/reviews/#new-post'); ?>" target="_blank"><?php esc_html_e( 'Add Your Review', 'blockwp' ); ?></a>
			</p>
			</div>
			
		<?php
	}

}
}