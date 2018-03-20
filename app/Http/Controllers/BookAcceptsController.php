<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BooksRequest;
use App\BookAccepts;
use App\Books;
use App\User;
use Carbon\Carbon;
use App\Notifications\NotifyUser;

class BookAcceptsController extends Controller
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
        //
        $book_accepts=BooksRequest::where('status','=','Accepted')->paginate(10);
        return view('admin.bookaccepts')->with('book_accepts',$book_accepts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        
        //Update the status of book from accepted to received or cancelled
        $bookreq=BooksRequest::find($id);
        $user=User::find($bookreq->user_id);
        
        if($request->input('status')=='Received'){
            $due=Carbon::now()->addDays(7)->toDateString();
            $bookreq->status=$request->input('status');
            $bookreq->due_date=$due;
            $bookreq->save();
            $user->notify(new NotifyUser(BooksRequest::where('id','=',$id)->firstorfail()));
            return redirect('BookAccepts')->with('success','Book '.$bookreq->book->title.' has been Received');
        }else{
            $book=Books::find($bookreq->book->id);
            $book->increment('supply','1');
            $bookreq->delete();
            return redirect('BookAccepts')->with('error','Book '.$bookreq->book->title.' has been Cancelled');
        }
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
