<?php

require "api.onn.php";
class class_onn
{

$authToken="5b1f666d0ed5422cfbabfb13";

$api = new api_onn();

public function getBookings($payLoad)
{


$parameters = array (
  'authToken' => $authToken,
  'fromDate' => $payLoad['fromDate'],
  'toDate' => $payLoad['toDate'],
  'cityLatitude' => $payLoad['cityLatitude'],
  'cityLongitude' => $payLoad['cityLongitude'],
  'cityName' => $payLoad['cityName'],
);

$parametersJSON=json_encode($parameters);

//$result = CurlHelper::perform_http_request($httpMethod, $url, $parametersJSON);

$result = $api->getBookings($parametersJSON) //makeing function call from api.onn.php

$resultArray="";

if($result[errno]!=0||$result[error]!="")// checking for http errors
{
// todo: log error occured $result[error]
return false;
}
else if(isset($result[response]))
{
$resultArray=json_decode($result[response]);
if($resultArray[errorCode]!=0||$resultArray[errorMessage]!="Success")// checking for errors from API
{
// todo: log $resultArray[errorMessage]
return false;
}
else{
return($resultArray);// incorrect
//todo: do some logical operation for data manupulation and return data which is compatable with our application
}
}

return false;

}





}//end of class

















 /*   $action = "POST";
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
	
	*/
//check for errors----> $result['error'],$result['errno'],$result['result'](error message from json response)
?>
