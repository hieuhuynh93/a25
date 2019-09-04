<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include './Simple_html_dom.php';
include './IXR_Library.php';

function similar_web_raw_data($domain, $proxy = "") {

    $alexa_url = "https://www.similarweb.com/website/{$domain}";
    $ch = curl_init(); // initialize curl handle
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
    curl_setopt($ch, CURLOPT_AUTOREFERER, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7);
    curl_setopt($ch, CURLOPT_REFERER, 'http://' . $alexa_url);
    curl_setopt($ch, CURLOPT_URL, $alexa_url); // set url to post to
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // allow redirects
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return into a variable
    curl_setopt($ch, CURLOPT_TIMEOUT, 100); // times out after 50s
    curl_setopt($ch, CURLOPT_POST, 0); // set POST method

    /*     * *** Proxy set for google . if lot of request gone, google will stop reponding. That's why it's should use some proxy **** */
    /*     * ** Using proxy of public and private proxy both *** */


    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_COOKIEJAR, "my_cookies1.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE, "my_cookies1.txt");
    $content = curl_exec($ch); // run the whole process

    $connect_info = curl_getinfo($ch);
    $http_code = $connect_info['http_code'];

    curl_close($ch);




    /*     * *******	Get Global Rank ********* */


    preg_match('#<h3.*?class="websiteRanks-titleText">Global Rank</h3>.*?<div class="websiteRanks-valueContainer js-websiteRanksValue">(.*?)</div>#si', $content, $matches);

    $global_rank = isset($matches[1]) ? trim(strip_tags($matches[1])) : 'No Data';

    /*     * ****	Get Country Rank ****** */

    preg_match('#<h3.*?class="websiteRanks-titleText">Country Rank</h3>.*?<div class="websiteRanks-valueContainer js-websiteRanksValue">(.*?)</div>#si', $content, $matches);

    $country_rank = isset($matches[1]) ? trim(strip_tags($matches[1])) : 'No Data';


    /** 	Get Country ** */
    preg_match('#<h3.*?class="websiteRanks-titleText">Country Rank</h3>.*?<div.*?class="websiteRanks-name">.*?<a.*?class="websiteRanks-nameText".*?>(.*?)</a>#si', $content, $matches);

    $country = isset($matches[1]) ? trim(strip_tags($matches[1])) : 'No Data';


    /*     * ****Get Category Rank******* */

    preg_match('#<h3.*?class="websiteRanks-titleText">Category Rank</h3>.*?<div class="websiteRanks-valueContainer js-websiteRanksValue">(.*?)</div>#si', $content, $matches);

    $category_rank = isset($matches[1]) ? trim(strip_tags($matches[1])) : 'No Data';

    /*     * ************	Get Category ******** */

    preg_match('#<h3.*?class="websiteRanks-titleText">Category Rank</h3>.*?<div.*?class="websiteRanks-name">.*?<a.*?class="websiteRanks-nameText".*?>(.*?)</a>#si', $content, $matches);

    $category = isset($matches[1]) ? trim(strip_tags($matches[1])) : 'No Data';


    /*     * *****************		Get Engagement History		******************* */
    /*     * **		Get Total Visit		***** */
    preg_match('#<div class="engagementInfo-line">.*?<div.*?data-type="visits">.*?<span class="engagementInfo-value.*?">(.*?)</span>#si', $content, $matches);

    $total_visit = isset($matches[1]) ? trim(strip_tags($matches[1])) : 'No Data';

    /*     * ****		Get Time on Site		****** */
    preg_match('#<div class="engagementInfo-line">.*?<div.*?data-type="time">.*?<span class="engagementInfo-value.*?">(.*?)</span>#si', $content, $matches);
    $time_on_site = isset($matches[1]) ? trim(strip_tags($matches[1])) : 'No Data';

    /*     * ****	Get Page Views **** */
    preg_match('#<div class="engagementInfo-line">.*?<div.*?data-type="ppv">.*?<span class="engagementInfo-value.*?">(.*?)</span>#si', $content, $matches);
    $page_views = isset($matches[1]) ? trim(strip_tags($matches[1])) : 'No Data';

    /*     * ******	Get Bounce Rate ****** */
    preg_match('#<div class="engagementInfo-line">.*?<div.*?data-type="bounce">.*?<span class="engagementInfo-value.*?">(.*?)</span>#si', $content, $matches);
    $bounce = isset($matches[1]) ? trim(strip_tags($matches[1])) : 'No Data';


    /*     * *********   Traffic by countries   On desktop, in the last 3 months ************ */
    $html = new simple_html_dom();
    $html->load($content);

    $traffic_by_countries_div = $html->find('div.countries-list span.accordion-toggle');
    $i = 0;
    $traffic_country = array();
    $traffic_country_percentage = array();

    foreach ($traffic_by_countries_div as $span) {
        if (isset($span->find('a', 0)->plaintext)) {
            $traffic_country[$i] = $span->find('a', 0)->plaintext;
        } else {

            if (isset($span->find('span.country-name', 0)->plaintext))
                $traffic_country[$i] = $span->find('span.country-name', 0)->plaintext;
        }

        if (isset($span->find('span.traffic-share-value', 0)->plaintext)) {
            $traffic_country_percentage[$i] = $span->find('span.traffic-share-value', 0)->plaintext;
        }
        $i++;
    }


    /*     * *********Get Traffic Sources  On desktop, in the last 3 months********** */

    /*     * *** Get Direct Traffic **** */
    preg_match('#<div class="trafficSourcesChart">.*?<li.*?data-key="Direct">.*?<div class="trafficSourcesChart-value">(.*?)</div>#si', $content, $matches);

    $direct_traffic = isset($matches[1]) ? $matches[1] : 'No Data';

    /*     * ****		Get Referrals Traffic		******* */
    preg_match('#<div class="trafficSourcesChart">.*?<li.*?data-key="Referrals">.*?<div class="trafficSourcesChart-value">(.*?)</div>#si', $content, $matches);

    $referral_traffic = isset($matches[1]) ? $matches[1] : 'No Data';


    /*     * *Get Search Traffic *** */
    preg_match('#<div class="trafficSourcesChart">.*?<li.*?data-key="Search">.*?<div class="trafficSourcesChart-value">(.*?)</div>#si', $content, $matches);
    $search_traffic = isset($matches[1]) ? $matches[1] : 'No Data';

    /*     * **Get Social Traffic ** */
    preg_match('#<div class="trafficSourcesChart">.*?<li.*?data-key="Social">.*?<div class="trafficSourcesChart-value">(.*?)</div>#si', $content, $matches);
    $social_traffic = isset($matches[1]) ? $matches[1] : 'No Data';

    /*     * ***	Get Mail Traffic *** */
    preg_match('#<div class="trafficSourcesChart">.*?<li.*?data-key="Mail">.*?<div class="trafficSourcesChart-value">(.*?)</div>#si', $content, $matches);
    $mail_traffic = isset($matches[1]) ? $matches[1] : 'No Data';


    /*     * **	Get traffic from display advertisement ****** */

    preg_match('#<div class="trafficSourcesChart">.*?<li.*?data-key="Display">.*?<div class="trafficSourcesChart-value">(.*?)</div>#si', $content, $matches);
    $display_traffic = isset($matches[1]) ? $matches[1] : 'No Data';



    /*     * *****  Get refferal site address ****** */
    $referral_site_ul = $html->find('div.referring ul.websitePage-list li');

    $i = 0;
    $top_referral_site = array();

    foreach ($referral_site_ul as $li) {
        if (isset($li->find('a', 0)->plaintext)) {
            $top_referral_site[$i] = $li->find('a', 0)->plaintext;
        }
        $i++;
    }


    /*     * ****  Get Destination Site address ********* */
    $destination_site_ul = $html->find('div.destination ul.websitePage-list li');

    $i = 0;
    $top_destination_site = array();

    foreach ($destination_site_ul as $li) {
        if (isset($li->find('a', 0)->plaintext)) {
            $top_destination_site[$i] = $li->find('a', 0)->plaintext;
        }
        $i++;
    }


    /*     * *****		Get Search category percentage 	****** */

    /*     * *** Get Organic Search Percentage *** */

    preg_match('#<div class="searchPie-text searchPie-text--left.*?">.*?<span class="searchPie-number">(.*?)</span>#si', $content, $matches);
    $organic_search_percentage = isset($matches[1]) ? $matches[1] : 'No Data';

    /*     * **Get Paid Search Percentage** */

    preg_match('#<div class="searchPie-text searchPie-text--right.*?">.*?<span class="searchPie-number">(.*?)</span>#si', $content, $matches);
    $paid_search_percentage = isset($matches[1]) ? $matches[1] : 'No Data';

    /*     * ***	Get Organic Keyword *********** */
    $organic_keyword_ul = $html->find('div.searchKeywords-text--left ul.searchKeywords-list li');

    $i = 0;
    $top_organic_keyword = array();

    foreach ($organic_keyword_ul as $li) {
        if (isset($li->find('span.searchKeywords-words', 0)->plaintext)) {
            $top_organic_keyword[$i] = $li->find('span.searchKeywords-words', 0)->plaintext;
        }
        $i++;
    }


    /*     * *****	 Get Paid Search Keyword	 ****** */


    $paid_keyword_ul = $html->find('div.searchKeywords-text--right ul.searchKeywords-list li');

    $i = 0;
    $top_paid_keyword = array();

    foreach ($paid_keyword_ul as $li) {
        if (isset($li->find('span.searchKeywords-words', 0)->plaintext)) {
            $top_paid_keyword[$i] = $li->find('span.searchKeywords-words', 0)->plaintext;
        }
        $i++;
    }


    $social_info_ul = $html->find('ul.socialList li');

    $i = 0;
    $social_site_name = array();
    $social_site_percentage = array();

    foreach ($social_info_ul as $li) {
        if (isset($li->find('a', 0)->plaintext)) {
            $social_site_name[$i] = $li->find('a', 0)->plaintext;
        }
        if (isset($li->find('.socialItem-value', 0)->plaintext)) {
            $social_site_percentage[$i] = $li->find('.socialItem-value', 0)->plaintext;
        }
        $i++;
    }

    $response = array();

    if ($http_code == '200') {
        $response['status'] = "success";
    } else {
        $response['status'] = "error";
    }

    $response['global_rank'] = $global_rank;
    $response['country_rank'] = $country_rank;
    $response['country'] = $country;
    $response['category_rank'] = $category_rank;
    $response['category'] = $category;
    $response['total_visit'] = $total_visit;
    $response['time_on_site'] = $time_on_site;
    $response['page_views'] = $page_views;
    $response['bounce'] = $bounce;
    $response['traffic_country'] = $traffic_country;
    $response['traffic_country_percentage'] = $traffic_country_percentage;
    $response['direct_traffic'] = $direct_traffic;
    $response['referral_traffic'] = $referral_traffic;
    $response['search_traffic'] = $search_traffic;
    $response['social_traffic'] = $social_traffic;
    $response['mail_traffic'] = $mail_traffic;
    $response['display_traffic'] = $display_traffic;
    $response['top_referral_site'] = $top_referral_site;
    $response['top_destination_site'] = $top_destination_site;
    $response['organic_search_percentage'] = $organic_search_percentage;
    $response['paid_search_percentage'] = $paid_search_percentage;
    $response['top_organic_keyword'] = $top_organic_keyword;
    $response['top_paid_keyword'] = $top_paid_keyword;
    $response['social_site_name'] = $social_site_name;
    $response['social_site_percentage'] = $social_site_percentage;

    //return $response;
    return json_encode($response);
}

$domain = $_REQUEST['domain'];
$arrData = similar_web_raw_data($domain, $proxy = "");
echo $arrData;