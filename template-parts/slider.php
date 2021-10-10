            <!-- slider --->
            <?php
            //This is for our custom Slides menu
            $args = array('post_type' => 'slides', 'orderby' => 'menu_order');
            $loop = new WP_Query($args);
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
                                <?php the_post_thumbnail([750, 422]); ?>
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