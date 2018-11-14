<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    //
    protected $fillable = [
    	'id' , 'lib_id' , 'book_id'
    ];
}
