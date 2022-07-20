<?php
/*
*	Plugin Name: B2i Press Release / FAQ / Blog Import
*	Description: Press Release / FAQ / Blog, Press Release / FAQ / Blog, Press Release / FAQ / Blog, Press Release / FAQ / Blog .
*	Plugin URL: https://masleap.io/b2i
*	Author: MasLeap
*	Author URI: https://masleap.io/ >
*	Version: 1.0
*	Text Domain: b2itextdomain
*/
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// INCLUDE FILES FORM INCLUDES DIR
foreach (glob(plugin_dir_path(__FILE__). "includes\*.php") as $filename) {
    include($filename);
}
include(plugin_dir_path(__FILE__) . 'lib/helperFunctions.php');

// MAIN/WELCOME PAGE CALLBACK FUNCTION
function b2i_news_import_callback() {
?>
    <h1><?php esc_html_e('Welcome to B2i Investor Tool Home Page.', 'b2itextdomain'); ?></h1>
    <?php include "partials/registration.php"; ?><br>
    <!-- <img src="<?php // echo site_url(); ?>/wp-content/plugins/b2i-import/assets/icon-128x128.png"> -->
    <p>B2i has launched this service to offer equity, disclosure, and corporate actions data within the corporate website. Our plugin allows a ShortCode to place data on your website offering full control of your investor relations website. We offer a single plugin that includes many data modules (ShortCode controlled) to display the different types of content on your corporate website allowing for fast integrations, custom designs, and CSS control.</p>
    <p>Our most popular tools include; SEC filings, Stock detail & charts, press releases, and an email sign-up form with automated email distribution of new content in real-time. Each module offers deep feature sets and design options.</p>
<?php
//$url = site_url( '/', 'http' );
//echo $url;
}
// SETTING PAGE CALLBACK FUNCTION
function b2i_news_import_setting_callback() {
?>
    <h1><?php esc_html_e('B2i Options Setting', 'b2itextdomain'); ?></h1>
    <form method="POST" action="options.php">
    <?php
        settings_fields('b2i_news_import');
        do_settings_sections('b2i_news_import');
        submit_button();
    ?>
    </form>
<?php
}
// DOCUMENTATION PAGE CALLBACK FUNCTION
function b2i_news_import_doc_callback() {
?>
    <h1><?php esc_html_e('Welcome to my documentation submenu page.', 'b2itextdomain'); ?> </h1>
    <?php include "partials/instructions.php"; ?>
<?php
}
// IMPOST RSS PAGE CALLBACK FUNCTION
function b2i_news_import_xml_callback() {
?>
    <div class="wrap">
    <h1 class="wp-heading-inline"><?php esc_html_e('Welcome to Import RSS Page.', 'b2itextdomain'); ?> </h1>
    <p></p>
    <form method="post">
        <input class="button button-primary" type="submit" name="insert-xml-data" value="Run Importer">
    </form>
    <p></p>
<?php
    if (isset($_POST['insert-xml-data'])) {
        // From includes/b2i.admin.functions.php
        importItemsFromXMLUrl();
    }
    ?>
    </div>
    <?php
}
// AUTOMATIC CREATE CATEGOTRY UNDER POST 01
function insert_b2inews_category() {
    if ( !get_cat_ID('B2I News') ) {
	    wp_insert_term( 'B2I News', 'category',	array('description' => 'Category for b2i news.', 'slug' => 'b2inews') );
    }
}
add_action( 'plugins_loaded', 'insert_b2inews_category' );

// OR

// AUTOMATIC CREATE CATEGOTRY UNDER POST 02
// function insert_b2inews_category () {
//     if (file_exists (ABSPATH.'/wp-admin/includes/taxonomy.php')) {
//         require_once (ABSPATH.'/wp-admin/includes/taxonomy.php');
//         if ( ! get_cat_ID( 'B2I News' ) ) {
//             wp_create_category( 'B2I News' );
//         }
//     }
// }
// add_action ( 'plugins_loaded', 'insert_b2inews_category' );

// OR

// AUTOMATIC CREATE CATEGOTRY UNDER POST 03
// function insert_b2inews_category() {
//     if( file_exists( ABSPATH . '/wp-admin/includes/taxonomy.php' ) ) :
//         require_once( ABSPATH . '/wp-admin/includes/taxonomy.php' );
//             if( ! category_exists( 'B2I News' ) ) :
//                 wp_create_category( 'B2I News' );
//             endif;// Category exists
//     endif;// File exists
// }
// add_action( 'plugins_loaded', 'insert_b2inews_category' );

?>