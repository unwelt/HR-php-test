<?php

namespace App\Api\Weather\Classes;

use GuzzleHttp\Client;

/**
 * Class OpenWeatherMapApi
 * Класс для запроса погоды через API OpenWeatherMap
 *
 * @package App\Api\Weather\Classes
 */
class OpenWeatherMapApi implements WeatherApiInterface
{
    /**
     * @var string
     */
    private $apiKey;

    public function __construct()
    {
        if (($this->apiKey = env('OPEN_WEATHER_KEY', false)) === false) {
            throw new \Exception('Отсутствует API-ключ');
        }
    }

    /**
     * Метод возвращающий результат запроса текущей погоды по заданному городу
     * @param  string  $cityName
     *
     * @return array|mixed
     */
    public function getCurrentWeatherInCity(string $cityName = '')
    {
        $result = [];
        if ($cityName !== '') {
            $result = $this->getDataFromApi($cityName);
        }
        return $result;
    }

    /**
     * Метод выполнящий запрос к API
     * @param  string  $cityName
     *
     * @return mixed
     */
    protected function getDataFromApi(string $cityName = '')
    {
        $httClient = new Client([
            'base_uri' => 'http://api.openweathermap.org/data/2.5/'
        ]);

        $options = [
            'query' => [
                'q'     => $cityName,
                'APPID' => $this->apiKey,
                'units' => 'metric',
            ]
        ];

        $response = $httClient->request('GET', 'weather', $options);
        return json_decode($response->getBody()->getContents(), true);
    }
}