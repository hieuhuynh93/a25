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
                                    <h4 class="mb-0"> Site Information </h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                                        <li class="breadcrumb-item"><a href="index.html" class="default-color">Home</a></li>
                                        <li class="breadcrumb-item"><a href="seo_tools.php" class="default-color">SEO Tools</a></li>
                                        <li class="breadcrumb-item active">Site Information</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- main body -->
                        <div class="row">   
                        <?php

require_once 'all_functions.php';

$domain = strtolower($_POST['url']);
$domain = trim($domain);
$domain_curl = "www." . $domain;
$technologies = getBuiltWith($domain);

if (isset($_POST['url'])){
        $my_url = 'https://www.' . clean_url(raino_trim($_POST['url']));
    if (filter_var($my_url, FILTER_VALIDATE_URL) === false) {
        $error = 'Error';
    } else {
        $regUserInput = $my_url;
        $obj = new KD();
                $obj->domain = ($my_url);
                $resdata = $obj->result();

                foreach ($resdata as $outData) {
                    $outData['keyword'] = Trim($outData['keyword']);
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
                    $error = 'No Data';
                }
        $myUrl = ucfirst(str_replace('www.', '', $my_url));
    }
    $stats = getStatsData($domain, $technologies);
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
            <div class="text-center"></div><br/>';
} else {
    ?>

                <h4><?php //echo $lang['10'];  ?></h4>

<?php if(isset($_POST['submit'])){ 

$ret = getMyMeta($my_url);
$title = $ret[0];
$description = $ret[1];
$keywords = $ret[2];

?>
<div class="table-bordered" id="meta" style='box-shadow:0 2px 2px 0 gray;padding: 10px;background-color: white;'>
        <div class="row p-t-2 ">
            <div class="col-lg-4">

                <strong><i class="zmdi zmdi-dot-circle  check"></i> <?php echo ("Charset"); ?></strong>
                <small class="text-muted d-block subtitle"><?php echo ("Encoding"); ?></small>
            </div>
            <?php if ($stats['charset']) { ?>
            <div class="col-lg-8 text-muted">
                <?php echo ("<i style='color: green;'>Great</i>, language/character encoding is specified:"); ?>  <strong><i class="zmdi zmdi-check"></i> <?php echo mb_strtoupper($stats['charset']); ?></strong>
            </div>
        </div><br />
    <?php } else { ?>
            <div class="col-lg-8 text-muted">
                <?php echo ("<i style='color: red;'>Oops</i>, language/character encoding is not specified:"); ?>  <strong><i class="zmdi zmdi-close"></i> <?php echo ' None'; ?></strong>
            </div>
        </div><br />
    <?php } ?>

    <div class="row p-t-2 ">
        <div class="col-lg-4">
            <?php
            $metaTitle = validateLenght($stats['metaTitle'], 60, 5);
            ?>
            <strong><i class="zmdi <?php echo $metaTitle['icon']; ?> <?php echo $metaTitle['color']; ?> check"></i> <?php echo ("Title Tag"); ?></strong>
            <small class="text-muted d-block subtitle"><?php echo number_format($metaTitle['lenght']); ?> <?php echo ("Characters"); ?></small>
        </div>
        <div class="col-lg-8 text-muted">
            <?php echo $metaTitle['fixed']; ?>
        </div>
    </div><br />

    <div class="row  p-t-2">
        <div class="col-lg-4">

            <?php
            $metaDescription = validateLenght($stats['metaDescription'], 150, 10);
            ?>

            <strong><i class="zmdi <?php echo $metaDescription['icon']; ?> <?php echo $metaDescription['color']; ?> check"></i> <?php echo ("Meta Description"); ?></strong>
            <small class="text-muted d-block subtitle"><?php echo number_format($metaDescription['lenght']); ?> <?php echo ("Characters"); ?></small>
        </div>
        <div class="col-lg-8 text-muted">
            <?php echo $metaDescription['fixed']; ?>

        </div>
    </div><br />


    <?php if ($stats['url_real']) { ?>
        <div class="row p-t-2 ">
            <div class="col-lg-4 ">
                <?php
                $url_real = validateLenght($stats['url_real'], 50, 1);
                ?>
                <strong><i class="zmdi zmdi-dot-circle  check"></i> <?php echo ("Effective URL"); ?></strong>
                <small class="text-muted d-block subtitle"><?php echo number_format($url_real['lenght']); ?> <?php echo ("Characters"); ?></small>
            </div>
            <div class="col-lg-8 text-muted">
                <?php echo "<a style='color: blue;' href='" . $stats['url_real'] . "'>" . $stats['url_real'] . "</a>"; ?>
            </div>
        </div><br />
    <?php } ?>


    <?php
    $body_excerpt = badWords(more($stats['body'], 250));
    if (strlen($body_excerpt) < 20)
        $body_excerpt = false;
    ?>
    <?php if ($body_excerpt) { ?>
        <div class="row  p-t-2">
            <div class="col-lg-4">


                <strong><i class="zmdi  zmdi-dot-circle  check"></i> <?php echo ("Excerpt"); ?></strong>
                <small class="text-muted d-block subtitle"><?php echo ("Page content"); ?></small>
            </div>
            <div class="col-lg-8 text-muted">
                <?php echo $body_excerpt; ?>

            </div>
        </div><br />
    <?php } ?>



    <?php if ($stats['metaKeywords'] != '') { ?>
        <div class="row  p-t-2">
            <div class="col-lg-4">
                <?php
                $keywords = explode(",", $stats['metaKeywords']);
                $keywordsCount = count($keywords);
                if ($stats['metaKeywords'] == '') {
                    $keywords = false;
                    $keywordsCount = 0;
                }
                ?>
                <strong><i class="zmdi zmdi-tag text-muted check"></i> <?php echo ("Meta Keywords"); ?></strong>
                <small class="text-muted d-block subtitle"><?php echo ($keywordsCount); ?> <?php echo ("Detected"); ?></small>
            </div>
            <div class="col-lg-8">
                <?php
                foreach ($keywords as $key => $value) {
                    $value = rtrim(ltrim(badWords($value)));
                    if (trim($value) != '') {
                        ?>
                        <?php echo $value . ', '; ?>
                        <?php
                    }
                }
                ?>


            </div>
        </div><br />
    <?php } ?>

    <?php
    
        ?>
        <div class="row  p-t-2">
            <div class="col-lg-4">
                <?php ?>
                <strong><i class="zmdi zmdi-tag text-muted check"></i> <?php echo ("Keywords Cloud"); ?></strong>
                <small class="text-muted d-block subtitle"><?php echo ("Density"); ?></small>
            </div>
            <div class="col-lg-8">
                <?php
                $count = 0;
                foreach ($outArr as $value) {
                    if($count == 10)
                        break;
                        $count++;
                    $value[0] = badWords($value[0]);
                    if (trim($value[0]) != '') {
                        ?>
                        <span  class="keyword-cloud" style='margin-left: 2%;'><?php echo more($value[0], 30); ?> <span style='color: white;' class="value animated zoomIn badge bg-success"><?php echo $value[1]; ?></span></span>
                        <?php
                    }
                }
                ?>


            </div>
        </div><br />


        <div class="row  p-t-2">
            <div class="col-lg-4">
                <?php
                ?>
                <strong><i class="zmdi zmdi-badge-check check"></i> <?php echo ("Keyword Consistency"); ?></strong>
                <small class= "d-block subtitle"><?php echo ("Keyword density is one of the main terms in SEO"); ?></small>
            </div>
            <div class="col-lg-8">
                <table class="consistency table table-responsive">
                    <tr class="header">
                        <td><?php echo ("Keyword"); ?></td>
                        <td class="text-xs-center"><?php echo ("Frequency"); ?></td>
                        <td class="text-xs-center"><?php echo ("Title"); ?></td>
                        <td class="text-xs-center"><?php echo ("Description"); ?></td>
                        <td class="text-xs-center"><?php echo ("Domain"); ?></td>
                        <td class="text-xs-center"><?php echo ("H1"); ?></td>
                        <td class="text-xs-center"><?php echo ("H2"); ?></td>
                        <td class="text-xs-center"><?php echo ("H3"); ?></td>
                        <td class="text-xs-center"><?php echo ("H4"); ?></td>
                    </tr>
                    <?php
                    $count1 = 0;
                    foreach ($outArr as $value) {
                        if($count1 == 10)
                        break;
                        $count1++;
                        ?>
                        <tr>
                            <td><i class="zmdi zmdi-tag text-muted check"></i> <?php echo more(badWords($value[0]), 20); ?></td>
                            <td class="text-center "><?php echo $value[1]; ?></td>
                            <td class="text-center">
                                <?php
                                if (mb_strpos(mb_strtolower($stats['metaTitle']), mb_strtolower($value[0])) !== FALSE) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i> 
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i> 
                                    <?php
                                }
                                ?>
                            </td>

                            <td class="text-center">
                                <?php
                                if (mb_strpos(mb_strtolower($stats['metaDescription']), mb_strtolower($value[0])) !== FALSE) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i> 
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i> 
                                    <?php
                                }
                                ?>
                            </td>

                            <td class="text-center">
                                <?php
                                if (mb_strpos(mb_strtolower($stats['url']), mb_strtolower($value[0])) !== FALSE) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i> 
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i> 
                                    <?php
                                }
                                ?>
                            </td>	

                            <td class="text-center">
                                <?php
                                if (inHX($stats['body'], $value[0], "h1")) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i> 
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i> 
                                    <?php
                                }
                                ?>
                            </td>
                            
                            <td class="text-center">
                                <?php
                                if (inHX($stats['body'], $value[0], "h2")) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i> 
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i> 
                                    <?php
                                }
                                ?>
                            </td>
                            
                            <td class="text-center">
                                <?php
                                if (inHX($stats['body'], $value[0], "h3")) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i> 
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i> 
                                    <?php
                                }
                                ?>
                            </td>

                            <td class="text-center">
                                <?php
                                if (inHX($stats['body'], $value[0], "h4")) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i> 
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i> 
                                    <?php
                                }
                                ?>
                            </td>


                        </tr>
                        <?php
                    }
                    ?>
                </table>


            </div>
        </div><br />
    <div class="row  p-t-2">
        <div class="col-lg-4">
            <strong><i class="zmdi zmdi-eye text-muted check"></i> <?php echo ("Google Preview"); ?></strong>
            <small class="text-muted d-block subtitle"><?php echo ("Your website looks like this in google search result "); ?></small>
        </div>
        <div class="card col-lg-7" style='border: 3px solid lightgray;'>
            <div class="gsearch">
                <div style='color: blue;font-size: 18px;' class="title"><?php
                    if ($stats['metaTitle']) {
                        echo $stats['metaTitle'];
                    } else {
                        echo badWords($stats['url']);
                    }
                    ?></div>
                <?php
                $site_url = $stats['url'];
                if ($stats['url_real'])
                    $site_url = $stats['url_real'];
                ?>
                <div style='color: green;font-weight: bold;' class="url"><?php echo badWords($site_url); ?></div>
                <div class="desc">
                    <?php
                    if ($stats['metaDescription']) {
                        echo substr($stats['metaDescription'], 0, 70) . '...';
                    } else {
                        echo $body_excerpt;
                    }
                    ?>
                </div>
            </div>

        </div>
    </div><br />

    <?php
    $detected[0] = ("File Not Found");
    $detected[1] = ("File Detected");
    ?>
    <div class="row  p-t-2">
        <div class="col-lg-4">
            <strong><i class="zmdi <?php echo getIcon($stats['robots'], 0); ?> <?php echo getColor($stats['robots'], 0); ?> check"></i> <?php echo ("Robots.txt"); ?></strong>
            <small class="text-muted d-block subtitle"><?php echo $detected[$stats['robots']]; ?></small>
        </div>
        <div class="col-lg-8">
            <a style='color: blue;' href="#">http://<?php echo $stats['url']; ?>/robots.txt</a>						
        </div>
    </div><br />


    <div class="row  p-t-2">
        <div class="col-lg-4">
            <strong><i class="zmdi  <?php echo getIcon($stats['sitemap'], 0); ?> <?php echo getColor($stats['sitemap'], 0); ?> check"></i> <?php echo ("Sitemap.xml"); ?></strong>
            <small class="text-muted d-block subtitle"><?php echo $detected[$stats['sitemap']]; ?></small>
        </div>
        <div class="col-lg-8">
            <a style='color: blue;' href="#">http://<?php echo $stats['url']; ?>/sitemap.xml</a>

        </div>
    </div><br />
    <?php /* $whois = json_decode($site->whois);

      if ($whois) {


      $expires_on = getDaysDiff($whois->date->registryExpiryDate, date("Y-m-d H:i:s"));
      $created_on = getDaysDiff($whois->date->creationDate, date("Y-m-d H:i:s"));
      ?>

      <div class="row  p-t-2">
      <div class="col-lg-4">
      <strong><i class="zmdi  <?php echo getIcon($created_on, 360); ?> <?php echo getColor($created_on, 360); ?> check"></i> <?php echo __("Whois"); ?></strong>
      <small class="text-muted d-block subtitle"><?php echo __("Is a query and response protocol that is widely used for querying databases that store the registered users or assignees of an Internet resource, such as a domain name, an IP address block, or an autonomous system"); ?></small>
      </div>
      <div class="col-lg-8">
      <div class="text-muted text-small p-t-0">
      <div class="truncate"><i class="zmdi zmdi-calendar  check"></i> <?php echo __("Updated:"); ?> <?php echo date('Y-m-d', strtotime($whois->date->updatedDate)); ?> / <?php echo ago($whois->date->updatedDate); ?></div>
      <div class="truncate"><i class="zmdi <?php echo getIcon($created_on, 360); ?> <?php echo getColor($created_on, 360); ?>  check"></i> <?php echo __("Create on:"); ?> <?php echo date('Y-m-d', strtotime($whois->date->creationDate)); ?> / <?php echo ago($whois->date->creationDate); ?></div>
      <div class="truncate"><i class="zmdi <?php echo getIcon($expires_on, 90); ?> <?php echo getColor($expires_on, 90); ?> check"></i> <?php echo __("Expires on:"); ?> <?php echo date('Y-m-d', strtotime($whois->date->registryExpiryDate)); ?>  / <?php echo days2h($expires_on); ?></div>
      <?php if ($whois->registrar->registrar) { ?>
      <br>
      <div class="truncate"><i class="zmdi zmdi-user check"></i> <strong><?php echo ($whois->registrar->registrar); ?> ,<?php echo ($whois->registrar->country); ?></strong></div>
      <?php if ($whois->registrar->name) { ?>
      <div class="truncate"><i class="zmdi zmdi-user check"></i> <?php echo __("Registrar Name:"); ?> <?php echo ($whois->registrar->name); ?></div>
      <?php } ?>
      <?php if ($whois->registrar->whoisServer) { ?>
      <div class="truncate"><i class="zmdi zmdi-user check"></i> <?php echo __("Registrar Whois Server:"); ?> <?php echo ($whois->registrar->whoisServer); ?></div>
      <?php } ?>
      <?php if ($whois->registrar->url) { ?>
      <div class="truncate"><i class="zmdi zmdi-user check"></i> <?php echo __("Registrar URL:"); ?> <?php echo ($whois->registrar->url); ?></div>
      <?php } ?>
      <?php if ($whois->registrar->phone) { ?>
      <div class="truncate"><i class="zmdi zmdi-user check"></i> <?php echo __("Registrar Phone:"); ?> <?php echo ($whois->registrar->phone[0]); ?></div>
      <?php } ?>
      <?php if ($whois->registrar->email) { ?>
      <div class="truncate"><i class="zmdi zmdi-user check"></i> <?php echo __("Registrar Email:"); ?> <?php echo ($whois->registrar->email[0]); ?></div>
      <?php } ?>
      <?php if ($whois->registrar->street) { ?>
      <div class="truncate"><i class="zmdi zmdi-user check"></i> <?php echo __("Registrar Address:"); ?> <?php echo ($whois->registrar->street); ?> , <?php echo ($whois->registrar->city); ?></div>
      <?php } ?>
      <?php } ?>
      <?php if ($whois->admin->name) { ?>
      <br>
      <div class="truncate"><i class="zmdi zmdi-user check"></i> <strong><?php echo ($whois->admin->name); ?></strong></div>
      <?php if ($whois->admin->organization) { ?>
      <div class="truncate"><i class="zmdi zmdi-user check"></i> <?php echo __("Admin Organization:"); ?> <?php echo ($whois->admin->organization); ?></div>
      <?php } ?>
      <?php if ($whois->admin->email) { ?>
      <div class="truncate"><i class="zmdi zmdi-user check"></i> <?php echo __("Admin Email:"); ?> <?php echo ($whois->admin->email[0]); ?></div>
      <?php } ?>
      <?php if ($whois->admin->phone) { ?>
      <div class="truncate"><i class="zmdi zmdi-user check"></i> <?php echo __("Admin Phone:"); ?> <?php echo ($whois->admin->phone[0]); ?></div>
      <?php } ?>
      <?php if ($whois->admin->street) { ?>
      <div class="truncate"><i class="zmdi zmdi-user check"></i> <?php echo __("Admin Address:"); ?> <?php echo ($whois->admin->street); ?>, <?php echo ($whois->admin->city); ?></div>
      <?php } ?>

      <?php } ?>
      <?php if ($whois->nameServer) { ?>
      <br>
      <div class="truncate"><i class="zmdi zmdi-user check"></i> <strong>Nameservers</strong></div>
      <?php foreach ($whois->nameServer as $key => $value) {
      ?>
      <div class="truncate"><i class="zmdi zmdi-user check"></i> <?php echo ($value); ?></div>
      <?php
      }
      }
      ?>

      </div>

      </div>
      </div>


      <?php } */ ?>

    <?php
    $document_size = strBytes($stats['body']);
    $text_size = strBytes(strip_tags($stats['body']));
    $code_size = $document_size - $text_size;
    $text_ratio = (($text_size * 100) / $document_size);
    ?>
    <div class="row  p-t-2">
        <div class="col-lg-4">
            <strong><i class="zmdi  <?php echo getIcon($text_ratio, 20); ?> <?php echo getColor($text_ratio, 20); ?> check"></i> <?php echo ("Page Size"); ?></strong>
            <small class="text-muted d-block subtitle"><?php echo ("Code & Text Ratio"); ?></small>
            <small class="d-block subtitle">
                <progress style='background-color: lightgray;' class="progress-bar progress-bar-striped" value="<?php echo $text_ratio; ?>" max="100"></progress>
            </small>
        </div>
        <div class="col-lg-8">
            <div class="text-muted text-small p-t-0">
                <div class="truncate"><i class="zmdi <?php echo getIcon(2000000, $document_size); ?> <?php echo getColor(2000000, $document_size); ?>  check"></i> <?php echo ("Document Size:"); ?> ~<?php echo formatBytes($document_size); ?></div>
                <div class="truncate"><i class="zmdi <?php echo getIcon($code_size, 20); ?> <?php echo getColor($code_size, 20); ?>  check"></i> <?php echo ("Code Size:"); ?> ~<?php echo formatBytes($code_size); ?></div>
                <div class="truncate"><i class="zmdi <?php echo getIcon($text_ratio, 20); ?> <?php echo getColor($text_ratio, 20); ?>  check"></i> <?php echo ("Text Size:"); ?> ~<?php echo formatBytes($text_size); ?> <strong class=""><?php echo ("Ratio:"); ?> <?php echo number_format($text_ratio, 2); ?>%</strong></div>


            </div>
            </div>

        </div>
    </div><br />

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