<?php
ini_set('display_errors', 1);
set_time_limit(0);
umask(0);
error_reporting(E_ALL);
require('../app/Mage.php');
Mage::init();
Mage::setIsDeveloperMode(true);
Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);

$key = 'cricket';

$helper = Mage::helper('linkanalysis/data');

$urls = $helper->getKeywordSearchUrl($key);

echo "<pre>"; print_r($urls);

/*
ini_set('display_errors', 1);
set_time_limit(0);

$apiKey = 'AIzaSyCwK41nj0NjyFXaSEaLcJh27qLsGW4ORpQ';
$key = 'cricket';

function file_get_contents_curl($url) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser.
    curl_setopt($ch, CURLOPT_URL, $url);

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}

$query = $key;
$url = 'http://www.google.co.in/search?q=' . urlencode($query) . '&num=100';
$body = file_get_contents_curl($url);

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
echo "<pre>"; print_r($html);*/


