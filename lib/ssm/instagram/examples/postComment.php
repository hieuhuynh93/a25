<?php

ini_set('display_errors', 1);
set_time_limit(0);
umask(0);
error_reporting(E_ALL);
require('/var/www/html/app/Mage.php');

require __DIR__ . '/../vendor/autoload.php';

date_default_timezone_set('UTC');

$username = 'masterajib';
$password = '9804915618';
//$debug = true;
$debug = false;
$truncatedDebug = false;
$ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);
try {
    $ig->login($username, $password);
    
    $ig->media->comment("2047630749918005153" , "Nice");
    
} catch (\Exception $e) {
    echo 'Something went wrong: ' . $e->getMessage() . "\n";
    exit(0);
}
?>