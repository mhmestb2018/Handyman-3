<?php

namespace Wordpress\Themes\Tradesman;

class AjaxMethods extends Utility {

    public function add_ajax_methods()
    {
        if(is_admin()) { 
            add_action('wp_ajax_example', array($this, 'example'));
            add_action('wp_ajax_nopriv_example', array($this, 'example'));
        }
    }

    public function example()
    {
        wp_die();
    }
}

