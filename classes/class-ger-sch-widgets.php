<?php

/**
 * Theme Custom Widgets
 * 
 * @package Ger_School
 */


require_once 'widgets/class-ger-sch-html.php';
require_once 'widgets/class-ger-sch-latest-comments.php';
require_once 'widgets/class-ger-sch-latest-posts.php';
require_once 'widgets/class-ger-sch-links.php';
require_once 'widgets/class-ger-sch-lms-login.php';
require_once 'widgets/class-ger-sch-search.php';


/**
 * Manage custom widgets
 */
class Ger_Sch_Widgets {

    /**
     * Constructor
     */
    public function __construct() {
        // add_action('widgets_init', [$this, 'unregister']);
        $this->register();
    }


    /**
     * Register custom widgets
     */
    function register() {
        $this->ger_sch_html = new Ger_Sch_Html();
        $this->ger_sch_latest_comments = new Ger_Sch_Latest_Comments();
        $this->ger_sch_latest_posts = new Ger_Sch_Latest_Posts();
        $this->ger_sch_links = new Ger_Sch_Links();
        $this->ger_sch_lms_login = new Ger_Sch_Lms_Login();
        $this->ger_sch_search = new Ger_Sch_Search();
    }


    /**
     * Unregister some default widgets
     */
    function unregister() {
        unregister_widget('WP_Widget_Pages');
        unregister_widget('WP_Widget_Calendar');
        unregister_widget('WP_Widget_Archives');
        unregister_widget('WP_Widget_Links');
        unregister_widget('WP_Widget_Categories');
        unregister_widget('WP_Widget_Recent_Posts');
        unregister_widget('WP_Widget_Search');
        unregister_widget('WP_Widget_Tag_Cloud');
        unregister_widget('WP_Widget_RSS');
        unregister_widget('WP_Widget_Recent_Comments');
        unregister_widget('WP_Nav_Menu_Widget');
        unregister_widget('Twenty_Eleven_Ephemera_Widget');
        unregister_widget('WP_Widget_Text');
        unregister_widget('WP_Widget_Meta');
    }
}
