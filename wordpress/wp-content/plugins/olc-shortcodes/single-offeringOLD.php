<?php
    /**
     * Created by PhpStorm.
     * User: Olaf Broms
     * Date: 8/17/2016
     * Time: 11:46 AM
     */
    include_once ('community-shortcodes-main.php');

    function render_single_offering($theFeed)
    {
        ob_start();
        //parse the url to get which workshop it is

        $thisone = $_SERVER['QUERY_STRING'];
//print_r($thisone);
        $queryInput = print_r($thisone, true);
        $postId = str_replace("id=", "", $queryInput);
       // echo $postId;



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
        <script>



        </script>




        <div id="workshop-group" class="workshop-group-part .col-xs-12 .col-sm-12 .col-lg-12" style="margin-bottom: 7%;">

            <?php
                date_default_timezone_set('America/New_York');
                $daCount2 = 0;
                $thePerma = get_site_url();
                $theLink = $thePerma.'/olc-institute-programs/';
               ?>
            <div class="col-xs-12 col-sm-12 col-lg-12 center" id="button-div-1">
                <a class="middle main-but4" href="<?php echo $theLink ?>">Back to Institute</a>
            </div>
            <?php

                foreach ($theStuff as $indworkshop) {
                    if($indworkshop['id'] == $postId) {
                        ?>
                        <div class="workshop-full-header" id="workshop-full-header-<?php echo $daCount2 ?>">
                            <h2 class="col-xs-12 col-sm-12 col-lg-12 center"><?php echo $indworkshop['title'] ?></h2>
                        </div>
                        <div class="workshop-full-description col-xs-12 col-sm-12 col-lg-12" id="workshop-full-description-<?php echo $daCount2 ?>">
                            <span class="col-xs-12 col-sm-12 col-lg-12 center"><?php echo $indworkshop['description'] ?></span>
<!--                            <span class="col-xs-12 col-sm-12 col-lg-12 center">--><?php //echo $indworkshop['cert_eligible'] ?><!--</span>-->
                        </div>
                        <div style="margin-top: 5%;" class="workshop-full-footer col-xs-12 col-sm-12 col-lg-12" id="workshop-full-footer-<?php echo $daCount2 ?>">

                                <div class="col-xs-12 col-sm-3 col-lg-3 center">
                                    <h3 class="center">Pricing</h3>
                                    <span>Non-Members : <?php echo $indworkshop['price'] ?></span><br />
                                    <span>Members : <?php echo $indworkshop['member_price'] ?></span>
                                </div>
                                <div style="font-weight: bold;" class="col-xs-12 col-sm-3 col-lg-3 center">
                                    <h3 class="center">Offering Category</h3>
                                    <span><?php echo $indworkshop['category'] ?></span>
                                </div>

                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <h3 class="center">Cohort Dates</h3>
                                <?php foreach ($indworkshop['cohorts'] as $cohort)
                                {
                                    $theDate = $cohort['start_date'];
                                    $endDate = $cohort['end_date'];
                                    $cohortDate = date("F d, Y", strtotime("$theDate"));
                                    $cohortEndDate = date("F d, Y", strtotime("$endDate"));
                                    ?>
                                    <span class="col-xs-12 col-sm-12 col-lg-12 center"><?php echo $cohortDate. ' - '. $cohortEndDate; ?><br /><a style="margin-left: 2%;" href="http://olc.onlinelearningconsortium.org/olc-cart/add/<?php echo 'IN-'.$cohort['institute_id'].'-'.$cohort['id'];?>" class="main-but4">Attend Cohort</a> </span>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php

                    }
                } ?>
            <div class="col-xs-12 col-sm-12 col-lg-12 center" style="margin-top: 5%;" id="button-div-2">
                <a class="middle main-but4" href="<?php echo $theLink ?>">Back to Institute</a>
            </div>
        </div>
        <?php
        $output = ob_get_clean();
        return $output;

    }