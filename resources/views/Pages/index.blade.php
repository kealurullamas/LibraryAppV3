@extends('Layouts.app')

@section('content')
    <div class="container">
        <h1 class="title">Sotero H. Laurel Academic Resource Center</h1>
        {!!Form::open(['action'=>"BooksController@search",'method'=>'POST'])!!}
        <!--{{Form::label('title','Search A book')}} -->
        {{Form::text('book','',['placeholder'=>'Search for a book or author...', 'class'=>'searchBox'])}}
        {{Form::submit('Search',['class'=>'btn btn-primary'])}}
        {!!Form::close()!!} 
    </div>
    
@endsection