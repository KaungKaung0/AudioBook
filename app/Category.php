<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
    	'id' , 'category_name' , 'books_avail'
    ];
}