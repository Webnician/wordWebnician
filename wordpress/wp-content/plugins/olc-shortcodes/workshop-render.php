<?php
include_once ('community-shortcodes-main.php');
    include_once('views/survey-view.php');
    include_once('views/journal-view.php');
    include_once ('views/blog-view.php');
    include_once ('views/conference-view.php');
    include_once ('views/headline-news-view.php');
    include_once ('views/olc-news-view.php');
    include_once ('views/single-news-item.php');
    include_once ('views/single-blog-item.php');
    include_once ('views/podcast-view.php');
    include_once ('views/on-demand-webinar-view.php');
    include_once ('views/upcoming-webinars-view.php');
    include_once ('views/institute-schedule.php');
include_once ('views/olc-news-view-2.php');
    include_once ('views/static-upcoming-view.php');
    include_once ('views/static-ondemand-view.php');



    /**
 * Created by PhpStorm.
 * User: Olaf Broms
 * Date: 7/25/2016
 * Time: 1:28 PM
 */







    //this is a newer version
    function render_workshops3($theFeed)
    {

    $theReturn = render_the_institute_schedule($theFeed);
    return $theReturn;

    }





    function render_news($theFeed)
    {
        $theStuff = $theFeed;
        $theReturn = render_the_headline_news($theStuff);
        return $theReturn;

    }

    function render_journal($theFeed)
    {
     $theReturn = render_the_journals($theFeed);
        return $theReturn;
    }

    function render_blog($theRss)
    {
        $theReturn = render_the_blogs( $theRss);
        return $theReturn;
    }

    function render_olc_conferences($theFeed)
    {
       $theReturn = render_the_conferences($theFeed);
        return $theReturn;
    }

    function render_surveys($theFeed)
    {
        $theStuff = $theFeed;

        $theReturn = render_the_surveys($theStuff);
        return $theReturn;

    }

    function render_single_news_item($theFeed, $theRss)
    {

        $theReturn = render_the_single_news_item($theFeed, $theRss);
        return $theReturn;
    }

    function render_single_blog_item($theFeed, $theRss)
    {
        $theReturn = render_the_single_blog_item($theFeed, $theRss);
        return $theReturn;
    }

    function render_upcoming_static_webinars($theFeed)
    {
        $theReturn = render_the_upcoming_static_webinar($theFeed);
        return $theReturn;
    }

    function render_ondemand_static_webinars($theFeed)
    {
        $theReturn = render_the_ondemand_static_webinar($theFeed);
        return $theReturn;
    }

    function render_events($theFeed)
    {
        $theStuff = $theFeed;


        ?>


        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!--Bootstrap Toggle -->
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- bootstrap toggle -->
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


        <div class="eventContent">
        <h2 style="border: 5px ridge orange"><?php echo $theStuff['channel']['title']; ?></h2>
        <a href="<?php echo $theStuff['channel']['link']; ?>">Link</a>
        <h4><?php echo $theStuff['channel']['description']; ?></h4><?php


        foreach ($theStuff['channel']['item'] as $article)
        {
            ?>
            <div style="border-bottom: 2px solid black;">
            <h5><?php echo $article['title']; ?></h5>
            <a href="<?php echo $article['link']; ?>">Link</a>
            <p>
                <span><?php echo $article['pubDate']; ?></span><br />
                <span><?php echo $article['comments']; ?></span><br />

            </p>
            </div><?php
        }

        ?>
        </div>
        <?php
    }

    function render_jobs($theFeed)
    {
        $theStuff = $theFeed;
        ?>
        <div class="jobContent">
        <?php

        foreach ($theFeed['results']['result'] as $job)
        {
            ?><div style="border-bottom: 2px solid black;"><h2 ><?php echo $job['jobtitle']; ?></h2>
            <h3><?php echo $job['company']; ?></h3>
            <h4><?php echo $job['formattedLocation'].', '. $job['country']; ?></h4>
            <h5><?php echo $job['date'].'  '.$job['source']; ?> </h5>
            <p>
                <?php echo $job['snippet']; ?>
                <a href="<?php echo $job['url']; ?>">Link</a>
            </p>
            </div>
            <?php

        }
        ?>
        </div>
        <?php
    }




function render_ondemand_webinars($theFeed)
{
$theReturn = render_the_ondemand_webinars($theFeed);
    return $theReturn;
}


    function render_upcoming_webinars($theFeed)
    {
        //$theStuff = $theFeed;
    $theReturn = render_the_upcoming_webinars($theFeed);
        return $theReturn;
    }

    function render_all_podcasts($theFeed, $theFeed2)
    {

        $theReturn = render_all_the_podcasts($theFeed, $theFeed2);
        return $theReturn;
    }


    function render_olc_news($theRss)
    {

        $theReturn = render_the_olc_news2($theRss);
        return $theReturn;

        //print_r($theStuff);
    }
    function rendering_test($theFeed)
    {
//        return ('
//        <h1>HELLO</h1>
//        ');
        $thevalue = 'HEEYYYAYA!!';
        return $thevalue;
    }