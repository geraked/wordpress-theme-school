<?php 
add_action( 'init', 'sch_slide_init' );
/**
 * Register a Slide post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function sch_slide_init() {
	$labels = array(
		'name'               => _x( 'اسلایدها', 'post type general name', 'sch-slider' ),
		'singular_name'      => _x( 'اسلاید', 'post type singular name', 'sch-slider' ),
		'menu_name'          => _x( 'اسلایدر', 'admin menu', 'sch-slider' ),
		'name_admin_bar'     => _x( 'اسلاید', 'add new on admin bar', 'sch-slider' ),
		'add_new'            => _x( 'افزودن اسلاید جدید', 'Slide', 'sch-slider' ),
		'add_new_item'       => __( 'افزودن اسلاید جدید', 'sch-slider' ),
		'new_item'           => __( 'اسلاید جدید', 'sch-slider' ),
		'edit_item'          => __( 'ویرایش اسلاید', 'sch-slider' ),
		'view_item'          => __( 'نمایش اسلاید', 'sch-slider' ),
		'all_items'          => __( 'همه اسلایدها', 'sch-slider' ),
		'search_items'       => __( 'جستجوی اسلایدها', 'sch-slider' ),
		'parent_item_colon'  => __( 'اسلایدهای مادر:', 'sch-slider' ),
		'not_found'          => __( 'اسلایدی یافت نشد.', 'sch-slider' ),
		'not_found_in_trash' => __( 'اسلایدی در زباله دان یافت نشد.', 'sch-slider' )
	);

	$args = array(
		'labels'            => $labels,
		'description'       => __( '750*380', 'sch-slider' ),
		'public' 			=> 	true,
		'show_ui'			=> 	true,
		'capability_type' 	=> 	'post',
		'hierarchical'		=> 	false,
		'rewrite' 			=> 	array('slug' => 'slides'),
		'query_var' 		=> 	true,
		'supports'			=> 	array('title','revisions','thumbnail','page-attributes'),
		'menu_icon'   		=> 'dashicons-format-gallery',
	);

	register_post_type( 'slides', $args );
}
