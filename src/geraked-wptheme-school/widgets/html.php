<?php 
// Creating the widget 
class sch_html extends WP_Widget {

	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'sch_html', 

			// Widget name will appear in UI
			__('sch-html', 'sch_html'), 

			// Widget description
			array( 'description' => __( 'متن یا HTML دلخواه', 'sch_html' ), ) 
		);
	}

	// Creating widget front-end
	public function widget( $args, $instance ) {
		extract($instance);
		
		$title = apply_filters( 'widget_title', $title );
		
		if(empty($title	))
			$title = __( 'متن دلخواه', 'sch_html' );
		
		if(empty($icon))
			$icon = 'fa-html5';
		
		if(!isset($txt))
			$txt = 'Type your HTML code here!'; ?>


		<!-- HTML block --->
		<div class="panel panel-default box">
			<div class="panel-heading foot-title">
				<i class="fa <?php echo $icon; ?>"></i>
				<h4 class="panel-title"><?php echo $title; ?></h4>
			</div>
			<div class="panel-body">
				<?php echo $txt; ?>
			</div>
		</div><!-- /HTML block --->	


	<?php
	}
	
	// Widget Backend 
	public function form( $instance ) {
		extract($instance);
		
		if(empty($title	))
			$title = __( 'متن دلخواه', 'sch_html' );
		
		if(empty($icon))
			$icon = 'fa-html5';
		
		if(!isset($txt))
			$txt = 'Type your HTML code here!';
		
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
			<label for="<?php echo $this->get_field_id( 'txt' ); ?>"><?php _e( 'متن:' ); ?></label> 
			<textarea class="widefat" style="direction:ltr;" id="<?php echo $this->get_field_id( 'txt' ); ?>" name="<?php echo $this->get_field_name( 'txt' ); ?>" rows="15"><?php echo esc_attr( $txt ); ?></textarea>
		</p>
		<?php 
	}
		
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance 			= array();
		$instance['title'] 	= ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['icon'] 	= ( ! empty( $new_instance['icon'] ) ) ? strip_tags( $new_instance['icon'] ) : '';
		$instance['txt'] 	= ( ! empty( $new_instance['txt'] ) ) ? $new_instance['txt'] : '';
		return $instance;
	}
}

// Register and load the widget
function sch_load_html() {
	register_widget( 'sch_html' );
}
add_action( 'widgets_init', 'sch_load_html' );
?>