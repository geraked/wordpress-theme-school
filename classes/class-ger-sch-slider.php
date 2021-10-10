<?php

/**
 * Register a Slide post type.
 *
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 * @package Ger_School
 */


/**
 * Slider
 */
class Ger_Sch_Slider {

    /**
     * Construct
     */
    public function __construct() {
        add_action('init', [$this, 'register']);
        add_filter('manage_slides_posts_columns', [$this, 'columns']);
        add_action('manage_slides_posts_custom_column', [$this, 'columns_value']);
        add_action('manage_edit-slides_sortable_columns', [$this, 'columns_sortable']);
        add_filter('pre_get_posts', [$this, 'columns_order']);
    }


    /**
     * Register
     */
    function register() {
        $labels = [
            'name' => __('Slides', 'ger-school'),
            'singular_name' => __('Slider', 'ger-school'),
            'menu_name' => __('Slider', 'ger-school'),
            'name_admin_bar' => __('Slide', 'ger-school'),
            'add_new' => __('Add a new slide', 'ger-school'),
            'add_new_item' => __('Add a new slide', 'ger-school'),
            'new_item' => __('New slide', 'ger-school'),
            'edit_item' => __('Edit slide', 'ger-school'),
            'view_item' => __('View slide', 'ger-school'),
            'all_items' => __('All slides', 'ger-school'),
            'search_items' => __('Search slides', 'ger-school'),
            'not_found' => __('No slide found.', 'ger-school'),
            'not_found_in_trash' => __('No slide found.', 'ger-school'),
        ];

        $args = [
            'labels' => $labels,
            'description' => '750*380',
            'public' => false,
            'show_ui' => true,
            'supports' => ['title', 'revisions', 'thumbnail', 'page-attributes'],
            'menu_icon' => 'dashicons-format-gallery',
        ];

        register_post_type('slides', $args);
    }


    /**
     * Columns key
     */
    function columns($columns) {
        $columns['menu_order'] = __('Order', 'ger-school');
        $columns['featured_image'] = __('Image', 'ger-school');
        return $columns;
    }


    /**
     * Columns value
     */
    function columns_value($column) {
        global $post;

        switch ($column) {
            case 'menu_order':
                echo $post->menu_order;
                break;
            case 'featured_image':
                post_image(128, 72);
                break;
        }
    }


    /**
     * Columns sortable
     */
    function columns_sortable($columns) {
        $columns['menu_order'] = 'menu_order';
        return $columns;
    }


    /**
     * Set default order
     */
    function columns_order($query) {
        global $post_type;
        if ($query->is_admin) {
            if ($post_type == 'slides' && !isset($_GET['orderby']) && !isset($_GET['order'])) {
                $query->set('orderby', 'menu_order');
                $query->set('order', 'DESC');
            }
        }
        return $query;
    }
}
