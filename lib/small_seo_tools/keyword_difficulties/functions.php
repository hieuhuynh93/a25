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

function alexaRank($domain){
    $final = array();
	$search_for = '<POPULARITY URL';
	$part = file_get_contents_curl('https://data.alexa.com/data?cli=10&dat=snbamz&url='.trim($domain));

    $str = explode($search_for, $part);
    $str = array_shift(explode('"/>', $str[1]));
    $str = explode('TEXT="', $str);
	$str[1] = str_replace('" SOURCE="panel',"",$str[1]);
	preg_match('#<COUNTRY CODE="(.*?)" NAME="(.*?)" RANK="(.*?)"#si', $part, $c);
	$final['global_rank'] = $str[1];
	$final['country_name'] = $c[2];
	$final['country_rank'] = $c[3];
	return $final;	

}

function getpagerank($alexa){
	
	if($alexa >= 1 && $alexa < 100){
		
		$pr = "10";
		
	}elseif($alexa >= 100 && $alexa < 500){
		
		$pr = "9";
		
	}elseif($alexa >= 500 && $alexa < 1000){
		
		$pr = "8";
		
	}elseif($alexa >= 1000 && $alexa < 5000){
		
		$pr = "7";
		
	}elseif($alexa >= 5000 && $alexa < 10000){
		
		$pr = "6";
		
	}elseif($alexa >= 10000 && $alexa < 25000){
		
		$pr = "5";
		
	}elseif($alexa >= 25000 && $alexa < 50000){
		
		$pr = "4";
		
	}elseif($alexa >= 50000 && $alexa < 75000){
		
		$pr = "3";
		
	}elseif($alexa >= 75000 && $alexa < 100000){
		
		$pr = "2";
		
	}elseif($alexa >= 100000 && $alexa < 500000){
		
		$pr = "1";
		
	}else{
		
		$pr = "0";
		
	}
	
	
	return $pr;
}

?>