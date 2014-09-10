<?php

namespace Wordpress\Themes\Tradesman;

class Assets extends Theme {

	public function register_assets()
	{
		add_action('wp_enqueue_scripts', array($this, 'register_front_end_stylesheets'));
		add_action('wp_enqueue_scripts', array($this, 'register_front_end_scripts'));

		add_action('admin_enqueue_scripts', array($this, 'register_back_end_stylesheets'));
		add_action('admin_enqueue_scripts', array($this, 'register_back_end_scripts'));
	}

	public function register_front_end_stylesheets()
	{
		$stylesheets = $this->_get_front_end_stylesheets();
		$this->_register_stylesheets($stylesheets);
	}

	private function _get_front_end_stylesheets()
	{
        $color_scheme = of_get_option('tradesman_color_scheme');
        $color_scheme = $color_scheme ? $color_scheme : 'default';

		$stylesheets = (object) array(
            'font-awesome' => (object) array(
                'source' => get_stylesheet_directory_uri() . '/assets/css/icon-font/font-awesome.css',
                'dependencies' => FALSE,
                'version' => $this->theme_information->Version
            ),
			'front-end' => (object) array(
				'source' => get_stylesheet_directory_uri() . '/assets/css/app-'.$color_scheme.'.css',
				'dependencies' => FALSE,
				'version' => $this->theme_information->Version
			)
		);

		return $stylesheets;
	}

	public function register_back_end_stylesheets()
	{
		$stylesheets = $this->_get_back_end_stylesheets();
		$this->_register_stylesheets($stylesheets);
	}

	private function _get_back_end_stylesheets()
	{
		$stylesheets = (object) array(
			'font-awesome' => (object) array(
				'source' => '//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css',
				'dependencies' => FALSE,
				'version' => 'v4.1.0'
			),
			'back-end' => (object) array(
				'source' => get_stylesheet_directory_uri() . '/assets/styles/back-end-prefixed.css',
				'dependencies' => array('font-awesome'),
				'version' => $this->theme_information->Version
			)
		);

		return $stylesheets;
	}

	private function _register_stylesheets($stylesheets)
	{
		foreach($stylesheets as $handle => $data)
		{
			wp_register_style(
				$handle, $data->source, $data->dependencies, $data->version
			);
		}
	}

	public function register_front_end_scripts()
	{
		$scripts = $this->_get_front_end_scripts();
		$this->_register_scripts($scripts);
	}

	private function _get_front_end_scripts()
	{
		$scripts = (object) array(
			'tradesman-main' => (object) array(
				'source' => get_stylesheet_directory_uri() . '/assets/js/main.js',
				'dependencies' => array('jquery'),
				'version' => $this->theme_information->Version,
				'in_footer' => TRUE
			),
		);

		return $scripts;
	}

	public function register_back_end_scripts()
	{
		$scripts = $this->_get_back_end_scripts();
		$this->_register_scripts($scripts);
	}

	private function _get_back_end_scripts()
	{
		$scripts = (object) array(
			'back-end' => (object) array(
				'source' => get_stylesheet_directory_uri() . '/assets/scripts/back-end/back-end.min.js',
				'dependencies' => array('jquery'),
				'version' => $this->theme_information->Version,
				'in_footer' => TRUE
			),
		);

		return $scripts;
	}

	private function _register_scripts($scripts)
	{
		foreach($scripts as $handle => $data)
		{
			wp_register_script($handle, $data->source, $data->dependencies, $data->version, $data->in_footer);
		}
	}

	public function enqueue_assets()
	{
		add_action('wp_enqueue_scripts', array($this, 'enqueue_front_end_stylesheets'));
		add_action('wp_enqueue_scripts', array($this, 'enqueue_front_end_scripts'));

		add_action('admin_enqueue_scripts', array($this, 'enqueue_back_end_stylesheets'));
		add_action('admin_enqueue_scripts', array($this, 'enqueue_back_end_scripts'));
	}

	public function enqueue_front_end_stylesheets()
	{
		wp_enqueue_style('front-end');
	}

	public function enqueue_back_end_stylesheets()
	{
		wp_enqueue_style('back-end');
	}

	public function enqueue_back_end_scripts()
	{
		wp_enqueue_script('back-end');
		$translation_array = array('stylesheet_directory_uri' => get_stylesheet_directory_uri());
		wp_localize_script('back-end', 'wordpress', $translation_array);
	}

	public function enqueue_front_end_scripts()
	{
		$gravity_forms_settings = get_option('gravityformsaddon_gravityformswebapi_settings');
		$gravity_forms_private_key = $gravity_forms_settings['private_key'];
		$gravity_forms_public_key = $gravity_forms_settings['public_key'];

		wp_enqueue_script('tradesman-main');
		$translation_array = array(
			'stylesheet_directory_uri' => get_stylesheet_directory_uri(),
			'gf_public_key' => $gravity_forms_public_key,
			'gf_private_key' => $gravity_forms_private_key
		);
		wp_localize_script('tradesman-main', 'wordpress', $translation_array);
	}
}
