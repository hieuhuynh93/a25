<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
<?php

ini_set('max_execution_time', 1200);

require_once 'all_functions.php';
require_once 'simple_html_dom.php';

//if(isset($_REQUEST['f'])){
//}

$url = 'w3schools.com';

    $alexa_data_full = alexa_raw_data($url);
    $global_rank = $alexa_data_full["global_rank"];
    $country_rank = $alexa_data_full["country_rank"];
    $a_country = $alexa_data_full["country"];
    $country_name = $alexa_data_full["country_name"];
    $bounce_rate = $alexa_data_full["bounce_rate"];
    $technologies = getBuiltWith($url);
    $stats1 = getStatsData2($url, $technologies);
    $stats = $stats1['save'];
    $stats2 = $stats1['optimize'];
    $title = $stats['metaTitle'];
    $desc = $stats['metaDescription'];
    $keywords = $stats['metaKeywords'];
    $errors = $stats1['errors'];
    $warnings = $stats1['warnings'];
    $success = $stats1['success'];
    $w3c = $stats2['w3c'];
    $google_safe = $stats2['google_safe'];
    $favicon = $stats2['favicon'];
    $https = $stats2['https'];
    $robots = $stats2['robots'];
    $sitemap = $stats2['sitemap'];
    $hasAMP = $stats2['hasAMP'];
    $h1 = $stats['metaH1'];
    $h2 = $stats['metaH2'];
    $h3 = $stats['metaH3'];
    $h4 = $stats['metaH4'];
    $h5 = $stats['metaH5'];
    $h6 = $stats['metaH6'];
    $score = $stats1['score'];
    $da = $stats1['da'];
    $pa = $stats1['pa'];
    $mozrank = $stats1['mozrank'];
    $charset = $stats1['charset'];
    $url_real = $stats1['url_real'];
    $source_code = htmlspecialchars(curlGET('https://' . $url));
    $uniqueVisitsDaily = round(pow($country_rank, -0.732) * 6000000);
    $pageViewsDaily = round($uniqueVisitsDaily * 1.85);
    $incomeDaily = round(($uniqueVisitsDaily * 0.017) * 0.07);if($country_rank <= 1000) $incomeDaily = $incomeDaily * 1.5; if($country_rank <= 100) $incomeDaily = $incomeDaily * 2;
    $result_in_html = @file_get_contents("http://www.google.com/search?q=link:{$url}");
    if (preg_match('/Results .*? of about (.*?) from/sim', $result_in_html, $regs)) {
    $google_index = trim(strip_tags($regs[1])); //use strip_tags to remove bold tags
    } elseif (preg_match('/About (.*?) results/sim', $result_in_html, $regs)) {
    $google_index = trim(strip_tags($regs[1])); //use strip_tags to remove bold tags
    } $yahoo_url = 'http://in.search.yahoo.com/search?p=' . $url;
    $yahoo_url_contents = @file_get_contents($yahoo_url);
    if (preg_match('#<span[^<>]*>([\d,]+).*?</span>#', $yahoo_url_contents, $regs1)) 
    $yahoo_index = trim($regs1[1]);
    $bing_url = 'http://www.bing.com/search?q=' . $url;
    $bing_url_contents = @file_get_contents($bing_url);
    if (preg_match('#<span[^<>]*>([\d,]+).*?</span>#', $bing_url_contents, $regs2)) 
    $bing_index = trim($regs1[1]);
    $price = "$" . number_format(calPrice($global_rank)) . " USD";
    $headers_response = _curl_headers('https://' . $url);
    $info = host_info($url);
    $ip = $info[0];
    $isp = $info[2];
    $country = $info[1];
    $region = $info[4];
    $city = $info[3];
    $lat = $info[5];
    $lon = $info[6];
    $timezone = $info[7];
    $ch = curl_init(); // initialize curl handle
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
    curl_setopt($ch, CURLOPT_AUTOREFERER, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_REFERER, 'https://' . $url);
    curl_setopt($ch, CURLOPT_URL, 'https://' . $url); // set url to post to
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // allow redirects
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return into a variable
    curl_setopt($ch, CURLOPT_TIMEOUT, 60); // times out after 50s
    curl_setopt($ch, CURLOPT_POST, 0); // set POST method
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $content = curl_exec($ch); // run the whole process
    $curl_info = json_encode(curl_getinfo($ch));
    curl_close($ch);
    $pagespeed_rules_d = (page_statistic_speed_desktop($url));
    $pagespeed_rules_m = (page_statistic_speed_mobile($url));
    $google_stats_ps1 = json_decode($pagespeed_rules_d);
    $google_stats_ps2 = json_decode($pagespeed_rules_m);
    $google_stats = google_stats($url);
    $google_stats2 = google_stats2($url);
    $pagespeed_d = $google_stats['page_speed'];
    $numRes_d = $google_stats['numberResources'];
    $numHosts_d = $google_stats['numberHosts'];
    $totalBytes_d = $google_stats['totalRequestBytes'];
    $numStatic_d = $google_stats['numberStaticResources'];
    $htmlBytes_d = $google_stats['htmlResponseBytes'];
    $otwBytes_d = $google_stats['overTheWireResponseBytes'];
    $cssBytes_d = $google_stats['cssResponseBytes'];
    $imageBytes_d = $google_stats['imageResponseBytes'];
    $jsBytes_d = $google_stats['javascriptResponseBytes'];
    $otherBytes_d = $google_stats['otherResponseBytes'];
    $numJS_d = $google_stats['numberJsResources'];
    $numCSS_d = $google_stats['numberCssResources'];
    $numTRT_d = $google_stats['numTotalRoundTrips'];
    $numRBRT_d = $google_stats['numRenderBlockingRoundTrips'];
    
    $pagespeed_m = $google_stats2['page_speed'];
    $numRes_m = $google_stats2['numberResources'];
    $numHosts_m = $google_stats2['numberHosts'];
    $totalBytes_m = $google_stats2['totalRequestBytes'];
    $numStatic_m = $google_stats2['numberStaticResources'];
    $htmlBytes_m = $google_stats2['htmlResponseBytes'];
    $otwBytes_m = $google_stats2['overTheWireResponseBytes'];
    $cssBytes_m = $google_stats2['cssResponseBytes'];
    $imageBytes_m = $google_stats2['imageResponseBytes'];
    $jsBytes_m = $google_stats2['javascriptResponseBytes'];
    $otherBytes_m = $google_stats2['otherResponseBytes'];
    $numJS_m = $google_stats2['numberJsResources'];
    $numCSS_m = $google_stats2['numberCssResources'];
    $numTRT_m = $google_stats2['numTotalRoundTrips'];
    $numRBRT_m = $google_stats2['numRenderBlockingRoundTrips'];
    $usability_m = $google_stats_ps2[20];
    $simweb = similar_web_raw_data($url);
    
    $sw_global_rank = $simweb['global_rank'];
    $sw_country_rank = $simweb['country_rank'];
    $sw_country = $simweb['country'];
    $sw_category = $simweb['category'];
    $sw_category_rank = $simweb['category_rank'];
    $sw_total_visit = $simweb['total_visit'];
    $sw_time_on_site = $simweb['time_on_site'];
    $sw_pageviews = $simweb['page_views'];
    $sw_direct_traffic = $simweb['direct_traffic'];
    $sw_referral_traffic = $simweb['referral_traffic'];
    $sw_search_traffic = $simweb['search_traffic'];
    $sw_social_traffic = $simweb['social_traffic'];
    $sw_mail_traffic = $simweb['mail_traffic'];
    $sw_display_traffic = $simweb['display_traffic'];
    $sw_organic_search = $simweb['organic_search_percentage'];
    $sw_paid_search = $simweb['paid_search_percentage'];
    
 $url01 = 'https://' . $url;
 $strategyd = 'desktop' ;
 $strategym = 'mobile' ;
 $apiReqUrl = 'https://www.googleapis.com/pagespeedonline/v2/runPagespeed';
 $apiKey = 'AIzaSyD1wnxAppbj-riwtLtkTx-jzP-YQkvPsvw' ;
 $curl1 = curl_init();
 curl_setopt($curl1, CURLOPT_URL, $apiReqUrl.'?url='.urlencode($url01).'&key='.$apiKey.'&screenshot=true&strategy='.$strategyd);
 curl_setopt($curl1, CURLOPT_RETURNTRANSFER, TRUE);
 $result=curl_exec($curl1);
 $data1 = json_decode($result, true);
 $curl = curl_init();
 curl_setopt($curl, CURLOPT_URL, $apiReqUrl.'?url='.urlencode($url01).'&key='.$apiKey.'&screenshot=true&strategy='.$strategym);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
 $result=curl_exec($curl);
 $data = json_decode($result, true);
 $img1 = str_replace(array('_','-'), array('/','+'), $data1['screenshot']['data']);
 $img = str_replace(array('_','-'), array('/','+'), $data['screenshot']['data']);

$sql1 = "UPDATE TABLE domains SET score = '$score',
d_pagespeed = '$pagespeed_d',
bounce = '$bounce_rate',
DA = '$da',
meta_title = '$title',
meta_desc = '$desc',
meta_keywords = '$keywords',
robots = '$robots',
sitemap = '$sitemap',
unique_daily = '$uniqueVisitsDaily',
pageview_daily = '$pageViewsDaily',
income_daily = '$incomeDaily',
google_index = '$google_index',
yahoo_index = '$yahoo_index',
bing_index = '$bing_index',
alexa_local = '$country_rank',
alexa_local_country = '$country_name, $a_country',
alexa_global = '$global_rank',
link_price = '$price',
w3c = '$w3c',
h1 = '$h1',
h2 = '$h2',
h3 = '$h3',
h4 = '$h4',
h5 = '$h5',
h6 = '$h6',
header_response = '$headers_response',
source_code = '$source_code',
https = '$https',
google_safe = '$google_safe',
favicon = '$favicon',
hasAMP = '$hasAMP',
ip = '$ip',
isp = '$isp',
city = '$city',
country = '$country',
region = '$region',
latitude = '$lat',
longitude = '$lon',
timezone = '$timezone',
charset = '$charset',
m_pagespeed = '$pagespeed_m',
PA = '$pa',
mozrank = '$mozrank',
url_real = '$url_real',
pagespeed_rules_d = '$pagespeed_rules_d',
pagespeed_rules_m = '$pagespeed_rules_m',
usability_m = '$usability_m',
numres_d = '$numRes_d',
numhosts_d = '$numHosts_d',
numtotalbytes_d = '$totalBytes_d',
numstatic_d = '$numStatic_d',
numhtmlbytes_d = '$htmlBytes_d',
numotwbytes_d = '$otwBytes_d',
numcssbytes_d = '$cssBytes_d',
numimagebytes_d = '$imageBytes_d',
numjsbytes_d = '$jsBytes_d',
numotherbytes_d = '$otherBytes_d',
numjsres_d = '$numJS_d',
numcssres_d = '$numCSS_d',
numres_m = '$numRes_m',
numhosts_m = '$numHosts_m',
numtotalbytes_m = '$totalBytes_m',
numstatic_m = '$numStatic_m',
numhtmlbytes_m = '$htmlBytes_m',
numotwbytes_m = '$otwBytes_m',
numcssbytes_m = '$cssBytes_m',
numimagebytes_m = '$imageBytes_m',
numjsbytes_m = '$jsBytes_m',
numotherbytes_m = '$otherBytes_m',
numjsres_m = '$numJS_m',
numcssres_m = '$numCSS_m',
curl_info = '$curl_info',
success = '$success',
errors = '$errors',
warnings = '$warnings',
simweb_global_rank = '$sw_global_rank',
simweb_country_rank = '$sw_country_rank',
simweb_country = '$sw_country',
simweb_category = '$sw_category',
simweb_category_rank = '$sw_category_rank',
simweb_total_visit = '$sw_total_visit',
simweb_time_on_site = '$sw_time_on_site',
simweb_pageviews = '$sw_pageviews',
simweb_direct_traffic = '$sw_direct_traffic',
simweb_referral_traffic = '$sw_referral_traffic',
simweb_search_traffic = '$sw_search_traffic',
simweb_social_traffic = '$sw_social_traffic',
simweb_mail_traffic = '$sw_mail_traffic',
simweb_display_traffic = '$sw_display_traffic',
simweb_organic_search = '$sw_organic_search',
simweb_paid_search = '$sw_paid_search',
screenshot_d = '$img1',
screenshot_m = '$img'
WHERE name = '$url'";

echo $sql1;

//    $qry1 = mysqli_query($conn,$sql1);
//    if($qry1)
//    {
//$time1 = strtotime('+11 hours +30 minutes',time());
//$date1 = date('d/m/Y H:i:s', $time1);
//        $qq = mysqli_query($conn,"UPDATE TABLE domains SET completed = '1', updated = '$date1' WHERE name = '$url'");
//        if($qq)
//        {
//            return '1';
//        }
//        else
//        {
//            return '0';
//        }
//}

?>
    </body>
</html>