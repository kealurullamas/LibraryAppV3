@extends('Layouts.app')

@section('content')
    <div class="bookcontainer">
        <div class="book-desc">
            <div class="row">
            <div class="col-sm-4">
                <br>
                    <img class="center-img" src="{{asset('storage/images/'.$books->image)}}">
            </div>
            <div class="col-sm-8">    
                <h1 class="book-title">{{$books->title}}</a></h1>
                <h6 class="book-author">{{$books->author}}</h6>
                <h5 class="book-description">{{$books->description}}</h5>
                @if($books->supply>0)
                <p class="text-success">In Stock: {{$books->supply}} units left   </p>
                <br><br>
                @else
                <p class="text-danger">Out of Stock </p>
                <br><br>
                @endif
                @guest
                    <a href="{{route('login')}}" class="btn btn-primary" style="width:100%;min-width:250px;">Please Sign in to Request for Books</a>
                @else
                {!!Form::open(['action'=>'RequestsController@store' ,'method'=>'POST'])!!}
                    {{Form::hidden('bookid',$books->id)}}
                    {{Form::hidden('bookname',$books->title)}}
                    {{Form::submit('Request',['class'=>'btn btn-primary','style'=>'width:100%;min-width:250px;'])}} 
                {!!Form::close()!!}
                @endguest
            </div>  
            </div>
        </div>
    </div>
@endsection