<?php
    /**
     * Created by PhpStorm.
     * User: Olaf Broms
     * Date: 8/17/2016
     * Time: 5:04 PM
     */
    function render_the_journals($theStuff)
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

<!--    <div class="journalContent"><a href="--><?php //echo $theStuff['channel']['link']; ?><!--"><h2 class="center">--><?php //echo $theStuff['channel']['title']; ?><!--</h2></a>-->
<!--<h4 >--><?php //echo $theStuff['channel']['description']; ?><!--</h4>-->
<!--        <h5 class="center">--><?php //echo $theStuff['channel']['managingEditor']?><!--</h5>-->
        <?php


    foreach ($theStuff->channel->item as $article)
    {
        $theDate = $article->pubDate;

        //get the post id to hack together the download article link
        $theguid = $article->guid;
        $thePostStarting = strpos($theguid, 'p=');
        $thePostID = substr($theguid, $thePostStarting+2);

        $publicationDate = date("F d, Y", strtotime("$theDate"));
        ?>
        <div class="singleJournal">
            <span class="journalTitle">
                <?php echo $article->title; ?>
            </span><br />
             <span class="journalMeta"><?php echo $publicationDate.' | '.$theStuff->channel->title ?></span>
            <div class="journalBody">
            <p style="margin-top:-2%;">

                 <?php echo $article->abstract; ?><a href="<?php echo _Main_WP_URL._DOWNLOAD_URL.'?post_id='.$thePostID; ?>">Download PDF ></a>
                <br />
            </p>
            </div>
        </div>
        <?php
    }
?>
    </div>
       <?php
        $output = ob_get_clean();
        return $output;
    }