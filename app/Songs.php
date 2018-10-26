<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Songs extends Model
{
    //
	protected $fillable = [
		'title' ,'vocal' ,'category'
	];
}
