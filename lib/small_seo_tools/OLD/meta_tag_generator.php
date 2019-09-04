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
                                    <h4 class="mb-0"> Meta Tag Generator </h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                                        <li class="breadcrumb-item"><a href="index.html" class="default-color">Home</a></li>
                                        <li class="breadcrumb-item"><a href="seo_tools.php" class="default-color">SEO Tools</a></li>
                                        <li class="breadcrumb-item active">Meta Tag Generator</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- main body -->
                        <div class="row">   
<div class="container main-container">
<div class="row">
<?php 

require_once 'all_functions.php';

function genMeta($metaTitle,$metaDescription,$metaKeywords,$robotsIndex,$robotsLinks,$contentType,$lang,$revisitdays,$authorname,$checkRevisit,$checkAuthor){  	
	
    $metaTitle = ucfirst($metaTitle);
    
   	$metaKeywords = str_replace(array("\r\n", "\r", "\n", '"'),"", $metaKeywords);
   	
    $metaDescription = str_replace(array("\r\n", "\r", "\n", '"'),"", $metaDescription);
		
	$data = 'Copy & Paste the code below into Your Website : ' . PHP_EOL;
	$data .= PHP_EOL;
    $data .= '<meta name="title" content="' . $metaTitle . '">' . PHP_EOL;
	$data .= '<meta name="description" content="' . $metaDescription . '">' . PHP_EOL;
	$data .= '<meta name="keywords" content="' . $metaKeywords . '">' . PHP_EOL;
	$data .= '<meta name="robots" content="' . $robotsIndex . ', ' . $robotsLinks . '">' . PHP_EOL;
	$data .= '<meta http-equiv="Content-Type" content="' . $contentType . '">' . PHP_EOL;
	
    if($lang != "N/A"){
        $data .= '<meta name="language" content="' . $lang . '">' . PHP_EOL;
	}
    
    if($checkRevisit){
        $data .= '<meta name="revisit-after" content="' . $revisitdays . ' days">' . PHP_EOL;
    }
    if($checkAuthor){
        $data .= '<meta name="author" content="' . $authorname . '">' . PHP_EOL;
    }

    return htmlspecialchars($data);
} 
if(!isset($_POST['submit'])) {
?>
<form method="POST" action=""> 

    <div class="row">

        <div class="col-md-12" >
            <h5><?php echo 'Site Title'; ?> <small id="limitBarT"></small></h5>
            <input type="text" id="metatitle" name="title" class="form-control" placeholder="Title should be within 70 characters" autofocus/>
        </div>

        <div class="col-md-6">
            <h5><?php echo 'Site Description'; ?> <small id="limitBar"></small></h5>

            <textarea id="description" name="description" class="form-control" rows="3" placeholder="Description must be within 320 characters" autofocus></textarea>

        </div>
        <div class="col-md-6">
            <h5><?php echo 'Site Keywords <small>(Separate with commas)</small>'; ?></h5>

            <textarea id="keywords" name="keywords" class="form-control" rows="3" placeholder="Keyword1,Keyword2,Keyword3..." autofocus></textarea>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h5><?php echo 'Allow robots to index your website?'; ?></h5>

            <select name="robotsIndex" class="form-control">
                <option value="index"><?php echo 'Yes'; ?></option>
                <option value="noindex"><?php echo 'No'; ?></option>
            </select>
        </div>
        <div class="col-md-6">
            <h5><?php echo 'Allow robots to follow all links?'; ?></h5>

            <select name="robotsLinks" class="form-control">
                <option value="follow"><?php echo 'Yes'; ?></option>
                <option value="nofollow"><?php echo 'No'; ?></option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <h5><?php echo 'What type of Content will your site Display?'; ?></h5>

            <select name="contentType" class="form-control">
                <option value="text/html; charset=utf-8">UTF-8</option>
                <option value="text/html; charset=utf-16">UTF-16</option>
                <option value="text/html; charset=iso-8859-1">ISO-8859-1</option>
                <option value="text/html; charset=windows-1252">WINDOWS-1252</option>
            </select>
        </div>
        <div class="col-md-6">
            <h5><?php echo 'What is your site\'s primary Language?'; ?></h5>

            <select name="language" class="form-control">
                <option value="English">English</option>
                <option value="French">French</option>
                <option value="Spanish">Spanish</option>
                <option value="Russian">Russian</option>
                <option value="Arabic">Arabic</option>
                <option value="Japanese">Japanese</option>
                <option value="Korean">Korean</option>
                <option value="Hindi">Hindi</option>
                <option value="Portuguese">Portuguese</option>
                <option value="N/A">No Language Tag</option>
            </select>
        </div>
    </div>

    <hr />
    <div class="text-center" style="margin-bottom: 30px;" ><b><?php echo '(Optional Meta Tags)'; ?></b></div>
    <p>
        <input type="checkbox" value="yes" name="revisit"/> <?php echo 'Search Engines should revisit this page after'; ?> &nbsp;
        <input type="text" class="form-control" style="width:10%; display: inline;" name="revisitdays" autofocus/>  &nbsp; <?php echo 'days.'; ?>.
    </p>
    <br />
    <p><input type="checkbox" value="yes" name="author" /> <?php echo 'Author:'; ?> 
        <input type="text" class="form-control" name="authorname" style="width:50%; display: inline;" autofocus/>
    </p>


    <br />
    <?php //if ($toolCap) echo $captchaCode; ?>
    <input class="btn btn-info" type="submit" value="<?php echo 'Generate MetaTags'; ?>" name="submit"/>
</form>
<?php } if(isset($_POST['submit'])){ 
   	$metaTitle = raino_trim($_POST['title']);
   	$metaDescription = raino_trim($_POST['description']);
    $metaKeywords = raino_trim($_POST['keywords']);
	$robotsIndex = raino_trim($_POST['robotsIndex']);
	$robotsLinks = raino_trim($_POST['robotsLinks']);
	$contentType = raino_trim($_POST['contentType']);
	$metaLang = raino_trim($_POST['language']); 
	$revisitdays = raino_trim($_POST['revisitdays']);
	$authorname = raino_trim($_POST['authorname']); 
	
    $checkRevisit = raino_trim($_POST['revisit']);
    $checkRevisit = filter_var($checkRevisit, FILTER_VALIDATE_BOOLEAN);
	$checkAuthor = raino_trim($_POST['author']); 
    $checkAuthor = filter_var($checkAuthor, FILTER_VALIDATE_BOOLEAN);
        
    $outData = genMeta($metaTitle,$metaDescription,$metaKeywords,$robotsIndex,$robotsLinks,$contentType,$metaLang,$revisitdays,$authorname,$checkRevisit,$checkAuthor);
    ?>
<textarea name="outdata" rows="10" readonly="" style="width: 80%;"><?php echo $outData; ?></textarea>
<?php } ?>
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