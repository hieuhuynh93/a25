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
                                    <h4 class="mb-0"> Robots.txt Generator </h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                                        <li class="breadcrumb-item"><a href="index.html" class="default-color">Home</a></li>
                                        <li class="breadcrumb-item"><a href="seo_tools.php" class="default-color">SEO Tools</a></li>
                                        <li class="breadcrumb-item active">Robots.txt Generator</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- main body -->
                        
<div class="row">   
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

<form style='display: block;'>
  <div>
	<table id="roboTable" class="nostyle">
      <tbody><tr>
      <td><b><?php echo 'Default - All Robots are'; ?>:</b></td>
      <td>
		<select size="1" name="allow" id="allow" class="form-control" required autofocus >
<option value=" " selected=""><?php echo 'Allowed'; ?></option>
<option value=" /"><?php echo 'Refused'; ?></option> </select></td>
       <td>&nbsp;</td>
      </tr>
      
      <tr><td>&nbsp;</td><td>&nbsp;</td> <td>&nbsp;</td></tr>
      
      <tr>
      <td><b><?php echo 'Crawl-Delay'; ?>:</b></td>
      <td colspan="2">
		<select size="1" name="delay" id="delay" class="form-control" required autofocus>
			<option value="" selected=""><?php echo 'Default - No Delay'; ?></option>
			<option value="5">5 Seconds</option>
			<option value="10">10 Seconds</option>
			<option value="20">20 Seconds</option>
			<option value="60">60 seconds</option>
			<option value="120">120 Seconds</option> </select></td>
    	</tr>
        
      <tr><td>&nbsp;</td><td>&nbsp;</td> <td>&nbsp;</td></tr>
      
      <tr>
      <td><strong><?php echo 'SiteMap'; ?>: <small><?php echo '(leave blank if you don\'t have)'; ?>&nbsp;</small></strong></td>
      <td colspan="2">
		<input type="text" value="" placeholder="http://www.example.com/sitemap.xml" name="sitemap" class="form-control" required autofocus /></td>
    	</tr>
      <tr>
      <td>&nbsp;</td>
      <td>
        &nbsp;</td>
      <td>
		&nbsp;</td>
      </tr><tr>
      <td><b><?php echo 'Search Robots'; ?>:</b></td>
      <td>
Google</td>
      <td>
		<select size="1" name="google" id="google" class="form-control" required autofocus>
<option value="" selected=""><?php echo 'Same As Default'; ?></option>
<option value=" "><?php echo 'Allowed'; ?></option>
<option value=" /"><?php echo 'Refused'; ?></option>
</select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
		Google Image</td>
      <td>
		<select size="1" name="gimage" id="gimage" class="form-control" required autofocus>
<option value="" selected=""><?php echo 'Same As Default'; ?></option>
<option value=" "><?php echo 'Allowed'; ?></option>
<option value=" /"><?php echo 'Refused'; ?></option>
</select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
		Google Mobile</td>
      <td>
		<select size="1" name="gmobile" id="gmobile" class="form-control" required autofocus>
<option value="" selected=""><?php echo 'Same As Default'; ?></option>
<option value=" "><?php echo 'Allowed'; ?></option>
<option value=" /"><?php echo 'Refused'; ?></option>
</select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
		MSN Search</td>
      <td>
		<select size="1" name="msn" id="msn" class="form-control" required autofocus>
<option value="" selected=""><?php echo 'Same As Default'; ?></option>
<option value=" "><?php echo 'Allowed'; ?></option>
<option value=" /"><?php echo 'Refused'; ?></option>
</select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
		Yahoo</td>
      <td>
		<select size="1" name="yahoo" id="yahoo" class="form-control" required autofocus>
<option value="" selected=""><?php echo 'Same As Default'; ?></option>
<option value=" "><?php echo 'Allowed'; ?></option>
<option value=" /"><?php echo 'Refused'; ?></option>
</select></td>
    </tr>
            <tr>
      <td>&nbsp;</td>
      <td>
		Yahoo MM</td>
      <td>
		<select size="1" name="ymm" id="ymm" class="form-control" required autofocus>
<option value="" selected=""><?php echo 'Same As Default'; ?></option>
<option value=" "><?php echo 'Allowed'; ?></option>
<option value=" /"><?php echo 'Refused'; ?></option>
</select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
		Yahoo Blogs</td>
      <td>
		<select size="1" name="blogs" id="blogs" class="form-control" required autofocus>
<option value="" selected=""><?php echo 'Same As Default'; ?></option>
<option value=" "><?php echo 'Allowed'; ?></option>
<option value=" /"><?php echo 'Refused'; ?></option>
</select></td>
    </tr>
    
    <tr>
      <td>&nbsp;</td>
      <td>
		Ask/Teoma</td>
      <td>
		<select size="1" name="teoma" id="teoma" class="form-control" required autofocus>
<option value="" selected=""><?php echo 'Same As Default'; ?></option>
<option value=" "><?php echo 'Allowed'; ?></option>
<option value=" /"><?php echo 'Refused'; ?></option>
</select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
		GigaBlast</td>
      <td>
		<select size="1" name="gigablast" id="gigablast" class="form-control" required autofocus>
<option value="" selected=""><?php echo 'Same As Default'; ?></option>
<option value=" "><?php echo 'Allowed'; ?></option>
<option value=" /"><?php echo 'Refused'; ?></option>
</select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
		DMOZ Checker</td>
      <td>
		<select size="1" name="dmoz" id="dmoz" class="form-control" required autofocus>
<option value="" selected=""><?php echo 'Same As Default'; ?></option>
<option value=" "><?php echo 'Allowed'; ?></option>
<option value=" /"><?php echo 'Refused'; ?></option>
</select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
		Nutch</td>
      <td>
		<select size="1" name="nutch" id="nutch" class="form-control" required autofocus>
<option value="" selected=""><?php echo 'Same As Default'; ?></option>
<option value=" "><?php echo 'Allowed'; ?></option>
<option value=" /"><?php echo 'Refused'; ?></option>
</select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
		Alexa/Wayback</td>
      <td>
		<select size="1" name="alexa" id="alexa" class="form-control" required autofocus>
<option value="" selected=""><?php echo 'Same As Default'; ?></option>
<option value=" "><?php echo 'Allowed'; ?></option>
<option value=" /"><?php echo 'Refused'; ?></option>
</select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
		Baidu</td>
      <td>
		<select size="1" name="baidu" id="baidu" class="form-control" required autofocus>
<option value="" selected=""><?php echo 'Same As Default'; ?></option>
<option value=" "><?php echo 'Allowed'; ?></option>
<option value=" /"><?php echo 'Refused'; ?></option>
</select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
		Naver</td>
      <td>
		<select size="1" name="naver" id="naver" class="form-control" required autofocus>
<option value="" selected=""><?php echo 'Same As Default'; ?></option>
<option value=" "><?php echo 'Allowed'; ?></option>
<option value=" /"><?php echo 'Refused'; ?></option>
</select></td>
    </tr>


    
    <tr>
      <td>&nbsp;</td>
      <td>
		MSN PicSearch</td>
      <td>
		<select size="1" name="psbot" id="psbot" class="form-control" required autofocus>
<option value="" selected=""><?php echo 'Same As Default'; ?></option>
<option value=" "><?php echo 'Allowed'; ?></option>
<option value=" /"><?php echo 'Refused'; ?></option>
</select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">
		&nbsp;</td>
    </tr>
    <tr>
      <td><b><?php echo 'Restricted Directories'; ?>:</b></td>
      <td colspan="2">
		<i><?php echo ' The path is relative to root and must contain a trailing slash '; ?>"/"</i></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">
		<input type="text" value="/cgi-bin/" size="70" name="dir1" class="form-control" required autofocus /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">
		<input type="text" size="70" name="dir2" class="form-control" required autofocus /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">
		<input type="text" size="70" name="dir3" class="form-control" required autofocus /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">
		<input type="text" size="70" name="dir4" class="form-control" required autofocus /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">
		<input type="text" size="70" name="dir5" class="form-control" required autofocus /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">
		<input type="text" size="70" name="dir6" class="form-control" required autofocus /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">
		&nbsp;</td>
    </tr>
    	</tbody></table>
  </div>
    <p>
	<input type="button" class="btn btn-success" onclick="console.log(genRobots(this.form,msg1,msg2));" value="<?php echo 'Create Robots.txt'; ?>" /> 
	<input type="button" class="btn btn-danger" onclick="genRobots(this.form,msg1,msg2,true)" value="Create and Save as Robots.txt" /> 
    <input type="reset" class="btn btn-primary" value="Clear" /> 
    <br /><br />
    <textarea class="form-control" required autofocus readonly="" rows="10" id="robolist" name="robolist"></textarea>
    </p>
	<p><?php echo 'Now, Create \'robots.txt\' file at your root directory. Copy above text and paste into the text file.'; ?></p>

           </form>
<br />

            <div class="xd_top_box">
            <?php //echo $ads_720x90; ?>
            </div>

<!--h2 id="sec1" class="about_tool"><?php //echo $lang['11'].' '.$data['tool_name']; ?></h2>
<p>
            <?php //echo $data['about_tool']; ?>
</p--> 
<?php //} //} //}  ?>

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
<script>

var msg1 = "<?php echo 'Create Robots.txt file ?'; ?>";
var msg2 = "# <?php echo 'robots.txt generated by Aakash \n'; ?>\n";

function genRobots(form,msg1,msg2,saveAs) {
  if (saveAs === undefined) {
    saveAs = false;
  }
  if (confirm(msg1)){
  var roboListData =form.robolist;
    roboListData.value = msg2;
    if (form.google.value != "") {
      roboListData.value +="User-agent: Googlebot\nDisallow:" +
      form.google.value + "\n";
    }
    if (form.gimage.value != "") {
      roboListData.value +="User-agent: googlebot-image\nDisallow:" +
      form.gimage.value + "\n";
    }
      if (form.gmobile.value != "") {
      roboListData.value +="User-agent: googlebot-mobile\nDisallow:" +
      form.gmobile.value + "\n";
    }    
    if (form.msn.value != "") {
      roboListData.value +="User-agent: MSNBot\nDisallow:" +
      form.msn.value + "\n";
    }     
    if (form.yahoo.value != "") {
      roboListData.value +="User-agent: Slurp\nDisallow:" +
      form.yahoo.value + "\n";
    }     
    if (form.teoma.value != "") {
      roboListData.value +="User-agent: Teoma\nDisallow:" +
      form.teoma.value + "\n";
	}          
    if (form.gigablast.value != "") {
      roboListData.value +="User-agent: Gigabot\nDisallow:" +
      form.gigablast.value + "\n";
    }          
     if (form.dmoz.value != "") {
      roboListData.value +="User-agent: Robozilla\nDisallow:" +
      form.dmoz.value + "\n";
    }
     if (form.nutch.value != "") {
      roboListData.value +="User-agent: Nutch\nDisallow:" +
      form.nutch.value + "\n";
    }
     if (form.alexa.value != "") {
      roboListData.value +="User-agent: ia_archiver\nDisallow:" +
      form.alexa.value + "\n";
    }
     if (form.baidu.value != "") {
      roboListData.value +="User-agent: baiduspider\nDisallow:" +
      form.baidu.value + "\n";
          }
     if (form.naver.value != "") {
      roboListData.value +="User-agent: naverbot\nDisallow:" +
      form.naver.value + "\n";
      roboListData.value +="User-agent: yeti\nDisallow:" +
      form.naver.value + "\n";
    }
     if (form.ymm.value != "") {
      roboListData.value +="User-agent: yahoo-mmcrawler\nDisallow:" +
      form.ymm.value + "\n";
    }
     if (form.psbot.value != "") {
      roboListData.value +="User-agent: psbot\nDisallow:" +
      form.psbot.value + "\n";
    }
     if (form.blogs.value != "") {
      roboListData.value +="User-agent: yahoo-blogs/v3.9\nDisallow:" +
      form.blogs.value + "\n";
    } 
    if (form.allow.value != "") {
      roboListData.value +="User-agent: *\nDisallow:" +
      form.allow.value + "\n";
    }
     if (form.delay.value != "") {
      roboListData.value +="Crawl-delay: " +
      form.delay.value + "\n";
	}
    if (form.dir1.value != "") {
      roboListData.value +="Disallow: " +
      form.dir1.value + "\n";
    }
    if (form.dir2.value != "") {
      roboListData.value +="Disallow: " +
      form.dir2.value + "\n";
    }    
    if (form.dir3.value != "") {
      roboListData.value +="Disallow: " +
      form.dir3.value + "\n";
    }
    if (form.dir4.value != "") {
      roboListData.value +="Disallow: " +
      form.dir4.value + "\n";
    }
    if (form.dir5.value != "") {
      roboListData.value +="Disallow: " +
      form.dir5.value + "";
    }  
    if (form.dir6.value != "") {
      roboListData.value +="Disallow: " +
      form.dir6.value + "\n";
    } 
    if (form.sitemap.value != "") {
      roboListData.value +="Sitemap: " +
      form.sitemap.value + "\n";
	}
    if(saveAs){
        var roStr = document.getElementById("robolist").value.replace(/\n/g, "\r\n");
        saveAsFile(roStr);
    }
}
}

function saveAsFile(str) {      
    var textToWrite = str;
    var textFileAsBlob = new Blob([textToWrite], {type:'text/plain'});
    var downloadLink = document.createElement("a");
    downloadLink.download = 'robots.txt';
    downloadLink.innerHTML = "My Link";
    window.URL = window.URL || window.webkitURL;
    downloadLink.href = window.URL.createObjectURL(textFileAsBlob);
    downloadLink.onclick = destroyClickedElement;
    downloadLink.style.display = "none";
    document.body.appendChild(downloadLink);
    downloadLink.click();
}

function destroyClickedElement(event){
    document.body.removeChild(event.target);
}
</script>

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