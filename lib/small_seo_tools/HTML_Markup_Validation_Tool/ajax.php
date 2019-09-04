<?php
error_reporting(0);
set_time_limit(0);

include("functions.php");

$url = trim(strip_tags($_REQUEST['url']));

if (substr($url, 0, 4) != "http") {

    echo "<br /><br /><h3><strong>Please Enter Full Web Page URL Including http://</strong></h3>";
} else {


    $content = file_get_contents_curl('https://validator.w3.org/nu/?doc=' . urlencode($url) . '&out=json');

    $json = json_decode($content, true);
    $errorcount = count($json['messages']);
    if ($errorcount == "0") {
        echo '<h3 style="color: #009900;"><strong>Good News. No errors found!</strong></h3>';
    } else {
        $data = '<h3 style="color: #cc3333;"><strong>Sorry! We found the following errors and warnings (' . $errorcount . ')!</strong></h3>';
        if ($errorcount > "0") {
            $data .= '<div style="border: 1px solid #ccc;margin: 0 auto;padding:10px;width:90%;background-color:#fff;font-size: 16px;color: #000;"><div style="text-align:left;">';
            foreach ($json['messages'] as $value) {
                if ($value['type'] == "error")
                    $data .= '<h3><span style="color: #cc3333;"><strong>Error: </strong></span>' . $value['message'] . '</h3>';
                if ($value['type'] == "info")
                    $data .= '<h3><span style="color: #CCCC00;"><strong>Warning: </strong></span>' . $value['message'] . '</h3>';
                $data .= '<em>From line ' . $value['firstLine'] . ', column ' . $value['firstColumn'] . '; to line ' . $value['lastLine'] . ', column ' . $value['lastColumn'] . '</em><hr />';
            }
            $data .= '</div></div><br />';
        }
        $content = file_get_contents_curl($url);
        $content = str_ireplace('<textarea', '&lt;textarea', $content);
        $content = str_ireplace('</textarea>', '&lt;/textarea&gt;', $content);
        $data .= '<h3><strong>HTML Source Code</strong></h3><textarea id="linedtextarea" style="width: 100%; height: 600px;">' . $content . '</textarea><br />';
        echo $data . '<br /><br />';
    }
}
?>
<script>
    $(function () {
        $("#linedtextarea").linedtextarea();
    });
</script>