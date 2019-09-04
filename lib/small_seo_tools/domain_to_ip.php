<?php
require_once 'all_functions.php';

$htmlResult = '';

if (isset($_REQUEST['url'])) {
    $my_url8 = raino_trim($_REQUEST['url']);
    $my_url8 = "https://" . clean_url($my_url8);
    if (filter_var($my_url8, FILTER_VALIDATE_URL) === false) {
        $error = 'Error';
    } else {
        $regUserInput = $my_url8;
        $my_url8 = parse_url($my_url8);
        $host = $my_url8['host'];
        $myHost = ucfirst($host);
        $getHostIP = gethostbyname($host);
        $data_list = host_info($host);
        $domain_ip = $data_list[0];
        $domain_country = $data_list[1];
        $domain_isp = $data_list[2];
    }
}

$htmlResult = '<tr>
                    <td>'.$myHost.'</td>
                    <td>'.$getHostIP.'</td>
                    <td>'.$domain_country.'</td>
                    <td>'.$domain_isp.'</td>
                </tr>';

echo $htmlResult;
?>         
