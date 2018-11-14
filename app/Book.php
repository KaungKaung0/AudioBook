<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $fillable =[
    	'id', 'title' , 'author_id' , 'description' , 'thumbnail' ,'categ_id', 
    	'add_count'
    ];


}
