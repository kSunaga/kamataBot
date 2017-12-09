<?php

// TwitterOAuth呼び出し
require "twitteroauth/autoload.php";
// api設定ファイル呼び出し
require_once("apiconfig.php");

use Abraham\TwitterOAuth\TwitterOAuth;

//twitterと連結
$TwitterOAuth = new TwitterOAuth($consumerKey,$consumerSecret,$accessToken,$accessTokenSecret);

    $res = $TwitterOAuth->post("statuses/update", array("status" => "bot用テスツイート"));

    var_dump($TwitterOAuth);

