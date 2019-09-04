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
                                    <h4 class="mb-0"> Word Counter </h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                                        <li class="breadcrumb-item"><a href="index.html" class="default-color">Home</a></li>
                                        <li class="breadcrumb-item"><a href="seo_tools.php" class="default-color">SEO Tools</a></li>
                                        <li class="breadcrumb-item active">Word Counter</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- main body -->
                        <div class="row">   
<script>

//Word Counter

    function countData() {

        var myData = $.trim(document.getElementById("data").value);
        var strTime = 800;

        if (myData == "") {
            sweetAlert(oopsStr, errMsg, "error");
            return false;
        }

        myData = myData.replace(/\s+/g, " ");
        myData = myData.replace(/\n /, " ");

        if (myData != "") {
            document.getElementById("wordCount").innerHTML = myData.split(' ').length;
        }
        document.getElementById("charCount").innerHTML = myData.length;

        $("#result").show();
        var pos = $('#result').offset();
        $('body,html').animate({scrollTop: pos.top}, strTime);

    }

</script>

<div class="container main-container">
    <div class="row">
        <?php
//            if($themeOptions['general']['sidebar'] == 'left')
//                require_once(THEME_DIR."sidebar.php");
        ?>
        <div class="col-md-10 main-index">

            <div class="xd_top_box">
                <?php //echo $ads_720x90; ?>
            </div>

            <h2 id="title"><?php //echo $data['tool_name'];   ?></h2>

            <?php //if ($pointOut != 'output') { ?>

            <p><?php //echo $lang['70'];   ?>
            </p>

            <textarea id="data" rows="20" class="form-control" placeholder='Enter text here to count Words'></textarea> <br /> 
            <div>
                <button onclick="countData();" value="submit" name="submit" class="btn btn-info" id="countButton">Count<?php //echo $lang['71'];   ?></button>
            </div>

            <br /> 

            <div class="result" id="result">

                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title lighter smaller">
                            <?php //echo $lang['64']; ?>
                        </h4>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main">
                            <div id="resultBox">
                                <div id="countBox" style="font-size: 19px;"> <?php echo 'Word Count:'; //echo $lang['72'];   ?>
                                    <span id="wordCount" style="font-weight: bold;">0</span> | <?php echo "Character Count:"; //echo $lang['73'];   ?> <span id="charCount" style="font-weight: bold;">0</span> </div>
                            </div>
                        </div><!-- /.widget-main -->
                    </div><!-- /.widget-body -->
                </div>
                <br />                       

            </div>       
            <?php
            //} 
            ?>

            <br />

            <div class="xd_top_box">
                <?php //echo $ads_720x90; ?>
            </div>

            <h2 id="sec1" class="about_tool"><?php //echo $lang['11'].' '.$data['tool_name'];   ?></h2>
            <p>
                <?php //echo $data['about_tool']; ?>
            </p> <br />
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