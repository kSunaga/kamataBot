
<?php
// TwitterOAuth呼び出し
require "twitteroauth/autoload.php";

// api設定ファイル呼び出し
require_once("apiconfig.php");

use Abraham\TwitterOAuth\TwitterOAuth;

//twitterと連結
$TwitterOAuth = new TwitterOAuth($consumerKey,$consumerSecret,$accessToken,$accessTokenSecret);


    $favkeyword = "ドラミ";   
    $favcount = 2;


    //キーワード検索
    $keywords = $TwitterOAuth->get('search/tweets',array('q' => $favkeyword, 'count' => $favcount ))->statuses;


    foreach ($keywords as $key ){

        $id = $key->id;
        $res = $TwitterOAuth->post("favorites/create",['id' => $id ]);
        
        // var_dump($key->id);
    }
        $tweets = $TwitterOAuth->post("statuses/update", ['status'=> "${favkeyword}の文字を含むツイートを${favcount}件Botによってファボしました"]);
    
?>