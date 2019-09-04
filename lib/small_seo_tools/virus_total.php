<?php
require_once 'all_functions.php';

if (isset($_REQUEST['url'])) {
    $api_key = 'ee3f31435c433669f0229b456c24e119cacd4dd708f32d36964b8bbf17aad05d';
    $scan_url = 'https://www.' . clean_url(strtolower($_REQUEST['url']));

    $post = array('apikey' => $api_key, 'resource' => $scan_url);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.virustotal.com/vtapi/v2/url/report');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_VERBOSE, 1); // remove this if your not debugging
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate'); // please compress data
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

    $result = curl_exec($ch);
    $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($status_code == 200) { // OK
        $js = json_decode($result, true);
    } else {  // Error occured
        echo 'Unable to Fetch Data';
    }
    curl_close($ch);

    $scans = $js['scans'];
}
?>
<h6>Virus Scanning Results</h6>
<hr>
<table class='table table-striped table-bordered'>
    <?php
    if (isset($scans)) {
        foreach ($scans as $key => $value) {
            $key = ucwords($key);
            if (substr($value['result'], 0, 5) == 'clean')
                $value['result'] = '<b class="text-success">' . ucwords($value['result']) . '</b>';
            else
                $value['result'] = '<b class="text-warning">' . ucwords($value['result']) . '</b>';
            echo "<tr><td><strong> $key </strong></td><td>" . $value['result'] . '</td></tr>';
        }
    }
    else {
        echo '<h2 class="text-danger"> Domain Not Registered </h2>';
    }
    ?>
</table>