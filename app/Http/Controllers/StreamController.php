<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Audio;
use App\Activity;
class StreamController extends Controller
{
    //
	public function __construct(){
		$this->middleware('auth');
		$this->middleware('verified');
	}

	public function play(Request $request){
		$trial = $request->token;
		$data = Audio::where('id' , $request->id)->first();
		if($trial == $data->token){
			$data->token = rand(10000000,99999999);
			$data->save();
			return response()->file(storage_path('app/audio/Cat.mp3'),[
				'Content-Type' => 'audio/mpeg'
			]);
		}
		else{
			return false;
		}
	}

	public function select(Request $request){
		$id = $request->id;
		if($request->ask =="backward"){
			if($id == 1){
				return redirect()->route('stream' , compact('id'));
			}
			else{
				$id = $request->id -1 ;
				return redirect()->route('stream' , compact('id'));
			}
		}
		else if ($request->ask == "forward"){
			$id = $request->id +1;  
			return redirect()->route('stream' , compact('id'));
		}

	}

}
