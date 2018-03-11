@extends('Layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard <a href="#" class="btn btn-primary">Book Accepts</a></div>

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
                            <th scope="col">Requester</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(count($book_accepts)>0)
                                @foreach($book_accepts as $bookreq)
                   
                                        <tr>
                                            <td><img src="{{asset('images/'.$bookreq->book->image)}}" class='img-thumbnail'></td>
                                            <td>{{$bookreq->book->title}}</td>
                                            <td><a href="{{route('admin.show',$bookreq->user->id)}}">{{$bookreq->user->name}}</a></td>
                                            <td>{{$bookreq->status}}</td>
                                            <!--<td><a href="" class="btn btn-success">Accept</td>-->
                                            <td>
                                                {!!Form::open(['action'=>'BookAcceptsController@store','method'=>'POST'])!!}
                                                    {{Form::hidden('id',$bookreq->id)}}
                                                    {{Form::hidden('uid',$bookreq->user->id)}}
                                                    {{Form::hidden('bookid',$bookreq->book->id)}}
                                                    {{Form::hidden('status','Received')}}
                                                    {{Form::submit('Received',['class'=>'btn btn-success'])}}
                                                {!!Form::close()!!}
                                            </td>
                                            <td>
                                                {!!Form::open(['action'=>'BookAcceptsController@store','method'=>'POST'])!!}
                                                    {{Form::hidden('id',$bookreq->id)}}
                                                    {{Form::hidden('status','Cancelled')}}
                                                    {{Form::submit('Cancelled',['class'=>'btn btn-danger'])}}
                                                {!!Form::close()!!}
                                            </td>
                                        </tr>
                                  
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{$book_accepts->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection