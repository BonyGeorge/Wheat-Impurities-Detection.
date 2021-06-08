<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use App\Weather;

class WeatherController extends Controller
{

//To get the API data from OpenWeatherMap
    public function getdata()
    {
        $location = 'Cairo';
        $apikey = '4445c357ab07f97dde9144fc13322ae0';

        $response = Http::get("https://api.openweathermap.org/data/2.5/weather?q={$location}&appid={$apikey}&units=metric");
        
        $weather = $response->json();
        $temp = $weather['main']['temp'];
        $hum = $weather['main']['humidity'];
        $windspeed = $weather['wind']['speed'];
        $winddegree = $weather['wind']['deg'];


        $WeatherData = new Weather;
        $WeatherData->temprature = $temp; 
        $WeatherData->humidity = $hum; 
        $WeatherData->wind_speed = $windspeed; 
        $WeatherData->wind_direction = $winddegree; 

        $WeatherData->save();
        /*print("Hii");
        print($temp);
        print($hum);
        print($windspeed);
        print($winddegree);*/

        //return view('users.weather')->with('weather', [$temp, $hum, $windspeed, $winddegree]);
    }

    public function deleteWeatherData()
    {
        Weather::truncate();
        return back()->with('success', 'Weather has been deleted.');
    }

}
