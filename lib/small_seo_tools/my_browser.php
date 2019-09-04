<?php
require_once 'all_functions.php';

if (isset($_REQUEST['url'])) {
    $my_url = raino_trim($_REQUEST['url']);
    $my_url = "https://" . clean_url($my_url);
}
$myUA = $_SERVER['HTTP_USER_AGENT'];
$outData = parse_user_agent($myUA);
extract($outData);
?>
<table class="table table-responsive table-striped">
    <tbody>
        <tr>
            <td><strong><?php echo 'Your Browser'; ?></strong></td>
            <td><?php echo $browser; ?></td>

        </tr>
        <tr>
            <td><strong><?php echo 'Browser Version'; ?></strong></td>
            <td><?php echo $version; ?></td>

        </tr>
        <tr>
            <td><strong><?php echo 'Your OS'; ?></strong></td>
            <td><?php echo $platform; ?></td>
        </tr>
        <tr>
            <td><strong><?php echo 'User Agent'; ?></strong></td>
            <td><?php echo $myUA; ?></td>
        </tr>
    </tbody>

</table>