<?php

error_reporting(0);
set_time_limit(0);

include("functions.php");

$download = "";
$download = $_REQUEST['download'];
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


$domain = "";
$domain = $_REQUEST['domain'];
if ($domain != "") {
    $result = "";
    $com = $domain . ".com";
    $net = $domain . ".net";

    $ip = gethostbyname($com);
    if ($ip == $com)
        $result = "0-";
    else
        $result = "1-";

    $ip = gethostbyname($net);
    if ($ip == $net)
        $result .= "0";
    else
        $result .= "1";

    echo $result;
    exit();
}



    $keyword = "";
    $keyword = strtolower(trim(strip_tags($_REQUEST["keyword"])));

    $site = "";
    $site = strtolower(trim(strip_tags($_REQUEST["site"])));

    if ($keyword == "" || $keyword == "enter keyword...") {

        echo '<p id="error">Please enter any keyword!</p>';
    } else {
        $data = "";
        $count = "1";

        foreach (range('a', 'z') as $letter) {

            $suggestions = suggest($keyword . " " . $letter, $site);

            foreach ($suggestions as $s) {

                $s = trim(strip_tags($s));
                $data .= '
		<tr>
	       <td class="first">' . $count . '</td>
	       <td class="keywords_td" align="left">' . $s . '</td>
		   <td class="td_com" align="center">...</td>
           <td class="td_net" align="center">...<script type="text/javascript">check_domain("' . str_replace(" ", "", $s) . '", "tr_' . $count . '");</script></td>	       
	       <td class="td_org last" align="center"><a href="' . generate_link($s, $site) . '" target="_blank" class="live">Top Listings</a></td>
	    </tr>		
		';
                $count++;
            }
        }


        $html = <<<EOF
	
   	<table id="results_table" width="100%" align="center" class="table center-aligned-table mb-0">
	    <tr class="odd-row">
	        <th class="first" width="10%">#</th>
	        <th width="40%" align="left">Keyword</th>
        	<th width="15%" align="center">.COM</th>
        	<th width="15%" align="center">.NET</th>	        
	        <th class="last" width="20%" align="center">Live Results</th>
	    </tr>
	
	    $data

	</table>
	<!--<a class="button" href="#" onclick="download_xls(); return false;">Export XLS</a>-->
EOF;

        echo $html;
    }

?>
