@extends('layouts.admin')

@section('content')
<div class="dashboardcontainer"> 
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard <a href="{{route('BookAccepts.index')}}" class="btn btn-primary">Book Accepts</a>
                    <a class="btn btn-primary" href="#">Book Monitoring</a>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    Book Requests
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Book Title</th>
                            
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(count($books)>0)
                                @foreach($books as $book)
                                
                                    <tr>
                                        <td><img src="{{asset('storage/images/'.$book->image)}}" class='img-thumbnail'></td>
                                        <td>{{$book->title}}</td>
                                        <!--<td><a href="" class="btn btn-success">Accept</td>-->
                                        <td>
                                            <a href="{{route('books.edit',$book->id)}}" class="btn btn-success">Edit</a>
                                        </td>
                                        <td>
                                            {!!Form::open(['action'=>['BooksController@destroy',$book->id],'method'=>'POST'])!!}
                                                {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                                {{Form::hidden('_method','DELETE')}}
                                            {!!Form::close()!!}
                                        </td>
                                    </tr>
                                  
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{$books->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
