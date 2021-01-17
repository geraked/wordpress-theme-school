		<!-- footer -->
		<footer>
			<div id="top-footer">
				<div class="container">
					<div class="row">
						<?php if (get_theme_mod('top_footer_columns', 'سه ستونه- سمت راست کشیده') == 'سه ستونه- سمت راست کشیده') : ?>
							<div class="col-md-6">
								<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Foot1')) : ?><?php endif; ?>
							</div>
							<div class="col-md-3">
								<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Foot2')) : ?><?php endif; ?>
							</div>
							<div class="col-md-3">
								<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Foot3')) : ?><?php endif; ?>
							</div>


						<?php elseif (get_theme_mod('top_footer_columns', 'سه ستونه- سمت راست کشیده') == 'سه ستونه- سمت چپ کشیده') : ?>
							<div class="col-md-3">
								<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Foot1')) : ?><?php endif; ?>
							</div>
							<div class="col-md-3">
								<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Foot2')) : ?><?php endif; ?>
							</div>
							<div class="col-md-6">
								<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Foot3')) : ?><?php endif; ?>
							</div>


						<?php elseif (get_theme_mod('top_footer_columns', 'سه ستونه- سمت راست کشیده') == 'سه ستونه') : ?>
							<div class="col-md-4">
								<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Foot1')) : ?><?php endif; ?>
							</div>
							<div class="col-md-4">
								<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Foot2')) : ?><?php endif; ?>
							</div>
							<div class="col-md-4">
								<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Foot3')) : ?><?php endif; ?>
							</div>


						<?php elseif (get_theme_mod('top_footer_columns', 'سه ستونه- سمت راست کشیده') == 'چهار ستونه') : ?>
							<div class="col-md-3">
								<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Foot1')) : ?><?php endif; ?>
							</div>
							<div class="col-md-3">
								<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Foot2')) : ?><?php endif; ?>
							</div>
							<div class="col-md-3">
								<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Foot3')) : ?><?php endif; ?>
							</div>
							<div class="col-md-3">
								<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Foot4')) : ?><?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div id="bottom-footer">
				<div class="container">
					<p class="text-center"><?php echo get_theme_mod('bottom_footer_text', 'کلیه حقوق این سایت متعلق به گراکد می‌باشد.'); ?></p>
				</div>
			</div>
		</footer><!-- /footer -->

		<script>var template_url = "<?php bloginfo('template_url'); ?>";</script>
		<script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/photo-gallery.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/script.js?v=1.6.6"></script>
		<script>
			$(window).on("load", function () {
				setTimeout(function () {
					$("#main-loader").fadeOut(300);
				}, 100);
			});
		</script>

		<?php wp_footer(); ?>
		</body>

		</html>