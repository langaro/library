<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{
    public function getWeather(string $city)
    {
        $query = [
            'city_name' => $city,
            'fields' => 'only_results,description,temp',
            'key' => env('WEATHER_API_KEY'),
        ];

        $response = Http::get(env('WEATHER_API_BASE_URL'), $query);

        if ($response->successful())
        {
            return $response->json();
        }

        return ['error' => 'Não foi possível obter os dados meteorológicos.'];
    }
}
