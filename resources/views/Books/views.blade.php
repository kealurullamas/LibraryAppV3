@extends('Layouts.app')

@section('content')
    <div class="Searchcontainer">
        <img src="{{asset('images/'.$books->image)}}">
        <h1>{{$books->title}}</a></h1>
        <h6>{{$books->author}}</h6>
        <h5>{{$books->description}}</h5>
        <a href="{{route('BookRequest.show',$books->id)}}" class="btn btn-primary">Request</a>
    </div>
@endsection