<?php


// TwitterOAuth呼び出し
require "twitteroauth/autoload.php";

// api設定ファイル呼び出し
require_once("apiconfig.php");

use Abraham\TwitterOAuth\TwitterOAuth;


//twitterと連結
$TwitterOAuth = new TwitterOAuth($consumerKey,$consumerSecret,$accessToken,$accessTokenSecret);


    $retkeyword = "ドラえもん";   
    $retcount = 2;


    //キーワード検索
    $keywords = $TwitterOAuth->get('search/tweets',array('q' => $retkeyword, 'count' => $retcount ))->statuses;

    foreach ($keywords as $key ){

        $id = $key->id;
        $res = $TwitterOAuth->post("statuses/retweet/${id}");

        // var_dump($id);

    }
        
        $tweets = $TwitterOAuth->post("statuses/update", ['status'=> "${retkeyword}の文字を含むツイートを${retcount}件Botによってリツイートしました"]);
        
?>