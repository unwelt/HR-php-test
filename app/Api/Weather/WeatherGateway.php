<?php


namespace App\Api\Weather;

use App\Api\Weather\Classes\WeatherApiInterface;

class WeatherGateway implements WeatherGatewayInterface
{
    private $weatherApi;

    public function __construct(WeatherApiInterface $weatherApi)
    {
        $this->weatherApi = $weatherApi;
    }

    public function getCurrentWeatherInCity(string $cityName = '')
    {
        return $this->weatherApi->getCurrentWeatherInCity($cityName);
    }
}