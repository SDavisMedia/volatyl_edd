<?php
/** body-class.php
 *
 ***** THIS IS A CORE VOLATYL FILE AND SHOULD NOT BE EDITED!
 ***** ALL CUSTOM CODING SHOULD BE DONE IN A CHILD THEME.
 ***** MORE INFORMATION - http://volatylthemes.com/why-child-themes/
 *******************************************************************
 *
 * On various pages of your site, different body classes are needed
 * for styling purposes. That happens here.
 *
 * @package Volatyl
 * @since Volatyl 1.0
 */


/** Body class by custom page template
 *
 * Add specific CSS class by filter for custom templated pages.
 * Based on the added class, the appropriate CSS will be used in style.css
 *
 * @since Volatyl 1.0
 */
function vol_page_template_body_class($classes) {

	// add class name to the $classes array based on conditions
	if (is_page_template('custom-landing.php')) {
		$classes[] = "landing";
	} elseif (is_page_template('custom-squeeze.php')) {
		$classes[] = "squeeze";
	}

	// return the $classes array
	return $classes;
}
add_filter('body_class', 'vol_page_template_body_class');


/** Body class based on column structure
 *
 * Add specific CSS class by filter based on column layout option.
 * Based on the added classes, the appropriate CSS will be used in style.css
 *
 * Also, do it based on singular, site default, etc. If there are no special
 * conditions, though, just use the site default (Structure Settings).
 *
 * @since Volatyl 1.0
 */
function vol_main_layout_class($classes) {
	global $post;

	if (!is_404() && !is_search()) {
		$single_layout = get_post_meta($post->ID, '_singular-column', true);
	}

	// add class name to the $classes array based on conditions
	if (is_singular()) {
		if ('default' == $single_layout || '' == $single_layout) {
			if (1 == vol_get_column_count()) {
				$classes[] = 'one-col';
			} elseif (2 == vol_get_column_count()) {
				$classes[] = 'two-col';
			} elseif (3 == vol_get_column_count()) {
				$classes[] = 'three-col';
			}
			$classes[] = vol_get_layout();
		} elseif ($single_layout == 'c1' || $single_layout == 'c2') {
			$classes[] = 'one-col';
			$classes[] = $single_layout;
		} elseif ($single_layout == 'cs' || $single_layout == 'sc') {
			$classes[] = 'two-col';
			$classes[] = $single_layout;
		} elseif ($single_layout == 'css' || $single_layout == 'scs' || $single_layout == 'ssc') {
			$classes[] = 'three-col';
			$classes[] = $single_layout;
		}
	} else {
		if (1 == vol_get_column_count()) {
			$classes[] = 'one-col';
		} elseif (2 == vol_get_column_count()) {
			$classes[] = 'two-col';
		} elseif (3 == vol_get_column_count()) {
			$classes[] = 'three-col';
		}
		$classes[] = vol_get_layout();
	}

	// return the $classes array
	return $classes;
}
add_filter('body_class', 'vol_main_layout_class');


/** Body class by singular metabox options
 *
 * Add specific CSS class on each post, page, or download edit screen
 *
 * @since Volatyl 1.0
 */
function vol_singular_body_class($classes) {
	global $post;

	// get the post meta only if on a post type
	if ( is_singular() ) {
		$da_title_or_no = get_post_meta( $post->ID, '_singular-title', true );
		$singular_body_class = get_post_meta( $post->ID, '_custom-class', true );

		// Add the body classes if they exist
		if ( '' !== $singular_body_class ) {
			$classes[] = $singular_body_class;
		}

		if ( is_page() && 1 == $da_title_or_no ) {
			$classes[] = 'no-title';
		}
	}

	// return the $classes array
	return $classes;
}
add_filter('body_class', 'vol_singular_body_class');


/** Body classes for Easy Digital Downloads
 *
 * Add specific CSS class by filter for EDD pages.
 *
 * @since Volatyl 1.2
 */
function vol_edd_body_classes($classes) {
	global $post;

	// Add .store-item body class for individual download pages
	if ('download' === get_query_var('post_type')) {
		$classes[] = 'store-item';
	}

	// Add .store-front body class for Store Front page template
	if (is_page_template('custom-store-front.php')) {
		$classes[] = "store-front";
	}

	// return the $classes array
	return $classes;
}
add_filter( 'body_class', 'vol_edd_body_classes' );