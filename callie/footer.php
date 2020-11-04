<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package callie
 */

?>

<!-- FOOTER -->
<footer id="footer">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-4">


				<?php

				if (is_active_sidebar('footer-sidebar-1')) {
					dynamic_sidebar('footer-sidebar-1');
				}

				?>

			</div>
			<div class="col-md-4">

				<?php

				if (is_active_sidebar('footer-sidebar-2')) {
					dynamic_sidebar('footer-sidebar-2');
				}

				?>

			</div>

			<div class="col-md-4">



				<?php

				if (is_active_sidebar('footer-sidebar-3')) {
					dynamic_sidebar('footer-sidebar-3');
				}

				?>

				
			</div>
		</div>
		<!-- /row -->

		<!-- row -->
		<div class="footer-bottom row">
			<div class="col-md-6 col-md-push-6">

				<?php

				wp_nav_menu(
					array(
						'theme_location' 		=> 'footer-menu',
						'menu_class'			=> 'footer-nav',
						'fallback_cb'			=> 'add footer menu here'
					)
				);

				?>

			</div>
			<div class="col-md-6 col-md-pull-6">
				<div class="footer-copyright">
					<?php echo wp_kses_post(get_theme_mod('callie_copyright', 'copyright 2020')); ?>
				</div>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</footer>
<!-- /FOOTER -->

<?php wp_footer(); ?>

</body>

</html>