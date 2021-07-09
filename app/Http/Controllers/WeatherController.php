<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use App\Weather;
use App\WNotification;


class WeatherController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {       
        
    }

    public function wIndex()
    {
        $WeatherNotification = WNotification::all();
        return view('users.wnotification', compact('WeatherNotification'));
    }

    public function index()
    {
        $WeatherInfo = Weather::all();
        return view('users.weather', compact('WeatherInfo'));
    }
    //To get the API data from OpenWeatherMap and Make notification
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

        // Notification Condition
        if ($temp >= 7 && $temp <= 14 && $hum >= 60 && $windspeed >= 30)
        {
            //$id= Auth::user()->id;
            $user = \App\User::find(1);
            print("data Added to Weather Notification database");
            //auth()->user()->id)
            $details = [
            'body' => "May wheat rust happens later due to change of weather"
            ];
            $user->notify(new \App\Notifications\TaskComplete($details));
        }
    }

    public function deleteWeatherData()
    {
        Weather::truncate();
        return back()->with('success', 'Weather has been deleted.');
    }

}