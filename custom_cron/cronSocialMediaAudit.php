<?php

ini_set('display_errors', 1);
set_time_limit(0);
$msg = '';
require('/var/www/html/app/Mage.php');
Mage::init();
Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);

$modelCollection = Mage::getModel('sma/sma')
        ->getCollection();
//->addFieldToFilter('status', 1);

foreach ($modelCollection as $user) {

    $source = $user->getSource();
    $user_name = $user->getUserName();
    if ($source == 'Instagram') {
        $dataArrInstagram = getDataInstagram($user_name);
        $dataArrInstagram['customer_id'] = $user->getCustomerId();
        setDataInstagram($dataArrInstagram);
    }
    if ($source == 'Twitter') {
        $dataArrTwitter = getDataTwitter($user_name);
        $dataArrTwitter['customer_id'] = $user->getCustomerId();
        setDataTwitter($dataArrTwitter);
    }
    if ($source == 'Twitch') {
        $dataArrTwitch = getDataTwitch($user_name);
        $dataArrTwitch['customer_id'] = $user->getCustomerId();
        setDataTwitch($dataArrTwitch);
    }
    if ($source == 'Youtube') {
        $dataArrYoutube = getDataYoutube($user_name);
        $dataArrYoutube['customer_id'] = $user->getCustomerId();
        setDataYoutube($dataArrYoutube);
    }
    if ($source == 'Tumblr') {
        $dataArrTumblr = getDataTumblr($user_name);
        $dataArrTumblr['customer_id'] = $user->getCustomerId();
        setDataTumblr($dataArrTumblr);
    }
}

function getDataTwitter($username) {
    $dataResult = array();
    $dataResult['username'] = $username;
    $url = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB) . 'lib/apis/twitter.php?username=' . $username;
    $content = file_get_contents($url);
    $source = json_decode($content, true);
    if (!empty($source)) {
        $dataResult['followers'] = $source['followers_count'];
        $dataResult['following'] = $source['friends_count'];
        $dataResult['tweets'] = $source['statuses_count'];
    }
    return $dataResult;
}

function setDataTwitter($arrData) {
    $resource = Mage::getSingleton('core/resource');
    $readConnection = $resource->getConnection('core_read');
    $writeConnection = $resource->getConnection('core_write');
    //--------------------------------------------------------
    $query = "SELECT * FROM `sma_crontab` WHERE (user_name='" . $arrData['username'] . "' AND source='Twitter') AND (created_at='" . explode(" ", now())[0] . "' AND `customer_id`=" . $arrData['customer_id'] . ");";
    $results = $readConnection->fetchAll($query);
    //--------------------------------------------------------
    if (empty($results) && count($results) <= 0) {
        if (!empty($arrData)) {
            $query = "INSERT INTO `sma_crontab` (`sma_crontab_id`, `customer_id`, `source`, `user_name`, `followers`, `following`, `tweets`, `created_at`) VALUES (NULL, '" . $arrData['customer_id'] . "', 'Twitter', '" . $arrData['username'] . "', '" . $arrData['followers'] . "', '" . $arrData['following'] . "', '" . $arrData['tweets'] . "', '" . explode(" ", now())[0] . "');";
            try {
                $writeConnection->query($query);
            } catch (Exception $ex) {
                echo $ex;
                die();
            }
        }
    }
}

function getDataTwitch($username) {
    $dataResult = array();
    $dataResult['username'] = $username;
    $url = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB) . 'lib/apis/twitch.php?username=' . $username;
    $content = file_get_contents($url);
    $source = json_decode($content, true);
    if (!empty($source)) {
        $dataResult['followers'] = $source['followers'];
        $dataResult['posts'] = 0;
        $dataResult['views'] = $source['views'];
    }
    return $dataResult;
}

function setDataTwitch($arrData) {
    $resource = Mage::getSingleton('core/resource');
    $readConnection = $resource->getConnection('core_read');
    $writeConnection = $resource->getConnection('core_write');
    //--------------------------------------------------------
    $query = "SELECT * FROM `sma_crontab` WHERE (user_name='" . $arrData['username'] . "' AND source='Twitch') AND (created_at='" . explode(" ", now())[0] . "' AND `customer_id`=" . $arrData['customer_id'] . ");";
    $results = $readConnection->fetchAll($query);
    //--------------------------------------------------------
    if (empty($results) && count($results) <= 0) {
        if (!empty($arrData)) {
            $query = "INSERT INTO `sma_crontab` (`sma_crontab_id`, `customer_id`, `source`, `user_name`, `followers`, `posts`, `views`, `created_at`) VALUES (NULL, '" . $arrData['customer_id'] . "', 'Twitch', '" . $arrData['username'] . "', '" . $arrData['followers'] . "', '" . $arrData['posts'] . "', '" . $arrData['views'] . "', '" . explode(" ", now())[0] . "');";
            try {
                $writeConnection->query($query);
            } catch (Exception $ex) {
                echo $ex;
                die();
            }
        }
    }
}

function getDataYoutube($username) {
    $dataResult = array();
    $dataResult['username'] = $username;
    $url = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB) . 'lib/apis/youtube.php?channel_id=' . $username;
    $content = file_get_contents($url);
    $source = json_decode($content, true);
    if (!empty($source)) {
        $dataResult['subscribers'] = $source['subscribers'];
        $dataResult['views'] = $source['views'];
        $dataResult['videos'] = $source['videos'];
        $dataResult['comments'] = $source['comments'];
    }
    return $dataResult;
}

function setDataYoutube($arrData) {
    $resource = Mage::getSingleton('core/resource');
    $readConnection = $resource->getConnection('core_read');
    $writeConnection = $resource->getConnection('core_write');
    //--------------------------------------------------------
    $query = "SELECT * FROM `sma_crontab` WHERE (user_name='" . $arrData['username'] . "' AND source='Youtube') AND (created_at='" . explode(" ", now())[0] . "' AND `customer_id`=" . $arrData['customer_id'] . ");";
    $results = $readConnection->fetchAll($query);
    //--------------------------------------------------------
    if (empty($results) && count($results) <= 0) {
        if (!empty($arrData)) {
            $query = "INSERT INTO `sma_crontab` (`sma_crontab_id`, `customer_id`, `source`, `user_name`, `subscribers`, `views`, `videos`, `comments`, `created_at`) VALUES (NULL, '" . $arrData['customer_id'] . "', 'Youtube', '" . $arrData['username'] . "', '" . $arrData['subscribers'] . "', '" . $arrData['views'] . "', '" . $arrData['videos'] . "', '" . $arrData['comments'] . "', '" . explode(" ", now())[0] . "');";
            try {
                $writeConnection->query($query);
            } catch (Exception $ex) {
                echo $ex;
                die();
            }
        }
    }
}

function getDataTumblr($username) {
    $dataResult = array();
    $dataResult['username'] = $username;
    $url = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB) . 'lib/apis/tumblr.php?username=' . $username;
    $content = file_get_contents($url);
    $source = json_decode($content, true);
    if (!empty($source)) {
        $dataResult['posts'] = $source['subscribers'];
        //$dataResult['views'] = $source['views'];
        //$dataResult['videos'] = $source['videos'];
        //$dataResult['comments'] = $source['comments'];
    }
    return $dataResult;
}

function setDataTumblr($arrData) {
    $resource = Mage::getSingleton('core/resource');
    $readConnection = $resource->getConnection('core_read');
    $writeConnection = $resource->getConnection('core_write');
    //--------------------------------------------------------
    $query = "SELECT * FROM `sma_crontab` WHERE (user_name='" . $arrData['username'] . "' AND source='Tumblr') AND (created_at='" . explode(" ", now())[0] . "' AND `customer_id`=" . $arrData['customer_id'] . ");";
    $results = $readConnection->fetchAll($query);
    //--------------------------------------------------------
    if (empty($results) && count($results) <= 0) {
        if (!empty($arrData)) {
            $query = "INSERT INTO `sma_crontab` (`sma_crontab_id`, `customer_id`, `source`, `user_name`, `posts`, `created_at`) VALUES (NULL, '" . $arrData['customer_id'] . "', 'Tumblr', '" . $arrData['username'] . "', '" . $arrData['posts'] . "', '" . explode(" ", now())[0] . "');";
            try {
                $writeConnection->query($query);
            } catch (Exception $ex) {
                echo $ex;
                die();
            }
        }
    }
}

function getDataInstagram($username) {
    $url = 'https://www.instagram.com/' . $username;
    $source = file_get_contents($url);
    $dataResult = array();
    $dataResult['username'] = $username;
    preg_match('/<script type="text\/javascript">window\._sharedData =([^;]+);<\/script>/', $source, $matches);
    if (!isset($matches[1]))
        return false;
    $r = json_decode($matches[1], true);

    if (!empty($r['entry_data']['ProfilePage']['0']['graphql']['user']['edge_followed_by']['count'])) {
        $followers = $r['entry_data']['ProfilePage']['0']['graphql']['user']['edge_followed_by']['count'];
        $dataResult['followers'] = $followers;
    }

    if (!empty($r['entry_data']['ProfilePage']['0']['graphql']['user']['edge_follow']['count'])) {
        $following = $r['entry_data']['ProfilePage']['0']['graphql']['user']['edge_follow']['count'];
        $dataResult['following'] = $following;
    }

    if (!empty($r['entry_data']['ProfilePage']['0']['graphql']['user']['edge_owner_to_timeline_media']['count'])) {
        $media = $r['entry_data']['ProfilePage']['0']['graphql']['user']['edge_owner_to_timeline_media']['count'];
        $dataResult['media'] = $media;
    }
    return $dataResult;
}

function setDataInstagram($arrData) {
    $resource = Mage::getSingleton('core/resource');
    $readConnection = $resource->getConnection('core_read');
    $writeConnection = $resource->getConnection('core_write');
    //--------------------------------------------------------
    $query = "SELECT * FROM `sma_crontab` WHERE (user_name='" . $arrData['username'] . "' AND source='Instagram') AND (created_at='" . explode(" ", now())[0] . "' AND `customer_id`=" . $arrData['customer_id'] . ");";
    $results = $readConnection->fetchAll($query);
    //--------------------------------------------------------
    if (empty($results) && count($results) <= 0) {
        if (!empty($arrData)) {
            $query = "INSERT INTO `sma_crontab` (`sma_crontab_id`, `customer_id`, `source`, `user_name`, `followers`, `following`, `media`, `created_at`) VALUES (NULL, '" . $arrData['customer_id'] . "', 'Instagram', '" . $arrData['username'] . "', '" . $arrData['followers'] . "', '" . $arrData['following'] . "', '" . $arrData['media'] . "', '" . explode(" ", now())[0] . "');";
            try {
                $writeConnection->query($query);
            } catch (Exception $ex) {
                echo $ex;
                die();
            }
        }
    }
}

echo "Script Successfully Executed...";
?>