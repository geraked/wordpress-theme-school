<?php
// Creating the widget
class sch_lms_login extends WP_Widget {

	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'sch_lms_login',

			// Widget name will appear in UI
			__('sch-lms-login', 'sch_lms_login'),

			// Widget description
			array( 'description' => __( 'فرم ورود به LMS', 'sch_lms_login' ), )
		);
	}

	// Creating widget front-end
	public function widget( $args, $instance ) {
		extract($instance);

		$ttitle = apply_filters( 'widget_title', $ttitle );
		$stitle = apply_filters( 'widget_title', $stitle );

		if(empty($ttitle))
			$ttitle = __( 'پنل معلمان', 'sch_lms_login' );

		if(empty($stitle))
			$stitle = __( 'پنل دانش‌آموزان', 'sch_lms_login' );

		if(!isset($turl))
			$turl = 'https://lms.estschool.ir/login/index.php';

		if(!isset($surl))
			$surl = 'https://lms.estschool.ir/login/index.php'; 
		
		if(!isset($tfurl))
			$tfurl = 'https://lms.estschool.ir/login/forgot_password.php';
			
		if(!isset($sfurl))
			$sfurl = 'https://lms.estschool.ir/login/forgot_password.php';	
		
		?>


		<!-- login block --->
		<div class="panel panel-default login">
			<div class="panel-heading">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#tlogin" aria-controls="tlogin" role="tab" data-toggle="tab"><?php echo $ttitle; ?></a></li>
					<li role="presentation"><a href="#slogin" aria-controls="slogin" role="tab" data-toggle="tab"><?php echo $stitle; ?></a></li>
				</ul>
			</div>
			<div class="panel-body">
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="tlogin">
						
						<?php if (isset($_GET['errorcode'])) : ?>
							<div class="alert alert-danger alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
								<p class="bg-danger">نام کاربری یا رمز عبور نامعتبر است!</p>
							</div>
						<?php endif; ?>

						<form action="<?php echo $turl; ?>" method="post">
							<div class="form-group">
								<input type="text" name="username" id="tusername" class="form-control" placeholder="نام کاربری">
							</div>
							<div class="form-group">
								<input type="password" name="password" id="tpass" class="form-control" placeholder="رمز عبور">
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" id="tremember_me"> مرا به خاطر بسپار
								</label>
							</div>
							<div class="text-center">
								<button type="submit" name="teacher_login" class="btn btn-success">ورود معلمان</button>
							</div>
							<div class="forget-link">
								<a target="_blank" href="<?php echo $tfurl; ?>">نام کاربری یا رمز عبور خود را فراموش کرده‌اید؟</a>
							</div>
						</form>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="slogin">
						
						<?php if (isset($_GET['errorcode'])) : ?>
							<div class="alert alert-danger alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
								<p class="bg-danger">نام کاربری یا کلمه عبور نامعتبر است!</p>
							</div>
						<?php endif; ?>				
					
						<form action="<?php echo $surl; ?>" method="post">
							<div class="form-group">
								<input type="text" name="username" id="susername" class="form-control" placeholder="نام کاربری">
							</div>
							<div class="form-group">
								<input type="password" name="password" id="spass" class="form-control" placeholder="رمز عبور">
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" id="sremember_me"> مرا به خاطر بسپار
								</label>
							</div>
							<div class="text-center">
								<button type="submit" name="student_login" class="btn btn-success">ورود دانش‌آموزان</button>
							</div>
							<div class="forget-link">
								<a target="_blank" href="<?php echo $sfurl; ?>">نام کاربری یا رمز عبور خود را فراموش کرده‌اید؟</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div><!-- /login block --->


	<?php
	}

	// Widget Backend
	public function form( $instance ) {
		extract($instance);

		if(empty($ttitle))
			$ttitle = __( 'پنل معلمان', 'sch_lms_login' );

		if(empty($stitle))
			$stitle = __( 'پنل دانش‌آموزان', 'sch_lms_login' );

		if(!isset($turl))
			$turl = 'https://lms.estschool.ir/login/index.php';

		if(!isset($surl))
			$surl = 'https://lms.estschool.ir/login/index.php';

		if(!isset($tfurl))
			$tfurl = 'https://lms.estschool.ir/login/forgot_password.php';

		if(!isset($sfurl))
			$sfurl = 'https://lms.estschool.ir/login/forgot_password.php';			

		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'ttitle' ); ?>"><?php _e( 'عنوان سربرگ معلمان:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'ttitle' ); ?>" name="<?php echo $this->get_field_name( 'ttitle' ); ?>" type="text" value="<?php echo esc_attr( $ttitle ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'stitle' ); ?>"><?php _e( 'عنوان سربرگ دانش‌آموزان:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'stitle' ); ?>" name="<?php echo $this->get_field_name( 'stitle' ); ?>" type="text" value="<?php echo esc_attr( $stitle ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'turl' ); ?>"><?php _e( 'آدرس صفحه ورود معلمان:' ); ?></label>
			<input class="widefat" style="direction:ltr;" id="<?php echo $this->get_field_id( 'turl' ); ?>" name="<?php echo $this->get_field_name( 'turl' ); ?>" type="text" value="<?php echo esc_attr( $turl ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'surl' ); ?>"><?php _e( 'آدرس صفحه ورود دانش‌آموزان:' ); ?></label>
			<input class="widefat" style="direction:ltr;" id="<?php echo $this->get_field_id( 'surl' ); ?>" name="<?php echo $this->get_field_name( 'surl' ); ?>" type="text" value="<?php echo esc_attr( $surl ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'tfurl' ); ?>"><?php _e( 'آدرس صفحه بازیابی اطلاعات معلمان:' ); ?></label>
			<input class="widefat" style="direction:ltr;" id="<?php echo $this->get_field_id( 'tfurl' ); ?>" name="<?php echo $this->get_field_name( 'tfurl' ); ?>" type="text" value="<?php echo esc_attr( $tfurl ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sfurl' ); ?>"><?php _e( 'آدرس صفحه بازیابی اطلاعات دانش‌آموزان:' ); ?></label>
			<input class="widefat" style="direction:ltr;" id="<?php echo $this->get_field_id( 'sfurl' ); ?>" name="<?php echo $this->get_field_name( 'sfurl' ); ?>" type="text" value="<?php echo esc_attr( $sfurl ); ?>" />
		</p>
	<?php
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance 			= array();
		$instance['ttitle'] = ( ! empty( $new_instance['ttitle'] ) ) ? strip_tags( $new_instance['ttitle'] ) : '';
		$instance['stitle'] = ( ! empty( $new_instance['stitle'] ) ) ? strip_tags( $new_instance['stitle'] ) : '';
		$instance['turl'] 	= ( ! empty( $new_instance['turl'] ) ) ? strip_tags( $new_instance['turl'] ) : '';
		$instance['surl'] 	= ( ! empty( $new_instance['surl'] ) ) ? strip_tags( $new_instance['surl'] ) : '';
		$instance['tfurl'] 	= ( ! empty( $new_instance['tfurl'] ) ) ? strip_tags( $new_instance['tfurl'] ) : '';
		$instance['sfurl'] 	= ( ! empty( $new_instance['sfurl'] ) ) ? strip_tags( $new_instance['sfurl'] ) : '';
		return $instance;
	}
}

// Register and load the widget
function sch_load_lms_login() {
	register_widget( 'sch_lms_login' );
}
add_action( 'widgets_init', 'sch_load_lms_login' );
?>
