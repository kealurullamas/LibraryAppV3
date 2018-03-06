<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookAccepts extends Model
{
    //
    public function book()
    {
        return $this->belongsTo('App\Books');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
