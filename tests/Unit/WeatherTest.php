<?php

namespace Tests\Unit;

use App\Api\Weather\Classes\OpenWeatherMapApi;
use App\Api\Weather\WeatherGateway;
use App\Services\WeatherService;
use Tests\TestCase;

class WeatherTest extends TestCase
{
    private $service;

    protected function setUp()
    {
        parent::setUp();
        $this->service = new WeatherService();
    }

    public function testOpenWeatherMapApi()
    {
        $weatherGateway = new WeatherGateway(new OpenWeatherMapApi());
        $response = $weatherGateway->getCurrentWeatherInCity('Брянск');
        $this->assertArrayHasKey('main', $response);
    }


    public function testWeatherServiceWithCityName()
    {
        $result = $this->service->getWeatherInCity('Брянск');
        $this->assertArrayHasKey('weather', $result);
    }

    public function testWeatherServiceWithoutCityName()
    {
        $result = $this->service->getWeatherInCity('');
        $this->assertArrayNotHasKey('weather', $result);
    }
}
