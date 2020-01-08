<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable=[
        'user_id',
        'reviewed_on',
        'rating',
        'description',
    ];

    public function users(){
        $this->belongsTo('App\User');
    }
}
