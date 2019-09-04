<!DOCTYPE html>
<?php include_once 'dbconn.php'; 
ini_set('max_execution_time', 1200); ?>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
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
            @media screen and (max-width: 600px) {
                .progress-bar {
                background-color: lightgray;
                }
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
                                    <h4 class="mb-0"> Desktop & Mobile Suggestions </h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                                        <li class="breadcrumb-item"><a href="index.html" class="default-color">Home</a></li>
                                        <li class="breadcrumb-item"><a href="seo_tools.php" class="default-color">SEO Tools</a></li>
                                        <li class="breadcrumb-item active">Desktop & Mobile Suggestions</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- main body -->
                        <div class="row">   
                        <?php

require_once 'all_functions.php';

if (isset($_POST['url'])){

$domain = clean_url($_POST['url']);

$mobile = json_decode(page_statistic_speed_mobile($domain));
$desktop = json_decode(page_statistic_speed_desktop($domain));

$d_redir = $desktop[0];
$d_redir->summary = str_replace('{{BEGIN_LINK}}','<a target="_blank" href="'. $d_redir->url .'">',$d_redir->summary);
$d_redir->summary = str_replace('{{END_LINK}}','</a>',$d_redir->summary);
$d_numredir = count($desktop[1]);
$d_compress = $desktop[2];
$d_compress->summary = str_replace('{{BEGIN_LINK}}','<a target="_blank" href="'. $d_compress->url .'">',$d_compress->summary);
$d_compress->summary = str_replace('{{END_LINK}}','</a>',$d_compress->summary);
$d_leverage = $desktop[3];
$d_leverage->summary = str_replace('{{BEGIN_LINK}}','<a target="_blank" href="https://developers.google.com/speed/docs/insights/LeverageBrowserCaching">',$d_leverage->summary);
$d_leverage->summary = str_replace('{{END_LINK}}','</a>',$d_leverage->summary);
$d_response = $desktop[5];
$d_response->summary = str_replace('{{BEGIN_LINK}}','<a target="_blank" href="https://developers.google.com/speed/docs/insights/Server">',$d_response->summary);
$d_response->summary = str_replace('{{END_LINK}}','</a>',$d_response->summary);
$d_mincss = $desktop[7];
$d_mincss->summary = str_replace('{{BEGIN_LINK}}','<a target="_blank" href="https://developers.google.com/speed/docs/insights/MinifyResources">',$d_mincss->summary);
$d_mincss->summary = str_replace('{{END_LINK}}','</a>',$d_mincss->summary);
$d_minhtml = $desktop[10];
$d_minhtml->summary = str_replace('{{BEGIN_LINK}}','<a target="_blank" href="https://developers.google.com/speed/docs/insights/MinifyResources">',$d_minhtml->summary);
$d_minhtml->summary = str_replace('{{END_LINK}}','</a>',$d_minhtml->summary);
$d_minjs = $desktop[11];
$d_minjs->summary = str_replace('{{BEGIN_LINK}}','<a target="_blank" href="https://developers.google.com/speed/docs/insights/MinifyResources">',$d_minjs->summary);
$d_minjs->summary = str_replace('{{END_LINK}}','</a>',$d_minjs->summary);
$d_renderblock = $desktop[14];
$d_numrenderblockjs = $desktop[15][0];
$d_numrenderblockcss = $desktop[15][1];
$d_renderblock->summary = str_replace('{{NUM_SCRIPTS}}',"$d_numrenderblockjs",$d_renderblock->summary);
$d_renderblock->summary = str_replace('{{NUM_CSS}}',"$d_numrenderblockcss",$d_renderblock->summary);
$d_optimage = $desktop[18];
$d_optimage->summary = str_replace('{{BEGIN_LINK}}','<a target="_blank" href="https://developers.google.com/speed/docs/insights/OptimizeImages">',$d_optimage->summary);
$d_optimage->summary = str_replace('{{END_LINK}}','</a>',$d_optimage->summary);
$d_visible = $desktop[21];
$d_visible->summary = str_replace('{{BEGIN_LINK}}','<a target="_blank" href="https://developers.google.com/speed/docs/insights/OptimizeImages">',$d_visible->summary);
$d_visible->summary = str_replace('{{END_LINK}}','</a>',$d_visible->summary);
$d_visible->summary = str_replace('formatting and compressing images can save many bytes of data','prioritizing visible content can attract more visitors',$d_visible->summary);


$m_redir = $mobile[0];
$m_redir->summary = str_replace('{{BEGIN_LINK}}','<a target="_blank" href="'. $m_redir->redirecturl .'">',$m_redir->summary);
$m_redir->summary = str_replace('{{END_LINK}}','</a>',$m_redir->summary);
$m_numredir = count($mobile[1]);
$m_compress = $mobile[2];
$m_compress->summary = str_replace('{{BEGIN_LINK}}','<a target="_blank" href="'. $m_compress->redirecturl .'">',$m_compress->summary);
$m_compress->summary = str_replace('{{END_LINK}}','</a>',$m_compress->summary);
$m_leverage = $mobile[4];
$m_leverage->summary = str_replace('{{BEGIN_LINK}}','<a target="_blank" href="https://developers.google.com/speed/docs/insights/LeverageBrowserCaching">',$m_leverage->summary);
$m_leverage->summary = str_replace('{{END_LINK}}','</a>',$m_leverage->summary);
$m_response = $mobile[6];
$m_response->summary = str_replace('{{BEGIN_LINK}}','<a target="_blank" href="https://developers.google.com/speed/docs/insights/Server">',$m_response->summary);
$m_response->summary = str_replace('{{END_LINK}}','</a>',$m_response->summary);
$m_mincss = $mobile[8];
$m_mincss->summary = str_replace('{{BEGIN_LINK}}','<a target="_blank" href="https://developers.google.com/speed/docs/insights/MinifyResources">',$m_mincss->summary);
$m_mincss->summary = str_replace('{{END_LINK}}','</a>',$m_mincss->summary);
$m_minhtml = $mobile[10];
$m_minhtml->summary = str_replace('{{BEGIN_LINK}}','<a target="_blank" href="https://developers.google.com/speed/docs/insights/MinifyResources">',$m_minhtml->summary);
$m_minhtml->summary = str_replace('{{END_LINK}}','</a>',$m_minhtml->summary);
$m_minjs = $mobile[12];
$m_minjs->summary = str_replace('{{BEGIN_LINK}}','<a target="_blank" href="https://developers.google.com/speed/docs/insights/MinifyResources">',$m_minjs->summary);
$m_minjs->summary = str_replace('{{END_LINK}}','</a>',$m_minjs->summary);
$m_renderblock = $mobile[14];
$m_numrenderblockjs = $m_renderblock->summary_num_script;
$m_numrenderblockcss = $m_renderblock->summary_num_css;
$m_renderblock->summary = str_replace('{{NUM_SCRIPTS}}',"$m_numrenderblockjs",$m_renderblock->summary);
$m_renderblock->summary = str_replace('{{NUM_CSS}}',"$m_numrenderblockcss",$m_renderblock->summary);
$m_renderblock->summary_urlblock_header = str_replace('following ','',$m_renderblock->summary_urlblock_header);
$m_optimage = $mobile[17];
$m_optimage->summary = str_replace('{{BEGIN_LINK}}','<a target="_blank" href="https://developers.google.com/speed/docs/insights/OptimizeImages">',$m_optimage->summary);
$m_optimage->summary = str_replace('{{END_LINK}}','</a>',$m_optimage->summary);
$m_visible = $mobile[19];
$m_visible->summary = str_replace('{{BEGIN_LINK}}','<a target="_blank" href="https://developers.google.com/speed/docs/insights/OptimizeImages">',$m_visible->summary);
$m_visible->summary = str_replace('{{END_LINK}}','</a>',$m_visible->summary);
$m_visible->summary = str_replace('formatting and compressing images can save many bytes of data','prioritizing visible content can attract more visitors',$m_visible->summary);
$m_usability = $mobile[20];
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
                <input type='text' placeholder='Enter URL here' name="url" class="form-control" required autofocus><br />
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
<div id="meta">
        <div class='row' style='box-shadow:0 2px 2px 0 gray;padding: 10px;background-color: white;'>
            <table class='table table-bordered table-striped'>
    <tr><th colspan='2'><h2>Desktop Suggestions</h2><th></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$d_redir->rule_name)); ?></b></td><td><?php echo $d_redir->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$d_compress->rule_name)); ?></b></td><td><?php echo $d_compress->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$d_leverage->rule_name)); ?></b></td><td><?php echo $d_leverage->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$d_response->rule_name)); ?></b></td><td><?php echo $d_response->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$d_mincss->rule_name)); ?></b></td><td><?php echo $d_mincss->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$d_minhtml->rule_name)); ?></b></td><td><?php echo $d_minhtml->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$d_minjs->rule_name)); ?></b></td><td><?php echo $d_minjs->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$d_renderblock->rule_name)); ?></b></td><td><?php echo $d_renderblock->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$d_optimage->rule_name)); ?></b></td><td><?php echo $d_optimage->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$d_visible->rule_name)); ?></b></td><td><?php echo $d_visible->summary; ?></td></tr>
            </table>
        </div>
        <div class='row' style='box-shadow:0 2px 2px 0 gray;padding: 10px;background-color: white;'>
            <table class='table table-bordered table-striped'>
    <tr><th colspan='2'><h2>Mobile Suggestions</h2><th></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$m_redir->rule_name)); ?></b></td><td><?php echo $m_redir->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$m_compress->rule_name)); ?></b></td><td><?php echo $m_compress->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$m_leverage->rule_name)); ?></b></td><td><?php echo $m_leverage->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$m_response->rule_name)); ?></b></td><td><?php echo $m_response->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$m_mincss->rule_name)); ?></b></td><td><?php echo $m_mincss->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$m_minhtml->rule_name)); ?></b></td><td><?php echo $m_minhtml->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$m_minjs->rule_name)); ?></b></td><td><?php echo $m_minjs->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$m_renderblock->rule_name)); ?></b></td><td><?php echo $m_renderblock->summary . ' ' . $m_renderblock->summary_urlblock_header; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$m_optimage->rule_name)); ?></b></td><td><?php echo $m_optimage->summary; ?></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$m_visible->rule_name)); ?></b></td><td><?php echo $m_visible->summary; ?></td></tr>
    <tr><td><b><?php echo 'Usability Score'; ?></td><td><?php echo $m_usability->usability_score . ' / 100'; ?></td></tr>
            </table>
    </div><br />

<br />

            <div class="xd_top_box">
            <?php //echo $ads_720x90; ?>
            </div>
</div>
<!--h2 id="sec1" class="about_tool"><?php //echo $lang['11'].' '.$data['tool_name']; ?></h2>
<p>
            <?php //echo $data['about_tool']; ?>
</p--> 
<?php } } //}  ?>


            <?php
            //if($themeOptions['general']['sidebar'] == 'right')
            //require_once(THEME_DIR."sidebar.php");
            ?>    
            
            </div>
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