<?php
require_once 'simple_dom.php';
require_once 'all_functions.php';
?>
<br/>
<?php
if (isset($_REQUEST['url'])) {
    $google_stats = google_stats(clean_url($_REQUEST['url']));

    $pagespeed = $google_stats['page_speed'];
    $numRes = $google_stats['numberResources'];
    $numHosts = $google_stats['numberHosts'];
    $totalBytes = $google_stats['totalRequestBytes'];
    $numStatic = $google_stats['numberStaticResources'];
    $htmlBytes = $google_stats['htmlResponseBytes'];
    $otwBytes = $google_stats['overTheWireResponseBytes'];
    $cssBytes = $google_stats['cssResponseBytes'];
    $imageBytes = $google_stats['imageResponseBytes'];
    $jsBytes = $google_stats['javascriptResponseBytes'];
    $otherBytes = $google_stats['otherResponseBytes'];
    $numJS = $google_stats['numberJsResources'];
    $numCSS = $google_stats['numberCssResources'];
    $numTRT = $google_stats['numTotalRoundTrips'];
    $numRBRT = $google_stats['numRenderBlockingRoundTrips'];
}
?>
<table style='background-color: white;box-shadow: 0 2px 2px 0 gray;' class="table table-striped">
    <tbody class='table-bordered'>
        <tr>
            <td>Page Speed: </td>
            <td><?php echo $pagespeed; ?></td>
        </tr>
        <tr>
            <td>Number Resources: </td>
            <td><?php echo $numRes; ?></td>
        </tr>
        <tr>
            <td>Number Hosts: </td>
            <td><?php echo $numHosts; ?></td>
        </tr>
        <tr>
            <td>Total Request: </td>
            <td><?php echo round(($totalBytes / 1024), 2) . ' KB'; ?></td>
        </tr>
        <tr>
            <td>Number Static Resources: </td>
            <td><?php echo $numStatic; ?></td>
        </tr>
        <tr>
            <td>HTML Response: </td>
            <td><?php echo round(($htmlBytes / 1024), 2) . ' KB'; ?></td>
        </tr>
        <tr>
            <td>CSS Response: </td>
            <td><?php echo round(($cssBytes / 1024), 2) . ' KB'; ?></td>
        </tr>
        <tr>
            <td>Image Response: </td>
            <td><?php echo round(($imageBytes / 1024), 2) . ' KB'; ?></td>
        </tr>
        <tr>
            <td>JavaScript Response: </td>
            <td><?php echo round(($jsBytes / 1024), 2) . ' KB'; ?></td>
        </tr>
        <tr>
            <td>Other Response: </td>
            <td><?php echo round(($otherBytes / 1024), 2) . ' KB'; ?></td>
        </tr>
        <tr>
            <td>Number JS Resources: </td>
            <td><?php echo (!isset($numJS) ? '0' : $numJS); ?></td>
        </tr>
        <tr>
            <td>Number CSS Resources: </td>
            <td><?php echo (!isset($numCSS) ? '0' : $numCSS); ?></td>
        </tr>
    </tbody>
</table>