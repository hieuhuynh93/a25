<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'all_functions.php';
require_once 'simple_html_dom.php';

if (isset($_REQUEST['url'])) {
    $my_url = raino_trim($_REQUEST['url']);
    $my_url = clean_url($my_url);
    $my_url = "https://$my_url";
    if (filter_var($my_url, FILTER_VALIDATE_URL) === false) {
        $error = 'Error';
    } else {
        $regUserInput = $my_url;
        $outData = checkPageSpeed($my_url);
        $timeTaken = $outData[0];
        $allLinks = $outData[1];
        $cssLinks = $outData[2];
        $imgLinks = $outData[3];
        $scriptLinks = $outData[4];
        $otherLinks = $outData[5];
    }
}
?>
<table class="table table-bordered table-hover table-striped">
    <tbody>
        <tr>
            <td><?php echo 'URL'; ?></td>
            <td><strong><?php echo $my_url; ?></strong></td>
        </tr>
        <tr>
            <td><?php echo 'Time Taken'; ?></td>
            <td><strong><?php echo $timeTaken; ?> Sec</strong></td>
        </tr>
    </tbody>
</table>

<table class="table table-bordered table-hover table-striped">
    <tbody>
        <tr>
            <td><?php echo 'CSS Links'; ?></td>
            <td><strong><?php echo count($cssLinks); ?></strong></td>
        </tr>
        <tr>
            <td><?php echo 'Script Links'; ?></td>
            <td><strong><?php echo count($scriptLinks); ?></strong></td>
        </tr>
        <tr>
            <td><?php echo 'Image Links'; ?></td>
            <td><strong><?php echo count($imgLinks); ?></strong></td>
        </tr>

        <tr> 
            <td><?php echo 'Other Links'; ?></td>
            <td><strong><?php echo count($otherLinks); ?></strong></td>
        </tr>

    </tbody>

</table>
<br />
<?php if (count($cssLinks) > 0) { ?>
    <h4><?php echo 'CSS Links'; ?></h4>
    <table class="table table-hover table-striped table-responsive col-sm-10" style="margin-bottom: 30px;">
        <thead>
            <tr>
                <th><?php echo 'Link Type'; ?></th>
                <th><?php echo 'URL'; ?></th>
                <th><?php echo 'Load Time'; ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($cssLinks as $cssLink) {
                ?>
                <tr>
                    <td><?php echo $cssLink[0]; ?></td>
                    <td><?php echo $cssLink[1]; ?></td>
                    <td><?php echo $cssLink[2]; ?> Sec</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
<?php } ?>
<?php if (count($imgLinks) > 0) { ?>
    <h4><?php echo 'Image Links'; ?></h4>
    <table class="table table-hover table-striped table-responsive col-sm-10" style="margin-bottom: 30px;">
        <thead>
            <tr>
                <th><?php echo 'Link Type'; ?></th>
                <th><?php echo 'URL'; ?></th>
                <th><?php echo 'Load Time'; ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($imgLinks as $imgLink) {
                ?>
                <tr>
                    <td><?php echo $imgLink[0]; ?></td>
                    <td><?php echo $imgLink[1]; ?></td>
                    <td><?php echo $imgLink[2]; ?> Sec</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
<?php } ?>
<?php if (count($scriptLinks) > 0) { ?>
    <h4><?php echo 'Script Links'; ?></h4>
    <table class="table table-hover table-striped table-responsive col-sm-10" style="margin-bottom: 30px;">
        <thead>
            <tr>
                <th><?php echo 'Link Type'; ?></th>
                <th><?php echo 'URL'; ?></th>
                <th><?php echo 'Load Time'; ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($scriptLinks as $scriptLink) {
                ?>
                <tr>
                    <td><?php echo $scriptLink[0]; ?></td>
                    <td><?php echo $scriptLink[1]; ?></td>
                    <td><?php echo $scriptLink[2]; ?> Sec</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
<?php } ?>
<?php if (count($otherLinks) > 0) { ?>
    <h4><?php echo 'Other Links'; ?></h4>
    <table class="table table-hover table-striped table-responsive col-sm-10" style="margin-bottom: 30px;">
        <thead>
            <tr>
                <th><?php echo 'Link Type'; ?></th>
                <th><?php echo 'URL'; ?></th>
                <th><?php echo 'Load Time'; ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($otherLinks as $otherLink) {
                ?>
                <tr>
                    <td><?php echo $otherLink[0]; ?></td>
                    <td><?php echo $otherLink[1]; ?></td>
                    <td><?php echo $otherLink[2]; ?> Sec</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
<?php } ?>
<br />