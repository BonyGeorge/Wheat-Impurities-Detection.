<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SendMail extends Model
{
    protected $fillable = [
        'mailsubject',
        'mailcontent',
        'selection'
    ];
}
