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
        $this->_register_widgets();
        $this->_manage_assets();
        $this->_manage_plugin_dependencies();
        $this->_manage_meta_boxes();
        $this->_register_ajax_methods();
        $this->_set_content_width();
        $this->_set_theme_support();

        add_action('init', array($this, 'register_menus'));
        add_action('admin_init', array($this, 'hide_editor'));
        add_action('wp_head', array($this, 'output_primary_color'));

        add_filter('esc_html', array($this, 'rename_post_formats'));
        add_filter('admin_head', array($this, 'live_rename_formats'));
    }

    private function _get_theme_information()
    {
        return wp_get_theme();
    }

    private function _register_utility()
    {
        $this->_require_from_library('theme', 'class.utility.php');
    }

    private function _register_widgets()
    {
        $this->_require_from_library('theme', 'class.sidebars.php');
        $this->_require_from_library('theme', 'class.gmap.widget.php');
        $this->_require_from_library('theme', 'class.services.widget.php');
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
				'dismissable' => TRUE,
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
				'name' => 'Contact Form 7',
				'slug' => 'contact-form-7',
				'required' => TRUE,
			),
			array(
				'name' => 'Flamingo',
				'slug' => 'flamingo',
				'required' => FALSE,
			)
		);
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

	public function register_menus()
	{
		$this->_require_walker_library();

		register_nav_menus(
			array(
				'header_navigation' => __('Header Navigation', 'tgmpa'),
				'footer_navigation' => __('Footer Navigation', 'tgmpa')
			)
		);
	}

    private function _set_content_width() {
        if (!isset($content_width)) {
            $content_width = 1180;
        }
    }

    private function _set_theme_support() {
        // rss thingy
        add_theme_support('automatic-feed-links');

        add_theme_support('post-thumbnails');

        add_theme_support('post-formats', array('aside', 'gallery', 'quote'));
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

        $hide_from_templates = array(
            MetaBoxes::HOMEPAGE_TEMPLATE,
            MetaBoxes::SERVICES_TEMPLATE,
            MetaBoxes::TESTIMONIALS_TEMPLATE
        );

        if(in_array($template, $hide_from_templates)) { // the filename of the page template
            remove_post_type_support('page', 'editor');
        }

        // Hide the editor on a page with a specific post format
        // Get the name of the post format.
        $format = get_post_format($post_id);

        $hide_from_format = array(
            MetaBoxes::TEAM_MEMBER_FORMAT,
            MetaBoxes::SERVICE_FORMAT,
            MetaBoxes::TESTIMONIAL_FORMAT
        );

        if(in_array($format, $hide_from_format)) {
            remove_post_type_support('post', 'editor');
            remove_post_type_support('post', 'thumbnail');
            remove_meta_box('tagsdiv-post_tag', 'post', 'side');
            remove_meta_box('categorydiv', 'post', 'side');
        }
    }

    public function output_primary_color() {
        $primary_color = of_get_option('tradesman_primary_color');

        if ($primary_color) {
            $output = '<style type="text/css" media="screen">';
            $output .= ".primary-color {color : ".$primary_color." !important;} ";
            $output .= ".primary-color-bg-before:before {background : ".$primary_color." !important;} ";
            $output .= 'input[type="submit"] {background-color: '.$primary_color.'} ';
            $output .= 'input[type="submit"]:hover {background-color: '.Utility::adjust_brightness($primary_color, -30).'} ';
            $output .= '</style>';

            echo $output;
        }
    }

    public function rename_post_formats( $safe_text ) {
        if ($safe_text == 'Aside') {
            return 'Testimonial';
        }else if ($safe_text == 'Gallery') {
            return 'Service';
        }else if ($safe_text == 'Quote') {
            return 'Team Member';
        }

        return $safe_text;
    }


    //rename Aside in posts list table
    public function live_rename_formats() {
        global $current_screen;

        if ( $current_screen->id == 'edit-post' ) { ?>
            <script type="text/javascript">
                jQuery('document').ready(function() {
                    jQuery("span.post-state-format").each(function() {
                        var el = jQuery(this);
                        var name = el.text();

                        if (name == "Aside") {
                            el.text("Testimonial");
                        }else if (name == "Gallery") {
                            el.text("Service");
                        }else if (name == "Quote") {
                            el.text("Team Member");
                        }
                    });
                });
            </script>
        <?php }

        //reassign the post format icons to represent the handyman format types
        $output = '<style type="text/css" media="screen">';
        $output .= '.post-format-icon.post-format-aside:before, .post-state-format.post-format-aside:before, a.post-state-format.format-aside:before {content: "\f125";}';
        $output .= '.post-format-icon.post-format-gallery:before, .post-state-format.post-format-gallery:before, a.post-state-format.format-gallery:before {content: "\f308";}';
        $output .= '.post-format-icon.post-format-quote:before, .post-state-format.post-format-quote:before, a.post-state-format.format-quote:before {content: "\f110";}';
        $output .= '</style>';

        echo $output;
    }

}
