<!DOCTYPE html>
<?php include_once 'dbconn.php'; require_once 'all_functions.php'; ?>
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
                                    <h4 class="mb-0"> Alexa Information </h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                                        <li class="breadcrumb-item"><a href="index.html" class="default-color">Home</a></li>
                                        <li class="breadcrumb-item"><a href="seo_tools.php" class="default-color">SEO Tools</a></li>
                                        <li class="breadcrumb-item active">Alexa Info</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- main body -->
                        <div class="row">   
                        <?php
require_once 'simple_dom.php';
//require_once 'all_functions.php';

?>
<br/>
<?php
if (isset($_POST['url'])) {
    $alexa_data_full = alexa_raw_data(clean_url($_POST['url']));

    //Output Variables Start
    
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
    
    //Output Variables End
}
?>
        <div class="col-md-10 main-index">
            <form method="POST" action="">
                <input type="text" name="url" placeholder="Enter URL here" class='form-control'><br />
                <input class='btn btn-success' type="submit" name="submit" value="Submit">
                <br /><br />
            </form>
        </div>
<?php
if (isset($_POST['submit'])) {
    ?>
    <div class="container-fluid">
        <div class="row" style='box-shadow: 2px 2px 2px 2px lightblue;'>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div style="box-shadow: 0 2px 2px 0 lightgray" class="info-box">
                    <span class="info-box-icon"></span>
                    <div class="info-box-content">
                        <span class="info-box-text" style='color: blue;'><?php echo 'Domain Name - '; ?></span>
                        <span id="total_unique_visitor" class="info-box-number"><?php echo ucfirst($_POST['url']); ?></span>
                    </div><!-- /.info-box-content -->
                </div>
            </div>	

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div style="box-shadow: 0 2px 2px 0 lightgray" class="info-box">
                    <span class="info-box-icon bg-green"></span>
                    <div class="info-box-content">
                        <span class="info-box-text" style='color: blue;'><?php echo 'Global Rank - '; ?></span>
                        <span id="total_unique_visitor" class="info-box-number"><?php echo $global_rank; ?></span>
                    </div><!-- /.info-box-content -->
                </div>
            </div>	

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div style="box-shadow: 0 2px 2px 0 lightgray" class="info-box">
                    <span class="info-box-icon bg-yellow"></span>
                    <div class="info-box-content">
                        <span class="info-box-text" style='color: blue;'><?php echo 'Top Country Rank - '; ?></span>
                        <span id="total_unique_visitor" class="info-box-number"><?php echo $country; ?> - <?php echo $country_rank; ?></span>
                    </div><!-- /.info-box-content -->
                </div>
            </div>		
        </div><br />


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 style="color: blue; word-spacing: 5px;" class="box-title"><?php echo 'Alexa Traffic Ranks'; ?></h3>
                    </div>
                    <div class="box-body chart-responsive">
                        <img src="<?php echo $traffic_rank_graph; ?>" alt="Graph not found!" class="img-responsive" style="width:100%">
                    </div>
                </div> <!-- end box -->
            </div>
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 style="color: blue; word-spacing: 5px;" class="box-title"><?php echo 'Visitors per Country'; ?></h3>
                    </div>
                    <div class="box-body chart-responsive table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Country</th>
                                    <th>Percent of Visitors</th>
                                    <th>Rank in Country</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sl = 0;
                                if (is_array($country_name) && is_array($country_in_rank) && is_array($country_percent_visitor)) {
                                    foreach ($country_name as $key => $val) {
                                        $sl++;
                                        if (array_key_exists($key, $country_name) && array_key_exists($key, $country_in_rank) && array_key_exists($key, $country_percent_visitor))
                                            echo "<tr><td>" . $sl . "</td>";
                                        echo "<td>" . $country_name[$key] . "</td>";
                                        echo "<td>" . $country_percent_visitor[$key] . "</td>";
                                        echo "<td>" . $country_in_rank[$key] . "</td></tr>";
                                    }
                                    if (count($country_name) == 0 || count($country_in_rank) == 0 || count($country_percent_visitor) == 0)
                                        echo "<tr><td colspan='4'>No data found!</td></tr>";
                                }
                                else {
                                    echo "<tr><td colspan='4'>No data found!</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end box -->			
            </div>
            </div>


            <div class="row" style='box-shadow: 2px 2px 2px 2px lightblue;'>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="info-box bg-blue">
                        <span class="info-box-icon"></span>
                        <div class="info-box-content">
                                <!-- <span class="info-box-text">Inventory</span> -->
                            <span class="info-box-number"><?php echo $page_view_per_visitor; ?></span>
                            <div class="progress">
                                <div style="width: <?php echo (round($page_view_per_visitor) * 10); ?>%" class="progress-bar"></div>
                            </div>
                            <span class="progress-description">
                                <?php echo 'Daily Page View per Visitor'; ?>
                            </span>
                        </div><!-- /.info-box-content -->
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="info-box bg-green">
                        <span class="info-box-icon"></span>
                        <div class="info-box-content">
                                <!-- <span class="info-box-text">Inventory</span> -->
                            <span class="info-box-number"><?php echo $daily_time_on_the_site; ?></span>
                            <div class="progress">
                                <div style="width: <?php echo (round($daily_time_on_the_site) * 10); ?>%" class="progress-bar"></div>
                            </div>
                            <span class="progress-description">
                                <?php echo 'Daily Time on Site'; ?>
                            </span>
                        </div><!-- /.info-box-content -->
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="info-box bg-yellow">
                        <span class="info-box-icon"></span>
                        <div class="info-box-content">
                                <!-- <span class="info-box-text">Inventory</span> -->
                            <span class="info-box-number"><?php echo $visitor_percent_from_searchengine; ?></span>
                            <div class="progress">
                                <div style="width: <?php echo ($visitor_percent_from_searchengine); ?>" class="progress-bar"></div>
                            </div>
                            <span class="progress-description">
                                <?php echo 'Visitor % from Search Engines'; ?>
                            </span>
                        </div><!-- /.info-box-content -->
                    </div>
                </div>
            </div><br />


            <div class="row">		
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 style="color: blue; word-spacing: 5px;" class="box-title"><?php echo 'Top Keywords from Search Engines'; ?></h3>
                        </div>
                        <div class="box-body chart-responsive">
                            <?php
                            if (is_array($keyword_name) && is_array($keyword_percent_of_search_traffic)) {
                                foreach ($keyword_name as $key => $val) {
                                    if (array_key_exists($key, $keyword_name) && array_key_exists($key, $keyword_percent_of_search_traffic)) {
                                        echo $keyword_name[$key] . " <span class='pull-right'><b>" . $keyword_percent_of_search_traffic[$key] . "</b></span>";
                                        echo
                                        '<div class="progress">					                    	
									  <div class="progress-bar progress-bar-striped " role="progressbar" aria-valuenow="' . $keyword_percent_of_search_traffic[$key] . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $keyword_percent_of_search_traffic[$key] . '">
									  </div>
									</div>';
                                    }
                                    if (count($keyword_name) == 0 || count($keyword_percent_of_search_traffic) == 0)
                                        echo "No data found!";
                                }
                            }
                            else {
                                echo "No data found!";
                            }
                            ?>
                        </div>
                    </div> <!-- end box -->			
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 style="color: blue; word-spacing: 5px;" class="box-title"><?php echo 'Search Traffic'; ?></h3>
                        </div>
                        <div class="box-body chart-responsive">
                            <img src="<?php echo $search_engine_percentage_graph; ?>" alt="Graph not found!" class="img-responsive" style="width:100%">
                        </div>
                    </div> <!-- end box -->
                </div>
            </div><br />


                <div class="row" style='box-shadow: 2px 2px 2px 2px lightblue;'>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 offset-4">
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><span id="average_stay_time"><?php echo $total_site_linking_in; ?></span></h3>
                                <?php echo 'Total Linking In Site'; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3><span id="average_stay_time"><?php echo $bounce_rate; ?></span></h3>
                                <?php echo 'Bounce Rate'; ?>
                            </div>
                        </div>
                    </div>
                </div><br />



                <div class="row">	

                    <div class="col-xs-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 style="color: blue; word-spacing: 5px;" class="box-title"> <?php echo 'Linking In Statistics'; ?></h3>
                            </div>
                            <div class="box-body chart-responsive table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Site</th>
                                            <th>Page</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sl = 0;
                                        if (is_array($linking_in_site_name) && is_array($linking_in_site_address)) {
                                            foreach ($linking_in_site_name as $key => $val) {
                                                $sl++;
                                                if (array_key_exists($key, $linking_in_site_name) && array_key_exists($key, $linking_in_site_address)) {
                                                    echo "<tr><td>" . $sl . "</td>";
                                                    echo "<td>" . $linking_in_site_name[$key] . "</td>";
                                                    echo "<td>" . $linking_in_site_address[$key] . "</td>";
                                                }
                                                if (count($linking_in_site_name) == 0 || count($linking_in_site_address) == 0)
                                                    echo "<tr><td colspan='4'>No data found!</td></tr>";
                                            }
                                        }
                                        else {
                                            echo "<tr><td colspan='4'>No data found!</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- end box -->			
                    </div>
                    </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 style="color: blue; word-spacing: 5px;" class="box-title"><?php echo 'Upstream Sites'; ?></h3>
                            </div>
                            <div class="box-body chart-responsive">
                                <?php
                                if (is_array($upstream_site_name) && is_array($upstream_percent_unique_visits)) {
                                    foreach ($upstream_site_name as $key => $val) {
                                        if (array_key_exists($key, $upstream_site_name) && array_key_exists($key, $upstream_percent_unique_visits)) {
                                            echo $upstream_site_name[$key] . " <span class='pull-right'>Unique Visit: <b>" . $upstream_percent_unique_visits[$key] . "</b></span>";
                                            echo
                                            '<div class="progress">					                    	
									  <div class="progress-bar progress-bar-striped " role="progressbar" aria-valuenow="' . $upstream_percent_unique_visits[$key] . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $upstream_percent_unique_visits[$key] . '">
									  </div>
									</div>';
                                        }
                                        if (count($upstream_site_name) == 0 || count($upstream_percent_unique_visits) == 0)
                                            echo "No data found!";
                                    }
                                }
                                else {
                                    echo "No data found!";
                                }
                                ?>
                            </div>
                        </div> <!-- end box -->			
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 style="color: blue; word-spacing: 5px;" class="box-title"><?php echo 'Subdomain Statistics'; ?></h3>
                            </div>
                        </div>
                        <div class="box-body chart-responsive">
                            <?php
                            if (is_array($subdomain_name) && is_array($subdomain_percent_visitors)) {
                                foreach ($subdomain_name as $key => $val) {
                                    if (array_key_exists($key, $subdomain_name) && array_key_exists($key, $subdomain_percent_visitors)) {
                                        echo $subdomain_name[$key] . " <span class='pull-right'>Visitor: <b>" . $subdomain_percent_visitors[$key] . "</b></span>";
                                        echo
                                        '<div class="progress">					                    	
									  <div class="progress-bar progress-bar-striped " role="progressbar" aria-valuenow="' . $subdomain_percent_visitors[$key] . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $subdomain_percent_visitors[$key] . '">
									  </div>
									</div>';
                                    }
                                    if (count($subdomain_name) == 0 || count($subdomain_percent_visitors) == 0)
                                        echo "No data found!";
                                }
                            }
                            else {
                                echo "No data found!";
                            }
                            ?>

                        </div>
                    </div> <!-- end box -->
                </div>
            </div>
        
<?php } ?>
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
