<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Book;
use App\Audio;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('verified');
    }
    public function index(Request $request)
    {
        //
        $list = Book::all();
        if(is_null($request->id)){              
            return view('home' , compact('list'));          
        }
        else{
         $audio = Audio::where('book_id' , $request->id)->first();
         $thumb = Book::where('id' , $request->id)->first();
         if($audio === null){
            $id = $request->id -1;
            $audio = Audio::where('book_id' ,$id)->first();
            $thumb = Book::where('id' , $id)->first();
        }
        return view('home' , compact('list' ,'audio' , 'thumb'));
    }
}
    public function select(Request $request){
        if($request->ask =="backward"){
            if($request->id == 1){
                return redirect()->route('home.index' , ['id' => $request->id]);
            }
            else{
            $id = $request->id -1 ;
                return redirect()->route('home.index', ['id'=>$id]);
            }
        }
        else if ($request->ask == "forward"){
            $id = $request->id +1;  
            return redirect()->route('home.index',['id'=>$id]);
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