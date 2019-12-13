<?php


namespace App\Api\Weather\Classes;


interface WeatherApiInterface
{
    public function getCurrentWeatherInCity(string $cityName);
}