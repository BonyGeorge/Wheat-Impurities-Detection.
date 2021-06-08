<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    protected $fillable = [
        'temprature',
        'humidity',
        'wind_speed',
        'wind_direction'
    ];
}
