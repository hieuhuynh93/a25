<?php

error_reporting(0);
set_time_limit(0);

include("functions.php");

$download = "";
$download = $_POST['download'];
if($download != ""){
$darray = unserialize(base64_decode($download));	
header('Content-type: application/vnd.ms-excel');
header('Content-disposition: attachment; filename="report.xls"');
foreach ($darray as $value) {
	echo utf8_decode($value);
}
exit();	
}
		
	
$keywords = "";
$max	  = "20";
$keywords	=	trim(strip_tags($_REQUEST['url']));
$max		=   100;//trim(strip_tags($_POST['max']));
				
if($keywords == ""){
	
	echo '<p id="error">Please enter any keyword!</p>';
	
}else{
?>
<table width="100%" id="box" border="0" align="left" cellpadding="5" cellspacing="0" class="table table-striped table-bordered p-0" style="color: #000000">
  <tr>
    <th width="5%" align="left" class="auto-style7">#</th>
    <th width="15%" align="left" class="auto-style7">Name</th>
    <th width="25%" align="left" class="auto-style7">Address</th>
    <th width="15%" align="left" class="auto-style7">Phone</th>
    <th width="15%" align="left" class="auto-style7">Website</th>
    <th width="10%" align="left" class="auto-style7">Checkins</th>
    <th width="15%" align="left" class="auto-style7">Email</th>    
  </tr>	
	<?php
	$class = "row2";

	$count = 1;
	$xlsData 	= array();
	$xlsData[] = "Name	Address	Phone	Website	Checkins	Facebook URL"."\n";

$data = file_get_contents_curl('https://graph.facebook.com/v3.0/search?access_token='.$facebook_user_access_token.'&pretty=0&type=place&fields=name,location,website,phone,link,checkins&limit='.$max.'&q='.urlencode($keywords));
$response = json_decode($data,true);

foreach($response['data'] as $details){
	
        $name  =  $details['name'];
        $address = "";
        if($details['location']['street'] != "") $address .= $details['location']['street'];
        if($details['location']['city'] != "") $address .= ", ".$details['location']['city'];
        if($details['location']['state'] != "") $address .= ", ".$details['location']['state'];
        if($details['location']['zip'] != "") $address .= " ".$details['location']['zip'];
        if($details['location']['country'] != "") $address .= ", ".$details['location']['country'];
        $website  =  trim($details['website']);
        $lurl = base64_encode($website);
        $phone  =  $details['phone'];
        $link  =  $details['link'];
        $checkins  =  $details['checkins'];       
        $title = "<a href='".$link."' target='_blank'>".$name."</a>";
        $web_link = "<a href='".$website."' target='_blank'>".$website."</a>";
	?>

		<tr class="tr_<?php echo $count; ?>">
		<td><?php echo $count ?></td>
		<td class="auto-style7"><?php echo $title ?></td>
		<td class="auto-style7"><?php echo $address ?></td>
		<td class="auto-style7"><?php echo $phone ?></td>
		<td class="auto-style7"><?php echo $web_link ?></td>
		<td class="auto-style7"><?php echo number_format($checkins) ?></td>
		<td class="td_emails">...<script type="text/javascript">$(document).ready(function(){ find_emails("<?php echo $lurl ?>", "tr_<?php echo $count ?>"); });</script></td>		
		</tr>
	
	<?php
	$xlsData[] = "$name	$address	$phone	$website	$checkins	$link"."\n";
	if($count == $max) break;
	$count++;
	}
	$xlsData = base64_encode(serialize($xlsData));
	?> 
</table>
<?php
}
?>
