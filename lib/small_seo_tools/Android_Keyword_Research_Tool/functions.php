<?php

function file_get_contents_curl($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);    
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36');
    curl_setopt($ch, CURLOPT_URL, $url);
    $data = curl_exec($ch);
    curl_close($ch);
 
    return $data;
}

function suggest($keyword) {
	$final = array();
	$data = file_get_contents_curl('https://market.android.com/suggest/SuggRequest?json=1&c=0&hl=en&gl=US&query='.urlencode($keyword));
	
  	$json = json_decode($data,true);
	foreach ($json as $value) {
		$final[] = trim($value['s']);
	}
  	
  	return $final;
  
}

?>