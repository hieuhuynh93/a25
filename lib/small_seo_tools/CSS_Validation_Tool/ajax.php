<?php

error_reporting(0);
set_time_limit(0);

include("functions.php");

$url = trim(strip_tags($_REQUEST['url']));

if (substr($url, 0, 4) != "http") {

    echo "<br /><br /><h3><strong>Please Enter Full Web Page URL Including http://</strong></h3>";
} else {


    $content = file_get_contents_curl('https://jigsaw.w3.org/css-validator/validator?uri=' . urlencode($url) . '&warning=1&profile=css3&output=json');

    $json = json_decode($content, true);
    $errorcount = $json['cssvalidation']['result']['errorcount'];
    $warningcount = $json['cssvalidation']['result']['warningcount'];
    if ($errorcount == "0" && $warningcount == "0") {
        echo '<h3 style="color: #009900;"><strong>Good News. No errors found!</strong></h3>';
    } else {
        $data = '<h3 style="color: #cc3333;"><strong>Sorry! We found the following errors (' . $errorcount . ') and warnings (' . $warningcount . ')!</strong></h3>';
        $data .= '<div class="row">';
        if ($errorcount > "0") {
            //$data .= '<h3><strong>Errors (' . $errorcount . ')</strong></h3><div style="border: 1px solid #ccc;margin: 0 auto;padding:10px;width:90%;background-color:#fff;font-size: 16px;color: #000;"><div style="text-align:left;">';
            $data .= '<h3 style="width:100%"><strong>Errors (' . $errorcount . ')</strong></h3>';
            foreach ($json['cssvalidation']['errors'] as $value) {
                $data .= '<div class="col-md-3 mb-10">
                        <div class="card" style="height:250px; overflow:auto;">
                            <div class="card-body">';
                $data .= '<strong>Source:</strong> <a href="' . $value['source'] . '" target="_blank">' . truncate($value['source'], "80", "...") . '</a>
                        <br /><strong>Line:</strong> ' . $value['line'] . '<br /><strong>Context:</strong> ' . $value['context'] . '
                        <br /><strong>Type:</strong> ' . $value['type'] . '<br /><strong>Message:</strong> ' . $value['message'] . '</p>';
                $data .=    '</div></div></div>';
            }                    
            $data .= '<hr>';
            //$data .= '</div></div><br />';
        }

        if ($warningcount > "0") {
            //$data .= '<h3><strong>Warnings (' . $warningcount . ')</strong></h3><div style="border: 1px solid #ccc;margin: 0 auto;padding:10px;width:90%;background-color:#fff;font-size: 16px;color: #000;"><div style="text-align:left;">';
            $data .= '<h3 style="width:100%"><strong>Warnings (' . $warningcount . ')</strong></h3>';
            foreach ($json['cssvalidation']['warnings'] as $value) {
                $data .= '<div class="col-md-3 mb-10">
                        <div class="card">
                            <div class="card-body">';
                $data .= '<strong>Source:</strong> <a href="' . $value['source'] . '" target="_blank">' . truncate($value['source'], "80", "...") . '</a>
                        <br /><strong>Line:</strong> ' . $value['line'] . '<br /><strong>Level:</strong> ' . $value['level'] . '
                        <br /><strong>Type:</strong> ' . $value['type'] . '<br /><strong>Message:</strong> ' . $value['message'] . '</p>';
                $data .=    '</div></div></div>';
            }
            //$data .= '</div></div><br />';
        }
        echo $data . '</div><br /><br />';
    }
}
?>
