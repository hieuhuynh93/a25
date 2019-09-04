<!DOCTYPE html>
<?php include_once 'dbconn.php';include 'functions/functions.php'; ?>
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
                                    <h4 class="mb-0"> Plagiarism Checker </h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                                        <li class="breadcrumb-item"><a href="index.html" class="default-color">Home</a></li>
                                        <li class="breadcrumb-item"><a href="seo_tools.php" class="default-color">SEO Tools</a></li>
                                        <li class="breadcrumb-item active">Plagiarism Checker</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- main body -->
                        <div class="row">   
<script>
    var wordsLimit = '1000';
    var minLimit = '30';
    var apiType = '1';

//Plagiarism Checker

    $("#mycontent").focus(function () {
        countMyWords()
    });
    $("#mycontent").keypress(function () {
        countMyWords()
    });
    $("#mycontent").blur(function () {
        countMyWords();
    });
    $("#mycontent").click(function () {
        countMyWords()
    });

    function phraseMe(str, myData) {
        var charData = str.charAt(myData);
        var strData = myData;
        var count = 0;
        while (strData >= 0 && count < minLimit) {
            if (str.charAt(strData) == ' ' && count > 12)
                break;
            strData--;
            charData = str.charAt(strData) + charData;
            count++;
        }

        var strData = myData;
        var count = 0;
        while (strData < str.length && count < 60) {
            if (str.charAt(strData) == ' ' && count > 40)
                break;
            strData++;
            charData += str.charAt(strData);
            count++
        }
        return charData;
    }

    function parseArticle(content) {
        var _return = new Array();
        var arrParagrap = content.split('\n');
        for (i = 0; i < arrParagrap.length; i++)
        {
            var currentString = arrParagrap[i];
            if ((currentString.indexOf('.') == -1 && currentString.indexOf(',') == -1) || (currentString.indexOf('.') == currentString.length - 1 || currentString.indexOf(',') == currentString.length - 1))
            {
                if (currentString.length >= 40)
                {
                    var st = '';
                    var count = 0;
                    while (count < 60)
                    {
                        if (currentString.charAt(count) == ' ' && count > 45)
                            break;
                        st += currentString.charAt(count);
                        count++
                    }
                    _return.push(st)
                }
            } else
            {
                var currentPosition = 0;
                for (j = 0; j < currentString.length; j++)
                {
                    if (currentString.charAt(j) == '.' || currentString.charAt(j) == ',' || currentString.charAt(j) == '?')
                    {
                        if (j < currentString.length - 5 && j - minLimit > currentPosition) {
                            currentPosition = j;
                            _return.push(phraseMe(currentString, j))
                        }
                    }
                }
            }
        }
        return _return;
    }

    var arrSegment = new Array();
    var currentCheck = 0;
    var checkOK = 0;
    var authCode, myContent, myTextData;

    function startTask() {
        //authCode = auth;
        var countMe = 0;
        jQuery("#mainbox").fadeOut();
        jQuery(".percentimg").css({"display": "block"});
        jQuery(".percentimg").show();
        jQuery(".percentimg").fadeIn();
        jQuery("#resultList").append('<thead><th>#</th><th>' + stringStr + '</th><th>' + uniqueStr + '</th></thead><tbody></tbody>');
        arrSegment = parseArticle(myContent);
        noOfLines = arrSegment.length;
        checkMe(noOfLines, arrSegment, countMe);
    }

    jQuery(document).ready(function () {

        myTextData = jQuery("#mycontent").val();
        myTextData = jQuery.trim(myTextData);

        if (myTextData == "")
            jQuery("#mycontent").val('Enter Some Text');

        jQuery("#mycontent").focus(function () {

            if (jQuery(this).val() == 'Enter Some Text') {
                jQuery(this).val('');
            }
        });
        jQuery("#mycontent").blur(function () {
            if (jQuery(this).val() == '')
                jQuery(this).val('Enter Some Text'); countMyWords();
        });

        jQuery("#checkButton").click(function () {
            myContent = jQuery.trim(jQuery("#mycontent").val());
            startTask();

            if (jQuery("#mycontent").val() == placeHolderText) {
                sweetAlert(oopsStr, inputEm, "error");
                return false;
            } else if (myContent.length < minLimit) {
                sweetAlert(oopsStr, articleLm.replace('[limit]', minLimit), "error");
                return false;
            } else if (countMyWords() > wordsLimit) {
                sweetAlert(oopsStr, wordLm.replace('[limit]', minLimit), "error");
                return false;
            } else {
                validateCaptcha();
            }
        })
    });

    function unique2Color(percent) {
        if (percent < 100)
            return'#e74c3c';
        else
            return'#2ecc71';
    }

    function checkMe(noOfLines, arrSegment, countMe) {
        jQuery.post(axPath, {plagiarism: '1', type: apiType, data: arrSegment[countMe], authcode: authCode}, function (data) {
            var loopCount = countMe + 1;
            if (data == '2')
            {
                checkOK++;
                jQuery("#resultList").append('<tr><td>' + loopCount + '</td><td class="string">' + arrSegment[countMe] + '</td><td><span class="badge bg-green"> ' + goodStr + ' </span></td></tr>');
            } else
            {
                jQuery("#resultList").append('<tr><td>' + loopCount + '</td><td class="string">' + arrSegment[countMe] + '</td><td><span class="badge bg-red"> ' + alreadyStr + ' </span></td></tr>');
            }
            var checkPoint = noOfLines - 1;
            var percentUnique = Math.round((checkOK / arrSegment.length) * 100);
            if (percentUnique > 100) {
                percentUnique = 100;
            }
            var colorUnique = unique2Color(percentUnique);
            jQuery("#percent").html('<b style="color:' + colorUnique + '">' + percentUnique + '% ' + unqStr + ' </b>');
            if (countMe == checkPoint)
            {
                jQuery(".percentimg").fadeOut();
                jQuery(".percentimg").css({"display": "none"});
                jQuery(".percentimg").hide();
                jQuery('#tryNew').removeClass('hide');
                jQuery("#tryNew").fadeIn();
            } else
            {
                countMe++;
                checkMe(noOfLines, arrSegment, countMe);
            }
        });

    }

    function countMyWords() {
        var wordsCount = 0;
        var dataContent = $("#mycontent").val();
        dataContent = $.trim(dataContent);
        dataContent = dataContent.replace(/\s+/g, " ");dataContent = dataContent.replace(/\n /, " ");
        if (dataContent != "")
        {
            wordsCount = dataContent.split(' ').length;
        }
        $("#words-count").html(wordsCount);
        return wordsCount;
    }

    $(document).ready(function () {
        $("#max_wordsLimit").html(wordsLimit);
        countMyWords();
    });
</script>
<div class="container main-container">
    <div class="row">
        <?php
        
        
        
//        if ($themeOptions['general']['sidebar'] == 'left')
//            require_once(THEME_DIR . "sidebar.php");
        ?>
        <div class="col-md-10 main-index">

            <div class="xd_top_box">
                <?php //echo $ads_720x90; ?>
            </div>

            <h2 id="title"><?php //echo $data['tool_name']; ?></h2>

            <?php //if ($pointOut != 'output') { ?>

                <p><?php //echo $lang['56']; ?>
                </p>

                <div id="mainbox">
                    <script type="text/javascript" src="//www.prepostseo.com/widget.js?"></script>
                    <!--textarea id="mycontent" rows="20" class="form-control" placeholder='Enter text Here'></textarea> <br />
                    <?php //if ($toolCap) echo $captchaCode; ?>
                    <div> 
                        <a class="btn btn-success" style="cursor:pointer;color:white;" id="checkButton">Submit Text<?php //echo $lang['57']; ?></a>
                    </div>
                    <br />  

                    <div class="tbox">
                        <div class="max-text"><?php //echo $lang['59']; ?>Words Limit <span id="max_words_limit"><?php echo '500'; ?></span>
                        <?php //echo $lang['60']; ?>.</div>
                        <div class="total-word"><?php //echo $lang['58']; ?>Words Count: <span id="words-count">0</span></div>
                    </div-->
                </div>

                <div class="percentimg">
                    <img src="<?php //themeLink('img/load.gif'); ?>" />
                    <br />
                    <?php //echo $lang['AS10']; ?>
                    <br />
                </div>

                <div class="percentbox" id="percent">

                </div>

                <div>
                    <table class="table table-bordered" id="resultList">

                    </table>
                </div>



            <?php //} ?>

            <br />

            <div class="xd_top_box">
                <?php //echo $ads_720x90; ?>
            </div>

            <h2 id="sec1" class="about_tool"><?php //echo $lang['11'] . ' ' . $data['tool_name']; ?></h2>
            <p>
                <?php //echo $data['about_tool']; ?>
            </p> <br />
        </div>              

        <?php
//        if ($themeOptions['general']['sidebar'] == 'right')
//            require_once(THEME_DIR . "sidebar.php");
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