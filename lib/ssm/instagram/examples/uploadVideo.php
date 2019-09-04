<?php

ini_set('display_errors', 1);
set_time_limit(0);
umask(0);
error_reporting(E_ALL);
date_default_timezone_set('UTC');

require __DIR__.'/../vendor/autoload.php';

/////// CONFIG ///////
$username = 'masterajib';
$password = '9804915618';
$debug = false;
$truncatedDebug = true;
//////////////////////

/////// MEDIA ////////
$videoFilename = '/var/www/html/lib/ssm/instagram/examples/3539816872.mp4';
$captionText = '';
//////////////////////

$ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);

try {
    $ig->login($username, $password);
} catch (\Exception $e) {
    echo 'Something went wrong: '.$e->getMessage()."\n";
    exit(0);
}

try {
    // Note that all video upload functions perform some automatic chunk upload
    // retries, in case of failing to upload all video chunks to Instagram's
    // server! Uploads therefore take longer when their server is overloaded.

    // If you want to guarantee that the file is valid (correct format, codecs,
    // width, height and aspect ratio), then you can run it through our
    // automatic video processing class. It only does any work when the input
    // video file is invalid, so you may want to always use it. You have nothing
    // to worry about, since the class uses temporary files if the input needs
    // processing, and it never overwrites your original file.
    //
    // Also note that it has lots of options, so read its class documentation!
    $video = new \InstagramAPI\Media\Video\InstagramVideo($videoFilename);
    $result = $ig->timeline->uploadVideo($video->getFile(), ['caption' => $captionText]);
    
    echo "<pre>"; print_r($result);
} catch (\Exception $e) {
    echo 'Something went wrong: '.$e->getMessage()."\n";
}
