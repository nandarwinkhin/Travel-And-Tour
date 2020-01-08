<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
        'user_id',
        'description',
        'photo',
    ];
    
    public function users(){
         $this->hasOne('App\User');
    }
    public function comments(){
        $this->hasMany('App\Comment');
    }
}