<?php

    //include_once ('../workshop-render.php');
    /**
     * Created by PhpStorm.
     * User: Olaf Broms
     * Date: 8/24/2016
     * Time: 9:45 AM
     */

    function render_the_olc_news($theRss)
    {
        ob_start();
            $theStuff = $theRss;
        date_default_timezone_set('America/New_York');



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

        <div class="olcNewsContent">
            <?php


                foreach ($theStuff->channel->item as $article)
                {

                    $theSecondSentence = '';
                    $theFinalSentence = '';
                    //this adjusts the decription
                    $theSentence2 = $article->description;
                    $theLoopCount = 0;
                    $final = 0;
                    $theOffset = 0;

                    $positionOfFirstPeriod = strpos($theSentence2, '.');
                    $checkForTitles = substr($theSentence2, 0, $positionOfFirstPeriod + 1);
                    $testFunction = getPeriodPrecedingCharacters($checkForTitles);



                    do {

                        if ($testFunction != 'true') {
                            $theFinalSentence = substr($theSentence2, 0, $positionOfFirstPeriod + 1);
                            $final = 1;
                        }

                        if ($testFunction == 'true') {
                            //get everything after the first period when failing the test
                            $theSecondSentence2 = substr($theSentence2, $positionOfFirstPeriod + 1); //echo $theSecondSentence2;
                            //find next period
                            $theOffset += strpos($theSecondSentence2, '.');

                            $checkForTitles = substr($theSecondSentence2, $positionOfFirstPeriod + 1, $theOffset + 1);
                            $positionOfFirstPeriod = $theOffset;
                            // echo $checkForTitles;
                            $testFunction = getPeriodPrecedingCharacters($checkForTitles);
                            // echo $testFunction;
                            $theFinalSentence = substr($theSentence2, 0, $theOffset + $positionOfFirstPeriod + 2);
                            $theLoopCount++;

                        }

                    }
                    while($final = 0);
                    //echo $theFinalSentence;

                    //getPeriodPrecedingCharacters();
                    $theDate = $article->pubDate;
                    $publicationDate = date('F d, Y', strtotime("$theDate"));
                    ?>
                    <div class='singleOlcNewsArticle' style='border-bottom: 0px solid grey; '>
                    <span class='olcNewsHead'><?php echo $article->title; ?></span><br />
                    <span class='olcNewsMeta'><?php echo $theStuff->channel->title. ' | '. $publicationDate; ?></span>
                    <span class='olcNewsContentStuff'>
<!--        <p>-->

            <?php echo $article->description;

                //This block will pull the post id from the guid
                $theSentence = $article->guid;

                $positionOfFirstEqual = strpos($theSentence, '=');
                $theSecondSentence = substr($theSentence, $positionOfFirstEqual+1 );
                $positionOfSecondEqual = strpos($theSecondSentence, '=');
                $theFinalSentence = substr($theSecondSentence, $positionOfSecondEqual+1 );



            $theUrl = get_site_url();
                //$theOfferingId = $article->guid;
                $theNewestUrl2 = $theUrl.'/olc-news/?id='.$theFinalSentence;

            //echo $article->contentEncoded;
            ?>
            <a class='' href='<?php echo $theNewestUrl2;  ?>'>Read More ></a>
<!--        </p>-->
            </span>
                    </div><?php
                }
                ?>
        </div>
        <?php
        $output = ob_get_clean();
        return $output;
    }
