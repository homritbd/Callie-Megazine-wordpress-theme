<?php

get_header();
?>

<?php get_template_part('template-parts/home-featured'); ?>

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
		
			<?php get_template_part('template-parts/home-content'); ?>
			<!-- /row -->
			
		</div>
		<!-- /container -->

		<nav class="text-center">
					<?php callie_pagination(); ?>
				</nav>
		
	</div>
	<!-- /SECTION -->

	<?php get_footer();  ?>