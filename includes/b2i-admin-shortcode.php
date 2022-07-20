<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// FUNCTION FOR IMPORT RSS SHORTCODE
function b2i_news_shortcode() {
    ob_start();

    // FUNCTION FOR IMPORT RSS IN B2INEWS START
    function importItemsFromXMLUrlShortcode() {
        $bId = sanitize_text_field(get_option('b2i_biz_id'));
        $apiId = sanitize_text_field(get_option('b2i_api_key'));
        $gKey = sanitize_text_field(get_option('b2i_post_key'));

        if (!empty($bId) && !empty($apiId) &&!empty($gKey)) {
            //$url = "http://localhost/newsrss.xml";
            $url = "https://www.rss-view.com/rss/newsrss.asp?B=449&L=1&G=65&f=1";
            //$url = "https://www.rss-view.com/rss/newsrss.asp?B=$bId&L=1&G=$gKey&f=1";

            $content = file_get_contents($url);

            global $wpdb;
            try {
                $a = new SimpleXMLElement($content);
                $totalObject = count($a->channel->item);

                // get all publish post
                $allPublishPosts = getAllB2iPosts();
                $totalInsert = 0;

                for($i=0;$i<$totalObject;$i++){
                    $title = strip_tags($a->channel->item[$i]->title);
                    // $description = strip_tags(trim($a->channel->item[$i]->description));
                    $description = trim($a->channel->item[$i]->description);
                    $pubDate = date('Y-m-d H:i:s', strtotime($a->channel->item[$i]->pubDate));
                    $curDate = date('Y-m-d H:i:s');
                    $guid = json_decode(json_encode($a->channel->item[$i]->guid), true)[0];

                    //$postcat = array(1,19);
                    $postcat = get_category_by_slug( 'b2inews' );

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

                            //'post_category'     => $postcat
                            'post_category'     => array( $postcat->term_id )
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
    // FUNCTION FOR IMPORT RSS IN B2INEWS END

    importItemsFromXMLUrlShortcode();
    $myvariable = ob_get_clean();
    return $myvariable;
}
add_shortcode('b2i_press_releases_new', 'b2i_news_shortcode');

?>