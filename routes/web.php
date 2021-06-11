<?php

use Illuminate\Support\Facades\Route;
use App\pages;
use App\User;
use App\Weather;
use Illuminate\Support\Facades\Mail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Welcome Page.
Route::get('/', function () 
{
   if (!Auth::guest())
    {
        if (Auth::user()->type_id == 1)
        {
            $users =  User::NotAccepted()->paginate(20);
            return view('users.requestUsers', compact('users'));    
        }
        else if (Auth::user()->type_id == 2)
        { 
            $WeatherInfo = Weather::all();
            return view('users.weather', compact('WeatherInfo'));
        }
    }
    else
    { 
        return view('welcome');
    }
});

// Check if the user has accepted the verfication mail.
Auth::routes(['verify' => true]);


// Messages.
Route::resource('messages', 'MessageController');
Route::get('/message', 'MessageController@store');
Route::get('/messages', 'MessageController@index');
Route::get('/message/{message}', 'MessageController@destroy');

// Profile Page
Route::resource('/profile', 'ProfileController');
Route::get('/profile/{profile}/edit', 'ProfileController@edit');
Route::get('/profile/{profile}', 'ProfileController@update');

// Mailing Routes.
Route::get('/sendmail' , 'MailController@index');
Route::post('/sendmail', 'MailController@mail');

// Requested Users to join system.
Route::get('/requestedusers', 'RequestedUserController@index');
Route::get('/requestedusers/{user}/edit', 'RequestedUserController@edit');
Route::get('/requestedusers/{user}', 'RequestedUserController@update');

// Dashboard.
Route::get('/dashboard', 'DashboardController@index');

// Uploading Video/Image
Route::get('/upload', 'UploadController@index');
Route::post('/upload', 'UploadController@upload');

// Weather API data
// Route::get('/weather_sched', 'WeatherController@schedule');
Route::get('/weather_getData', 'WeatherController@index');

//Notify Route
Route::get('/wnotifications', 'WeatherController@wIndex');