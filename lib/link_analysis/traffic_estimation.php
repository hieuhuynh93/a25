<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function _curl($url, $post = false, $headers = false, $json = false, $put = false, $cert = false, $timeout = 20) {
    //_log("CURL: ".$url);
    $ch = curl_init();
    //curl_setopt($ch, CURLOPT_HEADER, 0);  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);

    curl_setopt($ch, CURLOPT_ENCODING, "");

    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);



    curl_setopt($ch, CURLOPT_MAX_RECV_SPEED_LARGE, 100000);

    $headers[] = 'Accept-Language: en';
    // @curl_setopt($ch,CURLOPT_MAX_RECV_SPEED_LARGE,256000);  
    if ($post) {
        $fields_string = "";
        if (is_array($post)) {
            foreach ($post as $key => $value) {
                $fields_string .= $key . "=" . $value . "&";
            }
            $fields_string = rtrim($fields_string, '&');
        } else {
            $fields_string = $post;
        }
        if ($json) {
            $headers[] = 'Accept: application/json';
            $headers[] = 'Content-Type: application/json';
            if (is_array($post))
                $fields_string = json_encode($post);
        }
    }
    if (strtolower(parse_url($url, PHP_URL_SCHEME)) == 'https') {
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    }

    if ($put) {
        if ($put === true)
            $put = "PUT";
        //curl_setopt($ch, CURLOPT_PUT, true);
    }

    curl_setopt($ch, CURLOPT_URL, $url);
    $data = curl_exec($ch);
    curl_close($ch);
    //_log("CURL END");
    return $data;
}

function getAlexaRank($domain) {

    $xml = simplexml_load_string(_curl('http://data.alexa.com/data?cli=10&dat=snbamz&url=' . $domain));
    $rank['local']['country'] = '-';
    $rank['local']['rank'] = '99999999';
    $rank['global']['rank'] = '99999999';
    if ($xml->SD[1]) {
        $rank['local']['country'] = (String) $xml->SD[1]->COUNTRY->attributes()->NAME . "," . (String) $xml->SD[1]->COUNTRY->attributes()->CODE;
        $rank['local']['rank'] = (int) $xml->SD[1]->COUNTRY->attributes()->RANK;
        $rank['global']['rank'] = (int) $xml->SD[1]->POPULARITY->attributes()->TEXT;
        if (!$rank['local']['rank'] || $rank['local']['rank'] == 0) {
            $rank['local']['rank'] = $rank['global']['rank'];
            $rank['local']['country'] = 'Global';
        }
    }
    return $rank;
}

function raino_trim($str) {
    $str = Trim(htmlspecialchars($str));
    return $str;
}

function clean_with_www($site) {
    $site = strtolower($site);
    $site = str_replace(array(
        'http://',
        'https://'), '', $site);
    return $site;
}

echo $url = 'ajio.com';
$url = raino_trim($url);
$url = clean_with_www($url);

$alexa = getAlexaRank($url);
$save['alexaLocal'] = $alexa['local']['rank'];
$save['alexaLocalCountry'] = $alexa['local']['country'];
$save['alexaGlobal'] = $alexa['global']['rank'];
$save['uniqueVisitsDaily'] = round(pow($alexa['local']['rank'], -0.732) * 6000000);
$save['uniqueVisitsMonthly'] = round((pow($alexa['local']['rank'], -0.732) * 6000000) * 28);
$save['uniqueVisitsYearly'] = round((pow($alexa['local']['rank'], -0.732) * 6000000) * 324);
$save['pagesViewsDaily'] = round($save['uniqueVisitsDaily'] * 1.85);
$save['pagesViewsMonthly'] = round(($save['uniqueVisitsDaily'] * 1.85) * 28.5);
$save['pagesViewsYearly'] = round($save['pagesViewsMonthly'] * 11.789473684);

$save['incomeDaily'] = round(($save['uniqueVisitsDaily'] * 0.017) * 0.07);
//if($save['alexaLocal'] <= 1000 && $save['alexaLocal'] >= 100)
$save['incomeDaily'] = $save['incomeDaily'] * 1.5;
//if($save['alexaLocal'] <= 100)
$save['incomeDaily'] = $save['incomeDaily'] * 2;

$save['incomeMonthly'] = round($save['uniqueVisitsMonthly'] * 0.00318);
$save['incomeYearly'] = round($save['uniqueVisitsYearly'] * 0.00291);

echo '<pre>';
print_r($save);
echo '</pre>';
?>