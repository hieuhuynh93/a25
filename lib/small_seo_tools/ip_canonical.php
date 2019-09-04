<?php
require_once 'all_functions.php';

if (isset($_REQUEST['url'])) {

    $ip = gethostbyname(parse_url('https://www.' . clean_url($_REQUEST['url']), PHP_URL_HOST));
    $ipa = gethostbyaddr($ip);

    if ($ipa == $ip) {
        $canon = '<b class="text-success">Yes</b>';
    } else {
        $canon = '<b class="text-danger">No</b>';
    }
}
?>

<table class='table table-bordered table-striped' style='box-shadow:0 2px 2px 0 gray;padding: 10px;background-color: white;'>
    <tr><th>Domain Name</th><td><?php echo ucfirst(clean_url($_REQUEST['url'])); ?></td></tr>
    <tr><th>IP Address</th><td><?php echo $ip; ?></td></tr>
    <tr><th>Canonical</th><td><?php echo $canon; ?></td></tr>
</table>