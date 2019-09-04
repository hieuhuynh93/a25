<?php
require_once 'all_functions.php';

if (isset($_REQUEST['url']))
    $my_url = raino_trim($_REQUEST['url']);
$my_url = clean_url($my_url);
$my_url = "https://$my_url";
if (filter_var($my_url, FILTER_VALIDATE_URL) === false) {
    $error = 'Invalid URL';
} else {
    $regUserInput = $my_url;
    $pageData = curlGET($my_url);
    if (!empty($pageData)) {
        $arr_res = calTextRatio($pageData);
        $orglen = $arr_res[0];
        $textlen = $arr_res[1];
        $per = $arr_res[2];
    } else {
        $error = 'Error';
    }
}
?>
<div style="text-align: center;">
    <h4><?php echo 'Code to Text Ratio is'; ?></h4>
    <h3 style="color:red"><?php echo substr($per, 0, 4); ?>%</h3>
    <br />
    <h5><?php echo 'Text Content Size'; ?>: <?php echo $textlen; ?> bytes<br />
        <?php echo 'Total HTML Size'; ?>: <?php echo $orglen; ?> bytes </h5>
</div>