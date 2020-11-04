<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<!-- HEADER -->
	<header id="header">
		<!-- NAV -->
		<div id="nav">
			<!-- Top Nav -->
			<div id="nav-top">
				<div class="container">

					<!-- logo -->
					<div class="nav-logo">

						<?php

						the_custom_logo();

						?>

					</div>
					<!-- /logo -->

					<!-- search & aside toggle -->
					<div class="nav-btns">
						<button class="aside-btn"><i class="fa fa-bars"></i></button>
						<button class="search-btn"><i class="fa fa-search"></i></button>
						<div id="nav-search">
							<?php get_search_form(); ?>
							<button class="nav-close search-close">
								<span></span>
							</button>
						</div>
					</div>
					<!-- /search & aside toggle -->
				</div>
			</div>
			<!-- /Top Nav -->



			<!-- Main Nav -->
			<div id="nav-bottom">
				<div class="container">
					<!-- nav -->
					<?php

					$callie_menu = wp_nav_menu(
						array(
							'theme_location' 		=> 'top-menu',
							'menu_class'			=> 'nav-menu',
							'fallback_cb'			=> 'add menu here',
							'echo' 					=> false
						)
					);

					$callie_menu = str_replace('<ul class="sub-menu">', '<div class="dropdown"><div class="dropdown-body"><ul class="dropdown-list">', $callie_menu);
					$callie_menu = str_replace('menu-item-has-children', 'menu-item-has-children has-dropdown', $callie_menu);
					echo wp_kses_post($callie_menu);

					?>
					<!-- /nav -->





				</div>
			</div>
			<!-- /Main Nav -->

			<!-- Aside Nav -->
			<div id="nav-aside">

				<?php

				$callie_menu = wp_nav_menu(
					array(
						'theme_location' 		=> 'sidebar-menu',
						'menu_class'			=> 'nav-aside-menu',
						'fallback_cb'			=> 'add sidebar menu here',
						'echo' 					=> false
					)
				);

				$callie_menu = str_replace('menu-item-has-children', 'menu-item-has-children has-dropdown', $callie_menu);
				$callie_menu = str_replace('sub-menu', 'dropdown', $callie_menu);
				echo wp_kses_post($callie_menu);

				?>

				<button class="nav-close nav-aside-close"><span></span></button>
			</div>
			<!-- /Aside Nav -->
		</div>
		<!-- /NAV -->
	</header>
	<!-- /HEADER -->