<!DOCTYPE html>
<html class="w-mod-js w-mod-no-touch w-mod-video w-mod-no-ios wf-opensans-n3-active wf-opensans-i3-active wf-opensans-n4-active wf-opensans-i4-active wf-opensans-n6-active wf-opensans-i6-active wf-opensans-n7-active wf-opensans-i7-active wf-opensans-n8-active wf-opensans-i8-active wf-petitformalscript-n4-active wf-active"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Keyword Difficulty Finder</title>  
  <meta content="width=device-width, initial-scale=1" name="viewport"><meta content="Webflow" name="generator">
  <link href='https://fonts.googleapis.com/css?family=Aldrich' rel='stylesheet' type='text/css'>
  <link href="style.css" rel="stylesheet" type="text/css">
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
						$("#loading").css('display','inline');
						$('#results').empty();	
					}, 
					success: function(data){
						$("#loading").css('display','none');
						$('#results').append(data);
						$("#overlay").remove();	
						$('html, body').animate({scrollTop: $("table").offset().top}, 300);		
					}
				});
		
				return false;
			});
			
		});
		
  </script> 
  </head>
  <body>
  <div class="bars-wrapper w-clearfix"><div class="bar"></div><div class="_2 bar"></div><div class="_3 bar"></div><div class="_4 bar"></div><div class="_5 bar"></div><div class="_6 bar"></div><div class="bar"></div></div>
  <div class="header-section"><div class="container w-container">
  <h1>Keyword Difficulty Finder</h1><p class="subtitle">Understand how difficult a keyword may be to rank for based on Google Yahoo and Bing search engines</p>
  <div class="sign-up-form w-form">
  <form class="w-clearfix" id="formSubmit" data-name="Signup Form" name="wf-form-signup-form" data-sticky="stickyID0" action="index.php" method="post">
	<input type="text" data-sticky="stickyID1" class="field w-input" name="keyword" value="" placeholder="Enter keyword e.g. real estate" required>
	<select name="se" id="select" class="field w-input">
	<optgroup label="Search Engine">
	  <option value="yahoo">https://www.yahoo.com</option><option value="bing">https://www.bing.com</option><option value="com" selected>https://www.google.com</option><option value="ad">https://www.google.ad</option><option value="ae">https://www.google.ae</option><option value="com.af">https://www.google.com.af</option><option value="com.ag">https://www.google.com.ag</option><option value="com.ai">https://www.google.com.ai</option><option value="am">https://www.google.am</option><option value="co.ao">https://www.google.co.ao</option><option value="com.ar">https://www.google.com.ar</option><option value="as">https://www.google.as</option><option value="at">https://www.google.at</option><option value="com.au">https://www.google.com.au</option><option value="az">https://www.google.az</option><option value="ba">https://www.google.ba</option><option value="com.bd">https://www.google.com.bd</option><option value="be">https://www.google.be</option><option value="bf">https://www.google.bf</option><option value="bg">https://www.google.bg</option><option value="com.bh">https://www.google.com.bh</option><option value="bi">https://www.google.bi</option><option value="bj">https://www.google.bj</option><option value="com.bn">https://www.google.com.bn</option><option value="com.bo">https://www.google.com.bo</option><option value="com.br">https://www.google.com.br</option><option value="bs">https://www.google.bs</option><option value="co.bw">https://www.google.co.bw</option><option value="by">https://www.google.by</option><option value="com.bz">https://www.google.com.bz</option><option value="ca">https://www.google.ca</option><option value="cd">https://www.google.cd</option><option value="cf">https://www.google.cf</option><option value="cg">https://www.google.cg</option><option value="ch">https://www.google.ch</option><option value="ci">https://www.google.ci</option><option value="co.ck">https://www.google.co.ck</option><option value="cl">https://www.google.cl</option><option value="cm">https://www.google.cm</option><option value="cn">https://www.google.cn</option><option value="com.co">https://www.google.com.co</option><option value="co.cr">https://www.google.co.cr</option><option value="com.cu">https://www.google.com.cu</option><option value="cv">https://www.google.cv</option><option value="cz">https://www.google.cz</option><option value="de">https://www.google.de</option><option value="dj">https://www.google.dj</option><option value="dk">https://www.google.dk</option><option value="dm">https://www.google.dm</option><option value="com.do">https://www.google.com.do</option><option value="dz">https://www.google.dz</option><option value="com.ec">https://www.google.com.ec</option><option value="ee">https://www.google.ee</option><option value="com.eg">https://www.google.com.eg</option><option value="es">https://www.google.es</option><option value="com.et">https://www.google.com.et</option><option value="fi">https://www.google.fi</option><option value="com.fj">https://www.google.com.fj</option><option value="fm">https://www.google.fm</option><option value="fr">https://www.google.fr</option><option value="ga">https://www.google.ga</option><option value="ge">https://www.google.ge</option><option value="gg">https://www.google.gg</option><option value="com.gh">https://www.google.com.gh</option><option value="com.gi">https://www.google.com.gi</option><option value="gl">https://www.google.gl</option><option value="gm">https://www.google.gm</option><option value="gp">https://www.google.gp</option> <option value="gr">https://www.google.gr</option><option value="com.gt">https://www.google.com.gt</option><option value="gy">https://www.google.gy</option><option value="com.hk">https://www.google.com.hk</option><option value="hn">https://www.google.hn</option><option value="hr">https://www.google.hr</option><option value="ht">https://www.google.ht</option><option value="hu">https://www.google.hu</option><option value="co.id">https://www.google.co.id</option><option value="ie">https://www.google.ie</option><option value="co.il">https://www.google.co.il</option><option value="im">https://www.google.im</option><option value="co.in">https://www.google.co.in</option><option value="iq">https://www.google.iq</option><option value="is">https://www.google.is</option><option value="it">https://www.google.it</option><option value="je">https://www.google.je</option><option value="com.jm">https://www.google.com.jm</option><option value="jo">https://www.google.jo</option><option value="co.jp">https://www.google.co.jp</option><option value="co.ke">https://www.google.co.ke</option><option value="com.kh">https://www.google.com.kh</option><option value="ki">https://www.google.ki</option><option value="kg">https://www.google.kg</option><option value="co.kr">https://www.google.co.kr</option><option value="com.kw">https://www.google.com.kw</option><option value="kz">https://www.google.kz</option><option value="la">https://www.google.la</option><option value="com.lb">https://www.google.com.lb</option><option value="li">https://www.google.li</option><option value="lk">https://www.google.lk</option><option value="co.ls">https://www.google.co.ls</option><option value="lt">https://www.google.lt</option><option value="lu">https://www.google.lu</option><option value="lv">https://www.google.lv</option><option value="com.ly">https://www.google.com.ly</option><option value="co.ma">https://www.google.co.ma</option><option value="md">https://www.google.md</option><option value="me">https://www.google.me</option><option value="mg">https://www.google.mg</option><option value="mk">https://www.google.mk</option><option value="ml">https://www.google.ml</option><option value="mn">https://www.google.mn</option><option value="ms">https://www.google.ms</option><option value="com.mt">https://www.google.com.mt</option><option value="mu">https://www.google.mu</option><option value="mv">https://www.google.mv</option><option value="mw">https://www.google.mw</option><option value="com.mx">https://www.google.com.mx</option><option value="com.my">https://www.google.com.my</option><option value="co.mz">https://www.google.co.mz</option><option value="com.na">https://www.google.com.na</option><option value="com.nf">https://www.google.com.nf</option><option value="com.ng">https://www.google.com.ng</option><option value="com.ni">https://www.google.com.ni</option><option value="ne">https://www.google.ne</option><option value="nl">https://www.google.nl</option><option value="no">https://www.google.no</option><option value="com.np">https://www.google.com.np</option><option value="nr">https://www.google.nr</option><option value="nu">https://www.google.nu</option><option value="co.nz">https://www.google.co.nz</option><option value="com.om">https://www.google.com.om</option><option value="com.pa">https://www.google.com.pa</option><option value="com.pe">https://www.google.com.pe</option><option value="com.ph">https://www.google.com.ph</option><option value="com.pk">https://www.google.com.pk</option><option value="pl">https://www.google.pl</option><option value="pn">https://www.google.pn</option><option value="com.pr">https://www.google.com.pr</option><option value="ps">https://www.google.ps</option><option value="pt">https://www.google.pt</option><option value="com.py">https://www.google.com.py</option><option value="com.qa">https://www.google.com.qa</option><option value="ro">https://www.google.ro</option><option value="ru">https://www.google.ru</option><option value="rw">https://www.google.rw</option><option value="com.sa">https://www.google.com.sa</option><option value="com.sb">https://www.google.com.sb</option><option value="sc">https://www.google.sc</option><option value="se">https://www.google.se</option><option value="com.sg">https://www.google.com.sg</option><option value="sh">https://www.google.sh</option><option value="si">https://www.google.si</option><option value="sk">https://www.google.sk</option><option value="com.sl">https://www.google.com.sl</option><option value="sn">https://www.google.sn</option><option value="so">https://www.google.so</option><option value="sm">https://www.google.sm</option><option value="st">https://www.google.st</option><option value="com.sv">https://www.google.com.sv</option><option value="td">https://www.google.td</option><option value="tg">https://www.google.tg</option><option value="co.th">https://www.google.co.th</option><option value="com.tj">https://www.google.com.tj</option><option value="tk">https://www.google.tk</option><option value="tl">https://www.google.tl</option><option value="tm">https://www.google.tm</option><option value="tn">https://www.google.tn</option><option value="to">https://www.google.to</option><option value="com.tr">https://www.google.com.tr</option><option value="tt">https://www.google.tt</option><option value="com.tw">https://www.google.com.tw</option><option value="co.tz">https://www.google.co.tz</option><option value="com.ua">https://www.google.com.ua</option><option value="co.ug">https://www.google.co.ug</option><option value="co.uk">https://www.google.co.uk</option><option value="com.uy">https://www.google.com.uy</option><option value="co.uz">https://www.google.co.uz</option><option value="com.vc">https://www.google.com.vc</option><option value="co.ve">https://www.google.co.ve</option><option value="vg">https://www.google.vg</option><option value="co.vi">https://www.google.co.vi</option><option value="com.vn">https://www.google.com.vn</option><option value="vu">https://www.google.vu</option><option value="ws">https://www.google.ws</option><option value="rs">https://www.google.rs</option><option value="co.za">https://www.google.co.za</option><option value="co.zm">https://www.google.co.zm</option><option value="co.zw">https://www.google.co.zw</option><option value="cat">https://www.google.cat</option>
	</optgroup>
	</select>	
<input type="submit" value="Find Difficulty" class="button w-button">	
</form>
<div style="display:none;" id="loading" align="center">
	<h3>Please wait the data is loading...</h3>
</div>
<div id="results"></div>
</div></div></div><div class="social-section">
<div class="w-container">
<h2>Build, prioritize and analyze keywords!</h2>
<div class="refer">
Use the buttons below to share.
</div><div class="share-wrapper">
<div class="a2a_kit a2a_kit_size_32 a2a_default_style" id="my_centered_buttons">
    <a class="a2a_button_facebook"></a>
    <a class="a2a_button_twitter"></a>
    <a class="a2a_button_google_plus"></a>
    <a class="a2a_button_pinterest"></a>
    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
</div>

<script async src="https://static.addtoany.com/menu/page.js"></script>

</div></div></div><div class="footer-section"><div class="w-container"><div class="w-row"><div class="w-col w-col-6 w-col-small-6"><div class="copyright">&copy;. All right reserved.&nbsp;</div></div></div></div></div>
</body></html>