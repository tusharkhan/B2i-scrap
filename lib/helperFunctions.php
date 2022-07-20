<?php
/**
 * created by: tushar Khan
 * email : tushar.khan0122@gmail.com
 * date : 7/1/2022
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// check if post exist in database result array
function filterArrayByKeyValue($array, $key, $searchValue) {
    {
        return count(array_filter($array, function($value) use ($key, $searchValue) {
            return $value[$key] == $searchValue;
        }));
    }
}

function exportData(){
    global $wpdb;
    $sql = "SELECT * FROM wp_posts WHERE post_type = 'post'";
    return $wpdb->get_results($sql);
}

function getAllB2iPosts(){
    global $wpdb;
    $results = [];
    $posts = $wpdb->get_results("SELECT
            post_title, post_name, post_status FROM
               wp_posts
           WHERE post_type = 'post'
          AND post_status = 'publish'");
    foreach($posts as $post){
        $results[] = [
            'post_title' => $post->post_title,
            'post_name'  => $post->post_name,
        ];
    }
    return $results;
}