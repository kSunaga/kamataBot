
<?php
// TwitterOAuth呼び出し
require "../twitteroauth/autoload.php";

// api設定ファイル呼び出し
require_once("../apiconfig.php");

use Abraham\TwitterOAuth\TwitterOAuth;

//twitterと連結
$TwitterOAuth = new TwitterOAuth($consumerKey,$consumerSecret,$accessToken,$accessTokenSecret);

    //検索キーワード指定
    $favkeyword = "かまトゥー";

    //検索数を指定
    $favcount = 50;
    
    //キーワード検索
    $keywords = $TwitterOAuth->get('search/tweets',array('q' => $favkeyword, 'count' => $favcount ))->statuses;

    //キーワードを取得してuserIdがツイート用のアカウントだった場合、そのツイートにリプライを返す
    foreach ($keywords as $key ){

        if($userId == $key->user->id_str)
        {
            $id = $key->id;
            $res = $TwitterOAuth->post("favorites/create",['id' => $id ]);
            $tweets = $TwitterOAuth->post("statuses/update", array('status' => "@nihonkogakuin_ かまトゥだよ！", 'in_reply_to_status_id' => $id ));
        }

    }

?>