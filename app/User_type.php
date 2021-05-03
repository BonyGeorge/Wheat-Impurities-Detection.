<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_type extends Model
{
    protected $table = 'user_types';

    protected $fillable =
    [
        'user_id',
        'type_name'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
