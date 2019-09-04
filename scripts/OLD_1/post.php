<?php

ini_set('display_errors', 1);
set_time_limit(0);
umask(0);
error_reporting(E_ALL);
require('../app/Mage.php');
Mage::init();
Mage::setIsDeveloperMode(true);
Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);

$arr['INSTAGRAM_CLIENT_ID'] = 'f521c76955034e27803ff2a8a0c6ed46';
$arr['INSTAGRAM_CLIENT_SECRET'] = '230772372bc34a6f8483330469e4a5d5';
$arr['INSTAGRAM_ID'] = '8438775230';
$arr['USERNAME'] = 'masterajib';
$arr['PASSWORD'] = '9804915618';
$arr['ACCESS_TOKEN'] = '8438775230.f521c76.ebaa3e1dd0a84a40ac19d0bd3bf2f74f';

 /*$modelCollection = Mage::getModel('influencerusers/influencerusers')
                    ->getCollection()
                    ->addFieldToFilter('platform', '2'); 

echo "<pre>"; print_r($modelCollection->getData()); die();*/

include_once("instagram-photo-video-upload-api.class.php");

// Upload Photo
$obj = new InstagramUpload();
$obj->Login($arr['USERNAME'], $arr['PASSWORD']);
$obj->UploadPhoto("/var/www/html/scripts/acuvuevita_f.jpg", "Test Upload");

// Upload Video
/*$obj = new InstagramUpload();
$obj->Login("YOUR_IG_USERNAME", "YOUR_IG_PASSWORD");
$obj->UploadVideo("test-video.mp4", "square-thumb.jpg", "Test Upload Video From PHP");*/
?>