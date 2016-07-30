<?php

class City
{
	public static function getCityById($id)
	{
		$content = file_get_contents("https://api.vk.com/method/database.getCitiesById?city_ids={$id}");
		$json = json_decode($content);
		
		$response = $json->response[0];
		return $response->name;
	}
}
