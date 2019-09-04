<?php
require_once 'all_functions.php';

if (isset($_REQUEST['url']))
    $my_url = raino_trim($_REQUEST['url']);
$my_url = "https://" . clean_url($my_url);
if (filter_var($my_url, FILTER_VALIDATE_URL) === false) {
    $error = 'Error';
} else {
    $regUserInput = $my_url;
    $my_url = parse_url($my_url);
    $host = $my_url['host'];
    $myHost = ucfirst($host);
    $outData = dns_get_record($host, DNS_ALL);
}

foreach ($outData as $ress) {
    ?>
    <table class="table table-hover table-responsive table-striped" style="margin-bottom: 30px;">
        <tbody>
            <?php foreach ($ress as $res => $name) {
                ?>
                <tr>
                    <td><?php echo ucfirst($res); ?></td>
                    <td><strong><?php if (!is_array($name))
            echo $name;
        else
            echo $entry = implode(' , ', $name);
                ?></strong></td>
                </tr>
    <?php } ?>
        </tbody></table> 
<?php }
?>
                