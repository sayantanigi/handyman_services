<?php
/**
 * Added blockwp Page. */

/**
 * Add a new page under Appearance
 */
function blockwp_menu()
{
	add_theme_page(__('BlockWP Options', 'blockwp'), __('BlockWP Options', 'blockwp'), 'edit_theme_options', 'blockwp-theme', 'blockwp_page');
}
add_action('admin_menu', 'blockwp_menu');

/**
 * Enqueue styles for the help page.
 */
function blockwp_admin_scripts($hook)
{
	if ('appearance_page_blockwp-theme' !== $hook) {
		return;
	}
	wp_enqueue_style('blockwp-admin-style', get_template_directory_uri() . '/candidthemes/about/about.css', array(), '');
}
add_action('admin_enqueue_scripts', 'blockwp_admin_scripts');

/**
 * Add the theme page
 */
function blockwp_page()
{
?>
<div class="das-wrap">
  <div class="blockwp-panel header">
    <div class="blockwp-logo">
      <img class="ts-logo"
        src="<?php echo esc_url(get_template_directory_uri() . '/candidthemes/about/images/blockwp-logo.png'); ?>"
        alt="Logo">
    </div>
    <p>
      <?php esc_html_e('A perfect theme for blog and magazine site. With masonry layout and multiple blog page layout, this theme is the awesome and minimal theme.', 'blockwp'); ?>
    </p>
    <a class="btn btn-primary" href="<?php echo esc_url(admin_url('/customize.php?'));
?>"><?php esc_html_e('Theme Options - Click Here', 'blockwp'); ?></a>
  </div>

  <div class="das-wrap-inner">
    <div class="das-col das-col-7">
      <div class="blockwp-panel">
        <div class="blockwp-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('Looking for theme Documentation?', 'blockwp'); ?></h3>
          </div>
          <a href="https://docs.candidthemes.com/blockwp/" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Documentation - Click Here', 'blockwp'); ?></a>
        </div>
      </div>
      <div class="blockwp-panel">
        <div class="blockwp-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('If you like the theme, please leave a review', 'blockwp'); ?></h3>
          </div>
          <a href="https://wordpress.org/support/theme/blockwp/reviews/?filter=5" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Rate this theme', 'blockwp'); ?></a>
        </div>
      </div>
      <div class="blockwp-panel">
        <div class="blockwp-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('View all Demos', 'blockwp'); ?></h3>
          </div>
          <a href="https://blockwp.candidthemes.com/" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Default Demo', 'blockwp'); ?></a>
          <a href="https://demo.candidthemes.com/blockwp-pro/" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('BlockWP Pro', 'blockwp'); ?></a>
          <a href="https://demo.candidthemes.com/blockwp-rtl/" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('BlockWP RTL', 'blockwp'); ?></a>
            <a href="https://demo.candidthemes.com/blockwp-postx/" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('PostX Demo', 'blockwp'); ?></a>
        </div>
      </div>
    </div>
    <div class="das-col das-col-3">
      <div class="upgrade-div">
        <p>
          <strong>
            <?php esc_html_e('Pro Features Include:', 'blockwp'); ?>
          </strong>
          </h4>
        <ul>
          <li>
          <?php esc_html_e('Author Information including social icons and descriptions.', 'blockwp'); ?>
          </li>
          <li>
          <?php esc_html_e('Write your own powered by text with link in HTML formats.', 'blockwp'); ?>
          </li>
          <li>
          <?php esc_html_e('Change search placeholder text easily and write your own text.', 'blockwp'); ?>            
          </li>
          <li>
          <?php esc_html_e('Make your menu sticky on the top for better user experience.', 'blockwp'); ?>  
          </li>
        </ul>
        <div class="text-center">
          <a href="https://www.candidthemes.com/themes/blockwp-pro/" target="_blank"
            class="btn btn-success"><?php esc_html_e('Upgrade Pro $49', 'blockwp'); ?></a>
        </div>
      </div>
      <div class="blockwp-panel">
        <div class="theme-title">
          <h3><?php esc_html_e('Important Links', 'blockwp'); ?></h3>
        </div>
        <div>
          <ul>
            <li>
              <a href="https://www.candidthemes.com/themes/blockwp/"><?php esc_html_e('Theme page', 'blockwp'); ?></a>
            </li>
            <li>
              <a href="https://www.candidthemes.com/support-tickets/"><?php esc_html_e('Support', 'blockwp'); ?></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="blockwp-panel">
        <div class="theme-title">
          <h3><?php esc_html_e('Other Popular Theme', 'blockwp'); ?></h3>
        </div>
        <a href="https://www.candidthemes.com/themes/fairy" target="_blank"
          class="btn btn-success"><?php esc_html_e('Fairy', 'blockwp'); ?></a>
      </div>
    </div>
  </div>
</div>
<?php
}