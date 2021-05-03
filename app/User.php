<?php

namespace App;

use App\Http\Middleware\Authenticate;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',  'type_id', 'isMale', 'address',
        
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected $Name;
    protected $Id;
    protected $SSN;
    protected $Address;
    protected $Salary;
    protected $Mobile;
    protected $isMale;
    protected $Mail;
    protected $Password;
    protected $img;
    protected $dates = [
        'created_at',
        'updated_at',
        'published_at'
    ];


    protected function setNameAttribute($value)
    {
        $this->attributes['Name'] = strtolower($value);
    }

    protected function setSsnAttribute($value)
    {
        $this->attributes['SSN'] = $value;
    }

    protected function setAddreeAttribute($value)
    {
        $this->attributes['Address'] = strtolower($value);
    }

    protected function setSalaryAttribute($value)
    {
        $this->attributes['Salary'] = $value;
    }

    protected function setMobileAttribute($value)
    {
        $this->attributes['Mobile'] = $value;
    }

    protected function setisMaleAttribute($value)
    {
        if(strtolower($value) == "male")
        {
            $this->attributes['isMale'] = 1;
        }
        else if(strtolower($value) == "female")
        {
            $this->attributes['isMale'] = 0;
        }
        else
        {
            $this->attributes['isMale'] = Null;
        }
    }

    protected function setMailAttribute($value)
    {
        $this->attributes['Mail'] = strtolower($value);
    }

    protected function setPasswordAttribute($value)
    {
        $this->attributes['Password'] = $value;
    }

    public function getIDAttribute($value)
    {
        return $value;
    }


    public function getSSNAttribute($value)
    {
        return $value;
    }


    public function getSalaryAttribute($value)
    {
        return $value;
    }


    public function getAddressAttribute($value)
    {
        return ucfirst($value);
    }


    public function getGenderAttribute($value)
    {
        if($value == 1)
        {
            return $value = "Male";
        }
        else if($value == 0)
        {
            return $value = "Female";
        }
        else
        {
            return $value = Null ;
        }
    }


    public function getMobileAttribute($value)
    {
        return $value;
    }

    public function getMailAttribute($value)
    {
        return ucfirst($value);
    }

    public function getPasswordAttribute($value)
    {
        return ucfirst($value);
    }

    /*
    public function type()
    {
        return $this->hasOne('App\User_types', 'type_id');
    }
    */

    // Decorator Design Pattern.
    public function scopeAccepted($query)
    {
        return $query->where('accepted', 1);
    }

    public function scopeNotAccepted($query)
    {
        return $query->where('accepted', 0);
    }

}


 