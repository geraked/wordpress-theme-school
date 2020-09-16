<?php
//غیر فعال سازی ابزارک های پیشفرض
add_action( 'widgets_init', 'my_unregister_widgets' );
function my_unregister_widgets() {
	unregister_widget( 'WP_Widget_Pages' );
	unregister_widget( 'WP_Widget_Calendar' );
	unregister_widget( 'WP_Widget_Archives' );
	unregister_widget( 'WP_Widget_Links' );
	unregister_widget( 'WP_Widget_Categories' );
	unregister_widget( 'WP_Widget_Recent_Posts' );
	unregister_widget( 'WP_Widget_Search' );
	unregister_widget( 'WP_Widget_Tag_Cloud' );
	unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Nav_Menu_Widget');
	unregister_widget('Twenty_Eleven_Ephemera_Widget');
	unregister_widget('WP_Widget_Text');
	unregister_widget('WP_Widget_Meta');

	if ( is_plugin_active( 'wp-jalali/wp-jalali.php' ) ) {
		unregister_widget( 'ztjalali_archive' );
		unregister_widget( 'ztjalali_calendar' );
	}

	if ( is_plugin_active( 'wp-statistics/wp-statistics.php' ) ) {
		unregister_widget( 'WP_Statistics_Widget' );
	}
}

//وارد کردن ابزارک های اختصاصی
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

include 'last-posts.php';
include 'last-comments.php';
include 'links.php';
include 'search.php';
include 'lms-login.php';
include 'html.php';

if ( is_plugin_active( 'wp-jalali/wp-jalali.php' ) )
	include 'archive.php';

if ( is_plugin_active( 'wp-statistics/wp-statistics.php' ) )
	include 'statistics.php';
?>
