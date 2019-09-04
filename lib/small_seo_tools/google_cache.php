<?php
require_once 'all_functions.php';

if (isset($_REQUEST['url'])) {
    $url = raino_trim(clean_url($_REQUEST['url']));
    $url = 'https://' . $url;
    $cache = googleCache($url);
}
?>
<table class='table table-bordered' style='text-align: center;'>
    <tr>
        <th> URL </th>
        <th> Last Cached </th>
    </tr>
    <tr>
        <td style='text-align: center;'><?php echo ucfirst($_REQUEST['url']); ?></td>
        <td style='text-align: center;' class='text-success'><b><?php echo $cache; ?></b></td>
    </tr>
</table>