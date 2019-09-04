<?php
include 'functions/functions.php';

function getSuggestQueries($userInput, $err_str = "Something Went Wrong") {

    $googleUrl = 'http://suggestqueries.google.com/complete/search';
    $keywords = array();
    $json = simpleCurlGET($googleUrl . '?output=firefox&client=firefox&hl=en-US&q=' . urlencode($userInput));

    if ($json == '')
        die($err_str);

    $json = json_decode($json, true);
    $keywords = $json[1];
    return $keywords;
}

$inData = raino_trim($_REQUEST['url']);
$regUserInput = truncate($inData, 30, 150);
$count = 0;
$outArr = getSuggestQueries($inData);
?>
<table class="table table-bordered">
    <tbody>
        <tr>
            <th style="width: 6%;text-align: center;">#</th>
            <th style="text-align: center;"><?php echo 'Suggested Keywords'; ?></th>
        </tr>
        <?php foreach ($outArr as $keyword) { ?>
            <tr>
                <td style='text-align: center;'><?php $count++;
            echo $count;
            ?></td>
                <td style="text-align: center;"><?php echo ucwords($keyword); ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>