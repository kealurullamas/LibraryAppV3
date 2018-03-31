<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
class PagesController extends Controller
{
    public function index()
    {
        $data=[
            'books'=>Books::orderBy('created_at')->take(6)->get(),
        ];
        return view('Pages.index')->with($data);
    }

    public function about()
    {
        return view('Pages.about');
    }

    public function faqs()
    {
        return view('Pages.faq');
    }

    public function contact()
    {
        return view('Pages.contact');
    }
    public function book()
    {
        $books=Books::orderBy('id','desc')->paginate(6);
        $data=[
            'books'=>$books,
            'title'=>null
        ];
        return view('Pages.books')->with($data);
    }
    public function bookSearch(Request $request)
    {
        $book_search=$request->input('book');
        $book=Books::where('title','LIKE','%'.$book_search.'%')->paginate(100);
        $data=[
            'books'=>$book,
            'title'=>$request->input('book'),
        ];
        return view('Pages.books')->with($data);
    }
    public function bookShow($id)
    {
        $book=Books::find($id);
        return view('Books.views')->with('books',$book);
    }
}
