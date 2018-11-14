<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Audio;
use App\Author;
use App\Book;
use App\Category;
use App\Library;
use App\User;
use App\Role;
use wapmorgan\Mp3Info\Mp3Info;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('admin');
    }
    public function index(Request $reqeust)
    {
        //
        $list = Book::all();
        if(is_null($reqeust->id)){
            return view('backend.home' , compact('list'));
        }
        else{
            $audio = Audio::where('book_id', $reqeust->id)->first();
             return view('backend.home' ,compact('list' , 'audio'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.upload');
    }
    public function add_role(Request $request){
        Role::create([
            'name' => $request->name,
        ]);
        return redirect()->route('admin.index');
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
            'thumbnail' => 'required|image',
            'title'     => 'required|string',
            'author'    => 'required|string',
            'category'  => 'required|string',
            'audio'      => 'required|mimes:mpga',
            'description'=> 'required'
        ]);
        //create a new author 
        $this->author_store($validated_data['author']);
        //create and store thumbnail
        $thumbnail = $this->pic_store($validated_data['thumbnail'], $validated_data['title']);
        //create a new category
        $this->category_store($validated_data['category']);
        Book::create([
            'title'         => $validated_data['title'],
            'author_id'     => $validated_data['author'],
            'description'   => $validated_data['description'],
            'thumbnail'     => $thumbnail,
            'categ_id'      => $validated_data['category'],
            'add_count'     => 0,
        ]);
        //$audio file storing
        $this->audio_store($validated_data['audio'],$validated_data['title']);

        return redirect()->route('admin.index');  
    }
    public function author_store($name){
        $author_name = Author::where('author_name' , $name)->first();
        if($author_name === null){
            Author::create([
                'author_name' => $name,
                'biography'   => "Not Available",
                'books_avail' => 1,
            ]);    
        }
        else{
           $found = Author::where('author_name' , $name)->first();
           $found->books_avail +=1;
           $found->save();
       }
   }
   public function pic_store($pic , $title){
    $filename = $title . '.' . $pic->getClientOriginalExtension();
    $file = 'image/thumbnail/' . $filename;
    $pic->move(public_path('image/thumbnail'), $filename);
    return $filename;
}

public function category_store($category){
    $category_name = Category::where('category_name' , $category)->first();
    if($category_name === null){
        Category::create([
            'category_name' => $category,
            'books_avail'   => 1,
        ]);
    }
    else{              
        $found = Category::where('category_name' , $category)->first();
        $found->books_avail +=1;
        $found->save();  
    }
}

public function audio_store($audio , $title){
    //calculate the audio duration
    $file = new Mp3Info($audio, true);  
    $min = $file->duration % 60;
    $sec = (round(($file->duration /60),2)-$min)*100;
    if($sec <10) $sec = '0'.$sec; 
    $duration = $min .':' .$sec;

    $name = $title;
    $book = Book::where('title'  , $title)->first();
    Audio::create([
        'book_id' => $book->id,
        'file_name' => $name,
        'duration' =>$duration,
        'played_count' => 0,
    ]);
    $audio->move('audio/',$name.'.mp3');
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
