<?php get_header(); ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <?php if (get_theme_mod('sidebar_position', 'left') === 'right') : get_sidebar(); ?><?php endif; ?>

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php if (isset($args['slider']) && $args['slider']) : ?>
                <?php get_template_part('template-parts/slider', null); ?>
            <?php endif; ?>

            <?php if (have_posts()) : ?>

                <?php if (isset($args['title'])) : ?>
                    <h3 class="page-header"><?php echo $args['title']; ?></h3>
                <?php endif; ?>

                <!-- Blog Post -->
                <?php while (have_posts()) : ?>
                    <?php the_post(); ?>
                    <div class="home-post" id="post-<?php the_ID(); ?>">
                        <a href="<?php the_permalink(); ?>" class="thumbnail">
                            <?php post_image(320, 180); ?>
                        </a>
                        <h3>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <p class="small"><span class="glyphicon glyphicon-time"></span> <?php the_date(); ?> &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-list"></span> <?php the_category(', '); ?></p>
                        <p><?php sch_content(get_theme_mod('general_post_short_cnt', 250)); ?></p>
                        <div class="text-left"><a class="btn btn-primary btn-sm" href="<?php the_permalink(); ?>"><?php _e('Read More', 'ger-school'); ?> <span class="glyphicon glyphicon-chevron-left"></span></a></div>
                        <div class="clearfix"></div>
                        <hr>
                    </div>
                <?php endwhile; ?>

                <!-- pager -->
                <ul class="pager">
                    <li class="previous">
                        <?php previous_posts_link(__('&rarr; Previous Page', 'ger-school')); ?>
                    </li>
                    <li class="next">
                        <?php next_posts_link(__('Next Page &larr;', 'ger-school')); ?>
                    </li>
                </ul>

            <?php else : ?>

                <h3 class="page-header"><?php _e('404 Error', 'ger-school'); ?></h3>
                <p><?php _e('Sorry! Nothing found.', 'ger-school'); ?></p>

            <?php endif; ?>

        </div>

        <?php if (get_theme_mod('sidebar_position', 'left') === 'left') : get_sidebar(); ?><?php endif; ?>

    </div><!-- /.row -->
</div><!-- /.container -->

<?php get_footer(); ?>