<!DOCTYPE html>
<html>
  <head>
    <title>HTML Markup Validation Tool</title>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- Cascading Style Sheets -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/custom.css" />
    <link href="css/jquery-linedtextarea.css" type="text/css" rel="stylesheet" />
	<!--[if IE 7]>
	<link rel="stylesheet" href="css/font-awesome-ie7.min.css">
	<![endif]-->
	<!-- /Cascading Style Sheets -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="jquery-linedtextarea.js"></script>
	
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
						$('html, body').animate({scrollTop: $("#results").offset().top}, 300);			
					}
				});
	
				return false;
			});
			
		});	

	</script>	
  </head>
  <body>
  <!-- Main Content -->
  <div class="content">
    <div class="container">
      <div class="logo">
      </div>
      <h1>HTML Markup Validation Tool</h1>

    </div>

    <div class="subscribe">
	<form id="formSubmit" class="form-wrapper" action="ajax.php" method="post">
		<p><strong>Check the markup (HTML, XHTML, ...) of Web documents</strong></p><br />
		<input class="form-control" type="text" id="search" name="url" placeholder="Enter website URL..." required>
		<input class="btn btn-primary" type="submit" value="Validate" id="submit">
	</form>
	<br /><br /><br />
	<div style="display:none;" id="loading" align="center">
		<h3><strong>Please wait the data is loading...</strong></h3>
	</div>
	<div id="results"></div>
    </div>

  </div>
  <!-- /Main Content -->


  </body>
</html>