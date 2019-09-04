<?php

class Masterajib_Websiteaudit_Helper_Data extends Mage_Core_Helper_Abstract {
    
    function getBacklinkCount($domain){
        $url = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB, true) . "lib/link_analysis/backlink_count.php?domain=".$domain;
        $result = @file_get_contents($url);
        return $result;
    }
    
    function getInternalAndExternal($domain){
        $url = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB, true) . "lib/link_analysis/link_analysis.php?domain=".$domain;
        $result = @file_get_contents($url);
        return $result;
    }
            
    function getToDo($domain){
        $url = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB, true) . "lib/seo_custom/keywordAnalysis.php?domain=".$domain;
        $result = @file_get_contents($url);
        //$resultArr = json_decode($result, true);
        //echo "<pre>"; print_r($resultArr); die();
        return $result;
    }
            
    function getSiteInfo($domain){
        $url = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB, true) . "lib/seo_custom/site_info.php?domain=".$domain;
        $result = @file_get_contents($url);
        $resultArr = json_decode($result, true);
        //echo "<pre>"; print_r($resultArr); die();
        return $resultArr;
    }

    function getBuildWithTechnology($domain) {
        //$url = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB, true) . "lib/seo_custom/builtwith.php?domain=" . $domain;
        $url = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB, true) . 'lib/seo_custom/builtwith.php?domain=' . $domain;
        $result = @file_get_contents($url);
        $result = json_decode($result, true);
        return $result;
    }

    function getWebsiteSummary($domain) {
        $arrResponse = array();
        $url = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB, true) . "lib/link_analysis/success_error_warning.php?domain=" . $domain;
        $result = @file_get_contents($url);
        $result = json_decode($result, true);
        return $result;
    }

    function getTrafficAndErningEst($domain) {
        $url = $domain;
        $url = $this->raino_trim($url);
        $url = $this->clean_with_www($url);

        $alexa = $this->getAlexaRank($url);
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

        return $save;
    }

    function _curl($url, $post = false, $headers = false, $json = false, $put = false, $cert = false, $timeout = 20) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_ENCODING, "");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_MAX_RECV_SPEED_LARGE, 100000);
        $headers[] = 'Accept-Language: en';
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
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    function getAlexaRank($domain) {
        $xml = simplexml_load_string($this->_curl('http://data.alexa.com/data?cli=10&dat=snbamz&url=' . $domain));
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

    function getBrokenLink($domain) {
        $arrResponse = array();
        $url = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB, true) . "lib/link_analysis/broken_links.php?domain=" . $domain;
        $result = @file_get_contents($url);
        $result = json_decode($result, true);
        return $result;
    }

    function page_statistic_speed_mobile($custom_domain) {

        global $google_api_key;
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

        $page_stas = array(
            'website_score' => $new_res->ruleGroups->SPEED->score,
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


        return json_encode(array($page_stas,
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

    function page_statistic_speed_desktop($custom_domain1) {

        global $google_api_key;
        $google_api_key = 'AIzaSyD1wnxAppbj-riwtLtkTx-jzP-YQkvPsvw';

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
        $page_stas = array(
            'page_speed' => $new_res->ruleGroups->SPEED->score,
            'numberResources' => $new_res->pageStats->numberResources,
            'numberHosts' => $new_res->pageStats->numberHosts,
            'totalRequestBytes' => $new_res->pageStats->totalRequestBytes,
            'numberStaticResources' => $new_res->pageStats->numberStaticResources,
            'htmlResponseBytes' => $new_res->pageStats->htmlResponseBytes,
            'overTheWireResponseBytes' => $new_res->pageStats->overTheWireResponseBytes,
            'cssResponseBytes' => @$new_res->pageStats->cssResponseBytes,
            'imageResponseBytes' => $new_res->pageStats->imageResponseBytes,
            'javascriptResponseBytes' => $new_res->pageStats->javascriptResponseBytes,
            'otherResponseBytes' => $new_res->pageStats->otherResponseBytes,
            'numberJsResources' => $new_res->pageStats->numberJsResources,
            'numberCssResources' => @$new_res->pageStats->numberCssResources,
            'numTotalRoundTrips' => $new_res->pageStats->numTotalRoundTrips,
            'numRenderBlockingRoundTrips' => $new_res->pageStats->numRenderBlockingRoundTrips
        );


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



        return json_encode(array($page_stas,
            $avoid_landing_page_redirects,
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

    function keywordAnalysisPhrases($domain) {
        $arrResponse = array();
        $url = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB, true) . "lib/seo_custom/keywordanalysis.php?domain=" . $domain;
        $helper = Mage::helper('websiteaudit/data');
        $result = @file_get_contents($url);
        return $result;
    }

    function checkSitemapXml($url) {
        $url = rtrim($url, "/") . "/sitemap.xml";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
        curl_setopt($ch, CURLOPT_AUTOREFERER, false);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7);
        curl_setopt($ch, CURLOPT_REFERER, 'http://' . $url);
        curl_setopt($ch, CURLOPT_URL, $url); // set url to post to
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // allow redirects
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return into a variable
        curl_setopt($ch, CURLOPT_TIMEOUT, 120); // times out after 50s
        curl_setopt($ch, CURLOPT_POST, 0); // set POST method

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //curl_setopt($ch, CURLOPT_COOKIEJAR, "my_cookies.txt");
        //curl_setopt($ch, CURLOPT_COOKIEFILE, "my_cookies.txt");

        $content = curl_exec($ch); // run the whole process
        curl_close($ch);
        if (strlen($content) > 5) {
            return $url;
        } else {
            return 'Not Found!';
        }
    }

    function getSimilarWebRawData($domain) {
        $arrResponse = array();
        $url = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB, true) . "lib/seo_custom/index.php?domain=" . $domain;
        $helper = Mage::helper('websiteaudit/data');
        $result = @file_get_contents($url);

        $result = json_decode($result);
        $arrResponse['global_rank'] = $result->global_rank;
        $arrResponse['country_rank'] = $result->country_rank;
        $arrResponse['country'] = $result->country;
        $arrResponse['category_rank'] = $result->category_rank;
        $arrResponse['category'] = $result->category;
        $arrResponse['total_visit'] = $result->total_visit;
        $arrResponse['time_on_site'] = $result->time_on_site;
        $arrResponse['page_views'] = $result->page_views;
        $arrResponse['bounce'] = $result->bounce;
        $arrResponse['traffic_country'] = $result->traffic_country;
        $arrResponse['traffic_country_percentage'] = $result->traffic_country_percentage;
        $arrResponse['direct_traffic'] = $result->direct_traffic;
        $arrResponse['referral_traffic'] = $result->referral_traffic;
        $arrResponse['search_traffic'] = $result->search_traffic;
        $arrResponse['social_traffic'] = $result->social_traffic;
        $arrResponse['mail_traffic'] = $result->mail_traffic;
        $arrResponse['display_traffic'] = $result->display_traffic;
        $arrResponse['top_referral_site'] = $result->top_referral_site;
        $arrResponse['top_destination_site'] = $result->top_destination_site;
        $arrResponse['organic_search_percentage'] = $result->organic_search_percentage;
        $arrResponse['paid_search_percentage'] = $result->paid_search_percentage;
        $arrResponse['top_organic_keyword'] = $result->top_organic_keyword;
        $arrResponse['top_paid_keyword'] = $result->top_paid_keyword;
        $arrResponse['social_site_name'] = $result->social_site_name;
        $arrResponse['social_site_percentage'] = $result->social_site_percentage;

        return $arrResponse;
    }

    function getRank($url) {
        $arrRank = array();
        $xml = simplexml_load_file('http://data.alexa.com/data?cli=10&dat=snbamz&url=' . $url);
        $rank = isset($xml->SD[1]->POPULARITY) ? $xml->SD[1]->POPULARITY->attributes()->TEXT : 0;
        $country_rank = isset($xml->SD[1]->COUNTRY) ? $xml->SD[1]->COUNTRY->attributes()->RANK : 0;
        $web = (string) $xml->SD[0]->attributes()->HOST;

        $arrRank['global_rank'] = ($rank > 0 ? $rank : 0);
        $arrRank['country_rank'] = ($country_rank > 0 ? $country_rank : 0);

        return $arrRank;
    }

    function getWebsiteContent($url, $ref = "") {
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
    
    function getParagraphTags($url, $tagname) {
        $string = $this->getWebsiteContent($url);
        $d = new DOMDocument();
        $d->loadHTML(strtolower($string));
        $return = array();
        $count = 0;
        foreach ($d->getElementsByTagName($tagname) as $item) {
            //$count++;
            if ($item->textContent != '') {
                array_push($return, '<p>'.$item->textContent.'</p>');
            } else {
                array_push($return, '<span style="font-size: 13px;padding: 7px; margin:3px;" class="badge badge-warning">Not Found</span>');
            }
        }

        return implode(",", $return);
    }

    function getHeadingTags($url, $tagname) {
        $string = $this->getWebsiteContent($url);
        $d = new DOMDocument();
        $d->loadHTML(strtolower($string));
        $return = array();
        $count = 0;
        foreach ($d->getElementsByTagName($tagname) as $item) {
            //$count++;
            if ($item->textContent != '') {
                array_push($return, '<span style="font-size: 13px;padding: 7px; margin:3px;" class="badge badge-success">' . $item->textContent . '</span>');
            } else {
                array_push($return, '<span style="font-size: 13px;padding: 7px; margin:3px;" class="badge badge-warning">Not Found</span>');
            }
        }

        return implode(",", $return);
    }

    function getRobotTxt($url) {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_NOBODY, true);
        $result = curl_exec($curl);
        $ret = false;
        if ($result !== false) {
            $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if ($statusCode == 200) {
                $ret = true;
            }
        }
        curl_close($curl);
        if ($ret) {
            $remoteFile = "$url/robots.txt";
        } else {
            $remoteFile = "N/A";
        }
        return $remoteFile;
    }

    /*function getBackLinkCount($domain) {
        $noOfBacklink = 0;
        $result_in_html = file_get_contents("http://www.google.com/search?q=link:{$domain}");
        if (preg_match('/Results .*? of about (.*?) from/sim', $result_in_html, $regs)) {
            $indexed_pages = trim(strip_tags($regs[1])); //use strip_tags to remove bold tags
            $noOfBacklink = $indexed_pages;
        } elseif (preg_match('/About (.*?) results/sim', $result_in_html, $regs)) {
            $indexed_pages = trim(strip_tags($regs[1])); //use strip_tags to remove bold tags
            $noOfBacklink = $indexed_pages;
        }
        return $noOfBacklink;
    }*/

    function getSimilarWebsite($domain) {
        $arrResponse = array();
        $url = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB, true) . "lib/link_analysis/related_site.php?domain=" . $domain;
        $result = @file_get_contents($url);
        return $result;
        
        /*$parseURL = parse_url($url);
        $domain = ($parseURL['scheme'] == '' ? '' : $parseURL['scheme'] . '://') . $parseURL['host'] . '/';
        $url = 'https://www.google.com/search?q=related:' . $url . '&num=20';
        echo $body = $this->getWebsiteContent($url);//@file_get_contents($url);
        $domdoc = new DOMDocument();
        @$domdoc->loadHTML($body);
        $xml = new DOMXpath($domdoc);
        $res = $xml->query('//h3[@class="r"]//a');
        $html = "";
        if ($res) {
            foreach ($res as $k => $link) {
                $rawLink = $link->getAttribute('href');
                $urlArr = explode("=", $rawLink);
                $parseURL = parse_url($urlArr[1]);
                $domainNew = ($parseURL['scheme'] == '' ? '' : $parseURL['scheme'] . '://') . $parseURL['host'] . '/';
                $html[] = $domainNew;
            }
        } else {
            $html = 0;
        }*/
        return implode(",", array_unique($html));
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

    function getIpDetails($url) {
        $urlArr = parse_url($url);
        $ip = gethostbyname($urlArr['host']);
        //$new_arr[]= unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip));
        //return $new_arr[0];
        $url = 'http://ip-api.com/json/' . $ip;
        $res = @file_get_contents($url);
        $content = json_decode($res, true);
        return $content;
    }

    function calculate_date_differece($end, $start) {
        $diff = abs(strtotime($end) - strtotime($start));
        $years = floor($diff / (365 * 60 * 60 * 24));
        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        return $years . " Years " . $months . " Months " . $days . " Days";
    }

    function getUrlScreenShotDesktop($siteURL) {
        $googlePagespeedData = @file_get_contents("https://www.googleapis.com/pagespeedonline/v2/runPagespeed?url=$siteURL&screenshot=true&strategy=desktop");
        $googlePagespeedData = json_decode($googlePagespeedData, true);

        $screenshot = $googlePagespeedData['screenshot']['data'];
        $screenshot = str_replace(array('_', '-'), array('/', '+'), $screenshot);
        //----------------------------------------------
        $model = Mage::getModel('websiteaudit/websiteaudit');
        //----------------------------------------------
        return 'data:image/jpeg;base64,' . $screenshot;
    }

    function getUrlScreenShotMobile($siteURL) {
        $googlePagespeedData = @file_get_contents("https://www.googleapis.com/pagespeedonline/v2/runPagespeed?url=$siteURL&screenshot=true&strategy=mobile");
        $googlePagespeedData = json_decode($googlePagespeedData, true);
        $screenshot = $googlePagespeedData['screenshot']['data'];
        $screenshot = str_replace(array('_', '-'), array('/', '+'), $screenshot);
        return 'data:image/jpeg;base64,' . $screenshot;
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

    function getPageStatsMobile($url) {
        $pageStats = array();
        $url = 'https://www.googleapis.com/pagespeedonline/v2/runPagespeed?url=' . $url . '&strategy=mobile';
        $res = @file_get_contents($url);
        $content = json_decode($res, true);
        /*if (!empty($content['pageStats'])) {
            $pageStats['mobile'] = $content['pageStats'];
        }*/
        return $content;
    }

    function getPageStatsDesktop($url) {
        $pageStats = array();
        $url = 'https://www.googleapis.com/pagespeedonline/v2/runPagespeed?url=' . $url . '&strategy=desktop';
        $res = @file_get_contents($url);
        $content = json_decode($res, true);
        /*if (!empty($content['pageStats'])) {
            $pageStats['desktop'] = $content['pageStats'];
        }*/
        return $content;
    }

    function getWhoIs($domain) {
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

}
