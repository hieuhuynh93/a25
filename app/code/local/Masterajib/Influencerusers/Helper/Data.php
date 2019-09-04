<?php

class Masterajib_Influencerusers_Helper_Data extends Mage_Core_Helper_Abstract {
    
    
    
    public function getFacebookCredentials(){
        $arr = array();
        $arr['app_id'] = '1040833052781232';
        $arr['client_secrate'] = 'aa7a60d19ca2115efe0254153ef992e8';
        return $arr;
    }

    public function getIntagramCredentials() {
        $arr['INSTAGRAM_CLIENT_ID'] = 'f521c76955034e27803ff2a8a0c6ed46';
        $arr['INSTAGRAM_CLIENT_SECRET'] = '230772372bc34a6f8483330469e4a5d5';
        $arr['INSTAGRAM_REDIRECT_URI'] = Mage::getBaseUrl() . 'influencerusers/index/instagramCallback';

        return $arr;
    }

    public function GetAccessToken($client_id, $redirect_uri, $client_secret, $code) {
        $url = 'https://api.instagram.com/oauth/access_token';

        $curlPost = 'client_id=' . $client_id . '&redirect_uri=' . $redirect_uri . '&client_secret=' . $client_secret . '&code=' . $code . '&grant_type=authorization_code';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
        $data = json_decode(curl_exec($ch), true);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($http_code != '200')
            throw new Exception('Error : Failed to receieve access token');

        return $data['access_token'];
    }

    public function GetUserProfileInfo($access_token) {
        $url = 'https://api.instagram.com/v1/users/self/?access_token=' . $access_token;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $data = json_decode(curl_exec($ch), true);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($data['meta']['code'] != 200 || $http_code != 200)
            throw new Exception('Error : Failed to get user information');

        return $data['data'];
    }

}
