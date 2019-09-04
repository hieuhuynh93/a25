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

$arrResults = array();
?>

<?php

// Checking empty values
if ($se == "" || $keyword == "") {
    array_push($arrResults, '<tr><td colspan="3" align="center"><i>Please enter keyword and select search engine!</i></td></tr>');
    //echo '<tr><td colspan="3" align="center"><i>Please enter keyword and select search engine!</i></td></tr>';
} else {


    $class = ($class == "row2") ? "row1" : "row2";
    if ($se != "yahoo" && $se != "bing") {
        $GooglePositionChecker = new GooglePositionChecker(trim($keyword), "", "1", $se);
        $domains = $GooglePositionChecker->initSpider();
        $total_domains = count($domains);
        if ($total_domains == "0") {
            array_push($arrResults, '<tr><td colspan="3" align="center"><i>Sorry not able to get results from ' . $se . '. Please try again!</i></td></tr>');
            //echo '';
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
                array_push($arrResults, '<tr>
                                    <td style="text-align:center;"> ' . $count . ' </td>
                                    <td style="line-height: 25px; font-size: 15px;">' . trim($d) . '</td>
                                    <td class="text-info"><a href="' . trim($d) . '" target="_blank" style="font-size: 15px;">Go to URL</a></td>
                                </tr>');
                ?>

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
            array_push($arrResults, '<tr><td colspan="3" align="center"><i>Sorry not able to get results from ' . $se . '. Please try again!</i></td></tr>');
            //echo '<tr><td colspan="3" align="center"><i>Sorry not able to get results from ' . $se . '. Please try again!</i></td></tr>';
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

                array_push($arrResults, '<tr>
                                    <td style="text-align:center;"> ' . $count . ' </td>
                                    <td style="line-height: 25px; font-size: 15px;">' . trim($d) . '</td>
                                    <td class="text-info"><a href="' . trim($d) . '" target="_blank" style="font-size: 15px;">Go to URL</a></td>
                                </tr>');
                ?>

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
            array_push($arrResults, '<tr><td colspan="3" align="center"><i>Sorry not able to get results from ' . $se . '. Please try again!</i></td></tr>');
            //echo '<tr><td colspan="3" align="center"><i>Sorry not able to get results from ' . $se . '. Please try again!</i></td></tr>';
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

                    array_push($arrResults, '<tr>
                                    <td style="text-align:center;"> ' . $count . ' </td>
                                    <td style="line-height: 25px; font-size: 15px;">' . trim($d) . '</td>
                                    <td class="text-info"><a href="' . trim($d) . '" target="_blank" style="font-size: 15px;">Go to URL</a></td>
                                </tr>');
                    ?>

                    <?php

                    $total_pr = $total_pr + $pr;
                    $count++;
                }
            }

            $avg_pr = $total_pr / $count;
        }
    }
    ?>
    <?php

}
echo implode(" ", $arrResults);
?>