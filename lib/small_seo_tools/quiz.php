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

            <div id="pre-loader">
                <img src="images/pre-loader/loader-01.svg" alt="">
            </div>

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
                                    <a href="javascript:void(0);" class='active'>
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

                    <!--=================================
                     Main content -->

                    <!--=================================
                   wrapper -->

                    <div class="content-wrapper"><br />
                    <div class="page-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4 class="mb-0"> Welcome To The Quiz </h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                                        <li class="breadcrumb-item"><a href="index.html" class="default-color">Home</a></li>
                                        <li class="breadcrumb-item active">Quiz</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- main body -->
                        <div class="tab nav-center">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">  All</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="marketing-tab" data-toggle="tab" href="#marketing" role="tab" aria-controls="marketing" aria-selected="false"> Marketing </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="IT-tab" data-toggle="tab" href="#IT" role="tab" aria-controls="IT" aria-selected="false"> IT </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="management-tab" data-toggle="tab" href="#management" role="tab" aria-controls="management" aria-selected="false"> Management </a>
                                </li>
                            </ul><br />
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="all" role="tabpanel" aria-labelledby="all-tab">
                                    <div class = "card-deck">
                                        <?php
                                        $x = 0;
                                        $sql = 'SELECT * FROM quiz_info ORDER BY RAND()';
                                        $qry = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($qry) > 0) {
                                            while ($row = mysqli_fetch_assoc($qry)) {
                                                $x++;
                                                ?>
                                                <div class = "card mb-4 col-sm-4">
                                                    <img class = "card-img-top img-fluid" src = "images/logo-dark.png" alt = "Card image cap">
                                                    <div class = "card-body">
                                                        <h4 class = "card-title"><?php
                                                            echo 'Category :  ' . $row['category'];
                                                            $sql1 = "SELECT * FROM category WHERE category_name = '" . $row['category'] . "'";
                                                            $qry1 = mysqli_query($conn, $sql1);
                                                            if (mysqli_num_rows($qry1) > 0) {
                                                                while ($row1 = mysqli_fetch_assoc($qry1)) {
                                                                    $category_desc = $row1['category_description'];
                                                                    $category_name = $row1['category_name'];
                                                                }
                                                            }
                                                            ?></h4>
                                                        <p class="card-text"><?php echo 'Organizer :   ' . $row['organizer']; ?></p>
                                                        <p class="card-text"><?php echo 'Quiz Name :   ' . $row['quiz_name']; ?></p>
                                                        <p class="card-text"><?php echo 'No. of Questions :   ' . $row['no_of_ques']; ?></p>
                                                        <p class="card-text"><?php
                                                            echo 'Time Limit :   ' . $row['time_limit'] . ' mins';
                                                            $_SESSION['qid'] = $row['ID'];
                                                            ?></p><br />
                                                        <p class="card-text"><button class="btn btn-info swal">Let's Go!</button></p>
                                                    </div>
                                                </div>
                                                <?php if ($x % 3 == 0) { ?>
                                                    <div class="w-100 d-none d-xl-block"><!-- wrap every 3 on xl--></div>
                                                <?php } ?>
                                                <?php
                                            }
                                        }
                                        ?></div>
                                </div>
                                <div class="tab-pane fade" id="marketing" role="tabpanel" aria-labelledby="marketing-tab">
                                    <div class = "card-deck">
                                        <?php
                                        $x = 0;
                                        $sql = 'SELECT * FROM quiz_info WHERE category = "Marketing" ORDER BY RAND()';
                                        $qry = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($qry) > 0) {
                                            while ($row = mysqli_fetch_assoc($qry)) {
                                                $x++;
                                                ?>
                                                <div class = "card mb-4 col-sm-4">
                                                    <img class = "card-img-top img-fluid" src = "images/logo-dark.png" alt = "Card image cap">
                                                    <div class = "card-body">
                                                        <h4 class = "card-title"><?php
                                                            echo 'Category :  ' . $row['category'];
                                                            $sql1 = "SELECT * FROM category WHERE category_name = '" . $row['category'] . "'";
                                                            $qry1 = mysqli_query($conn, $sql1);
                                                            if (mysqli_num_rows($qry1) > 0) {
                                                                while ($row1 = mysqli_fetch_assoc($qry1)) {
                                                                    $category_desc = $row1['category_description'];
                                                                    $category_name = $row1['category_name'];
                                                                }
                                                            }
                                                            ?></h4>
                                                        <p class="card-text"><?php echo 'Organizer :   ' . $row['organizer']; ?></p>
                                                        <p class="card-text"><?php echo 'Quiz Name :   ' . $row['quiz_name']; ?></p>
                                                        <p class="card-text"><?php echo 'No. of Questions :   ' . $row['no_of_ques']; ?></p>
                                                        <p class="card-text"><?php
                                                            echo 'Time Limit :   ' . $row['time_limit'] . ' mins';
                                                            $_SESSION['qid'] = $row['ID'];
                                                            ?></p><br />
                                                        <p class="card-text"><button class="btn btn-info swal">Let's Go!</button></p>
                                                    </div>
                                                </div>
                                                <?php if ($x % 3 == 0) { ?>
                                                    <div class="w-100 d-none d-xl-block"><!-- wrap every 3 on xl--></div>
                                                <?php } ?>
                                                <?php
                                            }
                                        }
                                        ?></div>
                                </div>
                                <div class="tab-pane fade" id="IT" role="tabpanel" aria-labelledby="IT-tab">
                                    <div class = "card-deck">
                                        <?php
                                        $x = 0;
                                        $sql = 'SELECT * FROM quiz_info WHERE category = "IT" ORDER BY RAND()';
                                        $qry = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($qry) > 0) {
                                            while ($row = mysqli_fetch_assoc($qry)) {
                                                $x++;
                                                ?>
                                                <div class = "card mb-4 col-sm-4">
                                                    <img class = "card-img-top img-fluid" src = "images/logo-dark.png" alt = "Card image cap">
                                                    <div class = "card-body">
                                                        <h4 class = "card-title"><?php
                                                            echo 'Category :  ' . $row['category'];
                                                            $sql1 = "SELECT * FROM category WHERE category_name = '" . $row['category'] . "'";
                                                            $qry1 = mysqli_query($conn, $sql1);
                                                            if (mysqli_num_rows($qry1) > 0) {
                                                                while ($row1 = mysqli_fetch_assoc($qry1)) {
                                                                    $category_desc = $row1['category_description'];
                                                                    $category_name = $row1['category_name'];
                                                                }
                                                            }
                                                            ?></h4>
                                                        <p class="card-text"><?php echo 'Organizer :   ' . $row['organizer']; ?></p>
                                                        <p class="card-text"><?php echo 'Quiz Name :   ' . $row['quiz_name']; ?></p>
                                                        <p class="card-text"><?php echo 'No. of Questions :   ' . $row['no_of_ques']; ?></p>
                                                        <p class="card-text"><?php
                                                    echo 'Time Limit :   ' . $row['time_limit'] . ' mins';
                                                    $_SESSION['qid'] = $row['ID'];
                                                    ?></p><br />
                                                        <p class="card-text"><button class="btn btn-info swal">Let's Go!</button></p>
                                                    </div>
                                                </div>
                                                <?php if ($x % 3 == 0) { ?>
                                                    <div class="w-100 d-none d-xl-block"><!-- wrap every 3 on xl--></div>
                                                <?php } ?>
                                                <?php
                                            }
                                        }
                                        ?></div>
                                </div>
                                <div class="tab-pane fade" id="management" role="tabpanel" aria-labelledby="management-tab">
                                    <div class = "card-deck">
                                        <?php
                                        $x = 0;
                                        $sql = 'SELECT * FROM quiz_info WHERE category = "Management" ORDER BY RAND()';
                                        $qry = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($qry) > 0) {
                                            while ($row = mysqli_fetch_assoc($qry)) {
                                                $x++;
                                                ?>
                                                <div class = "card mb-4 col-sm-4">
                                                    <img class = "card-img-top img-fluid" src = "images/logo-dark.png" alt = "Card image cap">
                                                    <div class = "card-body">
                                                        <h4 class = "card-title"><?php
                                                            echo 'Category :  ' . $row['category'];
                                                            $sql1 = "SELECT * FROM category WHERE category_name = '" . $row['category'] . "'";
                                                            $qry1 = mysqli_query($conn, $sql1);
                                                            if (mysqli_num_rows($qry1) > 0) {
                                                                while ($row1 = mysqli_fetch_assoc($qry1)) {
                                                                    $category_desc = $row1['category_description'];
                                                                    $category_name = $row1['category_name'];
                                                                }
                                                            }
                                                            ?></h4>
                                                        <p class="card-text"><?php echo 'Organizer :   ' . $row['organizer']; ?></p>
                                                        <p class="card-text"><?php echo 'Quiz Name :   ' . $row['quiz_name']; ?></p>
                                                        <p class="card-text"><?php echo 'No. of Questions :   ' . $row['no_of_ques']; ?></p>
                                                        <p class="card-text"><?php
                                                    echo 'Time Limit :   ' . $row['time_limit'] . ' mins';
                                                    $_SESSION['qid'] = $row['ID'];
                                                            ?></p><br />
                                                        <p class="card-text"><button class="btn btn-info swal">Let's Go!</button></p>
                                                    </div>
                                                </div>
                                                <?php if ($x % 3 == 0) { ?>
                                                    <div class="w-100 d-none d-xl-block"><!-- wrap every 3 on xl--></div>
                                                <?php } ?>
        <?php
    }
}
?></div>
                                </div>
                            </div>
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