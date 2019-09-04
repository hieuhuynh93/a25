<?php
require_once 'all_functions.php';

if (isset($_REQUEST['url'])) {
    $url = clean_url(trim($_REQUEST['url']));

    $ch = curl_init(); // initialize curl handle
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
    curl_setopt($ch, CURLOPT_AUTOREFERER, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_REFERER, 'https://' . $url);
    curl_setopt($ch, CURLOPT_URL, 'https://' . $url); // set url to post to
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // allow redirects
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return into a variable
    curl_setopt($ch, CURLOPT_TIMEOUT, 60); // times out after 50s
    curl_setopt($ch, CURLOPT_POST, 0); // set POST method
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $content = curl_exec($ch); // run the whole process
    $curl_info = curl_getinfo($ch);
    curl_close($ch);
}
?>

<div>
    <div class='row text-center'>
        <table class='table table-striped table-bordered'><?php
            foreach ($curl_info as $key => $value) {
                if ($key == 'certinfo' || $value == '' || $value == '0')
                    continue;
                if ($key == 'http_code') {
                    if ($value == 200) {
                        $http = 'OK';
                    } elseif ($value == 0) {
                        $http = 'Not Registered';
                    } elseif ($value == 403) {
                        $http = 'Forbidden';
                    } else {
                        $http = 'Unavailable';
                    }
                }
                $key = ucwords(str_replace('_', ' ', $key));
                if (substr($key, -4) == 'Size') {
                    $value .= ' Bytes';
                }
                if (substr($key, -4) == 'Time') {
                    $value .= ' seconds';
                }
                if (substr($key, 0, 10) == 'Namelookup') {
                    $key = 'Name Lookup Time';
                }
                if (substr($key, 0, 11) == 'Pretransfer') {
                    $key = 'Pre Transfer Time';
                }
                if (substr($key, 0, 13) == 'Starttransfer') {
                    $key = 'Start Transfer Time';
                }
                if ($key == 'Size Download') {
                    $key = 'Download Size';
                    $value = round(($value / 1024), 1) . ' Kb';
                }
                if ($key == 'Speed Download') {
                    $key = 'Download Speed';
                    $value = round(($value / 1024), 1) . ' Kb/s';
                }
                if ($key == 'Download Content Length') {
                    continue;
                }
                if ($key == 'Header Size')
                    echo "<tr><th>Status</th><td>$http</td></tr>";
                ?>
                <tr><th><?php echo ucwords($key); ?></th><td><?php echo $value; ?></td></tr>
            <?php } ?>
        </table>
    </div>
</div>