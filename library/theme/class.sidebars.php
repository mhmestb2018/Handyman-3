<?php
/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init()
{
    register_sidebar(array(
        'name' => 'Site Sidebar',
        'id' => 'site-sidebar',
        'before_widget' => '<div class="sidebar__block">',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => '',
    ));
}
add_action('widgets_init', 'arphabet_widgets_init');


function unregister_default_widgets()
{
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Search');
    unregister_widget('WP_Widget_Text');
    unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Tag_Cloud');
    unregister_widget('WP_Nav_Menu_Widget');
    unregister_widget('Twenty_Eleven_Ephemera_Widget');
}
add_action('widgets_init', 'unregister_default_widgets', 11);
