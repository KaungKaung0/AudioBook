<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Songs;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $list = Songs::all();
        if(is_null($request->id)){              
            return view('home' , compact('list'));          
        }
        else{
           $song = Songs::where('id' , $request->id)->first();
           if($song === null){
            $id = $request->id -1;
            $song = Songs::where('id' ,$id)->first();
           }
           return view('home' , compact('list' ,'song'));
        }
    }
    public function select(Request $request){
        if($request->ask =="backward"){
            if($request->id == 1){
            return redirect()->route('song.index' , ['id' => $request->id]);
        }
        else{
                $id = $request->id -1 ;
                return redirect()->route('song.index', ['id'=>$id]);
        }
        }
        else if ($request->ask == "forward"){
            $id = $request->id +1;  
            return redirect()->route('song.index',['id'=>$id]);
        }
        
       

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated_data = $request->validate([
            'title' => 'required|max:100',
            'song' => 'required|mimes:mpga',
            'vocal' => 'required',
            'category' => 'required'
        ]);

        Songs::create([
            'title' => $validated_data['title'],
            'vocal' => $validated_data['vocal'],
            'category' => $validated_data['category']

        ]);

        $songs = $request->song;
        $name = $validated_data['title'];
        $songs->move('songs',$name.'.mp3');

        return redirect()->route('song.index')->with('message' , 'Success!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
