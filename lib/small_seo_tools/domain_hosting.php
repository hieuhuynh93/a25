<?php
require_once 'all_functions.php';

if (isset($_REQUEST['url'])) {
    $my_url = raino_trim($_REQUEST['url']);
    $my_url = "https://" . clean_url($my_url);
    if (filter_var($my_url, FILTER_VALIDATE_URL) === false) {
        $error = 'Error';
    } else {
        $regUserInput = $my_url;
        $my_url = parse_url($my_url);
        $host = $my_url['host'];
        $myHost = ucfirst($host);
        $getHostIP = gethostbyname($host);
        $data_list = host_info($host);
        $domain_isp = $data_list[2];
    }
}
?>
<table class="table table-hover table-bordered">
    <tbody>
        <tr>
            <th><?php echo 'Domain'; ?></th>
            <th><?php echo 'IP'; ?></th>
            <th><?php echo 'Service Provider'; ?></th>
        </tr>
        <tr>
            <td><?php echo $myHost; ?></td>
            <td><?php echo $getHostIP; ?></td>
            <td><?php echo $domain_isp; ?></td>
        </tr>
    </tbody>
</table>