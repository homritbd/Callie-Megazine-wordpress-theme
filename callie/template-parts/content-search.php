<?php

/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package callie
 */
get_header();

?>

<?php get_template_part('template-parts/home-featured'); ?>

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<?php

			while (have_posts()) :
				the_post();
			?>
				<div class="col-md-4">

					<!-- post -->
					<div class="post">
						<a class="post-img" href="blog-post.html">
							<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>">
						</a>
						<div class="post-body">
							<div class="post-category">
								<?php the_category(' '); ?>
							</div>
							<h3 class="post-title"><a href="blog-post.html"><?php the_title(); ?></a></h3>
							<ul class="post-meta">
								<li><a href="author.html"><?php the_author(); ?></a></li>
								<li><?php echo get_the_date(); ?></li>
							</ul>
						</div>
					</div>
					<!-- /post -->

				</div>
			<?php endwhile; ?>
			<!-- /row -->
			<?php get_template_part('template-parts/content'); ?>
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<?php get_footer();  ?>