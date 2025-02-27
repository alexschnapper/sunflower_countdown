<?php

class Sunflower_Countdown_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'sunflower_countdown_widget', // Base ID
            __('Sunflower Countdown', 'text_domain'), // Name
            array('description' => __('Ein Countdown-Timer mit Sunflower Design', 'text_domain'),) // Args
        );
    }

    public function widget($args, $instance) {
        $title = apply_filters('widget_title', $instance['title']);
        $end_date = $instance['end_date'];

        echo $args['before_widget'];
        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        // Hier kommt der Countdown-Timer Code
        echo '<div class="sunflower-countdown">';
        echo '<div class="digital-countdown" data-end-date="' . esc_attr($end_date) . '"></div>';
        echo '</div>';
        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('Countdown', 'text_domain');
        $end_date = !empty($instance['end_date']) ? $instance['end_date'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('end_date'); ?>"><?php _e('End Date (YYYY-MM-DD HH:MM:SS):'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('end_date'); ?>" name="<?php echo $this->get_field_name('end_date'); ?>" type="text" value="<?php echo esc_attr($end_date); ?>">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['end_date'] = (!empty($new_instance['end_date'])) ? strip_tags($new_instance['end_date']) : '';
        return $instance;
    }
}