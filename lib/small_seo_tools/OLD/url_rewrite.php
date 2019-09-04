<!DOCTYPE html>
<?php include_once 'dbconn.php'; ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
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
                                    <h4 class="mb-0"> URL Rewrite </h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                                        <li class="breadcrumb-item"><a href="index.html" class="default-color">Home</a></li>
                                        <li class="breadcrumb-item"><a href="seo_tools.php" class="default-color">SEO Tools</a></li>
                                        <li class="breadcrumb-item active">URL Rewrite</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- main body -->
                        <div class="row">   
                        <?php

require_once 'all_functions.php';

function split_up_me($url) {
    $url = htmlspecialchars_decode($url);
    $arr = parse_url($url);
    $arg_arr = explode("&", $arr['query']);
    $file_arr = explode("/", $arr['path']);

    foreach ($file_arr as $val) {
        $filename = $val;
    }

    $file_without = explode(".", $filename);
    $file_without = $file_without[0];

    foreach ($arg_arr as $val) {
        $arg[] = explode("=", $val);
    }
    return array(
        $filename,
        $file_without,
        $arg);
}

function checkDyn($url) {
    $url = htmlspecialchars_decode($url);
    $arr = parse_url($url);
    if ($arr['query'] == '') {
        return '0';
    } else {

        return '1';
    }
}

if (isset($_POST['url'])) {
    $r_1 = $r_2 = $r_3 = "";
    $my_url9 = "http://" . clean_with_www(raino_trim($_POST['url']));
    if (filter_var($my_url9, FILTER_VALIDATE_URL) === false) {
        $error = 'Error';
    } else {
        $regUserInput = $my_url9;
        $arr = parse_url($my_url9);
        $checkDyn = checkDyn($my_url9);
        if ($checkDyn == '0') {
            $error = 'URL not Dynamic'; //'URL entered does not seem to be a dynamic URL';        
        } else {
            $my_domain = clean_with_www($arr['host']);
            $example_url = $arr['scheme'] . "://" . $arr['host'] . $arr['path'];
            $arr_val = split_up_me($my_url9);
            $filename = Trim($arr_val[0]);
            $f_without_e = Trim($arr_val[1]);
            $parsed_arg = $arr_val[2];
            $start = 1;

            $sht_url = str_replace($filename, "", $example_url);
            $sht_url = $sht_url . $f_without_e;
            $dht_ex_url = $dht_url = $sht_ex_url = $sht_url;

            foreach ($parsed_arg as $argf => $value) {
                if ($start == 1) {
                    $syb = "?";
                } else {
                    $syb = "&";
                }
                $sht_url = $sht_url . "-" . $value[0] . "-" . $value[1];
                $dht_url = $dht_url . "/" . $value[0] . "/" . $value[1];
                $dht_ex_url = $dht_ex_url . "/" . $value[0] . "/(Any Value)";
                $sht_ex_url = $sht_ex_url . "-" . $value[0] . "-(Any Value)";
                $r_1 = $r_1 . "-$value[0]-(.*)";
                $r_2 = $r_2 . $syb . "$value[0]=$$start";
                $r_3 = $r_3 . "/$value[0]/(.*)";
                $start++;
            }
            $sht_url = Trim($sht_url) . ".htm";
            $dht_url = Trim($dht_url) . "/";
            $sht_ex_url = Trim($sht_ex_url) . ".htm";
            $dht_ex_url = Trim($dht_ex_url) . "/";
            $sht_data = "Options +FollowSymLinks\r\nRewriteEngine on\r\nRewriteRule $f_without_e" . Trim($r_1) . "\.htm$ $filename" . Trim($r_2);
            $dht_data = "Options +FollowSymLinks\r\nRewriteEngine on\r\nRewriteRule $f_without_e" . Trim($r_3) . "/ $filename" . Trim($r_2) . "\r\nRewriteRule $f_without_e" . Trim($r_3) . " $filename" . Trim($r_2);
        }
    }
}
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
                <input type="text" name="url" placeholder="Enter Dynamic URL" required autofocus class='form-control'>
                <code>Eg. http://www.example.com/test.php?firstid=1&secondid=10</code><br /><br />
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

<?php if(isset($_POST['submit'])){ ?>

    <b><?php echo 'Type 1 - Single Page URL'; ?></b><br />
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td><strong><?php echo 'Generated URL'; ?></strong></td>
                <td><?php echo $sht_url; ?></td>
            </tr>
            <tr>
                <td><strong><?php echo 'Example URL'; ?></strong></td>
                <td><?php echo $sht_ex_url; ?></td>
            </tr>
        </tbody></table>

    <?php echo 'Create a .htaccess file with the code below'; ?><br />
    <?php echo 'The .htaccess file needs to be placed in ' . $my_domain; ?><br />
    <textarea rows="5" class="form-control" readonly="" style="width: 80%;"><?php echo $sht_data; ?></textarea>

    <br /> <br /> <b><?php echo 'Type 2 -Directory Type URL'; ?></b> <br />

    <table class="table table-bordered">
        <tbody>
            <tr>
                <td><strong><?php echo 'Generated URL'; ?></strong></td>
                <td><?php echo $dht_url; ?></td>
            </tr>
            <tr>
                <td><strong><?php echo 'Example URL'; ?></strong></td>
                <td><?php echo $dht_ex_url; ?></td>
            </tr>
        </tbody></table>
    <?php echo 'Create a .htaccess file with the code below'; ?><br />
    <?php echo 'The .htaccess file needs to be placed in ' . $my_domain; ?><br />
    <textarea rows="5" class="form-control" readonly="" style="width: 80%;"><?php echo $dht_data; ?></textarea>
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