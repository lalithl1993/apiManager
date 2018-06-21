<?php

require "api.onn.php";


class class_onn
{

private $authToken;

private $api;

public function __construct()
{
    $this->authToken = "5b1f666d0ed5422cfbabfb13";
    $this->api = new api_onn;
}

public function getAvailableBikes($payLoad)
{


$parameters = array (
  'authToken' => $this->authToken,
  'fromDate' => $payLoad['fromDate'],
  'toDate' => $payLoad['toDate'],
  'cityLatitude' => $payLoad['cityLatitude'],
  'cityLongitude' => $payLoad['cityLongitude'],
  'cityName' => $payLoad['cityName'],
);

$parametersJSON=json_encode($parameters);


$result = $this->api->getAvailableBikes($parametersJSON); //makeing function call from api.onn.php

$resultArray="";

if($result['errno']!=0&&$result['error']!="")// checking for http errors
{
// todo: log error occured $result[error]
return false;
}
else if($result['response']!="")
{
$resultArray=json_decode($result['response'],true);

if($resultArray['errorCode']!=0||$resultArray['errorMessage']!="Success")// checking for errors from API
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

?>
