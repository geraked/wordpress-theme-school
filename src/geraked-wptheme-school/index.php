<?php get_header(); ?>

<!-- Page Content -->
<div class="container">

	<div class="row">

		<?php if (get_theme_mod('sidebar_position', 'سمت چپ') == 'سمت راست') : get_sidebar(); ?><?php endif; ?>

		<!-- Blog Entries Column -->
		<div class="col-md-8">

			<!-- slider --->
			<?php
			//This is for our custom Slides menu
			$args 	= array('post_type' => 'slides', 'orderby' => 'menu_order');
			$loop 	= new WP_Query($args);
			$number = 0;
			if ($loop->have_posts()) :
			?>
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<?php while ($loop->have_posts()) : $loop->the_post(); ?>
							<li data-target="#carousel-example-generic" data-slide-to="<?php echo $number++; ?>"></li>
						<?php endwhile; ?>
					</ol>
					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
						<?php while ($loop->have_posts()) : $loop->the_post(); ?>
							<div class="item">
								<?php the_post_thumbnail(array(750, 422)); ?>
							</div>
						<?php endwhile; ?>
					</div>
					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div><!-- /slider --->
			<?php endif; ?>

			<!-- Blog Post -->
			<?php while (have_posts()) : the_post() ?>
				<div class="home-post">
					<a href="<?php the_permalink(); ?>" class="thumbnail">
						<?php post_image(320, 180); ?>
					</a>
					<h3>
						<a href="<?php the_permalink(); ?>"><?php sch_title(get_theme_mod('general_post_short_title', 42)); ?></a>
					</h3>
					<p class="small"><span class="glyphicon glyphicon-time"></span> <?php get_publish_jdate(); ?> &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-list"></span> <?php the_category(', '); ?></p>
					<p><?php sch_content(get_theme_mod('general_post_short_cnt', 250)); ?></p>
					<div class="text-left"><a class="btn btn-primary btn-sm" href="<?php the_permalink(); ?>">ادامه مطلب <span class="glyphicon glyphicon-chevron-left"></span></a></div>
					<div class="clearfix"></div>
					<hr>
				</div>
			<?php endwhile; ?>

			<!-- pager -->
			<ul class="pager">
				<li class="previous">
					<?php previous_posts_link('&rarr; جدید تر'); ?>
				</li>
				<li class="next">
					<?php next_posts_link('قدیمی تر &larr;'); ?>
				</li>
			</ul>

		</div>

		<?php if (get_theme_mod('sidebar_position', 'سمت چپ') == 'سمت چپ') : get_sidebar(); ?><?php endif; ?>

	</div><!-- /.row -->
</div><!-- /.container -->

<?php get_footer(); ?>