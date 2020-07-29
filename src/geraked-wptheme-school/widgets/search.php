<?php 
// Creating the widget 
class sch_search extends WP_Widget {

	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'sch_search', 

			// Widget name will appear in UI
			__('sch-search', 'sch_search'), 

			// Widget description
			array( 'description' => __( 'جستجو', 'sch_search' ), ) 
		);
	}

	// Creating widget front-end
	public function widget( $args, $instance ) {
		extract($instance);
		
		$title = apply_filters( 'widget_title', $title );
		
		if(empty($title	))
			$title = __( 'جستجو', 'sch_search' );
		
		if(empty($icon))
			$icon = 'fa-search'; ?>


		<!-- search block --->
		<div class="well">
			<h4><i class="fa <?php echo $icon; ?>"></i> <?php echo $title; ?></h4>
			<form action="<?php echo home_url(); ?>">	
				<div class="input-group">
					<input type="text" class="form-control" placeholder="چیزی بنویسید..." value="" name="s" id="search">
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</span>
				</div>
			</form>	
		</div><!-- /search block --->	


	<?php
	}
			
	// Widget Backend 
	public function form( $instance ) {
		extract($instance);
		
		if(empty($title	))
			$title = __( 'جستجو', 'sch_search' );
		
		if(empty($icon))
			$icon = 'fa-search';
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
	<?php 
	}
		
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance			= array();
		$instance['title'] 	= ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['icon'] 	= ( ! empty( $new_instance['icon'] ) ) ? strip_tags( $new_instance['icon'] ) : '';
		return $instance;
	}
}

// Register and load the widget
function sch_load_search() {
	register_widget( 'sch_search' );
}
add_action( 'widgets_init', 'sch_load_search' );
?>