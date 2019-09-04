<?php
session_start();
include_once 'dbconn.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
        <meta name="author" content="potenzaglobalsolutions.com" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title>Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="images/favicon.ico" />

        <!-- Font -->
        <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

        <!-- css -->
        <link rel="stylesheet" type="text/css" href="css/style.css" />

        <style>
            .x a:hover {
                background-color: gray;
                color: white;
            }
            .card-deck {
                @include -media-breakpoint-only(lg) {
                    column-count: 4;
                }
                @include -media-breakpoint-only(xl) {
                    column-count: 3;
                }
            }
        </style>
    </head>

    <body>

        <div class="wrapper">

            <!--=================================
             preloader -->

            <!--div id="pre-loader">
                <img src="images/pre-loader/loader-01.svg" alt="">
            </div-->

            <!--=================================
             preloader -->

            <!--=================================
             header start-->

            <nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <!-- logo -->
                <div class="text-left navbar-brand-wrapper">
                    <a class="navbar-brand brand-logo" href="index.html"><img src="images/logo-dark.png" alt="" ></a>
                    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-icon-dark.png" alt=""></a>
                </div>
                <!-- Top bar left -->
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item">
                        <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
                    </li>
                    <li class="nav-item">
                        <div class="search">
                            <a class="search-btn not_click" href="javascript:void(0);"></a>
                            <div class="search-box not-click">
                                <input type="text" class="not-click form-control" placeholder="Search" value="" name="search">
                                <button class="search-button" type="submit"> <i class="fa fa-search not-click"></i></button>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- top bar right -->
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item fullscreen">
                        <a id="btnFullscreen" href="#" class="nav-link" ><i class="ti-fullscreen"></i></a>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-bell"></i>
                            <span class="badge badge-danger notification-status"> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                            <div class="dropdown-header notifications">
                                <strong>Notifications</strong>
                                <span class="badge badge-pill badge-warning">05</span>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">New registered user <small class="float-right text-muted time">Just now</small> </a>
                            <a href="#" class="dropdown-item">New invoice received <small class="float-right text-muted time">22 mins</small> </a>
                            <a href="#" class="dropdown-item">Server error report<small class="float-right text-muted time">7 hrs</small> </a>
                            <a href="#" class="dropdown-item">Database report<small class="float-right text-muted time">1 days</small> </a>
                            <a href="#" class="dropdown-item">Order confirmation<small class="float-right text-muted time">2 days</small> </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true"> <i class=" ti-view-grid"></i> </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-big">
                            <div class="dropdown-header">
                                <strong>Quick Links</strong>
                            </div>
                            <div class="dropdown-divider"></div> 
                            <div class="nav-grid">
                                <a href="#" class="nav-grid-item"><i class="ti-files text-primary"></i><h5>New Task</h5></a>
                                <a href="#" class="nav-grid-item"><i class="ti-check-box text-success"></i><h5>Assign Task</h5></a>
                            </div>
                            <div class="nav-grid">
                                <a href="#" class="nav-grid-item"><i class="ti-pencil-alt text-warning"></i><h5>Add Orders</h5></a>
                                <a href="#" class="nav-grid-item"><i class="ti-truck text-danger "></i><h5>New Orders</h5></a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown mr-30">
                        <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <img src="images/profile-avatar.jpg" alt="avatar">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-header">
                                <div class="media">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-0">Michael Bean</h5>
                                        <span>michael-bean@mail.com</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="text-secondary ti-reload"></i>Activity</a>
                            <a class="dropdown-item" href="#"><i class="text-success ti-email"></i>Messages</a>
                            <a class="dropdown-item" href="#"><i class="text-warning ti-user"></i>Profile</a>
                            <a class="dropdown-item" href="#"><i class="text-dark ti-layers-alt"></i>Projects <span class="badge badge-info">6</span> </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="text-info ti-settings"></i>Settings</a>
                            <a class="dropdown-item" href="#"><i class="text-danger ti-unlock"></i>Logout</a>
                        </div>
                    </li>
                </ul>
            </nav>

            <!--=================================
             header End-->

            <!--=================================
             Main content -->

            <div class="container-fluid">
                <div class="row">
                    <!-- Left Sidebar -->
                    <div class="side-menu-fixed">
                        <div class="scrollbar side-menu-bg">
                            <ul class="nav navbar-nav side-menu" id="sidebarnav">
                                <!-- menu item Dashboard-->
                                <li>
                                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                                        <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Dashboard</span></div>
                                        <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
                                    </a>
                                    <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                                        <li> <a href="index.html">Dashboard 01</a> </li>
                                        <li> <a href="index-02.html">Dashboard 02</a> </li>
                                        <li> <a href="index-03.html">Dashboard 03</a> </li>
                                        <li> <a href="index-04.html">Dashboard 04</a> </li>
                                        <li> <a href="index-05.html">Dashboard 05</a> </li>
                                    </ul>
                                </li>
                                <!-- menu title -->
                                <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Components </li>
                                <!-- menu item Elements-->
                                <li>
                                    <a href="quiz.php" class='active'>
                                        <div class="pull-left"><i class="ti-bolt"></i><span class="right-nav-text"> Quiz </span></div>
                                    </a>
                                </li>
                                <li><br />
                                    <a href="seo_tools.php" class='active'>
                                        <div class="pull-left"><i class="ti-briefcase"></i><span class="right-nav-text"> SEO Tools </span></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Left Sidebar End-->

                    <!--=================================Main content -->

                    <!--=================================
                   wrapper -->

                    <div class="content-wrapper"><br />
                    <div class="page-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4 class="mb-0"> Generate XML SiteMap </h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                                        <li class="breadcrumb-item"><a href="index.html" class="default-color">Home</a></li>
                                        <li class="breadcrumb-item"><a href="seo_tools.php" class="default-color">SEO Tools</a></li>
                                        <li class="breadcrumb-item active">Ultimate XML SiteMap Generator</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- main body -->
                        <div class="row">   
                        <?php

require_once 'all_functions.php';

if (isset($_POST['url']))
    $my_url = raino_trim($_POST['url']);
    $my_url = "https://" . clean_url($my_url);
?>

<div class="container main-container">
    <div class="row">
<?php
//if($themeOptions['general']['sidebar'] == 'left')
//require_once(THEME_DIR."sidebar.php");
?>
        <div class="col-md-10 main-index">

            <div class="xd_top_box">
<?php //echo $ads_720x90;  ?>
            </div>

            <h2 id="title"><?php //echo $data['tool_name'];  ?></h2>

<?php //if ($pointOut != 'output') {  ?>

            <p><?php //echo $lang['6'];  ?>
            </p>
            <form method="POST" action="">
                <input type="text" name="url" placeholder="Enter Domain URL here" required autofocus class='form-control'><br />
                <input class='btn btn-success' type="submit" name="submit" value="Submit">
                <br /><br />
            </form>     

<?php
//} else { 
//Output Block
if (isset($error)) {

    echo '<br/><br/><div class="alert alert-error">
            <strong>Alert!</strong> ' . $error . '
            </div><br/><br/>
            <div class="text-center"><a class="btn btn-info" href="' . $toolURL . '">' . $lang['12'] . '</a>
            </div><br/>';
} else {
    ?>

                <h4><?php //echo $lang['10'];  ?></h4>

<?php if(isset($_POST['submit'])){ 

                if (isset($_POST['url']))
                    define("OUTPUT_FILE", "sitemap_" . $_POST['url'] . ".xml");


                // Set the start URL. Example: define ("SITE", "https://www.example.com");
                if (isset($_POST['url']))
                    define("SITE", $_POST['url']);


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



                /*                 * ***********************************************************
                  End of user defined settings.
                 * *********************************************************** */

                function GetPage($url) {
                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_USERAGENT, AGENT);

                    $data = curl_exec($ch);

                    curl_close($ch);

                    return $data;
                }

                function GetQuotedUrl($str) {
                    $quote = substr($str, 0, 1);
                    if (($quote != "\"") && ($quote != "'")) { // Only process a string                                         // starting with singe or
                        return $str;                         // double quotes
                    }

                    $ret = "";
                    $len = strlen($str);
                    for ($i = 1; $i < $len; $i++) { // Start with 1 to skip first quote
                        $ch = substr($str, $i, 1);

                        if ($ch == $quote)
                            break; // End quote reached

                        $ret .= $ch;
                    }

                    return $ret;
                }

                function GetHREFValue($anchor) {
                    $split1 = explode("href=", $anchor);
                    $split2 = explode(">", $split1[1]);
                    $href_string = $split2[0];

                    $first_ch = substr($href_string, 0, 1);
                    if ($first_ch == "\"" || $first_ch == "'") {
                        $url = GetQuotedUrl($href_string);
                    } else {
                        $spaces_split = explode(" ", $href_string);
                        $url = $spaces_split[0];
                    }
                    return $url;
                }

                function GetEffectiveURL($url) {
                    // Create a curl handle
                    $ch = curl_init($url);

                    // Send HTTP request and follow redirections
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_USERAGENT, AGENT);
                    curl_exec($ch);

                    // Get the last effective URL
                    $effective_url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
                    // ie. "http://example.com/show_location.php?loc=M%C3%BCnchen"
                    // Decode the URL, uncoment it an use the variable if needed
                    // $effective_url_decoded = curl_unescape($ch, $effective_url);
                    // "http://example.com/show_location.php?loc=München"
                    // Close the handle
                    curl_close($ch);

                    return $effective_url;
                }

                function ValidateURL($url_base, $url) {
                    global $scanned;

                    $parsed_url = parse_url($url);

                    $scheme = $parsed_url["scheme"];

                    // Skip URL if different scheme or not relative URL (skips also mailto)
                    if (($scheme != SITE_SCHEME) && ($scheme != ""))
                        return false;

                    $host = $parsed_url["host"];

                    // Skip URL if different host
                    if (($host != SITE_HOST) && ($host != ""))
                        return false;

                    // Check for page anchor in url
                    if ($page_anchor_pos = strpos($url, "#")) {
                        // Cut off page anchor
                        $url = substr($url, 0, $page_anchor_pos);
                    }

                    if ($host == "") {    // Handle URLs without host value
                        if (substr($url, 0, 1) == '/') { // Handle absolute URL
                            $url = SITE_SCHEME . "://" . SITE_HOST . $url;
                        } else { // Handle relative URL
                            $path = parse_url($url_base, PHP_URL_PATH);

                            if (substr($path, -1) == '/') { // URL is a directory
                                // Construct full URL
                                $url = SITE_SCHEME . "://" . SITE_HOST . $path . $url;
                            } else { // URL is a file
                                $dirname = dirname($path);

                                // Add slashes if needed
                                if ($dirname[0] != '/') {
                                    $dirname = "/$dirname";
                                }

                                if (substr($dirname, -1) != '/') {
                                    $dirname = "$dirname/";
                                }

                                // Construct full URL
                                $url = SITE_SCHEME . "://" . SITE_HOST . $dirname . $url;
                            }
                        }
                    }

                    // Get effective URL, follow redirected URL
                    $url = GetEffectiveURL($url);

                    // Don't scan when already scanned    
                    if (in_array($url, $scanned))
                        return false;

                    return $url;
                }

// Skip URLs from the $skip_url array
                function SkipURL($url) {
                    global $skip_url;

                    if (isset($skip_url)) {
                        foreach ($skip_url as $v) {
                            if (substr($url, 0, strlen($v)) == $v)
                                return true; // Skip this URL
                        }
                    }

                    return false;
                }
                    $count = 0;
                function Scan($url) {
                    global $scanned, $pf;
                    

                    $scanned[] = $url;  // Add URL to scanned array

                    if (SkipURL($url)) {
                        echo "Skip URL $url" . NL;
                        return false;
                    }

                    // Remove unneeded slashes
                    if (substr($url, -2) == "//") {
                        $url = substr($url, 0, -2);
                    }
                    if (substr($url, -1) == "/") {
                        $url = substr($url, 0, -1);
                    }


                    echo "Scanning $url" . NL;
                    
                    stream_context_set_default( [
                    'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                        ],
                    ]);

                    @$headers = get_headers($url, 1);

                    // Handle pages not found
                    if (strpos($headers[0], "404") !== false) {
                        echo "Not found: $url" . NL;
                        return false;
                    }

                    // Handle redirected pages
                    if (strpos($headers[0], "301") !== false) {
                        $url = $headers["Location"];     // Continue with new URL
                        echo "Redirected to: $url" . NL;
                    }
                    // Handle other codes than 200
                    else if (strpos($headers[0], "200") == false) {
                        $url = $headers["Location"];
                        //echo "Skip HTTP code $headers[0]: $url" . NL;
                        return false;
                    }

                    // Get content type
                    if (is_array($headers["Content-Type"])) {
                        $content = explode(";", $headers["Content-Type"][0]);
                    } else {
                        $content = explode(";", $headers["Content-Type"]);
                    }

                    $content_type = trim(strtolower($content[0]));

                    // Check content type for website
                    if ($content_type != "text/html") {
                        if ($content_type == "" && IGNORE_EMPTY_CONTENT_TYPE) {
                            echo "Info: Ignoring empty Content-Type." . NL;
                        } else {
                            if ($content_type == "") {
                                echo "Info: Content-Type is not sent by the web server. Change " .
                                "'IGNORE_EMPTY_CONTENT_TYPE' to 'true' in the sitemap script " .
                                "to scan those pages too." . NL;
                            } else {
                                echo "Info: $url is not a website: $content[0]" . NL;
                            }
                            return false;
                        }
                    }

                    $html = GetPage($url);
                    $html = trim($html);
                    if ($html == "")
                        return true;  // Return on empty page

                    $html = preg_replace("/(\<\!\-\-.*\-\-\>)/sU", "", $html); // Remove commented text
                    $html = str_replace("\r", " ", $html);        // Remove newlines
                    $html = str_replace("\n", " ", $html);        // Remove newlines
                    $html = str_replace("\t", " ", $html);        // Remove tabs
                    $html = str_replace("<A ", "<a ", $html);     // <A to lowercase

                    $first_anchor = strpos($html, "<a ");    // Find first anchor

                    if ($first_anchor === false)
                        return true; // Return when no anchor found

                    $html = substr($html, $first_anchor);    // Start processing from first anchor

                    $a1 = explode("<a ", $html);
                    foreach ($a1 as $next_url) {
                        $count++;
                        $next_url = trim($next_url);

                        // Skip empty array entry
                        if ($next_url == "")
                            continue;

                        // Get the attribute value from href
                        $next_url = GetHREFValue($next_url);

                        // Do all skip checks and construct full URL
                        $next_url = ValidateURL($url, $next_url);

                        // Skip if url is not valid
                        if ($next_url == false)
                            continue;

                        if (Scan($next_url)) {
                            // Add URL to sitemap
                            fwrite($pf, "  <url>\n" .
                                    "    <loc>" . htmlentities($next_url) . "</loc>\n" .
                                    "    <changefreq>" . FREQUENCY . "</changefreq>\n" .
                                    "    <priority>" . PRIORITY . "</priority>\n" .
                                    "  </url>\n");
                        }
                    }
                    $_SESSION['count'] = $count;
                    return true;
                }

                // Program start
                define("VERSION", "2.4");
                define("NL", CLI ? "\n" : "<br>");

                // Print configuration
                /*    echo "Plop PHP XML Sitemap Generator Configuration:" . NL;
                  echo "VERSION: " . VERSION . NL;
                  echo "OUTPUT_FILE: " . OUTPUT_FILE . NL;
                  echo "SITE: " . SITE . NL;
                  echo "CLI: " . (CLI ? "true" : "false"). NL;
                  echo "IGNORE_EMPTY_CONTENT_TYPE: " . (IGNORE_EMPTY_CONTENT_TYPE ? "true" : "false") . NL;
                  echo "DATE: " . date ("Y-m-d H:i:s") . NL;
                  echo NL;
                 */
                // SITE configuration check    
                //if (!SITE)
                //{
                //die ("ERROR: You did not set the SITE variable at line number " . 
                //"68 with the URL of your website!\n");
                //}

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
                ?>
                <br /><a href='download.php' class='btn btn-info'><i class='fa fa-download'></i> Download XML SiteMap</a><br />
                <small><b>(Rename file to 'sitemap.xml' after download and upload it to your server)</b></small>
                <?php

?>
<br />

            <div class="xd_top_box">
            <?php //echo $ads_720x90; ?>
            </div>

<!--h2 id="sec1" class="about_tool"><?php //echo $lang['11'].' '.$data['tool_name']; ?></h2>
<p>
            <?php //echo $data['about_tool']; ?>
</p--> 
<?php } } //}  ?>

        </div>              

            <?php
            //if($themeOptions['general']['sidebar'] == 'right')
            //require_once(THEME_DIR."sidebar.php");
            ?>    		
    </div>
</div> <br />
                        </div>
                        <br /><br />
                        <!-- footer -->

                        <footer class="bg-white p-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-center text-md-left">
                                        <p class="mb-0"> &copy; Copyright <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span>. <a href="#"> Webmin </a> All Rights Reserved. </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <ul class="text-center text-md-right">
                                        <li class="list-inline-item"><a href="#">Terms & Conditions </a> </li>
                                        <li class="list-inline-item"><a href="#">API Use Policy </a> </li>
                                        <li class="list-inline-item"><a href="#">Privacy Policy </a> </li>
                                    </ul>
                                </div>
                            </div>
                        </footer>
                    </div> 
                </div>
            </div>
        </div>

        <!--=================================
         footer -->



        <!--=================================
         jquery -->

        <!-- jquery -->
        <script src="js/jquery-3.3.1.min.js"></script>

        <!-- plugins-jquery -->
        <script src="js/plugins-jquery.js"></script>

        <!-- plugin_path -->
        <script>var plugin_path = 'js/';</script>

        <!-- chart -->
        <script src="js/chart-init.js"></script>

        <!-- calendar -->
        <script src="js/calendar.init.js"></script>

        <!-- charts sparkline -->
        <script src="js/sparkline.init.js"></script>

        <!-- charts morris -->
        <script src="js/morris.init.js"></script>

        <!-- datepicker -->
        <script src="js/datepicker.js"></script>

        <!-- sweetalert2 -->
        <script src="js/sweetalert2.js"></script>

        <!-- toastr -->
        <script src="js/toastr.js"></script>

        <!-- validation -->
        <script src="js/validation.js"></script>

        <!-- lobilist -->
        <script src="js/lobilist.js"></script>

        <!-- custom -->
        <script src="js/custom.js"></script>

    </body>
</html>