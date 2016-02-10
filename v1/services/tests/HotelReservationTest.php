<?php
require_once(dirname(__FILE__).'/../config.php');
require_once(dirname(__FILE__).'/../hotel_reservation_client.php');

// require_once('HotelSearchParser.php');

error_reporting(-1);

$strHotelResult = getHotelReservationJson();
file_put_contents('hotel_reservation_response.json', $strHotelResult);

/*
$strHotelResult = file_get_contents('hotel_response.txt');

$obj =  new HotelSearchParser();
$obj->setJsonResponse($strHotelResult);
$items1 = $obj->parse();

echo "<pre>";
print_r($items1);
*/
