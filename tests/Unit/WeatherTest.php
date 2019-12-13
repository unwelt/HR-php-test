<?php

namespace Tests\Unit;

use App\Api\Weather\Classes\OpenWeatherMapApi;
use App\Api\Weather\WeatherGateway;
use App\Api\Weather\WeatherGatewayInterface;
use App\Services\WeatherService;
use Tests\TestCase;

class WeatherTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    public function testOpenWeatherMapApi()
    {
        $weatherGateway = new WeatherGateway(new OpenWeatherMapApi());
        $response = $weatherGateway->getCurrentWeatherInCity('Брянск');
        $this->assertArrayHasKey('main', $response);
    }


    public function testWeatherService()
    {
        $weatherService = new WeatherService();
    }
}
