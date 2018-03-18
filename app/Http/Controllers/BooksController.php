<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use App\User;
class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $books=Books::paginate(10);
        return view('admin.books')->with('books',$books);
    }

    public function search(Request $request)
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       return view('admin.addBook');
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
        $this->validate($request,[
            'bookTitle'=>'required',
            'bookAuthor'=>'required',
            'bookPublisher'=>'required',
            'bookReference'=>'required',
            'bookDescription'=>'required',
            'bookSupply'=>'required',
            'bookImage'=>'image|nullable|max:1999'
        ]);

        if($request->hasfile('bookImage')){

            $filenamewithtext=$request->file('bookImage')->getClientOriginalName();

            $filename=pathinfo($filenamewithtext,PATHINFO_FILENAME);

            $extension=$request->file('bookImage')->getClientOriginalExtension();

            $filenametostore=$filename.'_'.time().'.'.$extension;

            $path=$request->file('bookImage')->storeAs('public/images',$filenametostore);
        
        }else{
            $filenametostore='noname.jpg';
        }

        $book=new Books;
        $book->title=$request->input('bookTitle');
        $book->author=$request->input('bookAuthor');
        $book->publisher=$request->input('bookPublisher');
        $book->ref=$request->input('bookReference');
        $book->description=$request->input('bookDescription');
        $book->image=$filenametostore;
        $book->supply=$request->input('bookSupply');
        $book->save();

        return redirect('books')->with('success','Book '.$book->title.' has been added');
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

    public function showAllBooks()
    {
       
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
        $book=Books::find($id);
        return view('admin.editBook')->with('book',$book);
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
        $this->validate($request,[
            'bookTitle'=>'required',
            'bookAuthor'=>'required',
            'bookPublisher'=>'required',
            'bookReference'=>'required',
            'bookDescription'=>'required',
            'bookSupply'=>'required',
            'bookImage'=>'image|nullable|max:1999'
        ]);

        if($request->hasfile('bookImage')){

            $filenamewithtext=$request->file('bookImage')->getClientOriginalName();

            $filename=pathinfo($filenamewithtext,PATHINFO_FILENAME);

            $extension=$request->file('bookImage')->getClientOriginalExtension();

            $filenametostore=$filename.'_'.time().'.'.$extension;

            $path=$request->file('bookImage')->storeAs('public/images',$filenametostore);
        
        }else{
            $filenametostore='noname.jpg';
        }

        $book=Books::find($id);
        $book->title=$request->input('bookTitle');
        $book->author=$request->input('bookAuthor');
        $book->publisher=$request->input('bookPublisher');
        $book->ref=$request->input('bookReference');
        $book->description=$request->input('bookDescription');
        $book->image=$filenametostore;
        $book->supply=$request->input('bookSupply');
        $book->save();

        return redirect('books')->with('success','Book '.$book->title.' has been updated');
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
        $book=Books::find($id);
        $book->delete();
        return redirect('books')->with('error','Book '.$book->title.' has been deleted');
    }
}
