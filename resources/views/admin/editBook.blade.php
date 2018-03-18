@extends('Layouts.admin')

@section('content')
    <div class="container">
        <h1>Edit Book</h1>
        {!!Form::open(['action'=>['BooksController@update',$book->id],'method'=>'POST','enctype'=>'multipart/form-data'])!!}
            <div class="form-group">
                {{Form::label('title','Title')}}
                {{Form::text('bookTitle',$book->title,['class'=>'form-control','placeholder'=>'Enter Book Title'])}}
            </div>
            <div class="form-group">
                {{Form::label('author','Author')}}
                {{Form::text('bookAuthor',$book->author,['class'=>'form-control','placeholder'=>'Enter Book Author'])}}
            </div>
            <div class="form-group">
                {{Form::label('publisher','Publisher')}}
                {{Form::text('bookPublisher',$book->publisher,['class'=>'form-control','placeholder'=>'Enter Book Author'])}}
            </div>
            <div class="form-group">
                {{Form::label('reference','Reference Number')}}
                {{Form::text('bookReference',$book->ref,['class'=>'form-control','placeholder'=>'Enter Book Author'])}}
            </div>
            <div class="form-group">
                {{Form::label('description','Description')}}
                {{Form::textarea('bookDescription',$book->description,['class'=>'form-control','placeholder'=>'Enter Book Author'])}}
            </div>
            <div class="form-group">
                {{Form::label('number','Number of Books')}}
                {{Form::number('bookSupply',$book->supply,['class'=>'form-control','min'=>'1','max'=>'5s'])}}
            </div>
            <div class="form-group">
                {{Form::file('bookImage')}}
            </div>
            {{Form::submit('submit',['class'=>'btn btn-primary'])}}
            {{Form::hidden('_method','PUT')}}
        {!!Form::close()!!}
    </div>
@endsection