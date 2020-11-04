<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package callie
 */

get_header();
?>

<main id="primary" class="site-main">

	<section class="error-404 not-found">
		<header class="page-header">
			<h1 class="page-title text-center"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'callie'); ?></h1>
		</header><!-- .page-header -->

		

		<div class="page-content">

			<div class="container">
				<div class="row">
					<div class="col-md-12">
					<p class="text-center" style="margin-top: 50px; font-size:20px;">
						<?php esc_html_e('It looks like nothing was found at this location. Return to the', 'callie'); ?>
						<a style="color: red;" href="<?php echo esc_url(home_url()); ?>"><?php _e('Home page', 'callie') ?></a>
				</p>
					</div>
				</div>
			</div>

		</div><!-- .page-content -->
	</section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();
