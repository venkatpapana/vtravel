<?php
require_once('../nusoap/lib/nusoap.php');

require_once('config.php');

$message = <<<EOM
<?xml version="1.0" encoding="ISO-8859-1"?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
<soapenv:Body>
<air:LowFareSearchReq TargetBranch="$TARGETBRANCH" AuthorizedBy="Chetan" xmlns:air="http://www.travelport.com/schema/air_v24_0" xmlns:com="http://www.travelport.com/schema/common_v24_0">
<com:BillingPointOfSaleInfo OriginApplication="UAPI" />
<air:SearchAirLeg>
<air:SearchOrigin>
<com:CityOrAirport Code="LON" />
</air:SearchOrigin>
<air:SearchDestination>
<com:CityOrAirport Code="AMS" />
</air:SearchDestination>
<air:SearchDestination>
<com:CityOrAirport Code="CPH" />
</air:SearchDestination>
<air:SearchDestination>
<com:CityOrAirport Code="IVL" />
</air:SearchDestination>
<air:SearchDestination>
<com:CityOrAirport Code="CLY" />
</air:SearchDestination>
<air:SearchDestination>
<com:CityOrAirport Code="NCY" />
</air:SearchDestination>
<air:SearchDestination>
<com:CityOrAirport Code="TMP" />
</air:SearchDestination>
<air:SearchDepTime PreferredTime="2014-03-16" />
</air:SearchAirLeg>
<air:AirSearchModifiers>
<air:PreferredProviders>
<com:Provider Code="1G" />
</air:PreferredProviders>
</air:AirSearchModifiers>
<com:SearchPassenger Code="ADT" />
</air:LowFareSearchReq>
</soapenv:Body>
</soapenv:Envelope>
EOM;

$client = new nusoap_client($endpoint, false);
$client->setCredentials($username, $password);
$result=$client->send($message, $endpoint);
file_put_contents("data/lowfaresearch_resp.json_08mar", json_encode ( $result));



//echo '<h2>Request</h2>';
//echo '<pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
//echo '<h2>Response</h2>';
//echo '<pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';

// Display the debug messages
//echo '<h2>Debug</h2>';
//echo '<pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';


