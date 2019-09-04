<?php

function getStatsData($site) {

    $domain = trim($site);
    $domain_curl = 'http://' . $domain;

    $save['url'] = $domain;

    $data = getSpeedData('AIzaSyD1wnxAppbj-riwtLtkTx-jzP-YQkvPsvw', $domain_curl, 'desktop', true);
    if ($data->title) {
        $save['metaTitle'] = $data->title;
    }

    $temp_d = $domain_curl;
    $domain_curl = getEfectiveUrl($domain_curl);


    if (substr($domain_curl, -1) == '/')
        $domain_curl = substr($domain_curl, 0, -1);



    if (!$domain_curl || $domain_curl == '://')
        $domain_curl = $temp_d;
    $save['body'] = (_curl($domain_curl));
    $save['charset'] = getCharset($save['body']);

    if (mb_strtolower($save['charset']) != 'utf-8' && $save['charset'] != '')
        $save['body'] = iconv($save['charset'], 'UTF-8', $save['body']);
//$save['body'] 				= mb_convert_encoding($save['body'], 'utf-8', $save['charset']);
//$save['body'] 				= $save['body'];						
    $save['headers'] = _curl_headers($domain_curl);

    preg_match("/<title>(.+)<\/title>/siU", file_get_contents('http://' . $domain), $matches);
    $title = $matches[1];
    $save['metaTitle'] = $title;
    $save['metaDescription'] = getMeta($save['body'], "description");
    if ($save['metaDescription'] == '')
        $save['metaDescription'] = 'No Data';
    $save['metaKeywords'] = getMeta($save['body'], "keywords");

    $html = _curl($domain_curl);
    $dom = new DOMDocument();
    @$dom->loadHTML($html);

    $nodes = $dom->getElementsByTagName('link');
    foreach ($nodes as $node) {

        $save["robots"] = remoteFileExists($domain_curl . "/robots.txt") ? 1 : 0;
        $save["sitemap"] = remoteFileExists($domain_curl . "/sitemap.xml") ? 1 : 0;

        $save['url_real'] = $domain_curl;
    }
    return $save;
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

function getAlexaBounceRate($domain) {

    $html_alexa = _curl('http://www.alexa.com/siteinfo/' . $domain);

    $document_alexa = new DOMDocument();

    $document_alexa->loadHTML($html_alexa);

    $selector_alexa = new DOMXPath($document_alexa);

    $content_alexa_bounce = $selector_alexa->query('/html/body//strong[@class="metrics-data align-vmiddle"]');
    $x = 1;
    foreach ($content_alexa_bounce as $node) {

        $doc = new DOMDocument();

        foreach ($node->childNodes as $child) {

            $doc->appendChild($doc->importNode($child, true));
        }

        $bounce_rate = $doc->saveHTML();


        if (strpos($bounce_rate, "%") !== FALSE)
            break;
        $x++;
    }

    $bounce_rate = trim(str_replace('%', '', $bounce_rate));

    if (is_numeric($bounce_rate))
        return $bounce_rate;

    return 0;
}

function getGoogleCount($domain) {
    $api_url = "http://www.google.ca/search?q=site%3A" . $domain;
    $content = _curl($api_url);
    if (empty($content))
        return intval(0);
    if (!strpos($content, 'results'))
        return intval(0);
    $match_expression = '/About (.*?) results/sim';
    preg_match($match_expression, $content, $matches);
    if (empty($matches))
        return intval(0);
    return intval(str_replace(",", "", $matches[1]));
}

function getYahooCount($domain) {

    $results = trim(getStringBetween(_curl("http://search.yahoo.com/search;_ylt=?p=site:" . $domain), 'Next</a><span>', ' results</span>'));

    $results = str_replace(",", "", $results);

    if ($results == "")
        return 0;
    return $results;
}

function getBingCount($domain) {

    $html_bing_results = _curl("http://www.bing.com/search?q=site:" . $domain . "&FORM=QBRE&mkt=en-US");

    $document = new DOMDocument();

    $document->loadHTML($html_bing_results);

    $selector = new DOMXPath($document);

    $anchors = $selector->query('/html/body//span[@class="sb_count"]');

    foreach ($anchors as $node) {

        $doc = new DOMDocument();

        foreach ($node->childNodes as $child) {

            $doc->appendChild($doc->importNode($child, true));
        }

        $bing_results = $doc->saveHTML();
    }

    $bing_results = str_replace("results", "", $bing_results);

    $bing_results = str_replace(",", "", $bing_results);

    if (trim($bing_results) != "")
        return $bing_results;
    return 0;
}

function getEfectiveUrlBK($domain) {
    $key = config_item("google_page_speed_key");
    $key = trim($key);
    if ($key) {


        $domain = urlencode($domain);
        $lang = 'en';
        $contents = _curl("https://www.googleapis.com/pagespeedonline/v2/runPagespeed?locale=$lang&key=$key&screenshot=false&strategy=desktop&url=$domain", false, false, false, false, false, 60);
        $json = json_decode($contents);
        if (!$json->error)
            return $json->id;
        else
            showErrorJson("Google API: " . $json->error->errors[0]->reason);
    }
    else {
        return array("errorMessage" => 'Google api key not found');
    }
}

function getSpeedData($key, $domain, $strategy = 'desktop', $rules = false, $timeout = 40) {


    $key = trim($key);


    $domain = urlencode($domain);
//$domain = urlencode($domain);
    $lang = 'en';
    $contents = _curl("https://www.googleapis.com/pagespeedonline/v2/runPagespeed?locale=$lang&key=$key&screenshot=true&strategy=$strategy&url=$domain", false, false, false, false, false, $timeout);

    $json = json_decode($contents);
    if ($json->responseCode == 200 || $json->responseCode == 404 || $json->responseCode == 403) {
        if (!$rules)
            return $json->ruleGroups->SPEED;
        return $json;
    }
    else {
        if (!$contents) {
            showErrorJson("Google API: Response empty");
        } else {
            showErrorJson("Google API: " . $json->error->errors[0]->reason);
        }
    }
}

function domainAuthority3($domain) {

    $url = 'https://seotools.iamsujoy.com/?route=bulktool';
    $fields = array(
        'getStatus' => "1",
        'sitelink' => $domain,
        'siteID' => "1",
        'da' => "1"
    );
//url-ify the data for the POST
    foreach ($fields as $key => $value) {
        $fields_string .= $key . '=' . $value . '&';
    }
    rtrim($fields_string, '&');
//open connection
    $ch = curl_init();
//set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10); //timeout in seconds
//execute post
    $result = explode("td", curl_exec($ch));
    $da = str_ireplace("</", "", $result[5]);
    $da = str_ireplace(">", "", $da);
//close connection
    curl_close($ch);
    return intval($da);
}

function domainAuthority($domain) {
// Get your access id and secret key here: https://moz.com/products/api/keys
    $accessID = 'mozscape-6467265d46';
    $secretKey = 'ceb9af1aba21f168cf26ff192927c041';
    if (!$accessID || !$secretKey)
        return 0;
// Set your expires times for several minutes into the future.
// An expires time excessively far in the future will not be honored by the Mozscape API.
    $expires = time() + 300;

// Put each parameter on a new line.
    $stringToSign = $accessID . "\n" . $expires;

// Get the "raw" or binary output of the hmac hash.
    $binarySignature = hash_hmac('sha1', $stringToSign, $secretKey, true);

// Base64-encode it and then url-encode that.
    $urlSafeSignature = urlencode(base64_encode($binarySignature));

// Specify the URL that you want link metrics for.
    $objectURL = $domain;

// Add up all the bit flags you want returned.
// Learn more here: https://moz.com/help/guides/moz-api/mozscape/api-reference/url-metrics
    $cols = "103079231492";

// Put it all together and you get your request URL.
// This example uses the Mozscape URL Metrics API.
    $requestUrl = "http://lsapi.seomoz.com/linkscape/url-metrics/" . urlencode($objectURL)
            . "?Cols=" . $cols . "&AccessID=" . $accessID . "&Expires=" . $expires . "&Signature=" . $urlSafeSignature;

// Use Curl to send off your request.
    $options = array(
        CURLOPT_RETURNTRANSFER => true
    );

    $ch = curl_init($requestUrl);
    curl_setopt_array($ch, $options);
    $content = (curl_exec($ch));
    curl_close($ch);

    $array1 = explode(',', $content);
    $array2 = explode(":", $array1[4]);
    return (int) round($array2[1]);
}

function domainAuthority4($domain) {

    $url = 'http://99traffictools.com/?route=ajax';
    $fields = array(
        'mozAuthority' => "1",
        'sitelink' => $domain,
        'domainAuthority' => "1"
    );
//url-ify the data for the POST
    foreach ($fields as $key => $value) {
        $fields_string .= $key . '=' . $value . '&';
    }
    rtrim($fields_string, '&');
//open connection
    $ch = curl_init();
//set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10); //timeout in seconds
//execute post
    $da = curl_exec($ch);
//close connection
    curl_close($ch);
    return intval($da);
}

function domainAuthorityBK($domain) {

    $url = 'http://www.seoweather.com/wp-admin/admin-ajax.php';
    $fields = array(
        'action' => "getData",
        'linkz' => $domain,
        'divid' => "1"
    );
//url-ify the data for the POST
    foreach ($fields as $key => $value) {
        $fields_string .= $key . '=' . $value . '&';
    }
    rtrim($fields_string, '&');
//open connection
    $ch = curl_init();
//set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10); //timeout in seconds
//execute post
    $result = explode("td", curl_exec($ch));
    foreach ($result as $key => $value) {
        if (strpos($value, "dar") !== FALSE) {
            $da = $value;
            $da = strip_tags("<div " . stripslashes($da) . "</div>");
        }
    }
//close connection
    curl_close($ch);
    return intval($da);
}

function getW3C($url) {
    $json = _curl("https://validator.w3.org/nu/?doc=http://$url&out=json&level=error");
    $w3c = json_decode($json);
    return @count($w3c->messages);
}

function getBuiltWith($url, $intento = 0) {
//$json = _curl("https://builtwith.4p1.co/?url=$url&apikey=$key",false,false,false,false,false,15);	
    $json = _curl("https://api.builtwith.com/free1/api.json?KEY=d17afbce-f508-48c9-be47-ade49c432242&LOOKUP=$url", false, false, false, false, false, 5);
    $response = json_decode($json);
    if (!@$response->error) {
        return $response;
    }
    if ($intento > 0) {
        if ($response->error)
            showErrorJson("BuiltWith: " . $response->error);
        return $response;
    }else {
        sleep(7);
        return getBuiltWith($url, 1);
    }
}

function getWhois($key, $url) {
//$json = _curl("https://whois.4p1.co/?method=domain&domain=$url&apikey=$key",false,false,false,false,false,8);	
    $json = _curl("https://orion.apiseeds.com/api/whois/$url?apikey=" . config_item("apiseeds_apikey"), false, false, false, false, false, 8);

    $response = json_decode($json);
    if ($response->error)
        showErrorJson("Whois: " . $response->error);
    return $response;
}

function getSocialCount($url, $intento = 0) {
//$json = _curl("https://whois.4p1.co/?method=domain&domain=$url&apikey=$key",false,false,false,false,false,8);	
    $json = _curl("https://orion.apiseeds.com/api/share/count/?apikey=" . config_item("apiseeds_apikey") . "&url=" . urlencode($url), false, false, false, false, false, 5);
//print_p($json);
    $response = json_decode($json);
    if (!$response->error) {
        return $response->response->shares;
    }
    if ($intento > 0) {
        if ($response->error)
            showErrorJson("Social Count: " . $response->error);
        return $response->response->shares;
    }else {
        sleep(7);
        return getSocialCount($url, 1);
    }
}

function googleSafe($domain) {

    $results = _curl("http://www.google.com/safebrowsing/diagnostic?site=" . $domain);
    if (strpos($results, 'This site is not currently listed as suspicious') !== FALSE)
        return false;
    return true;
}

function getFavIcon($html) {
    if ($html == '')
        return false;

    $doc = new DOMDocument();
    if (!@$doc->loadHTML($html))
        return false;


    $xml = simplexml_import_dom($doc);
    if (!$xml)
        return false;
    $arr = $xml->xpath('//link[@rel="shortcut icon"]');
    if (!@$arr[0]['href']) {
        $arr = $xml->xpath('//link[@rel="icon"]');
    }
    if (!@$arr[0]['href']) {
        $arr = $xml->xpath('//link[@rel="icon shortcut"]');
    }
    return (String) @$arr[0]['href'];
}

function getManifest($html, $url) {
    if ($html == '')
        return false;

    $doc = new DOMDocument();
    if (@!$doc->loadHTML($html))
        return false;


    $xml = simplexml_import_dom($doc);
    if (!$xml)
        return false;
    $arr = $xml->xpath('//link[@rel="manifest"]');
    $patch = (String) @$arr[0]['href'];
    if ($patch) {
        $manifest = json_decode(_curl($url . $patch));
        return $manifest;
    }
    return false;
}

function getFacebookCount($url) {
    /* $html = _curl("https://www.facebook.com/v2.5/plugins/like.php?locale=en_US&href=".urlencode($url));

      preg_match("/and (.*?) others/", $html, $match);

      $likes =  $match[1];
      return $likes; */

    $json = json_decode(_curl("https://graph.facebook.com/?id=" . urlencode($url)));
    if ($json->error)
        showErrorJson("Facebook Count: " . $json->error->message);
    return intval($json->share->share_count);
}

function getLinkedInCount($url) {
    $json = json_decode(_curl("https://www.linkedin.com/countserv/count/share?url=" . urlencode($url) . "&format=json"));

    return intval($json->count);
}

function getPinterestCount($url) {
    $json = json_decode(_curl("http://api.pinterest.com/v1/urls/count.json?callback=receiveCount&url=" . urlencode($url)));
    return intval($json->receiveCount->count);
}

function getStumbleuponCount($url) {
    $json = json_decode(_curl("http://www.stumbleupon.com/services/1.01/badge.getinfo?url=" . urlencode($url)));
    return intval($json->result->views);
}

function getGooglePlusCount($url) {
    $post = '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]';
    $json = json_decode(_curl("https://clients6.google.com/rpc?key=AIzaSyCKSbrvQasunBoV16zDH9R33D88CeLr9gQ", $post, false, true));

    return intval($json[0]->result->metadata->globalCounts->count);
}

function inHX($html, $string, $hx = "h1") {
    $h1 = getTextBetweenTags(mb_strtolower($html), $hx);

    foreach ($h1 as $key => $value) {
        if (mb_strpos($value, $string) !== FALSE)
            return true;
    }
    return false;
}

function _curl($url, $post = false, $headers = false, $json = false, $put = false, $cert = false, $timeout = 200) {


// $hash   = sha1($url);
// 
//_log("CURL: ".$url);
    $ch = curl_init();
//curl_setopt($ch, CURLOPT_HEADER, 0);  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

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
        curl_setopt($ch, CURLOPT_POST, count($post));
        if ($json) {
            $headers[] = 'Accept: application/json';
            $headers[] = 'Content-Type: application/json';
            if (is_array($post))
                $fields_string = json_encode($post);
            curl_setopt($ch, CURLOPT_POST, 1);
        }
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    }
    if (strtolower(parse_url($url, PHP_URL_SCHEME)) == 'https') {
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        if ($cert) {
            curl_setopt($ch, CURLOPT_CAINFO, $cert);
        }
    }
    if ($headers) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }

    if ($put) {
        if ($put === true)
            $put = "PUT";
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $put);
//curl_setopt($ch, CURLOPT_PUT, true);
    }

    curl_setopt($ch, CURLOPT_URL, $url);
    $data = curl_exec($ch);
    curl_close($ch);
//_log("CURL END");
    return $data;
}

function img2base64($path) {

    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    return $base64;
}

function ping($url, $timeout = 15) {

    if (intval($timeout) < 3)
        $timeout = 8;



    $headers[] = 'Accept-Language: en';

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
//curl_setopt($ch,CURLOPT_MAXREDIRS,6); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_MAX_RECV_SPEED_LARGE, 100000);

    curl_exec($ch);
    $retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    return $retcode;
}

function _curl_headers($url) {


    $curl = curl_init();

    $opts = array(
        CURLOPT_URL => $url,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => FALSE,
        CURLOPT_ENCODING => 'gzip',
        CURLOPT_HEADER => true,
        CURLOPT_NOBODY => true,
        CURLOPT_COOKIESESSION, true,
        CURLOPT_MAX_RECV_SPEED_LARGE => 100000
    );

    curl_setopt_array($curl, $opts);
    $return = curl_exec($curl);
    @list($rawHeader, $response) = explode("\r\n\r\n", $return, 2);
    $cutHeaders = explode("\r\n", $rawHeader);
    $headers = array();
    foreach ($cutHeaders as $row) {
        $cutRow = explode(":", $row, 2);
        $headers[$cutRow[0]] = trim(@$cutRow[1]);
    }

    return implode('<br><br><i class="fa fa-circle text-info"></i>&nbsp;', $cutHeaders);
}

function setLog($type, $message) {
    
}

function getUserAgent() {

    $CI->load->library('user_agent');
    if (config_item("ua"))
        return config_item("ua");
    return $CI->agent->browser() . ' ' . $CI->agent->version();
}

function is_logged() {


    $user = $CI->session->userdata('user');
    if (intval($user['id']) > 0)
        return true;
    return false;
}

function _user($field) {

    $user = $CI->session->userdata('user');
    return $user[$field];
}

function sendNotificationNewUser($name, $email) {
    if (config_item("email_new_user") == '1') {

        $ip = $CI->input->ip_address();
        $user = $name . " - " . $email;
        $message2 = "New user registration on your site <br><br><strong>User: </strong>$user<br><strong>IP Address: </strong>$ip";
        email(get_email_admin(), __("New user registration"), $message2);
    }
}

function get_email_admin() {

    $data = $CI->Admin->getTable("users", array("is_admin" => "1"));
    $temp = $data->row();
    return $temp->email;
}

function get_session($field) {

    return $CI->session->userdata($field);
}

function is_admin() {


    $user = $CI->session->userdata('user');
    if (intval($user['is_admin']) > 0)
        return true;
    return false;
}

function is_demo() {


    $user = $CI->session->userdata('user');
    if (intval($user['is_demo']) > 0)
        return true;
    return false;
}

function echo_json($json) {

    echo $CI->output->set_content_type('application/json')->set_output(json_encode($json));
}

function is_sadmin() {


    $user = $CI->session->userdata('user');
    if (intval($user['is_admin']) > 0)
        return true;
    return false;
}

function is_ajax() {

    return $CI->input->is_ajax_request();
}

function is_mobile() {

    return $CI->agent->is_mobile();
}

function getUserID() {

    $user = $CI->session->userdata('user');
    return intval($user['id']);
}

function is_spotify() {

    $user = $CI->session->userdata('user');
    if ($user['spotify']['access_token'])
        return true;
    return false;
}

function tdrows($elements) {
    $str = "";
    foreach ($elements as $element) {
        $str .= $element->nodeValue . "||||";
    }

    return $str;
}

function getCountryCode() {


    if ($CI->session->geoplugin_countryCode)
        return $CI->session->geoplugin_countryCode;
    $ip = $CI->input->ip_address();
    $url = "http://www.geoplugin.net/json.gp?ip=$ip";
    $data = json_decode(_curl($url));
    $code = $data->geoplugin_countryCode;
    if ($code != '')
        $CI->session->set_userdata('geoplugin_countryCode', $code);
    if ($code == '')
        $code = 'us';
    return $code;
}

function getLang() {

    $lang = mb_strtolower(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
    if ($lang != '')
        return $lang;
    return config_item("default_lang");
}

function hex2rgba($color, $opacity = false) {

    $default = 'rgb(0,0,0)';

//Return default if no color provided
    if (empty($color))
        return $default;

//Sanitize $color if "#" is provided 
    if ($color[0] == '#') {
        $color = substr($color, 1);
    }

//Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
        $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
    } elseif (strlen($color) == 3) {
        $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
    } else {
        return $default;
    }

//Convert hexadec to rgb
    $rgb = array_map('hexdec', $hex);

//Check if opacity is set(rgba or rgb)
    if ($opacity) {
        if (abs($opacity) > 1)
            $opacity = 1.0;
        $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
    } else {
        $output = 'rgb(' . implode(",", $rgb) . ')';
    }

//Return rgb(a) color string
    return $output;
}

function dslug($string) {
//$string = str_ireplace("-", "+", $string);
//return urldecode($string);
    $string = urldecode($string);
//$string = stripslashes($string);
    $string = addslashes($string);

    $string = str_ireplace("/", "-", $string);



    return $string;
}

function _ucwords($str) {
    return mb_convert_case(mb_strtolower($str), MB_CASE_TITLE, "UTF-8");
}

function _strtolower($str) {
    return mb_strtolower($str);
}

function _url_title($string, $remove = false) {
    $string = mb_strtolower($string, 'UTF-8');
    if ($remove) {
        $string = str_ireplace("'", "", $string);
    }
    $string = str_ireplace("'", "%27", $string);
    $string = str_ireplace('"', "", $string);
    $string = str_ireplace('(', " ", $string);
    $string = str_ireplace(')', " ", $string);
    $string = str_ireplace(',', " ", $string);
    $string = str_ireplace(" ", "-", $string);
    $string = str_ireplace("--", "-", $string);
    $string = str_ireplace("--", "-", $string);
    $string = str_ireplace("--", "-", $string);
    $string = str_ireplace("--", "-", $string);
    $string = str_ireplace("+", "-", $string);
    $string = str_ireplace('&', "and", $string);
    $string = str_ireplace('*', "", $string);
    return $string;
}

function _remove_acents($string) {
    $acents = array("�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "Ù", "� ", "è", "ì", "ò", "ù", "�", "�", "â", "�", "î", "ô", "û", "Â", "Ê", "Î", "Ô", "Û", "�", "ö", "Ö", "ï", "ä", "�", "�", "�?", "Ä", "Ë");
    $l = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "n", "N", "A", "E", "I", "O", "U", "a", "e", "i", "o", "u", "c", "C", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "u", "o", "O", "i", "a", "e", "U", "I", "A", "E");
    $string_ok = str_replace($acents, $l, $string);
    return $string_ok;
}

function _clean_special($string) {


    return preg_replace('/[^a-zA-Z0-9��\s]/', '', _remove_acents($string));
}

function _clean_ip($string) {


    return preg_replace('/[^0-9.\s]/', '', $string);
}

function _clean_string($string) {
    $string = str_ireplace("'", "", $string);
    $string = str_ireplace('"', " ", $string);
    return $string;
}

function slug($string) {
    $string = normalize_name($string);
    return urlencode($string);
    return _url_title(convert_accented_characters($string));
}

function getFakeSlug($str) {
    return _remove_acents(str_ireplace(" ", "-", mb_strtolower($str)));
}

function get_slug($slug) {

    return $CI->config->item('slug_' . $slug);
}

function prepare($json) {
    $json = str_ireplace("</a", "</span", str_ireplace("<a", "<span", $json));
    $json = str_ireplace("#text", "text", $json);
    return $json;
}

function mmss($seconds) {
    $t = round($seconds / 1000);
    return sprintf('%02d:%02d', ($t / 60 % 60), $t % 60);
}

function _log($data) {

    if ($data == 'query' || $data == 'db')
        $data = $CI->db->last_query();

    Console::log($data);
}

function _debug($msg) {
    Console::log_memory();
    if (is_array($msg)) {
        Console::log(date("H:i:s"));
        Console::log($msg);
    } else
        Console::log(date("H:i:s") . " " . $msg);
}

function print_p($array) {
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function validate_picture($img) {
    if ($img == '') {
        $img = base_url() . "assets/images/no-picture.png";
    }
    return $img;
}

function createFolder($folder) {
    if (!file_exists($folder)) {
        mkdir($folder);
    }
}

function formatBytes($size, $precision = 2) {
    $base = log($size, 1024);
    $suffixes = array('B', 'KB', 'MB', 'GB', 'TB');

    return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
}

function return_bytes($val) {
    $val = trim($val);
    $last = strtolower($val[strlen($val) - 1]);
    switch ($last) {
// The 'G' modifier is available since PHP 5.1.0
        case 'g':
            $val *= 1024;
        case 'm':
            $val *= 1024;
        case 'k':
            $val *= 1024;
    }

    return $val;
}

function uploadImage($folder, $file_name, $input, $resize = true, $overwrite = false) {



    $config['upload_path'] = $folder;
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['max_size'] = return_bytes(ini_get('post_max_size'));
    $config['overwrite'] = $overwrite;
    $config['file_name'] = $file_name;
    $r = array();
    $CI->load->library('upload', $config);

    if (!$CI->upload->do_upload($input)) {
        $r = strip_tags($CI->upload->display_errors());
        return array('error' => $r);
    } else {

        $r = $CI->upload->data();
        if ($resize) {
            $config['image_library'] = 'gd2';
            $config['source_image'] = $config['upload_path'] . "/" . $r['file_name'];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 600;
            $config['height'] = 600;
            $CI->load->library('image_lib', $config);
            if (!$CI->image_lib->resize()) {
                echo $CI->image_lib->display_errors();
                die();
            }
        }
        return array("image" => $r['file_name']);
    }
}

function days2h($days) {
    $result = array($days);

    $sub_struct_month = ($result[0] / 30);
    $sub_struct_month = floor($sub_struct_month);
    $sub_struct_days = ($result[0] % 30);
    $sub_struct = $sub_struct_month . " " . __("months") . " " . $sub_struct_days . " " . __("days");

    return $sub_struct;
}

function time_elapsed_string($datetime, $full = false, $reverse = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);
    if ($reverse)
        $diff = $ago->diff($now);


    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full)
        $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function ago($time) {

    $time = strtotime($time);
    $periods = array(("second"), ("minute"), ("hour"), ("day"), ("week"), ("month"), ("year"), ("decade"));
    $lengths = array("60", "60", "24", "7", "4.35", "12", "10");

    $now = time();

    $difference = $now - $time;
    $tense = "ago";

    for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
        $difference /= $lengths[$j];
    }

    $difference = round($difference);

    if ($difference != 1) {
        $periods[$j] .= "s";
    }
    $periods[$j] = __($periods[$j]);

    return "$difference " . __($periods[$j]);
}

function normalizer($cadena) {
    $originales = '��������������������������������������������������������������??';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    $cadena = strtolower($cadena);
    $cadena = str_ireplace("-", " ", $cadena);
    $cadena = ltrim($cadena);
    $cadena = rtrim($cadena);
    return utf8_encode($cadena);
}

function get_header_curl($url) {

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
    curl_setopt($ch, CURLOPT_TIMEOUT, 3); //timeout in seconds
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_MAX_RECV_SPEED_LARGE, 100000);

//curl_setopt($ch, CURLOPT_NOBODY, true);    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_exec($ch);

    return curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
}

function remoteFileExists($url) {

    $headers = get_headers($url);
    return stripos($headers[0], "200 OK") ? true : false;
}

function more($string, $len = 100) {

    $string = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $string);
    $string = preg_replace('#<style(.*?)>(.*?)</style>#is', '', $string);
    $string = strip_tags($string);
    $string = ltrim(rtrim($string));
    if (mb_strlen($string) < $len)
        return $string;
    return ltrim(mb_substr($string, 0, $len)) . "...";
}

function extractKeyWords($string) {



    $string = html_entity_decode($string);


    $string = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $string);
    $string = preg_replace('#<style(.*?)>(.*?)</style>#is', '', $string);

    $string = str_ireplace("\n", " ", $string);
    preg_match("/<body[^>]*>(.*?)<\/body>/is", $string, $matches);
    $string = preg_replace('#<[^>]+>#', ' ', $matches[0]);

    $stopwords = array("these", "after", "that", "have", "this", "then", "como", "with", "from", "will", "your", "you");

    $string = preg_replace('/[\pP]/u', ' ', trim(preg_replace('/\s\s+/iu', ' ', mb_strtolower($string))));



    $matchWords = array_filter(explode(' ', $string), function ($item) use ($stopwords) {
        return !($item == '' || in_array($item, $stopwords) || mb_strlen($item) <= 3 || is_numeric($item));
    });
    $wordCountArr = array_count_values($matchWords);
    arsort($wordCountArr);
    return (array_slice($wordCountArr, 0, 10));
}

function br2nl($string) {
    return preg_replace('/\<br(\s*)?\/?\>/i', "\n", $string);
}

function email($to, $subject, $message) {


//$CI->email->clear();
    $message = $CI->load->view("emails/template", array("message" => $message), TRUE);
    $CI->email->set_newline("\r\n");
    $CI->email->to($to);
    $CI->email->from(config_item("smtp_from"), config_item("site_title"));
    $CI->email->subject($subject);
    $CI->email->message($message);
    return $CI->email->send();
}

function normalize_name($str) {
    $str = str_replace("&", "And", $str);
    $remove = array("/", "+", "?", "&", "[", "]");
    $str = str_replace($remove, " ", $str);
    return $str;
}

function set_https_url($url, $force = true) {
    if ($force)
        return str_ireplace("http://", "https://", $url);
    return $url;
}

function getDaysDiff($date_start, $date_end) {
    $days = (strtotime($date_start) - strtotime($date_end)) / 86400;
    $days = abs($days);
    $days = floor($days);
    return $days;
}

function is_valid_domain_name($url) {

    return filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED) && (preg_match("#^http(s)?://[a-z0-9-_.]+\.[a-z]{2,4}#i", $url));
}

function getStringBetween($string, $start, $end) {

    $string = " " . $string;

    $ini = strpos($string, $start);

    if ($ini == 0)
        return "";

    $ini += strlen($start);

    $len = strpos($string, $end, $ini) - $ini;

    return substr($string, $ini, $len);
}

function connect($host, $port, $timeOut = 2) {
    $fp = fsockopen($host, $port, $errno, $errstr, $timeOut);
    if ($fp) {
        fclose($fp); // we know it's listening        
        return true;
    } else {
        fclose($fp); // we know it's listening        
        return false;
    }
}

function getMetaTags($str) {
    $pattern = '
  ~<\s*meta\s

  # using lookahead to capture type to $1
    (?=[^>]*?
    \b(?:name|property|http-equiv)\s*=\s*
    (?|"\s*([^"]*?)\s*"|\'\s*([^\']*?)\s*\'|
    ([^"\'>]*?)(?=\s*/?\s*>|\s\w+\s*=))
  )

  # capture content to $2
  [^>]*?\bcontent\s*=\s*
    (?|"\s*([^"]*?)\s*"|\'\s*([^\']*?)\s*\'|
    ([^"\'>]*?)(?=\s*/?\s*>|\s\w+\s*=))
  [^>]*>

  ~ix';

    if (preg_match_all($pattern, $str, $out))
        return array_combine($out[1], $out[2]);
    return array();
}

function get_title($str) {

    /* if(strlen($str)>0)
      {
      // $str = trim(preg_replace('/\s+/', ' ', $str)); // supports line breaks inside <title>
      preg_match("/\<title\>(.*)\<\/title\>/i",$str,$title); // ignore case

      return strip_tags($title[1]);
      } */
    $str = mb_strtoupper($str);
    if (!$str)
        return "";
    $doc = new DOMDocument();
// @$doc->loadHTML($str);
    $doc->loadHTML(mb_convert_encoding(htmlentities($str), 'HTML-ENTITIES', 'UTF-8'));

    $nodes = $doc->getElementsByTagName('title');

    return @$nodes->item(0)->nodeValue;
}

function getMeta($html, $tag) {
    if ($tag == 'title') {
        return get_title($html);
    } else {
        $meta = getMetaTags($html);
        foreach ($meta as $key => $value) {
            if (mb_strtolower($key) == mb_strtolower($tag)) {
                return strip_tags($value);
            }
        }
    }
    return "";
}

function getTitle($html) {
    preg_match("/<title>(.*)</title>/", $html, $title);
    if (count($title)) {
        return strip_tags($title[1]);
    } else {
        return false;
    }
}

function getDescription($html) {
    $matches = array();
    preg_match('/<meta.*?name=("|\')description("|\').*?content=("|\')(.*?)("|\')/i', $html, $matches);
    if (count($matches) > 4) {
        return trim($matches[4]);
    }
    preg_match('/<meta.*?content=("|\')(.*?)("|\').*?name=("|\')description("|\')/i', $html, $matches);
    if (count($matches) > 2) {
        return trim($matches[2]);
    }
    return null;
}

function colorCircle($val1, $val2) {
    if ($val1 > $val2)
        return "#0ACC00";
    return "#F0AD4E";
}

function getColorPdf($val1, $val2) {
    if ($val1 > $val2)
        return "#15A204";
    return "#EF3A06";
}

function validateLenghtPdf($str, $limit, $min = false) {


    $response['color'] = "#15A204";
    $response['icon'] = "+";
    $response['fixed'] = $str;
    $response['lenght'] = mb_strlen($str);
    $response['fixed2'] = mb_substr($str, 0, $limit);

    if (mb_strlen($str) > $limit) {
        $response['color'] = "#EF3A06";
        $response['icon'] = "�";
        $response['fixed'] = mb_substr($str, 0, $limit) . "<s style='color:#EF3A06'>" . mb_substr($str, $limit, mb_strlen($str)) . "</s>";
    }

    if ($min) {

        if (mb_strlen($str) < $min) {
            $response['color'] = "#EF3A06";
            $response['icon'] = "�";
            $response['fixed'] = mb_substr($str, 0, $limit) . "<s style='color:#EF3A06'>" . mb_substr($str, $limit, mb_strlen($str)) . "</s>";
        }
    }
    if (trim($str) == '') {
        $response['fixed'] = "<s style=color:'#EF3A06'>" . __("NO DATA") . "</s>";
        $response['fixed2'] = "";
    }

    $response['fixed'] = ($response['fixed']);
    $response['fixed2'] = ($response['fixed2']);
    return $response;
}

function getIcon($val1, $val2) {
    if ($val1 > $val2)
        return "zmdi-check";
    return "zmdi-alert-triangle";
}

function getIconPdf($val1, $val2) {
    if ($val1 > $val2)
        return "+";
    return "�";
}

function getColor($val1, $val2) {
    if ($val1 > $val2)
        return "text-success";
    return "text-warning";
}

function getColorProgress($val1, $val2) {
    if ($val1 > $val2)
        return "progress-success";
    return "progress-warning";
}

function validateLenght($str, $limit, $min = false) {


    $response['color'] = "text-success";
    $response['icon'] = "zmdi-check";
    $response['fixed'] = $str;
    $response['lenght'] = mb_strlen($str);
    $response['fixed2'] = mb_substr($str, 0, $limit);

    if (mb_strlen($str) > $limit) {
        $response['color'] = "text-warning";
        $response['icon'] = "zmdi-alert-triangle";
        $response['fixed'] = mb_substr($str, 0, $limit) . "<span class='text-danger text-underline'>" . mb_substr($str, $limit, mb_strlen($str)) . "</span>";
    }

    if ($min) {

        if (mb_strlen($str) < $min) {
            $response['color'] = "text-warning";
            $response['icon'] = "zmdi-alert-triangle";
            $response['fixed'] = mb_substr($str, 0, $limit) . "<span class='text-danger text-underline'>" . mb_substr($str, $limit, mb_strlen($str)) . "</span>";
        }
    }
    if (trim($str) == '') {
        $response['fixed'] = "<div class='alert alert-warning'>" . ("NO DATA") . "</div>";
        $response['fixed2'] = "";
    }

    $response['fixed'] = badWords($response['fixed']);
    $response['fixed2'] = badWords($response['fixed2']);
    return $response;
}

function getPor($val, $total) {
    return intval(($val * 100) / $total);
}

function sanitize_output($buffer) {

    $search = array(
        '/\>[^\S ]+/s', // strip whitespaces after tags, except space
        '/[^\S ]+\</s', // strip whitespaces before tags, except space
        '/(\s)+/s'       // shorten multiple whitespace sequences
    );

    $replace = array(
        '> ',
        ' <',
        '\\1'
    );

    $buffer = preg_replace($search, $replace, $buffer);

    return $buffer;
}

function getAllLinks($html, $domain, $limit = 15) {
    $doc = new DOMDocument();
    @$doc->loadHTML(htmlentities($html));
    $elements = $doc->getElementsByTagName("a");
    $x = 0;
    $exist = array();
    foreach ($elements as $el) {
        $l = $el->getAttribute("href");

        $ltitle = strip_tags($el->getAttribute("title"));
        if (!$ltitle)
            $ltitle = strip_tags($el->nodeValue);
        $lrel = strip_tags($el->getAttribute("rel"));
        @$l = fixLink($l);
        if (!isExternal($l, $domain) AND $l != '' AND strpos($l, "mailto:") === FALSE AND strpos($l, "tel:") === FALSE AND strpos($l, "javascript:") === FALSE AND strpos($l, "#") === FALSE && !$exist[$l]) {

            $exist[$l] = 1;

            if (mb_substr($l, 0, 1) != '/' && strpos($l, "http") === FALSE)
                $l = "/" . $l;



            if (strpos($l, $domain) === FALSE)
                $l = $domain . $l;

            if (substr($l, 0, 4) != 'http') {
                if (substr($l, 0, 2) != '//')
                    $l = "://" . $l;
                $l = "http" . $l;
            }

            $link[] = array("link" => $l, "title" => $ltitle, "rel" => $lrel);
            $x++;
            if ($x >= $limit)
                break;
        }
    }
    return @$link;
}

function fixLink($link) {
    if (substr($link, 0, 2) == '//')
        return "http:" . $link;
    return $link;
}

function isExternal($link, $domain) {


    if (strpos($link, "http") !== FALSE) {
        if (strpos($link, $domain) !== FALSE)
            return false;
        return true;
    }
    return false;
}

function badWords($str) {

    global $bad_words;
    $bad_words = '2 girls 1 cup, 2g1c, 4r5e, 5h1t, 5hit, a$$, a$$hole, a_s_s, a2m, a54, a55, a55hole, acrotomophilia, aeolus, ahole,'
            . ' alabama hot pocket, alaskan pipeline, anal, anal impaler, anal leakage, analprobe, anilingus, anus, apeshit, ar5e, areola,'
            . ' areole, arian, arrse, arse, arsehole, aryan, ass, ass fuck, ass fuck, ass hole, assbag, assbandit, assbang, assbanged, assbanger,'
            . ' assbangs, assbite, assclown, asscock, asscracker, asses, assface, assfaces, assfuck, assfucker, ass-fucker, assfukka, assgoblin,'
            . ' assh0le, asshat, ass-hat, asshead, assho1e, asshole, assholes, asshopper, ass-jabber, assjacker, asslick, asslicker, assmaster,'
            . ' assmonkey, assmucus, assmucus, assmunch, assmuncher, assnigger, asspirate, ass-pirate, assshit, assshole, asssucker, asswad, asswhole,'
            . ' asswipe, asswipes, auto erotic, autoerotic, axwound, azazel, azz, b!tch, b00bs, b17ch, b1tch, babeland, baby batter, baby juice, ball gag,'
            . ' ball gravy, ball kicking, ball licking, ball sack, ball sucking, ballbag, balls, ballsack, bampot, bang (one\'s) box, bangbros, bareback,'
            . ' barely legal, barenaked, barf, bastard, bastardo, bastards, bastinado, batty boy, bawdy, bbw, bdsm, beaner, beaners, beardedclam, beastial,'
            . ' beastiality, beatch, beaver, beaver cleaver, beaver lips, beef curtain, beef curtain, beef curtains, beeyotch, bellend, bender, beotch,'
            . ' bescumber, bestial, bestiality, bi+ch, biatch, big black, big breasts, big knockers, big tits, bigtits, bimbo, bimbos, bint, birdlock,'
            . ' bitch, bitch tit, bitch tit, bitchass, bitched, bitcher, bitchers, bitches, bitchin, bitching, bitchtits, bitchy, black cock, blonde action,'
            . ' blonde on blonde action, bloodclaat, bloody, bloody hell, blow job, blow me, blow mud, blow your load, blowjob, blowjobs, blue waffle,'
            . ' blue waffle, blumpkin, blumpkin, bod, bodily, boink, boiolas, bollock, bollocks, bollok, bollox, bondage, boned, boner, boners, bong,'
            . ' boob, boobies, boobs, booby, booger, bookie, boong, booobs, boooobs, booooobs, booooooobs, bootee, bootie, booty, booty call, booze,'
            . ' boozer, boozy, bosom, bosomy, breasts, Breeder, brotherfucker, brown showers, brunette action, buceta, bugger, bukkake, bull shit,'
            . ' bulldyke, bullet vibe, bullshit, bullshits, bullshitted, bullturds, bum, bum boy, bumblefuck, bumclat, bummer, buncombe, bung, bung hole,'
            . ' bunghole, bunny fucker, bust a load, bust a load, busty, butt, butt fuck, butt fuck, butt plug, buttcheeks, buttfuck, buttfucka, buttfucker,'
            . ' butthole, buttmuch, buttmunch, butt-pirate, buttplug, c.0.c.k, c.o.c.k., c.u.n.t, c0ck, c-0-c-k, c0cksucker, caca, cacafuego, cahone,'
            . ' camel toe, cameltoe, camgirl, camslut, camwhore, carpet muncher, carpetmuncher, cawk, cervix, chesticle, chi-chi man, chick with a dick,'
            . ' child-fucker, chinc, chincs, chink, chinky, choad, choade, choade, choc ice, chocolate rosebuds, chode, chodes, chota bags, chota bags,'
            . ' cipa, circlejerk, cl1t, cleveland steamer, climax, clit, clit licker, clit licker, clitface, clitfuck, clitoris, clitorus, clits, clitty,'
            . ' clitty litter, clitty litter, clover clamps, clunge, clusterfuck, cnut, cocain, cocaine, coccydynia, cock, c-o-c-k, cock pocket, cock pocket,'
            . ' cock snot, cock snot, cock sucker, cockass, cockbite, cockblock, cockburger, cockeye, cockface, cockfucker, cockhead, cockholster, cockjockey,'
            . ' cockknocker, cockknoker, Cocklump, cockmaster, cockmongler, cockmongruel, cockmonkey, cockmunch, cockmuncher, cocknose, cocknugget, cocks,'
            . ' cockshit, cocksmith, cocksmoke, cocksmoker, cocksniffer, cocksuck, cocksuck, cocksucked, cocksucked, cocksucker, cock-sucker, cocksuckers,'
            . ' cocksucking, cocksucks, cocksucks, cocksuka, cocksukka, cockwaffle, coffin dodger, coital, cok, cokmuncher, coksucka, commie, condom, coochie,'
            . ' coochy, coon, coonnass, coons, cooter, cop some wood, cop some wood, coprolagnia, coprophilia, corksucker, cornhole, cornhole, corp whore,'
            . ' corp whore, corpulent, cox, crabs, crack, cracker, crackwhore, crap, crappy, creampie, cretin, crikey, cripple, crotte, cum, cum chugger,'
            . ' cum chugger, cum dumpster, cum dumpster, cum freak, cum freak, cum guzzler, cum guzzler, cumbubble, cumdump, cumdump, cumdumpster, cumguzzler,'
            . ' cumjockey, cummer, cummin, cumming, cums, cumshot, cumshots, cumslut, cumstain, cumtart, cunilingus, cunillingus, cunnie, cunnilingus, cunny,'
            . ' cunt, c-u-n-t, cunt hair, cunt hair, cuntass, cuntbag, cuntbag, cuntface, cunthole, cunthunter, cuntlick, cuntlick, cuntlicker, cuntlicker,'
            . ' cuntlicking, cuntlicking, cuntrag, cunts, cuntsicle, cuntsicle, cuntslut, cunt-struck, cunt-struck, cus, cut rope, cut rope, cyalis, cyberfuc,'
            . ' cyberfuck, cyberfuck, cyberfucked, cyberfucked, cyberfucker, cyberfuckers, cyberfucking, cyberfucking, d0ng, d0uch3, d0uche, d1ck, d1ld0,'
            . ' d1ldo, dago, dagos, dammit, damn, damned, damnit, darkie, darn, date rape, daterape, dawgie-style, deep throat, deepthroat, deggo,'
            . ' dendrophilia, dick, dick head, dick hole, dick hole, dick shy, dick shy, dickbag, dickbeaters, dickdipper, dickface, dickflipper, dickfuck,'
            . ' dickfucker, dickhead, dickheads, dickhole, dickish, dick-ish, dickjuice, dickmilk, dickmonger, dickripper, dicks, dicksipper, dickslap,'
            . ' dick-sneeze, dicksucker, dicksucking, dicktickler, dickwad, dickweasel, dickweed, dickwhipper, dickwod, dickzipper, diddle, dike, dildo,'
            . ' dildos, diligaf, dillweed, dimwit, dingle, dingleberries, dingleberry, dink, dinks, dipship, dipshit, dirsa, dirty, dirty pillows,'
            . ' dirty sanchez, dirty Sanchez, div, dlck, dog style, dog-fucker, doggie style, doggiestyle, doggie-style, doggin, dogging, doggy style,'
            . ' doggystyle, doggy-style, dolcett, domination, dominatrix, dommes, dong, donkey punch, donkeypunch, donkeyribber, doochbag, doofus, dookie,'
            . ' doosh, dopey, double dong, double penetration, Doublelift, douch3, douche, douchebag, douchebags, douche-fag, douchewaffle, douchey,'
            . ' dp action, drunk, dry hump, duche, dumass, dumb ass, dumbass, dumbasses, Dumbcunt, dumbfuck, dumbshit, dummy, dumshit, dvda, dyke, dykes,'
            . ' eat a dick, eat a dick, eat hair pie, eat hair pie, eat my ass, ecchi, ejaculate, ejaculated, ejaculates, ejaculates, ejaculating, ejaculating,'
            . ' ejaculatings, ejaculation, ejakulate, erect, erection, erotic, erotism, escort, essohbee, eunuch, extacy, extasy, f u c k, f u c k e r, f.u.c.k,'
            . ' f_u_c_k, f4nny, facial, fack, fag, fagbag, fagfucker, fagg, fagged, fagging, faggit, faggitt, faggot, faggotcock, faggots, faggs, fagot, fagots,'
            . ' fags, fagtard, faig, faigt, fanny, fannybandit, fannyflaps, fannyfucker, fanyy, fart, fartknocker, fatass, fcuk, fcuker, fcuking, fecal, feck,'
            . ' fecker, feist, felch, felcher, felching, fellate, fellatio, feltch, feltcher, female squirting, femdom, fenian, fice, figging, fingerbang,'
            . ' fingerfuck, fingerfuck, fingerfucked, fingerfucked, fingerfucker, fingerfucker, fingerfuckers, fingerfucking, fingerfucking, fingerfucks,'
            . ' fingerfucks, fingering, fist fuck, fist fuck, fisted, fistfuck, fistfucked, fistfucked, fistfucker, fistfucker, fistfuckers, fistfuckers,'
            . ' fistfucking, fistfucking, fistfuckings, fistfuckings, fistfucks, fistfucks, fisting, fisty, flamer, flange, flaps, fleshflute, flog the log,'
            . ' flog the log, floozy, foad, foah, fondle, foobar, fook, fooker, foot fetish, footjob, foreskin, freex, frenchify, frigg, frigga, frotting,'
            . ' fubar, fuc, fuck, fuck, f-u-c-k, fuck buttons, fuck hole, fuck hole, Fuck off, fuck puppet, fuck puppet, fuck trophy, fuck trophy,'
            . ' fuck yo mama, fuck yo mama, fuck you, fucka, fuckass, fuck-ass, fuck-ass, fuckbag, fuck-bitch, fuck-bitch, fuckboy, fuckbrain, fuckbutt,'
            . ' fuckbutter, fucked, fuckedup, fucker, fuckers, fuckersucker, fuckface, fuckhead, fuckheads, fuckhole, fuckin, fucking, fuckings,'
            . ' fuckingshitmotherfucker, fuckme, fuckme, fuckmeat, fuckmeat, fucknugget, fucknut, fucknutt, fuckoff, fucks, fuckstick, fucktard, fuck-tard,'
            . ' fucktards, fucktart, fucktoy, fucktoy, fucktwat, fuckup, fuckwad, fuckwhit, fuckwit, fuckwitt, fudge packer, fudgepacker, fudge-packer,'
            . ' fuk, fuker, fukker, fukkers, fukkin, fuks, fukwhit, fukwit, fuq, futanari, fux, fux0r, fvck, fxck, gae, gai, gang bang, gangbang,'
            . ' gang-bang, gang-bang, gangbanged, gangbangs, ganja, gash, gassy ass, gassy ass, gay, gay sex, gayass, gaybob, gaydo, gayfuck, gayfuckist,'
            . ' gaylord, gays, gaysex, gaytard, gaywad, gender bender, genitals, gey, gfy, ghay, ghey, giant cock, gigolo, ginger, gippo, girl on,'
            . ' girl on top, girls gone wild, git, glans, goatcx, goatse, god, god damn, godamn, godamnit, goddam, god-dam, goddammit, goddamn, goddamned,'
            . ' god-damned, goddamnit, godsdamn, gokkun, golden shower, goldenshower, golliwog, gonad, gonads, goo girl, gooch, goodpoop, gook, gooks,'
            . ' goregasm, gringo, grope, group sex, gspot, g-spot, gtfo, guido, guro, h0m0, h0mo, ham flap, ham flap, hand job, handjob, hard core, hard on,'
            . ' hardcore, hardcoresex, he11, hebe, heeb, hell, hemp, hentai, heroin, herp, herpes, herpy, heshe, he-she, hircismus, hitler, hiv, ho, hoar,'
            . ' hoare, hobag, hoe, hoer, holy shit, hom0, homey, homo, homodumbshit, homoerotic, homoey, honkey, honky, hooch, hookah, hooker, hoor, hootch,'
            . ' hooter, hooters, hore, horniest, horny, hot carl, hot chick, hotsex, how to kill, how to murdep, how to murder, huge fat, hump, humped,'
            . ' humping, hun, hussy, hymen, iap, iberian slap, inbred, incest, injun, intercourse, jack off, jackass, jackasses, jackhole, jackoff, jack-off,'
            . ' jaggi, jagoff, jail bait, jailbait, jap, japs, jelly donut, jerk, jerk off, jerk0ff, jerkass, jerked, jerkoff, jerk-off, jigaboo, jiggaboo,'
            . ' jiggerboo, jism, jiz, jiz, jizm, jizm, jizz, jizzed, jock, juggs, jungle bunny, junglebunny, junkie, junky, kafir, kawk, kike, kikes, kill,'
            . ' kinbaku, kinkster, kinky, klan, knob, knob end, knobbing, knobead, knobed, knobend, knobhead, knobjocky, knobjokey, kock, kondum, kondums,'
            . ' kooch, kooches, kootch, kraut, kum, kummer, kumming, kums, kunilingus, kunja, kunt, kwif, kwif, kyke, l3i+ch, l3itch, labia, lameass, lardass,'
            . ' leather restraint, leather straight jacket, lech, lemon party, LEN, leper, lesbian, lesbians, lesbo, lesbos, lez, lezza/lesbo, lezzie, lmao,'
            . ' lmfao, loin, loins, lolita, looney, lovemaking, lube, lust, lusting, lusty, m0f0, m0fo, m45terbate, ma5terb8, ma5terbate, mafugly, mafugly,'
            . ' make me come, male squirting, mams, masochist, massa, masterb8, masterbat*, masterbat3, masterbate, master-bate, master-bate, masterbating,'
            . ' masterbation, masterbations, masturbate, masturbating, masturbation, maxi, mcfagget, menage a trois, menses, menstruate, menstruation, meth,'
            . ' m-fucking, mick, microphallus, middle finger, midget, milf, minge, minger, missionary position, mof0, mofo, mo-fo, molest, mong,'
            . ' moo moo foo foo, moolie, moron, mothafuck, mothafucka, mothafuckas, mothafuckaz, mothafucked, mothafucked, mothafucker, mothafuckers,'
            . ' mothafuckin, mothafucking, mothafucking, mothafuckings, mothafucks, mother fucker, mother fucker, motherfuck, motherfucka, motherfucked,'
            . ' motherfucker, motherfuckers, motherfuckin, motherfucking, motherfuckings, motherfuckka, motherfucks, mound of venus, mr hands, muff,'
            . ' muff diver, muff puff, muff puff, muffdiver, muffdiving, munging, munter, murder, mutha, muthafecker, muthafuckker, muther, mutherfucker,'
            . ' n1gga, n1gger, naked, nambla, napalm, nappy, nawashi, nazi, nazism, need the dick, need the dick, negro, neonazi, nig nog, nigaboo,'
            . ' nigg3r, nigg4h, nigga, niggah, niggas, niggaz, nigger, niggers, niggle, niglet, nig-nog, nimphomania, nimrod, ninny, ninnyhammer, nipple,'
            . ' nipples, nob, nob jokey, nobhead, nobjocky, nobjokey, nonce, nsfw images, nude, nudity, numbnuts, nut butter, nut butter, nut sack, nutsack,'
            . ' nutter, nympho, nymphomania, octopussy, old bag, omg, omorashi, one cup two girls, one guy one jar, opiate, opium, orally, organ, orgasim,'
            . ' orgasims, orgasm, orgasmic, orgasms, orgies, orgy, ovary, ovum, ovums, p.u.s.s.y., p0rn, paedophile, paki, panooch, pansy, pantie, panties,'
            . ' panty, pawn, pcp, pecker, peckerhead, pedo, pedobear, pedophile, pedophilia, pedophiliac, pee, peepee, pegging, penetrate, penetration, penial,'
            . ' penile, penis, penisbanger, penisfucker, penispuffer, perversion, phallic, phone sex, phonesex, phuck, phuk, phuked, phuking, phukked, phukking,'
            . ' phuks, phuq, piece of shit, pigfucker, pikey, pillowbiter, pimp, pimpis, pinko, piss, piss off, piss pig, pissed, pissed off, pisser, pissers,'
            . ' pisses, pisses, pissflaps, pissin, pissin, pissing, pissoff, pissoff, piss-off, pisspig, playboy, pleasure chest, pms, polack, pole smoker,'
            . ' polesmoker, pollock, ponyplay, poof, poon, poonani, poonany, poontang, poop, poop chute, poopchute, Poopuncher, porch monkey, porchmonkey,'
            . ' porn, porno, pornography, pornos, pot, potty, prick, pricks, prickteaser, prig, prince albert piercing, prod, pron, prostitute, prude, psycho,'
            . ' pthc, pube, pubes, pubic, pubis, punani, punanny, punany, punkass, punky, punta, puss, pusse, pussi, pussies, pussy, pussy fart, pussy fart,'
            . ' pussy palace, pussy palace, pussylicking, pussypounder, pussys, pust, puto, queaf, queaf, queef, queer, queerbait, queerhole, queero, queers,'
            . ' quicky, quim, racy, raghead, raging boner, rape, raped, raper, rapey, raping, rapist, raunch, rectal, rectum, rectus, reefer, reetard, reich,'
            . ' renob, retard, retarded, reverse cowgirl, revue, rimjaw, rimjob, rimming, ritard, rosy palm, rosy palm and her 5 sisters, rtard, r-tard,'
            . ' rubbish, rum, rump, rumprammer, ruski, rusty trombone, s hit, s&m, s.h.i.t., s.o.b., s_h_i_t, s0b, sadism, sadist, sambo, sand nigger, sandbar,'
            . ' sandbar, Sandler, sandnigger, sanger, santorum, sausage queen, sausage queen, scag, scantily, scat, schizo, schlong, scissoring, screw,'
            . ' screwed, screwing, scroat, scrog, scrot, scrote, scrotum, scrud, scum, seaman, seamen, seduce, seks, semen, sex, sexo, sexual, sexy, sh!+,'
            . ' sh!t, sh1t, s-h-1-t, shag, shagger, shaggin, shagging, shamedame, shaved beaver, shaved pussy, shemale, shi+, shibari, shirt lifter, shit,'
            . ' s-h-i-t, shit ass, shit fucker, shit fucker, shitass, shitbag, shitbagger, shitblimp, shitbrains, shitbreath, shitcanned, shitcunt, shitdick,'
            . ' shite, shiteater, shited, shitey, shitface, shitfaced, shitfuck, shitfull, shithead, shitheads, shithole, shithouse, shiting, shitings,'
            . ' shits, shitspitter, shitstain, shitt, shitted, shitter, shitters, shitters, shittier, shittiest, shitting, shittings, shitty, shiz, shiznit,'
            . ' shota, shrimping, sissy, skag, skank, skeet, skullfuck, slag, slanteye, slave, sleaze, sleazy, slope, slope, slut, slut bucket, slut bucket,'
            . ' slutbag, slutdumper, slutkiss, sluts, smartass, smartasses, smeg, smegma, smut, smutty, snatch, sniper, snowballing, snuff, s-o-b, sod off,'
            . ' sodom, sodomize, sodomy, son of a bitch, son of a motherless goat, son of a whore, son-of-a-bitch, souse, soused, spac, spade, sperm, spic,'
            . ' spick, spik, spiks, splooge, splooge moose, spooge, spook, spread legs, spunk, stfu, stiffy, stoned, strap on, strapon, strappado, strip,'
            . ' strip club, stroke, stupid, style doggy, suck, suckass, sucked, sucking, sucks, suicide girls, sultry women, sumofabiatch, swastika, swinger,'
            . ' t1t, t1tt1e5, t1tties, taff, taig, tainted love, taking the piss, tampon, tard, tart, taste my, tawdry, tea bagging, teabagging, teat, teets,'
            . ' teez, teste, testee, testes, testical, testicle, testis, threesome, throating, thrust, thug, thundercunt, tied up, tight white, tinkle, tit,'
            . ' tit wank, tit wank, titfuck, titi, tities, tits, titt, tittie5, tittiefucker, titties, titty, tittyfuck, tittyfucker, tittywank, titwank,'
            . ' toke, tongue in a, toots, topless, tosser, towelhead, tramp, tranny, transsexual, trashy, tribadism, trumped, tub girl, tubgirl, turd, tush,'
            . ' tushy, tw4t, twat, twathead, twatlips, twats, twatty, twatwaffle, twink, twinkie, two fingers, two fingers with tongue, two girls one cup,'
            . ' twunt, twunter, ugly, unclefucker, undies, undressing, unwed, upskirt, urethra play, urinal, urine, urophilia, uterus, uzi, v14gra, v1gra,'
            . ' vag, vagina, vajayjay, va-j-j, valium, venus mound, veqtable, viagra, vibrator, violet wand, virgin, vixen, vjayjay, vodka, vomit,'
            . ' vorarephilia, voyeur, vulgar, vulva, w00se, wad, wang, wank, wanker, wankjob, wanky, wazoo, wedgie, weed, weenie, weewee, weiner, weirdo,'
            . ' wench, wet dream, wetback, wh0re, wh0reface, white power, whiz, whoar, whoralicious, whore, whorealicious, whorebag, whored, whoreface,'
            . ' whorehopper, whorehouse, whores, whoring, wigger, willies, willy, window licker, wiseass, wiseasses, wog, womb, wop, wrapping men,'
            . ' wrinkled starfish, wtf, xrated, x-rated, xx, xxx, yaoi, yeasty, yellow showers, yid, yiffy, yobbo, zibbi, zoophilia, zubb';

    $str = strip_tags($str);
    $badWords = explode(",", $bad_words);
    return str_ireplace($badWords, "---", ($str));
}

function hasbadWords($str) {

    global $bad_words;
    $bad_words = '2 girls 1 cup, 2g1c, 4r5e, 5h1t, 5hit, a$$, a$$hole, a_s_s, a2m, a54, a55, a55hole, acrotomophilia, aeolus, ahole,'
            . ' alabama hot pocket, alaskan pipeline, anal, anal impaler, anal leakage, analprobe, anilingus, anus, apeshit, ar5e, areola,'
            . ' areole, arian, arrse, arse, arsehole, aryan, ass, ass fuck, ass fuck, ass hole, assbag, assbandit, assbang, assbanged, assbanger,'
            . ' assbangs, assbite, assclown, asscock, asscracker, asses, assface, assfaces, assfuck, assfucker, ass-fucker, assfukka, assgoblin,'
            . ' assh0le, asshat, ass-hat, asshead, assho1e, asshole, assholes, asshopper, ass-jabber, assjacker, asslick, asslicker, assmaster,'
            . ' assmonkey, assmucus, assmucus, assmunch, assmuncher, assnigger, asspirate, ass-pirate, assshit, assshole, asssucker, asswad, asswhole,'
            . ' asswipe, asswipes, auto erotic, autoerotic, axwound, azazel, azz, b!tch, b00bs, b17ch, b1tch, babeland, baby batter, baby juice, ball gag,'
            . ' ball gravy, ball kicking, ball licking, ball sack, ball sucking, ballbag, balls, ballsack, bampot, bang (one\'s) box, bangbros, bareback,'
            . ' barely legal, barenaked, barf, bastard, bastardo, bastards, bastinado, batty boy, bawdy, bbw, bdsm, beaner, beaners, beardedclam, beastial,'
            . ' beastiality, beatch, beaver, beaver cleaver, beaver lips, beef curtain, beef curtain, beef curtains, beeyotch, bellend, bender, beotch,'
            . ' bescumber, bestial, bestiality, bi+ch, biatch, big black, big breasts, big knockers, big tits, bigtits, bimbo, bimbos, bint, birdlock,'
            . ' bitch, bitch tit, bitch tit, bitchass, bitched, bitcher, bitchers, bitches, bitchin, bitching, bitchtits, bitchy, black cock, blonde action,'
            . ' blonde on blonde action, bloodclaat, bloody, bloody hell, blow job, blow me, blow mud, blow your load, blowjob, blowjobs, blue waffle,'
            . ' blue waffle, blumpkin, blumpkin, bod, bodily, boink, boiolas, bollock, bollocks, bollok, bollox, bondage, boned, boner, boners, bong,'
            . ' boob, boobies, boobs, booby, booger, bookie, boong, booobs, boooobs, booooobs, booooooobs, bootee, bootie, booty, booty call, booze,'
            . ' boozer, boozy, bosom, bosomy, breasts, Breeder, brotherfucker, brown showers, brunette action, buceta, bugger, bukkake, bull shit,'
            . ' bulldyke, bullet vibe, bullshit, bullshits, bullshitted, bullturds, bum, bum boy, bumblefuck, bumclat, bummer, buncombe, bung, bung hole,'
            . ' bunghole, bunny fucker, bust a load, bust a load, busty, butt, butt fuck, butt fuck, butt plug, buttcheeks, buttfuck, buttfucka, buttfucker,'
            . ' butthole, buttmuch, buttmunch, butt-pirate, buttplug, c.0.c.k, c.o.c.k., c.u.n.t, c0ck, c-0-c-k, c0cksucker, caca, cacafuego, cahone,'
            . ' camel toe, cameltoe, camgirl, camslut, camwhore, carpet muncher, carpetmuncher, cawk, cervix, chesticle, chi-chi man, chick with a dick,'
            . ' child-fucker, chinc, chincs, chink, chinky, choad, choade, choade, choc ice, chocolate rosebuds, chode, chodes, chota bags, chota bags,'
            . ' cipa, circlejerk, cl1t, cleveland steamer, climax, clit, clit licker, clit licker, clitface, clitfuck, clitoris, clitorus, clits, clitty,'
            . ' clitty litter, clitty litter, clover clamps, clunge, clusterfuck, cnut, cocain, cocaine, coccydynia, cock, c-o-c-k, cock pocket, cock pocket,'
            . ' cock snot, cock snot, cock sucker, cockass, cockbite, cockblock, cockburger, cockeye, cockface, cockfucker, cockhead, cockholster, cockjockey,'
            . ' cockknocker, cockknoker, Cocklump, cockmaster, cockmongler, cockmongruel, cockmonkey, cockmunch, cockmuncher, cocknose, cocknugget, cocks,'
            . ' cockshit, cocksmith, cocksmoke, cocksmoker, cocksniffer, cocksuck, cocksuck, cocksucked, cocksucked, cocksucker, cock-sucker, cocksuckers,'
            . ' cocksucking, cocksucks, cocksucks, cocksuka, cocksukka, cockwaffle, coffin dodger, coital, cok, cokmuncher, coksucka, commie, condom, coochie,'
            . ' coochy, coon, coonnass, coons, cooter, cop some wood, cop some wood, coprolagnia, coprophilia, corksucker, cornhole, cornhole, corp whore,'
            . ' corp whore, corpulent, cox, crabs, crack, cracker, crackwhore, crap, crappy, creampie, cretin, crikey, cripple, crotte, cum, cum chugger,'
            . ' cum chugger, cum dumpster, cum dumpster, cum freak, cum freak, cum guzzler, cum guzzler, cumbubble, cumdump, cumdump, cumdumpster, cumguzzler,'
            . ' cumjockey, cummer, cummin, cumming, cums, cumshot, cumshots, cumslut, cumstain, cumtart, cunilingus, cunillingus, cunnie, cunnilingus, cunny,'
            . ' cunt, c-u-n-t, cunt hair, cunt hair, cuntass, cuntbag, cuntbag, cuntface, cunthole, cunthunter, cuntlick, cuntlick, cuntlicker, cuntlicker,'
            . ' cuntlicking, cuntlicking, cuntrag, cunts, cuntsicle, cuntsicle, cuntslut, cunt-struck, cunt-struck, cus, cut rope, cut rope, cyalis, cyberfuc,'
            . ' cyberfuck, cyberfuck, cyberfucked, cyberfucked, cyberfucker, cyberfuckers, cyberfucking, cyberfucking, d0ng, d0uch3, d0uche, d1ck, d1ld0,'
            . ' d1ldo, dago, dagos, dammit, damn, damned, damnit, darkie, darn, date rape, daterape, dawgie-style, deep throat, deepthroat, deggo,'
            . ' dendrophilia, dick, dick head, dick hole, dick hole, dick shy, dick shy, dickbag, dickbeaters, dickdipper, dickface, dickflipper, dickfuck,'
            . ' dickfucker, dickhead, dickheads, dickhole, dickish, dick-ish, dickjuice, dickmilk, dickmonger, dickripper, dicks, dicksipper, dickslap,'
            . ' dick-sneeze, dicksucker, dicksucking, dicktickler, dickwad, dickweasel, dickweed, dickwhipper, dickwod, dickzipper, diddle, dike, dildo,'
            . ' dildos, diligaf, dillweed, dimwit, dingle, dingleberries, dingleberry, dink, dinks, dipship, dipshit, dirsa, dirty, dirty pillows,'
            . ' dirty sanchez, dirty Sanchez, div, dlck, dog style, dog-fucker, doggie style, doggiestyle, doggie-style, doggin, dogging, doggy style,'
            . ' doggystyle, doggy-style, dolcett, domination, dominatrix, dommes, dong, donkey punch, donkeypunch, donkeyribber, doochbag, doofus, dookie,'
            . ' doosh, dopey, double dong, double penetration, Doublelift, douch3, douche, douchebag, douchebags, douche-fag, douchewaffle, douchey,'
            . ' dp action, drunk, dry hump, duche, dumass, dumb ass, dumbass, dumbasses, Dumbcunt, dumbfuck, dumbshit, dummy, dumshit, dvda, dyke, dykes,'
            . ' eat a dick, eat a dick, eat hair pie, eat hair pie, eat my ass, ecchi, ejaculate, ejaculated, ejaculates, ejaculates, ejaculating, ejaculating,'
            . ' ejaculatings, ejaculation, ejakulate, erect, erection, erotic, erotism, escort, essohbee, eunuch, extacy, extasy, f u c k, f u c k e r, f.u.c.k,'
            . ' f_u_c_k, f4nny, facial, fack, fag, fagbag, fagfucker, fagg, fagged, fagging, faggit, faggitt, faggot, faggotcock, faggots, faggs, fagot, fagots,'
            . ' fags, fagtard, faig, faigt, fanny, fannybandit, fannyflaps, fannyfucker, fanyy, fart, fartknocker, fatass, fcuk, fcuker, fcuking, fecal, feck,'
            . ' fecker, feist, felch, felcher, felching, fellate, fellatio, feltch, feltcher, female squirting, femdom, fenian, fice, figging, fingerbang,'
            . ' fingerfuck, fingerfuck, fingerfucked, fingerfucked, fingerfucker, fingerfucker, fingerfuckers, fingerfucking, fingerfucking, fingerfucks,'
            . ' fingerfucks, fingering, fist fuck, fist fuck, fisted, fistfuck, fistfucked, fistfucked, fistfucker, fistfucker, fistfuckers, fistfuckers,'
            . ' fistfucking, fistfucking, fistfuckings, fistfuckings, fistfucks, fistfucks, fisting, fisty, flamer, flange, flaps, fleshflute, flog the log,'
            . ' flog the log, floozy, foad, foah, fondle, foobar, fook, fooker, foot fetish, footjob, foreskin, freex, frenchify, frigg, frigga, frotting,'
            . ' fubar, fuc, fuck, fuck, f-u-c-k, fuck buttons, fuck hole, fuck hole, Fuck off, fuck puppet, fuck puppet, fuck trophy, fuck trophy,'
            . ' fuck yo mama, fuck yo mama, fuck you, fucka, fuckass, fuck-ass, fuck-ass, fuckbag, fuck-bitch, fuck-bitch, fuckboy, fuckbrain, fuckbutt,'
            . ' fuckbutter, fucked, fuckedup, fucker, fuckers, fuckersucker, fuckface, fuckhead, fuckheads, fuckhole, fuckin, fucking, fuckings,'
            . ' fuckingshitmotherfucker, fuckme, fuckme, fuckmeat, fuckmeat, fucknugget, fucknut, fucknutt, fuckoff, fucks, fuckstick, fucktard, fuck-tard,'
            . ' fucktards, fucktart, fucktoy, fucktoy, fucktwat, fuckup, fuckwad, fuckwhit, fuckwit, fuckwitt, fudge packer, fudgepacker, fudge-packer,'
            . ' fuk, fuker, fukker, fukkers, fukkin, fuks, fukwhit, fukwit, fuq, futanari, fux, fux0r, fvck, fxck, gae, gai, gang bang, gangbang,'
            . ' gang-bang, gang-bang, gangbanged, gangbangs, ganja, gash, gassy ass, gassy ass, gay, gay sex, gayass, gaybob, gaydo, gayfuck, gayfuckist,'
            . ' gaylord, gays, gaysex, gaytard, gaywad, gender bender, genitals, gey, gfy, ghay, ghey, giant cock, gigolo, ginger, gippo, girl on,'
            . ' girl on top, girls gone wild, git, glans, goatcx, goatse, god, god damn, godamn, godamnit, goddam, god-dam, goddammit, goddamn, goddamned,'
            . ' god-damned, goddamnit, godsdamn, gokkun, golden shower, goldenshower, golliwog, gonad, gonads, goo girl, gooch, goodpoop, gook, gooks,'
            . ' goregasm, gringo, grope, group sex, gspot, g-spot, gtfo, guido, guro, h0m0, h0mo, ham flap, ham flap, hand job, handjob, hard core, hard on,'
            . ' hardcore, hardcoresex, he11, hebe, heeb, hell, hemp, hentai, heroin, herp, herpes, herpy, heshe, he-she, hircismus, hitler, hiv, ho, hoar,'
            . ' hoare, hobag, hoe, hoer, holy shit, hom0, homey, homo, homodumbshit, homoerotic, homoey, honkey, honky, hooch, hookah, hooker, hoor, hootch,'
            . ' hooter, hooters, hore, horniest, horny, hot carl, hot chick, hotsex, how to kill, how to murdep, how to murder, huge fat, hump, humped,'
            . ' humping, hun, hussy, hymen, iap, iberian slap, inbred, incest, injun, intercourse, jack off, jackass, jackasses, jackhole, jackoff, jack-off,'
            . ' jaggi, jagoff, jail bait, jailbait, jap, japs, jelly donut, jerk, jerk off, jerk0ff, jerkass, jerked, jerkoff, jerk-off, jigaboo, jiggaboo,'
            . ' jiggerboo, jism, jiz, jiz, jizm, jizm, jizz, jizzed, jock, juggs, jungle bunny, junglebunny, junkie, junky, kafir, kawk, kike, kikes, kill,'
            . ' kinbaku, kinkster, kinky, klan, knob, knob end, knobbing, knobead, knobed, knobend, knobhead, knobjocky, knobjokey, kock, kondum, kondums,'
            . ' kooch, kooches, kootch, kraut, kum, kummer, kumming, kums, kunilingus, kunja, kunt, kwif, kwif, kyke, l3i+ch, l3itch, labia, lameass, lardass,'
            . ' leather restraint, leather straight jacket, lech, lemon party, LEN, leper, lesbian, lesbians, lesbo, lesbos, lez, lezza/lesbo, lezzie, lmao,'
            . ' lmfao, loin, loins, lolita, looney, lovemaking, lube, lust, lusting, lusty, m0f0, m0fo, m45terbate, ma5terb8, ma5terbate, mafugly, mafugly,'
            . ' make me come, male squirting, mams, masochist, massa, masterb8, masterbat*, masterbat3, masterbate, master-bate, master-bate, masterbating,'
            . ' masterbation, masterbations, masturbate, masturbating, masturbation, maxi, mcfagget, menage a trois, menses, menstruate, menstruation, meth,'
            . ' m-fucking, mick, microphallus, middle finger, midget, milf, minge, minger, missionary position, mof0, mofo, mo-fo, molest, mong,'
            . ' moo moo foo foo, moolie, moron, mothafuck, mothafucka, mothafuckas, mothafuckaz, mothafucked, mothafucked, mothafucker, mothafuckers,'
            . ' mothafuckin, mothafucking, mothafucking, mothafuckings, mothafucks, mother fucker, mother fucker, motherfuck, motherfucka, motherfucked,'
            . ' motherfucker, motherfuckers, motherfuckin, motherfucking, motherfuckings, motherfuckka, motherfucks, mound of venus, mr hands, muff,'
            . ' muff diver, muff puff, muff puff, muffdiver, muffdiving, munging, munter, murder, mutha, muthafecker, muthafuckker, muther, mutherfucker,'
            . ' n1gga, n1gger, naked, nambla, napalm, nappy, nawashi, nazi, nazism, need the dick, need the dick, negro, neonazi, nig nog, nigaboo,'
            . ' nigg3r, nigg4h, nigga, niggah, niggas, niggaz, nigger, niggers, niggle, niglet, nig-nog, nimphomania, nimrod, ninny, ninnyhammer, nipple,'
            . ' nipples, nob, nob jokey, nobhead, nobjocky, nobjokey, nonce, nsfw images, nude, nudity, numbnuts, nut butter, nut butter, nut sack, nutsack,'
            . ' nutter, nympho, nymphomania, octopussy, old bag, omg, omorashi, one cup two girls, one guy one jar, opiate, opium, orally, organ, orgasim,'
            . ' orgasims, orgasm, orgasmic, orgasms, orgies, orgy, ovary, ovum, ovums, p.u.s.s.y., p0rn, paedophile, paki, panooch, pansy, pantie, panties,'
            . ' panty, pawn, pcp, pecker, peckerhead, pedo, pedobear, pedophile, pedophilia, pedophiliac, pee, peepee, pegging, penetrate, penetration, penial,'
            . ' penile, penis, penisbanger, penisfucker, penispuffer, perversion, phallic, phone sex, phonesex, phuck, phuk, phuked, phuking, phukked, phukking,'
            . ' phuks, phuq, piece of shit, pigfucker, pikey, pillowbiter, pimp, pimpis, pinko, piss, piss off, piss pig, pissed, pissed off, pisser, pissers,'
            . ' pisses, pisses, pissflaps, pissin, pissin, pissing, pissoff, pissoff, piss-off, pisspig, playboy, pleasure chest, pms, polack, pole smoker,'
            . ' polesmoker, pollock, ponyplay, poof, poon, poonani, poonany, poontang, poop, poop chute, poopchute, Poopuncher, porch monkey, porchmonkey,'
            . ' porn, porno, pornography, pornos, pot, potty, prick, pricks, prickteaser, prig, prince albert piercing, prod, pron, prostitute, prude, psycho,'
            . ' pthc, pube, pubes, pubic, pubis, punani, punanny, punany, punkass, punky, punta, puss, pusse, pussi, pussies, pussy, pussy fart, pussy fart,'
            . ' pussy palace, pussy palace, pussylicking, pussypounder, pussys, pust, puto, queaf, queaf, queef, queer, queerbait, queerhole, queero, queers,'
            . ' quicky, quim, racy, raghead, raging boner, rape, raped, raper, rapey, raping, rapist, raunch, rectal, rectum, rectus, reefer, reetard, reich,'
            . ' renob, retard, retarded, reverse cowgirl, revue, rimjaw, rimjob, rimming, ritard, rosy palm, rosy palm and her 5 sisters, rtard, r-tard,'
            . ' rubbish, rum, rump, rumprammer, ruski, rusty trombone, s hit, s&m, s.h.i.t., s.o.b., s_h_i_t, s0b, sadism, sadist, sambo, sand nigger, sandbar,'
            . ' sandbar, Sandler, sandnigger, sanger, santorum, sausage queen, sausage queen, scag, scantily, scat, schizo, schlong, scissoring, screw,'
            . ' screwed, screwing, scroat, scrog, scrot, scrote, scrotum, scrud, scum, seaman, seamen, seduce, seks, semen, sex, sexo, sexual, sexy, sh!+,'
            . ' sh!t, sh1t, s-h-1-t, shag, shagger, shaggin, shagging, shamedame, shaved beaver, shaved pussy, shemale, shi+, shibari, shirt lifter, shit,'
            . ' s-h-i-t, shit ass, shit fucker, shit fucker, shitass, shitbag, shitbagger, shitblimp, shitbrains, shitbreath, shitcanned, shitcunt, shitdick,'
            . ' shite, shiteater, shited, shitey, shitface, shitfaced, shitfuck, shitfull, shithead, shitheads, shithole, shithouse, shiting, shitings,'
            . ' shits, shitspitter, shitstain, shitt, shitted, shitter, shitters, shitters, shittier, shittiest, shitting, shittings, shitty, shiz, shiznit,'
            . ' shota, shrimping, sissy, skag, skank, skeet, skullfuck, slag, slanteye, slave, sleaze, sleazy, slope, slope, slut, slut bucket, slut bucket,'
            . ' slutbag, slutdumper, slutkiss, sluts, smartass, smartasses, smeg, smegma, smut, smutty, snatch, sniper, snowballing, snuff, s-o-b, sod off,'
            . ' sodom, sodomize, sodomy, son of a bitch, son of a motherless goat, son of a whore, son-of-a-bitch, souse, soused, spac, spade, sperm, spic,'
            . ' spick, spik, spiks, splooge, splooge moose, spooge, spook, spread legs, spunk, stfu, stiffy, stoned, strap on, strapon, strappado, strip,'
            . ' strip club, stroke, stupid, style doggy, suck, suckass, sucked, sucking, sucks, suicide girls, sultry women, sumofabiatch, swastika, swinger,'
            . ' t1t, t1tt1e5, t1tties, taff, taig, tainted love, taking the piss, tampon, tard, tart, taste my, tawdry, tea bagging, teabagging, teat, teets,'
            . ' teez, teste, testee, testes, testical, testicle, testis, threesome, throating, thrust, thug, thundercunt, tied up, tight white, tinkle, tit,'
            . ' tit wank, tit wank, titfuck, titi, tities, tits, titt, tittie5, tittiefucker, titties, titty, tittyfuck, tittyfucker, tittywank, titwank,'
            . ' toke, tongue in a, toots, topless, tosser, towelhead, tramp, tranny, transsexual, trashy, tribadism, trumped, tub girl, tubgirl, turd, tush,'
            . ' tushy, tw4t, twat, twathead, twatlips, twats, twatty, twatwaffle, twink, twinkie, two fingers, two fingers with tongue, two girls one cup,'
            . ' twunt, twunter, ugly, unclefucker, undies, undressing, unwed, upskirt, urethra play, urinal, urine, urophilia, uterus, uzi, v14gra, v1gra,'
            . ' vag, vagina, vajayjay, va-j-j, valium, venus mound, veqtable, viagra, vibrator, violet wand, virgin, vixen, vjayjay, vodka, vomit,'
            . ' vorarephilia, voyeur, vulgar, vulva, w00se, wad, wang, wank, wanker, wankjob, wanky, wazoo, wedgie, weed, weenie, weewee, weiner, weirdo,'
            . ' wench, wet dream, wetback, wh0re, wh0reface, white power, whiz, whoar, whoralicious, whore, whorealicious, whorebag, whored, whoreface,'
            . ' whorehopper, whorehouse, whores, whoring, wigger, willies, willy, window licker, wiseass, wiseasses, wog, womb, wop, wrapping men,'
            . ' wrinkled starfish, wtf, xrated, x-rated, xx, xxx, yaoi, yeasty, yellow showers, yid, yiffy, yobbo, zibbi, zoophilia, zubb';

    $badWords = explode(",", $badwords);
    foreach ($badWords as $key => $value) {
        if (mb_strpos($str, $value) !== FALSE)
            return true;
    }
    return false;
}

function base_url_lang() {

    return base_url() . $CI->lang . "/";
}

function shortcode($content) {


    $pattern = '/\[(.*?)\]/';
    $regex = '/(\w+)\s*=\s*"(.*?)"/';
    $shorcode = array();

    preg_match_all($pattern, $content, $matches);

    foreach ($matches[1] as $key => $value) {

        preg_match_all($regex, $value, $matches2);
        foreach ($matches2[1] as $key2 => $value2) {

            $shorcode[$key][$value2] = $matches2[2][$key2];
        }
        if ($shorcode[$key]['type'])
            $shorcode[$key]['shortcode'] = $matches[0][$key];
    }
    return $shorcode;
}

function processKeyWords($array) {

    $total = 0;
    foreach ($array as $key => $value) {
        $total = $total + $value;
    }

    foreach ($array as $key => $value) {
        $array[$key] = round(($value * 100) / $total);
    }
    return $array;
}

function rip_tags($string) {

// ----- remove HTML TAGs ----- 
    $string = preg_replace('/<[^>]*>/', ' ', $string);

// ----- remove control characters ----- 
    $string = str_replace("\r", '', $string);    // --- replace with empty space
    $string = str_replace("\n", ' ', $string);   // --- replace with space
    $string = str_replace("\t", ' ', $string);   // --- replace with space
// ----- remove multiple spaces ----- 
    $string = trim(preg_replace('/ {2,}/', ' ', $string));

    return $string;
}

function getTextBetweenTags($string, $tagname) {
    $d = new DOMDocument();
    @$d->loadHTML($string);
    $return = array();
    foreach ($d->getElementsByTagName($tagname) as $item) {
        $return[] = $item->textContent;
    }
    return $return;
}

function getIPInfo($ip) {

    return json_decode(_curl("http://ip-api.com/json/$ip"));
}

/**
 * get_redirect_url()
 * Gets the address that the provided URL redirects to,
 * or FALSE if there's no redirect. 
 *
 * @param string $url
 * @return string
 */
function get_redirect_url($url) {
    $redirect_url = null;

    $url_parts = @parse_url($url);
    if (!$url_parts)
        return false;
    if (!isset($url_parts['host']))
        return false; //can't process relative URLs
    if (!isset($url_parts['path']))
        $url_parts['path'] = '/';

    $sock = fsockopen($url_parts['host'], (isset($url_parts['port']) ? (int) $url_parts['port'] : 80), $errno, $errstr, 30);
    if (!$sock)
        return false;

    $request = "HEAD " . $url_parts['path'] . (isset($url_parts['query']) ? '?' . $url_parts['query'] : '') . " HTTP/1.1\r\n";
    $request .= 'Host: ' . $url_parts['host'] . "\r\n";
    $request .= "Connection: Close\r\n\r\n";
    fwrite($sock, $request);
    $response = '';
    while (!feof($sock))
        $response .= fread($sock, 8192);
    fclose($sock);

    if (preg_match('/^Location: (.+?)$/m', $response, $matches)) {
        if (substr($matches[1], 0, 1) == "/")
            return $url_parts['scheme'] . "://" . $url_parts['host'] . trim($matches[1]);
        else
            return trim($matches[1]);
    } else {
        return false;
    }
}

/**
 * get_all_redirects()
 * Follows and collects all redirects, in order, for the given URL. 
 *
 * @param string $url
 * @return array
 */
function get_all_redirects($url) {
    $redirects = array();
    while ($newurl = get_redirect_url($url)) {
        if (in_array($newurl, $redirects)) {
            break;
        }
        $redirects[] = $newurl;
        $url = $newurl;
    }
    return $redirects;
}

/**
 * get_final_url()
 * Gets the address that the URL ultimately leads to. 
 * Returns $url itself if it isn't a redirect.
 *
 * @param string $url
 * @return string
 */
function get_final_url($url) {
    $redirects = get_all_redirects($url);
    if (count($redirects) > 0) {
        return array_pop($redirects);
    } else {
        return $url;
    }
}

function getEfectiveUrl($url, $curl_loops = 0) {

    if (!ini_get('open_basedir')) {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        ;
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        $info = curl_getinfo($ch);

        curl_close($ch);
        if ($info['url'])
            return $info['url'];
        else
            return $url;
    }

    return get_final_url($url);

    if ($curl_loops > 4)
        return $url;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FORBID_REUSE, false);
    ;
    $data = curl_exec($ch);


    list($header, $data) = explode("\n\n", $data, 2);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);


    if ($http_code == 301 || $http_code == 302 || $http_code == 307) {
        $matches = array();
        preg_match('/Location:(.*?)\n/', $header, $matches);
        $url = @parse_url(trim(array_pop($matches)));

        if (!$url) {
//couldn't process the url to redirect to
            $curl_loops = 0;
            return false;
        }

        $last_url = parse_url(curl_getinfo($ch, CURLINFO_EFFECTIVE_URL));

        $curl_loops++;
        if (!$url['scheme'])
            $url['scheme'] = $last_url['scheme'];
        if (!$url['host'])
            $url['host'] = $last_url['host'];
        if (!$url['path'])
            $url['path'] = $last_url['path'];

        if (substr($url_temp, -1) != "/")
            $url_temp = $url_temp . "/";
        if (substr($url['path'], -1) == "/")
            $url['path'] = substr($url['path'], 0, -1);
        if (!$url['host'])
            $new_url = $url_temp . $url['path'] . ($url['query'] ? '?' . $url['query'] : '');
        else
            $new_url = $url['scheme'] . '://' . $url['host'] . $url['path'] . ($url['query'] ? '?' . $url['query'] : '');



        return getEfectiveUrl($new_url, $curl_loops);
    } else {
        $curl_loops = 0;
        return $url;
    }
}

function redirect2refer() {

    if ($CI->session->userdata('referrer_url')) {
//Store in a variable so that can unset the session
        $redirect_back = $CI->session->userdata('referrer_url');
        if (strpos($redirect_back, base_url()) === false) {
            $redirect_back = base_url();
        }
        $CI->session->unset_userdata('referrer_url');
        redirect($redirect_back, 'location');
        exit;
    } else {
        redirect(base_url(), 'location');
        exit;
    }
}

function getCharset($html) {
    $r = "/charset=\"(.+?)\"/";
    preg_match($r, $html, $charset_a);
    if (@$charset_a[1])
        $charset = $charset_a[1];
    else {
        $r = '@content="([\\w/]+)(;\\s+charset=([^\\s"]+))?@i';
        preg_match($r, $html, $charset_a);

        if (@$charset_a[3])
            $charset = $charset_a[3];
    }
    return @$charset;
}

function strBytes($str) {
// STRINGS ARE EXPECTED TO BE IN ASCII OR UTF-8 FORMAT
// Number of characters in string
    $strlen_var = strlen($str);

// string bytes counter
    $d = 0;

    /*
     * Iterate over every character in the string,
     * escaping with a slash or encoding to UTF-8 where necessary
     */
    for ($c = 0; $c < $strlen_var; ++$c) {
        $ord_var_c = ord($str{$c});
        switch (true) {
            case(($ord_var_c >= 0x20) && ($ord_var_c <= 0x7F)):
// characters U-00000000 - U-0000007F (same as ASCII)
                $d++;
                break;
            case(($ord_var_c & 0xE0) == 0xC0):
// characters U-00000080 - U-000007FF, mask 110XXXXX
                $d += 2;
                break;
            case(($ord_var_c & 0xF0) == 0xE0):
// characters U-00000800 - U-0000FFFF, mask 1110XXXX
                $d += 3;
                break;
            case(($ord_var_c & 0xF8) == 0xF0):
// characters U-00010000 - U-001FFFFF, mask 11110XXX
                $d += 4;
                break;
            case(($ord_var_c & 0xFC) == 0xF8):
// characters U-00200000 - U-03FFFFFF, mask 111110XX
                $d += 5;
                break;
            case(($ord_var_c & 0xFE) == 0xFC):
// characters U-04000000 - U-7FFFFFFF, mask 1111110X
                $d += 6;
                break;
            default:
                $d++;
        };
    };
    return $d;
}

//---------------------------------------------------------------

$domain = str_replace('www.', '', parse_url($_REQUEST['domain'])['host']);//'ajio.com';
$domain = trim($domain);
$domain_curl = "http://" . $domain;

if (!is_valid_domain_name($domain_curl))
    return array("error" => "Your website is down or not is valid");

$stats = getStatsData($domain);

//echo "<h3>Domain Name: $domain </h3>";
$metaTitle = validateLenght($stats['metaTitle'], 60, 5); // TITLE
$metaDescription = validateLenght($stats['metaDescription'], 150, 10); // DESCRIPTION
$url_real = validateLenght($stats['url_real'], 50, 1); // EFFECTIVE URL
$body_excerpt = badWords(more($stats['body'], 250)); // BODY CONTENT EXCERPT
$keyw = (extractKeyWords($stats['body']));
if (strlen($body_excerpt) < 20)
    $body_excerpt = false;
$keywords = explode(",", $stats['metaKeywords']);
$keywordsCount = count($keywords);
if ($stats['metaKeywords'] == '') {
    $keywords = false;
    $keywordsCount = 0;
}
foreach ($keywords as $key => $value) {
    $value = rtrim(ltrim(badWords($value)));
    if (trim($value) != '') {
        //echo $value; 
    }
}

// TABLE STARTS FROM HERE

foreach ($keyw as $key => $value) { // SAME FOR $stats['metaDescription'], $stats['url']
    if (mb_strpos(mb_strtolower($stats['metaTitle']), mb_strtolower($key)) !== FALSE) {
        'tick';
    } else {
        'cross';
    }
}

$keyw = (extractKeyWords($stats['body']));
foreach ($keyw as $key => $value) {
    $key = badWords($key);
    if (inHX($stats['body'], $key, "h1")) { // SAME FOR ALL HEADING TAGS
        'tick';
    } else {
        'cross';
    }
}

// TABLE ENDS HERE

/* GOOGLE PREVIEW */
if ($stats['metaTitle']) { //TITLE IN BLUE
    //echo $stats['metaTitle'];
} else {
    //echo badWords($stats['url']);
}

$site_url = $stats['url']; // SITE URL IN GREEN
if ($stats['url_real'])
    $site_url = $stats['url_real'];
//echo badWords($site_url);

if ($stats['metaDescription']) { // DESCRIPTION IN DEFAULT COLOR (BLACK)
    //echo $stats['metaDescription'];
} else {
    //echo $body_excerpt;
}

/* GOOGLE PREVIEW END */

$detected[0] = ("File Not Found");
$detected[1] = ("File Detected");
//echo $detected[$stats['robots']];
//echo $detected[$stats['sitemap']];

$document_size = strBytes($stats['body']);
$text_size = strBytes(strip_tags($stats['body']));
$code_size = $document_size - $text_size;
$text_ratio = (($text_size * 100) / $document_size);

$result = array();
$arrayResponseCystom = array();
$arrayWebsiteMetaInfo = array();

foreach ($stats as $key => $value) {
    if ($key == 'body')
        continue;
    if (!in_array($key, array('charset', 'url', 'metaTitle', 'metaDescription', 'metaKeywords', 'robots', 'sitemap', 'url_real'))) {
        array_push($arrayResponseCystom, '<i class="fa fa-circle text-info"></i> ' . $value);
    } else {
        $arrayWebsiteMetaInfo[$key] = $value;
    }
    //echo "$key => $value<br />";
}
$result['response_header'] = $arrayResponseCystom;
$result['website_meta_info'] = $arrayWebsiteMetaInfo;
$cloudKeywords = '';
foreach($keyw as $key=>$value){
    $cloudKeywords .= '<span class="badge badge-info" style="font-size:13px; padding:8px;margin:2px;">'.$key.' ('.$value.')</span>&nbsp;&nbsp;';
}
$result['cloud_keyword'] = $cloudKeywords;
$result['gsearch'] = '<div class="gsearch" style="padding: 10px;border: 5px solid rgba(0, 0, 0, .08);font-size: 14px;border-radius: 3px;font-family: helvetica,arial,sans-serif;">
                            <div class="title" style="line-height: 17px;font-size: 16px;color: #00E;font-family: helvetica,arial,sans-serif;text-overflow: ellipsis;white-space: nowrap;overflow-x: hidden;width: 420px;">'.$result['website_meta_info']['metaTitle'].' </div>
                            <div class="url" style="font-size: 13px;line-height: 20px;color: #00802A;font-weight: bold;font-family: helvetica,arial,sans-serif;">'.$result['website_meta_info']['url_real'].'</div>
                            <div class="desc" style="line-height: 18px;font-size: 13px;color: rgba(0, 0, 0, .8);font-family: helvetica,arial,sans-serif;">
                            '.$result['website_meta_info']['metaDescription'].'</div>
                    </div>';
?>
<?php

$html = '';
$html .= '<table class="consistency table" style="width: 100%; border: solid 1px #ccc; border-radius: 10px;" cellpadding="1" cellspacing="1">
    <tr class="header">
        <td style="text-align: center; border: solid 2px #ccc; text-transform: uppercase; padding: 5px;">Keyword</td>
        <td style="text-align: center; border: solid 2px #ccc; text-transform: uppercase; padding: 5px;">Freq</td>
        <td style="text-align: center; border: solid 2px #ccc; text-transform: uppercase; padding: 5px;">Title</td>
        <td style="text-align: center; border: solid 2px #ccc; text-transform: uppercase; padding: 5px;">Desc</td>
        <td style="text-align: center; border: solid 2px #ccc; text-transform: uppercase; padding: 5px;">Domain</td>
        <td style="text-align: center; border: solid 2px #ccc; text-transform: uppercase; padding: 5px;">H1</td>
        <td style="text-align: center; border: solid 2px #ccc; text-transform: uppercase; padding: 5px;">H2</td>
        <td style="text-align: center; border: solid 2px #ccc; text-transform: uppercase; padding: 5px;">H3</td>
        <td style="text-align: center; border: solid 2px #ccc; text-transform: uppercase; padding: 5px;">H4</td>
    </tr>';
?>

<?php

foreach ($keyw as $key => $value) {
    $html .= '<tr>
            <td style="text-align: center; border: solid 2px #ccc; padding: 5px;">' . more(badWords($key), 20) . '</td>
            <td style="text-align: center; border: solid 2px #ccc; padding: 5px;">' . $value . '</td>
            <td style="text-align: center; border: solid 2px #ccc; padding: 5px;">';

    if (mb_strpos(mb_strtolower($stats['metaTitle']), mb_strtolower($key)) !== FALSE) {
        $html .= '<i class="fa fa-check-square-o" style="font-size:15px; color: green;"></i>';
    } else {
        $html .= '<i class="fa fa-times-circle-o" style="font-size:15px; color: red;"></i>';
    }
    $html .= '</td><td style="text-align: center; border: solid 2px #ccc; padding: 5px;">';

    if (mb_strpos(mb_strtolower($stats['metaDescription']), mb_strtolower($key)) !== FALSE) {
        $html .= '<i class="fa fa-check-square-o" style="font-size:15px; color: green;"></i>';
    } else {
        $html .= '<i class="fa fa-times-circle-o" style="font-size:15px; color: red;"></i>';
    }
    $html .= '</td><td style="text-align: center; border: solid 2px #ccc; padding: 5px;">';
    ?>

    <?php

    if (mb_strpos(mb_strtolower($stats['url']), mb_strtolower($key)) !== FALSE) {
        $html .= '<i class="fa fa-check-square-o" style="font-size:15px; color: green;"></i>';
    } else {
        $html .= '<i class="fa fa-times-circle-o" style="font-size:15px; color: red;"></i>';
    }
    $html .= '</td>	<td style="text-align: center; border: solid 2px #ccc; padding: 5px;">';
    if (inHX($stats['body'], $key, "h1")) {
        $html .= '<i class="fa fa-check-square-o" style="font-size:15px; color: green;"></i>';
    } else {
        $html .= '<i class="fa fa-times-circle-o" style="font-size:15px; color: red;"></i>';
    }
    $html .= '</td>	<td style="text-align: center; border: solid 2px #ccc; padding: 5px;">';

    if (inHX($stats['body'], $key, "h2")) {
        $html .= '<i class="fa fa-check-square-o" style="font-size:15px; color: green;"></i>';
    } else {
        $html .= '<i class="fa fa-times-circle-o" style="font-size:15px; color: red;"></i>';
    }
    $html .= '</td><td style="text-align: center; border: solid 2px #ccc; padding: 5px;">';
    if (inHX($stats['body'], $key, "h3")) {
        $html .= '<i class="fa fa-check-square-o" style="font-size:15px; color: green;"></i>';
    } else {
        $html .= '<i class="fa fa-times-circle-o" style="font-size:15px; color: red;"></i>';
    }
    $html .= '</td><td style="text-align: center; border: solid 2px #ccc; padding: 5px;">';
    if (inHX($stats['body'], $key, "h4")) {
        $html .= '<i class="fa fa-check-square-o" style="font-size:15px; color: green;"></i>';
    } else {
        $html .= '<i class="fa fa-times-circle-o" style="font-size:15px; color: red;"></i>';
    }
    $html .= '</td></tr>';
}
$html .= '</table>';

$result['table_details'] = $html;
echo json_encode($result);
?>
