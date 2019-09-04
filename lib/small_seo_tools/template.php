<!DOCTYPE html>
<?php
require_once 'simple_html_dom.php';
require_once 'all_functions.php';
?>
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
        
            .table-wrapper-scroll-y {
                display: block;
                max-height: 300px;
                overflow-y: auto;
                -ms-overflow-style: -ms-autohiding-scrollbar;
            }
            
            .card {text-align: center;}
            
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
                                    <h4 class="mb-0"> Bulk Check </h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                                        <li class="breadcrumb-item"><a href="index.html" class="default-color">Home</a></li>
                                        <li class="breadcrumb-item"><a href="seo_tools.php" class="default-color">SEO Tools</a></li>
                                        <li class="breadcrumb-item active">Bulk Check</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- main body -->
<?php

$sql = 'SELECT * FROM domains WHERE ID = ' . $_POST['id'];
$qry = mysqli_query($conn,$sql);
if($qry){
$row = mysqli_fetch_assoc($qry);
}

$domain = 'w3schools.com';
$technologies = getBuiltWith($domain);

//KEYWORD ANALYSIS
$array_spam_keyword = array("as seen on", "buying judgments", "order status", "dig up dirt on friends",
    "additional income", "double your", "earn per week", "home based", "income from home", "money making",
    "opportunity", "while you sleep", "$$$", "beneficiary", "cash", "cents on the dollar", "claims",
    "cost", "discount", "f r e e", "hidden assets", "incredible deal", "loans", "money",
    "mortgage rates", "one hundred percent free", "price", "quote", "save big money", "subject to credit",
    "unsecured debt", "accept credit cards", "credit card offers", "investment decision",
    "no investment", "stock alert", "avoid bankruptcy", "consolidate debt and credit",
    "eliminate debt", "get paid", "lower your mortgage rate", "refinance home", "acceptance",
    "chance", "here", "leave", "maintained", "never", "remove", "satisfaction", "success",
    "dear [email/friend/somebody]", "ad", "click", "click to remove", "email harvest", "increase sales",
    "internet market", "marketing solutions", "month trial offer", "notspam",
    "open", "removal instructions", "search engine listings", "the following form", "undisclosed recipient",
    "we hate spam", "cures baldness", "human growth hormone", "lose weight spam", "online pharmacy",
    "stop snoring", "vicodin", "#1", "4u", "billion dollars", "million", "being a member",
    "cannot be combined with any other offer", "financial freedom", "guarantee",
    "important information regarding", "mail in order form", "nigerian", "no claim forms", "no gimmick",
    "no obligation", "no selling", "not intended", "offer", "priority mail", "produced and sent out",
    "stuff on sale", "they’re just giving it away", "unsolicited", "warranty", "what are you waiting for?",
    "winner", "you are a winner!", "cancel at any time", "get", "print out and fax", "free",
    "free consultation", "free grant money", "free instant", "free membership", "free preview ",
    "free sample ", "all natural", "certified", "fantastic deal", "it’s effective", "real thing",
    "access", "apply online", "can't live without", "don't hesitate", "for you", "great offer", "instant",
    "now", "once in lifetime", "order now", "special promotion", "time limited", "addresses on cd",
    "brand new pager", "celebrity", "legal", "phone", "buy", "clearance", "orders shipped by",
    "meet singles", "be your own boss", "earn $", "expect to earn", "home employment", "make $",
    "online biz opportunity", "potential earnings", "work at home", "affordable",
    "best price", "cash bonus", "cheap", "collect", "credit", "earn", "fast cash",
    "hidden charges", "insurance", "lowest price", "money back", "no cost", "only '$'", "profits",
    "refinance", "save up to", "they keep your money -- no refund!", "us dollars",
    "cards accepted", "explode your business", "no credit check", "requires initial investment",
    "stock disclaimer statement ", "calling creditors", "consolidate your debt", "financially independent",
    "lower interest rate", "lowest insurance rates", "social security number", "accordingly", "dormant",
    "hidden", "lifetime", "medium", "passwords", "reverses", "solution", "teen", "friend",
    "auto email removal", "click below", "direct email", "email marketing",
    "increase traffic", "internet marketing", "mass email", "more internet traffic", "one time mailing",
    "opt in", "sale", "search engines", "this isn't junk", "unsubscribe",
    "web traffic", "diagnostics", "life insurance", "medicine", "removes wrinkles",
    "valium", "weight loss", "100% free", "50% off", "join millions",
    "one hundred percent guaranteed", "billing address", "confidentially on all orders", "gift certificate",
    "have you been turned down?", "in accordance with laws", "message contains", "no age restrictions",
    "no disappointment", "no inventory", "no purchase necessary", "no strings attached", "obligation",
    "per day", "prize", "reserves the right", "terms and conditions", "trial", "vacation",
    "we honor all", "who really wins?", "winning", "you have been selected",
    "compare", "give it away", "see for yourself", "free access", "free dvd", "free hosting",
    "free investment", "free money", "free priority mail", "free trial",
    "all new", "congratulations", "for free", "outstanding values", "risk free",
    "act now!", "call free", "do it today", "for instant access", "get it now",
    "info you requested", "limited time", "now only", "one time", "order today",
    "supplies are limited", "urgent", "beverage", "cable converter", "copy dvds", "luxury car",
    "rolex", "buy direct", "order", "shopper", "score with babes", "compete for your business",
    "earn extra cash", "extra income", "homebased business", "make money", "online degree",
    "university diplomas", "work from home", "bargain", "big bucks", "cashcashcash", "check",
    "compare rates", "credit bureaus", "easy terms", 'for just "$xxx"', "income", "investment",
    "million dollars", "mortgage", "no fees", "pennies a day", "pure profit", "save $",
    "serious cash", "unsecured credit", "why pay more?", "check or money order", "full refund",
    "no hidden costs", "sent in compliance", "stock pick", "collect child support",
    "eliminate bad credit", "get out of debt", "lower monthly payment", "pre-approved",
    "your income", "avoid", "freedom", "home", "lose", "miracle", "problem", "sample",
    "stop", "wife", "hello", "bulk email", "click here", "direct marketing", "form",
    "increase your sales", "marketing", "member", "multi level marketing", "online marketing",
    "performance", "sales", "subscribe", "this isn't spam", "visit our website",
    "will not believe your eyes", "fast viagra delivery", "lose weight",
    "no medical exams", "reverses aging", "viagra", "xanax", "100% satisfied", "billion",
    "join millions of americans", "thousands", "call", "deal", "giving away",
    "if only it were that easy", "long distance phone offer", "name brand", "no catch",
    "no experience", "no middleman", "no questions asked", "no-obligation", "off shore", "per week",
    "prizes", "shopping spree", "the best rates", "unlimited", "vacation offers", "weekend getaway",
    "win", "won", "you’re a winner!", "copy accurately", "print form signature",
    "sign up free today", "free cell phone", "free gift", "free installation",
    "free leads", "free offer", "free quote", "free website", "amazing", "drastically reduced",
    "guaranteed", "promise you", "satisfaction guaranteed", "apply now",
    "call now", "don't delete", "for only", "get started now", "information you requested",
    "new customers only", "offer expires", "only", "please read",
    "take action now", "while supplies last", "bonus", "casino",
    "laser printer", "new domain extensions", "stainless steel"
);

$keyword = content_analysis($domain);
$result = array();
    $result['one_phrase'] = json_encode($keyword['one_phrase']);
    $result['two_phrase'] = json_encode($keyword['two_phrase']);
    $result['three_phrase'] = json_encode($keyword['three_phrase']);
    $result['four_phrase'] = json_encode($keyword['four_phrase']);
    $result['total_words'] = $keyword['total_words'];
    $result['domain_name'] = $_POST['url'];

    $one_phrase = json_decode($result['one_phrase']);
    $two_phrase = json_decode($result['two_phrase']);
    $three_phrase = json_decode($result['three_phrase']);
    $four_phrase = json_decode($result['four_phrase']);
    $total_words = $result['total_words'];
    $stats = getStatsData2($domain,$technologies);

?>
<div class="container-fluid main-container">
    <div class="row">
        <div class="col-md-12 main-index">
            <div class="row">   
      <div class="col-xl-12 mb-30">     
        <div class="card card-statistics justify-content-center h-100"> 
          <div class="card-body">
           <div class="d-block d-md-flex justify-content-between">
              <div class="d-block">
                <h5 class="card-title pb-0 border-0">Single Keyword Analysis</h5>
              </div>
             </div>
             <div class="table-responsive mt-15">
              <table class="table table-bordered justify-content-center center-aligned-table mb-0">
                <thead>
                  <tr class="text-dark">
                    <th>ONE PHRASE</th>
                    <th>OCCURENCES</th>
                    <th>DENSITY</th>
                    <th>KEYWORD<br />STUFFING</th>
                    <th>POSSIBLE<br />SPAM</th>
                    
                    
                    
                    <th>TOP 50</th>
                    <th>TITLE</th>
                    <th>DESCRIPTION</th>
                    <th>H1</th>
                    <th>H2</th>
                    <th>H3</th>
                  </tr>
                </thead>
                <tbody>
<?php $c = 1; foreach ($one_phrase as $key => $value) : ?>
                                <tr>
                                    <?php if($c == 11) break;
                                          $g = googleRank($domain,$key); 
                                          $y = yahooRank($domain,$key); 
                                          $b = bingRank($domain,$key); ?>
                                    <td><?php echo $key; ?></td>
                                    <td><?php echo $value; ?></td>
                                    <td><?php
                                        $occurence = round(($value / $total_words) * 100, 3);
                                        echo round($occurence, 3) . " %";
                                        ?></td>
                                        <td><?php if($occurence > 3.25)
                                        echo 'Yes';
                                        else
                                        echo 'No';?></td>
                                    <td><?php
                                        if (in_array(strtolower($key), $array_spam_keyword))
                                            echo "Yes";
                                        else
                                            echo 'No';
                                        ?>
                                    </td>
                                    <td><?php if($g[1] <= 50 && $g[1] != '') echo ' G '; if($y[1] <= 50 && $y[1] != '') echo ' Y '; if($b[1] <= 50 && $b[1] != 'Not Found') echo ' B '; ?></td>
                            <td class="text-center">
                                <?php
                                if (mb_strpos(mb_strtolower($stats['metaTitle']), mb_strtolower($key)) !== FALSE) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i>Yes 
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i>No
                                    <?php
                                }
                                ?>
                            </td>

                            <td class="text-center">
                                <?php
                                if (mb_strpos(mb_strtolower($stats['metaDescription']), mb_strtolower($key)) !== FALSE) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i> Yes
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i> No
                                    <?php
                                }
                                ?>
                            </td>

                            <td class="text-center">
                                <?php
                                if (inHX($stats['body'], $key, "h1")) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i> Yes
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i> No
                                    <?php
                                }
                                ?>
                            </td>
                            
                            <td class="text-center">
                                <?php
                                if (inHX($stats['body'], $key, "h2")) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i> Yes
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i> No
                                    <?php
                                }
                                ?>
                            </td>
                            
                            <td class="text-center">
                                <?php
                                if (inHX($stats['body'], $key, "h3")) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i> Yes
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i> No
                                    <?php
                                }
                                ?>
                            </td>
                                </tr>
                            <?php $c++; endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>   
      </div>
      <div class="col-xl-12 mb-30">     
        <div class="card card-statistics h-100"> 
          <div class="card-body">
           <div class="d-block d-md-flex justify-content-between">
              <div class="d-block">
                <h5 class="card-title pb-0 border-0">Two-phrase Keyword Analysis</h5>
              </div>
             </div>
             <div class="table-responsive mt-15">
              <table class="table table-bordered center-aligned-table mb-0">
                <thead>
                  <tr class="text-dark">
                    <th>TWO PHRASE</th>
                    <th>OCCURENCES</th>
                    <th>DENSITY</th>
                    <th>KEYWORD<br />STUFFING</th>
                    <th>POSSIBLE<br />SPAM</th>
                    
                    
                    
                    <th>TOP 50</th>
                    <th>TITLE</th>
                    <th>DESCRIPTION</th>
                    <th>H1</th>
                    <th>H2</th>
                    <th>H3</th>
                  </tr>
                </thead>
                <tbody>
<?php $c = 1; foreach ($two_phrase as $key => $value) : ?>
                                <tr>
                                    <?php if($c == 11) break;
                                          $g = googleRank($domain,$key); 
                                          $y = yahooRank($domain,$key); 
                                          $b = bingRank($domain,$key); ?>
                                    <td><?php echo $key; ?></td>
                                    <td><?php echo $value; ?></td>
                                    <td><?php
                                        $occurence = round(($value / $total_words) * 100, 3);
                                        echo round($occurence, 3) . " %";
                                        ?></td>
                                        <td><?php if($occurence > 3.25)
                                        echo 'Yes';
                                        else
                                        echo 'No';?></td>
                                    <td><?php
                                        if (in_array(strtolower($key), $array_spam_keyword))
                                            echo "Yes";
                                        else
                                            echo 'No';
                                        ?>
                                    </td>
                                    <td><?php if($g[1] <= 50 && $g[1] != '') echo ' G '; if($y[1] <= 50 && $y[1] != '') echo ' Y '; if($b[1] <= 50 && $b[1] != 'Not Found') echo ' B '; ?></td>
                            <td class="text-center">
                                <?php
                                if (mb_strpos(mb_strtolower($stats['metaTitle']), mb_strtolower($key)) !== FALSE) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i>Yes 
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i>No
                                    <?php
                                }
                                ?>
                            </td>

                            <td class="text-center">
                                <?php
                                if (mb_strpos(mb_strtolower($stats['metaDescription']), mb_strtolower($key)) !== FALSE) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i> Yes
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i> No
                                    <?php
                                }
                                ?>
                            </td>

                            <td class="text-center">
                                <?php
                                if (inHX($stats['body'], $key, "h1")) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i> Yes
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i> No
                                    <?php
                                }
                                ?>
                            </td>
                            
                            <td class="text-center">
                                <?php
                                if (inHX($stats['body'], $key, "h2")) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i> Yes
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i> No
                                    <?php
                                }
                                ?>
                            </td>
                            
                            <td class="text-center">
                                <?php
                                if (inHX($stats['body'], $key, "h3")) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i> Yes
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i> No
                                    <?php
                                }
                                ?>
                            </td>
                                </tr>
                            <?php $c++; endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>   
      </div>
      <div class="col-xl-12 mb-30">     
        <div class="card card-statistics h-100"> 
          <div class="card-body">
           <div class="d-block d-md-flex justify-content-between">
              <div class="d-block">
                <h5 class="card-title pb-0 border-0">Three-phrase Keyword Analysis</h5>
              </div>
             </div>
             <div class="table-responsive mt-15">
              <table class="table table-bordered center-aligned-table mb-0">
                <thead>
                  <tr class="text-dark">
                    <th>THREE PHRASE</th>
                    <th>OCCURENCES</th>
                    <th>DENSITY</th>
                    <th>KEYWORD<br />STUFFING</th>
                    <th>POSSIBLE<br />SPAM</th>
                    
                    
                    
                    <th>TOP 50</th>
                    <th>TITLE</th>
                    <th>DESCRIPTION</th>
                    <th>H1</th>
                    <th>H2</th>
                    <th>H3</th>
                  </tr>
                </thead>
                <tbody>
                   <?php $c = 1; foreach ($three_phrase as $key => $value) : ?>
                                <tr>
                                    <?php if($c == 11) break;
                                          $g = googleRank($domain,$key); 
                                          $y = yahooRank($domain,$key); 
                                          $b = bingRank($domain,$key); ?>
                                    <td><?php echo $key; ?></td>
                                    <td><?php echo $value; ?></td>
                                    <td><?php
                                        $occurence = round(($value / $total_words) * 100, 3);
                                        echo round($occurence, 3) . " %";
                                        ?></td>
                                        <td><?php if($occurence > 3.25)
                                        echo 'Yes';
                                        else
                                        echo 'No';?></td>
                                    <td><?php
                                        if (in_array(strtolower($key), $array_spam_keyword))
                                            echo "Yes";
                                        else
                                            echo 'No';
                                        ?>
                                    </td>
                                    <td><?php if($g[1] <= 50 && $g[1] != '') echo ' G '; if($y[1] <= 50 && $y[1] != '') echo ' Y '; if($b[1] <= 50 && $b[1] != 'Not Found') echo ' B '; ?></td>
                            <td class="text-center">
                                <?php
                                if (mb_strpos(mb_strtolower($stats['metaTitle']), mb_strtolower($key)) !== FALSE) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i>Yes 
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i>No
                                    <?php
                                }
                                ?>
                            </td>

                            <td class="text-center">
                                <?php
                                if (mb_strpos(mb_strtolower($stats['metaDescription']), mb_strtolower($key)) !== FALSE) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i> Yes
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i> No
                                    <?php
                                }
                                ?>
                            </td>

                            <td class="text-center">
                                <?php
                                if (inHX($stats['body'], $key, "h1")) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i> Yes
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i> No
                                    <?php
                                }
                                ?>
                            </td>
                            
                            <td class="text-center">
                                <?php
                                if (inHX($stats['body'], $key, "h2")) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i> Yes
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i> No
                                    <?php
                                }
                                ?>
                            </td>
                            
                            <td class="text-center">
                                <?php
                                if (inHX($stats['body'], $key, "h3")) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i> Yes
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i> No
                                    <?php
                                }
                                ?>
                            </td>
                                </tr>
                            <?php $c++; endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>   
      </div>
      <div class="col-xl-12 mb-30">     
        <div class="card card-statistics h-100"> 
          <div class="card-body">
           <div class="d-block d-md-flex justify-content-between">
              <div class="d-block">
                <h5 class="card-title pb-0 border-0">Four-phrase Keyword Analysis</h5>
              </div>
             </div>
             <div class="table-responsive mt-15">
              <table class="table table-bordered center-aligned-table mb-0">
                <thead>
                    <tr class="text-dark">
                    <th>FOUR PHRASE</th>
                    <th>OCCURENCES</th>
                    <th>DENSITY</th>
                    <th>KEYWORD<br />STUFFING</th>
                    <th>POSSIBLE<br />SPAM</th>
                    
                    
                    
                    <th>TOP 50</th>
                    <th>TITLE</th>
                    <th>DESCRIPTION</th>
                    <th>H1</th>
                    <th>H2</th>
                    <th>H3</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $c = 1; foreach ($four_phrase as $key => $value) : ?>
                                <tr>
                                    <?php if($c == 11) break;
                                          $g = googleRank($domain,$key); 
                                          $y = yahooRank($domain,$key); 
                                          $b = bingRank($domain,$key); ?>
                                    <td><?php echo $key; ?></td>
                                    <td><?php echo $value; ?></td>
                                    <td><?php
                                        $occurence = round(($value / $total_words) * 100, 3);
                                        echo round($occurence, 3) . " %";
                                        ?></td>
                                        <td><?php if($occurence > 3.25)
                                        echo 'Yes';
                                        else
                                        echo 'No';?></td>
                                    <td><?php
                                        if (in_array(strtolower($key), $array_spam_keyword))
                                            echo "Yes";
                                        else
                                            echo 'No';
                                        ?>
                                    </td>
                                    <td><?php if($g[1] <= 50 && $g[1] != '') echo ' G '; if($y[1] <= 50 && $y[1] != '') echo ' Y '; if($b[1] <= 50 && $b[1] != 'Not Found') echo ' B '; ?></td>
                            <td class="text-center">
                                <?php
                                if (mb_strpos(mb_strtolower($stats['metaTitle']), mb_strtolower($key)) !== FALSE) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i>Yes 
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i>No
                                    <?php
                                }
                                ?>
                            </td>

                            <td class="text-center">
                                <?php
                                if (mb_strpos(mb_strtolower($stats['metaDescription']), mb_strtolower($key)) !== FALSE) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i> Yes
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i> No
                                    <?php
                                }
                                ?>
                            </td>

                            <td class="text-center">
                                <?php
                                if (inHX($stats['body'], $key, "h1")) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i> Yes
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i> No
                                    <?php
                                }
                                ?>
                            </td>
                            
                            <td class="text-center">
                                <?php
                                if (inHX($stats['body'], $key, "h2")) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i> Yes
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i> No
                                    <?php
                                }
                                ?>
                            </td>
                            
                            <td class="text-center">
                                <?php
                                if (inHX($stats['body'], $key, "h3")) {
                                    ?>
                                    <i class="zmdi zmdi-check text-success"></i> Yes
                                    <?php
                                } else {
                                    ?>
                                    <i class="zmdi zmdi-close text-danger"></i> No
                                    <?php
                                }
                                ?>
                            </td>
                                </tr>
                            <?php $c++; endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>   
      </div>
  </div>
  
</div>          
<div class="col-xl-12 col-lg-12 mb-30">
          <div class="card card-statistics">
            <div class="card-body">
                <div class="tab nav-border" style="position: relative;">
                  <div class="d-block d-md-flex justify-content-between">
                    <div class="d-block">
                      <h5 class="card-title text-left">Internal & External Links Analysis</h5>
                    </div>
                    <div class="d-block d-md-flex" style="position: absolute;right: 0; top:0;">
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active show" id="int-tab" data-toggle="tab" href="#int" role="tab" aria-controls="int" aria-selected="true"> Internal</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="brint-tab" data-toggle="tab" href="#brint" role="tab" aria-controls="brint" aria-selected="false"> Broken Internal</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="ext-tab" data-toggle="tab" href="#ext" role="tab" aria-controls="ext" aria-selected="false"> External</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="brext-tab" data-toggle="tab" href="#brext" role="tab" aria-controls="brext" aria-selected="false"> Broken External</a>
                        </li>
                      </ul>
                     </div>
                   </div>
                   <?php
                   
                    $my_url = raino_trim($domain);
                    if (substr($my_url, 0, 7) !== 'http://' && substr($my_url, 0, 8) !== 'https://')
                    $my_url = 'http://' . $my_url;
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
                    $brokenLinks = getBrokenLinks($my_url);
                    if (is_array($brokenLinks)) {
                    $regUserInput = $my_url;
                    $internalLinks = $brokenLinks[0];
                    $externalLinks = $brokenLinks[1];
                    }
                   
                   ?>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="int" role="tabpanel" aria-labelledby="int-tab">
                        <div class="card mb-30 h-300">
                            <div class='table-wrapper-scroll-y'>
        <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <td style="text-align: left;">No.</td>
                <td style="text-align: left;"><?php echo 'Link URL'; ?></td>
                <td style="text-align: left;"><?php echo 'Link Type'; ?></td>
            </tr>
        </thead>
        <tbody>
            <?php if(isset($internal_links)) { ?>
            <?php
            foreach ($internal_links as $count => $links) {
                ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $links['href']; ?></td>
                    <td><?php echo $links['follow_type']; ?></td>
                </tr>
            <?php } } else echo '<td colspan="3"> No Internal Links Present in Website. </td>'; ?>
        </tbody></table>
                        </div>
                        </div>
                        </div>
                        <div class="tab-pane fade" id="brint" role="tabpanel" aria-labelledby="brint-tab">
                            
                        <div class="card mb-30 h-300">
                            <div class='table-wrapper-scroll-y'>
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th style="text-align: left;"><?php echo 'Link URL'; ?></th>
                            <th><?php echo 'Response Code'; ?></th>
                            <th><?php echo 'Link Type'; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($internalLinks[0])) { ?>
    <?php
    $count = 1;
    foreach ($internalLinks as $internalLink) {
        ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td style="text-align: left;"><?php echo $internalLink[0]; ?></td>
                                <td style="color: <?php echo $internalLink[2]; ?>;"><?php echo $internalLink[1]; ?></td>
                                <td style="color: <?php echo $internalLink[2]; ?>;"><?php echo ($internalLink[1] == 404) ? 'Broken' : 'Okay'; ?></td>
                            </tr>
        <?php
    } } else echo '<td colspan="4"> No Broken Internal Links Present in Website. </td>';
    ?>
    </tbody>
    </table>
    
                        </div>
                        </div>
                        </div>
                        <div class="tab-pane fade" id="ext" role="tabpanel" aria-labelledby="ext-tab">
                        <div class="card mb-30 h-300">
                            <div class='table-wrapper-scroll-y'>
        <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th style="text-align: left;">No.</th>
                <th style="text-align: left;"><?php echo "Link URL"; ?></th>
                <th style="text-align: left;"><?php echo 'Link Type'; ?></th>
            </tr>
        </thead>
        <tbody>
            <?php if(isset($external_links)) { ?>
            <?php
            foreach ($external_links as $count => $links) {
                ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $links['href']; ?></td>
                    <td><?php echo $links['follow_type']; ?></td>
                </tr>
            <?php } } else echo '<td colspan="3"> No External Links Present in Website. </td>'; ?>
        </tbody></table>
                        </div>
                        </div>
                        </div>
                        <div class="tab-pane fade" id="brext" role="tabpanel" aria-labelledby="brext-tab">
                            
                        <div class="card mb-30 h-300">
                            <div class='table-wrapper-scroll-y'>
                    <table class="table table-hover table-bordered table-striped" style="margin-bottom: 30px;">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th style="text-align: left;"><?php echo 'Link URL'; ?></th>
                            <th><?php echo 'Response Code'; ?></th>
                            <th><?php echo 'Link Type'; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($externalLinks[0])) { ?>
    <?php
    $count = 1;
    foreach ($externalLinks as $externalLink) {
        ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td style="text-align: left;"><?php echo $externalLink[0]; ?></td>
                                <td style="color: <?php echo $externalLink[2]; ?>;"><?php echo $externalLink[1]; ?></td>
                                <td style="color: <?php echo $externalLink[2]; ?>;"><?php echo ($externalLink[1] == 404) ? 'Broken' : 'Okay'; ?></td>
                            </tr>
        <?php
    } } else echo '<td colspan="4"> No Broken External Links Present in Website. </td>';
    ?>
                    </tbody>
                </table>
                        </div>
                        </div>
                        </div>
                        </div>
                    </div> 
                </div>
             </div>
          </div>
        </div>
        <div class="col-xl-12 mb-30">
          <div class="card card-statistics">
            <div class="card-body">
                <div class="tab nav-border" style="position: relative;">
                  <div class="d-block d-md-flex justify-content-between">
                    <div class="d-block w-100">
                      <h5 class="card-title">Desktop & Mobile Suggestions</h5>
                      <?php
                      
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
                      
                      ?>
                    </div>
                    <div class="d-block d-md-flex" style="position: absolute;right: 0; top:0;">
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active show" id="desktop-tab" data-toggle="tab" href="#desktop" role="tab" aria-controls="desktop" aria-selected="true"> Desktop</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="mobile-tab" data-toggle="tab" href="#mobile" role="tab" aria-controls="mobile" aria-selected="false">Mobile </a>
                        </li>
                      </ul>
                     </div>
                   </div>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade active show" id="desktop" role="tabpanel" aria-labelledby="desktop-tab">
                        <div class="card mb-30 h-200">
                           <div class='table-responsive'>
                               <table class='table'>
                                   <thead><tr><th>Rule Name</th><th>Summary</th><th>Rule Impact</th><th>Redirect URL</th></tr></thead><tbody>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$d_redir->rule_name)); ?></b></td><td><?php echo $d_redir->summary; ?></td><td><?php echo $d_redir->rule_impact; ?></td><td><a target='_blank' href="https://developers.google.com/speed/docs/insights/AvoidRedirects">Click here</a></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$d_compress->rule_name)); ?></b></td><td><?php echo $d_compress->summary; ?></td><td><?php echo $d_compress->rule_impact; ?></td><td><a target='_blank' href="https://developers.google.com/speed/docs/insights/EnableCompression">Click here</a></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$d_leverage->rule_name)); ?></b></td><td><?php echo $d_leverage->summary; ?></td><td><?php echo $d_leverage->rule_impact; ?></td><td><a target='_blank' href="https://developers.google.com/speed/docs/insights/LeverageBrowserCaching">Click here</a></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$d_response->rule_name)); ?></b></td><td><?php echo $d_response->summary; ?></td><td><?php echo $d_response->rule_impact; ?></td><td><a target='_blank' href="https://developers.google.com/speed/docs/insights/Server">Click here</a></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$d_mincss->rule_name)); ?></b></td><td><?php echo $d_mincss->summary; ?></td><td><?php echo $d_mincss->rule_impact; ?></td><td><a target='_blank' href="https://developers.google.com/speed/docs/insights/MinifyResources">Click here</a></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$d_minhtml->rule_name)); ?></b></td><td><?php echo $d_minhtml->summary; ?></td><td><?php echo $d_minhtml->rule_impact; ?></td><td><a target='_blank' href="https://developers.google.com/speed/docs/insights/MinifyResources">Click here</a></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$d_minjs->rule_name)); ?></b></td><td><?php echo $d_minjs->summary; ?></td><td><?php echo $d_minjs->rule_impact; ?></td><td><a target='_blank' href="https://developers.google.com/speed/docs/insights/MinifyResources">Click here</a></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$d_renderblock->rule_name)); ?></b></td><td><?php echo $d_renderblock->summary; ?></td><td><?php echo $d_renderblock->rule_impact; ?></td><td><a target='_blank' href="https://developers.google.com/speed/docs/insights/BlockingJS">Click here</a></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$d_optimage->rule_name)); ?></b></td><td><?php echo $d_optimage->summary; ?></td><td><?php echo $d_optimage->rule_impact; ?></td><td><a target='_blank' href="https://developers.google.com/speed/docs/insights/OptimizeImages">Click here</a></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$d_visible->rule_name)); ?></b></td><td><?php echo $d_visible->summary; ?></td><td><?php echo $d_visible->rule_impact; ?></td><td><a target='_blank' href="https://developers.google.com/speed/docs/insights/PrioritizeVisibleContent">Click here</a></td></tr>
                               </tbody></table>
                           </div>
                        </div>
                        </div>
                      <div class="tab-pane fade" id="mobile" role="tabpanel" aria-labelledby="mobile-tab">
                        <div class="card mb-30 h-200">
                            <div class='table-responsive'>
                           <table class='table'>
                               <thead><tr><th>Rule Name</th><th>Summary</th><th>Rule Impact</th><th>Redirect URL</th></tr></thead><tbody>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$m_redir->rule_name)); ?></b></td><td><?php echo $m_redir->summary; ?></td><td><?php echo $m_redir->rule_impact; ?></td><td><a target='_blank' href="https://developers.google.com/speed/docs/insights/AvoidRedirects">Click here</a></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$m_compress->rule_name)); ?></b></td><td><?php echo $m_compress->summary; ?></td><td><?php echo $m_compress->rule_impact; ?></td><td><a target='_blank' href="https://developers.google.com/speed/docs/insights/EnableCompression">Click here</a></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$m_leverage->rule_name)); ?></b></td><td><?php echo $m_leverage->summary; ?></td><td><?php echo $m_leverage->rule_impact; ?></td><td><a target='_blank' href="https://developers.google.com/speed/docs/insights/LeverageBrowserCaching">Click here</a></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$m_response->rule_name)); ?></b></td><td><?php echo $m_response->summary; ?></td><td><?php echo $m_response->rule_impact; ?></td><td><a target='_blank' href="https://developers.google.com/speed/docs/insights/Server">Click here</a></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$m_mincss->rule_name)); ?></b></td><td><?php echo $m_mincss->summary; ?></td><td><?php echo $m_mincss->rule_impact; ?></td><td><a target='_blank' href="https://developers.google.com/speed/docs/insights/MinifyResources">Click here</a></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$m_minhtml->rule_name)); ?></b></td><td><?php echo $m_minhtml->summary; ?></td><td><?php echo $m_minhtml->rule_impact; ?></td><td><a target='_blank' href="https://developers.google.com/speed/docs/insights/MinifyResources">Click here</a></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$m_minjs->rule_name)); ?></b></td><td><?php echo $m_minjs->summary; ?></td><td><?php echo $m_minjs->rule_impact; ?></td><td><a target='_blank' href="https://developers.google.com/speed/docs/insights/MinifyResources">Click here</a></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$m_renderblock->rule_name)); ?></b></td><td><?php echo $m_renderblock->summary . ' ' . $m_renderblock->summary_urlblock_header; ?></td><td><?php echo $m_renderblock->rule_impact; ?></td><td><a target='_blank' href="https://developers.google.com/speed/docs/insights/BlockingJS">Click here</a></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$m_optimage->rule_name)); ?></b></td><td><?php echo $m_optimage->summary; ?></td><td><?php echo $m_optimage->rule_impact; ?></td><td><a target='_blank' href="https://developers.google.com/speed/docs/insights/OptimizeImages">Click here</a></td></tr>
    <tr><td><b><?php echo ucwords(str_replace('_',' ',$m_visible->rule_name)); ?></b></td><td><?php echo $m_visible->summary; ?></td><td><?php echo $m_visible->rule_impact; ?></td><td><a target='_blank' href="https://developers.google.com/speed/docs/insights/PrioritizeVisibleContent">Click here</a></td></tr>
    <tr><td colspan='2'><b><?php echo 'Usability Score'; ?></td><td colspan='2'><?php echo $m_usability->usability_score; ?></td></tr>
                               </tbody>
                           </table>
                           </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
    <div class="col-xl-6 mb-30">
       <div class="card h-200">
         <div class="card-body">
           <h5 class="card-title">Organic & Paid Keywords </h5>
           <?php $similar_web = similar_web_raw_data($domain); ?>
           <script>
var org = "<?php echo (int)$row['simweb_organic_search']; ?>";
var paid = "<?php echo (int)$row['simweb_paid_search']; ?>";

if ($('#morris-donut1').exists()) {
        Morris.Donut({
                element: 'morris-donut1',
                data: [
                    {label: "ORGANIC", value: org},
                    {label: "PAID", value: paid}
                ],
                resize: true,
                colors: ['#84ba3f', '#17a2b8']
            });
}
           </script>
           <div id="morris-donut1" style="height: 270px;"></div>
            <div class="text-center">
                <ul class="list-inline card-detail-list m-b-0">
                    <li class="list-inline-item">
                        <i class="fa fa-circle mr-2"></i>Organic
                    </li>
                    <li class="list-inline-item">
                        <i class="fa fa-circle mr-2"></i>Paid
                    </li>
                </ul>
            </div>
         </div> 
       </div> 
      </div>
      <div class="col-xl-6 mb-30">
       <div class="card h-200">
         <div class="card-body">
           <h5 class="card-title">Social Traffic </h5>
           <script>
     var a = "<?php echo (int)$row['simweb_direct_traffic']; ?>";
     var b = "<?php echo (int)$row['simweb_referral_traffic']; ?>";
     var c = "<?php echo (int)$row['simweb_search_traffic']; ?>";
     var d = "<?php echo (int)$row['simweb_social_traffic']; ?>";
     var e = "<?php echo (int)$row['simweb_mail_traffic']; ?>";
     var f = "<?php echo (int)$row['simweb_display_traffic']; ?>";
     var config30 = {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [
                    a,b,c,d,e,f,
                ],
                backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.orange,
                    window.chartColors.yellow,
                    window.chartColors.green,
                    window.chartColors.blue,
                    window.chartColors.gray,
                ],
                label: 'Dataset 1'
            }],
            labels: [
                "Direct",
                "Referral",
                "Search",
                "Social",
                "Mail",
                "Display"
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                position: 'bottom',
            },
            title: {
                display: false,
                text: 'Traffic Distribution'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
     };
     
     if ($('#canvas30').exists()) {
           var ctx10 = document.getElementById("canvas30").getContext("2d");
            window.myLine11 = new Chart(ctx10, config30);
          }
           </script>
             <div class="chart-wrapper"> 
             <div id="canvas-holder" style="width: 100%; margin: 0 auto; height: 300px;">
                <canvas id="canvas30" width="550"></canvas>
            </div>
          </div>
         </div> 
       </div> 
      </div>
      <div class="col-xl-6 mb-30 text-left">
         <div class="card card-statistics h-200">
           <div class="card-body ">
             <h5 class="card-title"> Whois Information </h5>
             <?php
             
             $my_url1 = parse_url('https://' . $domain);
        $host = $my_url1['host'];
        $myHost = ucfirst($host);
        $whois = new whois;
        $site = $whois->cleanUrl($host);
        $whois_data = $whois->whoislookup($site);
        $whoisData = $whois_data[0];
             
             ?>
              <!-- action group -->
              <div class="btn-group info-drop">
                <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#"><i class="text-success ti-reload"></i> Refresh </a>
                </div>
              </div>
             <div class="scrollbar  max-h-350">
              <ul class="list-unstyled to-do">
                <?php
                    $myLines = preg_split("/\r\n|\n|\r/", $whoisData);
                    foreach ($myLines as $line) {
                        if (!empty($line))
                            echo '<li>' . $line . '</li>';
                    }
                    ?>
              </ul>
             </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 mb-30">
         <div class="card card-statistics h-200">
           <div class="card-body ">
             <h5 class="card-title">IP Information </h5>
             <?php
$ip = $row['ip'];
$isp = $row['isp'];
$country = $row['country'];
$region = $row['region'];
$city = $row['city'];
$lat = $row['latitude'];
$lon = $row['longitude'];
$tz = $row['timezone'];
             ?>
              <!-- action group -->
              <div class="btn-group info-drop">
                <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#"><i class="text-success ti-reload"></i> Refresh </a>
                </div>
              </div>
             <ul class="scrollbar  max-h-350">
                 <div class='table-responsive list-unstyled to-do'>
              <li><table class='table' style='text-align: left;'>
                <tr>
                    <td class='col-xl-4'><b>Your IP </b></td>
                    <td class='col-xl-8'><?php echo $ip; ?></td>
                </tr>
                <tr>
                    <td class='col-xl-4'><b>ISP</b></td>
                    <td class='col-xl-8'><?php echo $isp; ?></td>
                </tr>
                <tr>
                    <td class='col-xl-4'><b>City</b></td>
                    <td class='col-xl-8'><?php echo $city; ?></td>
                </tr>
                <tr>
                    <td class='col-xl-4'><b>Region</b></td>
                    <td class='col-xl-8'><?php echo $region; ?></td>
                </tr>
                <tr>
                    <td class='col-xl-4'><b>Country</b></td>
                    <td class='col-xl-8'><?php echo $country; ?></td>
                </tr>
                <tr>
                    <td class='col-xl-4'><b>Latitude</b></td>
                    <td class='col-xl-8'><?php echo $lat; ?></td>
                </tr>
                <tr>
                    <td class='col-xl-4'><b>Longitude</b></td>
                    <td class='col-xl-8'><?php echo $lon; ?></td>
                </tr>
                <tr>
                    <td class='col-xl-4'><b>Timezone</b></td>
                    <td class='col-xl-8'><?php echo $tz; ?></td>
                </tr>
            </table></li>
             </div>
             </ul>
            </div>
          </div>
        </div>
        <div class="col-xl-6 mb-30">
         <div class="card card-statistics h-200">
           <div class="card-body ">
             <h5 class="card-title">Moz Information </h5>
             <?php
             
        $umrp = $row['mozrank'];
        $pa = $row['PA'];
        $da = $row['DA'];
             
             ?>
              <!-- action group -->
              <div class="btn-group info-drop">
                <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#"><i class="text-success ti-reload"></i> Refresh </a>
                </div>
              </div>
             <div class="scrollbar  max-h-350">
                <div class='table-responsive list-unstyled to-do'>
            <table class='table table-striped'>
                <tr><td style='font-weight: bold;'>URL</td><td><?php echo ucfirst($domain); ?></td></tr>
                <tr><td style='font-weight: bold;'>MozRank</td><td><?php echo round($umrp,4); ?></td></tr>
                <tr><td style='font-weight: bold;'>DA</td><td><?php echo (int) $da; ?></td></tr>
                <tr><td style='font-weight: bold;'>PA</td><td><?php echo $pa; ?></td></tr>
            </table>
        </div>
             </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 mb-30">
         <div class="card card-statistics h-200">
           <div class="card-body ">
             <h5 class="card-title">BuiltWith Technologies </h5>
              <?php
              
              $bw = getBuiltWith($domain);
              
              ?>
              <!-- action group -->
              <div class="btn-group info-drop">
                <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#"><i class="text-success ti-reload"></i> Refresh</a>
                </div>
              </div>
            <div class="scrollbar  max-h-350">
                <div class='table-responsive'>
                    <table class='table table-hover table-striped table-bordered'>
                        <thead>
                            <tr><th>Name</th><th>Type</th><th>Redirect URL</th></tr>
                        </thead>
                        <tbody>
                                <?php
$object = get_object_vars($bw->response->technologies);
while (current($object)) {
        $key = key($object);
        echo "<tr><td> " . $key . " </td><td> " . $object["$key"]->cats[0] . " </td><td> <a href='" . $object["$key"]->website . "' target='_blank'>Click Here</a></td></tr>";
    next($object);
}
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            </div>
            </div>
        <div class="col-xl-6 mb-30">
         <div class="card card-statistics h-300">
           <div class="card-body ">
             <h5 class="card-title"> Response Header </h5>
             <?php
             
             $headers = $row['header_response'];
             
             ?>
              <!-- action group -->
              <div class="btn-group info-drop">
                <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#"><i class="text-success ti-reload"></i> Refresh</a>
                </div>
              </div>
            <div class="">
                <div class='table-responsive'>
                    <table class='table'>
                        <tr><td><?php echo $headers; ?></td></tr>
                    </table>
                </div>
            </div>
            </div>
            </div>
            </div>
        <div class="col-xl-6 mb-30">
          <div class="card card-statistics">
            <div class="card-body">
                <div class="tab nav-border" style="position: relative;">
                  <div class="d-block d-md-flex justify-content-between">
                    <div class="d-block w-100">
                      <h5 class="card-title"> Google Stats </h5>
                      <?php
                      
    $google_stats = google_stats($domain);
    $google_stats2 = google_stats2($domain);

    $pagespeed = $row['d_pagespeed'];
    $numRes = $row['numres_d'];
    $numHosts = $row['numhosts_d'];
    $totalBytes = $row['numtotalbytes_d'];
    $numStatic = $row['numstatic_d'];
    $htmlBytes = $row['numhtmlbytes_d'];
    $otwBytes = $row['numotwbytes_d'];
    $cssBytes = $row['numcssbytes_d'];
    $imageBytes = $row['numimagebytes_d'];
    $jsBytes = $row['numjsbytes_d'];
    $otherBytes = $row['numotherbytes_d'];
    $numJS = $row['numjsres_d'];
    $numCSS = $row['numcssres_d'];

    $pagespeed2 = $row['m_pagespeed'];
    $numRes2 = $row['numres_m'];
    $numHosts2 = $row['numhosts_m'];
    $totalBytes2 = $row['numtotalbytes_m'];
    $numStatic2 = $row['numstatic_m'];
    $htmlBytes2 = $row['numhtmlbytes_m'];
    $otwBytes2 = $row['numotwbytes_m'];
    $cssBytes2 = $row['numcssbytes_m'];
    $imageBytes2 = $row['numimagebytes_m'];
    $jsBytes2 = $row['numjsbytes_m'];
    $otherBytes2 = $row['numotherbytes_m'];
    $numJS2 = $row['numjsres_m'];
    $numCSS2 = $row['numcssres_m'];

                      ?>
                    </div>
                    <div class="d-block d-md-flex" style="position: absolute;right: 0; top:0;">
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active show" id="desktop-tab1" data-toggle="tab" href="#desktop1" role="tab" aria-controls="desktop1" aria-selected="true"> Desktop</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="mobile-tab1" data-toggle="tab" href="#mobile1" role="tab" aria-controls="mobile1" aria-selected="false">Mobile </a>
                        </li>
                      </ul>
                     </div>
                   </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="desktop1" role="tabpanel" aria-labelledby="desktop-tab1">
                            <div class='card mb-30 table-responsive h-300'>
                                <table class="table">
                            <tbody>
                            <tr>
                                <td class='col-xl-4'>Page Speed: </td>
                                <td class='col-xl-8'><?php echo $pagespeed; ?></td>
                            </tr>
                            <tr>
                                <td class='col-xl-4'>Number Resources: </td>
                                <td class='col-xl-8'><?php echo $numRes; ?></td>
                            </tr>
                            <tr>
                                <td class='col-xl-4'>Number Hosts: </td>
                                <td class='col-xl-8'><?php echo $numHosts; ?></td>
                            </tr>
                            <tr>
                                <td class='col-xl-4'>Total Request: </td>
                                <td class='col-xl-8'><?php echo round(($totalBytes/1024),2) . ' KB'; ?></td>
                            </tr>
                            <tr>
                                <td class='col-xl-4'>Number Static Resources: </td>
                                <td class='col-xl-8'><?php echo $numStatic; ?></td>
                            </tr>
                            <tr>
                                <td class='col-xl-4'>HTML Response: </td>
                                <td class='col-xl-8'><?php echo round(($htmlBytes/1024),2) . ' KB'; ?></td>
                            </tr>
                            <tr>
                                <td class='col-xl-4'>CSS Response: </td>
                                <td class='col-xl-8'><?php echo round(($cssBytes/1024),2) . ' KB'; ?></td>
                            </tr>
                            <tr>
                                <td class='col-xl-4'>Image Response: </td>
                                <td class='col-xl-8'><?php echo round(($imageBytes/1024),2) . ' KB'; ?></td>
                            </tr>
                            <tr>
                                <td class='col-xl-4'>JavaScript Response: </td>
                                <td class='col-xl-8'><?php echo round(($jsBytes/1024),2) . ' KB'; ?></td>
                            </tr>
                            <tr>
                                <td class='col-xl-4'>Other Response: </td>
                                <td class='col-xl-8'><?php echo round(($otherBytes/1024),2) . ' KB'; ?></td>
                            </tr>
                            <tr>
                                <td class='col-xl-4'>Number JS Resources: </td>
                                <td class='col-xl-8'><?php echo (!isset($numJS) ? '0' : $numJS); ?></td>
                            </tr>
                            <tr>
                                <td class='col-xl-4'>Number CSS Resources: </td>
                                <td class='col-xl-8'><?php echo (!isset($numCSS) ? '0' : $numCSS); ?></td>
                            </tr>
                            
                            </tbody>
                        </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="mobile1" role="tabpanel" aria-labelledby="mobile-tab1">
                            <div class='card mb-30 table-responsive h-300'>
                                <table class="table">
                            <tbody>
                            <tr>
                                <td class='col-xl-4'>Page Speed: </td>
                                <td class='col-xl-8'><?php echo $pagespeed2; ?></td>
                            </tr>
                            <tr>
                                <td class='col-xl-4'>Number Resources: </td>
                                <td class='col-xl-8'><?php echo $numRes2; ?></td>
                            </tr>
                            <tr>
                                <td class='col-xl-4'>Number Hosts: </td>
                                <td class='col-xl-8'><?php echo $numHosts2; ?></td>
                            </tr>
                            <tr>
                                <td class='col-xl-4'>Total Request: </td>
                                <td class='col-xl-8'><?php echo round(($totalBytes2/1024),2) . ' KB'; ?></td>
                            </tr>
                            <tr>
                                <td class='col-xl-4'>Number Static Resources: </td>
                                <td class='col-xl-8'><?php echo $numStatic2; ?></td>
                            </tr>
                            <tr>
                                <td class='col-xl-4'>HTML Response: </td>
                                <td class='col-xl-8'><?php echo round(($htmlBytes2/1024),2) . ' KB'; ?></td>
                            </tr>
                            <tr>
                                <td class='col-xl-4'>CSS Response: </td>
                                <td class='col-xl-8'><?php echo round(($cssBytes2/1024),2) . ' KB'; ?></td>
                            </tr>
                            <tr>
                                <td class='col-xl-4'>Image Response: </td>
                                <td class='col-xl-8'><?php echo round(($imageBytes2/1024),2) . ' KB'; ?></td>
                            </tr>
                            <tr>
                                <td class='col-xl-4'>JavaScript Response: </td>
                                <td class='col-xl-8'><?php echo round(($jsBytes2/1024),2) . ' KB'; ?></td>
                            </tr>
                            <tr>
                                <td class='col-xl-4'>Other Response: </td>
                                <td class='col-xl-8'><?php echo round(($otherBytes2/1024),2) . ' KB'; ?></td>
                            </tr>
                            <tr>
                                <td class='col-xl-4'>Number JS Resources: </td>
                                <td class='col-xl-8'><?php echo (!isset($numJS2) ? '0' : $numJS2); ?></td>
                            </tr>
                            <tr>
                                <td class='col-xl-4'>Number CSS Resources: </td>
                                <td class='col-xl-8'><?php echo (!isset($numCSS2) ? '0' : $numCSS2); ?></td>
                            </tr>
                            
                            </tbody>
                        </table>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-danger rounded-circle">
                  <p class="card-text text-dark">Page Size</p>
                </div>
                <div class="float-right text-right">
<?php
$size = getPageSize($domain);
$kb_size = size_as_kb($size);
$myUrl = ucfirst($domain);
?>
                  <h4>~<?php echo $kb_size; ?> KB<br /><small>(<?php echo $size; ?> B)</small></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-primary rounded-circle">
                  <p class="card-text text-dark">Load Time</p>
                </div>
                <div class="float-right text-right">
                  <?php
            $outData2 = checkPageSpeed('http://' . $domain);
            $timeTaken = $outData2[0];
                  ?>
                  <h4><?php echo $timeTaken; ?> sec</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-warning rounded-circle">
                  <p class="card-text text-dark">Mobile Speed</p>
                </div>
                <div class="float-right text-right">
                  <h4><?php echo $pagespeed2; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-info rounded-circle">
                  <p class="card-text text-dark">Desktop Speed</p>
                </div>
                <div class="float-right text-right">
                  <h4><?php echo $pagespeed; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-danger rounded-circle">
                  <p class="card-text text-dark">Usability</p>
                </div>
                <div class="float-right text-right">
                  <h4><?php echo $row['usability_m']; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-primary rounded-circle">
                  <p class="card-text text-dark">Page Authority</p>
                </div>
                <div class="float-right text-right">
                  <h4><?php echo $pa; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-warning rounded-circle">
                  <p class="card-text text-dark">Domain Authority</p>
                </div>
                <div class="float-right text-right">
                  <h4><?php echo (int)$da; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-info rounded-circle">
                  <p class="card-text text-dark">Backlink Count</p>
                </div>
                <div class="float-right text-right">
                    <?php
$my_url2 = parse_url('http://' . $domain);
$host = $my_url2['host'];
$myHost = ucfirst($host);
$alexa = alexaRank($host);
$alexa_back = $alexa[3];
                    ?>
                    <h4><?php echo $alexa_back; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-danger rounded-circle">
                  <p class="card-text text-dark">MozRank</p>
                </div>
                <div class="float-right text-right">
                  <h4><?php echo round($umrp,4); ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-primary rounded-circle">
                  <p class="card-text text-dark">Bounce Rate</p>
                </div>
                <div class="float-right text-right">
                  <?php
                  
                  $bounce_rate1 = $row['bounce'];
                  ?>
                  <h4><?php echo $bounce_rate1; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-warning rounded-circle">
                  <p class="card-text text-dark">SiteMap.xml</p>
                </div>
                <div class="float-right text-right">
                  <?php
                  
                  if($row['sitemap'] == 'success')
                  echo "<h4>Yes</h4>";
                  else
                  echo "<h4>No</h4>";
                  
                  ?>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-info rounded-circle">
                  <p class="card-text text-dark">Robots.txt</p>
                </div>
                <div class="float-right text-right">
                  <?php
                  
                  if($row['robots'] == 'success')
                  echo "<h4>Yes</h4>";
                  else
                  echo "<h4>No</h4>";
                  
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
        
$socialCounts = new socialNetworkShareCount('http://www.' . $domain);

$ret = ($socialCounts->getShareCounts());

$all = str_replace(array('{','}','"','"'), '', $ret);
$all = explode(',', $all);
$fb = explode(':', $all[0]);
$tw = explode(':', $all[1]);
$pin = explode(':', $all[2]);
$lin = explode(':', $all[3]);
$gplus = explode(':', $all[4]);
$red = explode(':', $all[5]);
$stum = explode(':', $all[6]);
$buff = explode(':', $all[7]);
$total = explode(':', $all[8]);
        
        ?>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-danger rounded-circle">
                  <span class="text-white">
                    <i class="fa fa-facebook highlight-icon" aria-hidden="true"></i>
                  </span>
                </div>
                <div class="float-right text-right">
                  <p class="card-text text-dark">Facebook</p>
                  <h4><?php echo $fb[1]; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-primary rounded-circle">
                  <span class="text-white">
                    <i class="fa fa-twitter highlight-icon" aria-hidden="true"></i>
                  </span>
                </div>
                <div class="float-right text-right">
                  <p class="card-text text-dark">Twitter</p>
                  <h4><?php echo $tw[1]; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-warning rounded-circle">
                  <span class="text-white">
                    <i class="fa fa-linkedin highlight-icon" aria-hidden="true"></i>
                  </span>
                </div>
                <div class="float-right text-right">
                  <p class="card-text text-dark">Linkedin</p>
                  <h4><?php echo $lin[1]; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-info rounded-circle">
                  <span class="text-white">
                    <i class="fa fa-instagram highlight-icon" aria-hidden="true"></i>
                  </span>
                </div>
                <div class="float-right text-right">
                  <p class="card-text text-dark">Buffer</p>
                  <h4><?php echo $buff[1]; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-danger rounded-circle">
                  <span class="text-white">
                    <i class="fa fa-pinterest highlight-icon" aria-hidden="true"></i>
                  </span>
                </div>
                <div class="float-right text-right">
                  <p class="card-text text-dark">Pinterest</p>
                  <h4><?php echo $pin[1]; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-primary rounded-circle">
                  <span class="text-white">
                    <i class="fa fa-stumbleupon highlight-icon" aria-hidden="true"></i>
                  </span>
                </div>
                <div class="float-right text-right">
                  <p class="card-text text-dark">Stumbleupon</p>
                  <h4><?php echo $stum[1]; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-warning rounded-circle">
                  <span class="text-white">
                    <i class="fa fa-reddit highlight-icon" aria-hidden="true"></i>
                  </span>
                </div>
                <div class="float-right text-right">
                  <p class="card-text text-dark">Reddit</p>
                  <h4><?php echo $red[1]; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-info rounded-circle">
                  <span class="text-white">
                    <i class="fa fa-google-plus highlight-icon" aria-hidden="true"></i>
                  </span>
                </div>
                <div class="float-right text-right">
                  <p class="card-text text-dark">Google+</p>
                  <h4><?php echo $gplus[1]; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 mb-30 text-left">
         <div class="card card-statistics h-200">
           <div class="card-body ">
             <h5 class="card-title">To Do List </h5>
              <!-- action group -->
              <div class="btn-group info-drop">
              </div>
             <div class="scrollbar  max-h-350">
              <ul class="list-unstyled to-do">
                <li>
                    <p>BLOCKED BY ROBOTS.TXT</p> <span class='badge badge-success text-light'> <?php echo $blockedrobots; ?> </span>
                </li>
                <li>
                    <p>BLOCKED BY META-ROBOTS</p> <span class='badge badge-success text-light'> <?php echo $blockedmeta; ?> </span>
                </li>
                <li>
                    <p>LINKS NOFOLLOWED BY META ROBOTS</p> <span class='badge badge-success text-light'> <?php echo $nofollowmeta; ?> </span>
                </li>
                <li>
                    <p>TOTAL KEYWORDS</p> <span class='badge badge-success text-light'> <?php echo $totalKeywords; ?> </span>
                </li>
              </ul>
             </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 mb-30 text-left">
         <div class="card card-statistics h-200">
           <div class="card-body ">
             <h5 class="card-title">Search Engine Index Info </h5>
              <!-- action group -->
              <div class="btn-group info-drop">
                <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#"><i class="text-success ti-reload"></i> Refresh</a>
                </div>
              </div>
             <div class="scrollbar  max-h-350">
              <table class='table mb-30'>
                  <tr><td>Google Index</td><td><?php echo $row['google_index']; ?></td></tr>
                  <tr><td>Yahoo Index</td><td><?php echo $row['yahoo_index']; ?></td></tr>
                  <tr><td>Bing Index</td><td><?php echo $row['bing_index']; ?></td></tr>
              </table>
             </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 mb-30 text-left">
         <div class="card card-statistics h-200">
           <div class="card-body ">
             <h5 class="card-title">Social Shares </h5>
              <!-- action group -->
              <div class="btn-group info-drop">
                <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#"><i class="text-success ti-reload"></i> Refresh</a>
                </div>
              </div>
             <div class="scrollbar">
              <ul class="list-unstyled to-do">
                  <li><?php echo @$similar_web['social_site_name'][0] . " -  " . @$similar_web['social_site_percentage'][0] ?></li>
                  <li><?php echo @$similar_web['social_site_name'][1] . " -  " . @$similar_web['social_site_percentage'][1] ?></li>
                  <li><?php echo @$similar_web['social_site_name'][2] . " -  " . @$similar_web['social_site_percentage'][2] ?></li>
                  <li><?php echo @$similar_web['social_site_name'][3] . " -  " . @$similar_web['social_site_percentage'][3] ?></li>
                  <li><?php echo @$similar_web['social_site_name'][4] . " -  " . @$similar_web['social_site_percentage'][4] ?></li>
              </ul>
             </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 mb-30 text-left">
         <div class="card card-statistics h-300">
           <div class="card-body ">
             <h5 class="card-title">Sites in same IP </h5>
             <?php
             
             $my_url3 = parse_url('http://' . $domain);
        $host1 = $my_url3['host'];
        $getHostIP1 = gethostbyname($host1);
        $myHost1 = ucfirst(str_replace('www.', '', $host1));
        $revLink1 = reverseIP($getHostIP1);
        $revCount1 = count($revLink1);
             
             ?>
              <!-- action group -->
              <div class="btn-group info-drop">
                <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#"><i class="text-success ti-reload"></i> Refresh</a>
                </div>
              </div>
             <div class="scrollbar  max-h-350">
              <ul class="list-unstyled to-do">
                <?php
                if($revCount1 != 0) {
                            $loop = 1;
                            foreach ($revLink1 as $link1) {
                                ?>
                                
                                    <li><?php echo ucfirst(str_replace('www.', '', $link1)); ?></li>
                                
                                <?php
                                $loop = $loop + 1;
                            }
                }
                else
                echo '<li> No Sites in Same IP </li>';
                ?>
              </ul>
             </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 mb-30 text-left">
         <div class="card card-statistics">
           <div class="card-body ">
             <h5 class="card-title">Related Websites </h5>
             <?php
             
             $sim = similar_site_from_google($domain);
             
             ?>
              <!-- action group -->
              <div class="btn-group info-drop">
                <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#"><i class="text-success ti-reload"></i> Refresh</a>
                </div>
              </div>
             <div class="table-responsive">
              <table class="table table-bordered">
                <?php
                
                for($i = 0;$i < count($sim);$i+=2){
                    echo "<tr><td>" . $i+1 . ". " . $sim[$i] . " </td><td> " . ($i+2) . " " . $sim[$i+1] . '</td></tr>';
                }
                
                ?>
              </table>
             </div>
            </div>
          </div>
        </div>
        <div class="col-xl-12 mb-30">
         <div class="card card-statistics">
           <div class="card-body ">
             <h5 class="card-title">Similar Web Data </h5>
              <!-- action group -->
              <div class="btn-group info-drop">
                <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#"><i class="text-success ti-reload"></i> Refresh</a>
                </div>
              </div>
             <div class="scrollbar  max-h-300">
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-primary rounded-circle">
                  <p class="card-text text-dark">Total Visits</p>
                </div>
                <div class="float-right text-right">
                  <h4><?php echo $row['simweb_total_visit']; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-primary rounded-circle">
                  <p class="card-text text-dark">Average Visit Duration</p>
                </div>
                <div class="float-right text-right">
                  <h4><?php echo $row['simweb_time_on_site']; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-primary rounded-circle">
                  <p class="card-text text-dark">Pages per Visit</p>
                </div>
                <div class="float-right text-right">
                  <h4><?php echo $row['simweb_pageviews']; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-primary rounded-circle">
                  <p class="card-text text-dark">Bounce Rate</p>
                </div>
                <div class="float-right text-right">
                  <h4><?php echo $row['bounce']; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      <div class="col-xl-6 mb-30">
       <div class="card max-h-350">
         <div class="card-body">
           <h5 class="card-title"></h5>
           <div id="world-map-markers" style="height: 300px"></div>
         </div> 
       </div> 
      </div>
      <div class="col-xl-6 mb-30">
         <div class="card card-statistics max-h-350">
           <div class="card-body ">
             <h5 class="card-title">Traffic By Country </h5>
              <!-- action group -->
              <div class="btn-group info-drop">
                <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#"><i class="text-success ti-reload"></i> Refresh</a>
                </div>
              </div>
              <div class='table-responsive' style='height:300px;'>
                  <table class='table'>
                      <tr><th class='col-xl-2'>No.</th><th class='col-xl-6'>Country</th><th class='col-xl-4'>Traffic %</th></tr>
                      <tr><td>1</td><td><?php echo @$similar_web['traffic_country'][0]; ?></td><td><?php echo @$similar_web['traffic_country_percentage'][0]; ?></td></tr>
                      <tr><td>2</td><td><?php echo @$similar_web['traffic_country'][1]; ?></td><td><?php echo @$similar_web['traffic_country_percentage'][1]; ?></td></tr>
                      <tr><td>3</td><td><?php echo @$similar_web['traffic_country'][2]; ?></td><td><?php echo @$similar_web['traffic_country_percentage'][2]; ?></td></tr>
                      <tr><td>4</td><td><?php echo @$similar_web['traffic_country'][3]; ?></td><td><?php echo @$similar_web['traffic_country_percentage'][3]; ?></td></tr>
                      <tr><td>5</td><td><?php echo @$similar_web['traffic_country'][4]; ?></td><td><?php echo @$similar_web['traffic_country_percentage'][4]; ?></td></tr>
                  </table>
             </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-primary rounded-circle">
                  <p class="card-text text-dark">Category Rank</p>
                </div>
                <div class="float-right text-right">
                  <h4><?php echo $row['simweb_category'] . '<br />' . $row['simweb_category_rank']; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-primary rounded-circle">
                  <p class="card-text text-dark">Global Rank</p>
                </div>
                <div class="float-right text-right">
                  <h4><?php echo $row['simweb_global_rank']; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-primary rounded-circle">
                  <p class="card-text text-dark">Country Rank</p>
                </div>
                <div class="float-right text-right">
                  <h4><?php echo $row['simweb_country'] . '<br />' . $row['simweb_country_rank']; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-primary rounded-circle">
                  <p class="card-text text-dark">Organic Search</p>
                </div>
                <div class="float-right text-right">
                  <h4><?php echo $row['simweb_organic_search']; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-primary rounded-circle">
                  <p class="card-text text-dark">Paid Search</p>
                </div>
                <div class="float-right text-right">
                  <h4><?php echo $row['simweb_paid_search']; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-primary rounded-circle">
                  <p class="card-text text-dark">Direct Traffic</p>
                </div>
                <div class="float-right text-right">
                  <h4><?php echo $row['simweb_direct_traffic']; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-primary rounded-circle">
                  <p class="card-text text-dark">Referral Traffic</p>
                </div>
                <div class="float-right text-right">
                  <h4><?php echo $row['simweb_referral_traffic']; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-primary rounded-circle">
                  <p class="card-text text-dark">Search Traffic</p>
                </div>
                <div class="float-right text-right">
                  <h4><?php echo $row['simweb_search_traffic']; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-primary rounded-circle">
                  <p class="card-text text-dark">Social Traffic</p>
                </div>
                <div class="float-right text-right">
                  <h4><?php echo $row['simweb_social_traffic']; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-primary rounded-circle">
                  <p class="card-text text-dark">Mail Traffic</p>
                </div>
                <div class="float-right text-right">
                  <h4><?php echo $row['simweb_mail_traffic']; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
          <div class="card card-statistics h-100">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left icon-box bg-primary rounded-circle">
                  <p class="card-text text-dark">Display Traffic</p>
                </div>
                <div class="float-right text-right">
                  <h4><?php echo $row['simweb_display_traffic']; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 mb-30 text-left">
         <div class="card card-statistics">
           <div class="card-body ">
             <h5 class="card-title">Referral & Destination Sites </h5>
              <!-- action group -->
              <div class="btn-group info-drop">
                <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#"><i class="text-success ti-reload"></i> Refresh</a>
                </div>
              </div>
             <div class="scrollbar  max-h-200">
              <div class='table-responsive'>
                  <table class='table'>
                      <tr><th class='col-xl-6'>Top Referral Sites</th><th class='col-xl-6'>Top Destination Sites</th></tr>
                      <tr><td><?php echo @$similar_web['top_referral_site'][0]; ?></td><td><?php echo @$similar_web['top_destination_site'][0]; ?></td></tr>
                      <tr><td><?php echo @$similar_web['top_referral_site'][1]; ?></td><td><?php echo @$similar_web['top_destination_site'][1]; ?></td></tr>
                      <tr><td><?php echo @$similar_web['top_referral_site'][2]; ?></td><td><?php echo @$similar_web['top_destination_site'][2]; ?></td></tr>
                      <tr><td><?php echo @$similar_web['top_referral_site'][3]; ?></td><td><?php echo @$similar_web['top_destination_site'][3]; ?></td></tr>
                      <tr><td><?php echo @$similar_web['top_referral_site'][4]; ?></td><td><?php echo @$similar_web['top_destination_site'][4]; ?></td></tr>
                  </table>
              </div>
             </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 mb-30 text-left">
         <div class="card card-statistics h-200">
           <div class="card-body ">
             <h5 class="card-title">Top Organic & Paid Keywords </h5>
              <!-- action group -->
              <div class="btn-group info-drop">
                <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#"><i class="text-success ti-reload"></i> Refresh</a>
                </div>
              </div>
             <div class="scrollbar  max-h-200">
              <div class='table-responsive'>
                  <table class='table'>
                      <tr><th class='col-xl-6'>Top Organic Keywords</th><th class='col-xl-6'>Top Paid Keywords</th></tr>
                      <tr><td><?php echo @$similar_web['top_organic_keyword'][0]; ?></td><td><?php echo @$similar_web['top_paid_keyword'][0]; ?></td></tr>
                      <tr><td><?php echo @$similar_web['top_organic_keyword'][1]; ?></td><td><?php echo @$similar_web['top_paid_keyword'][1]; ?></td></tr>
                      <tr><td><?php echo @$similar_web['top_organic_keyword'][2]; ?></td><td><?php echo @$similar_web['top_paid_keyword'][2]; ?></td></tr>
                      <tr><td><?php echo @$similar_web['top_organic_keyword'][3]; ?></td><td><?php echo @$similar_web['top_paid_keyword'][3]; ?></td></tr>
                      <tr><td><?php echo @$similar_web['top_organic_keyword'][4]; ?></td><td><?php echo @$similar_web['top_paid_keyword'][4]; ?></td></tr>
                  </table>
              </div>
             </div>
            </div>
          </div>
        </div>
        </div>
        <div class="col-xl-12 mb-30">
         <div class="card card-statistics">
           <div class="card-body ">
             <h5 class="card-title">Backlink Maker </h5>
              <!-- action group -->
              <div class="btn-group info-drop">
                <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#"><i class="text-success ti-reload"></i> Refresh</a>
                </div>
              </div>
             <div class="scrollbar  max-h-350">
              <ul class="list-unstyled to-do">
                
              </ul>
             </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 mb-30 text-left">
         <div class="card card-statistics h-300">
           <div class="card-body ">
             <h5 class="card-title">cURL Response </h5>
             <?php
             
$curl_info = json_decode($row['curl_info']);

             ?>
              <!-- action group -->
              <div class="btn-group info-drop">
                <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#"><i class="text-success ti-reload"></i> Refresh</a>
                </div>
              </div>
             <div class="">
              <div class="table-responsive">
                <table class='table'>
<?php
foreach ($curl_info as $key => $value) {
    if ($key == 'certinfo' || $value == '0' || $value == '-1' || $value == '')
        continue;
    $key = ucwords(str_replace('_', ' ', $key));
    if (substr($key, -4) == 'Size') {
        $value .= ' Bytes';
    }
    if (substr($key, -4) == 'Time') {
        $value .= ' seconds';
    }
    if (substr($key, 0, 10) == 'Namelookup') {
        $key = 'Name Lookup Time';
    }
    if (substr($key, 0, 11) == 'Pretransfer') {
        $key = 'Pre Transfer Time';
    }
    if (substr($key, 0, 13) == 'Starttransfer') {
        $key = 'Start Transfer Time';
    }
    if ($key == 'Size Download') {
        $key = 'Download Size';
        $value = round(($value / 1024), 1) . ' Kb';
    }
    if ($key == 'Speed Download') {
        $key = 'Download Speed';
        $value = round(($value / 1024), 1) . ' Kb/s';
    }
    if ($key == 'Download Content Length') {
        continue;
    }
    ?>
        <tr style='text-align: left;'><td style='color: black;'><?php echo '<i class="fa fa-icon"></i>  <b>' . ucwords($key) . ' :  </b>' . $value; ?></td></tr>
        <?php } ?>
</table>
              </div>
             </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 mb-30 text-left">
         <div class="card card-statistics h-300">
           <div class="card-body ">
             <h5 class="card-title">Server Status Check </h5>
             <?php
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.' . $domain);		
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,3); 
		curl_setopt($ch, CURLOPT_TIMEOUT, 3); //timeout in seconds
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch, CURLOPT_ENCODING,'gzip');
		//curl_setopt($ch, CURLOPT_NOBODY, true);
		curl_setopt($ch, CURLOPT_HEADER,true);
		curl_setopt($ch, CURLOPT_MAX_RECV_SPEED_LARGE,100000);
		curl_exec($ch);
		$res0 = curl_getinfo($ch);
		curl_close($ch);
             
             ?>
              <!-- action group -->
              <div class="btn-group info-drop">
                <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#"><i class="text-success ti-reload"></i> Refresh</a>
                </div>
              </div>
             <div class="">
                 <div class='table-responsive'>
              <table class='table'>
                    <?php foreach($res0 as $key => $value) {
                    if($key == 'certinfo' || $value == '0' || $value == '-1' || $value == '') continue;
                    $key = str_replace('_',' ',$key);
                    if(substr($key,-4) == 'size') {
                        $value .= ' Bytes';
                    }
                    if(substr($key,-4) == 'time') {
                        $value .= ' seconds';
                    }
                    if(substr($key,0,10) == 'namelookup') {
                        $key = 'Name Lookup Time';
                    }
                    if(substr($key,0,11) == 'pretransfer') {
                        $key = 'Pre Transfer Time';
                    }
                    if(substr($key,0,13) == 'starttransfer') {
                        $key = 'Start Transfer Time';
                    }
                    if($key == 'size download') {
                        $key = 'Download Size';
                        $value = round(($value / 1024),1) . ' Kb';
                    }
                    if($key == 'speed download') {
                        $key = 'Download Speed';
                        $value = round(($value / 1024),1) . ' Kb/s';
                    }
                    if($key == 'download content length') {
                        continue;
                    }
                    ?>
                    <tr style='text-align: left;'><td style='color: black;'><?php echo '<i class="fa fa-icon"></i>  <b>' . ucwords($key) . ' :  </b>' . $value; ?></td></tr>
                    <?php } ?>
            </table>
            </div>
             </div>
            </div>
          </div>
        </div>
        <div class="col-xl-12 mb-30">     
        <div class="card card-statistics h-200">
          <div class="card-body">
           <div class="d-block d-md-flex justify-content-between">
              <div class="d-block">
                <h5 class="card-title pb-0 border-0">Heading Tags</h5>
                <?php
                
    $my_url0 = "https://$domain";
    $outData0 = curlGET($my_url0);
    $tagname1 = "h1";
    $tagname2 = "h2";
    $tagname3 = "h3";
    $tagname4 = "h4";
    $tagname5 = "h5";
    $tagname6 = "h6";
    
    $h1 = getTextBetweenTags($outData0, $tagname1);
    $h2 = getTextBetweenTags($outData0, $tagname2);
    $h3 = getTextBetweenTags($outData0, $tagname3);
    $h4 = getTextBetweenTags($outData0, $tagname4);
    $h5 = getTextBetweenTags($outData0, $tagname5);
    $h6 = getTextBetweenTags($outData0, $tagname6);
                
    $c1 = ($row['h1']);
    $c2 = ($row['h2']);
    $c3 = ($row['h3']);
    $c4 = ($row['h4']);
    $c5 = ($row['h5']);
    $c6 = ($row['h6']);
    
                ?>
              </div>
             </div>
             <div class="table-responsive mt-15">
              <table class="table table-bordered center-aligned-table mb-20">
                <tbody>
                   <tr>
                       <td class='col-xl-2'>H1<?php echo "($c1)"; ?></td>
                       <td><?php foreach($h1 as $head1) { echo "  <span class='badge badge-success text-light'> $head1 </span>  "; } ?></td>
                   </tr>
                   <tr>
                       <td class='col-xl-2'>H2<?php echo "($c2)"; ?></td>
                       <td><?php foreach($h2 as $head2) { echo "  <span class='badge badge-success text-light'> $head2 </span>  "; } ?></td>
                   </tr>
                   <tr>
                       <td class='col-xl-2'>H3<?php echo "($c3)"; ?></td>
                       <td><?php foreach($h3 as $head3) { echo "  <span class='badge badge-success text-light'> $head3 </span>  "; } ?></td>
                   </tr>
                   <tr>
                       <td class='col-xl-2'>H4<?php echo "($c4)"; ?></td>
                       <td><?php foreach($h4 as $head4) { echo "  <span class='badge badge-success text-light'> $head4 </span>  "; } ?></td>
                   </tr>
                   <tr>
                       <td class='col-xl-2'>H5<?php echo "($c5)"; ?></td>
                       <td><?php foreach($h5 as $head5) { echo "  <span class='badge badge-success text-light'> $head5 </span>  "; } ?></td>
                   </tr>
                   <tr>
                       <td class='col-xl-2'>H6<?php echo "($c6)"; ?></td>
                       <td><?php foreach($h6 as $head6) { echo "  <span class='badge badge-success text-light'> $head6 </span>  "; } ?></td>
                   </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>   
      </div>
      <div class="col-xl-12 mb-30">
         <div class="card card-statistics h-300">
           <div class="card-body ">
             <h5 class="card-title"> Traffic & Income Estimation </h5>
             <?php
             
$unique_monthly = round($row['unique_daily'] * 28);
$unique_yearly = round($row['unique_daily'] * 324);
$pageview_monthly = round(($row['unique_daily'] * 1.85) * 28.5);
$pageview_yearly = round($save['pagesViewsMonthly'] * 11.789473684);
$income_monthly = round($row['income_daily'] * 25);
$income_yearly = round($row['income_daily'] * 264);
             ?>
              <!-- action group -->
              <div class="btn-group info-drop">
                <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#"><i class="text-success ti-reload"></i> Refresh</a>
                </div>
              </div>
              <table class='table table-bordered' style='text-align: center;'>
                <tr class='text-success col-sm-3'>
                    <th><i class='fas fa-ruler-combined text-dark'></i></th>
                    <th>Unique Visits</th>
                    <th>Page Views</th>
                    <th>Income</th>
                </tr>
                <tr>
                    <td class='text-primary'> Daily </td>
            <td><?php echo number_format($row['unique_daily']); ?></td>
            <td><?php echo number_format($row['pageview_daily']); ?></td>
            <td><?php echo '$ ' . number_format($row['income_daily']); ?></td>
            </tr>
            <tr>
                <td class='text-primary'> Monthly </td>
            <td><?php echo number_format($unique_monthly); ?></td>
            <td><?php echo number_format($pageview_monthly); ?></td>
            <td><?php echo '$ ' . number_format($income_monthly); ?></td>
            </tr>
            <tr>
                <td class='text-primary'> Yearly </td>
            <td><?php echo number_format($unique_yearly); ?></td>
            <td><?php echo number_format($pageview_yearly); ?></td>
            <td><?php echo '$ ' . number_format($income_yearly); ?></td>
            </tr>

            </table>
            </div>
          </div>
        </div>
        <div class='col-xl-12 mb-30'>
    <table class='table'><tr>
<td class='col-lg-4'><div><table class='table table-bordered' style='text-align:center;'>
        <tr><th style='text-align:center;'>Desktop Screenshot</th></tr>
        <tr><td><img src='data:image/jpeg;base64,<?php echo $row['screenshot_d']; ?>' alt='Desktop Screenshot' class='img-fluid' style='border: 4px solid black;'></td></tr>
        <tr><th style='text-align:center;'>Website Score</th></tr>
        <tr><td><span class="round-chart" data-percent="<?php echo $row['score']; ?>" data-width="20" data-color="#84ba3f"> 
                    <span class="percent"></span>
                  </span></td></tr>
        </table></div></td>
        <td class='col-lg-5'><div>
            <table class='table table-bordered' style='text-align: center;'>
                <tr>
                    <td colspan='3'><h2> Website Status <br /><br /></h2></td>
                </tr>
                <tr>
            <td><h3 style='text-align: center;' class='text-success'><?php echo '<b>Success =>  </b>' . $row['success']; ?><br /><small>Success % in Verification Steps</small></h3></td></tr>
            <tr><td><h3 style='text-align: center;' class='text-warning'><?php echo '<b>Warnings =>  </b>' . $row['warnings']; ?><br /><small>Warnings % in Verification Steps</small></h3></td></tr>
            <tr><td><h3 style='text-align: center;' class='text-danger'><?php echo '<b>Errors =>  </b>' . $row['errors']; ?><br /><small>Errors % in Verification Steps</small></h3></td>
            </tr>
            </table>
        </div></td>
<td class='col-lg-3'><div><table class='table table-bordered' style='text-align:center;'>
        <tr><th style='text-align:center;'>Mobile Screenshot</th></tr>
        <tr><td><img src='data:image/jpeg;base64,<?php echo $row['screenshot_m']; ?>' alt='Mobile Screenshot' class='img-fluid' style='width:70%;height:80%;border: 4px solid black;'></td></tr>
        </table></div></td>
</tr></table>
</div>
        


<?php
//if ($themeOptions['general']['sidebar'] == 'right')
//    require_once(THEME_DIR . "sidebar.php");
?>       		
    </div>
</div> <br />
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

<!-- jvectormap -->
<script src="js/jvectormap/jquery-jvectormap-2.0.3.min.js"></script> 
<script src="js/jvectormap/jquery-jvectormap-world-mill-en.js"></script> 
<script src="js/jvectormap/jquery-jvectormap-init.js"></script> 

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