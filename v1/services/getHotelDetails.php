<?php

require_once(dirname(__FILE__).'/config.php');
require_once('nusoap/lib/nusoap.php');

require_once(dirname(__FILE__).'/TravelportAPI.php');
require_once(dirname(__FILE__).'/parsers/HotelDetailsParser.php');
require_once(dirname(__FILE__).'/parsers/HotelMediaItemsParser.php');


$hotelCode	= $_REQUEST["hotelCode"];
$fromDate   = $_REQUEST["from_date"];  
$toDate    	= $_REQUEST["to_date"];
$adults 	= $_REQUEST["travellers"];
$children 	= $_REQUEST["children"];


if(empty($adults)) {
	$adults = 1;
}

if(empty($children)) {
	$children = 0;
}


/**
 *	Hotel Details
 */

if(empty($toDate) || $fromDate==$toDate) {
	$toDate = date("Y-m-d", strtotime($fromDate)+(60*60*24));
}

$startTime = time();

$arrHotelResults 	= array();
$travelport 		= new TravelportAPI(TARGET_BRANCH);

$hotelDetails 		= $travelport->getHotelDetailsJson($hotelCode, $fromDate, $toDate, $adults, $children);
$hotelPhotos 		= $travelport->getHotelMediaLinksJson($hotelCode);

$parser = new HotelDetailsParser();
$details = $parser->parse($hotelDetails);

$parser = new HotelMediaItemsParser();
$photos = $parser->parse($hotelPhotos);

$endTime = time();
$serviceTime = ($endTime-$startTime);

$results = array('processTime' => $serviceTime, 'hotelDetails' => $details, 'photos' => $photos);
header('Access-Control-Allow-Origin: *');  
$result =  json_encode($results);

if(isset($_REQUEST['debug'])) {	
	file_put_contents('data/'.$fromPlace.'_low_fare_search_results.json', ($result));
}

echo $result;
exit;
