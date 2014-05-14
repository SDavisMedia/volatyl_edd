<?php 
/** post-meta.php
 *
 ***** THIS IS A CORE VOLATYL FILE AND SHOULD NOT BE EDITED!
 ***** ALL CUSTOM CODING SHOULD BE DONE IN A CHILD THEME.
 ***** MORE INFORMATION - http://volatylthemes.com/why-child-themes/
 *******************************************************************
 *
 * Everything here is dedicated to adding options to your "Edit Post"
 * and "Edit Page" screens. 
 *
 * @package Volatyl
 * @since Volatyl 1.0
 */

// Add the "Volatyl Quick Options" meta box to post and page edit screens
function vol_add_meta_box() {  
    add_meta_box('post-layout', __(THEME_NAME . ' Quick Post Settings', 'volatyl'), 'vol_meta_box', 'post', 'normal', 'high');    
    add_meta_box('page-layout', __(THEME_NAME . ' Quick Page Settings', 'volatyl'), 'vol_meta_box', 'page', 'normal', 'high');    
    add_meta_box('download-layout', __(THEME_NAME . ' Quick Download Settings', 'volatyl'), 'vol_meta_box', 'download', 'normal', 'high'); 
} 
add_action('add_meta_boxes', 'vol_add_meta_box'); 

// Callback for the above meta boxes. Posts and Pages share the same function.
function vol_meta_box($post) {  
	global $post, $current_screen, $column_options;
	$the_id = get_post_custom($post->ID);
	$selected = isset($the_id['_singular-column']) ? esc_attr($the_id['_singular-column'][0]) : ''; 
	$custom_class = isset($the_id['_custom-class']) ? esc_attr($the_id['_custom-class'][0]) : '' ;
	$da_title = isset($the_id['_singular-title']) ? $the_id['_singular-title'][0] : 0 ;
	$create_sidebar_1 = isset($the_id['_create-sidebar-1']) ? $the_id['_create-sidebar-1'][0] : 0 ;
	$create_sidebar_2 = isset($the_id['_create-sidebar-2']) ? $the_id['_create-sidebar-2'][0] : 0 ;
    $new_sidebars = array(
    	'Sidebar 1'		=> array(
    		'name'		=> '_create-sidebar-1',
    		'label'		=> __('Create Sidebar 1:', 'volatyl'),
    		'state'		=> $create_sidebar_1
    	),
    	'Sidebar 2'		=> array(
    		'name'		=> '_create-sidebar-2',
    		'label'		=> __('Create Sidebar 2:', 'volatyl'),
    		'state'		=> $create_sidebar_2
    	)
    );
	
    wp_nonce_field('vol_meta_box_nonce', 'meta_box_nonce');
    

	/** Select option input for singular layout choices
	 * 
	 * The first options is a standalone option - Site Default. It is not 
	 * included in the $column_options array and will only be used here.
	 */
    echo "<p><label for=\"_singular-column\">" . __('Select Column Layout: ', 'volatyl') . "</label>
    <select name=\"_singular-column\" id=\"_singular-column\">
    <option value=\"default\"";
    selected($selected, 'default');
    echo ">" . __('Site Default', 'volatyl') . "</option>";  
    
    // Create an option for each layout choice in the $column_options array
    foreach ($column_options as $key) {
		echo "<option value=\"", $key['value'], "\"";
		selected($selected, $key['value']);
		echo ">", $key['description'], "</option>"; 
    }   
    
    echo "</select></p>
    <p><label for=\"_custom-class\">" . __('CSS Class: ', 'volatyl') . "</label>
    <input id=\"_custom-class\" class=\"custom-class\" name=\"_custom-class\" value=\"", $custom_class, "\" size=\"30\" type=\"text\" placeholder=\"" . __('No Periods! Separate by a Space', 'volatyl') . "\"></p>";
    
    // Create sidebars per Page or Post
    echo "<p>";
    foreach ($new_sidebars as $ns) {
    	echo "<span class=\"input-group\"><label for=\"", $ns['name'], "\">", $ns['label'], " </label><input id=\"", $ns['name'], "\" class=\"create-sidebar\" name=\"", $ns['name'], "\" value=\"", $ns['state'], "\" type=\"checkbox\"",	checked('1', $ns['state'], '1'), "/></span>";
    }
    echo "<span style=\"display: block; color: #8b8b8b; font-style: italic; max-width: 600px; margin-top: 5px;\">" . __('When you select to create a new sidebar, it will not register until you publish the post/page. However, the site-wide, default sidebar content will continue to display until you go to your widgets panel and add widgets to your new sidebar(s).', 'volatyl') . "</span>",
    "</p>";
    
    // only show the option to remove titles if on the edit PAGE screen
    if ('page' == $current_screen->post_type) :
	    echo "<p><span class=\"input-group\"><label for=\"_singular-title\">" . __('Remove Page Title: ', 'volatyl') . "</label><input id=\"_singular-title\" name=\"_singular-title\" value=\"", $da_title, "\" size=\"30\" type=\"checkbox\"",	checked('1', $da_title, '1'), "/></span>";
	    echo "<span style=\"display: block; color: #8b8b8b; font-style: italic; max-width: 600px; margin-top: 5px;\">" . __( 'Check this option if you&rsquo;d like to remove the title from your WordPress Page. This is a very useful feature if your page uses the Landing Page or Squeeze Page template. However, you should keep SEO in mind. Your default title is an H1. It&rsquo;s best that you rebuild it somewhere in your content if you use this option.', 'volatyl' ) . "</span></p>";
    endif;
}

// Register new sidebars "on the fly" when the option is selected on singulars
function singular_widgets_init() {
	$sidebar_1_args = array(
		'meta_key' => '_create-sidebar-1',
		'meta_value' => 1,
		'post_type' => array('post','page','download'),
		'nopaging' => true
	);
	$pages = get_posts($sidebar_1_args);
    foreach($pages as $page) {
        register_sidebar( array(
        	'name'				=> 'Sidebar 1 &#8212; ' . $page->post_title, 
        	'id'				=> 'sidebar-1-' . $page->ID,
			'description'   	=> sprintf(__('This sidebar is specific to the Post/Page/Download titled "%s." Sidebar 1 will always be the leftmost sidebar, first in the HTML flow.', 'volatyl'), $page->post_title),
			'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
			'after_widget' 		=> '</aside>',
			'before_title' 		=> '<h4 class="widget-title">',
			'after_title' 		=> '</h4>',
        )); 
    }
	$sidebar_2_args = array(
		'meta_key' => '_create-sidebar-2',
		'meta_value' => 1,
		'post_type' => array('post','page','download'),
		'nopaging' => true
	);
	$pages = get_posts($sidebar_2_args);
    foreach($pages as $page) {
        register_sidebar( array(
        	'name'				=> 'Sidebar 2 &#8212; ' . $page->post_title, 
        	'id'				=> 'sidebar-2-' . $page->ID,
			'description'   	=> sprintf(__('This sidebar is specific to the Post/Page/Downoad titled "%s." Sidebar 2 will always be the rightmost sidebar, last in the HTML flow.', 'volatyl'), $page->post_title),
			'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
			'after_widget' 		=> '</aside>',
			'before_title' 		=> '<h4 class="widget-title">',
			'after_title' 		=> '</h4>',
        )); 
    }
}
add_action('widgets_init', 'singular_widgets_init', 20);

// Validate singular layout options
function vol_meta_box_save($post_id) {
	global $options;
	$options_structure = get_option('vol_structure_options');

	// Bail if we're doing an auto save
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) 
		return;
	
	// if our nonce isn't there, or we can't verify it, bail
	if (!isset($_POST['meta_box_nonce']) || ! wp_verify_nonce($_POST['meta_box_nonce'], 'vol_meta_box_nonce')) 
		return;
		
	// if our current user can't edit this post, bail
	if (isset($_POST['_singular-column']))
		update_post_meta($post_id, '_singular-column', esc_attr($_POST['_singular-column']));
		
	elseif (!isset($_POST['_singular-column']))
		$_POST['_singular-column'] == $options_structure['column'];
	
	// Allowed HTML in custom class field... which is none
	$allowed = array();
		
	if (isset($_POST['_custom-class']))  
        update_post_meta($post_id, '_custom-class', wp_kses($_POST['_custom-class'], $allowed)); 

    $new_sidebar_1 = isset($_POST['_create-sidebar-1']) ? 1 : 0;  
    	update_post_meta($post_id, '_create-sidebar-1', $new_sidebar_1); 

    $new_sidebar_2 = isset($_POST['_create-sidebar-2']) ? 1 : 0;  
    	update_post_meta($post_id, '_create-sidebar-2', $new_sidebar_2); 

    $da_title_ = isset($_POST['_singular-title']) ? 1 : 0;  
    	update_post_meta($post_id, '_singular-title', $da_title_); 
}
add_action('save_post', 'vol_meta_box_save');