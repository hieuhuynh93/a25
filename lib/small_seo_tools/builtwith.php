<?php

include_once 'all_functions.php';
$html = '';
$screenShotDesktop = '';
$count = 1;
if (isset($_REQUEST['url'])) {
    $bw = getBuiltWith(clean_url($_REQUEST['url']));
    $object = get_object_vars($bw->response->technologies);
    while (current($object)) {
        $key = key($object);
        $html .= "<tr><td>".$count."</td><td> " . $key . " </td><td> " . $object["$key"]->cats[0] . " </td><td> <a href='" . $object["$key"]->website . "' target='_blank'>Click Here</a></td></tr>";
        next($object);
        $count++;
    }
} else {
    $html = 'Sorry! Please enter URL';
}

function getUrlScreenShotDesktop($siteURL) {
    $googlePagespeedData = @file_get_contents("https://www.googleapis.com/pagespeedonline/v2/runPagespeed?url=$siteURL&screenshot=true&strategy=desktop");
    $googlePagespeedData = json_decode($googlePagespeedData, true);

    $screenshot = $googlePagespeedData['screenshot']['data'];
    $screenshot = str_replace(array('_', '-'), array('/', '+'), $screenshot);
    return 'data:image/jpeg;base64,' . $screenshot;
}

if(isset($_REQUEST['di'])){
    $screenShotDesktop = '';
    echo $html;
}else{
    $screenShotDesktop = getUrlScreenShotDesktop($_REQUEST['url']);
    echo json_encode(array('html' => $html, 'screenDesktop' => $screenShotDesktop));
}
?>
        