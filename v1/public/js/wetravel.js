//var SERVICE_PATH = "http://we-travel.co/qa/services/";
var SERVICE_PATH = "http://localhost/wetravel/services/";
var searchReqNum = 0;
var arrCities = {
	'AMS': 'Amsterdam',
	'BER': 'Berlin',
	'BCN': 'Barcelona',
	'LON': 'London',
	'CPH': 'Copenhagen',
	'PAR': 'Paris',
	'IST': 'Istanbul',
	'BRU': 'Brussels',
	'AGP': 'Malaga',
	'ROM': 'Rome',
	'KRK': 'Krakow',
	'TLL': 'Tallin',
	'LIS': 'Lisbon',
	/*'SEN': 'SEN',
	'LTN': 'LTN',
	'LGW': 'LGW',
	'SFX': 'SFX'*/
}


var cityAlias = {
	'RTM': 'AMS', 'EIN': 'AMS', 'DUS': 'AMS', 
	'SXF': 'BER', 'THF': 'BER', 'TXL': 'BER',
	'BLA': 'BCN', 'GRO': 'BCN', 
	'LCY': 'LON', 'LGW': 'LON', 'LHR': 'LON', 'LOZ': 'LON', 'STN': 'LON', 'LTN': 'LON', 
	'MMX': 'CPH', 
	'LBG': 'PAR', 'ORY': 'PAR', 'PHT': 'PAR', 'PRX': 'PAR', 'XCR': 'PAR', 'CDG': 'PAR',
	'SAW': 'IST', 
	'ANR': 'BRU', 'CRL': 'BRU', 
	'GRX': 'AGP', 'GIB': 'AGP', 'SVQ': 'AGP', 
	'CIA': 'ROM', 'FCO': 'ROM', 'PEG': 'ROM', 
	'KTW': 'KRK', 
	'HEL': 'TLL', 'TAY': 'TLL', 'TKU': 'TLL',
	'FAO': 'LIS', 

};

var arrTemperaturesInF = {
	'AMS': [37, 39, 43, 47, 54, 59, 62, 63, 58, 52, 44, 40],
	'BER': [32, 34, 39, 47, 56, 63, 64, 64, 58, 49, 41, 34],
	'BCN': [49, 49, 53, 55, 60, 67, 73, 74, 71, 64, 55, 51],
	'LON': [41, 41, 45, 48, 55, 61, 64, 64, 59, 54, 46, 41],
	'CPH': [32, 33, 37, 43, 53, 59, 63, 62, 56, 49, 41, 36],
	'PAR': [41, 42, 47, 52, 59, 61, 69, 68, 61, 54, 45, 41],
	'IST': [43, 42, 46, 54, 61, 71, 74, 74, 69, 60, 53, 46],
	'BRU': [37, 37, 44, 48, 55, 59, 64, 64, 59, 53, 44, 40],
	'AGP': [55, 55, 59, 61, 65, 72, 77, 77, 74, 67, 61, 56],
	'ROM': [45, 45, 50, 55, 64, 73, 77, 77, 70, 63, 54, 46],
	'KRK': [34, 43, 46, 52, 57, 63, 68, 64, 59, 54, 43, 39], //TODO:
	'TLL': [41, 41, 45, 48, 55, 61, 64, 64, 61, 52, 45, 39], //TODO:
	'LIS': [52, 54, 57, 58, 64, 69, 74, 73, 73, 65, 57, 53],
};

function getMonCityTempInC(city, stMon) {
	var tempC = 'N/A';
	if(arrTemperaturesInF[getCityAlias(city)][stMon] != undefined && arrTemperaturesInF[getCityAlias(city)][stMon] != '') {
		var tempF = arrTemperaturesInF[getCityAlias(city)][stMon];

		tempC = Math.round((tempF - 32) * 5 / 9)+ ' &deg;C';
	}
	return tempC;
}

var inParams;

var selectedFlight, selectedHotel;


var getCityName = function(code) {
	if(arrCities[code] != undefined) {
		return arrCities[code];
	}else if(cityAlias[code] != undefined) {
		return getCityName(cityAlias[code])
	}else{
		return code;
	}
}

var getCityAlias = function(code) {

	if(cityAlias[code] != undefined) {
		return cityAlias[code];
	}else{
		return code;
	}
}
/*
$(document).ajaxStart(function(){
	$(".ajax-loader").show();

});
$(document).ajaxComplete(function(){
	$(".ajax-loader").hide();
});
*/

var resultTileSizes = {1: [12], 2: [6, 6]}
	/*getting city names from JSON*/
		loadCities = function(callback) {
			 $.getJSON("js/city_names.json", function( data1 ) {
				  var items = [];
					
				  $.each( data1, function( key, val ) {
					  if(data['from_place'] == val) {
						$("#from_place").append("<option value='" + val + "' selected='selected'>" + val + "</option>");
						$('.from .custom-combobox-input').attr('placeholder', val);
					  }else{
						  $("#from_place").append("<option value='" + val + "'>" + val + "</option>");			  
					  }
					  
					if (data['ToName'] == val) {
					    $("#ToName").append("<option value='" + val + "' selected='selected'>" + val + "</option>");
					    $('.to .custom-combobox-input').attr('placeholder', val);
					} else {
					    $("#ToName").append("<option value='" + val + "'>" + val + "</option>");
					}

				  });
				  $(".combobox").select(2);
				  callback();
			});
		}
	/*ends*/

		$(function() {
			
            $( "#from" ).datepicker( "setDate", data['from_date']);
            $( "#to" ).datepicker( "setDate", data['to_date']);

			loadCities(function(){
				var inParams1 = data;
				inParams1['destinations'] = ['AMS', 'BER', 'BCN', 'LON', 'CPH', 'PAR', 'IST'];				
				var results = getLowFareResults(inParams1);

				var inParams2 = data;
				inParams2['destinations'] = ['BRU', 'AGP', 'ROM', 'KRK', 'TLL', 'LIS'];
				getLowFareResults(inParams2);				

				//construct html div's for each destination.
			});


			$(".search_btn").click(function(){
				searchReqNum = 0;
				//{budget: "500", travellers: "2", from_date: "2014-09-20", to_date: "2014-09-22", from_place: "London(LON)"} 
				data['budget']		= $("#budget").val();
				data['travellers']	= $("#travellers").val();
				data['from_date']	= $("#from").val();
				data['to_date']		= $("#to").val();
				data['from_place']	= $('#from_place :selected').text();
				data['rooms']		= $('#rooms').val();

				var inParams1 = data;
				inParams1['destinations'] = ['BER', 'BCN', 'LON', 'CPH', 'PAR', 'IST'];
				getLowFareResults(inParams1);

				var inParams2 = data;
				inParams2['destinations'] = ['BRU', 'AGP', 'ROM', 'KRK', 'TLL', 'LIS'];
				getLowFareResults(inParams2);				
			});



		});


var totalDisplayedResults = 0;

var getLowFareResults = function(data) {
	var start = new Date().getTime();
	
	$(".results_container").html("");
	$(".results_container").show();
	$(".bookit_container").hide();
	$(".ajax-loader").show();
	$.ajax({
		url: SERVICE_PATH+"getLowFareResults.php",
		//url: SERVICE_PATH+"data/AMS_low_fare_search_results.php",
		data: data,
		success:function(result){	
			searchReqNum++
			$(".ajax-loader").hide();

			
			var stMon = parseInt(data.from_date.split('-')[1]);
		
			jsonObj = $.parseJSON(result);

			$('.travelportTime').html(jsonObj.processTime+'s');
			
			var totalDestinations = parseInt(jsonObj.totalDestinations);
			totalDisplayedResults += totalDestinations;

			if(searchReqNum ==2 && totalDisplayedResults == 0) {
				$(".results_container").append('<p class="msg">No results found with the selected criteria, Try Again</p>');
				return true;
			}

			if(totalDestinations>0 && totalDestinations <=3) {
				var rows = Math.floor(totalDestinations/2);
			}else{
				var rows = 2 + Math.floor((totalDestinations-3)/2);
			}

			var thisRowTilesCount = 0;
			var rowCount = 0;
			var isNewRow = true;
			$.each(jsonObj.destinations, function(k, destination) {
				var flightResults = destination.flightResults;

				if(flightResults.length == 0) {
					return;
				}
				var hotels = destination.hotelResults;
				var hotelMinAmount = 0;
				var hotelTotalMinAmount = 0;
				if(hotels && hotels.length > 0) {
					hotelMinAmount = hotels[0].MinimumAmountNum;
					hotelTotalMinAmount = hotels[0].TotalMinAmountNum;
				}

				var totalCost = parseFloat(flightResults[0].TotalPriceNum);
				totalCost += parseFloat(hotelTotalMinAmount);
				totalCost = totalCost.toFixed(2);

				var budget = parseFloat(data['budget']);
			
				if( isNaN(budget)) {
					budget = 400;
				}				

				if(totalCost > budget) {
					return;
				}


				if(k == "") return false;

				if(thisRowTilesCount % 12 == 0 && searchReqNum == 1) {
					rowCount++;
					isNewRow = true;
					thisRowTilesCount = 0;
				}else{
					isNewRow = false;
				}
				
				if(rowCount == 1) {
					if(totalDestinations == 2) {
						thisTileClass = 6;
					}else{
						thisTileClass = 12;
					}
				}else{
					thisTileClass = 6;
				}
				thisRowTilesCount += thisTileClass;

				var resultTile =  $($('.hidden_row').html());

				resultTile.find('#col').attr('class', 'col-md-'+thisTileClass);
				
				// Set the city Temperature
				var cityTemp = getMonCityTempInC(k, stMon); 


				resultTile.find('.ciy_name').prepend(getCityName(k));
				resultTile.find('.temperature').prepend(cityTemp); //TODO:
				//totalCost += 20;

				resultTile.find('.total_cost').prepend(totalCost+'&euro;');


				//TODO: if the city img doesn't exists, load the default one.
				resultTile.find('.city-bg-image').attr('src', 'images/backgrounds/'+getCityAlias(k)+'.png');

				//resultTile.find('#car_cost').prepend('20&euro;');
				resultTile.find('#flight_cost').prepend(flightResults[0].TotalPriceNum+'&euro;');
				resultTile.find('#hotel_cost').prepend(hotelTotalMinAmount+'&euro;'+'('+ hotelMinAmount+'&euro;)');

				var hours = Math.floor( flightResults[0].flights[0].TravelTime / 60); 
				if(hours > 0) {
					resultTile.find('.journey_time').prepend(hours +' hr');	
				}else{
					var mins = Math.floor( flightResults[0].flights[0].TravelTime); 
					resultTile.find('.journey_time').prepend(mins +' min');	
				}

				resultTile.find('.book_it').click(function(){
					bookIt(k, destination);
				});						


				if(isNewRow) {
					$(".results_container").append('<div class="row">');
				}
				$(".results_container").append(resultTile);

				if(thisRowTilesCount == 12) {
					$(".results_container").append('</div>');
				}
				
			});

			var end = new Date().getTime();
			var time = (end - start)/1000;			
			$(".totalProcessTime").html(time+'s');
		}
	});



} //getLowFareResults


function bookIt(k, destination) {
	$(".results_container").hide();	
	$('.debug').hide();

	var flightResults = destination.flightResults;
	var hotels = destination.hotelResults;
	var hotelMinAmount = 0;
	var hotelTotalMinAmount = 0;
	if(hotels.length > 0) {
		hotelMinAmount = hotels[0].MinimumAmountNum;
		hotelTotalMinAmount = hotels[0].TotalMinAmountNum;

		selectedHotel = hotels[0];
	}

	selectedFlight = flightResults[0];

	var totalCost = parseFloat(flightResults[0].TotalPriceNum);
	totalCost += parseFloat(hotelTotalMinAmount);
	totalCost = totalCost.toFixed(2);

	var budget = parseFloat(data['budget']);

	if( isNaN(budget)) {
		budget = 400;
	}				

	var resultTile =  $($('.bookit_container').html());

	resultTile.find('.ciy_name').html(getCityName(k));
	//resultTile.find('.temperature').prepend(cityTemp); //TODO:
	//totalCost += 20;

	resultTile.find('.total_cost').html(totalCost+'&euro;');


	//TODO: if the city img doesn't exists, load the default one.
	resultTile.find('.city-bg-image').attr('src', 'images/backgrounds/'+getCityAlias(k)+'.png');
	
	var stMon = parseInt(data.from_date.split('-')[1]);
	var cityTemp = getMonCityTempInC(k, stMon); 
	
	resultTile.find('.temperature').html(cityTemp);
	//resultTile.find('#car_cost').html('20&euro;');
	resultTile.find('#flight_cost').html(flightResults[0].TotalPriceNum+'&euro;');
	resultTile.find('#flight_time').html(flightResults[0].flights[0].TravelTime+' min');
	
	resultTile.find('#hotel_cost').html(hotelTotalMinAmount+'&euro;'+'('+ hotelMinAmount+'&euro;)');


	resultTile.find('#flight').html('');
	
	$.each(flightResults, function(num, flightsObj) {

		if(flightsObj.flights.length == 2 ) {
			var transportRow = $($('#flightRow-twoway').html());

			//transportRow.find('#carrier').html(flightsObj.flights[0].Carrier);
			transportRow.find('#carrier').html('<img src="images/airlines/'+flightsObj.flights[0].Carrier+'_70_48.jpg" width="70" height="48" alt="'+flightsObj.flights[0].Carrier+'"/>');
			transportRow.find('.fromAddress').html(flightsObj.flights[0].Origin);		
			transportRow.find('.toAddress').html(flightsObj.flights[0].Destination);
			transportRow.find('#price').html(flightsObj.TotalPriceNum+'&euro;');

			transportRow.find('#fromDepartureDateTime').html(flightsObj.flights[0].DepartureDate + ' ' +flightsObj.flights[0].DepartureTime);
			transportRow.find('#toArrivalDateTime').html(flightsObj.flights[0].ArrivalDate + ' ' +flightsObj.flights[0].ArrivalTime);

			transportRow.find('#toDepartureDateTime').html(flightsObj.flights[1].DepartureDate + ' ' +flightsObj.flights[1].DepartureTime);
			transportRow.find('#fromArrivalDateTime').html(flightsObj.flights[1].ArrivalDate + ' ' +flightsObj.flights[1].ArrivalTime);
			
			transportRow.find('#upDuration').html(flightsObj.flights[0].TravelTime+' min');
			transportRow.find('#retDuration').html(flightsObj.flights[1].TravelTime+' min');
			
		}else{
			var transportRow = $($('#flightRow-oneway').html());

			transportRow.find('#carrier').html('<img src="images/airlines/'+flightsObj.flights[0].Carrier+'_70_48.jpg" width="70" height="48" alt="'+flightsObj.flights[0].Carrier+'"/>');
			transportRow.find('.fromAddress').html(flightsObj.flights[0].Origin);		
			transportRow.find('.toAddress').html(flightsObj.flights[0].Destination);
			transportRow.find('#price').html(flightsObj.TotalPriceNum+'&euro;');	

			transportRow.find('#fromDepartureDateTime').html(flightsObj.flights[0].DepartureDate + ' ' +flightsObj.flights[0].DepartureTime);
			transportRow.find('#toArrivalDateTime').html(flightsObj.flights[0].ArrivalDate + ' ' +flightsObj.flights[0].ArrivalTime);

			transportRow.find('#upDuration').html(flightsObj.flights[0].TravelTime+' min');
		
		}
		transportRow.click(function(){			
			var totalCost = parseFloat(flightsObj.TotalPriceNum);
			resultTile.find('#flight_cost').html(totalCost.toFixed(2)+'&euro;');

			totalCost += parseFloat(hotelTotalMinAmount);
			totalCost = totalCost.toFixed(2);



			
			resultTile.find('.total_cost').html(totalCost+'&euro;');
			document.getElementById("hdnTotalCost").value = totalCost;			
			resultTile.find('#flight_time').html(flightsObj.flights[0].TravelTime+' min');

			selectedFlight = flightsObj;
			updateCheckoutDetails();
		});
		resultTile.find('#flight').append(transportRow);

	});
	resultTile.on('click', '.row-transport', function(){
		$('.row-transport').css('background', '#ededed');
		$(this).css('background', '#b5e0db');
		
	});


	resultTile.find("#backToResults").click(function(){		
		$(".bookit_container").hide();
		$(".results_container").show();	
			
	});


	resultTile.find("#howToGetThere").click(function(){
		$(this).find("a").attr('class', 'selected');
		resultTile.find("#whereToStay2").find("a").attr('class', 'next');
		resultTile.find("#checkout3").find("a").attr('class', 'next');

		$("#transportContainer").show();
		$("#hotelContainer").hide();
		$("#checkoutContainer").hide();		
	});

	resultTile.find("#whereToStay2, .howToGetThere").click(function(){
		$(this).find("a").attr('class', 'selected');
		resultTile.find("#checkout3").find("a").attr('class', 'next');
		resultTile.find("#howToGetThere").find("a").attr('class', 'next');

		$("#transportContainer").hide();
		$("#hotelContainer").show();
		$("#checkoutContainer").hide();
		
		showHotels(destination, resultTile);
	});
	
	resultTile.find("#checkout3, .whereToStay2").click(function(){
		updateCheckoutDetails();
		$(this).find("a").attr('class', 'selected');		
		resultTile.find("#whereToStay2").find("a").attr('class', 'next');
		resultTile.find("#howToGetThere").find("a").attr('class', 'next');
				
		$("#hotelContainer").hide();
		$("#transportContainer").hide();
		
		$("#checkoutContainer").show();
	});	

	$('.bookit_container').html(resultTile);
	$(".bookit_container").show();

	$("#transportContainer").show();
	$("#hotelContainer").hide();
	$("#checkoutContainer").hide();	
}

var flightSelected = function(flightsObj) {


}


var updateTemparature = function(loc, date, format, d) {

	var loc = '10001'; // or e.g. SPXX0050
	var u = 'c'; //format
	var depdate = from_date;
	var currentDate1 = new Date(Date.parse(depdate));

	var query = "SELECT item.condition FROM weather.forecast WHERE location='" + loc + "' AND u='" + u + "'";
	var cacheBuster = Math.floor((currentDate1.getTime()) / 1200 / 1000);
	var url = 'http://query.yahooapis.com/v1/public/yql?q=' + encodeURIComponent(query) + '&format=json&_nocache=' + cacheBuster;

	window['wxCallback'] = function(data) {
		var info = data.query.results.channel.item.condition;
		$('#wxIcon').css({
			backgroundPosition: '-' + (61 * info.code) + 'px 0'
		}).attr({
			title: info.text
		});
	
		resultTile.find('.temperature').prepend(info.temp + '&deg;' + (u.toUpperCase()));
	};

	$.ajax({
		url: url,
		dataType: 'jsonp',
		cache: true,
		jsonpCallback: 'wxCallback'
	});
	//tempurature ended	

}

var hotelsLoaded = false;

var showHotels = function(destination, resultTile) {

	//if(hotelsLoaded) return;

	var flightResults = destination.flightResults;
	

	var hotels = destination.hotelResults;

	var hotelTilesContainer = $(".stay-left");
	hotelTilesContainer.html('');

	$.each(hotels, function(k, hotel){

		var totalCost = parseFloat(flightResults[0].TotalPriceNum);

		var hotelTile =  $($('#hotelRow').html());

		hotelTile.find('.stay-image').html('<img src="images/hotels/'+hotel.HotelCode+'/'+hotel.HotelCode+'.jpg" onerror="this.onerror=null; this.src=\'images/hotel.png\';title=\'click to see images\'">');
		hotelTile.find('.stay-title').html(hotel.Name);
		hotelTile.find('.stay-address').html(hotel.Address);
		hotelTile.find('.stay-features').html('');
		hotelTile.find('.stay-price').html(hotel.TotalMinAmountNum+'&euro;');

		totalCost += parseFloat(hotel.TotalMinAmountNum);
		totalCost = totalCost.toFixed(2);

		hotelTile.click(function(){				
			resultTile.find('#hotel_cost').html(hotel.TotalMinAmountNum+'&euro;'+'('+ hotel.MinimumAmountNum+'&euro;)');
			resultTile.find('.total_cost').html(totalCost+'&euro;');
			updateHotelDetails(hotelTile, hotel.HotelCode);
			selectedHotel = hotel;
			updateCheckoutDetails();
		});
		
		hotelTilesContainer.append(hotelTile);
	});

	hotelsLoaded = true;
}


var downloadImg = function(imgId, hotelCode, url) {
	$.ajax({
		method: 'GET',
		url: SERVICE_PATH+"downloadImage.php?url="+url+"&hotelCode="+hotelCode,		
		success: function(response) {
			var jsonObj = $.parseJSON(response);
			if(jsonObj.status) {
				$('.'+imgId).attr('src', jsonObj.src+'?'+Math.random());
				//$('.'+imgId).attr('src', jsonObj.src);
			}
		}
	});	
}


var updateHotelDetails = function(hotelTile, hotelCode) {
	data.hotelCode = hotelCode;
	$('.gallery-main').html('');
	$('.gallery-thumbs').html('<img src="images/ajax-loader.gif">');
	$.ajax({
		url: SERVICE_PATH+"getHotelDetails.php",
		//url: SERVICE_PATH+"data/AMS_low_fare_search_results.php",
		data: data,
		success:function(result) {			
			$(".ajax-loader").hide();

			jsonObj = $.parseJSON(result);

			//images
			var imgCount = 0;
			var imgHtml = '';
			$.each(jsonObj.photos, function(k, url){
				if(imgCount++ > 4) return;

				if(url.lastIndexOf('?') === -1) {
					var imgFilename = url.substring(url.lastIndexOf('/')+1);

					var imgFilePath = "images/hotels/"+hotelCode+'/'+imgFilename;
					var imgId = 'img_'+k+'_'+hotelCode;


					var imgTag = '<img class="'+imgId+'" src="'+imgFilePath+'" main-src="'+imgFilePath+'" width="78" height="79" onError="downloadImg(\''+imgId+'\', \''+hotelCode+'\', \''+url+'\')"/>';				
					imgHtml += imgTag;
					if(imgCount == 1) {
						$('.gallery-main').html('<img class="'+imgId+'" src="'+imgFilePath+'" width="393" height="213" />');
						hotelTile.find('.stay-image').html('<img class="'+imgId+'" src="'+imgFilePath+'" width="150" height="150" >');
					}
				}else{
					var imgTag = '<img class="'+imgId+'" src="'+url+'" main-src="'+url+'" width="78" height="79" />';				
					imgHtml += imgTag;
					if(imgCount == 1) {
						$('.gallery-main').html('<img class="'+imgId+'" src="'+url+'" width="393" height="213" />');
						hotelTile.find('.stay-image').html('<img class="'+imgId+'" src="'+url+'" width="150" height="150" >');
					}					
				}

				
			});
			$('.gallery-thumbs').html(imgHtml);

			$( ".gallery-thumbs" ).on("click", "img", function() {			
	  			var mainImg = $(this).attr('main-src');
	  			$(this).parent().parent().find('.gallery-main').html('<img src="'+mainImg+'"  width="393" height="213" />');
			});
				


			//room rates
			var htmlRooms = '';
			$("#divRooms").html('');
			if(jsonObj.hotelDetails.rooms != null && typeof(jsonObj.hotelDetails.rooms) != 'undefined') {
                $.each(jsonObj.hotelDetails.rooms, function(k, room) {
                    /*var hotelTile =  $($('#hotelRow').html());

                    hotelTile.find('.stay-image').html('');
                    hotelTile.find('.stay-title').html(room.Description);
                    hotelTile.find('.stay-address').html('');
                    hotelTile.find('.stay-features').html('');
                    hotelTile.find('.stay-price').html(room.RateNum+'&euro; per day');	
                    */

                    var html = '<div class="roomtype unselected" >'+room.Description+'<div>'+room.RateNum+'&euro; per day'+'</div></div>';

                    $("#divRooms").append(html);							
                });
			}

			$('.roomtype').click(function() {
				//$(this).removeClass('unselected').addClass('selected');
				if($(this).hasClass("unselected")) {
					//$(this).attr("class", "selected");
					$(this).removeClass('unselected').addClass('selected');
				}else{
					$(this).removeClass('selected').addClass('unselected');
				}					
			});			

		}	
	});

}

function roomSelected() {
	if($(this).attr("class") == "unselected") {
		//$(this).attr("class", "selected");
		$(this).removeClass('unselected').addClass('selected');
	}else{
		$(this).removeClass('selected').addClass('unselected');
	}
}

//Scripts related to Stay page
$(function() {
	/*
	showStayTab($('.stay-menu a.active').attr('href'));
	$('.stay-menu a').click(function (e) {
		e.preventDefault();
		$('.stay-menu a').removeClass('active');
		var tabToShow = $(this).addClass('active').attr('href');
		showStayTab(tabToShow);
	});

	$( ".stay-row-details" ).on( "click", ".gallery-thumbs img", function() {
	  var mainImg = $(this).attr('main-src');
	  $(this).parent().parent().find('.gallery-main img').attr('src', mainImg);
	});

	$( ".stay-row-details" ).on( "click", ".stay-tab", function(e) {
		e.preventDefault();
		var curTab = $(this);
		curTab.parent().parent().find('.active').removeClass('active');
		curTab.addClass('active');
	 	curTab.parent().parent().parent().find('.tab-content').hide();
	 	curTab.parent().parent().parent().find('.tab-content.'+curTab.attr('tab-content')).fadeIn();
	 	return false;
	});

	$('.stay-row').click(function(e) {
		$(this).parent().find('.selected').removeClass('selected');
		$(this).addClass('selected');
	});

*/
});
function showStayTab(activeMenu) {
	var activeMenu = activeMenu || '#hotel';
	$('.stay-details').hide();
	$(activeMenu).fadeIn();
}

function updateCheckoutDetails() {

	var totalCost = parseFloat(selectedFlight.TotalPriceNum);
	totalCost += parseFloat(selectedHotel.TotalMinAmountNum);
	totalCost = totalCost.toFixed(2);

	$("#chkoutAirlinesName").html(selectedFlight.flights[0].Carrier);	
	$("#chkoutAirlinesDeptName").html(selectedFlight.flights[0].DepartureDate + ' ' +selectedFlight.flights[0].DepartureTime);
	$("#chkoutAirlinesArrivalTime").html(selectedFlight.flights[0].ArrivalDate + ' ' +selectedFlight.flights[0].ArrivalTime);
	$("#chkoutAirlinesTotalTime").html(selectedFlight.flights[0].TravelTime+' min');
	$("#chkoutAirlinesPrice").html(selectedFlight.TotalPriceNum+'&euro;');


	if(selectedFlight.flights.length == 2 ) {	
		$("#chkoutAirlinesDeptName2").html(selectedFlight.flights[1].DepartureDate + ' ' +selectedFlight.flights[1].DepartureTime);		
		$("#chkoutAirlinesArrivalTime2").html(selectedFlight.flights[1].ArrivalDate + ' ' +selectedFlight.flights[1].ArrivalTime);		
		$("#chkoutAirlinesTotalTime2").html(selectedFlight.flights[1].TravelTime+' min');
		$('#checkoutReturnFlightDetails').show();
	}else{
		$('#checkoutReturnFlightDetails').hide();
	}	


	$("#chkoutHotelName").html(selectedHotel.Name);
	$("#chkoutHotelAddr").html(selectedHotel.Address);
	$("#chkoutHotelPrice").html(selectedHotel.TotalMinAmountNum+'&euro;');

	$("#checkoutTotalCost").html(totalCost+'&euro;');


	//checkout
	$("#amount").val(totalCost);
	$("#payment_amuont").val(totalCost);


}

/*
jQuery(document).ready(function($) {

  if (window.history && window.history.pushState) {

    window.history.pushState('forward', null, './#forward');

    $(window).on('popstate', function() {
      alert('Back button was pressed.');
    });

  }
});
*/