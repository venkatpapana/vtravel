<?php
require_once(dirname(__FILE__)."/../models/Utils.php");
abstract class BaseParser{
	//public $utils;
	public $serviceName;
	public $jsonResponse;
	protected $arrResponse;


	public function __construct() {
		//$utils = new Utils();
	}

	public function setServiceName($serviceName) {
		$this->serviceName = $serviceName;
	}

	public function setJsonResponse($jsonResponse) {
		$this->jsonResponse	= $jsonResponse;
		$this->arrResponse	= json_decode($this->jsonResponse, true);
		/*echo '<pre>';

		print_r($this->arrResponse['FlightDetailsList']['FlightDetails'] );
		echo 'base parser';*/
	}

	abstract public function parse();
}