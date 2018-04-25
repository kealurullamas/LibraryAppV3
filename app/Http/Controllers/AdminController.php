<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use App\User;
use App\BooksRequest;
use Carbon\Carbon;

class AdminController extends Controller
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

    public function admin()
    {
        //gets all pending book requests
        $book_requests=BooksRequest::where('status','=','pending')->orderBy('created_at','desc')->paginate(3);
        return view('admin_dashboard')->with('book_requests',$book_requests);
    }
    public function index()
    {
        // /
        // $book_requests=BooksRequest::where('status','!=','Accepted')->orderBy('created_at','desc')->paginate(5);
        // return view('admin_dashboard')->with('book_requests',$book_requests);
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
      //find the user from the list of users
      $user=User::find($id);
      $bookrequest=BooksRequest::where('user_id','=',$user->id);
      $requests=$bookrequest->count();
      $onHand=$bookrequest->where('status','=','received')->count();
      $data=[
          'user'=>$user,
          'requests'=>$requests,
          'onHand'=>$onHand
      ];
      return view('admin.users')->with($data);
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
