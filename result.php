<?php
header('Content-Type: application/json;charset=utf-8'); 
include "twitteroauth\autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;
 
$consumer_key = '';
$consumer_secret = '';
$access_token = '';
$access_token_secret = '';

$twitter = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);

$q = $_GET['q'];

$tweets = $twitter->get("search/tweets", ["q" => $q]);




foreach ($tweets->statuses as $key => $tweet) {
    echo "<img src=\"";
    echo $tweet->user->profile_image_url_https;
    echo "\"><a href='https://twitter.com/".$tweet->user->screen_name.'/status/'.$tweet->id_str."'>";
    echo $tweet->user->name;
    echo "</a> : ";
    echo $tweet->text;
    echo "<hr>";
}
?>