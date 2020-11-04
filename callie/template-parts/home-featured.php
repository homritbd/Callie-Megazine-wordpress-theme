    <?php

    $callie_featured = new WP_Query(
        array(
            'meta_key'          => 'featured',
            'meta_value'        => '1',
            'posts_per_page'    => 3
        )
    );

    $post_data = array();
    while ($callie_featured->have_posts()) {
        $callie_featured->the_post();
        $categories = get_the_category();
        $post_data[] = array(
            "title" => get_the_title(),
            "date" => get_the_date(),
            "thumbnail" => get_the_post_thumbnail_url(get_the_ID(), 'large'),
            "author" => get_the_author_meta('display_name'),
            'cat'   =>$categories[0]->name
        );
    }

    if ($callie_featured->post_count > 1) :
    ?>


        <!-- SECTION -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div id="hot-post" class="row hot-post">
                    <div class="col-md-8 hot-post-left">
                        <!-- post -->
                        <div <?php post_class('post post-thumb'); ?>>
                            <a class="post-img" href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($post_data[0]['thumbnail']); ?>" /></a>
                            <div class=" post-body">
                                <div class="post-category">
                                    <span style="color: #ee4266;"><?php echo esc_html($post_data[0]['cat']); ?></span>
                                </div>
                                <h3 class="post-title title-lg"><a href="<?php the_permalink(); ?>"><?php echo esc_html($post_data[0]['title']); ?></a></h3>
                                <ul class="post-meta">
                                    <li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta("ID"))); ?>"><?php echo esc_html($post_data[0]['author']); ?></a></li>
                                    <li><?php echo esc_html($post_data[0]['date']); ?></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /post -->
                    </div>

                    <div class="col-md-4 hot-post-right">

                        <?php
                        for ($i = 1; $i < 3; $i++) :
                        ?>
                            <!-- post -->
                            <div <?php post_class('post post-thumb'); ?>>
                                <a class="post-img" href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($post_data[$i]['thumbnail']); ?>" /></a>
                                <div class=" post-body">
                                    <div class="post-category">
                                    <span style="color: #ee4266;"><?php echo esc_html($post_data[$i]['cat']); ?></span>
                                    </div>
                                    <h3 class="post-title title-lg"><a href="<?php the_permalink(); ?>"><?php echo esc_html($post_data[$i]['title']); ?></a></h3>
                                    <ul class="post-meta">
                                        <li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta("ID"))); ?>"><?php echo esc_html($post_data[$i]['author']); ?></a></li>
                                        <li><?php echo esc_html($post_data[$i]['date']); ?></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /post -->
                        <?php
                        endfor;
                        ?>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->

    <?php endif; ?>