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
}
