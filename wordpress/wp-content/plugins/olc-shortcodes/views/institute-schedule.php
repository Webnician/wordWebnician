<?php
    /**
     * Created by PhpStorm.
     * User: Olaf Broms
     * Date: 9/1/2016
     * Time: 10:47 AM
     */
    function render_the_institute_schedule($theStuff)
    {
ob_start();

    $daCount = 0;
    //print_r($theStuff);

    //$daCount = 1;
    foreach ($theStuff as $thisWorkshopNow) {
        $daCount++;
        // check_posts($thisWorkshopNow);
    }
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


<div class="col-xs-12 col-sm-12 col-lg-12 advance-nav-toggle" id="nav-part">
    <h4 class="middle" style="font-weight: bold">Advanced Navigation</h4>
    <input class="middle checker" type="checkbox" data-on="Show" data-off="Hide" id="nav-check-part" data-toggle="toggle">
</div>
<div class="col-xs-12 col-sm-12 col-lg-12 hidden filter-menu" id="options-part">
            <span class="col-xs-12 col-sm-6 col-lg-6">
                <h4 style="font-weight: bold; ">Workshops</h4>
                 <input class="checker" type="checkbox" data-on="Show" data-off="Don't Show" id="workshop-check-part" checked data-toggle="toggle">
            </span>
    <span class="col-xs-12 col-sm-6 col-lg-6">
                <h4 style="font-weight: bold">Mastery Series</h4>
                  <input class="checker" type="checkbox" data-on="Show" data-off="Don't Show" id="mastery-check-part" checked data-toggle="toggle">
            </span>
    <span class="col-xs-12 col-sm-6 col-lg-6">
                <h4 style="font-weight: bold">OTC</h4>
                <input class="checker" type="checkbox" data-on="Show" data-off="Don't Show" id="certificate-check-part" checked data-toggle="toggle">
            </span>
    <span class="col-xs-12 col-sm-6 col-lg-6">
                <h4 style="font-weight: bold">Advanced OTC</h4>
                <input class="checker" type="checkbox" data-on="Show" data-off="Don't Show" id="advanced-otc-check-part" checked data-toggle="toggle">
            </span>
    <span class="col-xs-12 col-sm-6 col-lg-6">
                <h4 style="font-weight: bold">Self-Paced</h4>
                <input class="checker" type="checkbox" data-on="Show" data-off="Don't Show" id="self-paced-check-part" checked data-toggle="toggle">
            </span>
    <span class="col-xs-12 col-sm-12 col-lg-12">
                <h4 style="font-weight: bold">View</h4>
                <input class="checker" type="checkbox" data-on="Grid" data-off="List" id="view-check-part" checked data-toggle="toggle">
            </span>
</div>


<div id="workshop-group" class="workshop-group-part .col-xs-12 .col-sm-12 .col-lg-12" style="margin-bottom: 7%;">
    <h5 style="color: #27b3e5; font-weight: bold; margin: 0px; margin-bottom: 10px;">Total Offerings (<?php echo $daCount; ?>
        ) : </h5>
    <?php
        date_default_timezone_set('America/New_York');
        $daCount2 = 0;

        foreach ($theStuff as $indworkshop) {


            //collapse space in self-paced
            $workshopTitle = $indworkshop['type'];
            if($workshopTitle == 'Self-Paced Workshop')
            {
                $indworkshop['type'] = 'Self-Paced-Workshop';
            }
            $instituteType = $indworkshop['type'];
            $instituteType = check_inst_offering_type($instituteType);

            //sorting and getting the closest date

            $theNearestCohort = '2050-08-16 03:30:40';
            $nearestDate = date("F d, Y", strtotime("$theNearestCohort"));

            foreach ($indworkshop['cohorts'] as $currentCohort)
            {
                $theDate = $currentCohort['start_date'];

                if($theDate < $nearestDate) {
                    $nearestDate = $theDate;
                }
            }
            $cohortDisplayDate = date("F d, Y", strtotime("$nearestDate"));


            $theType = $indworkshop['type'];
            ?>
            <div class="<?php echo $theType; ?>-main">
                <div class="single-workshop-part appear <?php echo $theType; ?> col-xs-12 col-sm-6 col-lg-4" id="workshop-<?php echo $daCount2 ?>">

                    <div class="workshop-body-part col-xs-12 col-sm-12 col-lg-12 " style="" id="workshop-body-<?php echo $daCount2 ?>">
                        <div class="workshop-image-part col-xs-12 col-sm-12 col-lg-12 rounded middle" style="" id="workshop-image-<?php echo $daCount2 ?>"><img src="<?php echo $indworkshop['image'] ?>" /></div>
                        <div class="col-xs-12 col-sm-12 col-lg-12 <?php echo $theType; ?>-banner-part"><?php echo $instituteType; ?></div>
                        <div class="workshop-heading-part " id="workshop-heading=<?php echo $daCount2 ?>">


                            <h4 class="workshop-title-part" id="workshop-title-part<?php echo $daCount2; ?>">
                                <span class="title-part center" id="workshop-title-<?php echo $daCount2 ?>" ><?php echo $indworkshop['title']; ?></span>

                            </h4>
<!--                            <span class="type col-xs-12 col-sm-12 col-lg-12" id="workshop-type---><?php //echo $daCount2 ?><!--" >--><?php //echo "Type : ". $instituteType; ?><!--</span>-->


                            <span class="workshop-dates-part center col-xs-12 col-sm-12 col-lg-12" id="workshop-dates-<?php echo $daCount2 ?>">
                                <?php
                                    //Determine if there are cohort dates or not

                                    if($indworkshop['type'] == 'self_paced_workshop')
                                    {
                                        echo "Ongoing";
                                    }
                                    else if($cohortDisplayDate == 'December 31, 1969' || $cohortDisplayDate == 'August 16, 2050')
                                    {
                                        echo "No Cohort Dates";
                                    }
                                    else
                                    {
                                        echo "Next Date - ". $cohortDisplayDate;
                                    }
                                ?>
                        </span>
                        </div>

                        <div class="workshop-details-part col-xs-12 col-sm-12 col-lg-12" id="workshop-details-part-<?php echo $daCount2 ?>" >

                            <div class="full-details-part hidden" id="show-full-details-part-<?php echo $daCount2; ?>">
                                <div class="workshop-full-description-part col-xs-12 col-sm-12 col-lg-12" id="workshop-full-description-part-<?php echo $daCount2 ?>">
                                    <span class="col-xs-12 col-sm-12 col-lg-12 center"><?php echo $indworkshop['excerpt'] ?></span>
                                    <span class="col-xs-12 col-sm-12 col-lg-12 center"><?php echo $indworkshop['description'] ?></span>
                                </div>

                                <div class="workshop-full-footer-part col-xs-12 col-sm-12 col-lg-12" id="workshop-full-footer-part-<?php echo $daCount2 ?>">
                                    <div class="col-xs-12 col-sm-4 col-lg-4">
                                        <span class="col-xs-12 col-sm-6 col-lg-6 center"><?php echo $indworkshop['price'].$indworkshop['cert_eligible'] ?></span>
                                        <span class="col-xs-12 col-sm-6 col-lg-6 center"><?php echo $indworkshop['category'] ?></span>
                                    </div>
                                    <div class="col-xs-12 col-sm-2 col-lg-2">
                                        <button type="button" id="fulls<?php echo $daCount2 ?>"  class="main-but3 middle" >Close</button>
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
                                            <span class="col-xs-12 col-sm-12 col-lg-12 center"><?php echo $cohortDate. ' - '. $cohortEndDate; ?></span>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <p>
                                <?php
                                    //put the information together to create the post link
                                    $theUrl = get_site_url();
                                    $theOfferingId = $indworkshop['id'];
                                    $theNewestUrl2 = $theUrl.'/institution-offerings/?id='.$theOfferingId;

                                ?>
                                <a class="main-but5 middle center" href="<?php echo $theNewestUrl2;  ?>">Learn More</a>

                            </p>
                        </div>

                    </div>
                </div>
            </div>
            <?php
            $daCount2++;
        } ?>
</div>
<?php
        $output = ob_get_clean();
        return $output;
    }