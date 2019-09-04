<?php
require_once 'all_functions.php';

if (isset($_REQUEST['url'])) {
    $info = host_info(strtolower(clean_url($_REQUEST['url'])));
    $ip = $info[0];

    function IPv4To6($Ip) {
        static $Mask = '::ffff:'; // This tells IPv6 it has an IPv4 address
        $IPv6 = (strpos($Ip, '::') === 0);
        $IPv4 = (strpos($Ip, '.') > 0);

        if (!$IPv4 && !$IPv6)
            return false;
        if ($IPv6 && $IPv4)
            $Ip = substr($Ip, strrpos($Ip, ':') + 1); // Strip IPv4 Compatibility notation
        elseif (!$IPv4)
            return $Ip; // Seems to be IPv6 already?
        $Ip = array_pad(explode('.', $Ip), 4, 0);
        if (count($Ip) > 4)
            return false;
        for ($i = 0; $i < 4; $i++)
            if ($Ip[$i] > 255)
                return false;

        $Part7 = base_convert(($Ip[0] * 256) + $Ip[1], 10, 16);
        $Part8 = base_convert(($Ip[2] * 256) + $Ip[3], 10, 16);
        return $Mask . $Part7 . ':' . $Part8;
    }

    $ipv6 = IPv4To6($ip);
    // Convert back to printable address in canonical form
    if (filter_var($ipv6, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
        $compat = '<b class="text-success">Yes</b>';
    } else {
        $compat = '<b class="text-danger">No</b>';
    }
}
?>
<table class='table table-bordered table-striped' style='box-shadow:0 2px 2px 0 gray;padding: 10px;background-color: white;'>
    <tr><th>Domain Name</th><td><?php echo ucfirst(clean_url($_REQUEST['url'])); ?></td></tr>
    <tr><th>IP Address</th><td><?php echo $ip; ?></td></tr>
    <tr><th>IPv6 Compatible</th><td><?php echo $compat; ?></td></tr>
</table>