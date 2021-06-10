<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WNotification extends Model
{
    protected $fillable = [
        'type',
        'notifiable_type',
        'notifiable_id',
        'data'
    ];

    protected $table = 'notifications';
}
