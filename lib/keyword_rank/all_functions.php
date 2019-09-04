<?php

function clean_url($site) {
    $site = strtolower($site);
    $site = str_replace(array(
        'http://',
        'https://',
        'www.'), '', $site);
    return $site;
}

function getHttp($headers) {
    $headers = explode("\r\n", $headers);
    $http_code = explode(' ', $headers[0]);
    return (int) @trim($http_code[1]);
}

function getHeaders($site) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_URL, $site);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0');
    $headers = curl_exec($ch);
    curl_close($ch);
    return $headers;
}

function getHttpCode($site, $followRedirect = true) {
    $ch = curl_init($site);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, $followRedirect);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0');
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $httpCode;
}

function checkRedirect($my_url, $goodStr = "Good", $badStr = "Bad - Not Redirecting!") {
    $my_url = clean_url($my_url);
    $re301 = false;
    $url_with_www = "http://www.$my_url";
    $url_no_www = "http://$my_url";

    $data1 = getHttpCode($url_with_www, false);
    $data2 = getHttpCode($url_no_www, false);

    if ($data1 == '301')
        $re301 = true;
    if ($data2 == '301')
        $re301 = true;

    $str = ($re301 == true ? $goodStr : $badStr);
    return $str;
}

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

function file_get_html($url, $use_include_path = false, $context = null, $offset = -1, $maxLen = -1, $lowercase = true, $forceTagsClosed = true, $target_charset = DEFAULT_TARGET_CHARSET, $stripRN = true, $defaultBRText = DEFAULT_BR_TEXT, $defaultSpanText = DEFAULT_SPAN_TEXT) {
//Fix - A to Z SEO Tools v1.8
    $balajiData = curlGET($url);
    return str_get_html($balajiData);
}

function doLinkAnalysis($my_url) {

//Set Execution Time
    ini_set('max_execution_time', 20 * 60);

//Define Variables
    $ex_data_arr = array();
    $t_count = 0;
    $i_links = 0;
    $e_links = 0;
    $i_nofollow = 0;
    $e_nofollow = 0;

//Get Data
    $data = file_get_html($my_url);

    if ($data == '')
        return false;

//Parse the main URL - Host / Path / Query 
    $my_url_parse = parse_url($my_url);
    $my_url_host = str_replace("www.", "", $my_url_parse['host']);
    @$my_url_path = $my_url_parse['path'];
    @$my_url_query = $my_url_parse['query'];
    $find_out = $data->find("a");

//Extract Links
    foreach ($find_out as $href) {
        if (!in_array($href->href, $ex_data_arr)) {
            if (substr($href->href, 0, 1) != "" && $href->href != "#") {
                $ex_data_arr[] = $href->href;
                $ex_data[] = array('href' => $href->href, 'rel' => $href->rel);
            }
        }
    }

//Internal Links
    foreach ($ex_data as $count => $link) {
        $t_count++;
        $parse_urls = parse_url($link['href']);
        $type = strtolower($link['rel']);

        if (@$parse_urls['host'] == $my_url_host || @$parse_urls['host'] == "www." . $my_url_host) {
            $i_links++;
            $int_data[$i_links]['inorout'] = "internal";
            $int_data[$i_links]['href'] = $link['href'];
            if ($type == 'dofollow' || ($type != 'dofollow' && $type != 'nofollow')) {
                $int_data[$i_links]['follow_type'] = "DoFollow";
            }
            if ($type == 'nofollow') {
                $i_nofollow++;
                $int_data[$i_links]['follow_type'] = "NoFollow";
            }
        } elseif ((substr($link['href'], 0, 2) != "//") && (substr($link['href'], 0, 1) == "/")) {
            $i_links++;
            $int_data[$i_links]['inorout'] = "internal";
            $int_data[$i_links]['href'] = $link['href'];
            if ($type == 'dofollow' || ($type != 'dofollow' && $type != 'nofollow')) {
                $int_data[$i_links]['follow_type'] = "DoFollow";
            }
            if ($type == 'nofollow') {
                $i_nofollow++;
                $int_data[$i_links]['follow_type'] = "NoFollow";
            }
        }
    }

//External Links
    foreach ($ex_data as $count => $link) {
        $parse_urls = parse_url($link['href']);
        $type = strtolower($link['rel']);

        if ($parse_urls !== false && isset($parse_urls['host']) && $parse_urls['host'] != $my_url_host && $parse_urls['host'] != "www." . $my_url_host) {
            $e_links++;
            $ext_data[$e_links]['inorout'] = "external";
            $ext_data[$e_links]['href'] = $link['href'];
            if ($type == 'dofollow' || ($type != 'dofollow' && $type != 'nofollow')) {
                $ext_data[$e_links]['follow_type'] = "DoFollow";
            }
            if ($type == 'nofollow') {
                $e_nofollow++;
                $ext_data[$e_links]['follow_type'] = "NoFollow";
            }
        } elseif ((substr($link['href'], 0, 2) == "//") && (substr($link['href'], 0, 1) != "/")) {
            $e_links++;
            $ext_data[$e_links]['inorout'] = "external";
            $ext_data[$e_links]['href'] = $link['href'];
            if ($type == 'dofollow' || ($type != 'dofollow' && $type != 'nofollow')) {
                $ext_data[$e_links]['follow_type'] = "DoFollow";
            }
            if ($type == 'nofollow') {
                $e_nofollow++;
                $ext_data[$e_links]['follow_type'] = "NoFollow";
            }
        }
    }

//Return the data as Array
    return array(
        $int_data,
        $i_links,
        $i_nofollow,
        @$ext_data,
        $e_links,
        $e_nofollow,
        $t_count);
}

function str_get_html($str, $lowercase = true, $forceTagsClosed = true, $target_charset = DEFAULT_TARGET_CHARSET, $stripRN = true, $defaultBRText = DEFAULT_BR_TEXT, $defaultSpanText = DEFAULT_SPAN_TEXT) {
    $dom = new simple_html_dom(null, $lowercase, $forceTagsClosed, $target_charset, $stripRN, $defaultBRText, $defaultSpanText);
    if (empty($str) || strlen($str) > MAX_FILE_SIZE) {
        $dom->clear();
        return false;
    }
    $dom->load($str, $lowercase, $stripRN);
    return $dom;
}

function raino_trim($str) {
    $str = Trim(htmlspecialchars($str));
    return $str;
}

function truncate($input, $maxWords, $maxChars) {
    $words = preg_split('/\s+/', $input);
    $words = array_slice($words, 0, $maxWords);
    $words = array_reverse($words);

    $chars = 0;
    $truncated = array();

    while (count($words) > 0) {
        $fragment = trim(array_pop($words));
        $chars += strlen($fragment);

        if ($chars > $maxChars)
            break;

        $truncated[] = $fragment;
    }

    $result = implode($truncated, ' ');

    return $result . ($input == $result ? '' : '...');
}

function clean_with_www($site) {
    $site = strtolower($site);
    $site = str_replace(array(
        'http://',
        'https://'), '', $site);
    return $site;
}

function calPrice($global_rank) {
    $monthly_inc = round((pow($global_rank, -1.008) * 104943144672) / 524);
    $monthly_inc = (is_infinite($monthly_inc) ? '5' : $monthly_inc);
    $daily_inc = round($monthly_inc / 30);
    $daily_inc = (is_infinite($daily_inc) ? '0' : $daily_inc);
    $yearly_inc = round($monthly_inc * 12);
    $yearly_inc = (is_infinite($yearly_inc) ? '0' : $yearly_inc);
    $yearly_inc = ($yearly_inc < 9 ? 10 : $yearly_inc);
    return $yearly_inc;
}

function yql($url) {
    if (substr($url, 0, 7) !== 'http://' && substr($url, 0, 8) !== 'https://')
        $url = 'http://' . $url;
    $yqlUrl = 'http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20data.headers%20where%20url%3D%22' . urlencode($url) . '%22&format=json&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys';
    $data = trim(simpleCurlGET($yqlUrl));
    $arr = json_decode($data, true);
    $arr = $arr['query']['results']['resources']['content'];
    return $arr;
}

function alexaRank($site) {

    $apiData = simpleCurlGET('http://data.alexa.com/data?cli=10&dat=snbamz&url=' . $site);

    if (trim($apiData) === 'Okay') {
        $url = 'http://data.alexa.com/data?cli=10&url=' . $site;

        $output = yql($url);

        if (isset($output['ALEXA']['SD']['POPULARITY']['TEXT']))
            $alexa_rank = $output['ALEXA']['SD']['POPULARITY']['TEXT'];
        else
            $alexa_rank = 'No Global Rank';

        if (isset($output['ALEXA']['SD']['COUNTRY']['NAME']))
            $alexa_pop = $output['ALEXA']['SD']['COUNTRY']['NAME'];
        else
            $alexa_pop = 'None';

        if (isset($output['ALEXA']['SD']['COUNTRY']['RANK']))
            $regional_rank = $output['ALEXA']['SD']['COUNTRY']['RANK'];
        else
            $regional_rank = 'None';
    }else {
        $xml = simplexml_load_string($apiData);

        $a = $xml->SD[1]->POPULARITY;
        if ($a != null) {
            $alexa_rank = $xml->SD[1]->POPULARITY->attributes()->TEXT;
            $alexa_rank = ($alexa_rank == null ? 'No Global Rank' : $alexa_rank);
        } else {
            $alexa_rank = 'No Global Rank';
        }

        $a1 = $xml->SD[1]->COUNTRY;
        if ($a1 != null) {
            $alexa_pop = $xml->SD[1]->COUNTRY->attributes()->NAME;
            $regional_rank = $xml->SD[1]->COUNTRY->attributes()->RANK;
            $alexa_pop = ($alexa_pop == null ? 'None' : $alexa_pop);
            $regional_rank = ($regional_rank == null ? 'None' : $regional_rank);
        } else {
            $alexa_pop = 'None';
            $regional_rank = 'None';
        }
    }

    $outData = simpleCurlGET("https://www.alexa.com/siteinfo/$site");
    $back = explode('<span class="font-4 box1-r">', $outData);
    $back = explode('</span>', $back[1]);
    $alexa_back = $back[0];

    $alexa_back = ($alexa_back == null ? '0' : $alexa_back);
    return array($alexa_rank, $alexa_pop, $regional_rank, $alexa_back);
}

function cleanText($str) {
    $remArr = array("&nbsp;", "<br>", "<br/>", "<br />", "\n", "\r\n", PHP_EOL);
    $str = str_replace($remArr, "", $str);
    return Trim($str);
}

function getCenterTextC($str1, $str2, $data) {
    $data = explode($str1, $data);
    $data = explode($str2, $data[1]);
    return cleanText($data[0]);
}

function alexaExtended($site) {
    $outData = simpleCurlGET("https://www.alexa.com/siteinfo/$site");
    $back = explode('<span class="font-4 box1-r">', $outData);
    $back = explode('</span>', $back[1]);
    $alexa_backlinks = $back[0];
    $alexa_backlinks = ($alexa_backlinks == null ? '0' : $alexa_backlinks);

    $cloop = 0;
    $top_countryData = array();
    $top_keywordData = array();
    $top_linkDataTemp = array();
    $top_linkData = array();
    $bounce_Data = array();
    $dailyPageviews_Data = array();

    $top_countryData_rw = getCenterText('<table cellpadding="0" cellspacing="0" id="demographics_div_country_table" class="table  ">', '</table>', $outData);
    $top_countryData_rw = explode("<td class=''><a href='/topsites/countries/", $top_countryData_rw);

    $top_keywordData_rw = getCenterText('<table cellpadding="0" cellspacing="0" id="keywords_top_keywords_table" class="table  ">', '</table>', $outData);
    $top_keywordData_rw = explode("<td class='topkeywordellipsis'", $top_keywordData_rw);

    $top_linkData_rw = getCenterText('<table cellpadding="0" cellspacing="0" id="linksin_table" class="table  table-linksin">', '</table>', $outData);
    $top_linkData_rwx = explode("<span class=''><a rel='nofollow' href=\"", $top_linkData_rw);
    $top_linkData_rw = explode("<td class='' ><span class='word-wrap'><a href='/siteinfo/", $top_linkData_rw);

    $bounceRateData = explode('<span data-cat="bounce_percent" class="col-pad" href="#">', $outData);
    $bounceRateData = explode('</span>', $bounceRateData[1]);

    $bounceRate = getCenterTextC('<strong class="metrics-data align-vmiddle">', '</strong>', $bounceRateData[0]);
    $bounceRateArrow = getCenterTextC('<span class="align-vmiddle change-wrapper', 'change-r"', $bounceRateData[0]);
    $bounceRatePer = getCenterTextC('3 months.">', '</span>', $bounceRateData[0]);
    $bounce_Data = array($bounceRate, $bounceRateArrow, $bounceRatePer);

    $dailyPageviews = explode('<span data-cat="pageviews_per_visitor" class="col-pad" href="#">', $outData);
    $dailyPageviews = explode('</span>', $dailyPageviews[1]);

    $dailyPageviewsRate = getCenterTextC('<strong class="metrics-data align-vmiddle">', '</strong>', $dailyPageviews[0]);
    $dailyPageviewsArrow = getCenterTextC('<span class="align-vmiddle change-wrapper', '"', $dailyPageviews[0]);
    $dailyPageviewsPer = getCenterTextC('3 months.">', '</span>', $dailyPageviews[0]);
    $dailyPageviews_Data = array($dailyPageviewsRate, $dailyPageviewsArrow, $dailyPageviewsPer);

    foreach ($top_countryData_rw as $top_country) {
        if ($cloop == 0) {
            $cloop++;
        } else {
            $ds = explode('</tr>', $top_country);

            $country_code = explode("'>", $ds[0]);
            $country_code = Trim($country_code[0]);

            $country_name = explode("Flag'/>", $ds[0]);
            $country_name = explode("</a></td>", $country_name[1]);
            $country_name = cleanText($country_name[0]);

            $country_per = explode("<span class=''>", $ds[0]);
            $country_perx = explode("</span></td>", $country_per[1]);
            $country_rank = explode("</span></td>", $country_per[2]);
            $country_per = cleanText($country_perx[0]);
            $country_rank = cleanText($country_rank[0]);

            $top_countryData[] = array($country_code, $country_name, $country_per, $country_rank);
            $cloop++;
        }
    }
    return $top_countryData;
}

function dnsblookup($ip) {
    $outArr = array();
    $dnsbl_lookup = array(
        "dnsbl-1.uceprotect.net",
        "dnsbl-2.uceprotect.net",
        "dnsbl-3.uceprotect.net",
        "dnsbl.dronebl.org",
        "dnsbl.sorbs.net",
        "spam.dnsbl.sorbs.net",
        "bl.spamcop.net",
        "recent.dnsbl.sorbs.net",
        "all.spamrats.com",
        "b.barracudacentral.org",
        "bl.blocklist.de",
        "bl.emailbasura.org",
        "bl.mailspike.org",
        "bl.spamcannibal.org",
        "bl.spamcop.net",
        "cblplus.anti-spam.org.cn",
        "dnsbl.anticaptcha.net",
        "ip.v4bl.org",
        "fnrbl.fast.net",
        "dnsrbl.swinog.ch",
        "mail-abuse.blacklist.jippg.org",
        "singlebl.spamgrouper.com",
        "spam.abuse.ch",
        "spamsources.fabel.dk",
        "virbl.dnsbl.bit.nl",
        "cbl.abuseat.org",
        "dnsbl.justspam.org",
        "zen.spamhaus.org"); // Add your preferred list of DNSBL's

    $reverse_ip = implode(".", array_reverse(explode(".", $ip)));

    foreach ($dnsbl_lookup as $host) {
        ini_set('max_execution_time', 300);
        if (checkdnsrr($reverse_ip . "." . $host . ".", "A")) {
            $outArr[] = array($host, 1);
            $listed = 1;
        } else {
            $outArr[] = array($host, 2);
        }
    }

    if (@$listed)
        $overall = 1;
    else
        $overall = 2;

    return array($outArr, $overall);
}

function str_contains($data, $searchString, $ignoreCase = false) {
    if ($ignoreCase) {
        $data = strtolower($data);
        $searchString = strtolower($searchString);
    }
    $needlePos = strpos($data, $searchString);
    return ($needlePos === false ? false : ($needlePos + 1));
}

function getMyData($site) {
    return file_get_contents($site);
}

function check_server_status($host, $port, $timeout) {
    $start_time = microtime(TRUE);
    $status = fsockopen($host, $port, $errno, $errstr, $timeout);
    if (!$status) {
        return "Server is down.";
    }

    $end_time = microtime(TRUE);
    $time_taken = $end_time - $start_time;
    $time_taken = round($time_taken, 5);

    return "Server responded in " . $time_taken * 1000 . " milliseconds.";
}

function reverseIP($revIP) {
    $link = "http://www.bing.com/search?q=ip%3A" . trim($revIP) .
            "&go=&qs=n&sk=&sc=8-5&form=QBLH";
    $source = getMyData($link);
    $s = explode('<span class="sb_count">', $source);
    @$s = explode('<h4 class="b_hide">', $s[1]);
    $s = $s[0];
    $regexp = "<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>";

    if (preg_match_all("/$regexp/siU", $s, $matches)) {
        foreach ($matches[2] as $link) {
            if (!str_contains($link, 'javascript:')) {
                if (!str_contains($link, 'microsofttranslator.com')) {
                    if (!str_contains($link, 'microsoft.com')) {
                        if (!str_contains($link, '#')) {
                            if (!str_contains($link, 'msn.com')) {
                                if (!str_contains($link, $revIP)) {
                                    $link = parse_url($link);
                                    $host = $link['host'];
                                    if ($host != null || $host != "")
                                        $revLink[] = $host;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    return @array_unique($revLink);
}

function simpleCurlGET($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    $html = curl_exec($ch);
    curl_close($ch);
    return $html;
}

function updateSuspiciousDomains() {

    $fL = 'sp_low.tdata';
    $fM = 'sp_medium.tdata';
    $fH = 'sp_high.tdata';

    $l = 'https://secure.dshield.org/feeds/suspiciousdomains_Low.txt';
    $m = 'https://secure.dshield.org/feeds/suspiciousdomains_Medium.txt';
    $h = 'https://secure.dshield.org/feeds/suspiciousdomains_High.txt';

    $l = simpleCurlGET($l);
    if ($l != '')
        putMyData('tdata/' . $fL, $l);

    $m = simpleCurlGET($m);
    if ($m != '')
        putMyData('tdata/' . $fM, $m);

    $h = simpleCurlGET($h);
    if ($h != '')
        putMyData('tdata/' . $fH, $h);
}

function checkDomain($domain) {

    $domain = clean_url(trim($domain));
    $fL = 'sp_low.tdata';
    $fM = 'sp_medium.tdata';
    $fH = 'sp_high.tdata';

    $dbH = file('tdata/' . $fH);
    foreach ($dbH as $domainName) {
        $domainName = clean_url(trim($domainName));
        if ($domainName == $domain)
            return 'h';
    }

    $dbM = file('tdata/' . $fM);
    foreach ($dbM as $domainName) {
        $domainName = clean_url(trim($domainName));
        if ($domainName == $domain)
            return 'm';
    }

    $dbL = file('tdata/' . $fL);
    foreach ($dbL as $domainName) {
        $domainName = clean_url(trim($domainName));
        if ($domainName == $domain)
            return 'l';
    }

    return 'n';
}

class html2text {

    const ENCODING = 'UTF-8';

    protected $htmlFuncFlags;

    /**
     * Contains the HTML content to convert.
     *
     * @type string
     */
    protected $html;

    /**
     * Contains the converted, formatted text.
     *
     * @type string
     */
    protected $text;

    /**
     * List of preg* regular expression patterns to search for,
     * used in conjunction with $replace.
     *
     * @type array
     * @see $replace
     */
    protected $search = array(
        "/\r/", // Non-legal carriage return
        "/[\n\t]+/", // Newlines and tabs
        '/<head\b[^>]*>.*?<\/head>/i', // <head>
        '/<script\b[^>]*>.*?<\/script>/i', // <script>s -- which strip_tags supposedly has problems with
        '/<style\b[^>]*>.*?<\/style>/i', // <style>s -- which strip_tags supposedly has problems with
        '/<i\b[^>]*>(.*?)<\/i>/i', // <i>
        '/<em\b[^>]*>(.*?)<\/em>/i', // <em>
        '/(<ul\b[^>]*>|<\/ul>)/i', // <ul> and </ul>
        '/(<ol\b[^>]*>|<\/ol>)/i', // <ol> and </ol>
        '/(<dl\b[^>]*>|<\/dl>)/i', // <dl> and </dl>
        '/<li\b[^>]*>(.*?)<\/li>/i', // <li> and </li>
        '/<dd\b[^>]*>(.*?)<\/dd>/i', // <dd> and </dd>
        '/<dt\b[^>]*>(.*?)<\/dt>/i', // <dt> and </dt>
        '/<li\b[^>]*>/i', // <li>
        '/<hr\b[^>]*>/i', // <hr>
        '/<div\b[^>]*>/i', // <div>
        '/(<table\b[^>]*>|<\/table>)/i', // <table> and </table>
        '/(<tr\b[^>]*>|<\/tr>)/i', // <tr> and </tr>
        '/<td\b[^>]*>(.*?)<\/td>/i', // <td> and </td>
        '/<span class="_html2text_ignore">.+?<\/span>/i', // <span class="_html2text_ignore">...</span>
        '/<(img)\b[^>]*alt=\"([^>"]+)\"[^>]*>/i', // <img> with alt tag
    );

    /**
     * List of pattern replacements corresponding to patterns searched.
     *
     * @type array
     * @see $search
     */
    protected $replace = array(
        '', // Non-legal carriage return
        ' ', // Newlines and tabs
        '', // <head>
        '', // <script>s -- which strip_tags supposedly has problems with
        '', // <style>s -- which strip_tags supposedly has problems with
        '_\\1_', // <i>
        '_\\1_', // <em>
        "\n\n", // <ul> and </ul>
        "\n\n", // <ol> and </ol>
        "\n\n", // <dl> and </dl>
        "\t* \\1\n", // <li> and </li>
        " \\1\n", // <dd> and </dd>
        "\t* \\1", // <dt> and </dt>
        "\n\t* ", // <li>
        "\n-------------------------\n", // <hr>
        "<div>\n", // <div>
        "\n\n", // <table> and </table>
        "\n", // <tr> and </tr>
        "\t\t\\1\n", // <td> and </td>
        "", // <span class="_html2text_ignore">...</span>
        '[\\2]', // <img> with alt tag
    );

    /**
     * List of preg* regular expression patterns to search for,
     * used in conjunction with $entReplace.
     *
     * @type array
     * @see $entReplace
     */
    protected $entSearch = array(
        '/&#153;/i', // TM symbol in win-1252
        '/&#151;/i', // m-dash in win-1252
        '/&(amp|#38);/i', // Ampersand: see converter()
        '/[ ]{2,}/', // Runs of spaces, post-handling
    );

    /**
     * List of pattern replacements corresponding to patterns searched.
     *
     * @type array
     * @see $entSearch
     */
    protected $entReplace = array(
        '™', // TM symbol
        '—', // m-dash
        '|+|amp|+|', // Ampersand: see converter()
        ' ', // Runs of spaces, post-handling
    );

    /**
     * List of preg* regular expression patterns to search for
     * and replace using callback function.
     *
     * @type array
     */
    protected $callbackSearch = array(
        '/<(h)[123456]( [^>]*)?>(.*?)<\/h[123456]>/i', // h1 - h6
        '/[ ]*<(p)( [^>]*)?>(.*?)<\/p>[ ]*/si', // <p> with surrounding whitespace.
        '/<(br)[^>]*>[ ]*/i', // <br> with leading whitespace after the newline.
        '/<(b)( [^>]*)?>(.*?)<\/b>/i', // <b>
        '/<(strong)( [^>]*)?>(.*?)<\/strong>/i', // <strong>
        '/<(th)( [^>]*)?>(.*?)<\/th>/i', // <th> and </th>
        '/<(a) [^>]*href=("|\')([^"\']+)\2([^>]*)>(.*?)<\/a>/i'  // <a href="">
    );

    /**
     * List of preg* regular expression patterns to search for in PRE body,
     * used in conjunction with $preReplace.
     *
     * @type array
     * @see $preReplace
     */
    protected $preSearch = array(
        "/\n/",
        "/\t/",
        '/ /',
        '/<pre[^>]*>/',
        '/<\/pre>/'
    );

    /**
     * List of pattern replacements corresponding to patterns searched for PRE body.
     *
     * @type array
     * @see $preSearch
     */
    protected $preReplace = array(
        '<br>',
        '&nbsp;&nbsp;&nbsp;&nbsp;',
        '&nbsp;',
        '',
        '',
    );

    /**
     * Temporary workspace used during PRE processing.
     *
     * @type string
     */
    protected $preContent = '';

    /**
     * Contains the base URL that relative links should resolve to.
     *
     * @type string
     */
    protected $baseurl = '';

    /**
     * Indicates whether content in the $html variable has been converted yet.
     *
     * @type boolean
     * @see $html, $text
     */
    protected $converted = false;

    /**
     * Contains URL addresses from links to be rendered in plain text.
     *
     * @type array
     * @see buildlinkList()
     */
    protected $linkList = array();

    /**
     * Various configuration options (able to be set in the constructor)
     *
     * @type array
     */
    protected $options = array(
        'do_links' => 'inline', // 'none'
        // 'inline' (show links inline)
        // 'nextline' (show links on the next line)
        // 'table' (if a table of link URLs should be listed after the text.
        // 'bbcode' (show links as bbcode)
        'width' => 70, //  Maximum width of the formatted text, in columns.
            //  Set this value to 0 (or less) to ignore word wrapping
            //  and not constrain text to a fixed-width column.
    );

    private function legacyConstruct($html = '', $fromFile = false, array $options = array()) {
        $this->set_html($html, $fromFile);
        $this->options = array_merge($this->options, $options);
    }

    /**
     * @param string $html    Source HTML
     * @param array  $options Set configuration options
     */
    public function __construct($html = '', $options = array()) {
        // for backwards compatibility
        if (!is_array($options)) {
            return call_user_func_array(array($this, 'legacyConstruct'), func_get_args());
        }
        $this->html = $html;
        $this->options = array_merge($this->options, $options);
        $this->htmlFuncFlags = (PHP_VERSION_ID < 50400) ? ENT_COMPAT : ENT_COMPAT | ENT_HTML5;
    }

    /**
     * Set the source HTML
     *
     * @param string $html HTML source content
     */
    public function setHtml($html) {
        $this->html = $html;
        $this->converted = false;
    }

    /**
     * @deprecated
     */
    public function set_html($html, $from_file = false) {
        if ($from_file) {
            throw new \InvalidArgumentException("Argument from_file no longer supported");
        }
        return $this->setHtml($html);
    }

    /**
     * Returns the text, converted from HTML.
     *
     * @return string
     */
    public function getText() {
        if (!$this->converted) {
            $this->convert();
        }
        return $this->text;
    }

    /**
     * @deprecated
     */
    public function get_text() {
        return $this->getText();
    }

    /**
     * @deprecated
     */
    public function print_text() {
        print $this->getText();
    }

    /**
     * @deprecated
     */
    public function p() {
        return $this->print_text();
    }

    /**
     * Sets a base URL to handle relative links.
     *
     * @param string $baseurl
     */
    public function setBaseUrl($baseurl) {
        $this->baseurl = $baseurl;
    }

    /**
     * @deprecated
     */
    public function set_base_url($baseurl) {
        return $this->setBaseUrl($baseurl);
    }

    protected function convert() {
        $origEncoding = mb_internal_encoding();
        mb_internal_encoding(self::ENCODING);
        $this->doConvert();
        mb_internal_encoding($origEncoding);
    }

    protected function doConvert() {
        $this->linkList = array();
        $text = trim($this->html);
        $this->converter($text);
        if ($this->linkList) {
            $text .= "\n\nLinks:\n------\n";
            foreach ($this->linkList as $i => $url) {
                $text .= '[' . ($i + 1) . '] ' . $url . "\n";
            }
        }
        $this->text = $text;
        $this->converted = true;
    }

    protected function converter(&$text) {
        $this->convertBlockquotes($text);
        $this->convertPre($text);
        $text = preg_replace($this->search, $this->replace, $text);
        $text = preg_replace_callback($this->callbackSearch, array($this, 'pregCallback'), $text);
        $text = strip_tags($text);
        $text = preg_replace($this->entSearch, $this->entReplace, $text);
        $text = html_entity_decode($text, $this->htmlFuncFlags, self::ENCODING);
        // Remove unknown/unhandled entities (this cannot be done in search-and-replace block)
        $text = preg_replace('/&([a-zA-Z0-9]{2,6}|#[0-9]{2,4});/', '', $text);
        // Convert "|+|amp|+|" into "&", need to be done after handling of unknown entities
        // This properly handles situation of "&amp;quot;" in input string
        $text = str_replace('|+|amp|+|', '&', $text);
        // Normalise empty lines
        $text = preg_replace("/\n\s+\n/", "\n\n", $text);
        $text = preg_replace("/[\n]{3,}/", "\n\n", $text);
        // remove leading empty lines (can be produced by eg. P tag on the beginning)
        $text = ltrim($text, "\n");
        if ($this->options['width'] > 0) {
            $text = wordwrap($text, $this->options['width']);
        }
    }

    /**
     * Helper function called by preg_replace() on link replacement.
     *
     * Maintains an internal list of links to be displayed at the end of the
     * text, with numeric indices to the original point in the text they
     * appeared. Also makes an effort at identifying and handling absolute
     * and relative links.
     *
     * @param  string $link          URL of the link
     * @param  string $display       Part of the text to associate number with
     * @param  null   $linkOverride
     * @return string
     */
    protected function buildlinkList($link, $display, $linkOverride = null) {
        $linkMethod = ($linkOverride) ? $linkOverride : $this->options['do_links'];
        if ($linkMethod == 'none') {
            return $display;
        }
        // Ignored link types
        if (preg_match('!^(javascript:|mailto:|#)!i', $link)) {
            return $display;
        }
        if (preg_match('!^([a-z][a-z0-9.+-]+:)!i', $link)) {
            $url = $link;
        } else {
            $url = $this->baseurl;
            if (mb_substr($link, 0, 1) != '/') {
                $url .= '/';
            }
            $url .= $link;
        }
        if ($linkMethod == 'table') {
            if (($index = array_search($url, $this->linkList)) === false) {
                $index = count($this->linkList);
                $this->linkList[] = $url;
            }
            return $display . ' [' . ($index + 1) . ']';
        } elseif ($linkMethod == 'nextline') {
            return $display . "\n[" . $url . ']';
        } elseif ($linkMethod == 'bbcode') {
            return sprintf('[url=%s]%s[/url]', $url, $display);
        } else { // link_method defaults to inline
            return $display . ' [' . $url . ']';
        }
    }

    protected function convertPre(&$text) {
        // get the content of PRE element
        while (preg_match('/<pre[^>]*>(.*)<\/pre>/ismU', $text, $matches)) {
            // Replace br tags with newlines to prevent the search-and-replace callback from killing whitespace
            $this->preContent = preg_replace('/(<br\b[^>]*>)/i', "\n", $matches[1]);
            // Run our defined tags search-and-replace with callback
            $this->preContent = preg_replace_callback(
                    $this->callbackSearch, array($this, 'pregCallback'), $this->preContent
            );
            // convert the content
            $this->preContent = sprintf(
                    '<div><br>%s<br></div>', preg_replace($this->preSearch, $this->preReplace, $this->preContent)
            );
            // replace the content (use callback because content can contain $0 variable)
            $text = preg_replace_callback(
                    '/<pre[^>]*>.*<\/pre>/ismU', array($this, 'pregPreCallback'), $text, 1
            );
            // free memory
            $this->preContent = '';
        }
    }

    /**
     * Helper function for BLOCKQUOTE body conversion.
     *
     * @param string $text HTML content
     */
    protected function convertBlockquotes(&$text) {
        if (preg_match_all('/<\/*blockquote[^>]*>/i', $text, $matches, PREG_OFFSET_CAPTURE)) {
            $originalText = $text;
            $start = 0;
            $taglen = 0;
            $level = 0;
            $diff = 0;
            foreach ($matches[0] as $m) {
                $m[1] = mb_strlen(substr($originalText, 0, $m[1]));
                if ($m[0][0] == '<' && $m[0][1] == '/') {
                    $level--;
                    if ($level < 0) {
                        $level = 0; // malformed HTML: go to next blockquote
                    } elseif ($level > 0) {
                        // skip inner blockquote
                    } else {
                        $end = $m[1];
                        $len = $end - $taglen - $start;
                        // Get blockquote content
                        $body = mb_substr($text, $start + $taglen - $diff, $len);
                        // Set text width
                        $pWidth = $this->options['width'];
                        if ($this->options['width'] > 0)
                            $this->options['width'] -= 2;
                        // Convert blockquote content
                        $body = trim($body);
                        $this->converter($body);
                        // Add citation markers and create PRE block
                        $body = preg_replace('/((^|\n)>*)/', '\\1> ', trim($body));
                        $body = '<pre>' . htmlspecialchars($body, $this->htmlFuncFlags, self::ENCODING) . '</pre>';
                        // Re-set text width
                        $this->options['width'] = $pWidth;
                        // Replace content
                        $text = mb_substr($text, 0, $start - $diff)
                                . $body
                                . mb_substr($text, $end + mb_strlen($m[0]) - $diff);
                        $diff += $len + $taglen + mb_strlen($m[0]) - mb_strlen($body);
                        unset($body);
                    }
                } else {
                    if ($level == 0) {
                        $start = $m[1];
                        $taglen = mb_strlen($m[0]);
                    }
                    $level++;
                }
            }
        }
    }

    /**
     * Callback function for preg_replace_callback use.
     *
     * @param  array  $matches PREG matches
     * @return string
     */
    protected function pregCallback($matches) {
        switch (mb_strtolower($matches[1])) {
            case 'p':
                // Replace newlines with spaces.
                $para = str_replace("\n", " ", $matches[3]);
                // Trim trailing and leading whitespace within the tag.
                $para = trim($para);
                // Add trailing newlines for this para.
                return "\n" . $para . "\n";
            case 'br':
                return "\n";
            case 'b':
            case 'strong':
                return $this->toupper($matches[3]);
            case 'th':
                return $this->toupper("\t\t" . $matches[3] . "\n");
            case 'h':
                return $this->toupper("\n\n" . $matches[3] . "\n\n");
            case 'a':
                // override the link method
                $linkOverride = null;
                if (preg_match('/_html2text_link_(\w+)/', $matches[4], $linkOverrideMatch)) {
                    $linkOverride = $linkOverrideMatch[1];
                }
                // Remove spaces in URL (#1487805)
                $url = str_replace(' ', '', $matches[3]);
                return $this->buildlinkList($url, $matches[5], $linkOverride);
        }
        return '';
    }

    /**
     * Callback function for preg_replace_callback use in PRE content handler.
     *
     * @param  array  $matches PREG matches
     * @return string
     */
    protected function pregPreCallback(/** @noinspection PhpUnusedParameterInspection */ $matches) {
        return $this->preContent;
    }

    /**
     * Strtoupper function with HTML tags and entities handling.
     *
     * @param  string $str Text to convert
     * @return string Converted text
     */
    protected function toupper($str) {
        // string can contain HTML tags
        $chunks = preg_split('/(<[^>]*>)/', $str, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
        // convert toupper only the text between HTML tags
        foreach ($chunks as $i => $chunk) {
            if ($chunk[0] != '<') {
                $chunks[$i] = $this->strtoupper($chunk);
            }
        }
        return implode($chunks);
    }

    /**
     * Strtoupper multibyte wrapper function with HTML entities handling.
     *
     * @param  string $str Text to convert
     * @return string Converted text
     */
    protected function strtoupper($str) {
        $str = html_entity_decode($str, $this->htmlFuncFlags, self::ENCODING);
        $str = mb_strtoupper($str);
        $str = htmlspecialchars($str, $this->htmlFuncFlags, self::ENCODING);
        return $str;
    }

}

class KD {

// -------------------------------------------------------------------
// @params
// -------------------------------------------------------------------
    var $domain;              // Domain to check
    var $domainData = '';

// -------------------------------------------------------------------
// PRIVATE FUNCTIONS
// -------------------------------------------------------------------
    // -------------------------------------------------------------------
    // Private Function cURL
    // -------------------------------------------------------------------
    private function cURL() {
        // -------------------------------------------------------------------
        // Save result page to string using curl
        // -------------------------------------------------------------------
        //$ch = curl_init();
        //curl_setopt($ch,CURLOPT_URL,$this->domain);
        //curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        //curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,5);
        $str = curlGET($this->domain);
        return $str;
    }

// End of private function cURL
    // -------------------------------------------------------------------
    // Private Function to return result page as string
    // -------------------------------------------------------------------

    private function plainText() {
        // -------------------------------------------------------------------
        // External classes
        // -------------------------------------------------------------------
        //require_once('ext/class.html2text.inc');
        // -------------------------------------------------------------------
        // Save google result page to string using curl
        // -------------------------------------------------------------------
        if ($this->domainData == '')
            $str = $this->cURL();
        else
            $str = $this->domainData;
        //file_put_contents('test.txt',$str);
        // -------------------------------------------------------------------
        // Extract the plain text
        // -------------------------------------------------------------------
        $extraction = new html2text($str);
        $extraction->set_base_url($this->domain);
        // -------------------------------------------------------------------
        // Return string
        // -------------------------------------------------------------------
        return strtolower($extraction->get_text());
    }

// End of private function plainText
    // -------------------------------------------------------------------
    // Private Function to clean out the plain text
    // -------------------------------------------------------------------

    private function trim_replace($string) {
        $string = trim($string);
        return (string) str_replace(array("\r", "\r\n", "\n"), '', $string);
    }

    // -------------------------------------------------------------------
    // Private Function to calculate the keyword density from plain text
    // -------------------------------------------------------------------
    private function calcDensity() {
        // -------------------------------------------------------------------
        // Prepare string
        // -------------------------------------------------------------------
        $words = explode(" ", $this->plainText());
        $common_words = "i,he,she,it,and,me,my,you,the";
        $common_words = strtolower($common_words);
        $common_words = explode(",", $common_words);
        // -------------------------------------------------------------------
        // Get keywords
        // -------------------------------------------------------------------      
        $words_sum = 0;
        foreach ($words as $value) {
            $common = false;
            $value = $this->trim_replace($value);
            if (strlen($value) > 3) {
                foreach ($common_words as $common_word) {
                    if ($common_word == $value) {
                        $common = true;
                    }
                }
                if ($common != true) {
                    if (!preg_match("/http/i", $value) && !preg_match("/mailto:/i", $value)) {
                        $keywords[] = $value;
                        $words_sum++;
                    }
                }
            }
        }
        // -------------------------------------------------------------------
        // Do some maths and write array
        // ------------------------------------------------------------------- 
        $keywords = array_count_values($keywords);
        arsort($keywords);
        $results = array();
        $results [] = array(
            'total words' => $words_sum
        );
        foreach ($keywords as $key => $value) {
            $percent = 100 / $words_sum * $value;
            $results [] = array(
                'keyword' => trim($key),
                'count' => $value,
                'percent' => round($percent, 2)
            );
        }
        // -------------------------------------------------------------------
        // Return array
        // -------------------------------------------------------------------
        return $results;
    }

// End of private function calcDensity
// -------------------------------------------------------------------
// PUBLIC FUNCTION
// -------------------------------------------------------------------
    // -------------------------------------------------------------------
    // Public Function to return the keyword density result array
    // -------------------------------------------------------------------

    public function result() {
        return $this->calcDensity();
    }

// End of function KD
}

function getBrokenLinks($my_url, $unknown = "Unknown") {

//Parse Host
    $inputUrl = parse_url($my_url);
    $inputHost = $inputUrl['scheme'] . "://" . $inputUrl['host'];

    $uriData = doLinkAnalysis($my_url);
    if (!is_array($uriData))
        return false;
    $internal_links = $uriData[0];
    $external_links = $uriData[3];

    $iLinks = array();
    $eLinks = array();

    foreach ($internal_links as $internal_link) {

        $iLink = Trim($internal_link['href']);

        if (substr($iLink, 0, 2) == "//") {
            $iLink = "http:" . $iLink;
        } elseif (substr($iLink, 0, 1) == "/") {
            $iLink = $inputHost . $iLink;
        }
        $httpCode = Trim(getHttp(getHeaders($iLink)));

        if ($httpCode == "")
            $httpCode = $unknown;

        if ($httpCode == 200)
            $colorCode = "#27ae60";
        elseif ($httpCode == 404)
            $colorCode = "#cd4031";
        else
            $colorCode = "#16a085";

        $iLinks[] = array($iLink, $httpCode, $colorCode);
    }

    if (isset($external_links)) {
        foreach ($external_links as $external_link) {
            $eLink = Trim($external_link['href']);

            $httpCode = Trim(getHttp(getHeaders($eLink)));

            if ($httpCode == "")
                $httpCode = $unknown;

            if ($httpCode == 200)
                $colorCode = "#27ae60";
            elseif ($httpCode == 404)
                $colorCode = "#cd4031";
            else
                $colorCode = "#16a085";

            $eLinks[] = array($eLink, $httpCode, $colorCode);
        }

        return array($iLinks, $eLinks);
    }
}

?>