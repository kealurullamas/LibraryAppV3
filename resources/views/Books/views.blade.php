@extends('Layouts.app')

@section('content')
    <div class="Searchcontainer">
        <img src="{{asset('images/'.$books->image)}}">
        <h1>{{$books->title}}</a></h1>
        <h6>{{$books->author}}</h6>
        <h5>{{$books->description}}</h5>
        {!!Form::open(['action'=>'BookRequestsController@store' ,'method'=>'POST'])!!}
            {{Form::hidden('bookid',$books->id)}}
            {{Form::hidden('bookname',$books->title)}}
            {{Form::submit('Submit',['class'=>'btn btn-primary'])}} 
        {!!Form::close()!!}
    </div>
@endsection