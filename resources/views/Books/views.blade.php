@extends('Layouts.app')

@section('content')
    <div class="bookcontainer">
        <div class="book-desc">
            <img class="center-img" src="{{asset('storage/images/'.$books->image)}}">
        
            <h1 class="book-title">{{$books->title}}</a></h1>
            <h6 class="book-author">{{$books->author}}</h6>
            <h5 class="book-description">{{$books->description}}</h5>
            {!!Form::open(['action'=>'BookRequestsController@store' ,'method'=>'POST'])!!}
                {{Form::hidden('bookid',$books->id)}}
                {{Form::hidden('bookname',$books->title)}}
                {{Form::submit('Submit',['class'=>'btn btn-primary'])}} 
            {!!Form::close()!!}
        </div>
    </div>
@endsection