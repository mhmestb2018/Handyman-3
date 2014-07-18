<?php

require_once 'library/theme/class.theme.php';

$theme = new Wordpress\Themes\Tradesman\Theme();
$theme->run();



/*====================================*\
	THEME SETTINGS PANEL
\*====================================*/

get_template_part('pbpanel/core');

function pbpanel_add_styles() {
    // Register our main stylesheet
    wp_register_style('pbpanel-style', get_template_directory_uri() . '/pbpanel/css/pbpanel.css', array(), '1.0', 'all');
    // Loads our main stylesheet
    wp_enqueue_style('pbpanel-style');
}
function pbpanel_add_scripts() {
    // Register js files
    wp_register_script('pbpanel-scripts', get_template_directory_uri() . '/pbpanel/js/pbpanel.js', array('jquery'), '1.0', true);
    // Loads js files
    wp_enqueue_script('pbpanel-scripts');
}
add_action('admin_enqueue_scripts', 'pbpanel_add_styles');
add_action('admin_enqueue_scripts', 'pbpanel_add_scripts');

function pbpanel_init(){
    pbpanel_options('add_option');
}
function pbpanel_menu() {
    add_menu_page(__('Theme Settings', 'tradesman'), __('Theme Settings', 'tradesman'), 'manage_options', 'pbpanel-main', 'pbpanel_render_main', get_template_directory_uri() . '/pbpanel/images/icon-logo.png', 61);
    add_submenu_page('pbpanel-main', __('Main', 'tradesman'), __('Main', 'tradesman'), 'manage_options', 'pbpanel-main', 'pbpanel_render_main');
    add_submenu_page('pbpanel-main', __('Branding', 'tradesman'), __('Branding', 'tradesman'), 'manage_options', 'pbpanel-branding', 'pbpanel_render_branding');
    add_submenu_page('pbpanel-main', __('Slider', 'tradesman'), __('Slider', 'tradesman'), 'manage_options', 'pbpanel-slider', 'pbpanel_render_slider');
    add_submenu_page('pbpanel-main', __('SEO', 'tradesman'), __('SEO', 'tradesman'), 'manage_options', 'pbpanel-seo', 'pbpanel_render_seo');
    add_submenu_page('pbpanel-main', __('Social Networks', 'tradesman'), __('Social Networks', 'tradesman'), 'manage_options', 'pbpanel-socialnetworks', 'pbpanel_render_socialnetworks');
    add_submenu_page('pbpanel-main', __('Reset', 'tradesman'), __('Reset', 'tradesman'), 'manage_options', 'pbpanel-reset', 'pbpanel_render_reset');
}
function pbpanel_render_main() {
    get_template_part('pbpanel/page-main');
}
function pbpanel_render_branding() {
    get_template_part('pbpanel/page-branding');
}
function pbpanel_render_slider() {
    get_template_part('pbpanel/page-slider');
}
function pbpanel_render_seo() {
    get_template_part('pbpanel/page-seo');
}
function pbpanel_render_socialnetworks() {
    get_template_part('pbpanel/page-socialnetworks');
}
function pbpanel_render_reset() {
    get_template_part('pbpanel/page-reset');
}
add_action('admin_init', 'pbpanel_init');
add_action('admin_menu', 'pbpanel_menu');

/* End of file functions.php */
/* Location: ./wp-content/themes/%THEMEFOLDER%/functions.php */
