<?php

include('cache.inc.php');

function beliefmedia_youtube_channel_data($channel = 'UCt3icFXZXR2SaUX6kV16u2g', $type = 'views', $cache = '14400') {
    $arrResults = array();
    /* API Key */
    $apikey = 'AIzaSyByvI8Tb3nTv6J07n1gLnli2oxHhj12ZBU';

    /* Get transient data */
    $transient = 'youtube_channel_data_' . md5(serialize(func_get_args()));
    $response = beliefmedia_get_transient($transient, $cache);

    if ($response !== false) {

        return number_format($response["$type"]);
    } else {

        $json_string = @file_get_contents('https://www.googleapis.com/youtube/v3/channels?part=statistics,snippet,contentDetails&id=' . $channel . '&key=' . $apikey);
        if ($json_string !== false)
            $json = json_decode($json_string, true);
        if(!empty($json) && count($json) >= 1){
            $arrResults['profile_id'] = $json['items'][0]['id'];
            $arrResults['user_name'] = $json['items'][0]['id'];
            $arrResults['full_name'] = $json['items'][0]['snippet']['title'];
            $arrResults['profile_picture'] = $json['items'][0]['snippet']['thumbnails']['high']['url'];
            $arrResults['profile_description'] = $json['items'][0]['snippet']['description'];
            $arrResults['subscribers'] = $json['items'][0]['statistics']['subscriberCount'];
            $arrResults['views'] = $json['items'][0]['statistics']['viewCount'];
            $arrResults['videos'] = $json['items'][0]['statistics']['videoCount'];
            $arrResults['comments'] = $json['items'][0]['statistics']['commentCount'];
            $arrResults['url'] = $json['items'][0]['snippet']['customUrl'];
        }
    }
    return $arrResults;
}

$chanelId = $_REQUEST['channel_id'];
echo json_encode(beliefmedia_youtube_channel_data($chanelId));
