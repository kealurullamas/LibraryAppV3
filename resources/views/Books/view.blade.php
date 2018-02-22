@extends('Layouts.app')

@section('content')
    <div class="container">
        <img src="{{asset('images/'.$books->image)}}">
        <h1>{{$books->title}}</a></h1>
        <h6>{{$books->author}}</h6>
        <a href="{{route('BookRequest.show',$books->id)}}" class="btn btn-primary">Request</a>
    </div>
@endsection