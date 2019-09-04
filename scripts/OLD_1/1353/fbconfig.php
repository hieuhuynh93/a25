<?php

session_start();
// added in v4.0.0
require_once 'autoload.php';

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;

// init app with app id and secret
FacebookSession::setDefaultApplication('1040833052781232', 'aa7a60d19ca2115efe0254153ef992e8');
// login helper with redirect_uri
$helper = new FacebookRedirectLoginHelper('https://www.socicos.com/scripts/1353/fbconfig.php');
try {
    $session = $helper->getSessionFromRedirect();
} catch (FacebookRequestException $ex) {
    // When Facebook returns an error
} catch (Exception $ex) {
    // When validation fails or other local issues
}
// see if we have a session
if (isset($session)) {
    // graph api request for user data
    $request = new FacebookRequest($session, 'GET', '/me?fields=name,email');
    $response = $request->execute();
    // get response
    $graphObject = $response->getGraphObject();

    $arrDataCustom = $response;

    $fbid = $graphObject->getProperty('id');              // To Get Facebook ID
    $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
    $femail = $graphObject->getProperty('email');    // To Get Facebook email ID
    /* ---- Session Variables ----- */
    //-------------------------------------
    //echo "<pre>"; print_r($response); die();
    //------------------------------------
    $_SESSION['FBID'] = $fbid;
    $_SESSION['FULLNAME'] = $fbfullname;
    $_SESSION['EMAIL'] = $femail;
    $_SESSION['PROFILE_PIC'] = 'https://graph.facebook.com/' . $fbid . '/picture';
    $_SESSION['ACCESS_TOKEN'] = $session->getToken();
    /* ---- header location after session ---- */
    header("Location: https://www.socicos.com/index.php/influencerusers/index/getFbData?data=" . json_encode($_SESSION));
} else {
    $loginUrl = $helper->getLoginUrl();
    header("Location: " . $loginUrl);
}
?>