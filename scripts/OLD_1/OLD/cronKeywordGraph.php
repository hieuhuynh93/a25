<?php

ini_set('display_errors', 1);
set_time_limit(0);
$msg = '';
require('../app/Mage.php');
Mage::init();
Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);



$arrayOfAllKeywords = array();

$linkDetailsCollection = Mage::getModel('linkdetails/linkdetails')
                            ->getCollection()
                            ->addFieldToFilter('linkanalysis_id', '3')
                            ->addFieldToFilter('linkdetails_id', '1');
echo "<pre>"; print_r($linkDetailsCollection->getData());
die();

foreach ($linkDetailsCollection as $linkDetails) {
    $linkdetails_id = $linkDetails->getLinkdetailsId();
    $linkanalysis_id = $linkDetails->getLinkanalysisId();
    $domainArr = parse_url($linkDetails->getRelatedUrl());
    $domain = (strlen($domainArr['scheme']) >= 4 ? $domainArr['scheme'] . '://' : '') . $domainArr['host'];
    $keywordsArr = array_unique(explode(",", $linkDetails->getMetaKeywords()));
    $countryCode = Mage::getModel('customer/customer')->load($linkDetails->getCustomerId())->getCountryCode();
    foreach ($keywordsArr as $keyword) {
        $dt = explode("-", date("d-m-y"));
        $graphModel = Mage::getModel('graph/graph');
        $graphModel->setLinkanalysisId($linkdetails_id);
        $graphModel->setLinkdetailsId($linkanalysis_id);
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
            //$graphModel->save();
        } catch (Exception $ex) {
            echo $ex;
        }
    }
}
?>
