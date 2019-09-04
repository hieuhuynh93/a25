<?php
require_once 'all_functions.php';

if (isset($_REQUEST['url'])) {
    $userInput = raino_trim($_REQUEST['url']);
    $regUserInput = truncate($userInput, 30, 150);
    $array = explode("\n", $userInput);
    $count = 0;
    foreach ($array as $url) {
        $url = clean_url($url);
        $url = Trim("https://$url");
        if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
            $count++;
            $my_url[] = Trim($url);
            $url = parse_url(Trim($url));
            $host = $url['host'];
            $myHost[] = ucfirst(str_replace('www.', '', $host));
            $res = itIsOnline($host);
            $stats[] = ($res[0] == true ? "Online" : "Offline");
            $response_time[] = $res[1] . " Sec";
            $http_code[] = $res[2];
        }
    }
}
?>

<table class="table table-bordered">
    <thead>
        <tr>
            <td><?php echo 'URL'; ?></td>
            <td><?php echo 'HTTP Code'; ?></td>
            <td><?php echo 'Response Time'; ?></td>
            <td><?php echo 'Status'; ?></td>
        </tr>
    </thead>
    <tbody>
        <?php
        for ($loop = 0; $loop < $count; $loop++) {
            ?>
            <tr>
                <td><?php echo $myHost[$loop]; ?></td>
                <td><?php echo $http_code[$loop]; ?></td>
                <td><?php echo $response_time[$loop]; ?></td>
                <td><?php echo $stats[$loop]; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>