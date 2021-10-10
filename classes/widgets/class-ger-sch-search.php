<?php

/**
 * Search Widget
 *
 * @package Ger_School
 */


/**
 * Search Widget 
 */
class Ger_Sch_Search extends WP_Widget {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct(
            'ger_sch_search',
            'sch-search',
            ['description' => __('Search', 'ger-school')]
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
            $title = __('Search', 'ger-school');

        if (empty($icon))
            $icon = 'fa-search'; ?>


        <!-- search block --->
        <div class="well">
            <h4><i class="fa <?php echo $icon; ?>"></i> <?php echo $title; ?></h4>
            <form action="<?php echo home_url(); ?>">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="<?php _e('Type something...', 'ger-school'); ?>" value="" name="s" id="search">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
        </div><!-- /search block --->


    <?php
    }


    /**
     * Create widget back-end
     */
    public function form($instance) {
        extract($instance);

        if (empty($title))
            $title = __('Search', 'ger-school');

        if (empty($icon))
            $icon = 'fa-search';
    ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'ger-school'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('icon'); ?>"><?php _e('Icon', 'ger-school'); ?></label>
            <input class="widefat" style="direction:ltr;" id="<?php echo $this->get_field_id('icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>" type="text" value="<?php echo esc_attr($icon); ?>" />
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
        return $instance;
    }
}
