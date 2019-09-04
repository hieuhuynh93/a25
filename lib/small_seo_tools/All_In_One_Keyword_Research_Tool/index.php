<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>All-in-One Keyword Research Tool</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Sintony:400,700' rel='stylesheet' type='text/css'>   
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<script type="text/javascript">
	
		$(document).ready(function(){
			$("#formSubmit").submit(function() {
				$.ajax({
					type: "POST",
					url: "ajax.php",
					data: $("#formSubmit").serialize(),
					beforeSend: function(XMLHttpRequest){
						var overlay = $('<div id="overlay"></div>');
						overlay.appendTo(document.body);
						$("#loading").css('display','inline');
						$('#results').empty();	
					}, 
					success: function(data){
						$("#loading").css('display','none');
						$('#results').append(data);
						$("#overlay").remove();					
					}
				});
	
				return false;
			});
			
		});

		function check_domain( d, e){

			$.ajax({
			        type: "POST",
			        url: "ajax.php?domain=" + d,
			        success: function(data){
						
						var ele = $("." + e);

			        	ele.find("td.td_com img").hide();
			        	ele.find("td.td_net img").hide();

			        	var exists = data.split('-');

			        	if(exists[0] == 0){
			        		ele.find("td.td_com").html("<span class='available'>Available</span>");
			        	}else{
			        		ele.find("td.td_com").html("<span class='registered'>Registered</span>");
			        	}

			        	if(exists[1] == 0){
							ele.find("td.td_net").html("<span class='available'>Available</span>");
						}else{
							ele.find("td.td_net").html("<span class='registered'>Registered</span>");
			        	}

			        }
		    });
		}			

		function download_xls(){

		    var xls_data = "";

		    $("td.keywords_td").each(function() {
		        xls_data = xls_data + "^^^" + $(this).text();
		    });

		    $('body').append('<form method="post" action="ajax.php" style="display:none;"><textarea name="download">' + xls_data + '</textarea></form>');
		    $("form:last").submit();
		}
	</script>	
</head>

<body>

<h2>All-in-One Keyword Research Tool</h2>

<form id="formSubmit" class="form-wrapper">
<input type="radio" id="radio1" name="site" value="google" checked>
   <label for="radio1">Google</label>
<input type="radio" id="radio2" name="site" value="bing">
   <label for="radio2">Bing</label>
<input type="radio" id="radio3" name="site" value="yahoo">
   <label for="radio3">Yahoo</label>  
<input type="radio" id="radio4" name="site" value="amazon">
   <label for="radio4">Amazon</label>
<input type="radio" id="radio5" name="site" value="ebay">
   <label for="radio5">Ebay</label>
<input type="radio" id="radio6" name="site" value="youtube">
   <label for="radio6">Youtube</label>
<input type="radio" id="radio7" name="site" value="wikipedia">
   <label for="radio7">Wikipedia</label>                      

	<input type="text" id="search" name="keyword" placeholder="Enter Keyword..." required>
	<input type="submit" value="go" id="submit">
</form>
<div style="display:none;" id="loading">
	<p>Please wait the data is loading...</p>
</div>	

<div id="results"></div>

</body>
</html>
