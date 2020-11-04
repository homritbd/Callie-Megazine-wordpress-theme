<div class="row">

	<?php

		while(have_posts()):
			the_post();
	?>

	<div class="col-md-4">
		<!-- post -->
		<div class="post post-widget">
			<a class="post-img" href="blog-post.html">
				<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>"></a>
			<div class="post-body">
				<div class="post-category">
					<?php the_category(' '); ?>
				</div>
				<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			</div>
		</div>
		<!-- /post -->
	</div>

		<?php endwhile; ?>

</div>