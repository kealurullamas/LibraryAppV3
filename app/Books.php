<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    // //
    // public function users()
    // {
    //     return $this->belongsToMany('App\User','books_users','books_id','users_id')->withTimestamps();
    // }
    public function bookRequests()
    {
        return $this->hasMany('App\BookRequests');
    }

    public function bookAccepts()
    {
        return $this->hasMany('App\BookAccepts');
    }
    public function booklog(){
        return $this->hasOne('App\BookLogs');
    }
}
