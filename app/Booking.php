<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    protected $fillable=[
        'user_id',
        'trip_id',
        'purchased_or_not',
    ];
public function users(){
    $this->belongsTo('App\User');
}

public function tripplans(){
    $this->belongsTo('App\TripPlan');
}
}

