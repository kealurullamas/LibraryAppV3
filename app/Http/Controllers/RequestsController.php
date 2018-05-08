<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BooksRequest;
use App\User;
use App\Books;

class RequestsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function checkLogged(){
        if($this->middleware('auth')){
            
        }
    }
    //
    public function store(Request $request){
        //
        //here we save the request book info to DB
        $book=Books::find($request->input('bookid'));
        if($book->supply>0){
            $book->decrement('supply',1);
            $book_request=new BooksRequest();
            $book_request->user_id=Auth()->user()->id;
            $book_request->book_id=$request->input('bookid');
            $book_request->status='pending';
            $book_request->reference_number='123123';
            $book_request->save();

            $user=User::find(Auth()->user()->id);
        
            
            return redirect()->back()->with('success','Book Request of '.$request->input('bookname').'has been received');
        }else{
            $bookreturn=BooksRequest::where(['book_id'=>$request->input('bookid'),
            'status'=>'Received'])->first();
            if(!empty($bookreturn)){
                return redirect()->back()->with('error','The supply of the book '.$request->input('bookname').' has been exhausted. Please wait until one of the borrower returns the book:
                Expected Date of return: '.$bookreturn->due_date);
            }else{
                return redirect()->back()->with('error','The supply of the book '.$request->input('bookname').' has been exhausted. Please wait until the book has been received or canceled by the borrower');
            }
        }
    }
}
