<?php
/** sidebar-one-download.php
 *
 ***** THIS IS A CORE VOLATYL FILE AND SHOULD NOT BE EDITED!
 ***** ALL CUSTOM CODING SHOULD BE DONE IN A CHILD THEME.
 ***** MORE INFORMATION - http://volatylthemes.com/why-child-themes/
 *******************************************************************
 *
 * Download Sidebar 1 containing widget area and download item info
 *
 * @package Volatyl
 * @since Volatyl 1.2
 */
global $options_hooks;
$options = get_option('vol_structure_options');
$options_hooks = get_option('vol_hooks_options'); ?>

<div id="sidebars" class="widget-area sidebar-1 download-sidebar border-box">	

	<?php		
	// downloads sidebar item info - don't show on generic store pages
	if (!is_page_template('custom-store-page.php') && is_single())
		download_item_before_sidebar();

	// Display Download Sidebar 1 only if there is no 
	// download-specific sidebar WITH content
	do_action('before_sidebar');
	$singular_sidebar_1 = get_post_meta($post->ID, '_create-sidebar-1', true);
	if ('' !== $singular_sidebar_1 || 0 !== $singular_sidebar_1) {
		((!dynamic_sidebar('sidebar-1-' . $post->ID)) ? 
			((!dynamic_sidebar('download-sidebar-1')) ? vol_default_widget() : '') : 
		'');
	} else {
		((!dynamic_sidebar('download-sidebar-1')) ? vol_default_widget() : '');
	} ?>
	
</div>