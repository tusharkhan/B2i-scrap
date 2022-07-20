<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// ADD MENUS ITEMS
function b2i_admin_menu() {
	add_menu_page(
		 __('B2i Investor tools', 'b2itextdomain'), // page title
		 __('B2i Investor tools', 'b2itextdomain'), // menu title
		 'manage_options', // capability
		 'b2i_news_import', // Main menu slug
		 'b2i_news_import_callback', // Callback function that will render its output
		 //'dashicons-schedule', // dashicons icon that will be displayed in the sidebar
		 plugins_url( 'b2i-import/assets/icon16.png' ), // For image menu icon
		 26 // position of the menu option
	);
	add_submenu_page(
		'b2i_news_import',			// Parent menu slug
		'Welcome',						// Sub page title
		'Welcome',						// Sub menu title
		'manage_options',				// capability
		'b2i_news_import',			// Parent menu slug
		'b2i_news_import_callback'	// Parent menu callback
	);
	add_submenu_page(
		'b2i_news_import', // Parent menu slug
		'Setting', // Sub page title
		'Setting', // Sub manu title
		'manage_options', // capability
		'b2i_news_import_setting', // Sub menu slug
		'b2i_news_import_setting_callback' //Callback function that will render its output
	);
	add_submenu_page(
		'b2i_news_import', // Parent menu slug
		'Documentation', // Sub page title
		'Documentation', // Sub manu title
		'manage_options', // capability
		'b2i_news_import_doc', // Sub menu slug
		'b2i_news_import_doc_callback' //Callback function that will render its output
	);
	add_submenu_page(
		'edit.php?post_type=b2inews', // Parent menu slug
		'Import RSS', // Sub page title
		'Import RSS', // Sub manu title
		'manage_options', // capability
		'b2i_news_import_xml', // Sub menu slug
		'b2i_news_import_xml_callback' //Callback function that will render its output
	);
}
add_action('admin_menu', 'b2i_admin_menu');

?>