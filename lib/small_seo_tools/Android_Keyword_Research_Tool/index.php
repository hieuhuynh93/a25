<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">	
    <title>Android Market Keyword Research Tool</title>
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

<h2>Android Market Keyword Research Tool</h2>

<form id="formSubmit" class="form-wrapper">
	<input type="text" id="search" name="keyword" placeholder="Enter Single Word Keyword..." required>
	<input type="submit" value="go" id="submit">
</form>
<div style="display:none;" id="loading">
	<p>Please wait the data is loading...</p>
</div>	

<div id="results"></div>

</body>
</html>
