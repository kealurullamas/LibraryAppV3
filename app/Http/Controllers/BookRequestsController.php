<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use App\User;
use App\BooksRequest;
use App\Notifications\NotifyUser;
use App\BookAccepts;
class BookRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        // $this->middleware('auth');
    }
    
    public function update(Request $request, $id)
    {
        //Updates the book from pending to accepted and waiting for receiving
        $book=BooksRequest::find($id);
        $user=User::find($book->user_id);
       
        if($request->input('status')=='Accepted'){
            $book->status=$request->input('status');
            $book->save();
            $user->notify(new NotifyUser(BooksRequest::where('id','=',$book->id)->firstorfail()));
            return redirect('admin_view')->with('success','Book Request ('.$book->book->title.') of '.$book->user->name.' has been Accepted');
        }
        else{
            $books=Books::find($book->book_id);
            $books->increment('supply','1');
            $book->status=$request->input('status');
            $book->save();
            $user->notify(new NotifyUser(BooksRequest::where('id','=',$book->id)->firstorfail()));
            return redirect('admin_view')->with('error','Book Request');
        }        
       
    }
}
