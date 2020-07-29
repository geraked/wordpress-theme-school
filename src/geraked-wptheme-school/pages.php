<?php
/*
Template Name: قالب برگه‌ها
*/
?>

<?php get_header(); ?>

<!-- Page Content -->
<div class="container">
	<div class="row">
		<?php if (get_theme_mod('sidebar_position', 'سمت چپ') == 'سمت راست') : get_sidebar(); ?><?php endif; ?>
		<!-- Blog Entries Column -->
		<div class="col-md-8">
			<?php the_post(); ?>
			<div class="single-post" id="post-<?php the_ID(); ?>">
				<!-- Title -->
				<h3><?php the_title(); ?></h3>
				<hr>
				<!-- Post Content -->
				<div class="single-post-content"><?php the_content(); ?></div>
			</div>
			<!-- <hr> -->
		</div>
		<?php if (get_theme_mod('sidebar_position', 'سمت چپ') == 'سمت چپ') : get_sidebar(); ?><?php endif; ?>
	</div><!-- /.row -->
</div><!-- /.container -->

<?php get_footer(); ?>