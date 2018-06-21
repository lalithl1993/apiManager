<?php

include"../class.CurlHelper.php";

    $action = "POST";
    $url = "https://devservice.onnbikes.com/OnnBikesExternal/v1/rest/booking/getAvailableBikes";
    
	
	echo "Trying to reach ...";// can be removed 2 lines
    echo $url;
    
	
	$parameters = array (
  'authToken' => '5b1f666d0ed5422cfbabfb13',
  'fromDate' => '2018-06-22 09:00:00 +0530',
  'toDate' => '2018-06-23 09:00:00 +0530',
  'cityLatitude' => 0,
  'cityLongitude' => 0,
  'cityName' => 'Bengaluru',
);
$parametersJSON=json_encode($parameters);// convert array into json

$result = CurlHelper::perform_http_request($action, $url, $parametersJSON); // making request from class
   

   echo print_r($result);
	
	
//check for errors----> $result['error'],$result['errno'],$result['result'](error message from json response)
?>
