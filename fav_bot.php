<?php

// TwitterOAuth呼び出し
require_once("twitteroauth.php");
// api設定ファイル呼び出し
require_once("apiconfig.php");

//twitterと連結
$TwitterOAuth = new TwitterOAuth($consumerKey,$consumerSecret,$accessToken,$accessTokenSecret);
if($TwitterOAuth){
//'q' => '検索したいワード'を入力.count/検索する数は任意（ただし180以下） 
    $status = $TwitterOAuth->get('search/tweets', array('q' =>'ファボれよ','count' => 40));
//favったツイートの結果を表示
    foreach($status->statuses as $result){
        echo '<img src ="'.$result->user->profile_image_url.'"><br>';
        echo $result->created_at.':' ;
        echo $result->user->name.'<br>' ;
        echo $result->text.'<br>' ;
        $idstr = $result->id_str ;
        $status = $TwitterOAuth->post('favorites/create', ['id' => $idstr]);
    }
}

$crontab = new TwitterOAuth($consumerKey,$consumerSecretm,$accessToken,$accessTokenSecret)
if ($TwitterOAuth){
	echo $TwitterOAuth[1]
	
}
?>