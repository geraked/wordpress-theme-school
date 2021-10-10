<?php
get_header();

$display_sidebar = isset($args['sidebar']) && $args['sidebar'];
$col = $display_sidebar ? 'col-md-8' : 'col-md-12';
?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <?php if ($display_sidebar && get_theme_mod('sidebar_position', 'left') === 'right') : get_sidebar(); ?><?php endif; ?>

        <!-- Blog Entries Column -->
        <div class="<?php echo $col; ?>">

            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : ?>
                    <?php the_post(); ?>
                    <div class="single-post" id="post-<?php the_ID(); ?>">

                        <!-- Title -->
                        <h3><?php the_title(); ?></h3>

                        <hr>

                        <?php if (isset($args['details']) && $args['details']) : ?>
                            <!-- Date/Time -->
                            <ul>
                                <li><span class="glyphicon glyphicon-user"></span> <?php the_author(); ?></li>
                                <li><span class="glyphicon glyphicon-time"></span> <?php the_date(); ?></li>
                                <li><span class="glyphicon glyphicon-list"></span> <?php the_category(', '); ?></li>
                            </ul>

                            <hr>
                        <?php endif; ?>

                        <!-- Post Content -->
                        <div class="single-post-content"><?php the_content(); ?></div>

                        <?php if (comments_open() || get_comments_number()) : ?>
                            <hr>

                            <!-- Blog Comments -->
                            <?php comments_template(); ?>
                        <?php endif; ?>

                    </div>
                <?php endwhile; ?>

            <?php else : ?>

                <h3 class="page-header"><?php _e('404 Error', 'ger-school'); ?></h3>
                <p><?php _e('Sorry! Nothing found.', 'ger-school'); ?></p>

            <?php endif; ?>

        </div>

        <?php if ($display_sidebar && get_theme_mod('sidebar_position', 'left') === 'left') : get_sidebar(); ?><?php endif; ?>

    </div><!-- /.row -->
</div><!-- /.container -->

<?php get_footer(); ?>