<?php
   // include_once ('../community-shortcodes-main.php');

    /**
     * Created by PhpStorm.
     * User: Olaf Broms
     * Date: 8/24/2016
     * Time: 1:26 PM
     */
    function render_the_single_news_item($theFeed, $theRss)

    {
        ob_start();
        $thisone = $_SERVER['QUERY_STRING'];
//print_r($thisone);
        $queryInput = print_r($thisone, true);
        $postId = str_replace("id=", "", $queryInput);

        $thePerma = get_site_url();
        $theLink = $thePerma.'/olc-in-the-news/';




        $theStuff = $theRss;


        foreach ($theStuff->channel->item as $article)
        {

            $theSentence = $article->guid;

            $positionOfFirstEqual = strpos($theSentence, '=');
            $theSecondSentence = substr($theSentence, $positionOfFirstEqual+1 );
            $positionOfSecondEqual = strpos($theSecondSentence, '=');
            $theFinalSentence = substr($theSecondSentence, $positionOfSecondEqual+1 );

            if($theFinalSentence == $postId)
            {

                $theDate = $article->pubDate;
                $publicationDate = date("F d, Y", strtotime("$theDate"));
                ?>
                <style>
                    .nav-previous {
                        display: none;
                    }
                </style>
                    <div class="singleNewsContent" style="border-bottom: 0px solid grey; padding-bottom: 5%;">
                    <span class="newsHead"><?php echo $article->title; ?></span><br />
                    <span class="newsMeta"><?php echo $theStuff->channel->title. ' | '. $publicationDate; ?></span>
                    <span class="newsContent" style="margin-top: 5%;">
                        <p>
                            <?php echo $article->contentEncoded;?>
                        </p>
                    </span>
                </div>
                 <div class="col-xs-12 col-sm-12 col-lg-12 center" style="margin-top: 5%;" id="button-div-2">
                <a class="middle main-but4" href="<?php echo $theLink ?>">Back to News</a>
                 </div>
                <?php
            }


        }
        $output = ob_get_clean();
        return $output;

    }