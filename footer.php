<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package WordPress
 */

?>

<!-- footer -->
<footer>
    <div id="top-footer">
        <div class="container">
            <div class="row">
                <?php if (get_theme_mod('top_footer_columns', 'col_3_right') === 'col_3_right') : ?>
                    <div class="col-md-6">
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Foot1')) : ?><?php endif; ?>
                    </div>
                    <div class="col-md-3">
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Foot2')) : ?><?php endif; ?>
                    </div>
                    <div class="col-md-3">
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Foot3')) : ?><?php endif; ?>
                    </div>


                <?php elseif (get_theme_mod('top_footer_columns', 'col_3_right') === 'col_3_left') : ?>
                    <div class="col-md-3">
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Foot1')) : ?><?php endif; ?>
                    </div>
                    <div class="col-md-3">
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Foot2')) : ?><?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Foot3')) : ?><?php endif; ?>
                    </div>


                <?php elseif (get_theme_mod('top_footer_columns', 'col_3_right') === 'col_3') : ?>
                    <div class="col-md-4">
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Foot1')) : ?><?php endif; ?>
                    </div>
                    <div class="col-md-4">
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Foot2')) : ?><?php endif; ?>
                    </div>
                    <div class="col-md-4">
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Foot3')) : ?><?php endif; ?>
                    </div>


                <?php elseif (get_theme_mod('top_footer_columns', 'col_3_right') === 'col_4') : ?>
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
            <p class="text-center"><?php echo get_theme_mod('bottom_footer_text', __('Imam Khomeini High School All Rights Reserved.', 'ger-school')); ?></p>
        </div>
    </div>
</footer><!-- /footer -->

<script>
    var template_url = "<?php bloginfo('template_url'); ?>";
</script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/jquery.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/photo-gallery.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/script.js?v=<?php echo wp_get_theme()->get('Version'); ?>"></script>
<script>
    $(window).on("load", function() {
        setTimeout(function() {
            $("#main-loader").fadeOut(300);
        }, 100);
    });
</script>

<?php wp_footer(); ?>

<script>
    <?php echo get_theme_mod('general_custom_script', "convertDigitsToPersian(document.body); convertDigitsToEnglish(document.getElementById('post-0'));"); ?>
</script>

</body>

</html>