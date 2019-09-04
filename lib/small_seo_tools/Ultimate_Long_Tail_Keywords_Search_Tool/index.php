<?php
$keyword = $_REQUEST['keywords'];

if ($_POST) {
    $keywords = trim(strip_tags(strtolower($_POST['keywords'])));
    $keywords = str_replace(array("\n\r", "\r\n", "\n", "\r"), '<br />', $keywords);
    $keywords_array = explode("<br />", $keywords);
    header('Content-type: application/vnd.ms-excel');
    header('Content-disposition: attachment; filename="data.xls"');
    foreach ($keywords_array as $value) {
        echo utf8_decode($value) . "\n";
    }
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Cascading Style Sheets -->
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen" />
        <link rel="stylesheet" href="css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="css/custom.css" />
        <!--[if IE 7]>
        <link rel="stylesheet" href="css/font-awesome-ie7.min.css">
        <![endif]-->
        <!-- /Cascading Style Sheets -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
        <script type="text/javascript">

            var hashMapResults = {};
            var numOfKeywords = 0;
            var doWork = false;
            var keywordsToQuery = new Array();
            var keywordsToQueryIndex = 0;
            var queryflag = false;

            window.setInterval(DoJob, 750);

            function StartJob()
            {
                if (doWork == false)
                {
                    hashMapResults = {};
                    numOfKeywords = 0;
                    keywordsToQuery = new Array();
                    keywordsToQueryIndex = 0;

                    hashMapResults[""] = 1;
                    hashMapResults[" "] = 1;
                    hashMapResults["  "] = 1;

                    var ks = $('#input').val().split("\n");
                    var i = 0;
                    for (i = 0; i < ks.length; i++)
                    {
                        keywordsToQuery[keywordsToQuery.length] = ks[i];

                        var j = 0;
                        for (j = 0; j < 26; j++)
                        {
                            var chr = String.fromCharCode(97 + j);
                            var currentx = ks[i] + ' ' + chr;
                            keywordsToQuery[keywordsToQuery.length] = currentx;
                            hashMapResults[currentx] = 1;
                        }
                    }
                    //document.getElementById("input").value = ''; 
                    document.getElementById("input").value += "\r\n";

                    doWork = true;
                    $('#startjob').val('Stop Searching');
                } else
                {
                    doWork = false;
                    //alert("Stopped");
                    swal("Searching Stopped!");
                    $('#startjob').val('Start Searching');
                }
            }

            function DoJob()
            {
                if (doWork == true && queryflag == false)
                {
                    if (keywordsToQueryIndex < keywordsToQuery.length)
                    {
                        var currentKw = keywordsToQuery[keywordsToQueryIndex];
                        QueryKeyword(currentKw);
                        keywordsToQueryIndex++;
                    } else
                    {
                        if (numOfKeywords != 0)
                        {
                            alert("Done");
                            doWork = false;
                            $('#startjob').val('Start Searching');
                        } else
                        {
                            keywordsToQueryIndex = 0;
                        }
                    }
                }
            }

            function QueryKeyword(keyword)
            {
                var querykeyword = keyword;
                //var querykeyword = encodeURIComponent(keyword); 
                var queryresult = '';
                queryflag = true;

                $.ajax({
                    url: "https://suggestqueries.google.com/complete/search",
                    jsonp: "jsonp",
                    dataType: "jsonp",
                    data: {
                        q: querykeyword,
                        client: "chrome"
                    },
                    success: function (res) {
                        var retList = res[1];

                        var i = 0;
                        var sb = '';
                        for (i = 0; i < retList.length; i++)
                        {
                            var currents = CleanVal(retList[i]);
                            if (hashMapResults[currents] != 1)
                            {
                                hashMapResults[currents] = 1;
                                sb = sb + CleanVal(retList[i]) + '\r\n';
                                numOfKeywords++;

                                keywordsToQuery[keywordsToQuery.length] = currents;

                                var j = 0;
                                for (j = 0; j < 26; j++)
                                {
                                    var chr = String.fromCharCode(97 + j);
                                    var currentx = currents + ' ' + chr;
                                    keywordsToQuery[keywordsToQuery.length] = currentx;
                                    hashMapResults[currentx] = 1;
                                }
                            }
                        }
                        $("#numofkeywords").html(numOfKeywords);
                        document.getElementById("input").value += sb;
                        var textarea = document.getElementById("input");
                        textarea.scrollTop = textarea.scrollHeight;
                        queryflag = false;
                    }
                });
            }

            function CleanVal(input)
            {
                var val = input;
                val = val.replace("\\u003cb\\u003e", "");
                val = val.replace("\\u003c\\/b\\u003e", "");
                val = val.replace("\\u003c\\/b\\u003e", "");
                val = val.replace("\\u003cb\\u003e", "");
                val = val.replace("\\u003c\\/b\\u003e", "");
                val = val.replace("\\u003cb\\u003e", "");
                val = val.replace("\\u003cb\\u003e", "");
                val = val.replace("\\u003c\\/b\\u003e", "");
                val = val.replace("\\u0026amp;", "&");
                val = val.replace("\\u003cb\\u003e", "");
                val = val.replace("\\u0026", "");
                val = val.replace("\\u0026#39;", "'");
                val = val.replace("#39;", "'");
                val = val.replace("\\u003c\\/b\\u003e", "");
                val = val.replace("\\u2013", "2013");
                if (val.length > 4 && val.substring(0, 4) == "http")
                    val = "";
                return val;
            }

            function FormSubmit(input)
            {
                doWork = false;
                $('#startjob').val('Start Searching');
                $("form").submit();
            }
        </script>	
    </head>
    <body>
        <!-- Main Content -->
        <div class="content">
            <div class="subscribe">
                <form name="searchbox" id="searchbox" action="index.php" method="POST">
                    
                    <textarea name="keywords" id=input style="width: 97%; height: 275px;font-size: 15px;line-height: 2;" readonly="readonly"><?php echo $keyword; ?></textarea><br><br>
                    <div id=numofkeywords style="float: left; padding-top: 6px; margin-right: 10px; border: 1px solid rgb(204, 204, 204); padding-left: 10px; padding-right: 10px; border-radius: 5px; padding-block-end: 4px;">0</div>
                    <input id=startjob onclick="StartJob();" type=button class="btn btn-primary" value="Start Searching">
                    <input class="btn btn-primary" type="submit" onclick="FormSubmit();" value="Export Keywords">
                    <div id=container></div>
                    <textarea id=queryoutput style="display:none;"></textarea><br>
                </form>
            </div>
        </div>
        <!-- /Main Content -->
    </body>
</html>