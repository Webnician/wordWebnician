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
<style>
    .nav-next{
        display: none!important;
    }
</style>



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
                        $theType = $indworkshop['type'];

                        //get the proper text string for the header bar
                        $instituteType = $indworkshop['type'];
                        $instituteType = check_inst_offering_type($instituteType);
                        ?>
                        <div class="workshop-full-header" id="workshop-full-header-<?php echo $daCount2 ?>">
                            <h2 class="col-xs-12 col-sm-12 col-lg-12 single-offering-type-header <?php echo $theType; ?>-banner-part"><?php echo $instituteType; ?> </h2>
                            <h2 class="col-xs-12 col-sm-12 col-lg-12 "><?php echo $indworkshop['title'] ?></h2>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-lg-12 dates-and-image">
                            <div class="col-xs-12 col-sm-12 col-lg-4 single-offering-image"> <img src="<?php echo $indworkshop['image'] ?>" /></div>
                            <div class="col-xs-12 col-sm-12 col-lg-8 dates-and-prices" style="">
                                <span class="single-offering-prices">
                                     <b>PRICE : </b><span>Non-Members : <?php echo $indworkshop['price'] ?></span>
                                     <span>Members : <?php echo $indworkshop['member_price'] ?></span>
                                </span><br />
                                <span class="single-offering-dates">

                                          <?php
                                              //this section checks for cohorts or for self paced and then generates a sku
                                              if ($indworkshop['cohorts'])
                                              {



                                              foreach ($indworkshop['cohorts'] as $cohort)
                                          {
                                              $theDate = $cohort['start_date'];
                                              $endDate = $cohort['end_date'];
                                              $cohortDate = date("M d, Y", strtotime("$theDate"));
                                              $cohortEndDate = date("M d, Y", strtotime("$endDate"));
                                              ?>
                                              <span class="col-xs-12 col-sm-12 col-lg-12 date-and-price-line"><?php echo $cohortDate. ' - '. $cohortEndDate; ?><span class="break-on-small-screens"><br/></span><a style="margin-left: 2%;" href="<?php echo _SHOPPING_CART_URL.'olc-cart/add/IN-'.$cohort['institute_id'].'-'.$cohort['id'];?>" class="main-but-single-offering">ADD TO CART</a> </span>
                                              <?php
                                          }
                                              }
                                              if ($indworkshop['type'] == 'self_paced_workshop')
                                              {

                                              ?>
                                                  <span class="col-xs-12 col-sm-12 col-lg-12"><?php echo ' Ongoing ' ?><a style="margin-left: 2%;" href="<?php echo _SHOPPING_CART_URL.'olc-cart/add/IN-'.$indworkshop['id'].'-self-paced';?>" class="main-but4">ADD TO CART</a> </span>
                                              <?php
                                                }
                                          ?>
                                </span>
                            </div>
                        </div>
                        <div class="workshop-full-description col-xs-12 col-sm-12 col-lg-12" id="workshop-full-description-<?php echo $daCount2 ?>">
                            <h2 class="single-offering-description">Workshop Description :</h2>
                            <span class="col-xs-12 col-sm-12 col-lg-12 single-offering-desription-body"><?php echo $indworkshop['description'] ?></span>
                            <!--                            <span class="col-xs-12 col-sm-12 col-lg-12 center">--><?php //echo $indworkshop['cert_eligible'] ?><!--</span>-->
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