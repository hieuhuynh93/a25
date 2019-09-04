<?php

// After two months you need to create new facebook user access token and put in the variable below.
$facebook_user_access_token = 'EAAItHZBPIisoBAH9ZAGXIGXRa0m734NoCnSBZB5AZCBEoSjTo77YTcGzRnruJnNig2u5eCmDmCwwZA2ycZBGlZCrs3s191q9IHEpYwi6C7wHwnOV2sjk9IT7myKKhJV5MY4QMFmEoepMx0Ymwyz1FN8Q3A6HiwJ4uaFtjXVcUtxhgZDZD';

function file_get_contents_curl($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    $data = curl_exec($ch);
    curl_close($ch);
 
    return $data;
}

function suggest($keyword) {
	global $facebook_user_access_token;
	$data = file_get_contents_curl('https://graph.facebook.com/v3.0/search?_reqName=path%3A%2Fsearch&access_token='.$facebook_user_access_token.'&callback=__globalCallbacks.f1eeb0beb2a0f22&endpoint=%2Fsearch&locale=en_US&method=get&pretty=0&type=adInterest&q='.urlencode($keyword));
	preg_match("#\(\{(.*?)\}\)#is",$data,$match);
  	$json = json_decode('{'.$match[1].'}',true);
  	return $json['data'];  
}

?>