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
            $user=User::find(Auth()->user()->id);
            $data=[
                'bookrequest'=>BooksRequest::orderBy('status','desc')->paginate(3),
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
        
    }
}
