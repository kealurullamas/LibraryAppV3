<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use App\User;
use App\BooksRequest;
use Carbon\Carbon;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$user=User::find(Auth()->user()->id);
        $book=Books::find(2);
        $user->books()->attach($book->id);*/
        if(!auth()->guest()){
            $data=[
                'user'=>User::find(Auth()->user()->id),
                'dayBefore'=>carbon::now()->addDays(7)->toDateString()
            ];
            
            return view('dashboard')->with($data);
        }
        else
        {
            return redirect('Auth.login');
        }
    }
    public function admin()
    {
        $book_requests=BooksRequest::where('status','!=','Accepted')->orderBy('created_at','desc')->paginate(5);
       //s return $book_requests;
        return view('admin_dashboard')->with('book_requests',$book_requests);
    }
}
