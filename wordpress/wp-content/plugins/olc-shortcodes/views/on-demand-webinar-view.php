<?php
    /**
     * Created by PhpStorm.
     * User: Olaf Broms
     * Date: 8/30/2016
     * Time: 10:25 AM
     */
    function render_the_ondemand_webinars($theStuff)
    {
        ob_start();

        //$theStuff = $theFeed;
        date_default_timezone_set('America/New_York');
        ?>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
              crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
              integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
              crossorigin="anonymous">

        <!--Bootstrap Toggle -->
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
                integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
                crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- bootstrap toggle -->
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


        <div class="webinarContent">

            <?php


                foreach ($theStuff['channel']['item'] as $article) {
                    $theDate = $article['pubDate'];
                    $publicationDate = date("F d, Y", strtotime("$theDate"));
                    $today = date("F d, Y");
                    $today = strtotime($today);
                    if ($publicationDate < $today) {


                        ?>

                        <div style=" padding-bottom: 2%;">
                        <span class="webinarHead"><?php echo $article['title']; ?></span>
                        <div
                            class="webinarMeta"><?php echo $theStuff['channel']['title'] . ' | ' . $publicationDate; ?></div>
                        <p>
                            <br/>
                            <?php echo $article['description']; ?>
                            <?php //echo $article['comments']; ?>
                            <a style="text-decoration: none; font-weight: bold;" href="<?php echo $article['signupUrl']; ?>">
                                Register ></a>
                        </p>
                        </div><?php
                    }
                }
            ?>
        </div>
        <?php

//print_r($theStuff);
        $output = ob_get_clean();
        return $output;
    }