<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    //
    protected $fillable = [
    	'id' , 'book_id' , 'file_name' , 'duration', 'played_count' , 'token'
    ];
}
