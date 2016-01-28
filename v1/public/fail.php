<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>We Travel</title>
  <link href="css/style.css" rel="stylesheet" media="all">  
  <link rel="stylesheet" href="css/jquery-ui.css">
  <script type="text/javascript" src="js/modernizr.custom.79639.js"></script>
	<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="css/ie.css" />
<![endif]-->
 </head>
 <body class="home">
 	<!--header starts here-->
	<header>
		<div class="header_main">
			<!--logo starts here-->
			<div class="logo">
				<a href="index.html">
					<img src="images/logo.png" alt="logo"/>
				</a>
			</div>
			<!--logo ends here-->
			<!--header right section starts here-->
			<div class="header_right_section">
				<a href="#" class="how_it_works">
					How it Works					
				</a>
				<a href="#" class="sign_in">
					sign in
				</a>
			</div>
			<!--header right section ends here-->
			<div class="clear_both"></div>
		</div>
	
</header> 
<!--header ends here-->
<!--wrapper starts here-->
<section class="wrapper"> 
<!--main starts here-->
<section class="main"> 
<!--middle starts here-->
<section class="middle" id="center-align"> 
<!--heading starts here-->
<h1 class="heading"> Opps! Something went wrong in your credit card information. Kindly get the correct information and try again.</h1>
</section> 
<!--middle ends here-->
</section> 
<!--main ends here-->
</section> 
<!--wrapper ends here-->
<!--footer starts here-->
<footer id="sticky-footer"> 
<div class="main"> 
  <p>Copyright 2014 - We.Travel - All right reserved!</p>
  <ul>
    <li><a href="#">about us |</a></li>
    <li><a href="#">credits |</a></li>
    <li><a href="#">terms of use |</a></li>
    <li><a href="#">contact</a></li>
  </ul>
  <div class="clear_both"></div>
</div>
</footer> 
<!--footer ends here-->
<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/jquery.placeholder.js"></script>
	<script type="text/javascript" src="js/jquery.anystretch.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript">
 			/*getting city names from JSON*/
			 $.getJSON("js/city_names.json", function( data ) {
				  var items = [];
				  $.each( data, function( key, val ) {
					$(".combobox").append("<option value='" + val + "'>" + val + "</option>");
				  });
			});
			/*ends*/
 	</script>
 </body>
</html>
