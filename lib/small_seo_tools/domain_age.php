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
        $whois = new whois;
        $site = $whois->cleanUrl($host);
        $whois_data = $whois->whoislookup($site);
        $domainAge = $whois_data[1];
        $createdDate = $whois_data[2];
        $updatedDate = $whois_data[3];
        $expiredDate = $whois_data[4];
    }
}
?>   

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th><?php echo 'Value'; ?></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo 'Domain'; ?></td>
            <td><strong style="color: #c0392b;"><?php echo $myHost; ?></strong></td>
        </tr>
        <tr>
            <td><?php echo 'Domain Age'; ?></td>
            <td><strong><?php echo $domainAge; ?></strong></td>
        </tr>

        <tr>
            <td><?php echo 'Domain Created Date'; ?></td>
            <td><strong><?php echo $createdDate; ?></strong></td>
        </tr>
        <tr>
            <td><?php echo 'Domain Updated Date'; ?></td>
            <td><strong><?php echo $updatedDate; ?></strong></td>
        </tr>
        <tr>
            <td><?php echo 'Domain Expiry Date'; ?></td>
            <td><strong><?php echo $expiredDate; ?></strong></td>
        </tr>

    </tbody>

</table>