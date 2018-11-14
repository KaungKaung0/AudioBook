<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    protected $fillable = [
    	'id' , 'author_name' , 'biography' , 'books_avail'
    ];
}
