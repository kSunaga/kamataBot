<?php

require "twitteroauth/autoload.php";
require_once("apiconfig.php");

use Abraham\TwitterOAuth\TwitterOAuth;

$TwitterOAuth = new TwitterOAuth($consumerKey,$consumerSecret,$accessToken,$accessTokenSecret);

    $retkeyword = "ドラえもん";
    $retcount = 2;

    //検索
    $keywords = $TwitterOAuth->get('search/tweets',array('q' => $retkeyword, 'count' => $retcount ))->statuses;

    foreach ($keywords as $key ){
        $id = $key->id;
        $res = $TwitterOAuth->post("statuses/retweet/${id}");
    }
        $tweets = $TwitterOAuth->post("statuses/update", ['status'=> "${retkeyword}の文字を含むツイートを${retcount}件Botによってリツイートしました"]);

?>
