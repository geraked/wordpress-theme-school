<?php
class Sch_Customizer
{
	function register($wp_customize)
	{

		$wp_customize->remove_section('static_front_page');
		$wp_customize->remove_panel('widgets');

		//header
		$wp_customize->add_section(
			'sch_header_options',
			array(
				'title'       => __('هدر', 'school'),
				'priority'    => 21,
				'capability'  => 'edit_theme_options',
				'description' => __('هدر را به سلیقه خود ویرایش کنید!', 'school'),
			)
		);

		//header bg color
		$wp_customize->add_setting(
			'header_bg_color',
			array(
				'default'   => '#0B6688',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize,
			'header_bg_color_control',
			array(
				'label'    => __('رنگ هدر', 'school'),
				'section'  => 'sch_header_options',
				'settings' => 'header_bg_color',
				'priority' => 1,
			)
		));

		//header border color
		$wp_customize->add_setting(
			'header_border_color',
			array(
				'default'   => '#0A5A77',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize,
			'header_border_color_control',
			array(
				'label'    => __('رنگ خط پایین هدر', 'school'),
				'section'  => 'sch_header_options',
				'settings' => 'header_border_color',
				'priority' => 2,
			)
		));

		//header text color
		$wp_customize->add_setting(
			'header_text_color',
			array(
				'default'   => '#ffffff',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize,
			'header_text_color_control',
			array(
				'label'    => __('رنگ متن', 'school'),
				'section'  => 'sch_header_options',
				'settings' => 'header_text_color',
				'priority' => 3,
			)
		));

		//header title
		$wp_customize->add_setting(
			'header_title',
			array(
				'default'   => 'عنوان پایین هدر',
			)
		);
		$wp_customize->add_control(
			'header_title_control',
			array(
				'type'     => 'text',
				'label'    => __('عنوان هدر', 'school'),
				'section'  => 'sch_header_options',
				'settings' => 'header_title',
				'priority' => 4,
			)
		);

		//header description
		$wp_customize->add_setting(
			'header_description',
			array(
				'default'   => 'عنوان بالای هدر',
			)
		);
		$wp_customize->add_control(
			'header_description_control',
			array(
				'type'     => 'text',
				'label'    => __('توضیحات هدر', 'school'),
				'section'  => 'sch_header_options',
				'settings' => 'header_description',
				'priority' => 5,
			)
		);

		//navigation
		$wp_customize->add_section(
			'sch_nav_options',
			array(
				'title'       => __('منوی بالا', 'school'),
				'priority'    => 22,
				'capability'  => 'edit_theme_options',
				'description' => __('منوی بالا را به سلیقه خود ویرایش کنید', 'school'),
			)
		);

		//nav bg color
		$wp_customize->add_setting(
			'nav_bg_color',
			array(
				'default'   => '#f8f8f8',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize,
			'nav_bg_color_control',
			array(
				'label'    => __('رنگ پس زمینه', 'school'),
				'section'  => 'sch_nav_options',
				'settings' => 'nav_bg_color',
				'priority' => 1,
			)
		));

		//nav hover color
		$wp_customize->add_setting(
			'nav_hover_color',
			array(
				'default'   => '#e6e6e6',
			)
		);
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize,
			'nav_hover_color_control',
			array(
				'label'    => __('رنگ پس زمینه هاور', 'school'),
				'section'  => 'sch_nav_options',
				'settings' => 'nav_hover_color',
				'priority' => 2,
			)
		));

		//nav text hover color
		$wp_customize->add_setting(
			'nav_text_hover_color',
			array(
				'default'   => '#333333',
			)
		);
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize,
			'nav_text_hover_color_control',
			array(
				'label'    => __('رنگ متن هاور', 'school'),
				'section'  => 'sch_nav_options',
				'settings' => 'nav_text_hover_color',
				'priority' => 3,
			)
		));

		//nav text color
		$wp_customize->add_setting(
			'nav_text_color',
			array(
				'default'   => '#777',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize,
			'nav_text_color_control',
			array(
				'label'    => __('رنگ متن', 'school'),
				'section'  => 'sch_nav_options',
				'settings' => 'nav_text_color',
				'priority' => 4,
			)
		));

		//nav border color
		$wp_customize->add_setting(
			'nav_border_color',
			array(
				'default'   => '#e7e7e7',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize,
			'nav_border_color_control',
			array(
				'label'    => __('رنگ کادر', 'school'),
				'section'  => 'sch_nav_options',
				'settings' => 'nav_border_color',
				'priority' => 5,
			)
		));


		//sidebar
		$wp_customize->add_section(
			'sch_sidebar_options',
			array(
				'title'       => __('سایدبار', 'school'),
				'priority'    => 23,
				'capability'  => 'edit_theme_options',
				'description' => __('سایدبار را به سلیقه خود ویرایش کنید!', 'school'),
			)
		);

		//sidebar position
		$wp_customize->add_setting(
			'sidebar_position',
			array(
				'default'   => 'سمت چپ',
			)
		);
		$wp_customize->add_control(
			'sidebar_position_control',
			array(
				'label'    => __('محل نمایش سایدبار', 'school'),
				'section'  => 'sch_sidebar_options',
				'settings' => 'sidebar_position',
				'type'     => 'radio',
				'choices'  => array(
					'سمت راست'  => 'سمت راست',
					'سمت چپ'    => 'سمت چپ',
				),
				'priority' => 1
			)
		);

		//block title bg color
		$wp_customize->add_setting(
			'block_title_bg_color',
			array(
				'default'   => '#f5f5f5',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize,
			'block_title_bg_color_control',
			array(
				'label'    => __('رنگ پس زمینه عنوان بلاک', 'school'),
				'section'  => 'sch_sidebar_options',
				'settings' => 'block_title_bg_color',
				'priority' => 2,
			)
		));

		//block title text color
		$wp_customize->add_setting(
			'block_title_text_color',
			array(
				'default'   => '#333',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize,
			'block_title_text_color_control',
			array(
				'label'    => __('رنگ عنوان بلاک', 'school'),
				'section'  => 'sch_sidebar_options',
				'settings' => 'block_title_text_color',
				'priority' => 3,
			)
		));

		//block icon bg color
		$wp_customize->add_setting(
			'block_icon_bg_color',
			array(
				'default'   => '#e6e6e6',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize,
			'block_icon_bg_color_control',
			array(
				'label'    => __('رنگ پس زمینه آیکن بلاک', 'school'),
				'section'  => 'sch_sidebar_options',
				'settings' => 'block_icon_bg_color',
				'priority' => 4,
			)
		));

		//block icon color
		$wp_customize->add_setting(
			'block_icon_color',
			array(
				'default'   => '#333',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize,
			'block_icon_color_control',
			array(
				'label'    => __('رنگ آیکن بلاک', 'school'),
				'section'  => 'sch_sidebar_options',
				'settings' => 'block_icon_color',
				'priority' => 5,
			)
		));

		//block border color
		$wp_customize->add_setting(
			'block_border_color',
			array(
				'default'   => '#ddd',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize,
			'block_border_color_control',
			array(
				'label'    => __('رنگ کادر بلاک', 'school'),
				'section'  => 'sch_sidebar_options',
				'settings' => 'block_border_color',
				'priority' => 6,
			)
		));


		//body
		$wp_customize->add_section(
			'sch_body_options',
			array(
				'title'       => __('بدنه', 'school'),
				'priority'    => 24,
				'capability'  => 'edit_theme_options',
				'description' => __('بدنه را به سلیقه خود ویرایش کنید!', 'school'),
			)
		);

		//body bg image
		$wp_customize->add_setting(
			'body_bg_image',
			array(
				'default'   => get_template_directory_uri() . '/images/body-bg.png',
			)
		);
		$wp_customize->add_control(new WP_Customize_Image_Control(
			$wp_customize,
			'body_bg_image_control',
			array(
				'label'    => __('تصویر پس زمینه', 'school'),
				'section'  => 'sch_body_options',
				'settings' => 'body_bg_image',
				'priority' => 1,
			)
		));

		//body bg repeat image 
		$wp_customize->add_setting(
			'body_bg_repeat_image',
			array(
				'default'  => '',
			)
		);
		$wp_customize->add_control(
			'body_bg_repeat_image_control',
			array(
				'label'    => __('تکرار پس زمینه', 'school'),
				'section'  => 'sch_body_options',
				'settings' => 'body_bg_repeat_image',
				'type'     => 'select',
				'choices'  => array(
					''           => '',
					'repeat'     => 'repeat',
					'repeat-x'   => 'repeat-x',
					'repeat-y'   => 'repeat-y',
					'no-repeat'  => 'no-repeat',
				),
				'priority' => 2
			)
		);

		//body bg position image 
		$wp_customize->add_setting(
			'body_bg_position_image',
			array(
				'default'  => '',
			)
		);
		$wp_customize->add_control(
			'body_bg_position_image_control',
			array(
				'label'    => __('محل پس زمینه', 'school'),
				'section'  => 'sch_body_options',
				'settings' => 'body_bg_position_image',
				'type'     => 'select',
				'choices'  => array(
					''        => '',
					'center'  => 'center',
					'right'   => 'right',
					'left'    => 'left',
					'top'     => 'top',
					'bottom'  => 'bottom',
				),
				'priority' => 2
			)
		);

		$wp_customize->add_setting(
			'body_bg_color',
			array(
				'default'   => '#FFF',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize,
			'body_bg_color_control',
			array(
				'label'    => __('رنگ پس زمینه', 'school'),
				'section'  => 'sch_body_options',
				'settings' => 'body_bg_color',
				'priority' => 3,
			)
		));		


		//posts
		$wp_customize->add_section(
			'sch_posts_options',
			array(
				'title'       => __('پست‌ها', 'school'),
				'priority'    => 25,
				'capability'  => 'edit_theme_options',
				'description' => __('رنگ متن پست ها را به سلیقه خود ویرایش کنید!', 'school'),
			)
		);

		//post title color
		$wp_customize->add_setting(
			'post_title_color',
			array(
				'default'   => '#337AB7',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize,
			'post_title_color_control',
			array(
				'label'    => __('رنگ عنوان', 'school'),
				'section'  => 'sch_posts_options',
				'settings' => 'post_title_color',
				'priority' => 1,
			)
		));

		//post title hover color
		$wp_customize->add_setting(
			'post_title_hover_color',
			array(
				'default'   => '#23527c',
			)
		);
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize,
			'post_title_hover_color_control',
			array(
				'label'    => __('رنگ هاور عنوان', 'school'),
				'section'  => 'sch_posts_options',
				'settings' => 'post_title_hover_color',
				'priority' => 2,
			)
		));

		//post text color
		$wp_customize->add_setting(
			'post_text_color',
			array(
				'default'   => '#333',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize,
			'post_text_color_control',
			array(
				'label'    => __('رنگ متن', 'school'),
				'section'  => 'sch_posts_options',
				'settings' => 'post_text_color',
				'priority' => 3,
			)
		));

		//post more bg color
		$wp_customize->add_setting(
			'post_more_bg_color',
			array(
				'default'   => '#337ab7',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize,
			'post_more_bg_color_control',
			array(
				'label'    => __('رنگ پس زمینه دکمه ادامه مطلب', 'school'),
				'section'  => 'sch_posts_options',
				'settings' => 'post_more_bg_color',
				'priority' => 4,
			)
		));

		//post more text color
		$wp_customize->add_setting(
			'post_more_text_color',
			array(
				'default'   => '#FFF',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize,
			'post_more_text_color_control',
			array(
				'label'    => __('رنگ متن دکمه ادامه مطلب', 'school'),
				'section'  => 'sch_posts_options',
				'settings' => 'post_more_text_color',
				'priority' => 5,
			)
		));

		//post more bg hover color
		$wp_customize->add_setting(
			'post_more_hover_bg_color',
			array(
				'default'   => '#2E6DA4',
			)
		);
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize,
			'post_more_hover_bg_control',
			array(
				'label'    => __('رنگ پس زمینه هاور دکمه ادامه مطلب', 'school'),
				'section'  => 'sch_posts_options',
				'settings' => 'post_more_hover_bg_color',
				'priority' => 6,
			)
		));

		//post hr color
		$wp_customize->add_setting(
			'post_hr_color',
			array(
				'default'   => '#EEE',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize,
			'post_hr_color_control',
			array(
				'label'    => __('رنگ خط جداکننده مطالب', 'school'),
				'section'  => 'sch_posts_options',
				'settings' => 'post_hr_color',
				'priority' => 7,
			)
		));


		//fonts
		$wp_customize->add_section(
			'sch_fonts_options',
			array(
				'title'       => __('فونت‌ها', 'school'),
				'priority'    => 26,
				'capability'  => 'edit_theme_options',
				'description' => __('نوع و سایز فونت‌ها را به سلیقه خود ویرایش کنید!', 'school'),
			)
		);

		//font family 
		$wp_customize->add_setting(
			'font_family',
			array(
				'default'  => 'yekan',
			)
		);
		$wp_customize->add_control(
			'font_family_control',
			array(
				'label'    => __('نوع فونت', 'school'),
				'section'  => 'sch_fonts_options',
				'settings' => 'font_family',
				'type'     => 'select',
				'choices'  => array(
					'yekan'         => 'yekan',
					'IranSans'  	=> 'IranSans',
					'Koodak'        => 'Koodak',
					'Nazanin'		=> 'Nazanin',
				),
				'priority' => 1
			)
		);



		$wp_customize->add_setting(
			'font_size_home_post_title',
			array(
				'default'  => '20px',
			)
		);
		$wp_customize->add_control(
			'font_size_home_post_title_control',
			array(
				'label'    => __('سایز فونت عنوان مطلب در خلاصه', 'school'),
				'section'  => 'sch_fonts_options',
				'settings' => 'font_size_home_post_title',
				'type'     => 'text',
				'priority' => 2
			)
		);

		$wp_customize->add_setting(
			'font_size_home_post_p',
			array(
				'default'  => '14px',
			)
		);
		$wp_customize->add_control(
			'font_size_home_post_p_control',
			array(
				'label'    => __('سایز فونت مطلب در خلاصه', 'school'),
				'section'  => 'sch_fonts_options',
				'settings' => 'font_size_home_post_p',
				'type'     => 'text',
				'priority' => 3
			)
		);
		
		$wp_customize->add_setting(
			'font_size_home_post_small',
			array(
				'default'  => '12px',
			)
		);
		$wp_customize->add_control(
			'font_size_home_post_small_control',
			array(
				'label'    => __('سایز فونت جزئیات مطلب در خلاصه', 'school'),
				'section'  => 'sch_fonts_options',
				'settings' => 'font_size_home_post_small',
				'type'     => 'text',
				'priority' => 4
			)
		);
		
		$wp_customize->add_setting(
			'font_line_home_post',
			array(
				'default'  => '1.82',
			)
		);
		$wp_customize->add_control(
			'font_line_home_post_control',
			array(
				'label'    => __('فاصله بین خطوط مطلب در خلاصه', 'school'),
				'section'  => 'sch_fonts_options',
				'settings' => 'font_line_home_post',
				'type'     => 'text',
				'priority' => 5
			)
		);		

		$wp_customize->add_setting(
			'font_size_single_post_title',
			array(
				'default'  => '20px',
			)
		);
		$wp_customize->add_control(
			'font_size_single_post_title_control',
			array(
				'label'    => __('سایز فونت عنوان مطلب', 'school'),
				'section'  => 'sch_fonts_options',
				'settings' => 'font_size_single_post_title',
				'type'     => 'text',
				'priority' => 6
			)
		);
		
		$wp_customize->add_setting(
			'font_size_single_post_p',
			array(
				'default'  => '14px',
			)
		);
		$wp_customize->add_control(
			'font_size_single_post_p_control',
			array(
				'label'    => __('سایز فونت مطلب', 'school'),
				'section'  => 'sch_fonts_options',
				'settings' => 'font_size_single_post_p',
				'type'     => 'text',
				'priority' => 7
			)
		);
		
		$wp_customize->add_setting(
			'font_size_single_post_small',
			array(
				'default'  => '12px',
			)
		);
		$wp_customize->add_control(
			'font_size_single_post_small_control',
			array(
				'label'    => __('سایز فونت جزئیات مطلب', 'school'),
				'section'  => 'sch_fonts_options',
				'settings' => 'font_size_single_post_small',
				'type'     => 'text',
				'priority' => 8
			)
		);
		
		$wp_customize->add_setting(
			'font_line_single_post',
			array(
				'default'  => '1.82',
			)
		);
		$wp_customize->add_control(
			'font_line_single_post_control',
			array(
				'label'    => __('فاصله بین خطوط مطلب', 'school'),
				'section'  => 'sch_fonts_options',
				'settings' => 'font_line_single_post',
				'type'     => 'text',
				'priority' => 9
			)
		);

		$wp_customize->add_setting(
			'font_size_widget_title',
			array(
				'default'  => '17px',
			)
		);
		$wp_customize->add_control(
			'font_size_widget_title_control',
			array(
				'label'    => __('سایز فونت عنوان ابزارک', 'school'),
				'section'  => 'sch_fonts_options',
				'settings' => 'font_size_widget_title',
				'type'     => 'text',
				'priority' => 10
			)
		);
		
		$wp_customize->add_setting(
			'font_size_widget_post_title',
			array(
				'default'  => '12px',
			)
		);
		$wp_customize->add_control(
			'font_size_widget_post_title_control',
			array(
				'label'    => __('سایز فونت عنوان مطلب در ابزارک', 'school'),
				'section'  => 'sch_fonts_options',
				'settings' => 'font_size_widget_post_title',
				'type'     => 'text',
				'priority' => 11
			)
		);

		$wp_customize->add_setting(
			'font_size_widget_post_content',
			array(
				'default'  => '10px',
			)
		);
		$wp_customize->add_control(
			'font_size_widget_post_content_control',
			array(
				'label'    => __('سایز فونت مطلب در ابزارک', 'school'),
				'section'  => 'sch_fonts_options',
				'settings' => 'font_size_widget_post_content',
				'type'     => 'text',
				'priority' => 12
			)
		);
		
		$wp_customize->add_setting(
			'font_line_widget_post_content',
			array(
				'default'  => '1.5',
			)
		);
		$wp_customize->add_control(
			'font_line_widget_post_content_control',
			array(
				'label'    => __('فاصله بین خطوط مطلب در ابزارک', 'school'),
				'section'  => 'sch_fonts_options',
				'settings' => 'font_line_widget_post_content',
				'type'     => 'text',
				'priority' => 13
			)
		);		

		$wp_customize->add_setting(
			'font_size_header_h4',
			array(
				'default'  => '18px',
			)
		);
		$wp_customize->add_control(
			'font_size_header_h4_control',
			array(
				'label'    => __('سایز فونت متن بالای هدر', 'school'),
				'section'  => 'sch_fonts_options',
				'settings' => 'font_size_header_h4',
				'type'     => 'text',
				'priority' => 14
			)
		);

		$wp_customize->add_setting(
			'font_size_header_h2',
			array(
				'default'  => '30px',
			)
		);
		$wp_customize->add_control(
			'font_size_header_h2_control',
			array(
				'label'    => __('سایز فونت متن پایین هدر', 'school'),
				'section'  => 'sch_fonts_options',
				'settings' => 'font_size_header_h2',
				'type'     => 'text',
				'priority' => 15
			)
		);		

		//font nav 
		$wp_customize->add_setting(
			'font_nav',
			array(
				'default'  => '14px',
			)
		);
		$wp_customize->add_control(
			'font_nav_control',
			array(
				'label'    => __('سایز فونت منوی بالا', 'school'),
				'section'  => 'sch_fonts_options',
				'settings' => 'font_nav',
				'type'     => 'text',
				'priority' => 16
			)
		);

		//font body 
		$wp_customize->add_setting(
			'font_body_size',
			array(
				'default'  => '14px',
			)
		);
		$wp_customize->add_control(
			'font_body_size_control',
			array(
				'label'    => __('سایز فونت سایر موارد', 'school'),
				'section'  => 'sch_fonts_options',
				'settings' => 'font_body_size',
				'type'     => 'text',
				'priority' => 17
			)
		);


		//footer
		$wp_customize->add_section(
			'sch_footer_options',
			array(
				'title'       => __('فوتر', 'school'),
				'priority'    => 27,
				'capability'  => 'edit_theme_options',
				'description' => __('فوتر را به سلیقه خود ویرایش کنید!', 'school'),
			)
		);

		//top footer columns
		$wp_customize->add_setting(
			'top_footer_columns',
			array(
				'default'   => 'سه ستونه- سمت راست کشیده',
			)
		);
		$wp_customize->add_control(
			'top_footer_columns_control',
			array(
				'label'    => __('نحوه نمایش فوتر', 'school'),
				'section' => 'sch_footer_options',
				'settings' => 'top_footer_columns',
				'type'    => 'radio',
				'choices'  => array(
					'سه ستونه'  => 'سه ستونه',
					'سه ستونه- سمت راست کشیده'  => 'سه ستونه- سمت راست کشیده',
					'سه ستونه- سمت چپ کشیده' => 'سه ستونه- سمت چپ کشیده',
					'چهار ستونه' => 'چهار ستونه',
				),
				'priority' => 1
			)
		);

		//top footer bg color
		$wp_customize->add_setting(
			'top_footer_bg_color',
			array(
				'default'   => '#f8f8f8',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize,
			'top_footer_bg_color_control',
			array(
				'label'    => __('رنگ فوتر بالا', 'school'),
				'section'  => 'sch_footer_options',
				'settings' => 'top_footer_bg_color',
				'priority' => 2,
			)
		));

		//bottom footer bg color
		$wp_customize->add_setting(
			'bottom_footer_bg_color',
			array(
				'default'   => '#e6e6e6',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize,
			'bottom_footer_bg_color_control',
			array(
				'label'    => __('رنگ فوتر پایین', 'school'),
				'section'  => 'sch_footer_options',
				'settings' => 'bottom_footer_bg_color',
				'priority' => 3,
			)
		));

		//top footer text color
		$wp_customize->add_setting(
			'top_footer_text_color',
			array(
				'default'   => '#333',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize,
			'top_footer_text_color_control',
			array(
				'label'    => __('رنگ متن فوتر بالا', 'school'),
				'section'  => 'sch_footer_options',
				'settings' => 'top_footer_text_color',
				'priority' => 4,
			)
		));

		//bottom footer text color
		$wp_customize->add_setting(
			'bottom_footer_text_color',
			array(
				'default'   => '#333',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize,
			'bottom_footer_text_color_control',
			array(
				'label'    => __('رنگ متن فوتر پایین', 'school'),
				'section'  => 'sch_footer_options',
				'settings' => 'bottom_footer_text_color',
				'priority' => 5,
			)
		));

		//top footer hover color
		$wp_customize->add_setting(
			'top_footer_hover_color',
			array(
				'default'   => '#e6e6e6',
			)
		);
		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize,
			'top_footer_hover_color_control',
			array(
				'label'    => __('رنگ هاور فوتر بالا', 'school'),
				'section'  => 'sch_footer_options',
				'settings' => 'top_footer_hover_color',
				'priority' => 6,
			)
		));

		//bottom footer text
		$wp_customize->add_setting(
			'bottom_footer_text',
			array(
				'default'   => 'کلیه حقوق این سایت متعلق به گراکد می‌باشد.',
			)
		);
		$wp_customize->add_control(
			'bottom_footer_text_control',
			array(
				'type'     => 'textarea',
				'label'    => __('متن فوتر پایین', 'school'),
				'section'  => 'sch_footer_options',
				'settings' => 'bottom_footer_text',
				'priority' => 7,
			)
		);


		// general
		$wp_customize->add_section(
			'sch_general_options',
			array(
				'title'       => __('عمومی', 'school'),
				'priority'    => 28,
				'capability'  => 'edit_theme_options',
				'description' => __('تنظیمات عمومی را انجام دهید!', 'school'),
			)
		);

		// post count
		$wp_customize->add_setting(
			'general_post_count',
			array(
				'default'   => 10,
				'transport' => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'general_post_count_control',
			array(
				'label'    => __('تعداد پست‌های قابل نمایش جستجو، بایگانی و دسته‌بندی در هر صفحه', 'school'),
				'section'  => 'sch_general_options',
				'settings' => 'general_post_count',
				'type'     => 'number',
				'priority' => 1
			)
		);

		// post short title
		$wp_customize->add_setting(
			'general_post_short_title',
			array(
				'default'  => 42,
			)
		);
		$wp_customize->add_control(
			'general_post_short_title_control',
			array(
				'label'    => __('تعداد کاراکترهای خلاصه عنوان مطلب', 'school'),
				'section'  => 'sch_general_options',
				'settings' => 'general_post_short_title',
				'type'     => 'number',
				'priority' => 2
			)
		);

		// post short cnt
		$wp_customize->add_setting(
			'general_post_short_cnt',
			array(
				'default'  => 250,
			)
		);
		$wp_customize->add_control(
			'general_post_short_cnt_control',
			array(
				'label'    => __('تعداد کاراکترهای خلاصه مطلب', 'school'),
				'section'  => 'sch_general_options',
				'settings' => 'general_post_short_cnt',
				'type'     => 'number',
				'priority' => 3
			)
		);

		// upload size limit
		$wp_customize->add_setting(
			'general_upload_size_limit',
			array(
				'default'   => 100,
				'transport' => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'general_upload_size_limit_control',
			array(
				'label'    => __('حداکثر حجم مجاز آپلود برای کاربران غیر مدیر (کیلوبایت)', 'school'),
				'section'  => 'sch_general_options',
				'settings' => 'general_upload_size_limit',
				'type'     => 'number',
				'priority' => 4
			)
		);		

		// reset btn
		$wp_customize->add_control(
			'general_reset_btn',
			array(
				'type'	      => 'button',
				'settings'    => array(),
				'priority'    => 10,
				'section'     => 'sch_general_options',
				'input_attrs' => array(
					'value'   => __('بازنشانی تنظیمات پوسته', 'textdomain'),
					'class'   => 'button button-primary',
					'onclick' => "location.href='" . get_template_directory_uri() . "/customizer/reset.php';",
				),
			)
		);
	}
	static function header_output()
	{
		// The live CSS is added here
?>
		<style type="text/css">
			body {
				background-image: url('<?php echo get_theme_mod('body_bg_image', get_template_directory_uri() . '/images/body-bg.png'); ?>');
				background-repeat: <?php echo get_theme_mod('body_bg_repeat_image', ''); ?>;
				background-position: <?php echo get_theme_mod('body_bg_position_image', ''); ?>;
				background-color: <?php echo get_theme_mod('body_bg_color', ''); ?>;
				font-family: '<?php echo get_theme_mod('font_family', 'yekan'); ?>';
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
			.single-post > h3,
			.home-post > h3 a,
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

			.home-post > h3 {
				font-size: <?php echo get_theme_mod('font_size_home_post_title', '20px'); ?>;
			}

			.home-post > p.small {
				font-size: <?php echo get_theme_mod('font_size_home_post_small', '12px'); ?>;
			}

			.home-post > p:not(.small) {
				font-size: <?php echo get_theme_mod('font_size_home_post_p', '14px'); ?>;
				line-height: <?php echo get_theme_mod('font_line_home_post', '1.82'); ?>;
			}			

			.single-post > h3 {
				font-size: <?php echo get_theme_mod('font_size_single_post_title', '20px'); ?>;
			}

			.single-post > ul > li {
				font-size: <?php echo get_theme_mod('font_size_single_post_small', '12px'); ?>;
			}

			.single-post-content,
			.single-post-content p {
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
	function live_preview()
	{
		// The live preview is enqueued here
		wp_enqueue_script(
			'sch_customizer_js',
			get_template_directory_uri() . '/customizer/js/livepreview.js',
			array('jquery', 'customize-preview'),
			'',
			true
		);
	}
}

add_action('customize_register', array('Sch_Customizer', 'register'));
add_action('wp_head', array('Sch_Customizer', 'header_output'));
add_action('customize_preview_init', array('Sch_Customizer', 'live_preview'));
?>