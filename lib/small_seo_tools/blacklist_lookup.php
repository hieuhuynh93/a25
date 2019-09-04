<?php
include_once 'all_functions.php';

$htmlTabData = '';
$count = 1;
if (isset($_REQUEST['url'])) {
    $my_url = raino_trim(clean_url($_REQUEST['url']));
    $my_url = "https://" . ($my_url);
    if (filter_var($my_url, FILTER_VALIDATE_URL) === false) {
        $error = 'Error';
    } else {
        $regUserInput = $my_url;
        $my_url = parse_url($my_url);
        $host = $my_url['host'];
        $getHostIP = gethostbyname($host);
        $myHost = ucfirst(str_replace('www.', '', $host));
        $dataArr = dnsblookup($getHostIP);
        $outArr = $dataArr[0];
        $overAll = $dataArr[1];
        if($overAll == 1){
            $overAll = "Listed";
        }else{
            $overAll = "Not Listed";
        }
    }
    foreach($outArr as $outData){
        $listedStatus = '<span class="badge badge-success">NOT LISTED</span>';
        if($outData[1] == 1){
            $listedStatus = '<span class="badge badge-pill badge-danger float-right mt-1">LISTED</span>';
        }
        $htmlTabData .= '<tr><td>'.$count.'</td><td>'.$outData[0].'</td><td>'.$listedStatus.'</td></tr>';
        $count++;
    }
}

echo json_encode(array('htmlTabData' => $htmlTabData, 'ip' => $getHostIP, 'host'=>$myHost, 'overall'=>$overAll));
?>
