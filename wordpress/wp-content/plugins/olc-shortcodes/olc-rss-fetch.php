<?php
    /**
     * Created by PhpStorm.
     * User: Olaf Broms
     * Date: 8/15/2016
     * Time: 1:51 PM
     */

    function getFeed($feed_url) {

       //$content = file_get_contents($feed_url);
      // $response = $content;
      //  $response = new SimpleXmlElement($content);
        //$response = simplexml_load_string($content, "SimpleXMLElement", LIBXML_NOCDATA);






     //  $feeds = file_get_contents($feed_url);
//        $feeds = str_replace("<content:encoded>","<contentEncoded>",$feeds);
//        $feeds = str_replace("</content:encoded>","</contentEncoded>",$feeds);
     //  $response = simplexml_load_string($feeds);



       // foreach ($response->channel->item as $article) {

        //   echo $article['comments'];
     //   }

        //return $response;

        //}


//$xml=("http://core.onlinelearningconsortium.org/v1/blog/rss");

    $feeds = file_get_contents($feed_url);
    $rss = simplexml_load_string($feeds);
        return $rss;







    }

