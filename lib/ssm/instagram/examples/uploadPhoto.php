<?php
ini_set('display_errors', 1);
set_time_limit(0);
date_default_timezone_set('UTC');

require __DIR__.'/../vendor/autoload.php';

/////// CONFIG ///////
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$debug = false;
$truncatedDebug = false;
//////////////////////

/////// MEDIA ////////
$photoFilename = $_REQUEST['file'];
$captionText = $_REQUEST['captionText'];
//////////////////////

$ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);

try {
    $ig->login($username, $password);
} catch (\Exception $e) {
    echo 'Something went wrong: '.$e->getMessage()."\n";
    exit(0);
}

try {
    $photo = new \InstagramAPI\Media\Photo\InstagramPhoto($photoFilename);
    $result =$ig->timeline->uploadPhoto($photo->getFile(), ['caption' => $captionText]);
} catch (\Exception $e) {
    echo 'Something went wrong: '.$e->getMessage()."\n";
}

$arrResponse = json_decode($result, true);
$postURL = $arrResponse['media']['code'];
echo "<pre>";print_r($postURL);