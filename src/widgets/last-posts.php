<?php 
// Creating the widget 
class sch_last_posts extends WP_Widget {

	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'sch_last_posts', 

			// Widget name will appear in UI
			__('sch-last-posts', 'sch_last_posts'), 

			// Widget description
			array( 'description' => __( 'نمایش آخرین مطالب سایت', 'sch_last_posts' ), ) 
		);
	}

	// Creating widget front-end
	public function widget( $args, $instance ) {
		extract($instance);
		
		$title = apply_filters( 'widget_title', $title );
		
		if(empty($title	))
			$title = __( 'آخرین مطالب', 'sch_last_posts' );
		
		if(empty($icon))
			$icon = 'fa-file-text-o';
		
		if(empty($num))
			$num = 4; 		

		if(empty($content_cnt))
			$content_cnt = 70;
			
		if(empty($category))
			$pc = new WP_Query('orderby=post_date&posts_per_page='.$num.'');
		else
			$pc = new WP_Query('orderby=post_date&posts_per_page='.$num.'&cat='.$category.'');	

		?>


		<!-- last news block --->
		<div class="panel panel-default box">
			<div onclick="location.href='<?php echo get_category_link($category); ?>';" onMouseOver="this.style.cursor='pointer'" class="panel-heading foot-title">
				<i class="fa <?php echo $icon; ?>"></i>
				<h4 class="panel-title"><?php echo $title; ?></h4>
				<div class="clearfix"></div>
			</div>
			<div class="panel-body">
				<?php
					while ($pc->have_posts()) : $pc->the_post(); 
				?>							
				<div class="list-group">
					<a href="<?php the_permalink(); ?>" class="list-group-item">
						<?php post_image(96, 54); ?>
						<h5 class="list-group-item-heading"><?php the_title(); ?></h5>
						<!-- <h6></h6> -->
						<!-- get_publish_jdate(); -->
						<p class="list-group-item-text small"><?php sch_content($content_cnt); ?></p>
						<div class="clearfix"></div>
					</a>
				</div>
				<?php endwhile; ?>
			</div>
		</div><!-- /last news block --->


	<?php
	}
			
	// Widget Backend 
	public function form( $instance ) {
		extract($instance);

		if(empty($title	))
			$title = __( 'آخرین مطالب', 'sch_last_posts' );
		
		if(empty($icon))
			$icon = 'fa-file-text-o';
		
		if(empty($num))
			$num = 4;		

		if(empty($content_cnt))
			$content_cnt = 70;			

		// Get the existing categories and build a simple select dropdown for the user.
		$categories = get_categories(array(
			'hide_empty' => 0
		));
		$cat_options = array();
		$cat_options[] = '<option value="BLANK">یک دسته انتخاب کنید...</option>';
		foreach($categories as $cat) {
			$selected = ($category == $cat->cat_ID) ? ' selected="selected"' : '';
			$cat_options[] = '<option value="' . $cat->cat_ID . '"' . $selected . '>' . $cat->name . '</option>';
		}

		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'عنوان:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>	
			<label for="<?php echo $this->get_field_id( 'icon' ); ?>"><?php _e( 'آیکن:' ); ?></label> 
			<input class="widefat" style="direction:ltr;" id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>" type="text" value="<?php echo esc_attr( $icon ); ?>" />
		</p>
		<p>	
			<label for="<?php echo $this->get_field_id( 'num' ); ?>"><?php _e( 'تعداد قابل نمایش:' ); ?></label> 
			<input class="widefat" style="direction:ltr;" onkeypress="return isNumberKey(event)" id="<?php echo $this->get_field_id( 'num' ); ?>" name="<?php echo $this->get_field_name( 'num' ); ?>" type="text" value="<?php echo esc_attr( $num ); ?>" />
		</p>
		<p>	
			<label for="<?php echo $this->get_field_id( 'content_cnt' ); ?>"><?php _e( 'تعداد کاراکترهای مطلب:' ); ?></label> 
			<input class="widefat" style="direction:ltr;" onkeypress="return isNumberKey(event)" id="<?php echo $this->get_field_id( 'content_cnt' ); ?>" name="<?php echo $this->get_field_name( 'content_cnt' ); ?>" type="text" value="<?php echo esc_attr( $content_cnt ); ?>" />
		</p>				
		<p>	
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'دسته:' ); ?></label> 
			<select class="widefat" name="<?php echo $this->get_field_name( 'category' ); ?>" id="<?php echo $this->get_field_id( 'category' ); ?>">

				<?php
					foreach($cat_options as $cat) {
						echo $cat;
					}
				?>

			</select>
		</p>
		<?php 
	}
		
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance 				 = array();
		$instance['title'] 		 = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['icon'] 		 = ( ! empty( $new_instance['icon'] ) ) ? strip_tags( $new_instance['icon'] ) : '';
		$instance['num']		 = ( ! empty( $new_instance['num'] ) ) ? strip_tags( $new_instance['num'] ) : '';
		$instance['content_cnt'] = ( ! empty( $new_instance['content_cnt'] ) ) ? strip_tags( $new_instance['content_cnt'] ) : '';
		$instance['category']	 = $new_instance['category'];
		return $instance;
	}
} // Class wpb_widget ends here

// Register and load the widget
function sch_load_last_posts() {
	register_widget( 'sch_last_posts' );
}
add_action( 'widgets_init', 'sch_load_last_posts' );
?>