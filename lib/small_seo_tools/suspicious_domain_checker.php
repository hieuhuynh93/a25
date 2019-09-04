<?php

include 'functions/functions.php';

function updateSuspiciousDomains() {

    $fL = 'sp_low.tdata';
    $fM = 'sp_medium.tdata';
    $fH = 'sp_high.tdata';

    $l = 'https://secure.dshield.org/feeds/suspiciousdomains_Low.txt';
    $m = 'https://secure.dshield.org/feeds/suspiciousdomains_Medium.txt';
    $h = 'https://secure.dshield.org/feeds/suspiciousdomains_High.txt';

    $l = simpleCurlGET($l);
    if ($l != '')
        putMyData('tdata/' . $fL, $l);

    $m = simpleCurlGET($m);
    if ($m != '')
        putMyData('tdata/' . $fM, $m);

    $h = simpleCurlGET($h);
    if ($h != '')
        putMyData('tdata/' . $fH, $h);
}

function checkDomain($domain) {

    $domain = clean_url(trim($domain));
    $fL = 'sp_low.tdata';
    $fM = 'sp_medium.tdata';
    $fH = 'sp_high.tdata';

    $dbH = file('tdata/' . $fH);
    foreach ($dbH as $domainName) {
        $domainName = clean_url(trim($domainName));
        if ($domainName == $domain)
            return 'h';
    }

    $dbM = file('tdata/' . $fM);
    foreach ($dbM as $domainName) {
        $domainName = clean_url(trim($domainName));
        if ($domainName == $domain)
            return 'm';
    }

    $dbL = file('tdata/' . $fL);
    foreach ($dbL as $domainName) {
        $domainName = clean_url(trim($domainName));
        if ($domainName == $domain)
            return 'l';
    }

    return 'n';
}

$urlcustomUrl = $_REQUEST['url'];
$userInput = raino_trim($urlcustomUrl);
$regUserInput = truncate($userInput, 30, 150);
$array = explode("\n", $userInput);
$count = 0;
$resOut = $resCol = array();
$color = 'danger';
foreach ($array as $url) {
    $url = clean_with_www($url);
    $url = Trim("https://$url");
    if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
        $count++;
        $my_url[] = Trim($url);
        $url = parse_url(Trim($url));
        $host = $url['host'];
        $myHost[] = ucfirst(str_replace('www.', '', $host));
        $stats = checkDomain($host);
        if ($stats == 'n') {
            $resOut[] = 'Safe Site';
            $color = 'success';
        }
        if ($stats == 'l') {
            $resOut[] = 'Low level Unsafe Site';
            $color = 'info';
        }
        if ($stats == 'm') {
            $resOut[] = 'Medium level Unsafe Site';
            $color = 'warning';
        }
        if ($stats == 'h') {
            $resOut[] = 'High level Unsafe Site';
            $color = 'danger';
        }
        $resCol[] = $color;
    }
}
//$html = '';
for ($loop = 0; $loop < $count; $loop++) {
    $html .= '<tr><td>' . ($loop + 1) . '</td><td>' . $myHost[$loop] . '</td><td><span class="badge bg-' . $resCol[$loop] . '">' . $resOut[$loop] . '</span></td></tr>';
}

echo $html;
?>
