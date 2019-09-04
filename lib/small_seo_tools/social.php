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
            
            a {color:white;}
            
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
                        <!-- main body -->
                        <div class="row">   

<div class="container main-container">
    <div class="row">
<?php
//if($themeOptions['general']['sidebar'] == 'left')
//require_once(THEME_DIR."sidebar.php");
?>
        <div class="col-md-10 main-index">
<?php
$ret = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCFFbwnve3yF62-tVXkTyHqg&key=AIzaSyD1wnxAppbj-riwtLtkTx-jzP-YQkvPsvw'));

$youtube_id = $ret->items[0]->id;
$youtube_pic = $ret->items[0]->snippet->thumbnails->medium->url;
$youtube_desc = $ret->items[0]->snippet->description;
$youtube_title = $ret->items[0]->snippet->title;
$youtube_views = $ret->items[0]->statistics->viewCount;
$youtube_subscribers = $ret->items[0]->statistics->subscriberCount;
$youtube_videos = $ret->items[0]->statistics->videoCount;

$insert_ytb = "INSERT INTO youtube_users VALUES(
                NULL,
                '$youtube_id',
                '$youtube_id',
                '$youtube_title',
                '$youtube_desc',
                '$youtube_pic',
                $youtube_subscribers,
                $youtube_views,
                $youtube_videos,
                0,
                NOW(),
                NOW(),
                0
                )";

$conn1_ytb = mysqli_query($conn,$insert_ytb);
if(!$conn1_ytb){
    echo 'Error';
}

?>
    <div class="card table-bordered justify-content-center">
        <div class="card-body">
            <?php
                                $youtube = array();
                                $select_ytb1 = "SELECT * FROM youtube_users WHERE username ='" . $_POST['user_input'] . "'";
                                $conn_ytb1 = mysqli_query($conn,$select_ytb1);
                                if($conn_ytb1){
                                    $row_ytb1 = mysqli_fetch_assoc($conn_ytb1);
                                    if(isset($row_ytb1)){
                                        foreach($row_ytb1 as $key => $value){
                                            $youtube[$key] = $value;
                                        }
                                    }
                                }
                                
                                ?>
            <div class="row">
                <div class="col-lg-2 center">
                    <img src="<?php echo $youtube['profile_picture_url']; ?>" class="img-fluid rounded-circle youtube-avatar" alt="<?php echo $youtube['title']; ?>" />
                </div>

                <div class="col-lg-8">
                    <div class="row d-flex flex-column">
                        <h5>
                            <?php echo $youtube['title']; ?>
                        </h5>
                        <p class="card-text"><?php echo $youtube['description']; ?></p>
                    </div>
                </div>

                <div class="col-lg-2 center">
                    <div class="row d-flex flex-column">
                        <a href="<?= 'https://youtube.com/channel/' . $youtube['youtube_id'] ?>" target="_blank" class="btn btn-youtube bg-youtube btn-sm"><i class="fa fa-user"></i> <?php echo 'YouTube Link'; ?> </a>
                    </div>
                </div>
            </div>

            <div class="row mt-3 d-flex justify-content-center">
                <div class="col-md-3">
                    <h6 class="card-title text-secondary">Subscribers</h6>
                    <p class="card-text text-youtube font-weight-bold"><?php echo number_format($youtube['subscribers']); ?></p>
                </div>
                <div class="col-md-3">
                    <h6 class="card-title text-secondary">Views</h6>
                    <p class="card-text text-youtube font-weight-bold"><?php echo number_format($youtube['views']); ?></p>
                </div>
                <div class="col-md-2">
                    <h6 class="card-title text-secondary">Videos</h6>
                    <p class="card-text text-youtube font-weight-bold"><?php echo number_format($youtube['videos']); ?></p>
                </div>
                <div class="col-md-4">
                    <h6 class="card-title text-secondary">YouTube ID</h6>
                    <p class="card-text text-youtube font-weight-bold"><?php echo $youtube['youtube_id']; ?></p>
                </div>
            </div>
            
            <br /><div class='row card'>
                <table class='col-md-12 table table-bordered table-hover'>
                                <thead>
                                    <th>Date</th>
                                    <th>Day</th>
                                    <th>Subscribers</th>
                                    <th>+ / -</th>
                                    <th>Views</th>
                                    <th>+ / -</th>
                                    <th>Videos</th>
                                    <th>+ / -</th>
                                </thead>
                                <tbody>
                                <?php
                                
                                $select_ytb = "SELECT * FROM youtube_logs WHERE youtube_user_id ='" . $_POST['user_input'] . "'";
                                $conn_ytb = mysqli_query($conn,$select_ytb);
                                if($conn_ytb){
                                    $row_ytb = mysqli_fetch_assoc($conn_ytb);
                                    if(isset($row_ytb)){
                                        foreach($row_ytb as $row1){ ?>
                                    <td><?php echo date_format($row1['date'],"d-m-Y"); ?></td>
                                    <td><?php $date = $row1['date']; echo date_format($date,"D"); ?></td>
                                    <td><?php echo $row1['subscribers']; ?></td>
                                    <td><?php echo $row1['sub_diff']; ?></td>
                                    <td><?php echo $row1['views']; ?></td>
                                    <td><?php echo $row1['view_diff']; ?></td>
                                    <td><?php echo $row1['videos']; ?></td>
                                    <td><?php echo $row1['video_diff']; ?></td>
                                        <?php }
                                    }
                                    else{
                                        echo '<td colspan="8"> No Data Yet !! </td>';
                                    }
                                }
                                
                                ?>
                                </tbody>
                            </table>
            </div>
            
            <br /><div class="row tab nav-center d-flex justify-content-center">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active show" id="stats-tab" data-toggle="tab" href="#stats" role="tab" aria-controls="stats" aria-selected="true"> <?php echo $youtube['title'] . '\'s Statistics'; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="subs-tab" data-toggle="tab" href="#subs" role="tab" aria-controls="subs" aria-selected="false"> Live Subscriber's Count </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="detailed-tab" data-toggle="tab" href="#detailed" role="tab" aria-controls="detailed" aria-selected="false"> Detailed Statistics </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="projections-tab" data-toggle="tab" href="#projections" role="tab" aria-controls="projections" aria-selected="false"> Projections </a>
                    </li>
                </ul><br />
                <div class="tab-content" id="myTabContent">
                    <div class="row tab-pane fade active show" id="stats" role="tabpanel" aria-labelledby="stats-tab">
                        <div class = "card-deck">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <?php

    function display_statistics() {
        global $language;
        global $logs;
        global $remaining_time_new_check;
        ?>
        <table class="table table-responsive-md">
            <thead class="thead-dark">
                <tr>
                    <th>Date</th>
                    <th>Day</th>
                    <th>Subscribers</th>
                    <th>+ / -</th>
                    <th>Views</th>
                    <th>+ / -</th>
                    <th>Videos</th>
                    <th>+ / -</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total_new_subscribers = $total_new_views = $total_new_videos = 0;
                for ($i = 0; $i < count($logs); $i++):
                    $log_yesterday = ($i == 0) ? false : $logs[$i - 1];
                    $log = $logs[$i];
                    $date = (new \DateTime($log['date']))->format('Y-m-d');
                    $date_name = (new \DateTime($log['date']))->format('D');
                    $subscribers_difference = $log_yesterday ? $log['subscribers'] - $log_yesterday['subscribers'] : 0;
                    $views_difference = $log_yesterday ? $log['views'] - $log_yesterday['views'] : 0;
                    $videos_difference = $log_yesterday ? $log['videos'] - $log_yesterday['videos'] : 0;

                    $total_new_subscribers += $subscribers_difference;
                    $total_new_views += $views_difference;
                    $total_new_videos += $videos_difference;
                    ?>
                    <tr>
                        <td><?= $date ?></td>
                        <td><?= $date_name ?></td>
                        <td><?= number_format($log['subscribers']) ?></td>
                        <td><?= colorful_number($subscribers_difference); ?></td>
                        <td><?= number_format($log['views']) ?></td>
                        <td><?= colorful_number($views_difference); ?></td>
                        <td><?= number_format($log['videos']) ?></td>
                        <td><?= colorful_number($videos_difference); ?></td>
                    </tr>
                <?php endfor; ?>

                <tr class="bg-light">
                    <td colspan="2"><?= $language->user_youtube->display->total_summary ?></td>
                    <td colspan="2"><?= colorful_number($total_new_subscribers); ?></td>
                    <td colspan="2"><?= colorful_number($total_new_views); ?></td>
                    <td colspan="2"><?= colorful_number($total_new_videos); ?></td>

                </tr>
                <tr class="bg-light">
                    <td colspan="1"><?= $language->user_youtube->display->upcoming_check ?></td>
                    <td colspan="7"><?= $remaining_time_new_check ?></td>
                </tr>

            </tbody>
        </table>
    <?php } ?>
    <br /><br /><br /><br />
    <?php
    @DEFINE(TWITCH_API_KEY, 'ekcxkcjolet0w1f0bq4zmmatxfv06t');
    $url = 'https://api.twitch.tv/helix/users?login=ninja';
    $ch = curl_init();
    $headers = ['Client-ID: ' . TWITCH_API_KEY];
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = json_decode(curl_exec($ch));
    curl_close($ch);

    $id = $result->data[0]->id;
    $url = "https://api.twitch.tv/helix/users/follows?to_id=$id&first=1";
    $ch = curl_init();
    $headers = ['Client-ID: ' . TWITCH_API_KEY];
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result1 = json_decode(curl_exec($ch));
    curl_close($ch);

    $twitch_followers = $result1->total;
    $twitch_views = $result->data[0]->view_count;
    $twitch_name = $result->data[0]->display_name;
    $twitch_desc = $result->data[0]->description;
    $twitch_pic = $result->data[0]->profile_image_url;
    $twitch_id = $result->data[0]->login;
    
    $insert_tth = "INSERT INTO twitch_users VALUES(
                NULL,
                '$id',
                '$twitch_id',
                '$youtube_name',
                '$youtube_desc',
                $twitch_followers,
                $twitch_views,
                '$twitch_pic',
                NOW(),
                NOW(),
                0,
                0
                )";

    $conn1_tth = mysqli_query($conn,$insert_tth);
    if(!$conn1_tth){
        echo 'Error';
    }
    
    ?>
    <div class="card table-bordered justify-content-center">
        <div class="card-body">
            <?php
                                $twitch = array();
                                $select_tth1 = "SELECT * FROM twitch_users WHERE username ='" . $_POST['user_input'] . "'";
                                $conn_tth1 = mysqli_query($conn,$select_tth1);
                                if($conn_tth1){
                                    $row_tth1 = mysqli_fetch_assoc($conn_tth1);
                                    if(isset($row_tth1)){
                                        foreach($row_tth1 as $key1 => $value1){
                                            $twitch[$key1] = $value1;
                                        }
                                    }
                                    else{
                                        echo '<td colspan="8"> No Data Yet !! </td>';
                                    }
                                }
                                
                                ?>
            <div class="row">
                <div class="col-lg-2 center">
                    <img src="<?php echo $twitch['profile_picture_url']; ?>" class="img-fluid rounded-circle youtube-avatar" alt="<?php echo $twitch['full_name']; ?>" />
                </div>

                <div class="col-lg-8">
                    <div class="row d-flex flex-column">
                        <h5>
                            <?php echo $twitch['full_name']; ?>
                        </h5>
                        <p class="card-text"><?php echo $twitch['description']; ?></p>
                    </div>
                </div>

                <div class="col-lg-2 center">
                    <div class="row d-flex flex-column">
                        <a href="<?= 'https://twitch.tv/' . $twitch['twitch_id'] ?>" target="_blank" class="btn btn-twitch bg-primary btn-sm"><i class="fa fa-user"></i> <?php echo 'Twitch Link'; ?> </a>
                    </div>
                </div>
            </div>

            <div class="row mt-3 d-flex justify-content-center">
                <div class="col-md-4">
                    <h6 class="card-title text-secondary">Followers</h6>
                    <p class="card-text text-youtube font-weight-bold"><?php echo number_format($twitch['followers']); ?></p>
                </div>
                <div class="col-md-4">
                    <h6 class="card-title text-secondary">Views</h6>
                    <p class="card-text text-youtube font-weight-bold"><?php echo number_format($twitch['views']); ?></p>
                </div>
                <div class="col-md-4">
                    <h6 class="card-title text-secondary">Twitch ID</h6>
                    <p class="card-text text-youtube font-weight-bold"><?php echo ($twitch['twitch_id']); ?></p>
                </div>
            </div>
            
            <br /><div class='row card'>
                <table class='table col-md-12 table-bordered table-hover'>
                                <thead>
                                    <th>Date</th>
                                    <th>Day</th>
                                    <th>Followers</th>
                                    <th>+ / -</th>
                                    <th>Views</th>
                                    <th>+ / -</th>
                                </thead>
                                <tbody>
                                <?php
                                
                                $select_tth = "SELECT * FROM twitch_logs WHERE username ='" . $_POST['user_input'] . "'";
                                $conn_tth = mysqli_query($conn,$select_tth);
                                if($conn_tth){
                                    $row_tth = mysqli_fetch_assoc($conn_tth);
                                    if(isset($row_tth)){
                                        foreach($row_tth as $row2){ ?>
                                    <td><?php echo date_format($row2['date'],"d-m-Y"); ?></td>
                                    <td><?php $date = $row2['date']; echo date_format($date,"D"); ?></td>
                                    <td><?php echo $row2['followers']; ?></td>
                                    <td><?php echo $row2['follower_diff']; ?></td>
                                    <td><?php echo $row2['views']; ?></td>
                                    <td><?php echo $row2['view_diff']; ?></td>
                                        <?php }
                                    }
                                    else{
                                        echo '<td colspan="6"> No Data Yet !! </td>';
                                    }
                                }
                                
                                ?>
                                </tbody>
                            </table>
            </div>

            <br /><div class="tab nav-center d-flex justify-content-center">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active show" id="stats1-tab" data-toggle="tab" href="#stats1" role="tab" aria-controls="stats1" aria-selected="true"> <?php echo $twitch['full_name'] . '\'s Statistics'; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="subs1-tab" data-toggle="tab" href="#subs1" role="tab" aria-controls="subs1" aria-selected="false"> Live Subscriber's Count </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="detailed1-tab" data-toggle="tab" href="#detailed1" role="tab" aria-controls="detailed1" aria-selected="false"> Detailed Statistics </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="projections1-tab" data-toggle="tab" href="#projections1" role="tab" aria-controls="projections1" aria-selected="false"> Projections </a>
                    </li>
                </ul><br />
                <div class="tab-content" id="myTabContent">
                    <div class="row tab-pane fade active show" id="stats1" role="tabpanel" aria-labelledby="stats1-tab">
                        <div class = "card-deck">
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br /><br /><br /><br />
    <?php
    
    $html = @file_get_contents("https://tumblr.tumblr.com/");
$doc = new DOMDocument();
@$doc->loadHTML('<meta http-equiv="content-type" content="text/html; charset=utf-8">' . $html);
$img = $doc->getElementsByTagName('img');
$content = array();
for ($i = 0; $i < $img->length; $i++) {
    $imgs = $img->item($i);
    if ($imgs->getAttribute('src') != '')
        $content[] = $imgs->getAttribute('src');
}
    
    $url = "http://api.tumblr.com/v2/blog/tumblr.tumblr.com/info?api_key=fOd8qaqLhSJRUvXjfmMOJRq8TimQVKcUlL7HspXEVRU3TVRfH3";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $ret1 = json_decode(curl_exec($ch));
    curl_close($ch);

    $tumblr_posts = $ret1->response->blog->total_posts;
    $tumblr_pic = $content[0];
    $tumblr_ask = ($ret1->response->blog->ask == 1 || $ret1->response->blog->ask == '') ? '<b class="text-success">Yes</b>' : '<b class="text-danger">No</b>';
    $tumblr_ask_anon = ($ret1->response->blog->ask_anon == 1 || $ret1->response->blog->ask_anon == '') ? '<b class="text-success">Yes</b>' : '<b class="text-danger">No</b>';
    $tumblr_name = $ret1->response->blog->name;
    $tumblr_desc = $ret1->response->blog->description;
    $tumblr_nsfw = ($ret1->response->blog->is_nsfw == 1) ? '<b class="text-danger">Yes</b>' : '<b class="text-success">No</b>';
    $tumblr_adult = ($ret1->response->blog->is_nsfw == 1) ? '<b class="text-danger">Yes</b>' : '<b class="text-success">No</b>';
    $tumblr_url = $ret1->response->blog->url;
    $tumblr_title = $ret1->response->blog->title;
    
    $insert_tum = "INSERT INTO tumblr_users VALUES(
                NULL,
                '0',
                '$tumblr_name',
                '$tumblr_title',
                '$tumblr_desc',
                '$tumblr_url',
                $tumblr_posts,
                '$tumblr_adult',
                '$tumblr_adult',
                '$tumblr_ask',
                '$tumblr_ask_anon',
                '$tumblr_pic',
                NOW(),
                NOW(),
                0,
                0
                )";

    $conn1_tum = mysqli_query($conn,$insert_tum);
    if(!$conn1_tum){
        echo 'Error';
    }
    
    ?>
    <div class="card table-bordered justify-content-center">
        <div class="card-body">
            <?php
                                $tumblr = array();
                                $select_tum1 = "SELECT * FROM tumblr_users WHERE username ='" . $_POST['user_input'] . "'";
                                $conn_tum1 = mysqli_query($conn,$select_tum1);
                                if($conn_tum1){
                                    $row_tum1 = mysqli_fetch_assoc($conn_tum1);
                                    if(isset($row_tum1)){
                                        foreach($row_tum1 as $key2 => $value2){
                                            $tumblr[$key2] = $value2;
                                        }
                                    }
                                    else{
                                        echo '<td colspan="8"> No Data Yet !! </td>';
                                    }
                                }
                                
                                ?>
            <div class="row">
                <div class="col-lg-2 center">
                    <img src="<?php echo $tumblr['profile_picture_url']; ?>" class="img-fluid rounded-circle tumblr-avatar" alt="<?php echo $tumblr['full_name']; ?>" />
                </div>
                <div class="col-lg-8">
                    <div class="row d-flex flex-column">
                        <h5>
                            <?php echo $tumblr['full_name']; ?>
                        </h5>
                        <p class="card-text"><?php echo $tumblr['description']; ?></p>
                    </div>
                </div>

                <div class="col-lg-2 center">
                    <div class="row d-flex flex-column">
                        <a href="<?= 'https://tumblr.com/blog/' . $tumblr['username'] ?>" target="_blank" class="btn btn-tumblr bg-tumblr btn-sm"><i class="fa fa-user"></i> <?php echo 'Tumblr Profile'; ?> </a>
                    </div>
                </div>
            </div>

            <div class="row mt-3 d-flex justify-content-center">
                <div class="col-md-2">
                    <h6 class="card-title text-secondary">Posts</h6>
                    <p class="card-text text-youtube font-weight-bold"><?php echo number_format($tumblr['posts']); ?></p>
                </div>
                <div class="col-md-2">
                    <h6 class="card-title text-secondary">Adult Content?</h6>
                    <p class="card-text text-youtube font-weight-bold"><?php echo ($tumblr['is_adult']); ?></p>
                </div>
                <div class="col-md-2">
                    <h6 class="card-title text-secondary">Is NSFW?</h6>
                    <p class="card-text text-youtube font-weight-bold"><?php echo ($tumblr['is_nsfw']); ?></p>
                </div>
                <div class="col-md-2">
                    <h6 class="card-title text-secondary">Ask Enabled?</h6>
                    <p class="card-text text-youtube font-weight-bold"><?php echo ($tumblr['ask']); ?></p>
                </div>
                <div class="col-md-3">
                    <h6 class="card-title text-secondary">Anon Ask Enabled?</h6>
                    <p class="card-text text-youtube font-weight-bold"><?php echo ($tumblr['ask_anon']); ?></p>
                </div>
            </div>
            
            <br /><div class='row card'>
                <table class='table col-md-12 table-bordered table-hover'>
                                <thead>
                                    <th>Date</th>
                                    <th>Day</th>
                                    <th>Posts</th>
                                    <th>+ / -</th>
                                </thead>
                                <tbody>
                                <?php
                                
                                $select_tum = "SELECT * FROM tumblr_logs WHERE username ='" . $_POST['user_input'] . "'";
                                $conn_tum = mysqli_query($conn,$select_tum);
                                if($conn_tum){
                                    $row_tum = mysqli_fetch_assoc($conn_tum);
                                    if(isset($row_tum)){
                                        foreach($row_tum as $row2){ ?>
                                        <tr>
                                    <td><?php echo date_format($row2['date'],"d-m-Y"); ?></td>
                                    <td><?php $date = $row2['date']; echo date_format($date,"D"); ?></td>
                                    <td><?php echo $row1['posts']; ?></td>
                                    <td><?php echo $row1['posts_diff']; ?></td>
                                        </tr>
                                        <?php }
                                    }
                                    else{
                                        echo '<td colspan="4"> No Data Yet !! </td>';
                                    }
                                }
                                
                                ?>
                                </tbody>
                            </table>
            </div>

            <br /><div class="tab nav-center d-flex justify-content-center">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active show" id="stats2-tab" data-toggle="tab" href="#stats2" role="tab" aria-controls="stats2" aria-selected="true"> <?php echo $tumblr['full_name'] . '\'s Statistics'; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="subs-tab" data-toggle="tab" href="#subs" role="tab" aria-controls="subs" aria-selected="false"> Live Subscriber's Count </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="detailed-tab" data-toggle="tab" href="#detailed" role="tab" aria-controls="detailed" aria-selected="false"> Detailed Statistics </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="projections-tab" data-toggle="tab" href="#projections" role="tab" aria-controls="projections" aria-selected="false"> Projections </a>
                    </li>
                </ul><br />
                <div class="tab-content" id="myTabContent">
                    <div class="row tab-pane fade active show" id="stats2" role="tabpanel" aria-labelledby="stats2-tab">
                        <div class = "card-deck">
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br /><br /><br /><br />
    <?php

    function buildBaseString($baseURI, $method, $params) {
        $r = array();
        ksort($params);
        foreach ($params as $key => $value) {
            $r[] = "$key=" . rawurlencode($value);
        }
        return $method . "&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
    }

    function buildAuthorizationHeader($oauth) {
        $r = 'Authorization: OAuth ';
        $values = array();
        foreach ($oauth as $key => $value)
            $values[] = "$key=\"" . rawurlencode($value) . "\"";
        $r .= implode(', ', $values);
        return $r;
    }

    function returnTweet() {

        $oauth_access_token = "211078324-GrucLlGSgt1qlBlEOsQs2GcNtS6E2G8xdaiuuVmW";
        $oauth_access_token_secret = "iC7ene1P7yeinKeTqqYHR40zDSG30kaWTLTqSRnymhfsf";
        $consumer_key = "mu9VbhWAqfRtgnznuxwnmpeHq";
        $consumer_secret = "z9IEbSNfjg4M8yODl0p68OLKUp3vgb7fpz56cDfm1wdT2sYFLX";

        //  create request
        $request = array(
            'screen_name' => 'snoopdogg',
            'count' => '1'
        );

        $oauth = array(
            'oauth_consumer_key' => $consumer_key,
            'oauth_nonce' => time(),
            'oauth_signature_method' => 'HMAC-SHA1',
            'oauth_token' => $oauth_access_token,
            'oauth_timestamp' => time(),
            'oauth_version' => '1.0'
        );

        //  merge request and oauth to one array
        $oauth = array_merge($oauth, $request);

        //  do some magic
        $base_info = buildBaseString("https://api.twitter.com/1.1/users/lookup.json", 'GET', $oauth);
        $composite_key = rawurlencode($consumer_secret) . '&' . rawurlencode($oauth_access_token_secret);
        $oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
        $oauth['oauth_signature'] = $oauth_signature;

        //  make request
        $header = array(buildAuthorizationHeader($oauth), 'Expect:');
        $options = array(CURLOPT_HTTPHEADER => $header,
            CURLOPT_HEADER => false,
            CURLOPT_URL => "https://api.twitter.com/1.1/users/lookup.json?" . http_build_query($request),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false);

        $feed = curl_init();
        curl_setopt_array($feed, $options);
        $json = curl_exec($feed);
        curl_close($feed);

        return json_decode($json, true);
    }

    $tweet = returnTweet();

    $twitter_followers = $tweet[0]['followers_count'];
    $twitter_id = $tweet[0]['id'];
    $twitter_name = $tweet[0]['name'];
    $twitter_loc = $tweet[0]['location'];
    $twitter_screen_name = $tweet[0]['screen_name'];
    $twitter_desc = $tweet[0]['description'];
    $twitter_pic = $tweet[0]['profile_image_url'];
    $twitter_likes = $tweet[0]['favourites_count'];
    $twitter_following = $tweet[0]['friends_count'];
    $twitter_tweets = $tweet[0]['statuses_count'];
    $twitter_link = $tweet[0]['url'];
    
    $insert_twtr = "INSERT INTO twitter_users VALUES(
                NULL,
                $twitter_id,
                '$twitter_screen_name',
                '$twitter_name',
                '$twitter_desc',
                '$twitter_loc',
                '$twitter_link',
                $twitter_followers,
                $twitter_following,
                $twitter_tweets,
                $twitter_likes,
                '$twitter_pic',
                '',
                0,
                0,
                NOW(),
                NOW(),
                0,
                0
                )";

    $conn1_twtr = mysqli_query($conn,$insert_twtr);
    if(!$conn1_twtr){
        echo 'Error';
    }
    
    ?>
    <div class="card table-bordered justify-content-center">
        <div class="card-body">
            <?php
                                $twitter = array();
                                $select_twtr1 = "SELECT * FROM twitter_users WHERE username ='" . $_POST['user_input'] . "'";
                                $conn_twtr1 = mysqli_query($conn,$select_twtr1);
                                if($conn_twtr1){
                                    $row_twtr1 = mysqli_fetch_assoc($conn_twtr1);
                                    if(isset($row_twtr1)){
                                        foreach($row_twtr1 as $key3 => $value3){
                                            $twitter[$key3] = $value3;
                                        }
                                    }
                                    else{
                                        echo '<td colspan="8"> No Data Yet !! </td>';
                                    }
                                }
                                
                                ?>
            <div class="row">
                <div class="col-lg-2 center">
                    <img src="<?php echo $twitter['profile_picture_url']; ?>" class="img-fluid rounded-circle youtube-avatar" alt="<?php echo $twitter['full_name']; ?>" />
                </div>
                <div class="col-lg-8">
                    <div class="row d-flex flex-column">
                        <h5>
                            <?php echo $twitter['full_name']; ?>
                        </h5>
                        <p class="card-text"><?php echo $twitter['description']; ?></p>
                    </div>
                </div>

                <div class="col-lg-2 center">
                    <div class="row d-flex flex-column">
                        <a href="<?= 'https://twitter.com/' . $twitter['username'] ?>" target="_blank" class="btn btn-twitter bg-twitter btn-sm"><i class="fa fa-user"></i> <?php echo 'Twitter Profile'; ?> </a><br />
                        <a href="<?= $twitter['website'] ?>" target="_blank" class="btn btn-twitter bg-dark btn-sm"><i class="fa fa-globe"></i> <?php echo 'Profile Link'; ?> </a>
                    </div>
                </div>
            </div>

            <div class="row mt-3 d-flex justify-content-center">
                <div class="col-md-2">
                    <h6 class="card-title text-secondary">Followers</h6>
                    <p class="card-text text-youtube font-weight-bold"><?php echo number_format($twitter['followers']); ?></p>
                </div>
                <div class="col-md-2">
                    <h6 class="card-title text-secondary">Following</h6>
                    <p class="card-text text-youtube font-weight-bold"><?php echo number_format($twitter['following']); ?></p>
                </div>
                <div class="col-md-2">
                    <h6 class="card-title text-secondary">Tweets</h6>
                    <p class="card-text text-youtube font-weight-bold"><?php echo number_format($twitter['tweets']); ?></p>
                </div>
                <div class="col-md-2">
                    <h6 class="card-title text-secondary">Likes</h6>
                    <p class="card-text text-youtube font-weight-bold"><?php echo ($twitter['likes']); ?></p>
                </div>
                <div class="col-md-2">
                    <h6 class="card-title text-secondary">Twitter ID</h6>
                    <p class="card-text text-youtube font-weight-bold"><?php echo ($twitter['twitter_id']); ?></p>
                </div>
            </div>
            
            <br /><div class='row card'>
                <table class='table col-md-12 table-bordered table-hover'>
                                <thead>
                                    <th>Date</th>
                                    <th>Day</th>
                                    <th>Followers</th>
                                    <th>+ / -</th>
                                    <th>Following</th>
                                    <th>+ / -</th>
                                    <th>Tweets</th>
                                    <th>+ / -</th>
                                    <th>Likes</th>
                                    <th>+ / -</th>
                                </thead>
                                <tbody>
                                <?php
                                
                                $select_twtr = "SELECT * FROM twitter_logs WHERE username ='" . $_POST['user_input'] . "'";
                                $conn_twtr = mysqli_query($conn,$select_twtr);
                                if($conn_twtr){
                                    $row_twtr = mysqli_fetch_assoc($conn_twtr);
                                    if(isset($row_twtr)){
                                        foreach($row_twtr as $row3){ ?>
                                    <td><?php echo date_format($row3['date'],"d-m-Y"); ?></td>
                                    <td><?php $date = $row3['date']; echo date_format($date,"D"); ?></td>
                                    <td><?php echo $row3['followers']; ?></td>
                                    <td><?php echo $row3['follower_diff']; ?></td>
                                    <td><?php echo $row3['following']; ?></td>
                                    <td><?php echo $row3['followong_diff']; ?></td>
                                    <td><?php echo $row3['tweets']; ?></td>
                                    <td><?php echo $row3['tweet_diff']; ?></td>
                                    <td><?php echo $row3['likes']; ?></td>
                                    <td><?php echo $row3['likes_diff']; ?></td>
                                        <?php }
                                    }
                                    else{
                                        echo '<td colspan="10"> No Data Yet !! </td>';
                                    }
                                }
                                
                                ?>
                                </tbody>
                            </table>
            </div>

            <br /><div class="tab nav-center d-flex justify-content-center">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active show" id="stats1-tab" data-toggle="tab" href="#stats1" role="tab" aria-controls="stats1" aria-selected="true"> <?php echo $twitter['full_name'] . '\'s Statistics'; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="subs-tab" data-toggle="tab" href="#subs" role="tab" aria-controls="subs" aria-selected="false"> Live Subscriber's Count </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="detailed-tab" data-toggle="tab" href="#detailed" role="tab" aria-controls="detailed" aria-selected="false"> Detailed Statistics </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="projections-tab" data-toggle="tab" href="#projections" role="tab" aria-controls="projections" aria-selected="false"> Projections </a>
                    </li>
                </ul><br />
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="all" role="tabpanel" aria-labelledby="all-tab">
                        <div class = "card-deck">

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br /><br /><br /><br />
    <?php
    $retinsta = json_decode(file_get_contents('https://api.instagram.com/v1/users/self/?access_token=2537203486.1677ed0.298785fc6fcc40b79d1c60dd155e3a54'));

    $insta_id = $retinsta->data->id;
    $insta_username = $retinsta->data->username;
    $insta_pic = $retinsta->data->profile_picture;
    $insta_name = $retinsta->data->full_name;
    $insta_desc = $retinsta->data->bio;
    $insta_website = $retinsta->data->website;
    $insta_media = $retinsta->data->counts->media;
    $insta_following = $retinsta->data->counts->follows;
    $insta_followers = $retinsta->data->counts->followed_by;
    
    $insert_ins = "INSERT INTO instagram_users VALUES(
                NULL,
                $insta_id,
                '$insta_username',
                '$insta_name',
                '$insta_desc',
                '$insta_website',
                $insta_followers,
                $insta_following,
                $insta_media,
                NOW(),
                NOW(),
                0,
                '$insta_pic',
                0,
                0
                )";

    $conn1_ins = mysqli_query($conn,$insert_ins);
    if(!$conn1_ins){
        echo 'Error';
    }
    
    ?>
    <div class="card table-bordered justify-content-center">
        <div class="card-body">
            <?php
                                $insta = array();
                                $select_ins1 = "SELECT * FROM instagram_users WHERE username ='" . $_POST['user_input'] . "'";
                                $conn_ins1 = mysqli_query($conn,$select_ins1);
                                if($conn_ins1){
                                    $row_ins1 = mysqli_fetch_assoc($conn_ins1);
                                    if(isset($row_ins1)){
                                        foreach($row_ins1 as $key4 => $value4){
                                            $insta[$key4] = $value4;
                                        }
                                    }
                                    else{
                                        echo '<td colspan="8"> No Data Yet !! </td>';
                                    }
                                }
                                
                                ?>
            <div class="row">
                <div class="col-lg-2 center">
                    <img src="<?php echo $insta['profile_picture_url']; ?>" class="img-fluid rounded-circle youtube-avatar" alt="<?php echo $insta['full_name']; ?>" />
                </div>
                <div class="col-lg-8">
                    <div class="row d-flex flex-column">
                        <h5>
<?php echo $insta['full_name']; ?>
                        </h5>
                        <p class="card-text"><?php echo $insta['description']; ?></p>
                    </div>
                </div>

                <div class="col-lg-2 center">
                    <div class="row d-flex flex-column">
                        <a href="<?= 'https://instagram.com/' . $insta['username'] ?>" target="_blank" class="btn btn-instagram bg-instagram btn-sm"><i class="fa fa-user"></i> <?php echo 'Instagram Profile'; ?> </a>
                    </div>
                </div>
            </div>

            <div class="row mt-3 d-flex justify-content-center">
                <div class="col-md-3">
                    <h6 class="card-title text-secondary">Followers</h6>
                    <p class="card-text text-youtube font-weight-bold"><?php echo number_format($insta['followers']); ?></p>
                </div>
                <div class="col-md-3">
                    <h6 class="card-title text-secondary">Following</h6>
                    <p class="card-text text-youtube font-weight-bold"><?php echo number_format($insta['following']); ?></p>
                </div>
                <div class="col-md-3">
                    <h6 class="card-title text-secondary">Media Uploads</h6>
                    <p class="card-text text-youtube font-weight-bold"><?php echo number_format($insta['uploads']); ?></p>
                </div>
                <div class="col-md-3">
                    <h6 class="card-title text-secondary">Instagram ID</h6>
                    <p class="card-text text-youtube font-weight-bold"><?php echo ($insta['instagram_id']); ?></p>
                </div>
            </div>
            
            <br /><div class='row card'>
                <table class='table col-md-12 table-bordered table-hover'>
                                <thead>
                                    <th>Date</th>
                                    <th>Day</th>
                                    <th>Followers</th>
                                    <th>+ / -</th>
                                    <th>Following</th>
                                    <th>+ / -</th>
                                    <th>Uploads</th>
                                    <th>+ / -</th>
                                </thead>
                                <tbody>
                                <?php
                                
                                $select_ins = "SELECT * FROM instagram_logs WHERE username ='" . $_POST['user_input'] . "'";
                                $conn_ins = mysqli_query($conn,$select_ins);
                                if($conn_ins){
                                    $row_ins = mysqli_fetch_assoc($conn_ins);
                                    if(isset($row_ins)){
                                        foreach($row_ins as $row4){ ?>
                                    <td><?php echo date_format($row4['date'],"d-m-Y"); ?></td>
                                    <td><?php $date = $row4['date']; echo date_format($date,"D"); ?></td>
                                    <td><?php echo $row4['followers']; ?></td>
                                    <td><?php echo $row4['follower_diff']; ?></td>
                                    <td><?php echo $row4['following']; ?></td>
                                    <td><?php echo $row4['followong_diff']; ?></td>
                                    <td><?php echo $row4['uploads']; ?></td>
                                    <td><?php echo $row4['upload_diff']; ?></td>
                                        <?php }
                                    }
                                    else{
                                        echo '<td colspan="8"> No Data Yet !! </td>';
                                    }
                                }
                                
                                ?>
                                </tbody>
                            </table>
            </div>

            <br /><div class="tab nav-center d-flex justify-content-center">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active show" id="stats1-tab" data-toggle="tab" href="#stats1" role="tab" aria-controls="stats1" aria-selected="true"> <?php echo $insta_name . '\'s Statistics'; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="subs-tab" data-toggle="tab" href="#subs" role="tab" aria-controls="subs" aria-selected="false"> Live Subscriber's Count </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="detailed-tab" data-toggle="tab" href="#detailed" role="tab" aria-controls="detailed" aria-selected="false"> Detailed Statistics </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="projections-tab" data-toggle="tab" href="#projections" role="tab" aria-controls="projections" aria-selected="false"> Projections </a>
                    </li>
                </ul><br />
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="all" role="tabpanel" aria-labelledby="all-tab">
                        <div class = "card-deck">

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
<br /><br /><br /><br />
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