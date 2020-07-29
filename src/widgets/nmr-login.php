<?php
// Creating the widget
class sch_nmr_login extends WP_Widget {

	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'sch_nmr_login',

			// Widget name will appear in UI
			__('sch-nmr-login', 'sch_nmr_login'),

			// Widget description
			array( 'description' => __( 'فرم ورود به سیستم اعلام نمرات', 'sch_nmr_login' ), )
		);
	}

	// Creating widget front-end
	public function widget( $args, $instance ) {
		extract($instance);

		$ttitle = apply_filters( 'widget_title', $ttitle );
		$stitle = apply_filters( 'widget_title', $stitle );

		if(empty($ttitle))
			$ttitle = __( 'پنل دبیران', 'sch_nmr_login' );

		if(empty($stitle))
			$stitle = __( 'پنل دانش آموزان', 'sch_nmr_login' );

		if(!isset($turl))
			$turl = 'http://nomra.taleghaniest.ir/teacher/login.php';

		if(!isset($surl))
			$surl = 'http://nomra.taleghaniest.ir/login.php'; ?>


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
						<script>
							$(function() {

								if (localStorage.chkbx && localStorage.chkbx != '') {
									$('#tremember_me').attr('checked', 'checked');
									$('#tusername').val(localStorage.usrname);
									$('#tpass').val(localStorage.pass);
								} else {
									$('#tremember_me').removeAttr('checked');
									$('#tusername').val('');
									$('#tpass').val('');
								}

								$('#tremember_me').click(function() {

									if ($('#tremember_me').is(':checked')) {
										// save username and password
										localStorage.usrname = $('#tusername').val();
										localStorage.pass = $('#tpass').val();
										localStorage.chkbx = $('#tremember_me').val();
									} else {
										localStorage.usrname = '';
										localStorage.pass = '';
										localStorage.chkbx = '';
									}
								});
							});
						</script>
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
								<button type="submit" name="teacher_login" class="btn btn-success">ورود دبیران</button>
							</div>
						</form>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="slogin">
						<script>
							$(function() {

								if (localStorage.chkbx && localStorage.chkbx != '') {
									$('#sremember_me').attr('checked', 'checked');
									$('#susername').val(localStorage.usrname);
									$('#spass').val(localStorage.pass);
								} else {
									$('#sremember_me').removeAttr('checked');
									$('#susername').val('');
									$('#spass').val('');
								}

								$('#sremember_me').click(function() {

									if ($('#sremember_me').is(':checked')) {
										// save username and password
										localStorage.usrname = $('#susername').val();
										localStorage.pass = $('#spass').val();
										localStorage.chkbx = $('#sremember_me').val();
									} else {
										localStorage.usrname = '';
										localStorage.pass = '';
										localStorage.chkbx = '';
									}
								});
							});
						</script>
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
								<button type="submit" name="student_login" class="btn btn-success">ورود دانش آموزان</button>
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
			$ttitle = __( 'پنل دبیران', 'sch_nmr_login' );

		if(empty($stitle))
			$stitle = __( 'پنل دانش آموزان', 'sch_nmr_login' );

		if(!isset($turl))
			$turl = 'http://nomra.taleghaniest.ir/teacher/login.php';

		if(!isset($surl))
			$surl = 'http://nomra.taleghaniest.ir/login.php';
		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'ttitle' ); ?>"><?php _e( 'عنوان سربرگ دبیران:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'ttitle' ); ?>" name="<?php echo $this->get_field_name( 'ttitle' ); ?>" type="text" value="<?php echo esc_attr( $ttitle ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'stitle' ); ?>"><?php _e( 'عنوان سربرگ دانش آموزان:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'stitle' ); ?>" name="<?php echo $this->get_field_name( 'stitle' ); ?>" type="text" value="<?php echo esc_attr( $stitle ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'turl' ); ?>"><?php _e( 'آدرس صفحه ورود دبیران:' ); ?></label>
			<input class="widefat" style="direction:ltr;" id="<?php echo $this->get_field_id( 'turl' ); ?>" name="<?php echo $this->get_field_name( 'turl' ); ?>" type="text" value="<?php echo esc_attr( $turl ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'surl' ); ?>"><?php _e( 'آدرس صفحه ورود دانش آموزان:' ); ?></label>
			<input class="widefat" style="direction:ltr;" id="<?php echo $this->get_field_id( 'surl' ); ?>" name="<?php echo $this->get_field_name( 'surl' ); ?>" type="text" value="<?php echo esc_attr( $surl ); ?>" />
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
		return $instance;
	}
}

// Register and load the widget
function sch_load_nmr_login() {
	register_widget( 'sch_nmr_login' );
}
add_action( 'widgets_init', 'sch_load_nmr_login' );
?>
