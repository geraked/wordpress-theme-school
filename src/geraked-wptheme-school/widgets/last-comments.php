<?php 
// Creating the widget 
class sch_last_comments extends WP_Widget {

	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'sch_last_comments', 

			// Widget name will appear in UI
			__('sch-last-comments', 'sch_last_comments'), 

			// Widget description
			array( 'description' => __( 'آخرین دیدگاه ها', 'sch_last_comments' ), ) 
		);
	}

	// Creating widget front-end
	public function widget( $args, $instance ) {
		extract($instance);
		
		$title = apply_filters( 'widget_title', $title );
		
		if(empty($title	))
			$title = __( 'آخرین دیدگاه ها', 'sch_last_comments' );
		
		if(empty($icon))
			$icon = 'fa-comments';
		
		if(empty($comment_posts))
			$comment_posts = 3;
		
		if(empty($avatar_size))
			$avatar_size = 50;
		
		if(empty($char))
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
					<?php sch_most_commented($comment_posts, $avatar_size, $char); ?>									
				</ul>
			</div>
		</div><!-- /last news block --->	

	<?php
	}
			
	// Widget Backend 
	public function form( $instance ) {
		extract($instance);
		
		if(empty($title	))
			$title = __( 'آخرین دیدگاه ها', 'sch_last_comments' );
		
		if(empty($icon))
			$icon = 'fa-comments';
		
		if(empty($comment_posts))
			$comment_posts = 3;
		
		if(empty($avatar_size))
			$avatar_size = 50;
		
		if(empty($char))
			$char = 90;
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
			<label for="<?php echo $this->get_field_id( 'comment_posts' ); ?>"><?php _e( 'تعداد دیدگاه قابل نمایش:' ); ?></label> 
			<input class="widefat" style="direction:ltr;" onkeypress="return isNumberKey(event)" id="<?php echo $this->get_field_id( 'comment_posts' ); ?>" name="<?php echo $this->get_field_name( 'comment_posts' ); ?>" type="text" value="<?php echo esc_attr( $comment_posts ); ?>" />
		</p>
		<p>	
			<label for="<?php echo $this->get_field_id( 'avatar_size' ); ?>"><?php _e( 'اندازه آواتار:' ); ?></label> 
			<input class="widefat" style="direction:ltr;" onkeypress="return isNumberKey(event)" id="<?php echo $this->get_field_id( 'avatar_size' ); ?>" name="<?php echo $this->get_field_name( 'avatar_size' ); ?>" type="text" value="<?php echo esc_attr( $avatar_size ); ?>" />
		</p>
		<p>	
			<label for="<?php echo $this->get_field_id( 'char' ); ?>"><?php _e( 'تعداد کاراکتر قابل نمایش:' ); ?></label> 
			<input class="widefat" style="direction:ltr;" onkeypress="return isNumberKey(event)" id="<?php echo $this->get_field_id( 'char' ); ?>" name="<?php echo $this->get_field_name( 'char' ); ?>" type="text" value="<?php echo esc_attr( $char ); ?>" />
		</p>
		<?php 
	}
		
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance					= array();
		$instance['title']			= ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['icon'] 			= ( ! empty( $new_instance['icon'] ) ) ? strip_tags( $new_instance['icon'] ) : '';
		$instance['comment_posts'] 	= ( ! empty( $new_instance['comment_posts'] ) ) ? strip_tags( $new_instance['comment_posts'] ) : '';
		$instance['avatar_size'] 	= ( ! empty( $new_instance['avatar_size'] ) ) ? strip_tags( $new_instance['avatar_size'] ) : '';
		$instance['char'] 			= ( ! empty( $new_instance['char'] ) ) ? strip_tags( $new_instance['char'] ) : '';
		return $instance;
	}

}

// Register and load the widget
function sch_load_last_comments() {
	register_widget( 'sch_last_comments' );
}
add_action( 'widgets_init', 'sch_load_last_comments' );
?>