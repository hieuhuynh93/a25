<?php

error_reporting(0);
set_time_limit(0);

include("functions.php");

$download = "";
$download = $_POST['download'];
if ($download != "") {
    $darray = explode("^^^", $download);
    header('Content-type: application/vnd.ms-excel');
    header('Content-disposition: attachment; filename="data.xls"');
    foreach ($darray as $value) {
        $value = trim(strip_tags($value));
        if ($value != "") {
            echo utf8_decode($value) . "\n";
        }
    }
    exit();
}

//if($_POST){

$keyword = "";
$keyword = strtolower(trim(strip_tags($_REQUEST["url"])));

if ($keyword == "" || $keyword == "enter keyword...") {

    echo '<p id="error">Please enter any keyword!</p>';
} else {
    $data = "";
    $count = "1";

    foreach (range('a', 'z') as $letter) {

        $suggestions = suggest($keyword . " " . $letter);

        foreach ($suggestions as $s) {

            $data .= '
		<tr class="tr_' . $count . '">
	       <td class="first">' . $count . '</td>
	       <td class="keywords_td" align="left">' . $s . '</td>
	       <td class="td_org last" align="center"><a href="https://play.google.com/store/search?q=' . urlencode($s) . '" target="_blank" class="live">Top Apps</a></td>
	    </tr>		
		';
            $count++;
        }
    }


    $html = <<<EOF
	
   	<table class="table table-striped table-bordered p-0" id="results_table" width="700" align="center" border="0" cellpadding="5" cellspacing="0">
	    <tr class="odd-row">
	        <th class="first" width="10%">#</th>
	        <th width="70%" align="left">Keyword</th>
	        <th class="last" width="20%" align="center">Live Results</th>
	    </tr>
	
	    $data

	</table>
	<!--<a class="button" href="#" onclick="download_xls(); return false;">Export XLS</a>-->
EOF;

    echo $html;
}
//}
?>
