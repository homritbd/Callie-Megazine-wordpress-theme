<?php
get_header();
?>


<main id="primary" class="site-main">

    <section class="error-404 not-found">
        <header class="page-header">
            <h1 class="page-title text-center">
                <?php

                if (is_search()) {
                ?>
                    <?php _e('You search for:', 'callie') ?> <?php the_search_query(); ?>
                <?php
                }
                ?>




            </h1>
        </header><!-- .page-header -->
        <div class="page-content">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php

                        if (!have_posts()) {
                        ?>
                            <p class="text-center" style="margin-top: 50px; font-size:20px;">
                                <?php esc_html_e('No posts found. Return to the', 'callie'); ?>
                                <a style="color: red;" href="<?php echo esc_url(home_url()); ?>"><?php _e('Home page', 'callie') ?></a>
                            </p>
                        <?php
                        }

                        get_template_part('template-parts/home-content'); 
                          ?>
                    </div>
                </div>
            </div>

        </div><!-- .page-content -->
    </section><!-- .error-404 -->

</main><!-- #main -->


<?php get_footer(); ?>