<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// FUNCTION FOR IMPORT RSS START
function importItemsFromXMLUrl() {
    $bId = sanitize_text_field(get_option('b2i_biz_id'));
    $apiId = sanitize_text_field(get_option('b2i_api_key'));
    $gKey = sanitize_text_field(get_option('b2i_post_key'));

    if (!empty($bId) && !empty($apiId) &&!empty($gKey)) {

        //$url = "http://localhost/newsrss.xml";
        $url = "https://www.rss-view.com/rss/newsrss.asp?B=449&L=1&G=65&f=1";
        //$url = "https://www.rss-view.com/rss/newsrss.asp?B=$bId&L=1&G=$gKey&f=1";

        $content = file_get_contents($url);

        //global $wpdb;
        try {
            $a = new SimpleXMLElement($content);
            $totalObject = count($a->channel->item);

            // get all publish post
            $allPublishPosts = getAllB2iPosts();
            $totalInsert = 0;

            for($i=0;$i<$totalObject;$i++){
                $title = strip_tags($a->channel->item[$i]->title);
                $category = strip_tags($a->channel->item[$i]->category);

                $categoryArray = explode(",", $category);



                $description = trim($a->channel->item[$i]->description);
                $pubDate = date('Y-m-d H:i:s', strtotime($a->channel->item[$i]->pubDate));
                $curDate = date('Y-m-d H:i:s');
                $guid = json_decode(json_encode($a->channel->item[$i]->guid), true)[0];

                //$postcat = array(1,19);
                $postcat = checkAndInsertCategory($categoryArray);

                $strReplaceFrm = ['https://b2i.irpass.com/', 'irpass.asp?', '=', '&', '$', '--'];
                $strReplaceTo = ['', '', '', '', '', '-'];
                $post_name_slug = strtolower(str_replace($strReplaceFrm, $strReplaceTo, $guid));

                $checkIfExist = filterArrayByKeyValue($allPublishPosts, 'post_name', $post_name_slug);

                // if post name did not match
                // then insert new post
                if( $checkIfExist === 0 ) {
                    wp_insert_post( array(
                        'post_author'       => 1,
                        'post_date'         => $pubDate,
                        'post_date_gmt'     => $pubDate,
                        'post_content'      => $description,
                        'post_title'        => $title,
                        'post_excerpt'      => '',
                        'post_status'       => 'publish',
                        'post_name'         => $post_name_slug,
                        'post_modified'     => $curDate,
                        'post_modified_gmt' => $curDate,
                        'post_parent'       => 0,
                        'guid'              => $guid,
                        'post_type'         => 'post',

                        'post_category'     => $postcat
                    ) );
                    $totalInsert++;
                    echo '<span style="color: blue;">Import Post Successfully:</span> <span style="color: green;">'.$title.'.</span> / <span style="color: red;">'.date('F d, Y g:i a', strtotime($pubDate)).'</span><br />';
                }
            }
            echo '<h2 style="margin-top:10px; color:#006799">Total ' . $totalInsert . ' Post Inserted From '. $totalObject .'.</h2>';
        }
        catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    } else {
        echo '<h2 style="margin-top:10px; color:#EE0000">Please go to "B2i investor tools > Settings" and Fill all Required Fields.</h2>';
    }
}

function checkAndInsertCategory($categoryNames) {
    $ids = array();
    foreach ($categoryNames as $categoryName) {
        $category = get_cat_ID( $categoryName );
        if( empty($category) ) {
            $ids[] = wp_create_category( $categoryName );
        } else {
            $ids[] = $category;
        }
    }

    return $ids;
}

// FUNCTION FOR IMPORT RSS END
?>