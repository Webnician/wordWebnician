<?php
    /**
     * Created by PhpStorm.
     * User: Olaf Broms
     * Date: 8/24/2016
     * Time: 9:33 AM
     */
    function render_the_headline_news($theStuff)
    {



    date_default_timezone_set('America/New_York');
    ob_start();

    //            ?><!--<h2 style="border: 5px ridge orange"><a href="--><?php //echo $theStuff['channel']['link']; ?><!--">--><?php //echo $theStuff['channel']['title']; ?><!--</a></h2>-->
<!---->
<!--            <h4 style="margin-bottom: 8%; ">--><?php //echo $theStuff['channel']['description']; ?><!--</h4>--><?php

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


<div class="newsContent">
    <?php
        foreach ($theStuff['channel']['item'] as $article)
        {

//            $theSentence = $article->description;
//
//            $positionOfFirstEqual = strpos($theSentence, '.');
//            $theSecondSentence = substr($theSentence, $positionOfFirstEqual+1 );
//            $positionOfSecondEqual = strpos($theSecondSentence, '.');
//            $theFinalSentence = substr($theSecondSentence, $positionOfSecondEqual+1 );
//            echo $theSecondSentence;

            $theDate = $article['pubDate'];
            $publicationDate = date("F d, Y", strtotime("$theDate"));
            ?>
            <div style="border-bottom: 0px solid grey; padding-bottom: 5%;">
            <span class="newsHead"><?php echo $article['title']; ?></span><br />
            <span class="newsMeta"><?php echo $theStuff['channel']['title']. ' | '. $publicationDate; ?></span>
            <p>
                <br />
                <?php echo $article['description']; ?><br />
                <a style="" href="<?php echo $article['link']; ?>">Read More ></a>
            </p>
            </div><?php
        }
    ?>
</div>
<?php
    //print_r($theStuff);
    $output = ob_get_clean();
    return $output;

    }