<?php get_header(); ?>

		<!-- Page Content -->
		<div class="container">

			<div class="row">

				<?php if (get_theme_mod('sidebar_position','سمت چپ') == 'سمت راست') : get_sidebar(); ?><?php endif; ?>

				<!-- Blog Entries Column -->
				<div class="col-md-8">

					<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
					<div class="single-post" id="post-<?php the_ID(); ?>">

						<!-- Title -->
						<h3><?php the_title(); ?></h3>

						<hr>

						<!-- Date/Time -->
						<ul>
							<li><span class="glyphicon glyphicon-user"></span> <?php the_author() ?></li>
							<li><span class="glyphicon glyphicon-time"></span> <?php /*the_time('j F Y');*/ get_publish_jdate(); ?></li>
							<li><span class="glyphicon glyphicon-list"></span> <?php the_category(', '); ?></li>
						</ul>

						<hr>

						<!-- Post Content -->

						<div class="single-post-content"><?php the_content(); ?></div>

						<hr>
						<?php endwhile; ?>
						<?php endif; ?>
						<!-- Blog Comments -->

						<?php comments_template(); ?>
					</div>

				</div>

				<?php if (get_theme_mod('sidebar_position','سمت چپ') == 'سمت چپ') : get_sidebar(); ?><?php endif; ?>

			</div><!-- /.row -->
		</div><!-- /.container -->

<?php get_footer(); ?>