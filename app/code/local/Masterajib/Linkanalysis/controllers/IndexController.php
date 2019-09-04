<?php

class Masterajib_Linkanalysis_IndexController extends Mage_Core_Controller_Front_Action {

    public function KeywordDensityAndPossibilitySpamAction() {
        $keywordPhrasesArray = array();
        $htmlOnePhrase = '';
        $htmlTwoPhrase = '';
        $htmlThreePhrase = '';
        $htmlFourPhrase = '';

        $linkDetailsId = $_REQUEST['linkdetails_id'];
        $linkdetails = Mage::getModel('linkdetails/linkdetails')->load($linkDetailsId);
        $searchUrl = $linkdetails->getRelatedUrl();
        $helper = Mage::helper('websiteaudit/data');
        $result = $helper->keywordAnalysisPhrases($searchUrl);
        $resultArr = json_decode($result, true);
        if (!empty($resultArr['one_phrase'])) {
            foreach ($resultArr['one_phrase'] as $onePhrase) {
                $htmlOnePhrase .= '<tr>
                                        <th style="text-align: center;">' . $onePhrase[0] . '</th>
                                        <th style="text-align: center;">' . $onePhrase[1] . '</th>
                                        <th style="text-align: center;">' . $onePhrase[2] . '</th>
                                        <th style="text-align: center;">' . $this->getPossibilitySpam($onePhrase[2]) . '</th>
                                    </tr>';
            }
        } else {
            $htmlOnePhrase .= '<tr><td colspan="3">Sorry! No One Phrase Keywords Found.<td></tr>';
        }
        if (!empty($resultArr['two_phrase'])) {
            foreach ($resultArr['two_phrase'] as $twoPhrase) {
                $htmlTwoPhrase .= '<tr>
                                        <th style="text-align: center;">' . $twoPhrase[0] . '</th>
                                        <th style="text-align: center;">' . $twoPhrase[1] . '</th>
                                        <th style="text-align: center;">' . $twoPhrase[2] . '</th>
                                        <th style="text-align: center;">' . $this->getPossibilitySpam($twoPhrase[2]) . '</th>
                                    </tr>';
            }
        } else {
            $htmlTwoPhrase .= '<tr><td colspan="3">Sorry! No Two Phrase Keywords Found.<td></tr>';
        }
        if (!empty($resultArr['three_phrase'])) {
            foreach ($resultArr['three_phrase'] as $threePhrase) {
                $htmlThreePhrase .= '<tr>
                                        <th style="text-align: center;">' . $threePhrase[0] . '</th>
                                        <th style="text-align: center;">' . $threePhrase[1] . '</th>
                                        <th style="text-align: center;">' . $threePhrase[2] . '</th>
                                        <th style="text-align: center;">' . $this->getPossibilitySpam($threePhrase[2]) . '</th>
                                    </tr>';
            }
        } else {
            $htmlThreePhrase .= '<tr><td colspan="3">Sorry! No Three Phrase Keywords Found.<td></tr>';
        }
        if (!empty($resultArr['four_phrase'])) {
            foreach ($resultArr['four_phrase'] as $fourPhrase) {
                $htmlFourPhrase .= '<tr>
                                        <th style="text-align: center;">' . $fourPhrase[0] . '</th>
                                        <th style="text-align: center;">' . $fourPhrase[1] . '</th>
                                        <th style="text-align: center;">' . $fourPhrase[2] . '</th>
                                        <th style="text-align: center;">' . $this->getPossibilitySpam($fourPhrase[2]) . '</th>
                                    </tr>';
            }
        } else {
            $htmlFourPhrase .= '<tr><td colspan="3">Sorry! No Four Phrase Keywords Found.<td></tr>';
        }
        $keywordPhrasesArray['one_phrase'] = $htmlOnePhrase;
        $keywordPhrasesArray['two_phrase'] = $htmlTwoPhrase;
        $keywordPhrasesArray['three_phrase'] = $htmlThreePhrase;
        $keywordPhrasesArray['four_phrase'] = $htmlFourPhrase;

        echo json_encode($keywordPhrasesArray);
    }
    
    public function getPossibilitySpam($density){
        $density = str_replace("%","",$density);
        $density = (double)$density;
        $message = '';
        if($density < 2.8 ){
            $message = 'Low keyword strength';
        } else if($density >= 2.8 && $density <= 3.1 ){
            $message = 'Seo friendly';
        } else {
            $message = 'Keyword stuffing';
        }
        return $message;
    }

    public function setcountryAction() {
        $status = 0;
        $customerId = Mage::getSingleton('customer/session')->getCustomer()->getEntityId();
        $countryCode = $_REQUEST['countryCode'];
        $customer = Mage::getModel('customer/customer')->load($customerId);
        try {
            $customer->setCountryCode($countryCode);
            $customer->save();
        } catch (Exception $ex) {
            $status = 1;
        }
        echo json_encode(array('status' => $status));
    }

    public function getkeywordsuggessionAction() {
        $count = 1;
        $keywordSuggessionHtml = '';
        $linkDetailsId = $_REQUEST['linkdetails_id'];
        $linkdetails = Mage::getModel('linkdetails/linkdetails')->load($linkDetailsId);
        $coreKeywords = ltrim($linkdetails->getMetaKeywords(), ",");
        $coreKeywordsArr = explode(",", $coreKeywords);
        $suggestedKeywordsArray = array();

        //if (Mage::getModel('keywords/keywords')->getCollection()->addFieldToFilter('linkdetails_id', $linkDetailsId)->getSize() <= 0) {
        foreach ($coreKeywordsArr as $coreKeyword) {
            $helper = Mage::helper('linkanalysis/data');
            $urlArr = $helper->getKeywordSearchUrl($coreKeyword);
            try {
                if (!empty($urlArr)) {
                    foreach ($urlArr as $url) {
                        $metaTagContent = $helper->get_meta_custom($url);
                        $keywords = ltrim($metaTagContent['keywords'], ",");
                        array_push($suggestedKeywordsArray, $keywords);
                        $modelKeyword = Mage::getModel('keywords/keywords');
                        $modelKeyword->setKeyword($coreKeyword);
                        $modelKeyword->setLinkdetailsId($linkDetailsId);
                        $modelKeyword->setKeywordWebsites($url);
                        $modelKeyword->setAllKeywords($keywords);
                        $modelKeyword->setSuggestedKeywords('');
                        $modelKeyword->setStatus(1);
                        $modelKeyword->setCreatedTime(now());
                        $modelKeyword->setUpdateTime(now());
                        try {
                            $modelKeyword->save();
                        } catch (Exception $ex) {
                            echo $ex;
                        }
                    }
                    $suggestedKeywords = ltrim(implode(",", $suggestedKeywordsArray), ",");
                    $suggestedKeywords = rtrim($suggestedKeywords, ",");
                    $linkdetails->setKeywordSuggession($suggestedKeywords);
                    $linkdetails->save();
                } else {
                    echo "Suggession is Empty";
                }
            } catch (Exception $ex) {
                echo $ex;
            }
        }
        //}else{
        //echo 'erere';
        //}

        foreach ($coreKeywordsArr as $coreKeyword) {
            $keywordCollection = Mage::getModel('keywords/keywords')
                    ->getCollection()
                    ->addFieldToFilter('keyword', $coreKeyword)
                    ->addFieldToFilter('linkdetails_id', $linkDetailsId)
                    ->addFieldToFilter('all_keywords', array('neq' => ''))
                    ->addFieldToFilter('status', '1');
            $allKeywordsArr = array();
            $allKeywords = '';
            foreach ($keywordCollection as $keywordColl) {
                array_push($allKeywordsArr, $keywordColl->getAllKeywords());
                $allKeywords = implode(",", $allKeywordsArr);
            }
            $keywordSuggessionArr = array_unique(array_diff_assoc($allKeywordsArr, array_unique($allKeywordsArr)));
            $keywordSuggession = implode(",", $keywordSuggessionArr);

            $allKeywordsCustomArr = explode(",", $allKeywords);
            $allKeywordsFinalArr = array();
            $allKeywordsFinalSuggesArr = array();
            foreach ($allKeywordsCustomArr as $allKeywordsCustom) {
                array_push($allKeywordsFinalArr, '<label class="badge badge-warning">' . $allKeywordsCustom . '</label>');
                array_push($allKeywordsFinalSuggesArr, '<label class="badge badge-success">' . $allKeywordsCustom . '</label>');
            }

            if ($keywordSuggession == '') {
                $keywordSuggession = implode(",", $allKeywordsFinalSuggesArr);
            }

            $keywordSuggessionHtml .= '<tr>
                                            <td> ' . $count . ' </td>
                                            <td>' . $coreKeyword . '</td>
                                            <td class="text-info">' . implode(",", $allKeywordsFinalArr) . '</td>
                                            <td>' . $keywordSuggession . '</td>
                                        </tr>';
            $count++;
        }
        echo $keywordSuggessionHtml;
    }

    public function saveSubLinksAndAnalyseAction() {
        $processStatus = 0;
        $primaryDomainId = $_REQUEST['primaryDomainId'];
        $sublinks = $_REQUEST['sublinks'];

        $helper = Mage::helper('linkanalysis/data');
        $customerId = Mage::getSingleton('customer/session')->getCustomer()->getEntityId();

        $linkDetailsModel = Mage::getModel('linkdetails/linkdetails');

        $sublinkArr = explode(",", $sublinks);
        foreach ($sublinkArr as $sublink) {
            $linkDetailsCollection = $linkDetailsModel
                    ->getCollection()
                    ->addFieldToFilter('linkanalysis_id', $primaryDomainId)
                    ->addFieldToFilter('customer_id', $customerId)
                    ->addFieldToFilter('related_url', $sublink);
            if ($linkDetailsCollection->getSize() <= 0) {
                $linkDetailsModel->setLinkanalysisId($primaryDomainId);
                $linkDetailsModel->setScanedLinkdetailsId(0);
                $linkDetailsModel->setCustomerId($customerId);
                $linkDetailsModel->setRelatedUrl($sublink);
                $linkDetailsModel->setStatus(3);
                $linkDetailsModel->setRobotTxt($helper->isListedInRobotTxt($sublink, $useragent = false));
                $linkDetailsModel->setPageSize($helper->getFileSize($sublink));
                $linkDetailsModel->setLoadTime($helper->getPageLoadTime($sublink));
                $linkDetailsModel->setUrlType(0);
                $linkDetailsModel->setAnalysisStatus(0);
                $linkDetailsModel->setPageAuthority('');
                $linkDetailsModel->setDomainAuthority('');
                $linkDetailsModel->setFollow();
                $linkDetailsModel->setDoFollow();
                $linkDetailsModel->setLinkJuice();
                $linkDetailsModel->setNoOfExternalLink('');
                $linkDetailsModel->setAlexaRanking('');
                $linkDetailsModel->setMetaTitle('');
                $linkDetailsModel->setMetaKeywords('');
                $linkDetailsModel->setMetaDescription('');
                $linkDetailsModel->setCreatedTime(now());
                $linkDetailsModel->setUpdateTime(now());
                try {
                    $linkDetailsModel->save();
                    echo "<br>" . $sublink;
                    $totalLinkDetailsSize = $linkDetailsModel->getCollection()->addFieldToFilter('linkanalysis_id', $primaryDomainId)->addFieldToFilter('customer_id', $customerId)->getSize();
                    $linkAnalysis = Mage::getModel('linkanalysis/linkanalysis')->load($primaryDomainId);
                    //echo "<pre>"; print_r($linkAnalysis->getData()); die();
                    $linkAnalysis->setNoOfUrl($totalLinkDetailsSize);
                    $linkAnalysis->setStatus(2);
                    $linkAnalysis->save();
                } catch (Exception $ex) {
                    $msg = $msg . $ex;
                }
            } else {
                echo $msg = $msg . $sublink . ' already exist';
            }
        }
    }

    public function getkeywordtrendsAction() {
        $html = '';
        $url = Mage::getBaseUrl() . 'keyword-trends?google_trends_keywords=sports,news';
        //$helper = Mage::helper('linkanalysis/data');
        $html = @file_get_contents($url);
        echo $html;
    }

    public function getkeywordanalysisresulthtmlAction() {
        $html = '';
        $linkDetailsId = $_REQUEST['linkdetails_id'];
        $keyword = $_REQUEST['keyword'];
        $helper = Mage::helper('linkanalysis/data');
        $urlArr = $helper->getKeywordSearchUrl($keyword);
        if (!empty($urlArr)) {
            foreach ($urlArr as $url) {
                $html .= '<li class="mb-20">
                        <div class="media">
                            <div class="position-relative">
                                <img class="img-fluid mr-15 avatar-small" src="' . Mage::getDesign()->getSkinUrl('images/item/01.png') . '" alt="">
                            </div> 
                            <div class="media-body">
                                <h6 class="mt-0 mb-0" style="font-size: 12px; text-align: center; width: 100%;">
                                    <table style="width: 100%; border-bottom: solid 2px #ccc;">
                                        <tr>
                                            <td>PA</td>
                                            <td>DA</td>
                                            <td>Page Size</td>
                                            <td>Share</td>
                                            <td>Back Link</td>
                                            <td>Link Juice</td>
                                            <td>Estd Traffic</td>
                                            <td>Elexa Rank</td>
                                        </tr>
                                        <tr>
                                            <td>' . $helper->getPageAuthority($url) . '</td>
                                            <td>' . $helper->getDomainAuthority($url) . '</td>
                                            <td>' . $helper->getFileSize($url) . '</td>
                                            <td>' . $helper->getSocialShareCount($url) . '</td>
                                            <td>54</td>
                                            <td>567</td>
                                            <td>70000</td>
                                            <td>' . $helper->getAlexaRank($url) . '</td>
                                        </tr>
                                    </table> 
                                </h6>
                                <p style="word-wrap: break-word;font-size: 13px;color: #666;font-weight: 600;font-family: verdana; padding-top: 5px;">
                                    <a target="_blank" href="' . $url . '" style="text-decoration: none; color: #17a2b8;">
                                        ' . $url . '
                                    </a>
                                </p>
                            </div>
                        </div>
                        <div class="divider dotted mt-20"></div>
                    </li>';
            }
        } else {
            $html = '<li class="mb-20">Sorry! No Result Found.</li>';
        }
        echo $html;
    }

    public function getkeywordanalysisAction() {
        $html = '';
        $count = 1;
        $linkDetailsId = $_REQUEST['linkdetails_id'];
        $linkdetails = Mage::getModel('linkdetails/linkdetails')->load($linkDetailsId);
        $keywords = $linkdetails->getMetaKeywords();
        $helper = Mage::helper('linkanalysis/data');
        if (strlen($keywords) > 1) {
            $keywordsArrCustom = explode(",", $keywords);
            foreach ($keywordsArrCustom as $keywordsCustom) {
                $function = "showKeywordAnalysisResult('" . $keywordsCustom . "');";
                $functionCompetetion = "showKeywordCompetetion('" . $keywordsCustom . "');";

                $url = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB, true) . "lib/small_seo_tools/keyword_competetion.php?url=" . $keywordsCustom . "&hdr=0";
                $res = @file_get_contents($url);

                $html .= '<tr>
                            <td style="width: 10%;">' . $count . '</td>
                            ' . $res . '
                            <td style="width: 15%;"><a href="javascript:' . $function . '" class="btn btn-outline-success btn-sm"><i class="fa fa-eye" style="font-size:15px !important;"></i>&nbsp;&nbsp;View Analysis</a></td>
                        </tr>';
                $count++;
            }
        } else {
            echo 'No Keyword Found';
        }
        echo $html;
    }

    public function getlinkpositionAction() {
        $countKeyword = 0;
        $linkDetailsId = $_REQUEST['linkdetails_id'];
        $linkdetails = Mage::getModel('linkdetails/linkdetails')->load($linkDetailsId);
        $searchUrl = $linkdetails->getRelatedUrl();
        $helper = Mage::helper('linkanalysis/data');
        $keywords = $linkdetails->getMetaKeywords();
        if (strlen($keywords) > 1) {
            $keywordsArrCustom = explode(",", $keywords);
            foreach ($keywordsArrCustom as $keywordsCustom) {
                $countKeyword++;
                $googleRank = $helper->search_rank_api($keywordsCustom, 'google', $searchUrl);
                $yahooRank = $helper->search_rank_api($keywordsCustom, 'yahoo', $searchUrl);
                $bingRank = $helper->search_rank_api($keywordsCustom, 'bing', $searchUrl);
                $yandexRank = 0;
                $key = "'" . $keywordsCustom . "'";
                $html .= '<tr><td style="text-align: center;">' . $countKeyword . '</td><td style="text-align: center;"><input type="checkbox" name="keywords" value="' . $keywordsCustom . '"></td><td style="text-align: center;">' . $keywordsCustom . '</td><td style="text-align: center;">' . $googleRank . '</td><td style="text-align: center;">' . $yahooRank . '</td><td style="text-align: center;">' . $bingRank . '</td><td style="text-align: center;">' . $yandexRank . '</td><td style="text-align: center;"><a href="javascript:showGoogleTrends(' . $key . ');" class="btn btn-outline-success btn-sm">View</a></td><td style="text-align: center;"><a href="#" class="btn btn-outline-success btn-sm"><i class="fa fa-refresh" style="font-size:18px"></i></a></td></tr>';
            }
        } else {
            $html = '<tr><td colspan="8">Sorry, No Keyword Found!</td></tr>';
        }
        echo $html;
    }

    public function getInternalExternalAction() {
        $linkdetails_id = $_REQUEST['linkdetails_id'];
        $linkdetails = Mage::getModel('linkdetails/linkdetails')->load($linkdetails_id);
        $relatedURL = $linkdetails->getRelatedUrl();
        $arrResponse = array();
        $helper = Mage::helper('linkanalysis/data');
        $internalLinksArr = json_decode($helper->getInternalExternal($relatedURL), true);
        $htmlInternal = '';
        $htmlExternal = '';
        if (!empty($internalLinksArr['internal'])) {
            $count = 1;
            $htmlInternal .= '<div class="table-responsive mt-15">';
            $htmlInternal .= '<table id="datatable" class="table table-striped center-aligned-table table-bordered mb-0">';
            $htmlInternal .= '<thead>
                                    <tr class="text-dark">
                                        <th>SN</th>
                                        <th>Preview</th>
                                        <th>External Link</th>
                                        <th>Description</th>
                                    </tr>
                              </thead>
                              <tbody>';
            foreach ($internalLinksArr['internal'] as $key => $value) {
                $fabIcon = $helper->getFavIcon($helper->fread_url($value['href'], $ref = ""));
                if (strlen($fabIcon) < 4) {
                    $fabIcon = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB, true) . 'skin/frontend/base/default/favicon.ico';
                } else {
                    $fabIcon = (!empty(parse_url($fabIcon)['host']) ? $fabIcon : parse_url($relatedURL)['host'] . "/" . ltrim($fabIcon, "/"));
                }
                $htmlInternal .= '<tr>';
                //$htmlInternal .= '<div class="row mb-30" style="margin-bottom: 0.143rem !important;">';
                $htmlInternal .= '<td>' . $count . '</td>';
                $htmlInternal .= '<td><img width="30" height="30" style="border: solid 1px #ccc; padding: 1px; border-radius: 5px;" class="img-fluid" src="' . $fabIcon . '" alt=""></td>';
                $htmlInternal .= '<td>' . $value['href'] . '</td>';
                if ($value['follow_type'] == 'NoFollow') {
                    $htmlInternal .= '<td><div class="alert alert-secondary" role="alert" style="padding-right: 15px; padding-left: 15px; padding-top: 4px; padding-bottom: 4px;">nofollow</div></td>';
                } elseif ($value['follow_type'] == 'DoFollow') {
                    $htmlInternal .= '<td><div class="alert alert-primary" role="alert" style="padding-right: 15px; padding-left: 15px; padding-top: 4px; padding-bottom: 4px;">follow</div></td>';
                } else {
                    $htmlInternal .= '<td><div class="alert alert-primary" role="alert" style="padding-right: 15px; padding-left: 15px; padding-top: 4px; padding-bottom: 4px;">----</div></td>';
                }
                $htmlInternal .= '</tr>';
                $count++;
            }
            $htmlInternal .= '</tbody></table></div>';
        } else {
            $htmlInternal = "Sorry! No Internal Links Found.";
        }
        $arrResponse['internal'] = $htmlInternal;


        if (!empty($internalLinksArr['external'])) {
            $count = 1;
            $htmlExternal .= '<div class="table-responsive mt-15">';
            $htmlExternal .= '<table id="datatable" class="table table-striped center-aligned-table table-bordered mb-0">';
            $htmlExternal .= '<thead>
                                    <tr class="text-dark">
                                        <th>SN</th>
                                        <th>Preview</th>
                                        <th>External Link</th>
                                        <th>Description</th>
                                    </tr>
                              </thead>
                              <tbody>';
            foreach ($internalLinksArr['external'] as $key => $value) {
                $fabIcon = $helper->getFavIcon($helper->fread_url($value['href'], $ref = ""));
                if (strlen($fabIcon) < 4) {
                    $fabIcon = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB, true) . 'skin/frontend/base/default/favicon.ico';
                } else {
                    $fabIcon = (!empty(parse_url($fabIcon)['host']) ? $fabIcon : parse_url($relatedURL)['host'] . "/" . ltrim($fabIcon, "/"));
                }
                $htmlExternal .= '<tr>';
                //$htmlExternal .= '<div class="row mb-30" style="margin-bottom: 0.143rem !important;">';
                $htmlExternal .= '<td>' . $count . '</td>';
                $htmlExternal .= '<td><img width="30" height="30" style="border: solid 1px #ccc; padding: 1px; border-radius: 5px;" class="img-fluid" src="' . $fabIcon . '" alt=""></td>';
                $htmlExternal .= '<td>' . $value['href'] . '</td>';
                if ($value['follow_type'] == 'NoFollow') {
                    $htmlExternal .= '<td><div class="alert alert-secondary" role="alert" style="padding-right: 15px; padding-left: 15px; padding-top: 4px; padding-bottom: 4px;">nofollow</div></td>';
                } elseif ($value['follow_type'] == 'DoFollow') {
                    $htmlExternal .= '<td><div class="alert alert-primary" role="alert" style="padding-right: 15px; padding-left: 15px; padding-top: 4px; padding-bottom: 4px;">follow</div></td>';
                } else {
                    $htmlExternal .= '<td><div class="alert alert-primary" role="alert" style="padding-right: 15px; padding-left: 15px; padding-top: 4px; padding-bottom: 4px;">----</div></td>';
                }
                $htmlExternal .= '</td>';
                $count++;
            }
            $htmlExternal .= '</tbody></table></div>';
        } else {
            $htmlExternal = "Sorry! No External Links Found.";
        }
        $arrResponse['external'] = $htmlExternal;

        echo json_encode($arrResponse);
    }

    public function getinternallinksAction() {
        $linkDetailsId = $_REQUEST['linkdetails_id'];
        $linkdetails = Mage::getModel('linkdetails/linkdetails')->load($linkDetailsId);
        $relatedURL = $linkdetails->getRelatedUrl();

        $helper = Mage::helper('linkanalysis/data');
        $internalLinksArr = $helper->getInternalLinks($relatedURL);

        if (!empty($internalLinksArr)) {
            $noOfInternalLink = count($internalLinksArr);
            $sttus = 1;
        }

        $internalLinks = implode(" ", $internalLinksArr);
        echo json_encode(array(
            'html' => $internalLinks,
            'status' => $sttus,
            'count' => $noOfInternalLink
                )
        );
    }

    public function getexternallinksAction() {
        $noOfExternalLink = 0;
        $sttus = 0;

        $linkDetailsId = $_REQUEST['linkdetails_id'];
        $linkdetails = Mage::getModel('linkdetails/linkdetails')->load($linkDetailsId);
        $relatedURL = $linkdetails->getRelatedUrl();

        $helper = Mage::helper('linkanalysis/data');
        $externalLinksArr = $helper->getExternalLinks($relatedURL);
        array_unique($externalLinksArr);

        if (!empty($externalLinksArr)) {
            $noOfExternalLink = count($externalLinksArr);
            $sttus = 1;
        }

        $externalLinks = implode(" ", $externalLinksArr);
        echo json_encode(array(
            'html' => $externalLinks,
            'status' => $sttus,
            'count' => $noOfExternalLink
                )
        );
    }

    public function getindexcountAction() {
        $linkDetailsId = $_REQUEST['linkdetails_id'];
        $linkdetails = Mage::getModel('linkdetails/linkdetails')->load($linkDetailsId);
        $helper = Mage::helper('linkanalysis/data');
        $mageSkinUrl = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_SKIN);
        $googleCount = $helper->getGoogleCount($linkdetails->getRelatedUrl());
        $yahooCount = $helper->getYahooCount($linkdetails->getRelatedUrl());
        $bingCount = $helper->getBingCount($linkdetails->getRelatedUrl());
        $yandexCount = 0;

        $resultArr = array();
        $resultArr['google'] = $googleCount;
        $resultArr['yahoo'] = $yahooCount;
        $resultArr['bing'] = $bingCount;
        $resultArr['yandex'] = $yandexCount;
        $htmlTr = '';
        $htmlTr .= '<div class="row">';
        foreach ($resultArr as $key => $value) {
            $imgUrl = $mageSkinUrl . 'frontend/seo/default/images/' . $key . '.png';
            $htmlTr .= '<div class="col-md-3 mt-20">
                            <div><img class="float-left" style="width: 25px" src="' . $imgUrl . '"/></div>
                            <div class="clearfix">
                                <p class="float-left">' . strtoupper($key) . '</p>
                                <p class="mb-10 text-info float-right">' . $value . '</p>
                            </div>
                            <div class="progress progress-small">
                                <div class="skill2-bar bg-info" role="progressbar" style="width:' . trim($value) . '%" aria-valuenow="' . trim($value) . '" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>';
        }
        $html = '<h5 class="card-title">Index Information</h5>' . $htmlTr;
        $html .= '</div>';
        echo $html;
        
        /*echo json_encode(array(
            'google_count' => $googleCount,
            'yahoo_count' => $yahooCount,
            'bing_count' => $bingCount,
            'yandex_count' => $yandexCount
                )
        );*/
    }

    public function getsocialsharecountAction() {
        $linkDetailsId = $_REQUEST['linkdetails_id'];
        $linkdetails = Mage::getModel('linkdetails/linkdetails')->load($linkDetailsId);
        
        $content = @file_get_contents(Mage::getBaseUrl( Mage_Core_Model_Store::URL_TYPE_WEB, true ) . 'lib/small_seo_tools/Social_Media_Sentiment_Analysis/index.php?url=' . $linkdetails->getRelatedUrl());
        
        $helper = Mage::helper('linkanalysis/data');
        $fbCount = $helper->getFbShareCount($linkdetails->getRelatedUrl());
        $pintRest = $helper->getpinterestShareCount($linkdetails->getRelatedUrl());
        
         

        echo json_encode(array(
            'fb_count' => $fbCount,
            'pintrest_count' => $pintRest,
            'sentimental'=> $content
                )
        );
    }

    public function keywordsearchurlAction() {
        $kword = $_REQUEST['keywords_name'];
        $html = '';
        $helper = Mage::helper('linkanalysis/data');
        $arrUrls = $helper->getKeywordSearchUrl($kword);
        $count = 0;
        if (!empty($arrUrls)) {
            foreach ($arrUrls as $keywordSearchUrl) {
                $count++;
                $pa = $helper->getPageAuthority($keywordSearchUrl);
                $da = $helper->getDomainAuthority($keywordSearchUrl);
                $share = 0; //$helper->getSocialShareCount($keywordSearchUrl);
                $backlink = '45';
                $link_juice = '54';
                $pageSize = '201 KB'; //$helper->getFileSize($keywordSearchUrl);
                $estdTraffic = '45';
                $alexaRank = $helper->getAlexaRank($keywordSearchUrl);
                $html .= '<hr>
                        <table style="width: 100%;">
                            <tr>
                                <td>' . $count . '</td>
                                <td colspan="7">
                                    <a href="' . $keywordSearchUrl . '" target="_blank">
                                        ' . $keywordSearchUrl . '
                                    </a>
                                </td>
                            </tr> 
                            <tr>
                                <td>PA</td>
                                <td>DA</td>
                                <td>SHARE</td>
                                <td>BACKLINKS</td>
                                <td>LINK JUICE</td>
                                <td>PAGE SIZE</td>
                                <td>ESTD TRAFFIC</td>
                                <td>ELEXA RANKING</td>
                            </tr>
                            <tr>
                                <td>' . $pa . '</td>
                                <td>' . $da . '</td>
                                <td>' . $share . '</td>
                                <td>' . $backlink . '</td>
                                <td>' . $link_juice . '</td>
                                <td>' . $pageSize . '</td>
                                <td>' . $estdTraffic . '</td>
                                <td>' . $alexaRank . '</td>
                            </tr>
                        </table>';
            }
        } else {
            $html = '<hr><div class="alert alert-danger" role="alert">Sorry!, No Data Found</div>';
        }
        echo $html;
    }

    public function deletekeywordAction() {
        $arrNewKeywords = array();
        $keywords_name = $_REQUEST['keywords_name'];
        $linkDetailsId = $_REQUEST['linkDetailsId'];
        $linkdetails = Mage::getModel('linkdetails/linkdetails')->load($linkDetailsId);
        $existKeyWordsArr = explode(",", $linkdetails->getMetaKeywords());
        foreach ($existKeyWordsArr as $existKeyWords) {
            if (!in_array($existKeyWords, explode(",", $keywords_name))) {
                array_push($arrNewKeywords, $existKeyWords);
            }
        }
        $message = "";
        $newKeywords = implode(",", $arrNewKeywords);
        $linkdetails->setMetaKeywords($newKeywords);
        try {
            $linkdetails->save();
            $message = "Successfully deleted!";
        } catch (Exception $ex) {
            $message = $ex;
        }
        $count = 1;
        foreach ($arrNewKeywords as $keywords_data) {
            $content .= '<tr>
                            <td class="keywordcheckbox"><input name="keyword_checkbox" value="' . $keywords_data . '" type="checkbox"></td>
                            <td class="keywordcount">' . $count . '</td>
                            <td>' . $keywords_data . '</td>
                        </tr>';
            $count++;
        }
        echo json_encode(array(
            'content' => $content,
            'msg' => $message
                )
        );
    }

    public function addkeywordAction() {
        $message = "";
        $linkDetailsId = $_REQUEST['linkDetailsId'];
        $keywords_name = $_REQUEST['keywords_name'];
        $linkdetails = Mage::getModel('linkdetails/linkdetails')->load($linkDetailsId);
        $keywordsArr = explode(",", $linkdetails->getMetaKeywords());
        if (in_array($keywords_name, $keywordsArr)) {
            $message = '<div class="alert alert-danger" role="alert" style="width: 100%;">' . $keywords_name . ' already exist!</div>';
        } else {
            array_push($keywordsArr, $keywords_name);
        }
        $keywords = implode(",", $keywordsArr);
        $keywords = ltrim($keywords, " ");
        $linkdetails->setMetaKeywords(ltrim($keywords, ","));
        $content = '';
        try {
            $linkdetails->save();
            $message = '<div class="alert alert-success" role="alert" style="width: 100%;">' . $keywords_name . ' added successfully.</div>';
        } catch (Exception $ex) {
            $message = $ex;
            $message = '<div class="alert alert-danger" role="alert" style="width: 100%;">' . $ex . ' already exist!</div>';
        }
        $count = 1;
        foreach ($keywordsArr as $keywords_data) {
            if (strlen($keywords_data) > 3) {
                $content .= '<tr>
                            <td class="keywordcheckbox"><input name="keyword_checkbox" value="' . $keywords_data . '" type="checkbox"></td>
                            <td class="keywordcount">' . $count . '</td>
                            <td>' . $keywords_data . '</td>
                        </tr>';
                $count++;
            }
        }

        echo json_encode(array(
            'content' => $content,
            'msg' => $message,
            'keywords' => $keywords
                )
        );
    }

    public function linkdetailsAction() {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function isURL($url) {
        $status = false;
        $filterStrings = array(
            "javascript:void(0);",
            "javascript:;",
            "javscript:void(0)",
            "javascript:void(0)",
            "javscript:void(0);",
            "javascript:void(0)",
            "javascript:void(0)",
            "javascript:history.back();",
            "#"
        );
        if (!in_array($url, $filterStrings)) {
            $status = true;
        }
        return $status;
    }

    public function getAllURL($filePath, $primaryDomain) {
        $parseURL = parse_url($primaryDomain);
        if (count($parseURL) > 0) {
            $primaryDomain = ($parseURL['scheme'] == '' ? '' : $parseURL['scheme'] . '://') . $parseURL['host'];
        }
        //$filePath = "";
        $relatedUrls = array();
        $myfile = fopen($filePath, "r") or die("Unable to open file!");
        $input = fread($myfile, filesize($filePath)); //@file_get_contents($url);
        fclose($myfile);
        $regexp = "<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>";
        if (preg_match_all("/$regexp/siU", $input, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $match) {
                if (strlen($match[2]) > 5 && $match[2][0] != '#') {
                    if (strpos($match[2], '@') == false) {
                        if ($match[2][0] == "/") {
                            $newURL = rtrim($primaryURL, "/") . "/" . ltrim($match[2], "/");
                        } else {
                            $newURL = $match[2];
                        }
                        $newURL = ltrim(trim($newURL, "'"), "/");

                        if ($this->isURL($newURL)) {
                            $newURL = ltrim($newURL, "/");
                            if (substr($newURL, 0, 3) == 'htt' || substr($newURL, 0, 3) == 'www') {
                                
                            } else {
                                $newURL = $primaryDomain . '/' . $newURL;
                            }
                            array_push($relatedUrls, $newURL);
                        }
                    }
                }
            }
        }
        array_unique($relatedUrls);
        return $relatedUrls;
    }

    public function setStatusComplete($relatedUrl) {
        $customerId = Mage::getSingleton('customer/session')->getCustomer()->getEntityId();
        $linkdetailsModel = Mage::getModel('linkdetails/linkdetails');
        $existReccords = $linkdetailsModel
                ->getCollection()
                ->addFieldToFilter('customer_id', $customerId)
                ->addFieldToFilter('related_url', $relatedUrl);
        if ($existReccords->getSize() > 0) {
            foreach ($existReccords as $existReccord) {
                Mage::getModel('linkdetails/linkdetails')
                        ->load($existReccord->getId())
                        ->setStatus(2)
                        ->save();
            }
        }
    }

    public function startAnalyseAction() {
        $output = '';
        $fileName = '';
        $allUrls = array();
        $completedUrl = '';
        $linkId = $_REQUEST['linkId'];
        $helper = Mage::helper('linkanalysis/data');
        $customerId = Mage::getSingleton('customer/session')->getCustomer()->getEntityId();
        $linkAnalysis = Mage::getModel('linkanalysis/linkanalysis')->load($linkId);
        $linkAnalysis->setStatus(1);
        $linkAnalysis->save();
        if ($linkAnalysis->getCustomerId() == $customerId) {
            $docRoot = $helper->getDocRoot() . "media/link_analysis/" . $customerId . "/" . $linkId . "/";
            if ($linkAnalysis->getUrlType() == 1) {
                $fileName = $docRoot . 'index.html';
            } else {
                // URL is not primary domain
            }
            if (file_exists($fileName)) {
                shell_exec('rm -rf ' . $fileName);
            }
            $command = 'wget ' . $linkAnalysis->getUrl() . ' -P ' . $docRoot;

            if (is_dir($docRoot)) {
                $output = shell_exec($command);
                $completedUrl = $linkAnalysis->getUrl();
            } else {
                if (mkdir($docRoot, 0777, true)) {
                    $output = shell_exec($command);
                    $completedUrl = $linkAnalysis->getUrl();
                } else {
                    die('Permission problem! Failed to create folders...');
                }
            }
            if (!file_exists($docRoot . "robots.txt")) {
                echo $robotsUrl = rtrim($linkAnalysis->getUrl(), "/") . "/robots.txt";
                $commandRobot = 'wget ' . $robotsUrl . ' -P ' . $docRoot;
                shell_exec($commandRobot);
            }

            $allUrls = $this->getAllURL($fileName, $linkAnalysis->getUrl());
            //shell_exec('rm -rf ' . $fileName);
        } else {
            die("Requested domain is not authorised");
        }

        $count = 0;
        $noOfUrl = $linkAnalysis->getNoOfUrl();
        foreach ($allUrls as $allUrl) {
            $linkModel = Mage::getModel('linkanalysis/linkanalysis')->load($linkId);
            if ($linkModel->getStatus() == 1) {
                $linkdetailsModel = Mage::getModel('linkdetails/linkdetails');
                $existReccords = $linkdetailsModel
                        ->getCollection()
                        ->addFieldToFilter('customer_id', $customerId)
                        ->addFieldToFilter('related_url', $allUrl);
                //------------ Checking For External URL starts -------------
                $domain = rtrim($linkModel->getUrl(), "/");
                $allUrlNew = rtrim($allUrl, "/");
                /* if (substr($allUrlNew, 0, strlen($domain)) == $domain) {
                  return true;
                  } */
                //------------ Checking For External URL ends ---------------
                if ($existReccords->getSize() == 0 && substr($allUrlNew, 0, strlen($domain)) == $domain) {
                    $metaTagContent = $helper->get_meta_custom($allUrl);
                    $linkdetailsModel->setLinkanalysisId($linkId);
                    $linkdetailsModel->setCustomerId($customerId);
                    $linkdetailsModel->setRelatedUrl($allUrl);
                    $linkdetailsModel->setStatus(3);
                    $linkdetailsModel->setRobotTxt('');
                    $linkdetailsModel->setPageSize($helper->getFileSize($allUrl));
                    $linkdetailsModel->setLoadTime($helper->getPageLoadTime($allUrl));
                    $linkdetailsModel->setUrlType('');
                    $linkdetailsModel->setAnalysisStatus('');
                    $linkdetailsModel->setPageAuthority('');
                    $linkdetailsModel->setDomainAuthority('');
                    $linkdetailsModel->setFollow('');
                    $linkdetailsModel->setDoFollow('');
                    $linkdetailsModel->setLinkJuice('');
                    $linkdetailsModel->setNoOfExternalLink('');
                    $linkdetailsModel->setAlexaRanking('');
                    $linkdetailsModel->setMetaTitle($metaTagContent['title']);
                    $linkdetailsModel->setMetaKeywords(ltrim($metaTagContent['keywords'], ","));
                    $linkdetailsModel->setMetaDescription($metaTagContent['description']);
                    if ($linkdetailsModel->getCreatedTime == NULL || $linkdetailsModel->getUpdateTime() == NULL) {
                        $linkdetailsModel->setCreatedTime(now())->setUpdateTime(now());
                    } else {
                        $linkdetailsModel->setUpdateTime(now());
                    }

                    $linkdetailsModel->save();
                    $count++;
                    $linkAnalysis->setNoOfUrl($noOfUrl + $count);
                    $linkAnalysis->save();
                }
            } else {
                exit();
            }
        }
        $this->setStatusComplete($completedUrl);
        $linkAnalysis->setStatus(2);
        $linkAnalysis->save();
        //-------------- Save in Database ---------------
    }

    public function deletedomainAction() {
        $linkIds = $_REQUEST['linkIds'];
        $status = 0;
        $count = 0;
        $customerId = Mage::getSingleton('customer/session')->getCustomer()->getId();
        $linkIdsArr = explode(",", $linkIds);
        foreach ($linkIdsArr as $linkId) {
            try {
                $linkdetailsCollection = Mage::getModel('linkdetails/linkdetails')
                        ->getCollection()
                        ->addFieldToFilter('linkanalysis_id', $linkId)
                        ->addFieldToFilter('customer_id', $customerId);
                foreach ($linkdetailsCollection as $linkdetails) {
                    Mage::getModel('linkdetails/linkdetails')->load($linkdetails->getId())->delete();
                }
                $helper = Mage::helper('linkanalysis/data');
                $userDir = $helper->getDocRoot() . "media/link_analysis/" . $customerId . "/" . $linkId;
                shell_exec('rm -rf ' . $userDir);
                Mage::getModel('linkanalysis/linkanalysis')->load($linkId)->delete();
                $count++;
                $status = 1;
                $message = $count . " Records Deleted!";
            } catch (Exception $ex) {
                $message = $ex;
            }
        }
        $customerId = Mage::getSingleton('customer/session')->getCustomer()->getEntityId();
        $content = @file_get_contents(Mage::getBaseUrl() . 'linkanalysis?customer_id=' . $customerId);
        echo json_encode(array(
            'status' => $status,
            'content' => $content,
            'msg' => $message
                )
        );
    }

    public function adddomainAction() {
        $customerId = Mage::getSingleton('customer/session')->getCustomer()->getEntityId();
        $message = '';
        $status = 0;
        $content = "";

        $customerId = Mage::getSingleton('customer/session')->getCustomer()->getEntityId();
        $domain_name = $_REQUEST['domain_name_root'];
        $model = Mage::getModel('linkanalysis/linkanalysis');
        $model->setUrl($domain_name);
        $model->setUrlType(1);
        $model->setStatus(3);
        $model->setCustomer_id($customerId);
        $model->setFilename('');

        try {
            if ($model->getCreatedTime == NULL || $model->getUpdateTime() == NULL) {
                $model->setCreatedTime(now())
                        ->setUpdateTime(now());
            } else {
                $model->setUpdateTime(now());
            }

            $model->save();
            $status = 1;
            $message = "Domain Successfully Added!";
            $content = @file_get_contents(Mage::getBaseUrl() . 'linkanalysis?customer_id=' . $customerId);
        } catch (Exception $ex) {
            $message = $ex;
        }


        echo json_encode(array(
            'status' => $status,
            'content' => $content,
            'msg' => $message
                )
        );
    }

    public function indexAction() {
        //------------------ Account Activity Link Anaysis --------------
        $customerId = Mage::getSingleton('customer/session')->getCustomer()->getEntityId();
        $activityHelper = Mage::helper('accountactivity/data');
        $data['activity'] = 'Link Analysis Page ';
        $data['link_analysis'] = '1';
        $data['customer_id'] = $customerId;
        $data['created_time'] = now();
        $activityHelper->setUserActivity($data);
        //--------------------------------------------------------------
        $this->loadLayout();
        $this->renderLayout();
    }

}
