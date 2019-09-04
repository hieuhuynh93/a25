<!DOCTYPE html>
<html>
  <head>
    <title>Facebook Business Leads Finder</title>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
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
						$('#results').empty();	
					}, 
					success: function(data){						
						$('#results').append(data);
						$("#overlay").remove();			
					}
				});
	
				return false;
			});
			
		});	

		function find_emails( d, e){

			$.ajax({
			        type: "POST",
			        url: "findemails.php?domain=" + d,
			        success: function(data){
						
						var ele = $("." + e);

			        	ele.find("td.td_emails").html(data);


			        }
		    });
		}		
		

	</script>	
  </head>
  <body>
  <!-- Main Content -->
  <div class="content">
    <div class="container">
      <div class="logo">
      </div>
      <h1>Facebook Business Leads Finder</h1>

    </div>

    <div class="subscribe">
<form id="formSubmit" class="form-wrapper" action="index.php" method="post">
	<input class="form-control" type="text" id="search" name="keywords" placeholder="Enter Keyword and Location (e.g. restaurants in chicago)" required>
	<select class="input-sm" name="max" id="select">
	<optgroup label="Max Results">
	<option value="20">20</option>
	<option value="50">50</option>
	<option value="100">100</option>
	</optgroup>
	</select>	
	<input class="btn btn-primary" type="submit" value="Search" id="submit">
</form>
<br /><br /><br />
<div id="results"></div>

    </div>
	<div id="subscribestatus"></div>

  </div>
  <!-- /Main Content -->


  </body>
</html>