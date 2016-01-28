<?php
require_once(dirname(__FILE__).'/config.php');

require_once('nusoap/lib/nusoap.php');
require_once('hotel_client.php');
require_once("parsers/LowFareSearchParser.php");
require_once("parsers/HotelSearchParser.php");

function sortResultsByPrice($a, $b) {
    if ($a['TotalPriceNum'] == $b['TotalPriceNum']) {
        return 0;
    }
    return ($a['TotalPriceNum'] < $b['TotalPriceNum']) ? -1 : 1;
}


function sortResultsByCityPrice($a, $b) {
    if ($a[0]['TotalPriceNum'] == $b[0]['TotalPriceNum']) {
        return 0;
    }
    return ($a[0]['TotalPriceNum'] < $b[0]['TotalPriceNum']) ? -1 : 1;
}

function sortHotelResultsByPrice($a, $b) {

    if ($a->MinimumAmountNum == $b->MinimumAmountNum) {
        return 0;
    }
    return ($a->MinimumAmountNum < $b->MinimumAmountNum) ? -1 : 1;
}


$budget		= $_REQUEST["budget"];

if(empty($budget)) { 
	$budget = 400;
}
//TODO: optimize
$fromPlace  = $_REQUEST["from_place"];
$fromPlace = substr($fromPlace, -4);
$fromPlace = str_replace(')','',$fromPlace);

$fromDate   = $_REQUEST["from_date"];  
//extra variable
@$toDate     = $_REQUEST["to_date"];

$adults = $_REQUEST["travellers"];
$tripType = $_REQUEST["trip_type"];

$num_rooms = $_REQUEST["rooms"];
if(empty($num_rooms)) {
	$num_rooms = 1;
}

if(empty($adults)) {
	$adults = 1;
}
if(empty($tripType)) {
	$tripType = 'return';
}

$arrDispDestinations	= array();
$searchDestinations		= '';
$SearchOrigins			= '';

$ToName = $_REQUEST['ToName'];
$ToName = substr($ToName, -4);
$ToName = str_replace(')','',$ToName);

if(!empty($_REQUEST['destinations'])) {
	$arrDestinations = $_REQUEST['destinations'];
}


if($_REQUEST['ToName']!='') {
	$searchDestinations .= '<air:SearchDestination><com:CityOrAirport Code="'.$ToName.'" /></air:SearchDestination>';
	$SearchOrigins .= '<air:SearchOrigin><com:CityOrAirport Code="'.$ToName.'" /></air:SearchOrigin>';

}else{
	foreach($arrDestinations as $dest) {
		if($dest != $fromPlace) {
			$searchDestinations .= '<air:SearchDestination><com:CityOrAirport Code="'.$dest.'" /></air:SearchDestination>';
			$SearchOrigins .= '<air:SearchOrigin><com:CityOrAirport Code="'.$dest.'" /></air:SearchOrigin>';		
		}
	}
}

if($_REQUEST['trip_type']=='return') {
	$returnSegment = '<air:SearchAirLeg>'.$SearchOrigins.'<air:SearchDestination><com:CityOrAirport Code="'.$fromPlace.'" /></air:SearchDestination><air:SearchDepTime PreferredTime="'.$toDate.'" /></air:SearchAirLeg>';
}

$searchPassengers = '';
for($i=1; $i<=$adults; $i++) {
	$searchPassengers .= '<com:SearchPassenger Code="ADT" />';
}

$message = <<<EOM
<?xml version="1.0" encoding="ISO-8859-1"?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
<soapenv:Body>
<air:LowFareSearchReq TargetBranch="$TARGETBRANCH" AuthorizedBy="Chetan" xmlns:air="http://www.travelport.com/schema/air_v24_0" xmlns:com="http://www.travelport.com/schema/common_v24_0">
<com:BillingPointOfSaleInfo OriginApplication="UAPI" />
<air:SearchAirLeg>
<air:SearchOrigin>
<com:CityOrAirport Code="$fromPlace" />
</air:SearchOrigin>
$searchDestinations
<air:SearchDepTime PreferredTime="$fromDate" />
</air:SearchAirLeg>
$returnSegment
<air:AirSearchModifiers>
<air:PreferredProviders>
<com:Provider Code="1G" />
<com:Provider Code="ACH" />
</air:PreferredProviders>
</air:AirSearchModifiers>
$searchPassengers
</air:LowFareSearchReq>
</soapenv:Body>
</soapenv:Envelope>
EOM;
$startTime = time();
if(MODE != MODE_LOCAL_JSON) {
	$client = new nusoap_client($endpoint, false);
	$client->setCredentials($username, $password);
	$result=$client->send($message, $endpoint);
} else {
	if(file_exists ('data/'.$fromPlace.'_low_fare_search_results.json')) {
		$result = json_decode(file_get_contents('data/'.$fromPlace.'_low_fare_search_results.json'), 1);
	}else{
		$result = json_decode(file_get_contents('data/AMS_low_fare_search_results.json'), 1);
	}	
}
$endTime = time();

$serviceTime = ($endTime-$startTime);



//echo '<pre>'; print_r($result); exit;
if(isset($_REQUEST['debug'])) {
	file_put_contents("data/request.log", $message);
	file_put_contents('data/results.log', print_r($result,1));
	file_put_contents("data/debug.log", $client->debug_str);
	//file_put_contents("data/debug.log", htmlspecialchars($client->debug_str, ENT_QUOTES));
}

$obj =  new LowFareSearchParser();
$obj->setBudget($budget);
$obj->setTripType($tripType);
$obj->setJsonResponse(json_encode ( $result));
$items = $obj->parse();
$sortedItems = array();
$city_temperatures = array();

$monthArr = explode('-', $fromDate);
$sel_month = $monthArr[1];

foreach($items as $city => $cityRes) {
	usort($cityRes, 'sortResultsByPrice');
	$sortedItems[$city] = $cityRes;
}

uasort($sortedItems, 'sortResultsByCityPrice');

//unique destinations
$returnDestinations = array();
$uniqueDestCodes = array();
foreach($sortedItems as $thisCity => $thisCityRes) {
	if(isset($cityAlias[$thisCity]) && in_array($cityAlias[$thisCity], $uniqueDestCodes)) {
		
	}else{
		$uniqueDestCodes[] = $cityAlias[$thisCity];
		$returnDestinations[$thisCity]['flightResults'] = $thisCityRes;

		// Get the temperature of the city
		$city_temperatures[$thisCity] = '';
		/*
		if(!empty($cityAlias[$thisCity])) {
			$query = "select * from temperatures where month = '$sel_month' and city_code = '".$cityAlias[$thisCity]."'";
			$rs = mysqli_query($conn, $query);
			if($rs) {
				while ($row = mysqli_fetch_object($rs)) {
					$city_temperatures[$thisCity] = $row->avg_temp;
				}
			}
		}
		*/
	}	
}




//destinations
//foreach($items as $item) {
foreach($returnDestinations as $item) {
	foreach($item['flightResults'] as $thisItem) {
		foreach ($thisItem['flights'] as $flight) {		

			$thisDest = $flight->Destination;
			if($thisDest != $fromPlace && !in_array($thisDest, $arrDispDestinations)) {
				$arrDispDestinations[] = $thisDest;
			}
	   	}
	}
}

$arrDispDestinations = array_unique($arrDispDestinations);
//echo '<pre>'; print_r($arrDispDestinations); exit;


/**
 *	Hotel Search
 */


if(empty($toDate) || $fromDate==$toDate) {
	$toDate = date("Y-m-d", strtotime($fromDate)+(60*60*24));
}


$arrHotelResults = array();

$obj =  new HotelSearchParser($fromDate, $toDate);
//TODO: optimize
foreach($arrDispDestinations as $thisDest) {
	if($fromPlace == $thisDest) continue;
	$strHotelResult = getHotelResultsJson($thisDest, $adults, $fromDate, $toDate, $num_rooms);
	//print_r($strHotelResult); exit;

	if(isset($_REQUEST['debug'])) {
		file_put_contents("data/hotel_result.log", print_r($strHotelResult,1));
	}

	$obj->setJsonResponse($strHotelResult);
	$hotels = $obj->parse();

	usort($hotels, 'sortHotelResultsByPrice');

	$returnDestinations[$thisDest]['hotelResults'] = $hotels;
	//array_push($arrHotelResults, $hotels);
}

$results = array('processTime' => $serviceTime,'totalDestinations' => count($sortedItems), 'destinations' => $returnDestinations, 'temperatures' => $city_temperatures);
header('Access-Control-Allow-Origin: *');  
$result =  json_encode($results);

if(isset($_REQUEST['debug'])) {	
	file_put_contents('data/'.$fromPlace.'_low_fare_search_results.json', ($result));
}

echo $result;
exit;

/*
if($items['0']['flights']['0']->Destination == 'ORY'||$items['0']['flights']['0']->Destination == 'CDG') {
	$cityname ='Paris';
	$countryName = 'France';
}
if($items['0']['flights']['0']->Destination == 'LCY') {
	$cityname ='London-City';
	$countryName = 'United Kingdom';
}
$fightprice = $items['0']['TotalPriceNum
*/