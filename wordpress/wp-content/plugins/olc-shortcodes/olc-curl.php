<?php
    /**
     * Created by PhpStorm.
     * User: Olaf Broms
     * Date: 7/28/2016
     * Time: 11:04 AM
     */

    function olc_curl_request($theUrl2, $theToken2)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $theUrl2,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer ". $theToken2. "",
                "cache-control: no-cache",
                "content-type: application/json"

            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $theStuff2 = $response;
           $theStuff = json_decode($theStuff2, TRUE);

            return $theStuff;
        }

    }

    function olc_core_curl_request($theUrl2, $theToken2)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $theUrl2,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer ". $theToken2. "",
                "cache-control: no-cache",
                "content-type: application/json"

            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $theStuff2 = $response;
            $theStuff = json_decode($theStuff2, TRUE);

            return $theStuff;
        }

    }


