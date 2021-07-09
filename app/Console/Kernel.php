<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Http\Request;
use App\Http\Controllers;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

    protected function schedule(Schedule $schedule)
    {
    // $schedule->command('inspire')->hourly();
        $schedule->call(function(){
             print("data Added to Weather database");
         
        app('App\Http\Controllers\WeatherController')->getdata();
        })->hourly();

    //     $schedule->call(function(){

    //    app('App\Http\Controllers\WeatherController')->weatherNotification();
    //    })->everyMinute();    

         $schedule->call(function () {
            print("data deleted from database");
            app('App\Http\Controllers\WeatherController')->deleteWeatherData();
        })->dailyAt('00:01');
        //dailyAt('00:01')
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
