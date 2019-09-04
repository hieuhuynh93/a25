<?php
require_once 'all_functions.php';

if (isset($_REQUEST['url'])) {
    $my_url7 = raino_trim($_REQUEST['url']);
    $my_url7 = "https://" . clean_url($my_url7);
    if (filter_var($my_url7, FILTER_VALIDATE_URL) === false) {
        $error = 'Error';
    } else {
        $regUserInput = $my_url7;
        $my_url7 = parse_url($my_url7);
        $host = $my_url7['host'];
        $myHost = ucfirst($host);
        $whois = new whois;
        $site = $whois->cleanUrl($host);
        $whois_data = $whois->whoislookup($site);
        $whoisData = $whois_data[0];
    }
}
?>

<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th class="heading">
                <h5><?php echo '<u>Whois Data</u>'; ?></h5>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        $myLines = preg_split("/\r\n|\n|\r/", $whoisData);
        foreach ($myLines as $line) {
            if (!empty($line))
                echo '<tr><td>' . $line . '</td></tr>';
        }
        ?>
    </tbody>
</table>