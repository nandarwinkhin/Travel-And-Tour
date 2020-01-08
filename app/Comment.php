<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    protected $fillable=[
        'description',
        'user_id',
        'commented_on',
        'commentable_id',
    ];


public function users(){
    $this->belongsTo('App\User');
}

public function posts(){
    $this->belongsTo('App\Post');
}

public function tripplans(){
    $this->belongsTo('App\TripPlan');
}
}

