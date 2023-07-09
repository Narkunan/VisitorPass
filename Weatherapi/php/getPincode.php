<?php
require_once("Api.php");
require_once("DisplayContent.php");
$city=$_GET['city'];
$obj=new Api();
class GetPincode
{
	public function callApi($city,$obj)
	{
      $response=$obj->getResponsePincode
      ($city);
      $jsonarray=json_decode($response,true);
      $this->parseJson($jsonarray);
	}
	public function parseJson($jsonarray)
	{
      $city=$jsonarray[0]['display_name'];
      $getcity=new DisplayContent();
      $printstring=$getcity->printCityorPincode($city);
      echo $printstring;

	}

}
$callapi=new GetPincode();
$callapi->callapi($city,$obj);

?>