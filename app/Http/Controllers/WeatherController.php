<?php

namespace App\Http\Controllers;

use App\Api\Weather\Classes\WeatherApiInterface;
use App\Services\WeatherService;
use Illuminate\Http\Request;


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

    public function index(Request $request)
    {
        $weatherData = [];
        if ($cityName = $request->get('cityName', false)) {
            $weatherData = $this->service->getWeatherInCity($cityName);
        }

        return view('weather.index')->with([
            'weatherData' => $weatherData
        ]);
    }
}