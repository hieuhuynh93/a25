<?php
require_once 'all_functions.php';

if (isset($_REQUEST['url'])) {
    $do_hash_data = htmlspecialchars($_REQUEST['url'], ENT_COMPAT, 'ISO-8859-1', true);
    $regUserInput = truncate($do_hash_data, 30, 150);
    $output = MD5($do_hash_data);
    $limited_hash_data = truncate($do_hash_data, 50, 500);
}
?>
<table class="table table-bordered">
    <tbody>
        <tr>
            <td><strong><?php echo 'Given Text'; ?></strong></td>
            <td><?php echo $limited_hash_data; ?></td>
        </tr>
        <tr>
            <td><strong><?php echo 'MD5 Hash'; ?></strong></td>
            <td><?php echo $output; ?></td>
        </tr>
    </tbody>
</table>