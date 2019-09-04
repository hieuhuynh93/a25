<?php
require_once 'all_functions.php';

if (isset($_REQUEST['url'])) {
    $url = clean_url(raino_trim($_REQUEST['url']));
    $url = 'https://' . $url;
    $strategyd = 'desktop';
    $strategym = 'mobile';
    $apiReqUrl = 'https://www.googleapis.com/pagespeedonline/v2/runPagespeed';
    $apiKey = 'AIzaSyD1wnxAppbj-riwtLtkTx-jzP-YQkvPsvw';
    $curl1 = curl_init();
    curl_setopt($curl1, CURLOPT_URL, $apiReqUrl . '?url=' . urlencode($url) . '&key=' . $apiKey . '&screenshot=true&strategy=' . $strategyd);
    curl_setopt($curl1, CURLOPT_RETURNTRANSFER, TRUE);
    $result = curl_exec($curl1);
    $data1 = json_decode($result, true);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $apiReqUrl . '?url=' . urlencode($url) . '&key=' . $apiKey . '&screenshot=true&strategy=' . $strategym);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    $result = curl_exec($curl);
    $data = json_decode($result, true);
    $img1 = str_replace(array('_', '-'), array('/', '+'), $data1['screenshot']['data']);
    $img = str_replace(array('_', '-'), array('/', '+'), $data['screenshot']['data']);
}
?>
<table class='table'>
    <tr><th>Desktop Screenshot</th></tr>
    <tr><td><img src='data:image/jpeg;base64,<?php echo $img1; ?>' alt='Desktop Screenshot' class='img-fluid' style='width:80%;height:60%;border: 2px solid lightgray;'></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><th>Mobile Screenshot</th></tr>
    <tr><td><img src='data:image/jpeg;base64,<?php echo $img; ?>' alt='Mobile Screenshot' class='img-fluid' style='border: 2px solid lightgray;'></td></tr>
</table>