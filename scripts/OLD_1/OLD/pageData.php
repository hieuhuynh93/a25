<?php

function fread_url($url, $ref = "") {
    if (function_exists("curl_init")) {
        $ch = curl_init();
        $user_agent = "Mozilla/4.0 (compatible; MSIE 5.01; " . "Windows NT 5.0)";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
        curl_setopt($ch, CURLOPT_HTTPGET, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_REFERER, $ref);
        curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
        $html = curl_exec($ch);
        curl_close($ch);
    } else {
        $hfile = fopen($url, "r");
        if ($hfile) {
            while (!feof($hfile)) {
                $html .= fgets($hfile, 1024);
            }
        }
    }
    return $html;
}
$url = 'http://25saints.com/Masterajib/Project_SEO/index.php/keyword-trends?google_trends_keywords=sports,news';
echo fread_url($url, $ref = "");