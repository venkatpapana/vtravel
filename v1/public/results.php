<?php require_once('../services/config.php'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Generator" content="">
    <meta name="Author" content="">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
    <title>We Travel</title>
	
	
    <style>
  form input
  {
      border: solid 1px #CDCDCD;
  }
  form td
  {
      padding: 3px;
	  font-size:11px;
  }
  
  form input
  {
  height:20px;
  }
  .paypalBtn
  {
      padding-top: 25px;
    width: 292px;
    height: auto;
    border: none;
  }
  
  form select
  {
  width: 151px;
    border: solid 1px #CDCDCD;
	
  }
  
  .btnPayNow
  {
    background-color: #F8D33F;   
    width: 157px;
    border: none;
    font-weight: bold;
    cursor: pointer;
	height:35px;
  }
  .btnPayNow:hover
  {
  	background-color: #7ECDC4;
  }
  
  .checkoutDetails
  {
  	width:45%;
	float:left;
  	font-size:12px;
	padding:10px;
  }
  
   .passangerDetails
  {
    width: 45%;
    float: right;
    font-size: 11px;
    padding: 5px;
    border: solid 1px #EDEDED;
    background-color: #F6F6F6;
  }
  
  .checkoutDetailsDivLeft
  {
  	float:left;
	width:32%;
	height:38px;
  }
   .checkoutDetailsDivMid
  {
  	float:left;
	width:2%;
	height:38px;
  }
  
   .checkoutDetailsDivRight
  {
  	float:left;
	width:60%;
	height:38px;
  }
  
  .addMoreBtn
  {
    background-image: url('images/addmore.png');
    width: 100px;
    height: 26px;
    background-size: cover;
    border: none;
	cursor: pointer;
  }
  </style>
       
	    <script>
function validate() {
    var isValid = true;
    var form1 = document.getElementById('personalForm');
    
    if (form1.passanger_first_name.value == '') {
        isValid = false;
    }
    
    if (form1.passanger_last_name.value == '') {
        isValid = false;
    }
    if (form1.passanger_sex.value == '') {
        isValid = false;
    }
	  if (form1.passanger_mobile.value == '') {
        isValid = false;
    }
	  if (form1.passanger_email.value == '') {
        isValid = false;
    }
	  if (form1.passanger_city.value == '') {
        isValid = false;
    }
	  if (form1.passanger_country.value == '') {
        isValid = false;
    }
	 if (form1.passanger_zip.value == '') {
        isValid = false;
    }
    if (isValid) {
        document.getElementById('tabs').style.display='block';
        return false;
    }
}
    </script>

    <style>
#tabs {display:none;}
</style>

 <link href="css/style.css" rel="stylesheet" media="all">
        <link rel="stylesheet" href="css/jquery-ui.css">

        <script type="text/javascript" src="js/modernizr.custom.79639.js"></script>

        <!--[if IE 10]>
	<link rel="stylesheet" type="text/css" href="css/ie.css" />
<![endif]-->
<!--[if IE 9]>
	<link rel="stylesheet" type="text/css" href="css/ie.css" />
<![endif]-->
    <?php //TODO: avoid all PHP code in htmls' 
	echo '<script>var data = '.json_encode($_POST).'</script>';
    ?>
</head>
<body class="results">
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
    <section class="wrapper results">
		
		<!--main starts here-->
		<section class="main results_page">
			
			<!--middle starts here-->
			<section class="middle">
				<!--plan your trip box starts here-->
				<div class="plan_your_trip">
					<div class="plan_your_trip_box">
					<!--results width starts here-->
					<div class="results_inner_widths">
						<span class="bud">
							<label>Budget:</label>
							<input type="text" placeholder="200" class="input_txt budget" name="budget" id="budget" value="<?php echo $_POST['budget']?>">
							<a class="budget_icon"><span></span></a>
							<div class="clear_both"></div>
						</span>
                      
						<span class="travellers">
							<label>Travelers:</label>
							<input type="text" placeholder="1" class="input_txt travelers" name="travellers"  id="travellers" value="<?php echo $_POST['travellers']?>">
							<a class="travellers_icon"><span></span></a>
							<div class="clear_both"></div>
						</span>

						<span class="bud">
							<label>Rooms</label>							
							<input type="text" placeholder="1" class="input_txt budget" name="rooms" id="rooms" list="cars" value="<?php echo $_POST['rooms']?>">							 
								<datalist id="cars">
									<option selected value="1">1</option>
									<option selected value="2">2</option>
									<option selected value="3">3</option>
									<option selected value="4">4</option>
									<option selected value="5">5</option>
								</datalist>
							<a class="rooms_icon"><span></span></a>
							<div class="clear_both"></div>
						</span>
						
						<span class="dates">
							<label>From Date:</label>
							<input type="text" placeholder="10.01.2014 - 17.01.2014" class="input_txt" id="from" name="from_date" value="<?php echo $_POST['from_date'] ?>">
							<div class="clear_both"></div>
						</span>
						
						<span class="dates">
							<label>To Date:</label>
							<input type="text" placeholder="10.01.2014 - 17.01.2014" class="input_txt" id="to" name="to_date" value="<?php echo $_POST['to_date'] ?>">
							<div class="clear_both"></div>
						</span>
						
						<ul class="mylist"></ul>

						<span class="from" >
							<div class="ui-widget">
								<label>From:</label>
								  <select class="combobox" id="from_place" name="from_place">	
								    
								  </select>
							</div>
						</span>
						<input type="button" value="Search" class="search_btn">
						<div class="clear_both"></div>
						<!--results width ends here-->
						</div>
						<div class="gray_bg">
							<!--results width starts here-->
							<div class="inner_gray">
								<input type="radio" name="trip_type" id="one_way" value="one_way"  <?php if ($_POST['trip_type'] == 'one_way') echo 'checked="checked"'; ?>>
								<label>one way</label>
								<input type="radio" name="trip_type" id="return" value="return" <?php if ($_POST['trip_type'] == 'return') echo 'checked="checked"'; ?>>
								<label>return</label>
								<input type="checkbox" name="prefer_type" id="prefer_directs" <?php if (isset($_POST['prefer_type']) && $_POST['prefer_type'] == 'prefer_directs') echo 'checked="checked"'; ?>>
								<label>prefer directs</label>
								<div class="clear_both"></div>
							<!--results width ends here-->
							</div>
						</div>
					</div>
					<input type="button" value="" class="expand_btn">
				</div>
				<!--plan your trip box ends here-->
				<!--customize your journey starts here-->
				<div class="customize_journey">
					<div class="customize_journey_main">
						<!--results inner width starts here-->
						<div class="results_inner_widths">
						<div class="transport">
                         <!--update_by_nirmaljeet-->
							<label>Transport</label>
							<input title="Air Plane" type="button" value="" class="air_plane search_buttons <?php if ($_POST['air_plane_value'] == 0) echo 'disable_air_plane_btn'; ?> ">
							<input title="car" type="button" value="" class="car search_buttons <?php if ($_POST['car_value'] == 0) echo 'disable_car_btn'; ?>" >
							<input title="train" type="button" value="" class="train search_buttons <?php if ($_POST['train_value'] == 0) echo 'disable_train_btn'; ?>">
							<input title="bus" type="button" value="" class="bus search_buttons <?php if ($_POST['bus_value'] == 0) echo 'disable_bus_btn'; ?>">
							<input title="cruise" type="button" value="" class="cruise search_buttons <?php if ($_POST['cruise_value'] == 0) echo 'disable_cruise_btn'; ?>">
							<label class="stay">Stay</label>
							<input title="bed " type="button" value="" class="bed stay_section search_buttons <?php if ($_POST['bed_value'] == 0) echo 'disable_bed_btn'; ?>">
							<input title="apartment " type="button" value="" class="apartment stay_section search_buttons <?php if ($_POST['apartment_value'] == 0) echo 'disable_apartment_btn'; ?>">
							<input title="hotels " type="button" value="" class="hotels stay_section search_buttons <?php if ($_POST['hotels_value'] == 0) echo 'disable_hotels_btn'; ?>">
                            <input type="hidden" name="air_plane_value" value="<?php echo $_POST['air_plane_value']; ?>" id="air_plane_value" />
                            <input type="hidden" name="car_value" value="<?php echo $_POST['car_value']; ?>" id="car_value" />
                            <input type="hidden" name="train_value" value="<?php echo $_POST['train_value']; ?>" id="train_value" />
                            <input type="hidden" name="bus_value" value="<?php echo $_POST['bus_value']; ?>" id="bus_value" />
                            <input type="hidden" name="cruise_value" value="<?php echo $_POST['cruise_value']; ?>" id="cruise_value" />
                            <input type="hidden" name="bed_value" value="<?php echo $_POST['bed_value']; ?>" id="bed_value" />
                            <input type="hidden" name="apartment_value" value="<?php echo $_POST['apartment_value']; ?>" id="apartment_value" />
                            <input type="hidden" name="hotels_value" value="<?php echo $_POST['hotels_value']; ?>" id="hotels_value" />
 <!--update_by_nirmaljeet_end-->
							<div class="clear_both"></div>
						</div>
						</div>
						<!--results inner width ends here-->
							<div class="customize_input">
							<!--results inner width starts here-->
							<div class="results_inner_widths">
								<span class="to">
									<div class="ui-widget">
										<label>To:</label>
										  <select class="combobox" id="ToName"  name="ToName">
											<option value="">Select one...</option>
										  </select>
									</div>
									<div class="clear_both"></div>
								</span>
								<span class="travel_time">
									<label>Travel Time:</label>
									<div id="dd1" class="wrapper-dropdown-1" tabindex="1">
										<span class=""><?php echo $_POST['travel_time'] ?></span>
										
          <ul class="dropdown">
            <li class="li_tt"><a href="#">less then 3 hours</a></li>
            <li class="li_tt"><a href="#">less then 5 hours</a></li>
            <li class="li_tt"><a href="#">less then 7 hours</a></li>
            <li class="li_tt"><a href="#">I don't care</a></li>
          </ul>
									</div>
                                                                        <input type="hidden" name="travel_time" value="<?php echo $_POST['travel_time'] ?>" id="travel_time" />       
									<!--<a class="from_icon"><span></span></a>-->
									<div class="clear_both"></div>
								</span>
								<span class="weather_section">
									<label>Weather:</label>
									<div id="dd" class="wrapper-dropdown-1" tabindex="1">
										<span class=""><?php echo $_POST['weather'] ?></span>
										
          <ul class="dropdown">
            <li class="li_weather"><a href="#">I don't care</a></li>
            <li class="li_weather"><a href="#">I want sun</a></li>
            <li class="li_weather"><a href="#">I want snow</a></li>
          </ul>
									</div>
                                                                        <input type="hidden" name="weather" value="<?php echo $_POST['weather'] ?>" id="weather" />
									<div class="clear_both"></div>
								</span>
								
								<div class="clear_both"></div>
							</div>
							</div>
							<!--results inner width ends here-->
						</div>
					</div>
				</div>
				<!--customize your journey ends here-->
				<!--main_results boxes starts here-->
				<div class="main_result_boxes">			
					<div class="ajax-loader"><img src="images/ajax-loader.gif" /></div>

					<div style="font-size: small; color: #aaa" class="debug">						
						<lable>Travelport request time: </lable><span class='travelportTime'></span><br>
						<lable>Total process time: </lable><span class='totalProcessTime'></span><br>
					</div>


					<div class="container  results_container">
						<!-- RESULTS HERE -->
					</div>

					<!-- BOOK-IT HERE -->



					<div class="container1" style="display: none">
						<div class="more-destinations"><p>more destinations</p></div>
					</div>
		
					
					<div class="clear_both"></div>
				</div>
				<!--main_results boxes ends here-->
			</section>
			<!--middle ends here-->
		</section>
		<!--main ends here-->	

<div class="bookit_container"  style="display: none">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="city-box book-it">
								<img src="images/backgrounds/background3.jpg" class="city-bg-image" />
								<div class="city_bg" id="fixed_menu">
									<div class="city_name left_pad city_left">
										<p class="city_details">
											<span class="bubble_icon"></span>
											<span class="ciy_name" id="selected_city_name"></span>
											<span class="results_weather_icon"></span><span class="temperature"></span>
											<!-- <span class="car_icon"></span><span class="cost" id="car_cost"></span> -->
											<span class="plane_icon"></span><span class="cost" id="flight_cost"></span>
											<span class="building_icon"></span><span class="cost" id="hotel_cost">100&#128;</span>
											<span class="time_icon"></span><span class="cost" id="flight_time"></span>
										</p>
									</div>
									<div class="city_right">
										<div id="divTotal"><p class="total_cost"></p>
									</div>
									<div class="clear_both"></div>
								</div>
								<div class="city_btm">
									<div class="social_info left_pad" style="position: inherit;margin-top: 128px;">
										<div class="social_left_side">
											<div class="social_left_info">
												<span class="fb_icon"></span>
												<p>Sorin Pavel, Bogdan Tanase, Simone and Andrei Trusca live here</p>
											</div>
											<div class="fb_imgs">
												<img src="images/fb_imgs.jpg" alt="fb images"/>
												<img src="images/fb_imgs.jpg" alt="fb images"/>
												<img src="images/fb_imgs.jpg" alt="fb images"/>
												<img src="images/fb_imgs.jpg" alt="fb images"/>
												<img src="images/fb_imgs.jpg" alt="fb images"/>
												<img src="images/fb_imgs.jpg" alt="fb images"/>
											</div>
											<div class="clear_both"></div>
										</div>
										<div class="clear_both"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="container">
					<div id="wizard" class="">
					  <ul class="steps">
					    
          <li> <a href="#" class="home"> <span class="step-title" id="backToResults"> 
            << Back to change City</span> <span class="step-arrow"></span> </a> 
          </li>

					    
          <li id="howToGetThere"> <a href="#step1" class="selected"> <span class="step-number">1</span> 
            <span class="step-title">How to get there</span> <span class="step-arrow"></span> 
            </a> </li>

					    
          <li id="whereToStay2"> <a href="#step2" class="next"> <span class="step-number">2</span> 
            <span class="step-title">Where to stay</span> <span class="step-arrow"></span> 
            </a> </li>

					    
          <li id="checkout3"> <a href="#step3" class="next"> <span class="step-number">3</span> 
            <span class="step-title">Check-Out</span> </a> </li>					    
					  </ul>
					</div>
				</div>

				<div class="container">
					
      <div class="wizard-steps"> 
        <div><a href="#"><span>4</span> Confirmation</a></div>
        <div class="completed-step"><a href="#step-one"><span>1</span> Account 
          Info</a></div>
        <div class="active-step"><a href="#step-two"><span>2</span> Contact Info</a></div>
        <div><a href="#"><span>3</span> Security Question</a></div>
      </div>
				</div>

				<div class="container transportContainer" id="transportContainer">
					<div class="transport-options">
						<div class="transport-menu">
							<ul>
								<li><a href="#flight" class="flight active">Flight</a></li>
							</ul>
						</div>
						<!--Flight Div -->
						<div class="transport-details" id="flight"></div>						
					</div>
                      <div class="howToGetThere next_button_out"><a href="#step2" class="next">Next</a></div>
				</div>
	          
    		

				<div class="container hotelContainer" id="hotelContainer" style="display: none;">
					<div class="stay-options">
						<div class="stay-menu">
							<ul>								
								<li><a href="#hotel" class="hotel active">Hotel</a></li>								
							</ul>
						</div>

						<div class="stay-details" id="hotel" style="display: block;">
							<div class="stay-content-wrap">
								<div class="stay-left">
								</div>
								<div class="stay-right">
									<div class="stay-row-details">
										<div class="image-gallery">
											<div class="gallery-main"></div>
											<div class="gallery-thumbs"></div>
										</div>
										<div class="stay-info-wrap">
											<ul class="tabs">
												<!--<li><a href="#info" tab-content="info" class="stay-tab active">Hotel Info</a></li>-->
												<li><a href="#types" tab-content="types" class="stay-tab">Room Types</a></li>												
											</ul>
											<div class="stay-info">
												<!--<div class="tab-content info"></div>-->
												<div class="tab-content types" id="divRooms"></div>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
                     <div class="whereToStay2 next_button_out"><a href="#step2" class="next">Next</a></div>
                    
				</div>
				
				
				<div class="container checkoutContainer" id="checkoutContainer" style="display: none;">
					<div class="stay-options">
						<div class="stay-menu">
							<ul>								
								<li><a href="#hotel" class="hotel active">Check-Out</a></li>								
							</ul>
						</div>

						<div class="stay-details" id="checkoutPage" style="display: block;">
							<h3 style="color:#105B63;">Your Order Details</h3>
														
							  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 <!--update_by_nirmaljeet-->  
 
  <script>
 //  $(function() {
 //    //$( "#tabs" ).tabs();
	// $( '.air_plane, .car, .train, .bus, .cruise, .bed, .apartment, .hotels' ).tooltip({
	// 	position: { my: "center bottom", at: "center top",  }
	// });
	// /*start code by nirmaljit */
	// $(window).scroll(function(){
	// 	var sticky = $('#fixed_menu'),
	// 	scroll = $(window).scrollTop();

	// 	if (scroll >= 100) {			
	// 		sticky.addClass('fixed');  
	// 		if($( window ).width()<768) {				
	// 		}
	// 	} else {    			
	// 		sticky.removeClass('fixed');
	// 	} 
	// });
	
	// /* end code by nirmal*/
 //  });
  </script>
 <!--update_by_nirmaljeet_end-->
<div class="checkoutDetails">

<div style="width:100%;float:left;">
<h4 style="color:#105B63;">Flight Details</h4>
<hr>

<div class="checkoutDetailsDivLeft">Airlines Name</div><div class="checkoutDetailsDivMid">:</div><div class="checkoutDetailsDivRight" id="chkoutAirlinesName"></div>
<h4 style="color:#105B63;">Onward Journey</h4>
<div class="checkoutDetailsDivLeft">Departure Date/Time</div><div class="checkoutDetailsDivMid">:</div><div class="checkoutDetailsDivRight" id="chkoutAirlinesDeptName"></div>
<div class="checkoutDetailsDivLeft">Arival Date/Time</div><div class="checkoutDetailsDivMid">:</div><div class="checkoutDetailsDivRight" id="chkoutAirlinesArrivalTime"></div>
<div class="checkoutDetailsDivLeft">Total Estimation Time</div><div class="checkoutDetailsDivMid">:</div ><div class="checkoutDetailsDivRight" id="chkoutAirlinesTotalTime"></div>

<div id="checkoutReturnFlightDetails" style='display:none;'>
	<h4 style="color:#105B63;">Return Journey</h4>
	<div class="checkoutDetailsDivLeft">Departure Date/Time</div><div class="checkoutDetailsDivMid">:</div><div class="checkoutDetailsDivRight" id="chkoutAirlinesDeptName2"></div>
	<div class="checkoutDetailsDivLeft">Arival Date/Time</div><div class="checkoutDetailsDivMid">:</div><div class="checkoutDetailsDivRight" id="chkoutAirlinesArrivalTime2"></div>
	<div class="checkoutDetailsDivLeft">Total Estimation Time</div><div class="checkoutDetailsDivMid">:</div ><div class="checkoutDetailsDivRight" id="chkoutAirlinesTotalTime2"></div>
</div>

<div class="checkoutDetailsDivLeft">Flight Price</div><div class="checkoutDetailsDivMid">:</div><div class="checkoutDetailsDivRight" id="chkoutAirlinesPrice"></div>
</div>


<div style="width:100%;float:left;">
<h4 style="color:#105B63;">Hotel Details</h4>
<hr>
<div class="checkoutDetailsDivLeft">Hotel Name</div><div class="checkoutDetailsDivMid">:</div><div class="checkoutDetailsDivRight" id="chkoutHotelName"></div>
<div class="checkoutDetailsDivLeft">Address</div><div class="checkoutDetailsDivMid">:</div><div class="checkoutDetailsDivRight" id="chkoutHotelAddr"></div>
<div class="checkoutDetailsDivLeft">Hotel Price</div><div class="checkoutDetailsDivMid">:</div><div class="checkoutDetailsDivRight" id="chkoutHotelPrice"></div>
</div>
<div style="width:100%;float:left;">
<h3>You need to pay  </h3><p class='total_cost' id="checkoutTotalCost"></p>
</div>
</div> 

<div class="passangerDetails">
	<form method="post" id="personalForm" >
            	<table>              
				<caption><h3 style="color:#105B63;text-align:left">Kindly fill-up the following details</h3></caption>
				<tr><td colspan="3" style="height:10px;"></td></tr>
                	<tr><td>First Name<span>*</span></td><td>:</td><td><input type="text" name="passanger_first_name" value=""  required="required"/></td></tr>
                    
					 <tr><td>Last Name<span>*</span></td><td>:</td><td><input type="text" name="passanger_last_name" value=""  required="required"/></td></tr>

					<tr><td>Sex<span>*</span></td><td>:</td> <td><select name="passanger_sex"><option value="Male">Male</option><option value="Female">Female</option></select></td></tr>
                    
					 <tr><td>Mobile<span>*</span></td><td>:</td><td><input type="text" name="passanger_mobile" value=""  required="required"/></td></tr>
                  
                     <tr><td>Email<span>*</span></td><td>:</td><td><input type="text" name="passanger_email" value=""  required="required"/></td></tr>

					 <tr><td>City<span>*</span></td><td>:</td><td><input type="text" name="passanger_city" value=""  required="required"/></td></tr>

					 <tr><td>Country<span>*</span></td><td>:</td><td>
                        <select name="passanger_country" required="required">
                            	                            		<option value="GB">United Kingdom</option>
                                                            		<option value="US">United States</option>
                                                            		<option value="AF">Afghanistan</option>
                                                            		<option value="AL">Albania</option>
                                                            		<option value="DZ">Algeria</option>
                                                            		<option value="AS">American Samoa</option>
                                                            		<option value="AD">Andorra</option>
                                                            		<option value="AO">Angola</option>
                                                            		<option value="AI">Anguilla</option>
                                                            		<option value="AQ">Antarctica</option>
                                                            		<option value="AG">Antigua And Barbuda</option>
                                                            		<option value="AR">Argentina</option>
                                                            		<option value="AM">Armenia</option>
                                                            		<option value="AW">Aruba</option>
                                                            		<option value="AU">Australia</option>
                                                            		<option value="AT">Austria</option>
                                                            		<option value="AZ">Azerbaijan</option>
                                                            		<option value="BS">Bahamas</option>
                                                            		<option value="BD">Bangladesh</option>
                                                            		<option value="BB">Barbados</option>
                                                            		<option value="BY">Belarus</option>
                                                            		<option value="BE">Belgium</option>
                                                            		<option value="BZ">Belize</option>
                                                            		<option value="BJ">Benin</option>
                                                            		<option value="BM">Bermuda</option>
                                                            		<option value="BT">Bhutan</option>
                                                            		<option value="BO">Bolivia</option>
                                                            		<option value="BA">Bosnia And Herzegowina</option>
                                                            		<option value="BW">Botswana</option>
                                                            		<option value="BV">Bouvet Island</option>
                                                            		<option value="BR">Brazil</option>
                                                            		<option value="IO">British Indian Ocean Territory</option>
                                                            		<option value="BN">Brunei Darussalam</option>
                                                            		<option value="BG">Bulgaria</option>
                                                            		<option value="BF">Burkina Faso</option>
                                                            		<option value="BI">Burundi</option>
                                                            		<option value="KH">Cambodia</option>
                                                            		<option value="CM">Cameroon</option>
                                                            		<option value="CA">Canada</option>
                                                            		<option value="CV">Cape Verde</option>
                                                            		<option value="KY">Cayman Islands</option>
                                                            		<option value="CF">Central African Republic</option>
                                                            		<option value="TD">Chad</option>
                                                            		<option value="CL">Chile</option>
                                                            		<option value="CN">China</option>
                                                            		<option value="CX">Christmas Island</option>
                                                            		<option value="CC">Cocos (Keeling) Islands</option>
                                                            		<option value="CO">Colombia</option>
                                                            		<option value="KM">Comoros</option>
                                                            		<option value="CG">Congo</option>
                                                            		<option value="CD">Congo, The Democratic Republic Of The</option>
                                                            		<option value="CK">Cook Islands</option>
                                                            		<option value="CR">Costa Rica</option>
                                                            		<option value="CI">Cote D'Ivoire</option>
                                                            		<option value="HR">Croatia (Local Name: Hrvatska)</option>
                                                            		<option value="CU">Cuba</option>
                                                            		<option value="CY">Cyprus</option>
                                                            		<option value="CZ">Czech Republic</option>
                                                            		<option value="DK">Denmark</option>
                                                            		<option value="DJ">Djibouti</option>
                                                            		<option value="DM">Dominica</option>
                                                            		<option value="DO">Dominican Republic</option>
                                                            		<option value="TP">East Timor</option>
                                                            		<option value="EC">Ecuador</option>
                                                            		<option value="EG">Egypt</option>
                                                            		<option value="SV">El Salvador</option>
                                                            		<option value="GQ">Equatorial Guinea</option>
                                                            		<option value="ER">Eritrea</option>
                                                            		<option value="EE">Estonia</option>
                                                            		<option value="ET">Ethiopia</option>
                                                            		<option value="FK">Falkland Islands (Malvinas)</option>
                                                            		<option value="FO">Faroe Islands</option>
                                                            		<option value="FJ">Fiji</option>
                                                            		<option value="FI">Finland</option>
                                                            		<option value="FR">France</option>
                                                            		<option value="FX">France, Metropolitan</option>
                                                            		<option value="GF">French Guiana</option>
                                                            		<option value="PF">French Polynesia</option>
                                                            		<option value="TF">French Southern Territories</option>
                                                            		<option value="GA">Gabon</option>
                                                            		<option value="GM">Gambia</option>
                                                            		<option value="GE">Georgia</option>
                                                            		<option value="DE">Germany</option>
                                                            		<option value="GH">Ghana</option>
                                                            		<option value="GI">Gibraltar</option>
                                                            		<option value="GR">Greece</option>
                                                            		<option value="GL">Greenland</option>
                                                            		<option value="GD">Grenada</option>
                                                            		<option value="GP">Guadeloupe</option>
                                                            		<option value="GU">Guam</option>
                                                            		<option value="GT">Guatemala</option>
                                                            		<option value="GN">Guinea</option>
                                                            		<option value="GW">Guinea-Bissau</option>
                                                            		<option value="GY">Guyana</option>
                                                            		<option value="HT">Haiti</option>
                                                            		<option value="HM">Heard And Mc Donald Islands</option>
                                                            		<option value="VA">Holy See (Vatican City State)</option>
                                                            		<option value="HN">Honduras</option>
                                                            		<option value="HK">Hong Kong</option>
                                                            		<option value="HU">Hungary</option>
                                                            		<option value="IS">Iceland</option>
                                                            		<option value="IN">India</option>
                                                            		<option value="ID">Indonesia</option>
                                                            		<option value="IR">Iran (Islamic Republic Of)</option>
                                                            		<option value="IQ">Iraq</option>
                                                            		<option value="IE">Ireland</option>
                                                            		<option value="IL">Israel</option>
                                                            		<option value="IT">Italy</option>
                                                            		<option value="JM">Jamaica</option>
                                                            		<option value="JP">Japan</option>
                                                            		<option value="JO">Jordan</option>
                                                            		<option value="KZ">Kazakhstan</option>
                                                            		<option value="KE">Kenya</option>
                                                            		<option value="KI">Kiribati</option>
                                                            		<option value="KP">Korea, Democratic People's Republic Of</option>
                                                            		<option value="KR">Korea, Republic Of</option>
                                                            		<option value="KW">Kuwait</option>
                                                            		<option value="KG">Kyrgyzstan</option>
                                                            		<option value="LA">Lao People's Democratic Republic</option>
                                                            		<option value="LV">Latvia</option>
                                                            		<option value="LB">Lebanon</option>
                                                            		<option value="LS">Lesotho</option>
                                                            		<option value="LR">Liberia</option>
                                                            		<option value="LY">Libyan Arab Jamahiriya</option>
                                                            		<option value="LI">Liechtenstein</option>
                                                            		<option value="LT">Lithuania</option>
                                                            		<option value="LU">Luxembourg</option>
                                                            		<option value="MO">Macau</option>
                                                            		<option value="MK">Macedonia, Former Yugoslav Republic Of</option>
                                                            		<option value="MG">Madagascar</option>
                                                            		<option value="MW">Malawi</option>
                                                            		<option value="MY">Malaysia</option>
                                                            		<option value="MV">Maldives</option>
                                                            		<option value="ML">Mali</option>
                                                            		<option value="MT">Malta</option>
                                                            		<option value="MH">Marshall Islands</option>
                                                            		<option value="MQ">Martinique</option>
                                                            		<option value="MR">Mauritania</option>
                                                            		<option value="MU">Mauritius</option>
                                                            		<option value="YT">Mayotte</option>
                                                            		<option value="MX">Mexico</option>
                                                            		<option value="FM">Micronesia</option>
                                                            		<option value="MD">Moldova, Republic Of</option>
                                                            		<option value="MC">Monaco</option>
                                                            		<option value="MN">Mongolia</option>
                                                            		<option value="MS">Montserrat</option>
                                                            		<option value="MA">Morocco</option>
                                                            		<option value="MZ">Mozambique</option>
                                                            		<option value="MM">Myanmar</option>
                                                            		<option value="NA">Namibia</option>
                                                            		<option value="NR">Nauru</option>
                                                            		<option value="NP">Nepal</option>
                                                            		<option value="NL">Netherlands</option>
                                                            		<option value="AN">Netherlands Antilles</option>
                                                            		<option value="NC">New Caledonia</option>
                                                            		<option value="NZ">New Zealand</option>
                                                            		<option value="NI">Nicaragua</option>
                                                            		<option value="NE">Niger</option>
                                                            		<option value="NG">Nigeria</option>
                                                            		<option value="NU">Niue</option>
                                                            		<option value="NF">Norfolk Island</option>
                                                            		<option value="MP">Northern Mariana Islands</option>
                                                            		<option value="NO">Norway</option>
                                                            		<option value="OM">Oman</option>
                                                            		<option value="PK">Pakistan</option>
                                                            		<option value="PW">Palau</option>
                                                            		<option value="PA">Panama</option>
                                                            		<option value="PG">Papua New Guinea</option>
                                                            		<option value="PY">Paraguay</option>
                                                            		<option value="PE">Peru</option>
                                                            		<option value="PH">Philippines</option>
                                                            		<option value="PN">Pitcairn</option>
                                                            		<option value="PL">Poland</option>
                                                            		<option value="PT">Portugal</option>
                                                            		<option value="PR">Puerto Rico</option>
                                                            		<option value="QA">Qatar</option>
                                                            		<option value="RE">Reunion</option>
                                                            		<option value="RO">Romania</option>
                                                            		<option value="RU">Russian Federation</option>
                                                            		<option value="RW">Rwanda</option>
                                                            		<option value="KN">Saint Kitts And Nevis</option>
                                                            		<option value="LC">Saint Lucia</option>
                                                            		<option value="VC">Saint Vincent And The Grenadines</option>
                                                            		<option value="WS">Samoa</option>
                                                            		<option value="SM">San Marino</option>
                                                            		<option value="ST">Sao Tome And Principe</option>
                                                            		<option value="SA">Saudi Arabia</option>
                                                            		<option value="SN">Senegal</option>
                                                            		<option value="SC">Seychelles</option>
                                                            		<option value="SL">Sierra Leone</option>
                                                            		<option value="SG">Singapore</option>
                                                            		<option value="SK">Slovakia (Slovak Republic)</option>
                                                            		<option value="SI">Slovenia</option>
                                                            		<option value="SB">Solomon Islands</option>
                                                            		<option value="SO">Somalia</option>
                                                            		<option value="ZA">South Africa</option>
                                                            		<option value="GS">South Georgia, South Sandwich Islands</option>
                                                            		<option value="ES">Spain</option>
                                                            		<option value="LK">Sri Lanka</option>
                                                            		<option value="SH">St. Helena</option>
                                                            		<option value="PM">St. Pierre And Miquelon</option>
                                                            		<option value="SD">Sudan</option>
                                                            		<option value="SR">Suriname</option>
                                                            		<option value="SJ">Svalbard And Jan Mayen Islands</option>
                                                            		<option value="SZ">Swaziland</option>
                                                            		<option value="SE">Sweden</option>
                                                            		<option value="CH">Switzerland</option>
                                                            		<option value="SY">Syrian Arab Republic</option>
                                                            		<option value="TW">Taiwan</option>
                                                            		<option value="TJ">Tajikistan</option>
                                                            		<option value="TZ">Tanzania, United Republic Of</option>
                                                            		<option value="TH">Thailand</option>
                                                            		<option value="TG">Togo</option>
                                                            		<option value="TK">Tokelau</option>
                                                            		<option value="TO">Tonga</option>
                                                            		<option value="TT">Trinidad And Tobago</option>
                                                            		<option value="TN">Tunisia</option>
                                                            		<option value="TR">Turkey</option>
                                                            		<option value="TM">Turkmenistan</option>
                                                            		<option value="TC">Turks And Caicos Islands</option>
                                                            		<option value="TV">Tuvalu</option>
                                                            		<option value="UG">Uganda</option>
                                                            		<option value="UA">Ukraine</option>
                                                            		<option value="AE">United Arab Emirates</option>
                                                            		<option value="UM">United States Minor Outlying Islands</option>
                                                            		<option value="UY">Uruguay</option>
                                                            		<option value="UZ">Uzbekistan</option>
                                                            		<option value="VU">Vanuatu</option>
                                                            		<option value="VE">Venezuela</option>
                                                            		<option value="VN">Viet Nam</option>
                                                            		<option value="VG">Virgin Islands (British)</option>
                                                            		<option value="VI">Virgin Islands (U.S.)</option>
                                                            		<option value="WF">Wallis And Futuna Islands</option>
                                                            		<option value="EH">Western Sahara</option>
                                                            		<option value="YE">Yemen</option>
                                                            		<option value="YU">Yugoslavia</option>
                                                            		<option value="ZM">Zambia</option>
                                                            		<option value="ZW">Zimbabwe</option>
                                                            </select>
                        </td>
                    </tr>

                       <tr> <td>Zip<span>*</span></td><td>:</td><td><input type="text" name="passanger_zip" value=""  required="required"/></td></tr>
						<tr><td colspan="3" style="height:10px;"></td></tr>
						<tr>                   
                        <td colspan="2" style="text-align:right;">
						<button id = "btn" onClick="return validate();"><img src="images/submit.png" style="cursor: pointer;"></button>                        
                        </td>
						<td style="text-align:right;">
						<input type="reset" class="addMoreBtn" id="btnAddMore" name="btnAddMore" value="">						                       
                        </td>
						
                    </tr>  
                    </table>
				</form>
</div>

<div id="tabs" style="width:100%;float:right;">
  <ul>
    <li><a href="#tabs-1"><img src="images/paypal.png"></a></li>
    <li><a href="#tabs-2">Credit Card</a></li>   
  </ul>
  <div id="tabs-1">
  
  <input type="hidden" id="hdnTotalCost">

<p id="newtxt"></p>

<form name='_xclick' action='https://www.sandbox.paypal.com/cgi-bin/webscr' method='post'>
    		 <input type='hidden' name='cmd' value='_xclick'>
		 <input type='hidden' name='business' value='r.ponting20-facilitator@yahoo.com'>
		 <input type='hidden' name='currency_code' value='EUR'>
		 <input type='hidden' name='notify_url' value='http://we-travel.co/qa/success.php'>
		 <input type='hidden' name='return' value='http://we-travel.co/qa/success.php'>   
		 <input type='hidden' name='item_name' value='We Travel Trip'>
		 <input type='hidden' name='amount' id="amount">		 	
		 <input style='margin-top: 25px;' type='image' src="images/paypal_checkout.png" border='0' class="paypalBtn" name='submit' alt='Make payments with PayPal - its fast, free and secure!'></form>
		 
  </div>
  <div id="tabs-2">
<form method="post" action="paypal_pro.php" >
            	<table>              
                	<tr><td>First Name<span>*</span></td><td>:</td><td><input type="text" name="customer_first_name" value=""  required="required"/></td>
                    <td style="width:50px;"></td><td>Last Name<span>*</span></td><td>:</td><td><input type="text" name="customer_last_name" value=""  required="required"/></td></tr>
					 
					<tr><td>Address1<span>*</span></td><td>:</td><td><input type="text" name="customer_address1" value=""  required="required"/></td> <td style="width:50px;"></td><td>City<span>*</span></td><td>:</td><td><input type="text" name="customer_city" value=""  required="required"/></td></tr>

                    	<td>Credit card type<span>*</span></td><td>:</td><td>
                        	<select name="customer_credit_card_type" style="width:155px;">
                            	<option value="visa">Visa</option>
                                <option value="master_card">Master Card</option>
                                <option value="discocer">Discover</option>
                                <option value="visa">Visa</option>
                            </select>
                        </td> <td style="width:50px;"></td>
					   <td>Credit Card No<span>*</span></td><td>:</td><td><input type="text" name="customer_credit_card_number" value=""  required="required"/></td></tr>
						
						<tr><td>Expiration Date<span>*</span></td>
                        <td>:</td><td>
                        	<select name="cc_expiration_month" style="width: 70px;">
                            	                                	<option value="1">1</option>
                                                                	<option value="2">2</option>
                                                                	<option value="3">3</option>
                                                                	<option value="4">4</option>
                                                                	<option value="5">5</option>
                                                                	<option value="6">6</option>
                                                                	<option value="7">7</option>
                                                                	<option value="8">8</option>
                                                                	<option value="9">9</option>
                                                                	<option value="10">10</option>
                                                                	<option value="11">11</option>
                                                                	<option value="12">12</option>
                                                            </select>
                            <select name="cc_expiration_year" style="width: 70px; margin-left: 10px;">
                            	                                	<option value="2012">2012</option>
                                                                	<option value="2013">2013</option>
                                                                	<option value="2014">2014</option>
                                                                	<option value="2015">2015</option>
                                                                	<option value="2016">2016</option>
                                                                	<option value="2017">2017</option>
                                                                	<option value="2018">2018</option>
                                                                	<option value="2019">2019</option>
                                                                	<option value="2020">2020</option>
                                                            </select>
                        </td> <td style="width:50px;"></td>							
                    	<td>Card Varification No<span>*</span></td> <td>:</td><td><input type="text" name="cc_cvv2_number" value=""  required="required"/></td> </tr>
                        
                        
				      <tr><td>State Code<span>*</span></td><td>:</td><td ><input type="text" name="customer_state" value=""  required="required"/></td><td style="width:50px;"></td><td>Zip<span>*</span></td><td>:</td><td><input type="text" name="customer_zip" value=""  required="required"/></td></tr>
                    
					    <tr><td>Country<span>*</span></td><td>:</td><td>
                        	                         	<select name="customer_country" required="required" style="width:155px;">
                            	                            		<option value="GB">United Kingdom</option>
                                                            		<option value="US">United States</option>
                                                            		<option value="AF">Afghanistan</option>
                                                            		<option value="AL">Albania</option>
                                                            		<option value="DZ">Algeria</option>
                                                            		<option value="AS">American Samoa</option>
                                                            		<option value="AD">Andorra</option>
                                                            		<option value="AO">Angola</option>
                                                            		<option value="AI">Anguilla</option>
                                                            		<option value="AQ">Antarctica</option>
                                                            		<option value="AG">Antigua And Barbuda</option>
                                                            		<option value="AR">Argentina</option>
                                                            		<option value="AM">Armenia</option>
                                                            		<option value="AW">Aruba</option>
                                                            		<option value="AU">Australia</option>
                                                            		<option value="AT">Austria</option>
                                                            		<option value="AZ">Azerbaijan</option>
                                                            		<option value="BS">Bahamas</option>
                                                            		<option value="BD">Bangladesh</option>
                                                            		<option value="BB">Barbados</option>
                                                            		<option value="BY">Belarus</option>
                                                            		<option value="BE">Belgium</option>
                                                            		<option value="BZ">Belize</option>
                                                            		<option value="BJ">Benin</option>
                                                            		<option value="BM">Bermuda</option>
                                                            		<option value="BT">Bhutan</option>
                                                            		<option value="BO">Bolivia</option>
                                                            		<option value="BA">Bosnia And Herzegowina</option>
                                                            		<option value="BW">Botswana</option>
                                                            		<option value="BV">Bouvet Island</option>
                                                            		<option value="BR">Brazil</option>
                                                            		<option value="IO">British Indian Ocean Territory</option>
                                                            		<option value="BN">Brunei Darussalam</option>
                                                            		<option value="BG">Bulgaria</option>
                                                            		<option value="BF">Burkina Faso</option>
                                                            		<option value="BI">Burundi</option>
                                                            		<option value="KH">Cambodia</option>
                                                            		<option value="CM">Cameroon</option>
                                                            		<option value="CA">Canada</option>
                                                            		<option value="CV">Cape Verde</option>
                                                            		<option value="KY">Cayman Islands</option>
                                                            		<option value="CF">Central African Republic</option>
                                                            		<option value="TD">Chad</option>
                                                            		<option value="CL">Chile</option>
                                                            		<option value="CN">China</option>
                                                            		<option value="CX">Christmas Island</option>
                                                            		<option value="CC">Cocos (Keeling) Islands</option>
                                                            		<option value="CO">Colombia</option>
                                                            		<option value="KM">Comoros</option>
                                                            		<option value="CG">Congo</option>
                                                            		<option value="CD">Congo, The Democratic Republic Of The</option>
                                                            		<option value="CK">Cook Islands</option>
                                                            		<option value="CR">Costa Rica</option>
                                                            		<option value="CI">Cote D\'Ivoire</option>
                                                            		<option value="HR">Croatia (Local Name: Hrvatska)</option>
                                                            		<option value="CU">Cuba</option>
                                                            		<option value="CY">Cyprus</option>
                                                            		<option value="CZ">Czech Republic</option>
                                                            		<option value="DK">Denmark</option>
                                                            		<option value="DJ">Djibouti</option>
                                                            		<option value="DM">Dominica</option>
                                                            		<option value="DO">Dominican Republic</option>
                                                            		<option value="TP">East Timor</option>
                                                            		<option value="EC">Ecuador</option>
                                                            		<option value="EG">Egypt</option>
                                                            		<option value="SV">El Salvador</option>
                                                            		<option value="GQ">Equatorial Guinea</option>
                                                            		<option value="ER">Eritrea</option>
                                                            		<option value="EE">Estonia</option>
                                                            		<option value="ET">Ethiopia</option>
                                                            		<option value="FK">Falkland Islands (Malvinas)</option>
                                                            		<option value="FO">Faroe Islands</option>
                                                            		<option value="FJ">Fiji</option>
                                                            		<option value="FI">Finland</option>
                                                            		<option value="FR">France</option>
                                                            		<option value="FX">France, Metropolitan</option>
                                                            		<option value="GF">French Guiana</option>
                                                            		<option value="PF">French Polynesia</option>
                                                            		<option value="TF">French Southern Territories</option>
                                                            		<option value="GA">Gabon</option>
                                                            		<option value="GM">Gambia</option>
                                                            		<option value="GE">Georgia</option>
                                                            		<option value="DE">Germany</option>
                                                            		<option value="GH">Ghana</option>
                                                            		<option value="GI">Gibraltar</option>
                                                            		<option value="GR">Greece</option>
                                                            		<option value="GL">Greenland</option>
                                                            		<option value="GD">Grenada</option>
                                                            		<option value="GP">Guadeloupe</option>
                                                            		<option value="GU">Guam</option>
                                                            		<option value="GT">Guatemala</option>
                                                            		<option value="GN">Guinea</option>
                                                            		<option value="GW">Guinea-Bissau</option>
                                                            		<option value="GY">Guyana</option>
                                                            		<option value="HT">Haiti</option>
                                                            		<option value="HM">Heard And Mc Donald Islands</option>
                                                            		<option value="VA">Holy See (Vatican City State)</option>
                                                            		<option value="HN">Honduras</option>
                                                            		<option value="HK">Hong Kong</option>
                                                            		<option value="HU">Hungary</option>
                                                            		<option value="IS">Iceland</option>
                                                            		<option value="IN">India</option>
                                                            		<option value="ID">Indonesia</option>
                                                            		<option value="IR">Iran (Islamic Republic Of)</option>
                                                            		<option value="IQ">Iraq</option>
                                                            		<option value="IE">Ireland</option>
                                                            		<option value="IL">Israel</option>
                                                            		<option value="IT">Italy</option>
                                                            		<option value="JM">Jamaica</option>
                                                            		<option value="JP">Japan</option>
                                                            		<option value="JO">Jordan</option>
                                                            		<option value="KZ">Kazakhstan</option>
                                                            		<option value="KE">Kenya</option>
                                                            		<option value="KI">Kiribati</option>
                                                            		<option value="KP">Korea, Democratic People's Republic Of</option>
                                                            		<option value="KR">Korea, Republic Of</option>
                                                            		<option value="KW">Kuwait</option>
                                                            		<option value="KG">Kyrgyzstan</option>
                                                            		<option value="LA">Lao People's Democratic Republic</option>
                                                            		<option value="LV">Latvia</option>
                                                            		<option value="LB">Lebanon</option>
                                                            		<option value="LS">Lesotho</option>
                                                            		<option value="LR">Liberia</option>
                                                            		<option value="LY">Libyan Arab Jamahiriya</option>
                                                            		<option value="LI">Liechtenstein</option>
                                                            		<option value="LT">Lithuania</option>
                                                            		<option value="LU">Luxembourg</option>
                                                            		<option value="MO">Macau</option>
                                                            		<option value="MK">Macedonia, Former Yugoslav Republic Of</option>
                                                            		<option value="MG">Madagascar</option>
                                                            		<option value="MW">Malawi</option>
                                                            		<option value="MY">Malaysia</option>
                                                            		<option value="MV">Maldives</option>
                                                            		<option value="ML">Mali</option>
                                                            		<option value="MT">Malta</option>
                                                            		<option value="MH">Marshall Islands</option>
                                                            		<option value="MQ">Martinique</option>
                                                            		<option value="MR">Mauritania</option>
                                                            		<option value="MU">Mauritius</option>
                                                            		<option value="YT">Mayotte</option>
                                                            		<option value="MX">Mexico</option>
                                                            		<option value="FM">Micronesia</option>
                                                            		<option value="MD">Moldova, Republic Of</option>
                                                            		<option value="MC">Monaco</option>
                                                            		<option value="MN">Mongolia</option>
                                                            		<option value="MS">Montserrat</option>
                                                            		<option value="MA">Morocco</option>
                                                            		<option value="MZ">Mozambique</option>
                                                            		<option value="MM">Myanmar</option>
                                                            		<option value="NA">Namibia</option>
                                                            		<option value="NR">Nauru</option>
                                                            		<option value="NP">Nepal</option>
                                                            		<option value="NL">Netherlands</option>
                                                            		<option value="AN">Netherlands Antilles</option>
                                                            		<option value="NC">New Caledonia</option>
                                                            		<option value="NZ">New Zealand</option>
                                                            		<option value="NI">Nicaragua</option>
                                                            		<option value="NE">Niger</option>
                                                            		<option value="NG">Nigeria</option>
                                                            		<option value="NU">Niue</option>
                                                            		<option value="NF">Norfolk Island</option>
                                                            		<option value="MP">Northern Mariana Islands</option>
                                                            		<option value="NO">Norway</option>
                                                            		<option value="OM">Oman</option>
                                                            		<option value="PK">Pakistan</option>
                                                            		<option value="PW">Palau</option>
                                                            		<option value="PA">Panama</option>
                                                            		<option value="PG">Papua New Guinea</option>
                                                            		<option value="PY">Paraguay</option>
                                                            		<option value="PE">Peru</option>
                                                            		<option value="PH">Philippines</option>
                                                            		<option value="PN">Pitcairn</option>
                                                            		<option value="PL">Poland</option>
                                                            		<option value="PT">Portugal</option>
                                                            		<option value="PR">Puerto Rico</option>
                                                            		<option value="QA">Qatar</option>
                                                            		<option value="RE">Reunion</option>
                                                            		<option value="RO">Romania</option>
                                                            		<option value="RU">Russian Federation</option>
                                                            		<option value="RW">Rwanda</option>
                                                            		<option value="KN">Saint Kitts And Nevis</option>
                                                            		<option value="LC">Saint Lucia</option>
                                                            		<option value="VC">Saint Vincent And The Grenadines</option>
                                                            		<option value="WS">Samoa</option>
                                                            		<option value="SM">San Marino</option>
                                                            		<option value="ST">Sao Tome And Principe</option>
                                                            		<option value="SA">Saudi Arabia</option>
                                                            		<option value="SN">Senegal</option>
                                                            		<option value="SC">Seychelles</option>
                                                            		<option value="SL">Sierra Leone</option>
                                                            		<option value="SG">Singapore</option>
                                                            		<option value="SK">Slovakia (Slovak Republic)</option>
                                                            		<option value="SI">Slovenia</option>
                                                            		<option value="SB">Solomon Islands</option>
                                                            		<option value="SO">Somalia</option>
                                                            		<option value="ZA">South Africa</option>
                                                            		<option value="GS">South Georgia, South Sandwich Islands</option>
                                                            		<option value="ES">Spain</option>
                                                            		<option value="LK">Sri Lanka</option>
                                                            		<option value="SH">St. Helena</option>
                                                            		<option value="PM">St. Pierre And Miquelon</option>
                                                            		<option value="SD">Sudan</option>
                                                            		<option value="SR">Suriname</option>
                                                            		<option value="SJ">Svalbard And Jan Mayen Islands</option>
                                                            		<option value="SZ">Swaziland</option>
                                                            		<option value="SE">Sweden</option>
                                                            		<option value="CH">Switzerland</option>
                                                            		<option value="SY">Syrian Arab Republic</option>
                                                            		<option value="TW">Taiwan</option>
                                                            		<option value="TJ">Tajikistan</option>
                                                            		<option value="TZ">Tanzania, United Republic Of</option>
                                                            		<option value="TH">Thailand</option>
                                                            		<option value="TG">Togo</option>
                                                            		<option value="TK">Tokelau</option>
                                                            		<option value="TO">Tonga</option>
                                                            		<option value="TT">Trinidad And Tobago</option>
                                                            		<option value="TN">Tunisia</option>
                                                            		<option value="TR">Turkey</option>
                                                            		<option value="TM">Turkmenistan</option>
                                                            		<option value="TC">Turks And Caicos Islands</option>
                                                            		<option value="TV">Tuvalu</option>
                                                            		<option value="UG">Uganda</option>
                                                            		<option value="UA">Ukraine</option>
                                                            		<option value="AE">United Arab Emirates</option>
                                                            		<option value="UM">United States Minor Outlying Islands</option>
                                                            		<option value="UY">Uruguay</option>
                                                            		<option value="UZ">Uzbekistan</option>
                                                            		<option value="VU">Vanuatu</option>
                                                            		<option value="VE">Venezuela</option>
                                                            		<option value="VN">Viet Nam</option>
                                                            		<option value="VG">Virgin Islands (British)</option>
                                                            		<option value="VI">Virgin Islands (U.S.)</option>
                                                            		<option value="WF">Wallis And Futuna Islands</option>
                                                            		<option value="EH">Western Sahara</option>
                                                            		<option value="YE">Yemen</option>
                                                            		<option value="YU">Yugoslavia</option>
                                                            		<option value="ZM">Zambia</option>
                                                            		<option value="ZW">Zimbabwe</option>
                                                            </select>
                        </td>
                    </tr>
                <tr><td colspan="7" style="height:10px;"></td></tr>
                    <tr>                   
                        <td  colspan="7" style="text-align:right;">
						<input type='hidden' name='payment_amuont' id="payment_amuont">                
                        	<input type="submit" name="submit" value="Pay Now" class="btnPayNow" required="required"/>
                        </td>
                    </tr>               	
                	
                </table>
                </form>
  </div> 
</div>


							</div>
						</div>
					</div>
				</div>
</div>

	</section>
    <!--wrapper ends here-->
    <!--footer starts here-->
    <footer>
		<div class="main">
			<p>Copyright 2014 - We.Travel - All right reserved!</p>
			<ul>
				<li><a href="#">about us  |</a></li>
				<li><a href="#">credits  |</a></li>
				<li><a href="#">terms of use  |</a></li>
				<li><a href="#">contact</a></li>
			</ul>
			<div class="clear_both"></div>
		</div>
	</footer>
    <!--footer ends here-->

    <script type="text/javascript" src="js/jquery.min.js"></script>

    <script type="text/javascript" src="js/jquery-ui.js"></script>

    <script type="text/javascript" src="js/jquery.placeholder.js"></script>

    <!-- <script type="text/javascript" src="js/jquery.anystretch.min.js"></script>  -->

    <script>
	(function(a){a.anystretch=function(d,c,e){}})(jQuery);
    </script>

    <script type="text/javascript" src="js/scripts.js"></script>

    <script type="text/javascript" src="js/wetravel.js"></script>

    <div class="hidden_row" style="display: none">
        <div>
            <div id="col" class="col-md-12">
                
      <div class="city-box"> <img src="images/backgrounds/background3.jpg" class="city-bg-image"> 
        <div class="city_bg"> 
          <div class="city_name left_pad city_left"> 
            <p class="city_details"> <span class="bubble_icon"></span><span class="ciy_name"><span class="coutry_name"></span> 
              </span><span class="results_weather_icon"></span><span class="temperature"></span> 
            </p>
            <div class="city_options"> 
              <!--<p>Over <span class="number">50</span> stay options to choose from</p>-->
            </div>
          </div>
          <div class="city_right"> 
            <p class="total_cost"> </p>
          </div>
          <div class="clear_both"> </div>
        </div>
        <div class="city_btm"> 
          <div class="cost_time left_pad"> <!-- <span class="car_icon cost_pad_right"></span> 
            <span class="cost" id="car_cost"></span> -->
            <span class="plane_icon cost_pad_right"></span><span class="cost" id="flight_cost"></span> 
            <span class="building_icon cost_pad_right"></span><span class="cost" id="hotel_cost"></span> 
            <span class="time_icon cost_pad_right"></span><span class="journey_time"></span> 
            <div class="clear_both"> </div>
          </div>
          <div class="social_info left_pad"> 
            <div class="social_left_side"> 
              <div class="social_left_info"> <span class="fb_icon"></span> 
                <p> Sorin Pavel, Bogdan Tanase, Simone and Andrei Trusca live 
                  here</p>
              </div>
              <div class="fb_imgs"> <img src="images/fb_imgs.jpg" alt="fb images"> 
                <img src="images/fb_imgs.jpg" alt="fb images"> <img src="images/fb_imgs.jpg" alt="fb images"> 
                <img src="images/fb_imgs.jpg" alt="fb images"> <img src="images/fb_imgs.jpg" alt="fb images"> 
                <img src="images/fb_imgs.jpg" alt="fb images"> </div>
              <div class="clear_both"> </div>
            </div>
            <a href="#" class="book_it">Book it</a> 
            <div class="clear_both"> </div>
          </div>
        </div>
      </div>
            </div>
        </div>
    </div>
    <div id="flightRow-twoway" style="display: none;">
        <div class="row-transport two-way">
            <div class="col-details">
                <div class="span-1">
                    <div class="logo-1" id="carrier">
                        <img src="images/logo-big.png" />
                    </div>
                </div>
                <div class="span-1">
                    <div class="transport-icon flight-up">
                    </div>
                </div>
                <div class="span-2">
                    <div class="time-address">
                        <p class="time" id="fromDepartureDateTime">
                        </p>
                        <p class="address fromAddress">
                        </p>
                    </div>
                    <div class="time-address">
                        <p class="time" id="toDepartureDateTime">
                        </p>
                        <p class="address toAddress">
                        </p>
                    </div>
                </div>
                <div class="span-1 retFlight">
                    <div class="transport-icon flight-down">
                    </div>
                </div>
                <div class="span-2 retFlight">
                    <div class="time-address">
                        <p class="time" id="toArrivalDateTime">
                        </p>
                        <p class="address toAddress">
                        </p>
                    </div>
                    <div class="time-address">
                        <p class="time" id="fromArrivalDateTime">
                        </p>
                        <p class="address fromAddress">
                        </p>
                    </div>
                </div>
                <div class="span-1">
                    <div class="transport-icon time">
                    </div>
                </div>
                <div class="span-1">
                    <p class="duration" id="upDuration"></p>
                    <p class="duration" id="retDuration"></p>
                </div>
            </div>
            <div class="col-price">
                <p id="price"></p>
            </div>
        </div>
    </div>
    <div id="flightRow-oneway" style="display: none;">
        <div class="row-transport">
            
    <div class="col-details"> 
      <div class="span-1"> 
        <div class="logo-1" id="Div1"> <img src="images/logo-big.png" /> </div>
      </div>
      <div class="span-1"> 
        <div class="transport-icon flight-up"> </div>
      </div>
      <div class="span-2"> 
        <div class="time-address"> 
          <p class="time" id="fromDepartureDateTime"></p>
          <p class="address fromAddress"></p>
        </div>
      </div>
      <div class="span-1"> 
        <div class="transport-icon flight-down"> </div>
      </div>
      <div class="span-2"> 
        <div class="time-address"> 
          <p class="time" id="toArrivalDateTime"></p>
          <p class="address toAddress"></p>
        </div>
      </div>
      <div class="span-1"> 
        <div class="transport-icon time"> </div>
      </div>
      <div class="span-1"> 
        <p class="duration" id="upDuration"></p>
      </div>
    </div>
            <div class="col-price">
                <p id="price"></p>
            </div>
        </div>
    </div>
    <div id="hotelRow" style="display: none;">
        <div class="stay-row">
            <div class="stay-image">
            </div>
            <div class="stay-content">
                <p class="stay-stars">
                    <!--<img src="images/icon-star.png">
				<img src="images/icon-star.png">
				<img src="images/icon-star.png">
				<img src="images/icon-star.png">
				<img src="images/icon-star.png">-->
                </p>
                <p class="stay-title">
                </p>
                <p class="stay-address">
                </p>
                <p class="stay-features">
                </p>
                <!--<p class="stay-reviews">125 Reviews</p> -->
            </div>
            <div class="stay-cta">
                <p class="stay-book">
                    Book it</p>
                <p class="stay-price">
                </p>
            </div>
        </div>
    </div>
</body>
</html>
