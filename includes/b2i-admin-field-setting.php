<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// ADD CUSTOM FIELD FOR SETTING PAGE
function b2i_settings_init() {
	add_settings_section(
		 'b2i_page_setting_section', // Section ID
		 __('Custom settings', 'b2itextdomain'), // Section Title
		 'b2i_setting_section_callback_function', // Callback
		 'b2i_news_import' // What Page?  This makes the section show up on the sample page
	);

	add_settings_field(
		'b2i_biz_id', // Option ID
		__('Business ID', 'b2itextdomain'), // Label
		'b2i_business_id', // Callback  >> important - This is where the args go!
		'b2i_news_import', // Page it will be displayed (b2i_news_import) slug
		'b2i_page_setting_section' // Name of our section (Section ID)
	);
	register_setting('b2i_news_import', 'b2i_biz_id');

   add_settings_field(
		'b2i_api_key', // Option ID
		__('API Key', 'b2itextdomain'), // Label
		'b2i_api_info', // Callback  >> important - This is where the args go!
		'b2i_news_import', // Page it will be displayed (b2i_news_import) slug
		'b2i_page_setting_section' // Name of our section (Section ID)
	);
	register_setting('b2i_news_import', 'b2i_api_key');

   add_settings_field(
		'b2i_post_key', // Option ID
		__('Post Key', 'b2itextdomain'), // Label
		'b2i_post_info', // Callback  >> important - This is where the args go!
		'b2i_news_import', // Page it will be displayed (b2i_news_import) slug
		'b2i_page_setting_section' // Name of our section (Section ID)
	);
	register_setting('b2i_news_import', 'b2i_post_key');

   add_settings_field(
		'b2i_postlist_ip', // Option ID
		__('Post IP List', 'b2itextdomain'), // Label
		'b2i_postlist_ip_info', // Callback  >> important - This is where the args go!
		'b2i_news_import', // Page it will be displayed (b2i_news_import) slug
		'b2i_page_setting_section' // Name of our section (Section ID)
	);
	register_setting('b2i_news_import', 'b2i_postlist_ip');

   add_settings_field(
		'b2i_donotuse_iplist_opt', // Option ID
		__('Do Not use IP List', 'b2itextdomain'), // Label
		'b2i_donotuse_ip_info', // Callback  >> important - This is where the args go!
		'b2i_news_import', // Page it will be displayed (b2i_news_import) slug
		'b2i_page_setting_section' // Name of our section (Section ID)
	);
	register_setting('b2i_news_import', 'b2i_donotuse_iplist_opt');

   add_settings_field(
		'b2i_callhome_opt', // Option ID
		__('Use "Call Home" verify', 'b2itextdomain'), // Label
		'b2i_calhome_info', // Callback  >> important - This is where the args go!
		'b2i_news_import', // Page it will be displayed (b2i_news_import) slug
		'b2i_page_setting_section' // Name of our section (Section ID)
	);
	register_setting('b2i_news_import', 'b2i_callhome_opt');

}
add_action('admin_init', 'b2i_settings_init');

// ADD CALLBACK FUNCTION SETTING SECTION
function b2i_setting_section_callback_function() {
	//echo 'test';
}
// ADD CALLBACK FUNCTION SETTING FIELDS
function b2i_business_id() {
?>
	<input type="text" class="regular-text" id="b2i_biz_id" name="b2i_biz_id" value="<?php echo sanitize_text_field(get_option('b2i_biz_id') ); ?>">
	<p class="description" id="description1">Please Input The Business ID.</p>
<?php
}
function b2i_api_info() {
?>
	<input type="text" class="regular-text" id="b2i_api_key" name="b2i_api_key" value="<?php echo sanitize_text_field(get_option('b2i_api_key')); ?>">
	<p class="description" id="description1">Please Input The API Key.</p>
<?php
}
function b2i_post_info() {
?>
	<input type="text" class="regular-text" id="b2i_post_key" name="b2i_post_key" value="<?php echo sanitize_text_field(get_option('b2i_post_key')); ?>">
	<p class="description" id="description1">Please Input The POST Key.</p>
<?php
}
function b2i_postlist_ip_info() {
?>
	<input type="text" class="regular-text" id="b2i_postlist_ip" name="b2i_postlist_ip" value="<?php echo sanitize_text_field(get_option('b2i_postlist_ip')); ?>">
	<p class="description" id="description1">Please Input The IP Lists.</p>
<?php
}
function b2i_donotuse_ip_info() {
	$options = get_option('b2i_donotuse_iplist_opt');
	$html = '<input type="checkbox" id="b2i_donotuse_iplist_opt" name="b2i_donotuse_iplist_opt" value="1"' . checked(1, $options, false) . '/>';
	$html .= '<label for="checkbox_example">Disables check against post IP list - when behind proxy type hosting and cannot validate against B2i posting IP.</label>';
	echo $html;
}
function b2i_calhome_info() {
	$options = get_option('b2i_callhome_opt');
	$html = '<input type="checkbox" id="b2i_callhome_opt" name="b2i_callhome_opt" value="1"' . checked(1, $options, false) . '/>';
	$html .= '<label for="checkbox_example">Enables ItemKey validate against B2i URL..</label>';
	echo $html;
}

?>