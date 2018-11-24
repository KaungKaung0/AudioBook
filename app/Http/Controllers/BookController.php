<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
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
}
