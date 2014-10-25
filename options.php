<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

    // This gets the theme name from the stylesheet
    $themename = get_option( 'stylesheet' );
    $themename = preg_replace("/\W/", "_", strtolower($themename) );

    $optionsframework_settings = get_option( 'optionsframework' );
    $optionsframework_settings['id'] = $themename;
    update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {
    //the color options for the theme
    $color_scheme_array = array(
        'default' => 'Default',
        'blue' => 'Blue',
        'orange' => 'Orange',
        'purple' => 'Purple',
        'red' => 'Red',
        'yellow' => 'Yellow'
    );

    //load the pages for selecting the contact page
    $args = array(
        'post_type' => 'page',
        'posts_per_page' => -1,
    );

    $page_query = new WP_Query($args);
    $pages = $page_query->get_posts();
    $page_options = array(-1 => 'None');

    foreach ($pages as $page) {
        $page_options[$page->ID] = $page->post_title;
    }

    $options = array();

    $options[] = array(
        'name' => __('Tradesman Theme Settings', 'options_framework_theme'),
        'type' => 'heading');

    $options[] = array(
        'name' => __('Logo Text', 'options_framework_theme'),
        'desc' => __('', 'options_framework_theme'),
        'id' => 'tradesman_company_name',
        'type' => 'text');

    $options[] = array(
        'name' => __('Logo Image', 'options_framework_theme'),
        'desc' => __('', 'options_framework_theme'),
        'id' => 'tradesman_company_logo',
        'type' => 'upload');

    /*
    $options[] = array(
        'name' => __('Logo Image Retina (2x)', 'options_framework_theme'),
        'desc' => __('', 'options_framework_theme'),
        'id' => 'tradesman_company_logo_retina',
        'type' => 'upload');
    */

    $options[] = array(
        'name' => __('Favicon', 'options_framework_theme'),
        'desc' => __('', 'options_framework_theme'),
        'id' => 'tradesman_favicon',
        'type' => 'upload');

    $options[] = array(
        "name" => "Primary Color",
        "id" => "tradesman_primary_color",
        "type" => "color",
        "class" => "mini", //mini, tiny, small
        "std" => "#E0AB18"
        );

    $options[] = array(
        "name" => "Contact Page",
        "id" => "tradesman_contact_page",
        "desc" => __('The Free Quote button in the header will go to the page selected here', 'options_framework_theme'),
        "std" => "fresh",
        "type" => "select",
        "class" => "mini", //mini, tiny, small
        "options" => $page_options);

    $options[] = array(
        'name' => __('Phone Number', 'options_framework_theme'),
        'desc' => __('', 'options_framework_theme'),
        'id' => 'tradesman_phone_number',
        'type' => 'text');

    $options[] = array(
        'name' => __('Cell Phone Number', 'options_framework_theme'),
        'desc' => __('', 'options_framework_theme'),
        'id' => 'tradesman_cell_number',
        'type' => 'text');

    $options[] = array(
        'name' => __('Copyright', 'options_framework_theme'),
        'desc' => __('', 'options_framework_theme'),
        'id' => 'tradesman_copyright',
        'type' => 'text');

    return $options;
}