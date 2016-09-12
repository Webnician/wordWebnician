<?php
    /**
     * Created by PhpStorm.
     * User: Olaf Broms
     * Date: 8/18/2016
     * Time: 12:00 PM
     */


    function olc_shortcodes_menu_options_render()
    {

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
        <div class="col-xs-12 col-sm-12 col-lg-12 center options-header">OLC Shortcodes Options</div>

<!--        options form-->
        <form method="post" action="options.php">

            <?php settings_fields( 'myoption-group' );
        do_settings_sections( 'myoption-group' );

                //get the stored values
                 $onoff = esc_attr( get_option('on_or_off'));
                $otheroption = esc_attr( get_option('some_other_option'));
                $optinetc = esc_attr( get_option('option_etc'));
            ?>

            <div class="col-xs-12 col-sm-12 col-lg-12 filter-menu" style="margin-bottom: 5%;" id="first">
            <span class="col-xs-12 col-sm-4 col-lg-4">
                <h4 style="font-weight: bold; ">Turn Rendering On/Off</h4>
                 <input type="checkbox" data-on="Show" data-off="Don't Show" id="workshop-check-part"
                     <?php
                 if($onoff == 'on')
                 {
                     echo 'checked';
                 }
                 ?>
                        name="on_or_off" data-toggle="toggle">
            </span>
                <span class="col-xs-12 col-sm-4 col-lg-4">
                <h4 style="font-weight: bold">Option 2</h4>
                  <input type="checkbox" data-on="Show" data-off="Don't Show" id="mastery-check-part"

                      <?php
                          if($otheroption == 'on')
                          {
                              echo 'checked';
                          }
                      ?>

                         name="some_other_option"  data-toggle="toggle">
            </span>
                <span class="col-xs-12 col-sm-4 col-lg-4">
                <h4 style="font-weight: bold">Option 3</h4>
                <input type="checkbox" data-on="Show" data-off="Don't Show" id="certificate-check-part"

                    <?php
                        if($optinetc == 'on')
                        {
                            echo 'checked';
                        }
                    ?>

                       name="option_etc" data-toggle="toggle">
            </span>

            </div>

            <?php
                    submit_button();
            ?>

            </form>
        <?php

    }