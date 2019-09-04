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
        
            .badge {color:white;}
        
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
                                    <h4 class="mb-0"> Website Link Count Checker </h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                                        <li class="breadcrumb-item"><a href="index.html" class="default-color">Home</a></li>
                                        <li class="breadcrumb-item"><a href='seo_tools.php' class='default-color'>SEO Tools</a></li>
                                        <li class="breadcrumb-item active">Website Link Count Checker</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- main body -->
                        <div class="row">   
<div class="container main-container">
    <div class="row">
        <?php
        include 'functions/functions.php';

        function doLinkAnalysis($my_url){
        
    //Set Execution Time
    ini_set('max_execution_time', 20*60);
    
    //Library
    require_once ("simple_html_dom.php");
    
    //Define Variables
    $ex_data_arr = array();
    $t_count = 0;
    $i_links = 0;
    $e_links = 0;
    $i_nofollow = 0;
    $e_nofollow = 0;
    
    //Get Data
    $data = file_get_html($my_url);
    
    if($data == '')
        return false;
    
    //Parse the main URL - Host / Path / Query 
    $my_url_parse = parse_url($my_url);
    $my_url_host = str_replace("www.", "", $my_url_parse['host']);
    $my_url_path = $my_url_parse['path'];
    $my_url_query = $my_url_parse['query'];
    $find_out = $data->find("a");
    
    //Extract Links
    foreach ($find_out as $href)
    {
        if (!in_array($href->href, $ex_data_arr))
        {
            if (substr($href->href, 0, 1) != "" && $href->href != "#")
            {
                $ex_data_arr[] = $href->href;
                $ex_data[] = array('href' => $href->href, 'rel' => $href->rel);
            }
        }
    }

    //Internal Links
    foreach ($ex_data as $count => $link)
    {
        $t_count++;
        $parse_urls = parse_url($link['href']);
        $type = strtolower($link['rel']);

        if ($parse_urls['host'] == $my_url_host || $parse_urls['host'] == "www." . $my_url_host)
        {
            $i_links++;
            $int_data[$i_links]['inorout'] = "internal";
            $int_data[$i_links]['href'] = $link['href'];
            if ($type == 'dofollow' || ($type != 'dofollow' && $type != 'nofollow'))
            {
                $int_data[$i_links]['follow_type'] = "dofollow";
            }
            if ($type == 'nofollow')
            {
                $i_nofollow++;
                $int_data[$i_links]['follow_type'] = "nofollow";
            }
        } elseif ((substr($link['href'], 0, 2) != "//") && (substr($link['href'], 0, 1) ==
        "/"))
        {
            $i_links++;
            $int_data[$i_links]['inorout'] = "internal";
            $int_data[$i_links]['href'] = $link['href'];
            if ($type == 'dofollow' || ($type != 'dofollow' && $type != 'nofollow'))
            {
                $int_data[$i_links]['follow_type'] = "dofollow";
            }
            if ($type == 'nofollow')
            {
                $i_nofollow++;
                $int_data[$i_links]['follow_type'] = "nofollow";
            }
        }

    }

    //External Links
    foreach ($ex_data as $count => $link)
    {
        $parse_urls = parse_url($link['href']);
        $type = strtolower($link['rel']);

        if ($parse_urls !== false && isset($parse_urls['host']) && $parse_urls['host'] !=
            $my_url_host && $parse_urls['host'] != "www." . $my_url_host)
        {
            $e_links++;
            $ext_data[$e_links]['inorout'] = "external";
            $ext_data[$e_links]['href'] = $link['href'];
            if ($type == 'dofollow' || ($type != 'dofollow' && $type != 'nofollow'))
            {
                $ext_data[$e_links]['follow_type'] = "dofollow";
            }
            if ($type == 'nofollow')
            {
                $e_nofollow++;
                $ext_data[$e_links]['follow_type'] = "nofollow";
            }
        } elseif ((substr($link['href'], 0, 2) == "//") && (substr($link['href'], 0, 1) !=
        "/"))
        {
            $e_links++;
            $ext_data[$e_links]['inorout'] = "external";
            $ext_data[$e_links]['href'] = $link['href'];
            if ($type == 'dofollow' || ($type != 'dofollow' && $type != 'nofollow'))
            {
                $ext_data[$e_links]['follow_type'] = "dofollow";
            }
            if ($type == 'nofollow')
            {
                $e_nofollow++;
                $ext_data[$e_links]['follow_type'] = "nofollow";
            }
        }
    }
    
    //Return the data as Array
    return array(
        $int_data,
        $i_links,
        $i_nofollow,
        $ext_data,
        $e_links,
        $e_nofollow,
        $t_count);
}

        $my_url = raino_trim($_POST['url']);
        $my_url = clean_with_www($my_url);
        $my_url = Trim("http://$my_url");
        if (filter_var($my_url, FILTER_VALIDATE_URL) === false) {
            $error = $lang['327'];
        } else {
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
        }

//        if($themeOptions['general']['sidebar'] == 'left')
//            require_once(THEME_DIR."sidebar.php");
        ?>
        <div class="col-md-10 main-index">

            <div class="xd_top_box">
                <?php //echo $ads_720x90; ?>
            </div>

            <h2 id="title"><?php //echo $data['tool_name'];  ?></h2>

            <?php //if ($pointOut != 'output') { ?>
            <br />
            <p><?php //echo $lang['23'];  ?>
            </p>
            <form method="POST" action="" onsubmit="return fixURL();"> 
                <input type="text" name="url" id="url" value="" class="form-control" placeholder="Enter URL here" required autofocus/>
                <br />
                <?php //if ($toolCap) echo $captchaCode; ?>
                <input class="btn btn-info" type="submit" value="Submit" name="submit"/>
            </form>     

            <?php
//           } else { 
            //Output Block
            //         if(isset($error)) {

            /*        echo '<br/><br/><div class="alert alert-error">
              <strong>Alert!</strong> '.$error.'
              </div><br/><br/>
              <div class="text-center"><a class="btn btn-info" href="'.$toolURL.'">'.$lang['12'].'</a>
              </div><br/>';

              } else {
             */
            if (isset($_POST['submit'])) {
                ?>

                <br />
                <div class="box box-info">
                    <div class="box-header">

                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered" style='max-width:100%;'>
                            <tbody><tr>
                                    <th><?php echo 'Page URL'; ?></th>
                                    <th><?php echo 'Total Links'; ?></th>
                                    <th><?php echo 'Internal Links'; ?></th>
                                    <th><?php echo 'External Links'; ?></th>
                                </tr>
                                <tr>
                                    <td><?php echo $my_url; ?></td>
                                    <td><?php echo $total_links; ?></td>
                                    <td><?php echo $internal_links_count; ?></td>
                                    <td><?php echo $external_links_count; ?></td>
                                </tr>
                            </tbody></table>
                        <br />

                    </div><!-- /.box-body -->

                </div>

            <?php } //} ?>

            <br />

            <div class="xd_top_box">
                <?php //echo $ads_720x90; ?>
            </div>

            <h2 id="sec1" class="about_tool"><?php //echo $lang['11'].' '.$data['tool_name'];  ?></h2>
            <p>
                <?php //echo $data['about_tool']; ?>
            </p> <br />
        </div>              
        <?php
//        if($themeOptions['general']['sidebar'] == 'right')
//            require_once(THEME_DIR."sidebar.php");
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