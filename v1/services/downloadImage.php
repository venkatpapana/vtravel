<?php
require_once dirname(__FILE__) . "/bootstrap.php";

$dest = dirname(__FILE__) . '/../public/images/hotels/';

try{
	$url 		= $_REQUEST["url"];

	$hotelCode 	= $_REQUEST["hotelCode"];

	if(!empty($url) && !empty($hotelCode)) {

		if (!file_exists($dest.$hotelCode)) {
		    mkdir($dest.$hotelCode, 0777, true);
		}


		if(file_exists($dest.$hotelCode)) {

			$path_info 	= pathinfo($url);
			$filename 	= $path_info['basename'];

			//Get the file
			//$content = file_get_contents($url);


			Zend_Loader::loadClass("Zend_Http_Client");
			$client = new Zend_Http_Client($url);
			$response = $client->request('GET');
			$content = $response->getBody();
			//file_put_contents("myfile.zip",$body);

			//Store in the filesystem.
			$fp  = fopen($dest.$hotelCode.'/'.$filename, "w");
			fwrite($fp, $content);
			fclose($fp);

			if(!file_exists($dest.$hotelCode.'/'.$hotelCode.'.jpg')) {
				$fp  = fopen($dest.$hotelCode.'/'.$hotelCode.'.jpg', "w");
				fwrite($fp, $content);
				fclose($fp);				
			}

			$resp = array('status' => true, 'message' => 'success', 'src' => 'images/hotels/'.$hotelCode.'/'.$filename);
		}else{
			$resp = array('status' => false, 'message' => 'unable to create dir: '.$dest.$hotelCode);	
		}

	}else{
		$resp = array('status' => false, 'message' => 'invalid url/hotelCode');
	}
}catch(Exception $e) {
	$resp = array('status' => false, 'message' => 'failed to download', "exception" => $e->getMessage());
}

echo json_encode($resp);
