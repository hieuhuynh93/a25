<form action="" method="POST">
    <input type='text' name="url" id="url" placeholder="Enter URL here.."><br />
    <input type="submit" name="submit" value="Submit">
</form>
<script>
    //Google Malware Checker

    function gMalCheck() {

        var $myUrl = $("#url").val();

        if ($myUrl == null || $myUrl == "") {
            sweetAlert(oopsStr, msgDomain, "error");
        } else {
            if ($myUrl.indexOf("http://") == 0) {
            } else if ($myUrl.indexOf("https://") == 0) {
            } else {
                $myUrl = "http://" + $myUrl;
            }
            var getHost = document.createElement('a');
            getHost.href = $myUrl;
            var myHost = getHost.hostname;

            google_url = "https://www.google.com/safebrowsing/diagnostic?site=" + myHost + "&amp;output=embed";
            window.open(google_url, '', 'width=640,height=480,scrollbars=yes, menubar=no,resizable=no,directories=no,location=0');
        }
    }
</script>
<style>
    table {border: 2px solid black;}
    td,th,thead {border: 1px solid gray;}
</style>
<?php
require_once 'all_functions.php';
require_once 'simple_dom.php';

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

if (isset($_POST['submit'])) {

    echo "<b> " . check_server_status($_POST['url'], 80, 12) . " </b><br />";
    echo '<br /><u><b>Redirect Status</b></u><br />';
    if (isset($_POST['url'])) {
        $url4 = raino_trim($_POST['url']);
        $myUrl = clean_with_www($url4);
        $url = "http://$myUrl";
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            $error = "Error";
        } else {
            $outData = checkRedirect($url4, "Good", "Bad - Not Redirecting!");
        }
    }
    ?>
    <table class="table table-bordered" style="text-align: left;">
        <tbody><tr>
                <th><?php echo 'URL'; ?></th>
                <th><?php echo "Redirect Status"; ?></th>
            </tr>
            <tr>
                <td><?php echo ucfirst($myUrl); ?></td>
                <td><?php echo $outData; ?></td>
            </tr>
        </tbody></table>
    <?php
    if (isset($_POST['url'])) {
        $userInput = raino_trim($_POST['url']);
        $regUserInput = truncate($userInput, 30, 150);
        $array = explode("\n", $userInput);
        $count = 0;
        $resOut = $resCol = array();
        $color = 'danger';
        foreach ($array as $url) {
            $url = clean_with_www($url);
            $url = Trim("http://$url");
            if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
                $count++;
                $my_url[] = Trim($url);
                $url = parse_url(Trim($url));
                $host = $url['host'];
                $myHost[] = ucfirst(str_replace('www.', '', $host));
                $stats = checkDomain($host);
                if ($stats == 'n') {
                    $resOut[] = 'Safe Site';
                    $color = 'success';
                }
                if ($stats == 'l') {
                    $resOut[] = 'Low level Unsafe Site';
                }
                if ($stats == 'm') {
                    $resOut[] = 'Medium level Unsafe Site';
                }
                if ($stats == 'h') {
                    $resOut[] = 'High level Unsafe Site';
                }
                $resCol[] = $color;
            }
        }
    }
    ?>

    <h3><small> <?php echo '<u>Anti-virus status of the website:</u>'; ?></small></h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <td><?php echo '<b>Domain</b>'; ?></td>
                <td><?php echo '<b>Status</b>'; ?></td>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($loop = 0; $loop < $count; $loop++) {
                ?>
                <tr>
                    <td><?php echo $myHost[$loop]; ?></td>
                    <td><span class="badge bg-<?php echo $resCol[$loop]; ?>"><?php echo $resOut[$loop]; ?></span></td>
                </tr>
            <?php } ?>
        </tbody></table>
    <?php
//Class C IP Checker

    if (isset($_POST['url'])) {
        echo '<br /><u><b>Class C IP Checker</b></u><br />';
        $outData1 = raino_trim($_POST['url']);
        $regUserInput = truncate($outData1, 30, 150);
        $array = explode("\n", $outData1);
        $count = count($array);
        $dataCount = 0;
        foreach ($array as $url1) {
            if ($url1 == null || $url1 == "") {
                
            } else {
                $url1 = clean_with_www($url1);
                $url1 = Trim("http://$url1");
                if (!filter_var($url1, FILTER_VALIDATE_URL) === false) {
                    $dataCount = $dataCount + 1;
                    $my_url1[] = Trim($url1);
                    $url1 = parse_url(Trim($url1));
                    $host = $url1['host'];
                    $getHostIP = gethostbyname($host);
                    $class_c = explode(".", $getHostIP);
                    $class_c = $class_c[0] . '.' . $class_c[1] . '.' . $class_c[2];
                    $ipList[] = $getHostIP;
                    $classCList[] = $class_c;
                    $myHost[] = ucfirst(str_replace('www.', '', $host));
                }
            }
        }
    }
    ?>
    <table class="table table-hover table-bordered">
        <tbody><tr>
                <th><?php echo 'Host'; ?></th>
                <th><?php echo 'IP'; ?></th>
                <th><?php echo 'Class C'; ?></th>
            </tr>
            <?php
            for ($i = 0; $i < $dataCount; $i++) {
                ?>
                <tr>
                    <td><?php echo $myHost[$i]; ?></td>
                    <td><?php echo $ipList[$i]; ?></td>
                    <td><span class="badge bg-blue"><?php echo $classCList[$i]; ?></span></td>
                </tr>
            <?php } ?>
        </tbody></table>

    <!-----Link Price Calculator----->
    <?php
    if (isset($_POST['url'])) {
        $outData3 = raino_trim($_POST['url']);
        $regUserInput = truncate($outData3, 30, 150);
        $array = explode("\n", $outData3);
        $count = 0;
        foreach ($array as $url) {
            $url = clean_with_www($url);
            $url = Trim("http://$url");
            if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
                $count++;
                $my_url[] = Trim($url);
                $url = parse_url(Trim($url));
                $host = $url['host'];
                $myHost[] = ucfirst(str_replace('www.', '', $host));
                $alexa = alexaRank($host);
                $alexa_rank = $alexa[0];
                $alexa_rank = ($alexa_rank == 'No Global Rank' ? '0' : $alexa_rank);
                $price[] = "$" . number_format(calPrice($alexa_rank)) . " USD";
            }
        }
    }
    ?>
    <h3><small> <?php echo '<u>Price of the website:</u>'; ?></small></h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <td><?php echo '<b>URL</b>'; ?></td>
                <td><?php echo '<b>Approximate Price</b>'; ?></td>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($loop = 0; $loop < $count; $loop++) {
                ?>
                <tr>
                    <td><?php echo $myHost[$loop]; ?></td>
                    <td><?php echo $price[$loop]; ?></td>
                </tr>
            <?php } ?>
        </tbody></table><br />
    <?php
//Heading Tags

    if (isset($_POST['url'])) {
        $my_url1 = raino_trim($_POST['url']);
        $my_url1 = clean_with_www($my_url1);
        $my_url1 = "http://$my_url1";
        $outData2 = curlGET($my_url1);

        function getTextBetweenTags($outData, $tagname) {
            $d = new DOMDocument();
            @$d->loadHTML($outData);
            $i = 1;
            foreach ($d->getElementsByTagName($tagname) as $item) {
                echo $i . " -- " . $item->textContent . "<br />";
                $i++;
            }
        }

        echo '<u>All H1 Tags:</u><br />';
        getTextBetweenTags($outData2, 'h1');

        echo '<br /><u>All H2 Tags:</u><br />';
        getTextBetweenTags($outData2, 'h2');

        echo '<br /><u>All H3 Tags:</u><br />';
        getTextBetweenTags($outData2, 'h3');

        echo '<br /><u>All H4 Tags:</u><br />';
        getTextBetweenTags($outData2, 'h4');

        echo '<br /><u>All H5 Tags:</u><br />';
        getTextBetweenTags($outData2, 'h5');

        echo '<br /><u>All H6 Tags:</u><br />';
        getTextBetweenTags($outData2, 'h6');
    }

//Backlink Counter

    if (isset($_POST['url'])) {
        $domain = $_POST['url']; // Url of your desired site to check backlinks. 
        echo '<br /><u><b>Backlink Counter</b></u><br />';
    }
    $result_in_html = file_get_contents("http://www.google.com/search?q=link:{$domain}");
    if (preg_match('/Results .*? of about (.*?) from/sim', $result_in_html, $regs)) {
        $indexed_pages = trim(strip_tags($regs[1])); //use strip_tags to remove bold tags
        echo ucwords($domain) . ' Has <u>' . $indexed_pages . '</u> backlinks.<br />';
    } elseif (preg_match('/About (.*?) results/sim', $result_in_html, $regs)) {
        $indexed_pages = trim(strip_tags($regs[1])); //use strip_tags to remove bold tags
        echo ucwords($domain) . ' Has <u>' . $indexed_pages . '</u> backlinks.<br />';
    } else {
        echo ucwords($domain) . ' Has Not Been Indexed @ Google.com!<br />';
    }
    if (isset($_POST['url']))
        $url3 = "http://www." . $_POST['url'];

    echo "<br /><u><b>Website Description</b></u><br />";
    $fp = fopen($url3, 'r');
    $content = "";
    while (!feof($fp)) {
        $buffer = trim(fgets($fp, 4096));
        $content .= $buffer;
    }

    $start = '<title>';
    $end = '</title>';
    @preg_match(" / $start( . * )$end / s", $content, $match);
    $title = $match[1];
    $metatagarray = get_meta_tags($url3);
    if (isset($metatagarray["keywords"]))
        $keywords = $metatagarray["keywords"];
    if (isset($metatagarray["description"]))
        $description = $metatagarray["description"];
    if (isset($url3))
        echo " <div><strong>URL: </strong >$url3</div> \n";
    if (isset($title))
        echo " <div><strong>Title: </strong >$title</div> \n";
    if (isset($description))
        echo " <div><strong>Description: </strong >$description</div>\n";
    if (isset($keywords))
        echo " <div><strong>Keywords: </strong >$keywords</div>\n";

    if (isset($_POST['url'])) {
        echo '<br /><u><b>Blacklist Lookup</b></u><br />';
        $my_url4 = raino_trim($_POST['url']);
        $my_url4 = "http://" . clean_with_www($my_url4);
        if (filter_var($my_url4, FILTER_VALIDATE_URL) === false) {
            $error = 'Error';
        } else {
            $regUserInput = $my_url4;
            $my_url4 = parse_url($my_url4);
            $host = $my_url4['host'];
            $getHostIP = gethostbyname($host);
            $myHost = ucfirst(str_replace('www.', '', $host));
            $dataArr1 = dnsblookup($getHostIP);
            $outArr1 = $dataArr1[0];
            $overAll = $dataArr1[1];
        }
    }
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
        <?php
        $loop = 1;
        foreach ($outArr1 as $outData1) {
            ?>
            <tr>
                <td><?php echo $loop; ?></td>
                <td><strong><?php echo $outData1[0]; ?></strong></td>
                <?php
                if ($outData1[1] == 1) {
                    //Listed
                    echo '<td style="color:#c0392b; font-weight:bold;">Listed</td>';
                } else {
                    //Not Listed
                    echo '<td style="color:#27ae60; font-weight:bold;">Not Listed</td>';
                }
                ?>
            </tr>
            <?php
            $loop++;
        }
        ?>
    </tbody>
    </table>
    <?php
    echo '<br /><u><b>Reverse IP Checker</b></u><br />';
    if (isset($_POST['url'])) {
        $my_url5 = raino_trim($_POST['url']);
        $my_url5 = "http://" . clean_with_www($my_url5);
        if (filter_var($my_url5, FILTER_VALIDATE_URL) === false) {
            $error = 'No Reverse Domain found.';
        } else {
            $regUserInput = $my_url5;
            $my_url5 = parse_url($my_url5);
            $host = $my_url5['host'];
            $getHostIP = gethostbyname($host);
            $myHost = ucfirst(str_replace('www.', '', $host));
            $revLink = reverseIP($getHostIP);
            $revCount = count($revLink);
        }
    }
    ?>
    <table style='width: 25%;' class="table table-bordered">
        <tbody>
            <tr>
                <td><?php echo 'Domain Name'; ?></td>
                <td><?php echo 'Domain IP'; ?></td>
            </tr>
            <tr>
                <td><strong><?php echo $myHost; ?></strong></td>
                <td><strong><?php echo $getHostIP; ?></strong></td>
            </tr>
        </tbody>
    </table>

    <?php if ($revCount != 0) { ?>
        <table style='width: 25%;' class="table table-bordered" style="text-align: left;">
            <thead>
            <th>#</th>
            <th><?php echo 'Reverse Domain Names'; ?></th>
        </thead>
        <tbody>
            <?php
            $loop = 1;
            foreach ($revLink as $link) {
                ?>
                <tr>
                    <td style="width: 20%;"><?php echo $loop; ?></td>
                    <td><?php echo ucfirst(str_replace('www.', '', $link)); ?></td>
                </tr>
                <?php
                $loop = $loop + 1;
            }
            ?>
        </tbody></table><br />
        <?php
    }

    echo '<br /><u><b>Link Analysis</b></u><br />';
    if (isset($_POST['url'])) {
        $my_url2 = raino_trim($_POST['url']);
        $my_url2 = clean_with_www($my_url2);
        $my_url2 = Trim("http://$my_url2");
        if (filter_var($my_url2, FILTER_VALIDATE_URL) === false) {
            $error = 'Error';
        } else {
            $regUserInput = $my_url2;
            $uriData = doLinkAnalysis($my_url2);
            $internal_links = $uriData[0];
            $internal_links_count = $uriData[1];
            $internal_links_nofollow = $uriData[2];
            $external_links = $uriData[3];
            $external_links_count = $uriData[4];
            $external_links_nofollow = $uriData[5];
            $total_links = $uriData[6];
            $total_nofollow_links = (int) $internal_links_nofollow + (int) $external_links_nofollow;
        }
    }
    ?>
    <table style="width: 20%" class="table table-bordered">
        <tbody><tr>
                <th><?php echo 'Page URL'; ?></th>
            </tr>
            <tr>
                <td style="text-align: center;"><?php echo $my_url2; ?></td>
            </tr>
        </tbody></table>
    <table style="width: 20%" class="table table-bordered table-striped">
        <thead>
            <tr>
                <td><?php echo 'Links'; ?></td>
                <td><?php echo 'Count'; ?></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong><?php echo 'Total Links'; ?></strong></td>
                <td><span class="badge bg-blue"><?php echo $total_links; ?></span></td>

            </tr>
            <tr>
                <td><strong><?php echo 'Internal Links'; ?></strong></td>
                <td><span class="badge bg-green"><?php echo $internal_links_count; ?></span></td>

            </tr>
            <tr>
                <td><strong><?php echo 'External Links'; ?></strong></td>
                <td><span class="badge bg-purple"><?php echo $external_links_count; ?></span></td>
            </tr>
            <tr>
                <td><strong><?php echo 'NoFollow Links'; ?></strong></td>
                <td><span class="badge bg-orange"><?php echo $total_nofollow_links; ?></span></td>
            </tr>
        </tbody>

    </table>
    <br />
    <h3><?php echo 'Internal Links'; ?> <small><?php echo 'Links inside the current website'; ?></small></h3><br />
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <td>No.</td>
                <td><?php echo 'Link' . "'" . 's URL'; ?></td>
                <td><?php echo 'DoFollow / NoFollow'; ?></td>
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
    <?php if (isset($external_links)) { ?>
        <h3><?php echo 'External Links'; ?> <small><?php echo 'Links going out of website'; ?></small></h3><br />
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <td>No.</td>
                    <td><?php echo "Link's URL"; ?></td>
                    <td><?php echo 'DoFollow / NoFollow'; ?></td>
                </tr>
            </thead>
            <tbody>
                <?php
                $rawData .= "\n" . "\n" . 'External Links' . "\n\n";
                $rawData .= 'No.,' . "Link's URL" . ',' . 'DoFollow / NoFollow' . "\n\n";
                foreach (@$external_links as $count => $links) {
                    $rawData .= $count . ',' . $links['href'] . ',' . $links['follow_type'] . "\n";
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $links['href']; ?></td>
                        <td><?php echo $links['follow_type']; ?></td>
                    </tr>
                <?php } ?>
            </tbody></table><br />
        <?php
    }

    if (isset($_POST['url'])) {
        $keyword = content_analysis($_POST['url']);
        $result['one_phrase'] = json_encode($keyword['one_phrase']);
        $result['two_phrase'] = json_encode($keyword['two_phrase']);
        $result['three_phrase'] = json_encode($keyword['three_phrase']);
        $result['four_phrase'] = json_encode($keyword['four_phrase']);
        $result['total_words'] = $keyword['total_words'];
        $result['domain_name'] = $_POST['url'];

        $one_phrase = json_decode($result['one_phrase']);
        $two_phrase = json_decode($result['two_phrase']);
        $three_phrase = json_decode($result['three_phrase']);
        $four_phrase = json_decode($result['four_phrase']);
        $total_words = $result['total_words'];
    }
    ?>
    <h3 class="box-title" style="word-spacing: 3px;"><?php echo '<u>WEBSITE KEYWORD ANALYSIS</u>'; ?></h3>
    <h4><?php echo 'Domain Name = ' . $result['domain_name']; ?></h4>
    <h4><?php echo 'Total Words = ' . $result['total_words']; ?></h4>
    <div class="box-body">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="width: 50%;">
            <table class="table table-condensed table-striped">
                <tr>
                    <th>SINGLE KEYWORDS</th>
                    <th>OCCURRENCES</th>
                    <th>DENSITY</th>
                    <th>POSSIBLE SPAM</th>
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
                            if (in_array(strtolower($key), $array_spam_keyword))
                                echo "Yes";
                            else
                                echo 'No';
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="width: 50%;">
            <table class="table table-condensed table-striped">
                <tr>
                    <th>2 WORD PHRASES</th>
                    <th>OCCURRENCES</th>
                    <th>DENSITY</th>
                    <th>POSSIBLE SPAM</th>
                </tr>
                <?php foreach ($two_phrase as $key => $value) : ?>
                    <tr>
                        <td><?php echo $key; ?></td>
                        <td><?php echo $value; ?></td>
                        <td><?php
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
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="width: 50%;">
            <table class="table table-condensed table-striped">
                <tr>
                    <th>3 WORD PHRASES</th>
                    <th>OCCURRENCES</th>
                    <th>DENSITY</th>
                    <th>POSSIBLE SPAM</th>
                </tr>
                <?php foreach ($three_phrase as $key => $value) : ?>
                    <tr>
                        <td><?php echo $key; ?></td>
                        <td><?php echo $value; ?></td>
                        <td><?php
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
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="width: 50%;">
            <table class="table table-condensed table-striped">
                <tr>
                    <th>4 WORD PHRASES</th>
                    <th>OCCURRENCES</th>
                    <th>DENSITY</th>
                    <th>POSSIBLE SPAM</th>
                </tr>
                <?php foreach ($four_phrase as $key => $value) : ?>
                    <tr>
                        <td><?php echo $key; ?></td>
                        <td><?php echo $value; ?></td>
                        <td><?php
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
                    </tr>
                <?php endforeach; ?>
            </table><br />
            <?php
            echo '<br /><u><b>Meta Keyword Density Checker</b></u><br />';
            if (isset($_POST['url'])) {
                $my_url3 = 'http://' . clean_with_www(raino_trim($_POST['url']));
                if (filter_var($my_url3, FILTER_VALIDATE_URL) === false) {
                    $error = 'Error';
                } else {
                    $regUserInput = $my_url3;
                    $obj = new KD();
                    $obj->domain = $my_url3;
                    $resdata = $obj->result();

                    foreach ($resdata as $outData) {
                        @$outData['keyword'] = Trim($outData['keyword']);
                        if ($outData['keyword'] != null || $outData['keyword'] != "") {

                            $blockChars = array('~', '=', '+', '?', ':', '_', '[', ']', '"', '.', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '<', '>', '{', '}', '|', '\\', '/', ',');
                            $blockedStr = false;
                            foreach ($blockChars as $blockChar) {
                                if (str_contains($outData['keyword'], $blockChar)) {
                                    $blockedStr = true;
                                    break;
                                }
                            }
                            //if (ctype_alnum($outData['keyword'])) {
                            if (!preg_match('/[0-9]+/', $outData['keyword'])) {
                                if (!$blockedStr)
                                    $outArr[] = array($outData['keyword'], $outData['count'], $outData['percent']);
                            }
                        }
                    }
                    $outCount = count($outArr);
                    if ($outCount == 0) {
                        $error = 'Error';
                    }
                    $myUrl1 = ucfirst(str_replace('www.', '', $my_url3));
                }
            }
            ?>
            <table style="width: 25%;" class="table table-bordered">

                <tbody>
                    <tr>
                        <td><?php echo 'URL:'; ?> </td>
                        <td><strong> <?php echo $my_url3; ?></strong></td>
                    </tr>
                    <tr>
                        <td><?php echo 'Total Keywords:'; ?> </td>
                        <td><strong> <?php echo $outCount; ?></strong></td>
                    </tr>
                </tbody>
            </table>

            <table style="width: 25%;" class="table table-bordered" style="text-align: left;">
                <thead>
                <th><?php echo 'Keywords'; ?></th>
                <th><?php echo 'Count'; ?></th>
                <th><?php echo 'Percentage'; ?></th>
                </thead>

                <tbody>
                    <?php foreach ($outArr as $outVal) { ?>
                        <tr>
                            <td><strong><?php echo $outVal[0]; ?></strong></td>
                            <td><?php echo $outVal[1]; ?></td>
                            <td><?php echo @$outVal[2]; ?>%</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table><br />
            <?php
            echo '<br /><u><b>Broken Links Checker</b></u><br />';
            if (isset($_POST['url'])) {
                $my_url6 = raino_trim($_POST['url']);
                if (substr($my_url6, 0, 7) !== 'http://' && substr($my_url6, 0, 8) !== 'https://')
                    $my_url6 = 'http://' . $my_url6;
                $brokenLinks = getBrokenLinks($my_url6);
                if (is_array($brokenLinks)) {
                    $regUserInput = $my_url6;
                    $internalLinks1 = $brokenLinks[0];
                    $externalLinks1 = $brokenLinks[1];
                } else {
                    $error = 'Error';
                }
            }
            ?>
            <h4><?php echo 'Broken Internal Links'; ?><small> <?php echo ' Status'; ?> </small></h4>
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th><?php echo 'URL'; ?></th>
                        <th><?php echo 'Status Code'; ?></th>
                        <th><?php echo 'Status'; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($internalLinks1 as $internalLink) {
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

            <h4><?php echo 'Broken External Links'; ?><small> <?php echo ' Status'; ?> </small></h4>
            <table class="table table-hover table-bordered table-striped" style="margin-bottom: 30px;">
                <thead>
                    <tr>
                        <th><?php echo 'URL'; ?></th>
                        <th><?php echo 'Status Code'; ?></th>
                        <th><?php echo 'Status'; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($externalLinks1 as $externalLink) {
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
        ?>