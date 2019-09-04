<?php
error_reporting(0);
set_time_limit(0);

include("functions.php");

require_once("GooglePositionChecker.php");
require_once("YahooPositionChecker.php");
require_once("BingPositionChecker.php");

$keyword = "";
$se = "";

$tld = trim(strip_tags(strtolower($_REQUEST['tld'])));
$keyword = trim(strip_tags(strtolower($_REQUEST['keyword'])));

$se = trim($_REQUEST["se"]);
$class = "row2";
$avg_pr = "0";
?>
<table width="90%"  border="0" align="center" cellpadding="5" cellspacing="0" class="box table table-hover table-responsive table-striped">
    <tr>
        <th width="10%" align="center">#</th>  
        <th width="70%" align="left">Domain</th>
        <th width="20%" align="center">Alexa Rank</th>
    </tr>	
    <?php
    // Checking empty values
    if ($se == "" || $keyword == "") {
        echo '<tr><td colspan="3" align="center"><i>Please enter keyword and select search engine!</i></td></tr>';
    } else {


        $class = ($class == "row2") ? "row1" : "row2";
        if ($se != "yahoo" && $se != "bing") {
            $GooglePositionChecker = new GooglePositionChecker(trim($keyword), "", "1", $se);
            $domains = $GooglePositionChecker->initSpider();
            $total_domains = count($domains);
            if ($total_domains == "0") {
                echo '<tr><td colspan="3" align="center"><i>Sorry not able to get results from ' . $se . '. Please try again!</i></td></tr>';
            } else {
                $count = 1;
                $total_pr = "0";
                foreach ($domains as $d) {
                    $class = ($class == "row2") ? "row1" : "row2";
                    $alexa_rank_array = alexaRank("http://" . $d);
                    if (trim($alexa_rank_array['global_rank']) == "") {
                        continue;
                    }
                    $pr = trim(getpagerank(trim($alexa_rank_array['global_rank'])));
                    if ($pr == "")
                        $pr = "0";
                    ?>
                    <tr class="<?php echo $class ?>">
                        <td align="center"><?php echo $count; ?></td>
                        <td align="left"><?php echo trim($d); ?></td>
                        <td align="center"><?php echo number_format(trim($alexa_rank_array['global_rank'])); ?></td>

                    </tr>

                    <?php
                    $total_pr = $total_pr + $pr;
                    $count++;
                }

                $avg_pr = $total_pr / $count;
            }
        }


        if ($se == "bing") {
            $BingPositionChecker = new BingPositionChecker(trim($keyword), "", "1");
            $domains = $BingPositionChecker->initSpider();
            $total_domains = count($domains);
            if ($total_domains == "0") {
                echo '<tr><td colspan="3" align="center"><i>Sorry not able to get results from ' . $se . '. Please try again!</i></td></tr>';
            } else {
                $count = 1;
                $total_pr = "0";
                foreach ($domains as $d) {
                    $class = ($class == "row2") ? "row1" : "row2";
                    $alexa_rank_array = alexaRank("http://" . $d);
                    if (trim($alexa_rank_array['global_rank']) == "") {
                        continue;
                    }
                    $pr = trim(getpagerank(trim($alexa_rank_array['global_rank'])));
                    if ($pr == "")
                        $pr = "0";
                    ?>
                    <tr class="<?php echo $class ?>">
                        <td align="center"><?php echo $count; ?></td>
                        <td align="left"><?php echo trim($d); ?></td>
                        <td align="center"><?php echo number_format(trim($alexa_rank_array['global_rank'])); ?></td>

                    </tr>

                    <?php
                    $total_pr = $total_pr + $pr;
                    $count++;
                }

                $avg_pr = $total_pr / $count;
            }
        }

        if ($se == "yahoo") {
            $YahooPositionChecker = new YahooPositionChecker(trim($keyword), "", "1");
            $domains = $YahooPositionChecker->initSpider();
            $total_domains = count($domains);
            if ($total_domains == "0") {
                echo '<tr><td colspan="3" align="center"><i>Sorry not able to get results from ' . $se . '. Please try again!</i></td></tr>';
            } else {
                $count = 1;
                $total_pr = "0";
                foreach ($domains as $d) {
                    if (strpos($d, ' ') == 0 && $d != "" && strpos($d, '.') > 0) {
                        $class = ($class == "row2") ? "row1" : "row2";
                        $alexa_rank_array = alexaRank("http://" . $d);
                        if (trim($alexa_rank_array['global_rank']) == "") {
                            continue;
                        }
                        $pr = trim(getpagerank(trim($alexa_rank_array['global_rank'])));
                        if ($pr == "")
                            $pr = "0";
                        ?>
                        <tr class="<?php echo $class ?>">
                            <td align="center"><?php echo $count; ?></td>
                            <td align="left"><?php echo trim($d); ?></td>
                            <td align="center"><?php echo number_format(trim($alexa_rank_array['global_rank'])); ?></td>

                        </tr>

                        <?php
                        $total_pr = $total_pr + $pr;
                        $count++;
                    }
                }

                $avg_pr = $total_pr / $count;
            }
        }



        if ($avg_pr > "7") {
            $dval = "95";
            $dmsg = "Very Difficult";
        } elseif ($avg_pr > "5") {
            $dval = "75";
            $dmsg = "Difficult";
        } elseif ($avg_pr > "3.5") {
            $dval = "50";
            $dmsg = "Normal";
        } elseif ($avg_pr > "1.5") {
            $dval = "25";
            $dmsg = "Easy";
        } else {
            $dval = "5";
            $dmsg = "Very Easy";
        }
        ?>				
        <tr align="center">  
            <td colspan="3" style="text-align: center;"><h3>Keyword Difficulty Level</h3><br /><br />
                <img src="https://chart.googleapis.com/chart?chs=400x250&amp;cht=gom&amp;chd=t:<?php echo $dval; ?>&amp;chco=FF0000,FF8040,FFFF00,00FF00,00FFFF,0000FF,800080&amp;chxt=x,y&amp;chxl=0:|<?php echo $dmsg; ?>|1:|Very low|Low|Medium|High|Very High" alt="">
            </td>
        </tr>
        <?php
    }
    ?>
</table>