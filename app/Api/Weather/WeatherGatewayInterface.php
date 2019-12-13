<?php


namespace App\Api\Weather;

use App\Api\Weather\Classes\WeatherApiInterface;

interface WeatherGatewayInterface
{
    public function __construct(WeatherApiInterface $weatherApi);

    public function getCurrentWeatherInCity(string $cityName);
}