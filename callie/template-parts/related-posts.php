<?php


if (true == get_theme_mod('related_post_switch_setting', true)) { ?>

    <div>
        <div class="row">

            <?php
            //for use in the loop, list 5 post titles related to first tag on current post
            $tags = wp_get_post_tags($post->ID);
            if ($tags) {
                $first_tag = $tags[0]->term_id;
                $args = array(
                    'tag__in' => array($first_tag),
                    'post__not_in' => array($post->ID),
                    'posts_per_page' => 3,
                    'ignore_sticky_posts' => 1
                );
                $my_query = new WP_Query($args);
                if ($my_query->have_posts()) { ?>
                    <div class="section-title">
                        <h3 class="title"><?php echo esc_html(get_theme_mod('related_post_text_setting', 'Related Posts')); ?></h3>
                    </div> 
                    <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                        <!-- post -->
                        <div class="col-md-4">
                            <div <?php post_class('post post-sm'); ?>>
                                <a class="post-img" href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>"></a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <?php the_category(' '); ?>
                                    </div>
                                    <h3 class="post-title title-sm"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <ul class="post-meta">
                                        <li><?php the_author_posts_link(); ?></li>
                                        <li><?php echo get_the_date(); ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /post -->
            <?php
                            endwhile;
                        }
                        wp_reset_query();
                    }
            ?>

        </div>
    </div>

<?php }

?>