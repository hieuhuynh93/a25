<?php
error_reporting(0);
set_time_limit(0);

require_once 'functions.php';
require_once 'lib/twitteroauth.php';
require_once 'class.autokeyword.php';


// Replace this value with your Google Youtube Search API key
$youtube_api_key = 'AIzaSyDSXE2q_fB57bixEQlpK5p4Fdn0I7awRlo';

// Replace these values with your Twitter API keys
define('CONSUMER_KEY', 'dnIt0kBQKBotP1vRrljpg');
define('CONSUMER_SECRET', 'N0Nyso2qdavaVi4lbddF9tjzqV3J5hLktYzgKY7UUA');
define('ACCESS_TOKEN', '39519188-qSoWMFpoRTtElr3p13DXcIilXu3wEclbFHfjENbvn');
define('ACCESS_TOKEN_SECRET', '8uPxWIlcR5aCKmSHFTYh1jH8ToLl0jZRw0qQPjuyYvj1t');




$search_term = "";
$search_term = trim($_REQUEST['url']);
$twitter_html = "";
$facebook_html = "";
$youtube_html = "";
$htag_html = "";
$ycount = 0;
$fcount = 0;
$tcount = 0;
$contents = "";
$ttime = 0;
$pcount = 0;
$ref = 0;
$timephrase = 0;
$authors_array = array();
$time_array = array();
$now = time();
$yesterday = $now - (24 * 60 * 60);
$content = file_get_contents_curl("https://www.googleapis.com/youtube/v3/search?maxResults=10&order=date&key=$youtube_api_key&type=video&part=id%2Csnippet&q=" . urlencode($search_term));
$dcontent = json_decode($content);
$total_posts = $dcontent->pageInfo->totalResults;

foreach ($dcontent->items as $value) {
    $title = trim($value->snippet->title);
    $text = trim($value->snippet->description);
    preg_match("#(" . str_replace(" ", "|", $search_term) . ")#is", $text, $match);
    if ($match[0])
        $ref++;
    $contents .= $text;
    $vid = $value->id->videoId;
    $screen_name = $value->snippet->channelTitle;
    $authors_array[] = $screen_name;
    $created_at = $value->snippet->publishedAt;
    $ttime = $ttime + strtotime($created_at);
    $time_array[] = strtotime($created_at);
    if (strtotime($created_at) > $yesterday && $match[0])
        $timephrase++;
    $media_url = $value->snippet->thumbnails->default->url;
    $media_html = "";
    if ($media_url)
        $media_html = '<img src="' . $media_url . '" class="thumbnail">';
    $vurl = "http://www.youtube.com/watch?v=$vid";
    $curl = "http://www.youtube.com/user/$screen_name";
    $youtube_html .= '<div id="results" class=""><div class="result clearfix"><div class="icon"><img class="icon" src="http://youtube.com/favicon.ico" height="16" width="16" /></div><div class="body"><h3><a href="' . $vurl . '" target="_blank" title="' . $title . '">' . $title . '</a></h3>' . $media_html . '<div class="description">' . truncate_string($text, "255", "...") . '</div><div class="info"><p><a href="' . $vurl . '" target="_blank" class="link">' . str_replace("http://", "", $vurl) . '</a><br />' . time_elapsed_string(strtotime($created_at)) . ' ago - by <a href="' . $curl . '" target="_blank">' . $screen_name . '</a> on <a href="http://youtube.com" target="_blank">youtube</a></p></div></div></div>';
    $ycount++;
}





$response = file_get_contents_curl("https://www.reddit.com/search.json?sort=new&limit=15&t=all&q=" . urlencode($search_term));

$jsonobj = json_decode($response, true);


foreach ($jsonobj['data']['children'] as $fkey => $fvalue) {


    $text = trim($fvalue['data']['selftext']);
    $text = truncate_string($text, "255", "...");
    preg_match("#(" . str_replace(" ", "|", $search_term) . ")#is", $text, $match);
    if ($match[0])
        $ref++;
    $contents .= " " . $text;
    $title = trim($fvalue['data']['title']);
    if ($title == "")
        $title = truncate_string($text, "50", "...");
    $screen_name = trim($fvalue['data']['author']);
    $authors_array[] = $screen_name;
    $media_url = trim($fvalue['data']['thumbnail']);
    $created_at = date("Y-m-d H:i:s", trim($fvalue['data']['created_utc']));
    $ttime = $ttime + strtotime($created_at);
    $time_array[] = strtotime($created_at);
    if (strtotime($created_at) > $yesterday && $match[0])
        $timephrase++;


    $status_url = trim($fvalue['data']['url']);
    $media_html = "";
    if (substr($media_url, 0, 4) == "http")
        $media_html = '<img src="' . $media_url . '" height="154" width="154" class="thumbnail">';
    $facebook_html .= '<div id="results" class="">
                            <div class="result clearfix">
                                <div class="icon">
                                    <img class="icon" src="https://www.reddit.com/favicon.ico" height="16" width="16" />
                                </div>
                            <div class="body">
                            <h3><a href="' . $status_url . '" target="_blank" title="' . $title . '">' . $title . '</a></h3>' . $media_html . '
                            <div class="description">' . $text . '</div>
                            <div class="info">
                                <p><a href="' . $status_url . '" target="_blank" class="link">' . str_replace(array("http://", "https://"), "", $status_url) . '</a>
                                    <br />' . time_elapsed_string(strtotime($created_at)) . ' ago - by ' . $screen_name . ' on <a href="http://reddit.com" target="_blank">reddit</a>
                                </p>
                            </div>
                        </div>
                    ';
    $fcount++;
}

function search(array $query) {
    $toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
    return $toa->get('search/tweets', $query);
}

$query = array(
    "q" => $search_term,
    "count" => 10,
    "result_type" => "recent",
    "lang" => "en",
);

$results = search($query);


foreach ($results->statuses as $result) {
    $text = $result->text;
    preg_match("#(" . str_replace(" ", "|", $search_term) . ")#is", $text, $match);
    if ($match[0])
        $ref++;
    $contents .= " " . $text;
    $title = truncate_string($text, "50", "...");
    $screen_name = $result->user->screen_name;
    $authors_array[] = $screen_name;
    $id_str = $result->id_str;
    $media_url = $result->entities->media[0]->media_url;
    $profile_image_url = $result->user->profile_image_url;
    $profile_image_html = "";
    if ($profile_image_url)
        $profile_image_html = ' <img src="' . $profile_image_url . '" class="user_image" />';
    $created_at = $result->created_at;
    $ttime = $ttime + strtotime($created_at);
    $time_array[] = strtotime($created_at);
    if (strtotime($created_at) > $yesterday && $match[0])
        $timephrase++;
    $status_url = "https://twitter.com/$screen_name/status/$id_str";
    $media_html = "";
    if ($media_url)
        $media_html = '<img src="' . $media_url . '" height="154" width="154" class="thumbnail">';
    $twitter_html .= '<div id="results" class=""><div class="result clearfix"><div class="icon"><img class="icon" src="http://twitter.com/favicon.ico" height="16" width="16" /></div><div class="body"><h3><a href="' . $status_url . '" target="_blank" title="' . $title . '">' . $title . '</a></h3>' . $media_html . '<div class="description">' . $text . '</div><div class="info"><p><a href="' . $status_url . '" target="_blank" class="link">' . str_replace("https://", "", $status_url) . '</a><br />' . time_elapsed_string(strtotime($created_at)) . ' ago - by' . $profile_image_html . ' @' . $screen_name . ' on <a href="http://twitter.com" target="_blank">twitter</a></p></div></div></div>';
    $tcount++;
}

$lpost = time_elapsed_string(max($time_array));
if ($lpost == "")
    $lpost = "N/A";

$yper = floor(($ycount / 10) * 100);
$fper = floor(($fcount / 10) * 100);
$tper = floor(($tcount / 10) * 100);

$tpcount = $ycount + $fcount + $tcount;
$pcount = $ycount + $fcount + $tcount;
$avg_time = floor($ttime / $pcount);
if ($avg_time == "")
    $avg_time = "N/A";
if ($avg_time != "N/A")
    $avg_time = time_elapsed_string($avg_time);

$authors_array = array_unique($authors_array);
$authors_count = count($authors_array);



$clean_text = strtolower(webpage2txt($contents));
//$clean_text =  preg_replace('/[^\x21-\x7E]+/', ' ', $clean_text);

$text_array = explode(" ", $clean_text);
$tword_count = "0";
$pword_count = "0";
$nword_count = "0";


foreach ($text_array as $w) {

    if (strlen($w) > 2 && in_array($w, $positive_words)) {


        $pword_count++;
    } elseif (strlen($w) > 2 && in_array($w, $negative_words)) {

        $nword_count++;
    } elseif (strlen($w) > 5) {

        $tword_count++;
    }
}


//foreach($time_array as $tkey => $tval){
//if($tval < $yesterday) unset($time_array[$tkey]);
//}
//$lastday_posts = count($time_array);
$strength_per = ceil(($timephrase / $tpcount) * 100);


$sentiment_ratio = sent_ratio($pword_count, $nword_count);

$passion_per = ceil(($authors_count / $tpcount) * 100);
$passion_per = abs($passion_per - 100);
if ($passion_per == "100")
    $passion_per = "0";

$reach_per = floor(($ref / $tpcount) * 100);

$max_val = max($pword_count, $tword_count, $nword_count);

$twper = floor(($tword_count / $max_val) * 100);
$pwper = floor(($pword_count / $max_val) * 100);
$nwper = floor(($nword_count / $max_val) * 100);

$params['content'] = $clean_text; //page content
//set the length of keywords you like
$params['min_word_length'] = 5;  //minimum length of single words
$params['min_word_occur'] = 1;  //minimum occur of single words

$keyword = new autokeyword($params, "utf-8");

$words = $keyword->parse_words();

$k_html = "";
$ocount = 1;
foreach ($words as $word => $occurance) {
    if ($ocount == "1")
        $foc = $occurance;
    $kper = floor(($occurance / $foc) * 100);
    $k_html .= '<tr>
                    <td width="90" style="overflow:hidden;max-width:90px;">
                        <a href="index.php?q=' . str_replace('"', "", str_replace("#", "", (str_replace(" ", "+", $word)))) . '">' . $word . '</a>
                    </td>
                    <td width="75">
                        <div style="width:' . $kper . 'px;" class="chart_bar">&nbsp;</div>
                    </td>
                    <td width="25" style="text-align:right;">' . $occurance . '</td>
                </tr>';
    if ($ocount == "20")
        break;
    $ocount++;
}

function trends(array $query) {
    $toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
    return $toa->get('trends/place', $query);
}

$query = array(
    "id" => 23424977,
);

$results = trends($query);

foreach ($results[0]->trends as $result) {
    $htag = $result->name;
    $htag_html .= '<tr>
                    <td width="90" style="overflow:hidden;max-width:90px;">
                        <a href="index.php?q=' . str_replace('"', "", str_replace("#", "", (str_replace(" ", "+", $htag)))) . '">' . $htag . '</a>
                    </td>
                    <td width="75">
                        <div style="width:75px;" class="chart_bar">&nbsp;</div>
                    </td>
                    <td width="25" style="text-align:right;">1</td>
                </tr>';
}
?>


<div id="search_line"></div>	
<div id="wrapper" class="clearfix">		
    <div id="header_top_margin"></div>
    <div id="column_left">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">                                                      
                                <i style="color:#007bff;" class="fa fa-check-square highlight-icon" aria-hidden="true"></i>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark"><?php echo $strength_per; ?>%</p>                                                    
                                <h4><label class="badge badge-success">Strength</label></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">                                                      
                                <i style="color:#b3203d;" class="fa fa-check-square highlight-icon" aria-hidden="true"></i>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark"><?php echo $sentiment_ratio; ?></p>                                                    
                                <h4><label class="badge badge-danger">Sentiment</label></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">                                                      
                                <i style="color:#ffc107;" class="fa fa-check-square highlight-icon" aria-hidden="true"></i>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark"><?php echo $passion_per; ?>%</p>                                                    
                                <h4><label class="badge badge-warning">Passion</label></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">                                                      
                                <i style="color:#17a2b8;" class="fa fa-check-square highlight-icon" aria-hidden="true"></i>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark"><?php echo $reach_per; ?>%</p>                                                    
                                <h4><label class="badge badge-info">Reach</label></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card card-statistics h-100">
                    <div class="card-body centered">
                        <?php echo $avg_time; ?> avg. per post
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-statistics h-100">
                    <div class="card-body centered">
                        last post <?php echo $lpost; ?> ago</div>
                    </div>
                </div>
            <div class="col-md-4">
                <div class="card card-statistics h-100">
                    <div class="card-body centered">
                        <?php echo $authors_count; ?> unique authors
                    </div>
                </div>
            </div>
        </div>
        
        <p style="padding: 8px; margin-top: 20px;">Sentiment Analysis about "<?php echo $search_term; ?>"</p>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-statistics h-100">
                    <div class="card-header">Sentiment</div>    
                    <div class="card-body">
                        <div class = "table-responsive">
                           <table id = "datatable-sentiment" class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <td width="90"><a href="#">Positive</a></td>
                                    <td width="75"><div style="width:<?php echo $pwper; ?>px;" class="chart_bar">&nbsp;</div></td>
                                    <td width="25" style="text-align:right;"><?php echo $pword_count; ?></td>
                                </tr>
                                <tr>
                                    <td width="90"><a href="#">Neutral</a></td>
                                    <td width="75"><div style="width:<?php echo $twper; ?>px;" class="chart_bar">&nbsp;</div></td>
                                    <td width="25" style="text-align:right;"><?php echo $tword_count; ?></td>
                                </tr>
                                <tr>
                                    <td width="90"><a href="#">Negative</a></td>
                                    <td width="75"><div style="width:<?php echo $nwper; ?>px;" class="chart_bar">&nbsp;</div></td>
                                    <td width="25" style="text-align:right;"><?php echo $nword_count; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        </div>        
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-statistics h-100">
                    <div class="card-header">Sources</div>    
                    <div class="card-body">
                        <div class = "table-responsive">
                           <table id = "datatable-sources" class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <td width="90"><a href="http://reddit.com">Reddit</a></td>
                                    <td width="75"><div style="width:<?php echo $fper; ?>px;" class="chart_bar">&nbsp;</div></td>
                                    <td width="25" style="text-align:right;"><?php echo $fcount; ?></td>
                                </tr>
                                <tr>
                                    <td width="90"><a href="http://youtube.com/">Youtube</a></td>
                                    <td width="75"><div style="width:<?php echo $yper; ?>px;" class="chart_bar">&nbsp;</div></td>
                                    <td width="25" style="text-align:right;"><?php echo $ycount; ?></td>
                                </tr> 
                                <tr>
                                    <td width="90"><a href="http://twitter.com/">Twitter</a></td>
                                    <td width="75"><div style="width:<?php echo $tper; ?>px;" class="chart_bar">&nbsp;</div></td>
                                    <td width="25" style="text-align:right;"><?php echo $tcount; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        </div>        
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="card card-statistics h-100">
                    <div class="card-header"><h4 title="Related keywords and number of times mentioned." class="qtip">Related Keywords</h4></div>
                    <div class="card-body">
                        <table id="datatable-related-keywords" class="datatable table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Progress</th>
                                    <th>Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php echo $k_html; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-statistics h-100">
                    <div class="card-header"><h4 title="Recently trending hashtags and number of times mentioned." class="qtip">Top Hashtags</h4></div>
                    <div class="card-body">
                        <table id="datatable-top-hastags" class="datatable table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Progress</th>
                                    <th>Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php echo $htag_html; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--<div id="top_keywords" class="box_segment" style="page-break-before:always;">
            <h4 title="Related keywords and number of times mentioned." class="qtip">Related Keywords</h4>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <?php //echo $k_html; ?>
            </table>
        </div>
        <div id="top_keywords" class="box_segment" style="page-break-before:always;">
            <h4 title="Recently trending hashtags and number of times mentioned." class="qtip">Top Hashtags</h4>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <?php //echo $htag_html; ?>
            </table>
        </div>-->


        <!--<div id="top_keywords" class="box_segment" style="page-break-before:always;">
            <h4 title="The sources included in this search and number of items in the results." class="qtip">Sources</h4>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="90"><a href="http://reddit.com">reddit</td></td>
                    <td width="75"><div style="width:<?php //echo $fper; ?>px;" class="chart_bar">&nbsp;</div></td>
                    <td width="25" style="text-align:right;"><?php //echo $fcount; ?></td>
                </tr>

                <tr>
                    <td width="90"><a href="http://youtube.com/">youtube</td></td>
                    <td width="75"><div style="width:<?php //echo $yper; ?>px;" class="chart_bar">&nbsp;</div></td>
                    <td width="25" style="text-align:right;"><?php //echo $ycount; ?></td>
                </tr> 

                <tr>
                    <td width="90"><a href="http://twitter.com/">twitter</td></td>
                    <td width="75"><div style="width:<?php //echo $tper; ?>px;" class="chart_bar">&nbsp;</div></td>
                    <td width="25" style="text-align:right;"><?php //echo $tcount; ?></td>
                </tr>        

            </table>
        </div>-->
    </div>

    <div id="column_middle">
        <?php echo $twitter_html; ?>
        <?php echo $youtube_html; ?>
        <?php echo $facebook_html; ?>
        <div class="pagination"></div>    
    </div>
</div>