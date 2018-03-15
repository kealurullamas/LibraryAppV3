<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BooksRequest;
use App\BookAccepts;
use Carbon\Carbon;

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
        //
        $due=carbon::now()->addDays(7)->toDateString();
        $bookreq=BooksRequest::find($request->input('id'));
        $bookreq->delete();

        if($request->input('status')=='Received')
        {
            
            $accept=new BookAccepts();
            $accept->user_id=$request->input('uid');
            $accept->book_id=$request->input('bookid');
            $accept->due_date=$due;
            $accept->save();

            return redirect('BookAccepts')->with('success','Book has been Received');
        }
        return redirect('BookAccepts')->with('error','Book Receiving was cancelled');
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
