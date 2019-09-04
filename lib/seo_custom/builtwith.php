<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
/* ------------------------------- cURL response Raw data & BuiltWith Raw data ---------------------------- */

function curlGET($url, $ref_url = "http://www.google.com/", $agent = "Mozilla/5.0 (Windows NT 6.3; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0") {
//    $cookie = TMP_DIR . unqFile(TMP_DIR, randomPassword() . '_curl.tdata');
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_USERAGENT, $agent);
    //  curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
    //curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 100);
    curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/html; charset=utf-8", "Accept: */*"));
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_REFERER, $ref_url);
    $html = curl_exec($ch);
    curl_close($ch);
    return $html;
}

function getBuiltWith($url, $intento = 0) {
    $json = curlGET("https://orion.apiseeds.com/api/buildwith/$url?apikey=6qZrK4DAPJ6bcbe8fXJ7DSqvSEHgbRAXOOLB151ksTQRHarWn3E1a9m7CiA3jtRM");
//    $json = curlGET("https://api.builtwith.com/free1/api.json?KEY=d17afbce-f508-48c9-be47-ade49c432242&LOOKUP=$url");
    $response = json_decode($json, true);
    if (!@$response->error) {
        return $response;
    }
    if ($intento > 0) {
        if ($response->error)
            return ("BuiltWith: " . $response->error);
        return $response;
    }else {
        sleep(7);
        return getBuiltWith($url, 1);
    }
}

$url = $_REQUEST['domain'];
$parseURL = parse_url($url);
$host = $parseURL['host'];
$host_names = explode(".", $host);
$bottom_host_name = $host_names[count($host_names)-2] . "." . $host_names[count($host_names)-1];

$url = $bottom_host_name;
$buildWith = getBuiltWith($url);
$technology = array();

if(!empty($buildWith['response']['technologies'])){
    foreach($buildWith['response']['technologies'] as $key=>$value){
        $technology[$value['cats'][0]] = $value['name'] . ', ' . $value['version'];
    }
}

echo json_encode($technology);
?>