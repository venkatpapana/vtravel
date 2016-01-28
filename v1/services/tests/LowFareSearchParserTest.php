<?php
error_reporting(E_ERROR);
require_once("../parsers/LowFareSearchParser.php");

$obj =  new LowFareSearchParser();
$obj->setJsonResponse(file_get_contents("../data/lowfaresearch_resp.json_08mar"));

$items = $obj->parse();

$headings = array('Origin', 'Destination', 'DepartureTime', 'ArrivalTime', 'TotalPrice', 'BasePrice',	'ApproximateTotalPrice', 'ApproximateBasePrice', 'EquivalentBasePrice', 'Taxes');


file_put_contents('out.html','<table border="1" style="border-collapse: collapse;"><tr>',FILE_APPEND);

   foreach ($headings as $col) {
	  file_put_contents('out.html',"<th>$col</th>",FILE_APPEND);
   }
   file_put_contents('out.html','</tr>',FILE_APPEND);

foreach ($items as $row) {
   file_put_contents('out.html','<tr>',FILE_APPEND);
   foreach ($row as $column) {
	  file_put_contents('out.html',"<td>$column</td>",FILE_APPEND);
   }
   file_put_contents('out.html','</tr>',FILE_APPEND);
}    
file_put_contents('out.html','</table>',FILE_APPEND);
