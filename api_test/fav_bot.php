
<?php
// TwitterOAuth呼び出し
require "../twitteroauth/autoload.php";

// api設定ファイル呼び出し
require_once("../apiconfig.php");

use Abraham\TwitterOAuth\TwitterOAuth;

//twitterと連結
$TwitterOAuth = new TwitterOAuth($consumerKey,$consumerSecret,$accessToken,$accessTokenSecret);


    $favkeyword = "アンパンマン";   
    $favcount = 5;


    $user_info = $TwitterOAuth->get('users/show', array('screen_name'=> 'Anqe_Joker'));

    
    //キーワード検索
    $keywords = $TwitterOAuth->get('search/tweets',array('q' => $favkeyword, 'count' => $favcount ))->statuses;


    foreach ($keywords as $key ){

        $id = $key->id;

        if($userId == $key->user->id_str)
        {
            $res = $TwitterOAuth->post("favorites/create",['id' => $id ]);
        }

    }

    if(isset($res)){

        $tweets = $TwitterOAuth->post("statuses/update", ['status'=> "アカウントのツイートを${favkeyword}Botによってツイートしました"]);
    
    }else{

        $tweets = $TwitterOAuth->post("statuses/update", ['status'=> "${favkeyword}の文字はツイートされていないよ！"]);

    }


?>