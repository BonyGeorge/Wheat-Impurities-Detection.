<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
   	Protected $table ="users";
    Protected $fillable =[
	   'name',
	   'email',
       'ssn',
       'birthday',
       'isMale',
       'address',
       'email',
       'phone',
       'filename',
	];

	    public function profile()
    {
        return $this->hasone('App\profile');
    }
}
