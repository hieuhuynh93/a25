<?php

ini_set('max_execution_time', 300);

function googleRank($searchDomain, $keyword, $position = 200, $googleDomain = 'google.com') {

    $currentPage = 1;
    $resPerPage = 0;
    $totalCount = 1;

    $googleUrl = "https://www." . $googleDomain . "/search?hl=en&q=" . urlencode($keyword);

    $data = curlGET_Text($googleUrl);

    while (true) {

        $dom = new DOMDocument();
        @$dom->loadHTML($data);

        $xpath = new DOMXPath($dom);

        $hrefs = $xpath->evaluate('//div[@id="ires"]//ol//div[@class="g"]//h3[@class="r"]//a');
        $linkcount = $hrefs->length;

        for ($i = 0; $i < $linkcount; $i++) {

            $href = $hrefs->item($i);
            $url = $href->getAttribute('href');

            $searchDomain = "https://" . ($searchDomain);
            $searchDomainArr = parse_url($searchDomain);
            $searchDomain = $searchDomainArr['host'];

            $url = clean_url($url);

            if (!strstr($url, $searchDomain)) {
                
            } else {
                $searchDetails = array(
                    $searchDomain,
                    $totalCount);
                return $searchDetails;
                exit;
            }
            if ($totalCount == $position) {
                return;
                exit;
            }
            $totalCount++;
        }

        if (!strstr($data, "Next")) {

            break;
        }

        sleep(rand(2, 4));
        $resPerPage = $resPerPage + 10;
        $currentPage++;
        flush();
        $googleUrl = "https://www." . $googleDomain . "/search?hl=en&q=" . urlencode($keyword) .
                "&start=" . $resPerPage . "&sa=N";
        $data = curlGET_Text($googleUrl);
    }
}

function yahooRank($searchDomain, $keyword, $position = 200, $yahooDomain = 'yahoo.com') {
    $data = $resData = $yahooUrl = '';

    $yahooTLD = clean_url($yahooDomain);
    $yahooTLD = explode(".", $yahooTLD);
    $yahooTLD = $yahooTLD[1];

    if ($yahooTLD == 'com')
        $yahooTLD = '';
    else
        $yahooTLD = $yahooTLD . '.';

    $currentPage = 1;
    $resPerPage = 0;
    $totalCount = 1;

    $rn = $resPerPage == '0' ? '' : $resPerPage;

    $yahooUrl = "https://" . $yahooTLD . "search." . $yahooDomain . "/search?p=" .
            urlencode($keyword) . "&b=" . $rn . "1";

    $data = curlGET_Text($yahooUrl);
    $resData = getCenterText('<ol class="mb-15 reg searchCenterMiddle">', '</ol>', $data);
    $resPerPage = 10;
    while (true) {

        $dom = new DOMDocument();
        @$dom->loadHTML($resData);

        $xpath = new DOMXPath($dom);
        $hrefs = $dom->getElementsByTagName('a');


        $linkcount = $hrefs->length;

        for ($i = 0; $i < $linkcount; $i++) {

            $href = $hrefs->item($i);
            $url = $href->getAttribute('href');
            $searchDomain = clean_url($searchDomain);
            $url = clean_url($url);

            if (!strstr($url, $searchDomain)) {
                
            } else {
                $searchDetails = array(
                    $searchDomain,
                    $totalCount);
                return $searchDetails;
                exit;
            }
            if ($totalCount == $position) {
                return;
                exit;
            }
            $totalCount++;
        }

        if (!strstr($data, "Next")) {
            break;
        }

        sleep(rand(3, 5));
        $resPerPage = $resPerPage + 10;
        $currentPage++;
        flush();
        $yahooUrl = "https://" . $yahooTLD . "search." . $yahooDomain . "/search?p=" .
                urlencode($keyword) . "&b=" . $resPerPage;
        $data = curlGET_Text($yahooUrl);
        $resData = getCenterText('<ol class="mb-15 reg searchCenterMiddle">', '</ol>', $data);
    }
}

function bingRank($site, $keyword, $page_number = 0, $proxy = '', $country = "", $language = "") {

    $keyword = urlencode($keyword);

    if ($page_number) {
        $start = $page_number * 10 + 1;
        $page_str = "&first={$start}";
    } else {
        $page_str = "";
    }

    $localization_string = "";

    if ($country != "") {
        $country = strtolower($country);
        $localization_string .= "&cc={$country}";
    }

    $url = "https://www.bing.com/search?q={$keyword}&count=200&ie=utf-8&oe=utf-8{$page_str}{$localization_string}";
    $content = getContentFromSearchEngine($url);

    $response = array();

    if ($content) {

        preg_match_all('#<cite>(.*?)</cite>#', $content, $matches);

        $check_domain = get_domain_only($site);

        $search_link_domain = array();
        $search_link = array();
        foreach ($matches[1] as $info) {
            $search_link_domain[] = get_domain_only($info);
            $search_link[] = $info;
        }

        $position = array_search($check_domain, $search_link_domain);

        if ($position !== FALSE) {
            $position = $position + 1;
        } else
            $position = "Not Found";

        $response = array($site, $position);

        return $response;
    }
}

function curlGET_Text($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: text/plain"));
    $html = curl_exec($ch);
    curl_close($ch);
    return $html;
}

function getCenterText($str1, $str2, $data) {
    $data = explode($str1, $data);
    $data = explode($str2, $data[1]);
    return Trim($data[0]);
}

function clean_url($site) {
    $site = strtolower($site);
    $site = str_replace(array(
        'http://',
        'stp://',
        'ftps://',
        'https://',
        'www.'), '', $site);
    return $site;
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
$domain = 'https://www.indiatimes.com/';
$domainArr = parse_url($domain);
$domain = $domainArr['host'] . $domainArr['path'];
$domain = rtrim($domain, "/");
$domain = ltrim($domain, "www.");
$keyword = 'news';

echo '<pre>';
echo 'Google ';if(googleRank($domain,$keyword) != '') print_r(googleRank($domain,$keyword)); else echo 'Not Found Upto 200<br />';
echo 'Yahoo ';if(yahooRank($domain,$keyword) != '') print_r(yahooRank($domain,$keyword)); else echo 'Not Found Upto 200<br />';
echo 'Bing ';print_r(bingRank($domain,$keyword));
echo '</pre>';

?>