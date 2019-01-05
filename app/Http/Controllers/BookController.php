<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Audio;
class BookController extends Controller
{
    //
	
	public function __construct(){
		$this->middleware('auth');
	}

	public function detail(Request $request){
		$detail = Book::where('id' , $request->id)->first();
		return view('detail' , compact('detail'));
	}

	public function play(Request $request){
		$detail = Book::where('id' , $request->id)->first();
		$audio = Audio::where('id' , $request->id)->first();
		return view('detail' , compact('detail' ,'audio'));
	}
}
