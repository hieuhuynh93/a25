<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php'); //get it from https://github.com/J7mbo/twitter-api-php

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
'oauth_access_token' => "772977294-bGaUAejNZ8yGjQgv8K4v6ZLRroH1N4IXhToFhsHp",
'oauth_access_token_secret' => "K5HlSF4DXaLJpBW4jsgRDeYbD8Ho62nCWnu2okz6sahSj",
'consumer_key' => "GRszL7WxHqpmqbYRmMRdJifVc",
'consumer_secret' => "xX4CmGVRuWG7OSmcVBTijKX5oL55h7w7iPNksyASP890GaQEGC"
);

$username = str_replace(" ", "", $_REQUEST['username']);

$ta_url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = '?screen_name='.$username;
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
$follow_count=$twitter->setGetfield($getfield)
->buildOauth($ta_url, $requestMethod)
->performRequest();
$data = json_decode($follow_count, true);
$followers_count=$data[0]['user']['followers_count'];

$dataTwitter=$data[0]['user'];
echo json_encode($dataTwitter);
?>