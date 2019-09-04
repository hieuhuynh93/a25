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

function suggest($keyword, $site) {

	if($site == "google"){
		
		$data = file_get_contents_curl('https://suggestqueries.google.com/complete/search?output=chrome&client=chrome&hl=en-US&q='.urlencode($keyword));
		
	  	$json = json_decode($data);
	  	
	  	return $json[1];
		
	}
	
	if($site == "bing"){
		
		$data = file_get_contents_curl('http://api.bing.net/osjson.aspx?FORM=OPERAS&Market=en-us&Query='.urlencode($keyword));
		
		$json = json_decode($data);
	
		return $json[1];
		
	}
	
	if($site == "yahoo"){
		
		$data = file_get_contents_curl('https://search.yahoo.com/sugg/gossip/gossip-us-fp/?nresults=10&queryfirst=2&appid=fp&output=yjsonp&version=&command='.urlencode($keyword));
		
		$json = json_decode(str_replace(")","",str_replace("yasearch(","",$data)),true);
	
		$final = array();
		foreach ($json["r"] as $k => $v){
			
			$final[] = $v[0];
			
		}
		return $final;
		
	}

	if($site == "amazon"){
		
		$data = file_get_contents_curl('https://completion.amazon.com/search/complete?method=completion&search-alias=aps&mkt=1&q='.urlencode($keyword));
		
		$json = json_decode($data);
	
		return $json[1];
		
	}

	if($site == "ebay"){
		
	  	$data = file_get_contents_curl('https://autosug.ebay.com/autosug?_dg=1&sId=0&kwd='.urlencode($keyword));
		
		preg_match("#\(\{(.*?)\}\)#is",$data,$match);
	  	$json = json_decode('{'.$match[1].'}',true);  	
		return $json['res']['sug'];
		
	}

	if($site == "youtube"){
		
		$data = file_get_contents_curl('https://suggestqueries.google.com/complete/search?client=youtube&ds=yt&q='.urlencode($keyword));
		
		$json = json_decode(str_replace(")","",str_replace("window.google.ac.h(","",$data)));
		$final = array();
		foreach ($json[1] as $k => $v){
			
			$final[] = $v[0];
			
		}
		return $final;
		
	}

	if($site == "wikipedia"){
		
		$data = file_get_contents_curl('https://en.wikipedia.org/w/api.php?action=opensearch&format=json&search='.urlencode($keyword));
		
		$json = json_decode($data);
		
		return $json[1];
		
	}	
  
}

function generate_link($keyword, $site){
	
	if($site == "google") return "https://www.google.com/search?q=".urlencode($keyword);
	if($site == "bing") return "http://www.bing.com/search?q=".urlencode($keyword);
	if($site == "yahoo") return "https://search.yahoo.com/search?p=".urlencode($keyword);
	if($site == "amazon") return "http://www.amazon.com/s/?field-keywords=".urlencode($keyword);
	if($site == "ebay") return "http://www.ebay.com/sch/i.html?_nkw=".urlencode($keyword);
	if($site == "youtube") return "https://www.youtube.com/results?search_query=".urlencode($keyword);
	if($site == "wikipedia") return "http://en.wikipedia.org/w/index.php?search=".urlencode($keyword);	
	
}

?>