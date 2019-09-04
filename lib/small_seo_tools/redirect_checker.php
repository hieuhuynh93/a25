<?php

function raino_trim($str) {
    $str = Trim(htmlspecialchars($str));
    return $str;
}

function clean_with_www($site) {
    $site = strtolower($site);
    $site = str_replace(array(
        'http://',
        'https://'), '', $site);
    return $site;
}

function clean_url($site) {
    $site = strtolower($site);
    $site = str_replace(array(
        'http://',
        'ftp://',
        'ftps://',
        'https://',
        'www.'), '', $site);
    return $site;
}

function getHttpCode($site, $followRedirect = true) {
    $ch = curl_init($site);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, $followRedirect);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0');
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $httpCode;
}

function checkRedirect($my_url, $goodStr = "Good", $badStr = "Bad - Not Redirecting!") {
    $my_url = clean_url($my_url);
    $re301 = false;
    $url_with_www = "https://www.$my_url";
    $url_no_www = "https://$my_url";

    $data1 = getHttpCode($url_with_www, false);
    $data2 = getHttpCode($url_no_www, false);

    if ($data1 == '301')
        $re301 = true;
    if ($data2 == '301')
        $re301 = true;

    $str = ($re301 == true ? $goodStr : $badStr);
    return $str;
}

if (isset($_REQUEST['url'])) {
    $url = raino_trim($_REQUEST['url']);
    $myUrl = clean_url($url);
    $url = "https://$myUrl";
    if (filter_var($url, FILTER_VALIDATE_URL) === false) {
        $error = "Error";
    } else {
        $outData = checkRedirect($url, "Good", "Bad - Not Redirecting!");
    }
}
?>

<table class="table table-bordered" style="text-align: left;">
    <tbody><tr>
            <th><?php echo 'URL'; ?></th>
            <th><?php echo "Redirect Status"; ?></th>
        </tr>
        <tr>
            <td><?php echo ucfirst($myUrl); ?></td>
            <td><?php echo $outData; ?></td>
        </tr>
    </tbody>
</table>
