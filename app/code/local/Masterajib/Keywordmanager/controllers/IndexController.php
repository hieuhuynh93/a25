<?php

class Masterajib_Keywordmanager_IndexController extends Mage_Core_Controller_Front_Action {
    
    public function getWebPageKeywordAnalysisAction(){
        $keyword = $_REQUEST['keyword'];
        
        $pageSize = 50000;
        $currPage = 1;
        
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            $customerData = Mage::getSingleton('customer/session')->getCustomer();
            $customerId = $customerData->getId();
            $linkDetailsCollection = Mage::getModel('linkdetails/linkdetails')
                                        ->getCollection()
                                        ->addFieldToFilter('customer_id', $customerId)
                                        ->addFieldToFilter('meta_keywords', array('notnull' => true))
                                        ->addFieldToFilter('meta_keywords', array('like' => '%' . $keyword . '%'))
                                        ->setPageSize($pageSize)
                                        ->setCurPage($currPage);
            
            
            $count = 1;
            if($linkDetailsCollection->getSize() > 0){
                foreach($linkDetailsCollection as $linkDetails){
                    $key = "'".$keyword."'";
                    $url = "'".$linkDetails->getRelatedUrl()."'";
                    $trHtml .= '<tr>
                                    <td>'.$count.'</td>
                                    <td>'.$linkDetails->getRelatedUrl().'</td>
                                    <td><a href="javascript:showKeywordAnalysis('.$linkDetails->getId().', '.$key.', '.$url.');" class="btn btn-outline-success btn-sm">View Analysis</a> </td>
                                </tr>';
                    $count++;
                }
            }else{
                $html = '<div class="alert alert-danger" role="alert">
                        Sorry, No Data Found.
                    </div>';
            }
        }else{
            $html = '<div class="alert alert-danger" role="alert">
                        Customer session logged out!, Kindly Login Again.
                    </div>';
        }
        $html = '<table class="table center-aligned-table"><thead>
                        <tr class="text-dark">
                            <th>No </th>
                            <th>URL </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody style="display: contents;">
                        '.$trHtml.'
                    </tbody></table>';
        echo $html;
    }
    
    public function getKeywordPositionOnWebpagesAction(){
        $keyword = $_REQUEST['keyword'];
        
        $pageSize = 50000;
        $currPage = 1;
        
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            $customerData = Mage::getSingleton('customer/session')->getCustomer();
            $customerId = $customerData->getId();
            $linkDetailsCollection = Mage::getModel('linkdetails/linkdetails')
                                        ->getCollection()
                                        ->addFieldToFilter('customer_id', $customerId)
                                        ->addFieldToFilter('meta_keywords', array('notnull' => true))
                                        ->addFieldToFilter('meta_keywords', array('like' => '%' . $keyword . '%'))
                                        ->setPageSize($pageSize)
                                        ->setCurPage($currPage);
            
            
            $count = 1;
            if($linkDetailsCollection->getSize() > 0){
                $helper = Mage::helper('linkanalysis/data');
                foreach($linkDetailsCollection as $linkDetails){
                    $googleRank = $helper->search_rank_api($keyword, 'google', $linkDetails->getRelatedUrl());
                    $yahooRank = $helper->search_rank_api($keyword, 'yahoo', $linkDetails->getRelatedUrl());
                    $bingRank = $helper->search_rank_api($keyword, 'bing', $linkDetails->getRelatedUrl());
                    $trHtml .= '<tr>
                                    <td><i class="fa fa-circle text-success"></i></td>
                                    <td>'.$linkDetails->getRelatedUrl().'</td>
                                    <td> '.$googleRank.' </td>
                                    <td> '.$yahooRank.' </td>
                                    <td> '.$bingRank.' </td>
                                </tr>';
                    $count++;
                }
            }else{
                $html = '<div class="alert alert-danger" role="alert">
                        Sorry, No Data Found.
                    </div>';
            }
        }else{
            $html = '<div class="alert alert-danger" role="alert">
                        Customer session logged out!, Kindly Login Again.
                    </div>';
        }
        $html = '<table class="table center-aligned-table"><thead>
                        <tr class="text-dark">
                            <th>No </th>
                            <th>URL </th>
                            <th>Google</th>
                            <th>Yahoo</th>
                            <th>Bing</th>
                        </tr>
                    </thead>
                    <tbody style="display: contents;">
                        '.$trHtml.'
                    </tbody></table>';
        echo $html;
    }
    
    public function getKeywordSugessitionAction(){
        $keyword = $_REQUEST['keyword'];
        $baseUrl = Mage::getBaseUrl( Mage_Core_Model_Store::URL_TYPE_WEB, true );
        
        $htmlGoogleSuggessition = @file_get_contents($baseUrl . "lib/small_seo_tools/All_In_One_Keyword_Research_Tool/ajax.php?keyword=".$keyword."&site=google");
        $htmlYahooSuggessition = @file_get_contents($baseUrl . "lib/small_seo_tools/All_In_One_Keyword_Research_Tool/ajax.php?keyword=".$keyword."&site=yahoo");
        $htmlBingSuggessition = @file_get_contents($baseUrl . "lib/small_seo_tools/All_In_One_Keyword_Research_Tool/ajax.php?keyword=".$keyword."&site=bing");
        $htmlWikipediaSuggessition = @file_get_contents($baseUrl . "lib/small_seo_tools/All_In_One_Keyword_Research_Tool/ajax.php?keyword=".$keyword."&site=wikipedia");
        $htmlYoutubeSuggessition = @file_get_contents($baseUrl . "lib/small_seo_tools/All_In_One_Keyword_Research_Tool/ajax.php?keyword=".$keyword."&site=youtube");
        $htmlAmazonSuggessition = @file_get_contents($baseUrl . "lib/small_seo_tools/All_In_One_Keyword_Research_Tool/ajax.php?keyword=".$keyword."&site=amazon");
        $htmlEbaySuggessition = @file_get_contents($baseUrl . "lib/small_seo_tools/All_In_One_Keyword_Research_Tool/ajax.php?keyword=".$keyword."&site=ebay");
        $htmlPlayStoreSuggessition = @file_get_contents($baseUrl . "lib/small_seo_tools/Android_Keyword_Research_Tool/ajax.php?url=".$keyword);
        $htmlFacebookSuggessition = @file_get_contents($baseUrl . "lib/small_seo_tools/Facebook_Ads_Interests_Keyword_Finder/ajax.php?keyword=".$keyword);
        $htmlTwitterSuggessition = @file_get_contents($baseUrl . "lib/small_seo_tools/Twitter_Topics_Keyword_Finder/ajax.php?url=".$keyword);
        $htmlSocicosSuggessition = @file_get_contents($baseUrl . "lib/small_seo_tools/keyword_suggestion.php?url=".$keyword);
        
        $html = '<div class="tab tab-vertical">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="google_sugesstion-tab" data-toggle="tab" href="#google_sugesstion" role="tab" aria-controls="google_sugesstion" aria-selected="true">
                                Google
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="yahoo_sugesstion-tab" data-toggle="tab" href="#yahoo_sugesstion" role="tab" aria-controls="yahoo_sugesstion" aria-selected="false"> 
                                Yahoo
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="bing_sugesstion-tab" data-toggle="tab" href="#bing_sugesstion" role="tab" aria-controls="portfolio-09" aria-selected="false">
                                Bing
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="wikipedia_sugesstion-tab" data-toggle="tab" href="#wikipedia_sugesstion" role="tab" aria-controls="contact-09" aria-selected="false">
                                Wikipedia
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="youtube_sugesstion-tab" data-toggle="tab" href="#youtube_sugesstion" role="tab" aria-controls="contact-09" aria-selected="false">
                                Youtube
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="amazon_sugesstion-tab" data-toggle="tab" href="#amazon_sugesstion" role="tab" aria-controls="contact-09" aria-selected="false">
                                Amazon
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="ebay_sugesstion-tab" data-toggle="tab" href="#ebay_sugesstion" role="tab" aria-controls="contact-09" aria-selected="false">
                                Ebay
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="playstore_sugesstion-tab" data-toggle="tab" href="#playstore_sugesstion" role="tab" aria-controls="contact-09" aria-selected="false">
                                Play Store
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="facebook_sugesstion-tab" data-toggle="tab" href="#facebook_sugesstion" role="tab" aria-controls="contact-09" aria-selected="false">
                                Facebook
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="twitter_sugesstion-tab" data-toggle="tab" href="#twitter_sugesstion" role="tab" aria-controls="contact-09" aria-selected="false">
                                Twitter
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="socicos_sugesstion-tab" data-toggle="tab" href="#socicos_sugesstion" role="tab" aria-controls="contact-09" aria-selected="false">
                                Socicos
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" style="padding: 4px 3px;">
                        <div class="tab-pane fade active show" id="google_sugesstion" role="tabpanel" aria-labelledby="google_sugesstion-tab">
                            '.$htmlGoogleSuggessition.'
                        </div>
                        <div class="tab-pane fade" id="yahoo_sugesstion" role="tabpanel" aria-labelledby="yahoo_sugesstion-tab">
                            '.$htmlYahooSuggessition.'
                        </div>
                        <div class="tab-pane fade" id="bing_sugesstion" role="tabpanel" aria-labelledby="bing_sugesstion-tab">
                            '.$htmlBingSuggessition.'
                        </div>
                        <div class="tab-pane fade" id="wikipedia_sugesstion" role="tabpanel" aria-labelledby="wikipedia_sugesstion-tab">
                            '.$htmlWikipediaSuggessition.'
                        </div>
                        <div class="tab-pane fade" id="youtube_sugesstion" role="tabpanel" aria-labelledby="youtube_sugesstion-tab">
                            '.$htmlYoutubeSuggessition.'
                        </div>
                        <div class="tab-pane fade" id="amazon_sugesstion" role="tabpanel" aria-labelledby="amazon_sugesstion-tab">
                            '.$htmlAmazonSuggessition.'
                        </div>
                        <div class="tab-pane fade" id="ebay_sugesstion" role="tabpanel" aria-labelledby="ebay_sugesstion-tab">
                            '.$htmlEbaySuggessition.'
                        </div>
                        <div class="tab-pane fade" id="playstore_sugesstion" role="tabpanel" aria-labelledby="playstore_sugesstion-tab">
                            '.$htmlPlayStoreSuggessition.'
                        </div>
                        <div class="tab-pane fade" id="facebook_sugesstion" role="tabpanel" aria-labelledby="facebook_sugesstion-tab">
                            '.$htmlFacebookSuggessition.'
                        </div>
                        <div class="tab-pane fade" id="twitter_sugesstion" role="tabpanel" aria-labelledby="twitter_sugesstion-tab">
                            '.$htmlTwitterSuggessition.'
                        </div>
                        <div class="tab-pane fade" id="socicos_sugesstion" role="tabpanel" aria-labelledby="socicos_sugesstion-tab">
                            '.$htmlSocicosSuggessition.'
                        </div>
                    </div>
                </div>';
        echo $html;
    }
    
    public function getKeywordInWebpagesAction(){
        $pageSize = 10000000000000;
        $currPage = 1;
        $keyword = $_REQUEST['keyword'];
        $html = '';
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            $customerData = Mage::getSingleton('customer/session')->getCustomer();
            $customerId = $customerData->getId();
            $linkDetailsCollection = Mage::getModel('linkdetails/linkdetails')
                                        ->getCollection()
                                        ->addFieldToFilter('customer_id', $customerId)
                                        ->addFieldToFilter('meta_keywords', array('notnull' => true))
                                        ->addFieldToFilter('meta_keywords', array('like' => '%' . $keyword . '%'))
                                        ->setPageSize($pageSize)
                                        ->setCurPage($currPage);
            $count = 1;
            if($linkDetailsCollection->getSize() > 0){
                foreach($linkDetailsCollection as $linkDetails){
                    $trHtml .= '<tr class="text-dark">
                                    <td>'.$count.'</td>
                                    <td>'.$linkDetails->getMetaKeywords().'</td>
                                    <td>'.$linkDetails->getRelatedUrl().'</td>
                                </tr>';
                    $count++;
                }
            }else{
                $html = '<div class="alert alert-danger" role="alert">
                        Sorry, No Data Found.
                    </div>';
            }
        }else{
            $html = '<div class="alert alert-danger" role="alert">
                        Customer session logged out!, Kindly Login Again.
                    </div>';
        }
        $html = '<div class="table-responsive">
                    <table class="table center-aligned-table mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th>#</th>
                                <th>Keyword</th>
                                <th>URL</th>
                            </tr>
                        </thead>
                        <tbody style="border: solid 0px;display: table-footer-group;">
                            ' . $trHtml . '
                        </tbody>
                    </table>
                </div>';
        echo $html;
    }

    public function getTopTenSearchResultsAction() {
        $keyword = $_REQUEST['keyword'];
        $baseUrl = Mage::getBaseUrl( Mage_Core_Model_Store::URL_TYPE_WEB, true );
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            $trGoogle = @file_get_contents($baseUrl . "lib/small_seo_tools/keyword_difficulties/getTopTenResults.php?keyword=".$keyword."&se=com");
            $trYahoo = @file_get_contents($baseUrl . "lib/small_seo_tools/keyword_difficulties/getTopTenResults.php?keyword=".$keyword."&se=yahoo");
            $trBing = @file_get_contents($baseUrl . "lib/small_seo_tools/keyword_difficulties/getTopTenResults.php?keyword=".$keyword."&se=bing");
            
            $resilts = '<div class="col-xl-12 mb-30">
                        <div class="tab tab-border nav-left">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="home-06-tab" data-toggle="tab" href="#home-06" role="tab" aria-controls="home-06" aria-selected="true"> <i class="fa fa-google"></i> Google</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-06-tab" data-toggle="tab" href="#profile-06" role="tab" aria-controls="profile-06" aria-selected="false"><i class="fa fa-yahoo"></i> Yahoo </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="portfolio-06-tab" data-toggle="tab" href="#portfolio-06" role="tab" aria-controls="portfolio-06" aria-selected="false"><i class="fa fa-bold"></i> Bing </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="home-06" role="tabpanel" aria-labelledby="home-06-tab">
                                    <h5 class="mb-15 card-title pb-0 border-0">Google Top 10 URL </h5>
                                    <div class="table-responsive">
                                        <table class="table center-aligned-table mb-0">
                                            <thead>
                                                <tr class="text-dark">
                                                    <th>#</th>
                                                    <th>URL</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody style="border: solid 0px;display: table-footer-group;">
                                                ' . $trGoogle . '
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile-06" role="tabpanel" aria-labelledby="profile-06-tab">
                                    <h5 class="mb-15 card-title pb-0 border-0">Yahoo Top 10 URL </h5>
                                    <div class="table-responsive">
                                        <table class="table center-aligned-table mb-0">
                                            <thead>
                                                <tr class="text-dark">
                                                    <th>#</th>
                                                    <th>URL</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody style="border: solid 0px;display: table-footer-group;">
                                                ' . $trYahoo . '
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="portfolio-06" role="tabpanel" aria-labelledby="portfolio-06-tab">
                                    <h5 class="mb-15 card-title pb-0 border-0">Bing Top 10 URL </h5>
                                    <div class="table-responsive">
                                        <table class="table center-aligned-table mb-0">
                                            <thead>
                                                <tr class="text-dark">
                                                    <th>#</th>
                                                    <th>URL</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody style="border: solid 0px;display: table-footer-group;">
                                                ' . $trBing . '
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
        }
        echo $resilts;
    }

    public function deleteKeywordAction() {
        $keywordId = $_REQUEST['kid'];
        $msg = '';
        $status = 0;
        $url = '';
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            try {
                Mage::getModel('keywordmanager/keywordmanager')->load($keywordId)->delete();
                $msg = '<div class="alert alert-success" role="alert">
                            Keyword Successfully Deleted...
                        </div>';
                $status = 1;
            } catch (Exception $ex) {
                $msg = '<div class="alert alert-danger" role="alert">
                            ' . $ex . '
                        </div>';
            }
        } else {
            $msg = '<div class="alert alert-danger" role="alert">
                        Customer session logged out!, Kindly Login Again.
                    </div>';
            $status = 2;
            $url = Mage::getUrl('customer/account/login');
        }
        echo json_encode(array("status" => $status, "url" => $url, "msg" => $msg));
    }

    public function saveKeywordAction() {
        $keyword = $_REQUEST['keyword'];
        $msg = '';
        $status = 0;
        $content = '';
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            $customerData = Mage::getSingleton('customer/session')->getCustomer();
            $customerId = $customerData->getId();
            $keywordManagerModel = Mage::getModel('keywordmanager/keywordmanager');
            $keywordManagerModel->setCustomerId($customerId);
            $keywordManagerModel->setKeyword($keyword);
            $keywordManagerModel->setKeywordHealth();
            $keywordManagerModel->setAssociatedUrls();
            $keywordManagerModel->setStatus('1');
            $keywordManagerModel->setCreatedTime(now());
            $keywordManagerModel->setUpdateTime(now());
            try {
                $keywordManagerModel->save();
                $msg = '<div class="alert alert-success" role="alert">
                            Keyword Added Successfully...
                        </div>';
                $status = 1;
            } catch (Exception $ex) {
                $msg = '<div class="alert alert-danger" role="alert">
                            ' . $ex . '
                        </div>';
            }
        } else {
            $msg = '<div class="alert alert-danger" role="alert">
                        Customer session logged out!, Kindly Login Again.
                    </div>';
            $status = 2;
            $url = Mage::getUrl('customer/account/login');
        }
        echo json_encode(array("status" => $status, "url" => $url, "msg" => $msg));
    }

    public function indexAction() {
        $this->loadLayout();
        $this->renderLayout();
    }

}
