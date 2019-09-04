<!DOCTYPE html>
<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>	
	
<meta name="description" content="" />

<title>Webpage Image SEO Checker Tool</title>     
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">

	$(document).ready(function(){
		$("#analyze").submit(function() {
			$.ajax({
				type: "POST",
				url: "ajax.php",
				data: $("#analyze").serialize(),
				beforeSend: function(XMLHttpRequest){
					$("#css_processing").css('display','inline');
					$('#out').empty();	
				}, 
				success: function(data){
					$("#css_processing").css('display','none');
					$('#out').append(data);
		
				}
			});

			return false;
		});
		
	});	
</script>      
<link href="style.css" rel="stylesheet" type="text/css" />


</head>

<body id="top">
<div class=wrapper>
  <div class=grids>
<div class="grid-12 grid">
<br/>
<h1>Webpage Image SEO Checker Tool</h1>
</div>
</div>
</div>

      
     <div class="wrapper">
    
    		<div class="grids">
         
                
                  <div class="grid-10 grid">

<div id="rhs"></div>
<div id="lhs">
<div id="in">

<h6><a name="minify" style="text-decoration:none;">Enter WebPage URL</a></h6>
<form id="analyze" name="analyze" method="POST" action="index.php">
<input type="text" id="url_a" name="url" />
<input class="button" type="submit" value="Go!" />
<div>
<img id="css_processing" style="display: none;" src="images/ajax-loader.gif"  alt="processing"/>
</div>
</form>
</div>
<div id="out">

</div></div>
<div style="clear: both;">&nbsp;</div>
</div>
  </div> 





			</div>






           
	<div style="clear: both;"></div>	 





    
	
     
		<div class="wrapper">
		   </div>    

</body>
</html>