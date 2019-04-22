<?php

namespace App\Http\Controllers;

use App\Library;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$users = App\User::paginate(15);
        $book = Library::paginate(2);
       // echo "<pre>";
       // print_r($book);
        return view('home',compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('addbook');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Responsee
     */
    public function store(Request $request)
    {
        //
        $title = $request->input('title');
        $author = $request->input('author');
        $price = $request->input('price');
        $publisher = $request->input('publisher');
        $file = $request->file('image');
        $image = $file->getClientOriginalName();

        $destinationPath = 'uploads';
        

        $book = new Library();

        $book->title = $title;
        $book->author = $author;
        $book->price = $price;
        $book->publisher = $publisher;
        $book->image = $file;

         $book->save();
         $id = $book->id;
         $filename = "image".$id.".jpeg";
        // echo $filename;
         //rename($image,$filename);
         $file->move($destinationPath,$filename);
          $book->image = $filename;
         $book->save();
        return Redirect::to('library');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $book = Library::find($id);
        //print_r($book);
        return view('showone', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $book = Library::find($id);
        return view('edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $book = Library::find($id);
        $book->title =  $request->input('title');
        $book->author =  $request->input('author');
        $book->price =  $request->input('price');
        $book->publisher =  $request->input('publisher');
        $file =  $request->file('image');
        $image = $file->getClientOriginalName();
        $destinationPath = 'uploads';
        $book->save();
        $id = $book->id;
        $filename = "image".$id.".jpeg";
        $file->move($destinationPath,$filename);
        $book->image = $filename;
        $book->save();
        return Redirect::to('library');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
         $book = Library::find($id);
         //print_r($book);
         $book->delete();
         return Redirect::to('library');
    }

    public function ascsort(Request $request)
    {
       // echo "string";
        $book = Library::orderBy('price', 'asc')->paginate(2);
       // print_r($book);
        return view('home',compact('book'));  
    }
    public function descsort()
    {
        $book = Library::orderBy('price', 'desc')->paginate(2);
        return view('home',compact('book'));  
    }
    public function search(Request $request)
    {
            $data = $request->input('search');
            //  $book = Library::paginate(2)::where('title','LIKE','%'.$data.'%')->get();
            $book = Library::where('title','LIKE','%'.$data.'%')->paginate(2);
            return view('home',compact('book'));
    }
}
