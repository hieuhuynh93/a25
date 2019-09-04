<?php
ini_set('display_errors', 1);
set_time_limit(0);
umask(0);
error_reporting(E_ALL);
require('../../../app/Mage.php');
Mage::init();
Mage::setIsDeveloperMode(true);
Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);

$customUserId = '15';
$modelUser = Mage::getModel('influencerusers/influencerusers')->load($customUserId);

$location = "Kolkata";
$key = "AIzaSyDWYiC8d3En8KBRr_hK7ZvhwOSRJItJAgU";
$map_url = 'https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($location)."&key=".$key;
	
$map_json = file_get_contents($map_url);
$map_array = json_decode($map_json,true);

echo "<pre>"; print_r($map_array);
	
$lat = $map_array['results'][0]['geometry']['location']['lat'];
$lng = $map_array['results'][0]['geometry']['location']['lng'];