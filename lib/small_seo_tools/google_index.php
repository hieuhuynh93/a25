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
        $outData = googleIndex($host);
    }
}
?>
<table class="table table-bordered table-hover">
    <tbody>
        <tr>
            <td><strong><?php echo 'Domain'; ?></strong></td>
            <td><?php echo $myHost; ?></td>
        </tr>
        <tr>
            <td><strong><?php echo 'Google Indexed'; ?></strong></td>
            <td><?php echo $outData; ?><?php echo ' Pages'; ?></td>
        </tr>
    </tbody>
</table>