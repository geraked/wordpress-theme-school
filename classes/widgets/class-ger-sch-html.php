<?php

/**
 * HTML Widget
 *
 * @package Ger_School
 */


/**
 * HTML Widget 
 */
class Ger_Sch_Html extends WP_Widget {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct(
            'ger_sch_html',
            'sch-html',
            ['description' => 'HTML']
        );

        add_action('widgets_init', [$this, 'register']);
    }


    /**
     * Register the widget
     */
    public function register() {
        register_widget(get_class($this));
    }


    /**
     * Create widget front-end
     */
    public function widget($args, $instance) {
        extract($instance);

        $title = apply_filters('widget_title', $title);

        if (empty($title))
            $title = 'HTML';

        if (empty($icon))
            $icon = 'fa-html5';

        if (!isset($txt))
            $txt = 'Type your HTML code here!'; ?>


        <!-- HTML block --->
        <div class="panel panel-default box">
            <div class="panel-heading foot-title">
                <i class="fa <?php echo $icon; ?>"></i>
                <h4 class="panel-title"><?php echo $title; ?></h4>
            </div>
            <div class="panel-body">
                <?php echo $txt; ?>
            </div>
        </div><!-- /HTML block --->


    <?php
    }


    /**
     * Create widget back-end
     */
    public function form($instance) {
        extract($instance);

        if (empty($title))
            $title = 'HTML';

        if (empty($icon))
            $icon = 'fa-html5';

        if (!isset($txt))
            $txt = 'Type your HTML code here!';
    ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'ger-school'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('icon'); ?>"><?php _e('Icon', 'ger-school'); ?></label>
            <input class="widefat" style="direction:ltr;" id="<?php echo $this->get_field_id('icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>" type="text" value="<?php echo esc_attr($icon); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('txt'); ?>"><?php _e('Context', 'ger-school'); ?></label>
            <textarea class="widefat" style="direction:ltr;" id="<?php echo $this->get_field_id('txt'); ?>" name="<?php echo $this->get_field_name('txt'); ?>" rows="15"><?php echo esc_attr($txt); ?></textarea>
        </p>
<?php
    }


    /**
     * Update the widget and replace old instances with new
     */
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['icon'] = (!empty($new_instance['icon'])) ? strip_tags($new_instance['icon']) : '';
        $instance['txt'] = (!empty($new_instance['txt'])) ? $new_instance['txt'] : '';
        return $instance;
    }
}
