<?php

/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package Ger_School
 */


// Enable links
add_filter('pre_option_link_manager_enabled', '__return_true');


/**
 * Theme setup
 */
function ger_sch_theme_setup() {
    load_theme_textdomain('ger-school', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(640, 360);
    register_nav_menu('navb-header', __('Top Menu', 'ger-school'));
}
add_action('after_setup_theme', 'ger_sch_theme_setup');


/**
 * Register sidebar and footer widgets
 */
function ger_sch_init_widgets() {
    register_sidebar([
        'id' => 'sidebar-1',
        'name' => 'Sidebar',
        'description' => '',
        'before_widget' => '<div class="panel panel-default box other">',
        'after_widget' => '</div></div>',
        'before_title' => '<div class="panel-heading"><i class="fa fa-archive"></i><h4>',
        'after_title' => '</h4></div><div class="panel-body">',
    ]);

    register_sidebar([
        'id' => 'foot-1',
        'name' => 'Foot1',
        'description' => '',
        'before_widget' => '<div class="foot-other">',
        'after_widget' => '</div>',
        'before_title' => '<div class="foot-title"><i class="fa fa-archive"></i> <h4>',
        'after_title' => '</h4></div>',
    ]);

    register_sidebar([
        'id' => 'foot-2',
        'name' => 'Foot2',
        'description' => '',
        'before_widget' => '<div class="foot-other">',
        'after_widget' => '</div>',
        'before_title' => '<div class="foot-title"><i class="fa fa-archive"></i> <h4>',
        'after_title' => '</h4></div>',
    ]);

    register_sidebar([
        'id' => 'foot-3',
        'name' => 'Foot3',
        'description' => '',
        'before_widget' => '<div class="foot-other">',
        'after_widget' => '</div>',
        'before_title' => '<div class="foot-title"><i class="fa fa-archive"></i> <h4>',
        'after_title' => '</h4></div>',
    ]);

    register_sidebar([
        'id' => 'foot-4',
        'name' => 'Foot4',
        'description' => '',
        'before_widget' => '<div class="foot-other">',
        'after_widget' => '</div>',
        'before_title' => '<div class="foot-title"><i class="fa fa-archive"></i> <h4>',
        'after_title' => '</h4></div>',
    ]);
}
add_action('widgets_init', 'ger_sch_init_widgets');


/**
 * Remove default image sizes
 */
function ger_sch_remove_default_image_sizes($sizes) {
    unset($sizes['medium']);
    unset($sizes['large']);
    unset($sizes['medium_large']);
    return $sizes;
}
add_action('init', function () {
    if (is_admin()) {
        update_option('thumbnail_size_h', 360);
        update_option('thumbnail_size_w', 640);
        update_option('medium_size_h', 0);
        update_option('medium_size_w', 0);
        update_option('large_size_h', 0);
        update_option('large_size_w', 0);
        update_option('thumbnail_crop', 0);
    }
});
add_filter('intermediate_image_sizes_advanced', 'ger_sch_remove_default_image_sizes');


/**
 * Enqueue admin css styles
 */
function ger_sch_admin_style() {
    wp_enqueue_style('ger_sch_admin_css', get_template_directory_uri() . '/assets/css/admin-style.css', [],  wp_get_theme()->get('Version'));
}
add_action('admin_enqueue_scripts', 'ger_sch_admin_style');
add_action('login_enqueue_scripts', 'ger_sch_admin_style');


/**
 * Enqueue admin js scripts
 */
function ger_sch_admin_script() {
    wp_enqueue_script('ger_sch_admin_js', get_template_directory_uri() . '/assets/js/admin-script.js', [], wp_get_theme()->get('Version'), true);
}
add_action('admin_enqueue_scripts', 'ger_sch_admin_script');


/**
 * Display post image
 */
function post_image($width, $height) {
    if (has_post_thumbnail()) {
        the_post_thumbnail([$width, $height]);
    } else {
        echo '<img src="' . get_bloginfo('stylesheet_directory') . '/assets/images/no-thumbnail.jpg" style="width:' . $width . 'px; height:' . $height . 'px;">';
    }
}


/**
 * Display post excerpt
 */
function sch_content($max_char) {
    global $post;
    $content = $post->post_excerpt;
    if (empty($content)) {
        $content = apply_filters('the_content', get_the_content());
        $content = str_replace(']]>', ']]&gt;', $content);
        $content = strip_tags($content, '');
    }
    if ((strlen(utf8_decode($content)) > $max_char) && ($espacio = strpos($content, " ", $max_char))) {
        $content = mb_substr($content, 0, $espacio);
        echo $content;
        echo "...";
    } else {
        echo $content;
    }
}


/**
 * Display post title
 */
function sch_title($length) {
    $after = '...';
    $mytitle = get_the_title();
    if (strlen(utf8_decode($mytitle)) > $length) {
        $mytitle = mb_substr($mytitle, 0, $length);
        echo $mytitle . $after;
    } else {
        echo $mytitle;
    }
}


/**
 * Remove unnecessary post fields
 */
function ger_sch_post_custom_init() {
    remove_post_type_support('post', 'custom-fields');
}
add_action('init', 'ger_sch_post_custom_init');


/**
 * Restrict mime for non-admin users
 */
function ger_sch_restrict_mime($mimes) {
    if (!current_user_can('manage_options')) {
        $mimes = [
            'jpg' => 'image/jpg',
        ];
    }
    return $mimes;
}
// add_filter('upload_mimes', 'ger_sch_restrict_mime');


// Import
require_once 'classes/class-ger-sch-slider.php';
require_once 'classes/class-ger-sch-widgets.php';
require_once 'classes/class-ger-sch-customizer.php';
require_once 'classes/class-wp-bootstrap-navwalker.php';


// Initiate the objects
$ger_sch_widgets = new Ger_Sch_Widgets();
$ger_sch_slider = new Ger_Sch_Slider();
$ger_sch_customizer = new Ger_Sch_Customizer();


if (class_exists('OCDI_Plugin') && current_user_can('manage_options')) {
    require_once 'classes/class-ger-sch-ocdi.php';
    $ger_sch_ocdi = new Ger_Sch_Ocdi();
}
