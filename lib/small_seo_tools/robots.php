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