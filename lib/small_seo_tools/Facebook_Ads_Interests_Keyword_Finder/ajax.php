<?php

error_reporting(0);
set_time_limit(0);

include("functions.php");

$download = "";
$download = $_REQUEST['download'];
if ($download != "") {
    $darray = unserialize(base64_decode($download));
    header('Content-type: application/vnd.ms-excel');
    header('Content-disposition: attachment; filename="data.xls"');
    foreach ($darray as $value) {
        $value = str_replace("|DELIMITER|", "	", $value);
        echo utf8_decode($value) . "\n";
    }
    exit();
}


$keyword = "";
$keyword = strtolower(trim(strip_tags($_REQUEST["keyword"])));

if ($keyword == "" || $keyword == "enter keyword...") {

    echo '<p id="error">Please enter any keyword!</p>';
} else {
    $data = "";
    $count = "1";
    $sug = array();
    $sarray[] = "Keyword|DELIMITER|Audience Size|DELIMITER|Topic";
    foreach (range('a', 'z') as $letter) {

        $suggestions = suggest($keyword . " " . $letter);

        foreach ($suggestions as $s) {

            $sug[] = $s;
        }
    }

    $temp_array = array();
    foreach ($sug as $v) {
        if (!isset($temp_array[$v['name']]))
            $temp_array[$v['name']] = $v;
    }

    $sug = array_values($temp_array);

    foreach ($sug as $s) {

        $data .= '
		<tr class="tr_' . $count . '">
	       <td class="first">' . $count . '</td>
	       <td class="keywords_td" align="left">' . $s['name'] . '</td>
	       <td align="center">' . number_format($s['audience_size']) . '</td>
	       <td align="center">' . $s['topic'] . '</td>
	    </tr>		
		';
        $sarray[] = $s['name'] . "|DELIMITER|" . number_format($s['audience_size']) . "|DELIMITER|" . $s['topic'];
        $count++;
    }


    $html = <<<EOF
	
   	<table id="results_table" width="80%" align="center" border="0" cellpadding="5" cellspacing="0">
	    <tr class="odd-row">
	        <th class="first" width="10%">#</th>
	        <th width="45%" align="left">Keyword</th>
	        <th width="20%" align="center">Audience Size</th>
	        <th width="25%" align="center">Topic</th>
	    </tr>
	
	    $data

	</table>
EOF;

    echo $html;
    //echo '<br /><br /><form action="ajax.php" method="POST"><input name="download" type="hidden" value="' . base64_encode(serialize($sarray)) . '" size="30"><input class="button" type="submit" value="Export to Excel"></form><br /><br /><br />';
}
?>
