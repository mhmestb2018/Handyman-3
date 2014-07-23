<?php

namespace Wordpress\Themes\Tradesman;

class PostTypes
{
    public function register_testimonials_post_type()
    {
        $arguments = array(
            'public' => true,
            'labels' => array(
                'name' => __('Testimonials'),
                'singular_name' => __('Testimonial'),
                'add_new' => __('Add New Testimonial'),
                'add_new_item' => __('Add New Testimonial'),
            ),
            'supports' => array('title', 'revisions'),
            'has_archive' => true,
            //'rewrite' => array('slug' => 'testimonials'),
            'publicly_queryable' => true,
            'query_var' => 'people',
            'show_in_nav_menus' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'can_export' => true,
            'exclude_from_search' => false,
            'menu_icon' => 'dashicons-format-chat'
        );

        register_post_type('testimonials', $arguments);
    }

    public function register_services_post_type()
    {
        $arguments = array(
            'public' => true,
            'labels' => array(
                'name' => __('Services'),
                'singular_name' => __('Service'),
                'add_new' => __('Add New Service'),
                'add_new_item' => __('Add New Service'),
            ),
            'supports' => array('title', 'revisions'),
            'has_archive' => true,
            //'rewrite' => array('slug' => 'services'),
            'publicly_queryable' => true,
            'query_var' => 'people',
            'show_in_nav_menus' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'can_export' => true,
            'exclude_from_search' => false,
            'menu_icon' => 'dashicons-hammer'
        );

        register_post_type('services', $arguments);
    }

    public function register_team_members_post_type()
    {
        $arguments = array(
            'public' => true,
            'labels' => array(
                'name' => __('Team Members'),
                'singular_name' => __('Team Member'),
                'add_new' => __('Add New Team Member'),
                'add_new_item' => __('Add New Team Member'),
            ),
            'supports' => array('title', 'revisions'),
            'has_archive' => true,
            //'rewrite' => array('slug' => 'team-member'),
            'publicly_queryable' => true,
            'query_var' => 'people',
            'show_in_nav_menus' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'can_export' => true,
            'exclude_from_search' => false,
            'menu_icon' => 'dashicons-admin-users'
        );

        register_post_type('team-members', $arguments);
    }
}
