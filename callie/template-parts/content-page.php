<?php get_header(); ?>

<!-- PAGE HEADER -->
<div class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-10 text-center">
				<h1><?php the_title(); ?></h1>
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
			<div class="col-md-12">
				<div class="section-row">
					<p><?php the_content(); ?></p>
				</div>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<?php get_footer(); ?>