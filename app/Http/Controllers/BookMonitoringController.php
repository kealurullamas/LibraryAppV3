<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookAccepts;
use App\BooksRequest;
use App\User;
class BookMonitoringController extends Controller
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
        //get all book requests with status received
        $books=BooksRequest::where('status','=','Received')->paginate(6);
        return view('admin.bookmonitoring')->with('books',$books);
    }
    
    public function search(Request $request)
    {
        //search through all book requests with status received
        $user=User::where('name','LIKE','%'.$request->input('user').'%')->firstOrFail();
        $books=BooksRequest::where(['status'=>'Received','user_id'=>$user->id])->paginate(100);
        return view('admin.bookmonitoring')->with('books',$books);
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
