<?php
/** init-functions.php
 *
 ***** THIS IS A CORE VOLATYL FILE AND SHOULD NOT BE EDITED!
 ***** ALL CUSTOM CODING SHOULD BE DONE IN A CHILD THEME.
 ***** MORE INFORMATION - http://volatylthemes.com/why-child-themes/
 *******************************************************************
 *
 * Volatyl functions and definitions
 *
 * @package Volatyl
 * @since Volatyl 1.0
 */
 
// Constants
define ('THEME_NAME', 'Volatyl');
define ('THEME_VERSION', '1.3.1');
define ('THEME_URI', 'http://volatylthemes.com');
define ('THEME_PATH', get_template_directory());
define ('THEME_PATH_CHILD', get_stylesheet_directory());
define ('THEME_PATH_URI', get_template_directory_uri());
define ('THEME_STYLESHEET', get_stylesheet_uri());
define ('THEME_HTML', THEME_PATH . '/inc/html');
define ('THEME_OPTIONS', THEME_PATH . '/inc/options');
define ('THEME_FUNCTIONS', THEME_PATH . '/inc/functions');

// Load pretty important files
require_once (THEME_PATH . '/loops.php');
require_once (THEME_PATH . '/structure.php');	 
require_once (THEME_PATH . '/template-tags.php');

// Load site structure
require_once (THEME_HTML . '/header-html.php');
require_once (THEME_HTML . '/around-content.php');
require_once (THEME_HTML . '/main-content.php');
require_once (THEME_HTML . '/footer-html.php');

// Load theme goodies (options)
require_once (THEME_OPTIONS . '/theme-options.php');
require_once (THEME_OPTIONS . '/options-setup.php');
require_once (THEME_OPTIONS . '/option-defaults.php');
require_once (THEME_OPTIONS . '/admin-menu.php');
require_once (THEME_OPTIONS . '/logo-uploader.php');
require_once (THEME_OPTIONS . '/post-meta.php');

// Various functions used around Volatyl
require_once (THEME_FUNCTIONS . '/menus.php');
require_once (THEME_FUNCTIONS . '/columns.php');
require_once (THEME_FUNCTIONS . '/widgets.php');
require_once (THEME_FUNCTIONS . '/byline.php');
require_once (THEME_FUNCTIONS . '/page-nav.php');
require_once (THEME_FUNCTIONS . '/content.php');
require_once (THEME_FUNCTIONS . '/body-class.php');
require_once (THEME_FUNCTIONS . '/edd-functions.php');


//  Sets up theme defaults and registers support for various WordPress features
if (!function_exists('vol_setup')) {
	function vol_setup() {

		// WordPress says it's required. *Shoulder shrug*
		if (!isset($content_width)) $content_width = 960;

		// Translations can be filed in the /languages/ directory
		load_theme_textdomain('volatyl', THEME_PATH . '/inc/languages');

		// Add default posts and comments RSS feed links to head
		add_theme_support('automatic-feed-links');

		// Support for Post Thumbnails
		add_theme_support('post-thumbnails');
		
		// Custom Menu filters
		$menu_descriptions = apply_filters('menu_descriptions', array(
			'header_menu_description'		=> 'Header Menu (Supports 1 drop-down level)',
			'standard_menu_description'		=> 'Standard Menu (unlimited drop-downs)',
			'footer_menu_description'		=> 'Footer Menu (unlimited drop-downs)'
			) 
		);

		// Register wp_nav_menu() in header. This is the only default menu.	 
		register_nav_menus(array(
			'header' => __($menu_descriptions['header_menu_description'], 'volatyl')
		));
	
		$options = get_option('vol_content_options');
	
		// Register wp_nav_menu() below header (standard menu) if selected	
		if ($options['standardmenu'] == 1) :
			register_nav_menus(array(
				'standard' => __($menu_descriptions['standard_menu_description'], 'volatyl')
			)); 
		endif;
	
		// Register wp_nav_menu() above footer (footer menu) if selected	
		if ($options['footermenu'] == 1) :
			register_nav_menus(array(
				'footer' => __($menu_descriptions['footer_menu_description'], 'volatyl')
			));
		endif;
	}
}
add_action('after_setup_theme', 'vol_setup');


/** Enqueue front-end scripts and styles
 *
 * @since Volatyl 1.0
 */
function vol_front_scripts() {	
	$options = get_option('vol_general_options');
	
	// Default stylesheet
	wp_enqueue_style('style', THEME_PATH_URI . '/style.css');
	
	// Responsive stylesheet
	if ($options['responsive'] == 1) {
		wp_register_style('responsive', THEME_PATH_URI . '/responsive.css');
		wp_enqueue_style('responsive');
	}
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'vol_front_scripts', 1);


/** Enqueue back-end scripts and styles
 *
 * @since Volatyl 1.0
 */
function vol_back_scripts() {
	global $wp_version;
	
	// register Volatyl Options CSS file based on WP version (new admin styles!!!)
	if (version_compare($wp_version, '3.8', '>=')) {
		wp_register_style('theme-options-new', THEME_PATH_URI . '/inc/options/theme-options-new.css');
	} else {
		wp_register_style('theme-options', THEME_PATH_URI . '/inc/options/theme-options.css');
	}
	wp_register_script('logo-upload', THEME_PATH_URI . '/inc/js/logo-upload.js', array('jquery','media-upload','thickbox'));
		
	// load Volatyl Options CSS file based on WP version (new admin styles!!!)
	if (version_compare($wp_version, '3.8', '>=')) {
		wp_enqueue_style('theme-options-new');
	} else {
		wp_enqueue_style('theme-options');
	}
	
	// load scripts and styles on options pages
	if ('appearance_page_volatyl_options' == get_current_screen() -> id) {
		wp_enqueue_script('jquery');
		wp_enqueue_script('thickbox');
		wp_enqueue_style('thickbox');
		wp_enqueue_script('media-upload');
		wp_enqueue_script('logo-upload');
	}
}
add_action('admin_enqueue_scripts', 'vol_back_scripts');


// Tabs are so annoying sometimes
$indent = 3;
$tab3 = str_repeat("\t", $indent);
$tab6 = str_repeat("\t", $indent + 3);
$tab9 = str_repeat("\t", $indent + 6);