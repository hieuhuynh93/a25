<?php
require 'simple_dom.php';
require 'all_functions.php';

function str_get_html($str, $lowercase = true, $forceTagsClosed = true, $target_charset = DEFAULT_TARGET_CHARSET, $stripRN = true, $defaultBRText = DEFAULT_BR_TEXT, $defaultSpanText = DEFAULT_SPAN_TEXT) {
    $dom = new simple_html_dom(null, $lowercase, $forceTagsClosed, $target_charset, $stripRN, $defaultBRText, $defaultSpanText);
    if (empty($str) || strlen($str) > MAX_FILE_SIZE) {
        $dom->clear();
        return false;
    }
    $dom->load($str, $lowercase, $stripRN);
    return $dom;
}

function file_get_html($url, $use_include_path = false, $context = null, $offset = -1, $maxLen = -1, $lowercase = true, $forceTagsClosed = true, $target_charset = DEFAULT_TARGET_CHARSET, $stripRN = true, $defaultBRText = DEFAULT_BR_TEXT, $defaultSpanText = DEFAULT_SPAN_TEXT) {
    //Fix - A to Z SEO Tools v1.8
    $Data = curlGET($url);
    return str_get_html($Data);
}

if (isset($_REQUEST['url'])) {
    $my_url = trim(clean_url($_REQUEST['url']));
    if (substr($my_url, 0, 7) !== 'http://' && substr($my_url, 0, 8) !== 'https://')
        $my_url = 'https://' . $my_url;
    $regUserInput = $my_url;
    $uriData = doLinkAnalysis($my_url);
    $internal_links = $uriData[0];
    $internal_links_count = $uriData[1];
    $internal_links_nofollow = $uriData[2];
    $external_links = $uriData[3];
    $external_links_count = $uriData[4];
    $external_links_nofollow = $uriData[5];
    $total_links = $uriData[6];
    $total_nofollow_links = (int) $internal_links_nofollow + (int) $external_links_nofollow;
}
?>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <td style="text-align: left;"><?php echo 'Links'; ?></td>
            <td style="text-align: left;"><?php echo 'Count'; ?></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><strong><?php echo 'Total Links'; ?></strong></td>
            <td><?php echo $total_links; ?></td>

        </tr>
        <tr>
            <td><strong><?php echo 'Internal Links'; ?></strong></td>
            <td><?php echo $internal_links_count; ?></td>

        </tr>
        <tr>
            <td><strong><?php echo 'External Links'; ?></strong></td>
            <td><?php echo $external_links_count; ?></td>
        </tr>
        <tr>
            <td><strong><?php echo 'NoFollow Links'; ?></strong></td>
            <td><?php echo $total_nofollow_links; ?></td>
        </tr>
    </tbody>

</table>
<br />
<h3><?php echo 'Internal Links'; ?> <small><?php echo 'Links inside the current website'; ?></small></h3><br />
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <td style="text-align: left;">No.</td>
            <td style="text-align: left;"><?php echo 'Link' . "'" . 's URL'; ?></td>
            <td style="text-align: left;"><?php echo 'DoFollow / NoFollow'; ?></td>
        </tr>
    </thead>
    <tbody>
        <?php
        $rawData = "Internal Links\n" . "\n";
        $rawData .= 'No.,' . 'Link' . "'s URL" . ',' . 'DoFollow / NoFollow' . "\n\n";
        foreach ($internal_links as $count => $links) {
            $rawData .= $count . ',' . $links['href'] . ',' . $links['follow_type'] . "\n";
            ?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo (empty(parse_url($links['href'])['host']) ? $_REQUEST['url'] . '/' . ltrim($links['href'], "/") : ltrim($links['href'], "/")); ?></td>
                <td><?php echo $links['follow_type']; ?></td>
            </tr>
        <?php } ?>
    </tbody></table>

<br />
<?php if (isset($external_links)) { ?>
    <h3><?php echo 'External Links'; ?> <small><?php echo 'Links going out of website'; ?></small></h3><br />
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td style="text-align: left;">No.</td>
                <td style="text-align: left;"><?php echo "Link's URL"; ?></td>
                <td style="text-align: left;"><?php echo 'DoFollow / NoFollow'; ?></td>
            </tr>
        </thead>
        <tbody>
            <?php
            $rawData .= "\n" . "\n" . 'External Links' . "\n\n";
            $rawData .= 'No.,' . "Link's URL" . ',' . 'DoFollow / NoFollow' . "\n\n";
            foreach ($external_links as $count => $links) {
                $rawData .= $count . ',' . $links['href'] . ',' . $links['follow_type'] . "\n";
                ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo (empty(parse_url($links['href'])['host']) ? $_REQUEST['url'] . '/' . ltrim($links['href'], "/") : ltrim($links['href'], "/")); ?></td>
                    <td><?php echo $links['follow_type']; ?></td>
                </tr>
            <?php } ?>
        </tbody></table>
<?php } ?>
<?php /*?><br />
<label for="textarea">Raw Data<br /></label>
<textarea name="textarea" rows="30" style="width: 100%;" readonly=""><?php echo $rawData; ?></textarea><?php */?>


