@extends('Layouts.admin')

@section('content')
    <div class="container addbook-container">
        <h1>Add Book</h1>
        <div class="add-book-form">
            {!!Form::open(['action'=>'BooksController@store','method'=>'POST','enctype'=>'multipart/form-data'])!!}
                <div class="form-group addbook-formgroup">
                    {{Form::label('title','Title')}}
                    {{Form::text('bookTitle','',['class'=>'form-control addbook-textbox','placeholder'=>'Enter Book Title'])}}
                </div>
                <div class="form-group addbook-formgroup">
                    {{Form::label('author','Author')}}
                    {{Form::text('bookAuthor','',['class'=>'form-control addbook-textbox','placeholder'=>'Enter Book Author'])}}
                </div>
                <div class="form-group addbook-formgroup">
                    {{Form::label('publisher','Publisher')}}
                    {{Form::text('bookPublisher','',['class'=>'form-control addbook-textbox','placeholder'=>'Enter Book Author'])}}
                </div>
                <div class="form-group addbook-formgroup">
                    {{Form::label('reference','Reference Number')}}
                    {{Form::text('bookReference','',['class'=>'form-control addbook-textbox','placeholder'=>'Enter Book Author'])}}
                </div>
                <div class="form-group addbook-formgroup">
                    {{Form::label('description','Description')}}
                    {{Form::textarea('bookDescription','',['class'=>'form-control addbook-desc','placeholder'=>'Enter Book Author'])}}
                </div>
                <div class="form-group addbook-formgroup">
                    {{Form::file('bookImage')}}
                </div>
                {{Form::submit('submit',['class'=>'btn btn-primary'])}}
            {!!Form::close()!!}
        </div>
    </div>
@endsection