<?php

/**
 * Customizer settings for this theme
 *
 * @package Ger_School
 */


/**
 * Customizer Settings
 */
class Ger_Sch_Customizer {


    /**
     * Constructor. Instantiate the object
     */
    public function __construct() {
        add_action('customize_register', [$this, 'register']);
        add_action('wp_head', [$this, 'header_output']);
        add_action('customize_preview_init', [$this, 'live_preview']);
        add_filter('upload_size_limit', [$this, 'limit_upload_size']);
        add_action('pre_get_posts', [$this, 'set_posts_per_page']);
    }


    /**
     * Set posts per page
     */
    public function set_posts_per_page($query) {
        global $wp_the_query;
        if ((!is_admin()) && ($query === $wp_the_query) && ($query->is_search() || $query->is_archive() || $query->is_category())) {
            $query->set('posts_per_page', get_theme_mod('general_post_count', 8));
        }
        return $query;
    }


    /**
     * Limit upload size for non-admin users
     */
    public function limit_upload_size($size) {
        if (!current_user_can('manage_options')) {
            $size = 1024 * get_theme_mod('general_upload_size_limit', 150);
        }
        return $size;
    }


    /**
     * Enqueue customizer live preview script
     */
    public function live_preview() {
        wp_enqueue_script(
            'ger_sch_customizer_js',
            get_template_directory_uri() . '/assets/js/livepreview.js',
            ['jquery', 'customize-preview'],
            '',
            true
        );
    }


    /**
     * Register components of customizer
     */
    function register($wp_customize) {

        // $wp_customize->remove_section('static_front_page');
        // $wp_customize->remove_panel('widgets');


        /**
         * Header
         */
        $wp_customize->add_section(
            'sch_header_options',
            [
                'title' => __('Header', 'ger-school'),
                'priority' => 21,
                'capability' => 'edit_theme_options',
            ]
        );

        // Header bg color
        $wp_customize->add_setting(
            'header_bg_color',
            [
                'default' => '#0B6688',
                'transport' => 'postMessage',
            ]
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'header_bg_color_control',
            [
                'label' => __('Background Color', 'ger-school'),
                'section' => 'sch_header_options',
                'settings' => 'header_bg_color',
                'priority' => 1,
            ]
        ));

        // Header border color
        $wp_customize->add_setting(
            'header_border_color',
            [
                'default' => '#0A5A77',
                'transport' => 'postMessage',
            ]
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'header_border_color_control',
            [
                'label' => __('Bottom Border Color', 'ger-school'),
                'section' => 'sch_header_options',
                'settings' => 'header_border_color',
                'priority' => 2,
            ]
        ));

        // Header text color
        $wp_customize->add_setting(
            'header_text_color',
            [
                'default' => '#ffffff',
                'transport' => 'postMessage',
            ]
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'header_text_color_control',
            [
                'label' => __('Text Color', 'ger-school'),
                'section' => 'sch_header_options',
                'settings' => 'header_text_color',
                'priority' => 3,
            ]
        ));

        // Header title
        $wp_customize->add_setting(
            'header_title',
            [
                'default' => __('Imam Khomeini', 'ger-school'),
            ]
        );
        $wp_customize->add_control(
            'header_title_control',
            [
                'type' => 'text',
                'label' => __('Title', 'ger-school'),
                'section' => 'sch_header_options',
                'settings' => 'header_title',
                'priority' => 4,
            ]
        );

        // Header description
        $wp_customize->add_setting(
            'header_description',
            [
                'default' => __('Public Exemplary High School', 'ger-school'),
            ]
        );
        $wp_customize->add_control(
            'header_description_control',
            [
                'type' => 'text',
                'label' => __('Description', 'ger-school'),
                'section' => 'sch_header_options',
                'settings' => 'header_description',
                'priority' => 5,
            ]
        );



        /**
         * Navigation (Top Menu)
         */
        $wp_customize->add_section(
            'sch_nav_options',
            [
                'title' => __('Top Menu', 'ger-school'),
                'priority' => 22,
                'capability' => 'edit_theme_options',
            ]
        );

        // Nav bg color
        $wp_customize->add_setting(
            'nav_bg_color',
            [
                'default' => '#f8f8f8',
                'transport' => 'postMessage',
            ]
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'nav_bg_color_control',
            [
                'label' => __('Background Color', 'ger-school'),
                'section' => 'sch_nav_options',
                'settings' => 'nav_bg_color',
                'priority' => 1,
            ]
        ));

        // Nav hover color
        $wp_customize->add_setting(
            'nav_hover_color',
            [
                'default' => '#e6e6e6',
            ]
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'nav_hover_color_control',
            [
                'label' => __('Hover Background Color', 'ger-school'),
                'section' => 'sch_nav_options',
                'settings' => 'nav_hover_color',
                'priority' => 2,
            ]
        ));

        // Nav hover text color
        $wp_customize->add_setting(
            'nav_text_hover_color',
            [
                'default' => '#333333',
            ]
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'nav_text_hover_color_control',
            [
                'label' => __('Hover Text Color', 'ger-school'),
                'section' => 'sch_nav_options',
                'settings' => 'nav_text_hover_color',
                'priority' => 3,
            ]
        ));

        // Nav text color
        $wp_customize->add_setting(
            'nav_text_color',
            [
                'default' => '#777',
                'transport' => 'postMessage',
            ]
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'nav_text_color_control',
            [
                'label' => __('Text Color', 'ger-school'),
                'section' => 'sch_nav_options',
                'settings' => 'nav_text_color',
                'priority' => 4,
            ]
        ));

        // Nav border color
        $wp_customize->add_setting(
            'nav_border_color',
            [
                'default' => '#e7e7e7',
                'transport' => 'postMessage',
            ]
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'nav_border_color_control',
            [
                'label' => __('Border Color', 'ger-school'),
                'section' => 'sch_nav_options',
                'settings' => 'nav_border_color',
                'priority' => 5,
            ]
        ));



        /**
         * Sidebar
         */
        $wp_customize->add_section(
            'sch_sidebar_options',
            [
                'title' => __('Sidebar', 'ger-school'),
                'priority' => 23,
                'capability' => 'edit_theme_options',
            ]
        );

        // Sidebar position
        $wp_customize->add_setting(
            'sidebar_position',
            [
                'default' => 'left',
            ]
        );
        $wp_customize->add_control(
            'sidebar_position_control',
            [
                'label' => __('Position', 'ger-school'),
                'section' => 'sch_sidebar_options',
                'settings' => 'sidebar_position',
                'priority' => 1,
                'type' => 'radio',
                'choices' => [
                    'right' => __('Right', 'ger-school'),
                    'left' => __('Left', 'ger-school'),
                ]
            ]
        );

        // Block title bg color
        $wp_customize->add_setting(
            'block_title_bg_color',
            [
                'default' => '#f5f5f5',
                'transport' => 'postMessage',
            ]
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'block_title_bg_color_control',
            [
                'label' => __('Block Title Background Color', 'ger-school'),
                'section' => 'sch_sidebar_options',
                'settings' => 'block_title_bg_color',
                'priority' => 2,
            ]
        ));

        // Block title text color
        $wp_customize->add_setting(
            'block_title_text_color',
            [
                'default' => '#333',
                'transport' => 'postMessage',
            ]
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'block_title_text_color_control',
            [
                'label' => __('Block Title Text Color', 'ger-school'),
                'section' => 'sch_sidebar_options',
                'settings' => 'block_title_text_color',
                'priority' => 3,
            ]
        ));

        // Block icon bg color
        $wp_customize->add_setting(
            'block_icon_bg_color',
            [
                'default' => '#e6e6e6',
                'transport' => 'postMessage',
            ]
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'block_icon_bg_color_control',
            [
                'label' => __('Block Icon Background Color', 'ger-school'),
                'section' => 'sch_sidebar_options',
                'settings' => 'block_icon_bg_color',
                'priority' => 4,
            ]
        ));

        // Block icon color
        $wp_customize->add_setting(
            'block_icon_color',
            [
                'default' => '#333',
                'transport' => 'postMessage',
            ]
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'block_icon_color_control',
            [
                'label' => __('Block Icon Color', 'ger-school'),
                'section' => 'sch_sidebar_options',
                'settings' => 'block_icon_color',
                'priority' => 5,
            ]
        ));

        // Block border color
        $wp_customize->add_setting(
            'block_border_color',
            [
                'default' => '#ddd',
                'transport' => 'postMessage',
            ]
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'block_border_color_control',
            [
                'label' => __('Block Border Color', 'ger-school'),
                'section' => 'sch_sidebar_options',
                'settings' => 'block_border_color',
                'priority' => 6,
            ]
        ));



        /**
         * Body
         */
        $wp_customize->add_section(
            'sch_body_options',
            [
                'title' => __('Body', 'ger-school'),
                'priority' => 24,
                'capability' => 'edit_theme_options',
            ]
        );

        // Body bg image
        $wp_customize->add_setting(
            'body_bg_image',
            [
                'default' => get_template_directory_uri() . '/assets/images/body-bg.png',
            ]
        );
        $wp_customize->add_control(new WP_Customize_Image_Control(
            $wp_customize,
            'body_bg_image_control',
            [
                'label' => __('Background Image', 'ger-school'),
                'section' => 'sch_body_options',
                'settings' => 'body_bg_image',
                'priority' => 1,
            ]
        ));

        // Body bg repeat image 
        $wp_customize->add_setting(
            'body_bg_repeat_image',
            [
                'default' => '',
            ]
        );
        $wp_customize->add_control(
            'body_bg_repeat_image_control',
            [
                'label' => __('Background Repeat', 'ger-school'),
                'section' => 'sch_body_options',
                'settings' => 'body_bg_repeat_image',
                'priority' => 2,
                'type' => 'select',
                'choices' => [
                    '' => '',
                    'repeat' => 'repeat',
                    'repeat-x' => 'repeat-x',
                    'repeat-y' => 'repeat-y',
                    'no-repeat' => 'no-repeat',
                ]
            ]
        );

        // Body bg position image 
        $wp_customize->add_setting(
            'body_bg_position_image',
            [
                'default' => '',
            ]
        );
        $wp_customize->add_control(
            'body_bg_position_image_control',
            [
                'label' => __('Background Position', 'ger-school'),
                'section' => 'sch_body_options',
                'settings' => 'body_bg_position_image',
                'priority' => 2,
                'type' => 'select',
                'choices' => [
                    '' => '',
                    'center' => 'center',
                    'right' => 'right',
                    'left' => 'left',
                    'top' => 'top',
                    'bottom' => 'bottom',
                ]
            ]
        );

        // Body bg color
        $wp_customize->add_setting(
            'body_bg_color',
            [
                'default' => '#FFF',
                'transport' => 'postMessage',
            ]
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'body_bg_color_control',
            [
                'label' => __('Background Color', 'ger-school'),
                'section' => 'sch_body_options',
                'settings' => 'body_bg_color',
                'priority' => 3,
            ]
        ));



        /**
         * Posts
         */
        $wp_customize->add_section(
            'sch_posts_options',
            [
                'title' => __('Posts', 'ger-school'),
                'priority' => 25,
                'capability' => 'edit_theme_options',
            ]
        );

        // Post title color
        $wp_customize->add_setting(
            'post_title_color',
            [
                'default' => '#337AB7',
                'transport' => 'postMessage',
            ]
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'post_title_color_control',
            [
                'label' => __('Title Color', 'ger-school'),
                'section' => 'sch_posts_options',
                'settings' => 'post_title_color',
                'priority' => 1,
            ]
        ));

        // Post title hover color
        $wp_customize->add_setting(
            'post_title_hover_color',
            [
                'default' => '#23527c',
            ]
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'post_title_hover_color_control',
            [
                'label' => __('Title Hover Color', 'ger-school'),
                'section' => 'sch_posts_options',
                'settings' => 'post_title_hover_color',
                'priority' => 2,
            ]
        ));

        // Post text color
        $wp_customize->add_setting(
            'post_text_color',
            [
                'default' => '#333',
                'transport' => 'postMessage',
            ]
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'post_text_color_control',
            [
                'label' => __('Text Color', 'ger-school'),
                'section' => 'sch_posts_options',
                'settings' => 'post_text_color',
                'priority' => 3,
            ]
        ));

        // Post more bg color
        $wp_customize->add_setting(
            'post_more_bg_color',
            [
                'default' => '#337ab7',
                'transport' => 'postMessage',
            ]
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'post_more_bg_color_control',
            [
                'label' => __('More Button Background Color', 'ger-school'),
                'section' => 'sch_posts_options',
                'settings' => 'post_more_bg_color',
                'priority' => 4,
            ]
        ));

        // Post more text color
        $wp_customize->add_setting(
            'post_more_text_color',
            [
                'default' => '#FFF',
                'transport' => 'postMessage',
            ]
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'post_more_text_color_control',
            [
                'label' => __('More Button Text Color', 'ger-school'),
                'section' => 'sch_posts_options',
                'settings' => 'post_more_text_color',
                'priority' => 5,
            ]
        ));

        // Post more bg hover color
        $wp_customize->add_setting(
            'post_more_hover_bg_color',
            [
                'default' => '#2E6DA4',
            ]
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'post_more_hover_bg_control',
            [
                'label' => __('More Button Hover Background Color', 'ger-school'),
                'section' => 'sch_posts_options',
                'settings' => 'post_more_hover_bg_color',
                'priority' => 6,
            ]
        ));

        // Post hr color
        $wp_customize->add_setting(
            'post_hr_color',
            [
                'default' => '#EEE',
                'transport' => 'postMessage',
            ]
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'post_hr_color_control',
            [
                'label' => __('Posts Divider Line Color', 'ger-school'),
                'section' => 'sch_posts_options',
                'settings' => 'post_hr_color',
                'priority' => 7,
            ]
        ));



        /**
         * Fonts
         */
        $wp_customize->add_section(
            'sch_fonts_options',
            [
                'title' => __('Fonts', 'ger-school'),
                'priority' => 26,
                'capability' => 'edit_theme_options',
            ]
        );

        // Font family 
        $wp_customize->add_setting(
            'font_family',
            [
                'default' => 'yekan',
            ]
        );
        $wp_customize->add_control(
            'font_family_control',
            [
                'label' => __('Font Name', 'ger-school'),
                'section' => 'sch_fonts_options',
                'settings' => 'font_family',
                'priority' => 1,
                'type' => 'select',
                'choices' => [
                    'yekan' => 'yekan',
                    'IranSans' => 'IranSans',
                ]
            ]
        );

        // Font size
        $wp_customize->add_setting(
            'font_size_home_post_title',
            [
                'default' => '20px',
            ]
        );
        $wp_customize->add_control(
            'font_size_home_post_title_control',
            [
                'label' => __('Post Excerpt Title Size', 'ger-school'),
                'section' => 'sch_fonts_options',
                'settings' => 'font_size_home_post_title',
                'type' => 'text',
                'priority' => 2,
            ]
        );

        // Font size
        $wp_customize->add_setting(
            'font_size_home_post_p',
            [
                'default' => '14px',
            ]
        );
        $wp_customize->add_control(
            'font_size_home_post_p_control',
            [
                'label' => __('Post Excerpt Content Size', 'ger-school'),
                'section' => 'sch_fonts_options',
                'settings' => 'font_size_home_post_p',
                'type' => 'text',
                'priority' => 3,
            ]
        );

        // Font size
        $wp_customize->add_setting(
            'font_size_home_post_small',
            [
                'default' => '12px',
            ]
        );
        $wp_customize->add_control(
            'font_size_home_post_small_control',
            [
                'label' => __('Post Excerpt Detail Size', 'ger-school'),
                'section' => 'sch_fonts_options',
                'settings' => 'font_size_home_post_small',
                'type' => 'text',
                'priority' => 4,
            ]
        );

        // Font line height
        $wp_customize->add_setting(
            'font_line_home_post',
            [
                'default' => '1.82',
            ]
        );
        $wp_customize->add_control(
            'font_line_home_post_control',
            [
                'label' => __('Post Excerpt Line Height', 'ger-school'),
                'section' => 'sch_fonts_options',
                'settings' => 'font_line_home_post',
                'type' => 'text',
                'priority' => 5,
            ]
        );

        // Font size
        $wp_customize->add_setting(
            'font_size_single_post_title',
            [
                'default' => '20px',
            ]
        );
        $wp_customize->add_control(
            'font_size_single_post_title_control',
            [
                'label' => __('Post Title Size', 'ger-school'),
                'section' => 'sch_fonts_options',
                'settings' => 'font_size_single_post_title',
                'type' => 'text',
                'priority' => 6,
            ]
        );

        // Font size
        $wp_customize->add_setting(
            'font_size_single_post_p',
            [
                'default' => '14px',
            ]
        );
        $wp_customize->add_control(
            'font_size_single_post_p_control',
            [
                'label' => __('Post Content Size', 'ger-school'),
                'section' => 'sch_fonts_options',
                'settings' => 'font_size_single_post_p',
                'type' => 'text',
                'priority' => 7,
            ]
        );

        // Font size
        $wp_customize->add_setting(
            'font_size_single_post_small',
            [
                'default' => '12px',
            ]
        );
        $wp_customize->add_control(
            'font_size_single_post_small_control',
            [
                'label' => __('Post Detail Size', 'ger-school'),
                'section' => 'sch_fonts_options',
                'settings' => 'font_size_single_post_small',
                'type' => 'text',
                'priority' => 8,
            ]
        );

        // Font line height
        $wp_customize->add_setting(
            'font_line_single_post',
            [
                'default' => '1.82',
            ]
        );
        $wp_customize->add_control(
            'font_line_single_post_control',
            [
                'label' => __('Post Line Height', 'ger-school'),
                'section' => 'sch_fonts_options',
                'settings' => 'font_line_single_post',
                'type' => 'text',
                'priority' => 9,
            ]
        );

        // Font size
        $wp_customize->add_setting(
            'font_size_widget_title',
            [
                'default' => '17px',
            ]
        );
        $wp_customize->add_control(
            'font_size_widget_title_control',
            [
                'label' => __('Widget Title Size', 'ger-school'),
                'section' => 'sch_fonts_options',
                'settings' => 'font_size_widget_title',
                'type' => 'text',
                'priority' => 10,
            ]
        );

        // Font size
        $wp_customize->add_setting(
            'font_size_widget_post_title',
            [
                'default' => '12px',
            ]
        );
        $wp_customize->add_control(
            'font_size_widget_post_title_control',
            [
                'label' => __('Post Title Size in Widget', 'ger-school'),
                'section' => 'sch_fonts_options',
                'settings' => 'font_size_widget_post_title',
                'type' => 'text',
                'priority' => 11,
            ]
        );

        // Font size
        $wp_customize->add_setting(
            'font_size_widget_post_content',
            [
                'default' => '10px',
            ]
        );
        $wp_customize->add_control(
            'font_size_widget_post_content_control',
            [
                'label' => __('Post Content Size in Widget', 'ger-school'),
                'section' => 'sch_fonts_options',
                'settings' => 'font_size_widget_post_content',
                'type' => 'text',
                'priority' => 12,
            ]
        );

        // Font line height
        $wp_customize->add_setting(
            'font_line_widget_post_content',
            [
                'default' => '1.5',
            ]
        );
        $wp_customize->add_control(
            'font_line_widget_post_content_control',
            [
                'label' => __('Post Line Height in Widget', 'ger-school'),
                'section' => 'sch_fonts_options',
                'settings' => 'font_line_widget_post_content',
                'type' => 'text',
                'priority' => 13,
            ]
        );

        // Font size
        $wp_customize->add_setting(
            'font_size_header_h4',
            [
                'default' => '18px',
            ]
        );
        $wp_customize->add_control(
            'font_size_header_h4_control',
            [
                'label' => __('Header Description Size', 'ger-school'),
                'section' => 'sch_fonts_options',
                'settings' => 'font_size_header_h4',
                'type' => 'text',
                'priority' => 14,
            ]
        );

        // Font size
        $wp_customize->add_setting(
            'font_size_header_h2',
            [
                'default' => '30px',
            ]
        );
        $wp_customize->add_control(
            'font_size_header_h2_control',
            [
                'label' => __('Header Title Size', 'ger-school'),
                'section' => 'sch_fonts_options',
                'settings' => 'font_size_header_h2',
                'type' => 'text',
                'priority' => 15,
            ]
        );

        // Font size
        $wp_customize->add_setting(
            'font_nav',
            [
                'default' => '14px',
            ]
        );
        $wp_customize->add_control(
            'font_nav_control',
            [
                'label' => __('Top Menu Size', 'ger-school'),
                'section' => 'sch_fonts_options',
                'settings' => 'font_nav',
                'type' => 'text',
                'priority' => 16,
            ]
        );

        // Font size
        $wp_customize->add_setting(
            'font_body_size',
            [
                'default' => '14px',
            ]
        );
        $wp_customize->add_control(
            'font_body_size_control',
            [
                'label' => __('Other Size', 'ger-school'),
                'section' => 'sch_fonts_options',
                'settings' => 'font_body_size',
                'type' => 'text',
                'priority' => 17,
            ]
        );



        /**
         * Footer
         */
        $wp_customize->add_section(
            'sch_footer_options',
            [
                'title' => __('Footer', 'ger-school'),
                'priority' => 27,
                'capability' => 'edit_theme_options',
            ]
        );

        // Top footer columns
        $wp_customize->add_setting(
            'top_footer_columns',
            [
                'default' => 'col_3_right',
            ]
        );
        $wp_customize->add_control(
            'top_footer_columns_control',
            [
                'label' => __('Display', 'ger-school'),
                'section' => 'sch_footer_options',
                'settings' => 'top_footer_columns',
                'type' => 'radio',
                'priority' => 1,
                'choices' => [
                    'col_3' => __('Three Columns', 'ger-school'),
                    'col_3_right' => __('Three Columns - Pulled Right', 'ger-school'),
                    'col_3_left' => __('Three Columns - Pulled Left', 'ger-school'),
                    'col_4' => __('Four Columns', 'ger-school'),
                ]
            ]
        );

        // Top footer bg color
        $wp_customize->add_setting(
            'top_footer_bg_color',
            [
                'default' => '#f8f8f8',
                'transport' => 'postMessage',
            ]
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'top_footer_bg_color_control',
            [
                'label' => __('Top Footer Background Color', 'ger-school'),
                'section' => 'sch_footer_options',
                'settings' => 'top_footer_bg_color',
                'priority' => 2,
            ]
        ));

        // Bottom footer bg color
        $wp_customize->add_setting(
            'bottom_footer_bg_color',
            [
                'default' => '#e6e6e6',
                'transport' => 'postMessage',
            ]
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'bottom_footer_bg_color_control',
            [
                'label' => __('Bottom Footer Background Color', 'ger-school'),
                'section' => 'sch_footer_options',
                'settings' => 'bottom_footer_bg_color',
                'priority' => 3,
            ]
        ));

        // Top footer text color
        $wp_customize->add_setting(
            'top_footer_text_color',
            [
                'default' => '#333',
                'transport' => 'postMessage',
            ]
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'top_footer_text_color_control',
            [
                'label' => __('Top Footer Text Color', 'ger-school'),
                'section' => 'sch_footer_options',
                'settings' => 'top_footer_text_color',
                'priority' => 4,
            ]
        ));

        // Bottom footer text color
        $wp_customize->add_setting(
            'bottom_footer_text_color',
            [
                'default' => '#333',
                'transport' => 'postMessage',
            ]
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'bottom_footer_text_color_control',
            [
                'label' => __('Bottom Footer Text Color', 'ger-school'),
                'section' => 'sch_footer_options',
                'settings' => 'bottom_footer_text_color',
                'priority' => 5,
            ]
        ));

        // Top footer hover color
        $wp_customize->add_setting(
            'top_footer_hover_color',
            [
                'default' => '#e6e6e6',
            ]
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'top_footer_hover_color_control',
            [
                'label' => __('Top Footer Hover Color', 'ger-school'),
                'section' => 'sch_footer_options',
                'settings' => 'top_footer_hover_color',
                'priority' => 6,
            ]
        ));

        // Bottom footer text
        $wp_customize->add_setting(
            'bottom_footer_text',
            [
                'default' => __('Imam Khomeini High School All Rights Reserved.', 'ger-school'),
            ]
        );
        $wp_customize->add_control(
            'bottom_footer_text_control',
            [
                'type' => 'textarea',
                'label' => __('Bottom Footer Content', 'ger-school'),
                'section' => 'sch_footer_options',
                'settings' => 'bottom_footer_text',
                'priority' => 7,
            ]
        );



        /**
         * General
         */
        $wp_customize->add_section(
            'sch_general_options',
            [
                'title' => __('General', 'ger-school'),
                'priority' => 28,
                'capability' => 'edit_theme_options',
            ]
        );

        // Post count
        $wp_customize->add_setting(
            'general_post_count',
            [
                'default' => 8,
            ]
        );
        $wp_customize->add_control(
            'general_post_count_control',
            [
                'label' => __('Posts Per Page in Category, Archive and Search Pages', 'ger-school'),
                'section' => 'sch_general_options',
                'settings' => 'general_post_count',
                'type' => 'number',
                'priority' => 1,
            ]
        );

        // Post excerpt cnt
        $wp_customize->add_setting(
            'general_post_short_cnt',
            [
                'default' => 250,
            ]
        );
        $wp_customize->add_control(
            'general_post_short_cnt_control',
            [
                'label' => __('Post Excerpt Characters Count', 'ger-school'),
                'section' => 'sch_general_options',
                'settings' => 'general_post_short_cnt',
                'type' => 'number',
                'priority' => 3,
            ]
        );

        // Upload size limit
        $wp_customize->add_setting(
            'general_upload_size_limit',
            [
                'default' => 150,
            ]
        );
        $wp_customize->add_control(
            'general_upload_size_limit_control',
            [
                'label' => __('Upload Limit For non-admin Users (KB)', 'ger-school'),
                'section' => 'sch_general_options',
                'settings' => 'general_upload_size_limit',
                'type' => 'number',
                'priority' => 4,
            ]
        );

        // JS
        $wp_customize->add_setting(
            'general_custom_script',
            [
                'default' => "convertDigitsToPersian(document.body); convertDigitsToEnglish(document.getElementById('post-0'));",
            ]
        );
        $wp_customize->add_control(
            'general_custom_script_control',
            [
                'type' => 'textarea',
                'label' => 'JS',
                'section' => 'sch_general_options',
                'settings' => 'general_custom_script',
                'priority' => 5,
                'input_attrs' => [
                    'dir' => 'ltr',
                ]
            ]
        );

        // Reset btn
        $wp_customize->add_control(
            'general_reset_btn',
            [
                'type' => 'button',
                'settings' => [],
                'priority' => 10,
                'section' => 'sch_general_options',
                'input_attrs' => [
                    'value' => __('Reset Theme Settings', 'ger-school'),
                    'class' => 'button button-primary',
                    'onclick' => "location.href='" . get_template_directory_uri() . "/inc/reset-customizer-settings.php';",
                ]
            ]
        );
    }


    /**
     * Live css
     */
    function header_output() {
?>
        <style type="text/css">
            body {
                background-image: url('<?php echo get_theme_mod('body_bg_image', get_template_directory_uri() . '/assets/images/body-bg.png'); ?>');
                background-repeat: <?php echo get_theme_mod('body_bg_repeat_image', ''); ?>;
                background-position: <?php echo get_theme_mod('body_bg_position_image', ''); ?>;
                background-color: <?php echo get_theme_mod('body_bg_color', ''); ?>;
                font-family: '<?php echo get_theme_mod('font_family', 'yekan'); ?>', Arial, Helvetica, sans-serif;
                font-size: <?php echo get_theme_mod('font_body_size', '14px'); ?>;
            }

            p {
                font-size: <?php echo get_theme_mod('font_body_size', '14px'); ?>;
                line-height: 1.82;
            }

            .btn,
            .form-control {
                font-size: <?php echo get_theme_mod('font_body_size', '14px'); ?>;
            }

            .navbar-default,
            .navbar-default .dropdown-menu li a {
                font-size: <?php echo get_theme_mod('font_nav', '14px'); ?>;
            }

            header {
                background-color: <?php echo get_theme_mod('header_bg_color', '#0B6688'); ?>;
            }

            header {
                border-color: <?php echo get_theme_mod('header_border_color', '#0A5A77'); ?>;
            }

            header {
                color: <?php echo get_theme_mod('header_text_color', '#ffffff'); ?>;
            }

            .navbar-default {
                background-color: <?php echo get_theme_mod('nav_bg_color', '#f8f8f8'); ?>;
                border-color: <?php echo get_theme_mod('nav_border_color', '#e7e7e7'); ?>;
            }

            .navbar-default .navbar-toggle,
            .navbar-default .navbar-collapse,
            .navbar-default .navbar-form {
                border-color: <?php echo get_theme_mod('nav_border_color', '#e7e7e7'); ?>;
            }

            .navbar-default .navbar-nav>li>a:hover,
            .navbar-default .navbar-nav>li>a:focus,
            .navbar-default .navbar-toggle:hover,
            .navbar-default .navbar-toggle:focus,
            .navbar-default .navbar-nav>.active>a,
            .navbar-default .navbar-nav>.active>a:hover,
            .navbar-default .navbar-nav>.active>a:focus {
                background-color: <?php echo get_theme_mod('nav_hover_color', '#e6e6e6'); ?>;
            }

            .navbar-default .navbar-nav>li>a,
            .navbar-default .navbar-brand {
                color: <?php echo get_theme_mod('nav_text_color', '#777'); ?>;
            }

            .navbar-default .navbar-nav>li>a:hover,
            .navbar-default .navbar-nav>li>a:focus,
            .navbar-default .navbar-nav>.active>a,
            .navbar-default .navbar-nav>.active>a:hover,
            .navbar-default .navbar-nav>.active>a:focus {
                color: <?php echo get_theme_mod('nav_text_hover_color', '#333333'); ?>;
            }

            .navbar-default .navbar-toggle .icon-bar {
                background-color: <?php echo get_theme_mod('nav_text_color', '#777'); ?>;
            }

            @media only screen and (max-width: 767px) {
                #custom-bootstrap-menu.navbar-default .dropdown-menu li a {
                    color: <?php echo get_theme_mod('nav_text_color', '#777'); ?>;
                }

                #custom-bootstrap-menu.navbar-default .dropdown-menu li a:hover,
                #custom-bootstrap-menu.navbar-default .dropdown-menu li a:focus {
                    color: <?php echo get_theme_mod('nav_text_hover_color', '#333333'); ?>;
                }
            }

            .panel-default,
            .single-post {
                border-color: <?php echo get_theme_mod('block_border_color', '#ddd'); ?>
            }

            .panel-default>.panel-heading {
                color: <?php echo get_theme_mod('block_title_text_color', '#333'); ?>;
                background-color: <?php echo get_theme_mod('block_title_bg_color', '#f5f5f5'); ?>;
                border-color: <?php echo get_theme_mod('block_border_color', '#ddd'); ?>
            }

            .sidebar .panel.login .panel-heading .nav-tabs li:not(.active) a {
                color: <?php echo get_theme_mod('block_title_text_color', '#333'); ?>;
            }

            .sidebar .panel.box .panel-heading i {
                background-color: <?php echo get_theme_mod('block_icon_bg_color', '#e6e6e6'); ?>;
                color: <?php echo get_theme_mod('block_icon_color', '#333'); ?>;
            }

            .sidebar .well {
                background-color: <?php echo get_theme_mod('block_title_bg_color', '#f5f5f5'); ?>;
                border-color: <?php echo get_theme_mod('block_border_color', '#ddd'); ?>;
                color: <?php echo get_theme_mod('block_title_text_color', '#333'); ?>;
            }

            .home-post p a,
            .single-post a,
            .single-post>h3,
            .home-post>h3 a,
            .page-header {
                color: <?php echo get_theme_mod('post_title_color', '#337AB7'); ?>;
            }

            .home-post a:focus,
            .home-post a:hover,
            .single-post a:focus,
            .single-post a:hover {
                color: <?php echo get_theme_mod('post_title_hover_color', '#23527c'); ?>;
            }

            .home-post p,
            .single-post p,
            .single-post li,
            .single-post .single-post-content {
                color: <?php echo get_theme_mod('post_text_color', '#333'); ?>;
            }

            .home-post .btn-primary {
                background: <?php echo get_theme_mod('post_more_bg_color', '#337ab7'); ?>;
                color: <?php echo get_theme_mod('post_more_text_color', '#FFF'); ?>;
                border: <?php echo get_theme_mod('post_more_bg_color', '#337ab7'); ?>;
            }

            .home-post .btn-primary:hover,
            .home-post .btn-primary:focus {
                background: <?php echo get_theme_mod('post_more_hover_bg_color', '#2E6DA4'); ?>;
                color: <?php echo get_theme_mod('post_more_text_color', '#FFF'); ?>;
            }

            hr {
                border-color: <?php echo get_theme_mod('post_hr_color', '#EEE'); ?>;
            }

            footer {
                background-color: <?php echo get_theme_mod('top_footer_bg_color', '#f8f8f8'); ?>;
            }

            footer #bottom-footer {
                background-color: <?php echo get_theme_mod('bottom_footer_bg_color', '#e6e6e6'); ?>;
            }

            footer #bottom-footer {
                border-color: <?php echo get_theme_mod('bottom_footer_bg_color', '#e6e6e6'); ?>;
            }

            footer #top-footer {
                color: <?php echo get_theme_mod('top_footer_text_color', '#333'); ?>;
            }

            footer #top-footer h4 {
                border-color: <?php echo get_theme_mod('top_footer_text_color', '#333'); ?>;
            }

            footer #top-footer,
            footer #top-footer .foot-visit li,
            footer #top-footer .foot-comment li a,
            footer #top-footer .foot-archive li a,
            footer #top-footer .foot-other li a {
                color: <?php echo get_theme_mod('top_footer_text_color', '#333'); ?>;
            }

            footer #bottom-footer {
                color: <?php echo get_theme_mod('bottom_footer_text_color', '#333'); ?>;
            }

            footer #top-footer .foot-archive li a:hover,
            footer #top-footer .foot-other li a:hover,
            footer #top-footer .foot-comment li a:hover {
                background: <?php echo get_theme_mod('top_footer_hover_color', '#e6e6e6'); ?>;
            }

            .home-post>h3 {
                font-size: <?php echo get_theme_mod('font_size_home_post_title', '20px'); ?>;
            }

            .home-post>p.small {
                font-size: <?php echo get_theme_mod('font_size_home_post_small', '12px'); ?>;
            }

            .home-post>p:not(.small) {
                font-size: <?php echo get_theme_mod('font_size_home_post_p', '14px'); ?>;
                line-height: <?php echo get_theme_mod('font_line_home_post', '1.82'); ?>;
            }

            .single-post>h3 {
                font-size: <?php echo get_theme_mod('font_size_single_post_title', '20px'); ?>;
            }

            .single-post>ul>li {
                font-size: <?php echo get_theme_mod('font_size_single_post_small', '12px'); ?>;
            }

            .single-post-content {
                font-size: <?php echo get_theme_mod('font_size_single_post_p', '14px'); ?>;
                line-height: <?php echo get_theme_mod('font_line_single_post', '1.82'); ?>;
            }

            .sidebar .well h4,
            .sidebar .panel .panel-heading i,
            .sidebar .panel .panel-heading h4,
            footer #top-footer .foot-title i,
            footer #top-footer .foot-title h4 {
                font-size: <?php echo get_theme_mod('font_size_widget_title', '17px'); ?>;
            }

            .sidebar .panel .panel-heading li {
                font-size: <?php echo floatval(str_replace('px', '', (get_theme_mod('font_size_widget_title', '17px'))) * 0.8) . 'px'; ?>;
            }

            .sidebar .panel.box .list-group .list-group-item h5 {
                font-size: <?php echo get_theme_mod('font_size_widget_post_title', '12px'); ?>;
            }

            .sidebar .panel.box .list-group .list-group-item p {
                font-size: <?php echo get_theme_mod('font_size_widget_post_content', '10px'); ?>;
                line-height: <?php echo get_theme_mod('font_line_widget_post_content', '1.5'); ?>;
            }

            header h4 {
                font-size: <?php echo get_theme_mod('font_size_header_h4', '18px'); ?>;
            }

            header h2 {
                font-size: <?php echo get_theme_mod('font_size_header_h2', '30px'); ?>;
            }

            .page-header {
                font-size: <?php echo get_theme_mod('font_size_single_post_title', '20px'); ?>;
            }
        </style>
<?php
    }
}
