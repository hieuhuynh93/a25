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
                                    <h4 class="mb-0"> Webpage Screen Resolution Simulator </h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                                        <li class="breadcrumb-item"><a href="index.html" class="default-color">Home</a></li>
                                        <li class="breadcrumb-item"><a href="seo_tools.php" class="default-color">SEO Tools</a></li>
                                        <li class="breadcrumb-item active">Webpage Screen Resolution Simulator</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- main body -->
<script>

function doscreen_simulator(){
	var my_url=$("#url").val();
	var my_res=$("input[type='radio'][name='resolution']:checked").val();
    var res = my_res.split("x"); 
	var width=res[0];
	var height=res[1];
    var ssValue=width+'X'+height;
	if(my_url==""){
	    sweetAlert(oopsStr, msgDomain , "error");
	}  else{
        if (my_url.indexOf("https://") == 0){ }else if (my_url.indexOf("http://") == 0){ }else{
            my_url = "https://" + my_url;
        }  
        window.open(my_url,ssValue,'toolbar=no,status=yes,scrollbars=yes,location=yes,menubar=no,directories=yes,width='+width+',height='+height);  
	}
}

</script>
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

<?php //if ($pointOut != 'output') {  ?>

            <p><?php //echo $lang['6'];  ?>
            </p>
<form  onsubmit="doscreen_simulator(); return false">	
					<p>
						<input class="form-control" type="text" name="url" id="url" value="" placeholder='Enter URL here' autofocus required/>
						
                  <br />  <br />  <?php echo 'Select Screen Resolution'; ?>:<br /><br />
					<div class="radio-box">
                        <div class="form-group">
						<input type="radio" id="160x160"  name="resolution" value="160x160" />
						<label for="160x160">&nbsp;160x160 <?php echo 'Pixels'; ?></label>
						<div class="clear">&nbsp;</div>
						
						<input type="radio" id="320x320"  name="resolution" value="320x320"/>
						<label for="320x320">&nbsp;320x320 <?php echo 'Pixels'; ?></label>
						<div class="clear">&nbsp;</div>
						
                        <input type="radio" id="640x480"  name="resolution" value="640x480"/>
						<label for="640x480">&nbsp;640x480 <?php echo 'Pixels'; ?></label>
						<div class="clear">&nbsp;</div>
						
                        <input type="radio" id="800x600"  name="resolution" value="800x600"/>
						<label for="800x600">&nbsp;800x600 <?php echo 'Pixels'; ?></label>
						<div class="clear">&nbsp;</div>
						
                        <input type="radio" id="1024x768"  name="resolution" value="1024x768" checked="checked" />
						<label for="1024x768">&nbsp;1024x768 <?php echo 'Pixels'; ?></label>
                        <div class="clear">&nbsp;</div>
                        
                        <input type="radio" id="1366x768"  name="resolution" value="1366x768" />
						<label for="1366x768">&nbsp;1366x768 <?php echo 'Pixels'; ?></label>
                        <div class="clear">&nbsp;</div>
						
                        <input type="radio" id="1152x864"  name="resolution" value="1152x864"/>
						<label for="1152x864">&nbsp;1152x864 <?php echo 'Pixels'; ?></label>
						<div class="clear">&nbsp;</div>
						
                        <input type="radio" id="1600x1200"  name="resolution" value="1600x1200"/>
						<label for="1600x1200">&nbsp;1600x1200 <?php echo 'Pixels'; ?></label>
						<div class="clear">&nbsp;</div>	
					</div></div>
						
					</p>
					<div>
                        <button class="btn btn-sm btn-info"><?php echo 'Check'; ?></button>
					</div>
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

<?php if(isset($_POST['submit'])){ 

    $fp = fopen($my_url, 'r');
    $content = "";
    while (!feof($fp)) {
        $buffer = trim(fgets($fp, 4096));
        $content .= $buffer;
    }

    $start = '<title>';
    $end = '</title>';
    @preg_match(" / $start( . * )$end / s", $content, $match);
    $title = $match[1];
    $metatagarray = get_meta_tags($my_url);
    if(isset($metatagarray["keywords"]))
    $keywords = $metatagarray["keywords"];
    if(isset($metatagarray["description"]))
    $description = $metatagarray["description"];
    if(isset($my_url))
    echo " <div><strong>URL: </strong>$my_url</div> \n";
    if(isset($title))
    echo " <div><strong>Title: </strong>$title</div> \n";
    if(isset($description))
    echo " <div><strong>Description: </strong>$description</div>\n";
    if(isset($keywords))
    echo " <div><strong>Keywords: </strong>$keywords</div>\n";
?>
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