<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// CUSTOM POSTS

function b2i_custom_posts(){  
    // Portfolio Custom Post
    register_post_type('b2inews', array(
        'labels' => array(
            'name' => __('B2i News', 'b2itextdomain'),
            'singular_name' => __('B2i News', 'b2itextdomain'),
			'add_new_item'          => __( 'Add B2i News', 'b2itextdomain' ),
			'edit_item'             => __( 'Edit B2i News', 'b2itextdomain' ),
            'search_items'          => __( 'Search B2i News' ),
            'all_items'             => __( 'All B2i News' ),
            'not_found'             => __( 'No B2i News Item found'),
            'not_found_in_trash'    => __( 'No  B2i News Item found in Trash'),
            'menu_name'             => 'B2i News'
        ),
        'public'      => true,
        'has_archive' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        //'show_in_rest'       => true, //Gutenberg compatibility
        //'rewrite'            => array( 'slug' => 'b2inews123' ), //Rewrite slug
        'supports' => array('title', 'editor', 'thumbnail', 'custom-field', 'page-attributes'),
        'menu_icon' => 'dashicons-database-import',
        'menu_position' => 27
		
    ));
    // B2i News Taxonomy
    register_taxonomy('b2i-news-cat', 'b2inews',array(
        'labels' => array(
            'name' => __('News Categories', 'b2itextdomain'),
            'singular_name' => __('News Category', 'b2itextdomain'),
            'add_new_item'          => __( 'Add New b2i News Category', 'b2itextdomain' ),
            'edit_item'             => __( 'Edit b2i News Category', 'b2itextdomain' )
        ),
        'hierarchical' => true,
        'show_admin_column' => true
    ));
}
add_action ('init', 'b2i_custom_posts');

 
/**
 * Activate the plugin.
 */
function pluginprefix_activate() {
    // Trigger our function that registers the custom post type plugin.
    b2i_custom_posts(); 
    // Clear the permalinks after the post type has been registered.
    flush_rewrite_rules(); 
}
register_activation_hook( __FILE__, 'pluginprefix_activate' );

?>