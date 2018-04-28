<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Resources\BookResource;
use App\Books;
use App\User;
use App\Classification;
use App\BooksRequest;
use App\BookLogs;
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
        
        $books=Books::orderBy('created_at','desc')->paginate(10);
        return view('admin.books')->with('books',$books);
        // return BookResource::collection($books);
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
       $classifications=Classification::get();
       return view('admin.addBook')->with('classifications',$classifications);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'bookTitle'=>'required',
            'bookAuthor'=>'required',
            'bookPublisher'=>'required',
            'bookReference'=>'required',
            'bookDescription'=>'required',
            'bookSupply'=>'required',
            'bookClassification'=>'required',
            'bookImage'=>'image|nullable|max:1999'
            // 'bookImage'=> 'required|file|mimes:' . $all_ext . '|max:' . $max_size
            // 'bookImage' => 'required|image64:jpeg,jpg,png'
        ]);
        // $validator = Validator::make($request->all(), [
        //     'bookTitle'=>'required',
        //     'bookAuthor'=>'required',
        //     'bookPublisher'=>'required',
        //     'bookReference'=>'required',
        //     'bookDescription'=>'required',
        //     'bookSupply'=>'required',
        //     'image' => 'required|image64:jpeg,jpg,png'
        // ]);
        // if ($validator->fails()) {
        //     return response()->json(['errors'=>$validator->errors()]);
        // } else {

        if($request->hasfile('bookImage')){

            $filenamewithtext=$request->file('bookImage')->getClientOriginalName();

            $filename=pathinfo($filenamewithtext,PATHINFO_FILENAME);

            $extension=$request->file('bookImage')->getClientOriginalExtension();

            $filenametostore=$filename.'_'.time().'.'.$extension;

            $path=$request->file('bookImage')->storeAs('public/storage/images',$filenametostore);
            $path=$request->file('bookImage')->storeAs('public/images',$filenametostore);
        
        }else{
            $filenametostore='noname.jpg';
        }
        // $imageData = $request->input('bookImage');
        // $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
        // $path= $request->input('bookImage')->storeAs('public/images',$fileName);

        $book=new Books;
        $book->title=$request->input('bookTitle');
        $book->author=$request->input('bookAuthor');
        $book->publisher=$request->input('bookPublisher');
        $book->ref=$request->input('bookReference');
        $book->description=$request->input('bookDescription');
        $book->image=$filenametostore;
        $book->supply=$request->input('bookSupply');
        // $book->classification_id=$request->input('bookClassification');
    
        $book->save();

        return redirect('books')->with('success','Book '.$book->title.' has been added');
        // return new BookResource($book);
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
        // return new BookResource($book);
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
        // return new BookResource($book);
    }

    public function bookLog(){
        
        $logs=BookLogs::paginate(3);

        return view('admin.booklog')->with('logs',$logs);
    }
}
