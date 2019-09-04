<?php
require_once 'all_functions.php';

if (isset($_REQUEST['url'])) {

    $url = $_REQUEST['url'];
    $url = raino_trim($url);
    $url = clean_url($url);

    $alexa = getAlexaRank($url);
    $save['alexaLocal'] = $alexa['local']['rank'];
    $save['alexaLocalCountry'] = $alexa['local']['country'];
    $save['alexaGlobal'] = $alexa['global']['rank'];
    $save['uniqueVisitsDaily'] = round(pow($alexa['local']['rank'], -0.732) * 6000000);
    $save['uniqueVisitsMonthly'] = round((pow($alexa['local']['rank'], -0.732) * 6000000) * 28);
    $save['uniqueVisitsYearly'] = round((pow($alexa['local']['rank'], -0.732) * 6000000) * 324);
    $save['pagesViewsDaily'] = round($save['uniqueVisitsDaily'] * 1.85);
    $save['pagesViewsMonthly'] = round(($save['uniqueVisitsDaily'] * 1.85) * 28.5);
    $save['pagesViewsYearly'] = round($save['pagesViewsMonthly'] * 11.789473684);

    $save['incomeDaily'] = round(($save['uniqueVisitsDaily'] * 0.017) * 0.07);
    if ($save['alexaLocal'] <= 1000)
        $save['incomeDaily'] = $save['incomeDaily'] * 1.5;
    if ($save['alexaLocal'] <= 100)
        $save['incomeDaily'] = $save['incomeDaily'] * 2;

    $save['incomeMonthly'] = round($save['incomeDaily'] * 25);
    $save['incomeYearly'] = round($save['incomeDaily'] * 264);
}
?>
<h5>Estimation Traffic & Earnings </h5>
<table class='table table-bordered' style='text-align: center;'>
    <tr class='text-success col-sm-3'>
        <th style='border-bottom: 1px solid gray;border-right: 1px solid gray;'><i class='fas fa-ruler-combined text-dark'></i></th>
        <th style='border-bottom: 1px solid gray;'>Unique Visits</th>
        <th style='border-bottom: 1px solid gray;'>Page Views</th>
        <th style='border-bottom: 1px solid gray;'>Income</th>
    </tr>
    <tr>
        <td class='text-primary' style='border-right: 1px solid gray;'> Daily </td>
        <td><?php echo number_format($save['uniqueVisitsDaily']); ?></td>
        <td><?php echo number_format($save['pagesViewsDaily']); ?></td>
        <td><?php echo '$ ' . number_format($save['incomeDaily']); ?></td>
    </tr>
    <tr>
        <td class='text-primary' style='border-right: 1px solid gray;'> Monthly </td>
        <td><?php echo number_format($save['uniqueVisitsMonthly']); ?></td>
        <td><?php echo number_format($save['pagesViewsMonthly']); ?></td>
        <td><?php echo '$ ' . number_format($save['incomeMonthly']); ?></td>
    </tr>
    <tr>
        <td class='text-primary' style='border-right: 1px solid gray;'> Yearly </td>
        <td><?php echo number_format($save['uniqueVisitsYearly']); ?></td>
        <td><?php echo number_format($save['pagesViewsYearly']); ?></td>
        <td><?php echo '$ ' . number_format($save['incomeYearly']); ?></td>
    </tr>

</table>