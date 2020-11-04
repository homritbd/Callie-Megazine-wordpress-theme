<?php 

the_post();
get_header(); 

?>

<!-- PAGE HEADER -->
<div id="post-header" class="page-header">
	<div class="page-header-bg" style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id(($post->ID))); ?>'); background-position: center center;
background-size: cover;" data-stellar-background-ratio="0.5"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<div class="post-category">
					<?php the_category(' '); ?>
				</div>
				<h1><?php the_title(); ?></h1>

				<ul class="post-meta">
					<li><a href="author.html"><?php the_author(); ?></a></li>
					<li><?php echo get_the_date(); ?></li>
					<li><i class="fa fa-comments"></i> <?php comments_number(); ?></li>
				</ul>
				
			</div>
		</div>
	</div>
</div>
<!-- /PAGE HEADER -->
<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-8">

				<!-- post content -->
				<div class="section-row">
					<?php
					
					the_content(); 
					wp_link_pages( );
					
					?>
				</div>
				<!-- /post content -->

				<!-- post tags -->
				<div class="section-row">
					<div class="post-tags">
						<ul>
							<li><?php _e('TAGS:', 'callie'); ?></li>
							<?php the_tags(' '); ?>
						</ul>
					</div>
				</div>
				<!-- /post tags -->

				<!-- post nav -->
				<div class="section-row">
					<div class="post-nav">
						<?php $prevPost = get_previous_post(true);
						if ($prevPost) { ?>
							<div class="prev-post">
								<a class="post-img" href="blog-post.html">
									<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($prevPost->ID));  ?>">
								</a>
								<h3 class="post-title">
									<a href="#"><?php previous_post_link('%link', "<p>%title</p>", TRUE); ?></a>
								</h3>
								<span><?php _e('Previous post', 'callie'); ?></span>
							</div>
						<?php }
						$nextPost = get_next_post(true);
						if ($nextPost) { ?>
							<div class="next-post">
								<a class="post-img" href="blog-post.html">
									<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($nextPost->ID)); ?>">
								</a>
								<h3 class="post-title">
									<a href="#"><?php next_post_link('%link', "<p>%title</p>", TRUE); ?></a>
								</h3>
								<span><?php _e('Next post', 'callie'); ?></span>
							</div>
						<?php } ?>
					</div>
				</div>
				<!-- /post nav  -->

				<!-- post author -->
				<div class="section-row">
					<div class="section-title">
						<h3 class="title"><?php _e('About', 'callie') ?>
							<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta("ID"))); ?>"><?php the_author(); ?></a>
						</h3>
					</div>
					<div class="author media">
						<div class="media-left">
							<?php echo get_avatar(get_the_author_meta("ID")); ?>
						</div>
						<div class="media-body">
							<p>
								<?php the_author_meta("description"); ?>
							</p>
							<ul class="author-social">

								<?php
								$callie_author_facebook = get_field('facebook', 'user_' . get_the_author_meta('ID'));
								$callie_author_twitter = get_field('twitter', 'user_' . get_the_author_meta('ID'));
								$callie_author_instagram = get_field('instagram', 'user_' . get_the_author_meta('ID'));
								?>

								<?php if ($callie_author_facebook) : ?>
									<li><a href="<?php echo esc_url($callie_author_facebook); ?>"><i class="fa fa-facebook"></i></a></li>
								<?php endif; ?>
								<?php if ($callie_author_twitter) : ?>
									<li><a href="<?php echo esc_url($callie_author_twitter); ?>"><i class="fa fa-twitter"></i></a></li>
								<?php endif; ?>
								<?php if ($callie_author_instagram) : ?>
									<li><a href="<?php echo esc_url($callie_author_instagram); ?>"><i class="fa fa-instagram"></i></a></li>
								<?php endif; ?>

							</ul>
						</div>
					</div>
				</div>
				<!-- /post author -->

				<!-- /related post -->

				<?php get_template_part('template-parts/related-posts'); ?>

				<!-- post comments -->


				<?php
				if (!post_password_required()) {
					comments_template();
				}
				?>


			</div>
			<?php get_sidebar(); ?>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<?php get_footer(); ?>