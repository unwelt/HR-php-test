<?php

namespace App\Http\Controllers;

use App\Api\Weather\Classes\WeatherApiInterface;
use App\Services\WeatherService;

class WeatherController extends Controller
{
    /**
     * @var WeatherService
     */
    private $service;

    public function __construct(WeatherService $service)
    {
        $this->service = $service;
    }

    public function index($cityName = '')
    {
        $data = [];
        if ($cityName !== '') {
            $data = $this->service->getWeatherInCity($cityName);
        }

        return view('weather')->with([
            'data' => $data
        ]);
    }
}