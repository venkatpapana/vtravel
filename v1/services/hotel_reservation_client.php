<?php
require_once(dirname(__FILE__).'/config.php');
require_once('nusoap/lib/nusoap.php');


function getHotelReservationJson($location, $num_adults, $checkin_date, $checkout_date, $num_rooms=1) {

	$message = file_get_contents(dirname(__FILE__)."/sample_requests/HotelCreateReservationReq.xml");

/*
	$message = str_replace("{TARGET_BRANCH}", TARGET_BRANCH, $message);
	$message = str_replace("{LOCATION}", $location, $message);
	$message = str_replace("{NUM_ADULTS}", $num_adults, $message);
	$message = str_replace("{CHECKIN_DATE}", $checkin_date, $message);
	$message = str_replace("{CHECKOUT_DATE}", $checkout_date, $message);
	$message = str_replace("{NUM_ROOMS}", $num_rooms, $message);
*/	
	$client = new nusoap_client(HOTEL_ENDPOINT, false);
	$client->setCredentials(USERNAME, PASSWORD);
	$result=$client->send($message, HOTEL_ENDPOINT);

	return json_encode($result);
}