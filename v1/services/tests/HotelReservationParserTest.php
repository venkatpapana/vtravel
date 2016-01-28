<?php
require_once(dirname(__FILE__).'/../config.php');
require_once(dirname(__FILE__).'/../hotel_reservation_client.php');

require_once('HotelReservationParser.php');

//error_reporting(-1);

//$strHotelResult = getHotelResultsJson('LON', 1, '2015-04-17', '2015-04-19');
//file_put_contents('hotel_response.txt', $strHotelResult);


$strHotelResult = file_get_contents('hotel_reservation_response.txt');

$obj =  new HotelSearchParser();
$obj->setJsonResponse($strHotelResult);
$items1 = $obj->parse();

echo "<pre>";
print_r($items1);

