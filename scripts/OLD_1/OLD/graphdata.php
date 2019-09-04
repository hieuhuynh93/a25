<?php

@ini_set('max_execution_time', 180000000000);
set_time_limit(0);
umask(0);
require('../app/Mage.php');
Mage::init();
Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);

function search_rank_api($key, $eng, $searchUrl, $countryCode) {
    $parseURL = parse_url($searchUrl);
    $domain = ($parseURL['scheme'] == '' ? '' : $parseURL['scheme'] . '://') . $parseURL['host'] . '/';

    $result = '';
    $isRank = 0;

    $engine = array('google' => 'https://www.google.co.in/search?q=', 'yahoo' => 'https://in.search.yahoo.com/search?p=', 'bing' => 'https://www.bing.com/search?q=');
    
    $str = str_replace(" ", "+", $key);
    $url = $engine[$eng] . $str . "&num=100";

    $body = @file_get_contents($url);

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
            $html[] = $link->getAttribute('href');
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
    return ($result > 0 ? $result : 0);
}

$linkDetailsCollection = Mage::getModel('linkdetails/linkdetails')->getCollection();
foreach ($linkDetailsCollection as $linkDetails) {
    //echo "<pre>";    print_r($linkDetails); die();
    $searchUrl = $linkDetails->getRelatedUrl(); //'https://www.indiatimes.com/';
    $parseURL = parse_url($searchUrl);
    $domain = $parseURL['host'];
    $host_names = explode(".", $domain);
    $domain = $host_names[count($host_names) - 2] . "." . $host_names[count($host_names) - 1];

    $keywords = $linkDetails->getMetaKeywords();
    $customer_id = $linkDetails->getCustomerId();
    
    $customer = Mage::getModel('customer/customer')->load($customer_id);
    $countryCode = $customer->getCountryCode();
    
    $keywordsArr = explode(",", $keywords);
    if (!empty($keywordsArr) && count($keywordsArr) > 0) {
        foreach ($keywordsArr as $keyword) {
            if ($keyword != '' && strlen($keyword) > 3) {
                $dt = explode("-", date("d-m-y"));
                $graphModel = Mage::getModel('graph/graph');
                $graphModel->setLinkanalysisId($linkDetails->getLinkanalysisId());
                $graphModel->setLinkdetailsId($linkDetails->getLinkdetailsId());
                $graphModel->setElementName($keyword);
                $graphModel->setElementType(1);

                $graphModel->setGoogleRank(search_rank_api($keyword, 'google', $domain, $countryCode));
                $graphModel->setYahooRank(search_rank_api($keyword, 'yahoo', $domain, $countryCode));
                $graphModel->setBingRank(search_rank_api($keyword, 'bing', $domain, $countryCode));
                $graphModel->setYandexRank(0);
                $graphModel->setDay($dt[0]);
                $graphModel->setMonth($dt[1]);
                $graphModel->setYear($dt[2]);
                $graphModel->setStatus(1);
                try {
                    $graphModel->save();
                    //die();
                } catch (Exception $ex) {
                    echo $ex;
                }
            }
        }
    }
}
