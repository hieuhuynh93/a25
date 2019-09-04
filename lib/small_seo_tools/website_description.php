<?php

require_once 'all_functions.php';

if (isset($_REQUEST['url'])) {
    $my_url = clean_url($_REQUEST['url']);
    $my_url = 'https://www.' . $my_url;
}
?>

<?php

$ret = getMyMeta($my_url);
$title = $ret[0];
$description = $ret[1];
$keywords = $ret[2];
$openG = $ret[3];
if (isset($my_url))
    echo " <div><strong>URL: </strong>$my_url</div> \n";
if (isset($title))
    echo " <div><strong>Title: </strong>$title</div> \n";
if (isset($description))
    echo " <div><strong>Description: </strong>$description</div>\n";
if (isset($keywords))
    echo " <div><strong>Keywords: </strong>$keywords</div>\n";
if ($openG)
    echo " <div><strong>Open Graph: </strong>Present</div>\n";
?>