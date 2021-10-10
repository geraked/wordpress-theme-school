<?php

/**
 * Latest Comments Widget
 *
 * @package Ger_School
 */


/**
 * Latest Comments Widget 
 */
class Ger_Sch_Latest_Comments extends WP_Widget {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct(
            'ger_sch_latest_comments',
            'sch-last-comments',
            ['description' => __('Recent Comments', 'ger-school')]
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
            $title = __('Recent Comments', 'ger-school');

        if (empty($icon))
            $icon = 'fa-comments';

        if (empty($comment_posts))
            $comment_posts = 3;

        if (empty($avatar_size))
            $avatar_size = 50;

        if (empty($char))
            $char = 90;
?>

        <div class="panel panel-default box">
            <div class="panel-heading foot-title">
                <i class="fa <?php echo $icon; ?>"></i>
                <h4 class="panel-title"><?php echo $title; ?></h4>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <ul class="foot-comment side-comment">
                    <?php $this->most_commented($comment_posts, $avatar_size, $char); ?>
                </ul>
            </div>
        </div><!-- /last news block --->

    <?php
    }


    /**
     * Create widget back-end
     */
    public function form($instance) {
        extract($instance);

        if (empty($title))
            $title = __('Recent Comments', 'ger-school');

        if (empty($icon))
            $icon = 'fa-comments';

        if (empty($comment_posts))
            $comment_posts = 3;

        if (empty($avatar_size))
            $avatar_size = 50;

        if (empty($char))
            $char = 90;
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
            <label for="<?php echo $this->get_field_id('comment_posts'); ?>"><?php _e('Count', 'ger-school'); ?></label>
            <input class="widefat" style="direction:ltr;" onkeypress="return isNumberKey(event)" id="<?php echo $this->get_field_id('comment_posts'); ?>" name="<?php echo $this->get_field_name('comment_posts'); ?>" type="text" value="<?php echo esc_attr($comment_posts); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('avatar_size'); ?>"><?php _e('Avatar Size', 'ger-school'); ?></label>
            <input class="widefat" style="direction:ltr;" onkeypress="return isNumberKey(event)" id="<?php echo $this->get_field_id('avatar_size'); ?>" name="<?php echo $this->get_field_name('avatar_size'); ?>" type="text" value="<?php echo esc_attr($avatar_size); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('char'); ?>"><?php _e('Chars Count', 'ger-school'); ?></label>
            <input class="widefat" style="direction:ltr;" onkeypress="return isNumberKey(event)" id="<?php echo $this->get_field_id('char'); ?>" name="<?php echo $this->get_field_name('char'); ?>" type="text" value="<?php echo esc_attr($char); ?>" />
        </p>
        <?php
    }


    /**
     * Update the widget and replace old instances with new
     */
    public function update($new_instance, $old_instance) {
        $instance = [];
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['icon'] = (!empty($new_instance['icon'])) ? strip_tags($new_instance['icon']) : '';
        $instance['comment_posts'] = (!empty($new_instance['comment_posts'])) ? strip_tags($new_instance['comment_posts']) : '';
        $instance['avatar_size'] = (!empty($new_instance['avatar_size'])) ? strip_tags($new_instance['avatar_size']) : '';
        $instance['char'] = (!empty($new_instance['char'])) ? strip_tags($new_instance['char']) : '';
        return $instance;
    }


    /**
     * Display last comments
     */
    public function most_commented($comment_posts, $avatar_size, $char) {
        $comments = get_comments('status=approve&number=' . $comment_posts);
        foreach ($comments as $comment) { ?>
            <li>
                <a href="<?php echo get_permalink($comment->comment_post_ID); ?>#comment-<?php echo $comment->comment_ID; ?>">
                    <?php echo get_avatar($comment, $avatar_size); ?>
                    <p><?php echo strip_tags($comment->comment_author); ?>: <?php echo wp_html_excerpt($comment->comment_content, $char); ?>...</p>
                    <div class="clearfix"></div>
                </a>
            </li>
<?php }
    }
}
