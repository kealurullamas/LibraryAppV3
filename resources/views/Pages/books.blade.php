@extends('Layouts.app')

@section('content')
    @if(count($books)>0)
        <div class="container">
            <h1><strong>Books</strong></h1>
        </div>
        @foreach($books as $book)
            <div class="container">
                <img src="{{asset('images/'.$book->image)}}">
                <h5><a href="{{route('books.show',$book->id)}}">{{$book->title}}</a></h3>
                <h6>{{$book->author}}</h6>
            </div>
        @endforeach
        {{$books->links()}}
    @endif
@endsection