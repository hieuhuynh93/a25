<?php

function clean_domain_name($domain) {

    $domain = trim($domain);
    $domain = strtolower($domain);

    $domain = str_replace("www.", "", $domain);
    $domain = str_replace("http://", "", $domain);
    $domain = str_replace("https://", "", $domain);
    $domain = str_replace("/", "", $domain);

    return $domain;
}

function getContentFromSearchEngine($url, $proxy = '') {

    $ch = curl_init(); // initialize curl handle
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
    curl_setopt($ch, CURLOPT_AUTOREFERER, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7);
    curl_setopt($ch, CURLOPT_REFERER, 'http://' . $url);
    curl_setopt($ch, CURLOPT_URL, $url); // set url to post to
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // allow redirects
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return into a variable
    curl_setopt($ch, CURLOPT_TIMEOUT, 30); // times out after 50s
    curl_setopt($ch, CURLOPT_POST, 0); // set POST method

    /*     * *** Proxy set for google . if lot of request gone, google will stop reponding. That's why it's should use some proxy **** */
    /*     * ** Using proxy of public and private proxy both *** */

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $content = curl_exec($ch); // run the whole process	


    /*     * **If it returns http code without 200 means caught by google, or redirect to captcha page**** */

    $get_info = curl_getinfo($ch);
    $httpcode = $get_info['http_code'];

    if ($httpcode != '200') {
        return 0;
    }

    curl_close($ch);

    /** Remove html tag line <br> <b> in the email * */
    $content = str_replace("<b>", "", $content);
    $content = str_replace("</b>", "", $content);
    $content = str_replace("</br>", "", $content);
    $content = str_replace("<br>", "", $content);
    $content = str_replace("<br/>", "", $content);

    /*     * * These are specially for the bing search engine ** */
    $content = str_replace("<strong>", "", $content);
    $content = str_replace("</strong>", "", $content);
    $content = str_replace(",", "", $content);

    return $content;
}

function get_domain_only($url) {
    $url = str_replace("www.", "", $url);
    $url = str_replace("WWW.", "", $url);

    if (!preg_match("@^https?://@i", $url) && !preg_match("@^ftps?://@i", $url)) {
        $url = "http://" . $url;
    }


    $parsed = @parse_url($url);

    return $parsed['host'];
}

function similar_site_from_google($domain) {

    $domain = clean_domain_name($domain);

    $url = "www.google.com/search?q=related:{$domain}&num=20";
    $content = getContentFromSearchEngine($url);
    $similar_site = array();

    if ($content) {
        preg_match_all('~<a.*?href="/url\?q=(.*?)">~', $content, $matches);
        foreach ($matches[1] as $info) {
            $similar_site[] = trim(get_domain_only($info));
        }
    }

    return $similar_site;
}

$sim = similar_site_from_google('indiatimes.com');

echo '<pre>';
print_r($sim);
echo '</pre>';
?>