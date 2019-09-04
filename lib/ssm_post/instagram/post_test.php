<?php


ini_set('display_errors', 1);
set_time_limit(0);
umask(0);
error_reporting(E_ALL);
require('../../../app/Mage.php');
Mage::init();
Mage::setIsDeveloperMode(true);
Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);

include_once("instagram-photo-video-upload-api.class.php");

$customUserId = '15';
$modelUser = Mage::getModel('influencerusers/influencerusers')->load($customUserId);
//echo "<pre>"; print_r($modelUser->getData()); die();

$arr['USERNAME'] = $modelUser->getUsername();
$arr['PASSWORD'] = $modelUser->getPassword();
$arr['ACCESS_TOKEN'] = $modelUser->getAuthorizedKey();

$captiontxt = 'Test - 1';

/* $modelCollection = Mage::getModel('influencerusers/influencerusers')
  ->getCollection()
  ->addFieldToFilter('platform', '2');

  echo "<pre>"; print_r($modelCollection->getData()); die(); */



$file = '/var/www/html/lib/ssm_post/instagram/acuvuevita_f.jpg';

$obj = new InstagramUpload();
$obj->Login($arr['USERNAME'], $arr['PASSWORD']);
$result = $obj->story->UploadPhoto($file, $captiontxt);

echo "<pre>"; print_r($result);
?>