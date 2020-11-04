<?php

function callie_setup()
{

	load_theme_textdomain('callie', get_template_directory() . '/languages');
	add_theme_support('widgets');
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');
	add_theme_support('custom-header');
	add_theme_support('custom-background');
	add_theme_support('title-tag');
	add_editor_style();
	add_theme_support('custom-logo', array(
		'height'		=> 250,
		'width'			=> 250,
		'flex-width'	=> true,
		'flex-height'	=> true,
	));

	if ( ! isset( $content_width ) ) $content_width = 1349;

	add_image_size('callie_image', 700, 467, true);
	add_image_size('callie_cat_image', 1920, 480, true);


	register_nav_menus(
		array(
			'top-menu'		=> __('Top menu', 'callie'),
			'footer-menu'	=> __('Footer menu', 'callie'),
			'sidebar-menu'	=> __('Sidebar menu', 'callie')

		)
	);
}

add_action('after_setup_theme', 'callie_setup');


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function callie_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Right sidebar', 'callie'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add right sidebar widgets here.', 'callie'),
			'before_widget' => '<div class="aside-widget" style="margin:50px 0;">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="section-title"><h2 class="title">',
			'after_title'   => '</div></h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Footer widgets area-1', 'callie'),
			'id'            => 'footer-sidebar-1',
			'description'   => esc_html__('Add footer sidebar widgets here.', 'callie'),
			'before_widget' => '<div class="footer-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="footer-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Footer widgets area-2', 'callie'),
			'id'            => 'footer-sidebar-2',
			'description'   => esc_html__('Add footer sidebar widgets here.', 'callie'),
			'before_widget' => '<div class="footer-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="footer-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Footer widgets area-3', 'callie'),
			'id'            => 'footer-sidebar-3',
			'description'   => esc_html__('Add footer sidebar widgets here.', 'callie'),
			'class'			=> 'tags-widget',
			'before_widget' => '<div class="footer-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="footer-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action('widgets_init', 'callie_widgets_init');

function callie_search_form($form)
{
	$placeholder = __('Enter your search...', 'callie');
	$search_form = <<<FORM

	<form>
		<input class="input" name="s" placeholder="{$placeholder}">
	</form>

	FORM;

	return $search_form;
}

add_filter("get_search_form", "callie_search_form");


/**
 * Enqueue scripts and styles.
 */
function callie_scripts()
{


	wp_enqueue_style('google-', '//fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700');
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.min.css', null, true, 'all');
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/inc/css/font-awesome.min.css', null, true, 'all');
	wp_enqueue_style('style', get_template_directory_uri() . '/inc/css/style.css', null, true, 'all');
	wp_enqueue_style("style-css", get_stylesheet_uri());


	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/inc/js/bootstrap.min.js', array('jquery'), true, true);
	wp_enqueue_script('jquery.stellar', get_template_directory_uri() . '/inc/js/jquery.stellar.min.js', array('jquery'), true, true);
	wp_enqueue_script('main', get_template_directory_uri() . '/inc/js/main.js', array('jquery'), true, true);


	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'callie_scripts');


add_filter('acf/settings/show_admin', '__return_false');

function callie_pagination(){
	global $wp_query;
	$pagination = paginate_links(array(
		'current'		=>max(1, get_query_var('paged')),
		'total'			=>$wp_query->max_num_pages,
		'type'			=>'list'
	));

	$pagination = str_replace('page-numbers', 'pagination', $pagination);
	$pagination = str_replace('<li>', '<li class="page-item">', $pagination);
	echo wp_kses_post($pagination);
}

/**
 * Implement the Custom Header feature.
 */
require_once get_template_directory() . '/inc/tgm.php';
require_once get_template_directory() . '/inc/acf-mb.php';
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/jetpack.php';
require_once get_template_directory() . '/lib/class-kirki-installer-section.php';
require_once get_template_directory() . '/inc/kirki.php';
