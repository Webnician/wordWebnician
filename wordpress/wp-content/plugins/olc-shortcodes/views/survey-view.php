<?php
    /**
     * Created by PhpStorm.
     * User: Olaf Broms
     * Date: 8/17/2016
     * Time: 4:17 PM
     */
    function render_the_surveys($theStuff)
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


    <div class="surveyContent">
        <div class="surveyHeader">
        <h2 class="center" ><?php //echo $theStuff['channel']['title'].' Surveys' ?></h2>
        <h4 class="center"><?php //echo $theStuff['channel']['description']; ?></h4>
        </div>
                <?php
    foreach ($theStuff['channel']['item'] as $article)
    {

        //get the post id to hack together the download article link
        $theguid = $article['guid'];
        $thePostStarting = strpos($theguid, 'p=');
        $thePostID = substr($theguid, $thePostStarting+2);

        //this adjusts the decription
        $theSentence2 = $article['description'];
        $theLoopCount = 0;
        $final = 0;
        $theOffset = 0;

        $positionOfFirstPeriod = strpos($theSentence2, '.');
        $theSecondSentence = substr($theSentence2, 0, $positionOfFirstPeriod+1 );

        $theDate = $article['pubDate'];
        $publicationDate = date("F d, Y", strtotime("$theDate"));
        ?>
        <div class="singleSurvey">
        <span class="surveyTitle" >
            <?php echo $article['title']; ?>
        </span>

        <div class="surveyBody">
            <span class="surveyMeta"><?php echo $theStuff['channel']['title'].' | '.$publicationDate; ?></span>
            <span><?php echo $article['description']; ?> <a href="<?php echo _Main_WP_URL._DOWNLOAD_URL.'?post_id='.$thePostID; ?>">Download Survey ></a></span>

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