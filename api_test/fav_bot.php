
<?php
require "../twitteroauth/autoload.php";
require_once("../apiconfig.php");

use Abraham\TwitterOAuth\TwitterOAuth;

$TwitterOAuth = new TwitterOAuth($consumerKey,$consumerSecret,$accessToken,$accessTokenSecret);

    $favkeyword = "かまトゥー";
    $favcount = 50;

    //検索
    $keywords = $TwitterOAuth->get('search/tweets',array('q' => $favkeyword, 'count' => $favcount ))->statuses;

    foreach ($keywords as $key ){

        if($userId == $key->user->id_str) {
            $id = $key->id;
            $res = $TwitterOAuth->post("favorites/create",['id' => $id ]);
            $tweets = $TwitterOAuth->post("statuses/update", array('status' => "@nihonkogakuin_ かまトゥだよ！", 'in_reply_to_status_id' => $id ));
        }
    }

