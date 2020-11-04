<?php

while (have_posts()) :
    the_post();
?>
    <div class="col-md-4">

        <!-- post -->
        <div <?php post_class('post'); ?>>
            <a class="post-img" href="<?php the_permalink(); ?>">
                <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>">
            </a>
            <div class="post-body">
                <div class="post-category">
                    <?php the_category(' '); ?>
                </div>
                <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <ul class="post-meta">
                    <li><?php the_author_posts_link(); ?></li>
                    <li><?php echo get_the_date(); ?></li>
                </ul>
            </div>
        </div>
        <!-- /post -->

    </div>
<?php endwhile; ?>