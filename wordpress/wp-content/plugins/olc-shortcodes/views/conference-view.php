<?php
    /**
     * Created by PhpStorm.
     * User: Olaf Broms
     * Date: 8/23/2016
     * Time: 4:58 PM
     */
    function render_the_conferences($theFeed)
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

    foreach ($theFeed['nodes'] as $sessionMeta)
    {
        foreach ($sessionMeta as $session)
        {
            ?>
            <div class="confHeader">
            <span class="center confHead"><?php echo $session['title']; ?></span><br />
<!--            <span class="confMeta">--><?php //echo $session['day']. " | ". $session['room']. " | ". $session['speaker'] ?><!--</span><br/>-->
<!--                <span class="confTrack">--><?php //echo $session['conference_session']. " | ". $session['conference_track']?><!--</span><br/>-->
            </div>
            <div class="confBody">
                <?php echo $session['abstract']. ' Watch Presentation >'; ?>
            </div>
            <?php
        }

    }
        $output = ob_get_clean();
        return $output;
    }