<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'all_functions.php';

if (isset($_REQUEST['url'])) {
    $my_url = raino_trim($_REQUEST['url']);
    $my_url = clean_url($my_url);
    $my_url = "https://$my_url";
    if (filter_var($my_url, FILTER_VALIDATE_URL) === false) {
        $error = 'Error';
    } else {
        $regUserInput = $my_url;
        $outData = spiderView($my_url);
        $sourceData = $outData[0];
        $meta_title = $outData[1];
        $meta_description = $outData[2];
        $meta_keywords = $outData[3];
        $textData = $outData[4];
        $tags = $outData[5];
        $uriData = doLinkAnalysis($my_url);
        $internal_links = $uriData[0];
    }
}
?>

<h4><?php echo 'Meta Content'; ?></h4>
<table class="table table-responsive table-hover table-striped">
    <tbody>
        <tr>
            <td><?php echo 'Meta Title'; ?></td>
            <td><strong><?php echo $meta_title; ?></strong></td>
        </tr>
        <tr>
            <td><?php echo 'Meta Description'; ?></td>
            <td><strong><?php echo $meta_description; ?></strong></td>
        </tr>
        <tr>
            <td><?php echo 'Meta Keywords'; ?></td>
            <td><strong><?php echo $meta_keywords; ?></strong></td>
        </tr>
    </tbody>
</table>

<br />    

<h4><?php echo 'H1 to H4 Tags'; ?></h4>
<?php
foreach ($tags as $tagName => $tagVals) {
    ?>
    <table class="table table-hover table-striped" style="margin-bottom: 30px;">
        <thead>
            <tr>
                <th class="text-center"><?php echo ucwords($tagName) . ' Tags '; ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($tagVals as $tagVal) {
                ?>
                <tr>
                    <td class="text-center"><?php echo $tagVal; ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <?php
}
?>
<br />
<h4><?php echo 'Indexable Links'; ?></h4>
<table class="table table-bordered table-responsive">
    <thead>
        <tr>
            <td style="text-align: left;">No.</td>
            <td style="text-align: left;"><?php echo 'Link' . "'" . 's URL'; ?></td>
        </tr>
    </thead>
    <tbody>
        <?php
        $rawData = "Internal Links\n" . "\n";
        $rawData .= 'No.,' . 'Link' . "'s URL" . ',' . 'DoFollow / NoFollow' . "\n\n";
        foreach ($internal_links as $count => $links) {
            ?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $links['href']; ?></td>
            </tr>
        <?php } ?>
    </tbody></table>

<br />
<h4><?php echo 'Readable Text Content'; ?></h4>
<textarea rows="12" readonly="" class="form-control"><?php echo $textData; ?></textarea>

<br /><br />
<h4><?php echo 'Source Code'; ?></h4>
<textarea rows="12" readonly="" class="form-control"><?php echo htmlspecialchars($sourceData); ?></textarea>
<br />