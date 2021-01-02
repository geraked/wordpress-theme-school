<!DOCTYPE html>
<html lang="fa">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		<?php
		bloginfo('name');
		// is_home() ? bloginfo('description') : wp_title('');
		?>
	</title>
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/images/icon.png" type="image/png"> 
	<link href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php bloginfo('template_url'); ?>/css/bootstrap-rtl.min.css" rel="stylesheet">
	<link href="<?php bloginfo('template_url'); ?>/css/font-awesome.css" rel="stylesheet">
	<link href="<?php bloginfo('template_url'); ?>/css/animate.css" rel="stylesheet">
	<link href="<?php bloginfo('template_url'); ?>/style.css?v=1.6.5" rel="stylesheet">
	<link href="<?php bloginfo('template_url'); ?>/css/photo-gallery.css" rel="stylesheet">
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	<?php wp_head(); ?>
</head>

<body>

	<div id="main-loader">
		<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
	</div>

	<!-- header -->
	<header>
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
					<img src="<?php bloginfo('template_url'); ?>/images/bismillah.svg" class="img-responsive" width="80px">
				</div>
				<div class="col-sm-8 text-center">
					<h4><?php echo get_theme_mod('header_description', 'عنوان بالای هدر'); ?></h4>
					<h2><?php echo get_theme_mod('header_title', 'عنوان پایین هدر'); ?></h2>
				</div>
				<div class="col-sm-2">
					<img src="<?php bloginfo('template_url'); ?>/images/flag.svg" class="img-responsive" align="left" width="80px">
				</div>
			</div>
		</div>
	</header><!-- /header -->

	<!-- static navbar -->
	<nav class="navbar navbar-default" id="custom-bootstrap-menu">
		<div class="container">
			<?php if (has_nav_menu('navb-header')) : ?>
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand">منو</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<?php wp_nav_menu(
						array(
							'theme_location' => 'navb-header',
							'menu'       => '',
							'depth'      => 2,
							'container'  => false,
							'menu_class' => 'nav navbar-nav',
							'walker'     => new wp_bootstrap_navwalker()
						)
					); ?>
					<ul class="nav navbar-nav navbar-left">
						<?php if (is_plugin_active('wp-jalali/wp-jalali.php')) : ?>
							<li><a><?php echo jdate('l، j F Y'); ?></a></li>
						<?php endif; ?>
					</ul>
				</div>
			<?php endif; ?>
		</div>
	</nav><!-- /static navbar -->