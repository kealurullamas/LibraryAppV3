<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BooksRequest extends Model
{
    //associate bookrequests to book
    public function book()
    {
        return $this->belongsTo('App\Books');
    }
    //associate bookrequests to user
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
