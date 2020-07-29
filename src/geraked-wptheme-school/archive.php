<?php get_header(); ?>

<!-- Page Content -->
<div class="container">

	<div class="row">

		<?php if (get_theme_mod('sidebar_position', 'سمت چپ') == 'سمت راست') : get_sidebar(); ?><?php endif; ?>

		<!-- Blog Entries Column -->
		<div class="col-md-8">

			<h3 class="page-header">بایگانی "<?php echo the_archive_title() ?>"</h3>

			<!-- Blog Post -->
			<?php while (have_posts()) : the_post() ?>
				<div class="home-post" id="post-<?php the_ID(); ?>">
					<a href="<?php the_permalink(); ?>" class="thumbnail">
						<?php post_image(320, 180); ?>
					</a>
					<h3>
						<a href="<?php the_permalink(); ?>"><?php sch_title(get_theme_mod('general_post_short_title', 42)); ?></a>
					</h3>
					<p class="small"><span class="glyphicon glyphicon-time"></span> <?php /*the_time('j F Y');*/ get_publish_jdate() ?> &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-list"></span> <?php the_category(', '); ?></p>
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