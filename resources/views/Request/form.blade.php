@extends('Layouts.app')

@section('content')
    <div class="container">
        {!!Form::open(['action'=>'BookRequestsController@store','method'=>'POST'])!!}
            {{Form::label('Book','Book Id: ')}}{{Form::hidden('bookid',$book->id)}} 
            {{Form::submit('submit',['class'=>'btn btn-primary'])}}
        {!!Form::close()!!}
    </div>
@endsection