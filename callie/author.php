<?php get_header(); ?>

<!-- PAGE HEADER -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10 text-center">
                <div class="author">
                    <img class="author-img center-block" src="<?php get_avatar(get_the_author_meta('ID')); ?>">
                    <h1 class="text-uppercase"><?php the_author(); ?></h1>
                    <p class="lead"><?php the_author_meta('description'); ?></p>


                    <ul class="author-social">

                    <?php 
                        $callie_author_facebook = get_field('facebook', 'user_'.get_the_author_meta('ID'));
                        $callie_author_twitter = get_field('twitter', 'user_'.get_the_author_meta('ID'));
                        $callie_author_instagram = get_field('instagram', 'user_'.get_the_author_meta('ID'));
                    ?>

                    <?php if($callie_author_facebook):?>
                        <li><a href="<?php echo esc_url($callie_author_facebook); ?>"><i class="fa fa-facebook"></i></a></li>
                    <?php endif; ?> 
                    <?php if($callie_author_twitter):?>
                        <li><a href="<?php echo esc_url($callie_author_twitter); ?>"><i class="fa fa-twitter"></i></a></li>
                    <?php endif; ?> 
                    <?php if($callie_author_instagram):?>
                        <li><a href="<?php echo esc_url($callie_author_instagram); ?>"><i class="fa fa-instagram"></i></a></li>
                    <?php endif; ?>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /PAGE HEADER -->
</header>
<!-- /HEADER -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">

                <?php

                while (have_posts()) {
                    the_post(); ?>

                    <!-- post -->
                    <div id="cat-posts" <?php post_class('post post-row'); ?>>
                        <a class="post-img" href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>"></a>
                        <div class="post-body">
                            <div class="post-category">
                                <?php the_category(' '); ?>
                            </div>
                            <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <ul class="post-meta">
                                <li><?php the_author_posts_link(); ?></li>
                                <li><?php echo get_the_date(); ?></li>
                            </ul>
                            <?php echo wp_trim_words(get_the_content(), '24',); ?>
                        </div>
                    </div>
                    <!-- /post -->

                <?php    } ?>

                <nav>
                    <?php callie_pagination(); ?>
                </nav>
            </div>

            <?php get_sidebar(); ?>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<?php get_footer(); ?>