<?php
/** page-nav.php
 *
 ***** THIS IS A CORE VOLATYL FILE AND SHOULD NOT BE EDITED!
 ***** ALL CUSTOM CODING SHOULD BE DONE IN A CHILD THEME.
 ***** MORE INFORMATION - http://volatylthemes.com/why-child-themes/
 *******************************************************************
 *
 * Depending on selected options, numbered pagination can be used 
 * to navigate instead of standard page navigation. 
 *
 * @package Volatyl
 * @since Volatyl 1.0
 */

// Show standard page navigation - Prev/Next - or pagination?
if (!function_exists('volatyl_content_nav')) {
	function volatyl_content_nav($nav_id) {
		global $wp_query, $post;
		$nav_class = 'site-navigation paging-navigation clearfix';
		
		$post_navigation = apply_filters('post_navigation', array(
			'previous_post'			=> __('Previous Article:', 'volatyl'),
			'next_post'				=> __('Next Article:', 'volatyl'),
			'older_posts'			=> '&larr; ' . __('Older posts', 'volatyl'),
			'newer_posts'			=> __('Newer posts', 'volatyl') . ' &rarr;'
			) 
		);

		// Don't print empty markup on single pages if there's nowhere to navigate.
		if (is_single()) {
			$previous = (is_attachment()) ? get_post($post->post_parent) : get_adjacent_post(false, '', true);
			$next = get_adjacent_post(false, '', false);

			if (!$next && !$previous)
				return;
		}

		// Don't print empty markup in archives if there's only one page.
		if ($wp_query->max_num_pages < 2 && (is_home() || is_archive() || is_search()))
			return;
		
		if (is_single())
			$nav_class = 'site-navigation post-navigation clearfix';

			echo "<nav role=\"navigation\" id=\"", $nav_id, "\" class=\"", $nav_class, "\">";
		if (is_single()) {
			previous_post_link('<div class="nav-previous post-nav border-box"><span class="post-nav-title">' . $post_navigation['previous_post'] . '</span><br>%link</div>');
			
			next_post_link('<div class="nav-next post-nav border-box"><span class="post-nav-title">' . $post_navigation['next_post'] . '</span><br>%link</div>');

		} elseif ($wp_query->max_num_pages > 1 && (is_home() || is_archive() || is_search())) {
			((get_next_posts_link()) ? printf("<div class=\"nav-previous border-box\">") . next_posts_link($post_navigation['older_posts']) . printf("</div>") : '');
			((get_previous_posts_link()) ? printf("<div class=\"nav-next border-box\">") . previous_posts_link($post_navigation['newer_posts']) . printf("</div>") : '');
		}
		echo "</nav>";		
	}
}

// Pagination - only if standard page navigation is turned off
if (!function_exists('vol_pagination')) {
	function vol_pagination($pages = '', $range = 2) {  
		global $paged;
		$pagination_range = apply_filters('pagination_range', 2);
		$showitems = ($range * $pagination_range)+1;
 
		if (empty($paged)) 
			$paged = 1;
		if ($pages == '') {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if (!$pages)
			$pages = 1;
		}
	
		// Pagination text custom filter
		$pagination_place = apply_filters('pagination_place', '<span class="pagination-place">' . __('Page ', 'volatyl') . $paged . __(' of ', 'volatyl') . $pages . '</span>');
		$pagination_navigation = apply_filters('pagination_navigation', array(
			'first_page'		=> '&laquo;',
			'previous_page'		=> '&lsaquo;',
			'next_page'			=> '&rsaquo;',
			'last_page'			=> '&raquo;'
			) 
		);

		if (1 != $pages) {
			echo "<div class=\"pagination clearfix\">", $pagination_place,
			(($paged > 2 && $paged > $range+1 && $showitems < $pages) ? sprintf("<a href=\"") . get_pagenum_link(1) .  sprintf("\" title=\"") . __('First Page', 'volatyl') .  sprintf("\">") . $pagination_navigation['first_page'] .  sprintf("</a>") : ''),
			(($paged > 1 && $showitems < $pages) ? sprintf("<a href=\"") . get_pagenum_link($paged - 1) .  sprintf("\" title=\"") . __('Previous Page', 'volatyl') . sprintf("\">") . $pagination_navigation['previous_page'] . sprintf("</a>") : '');
			for ($i=1; $i <= $pages; $i++) {
				if (1 != $pages &&(!($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems))
					echo ($paged == $i) ? "<span class=\"current\">" . $i . "</span>" : "<a href='" . get_pagenum_link($i) . "' class=\"inactive\">" . $i . "</a>";
 
			}
			echo (($paged < $pages && $showitems < $pages) ? sprintf("<a href=\"") . get_pagenum_link($paged + 1) .  sprintf("\" title=\"") . __('Next Page', 'volatyl') . sprintf("\">") . $pagination_navigation['next_page'] . sprintf("</a>") : ''),  
			(($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) ?  sprintf("<a href=\"") . get_pagenum_link($pages) . sprintf("\" title=\"") . __('Last Page', 'volatyl') .  sprintf("\">") . $pagination_navigation['last_page'] .  sprintf("</a>") : ''),
			"</div>\n";
		}
	}
}

// Pagination options - Standard or Fancy?
function vol_pagination_type() {
	$options_content = get_option('vol_content_options');
	
	(($options_content['pagination'] == 1 && (is_home() || is_archive() || is_search())) ? vol_pagination() : volatyl_content_nav('nav-below'));
}