<?php

// Creating the widget
class tradesman_gmap_widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'tradesman_gmap_widget',
            __('Tradesman Google Map Widget', 'tradesman_widget_domain'),
            array('description' => __('Google Map Widget for the Tradesman theme that appears in the sidebar', 'tradesman_widget_domain'),)
        );
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        // This is where you run the code and display the output
        echo '<h3>' . $args['before_title'] . $instance['title'] .  $args['after_title'] . '</h3>';
        echo '<div class="google-maps">';
        echo '<iframe src="' . $instance['gmap_url']. '" width="400" height="300" frameborder="0" style="border:0"></iframe>';
        echo '</div>';
        echo '<address>';
        echo nl2br($instance['address']);
        echo '</address>';

        echo $args['after_widget'];
    }

    // Widget Backend
    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Our Location', 'tradesman_widget_domain');
        }

        if (isset($instance['gmap_url'])) {
            $gmap_url = $instance['gmap_url'];
        } else {
            $gmap_url = '';
        }

        if (isset($instance['address'])) {
            $address = $instance['address'];
        } else {
            $address = '';
        }

        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('gmap_url'); ?>"><?php _e('Google Maps Embed URL:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('gmap_url'); ?>"
                   name="<?php echo $this->get_field_name('gmap_url'); ?>" type="text"
                   value="<?php echo esc_attr($gmap_url); ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('address'); ?>"><?php _e('Address:'); ?></label>
            <textarea class="widefat" rows="5" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>"><?php echo esc_attr($address); ?></textarea>
        </p>
    <?php
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['gmap_url'] = (!empty($new_instance['gmap_url'])) ? strip_tags($new_instance['gmap_url']) : '';
        $instance['address'] = (!empty($new_instance['address'])) ? strip_tags($new_instance['address']) : '';
        return $instance;
    }
} // Class wpb_widget ends here

// Register and load the widget
function tradesman_gmap_load_widget()
{
    register_widget('tradesman_gmap_widget');
}

add_action('widgets_init', 'tradesman_gmap_load_widget');