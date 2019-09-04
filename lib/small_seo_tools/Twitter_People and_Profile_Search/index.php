<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">	
    <title>Twitter People and Profile Search Tool</title>
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
						$("#loading").css('display','inline');
						$('#results').empty();	
					}, 
					success: function(data){
						$("#loading").css('display','none');
						$('#results').append(data);
			
					}
				});
	
				return false;
			});
			
		});	

		function fnExcelReport()
		{
		    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
		    var textRange; var j=0;
		    tab = document.getElementById('results_table');

		    for(j = 0 ; j < tab.rows.length ; j++) 
		    {     
		        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";		        
		    }

		    tab_text=tab_text+"</table>";
		    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");
		    tab_text= tab_text.replace(/<img[^>]*>/gi,"");
		    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, "");

		    var ua = window.navigator.userAgent;
		    var msie = ua.indexOf("MSIE "); 

		    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))
		    {
		        txtArea1.document.open("txt/html","replace");
		        txtArea1.document.write(tab_text);
		        txtArea1.document.close();
		        txtArea1.focus(); 
		        sa=txtArea1.document.execCommand("SaveAs",true,"data.xls");
		    }  
		    else 
		        sa = window.open('data:application/vnd.ms-excel;charset=utf-8,%EF%BB%BF' + encodeURIComponent(tab_text));  

		    return (sa);
		}
	</script>	
</head>

<body>

<h2>Twitter People and Profile Search Tool</h2>

<form id="formSubmit" class="form-wrapper">
	<input type="text" id="search" name="keyword" placeholder="Enter Name or Keyword..." required>
	<select name="max" id="select">
	<optgroup label="Max Results">
	<option value="50">50</option>
	<option value="100">100</option>
	<option value="250">250</option>
	<option value="500">500</option>
	<option value="1000">1000</option>
	<option value="2000">2000</option>			
	</optgroup>
	</select>		
	<input type="submit" value="go" id="submit">
</form>
<div style="display:none;" id="loading">
	<p>Please wait the data is loading...</p>
</div>	

<div id="results"></div>

</body>
</html>
