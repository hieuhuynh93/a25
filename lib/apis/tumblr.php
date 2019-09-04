<?php


$username = $_REQUEST['username'];
$key = 'CSmuqUpzL3jmxdz3MsFTZtX0CeeM9VQOweQ9LSxwIecvzMy6km';
$secret = 'JpdHSxqoKdLAI3cDxrMGorpExGoIPL9JeVqLFgCph0U9HNYqtb';
$token = '8nemsDN4ZpYWFqbgv6FKtW1OzHpDhP2Y3m8nOmOd8ZkNf35AXS';
$token_secret = 'RSCUHPDrxy25YpcCKCOT6JetH0BbddAPHPFDPrLIBjoESzvv5l';

$profileImage = @file_get_contents('https://api.tumblr.com/v2/blog/'.$username.'/avatar/512');
$responseData = json_decode(@file_get_contents('https://api.tumblr.com/v2/blog/'.$username.'/info?api_key=' . $key), true);
$responseData['profile_image'] = "https://api.tumblr.com/v2/blog/".$username."/avatar/512";

echo json_encode($responseData);
?>