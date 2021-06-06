<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'id',
        'name',
        'video_path',
        'user_id'
    ];
}
