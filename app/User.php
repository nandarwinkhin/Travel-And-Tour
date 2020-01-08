<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone','address','gender','password','photo','type_id','remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function setPasswordAttribute($password)
{
    $this->attributes['password'] = \Hash::make($password);
}

    public function posts(){
         $this->hasMany('App\Post','user_id');
    }

    public function tripplans(){
        $this->hasMany('App\TripPlan');
    }

    public function comments(){
        $this->hasMany('App\Comment');
    }

    public function bookings(){
        $this->hasMany('App\Booking');
    }

    public function reviews(){
        $this->hasMany('App\Review');
    }

    public function usertypes(){
        $this->hasMany('App\UserType');
    }


}


