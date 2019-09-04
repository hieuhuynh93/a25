<?php
require_once 'all_functions.php';

ini_set('max_execution_time', 120);

if (isset($_REQUEST['url'])) {

    $domain = clean_url($_REQUEST['url']);
    $keyword = $_REQUEST['keyword'];
    $google = googleRank($domain, $keyword);
    $yahoo = yahooRank($domain, $keyword);
    $bing = bingRank($domain, $keyword);
}
?>

<table class="table table-responsive table-striped">

    <tbody style='box-shadow: 2px 3px 2px 2px gray;'>
        <tr>
            <td><?php echo 'Domain:'; ?> </td>
            <td><?php echo 'Keyword:'; ?> </td>
            <td><?php echo 'Google Position:'; ?> </td>
            <td><?php echo 'Yahoo Position:'; ?> </td>
            <td><?php echo 'Bing Position:'; ?> </td>
        </tr>
        <tr>
            <td><?php echo ucfirst($domain); ?> </td>
            <td><?php echo $keyword; ?> </td>
            <td><?php
if (substr($google[1], -1) == '1')
    echo $google[1] . "st Position";
else if (substr($google[1], -1) == '2')
    echo $google[1] . "nd Position";
else if (substr($google[1], -1) == '3')
    echo $google[1] . "rd Position";
else if (substr($google[1], 0, 1) == 'N')
    echo $google[1] . "";
else if (substr($google[1], 0) == '')
    echo 'Not Found';
?> </td>
            <td><?php
                if (substr($yahoo[1], -1) == '1')
                    echo $yahoo[1] . "st Position";
                else if (substr($yahoo[1], -1) == '2')
                    echo $yahoo[1] . "nd Position";
                else if (substr($yahoo[1], -1) == '3')
                    echo $yahoo[1] . "rd Position";
                else if (substr($yahoo[1], 0, 1) == 'N')
                    echo $yahoo[1] . "";
                else if (substr($yahoo[1], 0) == '')
                    echo 'Not Found';
?> </td>
            <td><?php
                if (substr($bing[1], -1) == '1')
                    echo $bing[1] . "st Position";
                else if (substr($bing[1], -1) == '2')
                    echo $bing[1] . "nd Position";
                else if (substr($bing[1], -1) == '3')
                    echo $bing[1] . "rd Position";
                else if (substr($bing[1], 0, 1) == 'N')
                    echo $bing[1] . "";
?> </td>
        </tr>
    </tbody>
</table>
