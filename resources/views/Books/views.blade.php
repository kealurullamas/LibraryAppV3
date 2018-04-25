@extends('Layouts.app')

@section('content')
    <div class="bookcontainer">
        <div class="book-desc">
            <div class="row">
            <div class="col-sm-4">
                    <img class="center-img" src="{{asset('storage/images/'.$books->image)}}">
            </div>
            <div class="col-sm-8">    
                <h1 class="book-title">{{$books->title}}</a></h1>
                <h6 class="book-author">{{$books->author}}</h6>
                <h5 class="book-description">{{$books->description}}</h5>
                <br><br>
                {!!Form::open(['action'=>'BookRequestsController@store' ,'method'=>'POST'])!!}
                    {{Form::hidden('bookid',$books->id)}}
                    {{Form::hidden('bookname',$books->title)}}
                    {{Form::submit('Submit',['class'=>'btn btn-primary','style'=>'width:100%;min-width:250px;'])}} 
                {!!Form::close()!!}
            </div>  
            </div>
        </div>
    </div>
@endsection