<?php

require_once 'all_functions.php';
$htmlResult = '';
if (isset($_REQUEST['url'])) {
    $outData = clean_url(raino_trim($_REQUEST['url']));
    $regUserInput = truncate($outData, 30, 150);
    $array = explode("\n", $outData);
    $count = count($array);
    $dataCount = 0;
    foreach ($array as $url) {
        if ($url == null || $url == "") {
            
        } else {
            $url = clean_with_www($url);
            $url = Trim("https://$url");
            if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
                $dataCount = $dataCount + 1;
                $my_url[] = Trim($url);
                $url = parse_url(Trim($url));
                $host = $url['host'];
                $getHostIP = gethostbyname($host);
                $class_c = explode(".", $getHostIP);
                $class_c = $class_c[0] . '.' . $class_c[1] . '.' . $class_c[2];
                $ipList[] = $getHostIP;
                $classCList[] = $class_c;
                $myHost[] = ucfirst(str_replace('www.', '', $host));
            }
        }
    }
}
if (isset($error)) {
    $htmlResult .= '<tr><td colspan="4"><div class="alert alert-error"><strong>Alert!</strong><a href="' . $toolURL . '">' . $lang['12'] . '</a></div></td></tr>';
} else {
    for ($i = 0; $i < $dataCount; $i++) {
        $htmlResult .= '<tr><td>' . ($i + 1) . '</td><td>' . $myHost[$i] . '</td><td>' . $ipList[$i] . '</td><td>' . $classCList[$i] . '</td></tr>';
    }
}
echo json_encode(array('htmlClassCIP' => $htmlResult));
?>