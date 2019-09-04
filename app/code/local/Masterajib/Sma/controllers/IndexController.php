<?php

class Masterajib_Sma_IndexController extends Mage_Core_Controller_Front_Action {

    public function liveCountAction() {
        $sourceTxt = $_REQUEST['source'];
        $username = $_REQUEST['username'];
        $followers = 0;
        if ($sourceTxt == 'Instagram') {
            $url = 'https://www.instagram.com/' . $username;
            $raw = file_get_contents($url); //replace with user
            preg_match('/\"edge_followed_by\"\:\s?\{\"count\"\:\s?([0-9]+)/', $raw, $m);
            $followers = intval($m[1]);
        } elseif ($sourceTxt == 'Twitter') {
            $username = str_replace(" ", "", $_REQUEST['username']);
            $url = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB) . 'lib/apis/twitter.php?username=' . $username;
            $content = file_get_contents($url);
            $source = json_decode($content, true);

            if (!empty($source)) {
                $followers = $source['followers_count'];
            }
        } elseif ($sourceTxt == 'Youtube') {
            $channelId = str_replace(" ", "", $_REQUEST['username']);
            $url = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB) . 'lib/apis/youtube.php?channel_id=' . $username;
            $content = file_get_contents($url);
            $source = json_decode($content, true);
            //echo "<pre>"; print_r($source);
            if (!empty($source)) {
                $followers = $source['subscribers'];
            }
        } elseif ($sourceTxt == 'Tumblr') {
            $username = str_replace(" ", "", $_REQUEST['username']);
            $url = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB) . 'lib/apis/tumblr.php?username=' . $username;
            $content = file_get_contents($url);
            $source = json_decode($content, true);

            if (!empty($source)) {
                $followers = $source['followers_count'];
            }
        }

        echo number_format($followers);
    }

    public function getNumberFormatToNumber($numberFormat) {
        if (strpos($numberFormat, 'K') !== false) {
            $numberFormat = (int) filter_var($numberFormat, FILTER_SANITIZE_NUMBER_INT) * 100;
        }
        if (strpos($numberFormat, 'M') !== false) {
            $numberFormat = (int) filter_var($numberFormat, FILTER_SANITIZE_NUMBER_INT) * 100000;
        }
        if (strpos($numberFormat, 'B') !== false) {
            $numberFormat = (int) filter_var($numberFormat, FILTER_SANITIZE_NUMBER_INT) * 100000000;
        }
        if (strpos($numberFormat, 'T') !== false) {
            $numberFormat = (int) filter_var($numberFormat, FILTER_SANITIZE_NUMBER_INT) * 100000000000;
        }
        return $numberFormat;
    }

    public function getTwitterMissingData($username) {
        $username = str_replace(" ", "", $username);
        $url = 'https://twitter.com/' . $username;
        $source = file_get_contents($url);
        $dom = new DOMDocument();
        $dom->loadHTML($source);
        $dataResult = array();

        foreach ($dom->getElementsByTagName('a') as $item) {
            $output[] = array(
                'str' => strip_tags($dom->saveHTML($item)),
                'href' => $item->getAttribute('href'),
                'profile_id' => ($item->getAttribute('data-user-id') != '' ? $item->getAttribute('data-user-id') : ''),
                'anchorText' => $item->nodeValue
            );

            if (($count == 57 || in_array("profile_images", explode("/", $item->getAttribute('href')))) && empty($dataResult['profile_picture'])) {
                $dataResult['profile_picture'] = $item->getAttribute('href');
            }
            if (strpos($item->nodeValue, 'Photos and videos') !== false && empty($dataResult['media'])) {
                $dataResult['media'] = (int) filter_var($item->nodeValue, FILTER_SANITIZE_NUMBER_INT);
            }

            if (strpos($item->nodeValue, 'Likes') !== false && empty($dataResult['likes'])) {
                $dataResult['likes'] = (int) filter_var($item->nodeValue, FILTER_SANITIZE_NUMBER_INT);
            }
            if (strpos($item->nodeValue, 'Lists') !== false && empty($dataResult['lists'])) {
                $dataResult['lists'] = (int) filter_var($item->nodeValue, FILTER_SANITIZE_NUMBER_INT);
            }
            if (strpos($item->nodeValue, 'Moments') !== false && empty($dataResult['moments'])) {
                $dataResult['moments'] = (int) filter_var($item->nodeValue, FILTER_SANITIZE_NUMBER_INT);
            }
        }
        return $dataResult;
    }

    public function saveAndContinueAction() {
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            $sourceTxt = $_REQUEST['sourceTxt'];
            $username = str_replace(" ", "", $_REQUEST['username']);
            $model = Mage::getModel('sma/sma');

            if ($sourceTxt == 'Youtube') {
                $arrayYoutubeData = array();
                $url = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB) . 'lib/apis/youtube.php?channel_id=' . $username;
                $content = file_get_contents($url);
                $source = json_decode($content, true);

                if (!empty($source['profile_id'])) {
                    $arrayYoutubeData['customer_id'] = Mage::getSingleton('customer/session')->getCustomer()->getId();
                    $arrayYoutubeData['source'] = $sourceTxt;
                    $arrayYoutubeData['profile_id'] = $source['profile_id'];
                    $arrayYoutubeData['user_name'] = $source['user_name'];
                    $arrayYoutubeData['full_name'] = $source['full_name'];
                    $arrayYoutubeData['profile_picture'] = $source['profile_picture'];
                    $arrayYoutubeData['profile_description'] = $source['profile_description'];
                    $arrayYoutubeData['subscribers'] = $source['subscribers'];
                    $arrayYoutubeData['views'] = $source['views'];
                    $arrayYoutubeData['videos'] = $source['videos'];
                    $arrayYoutubeData['comments'] = $source['comments'];
                    $arrayYoutubeData['content'] = $content;
                    $arrayYoutubeData['custom_url'] = $source['url'];



                    $userCollection = $model->getCollection()
                            ->addFieldToFilter('user_name', $username)
                            ->addFieldToFilter('source', $sourceTxt);
                    if (!empty($userCollection) && $userCollection->getSize() > 0) {
                        foreach ($userCollection as $user) {
                            $model = Mage::getModel('sma/sma')->load($user->getId());
                        }
                    }
                    foreach ($arrayYoutubeData as $key => $value) {
                        $model->setData($key, $value);
                    }
                    $model->setData('created_time', now());
                    $model->setData('update_time', now());

                    try {
                        $model->save();
                        $refererUrl = Mage::getBaseUrl() . 'social-user-details?username=' . $username . '&source=' . $sourceTxt;
                    } catch (Exception $ex) {
                        die($ex);
                    }
                } else {
                    $refererUrl = Mage::getBaseUrl() . 'sma?err=0';
                }
            }

            if ($sourceTxt == 'Twitter') {
                $arrayTwitterData = array();
                $url = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB) . 'lib/apis/twitter.php?username=' . $username;
                $content = file_get_contents($url);
                $source = json_decode($content, true);

                $twitterMissingdata = $this->getTwitterMissingData($username);

                if (!empty($source)) {
                    $arrayTwitterData['customer_id'] = Mage::getSingleton('customer/session')->getCustomer()->getId();
                    $arrayTwitterData['source'] = $sourceTxt;
                    $arrayTwitterData['profile_id'] = $source['id'];
                    $arrayTwitterData['user_name'] = $source['screen_name'];
                    $arrayTwitterData['is_varified'] = $source['verified'];
                    $arrayTwitterData['full_name'] = $source['name'];
                    $arrayTwitterData['profile_picture'] = (!empty($twitterMissingdata['profile_picture']) ? $twitterMissingdata['profile_picture'] : $source['profile_image_url_https']);
                    $arrayTwitterData['profile_description'] = $source['description'];
                    $arrayTwitterData['tweets'] = $source['statuses_count'];
                    $arrayTwitterData['followers'] = $source['followers_count'];
                    $arrayTwitterData['following'] = $source['friends_count'];
                    $arrayTwitterData['media'] = '';
                    $arrayTwitterData['likes'] = $source['favourites_count'];
                    $arrayTwitterData['lists'] = '';
                    $arrayTwitterData['moments'] = '';
                    $arrayTwitterData['filename'] = '';
                    $arrayTwitterData['content'] = $content;
                    $arrayTwitterData['status'] = 1;

                    $userCollection = $model->getCollection()
                            ->addFieldToFilter('user_name', $username)
                            ->addFieldToFilter('source', $sourceTxt);
                    if (!empty($userCollection) && $userCollection->getSize() > 0) {
                        foreach ($userCollection as $user) {
                            $model = Mage::getModel('sma/sma')->load($user->getId());
                        }
                    }
                    foreach ($arrayTwitterData as $key => $value) {
                        $model->setData($key, $value);
                    }
                    $model->setData('created_time', now());
                    $model->setData('update_time', now());
                    try {
                        $model->save();
                        $refererUrl = Mage::getBaseUrl() . 'social-user-details?username=' . $username . '&source=' . $sourceTxt;
                    } catch (Exception $ex) {
                        die($ex);
                    }
                } else {
                    $refererUrl = Mage::getBaseUrl() . 'sma?err=0';
                    //Mage::app()->getFrontController()->getResponse()->setRedirect($url);
                }
            }

            if ($sourceTxt == 'Instagram') {
                $url = 'https://www.instagram.com/' . $username;
                $source = file_get_contents($url);
                preg_match('/<script type="text\/javascript">window\._sharedData =([^;]+);<\/script>/', $source, $matches);
                if (!isset($matches[1])){
                    $refererUrl = Mage::getBaseUrl() . 'sma?err=0';
                    Mage::app()->getFrontController()->getResponse()->setRedirect($refererUrl);
                }
                $r = json_decode($matches[1], true);
                
                $isVerified = $r['entry_data']['ProfilePage']['0']['graphql']['user']['is_verified'];


                if (!empty($r['entry_data']['ProfilePage']['0']['graphql']['user']['full_name']) && strlen($r['entry_data']['ProfilePage']['0']['graphql']['user']['full_name']) > 3) {
                    $fullName = $r['entry_data']['ProfilePage']['0']['graphql']['user']['full_name'];
                }

                if (!empty($r['entry_data']['ProfilePage']['0']['graphql']['user']['biography']) && strlen($r['entry_data']['ProfilePage']['0']['graphql']['user']['biography']) > 3) {
                    $biography = $r['entry_data']['ProfilePage']['0']['graphql']['user']['biography'];
                }

                if (!empty($r['entry_data']['ProfilePage']['0']['graphql']['user']['id']) && $r['entry_data']['ProfilePage']['0']['graphql']['user']['id'] > 0) {
                    $profileId = $r['entry_data']['ProfilePage']['0']['graphql']['user']['id'];
                }

                if (!empty($r['entry_data']['ProfilePage']['0']['graphql']['user']['profile_pic_url']) && strlen($r['entry_data']['ProfilePage']['0']['graphql']['user']['profile_pic_url']) > 3) {
                    $profile_pic_url = $r['entry_data']['ProfilePage']['0']['graphql']['user']['profile_pic_url'];
                }

                if (!empty($r['entry_data']['ProfilePage']['0']['graphql']['user']['edge_followed_by']['count'])) {
                    $followers = $r['entry_data']['ProfilePage']['0']['graphql']['user']['edge_followed_by']['count'];
                }

                if (!empty($r['entry_data']['ProfilePage']['0']['graphql']['user']['edge_follow']['count'])) {
                    $following = $r['entry_data']['ProfilePage']['0']['graphql']['user']['edge_follow']['count'];
                }

                if (!empty($r['entry_data']['ProfilePage']['0']['graphql']['user']['edge_owner_to_timeline_media']['count'])) {
                    $media = $r['entry_data']['ProfilePage']['0']['graphql']['user']['edge_owner_to_timeline_media']['count'];
                }

                $userCollection = $model->getCollection()
                        ->addFieldToFilter('user_name', $username)
                        ->addFieldToFilter('source', $sourceTxt);
                if (!empty($userCollection) && $userCollection->getSize() > 0) {
                    foreach ($userCollection as $user) {
                        $model = Mage::getModel('sma/sma')->load($user->getId());
                    }
                }
                $model->setCustomerId(Mage::getSingleton('customer/session')->getCustomer()->getId());
                $model->setSource($sourceTxt);
                $model->setProfileId($profileId);
                $model->setUserName($username);
                $model->setIsVarified($isVerified);
                $model->setFullName($fullName);
                $model->setProfilePicture($profile_pic_url);
                $model->setProfileDescription($biography);
                $model->setFollowers($followers);
                $model->setFollowing($following);
                $model->setMedia($media);
                $model->setContent($matches[1]);
                $model->setStatus('1');
                $model->setCreatedTime(now());
                $model->setUpdateTime(now());
                try {
                    $model->save();
                    $refererUrl = Mage::getBaseUrl() . 'social-user-details?username=' . $username . '&source=' . $sourceTxt;
                } catch (Exception $ex) {
                    die($ex);
                }
            }

            if ($sourceTxt == 'Tumblr') {
                $arrayTumblrData = array();
                $url = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB) . 'lib/apis/tumblr.php?username=' . $username;
                $content = file_get_contents($url);
                $source = json_decode($content, true);

                if (!empty($source)) {
                    $arrayTumblrData['customer_id'] = Mage::getSingleton('customer/session')->getCustomer()->getId();
                    $arrayTumblrData['source'] = $sourceTxt;
                    $arrayTumblrData['profile_id'] = $source['response']['blog']['uuid'];
                    $arrayTumblrData['user_name'] = $username;
                    $arrayTumblrData['full_name'] = $source['response']['blog']['title'];
                    $arrayTumblrData['profile_picture'] = $source['profile_image'];
                    $arrayTumblrData['profile_description'] = $source['response']['blog']['description'];
                    $arrayTumblrData['tweets'] = '';
                    $arrayTumblrData['followers'] = '';
                    $arrayTumblrData['following'] = '';
                    $arrayTumblrData['media'] = '';
                    $arrayTumblrData['likes'] = $source['response']['blog']['share_likes'];
                    $arrayTumblrData['lists'] = '';
                    $arrayTumblrData['moments'] = '';
                    $arrayTumblrData['custom_url'] = $source['response']['blog']['url'];
                    $arrayTumblrData['subscribers'] = $source['response']['blog']['subscribed'];
                    $arrayTumblrData['comments'] = '';
                    $arrayTumblrData['videos'] = '';
                    $arrayTumblrData['views'] = '';
                    $arrayTumblrData['posts'] = $source['response']['blog']['posts'];
                    $arrayTumblrData['content'] = $content;
                    $arrayTumblrData['status'] = 1;
                    $arrayTumblrData['ask_enabled'] = $source['response']['blog']['ask'];
                    $arrayTumblrData['anon_ask_enabled'] = $source['response']['blog']['ask_anon'];
                    $arrayTumblrData['is_nsfw'] = $source['response']['blog']['is_nsfw'];
                    $arrayTumblrData['adult_content'] = $source['response']['blog']['is_optout_ads'];

                    $userCollection = $model->getCollection()
                            ->addFieldToFilter('user_name', $username)
                            ->addFieldToFilter('source', $sourceTxt);
                    if (!empty($userCollection) && $userCollection->getSize() > 0) {
                        foreach ($userCollection as $user) {
                            $model = Mage::getModel('sma/sma')->load($user->getId());
                        }
                    }
                    foreach ($arrayTumblrData as $key => $value) {
                        $model->setData($key, $value);
                    }
                    $model->setData('created_time', now());
                    $model->setData('update_time', now());
                    try {
                        $model->save();
                        $refererUrl = Mage::getBaseUrl() . 'social-user-details?username=' . $username . '&source=' . $sourceTxt;
                    } catch (Exception $ex) {
                        die($ex);
                    }
                } else {
                    $refererUrl = Mage::getBaseUrl() . 'sma?err=0';
                    //Mage::app()->getFrontController()->getResponse()->setRedirect($url);
                }
            }

            if ($sourceTxt == 'Twitch') {
                $arrayTwitchData = array();
                $url = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB) . 'lib/apis/twitch.php?username=' . $username;
                $content = file_get_contents($url);
                $source = json_decode($content, true);

                if (!empty($source)) {
                    $arrayTwitchData['customer_id'] = Mage::getSingleton('customer/session')->getCustomer()->getId();
                    $arrayTwitchData['source'] = $sourceTxt;
                    $arrayTwitchData['profile_id'] = $source['_id'];
                    $arrayTwitchData['user_name'] = $source['name'];
                    $arrayTwitchData['full_name'] = $source['display_name'];
                    $arrayTwitchData['profile_picture'] = $source['logo'];
                    $arrayTwitchData['profile_description'] = $source['status'];
                    $arrayTwitchData['tweets'] = '';
                    $arrayTwitchData['followers'] = $source['followers'];
                    $arrayTwitchData['following'] = '';
                    $arrayTwitchData['media'] = '';
                    $arrayTwitchData['likes'] = '';
                    $arrayTwitchData['lists'] = '';
                    $arrayTwitchData['subscribers'] = '';
                    $arrayTwitchData['views'] = $source['views'];
                    $arrayTwitchData['videos'] = '';
                    $arrayTwitchData['comments'] = '';
                    $arrayTwitchData['posts'] = '';
                    $arrayTwitchData['custom_url'] = $source['url'];
                    $arrayTwitchData['filename'] = '';
                    $arrayTwitchData['content'] = $content;
                    $arrayTwitchData['status'] = 1;

                    $userCollection = $model->getCollection()
                            ->addFieldToFilter('user_name', $username)
                            ->addFieldToFilter('source', $sourceTxt);
                    if (!empty($userCollection) && $userCollection->getSize() > 0) {
                        foreach ($userCollection as $user) {
                            $model = Mage::getModel('sma/sma')->load($user->getId());
                        }
                    }
                    foreach ($arrayTwitchData as $key => $value) {
                        $model->setData($key, $value);
                    }
                    $model->setData('created_time', now());
                    $model->setData('update_time', now());
                    try {
                        $model->save();
                        $refererUrl = Mage::getBaseUrl() . 'social-user-details?username=' . $username . '&source=' . $sourceTxt;
                    } catch (Exception $ex) {
                        die($ex);
                    }
                } else {
                    $refererUrl = Mage::getBaseUrl() . 'sma?err=0';
                    //Mage::app()->getFrontController()->getResponse()->setRedirect($url);
                }
            }


            $url = $refererUrl;
            Mage::app()->getFrontController()->getResponse()->setRedirect($url);
        } else {
            $url = Mage::getUrl('customer/account/login');
            Mage::app()->getFrontController()->getResponse()->setRedirect($url);
        }
    }

    public function indexAction() {
        //------------------ Account Activity Social Media Audit--------
        $customerId = Mage::getSingleton('customer/session')->getCustomer()->getEntityId();
        $activityHelper = Mage::helper('accountactivity/data');
        $data['activity'] = 'Social Media Audit ';
        $data['sma'] = '1';
        $data['customer_id'] = $customerId;
        $data['created_time'] = now();
        $activityHelper->setUserActivity($data);
        //--------------------------------------------------------------
        $this->loadLayout();
        $this->renderLayout();
    }

    public function deleteProfileAction() {
        $sourceTxt = $_REQUEST['sourceTxt'];
        $username = $_REQUEST['username'];
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            $model = Mage::getModel('sma/sma');
            $userCollection = $model->getCollection()
                    ->addFieldToFilter('user_name', $username)
                    ->addFieldToFilter('source', $sourceTxt)
                    ->addFieldToFilter('customer_id', Mage::getSingleton('customer/session')->getCustomer()->getId());
            if (!empty($userCollection) && $userCollection->getSize() > 0) {
                foreach ($userCollection as $user) {
                    $model = Mage::getModel('sma/sma')->load($user->getId());
                    try {
                        $model->delete();
                    } catch (Exception $ex) {
                        echo $ex;
                        die();
                    }
                }
            }
            $url = Mage::getBaseUrl() . 'sma';
            Mage::app()->getFrontController()->getResponse()->setRedirect($url);
        } else {
            $url = Mage::getUrl('customer/account/login');
            Mage::app()->getFrontController()->getResponse()->setRedirect($url);
        }
    }

}
