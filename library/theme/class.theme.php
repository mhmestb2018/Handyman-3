<?php

namespace Wordpress\Themes\Tradesman;

class Theme
{

    public $theme_information = FALSE;

    public function __construct()
    {
        $this->theme_information = $this->_get_theme_information();
    }

    public function run()
    {
        // Instantiated classes and libraries.
        $this->_register_utility();
        $this->_manage_assets();
        $this->_manage_plugin_dependencies();
        $this->_manage_post_types();
        $this->_manage_meta_boxes();
        $this->_register_ajax_methods();
        $this->_register_shortcodes();

        add_action('init', array($this, 'register_menus'));
        add_action('admin_init', array($this, 'hide_editor'));
    }

    private function _get_theme_information()
    {
        return wp_get_theme();
    }

    private function _register_utility()
    {
        $this->_require_from_library('theme', 'class.utility.php');
    }

    private function _manage_assets()
    {
        $this->_require_from_library('theme', 'class.assets.php');

        $assets = new Assets();
        $assets->register_assets();
        $assets->enqueue_assets();
    }

    private function _require_from_library($folder, $file)
    {
        $file = trailingslashit(STYLESHEETPATH . '/library/' . $folder) . $file;

        if (!file_exists($file)) {
            wp_die("The file at location {$file} doesn't exist. Check your paths!");
        }

        require_once $file;
    }

	private function _manage_plugin_dependencies()
	{
		$this->_require_from_library('plugin-activation', 'class-tgm-plugin-activation.php');

		add_filter('tgmpa_register', array($this, 'register_plugin_dependencies'));
	}

	public function register_plugin_dependencies()
	{
		$plugins = $this->_get_plugin_dependencies();

		$config = array(
				'id' => 'tgmpa',
				'default_path' => '',
				'menu' => 'tgmpa-install-plugins',
				'has_notices' => TRUE,
				'dismissable' => FALSE,
				'dismiss_msg' => '',
				'is_automatic' => FALSE,
				'message' => '',
				'strings' => array(
						'page_title' => __('Install Required Plugins', 'tgmpa'),
						'menu_title' => __('Install Plugins', 'tgmpa'),
						'installing' => __('Installing Plugin: %s', 'tgmpa'),
						'oops' => __('Something went wrong with the plugin API.', 'tgmpa'),
						'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'tgmpa' ),
						'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'tgmpa' ),
						'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'tgmpa'),
						'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'tgmpa'),
						'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'tgmpa'),
						'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'tgmpa'),
						'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'tgmpa'),
						'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'tgmpa'),
						'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins', 'tgmpa'),
						'activate_link' => _n_noop('Begin activating plugin', 'Begin activating plugins', 'tgmpa'),
						'return' => __('Return to Required Plugins Installer', 'tgmpa'),
						'plugin_activated' => __('Plugin activated successfully.', 'tgmpa'),
						'complete' => __('All plugins installed and activated successfully. %s', 'tgmpa'),
						'nag_type' => 'error'
				)
		);

		tgmpa($plugins, $config);
	}

	private function _get_plugin_dependencies()
	{
		return array(
			array(
				'name' => 'Force Strong Passwords',
				'slug' => 'force-strong-passwords',
				'required' => TRUE,
			),
			array(
				'name' => 'WordPress SEO',
				'slug' => 'wordpress-seo',
				'required' => TRUE,
			)
		);
	}

	private function _manage_post_types()
	{
		$this->_require_from_library('theme', 'class.post-types.php');

		$post_types = new PostTypes();
        add_action('init', array($post_types, 'register_testimonials_post_type'));
        add_action('init', array($post_types, 'register_services_post_type'));
        add_action('init', array($post_types, 'register_team_members_post_type'));
	}

	private function _manage_meta_boxes()
	{
		define('RWMB_URL', trailingslashit(get_stylesheet_directory_uri() . '/library/meta-box'));
		define('RWMB_DIR', trailingslashit(STYLESHEETPATH . '/library/meta-box'));

		$this->_require_from_library('meta-box', 'meta-box.php');
		$this->_require_from_library('theme', 'class.meta-boxes.php');

        $meta_boxes = new MetaBoxes();
        //$meta_boxes = $meta_boxes_obj->get_meta_boxes();
        add_filter('rwmb_meta_boxes', array($meta_boxes, 'get_meta_boxes'));
	}

	private function _register_ajax_methods()
	{
		$this->_require_from_library('theme', 'class.ajax-methods.php');
		$ajax_methods = new AjaxMethods();
		$ajax_methods->add_ajax_methods();
	}

	private function _register_shortcodes()
	{
		$this->_require_from_library('theme', 'class.shortcodes.php');
		$shortcodes = new ShortCodes();
		$shortcodes->add_shortcodes();
	}

	public function register_menus()
	{
		$this->_require_walker_library();

		register_nav_menus(
			array(
				'header_navigation' => __('Header Navigation'),
				'footer_navigation' => __('Footer Navigation')
			)
		);
	}

	private function _require_walker_library()
	{
		$file = trailingslashit(STYLESHEETPATH . '/library/custom-walker') . 'class.tradesman_walker.php';

		if(!file_exists($file))
		{
			wp_die("The file at location {$file} doesn't exist. Check your paths!");
		}

		require_once $file;
	}

    /**
     * Hide editor on specific pages.
     *
     */
    public function hide_editor()
    {
        // Get the Post ID.
        $post_id = false;

        if (isset($_GET['post'])) {
            $post_id = $_GET['post'];
        }

        if (isset($_GET['post_ID'])) {
            $post_id = $_GET['post_ID'];
        }

        if(!$post_id) {
            return;
        }

        // Hide the editor on a page with a specific page template
        // Get the name of the Page Template file.
        $template = get_post_meta($post_id, '_wp_page_template', true);

        $hide_from_templates = array(MetaBoxes::HOMEPAGE_TEMPLATE, MetaBoxes::SERVICES_TEMPLATE);

        if(in_array($template, $hide_from_templates)){ // the filename of the page template
            remove_post_type_support('page', 'editor');
        }
    }
}
