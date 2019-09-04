<?php
require_once 'all_functions.php';

$info = host_info($_SERVER['REMOTE_ADDR']);
$ip = $info[0];
$isp = $info[2];
$country = $info[1];
$region = $info[4];
$city = $info[3];
$lat = $info[5];
$lon = $info[6];
$timezone = $info[7];
$org = $info[8];
?>
<table class='table table-bordered table-striped' style='box-shadow:0 2px 2px 0 gray;padding: 10px;background-color: white;'>
    <tr>
        <td><b>Your IP </b></td>
        <td><?php echo $ip; ?></td>
    </tr>
    <tr>
        <td><b>City</b></td>
        <td><?php echo $city; ?></td>
    </tr>
    <tr>
        <td><b>Region</b></td>
        <td><?php echo $region; ?></td>
    </tr>
    <tr>
        <td><b>Country</b></td>
        <td><?php echo $country; ?></td>
    </tr>
    <tr>
        <td><b>ISP</b></td>
        <td><?php echo $isp; ?></td>
    </tr>
    <tr>
        <td><b>Organization</b></td>
        <td><?php echo $org; ?></td>
    </tr>
    <tr>
        <td><b>Latitude</b></td>
        <td><?php echo $lat; ?></td>
    </tr>
    <tr>
        <td><b>Longitude</b></td>
        <td><?php echo $lon; ?></td>
    </tr>
    <tr>
        <td><b>Timezone</b></td>
        <td><?php echo $timezone; ?></td>
    </tr>
</table>