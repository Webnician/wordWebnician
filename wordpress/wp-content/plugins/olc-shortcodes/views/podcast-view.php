<?php
    /**
     * Created by PhpStorm.
     * User: Olaf Broms
     * Date: 8/25/2016
     * Time: 1:41 PM
     */
    function render_all_the_podcasts($theFeed, $theFeed2)
    {
        ob_start();
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
        <?php

        date_default_timezone_set('America/New_York');

        $theStuff = $theFeed;
        $theStuff2 = $theFeed2;


        ?>
        <div class="podcastContent">
            <div class="podcastHeader"><span class="podcastSpan podcastfirst " id="topcast" style="padding-right:1%; border-right: 2px ridge black;">TOPcast </span><span style="padding-left: 1%;" id="ria" class="podcastSpan podcastsecond inactive2"> Research In Action</span></div>

            <div id="theFirstPodcast" class="podcast1 inactive">
                <?php


                    foreach ($theStuff['channel']['item'] as $article)
                    {
                        $theDate = $article['pubDate'];
                        $publicationDate = date("F d, Y", strtotime("$theDate"));
                        ?>
                        <div style="border-bottom: 0px solid grey; padding-bottom: 1%;">
                            <span class="podcastHead"><?php echo $article['title']; ?></span><br />
                            <span class="podcastMeta"><?php echo $theStuff['channel']['title']." | ". $publicationDate; ?></span>
                            <p style="margin-top: 1%;">

                                <?php
                                    // parse the string after the first sentence
                                    $theSentence = $article['description'];
                                    echo $theSentence;

//                                    $positionOfFirstPeriod = strpos($theSentence, '.');
//                                    if ($positionOfFirstPeriod > 0) {
//                                        $theFinalSentence = substr($theSentence, 0, $positionOfFirstPeriod+1);
//                                        $theFinalSentence = substr($theSentence, 0, 100);
//                                        echo $theFinalSentence;
//                                    }
//                                    elseif ($positionOfFirstPeriod >1000000)
//                                    {
//                                        $positionOfFirstPeriod = strpos($theSentence, '.');
//                                        $theSecondSentence = substr($theSentence, $positionOfFirstPeriod+1);
//                                        $positionOfSecondPeriod = strpos($theSecondSentence, '.');
//                                        $theFinalSentence = substr($theSentence, 0,  $positionOfSecondPeriod+1 );
//                                        echo $theFinalSentence;
//                                    }
                                    //get the article attributes
                                    $theUrl = '';
                                    foreach ($article['enclosure'] as $embedInfo)
                                    {
                                        $theUrl = $embedInfo['url'];

                                    }

                                ?>
                                <?php //echo $article['comments']; ?>
                                <br /><span style="margin-top: 5%;"><a href="<?php echo $theUrl ?>">Listen to Podcast ></a></span>
                                <!--                <a style="text-decoration: none; font-weight: bold;" href="--><?php //echo $article['link']; ?><!--">... Read More ></a>-->
                            </p>
                        </div> <?php
                    }

                ?>
            </div>
            <div id="theSecondPodcast" class="podcast2 ">
                <?php


                    foreach ($theStuff2['channel']['item'] as $article2)
                    {
                        $theDate = $article2['pubDate'];
                        $publicationDate = date("F d, Y", strtotime("$theDate"));
                        ?>
                        <div style="border-bottom: 0px solid grey; padding-bottom: 1%;">
                        <span  class="podcastHead"><?php echo $article2['title']; ?></span><br />
                        <span class="podcastMeta"><?php echo $theStuff2['channel']['title']." | ". $publicationDate; ?></span>
                        <p style="margin-top: 1%;">
                            <?php
                                //THis parses down the description and gets the first sentence
                                $theSentence = $article2['description'];
                                $positionOfFirstPeriod = strpos($theSentence, '.');
                                $theFinalSentence = substr($theSentence, 0, $positionOfFirstPeriod);
                                echo $theFinalSentence;

                                //get the article attributes
                                $theUrl2 = '';
                                foreach ($article2['enclosure'] as $embedInfo)
                                {
                                    $theUrl2 = $embedInfo['url'];

                                }
                            ?>
                            <?php// echo $article2['comments']; ?>
                            <br /><span style="margin-top: 5%;"><a href="<?php echo $theUrl2 ?>">Listen to Podcast ></a></span>
                            <!--                <a style="text-decoration: none; font-weight: bold;" href="--><?php //echo $article2['link']; ?><!--">... Read More ></a>-->
                        </p>

                        </div><?php
                    }
                ?></div></div><?php
        $output = ob_get_clean();
        return $output;
    }

