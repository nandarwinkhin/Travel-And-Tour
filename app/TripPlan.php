<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TripPlan extends Model
{
    protected $fillable=[
        'trip_title',
        'user_id',
        'cost',
        'description',
        'photo',
        'trip_start_date',
    ];


public function users(){
    $this->belongsTo('App\User');
}

public function comments(){
    $this->hasMany('App\Comment');
}

public function bookings(){
    $this->hasMany('App\Booking');
}
    
}