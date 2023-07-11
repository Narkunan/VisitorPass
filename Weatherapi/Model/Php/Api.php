<?php
/**
* This class is responsible for api calls and responses
*/
class Api
{

     /**
     * Get response for Pincode.
     *
     * @param string $city. 
     * @return string $response.
     */

	public function getResponsePincode(string $city):null?string
	{

     	$urlres = curl_init();
    	curl_setopt_array($urlres, [
		CURLOPT_URL => "https://forward-reverse-geocoding.p.rapidapi.com/v1/forward?city=$city&accept-language=en&polygon_threshold=0.0",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: forward-reverse-geocoding.p.rapidapi.com",
		"X-RapidAPI-Key: bceffcfe1cmsh1083c7d8f53534bp1ad7e8jsncadf4f898dd5"],]);

		$response = curl_exec($urlres);
		$err = curl_error($urlres);

		curl_close($urlres);
		if($err)
		{
	
			return $err;
		}
		else
		{
	
			return $response;
		}

	}

     /**
     * Get response for City.
     *
     * @param string $city .
     * @return string $response.
     */

	public function getResponseCity(string $pincode): null?string
	{
 		
 		$urlres = curl_init();
    	curl_setopt_array($urlres, [
		CURLOPT_URL => "https://forward-reverse-geocoding.p.rapidapi.com/v1/forward?postalcode=$pincode&accept-language=en&polygon_threshold=0.0",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: forward-reverse-geocoding.p.rapidapi.com",
		"X-RapidAPI-Key: bceffcfe1cmsh1083c7d8f53534bp1ad7e8jsncadf4f898dd5"],]);

		$response = curl_exec($urlres);
		$err = curl_error($urlres);

		curl_close($urlres);
		if($err)
		{
	
			return null;
		}
		else
		{
	
			return $response;
		}

	}


    /**
     * Get response for Weather.
     *
     * @param string $city.
     * @return string $response.
     */

	public function responseWeatherReport(string $city): ?string
	{

		$curl = curl_init();
		curl_setopt_array($curl, [
		CURLOPT_URL => "https://open-weather13.p.rapidapi.com/city/$city",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: open-weather13.p.rapidapi.com",
		"X-RapidAPI-Key: 95df55e398msh1df32ed27430e5ap13c487jsn4b821ba25994"],]);

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) 
		{   
			echo "some problem";
			return null;
		} 
		else 
		{ 
	
			return $response;
		}

	}

}

