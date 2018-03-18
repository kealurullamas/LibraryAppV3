@extends('Layouts.admin')

@section('content')
    <div class="container addbook-container">
        <h1>Add Book</h1>
        {!!Form::open(['action'=>'BooksController@store','method'=>'POST','enctype'=>'multipart/form-data'])!!}
            <div class="form-group">
                {{Form::label('title','Title')}}
                {{Form::text('bookTitle','',['class'=>'form-control','placeholder'=>'Enter Book Title'])}}
            </div>
            <div class="form-group">
                {{Form::label('author','Author')}}
                {{Form::text('bookAuthor','',['class'=>'form-control','placeholder'=>'Enter Book Author'])}}
            </div>
            <div class="form-group">
                {{Form::label('publisher','Publisher')}}
                {{Form::text('bookPublisher','',['class'=>'form-control','placeholder'=>'Enter Book Author'])}}
            </div>
            <div class="form-group">
                {{Form::label('reference','Reference Number')}}
                {{Form::text('bookReference','',['class'=>'form-control','placeholder'=>'Enter Book Author'])}}
            </div>
            <div class="form-group">
                {{Form::label('description','Description')}}
                {{Form::textarea('bookDescription','',['class'=>'form-control','placeholder'=>'Enter Book Author'])}}
            </div>
            <div class="form-group">
                {{Form::label('number','Number of Books')}}
                {{Form::number('bookSupply','',['class'=>'form-control','min'=>'1','max'=>'5s'])}}
            </div>
            <div class="form-group">
                {{Form::file('bookImage')}}
            </div>
            {{Form::submit('submit',['class'=>'btn btn-primary'])}}
        {!!Form::close()!!}
    </div>
@endsection