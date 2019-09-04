<?php include_once 'dbconn.php'; 
ini_set('max_execution_time', 1200); ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
        <!-- Favicon -->
        <link rel="shortcut icon" href="images/favicon.ico" />

        <!-- Font -->
        <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

        <!-- css -->
        <link rel="stylesheet" type="text/css" href="css/style.css" />

                    <div class="content-wrapper"><br />
                    <div class="page-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4 class="mb-0"> WebSite Test Results </h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                                        <li class="breadcrumb-item"><a href="index.html" class="default-color">Home</a></li>
                                        <li class="breadcrumb-item"><a href="seo_tools.php" class="default-color">SEO Tools</a></li>
                                        <li class="breadcrumb-item active">WebSite Test</li>
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
$domain_curl = $domain;
$technologies = getBuiltWith($domain);

if (isset($_POST['url'])){
        $my_url = 'https://' . clean_url(raino_trim($_POST['url']));
    if (filter_var($my_url, FILTER_VALIDATE_URL) === false) {
        $error = 'Error';
    } else {
        $regUserInput = $my_url;
        $myUrl = ucfirst(str_replace('www.', '', $my_url));
    }
    $stats = getStatsData2($domain, $technologies);
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

//    echo '<br/><br/><div class="alert alert-error">
  //          <strong>Alert!</strong> ' . $error . '
    //        </div><br/><br/>
      //      <div class="text-center"><a class="btn btn-info" href="' . $toolURL . '">' . $lang['12'] . '</a>
        //    </div><br/>';
} else {
    ?>

                <h4><?php //echo $lang['10'];  ?></h4>

<?php if(isset($_POST['submit'])){ ?>
<div id="meta" style='box-shadow:0 2px 2px 0 gray;padding: 10px;background-color: white;'>
        <div class='row text-center'>
            <table class='table' style='text-align: center;'>
                <tr>
                    <td colspan='3'><h1> Your Website Test Results are <br /><br /></h1></td>
                </tr>
                <tr>
            <td><h2 style='text-align: center;' class='text-success'><?php echo '<b>Success -  </b>' . $stats['success']; ?></h2></td>
            <td><h2 style='text-align: center;' class='text-warning'><?php echo '<b>Warnings -  </b>' . $stats['warning']; ?></h2></td>
            <td><h2 style='text-align: center;' class='text-danger'><?php echo '<b>Errors -  </b>' . $stats['errors']; ?></h2></td>
            </tr>
            </table>
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


            <?php
            //if($themeOptions['general']['sidebar'] == 'right')
            //require_once(THEME_DIR."sidebar.php");
            ?>    
            </div>
    </div>
</div> <br />
                        </div>
                        <br /><br />
                        <!-- footer -->
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