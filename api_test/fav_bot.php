
<?php
// TwitterOAuth呼び出し
require "../twitteroauth/autoload.php";

// api設定ファイル呼び出し
require_once("../apiconfig.php");

use Abraham\TwitterOAuth\TwitterOAuth;

//twitterと連結
$TwitterOAuth = new TwitterOAuth($consumerKey,$consumerSecret,$accessToken,$accessTokenSecret);


    $favkeyword = "アパマン";   
    $favcount = 10;

    //キーワード検索
    $keywords = $TwitterOAuth->get('search/tweets',array('q' => $favkeyword, 'count' => $favcount ))->statuses;

    echo $keywords;


    foreach ($keywords as $key ){

        $id = $key->id;
        $res = $TwitterOAuth->post("favorites/create",['id' => $id ]);
        
        echo $key->id;
    }
        $tweets = $TwitterOAuth->post("statuses/update", ['status'=> "${favkeyword}の文字を含むツイートを${favcount}件Botによってファボしました"]);


?>