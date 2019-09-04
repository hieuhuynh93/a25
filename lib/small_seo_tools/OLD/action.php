<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>

.progress{
    width: 150px;
    height: 150px;
    line-height: 150px;
    background: none;
    margin: 0 auto;
    box-shadow: none;
    position: relative;
}
.progress:after{
    content: "";
    width: 100%;
    height: 100%;
    border-radius: 50%;
    border: 12px solid #fff;
    position: absolute;
    top: 0;
    left: 0;
}
.progress > span{
    width: 50%;
    height: 100%;
    overflow: hidden;
    position: absolute;
    top: 0;
    z-index: 1;
}
.progress .progress-left{
    left: 0;
}
.progress .progress-bar{
    width: 100%;
    height: 100%;
    background: none;
    border-width: 12px;
    border-style: solid;
    position: absolute;
    top: 0;
}
.progress .progress-left .progress-bar{
    left: 100%;
    border-top-right-radius: 80px;
    border-bottom-right-radius: 80px;
    border-left: 0;
    -webkit-transform-origin: center left;
    transform-origin: center left;
}
.progress .progress-right{
    right: 0;
}
.progress .progress-right .progress-bar{
    left: -100%;
    border-top-left-radius: 80px;
    border-bottom-left-radius: 80px;
    border-right: 0;
    -webkit-transform-origin: center right;
    transform-origin: center right;
    animation: loading-1 1.8s linear forwards;
}
.progress .progress-value{
    width: 90%;
    height: 90%;
    border-radius: 50%;
    background: lightgray;
    font-size: 40px;
    color: black;
    font-weight: bold;
    line-height: 135px;
    text-align: center;
    position: absolute;
    top: 5%;
    left: 5%;
}
.progress.blue .progress-bar{
    border-color: #049dff;
}
.progress.blue .progress-left .progress-bar{
    animation: loading-2 1.5s linear forwards 1.8s;
}
.progress.yellow .progress-bar{
    border-color: #fdba04;
}
.progress.yellow .progress-left .progress-bar{
    animation: loading-3 1s linear forwards 1.8s;
}
.progress.pink .progress-bar{
    border-color: #ed687c;
}
.progress.pink .progress-left .progress-bar{
    animation: loading-4 0.4s linear forwards 1.8s;
}
.progress.green .progress-bar{
    border-color: #1abc9c;
}
.progress.green .progress-left .progress-bar{
    animation: loading-5 1.2s linear forwards 1.8s;
}
@keyframes loading-1{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(180deg);
        transform: rotate(180deg);
    }
}
@keyframes loading-2{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(144deg);
        transform: rotate(144deg);
    }
}
@keyframes loading-3{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(90deg);
        transform: rotate(90deg);
    }
}
@keyframes loading-4{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(36deg);
        transform: rotate(36deg);
    }
}
@keyframes loading-5{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(126deg);
        transform: rotate(126deg);
    }
}
@media only screen and (max-width: 990px){
    .progress{ margin-bottom: 20px; }
}

</style>

<?php

require_once 'dbconn.php';
require_once 'simple_html_dom.php';
require_once 'all_functions.php';

ini_set('max_execution_time', 600);

if(isset($_POST['view'])){
    $sql = 'SELECT name FROM domains WHERE ID = '.$_POST['id'];
    $qry1 = mysqli_query($conn,$sql);
}

function all_actions($url){

$url = clean_url($url);

$technologies = getBuiltWith($url);
?>
<div class='container-fluid'><?php
///////////////////////////////
//ALEXA RAW DATA//
///////////////////////////////
/*
$alexa_data_full = alexa_raw_data($url);

$global_rank = $alexa_data_full["global_rank"];
    $country_rank = $alexa_data_full["country_rank"];
    $country = $alexa_data_full["country"];
    $traffic_rank_graph = $alexa_data_full["traffic_rank_graph"];
    $country_name = $alexa_data_full["country_name"];
    $country_percent_visitor = $alexa_data_full["country_percent_visitor"];
    $country_in_rank = $alexa_data_full["country_in_rank"];
    $bounce_rate = $alexa_data_full["bounce_rate"];
    $page_view_per_visitor = $alexa_data_full["page_view_per_visitor"];
    $daily_time_on_the_site = $alexa_data_full["daily_time_on_the_site"];
    $visitor_percent_from_searchengine = $alexa_data_full["visitor_percent_from_searchengine"];
    $search_engine_percentage_graph = $alexa_data_full["search_engine_percentage_graph"];
    $keyword_name = $alexa_data_full["keyword_name"];
    $keyword_percent_of_search_traffic = $alexa_data_full["keyword_percent_of_search_traffic"];
    $upstream_site_name = $alexa_data_full["upstream_site_name"];
    $upstream_percent_unique_visits = $alexa_data_full["upstream_percent_unique_visits"];
    $total_site_linking_in = $alexa_data_full["total_site_linking_in"];
    $linking_in_site_name = $alexa_data_full["linking_in_site_name"];
    $linking_in_site_address = $alexa_data_full["linking_in_site_address"];
    $subdomain_name = $alexa_data_full["subdomain_name"];
    $subdomain_percent_visitors = $alexa_data_full["subdomain_percent_visitors"];
    $status = $alexa_data_full["status"];
?>

<?php
///////////////////////////////
//BACKLINK MAKER//
///////////////////////////////

$dblinks = file_get_contents('backlink.txt');
$arr = explode(" ", $dblinks);
for($i = 0; $i < count($arr); $i++){
    $arr[$i] = str_replace('{host}',$url,$arr[$i]);
}
?>
<table class='table table-responsive table-striped'>
    <thead>
        <th> No. </th>
        <th> Pages Containing Backlink </th>
        <th> Status </th>
    </thead>
    <tbody>
        <?php for($i = 0; $i < count($arr); $i++) { ?>
        <tr>
        <td><?php echo $i+1; ?></td>
        <td><?php echo '<a style="color: blue;" target="_blank" href="' . $arr[$i] . '">' . $arr[$i] . '</a>'; ?></td>
        <td class='text-success'><?php 
        $file_headers = @get_headers($arr[$i]);
        if(!$file_headers || $file_headers[0] == 'HTTP/1.1 200 OK') {
            echo '<b class="text-success">Success</b>';
        }
        else {
            echo '<b class="text-danger">Error</b>';
        }
        ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php
////////////////////////////////
//BLACKLIST LOOKUP//
////////////////////////////////

$my_url = parse_url('http://www.' . $url);
$host = $my_url['host'];
$getHostIP = gethostbyname($host);
$myHost = ucfirst(str_replace('www.','',$host));
$dataArr = dnsblookup($getHostIP);
$outArr = $dataArr[0];
$overAll = $dataArr[1];

?>
<table class="table table-bordered">
                            <tbody>
                                    <tr>
                                        <td><?php echo 'Domain:'; ?> </td>
                                        <td><strong><?php echo $myHost; ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo 'Domain IP:'; ?> </td>
                                        <td><strong><?php echo $getHostIP; ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo "Overall"; ?>: </td>
                                        <?php 
                                        if ($overAll == 1)
                                        echo '<td style="color:#c0392b; font-weight:bold;">Listed</td>';
                                        else
                                        echo '<td style="color:#27ae60; font-weight:bold;">Not Listed</td>';
                                        ?>
                                    </tr>
                                </tbody>
                    </table>
                    <br />
                         <table class="table table-hover table-bordered table-striped">
                            <thead>
                                <th>#</th>
                                <th><?php echo 'SPAM Database Server'; ?></th>
                                <th><?php echo 'Not Listed'; ?></th>
                            </thead>
                                    <tbody>
                                    <?php $loop=1; foreach($outArr as $outData){ ?>
                                    <tr>
                                        <td><?php echo $loop; ?></td>
                                        <td><strong><?php echo $outData[0]; ?></strong></td>
                                        <?php
                                        if ($outData[1] == 1){
                                            //Listed
                                            echo '<td style="color:#c0392b; font-weight:bold;">Listed</td>';
                                        }else{
                                            //Not Listed
                                            echo '<td style="color:#27ae60; font-weight:bold;">Not Listed</td>';
                                        }
                                        ?>
                                    </tr>
                                    <?php $loop++; } ?>
                                    </tbody>
                         </table>
<?php
////////////////////////////
//BROKEN LINKS FINDER
////////////////////////////

define('HDOM_TYPE_ELEMENT', 1);
define('HDOM_TYPE_COMMENT', 2);
define('HDOM_TYPE_TEXT', 3);
define('HDOM_TYPE_ENDTAG', 4);
define('HDOM_TYPE_ROOT', 5);
define('HDOM_TYPE_UNKNOWN', 6);
define('HDOM_QUOTE_DOUBLE', 0);
define('HDOM_QUOTE_SINGLE', 1);
define('HDOM_QUOTE_NO', 3);
define('HDOM_INFO_BEGIN', 0);
define('HDOM_INFO_END', 1);
define('HDOM_INFO_QUOTE', 2);
define('HDOM_INFO_SPACE', 3);
define('HDOM_INFO_TEXT', 4);
define('HDOM_INFO_INNER', 5);
define('HDOM_INFO_OUTER', 6);
define('HDOM_INFO_ENDSPACE', 7);
define('DEFAULT_TARGET_CHARSET', 'UTF-8');
define('DEFAULT_BR_TEXT', "\r\n");
define('DEFAULT_SPAN_TEXT', " ");
//define('MAX_FILE_SIZE', 600000);
define('MAX_FILE_SIZE', 99999999999999);

$my_url = raino_trim($url);
if (substr($my_url, 0, 7) !== 'http://' && substr($my_url, 0, 8) !== 'https://')
$my_url = 'http://' . $my_url;
if (filter_var($my_url, FILTER_VALIDATE_URL) === false) {
$error = 'Error';
} else {
$brokenLinks = getBrokenLinks($my_url);
if (is_array($brokenLinks)) {
$regUserInput = $my_url;
$internalLinks = $brokenLinks[0];
$externalLinks = $brokenLinks[1];
} else {
$error = 'Error';
}
}
?>
<h3>Domain Name: <?php echo $my_url; ?></h3><br />
                <?php if(isset($internalLinks[0])) { ?>
                <h4><?php echo 'Broken Internal Links'; ?><small> <?php echo 'Links inside the current website'; ?> </small></h4>
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="text-align: left;"><?php echo 'URL'; ?></th>
                            <th style="text-align: left;"><?php echo 'Status Code'; ?></th>
                            <th style="text-align: left;"><?php echo 'Status'; ?></th>
                        </tr>
                    </thead>
                    <tbody>
    <?php
    foreach ($internalLinks as $internalLink) {
        ?>
                            <tr>
                                <td><?php echo $internalLink[0]; ?></td>
                                <td style="color: <?php echo $internalLink[2]; ?>;"><?php echo $internalLink[1]; ?></td>
                                <td style="color: <?php echo $internalLink[2]; ?>;"><?php echo ($internalLink[1] == 404) ? 'Broken' : 'Okay'; ?></td>
                            </tr>
        <?php
    }
    ?>
                    </tbody>
                </table>

                <?php } if(isset($externalLinks[0])) { ?>
                <h4><?php echo 'Broken External Links'; ?><small> <?php echo 'Links going outside the current website'; ?> </small></h4>
                <table class="table table-hover table-bordered table-striped" style="margin-bottom: 30px;">
                    <thead>
                        <tr>
                            <th style="text-align: left;"><?php echo 'URL'; ?></th>
                            <th style="text-align: left;"><?php echo 'Status Code'; ?></th>
                            <th style="text-align: left;"><?php echo 'Status'; ?></th>
                        </tr>
                    </thead>
                    <tbody>
    <?php
    foreach ($externalLinks as $externalLink) {
        ?>
                            <tr>
                                <td><?php echo $externalLink[0]; ?></td>
                                <td style="color: <?php echo $externalLink[2]; ?>;"><?php echo $externalLink[1]; ?></td>
                                <td style="color: <?php echo $externalLink[2]; ?>;"><?php echo ($externalLink[1] == 404) ? 'Broken' : 'Okay'; ?></td>
                            </tr>
        <?php
    }
    ?>
                    </tbody>
                </table>
<?php
    }
/////////////////////////////
//WEBSITE INFORMATION//
/////////////////////////////

$technologies = getBuiltWith($url);
$obj = new KD();
        $obj->domain = clean_url($url);
        $resdata = $obj->result();

        foreach ($resdata as $outData1) {
            @$outData1['keyword'] = Trim($outData1['keyword']);
            if ($outData1['keyword'] != null || $outData1['keyword'] != "") {

                $blockChars1 = array('~', '=', '+', '?', ':', '_', '[', ']', '"', '.', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '<', '>', '{', '}', '|', '\\', '/', ',');
                $blockedStr1 = false;
                foreach ($blockChars1 as $blockChar1) {
                    if (str_contains($outData1['keyword'], $blockChar1)) {
                        $blockedStr1 = true;
                        break;
                    }
                }
                //if (ctype_alnum($outData['keyword'])) {
                if (!preg_match('/[0-9]+/', $outData1['keyword'])) {
                    if (!$blockedStr1)
                        $outArr1[] = array($outData1['keyword'], $outData1['count'], $outData1['percent']);
                }
            }
        }
        $outCount = count($outArr1);
        if ($outCount == 0) {
            $error = 'No Data';
        }
    $stats = getStatsData($url, $technologies);
?>
<div class="table-bordered" id="meta" style='box-shadow:0 2px 2px 0 gray;padding: 10px;background-color: white;'>
        <div class="row p-t-2 ">
            <div class="col-lg-4">

                <strong><i class="zmdi zmdi-dot-circle  check"></i> <?php echo ("Charset"); ?></strong>
                <small class="text-muted d-block subtitle"><?php echo ("Encoding"); ?></small>
            </div>
            <?php if ($stats['charset']) { ?>
            <div class="col-lg-8 text-muted">
                <?php echo ("<i style='color: green;'>Great</i>, language/character encoding is specified:"); ?>  <strong><i class="zmdi zmdi-check"></i> <?php echo mb_strtoupper($stats['charset']); ?></strong>
            </div>
        </div><br />
    <?php } else { ?>
            <div class="col-lg-8 text-muted">
                <?php echo ("<i style='color: red;'>Oops</i>, language/character encoding is not specified:"); ?>  <strong><i class="zmdi zmdi-close"></i> <?php echo ' None'; ?></strong>
            </div>
        <br />
    <?php } ?>

    <div class="row p-t-2 ">
        <div class="col-lg-4">
            <?php
            $metaTitle = validateLenght($stats['metaTitle'], 60, 5);
            ?>
            <strong><i class="zmdi <?php echo $metaTitle['icon']; ?> <?php echo $metaTitle['color']; ?> check"></i> <?php echo ("Title Tag"); ?></strong>
            <small class="text-muted d-block subtitle"><?php echo number_format($metaTitle['lenght']); ?> <?php echo ("Characters"); ?></small>
        </div>
        <div class="col-lg-8 text-muted">
            <?php echo $metaTitle['fixed']; ?>
        </div>
    </div><br />

    <div class="row  p-t-2">
        <div class="col-lg-4">

            <?php
            $metaDescription = validateLenght($stats['metaDescription'], 150, 10);
            ?>

            <strong><i class="zmdi <?php echo $metaDescription['icon']; ?> <?php echo $metaDescription['color']; ?> check"></i> <?php echo ("Meta Description"); ?></strong>
            <small class="text-muted d-block subtitle"><?php echo number_format($metaDescription['lenght']); ?> <?php echo ("Characters"); ?></small>
        </div>
        <div class="col-lg-8 text-muted">
            <?php echo $metaDescription['fixed']; ?>

        </div>
    </div><br />


    <?php if ($stats['url_real']) { ?>
        <div class="row p-t-2 ">
            <div class="col-lg-4 ">
                <?php
                $url_real = validateLenght($stats['url_real'], 50, 1);
                ?>
                <strong><i class="zmdi zmdi-dot-circle  check"></i> <?php echo ("Effective URL"); ?></strong>
                <small class="text-muted d-block subtitle"><?php echo number_format($url_real['lenght']); ?> <?php echo ("Characters"); ?></small>
            </div>
            <div class="col-lg-8 text-muted">
                <?php echo "<a style='color: blue;' href='" . $stats['url_real'] . "'>" . $stats['url_real'] . "</a>"; ?>
            </div>
        </div><br />
    <?php } ?>


    <?php
    $body_excerpt = badWords(more($stats['body'], 250));
    if (strlen($body_excerpt) < 20)
        $body_excerpt = false;
    ?>
    <?php if ($body_excerpt) { ?>
        <div class="row  p-t-2">
            <div class="col-lg-4">


                <strong><i class="zmdi  zmdi-dot-circle  check"></i> <?php echo ("Excerpt"); ?></strong>
                <small class="text-muted d-block subtitle"><?php echo ("Page content"); ?></small>
            </div>
            <div class="col-lg-8 text-muted">
                <?php echo $body_excerpt; ?>

            </div>
        </div><br />
    <?php } ?>



    <?php if ($stats['metaKeywords'] != '') { ?>
        <div class="row  p-t-2">
            <div class="col-lg-4">
                <?php
                $keywords = explode(",", $stats['metaKeywords']);
                $keywordsCount = count($keywords);
                if ($stats['metaKeywords'] == '') {
                    $keywords = false;
                    $keywordsCount = 0;
                }
                ?>
                <strong><i class="zmdi zmdi-tag text-muted check"></i> <?php echo ("Meta Keywords"); ?></strong>
                <small class="text-muted d-block subtitle"><?php echo ($keywordsCount); ?> <?php echo ("Detected"); ?></small>
            </div>
            <div class="col-lg-8">
                <?php
                foreach ($keywords as $key => $value) {
                    $value = rtrim(ltrim(badWords($value)));
                    if (trim($value) != '') {
                        ?>
                        <?php echo $value . ', '; ?>
                        <?php
                    }
                }
                ?>


            </div>
        </div><br />
    <?php } ?>

    <?php
    $keyw = $outArr1;
        ?>
        <div class="row  p-t-2">
            <div class="col-lg-4">
                <?php ?>
                <strong><i class="zmdi zmdi-tag text-muted check"></i> <?php echo ("Keywords Cloud"); ?></strong>
                <small class="text-muted d-block subtitle"><?php echo ("Density"); ?></small>
            </div>
            <div class="col-lg-8">
                <?php
                $count = 0;
                foreach ($keyw as $value) {
                    if($count == 10)
                        break;
                        $count++;
                    $value[0] = badWords($value[0]);
                    if (trim($value[0]) != '') {
                        ?>
                        <span  class="keyword-cloud" style='margin-left: 2%;'><?php echo more($value[0], 30); ?> <span style='color: white;' class="value animated zoomIn badge bg-success"><?php echo $value[1]; ?></span></span>
                        <?php
                    }
                }
                ?>


            </div>
        </div><br />


        <div class="row  p-t-2">
            <div class="col-lg-4">
                <?php
                $keyw = $outArr1;
                ?>
                <strong><i class="zmdi zmdi-badge-check check"></i> <?php echo ("Keyword Consistency"); ?></strong>
                <small class= "d-block subtitle"><?php echo ("Keyword density is one of the main terms in SEO"); ?></small>
            </div>
            <div class="col-lg-8">
                <table class="consistency table table-responsive">
                    <tr class="header">
                        <td><?php echo ("Keyword"); ?></td>
                        <td class="text-xs-center"><?php echo ("Frequency"); ?></td>
                        <td class="text-xs-center"><?php echo ("Title"); ?></td>
                        <td class="text-xs-center"><?php echo ("Description"); ?></td>
                        <td class="text-xs-center"><?php echo ("Domain"); ?></td>
                        <td class="text-xs-center"><?php echo ("H1"); ?></td>
                        <td class="text-xs-center"><?php echo ("H2"); ?></td>
                        <td class="text-xs-center"><?php echo ("H3"); ?></td>
                        <td class="text-xs-center"><?php echo ("H4"); ?></td>
                    </tr>
                    <?php
                    $count1 = 0;
                    foreach ($keyw as $value) {
                        if($count1 == 10)
                        break;
                        $count1++;
                        ?>
                        <tr>
                            <td><i class="zmdi zmdi-tag text-muted check"></i> <?php echo more(badWords($value[0]), 20); ?></td>
                            <td class="text-center "><?php echo $value[1]; ?></td>
                            <td class="text-center">
                                <?php
                                if (mb_strpos(mb_strtolower($stats['metaTitle']), mb_strtolower($value[0])) !== FALSE) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i> 
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i> 
                                    <?php
                                }
                                ?>
                            </td>

                            <td class="text-center">
                                <?php
                                if (mb_strpos(mb_strtolower($stats['metaDescription']), mb_strtolower($value[0])) !== FALSE) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i> 
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i> 
                                    <?php
                                }
                                ?>
                            </td>

                            <td class="text-center">
                                <?php
                                if (mb_strpos(mb_strtolower($stats['url']), mb_strtolower($value[0])) !== FALSE) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i> 
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i> 
                                    <?php
                                }
                                ?>
                            </td>	

                            <td class="text-center">
                                <?php
                                if (inHX($stats['body'], $value[0], "h1")) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i> 
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i> 
                                    <?php
                                }
                                ?>
                            </td>
                            
                            <td class="text-center">
                                <?php
                                if (inHX($stats['body'], $value[0], "h2")) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i> 
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i> 
                                    <?php
                                }
                                ?>
                            </td>
                            
                            <td class="text-center">
                                <?php
                                if (inHX($stats['body'], $value[0], "h3")) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i> 
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i> 
                                    <?php
                                }
                                ?>
                            </td>

                            <td class="text-center">
                                <?php
                                if (inHX($stats['body'], $value[0], "h4")) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i> 
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i> 
                                    <?php
                                }
                                ?>
                            </td>


                        </tr>
                        <?php
                    }
                    ?>
                </table>


            </div>
        </div><br />
    <div class="row  p-t-2">
        <div class="col-lg-4">
            <strong><i class="zmdi zmdi-eye text-muted check"></i> <?php echo ("Google Preview"); ?></strong>
            <small class="text-muted d-block subtitle"><?php echo ("Your website looks like this in google search result "); ?></small>
        </div>
        <div class="card col-lg-7" style='border: 3px solid lightgray;'>
            <div class="gsearch">
                <div style='color: blue;font-size: 18px;' class="title"><?php
                    if ($stats['metaTitle']) {
                        echo $stats['metaTitle'];
                    } else {
                        echo badWords($stats['url']);
                    }
                    ?></div>
                <?php
                $site_url = $stats['url'];
                if ($stats['url_real'])
                    $site_url = $stats['url_real'];
                ?>
                <div style='color: green;font-weight: bold;' class="url"><?php echo badWords($site_url); ?></div>
                <div class="desc">
                    <?php
                    if ($stats['metaDescription']) {
                        echo $stats['metaDescription'];
                    } else {
                        echo $body_excerpt;
                    }
                    ?>
                </div>
            </div>

        </div>
    </div><br />

    <?php
    $detected[0] = ("File Not Found");
    $detected[1] = ("File Detected");
    ?>
    <div class="row  p-t-2">
        <div class="col-lg-4">
            <strong><i class="zmdi <?php echo getIcon($stats['robots'], 0); ?> <?php echo getColor($stats['robots'], 0); ?> check"></i> <?php echo ("Robots.txt"); ?></strong>
            <small class="text-muted d-block subtitle"><?php echo $detected[$stats['robots']]; ?></small>
        </div>
        <div class="col-lg-8">
            <a style='color: blue;' href="#">http://<?php echo $stats['url']; ?>/robots.txt</a>						
        </div>
    </div><br />


    <div class="row  p-t-2">
        <div class="col-lg-4">
            <strong><i class="zmdi  <?php echo getIcon($stats['sitemap'], 0); ?> <?php echo getColor($stats['sitemap'], 0); ?> check"></i> <?php echo ("Sitemap.xml"); ?></strong>
            <small class="text-muted d-block subtitle"><?php echo $detected[$stats['sitemap']]; ?></small>
        </div>
        <div class="col-lg-8">
            <a style='color: blue;' href="#">http://<?php echo $stats['url']; ?>/sitemap.xml</a>

        </div>
    </div><br />
    <?php /* $whois = json_decode($site->whois);

      if ($whois) {


      $expires_on = getDaysDiff($whois->date->registryExpiryDate, date("Y-m-d H:i:s"));
      $created_on = getDaysDiff($whois->date->creationDate, date("Y-m-d H:i:s"));
      ?>

      <div class="row  p-t-2">
      <div class="col-lg-4">
      <strong><i class="zmdi  <?php echo getIcon($created_on, 360); ?> <?php echo getColor($created_on, 360); ?> check"></i> <?php echo __("Whois"); ?></strong>
      <small class="text-muted d-block subtitle"><?php echo __("Is a query and response protocol that is widely used for querying databases that store the registered users or assignees of an Internet resource, such as a domain name, an IP address block, or an autonomous system"); ?></small>
      </div>
      <div class="col-lg-8">
      <div class="text-muted text-small p-t-0">
      <div class="truncate"><i class="zmdi zmdi-calendar  check"></i> <?php echo __("Updated:"); ?> <?php echo date('Y-m-d', strtotime($whois->date->updatedDate)); ?> / <?php echo ago($whois->date->updatedDate); ?></div>
      <div class="truncate"><i class="zmdi <?php echo getIcon($created_on, 360); ?> <?php echo getColor($created_on, 360); ?>  check"></i> <?php echo __("Create on:"); ?> <?php echo date('Y-m-d', strtotime($whois->date->creationDate)); ?> / <?php echo ago($whois->date->creationDate); ?></div>
      <div class="truncate"><i class="zmdi <?php echo getIcon($expires_on, 90); ?> <?php echo getColor($expires_on, 90); ?> check"></i> <?php echo __("Expires on:"); ?> <?php echo date('Y-m-d', strtotime($whois->date->registryExpiryDate)); ?>  / <?php echo days2h($expires_on); ?></div>
      <?php if ($whois->registrar->registrar) { ?>
      <br>
      <div class="truncate"><i class="zmdi zmdi-user check"></i> <strong><?php echo ($whois->registrar->registrar); ?> ,<?php echo ($whois->registrar->country); ?></strong></div>
      <?php if ($whois->registrar->name) { ?>
      <div class="truncate"><i class="zmdi zmdi-user check"></i> <?php echo __("Registrar Name:"); ?> <?php echo ($whois->registrar->name); ?></div>
      <?php } ?>
      <?php if ($whois->registrar->whoisServer) { ?>
      <div class="truncate"><i class="zmdi zmdi-user check"></i> <?php echo __("Registrar Whois Server:"); ?> <?php echo ($whois->registrar->whoisServer); ?></div>
      <?php } ?>
      <?php if ($whois->registrar->url) { ?>
      <div class="truncate"><i class="zmdi zmdi-user check"></i> <?php echo __("Registrar URL:"); ?> <?php echo ($whois->registrar->url); ?></div>
      <?php } ?>
      <?php if ($whois->registrar->phone) { ?>
      <div class="truncate"><i class="zmdi zmdi-user check"></i> <?php echo __("Registrar Phone:"); ?> <?php echo ($whois->registrar->phone[0]); ?></div>
      <?php } ?>
      <?php if ($whois->registrar->email) { ?>
      <div class="truncate"><i class="zmdi zmdi-user check"></i> <?php echo __("Registrar Email:"); ?> <?php echo ($whois->registrar->email[0]); ?></div>
      <?php } ?>
      <?php if ($whois->registrar->street) { ?>
      <div class="truncate"><i class="zmdi zmdi-user check"></i> <?php echo __("Registrar Address:"); ?> <?php echo ($whois->registrar->street); ?> , <?php echo ($whois->registrar->city); ?></div>
      <?php } ?>
      <?php } ?>
      <?php if ($whois->admin->name) { ?>
      <br>
      <div class="truncate"><i class="zmdi zmdi-user check"></i> <strong><?php echo ($whois->admin->name); ?></strong></div>
      <?php if ($whois->admin->organization) { ?>
      <div class="truncate"><i class="zmdi zmdi-user check"></i> <?php echo __("Admin Organization:"); ?> <?php echo ($whois->admin->organization); ?></div>
      <?php } ?>
      <?php if ($whois->admin->email) { ?>
      <div class="truncate"><i class="zmdi zmdi-user check"></i> <?php echo __("Admin Email:"); ?> <?php echo ($whois->admin->email[0]); ?></div>
      <?php } ?>
      <?php if ($whois->admin->phone) { ?>
      <div class="truncate"><i class="zmdi zmdi-user check"></i> <?php echo __("Admin Phone:"); ?> <?php echo ($whois->admin->phone[0]); ?></div>
      <?php } ?>
      <?php if ($whois->admin->street) { ?>
      <div class="truncate"><i class="zmdi zmdi-user check"></i> <?php echo __("Admin Address:"); ?> <?php echo ($whois->admin->street); ?>, <?php echo ($whois->admin->city); ?></div>
      <?php } ?>

      <?php } ?>
      <?php if ($whois->nameServer) { ?>
      <br>
      <div class="truncate"><i class="zmdi zmdi-user check"></i> <strong>Nameservers</strong></div>
      <?php foreach ($whois->nameServer as $key => $value) {
      ?>
      <div class="truncate"><i class="zmdi zmdi-user check"></i> <?php echo ($value); ?></div>
      <?php
      }
      }
      ?>

      </div>

      </div>
      </div>


      <?php } */ ?>

    <?php
    /*
    $document_size = strBytes($stats['body']);
    $text_size = strBytes(strip_tags($stats['body']));
    $code_size = $document_size - $text_size;
    $text_ratio = (($text_size * 100) / $document_size);
    ?>
    <div class="row  p-t-2">
        <div class="col-lg-4">
            <strong><i class="zmdi  <?php echo getIcon($text_ratio, 20); ?> <?php echo getColor($text_ratio, 20); ?> check"></i> <?php echo ("Page Size"); ?></strong>
            <small class="text-muted d-block subtitle"><?php echo ("Code & Text Ratio"); ?></small>
            <small class="d-block subtitle">
                <progress style='background-color: lightgray;' class="progress-bar progress-bar-striped" value="<?php echo $text_ratio; ?>" max="100"></progress>
            </small>
        </div>
        <div class="col-lg-8">
            <div class="text-muted text-small p-t-0">
                <div class="truncate"><i class="zmdi <?php echo getIcon(2000000, $document_size); ?> <?php echo getColor(2000000, $document_size); ?>  check"></i> <?php echo ("Document Size:"); ?> ~<?php echo formatBytes($document_size); ?></div>
                <div class="truncate"><i class="zmdi <?php echo getIcon($code_size, 20); ?> <?php echo getColor($code_size, 20); ?>  check"></i> <?php echo ("Code Size:"); ?> ~<?php echo formatBytes($code_size); ?></div>
                <div class="truncate"><i class="zmdi <?php echo getIcon($text_ratio, 20); ?> <?php echo getColor($text_ratio, 20); ?>  check"></i> <?php echo ("Text Size:"); ?> ~<?php echo formatBytes($text_size); ?> <strong class=""><?php echo ("Ratio:"); ?> <?php echo number_format($text_ratio, 2); ?>%</strong></div>


            </div>
            </div>

        </div>
    </div>
<?php
//////////////////////////
//CLASS C IP CHECKER//
//////////////////////////

$outData00 = raino_trim($url);
    $regUserInput0 = truncate($outData00, 30, 150);
    $array0 = explode("\n", $outData00);
    $count0 = count($array0);
    $dataCount0 = 0;
    foreach ($array as $url00) {
        if ($url00 == null || $url00 == "") {
            
        } else {
            $url00 = clean_with_www($url00);
            $url00 = Trim("http://$url00");
            if (!filter_var($url00, FILTER_VALIDATE_URL) === false) {
                $dataCount = $dataCount + 1;
                $my_url01 = Trim($url00);
                $url00 = parse_url(Trim('http://.' . $url00));
                $host = $url00['host'];
                $getHostIP01 = gethostbyname($host);
                $class_c = explode(".", $getHostIP01);
                $class_c = $class_c[0] . '.' . $class_c[1] . '.' . $class_c[2];
                $ipList[] = $getHostIP01;
                $classCList[] = $class_c;
                $myHost0 = ucfirst(str_replace('www.', '', $url00));
            }
        }
    }
?>
<table class="table table-hover table-bordered">
        <tbody><tr>
                <th>#</th>
                <th><?php echo 'Host'; ?></th>
                <th><?php echo 'IP'; ?></th>
                <th><?php echo 'Class C'; ?></th>
            </tr>
            <?php for ($i = 0; $i < $dataCount; $i++) { ?>
                <tr>
                    <td><?php echo $i + 1; ?></td>
                    <td><?php echo $myHost0[$i]; ?></td>
                    <td><?php echo $ipList[$i]; ?></td>
                    <td><?php echo $classCList[$i]; ?></td>
                </tr>
            <?php
        } ?>
    </tbody></table>
<?php
///////////////////////////
//DOMAIN AUTHORITY//
///////////////////////////

$outData2 = raino_trim($url);
        $accessID = 'mozscape-6467265d46';
        $secretKey = 'ceb9af1aba21f168cf26ff192927c041';
        if (!$accessID || !$secretKey)
        return 0;
        $expires = time() + 300;
        $stringToSign = $accessID . "\n" . $expires;
        $binarySignature = hash_hmac('sha1', $stringToSign, $secretKey, true);
        $urlSafeSignature = urlencode(base64_encode($binarySignature));
        $objectURL = $outData2;
        $cols = "103079231492";
        $requestUrl = "http://lsapi.seomoz.com/linkscape/url-metrics/" . urlencode($objectURL)
            . "?Cols=" . $cols . "&AccessID=" . $accessID . "&Expires=" . $expires . "&Signature=" . $urlSafeSignature;
        $options = array(
            CURLOPT_RETURNTRANSFER => true
        );
        $ch = curl_init($requestUrl);
        curl_setopt_array($ch, $options);
        $content = (curl_exec($ch));
        curl_close($ch);
        $array1 = explode(',', $content);
        $umrp = explode(":", $array1[1]);
        $pa = explode(":", $array1[3]);
        $da = explode(":", $array1[4]);
?>
<table class='table table-bordered table-striped'>
                <tr>
                    <th>URL</th>
                    <th>DA</th>
                </tr>
                <tr>
                    <td><?php echo ucfirst($url); ?></td>
                    <?php if((int)$da[1] >= 60) { ?>
                    <td class='text-success'><b><?php echo (int)$da[1]; ?></b></td>
                    <?php } ?>
                    <?php if((int)$da[1] < 60 && (int)$da[1] >= 30) { ?>
                    <td class='text-warning'><b><?php echo (int)$da[1]; ?></b></td>
                    <?php } ?>
                    <?php if((int)$da[1] < 30) { ?>
                    <td class='text-danger'><b><?php echo (int)$da[1]; ?></b></td>
                    <?php } ?>
                </tr>
            </table>
<?php
/////////////////////////
//DNS RECORDS//
/////////////////////////

$my_url02 = raino_trim($url);
            $my_url02 = "http://" . clean_url($my_url);
            if (filter_var($my_url, FILTER_VALIDATE_URL) === false) {
            $error = 'Error';
            }else {
            $regUserInput = $my_url;
            $my_url5 = parse_url($my_url02);
            $host = $my_url5['host'];
            $myHost1 = ucfirst($host);
            $outData11 = dns_get_record($host, DNS_ALL);
foreach($outData11 as $ress){ ?>
        <table class="table table-hover table-responsive table-striped" style="margin-bottom: 30px;">
        <tbody>
           <?php foreach($ress as $res=>$name){
        ?>
        <tr>
            <td><?php echo ucfirst($res); ?></td>
            <td><strong><?php if(!is_array($name)) echo $name; else echo $entry = implode(' , ',$name); ?></strong></td>
        </tr>
        <?php } ?>
        </tbody></table> 
        <?php } } ?>
<?php
///////////////////////
//DOMAIN AGE CHECKER//
///////////////////////

$my_url = raino_trim($url);
$my_url = "http://".clean_url($my_url);
if (filter_var($my_url, FILTER_VALIDATE_URL) === false) {
$error = 'Error';
}else {
$regUserInput = $my_url;
$my_url = parse_url($my_url);
$host = $my_url['host'];
$myHost7 = ucfirst($host);
$whois= new whois;
$site = $whois->cleanUrl($host);
$whois_data = $whois->whoislookup($site);
$domainAge = $whois_data[1];
$createdDate = $whois_data[2];
$updatedDate = $whois_data[3];
$expiredDate = $whois_data[4];
}
?>
<table class="table table-bordered table-hover">
           <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo 'Value'; ?></th>
                </tr>
           </thead>
            <tbody>
                    <tr>
                        <td><?php echo 'Domain'; ?></td>
                        <td><strong style="color: #c0392b;"><?php echo $myHost7; ?></strong></td>
                    </tr>
                    <tr>
                        <td><?php echo 'Domain Age'; ?></td>
                        <td><strong><?php echo $domainAge; ?></strong></td>
                    </tr>

                    <tr>
                        <td><?php echo 'Domain Created Date'; ?></td>
                        <td><strong><?php echo $createdDate; ?></strong></td>
                    </tr>
                    <tr>
                        <td><?php echo 'Domain Updated Date'; ?></td>
                        <td><strong><?php echo $updatedDate; ?></strong></td>
                    </tr>
                    <tr>
                        <td><?php echo 'Domain Expiry Date'; ?></td>
                        <td><strong><?php echo $expiredDate; ?></strong></td>
                    </tr>
                    
                </tbody>
                
            </table>
<?php
/////////////////////////////
//DOMAIN HOSTING CHECKER//
/////////////////////////////

$regUserInput = $url;
$my_url6 = parse_url('http://www.' . $url);
$hosta = $my_url6['host'];
$myHost3 = ucfirst($hosta);
$getHostIP1 = gethostbyname($hosta);
$data_list1 = host_info($hosta);
$domain_isp1 = $data_list1[2];
?>
<table class="table table-hover table-bordered">
                                    <tbody><tr>
                                        <th><?php echo 'Domain'; ?></th>
                                        <th><?php echo 'IP'; ?></th>
                                        <th><?php echo 'Service Provider'; ?></th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $myHost3; ?></td>
                                        <td><?php echo $getHostIP1; ?></td>
                                        <td><?php echo $domain_isp1; ?></td>
                                    </tr>
                                </tbody></table>
<?php
////////////////////////////
//DOMAIN INTO IP//
////////////////////////////

$regUserInput = $url;
$my_url8 = parse_url('http://www.' . $url);
$hostb = $my_url8['host'];
$myHost4 = ucfirst($hostb);
$getHostIP2 = gethostbyname($hostb);
$data_list2 = host_info($hostb);
$domain_ip = $data_list2[0];
$domain_country = $data_list2[1];
$domain_isp2 = $data_list2[2];
?>
<table class="table table-hover table-bordered">
                <tbody><tr>
                        <th><?php echo 'Domain'; ?></th>
                        <th><?php echo 'IP'; ?></th>
                        <th><?php echo 'Country'; ?></th>
                        <th><?php echo 'ISP'; ?></th>
                    </tr>
                    <tr>
                        <td><?php echo $myHost4; ?></td>
                        <td><?php echo $getHostIP2; ?></td>
                        <td><?php echo $domain_country; ?></td>
                        <td><?php echo $domain_isp2; ?></td>
                    </tr>
                </tbody></table>
<?php
/////////////////////////////
//EMAIL PRIVACY//
/////////////////////////////

$regUserInput = $url;
$content = curlGET($url);
if($content==null || $content == ""){
$error = 'Error';
}else{
preg_match_all("/([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})/", $content, $matches,PREG_SET_ORDER);
if(count($matches) == 0){
$noEmail = 'Success, No Emails found.';
}else{
foreach($matches as $email){
$emailList[] = $email[0];
}
}
}
?>
<p><?php echo 'URL'; ?>: <strong><?php echo ucfirst($url); ?></strong> </p>
           <?php if(isset($noEmail)){ ?>
           <p><?php echo 'Status'; ?>: <strong style="color:green;"><?php echo $noEmail; ?></strong> </p>
           <br />
           <div class="text-center"> 
           <img  src="images/okay.png" alt="success" title="Success" />
           </div>
           <?php } else { ?>
           <p><?php echo 'Status'; ?>: <strong style="color:red;"><?php echo 'Email Found!'; ?></strong> </p>
           <br />
             <table class="table table-striped table-responsive">
                    <thead>
                          <tr>
                            <th>No.</th>
                            <th><?php echo 'Email ID'; ?></th>
                        </tr>
                    </thead>
                        <tbody>
                        <?php $loopCount = 1; foreach($emailList as $email) { ?>
                        <tr>
                            <td><?php echo $loopCount; ?></td>
                            <td><strong><?php echo $email; ?></strong></td>
                        </tr>
                        <?php $loopCount = $loopCount +1; } ?>
             </tbody></table>
<?php
}
///////////////////////////
//GET SOURCE CODE//
///////////////////////////

$regUserInput = $url;
$outData3 = curlGET($url);

?>
<div class="box box-success">
                    <div class="box-header">

                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <strong><?php echo 'URL:'; ?></strong>  <?php echo $url; ?> <br /> <br />
                        <strong><?php echo 'Source Code:'; ?></strong> <br />
                        <textarea id="textArea" rows="15" class="form-control" readonly=""><?php
                            echo htmlspecialchars($outData3);
                            ?></textarea>
                    </div><!-- /.box-body -->

                </div>
<?php
////////////////////////////
//GOOGLE CACHE CHECKER//
////////////////////////////

$url11 = raino_trim($url);
$url11 = 'http://' . $url11;
$cache = googleCache($url11);

?>
<table class='table table-bordered' style='text-align: center;'>
                <tr>
                    <th> URL </th>
                    <th> Last Cached </th>
                </tr>
                <tr>
            <td style='text-align: center;'><?php echo ucfirst($url); ?></td>
            <td style='text-align: center;' class='text-success'><b><?php echo $cache; ?></b></td>
            </tr>
            </table>
<?php
/////////////////////////////
//GOOGLE PAGESPEED STATS//
/////////////////////////////

$google_stats = google_stats($url);

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
                                <td><?php echo round(($totalBytes/1024),2) . ' KB'; ?></td>
                            </tr>
                            <tr>
                                <td>Number Static Resources: </td>
                                <td><?php echo $numStatic; ?></td>
                            </tr>
                            <tr>
                                <td>HTML Response: </td>
                                <td><?php echo round(($htmlBytes/1024),2) . ' KB'; ?></td>
                            </tr>
                            <tr>
                                <td>CSS Response: </td>
                                <td><?php echo round(($cssBytes/1024),2) . ' KB'; ?></td>
                            </tr>
                            <tr>
                                <td>Image Response: </td>
                                <td><?php echo round(($imageBytes/1024),2) . ' KB'; ?></td>
                            </tr>
                            <tr>
                                <td>JavaScript Response: </td>
                                <td><?php echo round(($jsBytes/1024),2) . ' KB'; ?></td>
                            </tr>
                            <tr>
                                <td>Other Response: </td>
                                <td><?php echo round(($otherBytes/1024),2) . ' KB'; ?></td>
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
<?php
/////////////////////////////
//GOOGLE INDEX CHECKER//
/////////////////////////////

$regUserInput = $url;
$my_url = parse_url('http://' . $url);
$host = $my_url['host'];
$myHost01 = ucfirst($host);
$outData = googleIndex($host);

?>
<table class="table table-bordered table-hover">
            <tbody>
            <tr>
                <td><strong><?php echo 'Domain'; ?></strong></td>
                <td><?php echo $myHost01; ?></td>
            </tr>
            <tr>
                <td><strong><?php echo 'Google Indexed'; ?></strong></td>
                <td><?php echo $outData; ?><?php echo ' Pages'; ?></td>
            </tr>
            </tbody>
        </table>
<?php
////////////////////////////
//HEADERS RESPONSE//
////////////////////////////

$headers = get_headers('https://www.' . $url);

?>
<table class='table table-bordered table-striped' style='box-shadow:0 2px 2px 0 gray;padding: 10px;background-color: white;'>
                <tr>
                    <th><h1> Your Website's Header Response <br /><br /></h1></th>
                </tr>
                    <?php for($i = 0; $i < count($headers); $i++) {
                    if($headers[$i] == 'Connection: close')
                    continue;
                    ?>
                    <tr style='text-align: left;'><td style='color: black;'><?php echo $headers[$i]; ?></td></tr>
                    <?php } ?>
            </table>
            
<?php
/*
///////////////////////////
//KEYWORD DENSITY CHECKER//
///////////////////////////

$regUserInput = $url;
$obj1 = new KD();
$obj1->domain = $url;
$resdata3 = $obj1->result();

                foreach ($resdata3 as $outData4) {
                    $outData4['keyword'] = Trim($outData4['keyword']);
                    if ($outData4['keyword'] != null || $outData4['keyword'] != "") {

                        $blockChars = array('~', '=', '+', '?', ':', '_', '[', ']', '"', '.', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '<', '>', '{', '}', '|', '\\', '/', ',');
                        $blockedStr = false;
                        foreach ($blockChars as $blockChar) {
                            if (str_contains($outData4['keyword'], $blockChar)) {
                                $blockedStr = true;
                                break;
                            }
                        }
                        //if (ctype_alnum($outData['keyword'])) {
                        if (!preg_match('/[0-9]+/', $outData4['keyword'])) {
                            if (!$blockedStr)
                                $outArr4[] = array($outData4['keyword'], $outData4['count'], $outData4['percent']);
                        }
                    }
                }
                $outCount2 = count($outArr4);
                if ($outCount2 == 0) {
                    $error = 'No Data';
                }
                $myUrl = ucfirst(str_replace('www.', '', $url));

?>
<table class="table table-bordered">

                        <tbody>
                            <tr>
                                <td><?php echo 'URL:'; ?> </td>
                                <td><strong> <?php echo $url; ?></strong></td>
                            </tr>
                            <tr>
                                <td><?php echo 'Total Keywords:'; ?> </td>
                                <td><strong> <?php echo $outCount2; ?></strong></td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-bordered">
                        <thead>
                        <th><?php echo 'Keywords'; ?></th>
                        <th><?php echo 'Count'; ?></th>
                        <th><?php echo 'Percentage'; ?></th>
                        </thead>

                        <tbody>
        <?php foreach ($outArr4 as $outVal2) { ?>
                                <tr>
                                    <td><strong><?php echo $outVal2[0]; ?></strong></td>
                                    <td><?php echo $outVal2[1]; ?></td>
                                    <td><?php echo $outVal2[2]; ?>%</td>
                                </tr>
        <?php } ?>
                        </tbody>
                    </table>
<?php
////////////////////////////
//LINK ANALYSIS//
////////////////////////////

$my_url = raino_trim($url);
    if (substr($my_url, 0, 7) !== 'http://' && substr($my_url, 0, 8) !== 'https://')
        $my_url = 'http://' . $my_url;
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
    <?php if(isset($internal_links)) { ?>
    <h3><?php echo 'Internal Links'; ?> <small><?php echo 'Links inside the current website'; ?></small></h3><br />
    <table class="table table-bordered table-responsive">
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
                    <td><?php echo $links['href']; ?></td>
                    <td><?php echo $links['follow_type']; ?></td>
                </tr>
            <?php } ?>
        </tbody></table>

    <br />
    <?php } if(isset($external_links)) { ?>
    <h3><?php echo 'External Links'; ?> <small><?php echo 'Links going out of website'; ?></small></h3><br />
    <table class="table table-bordered table-responsive">
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
                    <td><?php echo $links['href']; ?></td>
                    <td><?php echo $links['follow_type']; ?></td>
                </tr>
            <?php } ?>
        </tbody></table>
<?php
}
/////////////////////////////
//LINK PRICE CALCULATOR//
/////////////////////////////

$outData5 = raino_trim($url);
$regUserInput = truncate($outData5, 30, 150);
$array1 = explode("\n", $outData5);
$count = 0;
foreach ($array1 as $url2) {
    $url2 = clean_with_www($url2);
    $url2 = Trim("http://$url2");
    if (!filter_var($url2, FILTER_VALIDATE_URL) === false) {
        $count++;
        $my_url1[] = Trim($url2);
        $url2 = parse_url(Trim('www.' . $url2));
        $host = $url2['host'];
        $myHost2[] = ucfirst(str_replace('www.', '', $host));
        $alexa = alexaRank($host);
        $alexa_rank = $alexa[0];
        $alexa_rank = ($alexa_rank == 'No Global Rank' ? '0' : $alexa_rank);
        $price[] = "$" . number_format(calPrice($alexa_rank)) . " USD";
    }
}
?>
<h3><?php echo 'Results'; ?> <small> <?php echo 'Price of the website:'; ?></small></h3><br />
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td><?php echo '<b>URL</b>'; ?></td>
                            <td><?php echo '<b>Approximate Price</b>'; ?></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($loop = 0; $loop < $count; $loop++) { ?>
                            <tr>
                                <td><?php echo $myHost2[$loop]; ?></td>
                                <td><?php echo $price[$loop]; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody></table>
<?php
//////////////////////////
//LINKS COUNTER//
//////////////////////////

$regUserInput = $url;
$uriData = doLinkAnalysis($url);
$internal_links = $uriData[0];
$internal_links_count = $uriData[1];
$internal_links_nofollow = $uriData[2];
$external_links = $uriData[3];
$external_links_count = $uriData[4];
$external_links_nofollow = $uriData[5];
$total_links = $uriData[6];
$total_nofollow_links = (int) $internal_links_nofollow + (int) $external_links_nofollow;

?>
<table class="table table-bordered" style='max-width:100%;'>
                            <tbody><tr>
                                    <th><?php echo 'Page URL'; ?></th>
                                    <th><?php echo 'Total Links'; ?></th>
                                    <th><?php echo 'Internal Links'; ?></th>
                                    <th><?php echo 'External Links'; ?></th>
                                </tr>
                                <tr>
                                    <td><?php echo $url; ?></td>
                                    <td><?php echo $total_links; ?></td>
                                    <td><?php echo $internal_links_count; ?></td>
                                    <td><?php echo $external_links_count; ?></td>
                                </tr>
                            </tbody></table>
<?php
///////////////////////////
//META TAGS ANALYZER//
///////////////////////////

$myUrl = $url;
$arr_meta = getMyMeta($myUrl);

?>
<table class="table table-bordered">
            <tbody>
            <tr>
                <td><?php echo 'Page URL'; ?></td>
                <td><?php echo $myUrl; ?></td>
            </tr>
            <tr>
                <td><?php echo 'Meta Title'; ?></td>
                <td><strong><?php echo $arr_meta[0]; ?></strong> <hr class="tableHr" /><span class="green">
                    <?php echo str_replace('[count]', $arr_meta[4] ,'Ideally, your title tag should contain between 10 and 70 characters'); ?></span></td>
            </tr>
            <tr>
                <td><?php echo 'Meta Description'; ?></td>
                <td><strong><?php echo $arr_meta[1]; ?></strong> <hr class="tableHr" /><span class="green">
                    <?php echo str_replace('[count]', $arr_meta[5] ,'Meta descriptions should contain between 160 and 320 characters'); ?></span></td>
            </tr>
            <tr>
                <td><?php echo 'Meta Keywords'; ?></td>
                <td style='word-wrap: break-word;'><strong><?php echo $arr_meta[2]; ?></strong></td>
            </tr>
            <tr>
                <td><?php echo 'Meta Viewport'; ?></td>
                <td><strong><?php echo $arr_meta[6]; ?></strong></td>
            </tr>
            <?php if($arr_meta[8] != ''){ ?>
            <tr>
                <td><?php echo 'Open Graph'; ?></td>
                <td><strong><?php echo $arr_meta[8]; ?></strong></td>
            </tr>
            <?php } if($arr_meta[7] != ''){ ?>
            <tr>
                <td><?php echo 'Open Graph'; ?></td>
                <td><strong><?php echo $arr_meta[7]; ?></strong></td>
            </tr>
            <?php } ?>
        </tbody></table>
<?php
////////////////////////////
//MOZ RANK CHECKER//
////////////////////////////

$outData6 = raino_trim($url);
        $accessID = 'mozscape-6467265d46';
        $secretKey = 'ceb9af1aba21f168cf26ff192927c041';
        if (!$accessID || !$secretKey)
        return 0;
        $expires = time() + 300;
        $stringToSign = $accessID . "\n" . $expires;
        $binarySignature = hash_hmac('sha1', $stringToSign, $secretKey, true);
        $urlSafeSignature = urlencode(base64_encode($binarySignature));
        $objectURL = $outData6;
        $cols = "103079231492";
        $requestUrl = "http://lsapi.seomoz.com/linkscape/url-metrics/" . urlencode($objectURL)
            . "?Cols=" . $cols . "&AccessID=" . $accessID . "&Expires=" . $expires . "&Signature=" . $urlSafeSignature;
        $options = array(
            CURLOPT_RETURNTRANSFER => true
        );
        $ch = curl_init($requestUrl);
        curl_setopt_array($ch, $options);
        $content = (curl_exec($ch));
        curl_close($ch);
        $array2 = explode(',', $content);
        $umrp = explode(":", $array2[1]);
        $pa = explode(":", $array2[3]);
        $da = explode(":", $array2[4]);

?>
<table class='table table-bordered table-striped'>
                <tr>
                    <th>URL</th>
                    <th>MozRank</th>
                    <th>DA</th>
                    <th>PA</th>
                </tr>
                <tr>
                    <td><?php echo ucfirst($url); ?></td>
                    <td><?php echo round($umrp[1],2) ?></td>
                    <td><?php echo (int) $da[1] ?></td>
                    <td><?php echo $pa[1]; ?></td>
                </tr>
            </table>
<?php
////////////////////////
//WHAT IS MY BROWSER//
////////////////////////

//$myUA = $_SERVER['HTTP_USER_AGENT'];
//$outData7 = parse_user_agent($myUA);
//extract($outData7);

?>
<!--table class="table table-responsive table-striped">
                <tbody>
                <tr>
                    <td><strong><?php echo 'Your Browser'; ?></strong></td>
                     <td><?php   echo $browser; ?></td>
    
                </tr>
                <tr>
                    <td><strong><?php echo 'Browser Version'; ?></strong></td>
                    <td><?php   echo $version; ?></td>
    
                </tr>
                <tr>
                   <td><strong><?php echo 'Your OS'; ?></strong></td>
                    <td><?php   echo $platform; ?></td>
                </tr>
                <tr>
                   <td><strong><?php echo 'User Agent'; ?></strong></td>
                   <td><?php   echo $myUA; ?></td>
                </tr>
            </tbody>
                                    
            </table-->
<?php
///////////////////////////
//MY IP ADDRESS//
///////////////////////////

/*$ip = $_SERVER['REMOTE_ADDR'];

$ret1 = host_info($ip);
$isp = $ret1[2];

$url7 = "https://api.kickfire.com/v2/ip2geo?ip={$ip}&key=f565e2d5ddd1a6f9";

$d = file_get_contents($url7);

$data = explode(',' , $d);

$cityArr = explode(':',$data[2]);
$regionArr = explode(':',$data[4]);
$countryArr = explode(':',$data[6]);
$codeArr = explode(':',$data[5]);
$latArr = explode(':',$data[7]);
$lonArr = explode(':',$data[8]);

$city = str_replace('"','',$cityArr[2]);
$region = str_replace('"','',$regionArr[1]);
$country = str_replace('"','',$countryArr[1]);
$code = str_replace('"','',$codeArr[1]);
$lat = str_replace('"','',$latArr[1]);
$lon = str_replace('"','',$lonArr[1]);
$lon = str_replace('}','',$lon);
*/
?>
<!--table class='table table-bordered' style='text-align: center;'>
                <tr>
                    <td><b>Your IP </b></td>
                    <td><?php echo $ip; ?></td>
                </tr>
                <tr>
                    <td><b>City</b></td>
                    <td><?php echo $city; ?></td>
                </tr>
                <tr>
                    <td><b>Region</b></td>
                    <td><?php echo $region; ?></td>
                </tr>
                <tr>
                    <td><b>Country</b></td>
                    <td><?php echo $country; ?></td>
                </tr>
                <tr>
                    <td><b>Country Code</b></td>
                    <td><?php echo $code; ?></td>
                </tr>
                <tr>
                    <td><b>ISP</b></td>
                    <td><?php echo $isp; ?></td>
                </tr>
                <tr>
                    <td><b>Latitude</b></td>
                    <td><?php echo $lat; ?></td>
                </tr>
                <tr>
                    <td><b>Longitude</b></td>
                    <td><?php echo $lon; ?></td>
                </tr>
            </table-->
<?php
/////////////////////////////
//SPEED & OPTIMIZATION TIPS//
/////////////////////////////

/*
$my_url2 = clean_url($url);

$domain = $my_url2;
$technologies = getBuiltWith($domain);

$ret = getStatsData2($domain,$technologies);
$optimize = $ret['optimize'];

?>
<table class='table table-bordered table-striped'>
    <tr><th colspan='2'><h2>Speed & Optimization Tips</h2></th></tr>
    <tr><td colspan='2'><small><b>Website speed has a huge impact on performance, affecting user experiences, conversion rates and even rankings. By reducing page load-times, users are less likely to get distracted and the search engines are more likely to reward you by ranking your pages higher in the SERPs.</b></small></td></tr>
    <tr><td><b>Website Title</b></td><td><?php if($optimize['title'] == 'success') echo 'Congratulations! Your Website Title is Optimized.'; else echo 'Warning! Your Website Title is not Optimized.'; ?></td></tr>
    <tr><td><b>Website Description</b></td><td><?php if($optimize['description'] == 'success') echo 'Congratulations! Your Website Description is Optimized.'; else echo 'Warning! Your Website Description is not Optimized.'; ?></td></tr>
    <tr><td><b>Robots.txt</b></td><td><?php if($optimize['robots'] == 'success') echo 'Congratulations! Your Website has a robots.txt file.'; else echo 'Warning! Your Website doesn\'t have a robots.txt file.'; ?></td></tr>
    <tr><td><b>Sitemap.xml</b></td><td><?php if($optimize['sitemap'] == 'success') echo 'Congratulations! Your Website has a sitemap.xml file..'; else echo 'Warning! Your Website doesn\'t have a sitemap.xml file.'; ?></td></tr>
    <tr><td><b>SSL Secure</b></td><td><?php if($optimize['https'] == 'success') echo 'Congratulations! Your Website has support to HTTPS.'; else echo 'Warning! Your Website doesn\'t have support to HTTPS.'; ?></td></tr>
    <tr><td><b>PageSpeed</b></td><td><?php if($optimize['pageSpeed'] == 'success') echo 'Congratulations! Your Website loads very fast on Desktop devices.'; else echo 'Warning! Your Website doesn\'t load very fast on Desktop devices. Need to improve this.'; ?></td></tr>
    <tr><td><b>PageSpeed Mobile</b></td><td><?php if($optimize['pagespeed_mobile'] == 'success') echo 'Congratulations! Your Website loads very fast on Mobile devices.'; else echo 'Warning! Your Website doesn\'t load very fast on Mobile devices. Need to improve this.'; ?></td></tr>
    <tr><td><b>Headings</b></td><td><?php if($optimize['headers'] == 'success') echo 'Congratulations! Your Website uses H1 & H2 Tags.'; else echo 'Warning! Your Website doesn\'t use H1 & H2 Tags.'; ?></td></tr>
    <tr><td><b>Blacklist</b></td><td><?php if($overAll != '1') echo 'Congratulations! Your Website is Not Blacklisted.'; else echo 'Warning! Your Website is Blacklisted.'; ?></td></tr>
    <tr><td><b>W3C Validator</b></td><td><?php if($optimize['w3c'] == 'success') echo 'Congratulations! Your Website doesn\'t have W3C Errors.'; else echo 'Warning! Your Website has W3C Errors.'; ?></td></tr>
    <tr><td><b>Accelerated Mobile Pages(AMP)</b></td><td><?php if($optimize['hasAMP'] == 'success') echo 'Congratulations! Your Website has an AMP version.'; else echo 'Warning! Your Website doesn\'t have any AMP version.'; ?></td></tr>
    <tr><td><b>Domain Authority</b></td><td><?php if($optimize['domainAuthority'] == 'success') echo 'Congratulations! Your Website has fast Domain Authority.'; else echo 'Warning! Your Website has slow Domain Authority. It is good to have Domain Authority greater than 25.'; ?></td></tr>
    <tr><td><b>GZIP Compress</b></td><td><?php if($optimize['gzip'] == 'success') echo 'Congratulations! Your Website is compressed. This makes faster response for visitors.'; else echo 'Warning! Your Website is not compressed. This makes slower response for visitors.'; ?></td></tr>
    <tr><td><b>Favicon</b></td><td><?php if($optimize['favicon'] == 'success') echo 'Congratulations! Your Website appears to have a Favicon.'; else echo 'Warning! Your Website doesn\'t have a Favicon.'; ?></td></tr>
    <tr><td><b>Broken Links</b></td><td><?php if($optimize['links'] == 'success') echo 'Congratulations! Your Website has no Broken Links.'; else echo 'Warning! Your Website has Broken Links.'; ?></td></tr>
    <tr><td><b>Google Safe</b></td><td><?php if($optimize['google_safe'] == 'success') echo 'Congratulations! Your Website is marked SAFE by Google.'; else echo 'Warning! Your Website is marked UNSAFE by Google.'; ?></td></tr>
</table>
<?php
///////////////////////////
//PAGE AUTHORITY//
///////////////////////////

?>
<table class='table table-bordered table-striped'>
                <tr>
                    <th>URL</th>
                    <th>PA</th>
                </tr>
                <tr>
                    <td><?php echo ucfirst($url); ?></td>
                    <?php if($pa[1] >= 60) { ?>
                    <td class='text-success'><b><?php echo $pa[1]; ?></b></td>
                    <?php } ?>
                    <?php if($pa[1] < 60 && $pa[1] >= 30) { ?>
                    <td class='text-warning'><b><?php echo $pa[1]; ?></b></td>
                    <?php } ?>
                    <?php if($pa[1] < 30) { ?>
                    <td class='text-danger'><b><?php echo $pa[1]; ?></b></td>
                    <?php } ?>
                </tr>
            </table>
<?php
//////////////////////////
//PAGE SIZE CHECKER//
//////////////////////////

$regUserInput = $url;
$size = getPageSize($url);
$kb_size = size_as_kb($size);
$myUrl = ucfirst($url);

?>
<table class="table table-bordered">
            <tbody>
            <tr>
                <td><strong><?php echo 'Page URL'; ?></strong></td>
                <td><?php echo $myUrl; ?></td>
            </tr>
            <tr>
                <td><strong><?php echo 'Page Size (Bytes)'; ?></strong></td>
                <td><?php echo $size; ?></td>
            </tr>
            <tr>
                <td><strong><?php echo 'Page Size (KB)'; ?></strong></td>
                <td>~<?php echo $kb_size; ?> KB</td>
            </tr>
         </tbody></table>
<?php
////////////////////////////
//PAGE SPEED CHECKER//
////////////////////////////

$regUserInput = $url;
$outData8 = checkPageSpeed($url);
$timeTaken = $outData8[0];
$allLinks = $outData8[1];
$cssLinks = $outData8[2];
$imgLinks = $outData8[3];
$scriptLinks = $outData8[4];
$otherLinks = $outData8[5];

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
        <?php if(count($cssLinks) > 0) { ?>
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
					foreach($cssLinks as $cssLink) {
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
		        <?php if(count($imgLinks) > 0) { ?>
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
					foreach($imgLinks as $imgLink) {
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
        <?php if(count($scriptLinks) > 0) { ?>
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
					foreach($scriptLinks as $scriptLink) {
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
<?php if(count($otherLinks) > 0) { ?>
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
					foreach($otherLinks as $otherLink) {
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
<?php
///////////////////////////
//REDIRECT CHECKER//
///////////////////////////

$outData9 = checkRedirect($url, "Good", "Bad - Not Redirecting!");

?>
<table class="table table-bordered" style="text-align: left;">
        <tbody><tr>
                <th><?php echo 'URL'; ?></th>
                <th><?php echo "Redirect Status"; ?></th>
            </tr>
            <tr>
                <td><?php echo ucfirst($url); ?></td>
                <td><?php echo $outData9; ?></td>
            </tr>
        </tbody>
    </table>
<?php
////////////////////////////
//REVERSE IP CHECKER//
////////////////////////////

$regUserInput = $url;
$my_url3 = parse_url('http://www.' . $url);
$host1 = $my_url3['host'];
$getHostIP3 = gethostbyname($host1);
$myHost6 = ucfirst(str_replace('www.', '', $host1));
$revLink1 = reverseIP($getHostIP);
$revCount1 = count($revLink1);

?>
<table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td><?php echo 'Domain Name'; ?></td>
                            <td><?php echo 'Domain IP'; ?></td>
                        </tr>
                        <tr>
                            <td><strong><?php echo $myHost6; ?></strong></td>
                            <td><strong><?php echo $getHostIP3; ?></strong></td>
                        </tr>
                    </tbody>
                </table>

                <?php if ($revCount1 != 0) { ?>
                    <br />
                    <table class="table table-bordered" style="text-align: left;">
                        <thead>
                        <th style="width:20%">No.</th>
                        <th><?php echo 'Reverse Domain Names'; ?></th>
                        </thead>
                        <tbody>
                            <?php
                            $loop = 1;
                            foreach ($revLink1 as $link1) {
                                ?>
                                <tr>
                                    <td style="width: 20%;"><?php echo $loop; ?></td>
                                    <td><?php echo ucfirst(str_replace('www.', '', $link1)); ?></td>
                                </tr>
                                <?php
                                $loop = $loop + 1;
                            }
                            ?>
                        </tbody>
                        </table>
<?php
}
//////////////////////////////
//SERVER STATUS//
//////////////////////////////

$userInput = raino_trim($url);
        $regUserInput = truncate($userInput,30,150);
        $array = explode("\n", $userInput);
        $count = 0;
        foreach ($array as $url3) {
            $url3 = clean_with_www($url3); $url3 = Trim("http://$url3");
            if (!filter_var($url3, FILTER_VALIDATE_URL) === false) {
            $count++;
            $my_url4[] = Trim($url3);
            $url3 = parse_url(Trim($url3));
            $host = $url3['host'];
            $myHost9[] = ucfirst(str_replace('www.','',$host));
            $res = itIsOnline($host);
            $stats[] =($res[0] == true ? "Online" : "Offline");
            $response_time[] = $res[1]." Sec";
            $http_code[] = $res[2];
            }
        }
?>
<table class="table table-bordered">
            <thead>
                <tr>
                    <td><?php echo 'URL'; ?></td>
                    <td><?php echo 'HTTP Code'; ?></td>
                    <td><?php echo 'Response Time'; ?></td>
                    <td><?php echo 'Status'; ?></td>
                </tr>
             </thead>
                <tbody>
                <?php for($loop=0; $loop<$count; $loop++) { ?>
                <tr>
                    <td><?php echo $myHost9[$loop]; ?></td>
                    <td><?php echo $http_code[$loop]; ?></td>
                    <td><?php echo $response_time[$loop]; ?></td>
                    <td><?php echo $stats[$loop]; ?></td>
                </tr>
                <?php } ?>
            </tbody></table>
<?php
////////////////////////
//SERVER RESPONSE//
////////////////////////

$url4 = clean_url($url);
        $url4 = 'http://www.' . $url4;
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url4);
				
				
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,3); 
		curl_setopt($ch, CURLOPT_TIMEOUT, 3); //timeout in seconds
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch, CURLOPT_ENCODING,'gzip');
		//curl_setopt($ch, CURLOPT_NOBODY, true);
		curl_setopt($ch, CURLOPT_HEADER,true);
		curl_setopt($ch, CURLOPT_MAX_RECV_SPEED_LARGE,100000);
		curl_exec($ch);
		$res = curl_getinfo($ch);
		curl_close($ch);

?>
<table class='table table-bordered table-striped'>
                <tr>
                    <th><h1> Your Website's Server Response <br /><br /></h1></th>
                </tr>
                    <?php foreach($res as $key => $value) {
                    if($key == 'certinfo' || $value == '0' || $value == '-1' || $value == '') continue;
                    $key = str_replace('_',' ',$key);
                    if(substr($key,-4) == 'size') {
                        $value .= ' Bytes';
                    }
                    if(substr($key,-4) == 'time') {
                        $value .= ' seconds';
                    }
                    if(substr($key,0,10) == 'namelookup') {
                        $key = 'Name Lookup Time';
                    }
                    if(substr($key,0,11) == 'pretransfer') {
                        $key = 'Pre Transfer Time';
                    }
                    if(substr($key,0,13) == 'starttransfer') {
                        $key = 'Start Transfer Time';
                    }
                    if($key == 'size download') {
                        $key = 'Download Size';
                        $value = round(($value / 1024),1) . ' Kb';
                    }
                    if($key == 'speed download') {
                        $key = 'Download Speed';
                        $value = round(($value / 1024),1) . ' Kb/s';
                    }
                    if($key == 'download content length') {
                        continue;
                    }
                    ?>
                    <tr style='text-align: left;'><td style='color: black;'><?php echo '<i class="fa fa-icon"></i>  <b>' . ucwords($key) . ' :  </b>' . $value; ?></td></tr>
                    <?php } ?>
            </table>
<?php
//////////////////////////////////
//SEARCH ENGINE SPIDER SIMULATOR//
//////////////////////////////////

$regUserInput = $url;
$outData10 = spiderView($url);
$sourceData = $outData10[0];
$meta_title = $outData10[1];
$meta_description = $outData10[2];
$meta_keywords = $outData10[3];
$textData = $outData10[4];
$tags = $outData10[5];
$uriData = doLinkAnalysis($url);	
$internal_links = $uriData[0];

?>
<h4><?php echo 'Meta Content'; ?></h4>
        <table class="table table-responsive table-hover table-striped">
            <tbody>
                    <tr>
                        <td><?php echo 'Meta Title'; ?></td>
                        <td><strong><?php echo $meta_title; ?></strong></td>
                    </tr>
                    <tr>
                        <td><?php echo 'Meta Description'; ?></td>
                        <td><strong><?php echo $meta_description; ?></strong></td>
                    </tr>
                    <tr>
                        <td><?php echo 'Meta Keywords'; ?></td>
                        <td><strong><?php echo $meta_keywords; ?></strong></td>
                    </tr>
            </tbody>
         </table>

        <br />    
                                         
        <h4><?php if(isset($tags)) echo 'H1 to H4 Tags'; ?></h4>
        <?php
        foreach($tags as $tagName => $tagVals) {
        ?>
		<table class="table table-hover table-striped" style="margin-bottom: 30px;">
			<thead>
				<tr>
					<th class="text-center"><?php echo ucwords($tagName).' Tags '; ?></th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach($tagVals as $tagVal) {
				?>
				<tr>
					<td class="text-center"><?php echo $tagVal; ?></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
		<?php
		}
		?>
        <br />
        <h4><?php echo 'Indexable Links'; ?></h4>
            <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <td style="text-align: left;">No.</td>
                <td style="text-align: left;"><?php echo 'Link' . "'" . 's URL'; ?></td>
            </tr>
        </thead>
        <tbody>
            <?php
            $rawData = "Internal Links\n" . "\n";
            $rawData .= 'No.,' . 'Link' . "'s URL" . ',' . 'DoFollow / NoFollow' . "\n\n";
            if(isset($internal_links))
            foreach ($internal_links as $count => $links) {
                ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $links['href']; ?></td>
                </tr>
            <?php } ?>
        </tbody></table>
        
        <br />
        <h4><?php echo 'Readable Text Content'; ?></h4>
        <textarea rows="12" readonly="" class="form-control"><?php echo $textData; ?></textarea>
        
        <br /><br />
<?php
/////////////////////////////
//SUSPICIOUS DOMAIN CHECKER//
/////////////////////////////

$userInput = raino_trim($url);
$regUserInput = truncate($userInput,30,150);
$array = explode("\n", $userInput);
$count = 0;
$resOut = $resCol = array(); $color = 'danger';
foreach ($array as $url5) {
    $url5 = clean_with_www($url5); $url5 = Trim("http://$url5");
    if (!filter_var($url5, FILTER_VALIDATE_URL) === false) {
    $count++;
    $my_url9 = Trim($url5);
    $url5 = parse_url(Trim($url5));
    $hosty = $url5['host'];
    $myHost8[] = ucfirst(str_replace('www.','',$hosty));
    $stats = checkDomain($hosty);
    if($stats == 'n'){
        $resOut[] = 'Safe Site';
        $color = 'success';
    }
    if($stats == 'l') {
        $resOut[] = 'Low level Unsafe Site';
        }
    if($stats == 'm') {
        $resOut[] = 'Medium level Unsafe Site';
        }
    if($stats == 'h') {
        $resOut[] = 'High level Unsafe Site';
        }
    $resCol[] = $color;
    }
}

?>
<h3><?php echo 'Result '; ?> <small> <?php echo 'Anti-virus stats of each website:'; ?></small></h3><br />
      <table class="table table-bordered">
        <thead>
            <tr>
                <td><b>No.</b></td>
                <td><?php echo '<b>Domain</b>'; ?></td>
                <td><?php echo '<b>Status</b>'; ?></td>
            </tr>
         </thead>
            <tbody>
            <?php for($loop=0; $loop<$count; $loop++) { ?>
            <tr>
                <td><?php echo $loop+1; ?></td>
                <td><?php echo $myHost8[$loop]; ?></td>
                <td><span class="badge bg-<?php echo $resCol[$loop]; ?>"><?php echo $resOut[$loop]; ?></span></td>
            </tr>
            <?php } ?>
        </tbody></table>
<?php
///////////////////////////////
//TRAFFIC & INCOME ESTIMATION//
///////////////////////////////

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
if($save['alexaLocal'] <= 1000)
$save['incomeDaily'] = $save['incomeDaily'] * 1.5;
if($save['alexaLocal'] <= 100)
$save['incomeDaily'] = $save['incomeDaily'] * 2;

$save['incomeMonthly'] = round($save['incomeDaily'] * 25);
$save['incomeYearly'] = round($save['incomeDaily'] * 264);

?>
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
<?php
/////////////////////////
//URL ENCODER DECODER//
/////////////////////////

    $userInput = 'http://www.' . stripslashes($url);
    $regUserInput = truncate($userInput, 30, 150);
    $out_data_e = urlencode($userInput);
    $out_data_d = urldecode($userInput);

?>
<?php echo 'Original URL:  '.ucfirst($url).'<br /><br />Encoded URL'; ?> <br />
    <textarea id="textArea" rows="5" class="form-control" readonly=""><?php echo $out_data_e; ?></textarea><br />
        <?php echo 'Decoded URL'; ?> <br />
    <textarea id="textArea" rows="5" class="form-control" readonly=""><?php echo $out_data_d; ?></textarea>
<?php
/////////////////////////
//WEBSITE DESCRIPTION//
/////////////////////////

$my_url = 'http://www.' . $url;
$ret = getMyMeta($my_url);
$title = $ret[0];
$description = $ret[1];
$keywords = $ret[2];
$openG = $ret[3];
    if(isset($my_url))
    echo " <div><strong>URL: </strong>$my_url</div> \n";
    if(isset($title))
    echo " <div><strong>Title: </strong>$title</div> \n";
    if(isset($description))
    echo " <div><strong>Description: </strong>$description</div>\n";
    if(isset($keywords))
    echo " <div><strong>Keywords: </strong>$keywords</div>\n";
    if($openG)
    echo " <div><strong>Open Graph: </strong>Present</div>\n";
    else
    echo " <div><strong>Open Graph: </strong>Not Present</div>\n";
    */
?>

<?php

$stats1 = getStatsData2($url, $technologies);

/////////////////////////////
//WEBSITE SCREENSHOT//
/////////////////////////////

        $url01 = raino_trim($url);
        $url01 = 'http://' . $url01;
 $strategyd = 'desktop' ;
 $strategym = 'mobile' ;
 $apiReqUrl = 'https://www.googleapis.com/pagespeedonline/v2/runPagespeed';
 $apiKey = 'AIzaSyD1wnxAppbj-riwtLtkTx-jzP-YQkvPsvw' ;
 $curl1 = curl_init();
 curl_setopt($curl1, CURLOPT_URL, $apiReqUrl.'?url='.urlencode($url01).'&key='.$apiKey.'&screenshot=true&strategy='.$strategyd);
 curl_setopt($curl1, CURLOPT_RETURNTRANSFER, TRUE);
 $result=curl_exec($curl1);
 $data1 = json_decode($result, true);
  $curl = curl_init();
 curl_setopt($curl, CURLOPT_URL, $apiReqUrl.'?url='.urlencode($url01).'&key='.$apiKey.'&screenshot=true&strategy='.$strategym);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
 $result=curl_exec($curl);
 $data = json_decode($result, true);
 $img1 = str_replace(array('_','-'), array('/','+'), $data1['screenshot']['data']);
 $img = str_replace(array('_','-'), array('/','+'), $data['screenshot']['data']);

?>
<div class='row mb-30'>
    <table class='table'><tr>
<td class='col-lg-4'><div><table class='table table-bordered' style='text-align:center;'>
        <tr><th style='text-align:center;'>Desktop Screenshot</th></tr>
        <tr><td><img src='data:image/jpeg;base64,<?php echo $img1; ?>' alt='Desktop Screenshot' class='img-fluid' style='border: 4px solid black;'></td></tr>
        <tr><th style='text-align:center;'>Website Score</th></tr>
        <tr><td><div class="progress blue">
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                <div class="progress-value"><?php echo $stats1['score']; ?></div>
            </div></td></tr>
        </table></div></td>
        <td class='col-lg-5'><div>
            <table class='table table-bordered' style='text-align: center;'>
                <tr>
                    <td colspan='3'><h2> Website Status <br /><br /></h2></td>
                </tr>
                <tr>
            <td><h3 style='text-align: center;' class='text-success'><?php echo '<b>Success =>  </b>' . $stats1['success']; ?><br /><small>Success % in Verification Steps</small></h3></td></tr>
            <tr><td><h3 style='text-align: center;' class='text-warning'><?php echo '<b>Warnings =>  </b>' . $stats1['warning']; ?><br /><small>Warnings % in Verification Steps</small></h3></td></tr>
            <tr><td><h3 style='text-align: center;' class='text-danger'><?php echo '<b>Errors =>  </b>' . $stats1['errors']; ?><br /><small>Errors % in Verification Steps</small></h3></td>
            </tr>
            </table>
        </div></td>
<td class='col-lg-3'><div><table class='table table-bordered' style='text-align:center;'>
        <tr><th style='text-align:center;'>Mobile Screenshot</th></tr>
        <tr><td><img src='data:image/jpeg;base64,<?php echo $img; ?>' alt='Mobile Screenshot' class='img-fluid' style='width:70%;height:80%;border: 4px solid black;'></td></tr>
        </table></div></td>
</tr></table>
</div>
<?php
////////////////////////////
//KEYWORD ANALYSIS//
////////////////////////////

$array_spam_keyword = array("as seen on", "buying judgments", "order status", "dig up dirt on friends",
    "additional income", "double your", "earn per week", "home based", "income from home", "money making",
    "opportunity", "while you sleep", "$$$", "beneficiary", "cash", "cents on the dollar", "claims",
    "cost", "discount", "f r e e", "hidden assets", "incredible deal", "loans", "money",
    "mortgage rates", "one hundred percent free", "price", "quote", "save big money", "subject to credit",
    "unsecured debt", "accept credit cards", "credit card offers", "investment decision",
    "no investment", "stock alert", "avoid bankruptcy", "consolidate debt and credit",
    "eliminate debt", "get paid", "lower your mortgage rate", "refinance home", "acceptance",
    "chance", "here", "leave", "maintained", "never", "remove", "satisfaction", "success",
    "dear [email/friend/somebody]", "ad", "click", "click to remove", "email harvest", "increase sales",
    "internet market", "marketing solutions", "month trial offer", "notspam",
    "open", "removal instructions", "search engine listings", "the following form", "undisclosed recipient",
    "we hate spam", "cures baldness", "human growth hormone", "lose weight spam", "online pharmacy",
    "stop snoring", "vicodin", "#1", "4u", "billion dollars", "million", "being a member",
    "cannot be combined with any other offer", "financial freedom", "guarantee",
    "important information regarding", "mail in order form", "nigerian", "no claim forms", "no gimmick",
    "no obligation", "no selling", "not intended", "offer", "priority mail", "produced and sent out",
    "stuff on sale", "they’re just giving it away", "unsolicited", "warranty", "what are you waiting for?",
    "winner", "you are a winner!", "cancel at any time", "get", "print out and fax", "free",
    "free consultation", "free grant money", "free instant", "free membership", "free preview ",
    "free sample ", "all natural", "certified", "fantastic deal", "it’s effective", "real thing",
    "access", "apply online", "can't live without", "don't hesitate", "for you", "great offer", "instant",
    "now", "once in lifetime", "order now", "special promotion", "time limited", "addresses on cd",
    "brand new pager", "celebrity", "legal", "phone", "buy", "clearance", "orders shipped by",
    "meet singles", "be your own boss", "earn $", "expect to earn", "home employment", "make $",
    "online biz opportunity", "potential earnings", "work at home", "affordable",
    "best price", "cash bonus", "cheap", "collect", "credit", "earn", "fast cash",
    "hidden charges", "insurance", "lowest price", "money back", "no cost", "only '$'", "profits",
    "refinance", "save up to", "they keep your money -- no refund!", "us dollars",
    "cards accepted", "explode your business", "no credit check", "requires initial investment",
    "stock disclaimer statement ", "calling creditors", "consolidate your debt", "financially independent",
    "lower interest rate", "lowest insurance rates", "social security number", "accordingly", "dormant",
    "hidden", "lifetime", "medium", "passwords", "reverses", "solution", "teen", "friend",
    "auto email removal", "click below", "direct email", "email marketing",
    "increase traffic", "internet marketing", "mass email", "more internet traffic", "one time mailing",
    "opt in", "sale", "search engines", "this isn't junk", "unsubscribe",
    "web traffic", "diagnostics", "life insurance", "medicine", "removes wrinkles",
    "valium", "weight loss", "100% free", "50% off", "join millions",
    "one hundred percent guaranteed", "billing address", "confidentially on all orders", "gift certificate",
    "have you been turned down?", "in accordance with laws", "message contains", "no age restrictions",
    "no disappointment", "no inventory", "no purchase necessary", "no strings attached", "obligation",
    "per day", "prize", "reserves the right", "terms and conditions", "trial", "vacation",
    "we honor all", "who really wins?", "winning", "you have been selected",
    "compare", "give it away", "see for yourself", "free access", "free dvd", "free hosting",
    "free investment", "free money", "free priority mail", "free trial",
    "all new", "congratulations", "for free", "outstanding values", "risk free",
    "act now!", "call free", "do it today", "for instant access", "get it now",
    "info you requested", "limited time", "now only", "one time", "order today",
    "supplies are limited", "urgent", "beverage", "cable converter", "copy dvds", "luxury car",
    "rolex", "buy direct", "order", "shopper", "score with babes", "compete for your business",
    "earn extra cash", "extra income", "homebased business", "make money", "online degree",
    "university diplomas", "work from home", "bargain", "big bucks", "cashcashcash", "check",
    "compare rates", "credit bureaus", "easy terms", 'for just "$xxx"', "income", "investment",
    "million dollars", "mortgage", "no fees", "pennies a day", "pure profit", "save $",
    "serious cash", "unsecured credit", "why pay more?", "check or money order", "full refund",
    "no hidden costs", "sent in compliance", "stock pick", "collect child support",
    "eliminate bad credit", "get out of debt", "lower monthly payment", "pre-approved",
    "your income", "avoid", "freedom", "home", "lose", "miracle", "problem", "sample",
    "stop", "wife", "hello", "bulk email", "click here", "direct marketing", "form",
    "increase your sales", "marketing", "member", "multi level marketing", "online marketing",
    "performance", "sales", "subscribe", "this isn't spam", "visit our website",
    "will not believe your eyes", "fast viagra delivery", "lose weight",
    "no medical exams", "reverses aging", "viagra", "xanax", "100% satisfied", "billion",
    "join millions of americans", "thousands", "call", "deal", "giving away",
    "if only it were that easy", "long distance phone offer", "name brand", "no catch",
    "no experience", "no middleman", "no questions asked", "no-obligation", "off shore", "per week",
    "prizes", "shopping spree", "the best rates", "unlimited", "vacation offers", "weekend getaway",
    "win", "won", "you’re a winner!", "copy accurately", "print form signature",
    "sign up free today", "free cell phone", "free gift", "free installation",
    "free leads", "free offer", "free quote", "free website", "amazing", "drastically reduced",
    "guaranteed", "promise you", "satisfaction guaranteed", "apply now",
    "call now", "don't delete", "for only", "get started now", "information you requested",
    "new customers only", "offer expires", "only", "please read",
    "take action now", "while supplies last", "bonus", "casino",
    "laser printer", "new domain extensions", "stainless steel"
);

$keyword = content_analysis($url);
$result = array();
    $result['one_phrase'] = json_encode($keyword['one_phrase']);
    $result['two_phrase'] = json_encode($keyword['two_phrase']);
    $result['three_phrase'] = json_encode($keyword['three_phrase']);
    $result['four_phrase'] = json_encode($keyword['four_phrase']);
    $result['total_words'] = $keyword['total_words'];
    $result['domain_name'] = $url;

    $one_phrase = json_decode($result['one_phrase']);
    $two_phrase = json_decode($result['two_phrase']);
    $three_phrase = json_decode($result['three_phrase']);
    $four_phrase = json_decode($result['four_phrase']);
    $total_words = $result['total_words'];

?>
<div class="box box-warning col-lg-12">
                <h3 class="box-title" style="color: blue; word-spacing: 3px;"><?php echo 'KEYWORD ANALYSIS'; ?></h3>
                <h5><?php echo 'Domain Name = ' . $result['domain_name']; ?></h5>
                <h5><?php echo 'Total Words = ' . $result['total_words']; ?></h5>
                <div class="box-body">
                        <div class='row'>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <table class="table table-condensed table-striped">
                            <tr>
                                <th>SINGLE KEYWORDS</th>
                                <th>OCCURRENCES</th>
                                <th>DENSITY</th>
                                <th>KEYWORD STUFFING</th>
                                <th>POSSIBLE SPAM</th>
                                <th><?php echo 'Google<br />Position:'; ?> </th>
                                <th><?php echo 'Yahoo<br />Position:'; ?> </th>
                                <th><?php echo 'Bing<br />Position:'; ?> </th>
                            </tr>
                            <?php foreach ($one_phrase as $key => $value) : ?>
                                <tr>
                                    <td><?php echo $key; ?></td>
                                    <td><?php echo $value; ?></td>
                                    <td><?php
                                        $occurence = ($value / $total_words) * 100;
                                        echo round($occurence, 3) . " %";
                                        ?></td>
                                    <td><?php
                                        $google1 = googleRank($url, $key);
                                        $yahoo1 = yahooRank($url, $key);
                                        $bing1 = bingRank($url, $key);
                                        if (in_array(strtolower($key), $array_spam_keyword))
                                            echo "Yes";
                                        else
                                            echo 'No';
                                        ?>
                                    </td>
                                    <td><?php echo $google1[1]; ?></td>
                                    <td><?php echo $yahoo1[1]; ?></td>
                                    <td><?php echo $bing1[1]; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <table class="table table-condensed table-striped">
                            <tr>
                                <th>2 WORD PHRASES</th>
                                <th>OCCURRENCES</th>
                                <th>DENSITY</th>
                                <th>KEYWORD STUFFING</th>
                                <th>POSSIBLE SPAM</th>
                                <th><?php echo 'Google<br />Position:'; ?> </th>
                                <th><?php echo 'Yahoo<br />Position:'; ?> </th>
                                <th><?php echo 'Bing<br />Position:'; ?> </th>
                            </tr>
                            <?php foreach ($two_phrase as $key => $value) : ?>
                                <tr>
                                    <td><?php echo $key; ?></td>
                                    <td><?php echo $value; ?></td>
                                    <td><?php
                                        $google2 = googleRank($url, $key);
                                        $yahoo2 = yahooRank($url, $key);
                                        $bing2 = bingRank($url, $key);
                                        $occurence = $value / $total_words * 100;
                                        echo round($occurence, 3) . " %";
                                        ?></td>
                                    <td><?php
                                        if (in_array(strtolower($key), $array_spam_keyword))
                                            echo "Yes";
                                        else
                                            echo 'No';
                                        ?>
                                    </td>
                                    <td><?php echo $google2[1]; ?></td>
                                    <td><?php echo $yahoo2[1]; ?></td>
                                    <td><?php echo $bing2[1]; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    </div>
                    <div class='row'>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <table class="table table-condensed table-striped">
                            <tr>
                                <th>3 WORD PHRASES</th>
                                <th>OCCURRENCES</th>
                                <th>DENSITY</th>
                                <th>KEYWORD STUFFING</th>
                                <th>POSSIBLE SPAM</th>
                                <th><?php echo 'Google<br />Position:'; ?> </th>
                                <th><?php echo 'Yahoo<br />Position:'; ?> </th>
                                <th><?php echo 'Bing<br />Position:'; ?> </th>
                            </tr>
                            <?php foreach ($three_phrase as $key => $value) : ?>
                                <tr>
                                    <td><?php echo $key; ?></td>
                                    <td><?php echo $value; ?></td>
                                    <td><?php
                                        $google3 = googleRank($url, $key);
                                        $yahoo3 = yahooRank($url, $key);
                                        $bing3 = bingRank($url, $key);
                                        $occurence = $value / $total_words * 100;
                                        echo round($occurence, 3) . " %";
                                        ?></td>
                                    <td><?php
                                        if (in_array(strtolower($key), $array_spam_keyword))
                                            echo "Yes";
                                        else
                                            echo 'No';
                                        ?>
                                    </td>
                                    <td><?php echo $google3[1]; ?></td>
                                    <td><?php echo $yahoo3[1]; ?></td>
                                    <td><?php echo $bing3[1]; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <table class="table table-condensed table-striped">
                            <tr>
                                <th>4 WORD PHRASES</th>
                                <th>OCCURRENCES</th>
                                <th>DENSITY</th>
                                <th>KEYWORD STUFFING</th>
                                <th>POSSIBLE SPAM</th>
                                <th><?php echo 'Google<br />Position:'; ?> </th>
                                <th><?php echo 'Yahoo<br />Position:'; ?> </th>
                                <th><?php echo 'Bing<br />Position:'; ?> </th>
                            </tr>
                            <?php foreach ($four_phrase as $key => $value) : ?>
                                <tr>
                                    <td><?php echo $key; ?></td>
                                    <td><?php echo $value; ?></td>
                                    <td><?php
                                        $google4 = googleRank($url, $key);
                                        $yahoo4 = yahooRank($url, $key);
                                        $bing4 = bingRank($url, $key);
                                        $occurence = $value / $total_words * 100;
                                        echo round($occurence, 3) . " %";
                                        ?></td>
                                    <td><?php
                                        if (in_array(strtolower($key), $array_spam_keyword))
                                            echo "Yes";
                                        else
                                            echo 'No';
                                        ?>
                                    </td>
                                    <td><?php echo $google4[1]; ?></td>
                                    <td><?php echo $yahoo4[1]; ?></td>
                                    <td><?php echo $bing4[1]; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    </div>

                </div><!-- /.box-body -->
            </div>
<?php
//////////////////////////
//WEBSITE SCORE//
//////////////////////////

?>

<?php
//////////////////////////
//WEBSITE TEST//
//////////////////////////

?>

<?php
////////////////////////
//WHOIS CHECKER//
////////////////////////
/*
$regUserInput = $url;
        $my_url0 = parse_url('http://' . $url);
        $hostc = $my_url0['host'];
        $myHost = ucfirst($hostc);
        $whois = new whois;
        $site = $whois->cleanUrl($hostc);
        $whois_data = $whois->whoislookup($site);
        $whoisData = $whois_data[0];

?>
<table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="heading">
                            <h4><?php echo '<u>Whois Data</u>'; ?></h4>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $myLines = preg_split("/\r\n|\n|\r/", $whoisData);
                    foreach ($myLines as $line0) {
                        if (!empty($line0))
                            echo '<tr><td>' . $line0 . '</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
<?php
/////////////////////////
//XML SITEMAP GENERATOR//
/////////////////////////

                    define("OUTPUT_FILE", "sitemap_" . $url . ".xml");


                // Set the start URL. Example: define ("SITE", "https://www.example.com");
                    define("SITE", 'http://' . $url);


                // Set true or false to define how the script is used.
                // true:  As CLI script.
                // false: As Website script.
                define("CLI", false);


                // Define here the URLs to skip. All URLs that start with the defined URL 
                // will be skipped too.
                // Example: "https://www.example.com/print" will also skip
                //   https://www.example.com/print/bootmanager.html
                $skip_url = array(
                    SITE . "/print",
                    SITE . "/slide",
                );


                // General information for search engines how often they should crawl the page.
                define("FREQUENCY", "weekly");


                // General information for search engines. You have to modify the code to set
                // various priority values for different pages. Currently, the default behavior
                // is that all pages have the same priority.
                define("PRIORITY", "0.5");


                // When your web server does not send the Content-Type header, then set
                // this to 'true'. But I don't suggest this.
                define("IGNORE_EMPTY_CONTENT_TYPE", false);
                define("VERSION", "2.4");
                define("NL", CLI ? "\n" : "<br>");
                                define("AGENT", "Mozilla/5.0 (compatible; Plop PHP XML Sitemap Generator/" . VERSION . ")");
                define("SITE_SCHEME", parse_url(SITE, PHP_URL_SCHEME));
                define("SITE_HOST", parse_url(SITE, PHP_URL_HOST));

                error_reporting(E_ERROR | E_WARNING | E_PARSE);

                $pf = fopen(OUTPUT_FILE, "w");
                if (!$pf) {
                    echo "ERROR: Cannot create " . OUTPUT_FILE . "!" . NL;
                    return;
                }

                fwrite($pf, "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n" .
                        "<!-- Date: " . date("Y-m-d H:i:s") . " -->\n" .
                        "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\"\n" .
                        "        xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"\n" .
                        "        xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9\" >\n" .
                        "  <url>\n" .
                        "    <loc>" . SITE . "/</loc>\n" .
                        "    <changefreq>" . FREQUENCY . "</changefreq>\n" .
                        "    <priority>" . PRIORITY . "</priority>\n" .
                        "  </url>\n");

                echo "Scan Started..." . NL . NL;
                $scanned = array();
                Scan(GetEffectiveURL(SITE));

                fwrite($pf, "</urlset>");
                fclose($pf);

                echo NL . "Done Scanning <u>" . $_SESSION['count'] . "</u> link(s)." . NL. "<small><b>(Invalid Links are Not Scanned or Displayed)</b></small>" . NL . NL;
                $_SESSION['count'] = 1;
                echo '<b>'.OUTPUT_FILE . "</b> created." . NL;
                
                $_SESSION['df'] = OUTPUT_FILE;
*/
?>
</div>
<?php
}

foreach($qry1 as $row)
all_actions($row['name']);
