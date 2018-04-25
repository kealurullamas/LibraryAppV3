<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookLogs extends Model
{
    //
    public function book(){
        return $this->belongsTo('App\Books');
    }
}
