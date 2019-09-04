<?php
/*
session_start();
include "instaClass.php";

if(!isset($_GET['code'])){
 header('location: index.php');
}

$obj_insta = new instaClass();

// Set access token
$obj_insta->setAccess_token($_GET['code']);

// Get user details
$result = $obj_insta->getUserDetails();

//$_SESSION['insta_login'] = $result;

//header('location: home.php');

echo "<pre>"; print_r($result);*/


session_start();

// Instagram passes a parameter 'code' in the Redirect Url
if (isset($_GET['code'])) {
    try {
        $instagram_ob = new InstagramApi();

        // Get the access token 
        $access_token = $instagram_ob->GetAccessToken(INSTAGRAM_CLIENT_ID, INSTAGRAM_REDIRECT_URI, INSTAGRAM_CLIENT_SECRET, $_GET['code']);

        // Get user information
        $user_info = $instagram_ob->GetUserProfileInfo($access_token);

        echo '<pre>';
        print_r($user_info);
        echo '</pre>';

        // Now that the user is logged in you may want to start some session variables
        $_SESSION['logged_in'] = 1;

        // You may now want to redirect the user to the home page of your website
        // header('Location: home.php');
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
}

function GetAccessToken($client_id, $redirect_uri, $client_secret, $code) {		
	$url = 'https://api.instagram.com/oauth/access_token';
	
	$curlPost = 'client_id='. $client_id . '&redirect_uri=' . $redirect_uri . '&client_secret=' . $client_secret . '&code='. $code . '&grant_type=authorization_code';
	$ch = curl_init();		
	curl_setopt($ch, CURLOPT_URL, $url);		
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);		
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);			
	$data = json_decode(curl_exec($ch), true);	
	$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);	
	curl_close($ch); 		
	if($http_code != '200')			
		throw new Exception('Error : Failed to receieve access token');
	
	return $data['access_token'];	
}

function GetUserProfileInfo($access_token) { 
	$url = 'https://api.instagram.com/v1/users/self/?access_token=' . $access_token;	

	$ch = curl_init();		
	curl_setopt($ch, CURLOPT_URL, $url);		
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);	
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	$data = json_decode(curl_exec($ch), true);
	$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);	
	curl_close($ch); 
	if($data['meta']['code'] != 200 || $http_code != 200)
		throw new Exception('Error : Failed to get user information');

	return $data['data'];
}
