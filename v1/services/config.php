<?php
error_reporting(0);
ini_set('memory_limit','3000M');
set_time_limit(0);
/*
$username = 'Universal API/uAPI-520164658';
$password = 'NZMDXH8nfr3Cq6hYNSn8dC6Fw';
$TARGETBRANCH = 'P105370';
$endpoint = "https://americas-uapi.copy-webservices.travelport.com/B2BGateway/connect/uAPI/AirService";
*/

//Pre-prod credentials
$username = 'Universal API/uAPI2309471039-e76846fc';
$password = 'Q&x7/p2D4J';
$TARGETBRANCH = 'P7030029';
$endpoint = "https://emea.universal-api.pp.travelport.com/B2BGateway/connect/uAPI/AirService";
$authType = 'basic';

$arrDestinations = array('BER', 'BCN', 'LON', 'CPH', 'PAR', 'IST');
//$arrDestinations = array('LON');


define('MODE_LOCAL_JSON', 1);
define('MODE_DEMO', 2);
define('MODE_LIVE', 3);

//define('MODE', MODE_LOCAL_JSON);
define('MODE', MODE_DEMO);


define('USERNAME', $username);
define('PASSWORD', $password);
define('TARGET_BRANCH', $TARGETBRANCH);
define('HOTEL_ENDPOINT', "https://emea.universal-api.pp.travelport.com/B2BGateway/connect/uAPI/HotelService");


$cityAlias = array(
	'RTM' => 'AMS', 'EIN' => 'AMS', 'DUS' => 'AMS', 
	'SXF' => 'BER', 'THF' => 'BER', 'TXL' => 'BER',
	'BLA' => 'BCN', 'GRO' => 'BCN', 
	'LCY' => 'LON', 'LGW' => 'LON', 'LHR' => 'LON', 'LOZ' => 'LON', 'STN' => 'LON', 'LTN' => 'LON', 
	'MMX' => 'CPH', 
	'LBG' => 'PAR', 'ORY' => 'PAR', 'PHT' => 'PAR', 'PRX' => 'PAR', 'XCR' => 'PAR', 'CDG' => 'PAR',
	'SAW' => 'IST', 
	'ANR' => 'BRU', 'CRL' => 'BRU', 
	'GRX' => 'AGP', 'GIB' => 'AGP', 'SVQ' => 'AGP', 
	'CIA' => 'ROM', 'FCO' => 'ROM', 'PEG' => 'ROM', 
	'KTW' => 'KRK', 
	'HEL' => 'TLL', 'TAY' => 'TLL', 'TKU' => 'TLL',
	'FAO' => 'LIS', 
);




set_include_path(get_include_path() . PATH_SEPARATOR . dirname(__FILE__). PATH_SEPARATOR . dirname(__FILE__)."/../". PATH_SEPARATOR . dirname(__FILE__). '/parsers'.PATH_SEPARATOR . dirname(__FILE__)."/../libraries/");


//$conn= mysqli_connect("localhost","wetravel-qa","w7s_}Lp!K5","wetravel-qa");
