<?php
include 'all_functions.php';

$outData = raino_trim($_REQUEST['data']);
$regUserInput = truncate($outData, 30, 150);
$array = explode("\n", $outData);
$count = 0;
foreach ($array as $url) {
    $url = clean_url($url);
    $url = Trim("https://$url");
    if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
        $count++;
        $my_url[] = Trim($url);
        $url = parse_url(Trim($url));
        $host = $url['host'];
        $myHost[] = ucfirst(str_replace('www.', '', $host));
        $alexa = alexaRank($host);
        $alexa_rank = $alexa[0];
        $alexa_rank = ($alexa_rank == 'No Global Rank' ? '0' : $alexa_rank);
        $price[] = "$" . number_format(calPrice($alexa_rank)) . " USD";
    }
}
?>   

<?php for ($loop = 0; $loop < $count; $loop++) { ?>
    <tr>
        <td><?php echo $loop + 1; ?></td>
        <td><?php echo $myHost[$loop]; ?></td>
        <td><?php echo $price[$loop]; ?></td>
    </tr>
<?php } ?>


