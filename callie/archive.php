<?php get_header(); ?>

<?php

$callie_current_term = get_queried_object();
$callie_cat_thumbnail_id = get_field("category_thumbnail", $callie_current_term);

if ($callie_cat_thumbnail_id) {
	$file_thumb_details = wp_get_attachment_image_src($callie_cat_thumbnail_id, 'callie_cat_image');
} ?>

<!-- PAGE HEADER -->
<div class="page-header">
	<div class="page-header-bg" style="background-image: url('<?php echo esc_url($file_thumb_details[0]); ?>'); background-repeat:no-repeat;background-size:cover; background-position:center; background-attachment:fixed;" data-stellar-background-ratio="0.5"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-10 text-center">
				<h1 class="text-uppercase"><?php single_cat_title(); ?></h1>
				<p> <?php echo category_description(); ?> </p>
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

				<?php	} ?>

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