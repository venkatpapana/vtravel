<?php

require_once(dirname(__FILE__).'/config.php');

require_once('nusoap/lib/nusoap.php');

class TravelportAPI {

	public function __construct($targetBranch) {
		$this->targetBranch = $targetBranch;
	}

	public function sendSoapRequest($message) {
		$client = new nusoap_client(HOTEL_ENDPOINT, false);
		$client->setCredentials(USERNAME, PASSWORD);
		$result = $client->send($message, HOTEL_ENDPOINT);	
		
		return json_encode($result);
	}

	function getHotelResultsJson($location, $num_adults, $checkin_date, $checkout_date ) {

		$message = file_get_contents(dirname(__FILE__)."/sample_requests/HotelSearchAvailabilityReqNew.xml");


		$message = str_replace("{TARGET_BRANCH}", $this->targetBranch, $message);
		$message = str_replace("{LOCATION}", $location, $message);
		$message = str_replace("{NUM_ADULTS}", $num_adults, $message);
		$message = str_replace("{CHECKIN_DATE}", $checkin_date, $message);
		$message = str_replace("{CHECKOUT_DATE}", $checkout_date, $message);

		return $this->sendSoapRequest($message);
	}


	function getHotelDetailsJson($hotelCode, $checkin_date, $checkout_date, $num_adults, $num_children) {

		$message = file_get_contents(dirname(__FILE__)."/sample_requests/HotelDetailsReq.xml");

		$message = str_replace("{TARGET_BRANCH}", $this->targetBranch, $message);		
		$message = str_replace("{NUM_ADULTS}", $num_adults, $message);
		$message = str_replace("{NUM_CHILDREN}", $num_children, $message);
		$message = str_replace("{CHECKIN_DATE}", $checkin_date, $message);
		$message = str_replace("{CHECKOUT_DATE}", $checkout_date, $message);
		$message = str_replace("{HOTEL_CODE}", $hotelCode, $message);

		return $this->sendSoapRequest($message);
	}	


	function getHotelMediaLinksJson($hotelCode) {
		$message = file_get_contents(dirname(__FILE__)."/sample_requests/HotelMediaLinksReq.xml");

		$message = str_replace("{TARGET_BRANCH}", $this->targetBranch, $message);
		$message = str_replace("{HOTEL_CODE}", $hotelCode, $message);
		
		return $this->sendSoapRequest($message);
	}


}