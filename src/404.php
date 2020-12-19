<!DOCTYPE html>
<html lang="fa">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/images/icon.png" type="image/png">
	<link href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php bloginfo('template_url'); ?>/css/bootstrap-rtl.min.css" rel="stylesheet">
	<link href="<?php bloginfo('template_url'); ?>/css/font-awesome.css" rel="stylesheet">
	<link href="<?php bloginfo('template_url'); ?>/css/animate.css" rel="stylesheet">
	<link href="<?php bloginfo('template_url'); ?>/style.css" rel="stylesheet">
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	<style>
		body {
			background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEgAACxIB0t1+/AAAABZ0RVh0Q3JlYXRpb24gVGltZQAxMC8yOS8xMiKqq3kAAAAcdEVYdFNvZnR3YXJlAEFkb2JlIEZpcmV3b3JrcyBDUzVxteM2AAABHklEQVRIib2Vyw6EIAxFW5idr///Qx9sfG3pLEyJ3tAwi5EmBqRo7vHawiEEERHS6x7MTMxMVv6+z3tPMUYSkfTM/R0fEaG2bbMv+Gc4nZzn+dN4HAcREa3r+hi3bcuu68jLskhVIlW073tWaYlQ9+F9IpqmSfq+fwskhdO/AwmUTJXrOuaRQNeRkOd5lq7rXmS5InmERKoER/QMvUAPlZDHcZRhGN4CSeGY+aHMqgcks5RrHv/eeh455x5KrMq2yHQdibDO6ncG/KZWL7M8xDyS1/MIO0NJqdULLS81X6/X6aR0nqBSJcPeZnlZrzN477NKURn2Nus8sjzmEII0TfMiyxUuxphVWjpJkbx0btUnshRihVv70Bv8ItXq6Asoi/ZiCbU6YgAAAABJRU5ErkJggg==);
		}

		.error-template {
			padding: 40px 15px;
			text-align: center;
		}

		.error-actions {
			margin-top: 15px;
			margin-bottom: 15px;
		}

		.error-actions .btn {
			margin-right: 10px;
		}
	</style>
	<?php wp_head(); ?>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="error-template">
					<h1>
						404 </h1>
					<div class="error-details">
						صفحه مورد نظر یافت نشد!
					</div>
					<div class="error-actions">
						<a href="<?php echo site_url(); ?>" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
							بازگشت به صفحه اصلی </a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/script.js"></script>

	<?php wp_footer(); ?>
</body>

</html>