<?php
/*
Plugin Name: OLC Community Portal Shortcodes
Version: 1
Plugin URI:
Description: Plugin to import shortcodes
Author: Online Learning Consortium
*/

include_once ('workshop-render.php');
include_once ('olc-curl.php');
    include_once ('olc-rss-fetch.php');
include_once ('single-offering.php');
include_once ('menu/olc-shortcodes-menu-page.php');
//    include_once ('views/survey-view.php');
//    include_once ('views/journal-view.php');





    add_action( 'admin_menu', 'shortcodes_plugin' );

    add_action( 'admin_init', 'register_mysettings' );

    function register_mysettings() { // whitelist options
        register_setting( 'myoption-group', 'on_or_off' );
        register_setting( 'myoption-group', 'some_other_option' );
        register_setting( 'myoption-group', 'option_etc' );
    }

    // add_menu_page( $page_title, $menu_title, $capability, $menu_slug );
    function shortcodes_plugin()
    {
        $page_title = 'OLC Shortcodes';
        $menu_title = 'OLC Shortcodes';
        $capability = 'manage_options';
        $menu_slug = 'olc-shortcodes';
        $function = 'olc_shortcode_plugin_options';
        $icon_url = '';
        $position = 21;
        add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );

    }



    function olc_shortcode_plugin_options() {
        if ( !current_user_can( 'manage_options' ) )  {
            wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
        }
        olc_shortcodes_menu_options_render();
//        echo '<div class="wrap">';
//        echo '<p>Here is where the form would go if I actually had options.</p>';
//        echo '</div>';
    }





    function show_workshop_list3(){

        $theToken2 = Anjal_Token;
        $theUrl = "http://"._BASE_URL."/products";
        $urlModifier = '';
        if($urlModifier != '')
        {
            $theUrl = "$theUrl+$urlModifier";
        }

        $theFeedStd = olc_curl_request($theUrl, $theToken2);

        $theReturn = render_workshops3($theFeedStd);
        return $theReturn;
    }
    add_shortcode('show_workshops3', 'show_workshop_list3');



    function show_news_list(){


        $theUrl = _BASE_URL_CORE."v1/news";
        $theToken3 = _Core_Token;

        $urlModifier = '';
        if($urlModifier != '')
        {
            $theUrl = "$theUrl+$urlModifier";
        }

        $theFeedStd = olc_core_curl_request($theUrl, $theToken3);

        $theReturn = render_news($theFeedStd);
        return $theReturn;
    }
    add_shortcode('show_news_list', 'show_news_list');


    function show_journal_list(){


        $theUrl = _BASE_URL_CORE."v1/journal";
        $theToken3 = _Core_Token;

        $urlModifier = '';
        if($urlModifier != '')
        {
            $theUrl = "$theUrl+$urlModifier";
        }

        $theFeedStd = olc_core_curl_request($theUrl, $theToken3);
        $theFeedStd = getFeed($theUrl);

        $theReturn = render_journal($theFeedStd);
        return $theReturn;
    }
    add_shortcode('show_journal_list', 'show_journal_list');


    function show_blog_list(){


    $theUrl = _BASE_URL_CORE."v1/blog";
        $theUrlRss = _BASE_URL_CORE."v1/blog/rss";
       // $theUrlRss = "http://onlinelearningconsortium.org/read/blog/feed/";
    $theToken3 = _Core_Token;

    $urlModifier = '';
    if($urlModifier != '')
    {
        $theUrl = "$theUrl+$urlModifier";
    }

    $theFeedStd = olc_core_curl_request($theUrl, $theToken3);
        $theRss = getFeed($theUrlRss);

    $theReturn = render_blog($theRss);
        return $theReturn;
}
    add_shortcode('show_blog_list', 'show_blog_list');




    function show_survey_list(){


        $theUrl = _BASE_URL_CORE."v1/surveys";
        $theToken3 = _Core_Token;

        $urlModifier = '';
        if($urlModifier != '')
        {
            $theUrl = "$theUrl+$urlModifier";
        }

        $theFeedStd = olc_core_curl_request($theUrl, $theToken3);

       $theReturn = render_the_surveys($theFeedStd);
        return $theReturn;
    }
    add_shortcode('show_survey_list', 'show_survey_list');

    function show_event_list(){


        $theUrl = _BASE_URL_CORE."v1/events";
        $theToken3 = _Core_Token;

        $urlModifier = '';
        if($urlModifier != '')
        {
            $theUrl = "$theUrl+$urlModifier";
        }

        $theFeedStd = olc_core_curl_request($theUrl, $theToken3);

        render_events($theFeedStd);
    }
    add_shortcode('show_event_list', 'show_event_list');

    function show_jobs_list(){


        $theUrl = _BASE_URL_CORE."v1/jobs";
        $theToken3 = _Core_Token;

        $urlModifier = '';
        if($urlModifier != '')
        {
            $theUrl = "$theUrl+$urlModifier";
        }

        $theFeedStd = olc_core_curl_request($theUrl, $theToken3);

        render_jobs($theFeedStd);
    }
    add_shortcode('show_jobs_list', 'show_jobs_list');


    function show_all_podcast_list(){


        $theUrl = _BASE_URL_CORE."v1/podcasts/osu";
        $theToken3 = _Core_Token;
        $theUrl2 = _BASE_URL_CORE."v1/podcasts/ucf";


        $urlModifier = '';
        if($urlModifier != '')
        {
            $theUrl = "$theUrl+$urlModifier";
        }

        $theFeedStd = olc_core_curl_request($theUrl, $theToken3);
        $theFeedStd2 = olc_core_curl_request($theUrl2, $theToken3);
        //$theFeedStd3 = array_merge($theFeedStd, $theFeedStd2);
        //print_r($theFeedStd3);

        $theReturn = render_all_podcasts($theFeedStd, $theFeedStd2);
        return $theReturn;
    }
    add_shortcode('show_all_podcast_list', 'show_all_podcast_list');

    function show_ondemand_webinar_list(){


        $theUrl = _BASE_URL_CORE."v1/webinars";
        $theToken3 = _Core_Token;

        $urlModifier = '';
        if($urlModifier != '')
        {
            $theUrl = "$theUrl+$urlModifier";
        }

        $theFeedStd = olc_core_curl_request($theUrl, $theToken3);

        $theRetun = render_ondemand_webinars($theFeedStd);
        return $theRetun;
    }
    add_shortcode('show_ondemand_webinar_list', 'show_ondemand_webinar_list');

    function show_upcoming_webinar_list(){


        $theUrl = _BASE_URL_CORE."v1/webinars";
        $theToken3 = _Core_Token;

        $urlModifier = '';
        if($urlModifier != '')
        {
            $theUrl = "$theUrl+$urlModifier";
        }

        $theFeedStd = olc_core_curl_request($theUrl, $theToken3);

        $theReturn = render_upcoming_webinars($theFeedStd);
        return $theReturn;
    }
    add_shortcode('show_upcoming_webinar_list', 'show_upcoming_webinar_list');

//    function show_olc_news_list(){
//
//
//        $theUrl = _BASE_URL_CORE."v1/news/olc";
//        $theToken3 = _Core_Token;
//
//        $urlModifier = '';
//        if($urlModifier != '')
//        {
//            $theUrl = "$theUrl+$urlModifier";
//        }
//
//        $theFeedStd = olc_core_curl_request($theUrl, $theToken3);
//
//        $theReturn =  render_olc_news($theFeedStd);
//        return $theReturn;
//    }
//    add_shortcode('show_olc_news_list', 'show_olc_news_list');

    function show_olc_news_list_rss(){


        $theUrl = _BASE_URL_CORE."v1/news/olc/rss";
       // $theUrlRss = _BASE_URL_CORE."v1/blog/rss";
        $theToken3 = _Core_Token;

        $urlModifier = '';
        if($urlModifier != '')
        {
            $theUrl = "$theUrl+$urlModifier";
        }

        //$theFeedStd = olc_core_curl_request($theUrl, $theToken3);
        $theRss = getFeed($theUrl);

        $theReturn = render_olc_news($theRss);
        return $theReturn;
    }
    add_shortcode('show_olc_news_list_rss', 'show_olc_news_list_rss');


    function show_olc_conference_list()
    {

        $theUrl = _BASE_URL_CORE."v1/conferences";
        $theToken3 = _Core_Token;

        $urlModifier = '';
        if($urlModifier != '')
        {
            $theUrl = "$theUrl+$urlModifier";
        }

        $theFeedStd = olc_core_curl_request($theUrl, $theToken3);

        $theReturn = render_olc_conferences($theFeedStd);
        return $theReturn;
    }
    add_shortcode("show_olc_conference_list", "show_olc_conference_list");

    //this will run on load of institute offerings and create custom posts
    function check_posts($currentWorkshop)
    {
        $year = date("Y");

       $id = $year.$currentWorkshop['id'];
        if ( FALSE === get_post_status( $id ) ) {
            echo (' '.$id.' not here ');

            $defaults = array(
                //'ID' => $id,
                'post_author' => 'auto',
                'post_content' => $currentWorkshop['description'],
                'post_content_filtered' => '',
                'post_title' => $currentWorkshop['title'],
                'post_excerpt' => '',
                'post_status' => 'publish',
                'post_type' => 'institute',
                'comment_status' => 'closed',
                'ping_status' => '',
                'post_password' => '',
                'to_ping' => '',
                'pinged' => '',
                'post_parent' => 0,
                'menu_order' => 0,
                'guid' => '',
                'import_id' => $id,
                'context' => '',
            );

            $postarr = wp_parse_args($defaults);
            $ret = '-1';
           $ret = wp_insert_post( $postarr );
            echo ($ret. ' created');
        }
        else
        {
            echo(" this one is here ");
        }

    }



    function custom_code_for_api_ref_inst_offerings()
    {

        $theToken2 = Anjal_Token;
        $theUrl = "http://"._BASE_URL."/products";
        $urlModifier = '';
        if($urlModifier != '')
        {
            $theUrl = "$theUrl+$urlModifier";
        }

        $theFeedStd = olc_curl_request($theUrl, $theToken2);


        $theReturn = render_single_offering($theFeedStd);
        return $theReturn;
    }
    add_shortcode('custom_code_for_api_ref_inst_offerings', 'custom_code_for_api_ref_inst_offerings');
    //add_action('headway_before_block_bx457b486e163740', 'custom_code_for_api_ref_inst_offerings');

    function custom_code_for_api_ref_olc_news_items()
    {

        $theUrl = _BASE_URL_CORE."v1/news/olc/rss";
        // $theUrlRss = _BASE_URL_CORE."v1/blog/rss";
        $theToken3 = _Core_Token;

        $urlModifier = '';
        if($urlModifier != '')
        {
            $theUrl = "$theUrl+$urlModifier";
        }

        $theFeedStd = olc_core_curl_request($theUrl, $theToken3);
        $theRss = getFeed($theUrl);

        $theReturn = render_single_news_item($theFeedStd, $theRss);
        return $theReturn;
    }
    add_shortcode('custom_code_for_api_ref_olc_news_items', 'custom_code_for_api_ref_olc_news_items');

    function custom_code_for_api_ref_olc_blog_items()
    {

        $theUrl = _BASE_URL_CORE."v1/blog";
        $theUrlRss = _BASE_URL_CORE."v1/blog/rss";
        // $theUrlRss = "http://onlinelearningconsortium.org/read/blog/feed/";
        $theToken3 = _Core_Token;

        $urlModifier = '';
        if($urlModifier != '')
        {
            $theUrl = "$theUrl+$urlModifier";
        }

        $theFeedStd = olc_core_curl_request($theUrl, $theToken3);
        $theRss = getFeed($theUrlRss);

       $theReturn = render_single_blog_item($theFeedStd, $theRss);
        return $theReturn;
    }
    add_shortcode('custom_code_for_api_ref_olc_blog_items', 'custom_code_for_api_ref_olc_blog_items');

    function check_inst_offering_type($theType)
    {
        $theReturn = '';
        if($theType == 'self_paced_workshop')
        {
            $theReturn = 'Self-Paced Workshop';
        }
        if($theType == 'workshop')
        {
            $theReturn = 'Workshop';
        }
        if($theType == 'otc')
        {
            $theReturn = 'OTC';
        }
        if($theType == 'advanced_otc')
        {
            $theReturn = 'Advanced OTC';
        }
        if($theType == 'mastery_series')
        {
            $theReturn = 'Mastery Series';
        }
        return $theReturn;
    }
    function theTest()
    {
        $theFeed = 'HEEEYYAAA!!!!';
        return rendering_test($theFeed);
    }
    add_shortcode('theTest', 'theTest');

    function show_static_upcoming_webinar_list()
    {

        $theUrl = _BASE_URL_CORE."v1/webinars/static";
        $theToken3 = _Core_Token;

        $urlModifier = '';
        if($urlModifier != '')
        {
            $theUrl = "$theUrl+$urlModifier";
        }

        $theFeedStd = olc_core_curl_request($theUrl, $theToken3);

        $theReturn = render_upcoming_static_webinars($theFeedStd);
        return $theReturn;
    }
    add_shortcode('show_static_upcoming_webinar_list', 'show_static_upcoming_webinar_list');

    function show_static_ondemand_webinar_list()
    {

        $theUrl = _BASE_URL_CORE."v1/webinars/static";
        $theToken3 = _Core_Token;

        $urlModifier = '';
        if($urlModifier != '')
        {
            $theUrl = "$theUrl+$urlModifier";
        }

        $theFeedStd = olc_core_curl_request($theUrl, $theToken3);

        $theReturn = render_ondemand_static_webinars($theFeedStd);
        return $theReturn;
    }
    add_shortcode('show_static_ondemand_webinar_list', 'show_static_ondemand_webinar_list');

    function get_user_name()
    {
        $the_user = wp_get_current_user();
        $userName = get_user_name($the_user);
    }