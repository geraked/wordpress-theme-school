<?php
// فعال سازی منوی بالا
include 'navwalker.php';
add_theme_support('menus');
register_nav_menu('navb-header', 'نوار منو بالای سایت');

// وارد کردن ابزارک های اختصاصی
include 'widgets/widgets.php';

// سایدبار سمت راست
if (function_exists('register_sidebar'))
	register_sidebar(array(
		'id' => 'sidebar-1',
		'name' => 'Sidebar',
		'description' => '',
		'before_widget' => '<div class="panel panel-default box other">',
		'after_widget' => '</div></div>',
		'before_title' => '<div class="panel-heading"><i class="fa fa-archive"></i><h4>',
		'after_title' => '</h4></div><div class="panel-body">',
	));

// فوتر
if (function_exists('register_sidebar'))
	register_sidebar(array(
		'id' => 'foot-1',
		'name' => 'Foot1',
		'description' => '',
		'before_widget' => '<div class="foot-other">',
		'after_widget' => '</div>',
		'before_title' => '<h4><i class="fa fa-archive"></i> ',
		'after_title' => '</h4>',
	));
if (function_exists('register_sidebar'))
	register_sidebar(array(
		'id' => 'foot-2',
		'name' => 'Foot2',
		'description' => '',
		'before_widget' => '<div class="foot-other">',
		'after_widget' => '</div>',
		'before_title' => '<h4><i class="fa fa-archive"></i> ',
		'after_title' => '</h4>',
	));
if (function_exists('register_sidebar'))
	register_sidebar(array(
		'id' => 'foot-3',
		'name' => 'Foot3',
		'description' => '',
		'before_widget' => '<div class="foot-other">',
		'after_widget' => '</div>',
		'before_title' => '<h4><i class="fa fa-archive"></i> ',
		'after_title' => '</h4>',
	));
if (function_exists('register_sidebar'))
	register_sidebar(array(
		'id' => 'foot-4',
		'name' => 'Foot4',
		'description' => '',
		'before_widget' => '<div class="foot-other">',
		'after_widget' => '</div>',
		'before_title' => '<h4><i class="fa fa-archive"></i> ',
		'after_title' => '</h4>',
	));

// فعال سازی پیوندها
add_filter('pre_option_link_manager_enabled', '__return_true');

// فعال سازی تصویر شاخص
add_theme_support('post-thumbnails');
function paulund_remove_default_image_sizes($sizes)
{
	//unset( $sizes['thumbnail']);
	unset($sizes['medium']);
	unset($sizes['large']);
	unset($sizes['medium_large']);
	return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'paulund_remove_default_image_sizes');
update_option('thumbnail_size_h', 360);
update_option('thumbnail_size_w', 640);
update_option('medium_size_h', 0);
update_option('medium_size_w', 0);
update_option('large_size_h', 0);
update_option('large_size_w', 0);
update_option('thumbnail_crop', 1);
// add_image_size( 'sch-slider', '750', '422', true );
// تابع نمایش تصویر شاخص
function post_image($width, $height)
{
	if (has_post_thumbnail()) {
		the_post_thumbnail(array($width, $height));
	} else {
		echo '<img src="' . get_bloginfo('stylesheet_directory') . '/images/no-thumbnail.jpg" style="width:' . $width . 'px; height:' . $height . 'px;">'; // عکس مطلب
	}
}

// تابع نمایش خلاصه مطلب
function sch_content($max_char)
{
	$content = get_the_content();
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	$content = strip_tags($content, '');
	if ((strlen(utf8_decode($content)) > $max_char) && ($espacio = strpos($content, " ", $max_char))) {
		$content = mb_substr($content, 0, $espacio);
		echo $content;
		echo "...";
	} else {
		echo $content;
	}
}

// تابع نمایش عنوان
function sch_title($length)
{
	$after		=	'...';
	$mytitle	=	get_the_title();
	if (strlen(utf8_decode($mytitle)) > $length) {
		$mytitle = mb_substr($mytitle, 0, $length);
		echo $mytitle . $after;
	} else {
		echo $mytitle;
	}
}

// تابع نمایش آخرین دیدگاه‌ها
function sch_most_commented($comment_posts, $avatar_size, $char)
{
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

// وارد کردن سفارشی سازی پوسته
include 'customizer/customizer.php';

// ویرایش استایل‌های منوی کاربری
function sch_wp_admin_style()
{
	wp_register_style('sch_wp_admin_css', get_template_directory_uri() . '/customizer/css/admin-style.css');
	wp_enqueue_style('sch_wp_admin_css');
}
add_action('admin_enqueue_scripts', 'sch_wp_admin_style');
add_action('login_enqueue_scripts', 'sch_wp_admin_style');

// ویرایش اسکریپت‌های منوی کاربری
function sch_wp_admin_script()
{
	wp_register_script('sch_wp_admin_js', get_template_directory_uri() . '/customizer/js/admin-script.js');
	wp_enqueue_script('sch_wp_admin_js');
}
add_action('admin_enqueue_scripts', 'sch_wp_admin_script');

// وارد کردن اسلایدر
include 'customizer/slider.php';

// غیر فعال سازی فیلد‌های غیر ضروری ارسال مطلب
add_action('init', 'sch_post_custom_init');
function sch_post_custom_init()
{
	remove_post_type_support('post', 'excerpt');
	remove_post_type_support('post', 'custom-fields');
}

// مربوط به سفارشی سازی
add_action('pre_get_posts',  'set_posts_per_page');
function set_posts_per_page($query)
{
	global $wp_the_query;
	if ((!is_admin()) && ($query === $wp_the_query) && ($query->is_search() || $query->is_archive() || $query->is_category())) {
		$query->set('posts_per_page', get_theme_mod('general_post_count', 10));
	}
	return $query;
}
function filter_site_upload_size_limit($size)
{
	if (!current_user_can('manage_options')) {
		$size = 1024 * get_theme_mod('general_upload_size_limit', 100);
	}
	return $size;
}
add_filter('upload_size_limit', 'filter_site_upload_size_limit');

// تابع دریافت تاریخ مطالب
function get_publish_jdate()
{
	$greg_date = get_post_time('j F Y');
	$timestamp = strtotime($greg_date);
	if (function_exists('jdate')) {
		echo jdate('j F Y', $timestamp);
	} else {
		echo $greg_date;
	}
}

// محدودیت آپلود برای کاربران غیر از مدیر
function restrict_mime($mimes)
{
	if (!current_user_can('manage_options')) {
		$mimes = array(
			'jpg' => 'image/jpg',
		);
	}
	return $mimes;
}
add_filter('upload_mimes', 'restrict_mime');

?>