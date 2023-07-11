<?php
require('global.php');
require('../../Model/php/DisplayContent.php');

$city=$_GET['city'];
/**
* This class is responsible for getWeatherReport.
*/

class GetWeather
{

  /**
   * Get Response from api by calling the object of API class.
   * 
   * Call the responseweatherreport() function.
   *  
   * Call the parsejson function.
   * 
   * 
   * @param array $jsonarray
   * 
   * @param string $city
   * 
   */
	public function callApi(string $city,Api $obj):void
	{

      	     $response=$obj->responseWeatherReport($city);
             $jsonarray=json_decode($response,true);
             $this->parseJson($jsonarray);

	}
   
  /**
   * Parse the json array and get required values.
   * 
   * Call the printweather function to display appropriate output.
   * 
   * @param array $jsonarray.
   * 
   * @var float $feeslike. 
   * 
   * @var float $tempmax. 
   * 
   * @var float $tempmin.
   * 
   * @var string $WeatherDesc. 
   * 
   * @var float $windspeed. 
   */

   public function parseJson(array $jsonarray):void
   {
      
      $displaycontent=new DisplayContent();
      $weatherDesc = $jsonarray['weather'][0]['description'];
      $feelsLike = $jsonarray['main']['feels_like'];
      $tempMin = $jsonarray['main']['temp_min'];
      $tempMax = $jsonarray['main']['temp_max'];
      $windSpeed = $jsonarray['wind']['speed'];
    
      if(str_contains($weatherDesc,"drizzle")||str_contains($weatherDesc,"rainy")||str_contains($weatherDesc,"thunderstrom"))
      {
          $print=$displaycontent->printWeather($weatherDesc, $feelsLike, $tempMax, $tempMin,$imageloaction="../../View/images/clouds.png",$windSpeed);
          echo $print;
      }

      else if(str_contains($weatherDesc,"mist"))
      {
          $print=$displaycontent->printWeather($weatherDesc,$feelsLike,$tempMax,$tempMin,$imageloaction="../../View/images/mist.png",$windSpeed);
          echo $print;
      }

      else if(str_contains($weatherDesc,"clouds"))
      {
          $print=$displaycontent->printWeather($weatherDesc,$feelsLike,$tempMax,$tempMin,$imageloaction="../../View/images/clouds.png",$windSpeed);
          echo $print;
      }

      else
      {
          $print=$displaycontent->printWeather($weatherDesc,$feelsLike,$tempMax,$tempMin,$imageloaction="../../View/images/sunny.png",$windSpeed);
          echo $print;
      }

   }

}

$callapi=new GetWeather();
$callapi->callapi($city,$obj);

