<?php
require_once 'all_functions.php';

if (isset($_REQUEST['url'])) {
    $url = clean_url($_REQUEST['url']);
    $url = 'https://' . $url;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
    curl_setopt($ch, CURLOPT_TIMEOUT, 3); //timeout in seconds
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
    //curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_MAX_RECV_SPEED_LARGE, 100000);
    curl_exec($ch);
    $res = curl_getinfo($ch);
    curl_close($ch);
}
?>
<table class='table table-bordered table-striped'>
    <tr>
        <th><h1> Your Website's Server Response <br /><br /></h1></th>
    </tr>
    <?php
    foreach ($res as $key => $value) {
        if ($key == 'certinfo' || $value == '0' || $value == '-1' || $value == '')
            continue;
        $key = str_replace('_', ' ', $key);
        if (substr($key, -4) == 'size') {
            $value .= ' Bytes';
        }
        if (substr($key, -4) == 'time') {
            $value .= ' seconds';
        }
        if (substr($key, 0, 10) == 'namelookup') {
            $key = 'Name Lookup Time';
        }
        if (substr($key, 0, 11) == 'pretransfer') {
            $key = 'Pre Transfer Time';
        }
        if (substr($key, 0, 13) == 'starttransfer') {
            $key = 'Start Transfer Time';
        }
        if ($key == 'size download') {
            $key = 'Download Size';
            $value = round(($value / 1024), 1) . ' Kb';
        }
        if ($key == 'speed download') {
            $key = 'Download Speed';
            $value = round(($value / 1024), 1) . ' Kb/s';
        }
        if ($key == 'download content length') {
            continue;
        }
        ?>
        <tr style='text-align: left;'><td style='color: black;'><?php echo '<i class="fa fa-icon"></i>  <b>' . ucwords($key) . ' :  </b>' . $value; ?></td></tr>
<?php } ?>
</table>