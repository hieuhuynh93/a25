<?php

error_reporting(0);
set_time_limit(0);

include("functions.php");



$keyword = "";
$keyword = strtolower(trim(strip_tags($_REQUEST["url"])));
$max = "50";

if ($keyword == "" || $keyword == "enter keyword...") {

    echo '<p id="error">Please enter any keyword!</p>';
} else {
    $data = "";
    $count = "1";



    $content = file_get_contents_curl("https://twitter.com/i/search/typeahead.json?count=" . $max . "&filters=true&q=" . urlencode($keyword) . "&result_type=users&src=SEARCH_BOX");
    $json = json_decode($content, true);


    foreach ($json['users'] as $k) {
        $title = "<a href='https://twitter.com/" . $k['screen_name'] . "' target='_blank'>" . $k['name'] . "</a>";
        $data .= '
		<tr class="tr_' . $count . '">
	       <td class="first">' . $count . '</td>
	       <td class="keywords_td" align="left">' . $title . '</td>
	       <td class="keywords_td" align="left">' . $k['location'] . '</td>
	       <td align="center">' . number_format($k['rounded_score']) . '</td>
	    </tr>		
		';
        $count++;
    }




    $html = <<<EOF
	
   	<table class="table table-hover table-responsive table-striped" id="results_table" width="70%" align="center" border="0" cellpadding="5" cellspacing="0">
	    <tr class="odd-row">
	        <th class="first" width="10%">#</th>
	        <th width="30%" align="left">Name</th>
	        <th width="30%" align="left">Location</th>
	        <th width="30%" align="center">Profile Score</th>
	    </tr>
	
	    $data

	</table><br /><br /><br />
	<!--<iframe id="txtArea1" style="display:none"></iframe><button class="button" id="btnExport" onclick="fnExcelReport();"> EXPORT </button><br /><br /><br />-->
EOF;

    echo $html;
}
?>
