<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookAccepts;
use App\BooksRequest;
use App\User;
use App\Books;
use Carbon\Carbon;
use App\Notifications\NotifyUser;
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
    public function notifyDue($id)
    {
        $book=BooksRequest::find($id);
        $user=User::find($book->user_id);
        $user->notify(new NotifyUser(BooksRequest::where('id','=',$id)->firstorfail()));

        return redirect('BookMonitoring')->with('success','Successfully Notified User');
    }
    public function returns($id)
    {
        $bookreq=BooksRequest::find($id);

        $book=Books::find($bookreq->book_id);
        $book->increment('supply','1');
        $book->save();

        //$bookreq->delete();
        

        return redirect('BookMonitoring')->with('success','Book '.$book->title.' has been returned');
    }
    public function index()
    {
        //get all book requests with status received
        $data=[
            'books'=>BooksRequest::where('status','=','Received')->paginate(6),
            'today'=>Carbon::now()->addDays(7)->toDateString()
        ];
        
        return view('admin.bookmonitoring')->with($data);
    }
    
    public function search(Request $request)
    {
        //search through all book requests with status received
        $user=User::where('name','LIKE','%'.$request->input('user').'%')->first();
        if(!empty($user)){
            $data=[
                'books'=>BooksRequest::where(['status'=>'Received','user_id'=>$user->id])->paginate(100),
                'today'=>Carbon::now()->addDays(7)->toDateString()
            ];
            return view('admin.bookmonitoring')->with($data);
        }
        else
        {
            $data=[
                'books'=>null,
                'result'=>$request->input('user'),
                'today'=>Carbon::now()->addDays(7)->toDateString()
            ];
            return view('admin.bookmonitoring')->with($data);
        
        }
        
        
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
