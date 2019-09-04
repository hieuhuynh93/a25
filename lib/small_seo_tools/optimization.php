<?php
require_once 'all_functions.php';

if (isset($_REQUEST['url'])) {

    $my_url1 = clean_url($_REQUEST['url']);
    $my_url = parse_url('https://' . $my_url1);
    $host = $my_url['host'];
    $getHostIP = gethostbyname($host);
    $myHost = ucfirst(str_replace('www.', '', $host));
    $dataArr = dnsblookup($getHostIP);
    $outArr = $dataArr[0];
    $overAll = $dataArr[1];

    $domain = $my_url1;
    $technologies = getBuiltWith($domain);

    $ret = getStatsData2($domain, $technologies);
    $optimize = $ret['optimize'];
}
?>

<table class='table table-bordered table-striped'>
    <tr><th colspan='2'><h2>Speed & Optimization Tips for <b><?php echo ucfirst(clean_url($_REQUEST['url'])); ?></b></h2></th></tr>
    <tr><td colspan='2'><small><b>Website speed has a huge impact on performance, affecting user experiences, conversion rates and even rankings. By reducing page load-times, users are less likely to get distracted and the search engines are more likely to reward you by ranking your pages higher in the SERPs.</b></small></td></tr>
    <tr><td><b>Website Title</b></td><td><?php if ($optimize['title'] == 'success') echo 'Congratulations! Your Website Title is Optimized.';
else echo 'Warning! Your Website Title is not Optimized.'; ?></td></tr>
    <tr><td><b>Website Description</b></td><td><?php if ($optimize['description'] == 'success') echo 'Congratulations! Your Website Description is Optimized.';
else echo 'Warning! Your Website Description is not Optimized.'; ?></td></tr>
    <tr><td><b>Robots.txt</b></td><td><?php if ($optimize['robots'] == 'success') echo 'Congratulations! Your Website has a robots.txt file.';
else echo 'Warning! Your Website doesn\'t have a robots.txt file.'; ?></td></tr>
    <tr><td><b>Sitemap.xml</b></td><td><?php if ($optimize['sitemap'] == 'success') echo 'Congratulations! Your Website has a sitemap.xml file..';
else echo 'Warning! Your Website doesn\'t have a sitemap.xml file.'; ?></td></tr>
    <tr><td><b>SSL Secure</b></td><td><?php if ($optimize['https'] == 'success') echo 'Congratulations! Your Website has support to HTTPS.';
else echo 'Warning! Your Website doesn\'t have support to HTTPS.'; ?></td></tr>
    <tr><td><b>PageSpeed</b></td><td><?php if ($optimize['pageSpeed'] == 'success') echo 'Congratulations! Your Website loads very fast on Desktop devices.';
else echo 'Warning! Your Website doesn\'t load very fast on Desktop devices. Need to improve this.'; ?></td></tr>
    <tr><td><b>PageSpeed Mobile</b></td><td><?php if ($optimize['pagespeed_mobile'] == 'success') echo 'Congratulations! Your Website loads very fast on Mobile devices.';
else echo 'Warning! Your Website doesn\'t load very fast on Mobile devices. Need to improve this.'; ?></td></tr>
    <tr><td><b>Headings</b></td><td><?php if ($optimize['headers'] == 'success') echo 'Congratulations! Your Website uses H1 & H2 Tags.';
else echo 'Warning! Your Website doesn\'t use H1 & H2 Tags.'; ?></td></tr>
    <tr><td><b>Blacklist</b></td><td><?php if ($overAll != '1') echo 'Congratulations! Your Website is Not Blacklisted.';
else echo 'Warning! Your Website is Blacklisted.'; ?></td></tr>
    <tr><td><b>W3C Validator</b></td><td><?php if ($optimize['w3c'] == 'success') echo 'Congratulations! Your Website doesn\'t have W3C Errors.';
else echo 'Warning! Your Website has W3C Errors.'; ?></td></tr>
    <tr><td><b>Accelerated Mobile Pages(AMP)</b></td><td><?php if ($optimize['hasAMP'] == 'success') echo 'Congratulations! Your Website has an AMP version.';
else echo 'Warning! Your Website doesn\'t have any AMP version.'; ?></td></tr>
    <tr><td><b>Domain Authority</b></td><td><?php if ($optimize['domainAuthority'] == 'success') echo 'Congratulations! Your Website has fast Domain Authority.';
else echo 'Warning! Your Website has slow Domain Authority. It is good to have Domain Authority greater than 25.'; ?></td></tr>
    <tr><td><b>GZIP Compress</b></td><td><?php if ($optimize['gzip'] == 'success') echo 'Congratulations! Your Website is compressed. This makes faster response for visitors.';
else echo 'Warning! Your Website is not compressed. This makes slower response for visitors.'; ?></td></tr>
    <tr><td><b>Favicon</b></td><td><?php if ($optimize['favicon'] == 'success') echo 'Congratulations! Your Website appears to have a Favicon.';
else echo 'Warning! Your Website doesn\'t have a Favicon.'; ?></td></tr>
    <tr><td><b>Broken Links</b></td><td><?php if ($optimize['links'] == 'success') echo 'Congratulations! Your Website has no Broken Links.';
else echo 'Warning! Your Website has Broken Links.'; ?></td></tr>
    <tr><td><b>Google Safe</b></td><td><?php if ($optimize['google_safe'] == 'success') echo 'Congratulations! Your Website is marked SAFE by Google.';
else echo 'Warning! Your Website is marked UNSAFE by Google.'; ?></td></tr>
</table>