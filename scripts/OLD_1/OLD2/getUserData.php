<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include './php_graph_sdk_5/src/Facebook/autoload.php';
include './php_graph_sdk_5/src/Facebook/Facebook.php';

$fbAppId = '2880546805503027';
$fbAppSecrate = '9b2f4eb0d80faaf9346f159e2295cc70';

session_start();
$fb = new Facebook\Facebook([
  'app_id' => $fbAppId, // Replace {app-id} with your app id
  'app_secret' => $fbAppSecrate,
  'default_graph_version' => 'v3.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://www.socicos.com/scripts/fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';