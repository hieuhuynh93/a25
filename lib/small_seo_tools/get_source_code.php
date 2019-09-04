<?php

require_once 'all_functions.php';

$my_url = raino_trim($_REQUEST['url']);
$my_url = clean_url($my_url);
$my_url = "https://$my_url";
if (filter_var($my_url, FILTER_VALIDATE_URL) === false) {
    $error = 'Error';
} else {
    $regUserInput = $my_url;
    $outData = curlGET($my_url);
}
if (isset($_REQUEST['url'])) {

    echo htmlspecialchars($outData);
}  
?>

