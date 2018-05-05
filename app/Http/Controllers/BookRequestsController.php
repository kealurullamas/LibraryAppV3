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
        // $this->middleware('auth:admin');
        $this->middleware(['auth','auth:admin']);
    }
    public function index()
    {
        //
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
    public function findAndStore(Request $request,$id)
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
        // if(!Auth()->guest()){
        //     $book=Books::find($id);
        //     return view('Request.form')->with('book',$book);
        // }
        // else
        // {
        //     return view('auth.login');
        // }
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
