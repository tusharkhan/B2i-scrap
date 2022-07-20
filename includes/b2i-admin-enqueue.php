<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// ENQUEUE FOR FRONT
function b2i_enqueue_user() {
   wp_enqueue_style('b2i-user', plugin_dir_url( __DIR__ ).'css/b2i-import-style.css', array(), '1.0', 'all' );
   wp_enqueue_style('b2i-user');
}
add_action('wp_enqueue_scripts', 'b2i_enqueue_user');

// ENQUEUE FOR ADMIN
function b2i_enqueue_admin() {
   wp_enqueue_style('b2i-admin', plugin_dir_url( __DIR__ ).'css/b2i-import-style-admin.css', array(), '1.0', 'all' );
   wp_enqueue_style('b2i-admin');
}
add_action('admin_enqueue_scripts', 'b2i_enqueue_admin');

?>