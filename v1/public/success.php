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

<style>
.divBlock
{
	margin-top:10px;
}
.divName
{
	width:200px;
	float:left;
}
.divColon
{
	width:50px;
	float:left;
}
.divMain
{
background-color: #3F4041;
    width: 500px;
    padding: 50px;
    border: solid 1px #101010;
    border-radius: 10px;   
    color: white;
}
</style>

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
<?php 
if(isset($_GET["status"])) //this is for paypal credit card
{
	if(($_GET["status"]=="Success") || ($_GET["status"]=="Successwithwarning"))
	{
	echo "<h1 class=heading>Congratulations! Your order has been successfully submitted. You will get all the details in your email ID shortly.</h1>";
		
	$msg="<div style='background-color: #3F4041;width: 500px;padding: 50px;border: solid 1px #101010;border-radius: 10px;color: white;'>
<h3>Your Transaction Details</h3>
<div style='height:1px;width:450px;background-color:white;'></div>

<div style='margin-top:10px;'>
<div style='width:200px;float:left;'>Status</div><div style='width:50px;float:left;'>:</div><div>". $_GET["status"]."</div>	
</div>

<div style='margin-top:10px;'>
<div style='width:200px;float:left;'>Transaction ID</div><div style='width:50px;float:left;'>:</div><div>".$_GET["transactionID"]."</div>

<div style='margin-top:10px;'>
<div style='width:200px;float:left;'>Customer Name</div><div style='width:50px;float:left;'>:</div><div>".$_GET["cname"]."</div>	
</div>

<div style='margin-top:10px;margin-bottom:20px;'>
<div style='width:200px;float:left;'>Amount</div><div style='width:50px;float:left;'>:</div><div>&euro; ".$_GET["amt"]."</div>	
</div>

<h3>Flight Details</h3>
<div style='height:1px;width:450px;background-color:white;'></div>
<div style='margin-top:10px;'>
<div style='width:200px;float:left;'>Airlines Name</div><div style='width:50px;float:left;'>:</div><div>Vueling</div>	
</div>

<div style='margin-top:10px;'>
<div style='width:200px;float:left;'>Arival Date/Time</div><div style='width:50px;float:left;'>:</div><div>2015-08-21 22:35</div>	
</div>

<div style='margin-top:10px;'>
<div style='width:200px;float:left;'>Departure Date/Time</div><div style='width:50px;float:left;'>:</div><div>2015-08-22 00:50</div>	
</div>

<div style='margin-top:10px;'>
<div style='width:200px;float:left;'>Total Estimation Time</div><div style='width:50px;float:left;'>:</div><div>135 min</div>	
</div>

<div style='margin-top:10px;margin-bottom:20px;'>
<div style='width:200px;float:left;'>Flight Price</div><div style='width:50px;float:left;'>:</div><div>93.40€</div>	
</div>

<h3>Hotel Details</h3>
<div style='height:1px;width:450px;background-color:white;'></div>
<div style='margin-top:10px;'>
<div style='width:200px;float:left;'>Hotel Name</div><div style='width:50px;float:left;'>:</div><div>EURO HOUSE SUITES - ROME AIRPORT</div>	
</div>

<div style='margin-top:10px;'>
<div style='width:200px;float:left;'>Address</div><div style='width:50px;float:left;'>:</div><div>VIA REMO LA VALLE 11</div>	
</div>

<div style='margin-top:10px;'>
<div style='width:200px;float:left;'>Hotel Price</div><div style='width:50px;float:left;'>:</div><div>135.40€</div>	
</div>

</div>
</div>";
	echo $msg;
	
	
//$_GET["email"]
		return send_email("chetan.reddy@we-travel.co","We Travel: Order Confirmation",$msg);
	}	
	else
	{
		echo "<h1 class=heading> Opps! Something went wrong in your credit card information. Kindly get the correct information and try again.</h1>";
	}	
}
else if(!empty($_POST["txn_id"])) //this is for paypal
{
	echo "<h1 class=heading>Congratulations! Your order has been successfully submitted. You will get all the details in your email ID shortly.</h1>";
		
	$msg="<div style='background-color: #3F4041;width: 500px;padding: 50px;border: solid 1px #101010;border-radius: 10px;color: white;'>
<h3>Your Transaction Details</h3>
<div style='height:1px;width:450px;background-color:white;'></div>

<div style='margin-top:10px;'>
<div style='width:200px;float:left;'>Status</div><div style='width:50px;float:left;'>:</div><div>Success</div>	
</div>

<div style='margin-top:10px;'>
<div style='width:200px;float:left;'>Transaction ID</div><div style='width:50px;float:left;'>:</div><div>".$_POST["txn_id"]."</div>

<div style='margin-top:10px;'>
<div style='width:200px;float:left;'>Customer Name</div><div style='width:50px;float:left;'>:</div><div>".$_POST["first_name"]."</div>	
</div>

<div style='margin-top:10px;margin-bottom:20px;'>
<div style='width:200px;float:left;'>Amount</div><div style='width:50px;float:left;'>:</div><div>&euro; ".$_POST["mc_gross"]."</div>	
</div>

<h3>Flight Details</h3>
<div style='height:1px;width:450px;background-color:white;'></div>
<div style='margin-top:10px;'>
<div style='width:200px;float:left;'>Airlines Name</div><div style='width:50px;float:left;'>:</div><div>Vueling</div>	
</div>

<div style='margin-top:10px;'>
<div style='width:200px;float:left;'>Arival Date/Time</div><div style='width:50px;float:left;'>:</div><div>2015-08-21 22:35</div>	
</div>

<div style='margin-top:10px;'>
<div style='width:200px;float:left;'>Departure Date/Time</div><div style='width:50px;float:left;'>:</div><div>2015-08-22 00:50</div>	
</div>

<div style='margin-top:10px;'>
<div style='width:200px;float:left;'>Total Estimation Time</div><div style='width:50px;float:left;'>:</div><div>135 min</div>	
</div>

<div style='margin-top:10px;margin-bottom:20px;'>
<div style='width:200px;float:left;'>Flight Price</div><div style='width:50px;float:left;'>:</div><div>93.40€</div>	
</div>

<h3>Hotel Details</h3>
<div style='height:1px;width:450px;background-color:white;'></div>
<div style='margin-top:10px;'>
<div style='width:200px;float:left;'>Hotel Name</div><div style='width:50px;float:left;'>:</div><div>EURO HOUSE SUITES - ROME AIRPORT</div>	
</div>

<div style='margin-top:10px;'>
<div style='width:200px;float:left;'>Address</div><div style='width:50px;float:left;'>:</div><div>VIA REMO LA VALLE 11</div>	
</div>

<div style='margin-top:10px;'>
<div style='width:200px;float:left;'>Hotel Price</div><div style='width:50px;float:left;'>:</div><div>135.40€</div>	
</div>

</div>
</div>";
	echo $msg;
		
	//$_POST["payer_email"]
		return send_email("chetan.reddy@we-travel.co","We Travel: Order Confirmation",$msg);
}
else
{
	echo "<h1 class=heading> Opps! Something went wrong in your credit card information. Kindly get the correct information and try again.</h1>";
}
?>
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
<?php
function send_email($email, $subject, $html) {

		$headers = 'MIME-Version: 1.0rn' . "\r\n" . 'Content-type: text/html; charset=iso-8859-1rn' . "\r\n" . 'From: gauritek@ymail.com' . "\r\n" . 'Reply-To: gauritek@ymail.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
		if( mail($email, $subject, $html, $headers) ){
			return true;
		} else {
			return false;
		}
	}

?>
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
