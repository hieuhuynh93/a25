<?php

function google_stats($url) {

    global $google_api_key;
    $google_api_key = 'AIzaSyD1wnxAppbj-riwtLtkTx-jzP-YQkvPsvw';

    $custom_domain = 'https://' . $url;

    //cUrl
    $api_url = 'https://www.googleapis.com/pagespeedonline/v4/runPagespeed?';
    $param = array(
        'url' => $custom_domain,
        'strategy' => 'desktop',
        'filter_third_party_resources' => 'true',
        'key' => $google_api_key,
    );
    $new_query = http_build_query($param);
    $query = $api_url . $new_query;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $query);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $result = curl_exec($ch);
    curl_close($ch);

    $new_res = json_decode($result);

    $page_stats = array(
        'page_speed' => $new_res->ruleGroups->SPEED->score,
        'numberResources' => $new_res->pageStats->numberResources,
        'numberHosts' => $new_res->pageStats->numberHosts,
        'totalRequestBytes' => $new_res->pageStats->totalRequestBytes,
        'numberStaticResources' => $new_res->pageStats->numberStaticResources,
        'htmlResponseBytes' => $new_res->pageStats->htmlResponseBytes,
        'overTheWireResponseBytes' => $new_res->pageStats->overTheWireResponseBytes,
        'cssResponseBytes' => $new_res->pageStats->cssResponseBytes,
        'imageResponseBytes' => $new_res->pageStats->imageResponseBytes,
        'javascriptResponseBytes' => $new_res->pageStats->javascriptResponseBytes,
        'otherResponseBytes' => $new_res->pageStats->otherResponseBytes,
        'numberJsResources' => $new_res->pageStats->numberJsResources,
        'numberCssResources' => $new_res->pageStats->numberCssResources,
        'numTotalRoundTrips' => $new_res->pageStats->numTotalRoundTrips,
        'numRenderBlockingRoundTrips' => $new_res->pageStats->numRenderBlockingRoundTrips
    );
    return $page_stats;
}

function google_stats2($url) {

    global $google_api_key;
    $google_api_key = 'AIzaSyD1wnxAppbj-riwtLtkTx-jzP-YQkvPsvw';

    $custom_domain = 'https://' . $url;

    //cUrl
    $api_url = 'https://www.googleapis.com/pagespeedonline/v4/runPagespeed?';
    $param = array(
        'url' => $custom_domain,
        'strategy' => 'mobile',
        'filter_third_party_resources' => 'true',
        'key' => $google_api_key,
    );
    $new_query = http_build_query($param);
    $query = $api_url . $new_query;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $query);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $result = curl_exec($ch);
    curl_close($ch);

    $new_res = json_decode($result);

    $page_stats = array(
        'page_speed' => $new_res->ruleGroups->SPEED->score,
        'numberResources' => $new_res->pageStats->numberResources,
        'numberHosts' => $new_res->pageStats->numberHosts,
        'totalRequestBytes' => $new_res->pageStats->totalRequestBytes,
        'numberStaticResources' => $new_res->pageStats->numberStaticResources,
        'htmlResponseBytes' => $new_res->pageStats->htmlResponseBytes,
        'overTheWireResponseBytes' => $new_res->pageStats->overTheWireResponseBytes,
        'cssResponseBytes' => $new_res->pageStats->cssResponseBytes,
        'imageResponseBytes' => $new_res->pageStats->imageResponseBytes,
        'javascriptResponseBytes' => $new_res->pageStats->javascriptResponseBytes,
        'otherResponseBytes' => $new_res->pageStats->otherResponseBytes,
        'numberJsResources' => $new_res->pageStats->numberJsResources,
        'numberCssResources' => $new_res->pageStats->numberCssResources,
        'numTotalRoundTrips' => $new_res->pageStats->numTotalRoundTrips,
        'numRenderBlockingRoundTrips' => $new_res->pageStats->numRenderBlockingRoundTrips
    );
    return $page_stats;
}

function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

function googleCurl($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER,0); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_AUTOREFERER,1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER,array ("Accept: text/plain"));
	$html=curl_exec($ch);
    curl_close($ch);
    return $html;
}

function googleIndex($site) {
    $searchQuery = urlencode("site:$site");

    $googleDomains = array('google.com', 'google.ad', 'google.ae', 'google.com.af', 'google.com.ag', 'google.com.ai', 'google.al', 'google.am', 'google.co.ao', 'google.com.ar', 'google.as', 
    'google.at', 'google.com.au', 'google.az', 'google.ba', 'google.com.bd', 'google.be', 'google.bf', 'google.bg', 'google.com.bh', 'google.bi', 'google.bj', 'google.com.bn', 'google.com.bo', 
    'google.com.br', 'google.bs', 'google.bt', 'google.co.bw', 'google.by', 'google.com.bz', 'google.ca', 'google.cd', 'google.cf', 'google.cg', 'google.ch', 'google.ci', 'google.co.ck', 'google.cl', 
    'google.cm', 'google.cn', 'google.com.co', 'google.co.cr', 'google.com.cu', 'google.cv', 'google.com.cy', 'google.cz', 'google.de', 'google.dj', 'google.dk', 'google.dm', 'google.com.do',
    'google.dz', 'google.com.ec', 'google.ee', 'google.com.eg', 'google.es', 'google.com.et', 'google.fi', 'google.com.fj', 'google.fm', 'google.fr', 'google.ga', 'google.ge', 'google.gg', 
    'google.com.gh', 'google.com.gi', 'google.gl', 'google.gm', 'google.gp', 'google.gr', 'google.com.gt', 'google.gy', 'google.com.hk', 'google.hn', 'google.hr', 'google.ht', 'google.hu', 
    'google.co.id', 'google.ie', 'google.co.il', 'google.im', 'google.co.in', 'google.iq', 'google.is', 'google.it', 'google.je', 'google.com.jm', 'google.jo', 'google.co.jp', 'google.co.ke', 
    'google.com.kh', 'google.ki', 'google.kg', 'google.co.kr', 'google.com.kw', 'google.kz', 'google.la', 'google.com.lb', 'google.li', 'google.lk', 'google.co.ls', 'google.lt', 'google.lu', 
    'google.lv', 'google.com.ly', 'google.co.ma', 'google.md', 'google.me', 'google.mg', 'google.mk', 'google.ml', 'google.com.mm', 'google.mn', 'google.ms', 'google.com.mt', 'google.mu', 
    'google.mv', 'google.mw', 'google.com.mx', 'google.com.my', 'google.co.mz', 'google.com.na', 'google.com.nf', 'google.com.ng', 'google.com.ni', 'google.ne', 'google.nl', 'google.no', 
    'google.com.np', 'google.nr', 'google.nu', 'google.co.nz', 'google.com.om', 'google.com.pa', 'google.com.pe', 'google.com.pg', 'google.com.ph', 'google.com.pk', 'google.pl', 'google.pn', 
    'google.com.pr', 'google.ps', 'google.pt', 'google.com.py', 'google.com.qa', 'google.ro', 'google.ru', 'google.rw', 'google.com.sa', 'google.com.sb', 'google.sc', 'google.se', 'google.com.sg', 
    'google.sh', 'google.si', 'google.sk', 'google.com.sl', 'google.sn', 'google.so', 'google.sm', 'google.sr', 'google.st', 'google.com.sv', 'google.td', 'google.tg', 'google.co.th', 'google.com.tj', 
    'google.tk', 'google.tl', 'google.tm', 'google.tn', 'google.to', 'google.com.tr', 'google.tt', 'google.com.tw', 'google.co.tz', 'google.com.ua', 'google.co.ug', 'google.co.uk', 'google.com.uy', 
    'google.co.uz', 'google.com.vc', 'google.co.ve', 'google.vg', 'google.co.vi', 'google.com.vn', 'google.vu', 'google.ws', 'google.rs', 'google.co.za', 'google.co.zm', 'google.co.zw', 'google.cat');

    $protocols = array('http','https');
    
    $random_domain = array_rand($googleDomains,1);
    $googleDomain = $googleDomains[$random_domain];
    $random_protocol = array_rand($protocols,1);
    $protocol = $protocols[$random_protocol];
    
    $googleUrl =  $protocol .'://www.' . $googleDomain . '/search?hl=en&q=' . $searchQuery;
    $pageData = googleCurl($googleUrl);
    $count = explode('id="resultStats">',$pageData);
    $count  = explode('</div>',$count[1]);
    $count = $count[0];
    $count = filter_var($count, FILTER_SANITIZE_NUMBER_INT);
    if ($count == '')
        $count = 0;
    return number_format($count);
}

function getStatsData2($site, $technologies) {

        $accessID = 'mozscape-6467265d46';
        $secretKey = 'ceb9af1aba21f168cf26ff192927c041';
        if (!$accessID || !$secretKey)
        return 0;
        $expires = time() + 300;
        $stringToSign = $accessID . "\n" . $expires;
        $binarySignature = hash_hmac('sha1', $stringToSign, $secretKey, true);
        $urlSafeSignature = urlencode(base64_encode($binarySignature));
        $objectURL = $outData1;
        $cols = "103079231492";
        $requestUrl = "http://lsapi.seomoz.com/linkscape/url-metrics/" . urlencode($objectURL)
            . "?Cols=" . $cols . "&AccessID=" . $accessID . "&Expires=" . $expires . "&Signature=" . $urlSafeSignature;
        $options = array(
            CURLOPT_RETURNTRANSFER => true
        );
        $ch = curl_init($requestUrl);
        curl_setopt_array($ch, $options);
        $content = (curl_exec($ch));
        curl_close($ch);
        $array1 = explode(',', $content);
        $umrp = explode(":", $array1[1]);
        $pa = explode(":", $array1[3]);
        $da = explode(":", $array1[4]);

    $save['da'] = (int)$da[1];
    $save['pa'] = $pa[1];
    $save['mozrank'] = $umrp[1];
    
    $domain = trim($site);
    $domain_curl = 'https://www.' . $domain;

    $save['domainAuthority'] = $save['da'];

    $dataM = getSpeedData('AIzaSyD1wnxAppbj-riwtLtkTx-jzP-YQkvPsvw', $domain_curl, 'mobile', true);
    $save['pagespeed_mobile'] = intval($dataM->ruleGroups->SPEED->score);

    $data = getSpeedData('AIzaSyD1wnxAppbj-riwtLtkTx-jzP-YQkvPsvw', $domain_curl, 'desktop', true);

    if ($data->title) {
        $save['metaTitle'] = $data->title;
    }
    $save['pageSpeed'] = intval($data->ruleGroups->SPEED->score);

    $alexa = getAlexaRank($domain);
    $save['alexaLocal'] = $alexa['local']['rank'];
    $save['alexaGlobal'] = $alexa['global']['rank'];

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

    preg_match("/<title>(.+)<\/title>/siU", $save['body'], $matches);
    $title = $matches[1];
    $save['metaTitle'] = $title;
    $save['metaDescription'] = getMeta($save['body'], "description");
    $save['metaKeywords'] = getMeta($save['body'], "keywords");
    $save['metaH1'] = mb_substr_count($save['body'], "<h1");
    $save['metaH2'] = mb_substr_count($save['body'], "<h2");
    $save['metaH3'] = mb_substr_count($save['body'], "<h3");
    $save['metaH4'] = mb_substr_count($save['body'], "<h4");
    $save['metaH5'] = mb_substr_count($save['body'], "<h5");
    $save['metaH6'] = mb_substr_count($save['body'], "<h6");
    $save['favicon'] = getFavIcon($save['body']);

    $html = _curl($domain_curl);
    $dom = new DOMDocument();
    @$dom->loadHTML($html);

    $nodes = $dom->getElementsByTagName('link');
    foreach ($nodes as $node) {
        if ($node->getAttribute('rel') === 'amphtml')
            $save['hasAMP'] = 1;
        else
            $save['hasAMP'] = 0;

        $save["robots"] = remoteFileExists($domain_curl . "/robots.txt") ? 1 : 0;
        $save["sitemap"] = remoteFileExists($domain_curl . "/sitemap.xml") ? 1 : 0;

        $save['url_real'] = $domain_curl;
        $save['w3c'] = intval(getW3C($domain));
        if (connect($domain, 443))
            $save['https'] = '1';

        $links = getAllLinks($save['body'], $domain, 20);
        if (isset($links))
            foreach (@$links as $key => $value) {

                $ret = ping($value['link'], 5);
                $error = 0;
                if ($ret == 404 || $ret == 500 || $ret == 0)
                    $error = 1;
                //$links_raw .= $value['link'].'|'.$value['title']."|".$ret."|".$value['rel']."|".$error.";;";
                $links_raw[] = array("link" => $value['link'], "title" => $value['title'], "response" => $ret, "error" => $error, "rel" => $rel);
            }
        @$save['links'] = json_encode($links_raw);

        $save['google_safe'] = googleSafe($domain);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $domain_curl);
        $save['manifest'] = getManifest($save['body'], $domain_curl);

        $total = 15;
        $warning = 0;
        $errors = 0;
// Title
        $optimize['title'] = 'success';
        if (mb_strlen($save['metaTitle']) > 5 && (mb_strlen($save['metaTitle']) < 10 || mb_strlen($save['metaTitle']) > 70)) {
            $optimize['title'] = 'warning';
            $warning++;
        }
        if (mb_strlen($save['metaTitle']) <= 5) {
            $optimize['title'] = 'error';
            $errors++;
        }


// Description
        $optimize['description'] = 'success';
        if (mb_strlen($save['metaDescription']) > 0 && (mb_strlen($save['metaDescription']) < 10 || mb_strlen($save['metaDescription']) > 150)) {
            $optimize['description'] = 'warning';
            $warning++;
        }
        if (mb_strlen($save['metaDescription']) == 0) {
            $optimize['description'] = 'error';
            $errors++;
        }


// Robots
        $optimize['robots'] = 'success';
        if ($save['robots'] == 0) {
            $optimize['robots'] = 'error';
            $errors++;
        }

//Sitemap
        $optimize['sitemap'] = 'success';
        if ($save['sitemap'] == 0) {
            $optimize['sitemap'] = 'error';
            $errors++;
        }

//Google Indexed
        /* $optimize['googleIndex'] = 'success';
          if($site->googleIndex<100 && $site->googleIndex >=5)
          {
          $optimize['googleIndex'] = 'warning';
          $warning++;
          }
          if($site->googleIndex<5)
          {
          $optimize['googleIndex'] = 'error';
          $errors++;
          } */

//SSL
        $optimize['https'] = 'success';

        if (!$save['https']) {
            $optimize['https'] = 'warning';
            $warning++;
        }

// hasAMP

        if ($save['hasAMP'] == 1) {
            $optimize['hasAMP'] = 'success';
        } else {
            $optimize['hasAMP'] = 'warning';
            $warning++;
        }
    }

//Page Speed
    $optimize['pageSpeed'] = 'success';
    if ($save['pageSpeed'] < 85 && $save['pageSpeed'] > 50) {
        $optimize['pageSpeed'] = 'warning';
        $warning++;
    }
    if ($save['pageSpeed'] < 50) {
        $optimize['pageSpeed'] = 'error';
        $errors++;
    }


//Page Speed Mobiles
    $optimize['pagespeed_mobile'] = 'success';
    if ($save['pagespeed_mobile'] < 88 && $save['pagespeed_mobile'] > 50) {
        $optimize['pagespeed_mobile'] = 'warning';
        $warning++;
    }
    if ($save['pagespeed_mobile'] < 50) {
        $optimize['pagespeed_mobile'] = 'error';
        $errors++;
    }


// Headers
    $optimize['headers'] = 'success';
    if ($save['metaH1'] < 1 && $save['metaH1'] < 1) {
        $optimize['headers'] = 'error';
        $errors++;
    }
    if ($save['metaH1'] > 1 && $save['metaH2'] < 1) {
        $optimize['headers'] = 'warning';
        $warning++;
    }

//Google Safe Browsing
    $optimize['google_safe'] = 'success';
    if (!$save['google_safe']) {
        $optimize['google_safe'] = 'error';
        $errors++;
    }

//W3C
    $optimize['w3c'] = 'success';
    if ($save['w3c'] < 5 && $save['w3c'] > 0) {
        $optimize['w3c'] = 'warning';
        $warning++;
    }
    if ($save['w3c'] > 5) {
        $optimize['w3c'] = 'error';
        $errors++;
    }


//Domain Authority
    if ($save['domainAuthority'] > 10 && $save['domainAuthority'] < 25) {
        $optimize['domainAuthority'] = 'warning';
        $warning++;
    }
    if ($save['domainAuthority'] < 10) {
        $optimize['domainAuthority'] = 'error';
        $errors++;
    }
    if ($save['domainAuthority'] > 25) {
        $optimize['domainAuthority'] = 'success';
    }

    $optimize['favicon'] = 'success';
    if (trim($save['favicon']) == '') {
        $optimize['favicon'] = 'warning';
        $warning++;
    }

    $optimize['gzip'] = 'error';
    $errors++;
    $gzip = get_headers($domain_curl);
    //echo '<pre>';
    //print_r($gzip);
    //echo '</pre>';
    foreach ($gzip as $key => $value) {
        if (substr($value, 0, 17) == 'Content-Encoding:') {
            $optimize['gzip'] = 'success';
            $errors--;
        }
    }
    /*    foreach ($technologies as $key => $value) {
      if (mb_strtolower(@$value->name) == 'gzip') {
      $optimize['gzip'] = 'success';
      $errors--;
      }
      }
     */

    $optimize['links'] = 'success';
    $temp = json_decode($save['links']);
    if (isset($temp))
        foreach ($temp as $key => $value) {
            if ($value->error == '1') {
                $optimize['links'] = 'error';
                $errors++;
                break;
            }
        }

    @$response['errors'] = intval(($errors * 100) / $total) . '%';
    @$response['warning'] = intval(($warning * 100) / $total) . '%';
    @$response['success'] = 100 - ($response['errors'] + $response['warning']) . '%';
    $response['optimize'] = $optimize;
    $response['save'] = $save;
    
    /* if(ping($domain_curl,8))
      {
      return array("error" => __("Your website is down or not is valid"));
      } */

    //$domain_curl 				= trim($domain_curl);

    /* if(substr($domain_curl,-1) != '/')
      $domain_curl = $domain_curl."/"; */
    $score = 0;
    if (!$save['body'] || strlen($save['body']) <= 100) {
        $score = 1;
    }

    if (@$save['https'] == '1')
        $score += 7;
    if ($save['pageSpeed'] > 50 && $save['pageSpeed'] <= 80)
        $score += 10;
    if ($save['pageSpeed'] > 80 && $save['pageSpeed'] <= 85)
        $score += 20;
    if ($save['pageSpeed'] > 85 && $save['pageSpeed'] <= 91)
        $score += 25;
    if ($save['pageSpeed'] > 91 && $save['pageSpeed'] <= 98)
        $score += 38;
    if ($save['pageSpeed'] > 98)
        $score += 50;

    if ($save['pagespeed_mobile'] > 91)
        $score += 10;
    if ($save['pagespeed_mobile'] > 95)
        $score += 15;
    if ($save['pagespeed_mobile'] < 91)
        $score -= 5;
    if ($save['pagespeed_mobile'] < 80)
        $score -= 10;
    if ($save['w3c'] > 0 && $save['w3c'] <= 5)
        $score += 12;
    if ($save['w3c'] > 0 && $save['w3c'] <= 5)
        $score += 27;
    if ($save['metaH1'] > 0 || $save['metaH2'] > 0)
        $score += 20;
    if ($save['google_safe'] == TRUE) {
        $score += 9;
    } else {
        $score -= 50;
    }
    if ($save['domainAuthority'] >= 50)
        $score += ($save['domainAuthority'] / 2);
    if ($save['domainAuthority'] >= 20 && $save['domainAuthority'] < 50)
        $score += ($save['domainAuthority'] / 3);
    if ($save['domainAuthority'] >= 10 && $save['domainAuthority'] < 20)
        $score += ($save['domainAuthority'] / 4);
    if ($save['hasAMP'] == 'success') {
        $score += 10;
    } else {
        $score -= 2;
    }
    if (strlen($save['manifest']) > 50)
        $score += 10;
    if (strlen($save['metaTitle']) > 180 || strlen($save['metaTitle']) < 5)
        $score -= 5;
    if (strlen($save['metaDescription']) > 250 || strlen($save['metaDescription']) < 5)
        $score -= 5;
    if ($score < 85 && $save['alexaGlobal'] < 800 && $save['alexaGlobal'] > 0)
        $score += 10;
    if ($score < 85 && $save['alexaGlobal'] < 100 && $save['alexaGlobal'] > 0)
        $score += 10;
    if ($score < 85 && $save['alexaLocal'] < 100 && $save['alexaLocal'] > 0)
        $score += 10;
    if ($save['alexaLocal'] < 10 && $save['alexaLocal'] > 0)
        $score += 10;
    if ($save['domainAuthority'] > 85)
        $score = $save['domainAuthority'] - 2;
    if ($save['domainAuthority'] > 99 && $score > 99)
        $score = 99;
    if ($score < 0)
        $score = 0;
    if ($score > 90 && $save['domainAuthority'] < 80)
        $score -= 5;
    if ($score > 90 && $save['domainAuthority'] < 90)
        $score -= 5;
    if ($score > 80 && $save['domainAuthority'] < 10)
        $score -= 10;

    $response['score'] = $score;
    return $response;
}

function getStatsData($site, $technologies) {

    $domain = trim($site);
    $domain_curl = 'https://' . $domain;

    $save['url'] = $domain;
    $moz = domainAuthority($domain);
    $save['domainAuthority'] = $moz;
    
    $save['body'] = (_curl($domain_curl));
    
    $dataM = getSpeedData('AIzaSyD1wnxAppbj-riwtLtkTx-jzP-YQkvPsvw', $domain_curl, 'mobile', true);
    $save['pagespeed_mobile'] = intval($dataM->ruleGroups->SPEED->score);

    $data = getSpeedData('AIzaSyD1wnxAppbj-riwtLtkTx-jzP-YQkvPsvw', $domain_curl, 'desktop', true);
    $save['pageSpeed'] = intval($data->ruleGroups->SPEED->score);
    
    $save['charset'] 			= getCharset($save['body']);		

				if(mb_strtolower($save['charset']) != 'utf-8' && $save['charset'] != '')
					$save['body'] 				= iconv($save['charset'],'UTF-8',$save['body']);
				//$save['body'] 				= mb_convert_encoding($save['body'], 'utf-8', $save['charset']);

			
				//$save['body'] 				= $save['body'];						
				$save['headers'] 			= _curl_headers($domain_curl);

				$save['metaTitle'] 			= ucwords(strtolower(getMeta($save['body'],"title")));
				$save['metaDescription'] 	= ucwords(strtolower(getMeta($save['body'],"description")));
				$save['metaKeywords'] 		= getMeta($save['body'],"keywords");
				$save['metaH1'] 			= mb_substr_count($save['body'], "<h1");
				$save['metaH2'] 			= mb_substr_count($save['body'], "<h2");
				$save['metaH3'] 			= mb_substr_count($save['body'], "<h3");
				$save['metaH4'] 			= mb_substr_count($save['body'], "<h4");

    $alexa = getAlexaRank($domain);
    $save['alexaLocal'] = $alexa['local']['rank'];
    $save['alexaGlobal'] = $alexa['global']['rank'];

    $temp_d = $domain_curl;
    $domain_curl = getEfectiveUrl($domain_curl);


    if (substr($domain_curl, -1) == '/')
        $domain_curl = substr($domain_curl, 0, -1);


    if (!$domain_curl || $domain_curl == '://')
        $domain_curl = $temp_d;
    
    $save['favicon'] = getFavIcon($save['body']);

    $html = _curl($domain_curl);
    $dom = new DOMDocument();
    @$dom->loadHTML($html);

    $nodes = $dom->getElementsByTagName('link');
    foreach ($nodes as $node) {
        if ($node->getAttribute('rel') === 'amphtml')
            $save['hasAMP'] = 1;
        else
            $save['hasAMP'] = 0;

        $save["robots"] = remoteFileExists($domain_curl . "/robots.txt") ? 1 : 0;
        $save["sitemap"] = remoteFileExists($domain_curl . "/sitemap.xml") ? 1 : 0;

        $save['url_real'] = $domain_curl;
        $save['w3c'] = intval(getW3C($domain));
        if (connect($domain, 443))
            $save['https'] = '1';

        $links = getAllLinks($save['body'], $domain, 20);
        if (isset($links))
            foreach (@$links as $key => $value) {

                $ret = ping($value['link'], 5);
                $error = 0;
                if ($ret == 404 || $ret == 500 || $ret == 0)
                    $error = 1;
//$links_raw .= $value['link'].'|'.$value['title']."|".$ret."|".$value['rel']."|".$error.";;";
                $links_raw[] = array("link" => $value['link'], "title" => $value['title'], "response" => $ret, "error" => $error, "rel" => $rel);
            }
        @$save['links'] = json_encode($links_raw);

        $save['google_safe'] = googleSafe($domain);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $domain_curl);
        $save['manifest'] = getManifest($save['body'], $domain_curl);
    }
    return $save;
}

function getAlexaRank($domain) {

    $xml = simplexml_load_string(_curl('http://data.alexa.com/data?cli=10&dat=snbamz&url=' . $domain));
    $rank['local']['country'] = '-';
    $rank['local']['rank'] = '99999999';
    $rank['global']['rank'] = '99999999';
    if ($xml->SD[1]) {
        @$rank['local']['country'] = (String) $xml->SD[1]->COUNTRY->attributes()->NAME . "," . (String) $xml->SD[1]->COUNTRY->attributes()->CODE;
        @$rank['local']['rank'] = (int) $xml->SD[1]->COUNTRY->attributes()->RANK;
        @$rank['global']['rank'] = (int) $xml->SD[1]->POPULARITY->attributes()->TEXT;
        if (!$rank['local']['rank'] || $rank['local']['rank'] == 0) {
            @$rank['local']['rank'] = $rank['global']['rank'];
            @$rank['local']['country'] = 'Global';
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

function googleCache($url) {
    $googleCacheUrl = 'http://webcache.googleusercontent.com';

    $query = 'hl=en&q=' . 'cache:' . urlencode($url) . '&strip=1';
    $url = $googleCacheUrl . '/search?' . $query;
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $html = curl_exec($ch);
    curl_close($ch);

    if (!is_string($html) || !strlen($html))
    {
        return false;
    }
    
    $dateExplode = explode("appeared on",$html);
    $dateExplode = explode("GMT",$dateExplode[1]);
    $cacheDate = trim($dateExplode[0]);
    if($cacheDate != ""){
       $cacheDate = $cacheDate .' GMT';
    }
    return $cacheDate;
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

function page_statistic_speed_mobile($domain) {

    global $google_api_key;

    $domain = clean_url($domain);
    $custom_domain = 'https://www.' . $domain;

    $google_api_key = 'AIzaSyD1wnxAppbj-riwtLtkTx-jzP-YQkvPsvw';
    //cUrl
    $api_url = 'https://www.googleapis.com/pagespeedonline/v4/runPagespeed?';
    $param = array(
        'url' => $custom_domain,
        'strategy' => 'mobile',
        'filter_third_party_resources' => 'true',
        'key' => $google_api_key,
    );
    $new_query = http_build_query($param);
    $query = $api_url . $new_query;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $query);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $result = curl_exec($ch);
    curl_close($ch);

    $new_res = json_decode($result);

    if ($new_res->formattedResults->ruleResults->AvoidLandingPageRedirects->ruleImpact > 0) {
        $landingpage = array(
            'rule_name' => $new_res->formattedResults->ruleResults->AvoidLandingPageRedirects->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->AvoidLandingPageRedirects->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->AvoidLandingPageRedirects->summary->format,
            'redirecturl' => $new_res->formattedResults->ruleResults->AvoidLandingPageRedirects->summary->args[0]->value,
        );
        $AvoidLandingPageRedirects_urlBlocks = $new_res->formattedResults->ruleResults->AvoidLandingPageRedirects->urlBlocks;
        $AvoidLandingPageRedirects_urls = array();
        foreach ($AvoidLandingPageRedirects_urlBlocks as $urls) {
            foreach ($urls->urls as $uri) {
                foreach ($uri->result->args as $result) {
                    array_push($AvoidLandingPageRedirects_urls, $result->value);
                }
            }
        }
    } else {
        $landingpage = array(
            'rule_name' => $new_res->formattedResults->ruleResults->AvoidLandingPageRedirects->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->AvoidLandingPageRedirects->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->AvoidLandingPageRedirects->summary->format,
            'redirecturl' => $new_res->formattedResults->ruleResults->AvoidLandingPageRedirects->summary->args[0]->value,
        );
        $AvoidLandingPageRedirects_urls = "";
    }

    if ($new_res->formattedResults->ruleResults->EnableGzipCompression->ruleImpact > 0) {
        $enambleGzipcomprassion = array(
            'rule_name' => $new_res->formattedResults->ruleResults->EnableGzipCompression->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->EnableGzipCompression->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->EnableGzipCompression->summary->format,
            'redirecturl' => $new_res->formattedResults->ruleResults->EnableGzipCompression->urlBlocks[0]->header->args[0]->value,
            'size_in_bytes' => $new_res->formattedResults->ruleResults->EnableGzipCompression->urlBlocks[0]->header->args[1]->value,
            'percentage_exceution' => $new_res->formattedResults->ruleResults->EnableGzipCompression->urlBlocks[0]->header->args[2]->value,
        );
        $EnableGzipCompression_urlBlocks = $new_res->formattedResults->ruleResults->EnableGzipCompression->urlBlocks;
        $EnableGzipCompression_urls = array();
        foreach ($EnableGzipCompression_urlBlocks as $urls) {
            foreach ($urls->urls as $uri) {
                foreach ($uri->result->args as $result) {
                    array_push($EnableGzipCompression_urls, $result->value);
                    break;
                }
            }
        }
    } else {
        $enambleGzipcomprassion = array(
            'rule_name' => $new_res->formattedResults->ruleResults->EnableGzipCompression->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->EnableGzipCompression->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->EnableGzipCompression->summary->format,
            'redirecturl' => $new_res->formattedResults->ruleResults->EnableGzipCompression->summary->args[0]->value,
        );
        $EnableGzipCompression_urls = "";
    }


    /* -------------------- Leverage browser caching-------------------------- */
    if ($new_res->formattedResults->ruleResults->LeverageBrowserCaching->ruleImpact > 0) {
        $LeverageBrowserCaching = array(
            'rule_name' => $new_res->formattedResults->ruleResults->LeverageBrowserCaching->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->LeverageBrowserCaching->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->LeverageBrowserCaching->summary->format,
            'redirecturl' => $new_res->formattedResults->ruleResults->LeverageBrowserCaching->urlBlocks[0]->header->args[0]->value,
        );

        $LeverageBrowserCaching_urlBlocks = $new_res->formattedResults->ruleResults->LeverageBrowserCaching->urlBlocks;
        $leverage_urls = array();
        foreach ($LeverageBrowserCaching_urlBlocks as $urls) {
            foreach ($urls->urls as $uri) {
                foreach ($uri->result->args as $result) {
                    array_push($leverage_urls, $result->value);
                    break;
                }
            }
        }
    } else {
        if (!isset($new_res->formattedResults->ruleResults->LeverageBrowserCaching->urlBlocks[0])) {
            $LeverageBrowserCaching = array(
                'rule_name' => $new_res->formattedResults->ruleResults->LeverageBrowserCaching->localizedRuleName,
                'rule_impact' => $new_res->formattedResults->ruleResults->LeverageBrowserCaching->ruleImpact,
                'summary' => $new_res->formattedResults->ruleResults->LeverageBrowserCaching->summary->format,
                'redirecturl' => 'https://developers.google.com/speed/docs/insights/LeverageBrowserCaching',
            );
            $leverage_urls = "";
        } else {
            $LeverageBrowserCaching = array(
                'rule_name' => $new_res->formattedResults->ruleResults->LeverageBrowserCaching->localizedRuleName,
                'rule_impact' => $new_res->formattedResults->ruleResults->LeverageBrowserCaching->ruleImpact,
                'summary' => $new_res->formattedResults->ruleResults->LeverageBrowserCaching->summary->format,
                'redirecturl' => 'https://developers.google.com/speed/docs/insights/LeverageBrowserCaching',
            );
            $leverage_urls = "";
        }

        //$leverage_urls = "";
    }


    /* --------------------------- Server Response time----------------------------------- */
    if ($new_res->formattedResults->ruleResults->MainResourceServerResponseTime->ruleImpact > 0) {
        $ServerResponseTime = array(
            'rule_name' => $new_res->formattedResults->ruleResults->MainResourceServerResponseTime->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->MainResourceServerResponseTime->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->MainResourceServerResponseTime->urlBlocks[0]->header->format,
            'redirecturl' => @$new_res->formattedResults->ruleResults->MainResourceServerResponseTime->urlBlocks[0]->header->args[1]->value,
        );
        $ServerResponseTime_urlBlocks = $new_res->formattedResults->ruleResults->MainResourceServerResponseTime->urlBlocks[0]->header->args;

        $ServerResponseTime_urls = array();
        foreach ($ServerResponseTime_urlBlocks as $urls) {
            array_push($ServerResponseTime_urls, $urls->value);
        }
    } else {
        $ServerResponseTime = array(
            'rule_name' => $new_res->formattedResults->ruleResults->MainResourceServerResponseTime->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->MainResourceServerResponseTime->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->MainResourceServerResponseTime->summary->format,
            'redirecturl' => $new_res->formattedResults->ruleResults->MainResourceServerResponseTime->summary->args[0]->value,
        );
        $ServerResponseTime_urls = "";
    }

    /* --------------------------- Minify CSS----------------------------------- */
    if ($new_res->formattedResults->ruleResults->MinifyCss->ruleImpact > 0) {
        $MinifyCss = array(
            'rule_name' => $new_res->formattedResults->ruleResults->MinifyCss->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->MinifyCss->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->MinifyCss->summary->format,
            'redirecturl' => $new_res->formattedResults->ruleResults->MinifyCss->urlBlocks[0]->header->args[0]->value,
            'size_in_bytes' => $new_res->formattedResults->ruleResults->MinifyCss->urlBlocks[0]->header->args[1]->value,
            'percentage_exceution' => $new_res->formattedResults->ruleResults->MinifyCss->urlBlocks[0]->header->args[2]->value,
        );
        $MinifyCss_urlBlocks = $new_res->formattedResults->ruleResults->MinifyCss->urlBlocks;
        $MinifyCss_urls = array();
        foreach ($MinifyCss_urlBlocks as $urls) {
            foreach ($urls->urls as $uri) {
                foreach ($uri->result->args as $result) {
                    array_push($MinifyCss_urls, $result->value);
                    break;
                }
            }
        }
    } else {
        $MinifyCss = array(
            'rule_name' => $new_res->formattedResults->ruleResults->MinifyCss->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->MinifyCss->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->MinifyCss->summary->format,
            'redirecturl' => $new_res->formattedResults->ruleResults->MinifyCss->summary->args[0]->value,
        );
        $MinifyCss_urls = "";
    }


    /* --------------------------- Minify HTML----------------------------------- */
    if ($new_res->formattedResults->ruleResults->MinifyHTML->ruleImpact > 0) {
        $MinifyHTML = array(
            'rule_name' => $new_res->formattedResults->ruleResults->MinifyHTML->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->MinifyHTML->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->MinifyHTML->summary->format,
            'redirecturl' => $new_res->formattedResults->ruleResults->MinifyJavaScript->urlBlocks[0]->header->args[0]->value,
            'size_in_bytes' => $new_res->formattedResults->ruleResults->MinifyJavaScript->urlBlocks[0]->header->args[1]->value,
            'percentage_exceution' => $new_res->formattedResults->ruleResults->MinifyJavaScript->urlBlocks[0]->header->args[2]->value,
        );
        $MinifyHTML_urlBlocks = $new_res->formattedResults->ruleResults->MinifyHTML->urlBlocks;
        $MinifyHTML_urls = array();
        foreach ($MinifyHTML_urlBlocks as $urls) {
            foreach ($urls->urls as $uri) {
                foreach ($uri->result->args as $result) {
                    array_push($MinifyHTML_urls, $result->value);
                    break;
                }
            }
        }
    } else {
        $MinifyHTML = array(
            'rule_name' => $new_res->formattedResults->ruleResults->MinifyHTML->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->MinifyHTML->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->MinifyHTML->summary->format,
            'redirecturl' => $new_res->formattedResults->ruleResults->MinifyHTML->summary->args[0]->value,
        );
        $MinifyHTML_urls = "";
    }


    /* --------------------------- Minify JAVASCRIPT----------------------------------- */
    if ($new_res->formattedResults->ruleResults->MinifyJavaScript->ruleImpact > 0) {
        $MinifyJavaScript = array(
            'rule_name' => $new_res->formattedResults->ruleResults->MinifyJavaScript->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->MinifyJavaScript->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->MinifyJavaScript->summary->format,
            'redirecturl' => $new_res->formattedResults->ruleResults->MinifyJavaScript->urlBlocks[0]->header->args[0]->value,
            'size_in_bytes' => $new_res->formattedResults->ruleResults->MinifyJavaScript->urlBlocks[0]->header->args[1]->value,
            'percentage_exceution' => $new_res->formattedResults->ruleResults->MinifyJavaScript->urlBlocks[0]->header->args[2]->value,
        );
        $MinifyJavaScript_urlBlocks = $new_res->formattedResults->ruleResults->MinifyJavaScript->urlBlocks;
        $MinifyJavaScript_urls = array();
        foreach ($MinifyJavaScript_urlBlocks as $urls) {
            foreach ($urls->urls as $uri) {
                foreach ($uri->result->args as $result) {
                    array_push($MinifyJavaScript_urls, $result->value);
                    break;
                }
            }
        }
    } else {
        $MinifyJavaScript = array(
            'rule_name' => $new_res->formattedResults->ruleResults->MinifyJavaScript->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->MinifyJavaScript->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->MinifyJavaScript->summary->format,
            'redirecturl' => $new_res->formattedResults->ruleResults->MinifyJavaScript->summary->args[0]->value,
        );
        $MinifyJavaScript_urls = "";
    }


    /* --------------------------- MinimizeRenderBlockingResources----------------------------------- */
    if ($new_res->formattedResults->ruleResults->MinimizeRenderBlockingResources->ruleImpact > 0) {
        $numcss = "";
        $numjs = "";
        $MinimizeRenderBlockingResources_urls_css = array();
        $MinimizeRenderBlockingResources_urls_js = array();
        $numkey = $new_res->formattedResults->ruleResults->MinimizeRenderBlockingResources->summary->args[0]->key;
        if (array_key_exists("1", $new_res->formattedResults->ruleResults->MinimizeRenderBlockingResources->summary->args)) {
            $numcss .= $new_res->formattedResults->ruleResults->MinimizeRenderBlockingResources->summary->args[1]->value;
            $numjs .= $new_res->formattedResults->ruleResults->MinimizeRenderBlockingResources->summary->args[0]->value;
            /* ------js--------- */
            $MinimizeRenderBlockingResources_urlBlocks_js = $new_res->formattedResults->ruleResults->MinimizeRenderBlockingResources->urlBlocks[1];
            foreach ($MinimizeRenderBlockingResources_urlBlocks_js->urls as $urls_js) {
                foreach ($urls_js->result->args as $result_js) {
                    array_push($MinimizeRenderBlockingResources_urls_js, $result_js->value);
                    break;
                }
            }
            /* ------css--------- */
            $MinimizeRenderBlockingResources_urlBlocks_css = $new_res->formattedResults->ruleResults->MinimizeRenderBlockingResources->urlBlocks[2];
            foreach ($MinimizeRenderBlockingResources_urlBlocks_css->urls as $urls_css) {
                foreach ($urls_css->result->args as $result_css) {
                    array_push($MinimizeRenderBlockingResources_urls_css, $result_css->value);
                    break;
                }
            }
        } else if ($numkey == "NUM_CSS") {
            $numcss .= $new_res->formattedResults->ruleResults->MinimizeRenderBlockingResources->summary->args[0]->value;
            $numjs .= "0";

            /* ------css--------- */
            $MinimizeRenderBlockingResources_urlBlocks_css = $new_res->formattedResults->ruleResults->MinimizeRenderBlockingResources->urlBlocks[1];
            foreach ($MinimizeRenderBlockingResources_urlBlocks_css->urls as $urls_css) {
                foreach ($urls_css->result->args as $result_css) {
                    array_push($MinimizeRenderBlockingResources_urls_css, $result_css->value);
                    break;
                }
            }
        } else {
            $numcss .= '0';
            $numjs .= $new_res->formattedResults->ruleResults->MinimizeRenderBlockingResources->summary->args[0]->value;

            /* ------js--------- */
            $MinimizeRenderBlockingResources_urlBlocks_js = $new_res->formattedResults->ruleResults->MinimizeRenderBlockingResources->urlBlocks[1];
            foreach ($MinimizeRenderBlockingResources_urlBlocks_js->urls as $urls_js) {
                foreach ($urls_js->result->args as $result_js) {
                    array_push($MinimizeRenderBlockingResources_urls_js, $result_js->value);
                    break;
                }
            }
        }
        $MinimizeRenderBlockingResources = array(
            'rule_name' => $new_res->formattedResults->ruleResults->MinimizeRenderBlockingResources->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->MinimizeRenderBlockingResources->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->MinimizeRenderBlockingResources->summary->format,
            'summary_num_script' => $numjs,
            'summary_num_css' => $numcss,
            'summary_urlblock_header' => $new_res->formattedResults->ruleResults->MinimizeRenderBlockingResources->urlBlocks[0]->header->format,
        );
    } else {
        $MinimizeRenderBlockingResources = array(
            'rule_name' => $new_res->formattedResults->ruleResults->MinimizeRenderBlockingResources->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->MinimizeRenderBlockingResources->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->MinimizeRenderBlockingResources->summary->format,
            'redirecturl' => $new_res->formattedResults->ruleResults->MinimizeRenderBlockingResources->summary->args[0]->value,
        );
        $MinimizeRenderBlockingResources_urls_js = "";
        $MinimizeRenderBlockingResources_urls_css = "";
    }


    /* --------------------------- Optimize Images----------------------------------- */
    if ($new_res->formattedResults->ruleResults->OptimizeImages->ruleImpact > 0) {
        $OptimizeImages = array(
            'rule_name' => $new_res->formattedResults->ruleResults->OptimizeImages->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->OptimizeImages->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->OptimizeImages->summary->format,
            'redirecturl' => $new_res->formattedResults->ruleResults->OptimizeImages->urlBlocks[0]->header->args[0]->value,
            'size_in_bytes' => $new_res->formattedResults->ruleResults->OptimizeImages->urlBlocks[0]->header->args[1]->value,
            'percentage_exceution' => $new_res->formattedResults->ruleResults->OptimizeImages->urlBlocks[0]->header->args[2]->value,
        );
        $OptimizeImages_urlBlocks = $new_res->formattedResults->ruleResults->OptimizeImages->urlBlocks;
        $OptimizeImages_urls = array();
        foreach ($OptimizeImages_urlBlocks as $urls) {
            foreach ($urls->urls as $uri) {
                foreach ($uri->result->args as $result) {
                    array_push($OptimizeImages_urls, $result->value);
                    break;
                }
            }
        }
    } else {
        $OptimizeImages = array(
            'rule_name' => $new_res->formattedResults->ruleResults->OptimizeImages->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->OptimizeImages->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->OptimizeImages->summary->format,
            'redirecturl' => $new_res->formattedResults->ruleResults->OptimizeImages->summary->args[0]->value,
        );
        $OptimizeImages_urls = "";
    }

    /* --------------------------- Prioritize visible Content----------------------------------- */
    if ($new_res->formattedResults->ruleResults->PrioritizeVisibleContent->ruleImpact > 0) {
        $PrioritizeVisibleContent = array(
            'rule_name' => $new_res->formattedResults->ruleResults->PrioritizeVisibleContent->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->PrioritizeVisibleContent->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->PrioritizeVisibleContent->summary->format,
            'redirecturl' => 'https://developers.google.com/speed/docs/insights/PrioritizeVisibleContent',
        );
    } else {
        $PrioritizeVisibleContent = array(
            'rule_name' => $new_res->formattedResults->ruleResults->PrioritizeVisibleContent->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->PrioritizeVisibleContent->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->PrioritizeVisibleContent->summary->format,
            'redirecturl' => 'https://developers.google.com/speed/docs/insights/PrioritizeVisibleContent',
        );
    }

    //Usability score
    $api_url_usability = 'https://www.googleapis.com/pagespeedonline/v2/runPagespeed?';
    $new_query = http_build_query($param);
    $query = $api_url_usability . $new_query;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $query);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $result = curl_exec($ch);
    curl_close($ch);
    $new_res = json_decode($result);

    $usability_score = array(
        'usability_score' => $new_res->ruleGroups->USABILITY->score
    );


    return json_encode(array(
        $landingpage,
        $AvoidLandingPageRedirects_urls,
        $enambleGzipcomprassion,
        $EnableGzipCompression_urls,
        $LeverageBrowserCaching,
        $leverage_urls,
        $ServerResponseTime,
        $ServerResponseTime_urls,
        $MinifyCss,
        $MinifyCss_urls,
        $MinifyHTML,
        $MinifyHTML_urls,
        $MinifyJavaScript,
        $MinifyJavaScript_urls,
        $MinimizeRenderBlockingResources,
        $MinimizeRenderBlockingResources_urls_js,
        $MinimizeRenderBlockingResources_urls_css,
        $OptimizeImages,
        $OptimizeImages_urls,
        $PrioritizeVisibleContent,
        $usability_score
    ));
}

function page_statistic_speed_desktop($domain) {

    global $google_api_key;
    $google_api_key = 'AIzaSyD1wnxAppbj-riwtLtkTx-jzP-YQkvPsvw';

    $domain = clean_url($domain);
    $custom_domain1 = 'https://www.' . $domain;
    
//cUrl
    $api_url = 'https://www.googleapis.com/pagespeedonline/v4/runPagespeed?';
    $param = array(
        'url' => $custom_domain1,
        'strategy' => 'desktop',
        'key' => $google_api_key,
    );
    $new_query = http_build_query($param);
    $query = $api_url . $new_query;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $query);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $result = curl_exec($ch);

    $new_res = json_decode($result);

//AvoidLandingPageRedirects
    if ($new_res->formattedResults->ruleResults->AvoidLandingPageRedirects->ruleImpact == 0) {
        $avoid_landing_page_redirects = array(
            'rule_name' => $new_res->formattedResults->ruleResults->AvoidLandingPageRedirects->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->AvoidLandingPageRedirects->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->AvoidLandingPageRedirects->summary->format,
            'url' => $new_res->formattedResults->ruleResults->AvoidLandingPageRedirects->summary->args['0']->value
        );
        $page_urls = '';
    } else {
        $avoid_landing_page_redirects = array(
            'rule_name' => $new_res->formattedResults->ruleResults->AvoidLandingPageRedirects->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->AvoidLandingPageRedirects->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->AvoidLandingPageRedirects->summary->format,
            'url_count' => $new_res->formattedResults->ruleResults->AvoidLandingPageRedirects->summary->args['0']->value
        );
        $page_url_data = $new_res->formattedResults->ruleResults->AvoidLandingPageRedirects->urlBlocks;
        $page_urls = array();
        foreach ($page_url_data as $page_url1) {
            foreach ($page_url1->urls as $inner_url) {
                array_push($page_urls, $inner_url->result->args[0]->value);
            }
        }
    }

//EnableGzipCompression
    if ($new_res->formattedResults->ruleResults->EnableGzipCompression->ruleImpact == 0) {
        $EnableGzipCompression = array(
            'rule_name' => $new_res->formattedResults->ruleResults->EnableGzipCompression->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->EnableGzipCompression->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->EnableGzipCompression->summary->format,
            'url' => $new_res->formattedResults->ruleResults->EnableGzipCompression->summary->args['0']->value
        );
    } else {
        $EnableGzipCompression = array(
            'rule_name' => $new_res->formattedResults->ruleResults->EnableGzipCompression->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->EnableGzipCompression->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->EnableGzipCompression->summary->format,
        );
    }

//LeverageBrowserCaching
    if ($new_res->formattedResults->ruleResults->LeverageBrowserCaching->ruleImpact > 0) {
        $LeverageBrowserCaching = array(
            'rule_name' => $new_res->formattedResults->ruleResults->LeverageBrowserCaching->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->LeverageBrowserCaching->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->LeverageBrowserCaching->summary->format,
        );

        $LeverageBrowserCaching_urlBlocks = $new_res->formattedResults->ruleResults->LeverageBrowserCaching->urlBlocks;
        $leverage_urls = array();
        foreach ($LeverageBrowserCaching_urlBlocks as $urls) {
            foreach ($urls->urls as $uri) {
                foreach ($uri->result->args as $result) {
                    array_push($leverage_urls, $result->value);
                }
            }
        }
    } else {
        $LeverageBrowserCaching = array(
            'rule_name' => $new_res->formattedResults->ruleResults->LeverageBrowserCaching->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->LeverageBrowserCaching->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->LeverageBrowserCaching->summary->format,
        );
        $leverage_urls = "";
    }

//MainResourceServerResponseTime
    if ($new_res->formattedResults->ruleResults->MainResourceServerResponseTime->ruleImpact > 0) {
        $MainResourceServerResponseTime = array(
            'rule_name' => $new_res->formattedResults->ruleResults->MainResourceServerResponseTime->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->MainResourceServerResponseTime->ruleImpact,
        );
        $MainResourceServerResponseTime_urlBlocks = $new_res->formattedResults->ruleResults->MainResourceServerResponseTime->urlBlocks;
        $MainResourceServerResponseTime_arr = array();
        foreach ($MainResourceServerResponseTime_urlBlocks as $summry) {
            foreach ($summry->header->args as $k) {
                array_push($MainResourceServerResponseTime_arr, $k->value);
            }
        }
    } else {
        $MainResourceServerResponseTime = array(
            'rule_name' => $new_res->formattedResults->ruleResults->MainResourceServerResponseTime->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->MainResourceServerResponseTime->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->MainResourceServerResponseTime->summary->format
        );
        $MainResourceServerResponseTime_arr = "";
    }

//MinifyCss
    if ($new_res->formattedResults->ruleResults->MinifyCss->ruleImpact > 0) {
        $MinifyCss = array(
            'rule_name' => $new_res->formattedResults->ruleResults->MinifyCss->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->MinifyCss->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->MinifyCss->summary->format,
        );

        $MinifyCss_data = $new_res->formattedResults->ruleResults->MinifyCss->urlBlocks;
        $arr_MinifyCss_header = array();
        foreach ($MinifyCss_data as $urls) {
            foreach ($urls->header->args as $uri) {
                array_push($arr_MinifyCss_header, $uri->value);
            }
        }
        $arr_MinifyCss = array();
        foreach ($MinifyCss_data as $urls) {
            foreach ($urls->urls as $uri) {
                array_push($arr_MinifyCss, $uri->result->args[0]->value);
            }
        }
    } else {
        $MinifyCss = array(
            'rule_name' => $new_res->formattedResults->ruleResults->MinifyCss->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->MinifyCss->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->MinifyCss->summary->format
        );
        $arr_MinifyCss_header = '';
        $arr_MinifyCss = '';
    }

//MinifyHTML
    if ($new_res->formattedResults->ruleResults->MinifyHTML->ruleImpact > 0) {
        $MinifyHTML = array(
            'rule_name' => $new_res->formattedResults->ruleResults->MinifyHTML->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->MinifyHTML->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->MinifyHTML->summary->format
        );
    } else {
        $MinifyHTML = array(
            'rule_name' => $new_res->formattedResults->ruleResults->MinifyHTML->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->MinifyHTML->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->MinifyHTML->summary->format
        );
    }

//MinifyJavaScript
    if ($new_res->formattedResults->ruleResults->MinifyJavaScript->ruleImpact > 0) {
        $MinifyJavaScript = array(
            'rule_name' => $new_res->formattedResults->ruleResults->MinifyJavaScript->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->MinifyJavaScript->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->MinifyJavaScript->summary->format
        );
        $arrData = $new_res->formattedResults->ruleResults->MinifyJavaScript->urlBlocks;
        $MinifyJavaScript_header = array();
        foreach ($arrData as $urls) {
            foreach ($urls->header->args as $uri) {
                array_push($MinifyJavaScript_header, $uri->value);
            }
        }
        $arr_MinifyJavaScript = array();
        foreach ($arrData as $urls) {
            foreach ($urls->urls as $uri) {
                array_push($arr_MinifyJavaScript, $uri->result->args[0]->value);
            }
        }
    } else {
        $MinifyJavaScript = array(
            'rule_name' => $new_res->formattedResults->ruleResults->MinifyJavaScript->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->MinifyJavaScript->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->MinifyJavaScript->summary->format
        );
        $MinifyJavaScript_header = '';
        $arr_MinifyJavaScript = '';
    }

//MinimizeRenderBlockingResources
    if ($new_res->formattedResults->ruleResults->MinimizeRenderBlockingResources->ruleImpact > 0) {
        $MinimizeRenderBlockingResources = array(
            'rule_name' => $new_res->formattedResults->ruleResults->MinimizeRenderBlockingResources->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->MinimizeRenderBlockingResources->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->MinimizeRenderBlockingResources->summary->format
        );
        $MinimizeRenderBlockingResources_countData = $new_res->formattedResults->ruleResults->MinimizeRenderBlockingResources->summary->args;

        $MinimizeRenderBlockingResources_header = array();
        foreach ($MinimizeRenderBlockingResources_countData as $urls) {
            if (array_key_exists('1', $MinimizeRenderBlockingResources_countData)) {
                array_push($MinimizeRenderBlockingResources_header, $urls->value);
            } else {
                if ($urls->key == 'NUM_SCRIPTS') {
                    $MinimizeRenderBlockingResources_header[0] = $urls->value;
                    $MinimizeRenderBlockingResources_header[1] = '0';
                }
                if ($urls->key == 'NUM_CSS') {
                    $MinimizeRenderBlockingResources_header[0] = '0';
                    $MinimizeRenderBlockingResources_header[1] = $urls->value;
                }
            }
        }

        if (isset($new_res->formattedResults->ruleResults->MinimizeRenderBlockingResources->urlBlocks[1]->urls)) {
            $MinimizeRenderBlockingResources_js_Data = $new_res->formattedResults->ruleResults->MinimizeRenderBlockingResources->urlBlocks[1]->urls;
            $MinimizeRenderBlockingResources_js = array();
            foreach ($MinimizeRenderBlockingResources_js_Data as $jsurl) {
                foreach ($jsurl->result->args as $uri_js) {
                    array_push($MinimizeRenderBlockingResources_js, $uri_js->value);
                }
            }
        } else {
            $MinimizeRenderBlockingResources_js = '';
        }

        if (isset($new_res->formattedResults->ruleResults->MinimizeRenderBlockingResources->urlBlocks[2]->urls)) {
            $MinimizeRenderBlockingResources_css_Data = $new_res->formattedResults->ruleResults->MinimizeRenderBlockingResources->urlBlocks[2]->urls;
            $MinimizeRenderBlockingResources_css = array();
            foreach ($MinimizeRenderBlockingResources_css_Data as $jsurl) {
                foreach ($jsurl->result->args as $uri_js) {
                    array_push($MinimizeRenderBlockingResources_css, $uri_js->value);
                }
            }
        } else {
            $MinimizeRenderBlockingResources_css = '';
        }
    } else {
        $MinimizeRenderBlockingResources = array(
            'rule_name' => $new_res->formattedResults->ruleResults->MinimizeRenderBlockingResources->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->MinimizeRenderBlockingResources->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->MinimizeRenderBlockingResources->summary->format
        );
        $MinimizeRenderBlockingResources_header = '';
        $MinimizeRenderBlockingResources_js = '';
        $MinimizeRenderBlockingResources_css = '';
    }

//OptimizeImages
    if ($new_res->formattedResults->ruleResults->OptimizeImages->ruleImpact > 0) {
        $OptimizeImages = array(
            'rule_name' => $new_res->formattedResults->ruleResults->OptimizeImages->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->OptimizeImages->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->OptimizeImages->summary->format
        );
        $url_blocks = $new_res->formattedResults->ruleResults->OptimizeImages->urlBlocks;
        $OptimizeImages_header_data = array();
        foreach ($url_blocks as $head_url) {
            foreach ($head_url->header->args as $rr) {
                array_push($OptimizeImages_header_data, $rr->value);
            }
        }
        $OptimizeImages_url_data = array();
        foreach ($url_blocks as $image_url) {
            foreach ($image_url->urls as $inner_url) {
                array_push($OptimizeImages_url_data, $inner_url->result->args[0]->value);
            }
        }
    } else {
        $OptimizeImages = array(
            'rule_name' => $new_res->formattedResults->ruleResults->OptimizeImages->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->OptimizeImages->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->OptimizeImages->summary->format
        );
        $OptimizeImages_header_data = '';
        $OptimizeImages_url_data = '';
    }

//PrioritizeVisibleContent
    if ($new_res->formattedResults->ruleResults->PrioritizeVisibleContent->ruleImpact > 0) {
        $PrioritizeVisibleContent = array(
            'rule_name' => $new_res->formattedResults->ruleResults->PrioritizeVisibleContent->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->PrioritizeVisibleContent->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->OptimizeImages->summary->format
        );
    } else {
        $PrioritizeVisibleContent = array(
            'rule_name' => $new_res->formattedResults->ruleResults->PrioritizeVisibleContent->localizedRuleName,
            'rule_impact' => $new_res->formattedResults->ruleResults->PrioritizeVisibleContent->ruleImpact,
            'summary' => $new_res->formattedResults->ruleResults->OptimizeImages->summary->format
        );
    }



    return json_encode(array(
        $avoid_landing_page_redirects,
        $page_urls,
        $EnableGzipCompression,
        $LeverageBrowserCaching,
        $leverage_urls,
        $MainResourceServerResponseTime,
        $MainResourceServerResponseTime_arr,
        $MinifyCss,
        $arr_MinifyCss,
        $arr_MinifyCss_header,
        $MinifyHTML,
        $MinifyJavaScript,
        $MinifyJavaScript_header,
        $arr_MinifyJavaScript,
        $MinimizeRenderBlockingResources,
        $MinimizeRenderBlockingResources_header,
        $MinimizeRenderBlockingResources_js,
        $MinimizeRenderBlockingResources_css,
        $OptimizeImages,
        $OptimizeImages_header_data,
        $OptimizeImages_url_data,
        $PrioritizeVisibleContent,
        $page_urls,
            )
    );
}

function getPageSize($url){ 
   $return = strlen(getMyData('https://' . $url));
   return $return; 
}

function size_as_kb($yoursize) {
    $size_kb = round($yoursize/1024);
    return $size_kb;
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
            return ("Google API: Response empty");
        } else {
            return ("Google API: " . $json->error->errors[0]->reason);
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

function domainAuthority1($domain) {
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
    $umrp = explode(":", $array1[1]);
    $pa = explode(":", $array1[3]);
    $da = explode(":", $array1[4]);
    return array(round($umrp['1']), $da['1'], $pa['1']);
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
    $json = _curl("https://validator.w3.org/nu/?doc=https://$url&out=json&level=error");
    $w3c = json_decode($json);
    return @count($w3c->messages);
}

function getBuiltWith($url, $intento = 0) {
    $json = curlGET("https://orion.apiseeds.com/api/buildwith/$url?apikey=6qZrK4DAPJ6bcbe8fXJ7DSqvSEHgbRAXOOLB151ksTQRHarWn3E1a9m7CiA3jtRM");
    //$json = curlGET("https://api.builtwith.com/free1/api.json?KEY=d17afbce-f508-48c9-be47-ade49c432242&LOOKUP=$url");
    $response = json_decode($json);
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

function ping($url, $timeout = 60) {

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
        CURLOPT_TIMEOUT => 60,
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

    return implode("<br>", $cutHeaders);
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
    $acents = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "ñ", "À", "Ã", "Ì", "Ò", "Ù", "Ã™", "Ã ", "Ã¨", "Ã¬", "Ã²", "Ã¹", "ç", "Ç", "Ã¢", "ê", "Ã®", "Ã´", "Ã»", "Ã‚", "ÃŠ", "ÃŽ", "Ã”", "Ã›", "ü", "Ã¶", "Ã–", "Ã¯", "Ã¤", "«", "Ò", "Ã?", "Ã„", "Ã‹");
    $l = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "n", "N", "A", "E", "I", "O", "U", "a", "e", "i", "o", "u", "c", "C", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "u", "o", "O", "i", "a", "e", "U", "I", "A", "E");
    $string_ok = str_replace($acents, $l, $string);
    return $string_ok;
}

function _clean_special($string) {


    return preg_replace('/[^a-zA-Z0-9ñÑ\s]/', '', _remove_acents($string));
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
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ??';
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
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout in seconds
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

function remoteFileExists1($url) {

    $headers = get_headers($url);
    return stripos($headers[0], "200") ? true : false;
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

    $stopwords = array("these", "after", "that", "have", "this", "then", "come", "with", "from", "will", "your", "you");

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

function isDomainAvailable($domain)
       {
               //check, if a valid url is provided
               if(!filter_var($domain, FILTER_VALIDATE_URL))
               {
                       return false;
               }

               //initialize curl
               $curlInit = curl_init($domain);
               curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,30);
               curl_setopt($curlInit,CURLOPT_HEADER,true);
               curl_setopt($curlInit,CURLOPT_NOBODY,true);
               curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);

               //get answer
               $response = curl_exec($curlInit);

               curl_close($curlInit);

               if ($response) return true;

               return false;
       }

function host_info($site) {
    
    $ch = curl_init('http://www.iplocationfinder.com/' . clean_url($site));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERAGENT,
        'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
    $data = curl_exec($ch);
    preg_match('~ISP.*<~', $data, $isp);
    preg_match('~Organization.*<~', $data, $org);
    preg_match('~Country.*<~', $data, $country);
    preg_match('~IP:.*<~', $data, $ip);
    preg_match('~City:.*<~', $data, $city);
    preg_match('~Region:.*<~', $data, $region);
    preg_match('~Latitude:.*<~', $data, $lat);
    preg_match('~Longitude:.*<~', $data, $lon);
    preg_match('~Timezone:.*<~', $data, $tz);

    $city = explode(':', strip_tags($city[0]));
    $city = trim($city[1]);
    if ($city == '') $city = 'Not Available';
    
    $region = explode(':', strip_tags($region[0]));
    $region = trim($region[1]);
    if ($region == '') $region = 'Not Available';
    
    $lat = explode(':', strip_tags($lat[0]));
    $lat = trim($lat[1]);
    if ($lat == '') $lat = 'Not Available';
    
    $org = explode(':', strip_tags($org[0]));
    $org = trim($org[1]);
    if ($org == '') $org = 'Not Available';
    
    $lon = explode(':', strip_tags($lon[0]));
    $lon = trim($lon[1]);
    if ($lon == '') $lon = 'Not Available';
    
    $tz = explode(':', strip_tags($tz[0]));
    $tz = trim($tz[1]);
    if ($tz == '') $tz = 'Not Available';

    $country = explode(':', strip_tags($country[0]));
    $country = trim(str_replace('Hide your IP address and Location here', '', $country[1]));
    if ($country == '')
        $country = 'Not Available';

    $isp = explode(':', strip_tags($isp[0]));
    $isp = trim($isp[1]);
    if ($isp == '')
        $isp = 'Not Available';

    $ip = $ip[0];
    $ip = trim(str_replace(array(
        'IP:',
        '<',
        '/label>',
        '/th>td>',
        '/td>'), '', $ip));
    if ($ip == '')
        $ip = 'Not Available';
    return array($ip,$country,$isp,$city,$region,$lat,$lon,$tz,$org);
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

function get_title($str){
  
  /*if(strlen($str)>0)
  {
   // $str = trim(preg_replace('/\s+/', ' ', $str)); // supports line breaks inside <title>
    preg_match("/\<title\>(.*)\<\/title\>/i",$str,$title); // ignore case
    
    return strip_tags($title[1]);
    }*/
    $str = mb_strtoupper($str);
    if(!$str)
        return "";
    $doc = new DOMDocument();
   // @$doc->loadHTML($str);
     @$doc->loadHTML(mb_convert_encoding($str, 'HTML-ENTITIES', 'UTF-8'));

    $nodes = $doc->getElementsByTagName('title');
    
    return $nodes->item(0)->nodeValue;

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
        $response['icon'] = "×";
        $response['fixed'] = mb_substr($str, 0, $limit) . "<s style='color:#EF3A06'>" . mb_substr($str, $limit, mb_strlen($str)) . "</s>";
    }

    if ($min) {

        if (mb_strlen($str) < $min) {
            $response['color'] = "#EF3A06";
            $response['icon'] = "×";
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
    return "×";
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
    $response['fixed'] = $str;
    $response['lenght'] = mb_strlen($str);
    $response['fixed2'] = mb_substr($str, 0, $limit);

    if (mb_strlen($str) > $limit) {
        $response['color'] = "text-warning";
        $response['fixed'] = mb_substr($str, 0, $limit) . "<span class='text-danger text-underline'>" . mb_substr($str, $limit, mb_strlen($str)) . "</span>";
    }

    if ($min) {

        if (mb_strlen($str) < $min) {
            $response['color'] = "text-warning";
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
            . ' hardcore, hardcoresex, he11, hebe, heeb, hell, hemp, hentai, heroin, herp, herpes, herpy, heshe, he-she, hircismus, hitler, hiv, hoar,'
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
    $badWords = explode(", ", $bad_words);
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

                function GetPage($url) {
                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_USERAGENT, AGENT);

                    $data = curl_exec($ch);

                    curl_close($ch);

                    return $data;
                }

                function GetQuotedUrl($str) {
                    $quote = substr($str, 0, 1);
                    if (($quote != "\"") && ($quote != "'")) { // Only process a string                                         // starting with singe or
                        return $str;                         // double quotes
                    }

                    $ret = "";
                    $len = strlen($str);
                    for ($i = 1; $i < $len; $i++) { // Start with 1 to skip first quote
                        $ch = substr($str, $i, 1);

                        if ($ch == $quote)
                            break; // End quote reached

                        $ret .= $ch;
                    }

                    return $ret;
                }

                function GetHREFValue($anchor) {
                    $split1 = explode("href=", $anchor);
                    $split2 = explode(">", $split1[1]);
                    $href_string = $split2[0];

                    $first_ch = substr($href_string, 0, 1);
                    if ($first_ch == "\"" || $first_ch == "'") {
                        $url = GetQuotedUrl($href_string);
                    } else {
                        $spaces_split = explode(" ", $href_string);
                        $url = $spaces_split[0];
                    }
                    return $url;
                }

                function GetEffectiveURL($url) {
                    // Create a curl handle
                    $ch = curl_init($url);

                    // Send HTTP request and follow redirections
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_USERAGENT, AGENT);
                    curl_exec($ch);

                    // Get the last effective URL
                    $effective_url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
                    // ie. "http://example.com/show_location.php?loc=M%C3%BCnchen"
                    // Decode the URL, uncoment it an use the variable if needed
                    // $effective_url_decoded = curl_unescape($ch, $effective_url);
                    // "http://example.com/show_location.php?loc=M端nchen"
                    // Close the handle
                    curl_close($ch);

                    return $effective_url;
                }

                function ValidateURL($url_base, $url) {
                    global $scanned;

                    $parsed_url = parse_url($url);

                    $scheme = $parsed_url["scheme"];

                    // Skip URL if different scheme or not relative URL (skips also mailto)
                    if (($scheme != SITE_SCHEME) && ($scheme != ""))
                        return false;

                    $host = $parsed_url["host"];

                    // Skip URL if different host
                    if (($host != SITE_HOST) && ($host != ""))
                        return false;

                    // Check for page anchor in url
                    if ($page_anchor_pos = strpos($url, "#")) {
                        // Cut off page anchor
                        $url = substr($url, 0, $page_anchor_pos);
                    }

                    if ($host == "") {    // Handle URLs without host value
                        if (substr($url, 0, 1) == '/') { // Handle absolute URL
                            $url = SITE_SCHEME . "://" . SITE_HOST . $url;
                        } else { // Handle relative URL
                            $path = parse_url($url_base, PHP_URL_PATH);

                            if (substr($path, -1) == '/') { // URL is a directory
                                // Construct full URL
                                $url = SITE_SCHEME . "://" . SITE_HOST . $path . $url;
                            } else { // URL is a file
                                $dirname = dirname($path);

                                // Add slashes if needed
                                if ($dirname[0] != '/') {
                                    $dirname = "/$dirname";
                                }

                                if (substr($dirname, -1) != '/') {
                                    $dirname = "$dirname/";
                                }

                                // Construct full URL
                                $url = SITE_SCHEME . "://" . SITE_HOST . $dirname . $url;
                            }
                        }
                    }

                    // Get effective URL, follow redirected URL
                    $url = GetEffectiveURL($url);

                    // Don't scan when already scanned    
                    if (in_array($url, $scanned))
                        return false;

                    return $url;
                }

// Skip URLs from the $skip_url array
                function SkipURL($url) {
                    global $skip_url;

                    if (isset($skip_url)) {
                        foreach ($skip_url as $v) {
                            if (substr($url, 0, strlen($v)) == $v)
                                return true; // Skip this URL
                        }
                    }

                    return false;
                }
                    $count = 0;
                function Scan($url) {
                    global $scanned, $pf;
                    

                    $scanned[] = $url;  // Add URL to scanned array

                    if (SkipURL($url)) {
                        echo "Skip URL $url" . NL;
                        return false;
                    }

                    // Remove unneeded slashes
                    if (substr($url, -2) == "//") {
                        $url = substr($url, 0, -2);
                    }
                    if (substr($url, -1) == "/") {
                        $url = substr($url, 0, -1);
                    }


                    echo "Scanning $url" . NL;
                    
                    stream_context_set_default( [
                    'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                        ],
                    ]);

                    @$headers = get_headers($url, 1);

                    // Handle pages not found
                    if (strpos($headers[0], "404") !== false) {
                        echo "Not found: $url" . NL;
                        return false;
                    }

                    // Handle redirected pages
                    if (strpos($headers[0], "301") !== false) {
                        $url = $headers["Location"];     // Continue with new URL
                        echo "Redirected to: $url" . NL;
                    }
                    // Handle other codes than 200
                    else if (strpos($headers[0], "200") == false) {
                        $url = $headers["Location"];
                        //echo "Skip HTTP code $headers[0]: $url" . NL;
                        return false;
                    }

                    // Get content type
                    if (is_array($headers["Content-Type"])) {
                        $content = explode(";", $headers["Content-Type"][0]);
                    } else {
                        $content = explode(";", $headers["Content-Type"]);
                    }

                    $content_type = trim(strtolower($content[0]));

                    // Check content type for website
                    if ($content_type != "text/html") {
                        if ($content_type == "" && IGNORE_EMPTY_CONTENT_TYPE) {
                            echo "Info: Ignoring empty Content-Type." . NL;
                        } else {
                            if ($content_type == "") {
                                echo "Info: Content-Type is not sent by the web server. Change " .
                                "'IGNORE_EMPTY_CONTENT_TYPE' to 'true' in the sitemap script " .
                                "to scan those pages too." . NL;
                            } else {
                                echo "Info: $url is not a website: $content[0]" . NL;
                            }
                            return false;
                        }
                    }

                    $html = GetPage($url);
                    $html = trim($html);
                    if ($html == "")
                        return true;  // Return on empty page

                    $html = preg_replace("/(\<\!\-\-.*\-\-\>)/sU", "", $html); // Remove commented text
                    $html = str_replace("\r", " ", $html);        // Remove newlines
                    $html = str_replace("\n", " ", $html);        // Remove newlines
                    $html = str_replace("\t", " ", $html);        // Remove tabs
                    $html = str_replace("<A ", "<a ", $html);     // <A to lowercase

                    $first_anchor = strpos($html, "<a ");    // Find first anchor

                    if ($first_anchor === false)
                        return true; // Return when no anchor found

                    $html = substr($html, $first_anchor);    // Start processing from first anchor

                    $a1 = explode("<a ", $html);
                    foreach ($a1 as $next_url) {
                        $count++;
                        $next_url = trim($next_url);

                        // Skip empty array entry
                        if ($next_url == "")
                            continue;

                        // Get the attribute value from href
                        $next_url = GetHREFValue($next_url);

                        // Do all skip checks and construct full URL
                        $next_url = ValidateURL($url, $next_url);

                        // Skip if url is not valid
                        if ($next_url == false)
                            continue;

                        if (Scan($next_url)) {
                            // Add URL to sitemap
                            fwrite($pf, "  <url>\n" .
                                    "    <loc>" . htmlentities($next_url) . "</loc>\n" .
                                    "    <changefreq>" . FREQUENCY . "</changefreq>\n" .
                                    "    <priority>" . PRIORITY . "</priority>\n" .
                                    "  </url>\n");
                        }
                    }
                    $_SESSION['count'] = $count;
                    return true;
                }

                // Program start
                

                // Print configuration
                /*    echo "Plop PHP XML Sitemap Generator Configuration:" . NL;
                  echo "VERSION: " . VERSION . NL;
                  echo "OUTPUT_FILE: " . OUTPUT_FILE . NL;
                  echo "SITE: " . SITE . NL;
                  echo "CLI: " . (CLI ? "true" : "false"). NL;
                  echo "IGNORE_EMPTY_CONTENT_TYPE: " . (IGNORE_EMPTY_CONTENT_TYPE ? "true" : "false") . NL;
                  echo "DATE: " . date ("Y-m-d H:i:s") . NL;
                  echo NL;
                 */
                // SITE configuration check    
                //if (!SITE)
                //{
                //die ("ERROR: You did not set the SITE variable at line number " . 
                //"68 with the URL of your website!\n");
                //}

                

                error_reporting(E_ERROR | E_WARNING | E_PARSE);

                $pf = fopen(OUTPUT_FILE, "w");
                if (!$pf) {
                    echo "ERROR: Cannot create " . OUTPUT_FILE . "!" . NL;
                    return;
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
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0');
    $headers = curl_exec($ch);
    curl_close($ch);
    return $headers;
}

function getHttpCode($site, $followRedirect = true) {
    $ch = curl_init($site);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, $followRedirect);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0');
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $httpCode;
}

function getPageData($myUrl,$error) {
    $timeStart = microtime(true);
    $data = file_get_html($myUrl);
    if(empty($data)) {
        echo $error;
        die();
    }
    $timeEnd = microtime(true);
    $timeTaken = $timeEnd - $timeStart;
    return array($data, $timeTaken);
}

function calTextRatio($pageData) {
    $orglen = strlen($pageData);
    $pageData = preg_replace('/(<script.*?>.*?<\/script>|<style.*?>.*?<\/style>|<.*?>|\r|\n|\t)/ms', '', $pageData);  
    $pageData = preg_replace('/ +/ms', ' ', $pageData);  
    $textlen = strlen($pageData);
    $per = (($textlen * 100) / $orglen);
    return array($orglen,$textlen,$per);
}

function calPageSpeed($myUrl,$refUrl) {
		
    $timeStart = microtime(true);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $myUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:36.0) Gecko/20100101 Firefox/36.0');
    curl_setopt($ch, CURLOPT_REFERER, $refUrl);
    $html = curl_exec($ch);
    curl_close($ch);
    $timeEnd = microtime(true);
    $timeTaken = $timeEnd - $timeStart;
		
    return $timeTaken;
}

function checkPageSpeed($url,$error="Something Went Wrong")
{
    //Error Message
    define('ERR_MSG',$error);
    
    //Set Execution Time
    ini_set('max_execution_time', 20*60);
        
    //Library
	
    //Parse Host
    $inputUrl = parse_url($url);
	$inputHost = $inputUrl['scheme'] . "://" . $inputUrl['host'];
	
    //Define Links Array
    $linkData = array();
    $cssData = array();
    $scriptData = array();
    $imgData = array();
    $otherData = array();
	$downloadedData = array();
    
    //Main URL Time Taken
	$myPageData = getPageData($url,$error);
	$time = $myPageData[1];
	$outData = $myPageData[0];
    
    //Link Tag
	foreach($outData->find('link') as $myLink) {
		$href = $myLink->href;

		if(!empty($href)) {
			if(substr($href, 0, 7) == "http://") { 
			 //Link Okay
            }
 			elseif(substr($href, 0, 8) == "https://") { 
			 //Link Okay
            }
		    elseif(substr($href, 0, 2) == "//") {
				$href = "http:" . $href;
            }
		    elseif(substr($href, 0, 1) == "/") {
				$href = $inputHost . $href;
		    }
            else{
                $href = $inputHost .'/'. $href;
            }

				if(!in_array($href, $downloadedData)) {
					$timeTaken = calPageSpeed($href,$url);
					$time = $time + $timeTaken;
                    
                    if(str_contains($href,'.css')) {
                    $arrData =   array('CSS', $href, round($timeTaken, 2));
 				    $linkData[] = $arrData;
                    $cssData[] = $arrData;
                    }else{
                    $arrData =  array('Resources', $href, round($timeTaken, 2));
 				    $linkData[] = $arrData;
                    $otherData[] = $arrData;
                    }
                    
                    //Add to Downloaded Links
					$downloadedData[] = $href;
				}
		}
	}
    
    //Image Tag
   	foreach($outData->find('img') as $myLink) {
		$href = $myLink->src;

		if(!empty($href)) {
		  
			if(substr($href, 0, 7) == "http://") { 
			 //Link Okay
            }
 			elseif(substr($href, 0, 8) == "https://") { 
			 //Link Okay
            }
		    elseif(substr($href, 0, 2) == "//") {
				$href = "http:" . $href;
            }
		    elseif(substr($href, 0, 1) == "/") {
				$href = $inputHost . $href;
		    }
            else{
                $href = $inputHost .'/'. $href;
            }


				if(!in_array($href, $downloadedData)) {
					$timeTaken = calPageSpeed($href,$url);
					$time = $time + $timeTaken;
                    $arrData = array('Image', $href, round($timeTaken, 2)); 
                    $linkData[] = $arrData;
                    $imgData[] =  $arrData;
    
                    //Add to Downloaded Links
					$downloadedData[] = $href;
				}

		}
	}
    
    //Script Tag
	foreach($outData->find('script') as $myLink) {
		$href = $myLink->src;

		  if(!empty($href)) {
		      
			if(substr($href, 0, 7) == "http://") { 
			 //Link Okay
            }
 			elseif(substr($href, 0, 8) == "https://") { 
			 //Link Okay
            }
		    elseif(substr($href, 0, 2) == "//") {
				$href = "https:" . $href;
            }
		    elseif(substr($href, 0, 1) == "/") {
				$href = $inputHost . $href;
		    }
            else{
                $href = $inputHost .'/'. $href;
            }


				if(!in_array($href, $downloadedData)) {
					$timeTaken = calPageSpeed($href,$url);
					$time = $time + $timeTaken;
                    $arrData = array('Script', $href, round($timeTaken, 2)); 
                    $linkData[] = $arrData; 
                    $scriptData[] = $arrData;
                    
                    //Add to Downloaded Links
					$downloadedData[] = $href;
				}

		}
	}

  //Average time taken
  $avgTimeTaken = round($time, 2); 
     
 return array($avgTimeTaken,$linkData,$cssData,$imgData,$scriptData,$otherData);
 
}

function checkRedirect($my_url, $goodStr = "Good", $badStr = "Bad - Not Redirecting!") {
    $my_url = clean_url($my_url);
    $re301 = false;
    $url_with_www = "https://www.$my_url";
    $url_no_www = "https://$my_url";

    $data1 = getHttpCode($url_with_www, false);
    $data2 = getHttpCode($url_no_www, false);

    if ($data1 == '301')
        $re301 = true;
    if ($data2 == '301')
        $re301 = true;

    $str = ($re301 == true ? $goodStr : $badStr);
    return $str;
}

function similar_web_raw_data($domain, $proxy = "") {

    $alexa_url = "https://www.similarweb.com/website/{$domain}";
    $ch = curl_init(); // initialize curl handle
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_AUTOREFERER, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7);
    curl_setopt($ch, CURLOPT_REFERER, $alexa_url);
    curl_setopt($ch, CURLOPT_URL, $alexa_url); // set url to post to
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // allow redirects
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return into a variable
    curl_setopt($ch, CURLOPT_TIMEOUT, 50); // times out after 50s
    curl_setopt($ch, CURLOPT_POST, 0); // set POST method
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
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

    return $response;
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
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    //curl_setopt($ch, CURLOPT_REFERER, $ref_url);
    $html = curl_exec($ch);
    curl_close($ch);
    return $html;
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
        @$int_data,
        $i_links,
        $i_nofollow,
        @$ext_data,
        $e_links,
        $e_nofollow,
        $t_count);
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

function itIsOnline($site)
{
    $curlInit = curl_init($site);
    curl_setopt($curlInit, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($curlInit, CURLOPT_TIMEOUT, 20);
    curl_setopt($curlInit, CURLOPT_HEADER, true);
    curl_setopt($curlInit, CURLOPT_NOBODY, true);
    curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curlInit, CURLOPT_FOLLOWLOCATION, true);

    $response = curl_exec($curlInit);
    $info = curl_getinfo($curlInit);
    $response_time = substr($info['total_time'], 0, 4);
    $http_code = $info['http_code'];
    curl_close($curlInit);
    if ($response)
        return array(true,$response_time,$http_code);
    return array(false,"No Response","unknown");
}

function alexa_raw_data($domain, $proxy = "") {

    $response = array();
    $response["global_rank"] = "";
    $response["traffic_rank_graph"] = "";
    $response["country_rank"] = "";
    $response["country"] = "";
    $response["country_name"] = array();
    $response["country_percent_visitor"] = array();
    $response["country_in_rank"] = array();
    $response["bounce_rate"] = "";
    $response["page_view_per_visitor"] = "";
    $response["daily_time_on_the_site"] = "";
    $response["visitor_percent_from_searchengine"] = "";
    $response["search_engine_percentage_graph"] = "";
    $response["keyword_name"] = array();
    $response["keyword_percent_of_search_traffic"] = array();
    $response["upstream_site_name"] = array();
    $response["upstream_percent_unique_visits"] = array();
    $response["total_site_linking_in"] = "";
    $response["linking_in_site_name"] = array();
    $response["linking_in_site_address"] = array();
    $response["subdomain_name"] = array();
    $response["subdomain_percent_visitors"] = array();
    $response["status"] = "";


    $alexa_url = "http://www.alexa.com/siteinfo/{$domain}";
    $ch = curl_init(); // initialize curl handle
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/44.0 (compatible;)");
    curl_setopt($ch, CURLOPT_AUTOREFERER, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_REFERER, $alexa_url);
    curl_setopt($ch, CURLOPT_URL, $alexa_url); // set url to post to
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // allow redirects
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return into a variable
    curl_setopt($ch, CURLOPT_TIMEOUT, 60); // times out after 50s
    curl_setopt($ch, CURLOPT_POST, 0); // set POST method

    /*     * *** Proxy set for google . if lot of request gone, google will stop reponding. That's why it's should use some proxy **** */
    /*     * ** Using proxy of public and private proxy both *** */


    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $content = curl_exec($ch); // run the whole process

    $connect_info = curl_getinfo($ch);
    $http_code = $connect_info['http_code'];
    curl_close($ch);


    preg_match('#<span.*?data-cat="globalRank".*?>.*?<img.*?title=\'Global.*?\' alt=\'Global.*?\'><strong class="metrics-data align-vmiddle">(.*?)</strong>#si', $content, $matches);

    $global_rank = isset($matches[1]) ? $matches[1] : 'No Data';
    $global_rank = preg_replace('#<!--.*?-->#', "", $global_rank);
    $global_rank = trim($global_rank);



    /** 	Get Country Rank** */
    preg_match('#<span.*?data-cat="countryRank".*?>.*?<strong class="metrics-data align-vmiddle">(.*?)</strong>#si', $content, $matches);

    $country_rank = isset($matches[1]) ? $matches[1] : 'No Data';
    $country_rank = trim($country_rank);

    /*     * *Get Country * */

    preg_match('#<span.*?data-cat="countryRank".*?>.*?<img.*?title=\'(.*?)Flag\'.*?><strong class="metrics-data align-vmiddle">.*?</strong>#si', $content, $matches);

    $country = isset($matches[1]) ? $matches[1] : 'No Data';


    $traffic_rank_graph = "http://traffic.alexa.com/graph?o=lt&y=t&b=ffffff&n=666666&f=999999&p=4e8cff&r=1y&t=2&z=30&c=1&h=150&w=340&u={$domain}";



    /*     * **********************  Audience Geography  ************************************** */

    /*     * *** Get all top country wise rank and visitor percentage **** */

    $html = new simple_html_dom();
    $html->load($content);

    $country_info_table = $html->find('table#demographics_div_country_table tr');

    $i = 0;
    foreach ($country_info_table as $tr) {

        if (isset($tr->find('td', 0)->plaintext)) {
            $country_name[$i] = $tr->find('td', 0)->plaintext;
            $country_name[$i] = str_replace("&nbsp;", "", $country_name[$i]);
            $country_name[$i] = str_replace("&nbsp", "", $country_name[$i]);
        }
        if (isset($tr->find('td', 1)->plaintext)) {
            $country_percent_visitor[$i] = $tr->find('td', 1)->plaintext;
            $country_percent_visitor[$i] = str_replace("&nbsp;", "", $country_percent_visitor[$i]);
            $country_percent_visitor[$i] = str_replace("&nbsp", "", $country_percent_visitor[$i]);
        }
        if (isset($tr->find('td', 2)->plaintext)) {
            $country_in_rank[$i] = $tr->find('td', 2)->plaintext;
            $country_in_rank[$i] = str_replace("&nbsp;", "", $country_in_rank[$i]);
            $country_in_rank[$i] = str_replace("&nbsp", "", $country_in_rank[$i]);
        }
        $i++;
    }


    /*     * ******** 	 How engaged are visitors to xeroneit.net? 	 *************** */

    /*     * ***	Get Bounce Rate	***** */

    preg_match('#<span.*?data-cat="bounce_percent".*?>.*?<strong class="metrics-data align-vmiddle">(.*?)</strong>#si', $content, $matches);

    $bounce_rate = isset($matches[1]) ? $matches[1] : 'No Data';
    $bounce_rate = trim($bounce_rate);



    /*     * **  Get page views per visitor	** */

    preg_match('#<span.*?data-cat="pageviews_per_visitor".*?>.*?<strong class="metrics-data align-vmiddle">(.*?)</strong>#si', $content, $matches);

    $page_view_per_visitor = isset($matches[1]) ? $matches[1] : 'No Data';
    $page_view_per_visitor = trim($page_view_per_visitor);

    /*     * *Get Daily Time on the site*** */

    preg_match('#<span.*?data-cat="time_on_site".*?>.*?<strong class="metrics-data align-vmiddle">(.*?)</strong>#si', $content, $matches);

    $daily_time_on_the_site = isset($matches[1]) ? $matches[1] : 'No Data';
    $daily_time_on_the_site = trim($daily_time_on_the_site);



    /*     * ********************** Where do codecanyon.net's visitors come from? ************************************ */

    /*     * *Search Engine  Traffic*** */

    preg_match('#<span.*?data-cat="search_percent".*?>.*?<strong class="metrics-data align-vmiddle">(.*?)</strong>#si', $content, $matches);

    $visitor_percent_from_searchengine = isset($matches[1]) ? $matches[1] : 'No Data';
    $visitor_percent_from_searchengine = trim($visitor_percent_from_searchengine);

    $search_engine_percentage_graph = "http://traffic.alexa.com/graph?o=lt&y=q&b=ffffff&n=666666&f=999999&p=4e8cff&r=1y&t=2&z=0&c=1&h=150&w=340&u={$domain}";


    /*     * *****	Top Keyword from Search Engine   ********** */

    $top_keyword_table = $html->find('table#keywords_top_keywords_table tr');
    $i = 0;
    foreach ($top_keyword_table as $tr) {
        if (isset($tr->find('td', 0)->plaintext)) {
            $keyword_name[$i] = $tr->find('td', 0)->plaintext;
            $keyword_name[$i] = str_replace("&nbsp;", "", $keyword_name[$i]);
            $keyword_name[$i] = str_replace("&nbsp", "", $keyword_name[$i]);
        }
        if (isset($tr->find('td', 1)->plaintext)) {
            $keyword_percent_of_search_traffic[$i] = $tr->find('td', 1)->plaintext;
            $keyword_percent_of_search_traffic[$i] = str_replace("&nbsp;", "", $keyword_percent_of_search_traffic[$i]);
            $keyword_percent_of_search_traffic[$i] = str_replace("&nbsp", "", $keyword_percent_of_search_traffic[$i]);
        }
        $i++;
    }




    /*     * *********
      Upstream Sites

      Which sites did people visit immediately before this site?

     * ************** */



    /*     * *****Get upstream site ********** */
    $upstream_site_table = $html->find('table#keywords_upstream_site_table tr');
    $i = 0;
    foreach ($upstream_site_table as $tr) {
        if (isset($tr->find('td', 0)->plaintext)) {
            $upstream_site_name[$i] = $tr->find('td', 0)->plaintext;
            $upstream_site_name[$i] = str_replace("&nbsp;", "", $upstream_site_name[$i]);
            $upstream_site_name[$i] = str_replace("&nbsp", "", $upstream_site_name[$i]);
        }
        if (isset($tr->find('td', 1)->plaintext)) {
            $upstream_percent_unique_visits[$i] = $tr->find('td', 1)->plaintext;
            $upstream_percent_unique_visits[$i] = str_replace("&nbsp;", "", $upstream_percent_unique_visits[$i]);
            $upstream_percent_unique_visits[$i] = str_replace("&nbsp", "", $upstream_percent_unique_visits[$i]);
        }
        $i++;
    }



    /*     * **************	What sites link to codecanyon.net?  ******************* */

    /*     * ****Get Total Sites Linking In ********** */


    preg_match('#<section id="linksin-panel-content".*?<span class="font-4 box1-r">(.*?)</span>#is', $content, $matches);

    $total_site_linking_in = isset($matches[1]) ? $matches[1] : 'No Data';
    $total_site_linking_in = trim($total_site_linking_in);

    /*     * **Get site address and page where the domain linking in ***** */


    $site_linking_in_table = $html->find('table#linksin_table tr');
    $i = 0;
    foreach ($site_linking_in_table as $tr) {

        if (isset($tr->find('td', 1)->plaintext)) {

            $linking_in_site_name[$i] = $tr->find('td', 1)->plaintext;
            $linking_in_site_name[$i] = str_replace("&nbsp;", "", $linking_in_site_name[$i]);
            $linking_in_site_name[$i] = str_replace("&nbsp", "", $linking_in_site_name[$i]);
        }


        $td = $tr->find('td');

        /*         * ***Get link of the 3rd td, at the last it take the last anchor's href***** */

        foreach ($td as $t) {
            if (isset($t->find('a', 0)->href)) {

                $linking_in_site_address[$i] = $t->find('a', 0)->href;
                $linking_in_site_address[$i] = str_replace("&nbsp;", "", $linking_in_site_address[$i]);
                $linking_in_site_address[$i] = str_replace("&nbsp", "", $linking_in_site_address[$i]);
            }
        }

        $i++;
    }



    /*     * ****************	Where do visitors go on codecanyon.net?  ************************ */

    /*     * *Get subdomain and percentage of visitor of the site the** */


    $subdomain_link_table = $html->find('table#subdomain_table tr');
    $i = 0;
    foreach ($subdomain_link_table as $tr) {
        if (isset($tr->find('td', 0)->plaintext)) {
            $subdomain_name[$i] = $tr->find('td', 0)->plaintext;
            $subdomain_name[$i] = str_replace("&nbsp;", "", $subdomain_name[$i]);
            $subdomain_name[$i] = str_replace("&nbsp", "", $subdomain_name[$i]);
        }
        if (isset($tr->find('td', 1)->plaintext)) {
            $subdomain_percent_visitors[$i] = $tr->find('td', 1)->plaintext;
            $subdomain_percent_visitors[$i] = str_replace("&nbsp;", "", $subdomain_percent_visitors[$i]);
            $subdomain_percent_visitors[$i] = str_replace("&nbsp", "", $subdomain_percent_visitors[$i]);
        }
        $i++;
    }



    if ($http_code == '200') {
        $response['status'] = "success";
    } else {
        $response['status'] = "error";
    }


    if (isset($global_rank))
        $response["global_rank"] = strip_tags($global_rank);
    if (isset($country_rank))
        $response["country_rank"] = strip_tags($country_rank);
    if (isset($country))
        $response["country"] = strip_tags($country);
    if (isset($traffic_rank_graph))
        $response["traffic_rank_graph"] = $traffic_rank_graph;
    if (isset($country_name))
        $response["country_name"] = $country_name;
    if (isset($country_percent_visitor))
        $response["country_percent_visitor"] = $country_percent_visitor;
    if (isset($country_in_rank))
        $response["country_in_rank"] = $country_in_rank;
    if (isset($bounce_rate))
        $response["bounce_rate"] = $bounce_rate;
    if (isset($page_view_per_visitor))
        $response["page_view_per_visitor"] = $page_view_per_visitor;
    if (isset($daily_time_on_the_site))
        $response["daily_time_on_the_site"] = $daily_time_on_the_site;
    if (isset($visitor_percent_from_searchengine))
        $response["visitor_percent_from_searchengine"] = $visitor_percent_from_searchengine;
    if (isset($search_engine_percentage_graph))
        $response["search_engine_percentage_graph"] = $search_engine_percentage_graph;
    if (isset($keyword_name))
        $response["keyword_name"] = $keyword_name;
    if (isset($keyword_percent_of_search_traffic))
        $response["keyword_percent_of_search_traffic"] = $keyword_percent_of_search_traffic;
    if (isset($upstream_site_name))
        $response["upstream_site_name"] = $upstream_site_name;
    if (isset($upstream_percent_unique_visits))
        $response["upstream_percent_unique_visits"] = $upstream_percent_unique_visits;
    if (isset($total_site_linking_in))
        $response["total_site_linking_in"] = $total_site_linking_in;
    if (isset($linking_in_site_name))
        $response["linking_in_site_name"] = $linking_in_site_name;
    if (isset($linking_in_site_address))
        $response["linking_in_site_address"] = $linking_in_site_address;
    if (isset($subdomain_name))
        $response["subdomain_name"] = $subdomain_name;
    if (isset($subdomain_percent_visitors))
        $response["subdomain_percent_visitors"] = $subdomain_percent_visitors;

    return $response;
}

function get_alexa_rank($domain) {

    try {
        $doc = new DOMDocument;
        $url = "http://data.alexa.com/data?cli=10&url={$domain}";
        $doc->load($url);
        $thedocument = $doc->documentElement;
        $rankingInfo = $thedocument->getElementsByTagName('SD');

        $country = "";
        $country_rank = "";

        foreach ($rankingInfo as $info) {
            /*             * **Get Reach Rank**** */
            $ranks = $info->getElementsByTagName('REACH');

            foreach ($ranks as $rank) {
                $reach_rank = $rank->getAttribute('RANK');
            }

            /*             * **Get country Rank** */
            $countr_rank_info = $info->getElementsByTagName('COUNTRY');

            foreach ($countr_rank_info as $c_info) {
                $country = $c_info->getAttribute('NAME');
                $country_rank = $c_info->getAttribute('RANK');
            }

            /*             * *** Get Traffic Rank **** */
            $ranks = $info->getElementsByTagName('POPULARITY');

            foreach ($ranks as $rank) {
                $traffic_rank = $rank->getAttribute('TEXT');
            }
        }

        $response['reach_rank'] = isset($reach_rank) ? $reach_rank : "no data";
        $response['country'] = isset($country) ? $country : "no data";
        $response['country_rank'] = isset($country_rank) ? $country_rank : "no data";
        $response['traffic_rank'] = isset($traffic_rank) ? $traffic_rank : "no data";

        return $response;
    } catch (Exception $e) {
        $url = "http://getbddoctor.com/secure/alexa/index.php?domain={$domain}";
        $ch = curl_init(); // initialize curl handle
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
        curl_setopt($ch, CURLOPT_AUTOREFERER, false);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_REFERER, 'http://' . $url);
        curl_setopt($ch, CURLOPT_URL, $url); // set url to post to
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // allow redirects
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return into a variable
        curl_setopt($ch, CURLOPT_TIMEOUT, 60); // times out after 50s
        curl_setopt($ch, CURLOPT_POST, 0); // set POST method
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $content = curl_exec($ch); // run the whole process
        $curl_info = curl_getinfo($ch);
        curl_close($ch);
        return json_decode($content, true);
    }
}

function yql($url) {
    if (substr($url, 0, 7) !== 'http://' && substr($url, 0, 8) !== 'https://')
        $url = 'https://' . $url;
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
            @$alexa_rank = $output['ALEXA']['SD']['POPULARITY']['TEXT'];
        else
            $alexa_rank = 'No Global Rank';

        if (isset($output['ALEXA']['SD']['COUNTRY']['NAME']))
            @$alexa_pop = $output['ALEXA']['SD']['COUNTRY']['NAME'];
        else
            $alexa_pop = 'None';

        if (isset($output['ALEXA']['SD']['COUNTRY']['RANK']))
            @$regional_rank = $output['ALEXA']['SD']['COUNTRY']['RANK'];
        else
            $regional_rank = 'None';
    }else {
        $xml = simplexml_load_string($apiData);

        $a = $xml->SD[1]->POPULARITY;
        if ($a != null) {
            @$alexa_rank = $xml->SD[1]->POPULARITY->attributes()->TEXT;
            $alexa_rank = ($alexa_rank == null ? 'No Global Rank' : $alexa_rank);
        } else {
            $alexa_rank = 'No Global Rank';
        }

        $a1 = $xml->SD[1]->COUNTRY;
        if ($a1 != null) {
            @$alexa_pop = $xml->SD[1]->COUNTRY->attributes()->NAME;
            @$regional_rank = $xml->SD[1]->COUNTRY->attributes()->RANK;
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

function getMyMeta($url, $noTitle='No Title', $noDes='No Description', $noKey='No Keywords'){
    
    $title = $description = $keywords = $html = $author = $siteName = '';
    $viewport = '-';
    $lenTitle = $lenDes = 0;
    $openG = false;
    
    //Get Data of the URL
    $html = curlGET($url);
    
    if($html == '')
        return false;
    
    //Fix Meta Uppercase Problem
    $html = str_ireplace(array("Title","TITLE"),"title",$html);
    $html = str_ireplace(array("Description","DESCRIPTION"),"description",$html);
    $html = str_ireplace(array("Keywords","KEYWORDS"),"keywords",$html);
    $html = str_ireplace(array("Content","CONTENT"),"content",$html);  
    $html = str_ireplace(array("Meta","META"),"meta",$html);  
    $html = str_ireplace(array("Name","NAME"),"name",$html);      
    
    //Load the document and parse the meta     
    $doc = new DOMDocument();
    @$doc->loadHTML($html);
    $nodes = $doc->getElementsByTagName('title');
    $title = $nodes->item(0)->nodeValue;
    $metas = $doc->getElementsByTagName('meta');

    for ($i = 0; $i < $metas->length; $i++){
        $meta = $metas->item($i);
        if($meta->getAttribute('name') == 'description')
           $description = $meta->getAttribute('content');
        if($meta->getAttribute('name') == 'charset')
           $charset = $meta->getAttribute('content');
        if($meta->getAttribute('name') == 'keywords')
            $keywords = $meta->getAttribute('content');
        if($meta->getAttribute('name') == 'viewport')
            $viewport = $meta->getAttribute('content');
        if($meta->getAttribute('name') == 'author')
            $author = $meta->getAttribute('content');   
        if($meta->getAttribute('property') == 'site_name')
            $siteName = $meta->getAttribute('content');   
        if($meta->getAttribute('property') == 'og:title')
            $openG = true;
        if($meta->getAttribute('property') == 'html')
            $body = $meta->getAttribute('content');
    }
    
    $lenTitle = mb_strlen($title);
    $lenDes = strlen($description);
    
    //Check Empty Data
    $title = ($title == '' ? $noTitle : $title);
    $description = ($description == '' ? $noDes : $description);
    $keywords = ($keywords == '' ? $noKey : $keywords);
    
    //Return as Array
    return array($title,$description,$keywords, $openG, $charset);
}

function spiderView($url,$err_str="Input Site is not valid!") {

    //Get Data of the URL
    $html = getMydata('https://' . $url);
    
    if($html == ""){
    die($err_str);   
    }
    
    //Source Data
    $sourceData = $html;
    
    //Only Text Content
    $textData = preg_replace('/(<script.*?>.*?<\/script>|<style.*?>.*?<\/style>|<.*?>|\r|\n|\t)/ms', '', $html);  
    $textData = preg_replace('/ +/ms', ' ', $textData);  
    
    //Fix Meta Uppercase Problem
    $html = str_ireplace(array("Title","TITLE"),"title",$html);
    $html = str_ireplace(array("Description","DESCRIPTION"),"description",$html);
    $html = str_ireplace(array("Keywords","KEYWORDS"),"keywords",$html);
    $html = str_ireplace(array("Content","CONTENT"),"content",$html);  
    $html = str_ireplace(array("Meta","META"),"meta",$html);  
    $html = str_ireplace(array("Name","NAME"),"name",$html);  
    
    $doc = new DOMDocument();
    libxml_use_internal_errors(true);
    $doc->loadHTML($html);
    
    $nodes = $doc->getElementsByTagName('title');
    $title = $nodes->item(0)->nodeValue;
    $metas = $doc->getElementsByTagName('meta');
    
    for ($i = 0; $i < $metas->length; $i++)
    {
    $meta = $metas->item($i);
    if($meta->getAttribute('name') == 'description')
       $description = $meta->getAttribute('content');
    if($meta->getAttribute('name') == 'keywords')
        $keywords = $meta->getAttribute('content');
    }
    
    //Check Empty Data
    $site_title = ($title == '' ? "No Title" : $title);
    $site_description = ($description == '' ? "No Description" : $description);
    $site_keywords = ($keywords == '' ? "No Keywords" : $keywords);
    
    $tags = array ('h1', 'h2', 'h3', 'h4');
    $texts = array ();
    foreach($tags as $tag)
    {
      $elementList = $doc->getElementsByTagName($tag);
      foreach($elementList as $element)
      {
         $texts[$element->tagName][] = $element->textContent;
      }
    }

    $arr_meta = array($sourceData,$site_title,$site_description,$site_keywords,$textData,$texts);
    return $arr_meta;
}

function genMeta($metaTitle,$metaDescription,$metaKeywords,$robotsIndex,$robotsLinks,$contentType,$lang,$revisitdays,$authorname,$checkRevisit,$checkAuthor){  	
	
    $metaTitle = ucfirst($metaTitle);
    
   	$metaKeywords = str_replace(array("\r\n", "\r", "\n", '"'),"", $metaKeywords);
   	
    $metaDescription = str_replace(array("\r\n", "\r", "\n", '"'),"", $metaDescription);
		
	$data = 'Copy & Paste the code below into Your Website : ' . PHP_EOL;
	$data .= PHP_EOL;
    $data .= '<meta name="title" content="' . $metaTitle . '">' . PHP_EOL;
	$data .= '<meta name="description" content="' . $metaDescription . '">' . PHP_EOL;
	$data .= '<meta name="keywords" content="' . $metaKeywords . '">' . PHP_EOL;
	$data .= '<meta name="robots" content="' . $robotsIndex . ', ' . $robotsLinks . '">' . PHP_EOL;
	$data .= '<meta http-equiv="Content-Type" content="' . $contentType . '">' . PHP_EOL;
	
    if($lang != "N/A"){
        $data .= '<meta name="language" content="' . $lang . '">' . PHP_EOL;
	}
    
    if($checkRevisit){
        $data .= '<meta name="revisit-after" content="' . $revisitdays . ' days">' . PHP_EOL;
    }
    if($checkAuthor){
        $data .= '<meta name="author" content="' . $authorname . '">' . PHP_EOL;
    }

    return htmlspecialchars($data);
}

function parse_user_agent( $u_agent = null ) {
	if( is_null($u_agent) ) {
		if( isset($_SERVER['HTTP_USER_AGENT']) ) {
			$u_agent = $_SERVER['HTTP_USER_AGENT'];
		} else {
			throw new \InvalidArgumentException('parse_user_agent requires a user agent');
		}
	}

	$platform = null;
	$browser  = null;
	$version  = null;

	$empty = array( 'platform' => $platform, 'browser' => $browser, 'version' => $version );

	if( !$u_agent ) return $empty;

	if( preg_match('/\((.*?)\)/im', $u_agent, $parent_matches) ) {
		preg_match_all('/(?P<platform>BB\d+;|Android|CrOS|Tizen|iPhone|iPad|iPod|Linux|Macintosh|Windows(\ Phone)?|Silk|linux-gnu|BlackBerry|PlayBook|X11|(New\ )?Nintendo\ (WiiU?|3?DS)|Xbox(\ One)?)
				(?:\ [^;]*)?
				(?:;|$)/imx', $parent_matches[1], $result, PREG_PATTERN_ORDER);

		$priority = array( 'Xbox One', 'Xbox', 'Windows Phone', 'Tizen', 'Android', 'CrOS', 'X11' );

		$result['platform'] = array_unique($result['platform']);
		if( count($result['platform']) > 1 ) {
			if( $keys = array_intersect($priority, $result['platform']) ) {
				$platform = reset($keys);
			} else {
				$platform = $result['platform'][0];
			}
		} elseif( isset($result['platform'][0]) ) {
			$platform = $result['platform'][0];
		}
	}

	if( $platform == 'linux-gnu' || $platform == 'X11' ) {
		$platform = 'Linux';
	} elseif( $platform == 'CrOS' ) {
		$platform = 'Chrome OS';
	}

	preg_match_all('%(?P<browser>Camino|Kindle(\ Fire)?|Firefox|Iceweasel|IceCat|Safari|MSIE|Trident|AppleWebKit|
				TizenBrowser|Chrome|Vivaldi|IEMobile|Opera|OPR|Silk|Midori|Edge|CriOS|UCBrowser|Puffin|SamsungBrowser|
				Baiduspider|Googlebot|YandexBot|bingbot|Lynx|Version|Wget|curl|
				Valve\ Steam\ Tenfoot|
				NintendoBrowser|PLAYSTATION\ (\d|Vita)+)
				(?:\)?;?)
				(?:(?:[:/ ])(?P<version>[0-9A-Z.]+)|/(?:[A-Z]*))%ix',
		$u_agent, $result, PREG_PATTERN_ORDER);

	// If nothing matched, return null (to avoid undefined index errors)
	if( !isset($result['browser'][0]) || !isset($result['version'][0]) ) {
		if( preg_match('%^(?!Mozilla)(?P<browser>[A-Z0-9\-]+)(/(?P<version>[0-9A-Z.]+))?%ix', $u_agent, $result) ) {
			return array( 'platform' => $platform ?: null, 'browser' => $result['browser'], 'version' => isset($result['version']) ? $result['version'] ?: null : null );
		}

		return $empty;
	}

	if( preg_match('/rv:(?P<version>[0-9A-Z.]+)/si', $u_agent, $rv_result) ) {
		$rv_result = $rv_result['version'];
	}

	$browser = $result['browser'][0];
	$version = $result['version'][0];

	$lowerBrowser = array_map('strtolower', $result['browser']);

	$find = function ( $search, &$key, &$value = null ) use ( $lowerBrowser ) {
		$search = (array)$search;

		foreach( $search as $val ) {
			$xkey = array_search(strtolower($val), $lowerBrowser);
			if( $xkey !== false ) {
				$value = $val;
				$key   = $xkey;

				return true;
			}
		}

		return false;
	};

	$key = 0;
	$val = '';
	if( $browser == 'Iceweasel' || strtolower($browser) == 'icecat' ) {
		$browser = 'Firefox';
	} elseif( $find('Playstation Vita', $key) ) {
		$platform = 'PlayStation Vita';
		$browser  = 'Browser';
	} elseif( $find(array( 'Kindle Fire', 'Silk' ), $key, $val) ) {
		$browser  = $val == 'Silk' ? 'Silk' : 'Kindle';
		$platform = 'Kindle Fire';
		if( !($version = $result['version'][$key]) || !is_numeric($version[0]) ) {
			$version = $result['version'][array_search('Version', $result['browser'])];
		}
	} elseif( $find('NintendoBrowser', $key) || $platform == 'Nintendo 3DS' ) {
		$browser = 'NintendoBrowser';
		$version = $result['version'][$key];
	} elseif( $find('Kindle', $key, $platform) ) {
		$browser = $result['browser'][$key];
		$version = $result['version'][$key];
	} elseif( $find('OPR', $key) ) {
		$browser = 'Opera Next';
		$version = $result['version'][$key];
	} elseif( $find('Opera', $key, $browser) ) {
		$find('Version', $key);
		$version = $result['version'][$key];
	} elseif( $find('Puffin', $key, $browser) ) {
		$version = $result['version'][$key];
		if( strlen($version) > 3 ) {
			$part = substr($version, -2);
			if( ctype_upper($part) ) {
				$version = substr($version, 0, -2);

				$flags = array( 'IP' => 'iPhone', 'IT' => 'iPad', 'AP' => 'Android', 'AT' => 'Android', 'WP' => 'Windows Phone', 'WT' => 'Windows' );
				if( isset($flags[$part]) ) {
					$platform = $flags[$part];
				}
			}
		}
	} elseif( $find(array( 'IEMobile', 'Edge', 'Midori', 'Vivaldi', 'SamsungBrowser', 'Valve Steam Tenfoot', 'Chrome' ), $key, $browser) ) {
		$version = $result['version'][$key];
	} elseif( $rv_result && $find('Trident', $key) ) {
		$browser = 'MSIE';
		$version = $rv_result;
	} elseif( $find('UCBrowser', $key) ) {
		$browser = 'UC Browser';
		$version = $result['version'][$key];
	} elseif( $find('CriOS', $key) ) {
		$browser = 'Chrome';
		$version = $result['version'][$key];
	} elseif( $browser == 'AppleWebKit' ) {
		if( $platform == 'Android' && !($key = 0) ) {
			$browser = 'Android Browser';
		} elseif( strpos($platform, 'BB') === 0 ) {
			$browser  = 'BlackBerry Browser';
			$platform = 'BlackBerry';
		} elseif( $platform == 'BlackBerry' || $platform == 'PlayBook' ) {
			$browser = 'BlackBerry Browser';
		} else {
			$find('Safari', $key, $browser) || $find('TizenBrowser', $key, $browser);
		}

		$find('Version', $key);
		$version = $result['version'][$key];
	} elseif( $pKey = preg_grep('/playstation \d/i', array_map('strtolower', $result['browser'])) ) {
		$pKey = reset($pKey);

		$platform = 'PlayStation ' . preg_replace('/[^\d]/i', '', $pKey);
		$browser  = 'NetFront';
	}

	return array( 'platform' => $platform ?: null, 'browser' => $browser ?: null, 'version' => $version ?: null );
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

    if (preg_match_all("/$regexp/siU", $s, $matchess)) {
        foreach ($matchess[2] as $links1) {
            if (!str_contains($links1, 'javascript:')) {
                if (!str_contains($links1, 'microsofttranslator.com')) {
                    if (!str_contains($links1, 'microsoft.com')) {
                        if (!str_contains($links1, '#')) {
                            if (!str_contains($links1, 'msn.com')) {
                                if (!str_contains($links1, "$revIP")) {
                                    $links1 = parse_url($links1);
                                    $hostx = $links1['host'];
                                    if ($hostx != null || $hostx != "")
                                        $revLinkx[] = $hostx;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    return @array_unique($revLinkx);
}

function simpleCurlGET($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
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

class whois {

    private $WHOIS_SERVERS = array(
        "com" => array("whois.verisign-grs.com", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "net" => array("whois.verisign-grs.com", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "org" => array("whois.pir.org", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "info" => array("whois.afilias.info", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "biz" => array("whois.neulevel.biz", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "co" => array("whois.verisign-grs.com", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Expiration Date:(.*)/"),
        "io" => array("whois.nic.io", "/First Registered :(.*)/", "/Last Updated :(.*)/", "/Expiry :(.*)/"),
        "us" => array("whois.nic.us", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "uk" => array("whois.nic.uk", "/Registered on:(.*)/", "/Last updated:(.*)/", "/Expiry date:(.*)/"),
        "ca" => array("whois.cira.ca", "/Creation date:(.*)/", "/Updated date:(.*)/", "/Expiry date:(.*)/"),
        "in" => array("whois.inregistry.net", "/Created On:(.*)/", "/Last Updated On:(.*)/", "/Expiration Date:(.*)/"),
        "me" => array("whois.nic.me", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "tel" => array("whois.nic.tel", "/Domain Registration Date:(.*)/", "/Domain Last Updated Date:(.*)/", "/Domain Expiration Date:(.*)/"),
        "mobi" => array("whois.dotmobiregistry.net", "/Created On:(.*)/", "/Last Updated On:(.*)/", "/Expiration Date:(.*)/"),
        "edu" => array("whois.educause.net", "/Domain record activated:(.*)/", "/Domain record last updated:(.*)/", "/Domain expires:(.*)/"),
        "gov" => array("whois.nic.gov", "/created:(.*)/", "/Last update of whois database:(.*)/", "/paid-till:(.*)/"),
        "tv" => array("whois.nic.tv", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "ru" => array("whois.tcinet.ru", "/created:(.*)/", "/Last updated on(.*)/", "/paid-till:(.*)/"),
        "ro" => array("whois.rotld.ro", "/Registered On:(.*)/", "/Last Updated:(.*)/", "/Expiry Date:(.*)/"),
        "fr" => array("whois.nic.fr", "/created:(.*)/", "/last-update:(.*)/", "/Expiry Date:(.*)/"),
        "it" => array("whois.nic.it", "/Created:(.*)/", "/Last Update:(.*)/", "/Expire Date:(.*)/"),
        "nl" => array("whois.sidn.nl", "/Created:(.*)/", "/Last Update:(.*)/", "/Expire Date:(.*)/"),
        "tw" => array("whois.twnic.net.tw", "/Record created on(.*)/", "/Last Update:(.*)/", "/Record expires on(.*)/"),
        "ch" => array("whois.nic.ch", "/First registration date:\n(.*)/", "/Last Update:(.*)/", "/Record expires on(.*)/"),
        "hk" => array("whois.hknic.net.hk", "/Domain Name Commencement Date:(.*)/", "/Last Update:(.*)/", "/Expiry Date:(.*)/"),
        "au" => array("whois.ausregistry.net.au", "/Creation Date:(.*)/", "/Last Modified:(.*)/", "/Expiration Date:(.*)/"),
        "de" => array("whois.denic.de", "/Creation Date:(.*)/", "/Changed:(.*)/", "/Expiration Date:(.*)/"),
        "cn" => array("whois.cnnic.net.cn", "/Registration Date:(.*)/", "/Changed:(.*)/", "/Expiration Date:(.*)/"),
        "asia" => array("whois.nic.asia", "/Domain Create Date:(.*)/", "/Domain Last Updated Date:(.*)/", "/Domain Expiration Date:(.*)/"),
        "name" => array("whois.nic.name", "/Created On:(.*)/", "/Expires On:(.*)/", "/Updated On:(.*)/"),
        "aero" => array("whois.aero", "/Created On:(.*)/", "/Updated On:(.*)/", "/Expires On:(.*)/"),
        "pro" => array("whois.registrypro.pro", "/Created On:(.*)/", "/Last Updated On:(.*)/", "/Expiration Date:(.*)/"),
        "travel" => array("whois.nic.travel", "/Domain Registration Date:(.*)/", "/Domain Last Updated Date:(.*)/", "/Domain Expiration Date:(.*)/"),
        "ie" => array("whois.iedr.ie", "/registration:(.*)/", "/renewal:(.*)/", "/Expiration Date:(.*)/"),
        "li" => array("whois.nic.li", "/First registration date:\n(.*)/", "/Last Update:(.*)/", "/Record expires on(.*)/"),
        "no" => array("whois.norid.no", "/Created:(.*)/", "/Last updated:(.*)/", "/Record expires on(.*)/"),
        "cc" => array("ccwhois.verisign-grs.com", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "eu" => array("whois.eu", "/Created On:(.*)/", "/Updated On:(.*)/", "/Expires On:(.*)/"),
        "nu" => array("whois.nic.nu", "/created:(.*)/", "/modified:(.*)/", "/expires:(.*)/"),
        "ws" => array("whois.worldsite.ws", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registrar Registration Expiration Date:(.*)/"),
        "sc" => array("whois2.afilias-grs.net", "/Created On:(.*)/", "/Last Updated On:(.*)/", "/Expiration Date:(.*)/"),
        "at" => array("whois.nic.at", "/Created On:(.*)/", "/changed:(.*)/", "/Expires On:(.*)/"),
        "be" => array("whois.dns.be", "/Registered:(.*)/", "/Updated:(.*)/", "/Expires On:(.*)/"),
        "se" => array("whois.iis.se", "/created:(.*)/", "/modified:(.*)/", "/expires:(.*)/"),
        "nz" => array("whois.srs.net.nz", "/domain_dateregistered:(.*)/", "/domain_datelastmodified:(.*)/", "/domain_datebilleduntil:(.*)/"),
        "mx" => array("whois.nic.mx", "/Created On:(.*)/", "/Last Updated On:(.*)/", "/Expiration Date:(.*)/"),
        "ac" => array("whois.nic.ac", "/First Registered :(.*)/", "/Last Updated :(.*)/", "/Expiry :(.*)/"),
        "sh" => array("whois.nic.sh", "/First Registered :(.*)/", "/Last Updated :(.*)/", "/Expiry :(.*)/"),
        "ae" => array("whois.aeda.net.ae", "/First Registered :(.*)/", "/Last Updated :(.*)/", "/Expiry :(.*)/"),
        "af" => array("whois.nic.af", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "ag" => array("whois.nic.ag", "/Created On:(.*)/", "/Last Updated On:(.*)/", "/Expiration Date:(.*)/"),
        "al" => array("whois.ripe.net", "/Created On:(.*)/", "/Last Updated On:(.*)/", "/Expiration Date:(.*)/"),
        "am" => array("whois.amnic.net", "/Registered:(.*)/", "/Last modified:(.*)/", "/Expires:(.*)/"),
        "as" => array("whois.nic.as", "/Registered on (.*)/", "/Last modified:(.*)/", "/Expires:(.*)/"),
        "az" => array("whois.ripe.net", "/Registered:(.*)/", "/Last modified:(.*)/", "/Expires:(.*)/"),
        "ba" => array("whois.ripe.net", "/Registered:(.*)/", "/Last modified:(.*)/", "/Expires:(.*)/"),
        "bg" => array("whois.register.bg", "/activated on:(.*)/", "/Last modified:(.*)/", "/expires at:(.*)/"),
        "bi" => array("whois1.nic.bi", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "bj" => array("whois.nic.bj", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "br" => array("whois.registro.br", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "bt" => array("whois.ripe.net", "/Creation date :(.*)/", "/Last Renewed :(.*)/", "/Expiration date:(.*)/"),
        "by" => array("whois.cctld.by", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Expiration Date:(.*)/"),
        "bz" => array("whois.belizenic.bz", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Expiration Date:(.*)/"),
        "cd" => array("whois.nic.cd", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Expiration Date:(.*)/"),
        "ck" => array("whois.ripe.net", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Expiration Date:(.*)/"),
        "cl" => array("whois.nic.cl", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "coop" => array("whois.nic.coop", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "cx" => array("whois.nic.cx", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "cy" => array("whois.ripe.net", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "cz" => array("whois.nic.cz", "/registered:(.*)/", "/changed:(.*)/", "/expire:(.*)/"),
        "dk" => array("whois.dk-hostmaster.dk", "/Registered:(.*)/", "/changed:(.*)/", "/Expires:(.*)/"),
        "dm" => array("whois.nic.dm", "/created date:(.*)/", "/updated date:(.*)/", "/expiration date:(.*)/"),
        "dz" => array("whois.nic.dz", "/Date de creation#. . . . . . . . . . . . . . . . .(.*)/", "/updated date:(.*)/", "/expiration date:(.*)/"),
        "ee" => array("whois.eenet.ee", "/registered:(.*)/", "/changed:(.*)/", "/expire:(.*)/"),
        "eg" => array("whois.ripe.net", "/registered:(.*)/", "/changed:(.*)/", "/expire:(.*)/"),
        "es" => array("whois.nic.es", "/registered:(.*)/", "/changed:(.*)/", "/expire:(.*)/"),
        "fi" => array("whois.ficora.fi", "/created:(.*)/", "/modified:(.*)/", "/expires:(.*)/"),
        "fo" => array("whois.nic.fo", "/created:(.*)/", "/modified:(.*)/", "/expires:(.*)/"),
        "gb" => array("whois.ripe.net", "/created:(.*)/", "/modified:(.*)/", "/expires:(.*)/"),
        "2ls" => array("whois.2ls.me", "/registered:(.*)/", "/changed:(.*)/", "/expire:(.*)/"),
        "ge" => array("whois.ripe.net", "/created:(.*)/", "/modified:(.*)/", "/expires:(.*)/"),
        "gl" => array("whois.nic.gl", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "gm" => array("whois.ripe.net", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "gr" => array("whois.ripe.net", "/created:(.*)/", "/modified:(.*)/", "/expires:(.*)/"),
        "gs" => array("whois.nic.gs", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "hm" => array("whois.ripe.net", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "hn" => array("whois.nic.hn", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "hr" => array("whois.dns.hr", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "hu" => array("whois.nic.hu", "/record created:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "il" => array("whois.isoc.org.il", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "int" => array("whois.iana.org", "/created:(.*)/", "/changed:(.*)/", "/expires:(.*)/"),
        "iq" => array("whois.cmc.iq", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "ir" => array("whois.nic.ir", "/created-date:(.*)/", "/last-updated:(.*)/", "/expire-date:(.*)/"),
        "is" => array("whois.isnic.is", "/created:(.*)/", "/last-updated:(.*)/", "/expires:(.*)/"),
        "je" => array("whois.je", "/Registered on (.*)/", "/last-updated:(.*)/", "/expires:(.*)/"),
        "jp" => array("whois.jprs.jp", "/Registered on (.*)/", "/last-updated:(.*)/", "/expires:(.*)/"),
        "kg" => array("whois.domain.kg", "/Record created:(.*)/", "/Record last updated on (.*)/", "/Record expires on(.*)/"),
        "kr" => array("whois.kr", "/Registered Date             :(.*)/", "/Last Updated Date           :(.*)/", "/Expiration Date             :(.*)/"),
        "la" => array("whois.nic.la", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "lt" => array("whois.domreg.lt", "/Registered:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "lu" => array("whois.dns.lu", "/registered:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "lv" => array("whois.nic.lv", "/Changed:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "ly" => array("whois.nic.ly", "/Created:(.*)/", "/Updated:(.*)/", "/Expired:(.*)/"),
        "ma" => array("whois.registre.ma", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "mc" => array("whois.ripe.net", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "md" => array("whois.nic.md", "/Created:(.*)/", "/Updated Date:(.*)/", "/Expiration date:(.*)/"),
        "mil" => array("whois.ripe.net", "/Created:(.*)/", "/Updated Date:(.*)/", "/Expiration date:(.*)/"),
        "mk" => array("whois.marnet.mk", "/registered:(.*)/", "/changed:(.*)/", "/expire:(.*)/"),
        "ms" => array("whois.nic.ms", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "mt" => array("whois.ripe.net", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "mu" => array("whois.nic.mu", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "ir" => array("whois.nic.ir", "/Creation Date:(.*)/", "/last-updated:(.*)/", "/expire-date:(.*)/"),
        //"my" => array("whois.mynic.my", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "za" => array("net-whois.registry.net.za", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "capetown" => array("whois.nic.capetown", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "durban" => array("whois.nic.durban", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "joburg" => array("whois.nic.joburg", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "nf" => array("whois.nic.nf", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "pl" => array("whois.dns.pl", "/created:(.*)/", "/last modified:(.*)/", "/renewal date:(.*)/"),
        "pr" => array("whois.nic.pr", "/Created On:(.*)/", "/last modified:(.*)/", "/Expires On:(.*)/"),
        "pt" => array("whois.dns.pt", "/Creation Date(.*)/", "/last modified:(.*)/", "/Expiration Date(.*)/"),
        "sa" => array("saudinic.net.sa", "/Created on(.*)/", "/Last Updated on:(.*)/", "/Expiration Date(.*)/"),
        "sb" => array("whois.nic.net.sb", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "sg" => array("whois.nic.net.sg", "/Creation Date:		(.*)/", "/Modified Date:		(.*)/", "/Expiration Date:		(.*)/"),
        "si" => array("whois.register.si", "/created:(.*)/", "/Updated Date:(.*)/", "/expire:(.*)/"),
        "sk" => array("whois.sk-nic.sk", "/created:(.*)/", "/Last-update(.*)/", "/Valid-date(.*)/"),
        "sm" => array("whois.nic.sm", "/Registration date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "st" => array("whois.nic.st", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Expiration Date:(.*)/"),
        "su" => array("whois.tcinet.ru", "/created:(.*)/", "/Updated Date:(.*)/", "/paid-till:(.*)/"),
        "tc" => array("whois.adamsnames.tc", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "tf" => array("whois.nic.tf", "/created:(.*)/", "/last-update:(.*)/", "/Expiry Date:(.*)/"),
        "th" => array("whois.thnic.co.th", "/Created date:(.*)/", "/Updated date:(.*)/", "/Exp date:(.*)/"),
        "tj" => array("whois.ripe.net", "/Created date:(.*)/", "/Updated date:(.*)/", "/Exp date:(.*)/"),
        "tk" => array("whois.nic.tk", "/Domain registered:(.*)/", "/Updated date:(.*)/", "/Record will expire on:(.*)/"),
        "tl" => array("whois.nic.tl", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "tm" => array("whois.nic.tm", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Expiry :(.*)/"),
        "tn" => array("whois.ati.tn", "/Activation:.........(.*)/", "/Updated Date:(.*)/", "/Expiry :(.*)/"),
        "to" => array("whois.tonic.to", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Expiry :(.*)/"),
        "tp" => array("whois.ripe.net", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Expiry :(.*)/"),
        "tr" => array("whois.nic.tr", "/Created on..............:(.*)/", "/Updated Date:(.*)/", "/Expires on..............:(.*)/"),
        "ua" => array("whois.ua", "/Record created:(.*)/", "/Record last updated:(.*)/", "/Record expires:(.*)/"),
        "uy" => array("whois.nic.org.uy", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "uz" => array("whois.ripe.net", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "va" => array("whois.ripe.net", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "vc" => array("whois2.afilias-grs.net", "/Created On:(.*)/", "/Last Updated On:(.*)/", "/Expiration Date:(.*)/"),
        "ve" => array("whois.nic.ve", "/Fecha de Creaci贸n:(.*)/", "/Ultima Actualizaci贸n:(.*)/", "/Expiration Date:(.*)/"),
        "vg" => array("whois.nic.vg", "/created date:(.*)/", "/updated date:(.*)/", "/expiration date:(.*)/"),
        "sexy" => array("whois.nic.sexy", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "berlin" => array("whois.nic.berlin", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "academy" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "bargains" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "best" => array("whois.nic.best", "/Domain Registration Date:(.*)/", "/Updated Date:(.*)/", "/Domain Expiration Date:(.*)/"),
        "bid" => array("whois.nic.bid", "/Domain Registration Date:(.*)/", "/Updated Date:(.*)/", "/Domain Expiration Date:(.*)/"),
        "bike" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "black" => array("whois.afilias.net", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "blue" => array("whois.afilias.net", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "boutique" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "builders" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "build" => array("whois.nic.build", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "buzz" => array("whois.nic.buzz", "/Domain Registration Date:(.*)/", "/Updated Date:(.*)/", "/Domain Expiration Date:(.*)/"),
        "cab" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "camera" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "camp" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "capital" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "cards" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "careers" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "catering" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "center" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "ceo" => array("whois.nic.ceo", "/Domain Registration Date:(.*)/", "/Updated Date:(.*)/", "/Domain Expiration Date:(.*)/"),
        "cheap" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "cleaning" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "clothing" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "club" => array("whois.nic.club", "/Domain Registration Date:(.*)/", "/Updated Date:(.*)/", "/Domain Expiration Date:(.*)/"),
        "kiwi" => array("whois.nic.kiwi", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "cm" => array("whois.netcom.cm", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "codes" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "coffee" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "community" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "company" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "computer" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "construction" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "consulting" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "contractors" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "cool" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "cruises" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "dance" => array("whois.unitedtld.com", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "dating" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "democrat" => array("whois.unitedtld.com", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "diamonds" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "directory" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "domains" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "education" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "email" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "engineering" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "enterprises" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "equipment" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "estate" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "events" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "exchange" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "expert" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "exposed" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "farm" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "fish" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "flights" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "florist" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "foundation" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "gallery" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "gift" => array("whois.uniregistry.net", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "glass" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "graphics" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "gripe" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "guitars" => array("whois.uniregistry.net", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "guru" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "holdings" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "holiday" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "house" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "ink" => array("whois.centralnic.com", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "institute" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "international" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "kaufen" => array("whois.unitedtld.com", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "kim" => array("whois.afilias.net", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "kitchen" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "land" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "lighting" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "limo" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "link" => array("whois.uniregistry.net", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "luxury" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "maison" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "management" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "marketing" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "meet" => array("whois.afilias.net", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "menu" => array("whois.nic.menu", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "moda" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "ninja" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "onl" => array("whois.afilias-srs.net", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "partners" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "parts" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "photography" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "photos" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "photo" => array("whois.uniregistry.net", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "pics" => array("whois.uniregistry.net", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "pink" => array("whois.afilias.net", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "plumbing" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "productions" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "properties" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "pub" => array("whois.unitedtld.com", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "recipes" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "red" => array("whois.afilias.net", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "rentals" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "repair" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "report" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "reviews" => array("whois.unitedtld.com", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "rich" => array("whois.afilias-srs.net", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "rocks" => array("whois.unitedtld.com", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "services" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "shiksha" => array("whois.afilias.net", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "shoes" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "singles" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "solar" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "solutions" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "supply" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "support" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "systems" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "tattoo" => array("whois.uniregistry.net", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "technology" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "tips" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "today" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "tools" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "trade" => array("whois.nic.trade", "/Domain Registration Date:(.*)/", "/Updated Date:(.*)/", "/Domain Expiration Date:(.*)/"),
        "training" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "uno" => array("whois.nic.uno", "/Domain Registration Date:(.*)/", "/Updated Date:(.*)/", "/Domain Expiration Date:(.*)/"),
        "vacations" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "ventures" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "viajes" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "villas" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "vision" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "voyage" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "watch" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "webcam" => array("whois.nic.webcam", "/Domain Registration Date:(.*)/", "/Updated Date:(.*)/", "/Domain Expiration Date:(.*)/"),
        "wiki" => array("whois.nic.wiki", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "works" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "xxx" => array("whois.nic.xxx", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "xyz" => array("whois.nic.xyz", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"),
        "zone" => array("whois.donuts.co", "/Creation Date:(.*)/", "/Updated Date:(.*)/", "/Registry Expiry Date:(.*)/"));

    public function whoislookup($domain) {
        $domainAge = $createdDate = $updatedDate = $expiredDate = 'Not Available';
        $domain = Trim($domain);
        if (substr(strtolower($domain), 0, 7) == "http://")
            $domain = substr($domain, 7);
        if (substr(strtolower($domain), 0, 4) == "www.")
            $domain = substr($domain, 4);
        if (preg_match("/^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/", $domain))
            return $this->queryWhois("whois.lacnic.net", $domain);
        elseif (preg_match("/^([-a-z0-9]{2,100})\.([a-z\.]{2,8})$/i", $domain)) {
            $domain_parts = explode('.', $domain);
            $tld = strtolower(array_pop($domain_parts));
            $server = $this->WHOIS_SERVERS[$tld][0];
            if (!$server) {
                return array("Error: No appropriate Whois server found for $domain domain!",
                    $domainAge,
                    $createdDate,
                    $updatedDate,
                    $expiredDate);
            }
            if ($server == 'net-whois.registry.net.za') {
                if (substr($domain, -5) == 'co.za')
                    $server = 'coza-whois.registry.net.za';
                if (substr($domain, -6) == 'org.za')
                    $server = 'org-whois.registry.net.za';
                if (substr($domain, -6) == 'web.za')
                    $server = 'web-whois.registry.net.za';
            }
            $res = $this->queryWhois($server, $domain);
            if (preg_match($this->WHOIS_SERVERS[$tld][1], $res, $match)) {
                $createdDate = Trim($match[1]);
                $createdDate = $this->cleanDate($createdDate, $tld);
                $domainAge = $this->converToAge($createdDate);
            }
            if (preg_match($this->WHOIS_SERVERS[$tld][2], $res, $match)) {
                $updatedDate = Trim($match[1]);
                $updatedDate = $this->cleanDate($updatedDate, $tld);
            }
            if (preg_match($this->WHOIS_SERVERS[$tld][3], $res, $match)) {
                $expiredDate = Trim($match[1]);
                $expiredDate = $this->cleanDate($expiredDate, $tld);
            }
            if (preg_match_all("/WHOIS Server: (.*)/", $res, $matches)) {
                $server = trim(array_pop($matches[1]));
                $resTemp = $this->queryWhois($server, $domain);
                if (trim($resTemp) != '')
                    $res = $resTemp;
            }
            return array($res, $domainAge, $createdDate, $updatedDate, $expiredDate);
        } else
            return array('Invalid Input', $domainAge, $createdDate, $updatedDate, $expiredDate);
    }

    private function queryWhois($server, $domain) {
        $serverIP = gethostbyname(trim($server));
        if ($serverIP != '') {
            $fp = @fsockopen($serverIP, 43, $errno, $errstr, 20) or $out = "Socket Error " . $errno . " - " . $errstr;
            if ($server == 'whois.verisign-grs.com' || $server == 'whois.nic.name')
                $domain = '=' . $domain;
            if ($server == 'whois.denic.de')
                $domain = '-T dn ' . $domain;
            if ($server == 'whois.nic.io' || $server == 'whois.nic.ac' || $server == 'whois.nic.sh')
                $domain = ' ' . $domain;
            fputs($fp, $domain . "\r\n");
            $out = '';
            while (!feof($fp)) {
                $out .= fgets($fp);
            }
            fclose($fp);
        } else {
            return 'Unable to resolve WHOIS server IP';
        }
        return $out;
    }

    private function converToAge($age) {
        date_default_timezone_set('UTC');
        $time = time() - strtotime($age);
        $years = floor($time / 31556926);
        $days = floor(($time % 31556926) / 86400);
        if ($years == '1')
            $y = '1 Year';
        else
            $y = $years . ' Years';
        if ($days == '1')
            $d = '1 Day';
        else
            $d = $days . ' Days';

        return "$y, $d";
    }

    private function getMyData($url, $ref_url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.2) Gecko/20070219 Firefox/2.0.0.2');
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_REFERER, $ref_url);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    private function cleanDate($date, $tld) {
        if ($tld == 'tr')
            $date = Trim(str_replace('.', '', $date));
        $date = str_replace('.', '/', $date);
        $date = str_replace('(YYYY-MM-DD)', '', $date);
        if ($tld == 'pt')
            $date = Trim(str_replace('(dd/mm/yyyy):', '', $date));
        if ($tld == 'fr' || $tld == 'bg' || $tld == 'lu' || $tld == 'mk' || $tld == 'pt' || $tld == 'tf' || $tld == 'tn')
            $date = str_replace('/', '-', $date);
        if ($tld == 'ee' || $tld == 'fi')
            $date = str_replace('/', '.', $date);
        if ($tld == 'kr') {
            $date = explode('/', $date);
            $date = Trim($date[0]) . '/' . Trim($date[1]) . '/' . Trim($date[2]);
        }
        if ($date == 'before Aug-1996')
            $date = '01-Aug-1996';
        $date = explode('T0', $date);
        $date = $date[0];
        $date = explode('T1', $date);
        $date = $date[0];
        $date = explode('T2', $date);
        $date = $date[0];
        $date = date('jS-M-Y', strtotime($date));
        return $date;
    }

    public function cleanUrl($site) {
        $site = strtolower(trim($site));
        $site = str_replace(array('http://', 'https://', 'www.'), '', $site);
        $site = parse_url('http://www.' . $site);
        return $site['host'];
    }

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

function get_meta_tag($html) {
    $doc = new DOMDocument();
    @$doc->loadHTML('<meta http-equiv="content-type" content="text/html; charset=utf-8">' . $html);
    $nodes = $doc->getElementsByTagName('title');

    if (isset($nodes->item(0)->nodeValue))
        $title = $nodes->item(0)->nodeValue;
    else
        $title = "";

    $response = array();
    $response['title'] = $title;

    $metas = $doc->getElementsByTagName('meta');

    for ($i = 0; $i < $metas->length; $i++) {
        $meta = $metas->item($i);
        if ($meta->getAttribute('name') != '')
            $response[$meta->getAttribute('name')] = $meta->getAttribute('content');
    }

    return $response;
}

function get_general_content($url, $proxy = "") {


    $ch = curl_init(); // initialize curl handle
    /* curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_VERBOSE, 0); */
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
    curl_setopt($ch, CURLOPT_AUTOREFERER, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_REFERER, 'http://' . $url);
    curl_setopt($ch, CURLOPT_URL, $url); // set url to post to
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // allow redirects
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return into a variable
    curl_setopt($ch, CURLOPT_TIMEOUT, 120); // times out after 50s
    curl_setopt($ch, CURLOPT_POST, 0); // set POST method

    /*     * ** Using proxy of public and private proxy both *** */

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $content = curl_exec($ch); // run the whole process

    curl_close($ch);

    return $content;
}

function strip_html_tags($text) {
    // PHP's strip_tags() function will remove tags, but it
    // doesn't remove scripts, styles, and other unwanted
    // invisible text between tags.  Also, as a prelude to
    // tokenizing the text, we need to insure that when
    // block-level tags (such as <p> or <div>) are removed,
    // neighboring words aren't joined.
    $text = preg_replace(
            array(
        // Remove invisible content
        '@<head[^>]*?>.*?</head>@siu',
        '@<style[^>]*?>.*?</style>@siu',
        '@<script[^>]*?.*?</script>@siu',
        '@<object[^>]*?.*?</object>@siu',
        '@<embed[^>]*?.*?</embed>@siu',
        '@<applet[^>]*?.*?</applet>@siu',
        '@<noframes[^>]*?.*?</noframes>@siu',
        '@<noscript[^>]*?.*?</noscript>@siu',
        '@<noembed[^>]*?.*?</noembed>@siu',
        // Add line breaks before & after blocks
        '@<((br)|(hr))@iu',
        '@</?((address)|(blockquote)|(center)|(del))@iu',
        '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
        '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
        '@</?((table)|(th)|(td)|(caption))@iu',
        '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
        '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
        '@</?((frameset)|(frame)|(iframe))@iu',
            ), array(
        ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
        "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
        "\n\$0", "\n\$0",
            ), $text);

    // Remove all remaining tags and comments and return.
    return strip_tags($text);
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

function getCenterText($str1, $str2, $data) {
    $data = explode($str1, $data);
    $data = explode($str2, $data[1]);
    return Trim($data[0]);
}

class socialNetworkShareCount {

    public $shareUrl;
    public $socialCounts = array();
    public $facebookShareCount = 0;
    public $facebookLikeCount = 0;
    public $twitterShareCount = 0;
    public $redditShareCount = 0;
    public $stumbleuponShareCount = 0;
    public $bufferShareCount = 0;
    public $pinterestShareCount = 0;
    public $linkedInShareCount = 0;
    public $googlePlusOnesCount = 0;

    public function __construct($options) {

        if (is_array($options)) {
            if (array_key_exists('url', $options) && $options['url'] != '') {
                $this->shareUrl = $options['url'];
            } else {
                die('URL must be set in constructor parameter array!');
            }
        } elseif (is_string($options) && $options != '') {
            $this->shareUrl = $options;

            $this->getFacebookShares();
            $this->getTwitterShares();
            $this->getPinterestShares();
            $this->getLinkedInShares();
            $this->getGooglePlusOnes();
            $this->getRedditshares();
            $this->getStumbleuponShares();
            $this->getBufferShares();
        } else {
            die('URL must be set in constructor parameter!');
        }
    }

    public function getShareCounts() {
        $totalShares = $this->getTotalShareCount($this->socialCounts);
        $this->socialCounts['total'] = $totalShares;




        return json_encode($this->socialCounts);
    }

    public function getTotalShareCount(array $shareCountsArray) {
        return array_sum($shareCountsArray);
    }

    public function getFacebookShares() {
        $api = file_get_contents('http://graph.facebook.com/?id=' . $this->shareUrl);
        $count = json_decode($api);
        if (isset($count->shares) && $count->shares != '0') {
            $this->facebookShareCount = $count->shares;
        }
        $this->socialCounts['facebookshares'] = $this->facebookShareCount;
        return $this->facebookShareCount;
    }
    
    public function getRedditShares() {
        $api = file_get_contents('http://www.reddit.com/api/info.json?url=' . $this->shareUrl);
        $count = json_decode($api);
        if (isset($count->data->data->score) && $count->data->data->score != '0') {
            $this->redditShareCount = $count->data->data->score;
        }
        $this->socialCounts['redditshares'] = $this->redditShareCount;
        return $this->redditShareCount;
    }

    public function getStumbleuponShares() {
        $api = file_get_contents('https://www.stumbleupon.com/services/1.01/badge.getinfo?url=' . $this->shareUrl);
        $count = json_decode($api);
        if (isset($count->result->views) && $count->result->views != '0') {
            $this->stumbleuponShareCount = $count->result->views;
        }
        $this->socialCounts['stumbleuponshares'] = $this->stumbleuponShareCount;
        return $this->stumbleuponShareCount;
    }

    public function getFacebookLikes() {
        $api = file_get_contents('http://graph.facebook.com/?id=' . $this->shareUrl);
        $count = json_decode($api);
        if (isset($count->likes) && $count->likes != '0') {
            $this->facebookLikeCount = $count->likes;
        }
        $this->socialCounts['facebooklikes'] = $this->facebookLikeCount;
        return $this->facebookLikeCount;
    }

    public function getTwitterShares() {
        $api = @file_get_contents('https://cdn.api.twitter.com/1/urls/count.json?url=' . $this->shareUrl);
        $count = json_decode($api);
        if (isset($count->count) && $count->count != '0') {
            $this->twitterShareCount = $count->count;
        }
        $this->socialCounts['twittershares'] = $this->twitterShareCount;
        return $this->twitterShareCount;
    }

    public function getBufferShares() {
        $api = file_get_contents('https://api.bufferapp.com/1/links/shares.json?url=' . $this->shareUrl);
        $count = json_decode($api);
        if (isset($count->shares) && $count->shares != '0') {
            $this->bufferShareCount = $count->shares;
        }
        $this->socialCounts['buffershares'] = $this->bufferShareCount;
        return $this->bufferShareCount;
    }

    public function getPinterestShares() {
        $api = file_get_contents('http://api.pinterest.com/v1/urls/count.json?callback%20url=' . $this->shareUrl);
        $body = preg_replace('/^receiveCount\((.*)\)$/', '\\1', $api);
        $count = json_decode($body);
        if (isset($count->count) && $count->count != '0') {
            $this->pinterestShareCount = $count->count;
        }
        $this->socialCounts['pinterestshares'] = $this->pinterestShareCount;
        return $this->pinterestShareCount;
    }

    public function getLinkedInShares() {
        $api = file_get_contents('https://www.linkedin.com/countserv/count/share?url=' . $this->shareUrl . 'format=json');
        $count = json_decode($api);
        if (isset($count->count) && $count->count != '0') {
            $this->linkedInShareCount = $count->count;
        }
        $this->socialCounts['linkedinshares'] = $this->linkedInShareCount;
        return $this->linkedInShareCount;
    }

    public function getGooglePlusOnes() {

        if (function_exists('curl_version')) {

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, "https://clients6.google.com/rpc");
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $this->shareUrl . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
            $curl_results = curl_exec($curl);
            curl_close($curl);
            $json = json_decode($curl_results, true);
            $this->googlePlusOnesCount = intval($json[0]['result']['metadata']['globalCounts']['count']);
        } else {

            $content = file_get_contents("https://plusone.google.com/u/0/_/+1/fastbutton?url=" . urlencode($_GET['url']) . "count=true");
            $doc = new DOMdocument();
            libxml_use_internal_errors(true);
            $doc->loadHTML($content);
            $doc->saveHTML();
            $num = $doc->getElementById('aggregateCount')->textContent;

            if ($num) {
                $this->googlePlusOnesCount = intval($num);
            }
        }

        $this->socialCounts['googleplusones'] = $this->googlePlusOnesCount;
        return $this->googlePlusOnesCount;
    }

}

function getContentFromSearchEngine($url, $proxy = '') {

    $ch = curl_init(); // initialize curl handle
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
    curl_setopt($ch, CURLOPT_AUTOREFERER, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7);
    curl_setopt($ch, CURLOPT_REFERER, $url);
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

function googleRank($searchDomain, $keyword, $position = 10, $googleDomain = 'google.com') {

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

            $searchDomain = "https://" . clean_url($searchDomain);
            $searchDomainArr = parse_url($searchDomain);
            $searchDomain = $searchDomainArr['host'];

            $url = clean_with_www($url);

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

function yahooRank($searchDomain, $keyword, $position = 10, $yahooDomain = 'yahoo.com') {
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

    $url = "https://www.bing.com/search?q={$keyword}&count=10&ie=utf-8&oe=utf-8{$page_str}{$localization_string}";
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
            $position = "Not Found Upto 200";

        $response = array($site,$position);

        return $response;
    }
}

function mb_count_words($string) {
    preg_match_all('/[\pL\pN\pPd]+/u', $string, $matches);
    return count($matches[0]);
}

function clean_domain_name($domain) {

    $domain = trim($domain);
    $domain = strtolower($domain);

    $domain = str_replace("www.", "", $domain);
    $domain = str_replace("http://", "", $domain);
    $domain = str_replace("https://", "", $domain);
    $domain = str_replace("/", "", $domain);

    return $domain;
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

function content_analysis($url) {
    /*     * *Remove last backslash from url* */

    $response = array();


    $url = trim($url, "/");

    $blocked_by_robots_txt = "";

    $content = get_general_content($url);
    $html = new simple_html_dom();
    $html->load($content);

    /*     * ***Check Robot File ****** */
    $robot_text = get_general_content($url . "/robots.txt");
    if ($robot_text != '') {
        preg_match("#Disallow: /\s#si", $robot_text, $match);
        if (empty($match))
            $blocked_by_robots_txt = "No";
        else
            $blocked_by_robots_txt = "Yes";
    } else
        $blocked_by_robots_txt = "No";


    /*     * **Get all meta tags **** */

    $meta_tag_information = get_meta_tag($content);

    /*     * *Check meta robot*** */

    if (isset($meta_tag_information['robots'])) {
        if (stripos($meta_tag_information['robots'], "index") !== false) {
            $blocked_by_meta_robot = "No";
        } else if (stripos($meta_tag_information['robots'], "noindex") !== false)
            $blocked_by_meta_robot = "Yes";
        else
            $blocked_by_meta_robot = "No";
    }

    else {
        $blocked_by_meta_robot = "No";
    }


    if (isset($meta_tag_information['robots'])) {
        if (stripos($meta_tag_information['robots'], "follow") !== false)
            $nofollowed_by_meta_robot = "No";
        else if (stripos($meta_tag_information['robots'], "nofollow") !== false)
            $nofollowed_by_meta_robot = "Yes";
        else
            $nofollowed_by_meta_robot = "No";
    }

    else {
        $nofollowed_by_meta_robot = "No";
    }


    /*     * ***Extract all headings ****** */


    for ($i = 1; $i <= 6; $i++) {

        $header_name = "h{$i}";
        $header_name_result = array();

        $headers = $html->find($header_name);

        if (isset($headers)) {
            foreach ($headers as $header) {
                $header_name_result[] = $header->plaintext;
            }
        }

        $response[$header_name] = $header_name_result;
    }

// keyword research
    // get 


    if (function_exists('iconv')) {
        $page_encoding = mb_detect_encoding($content);
        if (isset($page_encoding)) {
            $utf8_text = @iconv($page_encoding, "utf-8//IGNORE", $content);
            $raw_text = $utf8_text;
        } else
            $raw_text = $content;
    } else
        $raw_text = $content;


    $raw_text = strip_html_tags($raw_text);
    $raw_text = str_replace("&nbsp;", " ", $raw_text);

    $raw_text = str_replace("  ", " ", $raw_text);

    $total_number_of_words = str_word_count($raw_text);

    $raw_text = preg_replace('~\h*\[(?:[^][]+|(?R))*+]\h*~', ' ', $raw_text); // replacing chars between brackets

    $raw_text = html_entity_decode($raw_text, ENT_QUOTES, "UTF-8"); /* Decode HTML entities */
    // keeping raw text into a different variable $raw_text_for_2_words for phrase keyword extract
    $raw_text_for_2_words = $raw_text;

    $punc_marks = array('!', '@', '#', '$', '%', '^', '&', '*', '-', '+', '/', '"', ':', '|', ',', '.', ';', '(', ')', '{', '}', '[', ']');

    $raw_text = str_replace($punc_marks, "", $raw_text);

    $raw_text = preg_replace("/\r|\n/", " ", $raw_text);

    // $raw_text = preg_replace('/[^A-Za-z0-9\-]/', " ", $raw_text); // deleting all special chars 
    $raw_text = trim($raw_text); // trimming text

    $array_preposition = array(
        "a's", 'accordingly', 'again', 'allows', 'also', 'amongst', 'anybody', 'anyways', 'appropriate', 'aside',
        'available', 'because', 'before', 'below', 'between', 'by', "can't", 'certain', 'com', 'consider',
        'corresponding', 'definitely', 'different', "don't", 'each', 'else', 'et', 'everybody', 'exactly',
        'fifth', 'follows', 'four', 'gets', 'goes', 'greetings', 'has', 'he', 'her', 'herein', 'him', 'how', "i'm",
        'immediate', 'indicate', 'instead', 'it', 'itself', 'know', 'later', 'lest', 'likely', 'ltd', 'me', 'more', 'must',
        'nd', 'needs', 'next', 'none', 'nothing', 'of', 'okay', 'ones', 'others', 'ourselves', 'own', 'placed', 'probably',
        'rather', 'regarding', 'right', 'saying', 'seeing', 'seen', 'serious', 'she', 'so', 'something', 'soon',
        'still', "t's", 'th', 'that', 'theirs', 'there', 'therein', "they'd", 'third', 'though', 'thus', 'toward',
        'try', 'under', 'unto', 'used', 'value', 'vs', 'way', "we've", "weren't", 'whence', 'whereas', 'whether', "who's",
        'why', 'within', "wouldn't", "you'll", 'yourself', 'able', 'across', 'against', 'almost', 'although',
        'an', 'anyhow', 'anywhere', 'are', 'ask', 'away', 'become', 'beforehand', 'beside', 'beyond',
        "c'mon", 'cannot', 'certainly', 'come', 'considering', 'could', 'described', 'do', 'done',
        'edu', 'elsewhere', 'etc', 'everyone', 'example', 'first', 'for', 'from', 'getting', 'going', 'had', "hasn't",
        "he's", 'here', 'hereupon', 'himself', 'howbeit', "i've", 'in', 'indicated', 'into', "it'd", 'just', 'known',
        'latter', 'let', 'little', 'mainly', 'mean', 'moreover', 'my', 'near', 'neither', 'nine', 'noone', 'novel', 'off',
        'old', 'only', 'otherwise', 'out', 'particular', 'please', 'provides', 'rd', 'regardless', 'said', 'says', 'seem',
        'self', 'seriously', 'should', 'some', 'sometime', 'sorry', 'sub', 'take', 'than', "that's", 'them',
        "there's", 'theres', "they'll", 'this', 'three', 'to', 'towards', 'trying', 'unfortunately', 'up',
        'useful', 'various', 'want', 'we', 'welcome', 'what', 'whenever', 'whereby', 'which', 'whoever',
        'will', 'without', 'yes', "you're", 'yourselves', 'about', 'actually', "ain't", 'alone', 'always', 'and', 'anyone',
        'apart', "aren't", 'asking', 'awfully', 'becomes', 'behind', 'besides', 'both', "c's", 'cant', 'changes', 'comes',
        'contain', "couldn't", 'despite', 'does', 'down', 'eg', 'enough', 'even', 'everything', 'except', 'five',
        'former', 'further', 'given', 'gone', "hadn't", 'have', 'hello', "here's", 'hers', 'his', 'however',
        'ie', 'inasmuch', 'indicates', 'inward', "it'll", 'keep', 'knows', 'latterly', "let's", 'look', 'many', 'meanwhile',
        'most', 'myself', 'nearly', 'never', 'no', 'nor', 'now', 'often', 'on', 'onto', 'ought', 'outside', 'particularly',
        'plus', 'que', 're', 'regards', 'same', 'second', 'seemed', 'selves', 'seven', "shouldn't", 'somebody',
        'sometimes', 'specified', 'such', 'taken', 'thank', 'thats', 'themselves', 'thereafter', 'thereupon', "they're",
        'thorough', 'through', 'together', 'tried', 'twice', 'unless', 'upon', 'uses', 'very', 'wants', "we'd",
        'well', "what's", 'where', 'wherein', 'while', 'whole', 'willing', "won't", 'yet', "you've", 'zero',
        'above', 'after', 'all', 'along', 'am', 'another', 'anything', 'appear', 'around', 'associated', 'be', 'becoming',
        'being', 'best', 'brief', 'came', 'cause', 'clearly', 'concerning', 'containing', 'course', 'did', "doesn't",
        'downwards', 'eight', 'entirely', 'ever', 'everywhere', 'far', 'followed', 'formerly', 'furthermore', 'gives',
        'got', 'happens', "haven't", 'help', 'hereafter', 'herself', 'hither', "i'd", 'if', 'inc', 'inner', 'is', "it's",
        'keeps', 'last', 'least', 'like', 'looking', 'may', 'merely', 'mostly', 'name', 'necessary', 'nevertheless',
        'nobody', 'normally', 'nowhere', 'oh', 'once', 'or', 'our', 'over', 'per', 'possible', 'quite', 'really',
        'relatively', 'saw', 'secondly', 'seeming', 'sensible', 'several', 'since', 'somehow', 'somewhat',
        'specify', 'sup', 'tell', 'thanks', 'the', 'then', 'thereby', 'these', "they've", 'thoroughly', 'throughout', 'too',
        'tries', 'two', 'unlikely', 'us', 'using', 'via', 'was', "we'll", 'went', 'whatever', "where's", 'whereupon',
        'whither', 'whom', 'wish', 'wonder', 'you', 'your', 'according', 'afterwards', 'allow', 'already', 'among', 'any',
        'anyway', 'appreciate', 'as', 'at', 'became', 'been', 'believe', 'better', 'but', 'can', 'causes', 'co',
        'consequently', 'contains', 'currently', "didn't", 'doing', 'during', 'either', 'especially', 'every', 'ex',
        'few', 'following', 'forth', 'get', 'go', 'gotten', 'hardly', 'having', 'hence', 'hereby', 'hi', 'hopefully',
        "i'll", 'ignored', 'indeed', 'insofar', "isn't", 'its', 'kept', 'lately', 'less', 'liked', 'looks', 'maybe',
        'might', 'much', 'namely', 'need', 'new', 'non', 'not', 'obviously', 'ok', 'one', 'other', 'ours', 'overall',
        'perhaps', 'presumably', 'qv', 'reasonably', 'respectively', 'say', 'see', 'seems', 'sent', 'shall', 'six',
        'someone', 'somewhere', 'specifying', 'sure', 'tends', 'thanx', 'their', 'thence', 'therefore',
        'they', 'think', 'those', 'thru', 'took', 'truly', 'un', 'until', 'use', 'usually', 'viz', "wasn't", "we're",
        'were', 'when', 'whereafter', 'wherever', 'who', 'whose', 'with', 'would', "you'd", 'yours', 'a', 'b', 'c', 'd', 'e',
        'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'D', 'E',
        'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'provide', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0', '1st',
        '2nd', '3rd', '000', '10', 0, '11'
    );

    /*     * **** Get one word Keyword **** */
    // uppercasing $array_preposition values for delete from final array

    $one_keyword = array();

    $array_uppercase = array();
    foreach ($array_preposition as $value)
        $array_uppercase[] = ucfirst($value);

    $sample_array = explode(" ", $raw_text);  // exploding raw text into array

    $sample_array = array_map('trim', $sample_array);

    $sample_array = array_filter($sample_array); // deleting blank values

    $sample_array = array_slice($sample_array, 0);  // recreating index for no gap in array
    // deleting stop words and prepositions from array
    $final_array_first_diff = array_udiff($sample_array, $array_preposition, 'strcasecmp');

    $one_keyword_filter = array();
    foreach ($final_array_first_diff as $w) {

        preg_match("#\d*#", $w, $matches);
        if (empty($matches[0]))
            $one_keyword_filter[] = $w;
    }

    // creating an array of keywords as key and its occurence as value
    $one_keyword = array_count_values($one_keyword_filter);

    arsort($one_keyword); // sorting from top to bottom 

    $one_keyword = array_slice($one_keyword, 0, 20); // reduece array to 20 elements 

    $two_keyword = array();

    $number_of_words = mb_count_words($raw_text); // find the number of total words in raw text

    $word = explode(" ", $raw_text);  // exploding raw text to an array of words

    $word = array_map('trim', $word);

    $sample_array_2_words = $word;

    $sample_array_2_words = array_filter($sample_array_2_words);  // filter array

    $sample_array_2_words = array_slice($sample_array_2_words, 0); // slicing array	

    $half = 2; // length of phrase

    for ($i = 0; $i < $number_of_words - 1; $i++) { // first for loop for total number of words
        $ingram = ""; // a blank string		

        for ($j = $i; $j < $half + $i; $j++) { // 2nd for loop for creating all the phrases
            if (isset($sample_array_2_words[$j]))
                $ingram = $ingram . " " . $sample_array_2_words[$j];
        }

        if ($ingram != "")
            $two_keyword[] = $ingram;  // saving phrases to an array
    }

    $two_keyword = array_count_values($two_keyword);
    arsort($two_keyword);
    $two_keyword = array_slice($two_keyword, 0, 20);  // reduce array to first 20 elements

    /*     * **** Three Words ******* */

    // $half=(int) count($word)/2; 

    $three_keyword = array();

    $half = 3;

    for ($i = 0; $i < $number_of_words - 1; $i++) {
        $ingram = "";

        for ($j = $i; $j < $half + $i; $j++) {
            if (isset($sample_array_2_words[$j]))
                $ingram = $ingram . " " . $sample_array_2_words[$j];
        }
        if ($ingram != "")
            $three_keyword[] = $ingram;
    }


    $three_keyword = array_count_values($three_keyword);
    arsort($three_keyword);
    $three_keyword = array_slice($three_keyword, 0, 20);

    /*     * *** Get 4 phrase keyword ********** */

    // $half=(int) count($word)/2; 
    $four_keyword = array();
    $half = 4;
    for ($i = 0; $i < $number_of_words - 1; $i++) {
        $ingram = "";
        for ($j = $i; $j < $half + $i; $j++) {
            if (isset($sample_array_2_words[$j]))
                $ingram = $ingram . " " . $sample_array_2_words[$j];
        }
        if ($ingram != "")
            $four_keyword[] = $ingram;
    }

    $four_keyword = array_count_values($four_keyword);
    arsort($four_keyword);
    $split_word = array_slice($four_keyword, 0, 20);


    $response['blocked_by_robot_txt'] = $blocked_by_robots_txt;
    $response['meta_tag_information'] = $meta_tag_information;
    $response['blocked_by_meta_robot'] = $blocked_by_meta_robot;
    $response['nofollowed_by_meta_robot'] = $nofollowed_by_meta_robot;

    $response['one_phrase'] = $one_keyword;
    $response['two_phrase'] = $two_keyword;
    $response['three_phrase'] = $three_keyword;
    $response['four_phrase'] = $split_word;

    $response['total_words'] = $total_number_of_words;

    return $response;
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
            $percent = ($value / $words_sum) * 100;
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
    
    if(isset($internal_links)) {
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