<?php
include_once('dbconn.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
        <meta name="author" content="potenzaglobalsolutions.com" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title>Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template</title>
        <script>

            $('.addnewm').click(function () {
                $("#options").append("<label class='checkbox'><input type='checkbox' name='correct[]'><input required type='text' name='q[]' placeholder='Option'></label>");
            });

            $('.addnews').click(function () {
                $("#options").append("<label class='checkbox'><input type='checkbox' name='correct[]'><input required type='text' name='q[]' placeholder='Option'></label>");
            });

            function showMultiple() {

                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("answers").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("POST", "ajax/multiple.php", true);
                xmlhttp.send();
            }

            function showSingle() {

                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("answers").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("POST", "ajax/single.php", true);
                xmlhttp.send();
            }

            function showNone() {
                document.getElementById("answers").innerHTML = '';
            }

        </script>
        <!-- Favicon -->
        <link rel="shortcut icon" href="images/favicon.ico" />

        <!-- Font -->
        <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

        <!-- css -->
        <link rel="stylesheet" type="text/css" href="css/style.css" />

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
                                    <a href="javascript:void(0);" class='active muted'>
                                        <div class="pull-left"><i class="ti-bolt"></i><span class="right-nav-text"> Quiz </span></div>
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

                    <div class="content-wrapper">
                        <div class="page-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4 class="mb-0">
                                        <?php
                                        if (isset($_POST['name']))
                                            $name = "'" . $_POST['name'] . "'";
                                        if (isset($_POST['organizer']))
                                            $organizer = "'" . $_POST['organizer'] . "'";
                                        if (isset($_POST['time']))
                                            $time = "'" . $_POST['time'] . "'";
                                        if (isset($_POST['num']))
                                            $num = "'" . $_POST['num'] . "'";
                                        if (isset($_POST['category']))
                                            $_SESSION['category'] = "'" . $_POST['category'] . "'";

                                        if (isset($_POST['q']))
                                            $options = $_POST['q'];
                                        if (isset($_POST['a']))
                                            $answers = $_POST['a'];

                                        $user_id = 1;

                                        if (isset($_POST['submit'])) {

                                            $sql = "INSERT INTO quiz_info VALUES (NULL, $name , $organizer , $time , " . $_SESSION['category'] . ", " . $num . ", (SELECT CURDATE()));";
                                            $query = mysqli_query($conn, $sql);
                                            if ($query) {
                                                echo "Successfully entered quiz info.<br />";
                                            } else {
                                                echo "Error in Inserting quiz info.<br />";
                                            }
                                        }

                                        if (isset($_POST['submit1'])) {

                                            $i = 0;

                                            $quiz_id = "SELECT ID FROM quiz_info ORDER BY ID DESC LIMIT 1";
                                            $r1 = mysqli_query($conn, $quiz_id);
                                            if (mysqli_num_rows($r1) > 0) {
                                                while ($row = mysqli_fetch_assoc($r1)) {
                                                    $_SESSION['quiz_id'] = $row['ID'];
                                                }
                                            }

                                            $sql1 = "INSERT INTO questions VALUES (NULL , '" . $_POST['question'] . "' , '" . $_POST['answer'] . "' , "
                                                    . $_SESSION['category'] . " , '" . $_POST['qtime'] . "' , " . $_SESSION['quiz_id'] . ")";
                                            $qry = mysqli_query($conn, $sql1);
                                            if ($qry) {
                                                $i++;
                                            } else {
                                                echo 'Unable to Insert Question<br />';
                                            }

                                            $ques_id = "SELECT ID FROM questions ORDER BY ID DESC LIMIT 1";
                                            $r2 = mysqli_query($conn, $ques_id);
                                            if (mysqli_num_rows($r2) > 0) {
                                                while ($row = mysqli_fetch_assoc($r2)) {
                                                    $_SESSION['ques_id'] = $row['ID'];
                                                }
                                            }

                                            if ($_POST['answer'] != 'blog' && $_POST['answer'] != 'file') {
                                                $sql2 = "INSERT INTO answers VALUES (NULL , '" . implode(',', $options) . "' , " . $_SESSION['ques_id'] .
                                                        " , $user_id)";
                                                $qry1 = mysqli_query($conn, $sql2);
                                                if ($qry1) {
                                                    $i++;
                                                } else {
                                                    echo 'Unable to Insert Options<br />';
                                                }
                                                $sql3 = "INSERT INTO correct_answers VALUES (NULL , " . $_SESSION['ques_id'] . " , '"
                                                        . implode(',', $answers) . "')";
                                                $qry2 = mysqli_query($conn, $sql3);
                                                if ($qry2) {
                                                    $i++;
                                                } else {
                                                    echo 'Unable to Insert Answers<br /><br />';
                                                }
                                            } else {
                                                $sql2 = "INSERT INTO answers VALUES (NULL , '' , " . $_SESSION['ques_id'] .
                                                        " , $user_id)";
                                                $qry1 = mysqli_query($conn, $sql2);
                                                if ($qry1) {
                                                    $i++;
                                                } else {
                                                    echo 'Unable to Insert Options<br />';
                                                }

                                                $sql3 = "INSERT INTO correct_answers VALUES (NULL , " . $_SESSION['ques_id'] . " , '')";
                                                $qry2 = mysqli_query($conn, $sql3);
                                                if ($qry2) {
                                                    $i++;
                                                } else {
                                                    echo 'Unable to Insert Answers<br /><br />';
                                                }
                                            }



                                            if ($i == 3) {
                                                echo 'Success<br /><br />';
                                            }
                                        }
                                        ?> Enter Question <br /></h4><br />
                                    <b id='countdown'></b><br />
                                    <div class="col-sm-8 offset-2"></div>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                                        <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                                        <li class="breadcrumb-item active"> Administrator </li>
                                    </ol>
                                </div>
                            </div>
                        </div><br />
                        <!-- main body --> 

                        <div class="card">
                            <div class="card-body">
                                <form action="" method="POST">
                                    <textarea class="form-control col-sm-6" name="question" placeholder="Enter the Question" required=""></textarea><br />
                                    <input class="form-control col-sm-3" type="text" name="qtime" placeholder='Question Time (in minutes)' required="">
                                    <br /><br />
                                    Select answer type: <br /><br />
                                    <div class="control-group">
                                        <div class="controls">
                                            <label class="radio col-sm-4"><input type="radio" name='answer' value="multiple" id="multiple" onclick="showMultiple()" checked=""> Multiple Answers </label>
                                            <label class="radio col-sm-4"><input type="radio" name='answer' value="single" id="single" onclick="showSingle()"> Single Answer </label>
                                            <label class="radio col-sm-4"><input type="radio" name="answer" value='blog' onclick="showNone()"> Blog Writing </label>
                                            <label class="radio col-sm-4"><input type="radio" name="answer" value="file" onclick="showNone()"> Photo Upload </label>
                                            <label class="radio col-sm-4"><input type="radio" name="answer" value="file" onclick="showNone()"> Video Upload </label><br />
                                            <div id="answers"></div><br />
                                            <input type="submit" value="Submit" name="submit1" class="btn btn-success"><br /><br />
                                            </form>
                                        </div>
                                    </div>
                            </div>
                        </div>

                        <!--=================================
                         footer -->

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