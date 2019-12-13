<?php


namespace App\Services;

use App\Api\Weather\Classes\OpenWeatherMapApi;
use App\Api\Weather\Classes\WeatherApiInterface;
use App\Api\Weather\WeatherGateway;

/**
 * Class WeatherService
 * Сервис для получения данных о погоде
 *
 * @package App\Services
 */
class WeatherService
{
    private $weatherApiGateway;

    public function __construct()
    {
        $this->weatherApiGateway = new WeatherGateway(new OpenWeatherMapApi());
    }

    public function getWeatherInCity($cityName)
    {
        return $this->weatherApiGateway->getCurrentWeatherInCity($cityName);
    }
}