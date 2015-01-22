<?php
/** options-setup.php
 *
 ***** THIS IS A CORE VOLATYL FILE AND SHOULD NOT BE EDITED!
 ***** ALL CUSTOM CODING SHOULD BE DONE IN A CHILD THEME.
 ***** MORE INFORMATION - http://volatylthemes.com/why-child-themes/
 *******************************************************************
 *
 * Set up arrays for theme options - theme-options.php
 *
 * @package Volatyl
 * @since Volatyl 1.0
 */


/** Create arrays for column layout options
 *
 * This array is used by the /inc/options/theme-options.php file
 * as well as the post-meta.php file for singular layouts.
 *
 * @since Volatyl 1.0
 */
$column_image = '<img src="' . THEME_PATH_URI . '/inc/options/images';
$column_options = array(
	'c1' => array(
		'value' 		=> 'c1',
		'description' 	=> __('Content (No Sidebars)', 'volatyl'),
		'label' 		=> $column_image . '/c1.png">'
	),
	'c2' => array(
		'value' 		=> 'c2',
		'description' 	=> __('Content (Sidebars below)', 'volatyl'),
		'label' 		=> $column_image . '/c2.png">'
	),
	'cs' => array(
		'value' 		=> 'cs',
		'description' 	=> __('Content - Sidebar', 'volatyl'),
		'label' 		=> $column_image . '/cs.png">'
	),
	'sc' => array(
		'value' 		=> 'sc',
		'description' 	=> __('Sidebar - Content', 'volatyl'),
		'label' 		=> $column_image . '/sc.png">'
	),
	'css' => array(
		'value' 		=> 'css',
		'description' 	=> __('Content - Sidebar - Sidebar', 'volatyl'),
		'label' 		=> $column_image . '/css.png">'
	),
	'scs' => array(
		'value' 		=> 'scs',
		'description' 	=> __('Sidebar - Content - Sidebar', 'volatyl'),
		'label' 		=> $column_image . '/scs.png">'
	),
	'ssc' => array(
		'value' 		=> 'ssc',
		'description' 	=> __('Sidebar - Sidebar - Content', 'volatyl'),
		'label' 		=> $column_image . '/ssc.png">'
	)
);
return $column_options;


/** General Settings of the "General" tab
 *
 * This array is used to set up the General Settings options. The array
 * fields are designed to build an HTML table and utilize the built-in
 * styling that WordPress provides for settings pages (Settings API).
 *
 * The /inc/options/theme-options.php file uses the variables that hold
 * these arrays and runs them through foreach loops to create the options
 * fields. Not every main array key holds the same type of values. Depending
 * on an option's placement in the table, it may be opening the beginning or
 * closing HTML tags of certain <table> elements. 
 *
 * The foreach loops check first to see if the array items have a certain 
 * key in place before attempting to put it in the table. If that key doesn't
 * exist, the foreach will move on.
 * 
 * @since Volatyl 1.0
 */
function volatyl_general() {
	$vol_general = array(
		'Automatic Updates' => array(
			'table_name'	=> '<h3>' . __('General Settings', 'volatyl') . '</h3>',
			'table'			=> '<table class="form-table">',
			'tr'			=> '<tr>',
			'th'			=> '<th scope="row">' . __('Enable Framework Updates', 'volatyl') . '</th>',
			'td'			=> '<td>',
			
			'title'			=> 'updates',
			'label'			=> __('This does not affect your license key. With your license key still activated, uncheck this option to temporarily disable update notifications.', 'volatyl'),
			'td_end'		=> '</td>',
			'tr_end'		=> '</tr>'
		),
		'Responsive CSS' 	=> array(
			'tr'			=> '<tr>',
			'th'			=> '<th scope="row">' . __('Enable Responsive CSS', 'volatyl') . '</th>',
			'td'			=> '<td>',
			
			'title'			=> 'responsive',
			'label'			=> sprintf(__('This option controls the %s core responsive CSS (this option does not control responsive CSS written in a child theme).', 'volatyl'), THEME_NAME),
			'td_end'		=> '</td>',
			'tr_end'		=> '</tr>'
		),
		'Admin Menu' 		=> array(
			'tr'			=> '<tr>',
			'th'			=> '<th scope="row">' . sprintf(__('Display %s Toolbar', 'volatyl'), THEME_NAME) . '</th>',
			'td'			=> '<td>',
			
			'title'			=> 'adminmenu',
			'label'			=> __('This is the drop-down menu at the very top of your admin dashboard if enabled.', 'volatyl'),
			'td_end'		=> '</td>',
			'tr_end'		=> '</tr>'
		),
		'Attribution' 		=> array(
			'tr'			=> '<tr>',
			'th'			=> '<th scope="row">' . sprintf(__('Display %s Attribution', 'volatyl'), THEME_NAME) . '</th>',
			'td'			=> '<td>',
			'title'			=> 'attribution',
			'label'			=> sprintf(__('There\'s no fee to remove the %s attribution. ;) Rebuild your footer in the <code>vol_site_info</code> hook.', 'volatyl'), THEME_NAME),
			'td_end'		=> '</td>',
			'tr_end'		=> '</tr>',
		),
	);
	return $vol_general;
}


/** Content Settings of the "Content" tab
 *
 * This array is used to set up the Content Settings options. The array
 * fields are designed to build an HTML table and utilize the built-in
 * styling that WordPress provides for settings pages (Settings API).
 *
 * The /inc/options/theme-options.php file uses the variables that hold
 * these arrays and runs them through foreach loops to create the options
 * fields. Not every main array key holds the same type of values. Depending
 * on an option's placement in the table, it may opening the beginning or
 * closing HTML tags of certain <table> elements. 
 *
 * The foreach loops check first to see if the array items have a certain 
 * key in place before attempting to put it in the table. If that key doesn't
 * exist, the foreach will move on.
 * 
 * @since Volatyl 1.0
 */
function volatyl_content() {
	$vol_content = array(
		'Site Title' 		=> array(
			'table_name'	=> '<h3>' . __('Content Settings', 'volatyl') . '</h3>',
			'table'			=> '<table class="form-table">',
			'tr'			=> '<tr>',
			'th'			=> '<th scope="row">' . __('Display Header Elements', 'volatyl') . '</th>',
			'td'			=> '<td>',
			'title'			=> 'title',
			'label'			=> __('Site title', 'volatyl'),
		),
		'Site Tagline' 		=> array(
			'title'			=> 'tagline',
			'label'			=> __('Site tagline', 'volatyl') ,
		),
		'Header Menu' 		=> array(
			'title'			=> 'headermenu',
			'label'			=> __('Header menu', 'volatyl'),
			'td_end'		=> '</td>',
			'tr_end'		=> '</tr>' 
		),
		'Standard Menu' 	=> array(
			'tr'			=> '<tr>',
			'th'			=> '<th scope="row">' . __('Activate Additional Menus', 'volatyl') . '</th>',
			'td'			=> '<td>',
			'title'			=> 'standardmenu',
			'label'			=> __('Standard Menu - Displays below the site header *<br>', 'volatyl'),
		),
		'Footer Menu' 		=> array(
			'title'			=> 'footermenu',
			'label'			=> __('Footer Menu - Displays above the site footer *', 'volatyl'),
			'notes'			=> '<span class="notes">' . sprintf(__('* Once activated, you must %s and add them to their respective "Theme Locations."', 'volatyl'), '<a href="nav-menus.php">' . __('create new menus', 'volatyl') . '</a>') . '</span>',
			'td_end'		=> '</td>',
			'tr_end'		=> '</tr>'
		),
		'Default Widgets' 	=> array(
			'tr'			=> '<tr>',
			'th'			=> '<th scope="row">' . __('Display Default Widgets', 'volatyl') . '</th>',
			'td'			=> '<td>',
			'title'			=> 'widgets',
			'label'			=> __('Show default widgets in empty sidebar areas.', 'volatyl'),
			'notes'			=> '<span class="notes">' . __('* The default widget does not show in footer widgetized areas because they only display if an actual widget is used.', 'volatyl') . '</span>',
			'td_end'		=> '</td>',
			'tr_end'		=> '</tr>' 
		),
		'Pagination' 		=> array(
			'tr'			=> '<tr>',
			'th'			=> '<th scope="row">' . __('Activate Pagination', 'volatyl') . '</th>',
			'td'			=> '<td>',
			'title'			=> 'pagination',
			'label'			=> __('Activate numbered pagination on homepage, archives, search results, etc.', 'volatyl'),
			'td_end'		=> '</td>',
			'tr_end'		=> '</tr>',
		),
	);
	return $vol_content;
}


/** Post Settings of the "Content" tab
 *
 * This array is used to set up the Post Settings options. The array
 * fields are designed to build an HTML table and utilize the built-in
 * styling that WordPress provides for settings pages (Settings API).
 *
 * The /inc/options/theme-options.php file uses the variables that hold
 * these arrays and runs them through foreach loops to create the options
 * fields. Not every main array key holds the same type of values. Depending
 * on an option's placement in the table, it may opening the beginning or
 * closing HTML tags of certain <table> elements. 
 *
 * The foreach loops check first to see if the array items have a certain 
 * key in place before attempting to put it in the table. If that key doesn't
 * exist, the foreach will move on.
 * 
 * @since Volatyl 1.0
 */
function volatyl_post() {
	$vol_post = array(
		'Byline Date'		=> array(
			'table_name'	=> '</table><h3>' . __('Post Settings', 'volatyl') . '</h3>',
			'table'			=> '<table class="form-table">',
			'tr'			=> '<tr>',
			'th'			=> '<th scope="row">' . __('Display Post Byline Elements', 'volatyl') . '</th>',
			'td'			=> '<td>',
			'title'			=> 'by-date-post',
			'label'			=> __('Date', 'volatyl'),
		),
		'Byline Author' 	=> array(
			'title'			=> 'by-author-post',
			'label'			=> __('Author', 'volatyl'),
		),
		'Byline Comments' 	=> array(
			'title'			=> 'by-comments-post',
			'label'			=> __('Responses/Comments', 'volatyl'),
		),
		'Byline Edit Link' 	=> array(
			'title'			=> 'by-edit-post',
			'label'			=> __('Edit Link (logged in users)', 'volatyl'),
		),
		'Byline Categories' => array(
			'title'			=> 'by-cats',
			'label'			=> __('Categories', 'volatyl'),
			'td_end'		=> '</td>',
			'tr_end'		=> '</tr>',
		),
		'Excerpts'			=> array(
			'tr'			=> '<tr>',
			'th'			=> '<th scope="row">' . __('Display Post Excerpts', 'volatyl') . '</th>',
			'td'			=> '<td>',
			'title'			=> 'homeexcerpt',
			'label'			=> __('Display excerpts instead of full posts.', 'volatyl'),
		),
		'Excerpt Link'		=> array(
			'title'			=> 'excerptlink',
			'label'			=> __('Link to full article in excerpts.', 'volatyl'),
			'td_end'		=> '</td>',
			'tr_end'		=> '</tr>',
		),
		'Featured Image Feed'	=> array(
			'tr'			=> '<tr>',
			'th'			=> '<th scope="row">' . __('Display Featured Images', 'volatyl') . '</th>',
			'td'			=> '<td>',
			'title'			=> 'feedfeaturedimage',
			'label'			=> __('Post Feeds (home, search, archives, etc.)', 'volatyl')
		),
		'Featured Image Posts'	=> array(
			'title'			=> 'singlefeaturedimage',
			'label'			=> __('Single Posts', 'volatyl'),
			'td_end'		=> '</td>',
			'tr_end'		=> '</tr>'
		),
		'Tags Feed'			=> array(
			'tr'			=> '<tr>',
			'th'			=> '<th scope="row">' . __('Display Tags List', 'volatyl') . '</th>',
			'td'			=> '<td>',
			'title'			=> 'feedtags',
			'label'			=> __('Post Feeds (home, search, archives, etc.)', 'volatyl'),
		),
		'Tags Posts'		=> array(
			'title'			=> 'singletags',
			'label'			=> __('Single Posts', 'volatyl'),
			'td_end'		=> '</td>',
			'tr_end'		=> '</tr>',
		),
		'Post Pings'		=> array(
			'tr'			=> '<tr>',
			'th'			=> '<th scope="row">' . __('Display Post Pings', 'volatyl') . '</th>',
			'td'			=> '<td>',
			'title'			=> 'postpings',
			'label'			=> __('Display trackbacks and pingbacks on posts below comments.', 'volatyl'),
			'notes'			=> '<span class="notes">' . __('If pings already exist, choosing to no longer allow them on the "Edit Post" page will not remove the original ones from the Post. Unchecking this box will.', 'volatyl') . '</span>',
			'td_end'		=> '</td>',
			'tr_end'		=> '</tr>',
		),
	);
	return $vol_post;
}


/** Page Settings of the "Content" tab
 *
 * This array is used to set up the Page Settings options. The array
 * fields are designed to build an HTML table and utilize the built-in
 * styling that WordPress provides for settings pages (Settings API).
 *
 * The /inc/options/theme-options.php file uses the variables that hold
 * these arrays and runs them through foreach loops to create the options
 * fields. Not every main array key holds the same type of values. Depending
 * on an option's placement in the table, it may opening the beginning or
 * closing HTML tags of certain <table> elements. 
 *
 * The foreach loops check first to see if the array items have a certain 
 * key in place before attempting to put it in the table. If that key doesn't
 * exist, the foreach will move on.
 * 
 * @since Volatyl 1.0
 */
function volatyl_page() {
	$vol_page = array(
		'Page Comments' 	=> array(
			'table_name'	=> '</table><h3>' . __('Page Settings', 'volatyl') . '</h3>',
			'table'			=> '<table class="form-table">',
			'tr'			=> '<tr>',
			'th'			=> '<th scope="row">' . __('Display Comments on all Pages', 'volatyl') . '</th>',
			'td'			=> '<td>',
			'title'			=> 'pagecomments',
			'label'			=> __('Display comments, trackbacks, and pingbacks on Pages. ', 'volatyl'),
			'notes'			=> '<span class="notes">' . __('If comments, trackbacks, or pingbacks already exist, choosing to no longer allow them on the "Edit Page" page will not remove the original ones from the Page. Unchecking this box will.', 'volatyl') . '</span>',
			'td_end'		=> '</td>',
			'tr_end'		=> '</tr>',
		),
	);
	return $vol_page;
}

 
/** Volatyl Hooks of the "Hooks" tab
 *
 * This array is used to set up the Volatyl Hooks information. The array
 * fields are designed to build an HTML table and utilize the built-in
 * styling that WordPress provides for settings pages (Settings API).
 *
 * The /inc/options/theme-options.php file uses the variables that hold
 * these arrays and runs them through foreach loops to create the options
 * fields. Not every main array key holds the same type of values. Depending
 * on an option's placement in the table, it may opening the beginning or
 * closing HTML tags of certain <table> elements. 
 *
 * The foreach loops check first to see if the array items have a certain 
 * key in place before attempting to put it in the table. If that key doesn't
 * exist, the foreach will move on.
 * 
 * @since Volatyl 1.0
 */
function volatyl_hooks() {
	$vol_hooks = array(
		'vol_before_html' 		=> array(
			'name'				=> 'vol_before_html',
			'title' 			=> __('Before HTML', 'volatyl'),
			'description'		=> __('The first content inside of the opening &lt;body&gt; tag.<br>Suggestion: Use this hook to build a "Hello Bar" style attention grabber.', 'volatyl') 
		),
		'vol_after_html' 		=> array(
			'name'				=> 'vol_after_html',
			'title' 			=> __('After HTML', 'volatyl'),
			'description'		=> __('The last content on your page just inside of the closing &lt;/body&gt; tag', 'volatyl') 
		),
		'vol_header_top' 		=> array(
			'name'				=> 'vol_header_top',
			'title' 			=> __('Header Top', 'volatyl'),
			'description'		=> __('Inside of your header above where your site title and site tagline are located.<br>Suggestion: Try turning off your site title and site tagline to build your own header here.', 'volatyl') 
		),
		'vol_header_bottom' 	=> array(
			'name'				=> 'vol_header_bottom',
			'title' 			=> __('Header Bottom', 'volatyl'),
			'description'		=> __('Inside of your header below where your site title and site tagline are located.<br>Suggestion: Try turning off your site title and site tagline to build your own header here.', 'volatyl') 
		),
		'vol_header_after_title_tagline' 	=> array(
			'name'				=> 'vol_header_after_title_tagline',
			'title' 			=> __('Header After Title/Tagline', 'volatyl'),
			'description'		=> __('Inside of your header below site title and site tagline but above<br>your header menu <em>in the HTML flow</em>', 'volatyl') 
		),
		'vol_footer_top' 		=> array(
			'name'				=> 'vol_footer_top',
			'title' 			=> __('Footer Top', 'volatyl'),
			'description'		=> __('This displays inside of your footer at the very top.<br>If you have the Fat Footer activated, this will display above that.', 'volatyl') 
		),
		'vol_footer_bottom' 	=> array(
			'name'				=> 'vol_footer_bottom',
			'title' 			=> __('Footer Bottom', 'volatyl'),
			'description'		=> __('This displays inside of your footer at the bottom. If you have the Fat Footer<br>activated, this will display below that but above the copyright section.', 'volatyl') 
		),
		'vol_site_info' 		=> array(
			'name'				=> 'vol_site_info',
			'title' 			=> __('Site Information', 'volatyl'),
			'description'		=> __('This displays just after (inline) the site attribution. If you remove the ', 'volatyl') . THEME_NAME . __(' attribution,<br>you can build your own information area here.', 'volatyl') 
		),
		'vol_headliner' 		=> array(
			'name'				=> 'vol_headliner',
			'title' 			=> __('Headliner', 'volatyl'),
			'description'		=> __('Better known as a "Feature Box" displaying beneath the header but above content', 'volatyl') 
		),
		'vol_footliner' 		=> array(
			'name'				=> 'vol_footliner',
			'title' 			=> __('Footliner', 'volatyl'),
			'description'		=> __('Much like the Headliner, this area can be used to highlight important<br>information below the main content area.', 'volatyl') 
		),
		'vol_before_content_area' 	=> array(
			'name'				=> 'vol_before_content_area',
			'title' 			=> __('Before Content Area', 'volatyl'),
			'description'		=> __('Only active on full-width HTML structure, use this hook<br>to add full-width sections to your layout.', 'volatyl') 
		),
		'vol_after_content_area' 	=> array(
			'name'				=> 'vol_after_content_area',
			'title' 			=> __('After Content Area', 'volatyl'),
			'description'		=> __('Only active on full-width HTML structure, use this hook<br>to add full-width sections to your layout.', 'volatyl') 
		),
		'vol_before_content' 	=> array(
			'name'				=> 'vol_before_content',
			'title' 			=> __('Before Content', 'volatyl'),
			'description'		=> __('Only active on page-width HTML structure, use this hook<br>to add stacked sections to your layout', 'volatyl') 
		),
		'vol_after_content' 	=> array(
			'name'				=> 'vol_after_content',
			'title' 			=> __('After Content', 'volatyl'),
			'description'		=> __('Only active on page-width HTML structure, use this hook<br>to add stacked sections to your layout', 'volatyl') 
		),
		'vol_before_content_column' 	=> array(
			'name'				=> 'vol_before_content_column',
			'title' 			=> __('Before Content Column', 'volatyl'),
			'description'		=> __('Very top of the content column before article/feed<br>(home, archive, & single posts only)', 'volatyl') 
		),
		'vol_after_content_column' 	=> array(
			'name'				=> 'vol_after_content_column',
			'title' 			=> __('After Content Column', 'volatyl'),
			'description'		=> __('Very bottom of the content column after article/feed<br>(home, archive, & single posts only)', 'volatyl') 
		),
		'vol_before_article_header' => array(
			'name'				=> 'vol_before_article_header',
			'title' 			=> __('Before Article Header', 'volatyl'),
			'description'		=> __('Displays above article headline and byline .<br>Suggestion: Many bloggers place ads in this area.', 'volatyl') 
		),
		'vol_after_article_header' => array(
			'name'				=> 'vol_after_article_header',
			'title' 			=> __('After Article Header', 'volatyl'),
			'description'		=> __('Displays beneath article headline and byline (if byline items show).<br>Suggestion: Many bloggers place ads in this area.', 'volatyl') 
		),
		'vol_last_byline_item'	=> array(
			'name'				=> 'vol_last_byline_item',
			'title' 			=> __('Last Byline Item', 'volatyl'),
			'description'		=> __('Displays as the last item in the byline any time the byline is shown.<br>Your content will appear before the "edit" link as that link is not seen by visitors.', 'volatyl') 
		),
		'vol_post_footer' 		=> array(
			'name'				=> 'vol_post_footer',
			'title' 			=> __('Single Post Footer', 'volatyl'),
			'description'		=> __('Displays below your articles but above the comments.<br>Suggestion: Use this area as a call-to-action after a vistor reads your content.', 'volatyl') 
		),
		'vol_before_sidebar_1' 	=> array(
			'name'				=> 'vol_before_sidebar_1',
			'title' 			=> __('Before Sidebar 1', 'volatyl'),
			'description'		=> __('Directly above Sidebar 1 in all layouts', 'volatyl') 
		),
		'vol_after_sidebar_1' 	=> array(
			'name'				=> 'vol_after_sidebar_1',
			'title' 			=> __('After Sidebar 1', 'volatyl'),
			'description'		=> __('Directly below Sidebar 1 in all layouts', 'volatyl') 
		),
		'vol_before_sidebar_2' 	=> array(
			'name'				=> 'vol_before_sidebar_2',
			'title' 			=> __('Before Sidebar 2', 'volatyl'),
			'description'		=> __('Directly above Sidebar 2 in all layouts', 'volatyl') 
		),
		'vol_after_sidebar_2' 	=> array(
			'name'				=> 'vol_after_sidebar_2',
			'title' 			=> __('After Sidebar 2', 'volatyl'),
			'description'		=> __('Directly below Sidebar 2 in all layouts', 'volatyl') 
		),
	);
	return $vol_hooks;
}


/** Volatyl Hooks Setup
 *
 * All Volatyl hooks are built and output here. Volatyl Hooks
 * under the "Hooks" tab in the Volatyl Options are displayed 
 * using the following functions as well as any custom functions
 * that are called with a hook name from a WordPress action.
 * 
 * @since Volatyl 1.0
 */
function vol_before_html() { 
	global $options; 
	echo stripslashes($options['vol_before_html']);
}
function vol_after_html() { 
	global $options; 
	echo stripslashes($options['vol_after_html']);
}
function vol_header_top() { 
	global $options; 
	echo stripslashes($options['vol_header_top']);
}
function vol_header_bottom() { 
	global $options; 
	echo stripslashes($options['vol_header_bottom']);
}
function vol_header_after_title_tagline() { 
	global $options; 
	echo stripslashes($options['vol_header_after_title_tagline']);
}
function vol_footer_top() { 
	global $options; 
	echo stripslashes($options['vol_footer_top']);
}
function vol_footer_bottom() { 
	global $options; 
	echo stripslashes($options['vol_footer_bottom']);
}
function vol_site_info() { 
	global $options; 
	echo stripslashes($options['vol_site_info']);
}
function vol_headliner() { 
	global $options; 
	echo stripslashes($options['vol_headliner']);
}
function vol_footliner() {
	global $options; 
	echo stripslashes($options['vol_footliner']);
}
function vol_before_content_area() { 
	global $options; 
	echo stripslashes($options['vol_before_content_area']);
}
function vol_after_content_area() { 
	global $options; 
	echo stripslashes($options['vol_after_content_area']);
}
function vol_before_content() { 
	global $options; 
	echo stripslashes($options['vol_before_content']);
}
function vol_after_content() { 
	global $options; 
	echo stripslashes($options['vol_after_content']);
}
function vol_before_content_column() { 
	global $options; 
	echo stripslashes($options['vol_before_content_column']);
}
function vol_after_content_column() { 
	global $options; 
	echo stripslashes($options['vol_after_content_column']);
}
function vol_before_article_header() {
	global $options; 
	echo stripslashes($options['vol_before_article_header']);
}
function vol_after_article_header() {
	global $options; 
	echo stripslashes($options['vol_after_article_header']);
}
function vol_last_byline_item() {
	global $options_hooks; 
	echo stripslashes($options_hooks['vol_last_byline_item']);
}
function vol_post_footer() { 
	global $options; 
	echo stripslashes($options['vol_post_footer']);
}
function vol_before_sidebar_1() { 
	global $options_hooks; 
	echo stripslashes($options_hooks['vol_before_sidebar_1']);
}
function vol_after_sidebar_1() { 
	global $options_hooks; 
	echo stripslashes($options_hooks['vol_after_sidebar_1']);
}
function vol_before_sidebar_2() { 
	global $options_hooks; 
	echo stripslashes($options_hooks['vol_before_sidebar_2']);
}
function vol_after_sidebar_2() { 
	global $options_hooks; 
	echo stripslashes($options_hooks['vol_after_sidebar_2']);
}


/** Easy Digital Download Settings of the "EDD" tab
 *
 * This array is used to set up the Easy Digital Download Settings options. 
 * The array fields are designed to build an HTML table and utilize the
 * built-in styling that WordPress provides for settings pages (Settings API).
 *
 * The /inc/options/theme-options.php file uses the variables that hold
 * these arrays and runs them through foreach loops to create the options
 * fields. Not every main array key holds the same type of values. Depending
 * on an option's placement in the table, it may opening the beginning or
 * closing HTML tags of certain <table> elements. 
 *
 * The foreach loops check first to see if the array items have a certain 
 * key in place before attempting to put it in the table. If that key doesn't
 * exist, the foreach will move on.
 * 
 * @since Volatyl 1.2
 */	
function volatyl_edd() {
	$vol_edd = array(
		'Automatic Updates' => array(
			'table'			=> '<table class="form-table">',
			'tr'			=> '<tr>',
			'th'			=> '<th scope="row">' . sprintf(__('Enable %s Styles</th>', 'volatyl'), '<abbr title="Easy Digital Downloads">EDD</abbr>') . '</th>',
			'td'			=> '<td>',			
			'title'			=> 'eddstyles',
			'label'			=> __('Check this box to use Easy Digital Downloads CSS. Uncheck to build your own CSS.', 'volatyl'),
			'td_end'		=> '</td>',
			'tr_end'		=> '</tr>'
		),
		'Download Comments' => array(
			'tr'			=> '<tr>',
			'th'			=> '<th scope="row">' . __('Display Comments on Downloads', 'volatyl') . '</th>',
			'td'			=> '<td>',
			
			'title'			=> 'downloadcomments',
			'label'			=> __('Check this box to display comments on single download pages.', 'volatyl'),
			'td_end'		=> '</td>',
			'tr_end'		=> '</tr>'
		),
	);
	return $vol_edd;
}