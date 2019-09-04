<?php

class Masterajib_Linkanalysis_Helper_Data extends Mage_Core_Helper_Abstract {
    
    function getSimilarSite($url){
        $searchUrl = 'https://www.google.com/search?q=related:'.$url.'&num=20';
    }

    function calculate_date_differece($end, $start) {
        $diff = abs(strtotime($end) - strtotime($start));
        $years = floor($diff / (365 * 60 * 60 * 24));
        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        return $years . " Years " . $months . " Months " . $days . " Days";
    }

    function getMozDetails($objectURL) {
        $arrMozDetails = array();
        $accessID = "mozscape-53d428ce7e";
        $secretKey = "743ee150639dc53be1ca4c22a2695ebc";
        $expires = time() + 300;
        $stringToSign = $accessID . "\n" . $expires;
        $binarySignature = hash_hmac('sha1', $stringToSign, $secretKey, true);
        $urlSafeSignature = urlencode(base64_encode($binarySignature));
        //$objectURL = 'https://www.indiatimes.com/';
        $cols = "103616137252"; //"103079215140";
        $requestUrl = "http://lsapi.seomoz.com/linkscape/url-metrics/" . urlencode($objectURL) . "?Cols=" . $cols . "&AccessID=" . $accessID . "&Expires=" . $expires . "&Signature=" . $urlSafeSignature;
        $options = array(
            CURLOPT_RETURNTRANSFER => true
        );
        $ch = curl_init($requestUrl);
        curl_setopt_array($ch, $options);
        $content = curl_exec($ch);
        curl_close($ch);
        $json_a = json_decode($content);

        $arrMozDetails['MozRank_normalised'] = $json_a->fmrp;
        $arrMozDetails['MozRank_raw'] = $json_a->fmrr;
        $arrMozDetails['Domain_Authority'] = $json_a->pda;
        $arrMozDetails['Number_of_External_Links_to_the_URL'] = $json_a->ueid;
        $arrMozDetails['Total_number_of_Links_to_the_URL'] = $json_a->uid;
        $arrMozDetails['MozRank_Normalised'] = $json_a->umrp;
        $arrMozDetails['MozRank_Raw'] = $json_a->umrr;
        $arrMozDetails['PageAuthority'] = $json_a->upa;
        $arrMozDetails['HTTP_Status'] = $json_a->us;
        $arrMozDetails['Canonical_URL'] = $json_a->uu;

        return $arrMozDetails;
    }

    function getDomainLookUp($domain) {
        $urlArr = parse_url($url);
        $ip = gethostbyname($urlArr['host']);
        //$new_arr[]= unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip));
        //return $new_arr[0];
        $url = 'http://ip-api.com/json/' . $ip;
        $res = @file_get_contents($url);
        $content = json_decode($res, true);
        return $content;
    }

    function LookupDomain($domain) {
        $parsed = parse_url($domain);
        $domain = str_replace('www.', '', $parsed['host']);
        $whoisservers = array(
            "ac" => "whois.nic.ac",
            "ae" => "whois.nic.ae",
            "aero" => "whois.aero",
            "af" => "whois.nic.af",
            "ag" => "whois.nic.ag",
            "ai" => "whois.ai",
            "al" => "whois.ripe.net",
            "am" => "whois.amnic.net",
            "arpa" => "whois.iana.org",
            "as" => "whois.nic.as",
            "asia" => "whois.nic.asia",
            "at" => "whois.nic.at",
            "au" => "whois.aunic.net",
            "ax" => "whois.ax",
            "az" => "whois.ripe.net",
            "bg" => "whois.register.bg",
            "bi" => "whois.nic.bi",
            "biz" => "whois.biz",
            "bj" => "whois.nic.bj",
            "bn" => "whois.bn",
            "bo" => "whois.nic.bo",
            "br" => "whois.registro.br",
            "bt" => "whois.netnames.net",
            "bz" => "whois.belizenic.bz",
            "ca" => "whois.cira.ca",
            "cat" => "whois.cat",
            "cc" => "whois.nic.cc",
            "cd" => "whois.nic.cd",
            "ch" => "whois.nic.ch",
            "ci" => "whois.nic.ci",
            "ck" => "whois.nic.ck",
            "cl" => "whois.nic.cl",
            "cn" => "whois.cnnic.net.cn",
            "co" => "whois.nic.co",
            "com" => "whois.verisign-grs.com",
            "coop" => "whois.nic.coop",
            "cx" => "whois.nic.cx",
            "cz" => "whois.nic.cz",
            "de" => "whois.denic.de",
            "dk" => "whois.dk-hostmaster.dk",
            "dm" => "whois.nic.dm",
            "dz" => "whois.nic.dz",
            "ec" => "whois.nic.ec",
            "edu" => "whois.educause.edu",
            "ee" => "whois.eenet.ee",
            "eg" => "whois.ripe.net",
            "es" => "whois.nic.es",
            "eu" => "whois.eu",
            "fi" => "whois.ficora.fi",
            "fo" => "whois.nic.fo",
            "fr" => "whois.nic.fr",
            "gd" => "whois.nic.gd",
            "gg" => "whois.gg",
            "gi" => "whois2.afilias-grs.net",
            "gl" => "whois.nic.gl",
            "gov" => "whois.nic.gov",
            "gy" => "whois.registry.gy",
            "hk" => "whois.hkirc.hk",
            "hn" => "whois.nic.hn",
            "hr" => "whois.dns.hr",
            "ht" => "whois.nic.ht",
            "hu" => "whois.nic.hu",
            "ie" => "whois.domainregistry.ie",
            "il" => "whois.isoc.org.il",
            "im" => "whois.nic.im",
            "in" => "whois.inregistry.net",
            "info" => "whois.afilias.net",
            "int" => "whois.iana.org",
            "io" => "whois.nic.io",
            "iq" => "whois.cmc.iq",
            "ir" => "whois.nic.ir",
            "is" => "whois.isnic.is",
            "it" => "whois.nic.it",
            "je" => "whois.je",
            "jobs" => "jobswhois.verisign-grs.com",
            "jp" => "whois.jprs.jp",
            "ke" => "whois.kenic.or.ke",
            "kg" => "www.domain.kg",
            "ki" => "whois.nic.ki",
            "kr" => "whois.kr",
            "kz" => "whois.nic.kz",
            "la" => "whois.nic.la",
            "li" => "whois.nic.li",
            "lt" => "whois.domreg.lt",
            "lu" => "whois.dns.lu",
            "lv" => "whois.nic.lv",
            "ly" => "whois.nic.ly",
            "ma" => "whois.iam.net.ma",
            "md" => "whois.nic.md",
            "me" => "whois.nic.me",
            "mg" => "whois.nic.mg",
            "mil" => "whois.nic.mil",
            "ml" => "whois.dot.ml",
            "mn" => "whois.nic.mn",
            "mo" => "whois.monic.mo",
            "mobi" => "whois.dotmobiregistry.net",
            "ms" => "whois.nic.ms",
            "mu" => "whois.nic.mu",
            "museum" => "whois.museum",
            "mx" => "whois.mx",
            "my" => "whois.domainregistry.my",
            "na" => "whois.na-nic.com.na",
            "name" => "whois.nic.name",
            "nc" => "whois.nc",
            "net" => "whois.verisign-grs.net",
            "nf" => "whois.nic.nf",
            "ng" => "whois.nic.net.ng",
            "nl" => "whois.domain-registry.nl",
            "no" => "whois.norid.no",
            "nu" => "whois.nic.nu",
            "nz" => "whois.srs.net.nz",
            "om" => "whois.registry.om",
            "org" => "whois.pir.org",
            "pe" => "kero.yachay.pe",
            "pf" => "whois.registry.pf",
            "pl" => "whois.dns.pl",
            "pm" => "whois.nic.pm",
            "post" => "whois.dotpostregistry.net",
            "pr" => "whois.nic.pr",
            "pro" => "whois.dotproregistry.net",
            "pt" => "whois.dns.pt",
            "pw" => "whois.nic.pw",
            "qa" => "whois.registry.qa",
            "re" => "whois.nic.re",
            "ro" => "whois.rotld.ro",
            "rs" => "whois.rnids.rs",
            "ru" => "whois.tcinet.ru",
            "sa" => "whois.nic.net.sa",
            "sb" => "whois.nic.net.sb",
            "sc" => "whois2.afilias-grs.net",
            "se" => "whois.iis.se",
            "sg" => "whois.sgnic.sg",
            "sh" => "whois.nic.sh",
            "si" => "whois.arnes.si",
            "sk" => "whois.sk-nic.sk",
            "sm" => "whois.nic.sm",
            "sn" => "whois.nic.sn",
            "so" => "whois.nic.so",
            "st" => "whois.nic.st",
            "su" => "whois.tcinet.ru",
            "sx" => "whois.sx",
            "sy" => "whois.tld.sy",
            "tc" => "whois.meridiantld.net",
            "tel" => "whois.nic.tel",
            "tf" => "whois.nic.tf",
            "th" => "whois.thnic.co.th",
            "tj" => "whois.nic.tj",
            "tk" => "whois.dot.tk",
            "tl" => "whois.nic.tl",
            "tm" => "whois.nic.tm",
            "tn" => "whois.ati.tn",
            "to" => "whois.tonic.to",
            "tp" => "whois.nic.tl",
            "tr" => "whois.nic.tr",
            "travel" => "whois.nic.travel",
            "tv" => "tvwhois.verisign-grs.com",
            "tw" => "whois.twnic.net.tw",
            "tz" => "whois.tznic.or.tz",
            "ua" => "whois.ua",
            "ug" => "whois.co.ug",
            "uk" => "whois.nic.uk",
            "us" => "whois.nic.us",
            "uy" => "whois.nic.org.uy",
            "uz" => "whois.cctld.uz",
            "vc" => "whois2.afilias-grs.net",
            "ve" => "whois.nic.ve",
            "vg" => "whois.adamsnames.tc",
            "wf" => "whois.nic.wf",
            "ws" => "whois.website.ws",
            "xxx" => "whois.nic.xxx",
            "yt" => "whois.nic.yt",
            "yu" => "whois.ripe.net");
        //global $whoisservers;
        $domain_parts = explode(".", $domain);
        $tld = strtolower(array_pop($domain_parts));
        $whoisserver = $whoisservers[$tld];
        if (!$whoisserver) {
            return "Error: No appropriate Whois server found for $domain domain!";
        }
        $result = $this->QueryWhoisServer($whoisserver, $domain);
        if (!$result) {
            return "Error: No results retrieved from $whoisserver server for $domain domain!";
        } else {
            while (strpos($result, "Whois Server:") !== FALSE) {
                preg_match("/Whois Server: (.*)/", $result, $matches);
                $secondary = $matches[1];
                if ($secondary) {
                    $result = $this->QueryWhoisServer($secondary, $domain);
                    $whoisserver = $secondary;
                }
            }
        }
        $temp = explode("\n", $result);
        foreach ($temp as $key => $value) {
            $a = explode(":", $value);
            $a[0] = ltrim(str_ireplace(">", "", $a[0]));
            $response[mb_strtolower($a[0])] = ltrim($a[1]);
        }
        return $response;
    }

    function LookupIP($ip) {
        $whoisservers = array(
            "whois.lacnic.net", // Latin America and Caribbean - returns data for ALL locations worldwide :-)
            "whois.apnic.net", // Asia/Pacific only
            "whois.arin.net", // North America only
            "whois.ripe.net" // Europe, Middle East and Central Asia only
        );
        $results = array();
        foreach ($whoisservers as $whoisserver) {
            $result = $this->QueryWhoisServer($whoisserver, $ip);
            if ($result && !in_array($result, $results)) {
                $results[$whoisserver] = $result;
            }
        }
        $res = "RESULTS FOUND: " . count($results);
        foreach ($results as $whoisserver => $result) {
            $res .= "\n\n-------------\nLookup results for " . $ip . " from " . $whoisserver . " server:\n\n" . $result;
        }
        return $res;
    }

    function ValidateIP($ip) {
        $ipnums = explode(".", $ip);
        if (count($ipnums) != 4) {
            return false;
        }
        foreach ($ipnums as $ipnum) {
            if (!is_numeric($ipnum) || ($ipnum > 255)) {
                return false;
            }
        }
        return $ip;
    }

    function ValidateDomain($domain) {
        if (!preg_match("/^([-a-z0-9]{2,100})\.([a-z\.]{2,8})$/i", $domain)) {
            return false;
        }
        return $domain;
    }

    function QueryWhoisServer($whoisserver, $domain) {
        $port = 43;
        $timeout = 10;
        $fp = @fsockopen($whoisserver, $port, $errno, $errstr, $timeout) or die("Socket Error " . $errno . " - " . $errstr);
        if ($whoisserver == "whois.verisign-grs.com")
            $domain = "domain " . $domain; // whois.verisign-grs.com needs to be proceeded by the keyword "domain ", otherwise it will return any result containing the searched string.
        fputs($fp, $domain . "\r\n");
        $out = "";
        while (!feof($fp)) {
            $out .= fgets($fp);
        }
        fclose($fp);

        $res = "";
        if ((strpos(strtolower($out), "error") === FALSE) && (strpos(strtolower($out), "not allocated") === FALSE)) {
            $rows = explode("\n", $out);
            foreach ($rows as $row) {
                $row = trim($row);
                if (($row != '') && ($row{0} != '#') && ($row{0} != '%')) {
                    $res .= $row . "\n";
                }
            }
        }
        return $res;
    }

    function getPageStatsMobile($url) {
        $pageStats = array();
        $url = 'https://www.googleapis.com/pagespeedonline/v2/runPagespeed?url=' . $url . '&strategy=mobile';
        $res = @file_get_contents($url);
        $content = json_decode($res, true);
        if (!empty($content['pageStats'])) {
            $pageStats['mobile'] = $content['pageStats'];
        }
        return $pageStats;
    }

    function getPageStatsDesktop($url) {
        $pageStats = array();
        $url = 'https://www.googleapis.com/pagespeedonline/v2/runPagespeed?url=' . $url . '&strategy=desktop';
        $res = @file_get_contents($url);
        $content = json_decode($res, true);
        if (!empty($content['pageStats'])) {
            $pageStats['desktop'] = $content['pageStats'];
        }
        return $pageStats;
    }

    function getMobileUsaBility($url) {
        $mobileUsabilityScore = 0;
        $url = 'https://www.googleapis.com/pagespeedonline/v2/runPagespeed?url=' . $url . '&strategy=mobile';
        $res = @file_get_contents($url);
        $content = json_decode($res, true);
        if (!empty($content['ruleGroups']['USABILITY']['score'])) {
            $mobileUsabilityScore = $content['ruleGroups']['USABILITY']['score'];
        }
        return $mobileUsabilityScore;
    }

    function getDesktopPageSpeed($url) {
        $desktopSpeed = 0;
        $url = 'https://www.googleapis.com/pagespeedonline/v2/runPagespeed?url=' . $url . '&strategy=desktop';
        $res = @file_get_contents($url);
        $content = json_decode($res, true);
        if (!empty($content['ruleGroups']['SPEED']['score'])) {
            $desktopScore = $content['ruleGroups']['SPEED']['score'];
        }
        return $desktopScore;
    }

    function getMobilePageSpeed($url) {
        $mobileSpeed = 0;
        $url = 'https://www.googleapis.com/pagespeedonline/v2/runPagespeed?url=' . $url . '&strategy=mobile';
        $res = @file_get_contents($url);
        $content = json_decode($res, true);
        if (!empty($content['ruleGroups']['SPEED']['score'])) {
            $mobileSpeed = $content['ruleGroups']['SPEED']['score'];
        }
        return $mobileSpeed;
    }

    function getUrlScreenShotDesktop($siteURL) {
        $googlePagespeedData = file_get_contents("https://www.googleapis.com/pagespeedonline/v2/runPagespeed?url=$siteURL&screenshot=true&strategy=desktop");
        $googlePagespeedData = json_decode($googlePagespeedData, true);
        $screenshot = $googlePagespeedData['screenshot']['data'];
        $screenshot = str_replace(array('_', '-'), array('/', '+'), $screenshot);

        return "<img style='width:100%; border: solid 2px #ccc; padding-left:1px; padding-right:1px; padding-bottom:1px; border-radius:5px;' src=\"data:image/jpeg;base64," . $screenshot . "\" />";
    }

    function getUrlScreenShotMobile($siteURL) {
        $googlePagespeedData = file_get_contents("https://www.googleapis.com/pagespeedonline/v2/runPagespeed?url=$siteURL&screenshot=true&strategy=mobile");
        $googlePagespeedData = json_decode($googlePagespeedData, true);
        $screenshot = $googlePagespeedData['screenshot']['data'];
        $screenshot = str_replace(array('_', '-'), array('/', '+'), $screenshot);

        return "<img style='width:100%; border: solid 2px #ccc; padding-left:1px; padding-right:1px; padding-bottom:1px; border-radius:5px;' src=\"data:image/jpeg;base64," . $screenshot . "\" />";
    }

    function getAlexaRank($url) {
        $xml = simplexml_load_file('http://data.alexa.com/data?cli=10&dat=snbamz&url=' . $url);
        $rank = isset($xml->SD[1]->POPULARITY) ? $xml->SD[1]->POPULARITY->attributes()->TEXT : 0;
        $web = (string) $xml->SD[0]->attributes()->HOST;
        return $rank;
    }

    function getKeywordSearchUrl($key) {
        @ini_set('max_execution_time', 180000);
        //$str = str_replace(" ", "+", $key);
        $query = $key;
        //$url = 'https://www.google.co.in/search?q=' . $str . "&num=100";
        $url = 'https://www.google.co.in/search?q=' . urlencode($query) . '&num=10&start=0';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        $body = curl_exec($ch);
        curl_close($ch);

        $domdoc = new DOMDocument();
        @$domdoc->loadHTML($body);
        $xml = new DOMXpath($domdoc);
        $res = $xml->query('//h3[@class="r"]//a');
        if ($res) {
            foreach ($res as $k => $link) {
                if (substr(str_replace("/url?q=", "", $link->getAttribute('href')), 0, 4) == 'http') {
                    $html[] = str_replace("/url?q=", "", $link->getAttribute('href'));
                }
            }
        } else {
            $html = 0;
        }
        return $html;
    }

    public function search_rank_api($key, $eng, $searchUrl) {
        $parseURL = parse_url($searchUrl);
        $domain = ($parseURL['scheme'] == '' ? '' : $parseURL['scheme'] . '://') . $parseURL['host'] . '/';
        $result = '';
        $isRank = 0;

        $engine = array('google' => 'https://www.google.co.in/search?q=', 'yahoo' => 'https://in.search.yahoo.com/search?p=', 'bing' => 'https://www.bing.com/search?q=');
        $str = str_replace(" ", "+", $key);
        $url = $engine[$eng] . $str . "&num=100";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $body = curl_exec($ch);
        curl_close($ch);

        $domdoc = new DOMDocument();
        @$domdoc->loadHTML($body);
        $xml = new DOMXpath($domdoc);
        if ($eng == 'google') {
            $res = $xml->query('//h3[@class="r"]//a');
        } elseif ($eng == 'yahoo') {
            $res = $xml->query('//h3[@class="title"]//a');
        } elseif ($eng == 'bing') {
            $res = $xml->query('//h2//a');
        }
        $html = "";
        if ($res) {
            foreach ($res as $k => $link) {
                $html = $link->getAttribute('href');
            }
        } else {
            $html = 0;
        }
        $psition = 1;
        foreach ($html as $res) {
            if ($eng == 'google') {
                $parseURL = parse_url(explode("=", $res)[1]);
                $domainNew = ($parseURL['scheme'] == '' ? '' : $parseURL['scheme'] . '://') . $parseURL['host'] . '/';
                if ($domain == $domainNew) {
                    $result = $psition;
                    $isRank = 1;
                    break;
                }
                $psition++;
            } elseif ($eng == 'yahoo') {
                $parseURL = parse_url($res);
                $domainNew = ($parseURL['scheme'] == '' ? '' : $parseURL['scheme'] . '://') . $parseURL['host'] . '/';
                if ($domain == $domainNew) {
                    $result = $psition;
                    $isRank = 1;
                    break;
                }
                $psition++;
            } elseif ($eng == 'bing') {
                $parseURL = parse_url($res);
                $domainNew = ($parseURL['scheme'] == '' ? '' : $parseURL['scheme'] . '://') . $parseURL['host'] . '/';
                if ($domain == $domainNew) {
                    $result = $psition;
                    $isRank = 1;
                    break;
                }
                $psition++;
            }
        }
        return ($isRank == 0 ? 0 : $result);
        //return $result;
    }

    public function get_meta_custom($url) {
        //$url = 'https://www.ajio.com';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_USERAGENT, 'Linux / Firefox 29: Mozilla/5.0 (X11; Linux x86_64; rv:29.0) Gecko/20100101 Firefox/29.0');
        $metaArr = array();
        $contents = curl_exec($c);
        if (isset($contents) && is_string($contents)) {
            $title = null;
            $metaTags = null;

            preg_match('/<title>([^>]*)<\/title>/si', $contents, $match);

            if (isset($match) && is_array($match) && count($match) > 0) {
                $title = strip_tags($match[1]);
            }

            preg_match_all('/<[\s]*meta[\s]*name="?' . '([^>"]*)"?[\s]*' . 'content="?([^>"]*)"?[\s]*[\/]?[\s]*>/si', $contents, $match);

            if (isset($match) && is_array($match) && count($match) == 3) {
                $originals = $match[0];
                $names = $match[1];
                $values = $match[2];

                if (count($originals) == count($names) && count($names) == count($values)) {
                    $metaTags = array();

                    for ($i = 0, $limiti = count($names); $i < $limiti; $i++) {
                        $metaTags[$names[$i]] = array(
                            'html' => htmlentities($originals[$i]),
                            'value' => $values[$i]
                        );
                    }
                }
            }

            $result = array(
                'title' => $title,
                /* 'metaTags' => $metaTags */
                'author' => $metaTags['author']['value'],
                'keywords' => $metaTags['keywords']['value'],
                'description' => $metaTags['description']['value'],
                'viewport' => $metaTags['viewport']['value']
            );
        }
        return $result;
    }

    public function getDocRoot() {
        $docRootArr = explode("/", getcwd());
        $docRoot = '';
        foreach ($docRootArr as $docRootStr) {
            if ($docRootStr == "app") {
                exit();
            } else {
                $docRoot .= $docRootStr . "/";
            }
        }
        return $docRoot;
    }

    public function fread_url($url, $ref = "") {
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

    public function get_domain($url) {
        $pieces = parse_url($url);
        $domain = isset($pieces['host']) ? $pieces['host'] : $pieces['path'];
        if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
            return $regs['domain'];
        }
        return false;
    }
    
    function getFavIcon($html) {
    if ($html == '')
        return false;

    $doc = new DOMDocument();
    if (!$doc->loadHTML($html))
        return false;


    $xml = simplexml_import_dom($doc);
    if (!$xml)
        return false;
    $arr = $xml->xpath('//link[@rel="shortcut icon"]');
    if (!$arr[0]['href']) {
        $arr = $xml->xpath('//link[@rel="icon"]');
    }
    if (!$arr[0]['href']) {
        $arr = $xml->xpath('//link[@rel="icon shortcut"]');
    }
    return (String) $arr[0]['href'];
}

    function getInternalExternal($domain){
        $internalExternalSourceLink = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB, true) . 'lib/link_analysis/link_analysis.php?domain=' . $domain;
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $internalExternalSourceLink);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_USERAGENT, 'Linux / Firefox 29: Mozilla/5.0 (X11; Linux x86_64; rv:29.0) Gecko/20100101 Firefox/29.0');
        $contents = curl_exec($c);
        return $contents;
    }

    public function getInternalLinks($referenceLink) {
        //$externalUrls = array();
        $htmlArr = array();
        $html = '';

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $referenceLink);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_USERAGENT, 'Linux / Firefox 29: Mozilla/5.0 (X11; Linux x86_64; rv:29.0) Gecko/20100101 Firefox/29.0');
        $contents = curl_exec($c);

        $parseURL = parse_url($referenceLink);
        $domain = ($parseURL['scheme'] == '' ? '' : $parseURL['scheme'] . '://') . $parseURL['host'] . '/';

        $dom = new DomDocument();
        $dom->loadHTML($contents);
        $output = array();
        foreach ($dom->getElementsByTagName('a') as $item) {
            $output[] = array(
                'href' => $item->getAttribute('href'),
                'rel' => $item->getAttribute('rel'),
                'anchorText' => $item->nodeValue
            );
        }

        $domainCustom = rtrim($this->get_domain($referenceLink), "/");

        $filterStrings = array(
            "javascript:void(0);",
            "javascript:;",
            "javscript:void(0)",
            "javascript:void(0)",
            "javscript:void(0);",
            "javascript:void(0)",
            "javascript:void(0)",
            $domainCustom,
            $domainCustom . "/",
            "http://" . $domainCustom,
            "http://" . $domainCustom . "/",
            "http://www." . $domainCustom,
            "http://www." . $domainCustom . "/",
            "https://" . $domainCustom,
            "https://" . $domainCustom . "/",
            "https://www." . $domainCustom,
            "https://www." . $domainCustom . "/",
            "javascript:history.back();"
        );

        if (!empty($output)) {
            $i = 1;
            foreach ($output as $linksAnchor) {
                if (!in_array($linksAnchor['href'], $filterStrings)) {
                    $newURL = $linksAnchor['href'];
                    $parseURL = parse_url($newURL);
                    $domainNew = ($parseURL['scheme'] == '' ? '' : $parseURL['scheme'] . '://') . $parseURL['host'] . '/';
                    if ($domainNew == '/') {
                        $newURL = $domain . ltrim($newURL, "/");
                    }
                    if (!$this->isExternalUrl($newURL, $domain)) {
                        $dofillow = '';
                        $nofollow = '';
                        $notMentioned = '----';
                        if ($linksAnchor['rel'] == 'nofollow') {
                            $dofillow = '';
                            $notMentioned = '';
                            $nofollow = '<div class="alert alert-secondary" role="alert">nofollow</div>';
                        } elseif ($linksAnchor['rel'] == 'follow') {
                            $dofillow = '<div class="alert alert-primary" role="alert">follow</div>';
                            $nofollow = '';
                            $notMentioned = '';
                        } else {
                            // $dofillow = '<div class="alert alert-warning" role="alert">Not mentioned</div>';
                            //$nofollow = '';
                        }
                        //$html = '<tr><td style="width:55px;">' . $i . '</td><td style="width:350px;word-wrap: break-word; max-width: 350px;">' . $newURL . '</td><td style="width:120px;">' . $dofillow . '</td><td style="width:100px;">' . $nofollow . '</td></tr>';
                        $fabIcon = $this->getFavIcon($this->fread_url($newURL, $ref = ""));
                        if(strlen($fabIcon) < 4){
                            $fabIcon = 'http://13.59.91.161/Project_SEO/skin/frontend/base/default/favicon.ico';
                        }else{
                            $fabIcon = (!empty(parse_url($fabIcon)['host']) ? $fabIcon : parse_url($referenceLink)['host'] . "/" . ltrim($fabIcon, "/"));
                            
                        }
                        $html = '<div class="row mb-30">
                                    <div class="col-md-1 col-sm-6" style="text-align:center;">
                                        ' . $i . '
                                    </div>
                                    <div class="col-md-1 col-sm-6" style="text-align:center;">
                                        <img width="30" height="30" style="border: solid 1px #ccc; padding: 1px; border-radius: 5px;" class="img-fluid" src="' . $fabIcon . '" alt="">
                                    </div>
                                    <div class="col-md-8 col-sm-6">
                                        ' . $newURL . '
                                    </div>
                                    <div class="col-md-2 col-sm-6 col-6 sm-mt-20" style="text-align:center;">
                                        ' . $dofillow . $nofollow . $notMentioned . '
                                    </div>
                                </div>';
                        array_push($htmlArr, $html);
                        $i++;
                    }
                }
            }
        } else {
            $html = '<div class="alert alert-danger" role="alert">Sorry, No External Links Found!</div>';
        }
        return array_unique($htmlArr);
    }

    public function getExternalLinks($referenceLink) {
        //$externalUrls = array();
        $htmlArr = array();
        $html = '';

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $referenceLink);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_USERAGENT, 'Linux / Firefox 29: Mozilla/5.0 (X11; Linux x86_64; rv:29.0) Gecko/20100101 Firefox/29.0');
        $contents = curl_exec($c);

        $parseURL = parse_url($referenceLink);
        $domain = ($parseURL['scheme'] == '' ? '' : $parseURL['scheme'] . '://') . $parseURL['host'] . '/';

        $dom = new DomDocument();
        $dom->loadHTML($contents);
        $output = array();
        foreach ($dom->getElementsByTagName('a') as $item) {
            $output[] = array(
                'href' => $item->getAttribute('href'),
                'rel' => $item->getAttribute('rel'),
                'anchorText' => $item->nodeValue
            );
        }

        $domainCustom = rtrim($this->get_domain($referenceLink), "/");

        $filterStrings = array(
            "javascript:void(0);",
            "javascript:;",
            "javscript:void(0)",
            "javascript:void(0)",
            "javscript:void(0);",
            "javascript:void(0)",
            "javascript:void(0)",
            "Javascript:void(0); ",
            $domainCustom,
            $domainCustom . "/",
            "http://" . $domainCustom,
            "http://" . $domainCustom . "/",
            "http://www." . $domainCustom,
            "http://www." . $domainCustom . "/",
            "https://" . $domainCustom,
            "https://" . $domainCustom . "/",
            "https://www." . $domainCustom,
            "https://www." . $domainCustom . "/",
            "javascript:history.back();"
        );

        if (!empty($output)) {
            $i = 1;
            foreach ($output as $linksAnchor) {
                if (!in_array($linksAnchor['href'], $filterStrings)) {
                    $newURL = $linksAnchor['href'];
                    $parseURL = parse_url($newURL);
                    $domainNew = ($parseURL['scheme'] == '' ? '' : $parseURL['scheme'] . '://') . $parseURL['host'] . '/';
                    if ($domainNew == '/') {
                        $newURL = $domain . ltrim($newURL, "/");
                    }
                    if ($this->isExternalUrl($newURL, $domain)) {
                        $dofillow = '';
                        $nofollow = '';
                        $notMentioned = '----';
                        if ($linksAnchor['rel'] == 'nofollow') {
                            $dofillow = '';
                            $notMentioned = '';
                            $nofollow = '<div class="alert alert-secondary" role="alert">nofollow</div>';
                        } elseif ($linksAnchor['rel'] == 'follow') {
                            $dofillow = '<div class="alert alert-primary" role="alert">follow</div>';
                            $nofollow = '';
                            $notMentioned = '';
                        } else {
                            // $dofillow = '<div class="alert alert-warning" role="alert">Not mentioned</div>';
                            //$nofollow = '';
                        }
                        //$html = '<tr><td style="width:55px;">' . $i . '</td><td style="width:350px;word-wrap: break-word; max-width: 350px;">' . $newURL . '</td><td style="width:120px;">' . $dofillow . '</td><td style="width:100px;">' . $nofollow . '</td></tr>';
                        $fabIcon = $this->getFavIcon($this->fread_url($newURL, $ref = ""));
                        if(strlen($fabIcon) < 4){
                            $fabIcon = 'http://13.59.91.161/Project_SEO/skin/frontend/base/default/favicon.ico';
                        }
                        $html = '<div class="row mb-30">
                                    <div class="col-md-1 col-sm-6" style="text-align:center;">
                                        ' . $i . '
                                    </div>
                                    <div class="col-md-1 col-sm-6" style="text-align:center;">
                                        <img width="30" height="30" style="border: solid 1px #ccc; padding: 1px; border-radius: 5px;" class="img-fluid" src="' . $fabIcon . '" alt="">
                                    </div>
                                    <div class="col-md-8 col-sm-6">
                                        ' . $newURL . '
                                    </div>
                                    <div class="col-md-2 col-sm-6 col-6 sm-mt-20" style="text-align:center;">
                                        ' . $dofillow . $nofollow . $notMentioned . '
                                    </div>
                                </div>';
                        array_push($htmlArr, $html);
                        $i++;
                    }
                }
            }
        } else {
            $html = '<div class="alert alert-danger" role="alert">Sorry, No External Links Found!</div>';
        }
        return array_unique($htmlArr);
    }

    public function isExternalUrl($newURL, $domain) {
        $domain = rtrim($domain, "/");
        $newURL = rtrim($newURL, "/");
        if (substr($newURL, 0, strlen($domain)) != $domain) {
            return true;
        } else {
            return false;
        }
    }

    public function getSocialShareCount($domain) {
        $googleCount = $this->getGoogleCount($domain);
        $yahooCount = $this->getYahooCount($domain);
        $yandexCount = $this->getYandexCount($domain);
        $bingCount = $this->getBingCount($domain);
        $pinterestCount = $this->getpinterestShareCount($domain);
        $fbCount = $this->getFbShareCount($domain);
        $totalShareCount = $googleCount + $yahooCount + $yandexCount + $bingCount + $pinterestCount + $fbCount;
        return $totalShareCount;
    }

    public function getGoogleCount($domain) {
        $url = rtrim($domain, "/");
        $url = $url . "/";
        $api_url = "http://www.google.ca/search?q=site%3A" . $url;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $api_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $content = curl_exec($curl);
        //$content = _curl($api_url);
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
        $url = "https://search.yahoo.com/search?p=site:" . $domain;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        $results = trim($this->getStringBetween($output, 'Next</a><span>', ' results</span>'));

        $results = str_replace(",", "", $results);

        if ($results == "")
            return 0;
        return $results;
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

    function getYandexCount($domain) {
        return 5;
    }

    function getBingCount($domain) {
        $url = rtrim($domain, "/");
        $url = $url . "/";
        $url = "http://www.bing.com/search?q=site:" . $url . "&FORM=QBRE&mkt=en-US";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $html_bing_results = curl_exec($curl);
        curl_close($curl);
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

    public function getpinterestShareCount($url) {
        $shareCount = 0;
        $url = rtrim($url, "/");
        $url = $url . "/";
        $url = 'https://widgets.pinterest.com/v1/urls/count.json?url=' . $url;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        $body = preg_replace('/^receiveCount\((.*)\)$/', '\\1', $data);
        $count = json_decode($body);
        $shareCount = $count->count;
        curl_close($curl);
        return $shareCount;
    }

    public function getFbShareCount($url) {
        $shareCount = 0;
        $api = file_get_contents('http://graph.facebook.com/?id=' . $url);
        $count = json_decode($api);
        foreach ($count as $c) {
            if ($c->share_count > 0) {
                $shareCount = $c->share_count;
                break;
            }
        }

        return $shareCount;
    }

    public function getFileSize($url) {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $subject = curl_exec($curl);
        $filesize = curl_getinfo($curl, CURLINFO_SIZE_DOWNLOAD);
        return $this->convertFileSize($filesize);
    }

    public function convertFileSize($bytes) {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }

    public function isListedInRobotTxt($url, $useragent = false) {
        $parsed = parse_url($url);

        $agents = array(preg_quote('*'));
        if ($useragent)
            $agents[] = preg_quote($useragent);
        $agents = implode('|', $agents);
        $robotstxt = @file(($parsed['scheme'] == '' ? '' : $parsed['scheme'] . '://') . $parsed['host'] . "/robots.txt");
        if (empty($robotstxt))
            return true;
        $rules = array();
        $ruleApplies = false;
        foreach ($robotstxt as $line) {
            if (!$line = trim($line))
                continue;
            if (preg_match('/^\s*User-agent: (.*)/i', $line, $match)) {
                $ruleApplies = preg_match("/($agents)/i", $match[1]);
            }
            if ($ruleApplies && preg_match('/^\s*Disallow:(.*)/i', $line, $regs)) {
                if (!$regs[1])
                    return true;
                $rules[] = preg_quote(trim($regs[1]), '/');
            }
        }

        foreach ($rules as $rule) {
            if (preg_match("/^$rule/", $parsed['path'])) {
                return false;
            } else {
                
            }
        }
        return true;
    }

    public function getPageAuthority($url) {
        $pageAuthority = 0;
        //Getting keys from https://moz.com
        $accessID = "mozscape-53d428ce7e";
        $secretKey = "743ee150639dc53be1ca4c22a2695ebc";
        $expires = time() + 300;
        $stringToSign = $accessID . "\n" . $expires;
        $binarySignature = hash_hmac('sha1', $stringToSign, $secretKey, true);
        $urlSafeSignature = urlencode(base64_encode($binarySignature));
        $objectURL = $url;
        $cols = "103079215140";
        $requestUrl = "http://lsapi.seomoz.com/linkscape/url-metrics/" . urlencode($objectURL) . "?Cols=" . $cols . "&AccessID=" . $accessID . "&Expires=" . $expires . "&Signature=" . $urlSafeSignature;
        $options = array(
            CURLOPT_RETURNTRANSFER => true
        );
        $ch = curl_init($requestUrl);
        curl_setopt_array($ch, $options);
        $content = curl_exec($ch);
        curl_close($ch);
        $json_a = json_decode($content);
        $pageAuthority = round($json_a->upa, 0);
        return $pageAuthority;
    }

    public function getDomainAuthority($url) {
        $domainAuthority = 0;
        //Getting keys from https://moz.com
        $accessID = "mozscape-53d428ce7e";
        $secretKey = "743ee150639dc53be1ca4c22a2695ebc";
        $expires = time() + 300;
        $stringToSign = $accessID . "\n" . $expires;
        $binarySignature = hash_hmac('sha1', $stringToSign, $secretKey, true);
        $urlSafeSignature = urlencode(base64_encode($binarySignature));
        $objectURL = $url;
        $cols = "103079215140";
        $requestUrl = "http://lsapi.seomoz.com/linkscape/url-metrics/" . urlencode($objectURL) . "?Cols=" . $cols . "&AccessID=" . $accessID . "&Expires=" . $expires . "&Signature=" . $urlSafeSignature;
        $options = array(
            CURLOPT_RETURNTRANSFER => true
        );
        $ch = curl_init($requestUrl);
        curl_setopt_array($ch, $options);
        $content = curl_exec($ch);
        curl_close($ch);
        $json_a = json_decode($content);
        $domainAuthority = round($json_a->pda, 0);
        return $domainAuthority;
    }

    public function getPageLoadTime($relatedUrl) {
        $pageLoadTime = '';
        $t = microtime(TRUE);
        ob_start();
        @file_get_contents($relatedUrl);
        ob_end_clean();
        $t = microtime(TRUE) - $t;
        $pageLoadTime = $t;
        return number_format($pageLoadTime, 2) . " sec";
    }

    public function getLinkType($relatedUrl, $primaryUrl) {
        $primaryUrl = rtrim($primaryUrl, "/");
        $linkType = '';
        $primaryUrlLength = strlen($primaryUrl);
        $relatedUrlModified = substr($relatedUrl, 0, $primaryUrlLength);
        if ($primaryUrl == $relatedUrlModified) {
            $linkType = 2;
        } else {
            $linkType = 1;
        }
        return $linkType;
    }

}
