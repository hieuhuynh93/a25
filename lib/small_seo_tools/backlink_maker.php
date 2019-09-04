<?php

error_reporting(0);
@ini_set('display_errors', 0);

require_once 'all_functions.php';

$html = '';
if (isset($_REQUEST['url'])) {
        $url = raino_trim($_REQUEST['url']);
        $dblinks = @file_get_contents('http://socicos.com/lib/small_seo_tools/backlink.txt');
        
        $arr = explode(" ", $dblinks);
        for ($i = 0; $i < count($arr); $i++) {
            $arr[$i] = str_replace('{host}', $url, $arr[$i]);
        }
    }

    
    for ($i = 0; $i < count($arr); $i++) {
        $html .= '<tr>';
        $html .= '<td>' . ($i + 1) . '</td>';
        $html .= '<td><a href="' . $arr[$i] . '" target="_blank">' . $arr[$i] . '</a></td>';
        if (checkURL($arr[$i]) >= 1) {
            $html .= '<td><span class="badge badge-success">SUCCESS</span></td>';
        } else {
            $html .= '<td><span class="badge badge-pill badge-danger float-right mt-1">ERROR</span></td>';
        }
        $html .= '</tr>';
    }

    $arrErrorCode = array('400', '401', '402', '403', '404', '405', '406', '407', '408', '409', '410', '411', '412', '413', '414', '415', '416', '417', '417', '421', '422', '423', '424', '500', '501', '502', '503', '504', '505', '506', '507', '508', '510');

    function checkURL($url) {
        $status = 0;
        $handle = curl_init($url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);

        /* Get the HTML or whatever is linked in $url. */
        $response = curl_exec($handle);

        /* Check for 404 (file not found). */
        $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        if (!in_array($httpCode, $arrErrorCode)) {
            $status = 1;
        }
        curl_close($handle);
        return $status;
    }

echo $html;
?>